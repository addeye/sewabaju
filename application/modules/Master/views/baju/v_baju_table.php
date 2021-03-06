<div class="row ">

    <?=$this->session->flashdata('pesan')?>

    <div class="col-md-12">


        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet box red">

            <div class="portlet-title">

                <div class="caption font-dark">
                    <a href="<?=$link_add?>" class="btn sbold blue"><i class="fa fa-plus"></i> Tambah Data</a>
                    <a href="<?=$link_import?>" class="btn sbold blue"><i class="fa fa-plus"></i> Import</a>
                </div>

                <div class="tools"> </div>

            </div>

            <div class="portlet-body">
                    <table id="myTable" class="table table-actions-wrapper">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Warna</th>
                            <th>Type</th>
                            <th>Kategori</th>
                            <th>Sewa</th>
                            <th>Jual</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($data as $row):?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><a id="<?=$row->id?>" href="javascript:void(0);" onclick="showHistory(this.id)"><?=$row->code?></a></td>
                                <td><?=$row->name?></td>
                                <td><?=$row->colour?></td>
                                <td><?=$row->mtype->name?></td>
                                <td><?=$row->mkategori->name?></td>
                                <td><?=rupiah($row->rent_price)?></td>
                                <td><?=rupiah($row->sale_price)?></td>
                                <td>
                                    <a href="<?=$link_edit.$row->id?>" class="btn btn-success">Edit</a>
                                    <button type="button" href="#" class="btn btn-danger del" href="javascript:void(0);" id="<?=$row->id?>">Del</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div id="mymodal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                        <div class="modal-body">

                            <p> Anda yakin ingin menghapus data? </p>

                        </div>

                        <div class="modal-footer">

                            <button type="button" data-dismiss="modal" class="btn btn-outline red">Cancel</button>

                            <button id="delete_all_trigger" type="submit" class="btn btn-outline dark danger act_del">Hapus</button>

                        </div>

                    </div>
                <!-- ajax -->
                <div id="ajax-modal" class="modal fade" tabindex="-1">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">History Customer</h4>
                    </div>
                    <div id="history-list" class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->

        <!-- END EXAMPLE TABLE PORTLET-->

    </div>



</div>

<input type="hidden" id="iddel">
<input type="hidden" id="url" value="<?=$link_delete?>">
<input type="hidden" id="urlhistory" value="<?=$link_customerhistory?>">

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
            $.ajax({
                url : $url+'/'+id,
                type: 'get',
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

    function showHistory(id)
    {
        var $urlhistory = $('#urlhistory').val();
        $.ajax({
            url : $urlhistory+'/'+id,
            type: 'get',
            cache: false,
            dataType: 'html',
        })
            .success(function(data)
            {
                $('#history-list').html(data);
                $('#ajax-modal').modal('show');
            });

    }
</script>