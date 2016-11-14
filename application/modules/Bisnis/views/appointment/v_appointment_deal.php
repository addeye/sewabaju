<div class="row ">
    <?=$this->session->flashdata('pesan')?>
    <div class="col-md-6">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption font-dark">
                    PROSES DEALING
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <form class="form-horizontal" method="post" action="<?=$link_act?>" role="post">
                    <input type="hidden" id="customer_id" name="customer_id" value="<?=$d->customer_id?>">
                    <input type="hidden" id="appointment_id" name="appointment_id" value="<?=$d->id?>">
                    <input type="hidden" name="id" value="<?=$deal?$deal->id:0?>">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Rent / Back</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control date-picker" name="date_borrow" placeholder="Tanggal Pinjam" value="<?=$deal?$deal->date_borrow:''?>" required>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control date-picker" name="date_back" placeholder="Tanggal Kembali" value="<?=$deal?$deal->date_back:''?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Fitting</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control date-picker" name="date_fitting" placeholder="Tanggal Fitting" value="<?=$deal?$deal->date_fitting:''?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Note</label>
                        <div class="col-sm-8">
                            <textarea name="note" class="form-control" rows="4" placeholder="Keterangan Deal"><?=$deal?$deal->note:''?></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Proses</label>
                        <?php foreach(proses() as $key=>$row): ?>
                            <label class="radio-inline">
                                <input type="radio" name="process" value="<?=$key?>" <?=$deal?$deal->process==$key?'checked':'':''?>> <?=$row?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Shipping</label>
                        <?php foreach(shipping() as $key=>$row): ?>
                            <label class="radio-inline">
                                <input type="radio" id="shipping" onclick="disabled_address(this.value)" name="shipping" <?=$deal?$deal->shipping==$key?'checked':'':''?> value="<?=$key?>" <?=$deal?$deal->shipping==$key?'checked':'':''?>> <?=$row?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Shipping Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control shipping_address" name="shipping_address"><?=$deal?$deal->shipping_address:''?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Shipping Cost</label>
                        <div class="col-sm-3">
                            <input type="number" id="shipping_cost" class="form-control shipping_cost" name="shipping_cost" value="<?=$deal?$deal->shipping_cost:''?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Fitting</label>
                        <label class="checkbox-inline">
                            <input type="checkbox" name="fitting" value="1" <?=$deal?$deal->fitting==1?'checked':'':''?>> Selesai
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Total</label>
                        <div class="col-sm-3">
                            <input type="number" id="dtotal" class="form-control" name="total" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Down Payment</label>
                        <div class="col-sm-3">
                            <input type="number" id="down_payment" class="form-control" name="down_payment" value="<?=$deal?$deal->down_payment:''?>" required>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control date-picker" name="date_dp" value="<?=$deal?$deal->date_dp:date('Y-m-d')?>">
                        </div>
                        <div class="col-sm-3">
                            <select name="pay_dp" class="form-control" style="width: 70px;">
                                <option value=""></option>
                                <?php foreach(pay() as $key=>$row): ?>
                                    <option value="<?=$key?>" <?=$deal?$deal->pay_dp==$key?'selected':'':''?> ><?=$row?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Remaining Payment</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="remaining_payment" name="remaining_payment" value="<?=$deal?$deal->remaining_payment:''?>" required>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control date-picker" name="date_rp" value="<?=$deal?$deal->date_rp:date('Y-m-d')?>">
                        </div>
                        <div class="col-sm-3">
                            <select name="pay_rp" class="form-control" style="width: 70px;">
                                <option value=""></option>
                                <?php foreach(pay() as $key=>$row): ?>
                                    <option value="<?=$key?>" <?=$deal?$deal->pay_rp==$key?'selected':'':''?> ><?=$row?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Deposit</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="deposit" value="<?=$deal?$deal->deposit:''?>" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?=$link_back?>" class="btn sbold yellow">Kembali</a>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-info previews">Invoice</button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption font-dark">
                    PRODUCT
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label"></label>
                        <div class="col-sm-5">
                            <select class="form-control" id="baju_id" name="baju_id">
                                <option value="">Pilih Baju</option>
                                <?php foreach($baju as $row): ?>
                                    <option value="<?=$row->id?>"><?=$row->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-1">
                           <button class="btn btn-info btn-addbaju"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div id="list-baju"></div>
                <hr>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label"></label>
                        <div class="col-sm-5">
                            <select class="form-control" id="accessories_id" name="accessories_id">
                                <option value="">Pilih Acessories</option>
                                <?php foreach($accessories as $row): ?>
                                    <option value="<?=$row->id?>"><?=$row->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-info btn-addacc"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div id="list-accessories"></div>
                <hr>
                <h2>Total : <span id="ptotal"></span></h2>
            </div>
        </div>
    </div>
</div>

<div id="loading" class="modal fade modal-overflow in" tabindex="-1" aria-hidden="true">
    <p>Loading....... </p>
</div>

<div id="invoice" class="modal container fade modal-overflow in" tabindex="-1" aria-hidden="true">

</div>

<input type="hidden" id="urlbaju" value="<?=$link_baju?>">
<input type="hidden" id="urladdbaju" value="<?=$link_addbaju?>">
<input type="hidden" id="urldelallbaju" value="<?=$link_del_allitem?>">
<input type="hidden" id="urldelidbaju" value="<?=$link_del_iditem?>">

<input type="hidden" id="urlaccessories" value="<?=$link_accessories?>">
<input type="hidden" id="urladdaccessories" value="<?=$link_addaccessories?>">
<input type="hidden" id="urldelallaccessories" value="<?=$link_del_allaccessories?>">
<input type="hidden" id="urldelidaccessories" value="<?=$link_del_idaccessories?>">

<input type="hidden" id="urltotaltransaksi" value="<?=$link_total_transaksi?>">
<input type="hidden" id="urlinvoice" value="<?=$link_invoice?>">

<script type="text/javascript">

    jQuery(document).ready(function() {
        baju();
        accessories();
        totaltransaksi();
        ComponentsDateTimePickers.init();

        disabled_address(<?=$deal?$deal->shipping:'1'?>);

        $('.btn-addbaju').click(function(){
            addbaju();
            baju();
            totaltransaksi();
        });
        $('.btn-addacc').click(function(){
            addaccessories();
            accessories();
            totaltransaksi();
        });

        $('#down_payment').keyup(function(){
            var dtotal = $('#dtotal').val();
            var dp = this.value;
            var hasil = Number(dtotal - dp).toFixed();
            $('#remaining_payment').val(hasil);
        });

        $('#shipping_cost').keyup(function(){
            totaltransaksi();
            $('#down_payment').val('');
            $('#remaining_payment').val('');
        });

        $('.previews').click(function(){
            var urlinvoice = $('#urlinvoice').val();
            var appointment_id = $('#appointment_id').val();
            $.ajax({
                beforeSend:function(){
                    $("#loading").modal('show');
                },
                url: urlinvoice+'/'+appointment_id,
                type : 'get',
                cache: false,
            })
                .success(function(data) {
                    $('#invoice').html(data);
                    $("#loading").modal('hide');
                    $('#invoice').modal('show');
                });
        });

    });

    function disabled_address(val)
    {
        if(val==2)
        {
            $('.shipping_address, .shipping_cost').removeAttr('disabled');
        }
        else
        {
            $('.shipping_address,.shipping_cost').attr('disabled','disabled');
        }
    }

    function baju()
    {
        var urlbaju = $('#urlbaju').val();
        var appointment_id = $('#appointment_id').val();
        $.ajax({
            beforeSend:function(){
                $("#loading").modal('show');
            },
            url: urlbaju+'/'+appointment_id,
            type : 'get',
            cache: false,
        })
            .success(function(data) {
                $('#list-baju').html(data);
                $("#loading").modal('hide');
            });
    }

    function accessories()
    {
        var urlaccessories = $('#urlaccessories').val();
        var appointment_id = $('#appointment_id').val();
        $.ajax({
            beforeSend:function(){
                $("#loading").modal('show');
            },
            url: urlaccessories+'/'+appointment_id,
            type : 'get',
            cache: false,
        })
            .success(function(data) {
                $('#list-accessories').html(data);
                $("#loading").modal('hide');
            });
    }

    function addbaju()
    {
        var baju_id = $('#baju_id').val();
        var appointment_id = $('#appointment_id').val();
        var customer_id = $('#customer_id').val();
        var urladdbaju = $('#urladdbaju').val();

        $.ajax({
            url: urladdbaju,
            type : 'post',
            data : {baju_id:baju_id,appointment_id:appointment_id,customer_id:customer_id},
            cache: false,
        })
            .success(function() {
                console.log('success');
            });
    }

    function addaccessories()
    {
        var accessories_id = $('#accessories_id').val();
        var appointment_id = $('#appointment_id').val();
        var customer_id = $('#customer_id').val();
        var urladdaccessories = $('#urladdaccessories').val();

        $.ajax({
            url: urladdaccessories,
            type : 'post',
            data : {accessories_id:accessories_id,appointment_id:appointment_id,customer_id:customer_id},
            cache: false,
        })
            .success(function() {
                console.log('success');
            });
    }

    function delall()
    {
        var urldelallbaju = $('#urldelallbaju').val();
        var appointment_id = $('#appointment_id').val();
        $.ajax({
            url: urldelallbaju+'/'+appointment_id,
            type : 'get',
            cache: false,
        })
            .success(function() {
                console.log('success');
                baju();
                totaltransaksi();
            });
    }

    function delallacc()
    {
        var urldelallaccessories = $('#urldelallaccessories').val();
        var appointment_id = $('#appointment_id').val();
        $.ajax({
            url: urldelallaccessories+'/'+appointment_id,
            type : 'get',
            cache: false,
        })
            .success(function() {
                console.log('success');
                accessories();
                totaltransaksi();
            });
    }

    function delperid(id)
    {
        var urldelidbaju = $('#urldelidbaju').val();
        $.ajax({
            url: urldelidbaju+'/'+id,
            type : 'get',
            cache: false,
        })
            .success(function() {
                console.log('success');
                baju();
                totaltransaksi();
            });
    }

    function delperidacc(id)
    {
        var urldelidaccessories = $('#urldelidaccessories').val();
        $.ajax({
            url: urldelidaccessories+'/'+id,
            type : 'get',
            cache: false,
        })
            .success(function() {
                console.log('success');
                accessories();
                totaltransaksi();
            });
    }

    function totaltransaksi()
    {
        var urltotaltransaksi = $('#urltotaltransaksi').val();
        var appointment_id = $('#appointment_id').val();
        var shipping_cost = $('#shipping_cost').val();
        $.ajax({
            url: urltotaltransaksi+'/'+appointment_id+'/'+shipping_cost,
            type : 'get',
            cache: false,
            dataType: "json"
        })
            .success(function(data) {
                $('#dtotal').val(data.total);
                $('#ptotal').html(data.labeltotal);
            });

    }

</script>