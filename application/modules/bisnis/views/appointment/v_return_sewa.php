<div class="row ">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption font-dark">
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <form class="form-horizontal" method="post" action="<?=$link_act?>" role="post">
                    <input type="hidden" name="id" value="<?=$rowdata->id?>">
                    <input type="hidden" name="jenis" value="<?=$jenis?>">
                    <input type="hidden" name="appointment_id" value="<?=$rowdata->appointment_id?>">

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Status Return</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="status_return">
                                <option value="">Pilih Status</option>
                                <?php foreach(status_return() as $key=>$row){ ?>
                                    <option value="<?=$key?>" <?=$rowdata->status_return==$key?'selected':''?> ><?=$row?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Telat Hari</label>
                        <div class="col-sm-1">
                            <input type="number" class="form-control" name="hari_telat" value="<?=$rowdata->hari_telat?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Denda</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="denda" value="<?=$rowdata->denda?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Keterangan</label>
                        <div class="col-sm-3">
                            <textarea name="keterangan" class="form-control"><?=$rowdata->keterangan?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-1">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        <div class="col-sm-1">
                            <a href="<?=$link_back.$rowdata->appointment_id?>" class="btn sbold yellow"> Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function() {

        ComponentsDateTimePickers.init();

    });

</script>