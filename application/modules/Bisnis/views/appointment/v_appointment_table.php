<div class="row ">
    <?=$this->session->flashdata('pesan')?>
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <a href="<?=$link_add?>" class="btn sbold blue"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                    <table id="myTable" class="table table-actions-wrapper">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($data as $row):?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><a href="<?=$link_edit.$row->id?>"><?=$row->code?></a></td>
                                <td><?=$row->date?></td>
                                <td><?=$row->mcustomer->name?></td>
                                <td><?=$row->note?></td>
                                <td><u><?=status_customer()[$row->status]?></u></td>
                                <td>
                                    <button id="<?=$row->id?>" type="button" onclick="invoice(this.id)" class="btn btn-info btn-invoice" <?=$row->status==STATUS_APPOINTMENT?'disabled':''?>>Invoice</button>
                                    <button id="<?=$row->id?>" type="button" onclick="delivery(this.id)" class="btn btn-info btn-invoice" <?=empty($row->pickuped)?'disabled':''?>>Delivery</button>
                                </td>
                                <td>
                                    <a href="<?=$link_deal.$row->id?>" class="btn btn-success">Detail</a>
                                    <button type="button" href="#" class="btn btn-danger del" href="javascript:void(0);" id="<?=$row->id?>">Cancel</button>
                                    <?php if($row->status == STATUS_SIAP_AMBIL){?>
                                        <button id="<?=$row->link_change?>" onclick="confirmstatus(this.id,<?=$row->mdeal->remaining_payment?>)" class="btn btn-warning"><?=$row->status_data?></button>
                                    <?php }elseif($row->status == STATUS_DIPINJAM){?>
                                        <button id="<?=$row->link_change?>" data-id="<?=$row->id?>" onclick="confirmreturn(this.id,<?=$row->mdeal->deposit?>,<?=$row->id?>)" class="btn btn-warning"><?=$row->status_data?></button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div id="mymodal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                        <div class="modal-body">

                            <p> Anda yakin ingin menghapus data? </p>
                            <textarea id="cancel-text" class="form-control" placeholder="Alasan Cancel..."></textarea>
                        </div>

                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-outline red">Batal</button>

                            <button id="delete_all_trigger" type="submit" class="btn btn-outline dark danger act_del">Hapus</button>

                        </div>

                    </div>

                <div id="mymodalalertstatus" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                    <div class="modal-body">
                        <h3 id="remaining-pay"></h3>
                        <p> Anda yakin ingin merubah status ? </p>
                    </div>

                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-outline red">Batal</button>

                        <button id="delete_all_trigger" type="button" class="btn btn-outline dark danger btn-status">Ganti</button>

                    </div>

                </div>

                <div id="mymodalreturnstatus" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                    <div class="modal-body">
                        <h3 id="deposit-pay"></h3>
                        <div class="form-group">
                            <input placeholder="Final Deposit" type="number" id="deposit_final" class="form-control">
                            <p class="help-block">*Dikosongkan jika barang tidak ada yang rusak</p>
                        </div>
                        <div class="form-group">
                                <textarea class="form-control" id="return_note" placeholder="Keterangan Barang Yang dipinjam..."></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">

                        <button type="button" data-dismiss="modal" class="btn btn-outline red">Batal</button>

                        <button id="delete_all_trigger" type="button" class="btn btn-outline dark danger btn-status">Ganti</button>

                    </div>

                </div>
                <!-- ajax -->

                <div id="ajax-modal" class="modal fade" tabindex="-1"> </div>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->

        <!-- END EXAMPLE TABLE PORTLET-->

    </div>
</div>

<div id="invoice" class="modal container fade modal-overflow in" tabindex="-1" aria-hidden="true">

</div>
<div id="delivery" class="modal container fade modal-overflow in" tabindex="-1" aria-hidden="true">

</div>

<input type="hidden" id="iddel">
<input type="hidden" id="url" value="<?=$link_delete?>">
<input type="hidden" id="urlinvoice" value="<?=$link_invoice?>">
<input type="hidden" id="urldelivery" value="<?=$link_delivery?>">
<input type="hidden" id="urlajaxkembali" value="<?=$link_ajaxkembali?>">

<!-- END PAGE CONTENT-->

<script>
    $(document).ready(function(){
        $('#myTable').DataTable();

        $('.del').click(function(){
            $('#mymodal').modal('show');
            $('#iddel').val(this.id);
        });
        $('.act_del').click(function(){
            var $url = $('#url').val();
            var id = $('#iddel').val();
            var canceltext = $('#cancel-text').val();

            $.ajax({
                url : $url+'/'+id,
                type: 'post',
                data: {cancel:canceltext},
                cache: false,
            })
                .success(function(){
                    /*optional stuff to do after success */
                    $('#mymodal').modal('hide');
                })
                .done(function(){
                    location.reload(true);
                });
        });
    });
    function invoice(id)
    {
        var urlinvoice = $('#urlinvoice').val();
        $.ajax({
            beforeSend:function(){
                $("#loading").modal('show');
            },
            url: urlinvoice+'/'+id,
            type : 'get',
            cache: false,
        })
            .success(function(data) {
                $('#invoice').html(data);
                $("#loading").modal('hide');
                $('#invoice').modal('show');
            });
    }

    function delivery(id)
    {
        var urldelivery = $('#urldelivery').val();
        $.ajax({
            beforeSend:function(){
                $("#loading").modal('show');
            },
            url: urldelivery+'/'+id,
            type : 'get',
            cache: false,
        })
            .success(function(data) {
                $('#delivery').html(data);
                $("#loading").modal('hide');
                $('#delivery').modal('show');
            });
    }

    function confirmstatus(url,rp)
    {
        $('#mymodalalertstatus').modal('show');
        $('#remaining-pay').html('Biaya Remaining Payment : <span class="label-danger">'+toRp(rp)+'</span>');
        $('.btn-status').click(function(){
            window.location = url;
        });
        return false;
    }

    function confirmreturn(url,rp,id)
    {
        $('#mymodalreturnstatus').modal('show');
        $('#deposit-pay').html('Kembalikan Deposit : <span class="label-danger">'+toRp(rp)+'</span>');
        var urlajax = $('#urlajaxkembali').val();

        $('.btn-status').click(function(){

            var deposit_final = $('#deposit_final').val();
            var return_note = $('#return_note').val();
            $.ajax({
                url: url,
                type : 'post',
                data : {deposit_final:deposit_final,return_note:return_note},
                cache: false,
            })
                .success(function() {
                    $('#mymodalreturnstatus').modal('hide');
                    delivery(id)
                    $('#delivery').on('hide',function(){
                        location.reload();
                    });
                });
        });
    }
</script>