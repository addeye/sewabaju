<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 11/11/2016
 * Time: 2:52
 */
?>
<style>
    .border-invoice {
        /*border-style: solid;*/
        margin: 0px 0px 0px;
        padding: 50px;
    }
    .border-invoice-out {
        border-style: solid;
        margin: 48px 110px 0px;
        /*padding: 50px;*/
    }
    .no-border-invoice {
        margin: 5px;
        padding: 0px 100px 0px;
    }
    .label-invoice {
        border-style: solid;
        height: 80px;
        width: 150px;
        font-size: 20px;
        text-align: center;
        /*position: absolute;*/
    }
    .label-invoice span{
        color: #939396;
    }
    .logo-invoice {
        width: 92%;
        margin-top: -12px;
    }
    .logo-invoice img {
        width: 300px;
        background-color: white;
    }
    hr.style1{
        border-top: 1px solid #8c8b8b;
        margin-left: 100px;
        margin-right: 100px;
        margin-top: 0px;
    }
    hr.style2{
        border-top: 1px solid #8c8b8b;
        margin-left: 100px;
        margin-right: 100px;
        margin-top: 150px;
    }
</style>

<div class="">
    <div class="row">
        <div class="col-xs-12">
            <div class="row hidden-print all-button pull-right">

                <div class="col-xs-12">

                    <button type="button" class="btn red hidden-print uppercase print-btn" onclick="loadOtherPage()">

                        <i class="fa fa-print"></i> Print

                    </button>

                    <a href="<?=base_url('bisnis/appointment/add')?>" class="btn blue hidden-print uppercase print-btn">

                        <i class="fa fa-plus"></i> Baru

                    </a>

                    <a href="<?=base_url('bisnis/appointment')?>" class="btn green hidden-print uppercase print-btn">

                        <i class="fa fa-bars"></i> List

                    </a>

                </div>

            </div>
        </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="">
                <div class="logo-invoice">
                    <img src="<?=base_url('uploads/logo/'.$company->logo)?>">
                </div>
            </div>
            <div class="border-invoice-out">
                <div class="col-xs-2 pull-right">
                    <div class="label-invoice"><span>Customer Invoice</span></div>
                </div>
                <div class="border-invoice">
                    <div class="row">
                        <label class="col-xs-12">
                            <b>PERSONAL INFORMATION -</b>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-xs-3">Name</label>
                        <div class="col-xs-9">: <?=$deal?$deal->mcustomer->name:''?></div>
                    </div>
                    <div class="row">
                        <label class="col-xs-3">Contact</label>
                        <div class="col-xs-9"">: <?=$deal?$deal->mcustomer->phone:''?></div>
                </div>
                <br>
                <div class="row">
                    <label class="col-xs-12">
                        <b>ORDER DETAILS -</b>
                    </label>
                </div>
                <div class="row">
                    <?php foreach(proses() as $key=>$row): ?>
                        <div class="col-xs-3"><input type="radio" name="process" <?=$deal?$deal->process==$key?'checked':'':''?>> <?=$row?></div>
                    <?php endforeach;?>
                </div>
                <br>
                <table class="table table-bordered">
                    <tr style="color: white; background-color: #000033;">
                        <th>Products</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                    <?php foreach($product as $row): ?>
                        <tr>
                            <td class="col-xs-4"><?=$row['name']?></td>
                            <td><?=$row['qty']?></td>
                            <td class="text-right"><?=$row['total']?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <div class="row">
                    <label class="col-xs-12">
                        <b>SCHEDULE -</b>
                    </label>
                </div>
                <div class="row">
                    <div class="col-xs-3">Out</div>
                    <div class="col-xs-3">: <?=$deal?tgl_indo($deal->date_borrow):''?></div>
                    <div class="col-xs-3">Returned</div>
                    <div class="col-xs-3">: <?=$deal?tgl_indo($deal->date_back):''?></div>
                </div>
                <br>
                <div class="row">
                    <label class="col-xs-12">
                        <b>SHIPPING -</b>
                    </label>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="radio" name="shipping" <?=$deal?$deal->shipping==1?'checked':'':''?>> Pick Up
                    </div>
                    <div class="col-xs-3">
                        <input type="radio" name="shipping" <?=$deal?$deal->shipping==2?'checked':'':''?>> Shipped to
                    </div>
                    <div class="col-xs-3">
                        : <?=$deal?$deal->shipping_address:''?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-xs-12">
                        <b>PAYMENT DETAILS -</b>
                    </label>
                </div>
                <div class="row">
                    <label class="col-xs-3">Shipping Cost</label>
                    <div class="col-xs-3">: Rp. <?=$deal?rupiah($deal->shipping_cost):''?></div>
                </div>
                <div class="row">
                    <label class="col-xs-3">Total</label>
                    <div class="col-xs-3">: Rp. <?=$deal?rupiah($deal->total):''?></div>
                </div>
                <div class="row">
                    <label class="col-xs-3">Down Payment</label>
                    <div class="col-xs-6">: Rp. <?=$deal?rupiah($deal->down_payment):''?> (<?php foreach(pay() as $key=>$row):?><?=$deal?$key==$deal->pay_dp?'<strike>'.$row.'</strike>/':$row.'/':$row.'/'?><?php endforeach; ?>) Date : <?=$deal?$deal->date_dp?tgl_indo($deal->date_dp):'':''?></div>
                </div>
                <div class="row">
                    <label class="col-xs-3">Sisa Pembayaran</label>
                    <div class="col-xs-6">: Rp. <?=$deal?rupiah($deal->remaining_payment):''?> (<?php foreach(pay() as $key=>$row):?><?=$deal?$key==$deal->pay_rp?'<strike>'.$row.'</strike>/':$row.'/':$row.'/'?><?php endforeach; ?>) Date : <?=$deal?$deal->date_rp?tgl_indo($deal->date_rp):'':''?></div>
                </div>
            </div>
            </div>
            <br>
            <div class="no-border-invoice">
                <label style="padding-left: 24px"><b>TERM & CONDITION</b></label>
                <div style="font-size: 10px;">
                    <?=$company->term_condition?>
                </div>
            </div>
            <br>
            <div style="font-size: 20px">
                <div class="row">
                    <label class="col-xs-12 text-center">
                        <b>AGREED,</b>
                        <hr class="style1">
                    </label>
                </div>
                <div class="row">
                    <label class="col-xs-4 text-center">
                        <b>CONSULTANT ,</b>
                        <hr class="style2">
                    </label>
                    <div class="col-xs-4">
                        <img src="<?=base_url('uploads/logo/ttdinvoice.png')?>">
                    </div>
                    <label class="col-xs-4 text-center">
                        <b>CLIENT ,</b>
                        <hr class="style2">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="urlcetak" value="<?=base_url('bisnis/appointment/invoice_print/'.$deal->appointment_id)?>">

<script>
    function loadOtherPage() {
        var urlcetak = $("#urlcetak").val();
        $("<iframe>")                             // create a new iframe element
            .hide()                               // make it invisible
            .attr("src", urlcetak) // point the iframe to the page you want to print
            .appendTo("body");                    // add iframe to the DOM to cause it to load the page
    }
</script>
