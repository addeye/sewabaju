<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 07/11/2016
 * Time: 10:33
 */
?>
<div class="row">

    <div class="col-md-12">

        <div class="well well-lg">

            <form id="formitem" class="form-horizontal" action="" method="post" role="form">
                <input type="hidden" name="id" value="<?=$d->id?>">

                <div class="form-group">

                    <label for="customer_tanggal_lahir" class="col-md-4 control-label">Tanggal Fitting</label>

                    <div class="col-md-8">

                        <div class="input-icon">

                            <input name="fitting_date" class="form-control date-picker" size="16" type="text" value="<?=$d->fitting_date?>">

                        </div>

                    </div>

                </div>
                <div class="form-group">

                    <label for="customer_tanggal_lahir" class="col-md-4 control-label">Tanggal Pinjam</label>

                    <div class="col-md-8">

                        <div class="input-icon">

                            <input name="rent_date" class="form-control date-picker" size="16" type="text" value="<?=$d->rent_date?>">

                        </div>

                    </div>

                </div>
                <div class="form-group">

                    <label for="customer_tanggal_lahir" class="col-md-4 control-label">Tanggal Kembali</label>

                    <div class="col-md-8">

                        <div class="input-icon">

                            <input name="back_date" class="form-control date-picker" size="16" type="text" value="<?=$d->back_date?>">

                        </div>

                    </div>

                </div>

                <hr>



                <div class="form-group">

                    <div class="col-md-12">

                        <button type="button" onclick="updatetritem()" class="pull-right btn blue">Simpan</button>

                    </div>

                </div>



            </form>

        </div>

    </div>

</div>
<script type="text/javascript">

    jQuery(document).ready(function() {

        ComponentsDateTimePickers.init();
        $('.select2').select2();
    });

</script>
