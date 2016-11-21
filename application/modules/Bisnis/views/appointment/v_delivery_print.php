<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 11/11/2016
 * Time: 2:52
 */
?>
<html>
<head>
    <link href="<?php echo base_url(); ?>assets/pinky/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/pinky/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/pinky/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

</head>
<body onload="window.print()">
<div class="container">
    <div class="row">
        <div class="text-center">
            <img width="20%" src="<?=base_url('uploads/logo/'.$company->logo)?>" class="img-rounded">
        </div>
        <div class="col-xs-6">
            <div class="text-left">
                <p>NAME : <?=$deal->mcustomer->name?></p>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="text-right">
                <p>HP : <?=$deal->mcustomer->phone?></p>
            </div>
        </div>
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="col-sm-6 text-center">GOWN</th>
                    <th class="col-sm-6 text-center">ACCESSORIES</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <ol>
                            <?php foreach($tritem as $row): ?>
                                <li><?=$row->mbaju->name?></li>
                            <?php endforeach; ?>
                            <?php foreach($trmade as $row): ?>
                                <li><?=$row->disc?></li>
                            <?php endforeach; ?>
                        </ol>
                    </td>
                    <td>
                        <ol>
                            <?php foreach($traccessories as $row): ?>
                                <li><?=$row->maccessories->name?></li>
                            <?php endforeach; ?>
                            <?php foreach($trjobs as $row): ?>
                                <li><?=$row->job?></li>
                            <?php endforeach; ?>
                        </ol>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12">
            <div class="text-left">
                <p><b><?=$appointment->title?></b> : <?=tgl_indo($appointment->date_delivery)?></p>
            </div>
        </div>
        <div class="col-xs-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="col-xs-6 text-center">PIC</th>
                    <th class="col-xs-6 text-center">CLIENT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><div style="height: 100px;"></div></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <div class="text-center">
                <p>Mohon untuk memeriksa KONDISI DAN kelengkapan barang. Term and condition applied</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>