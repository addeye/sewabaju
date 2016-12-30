<div class="row ">

    <?=$this->session->flashdata('pesan')?>

    <div class="col-md-12">

        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet box red">

            <div class="portlet-title">
                <div class="caption font-dark">
                    <a href="<?=$linkback?>" class="btn btn-warning">Kembali</a>
                </div>
                <div class="tools"> </div>
            </div>

            <div class="portlet-body">
                <table id="myTable" class="table table-actions-wrapper">
                    <thead>
                    <tr>
                        <th class="col-xs-1">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Customer</th>
                        <th>Note</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; foreach($rowdata->appointment as $row):?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row->code?></td>
                            <td><?=tgl_indo_waktu($row->date)?></td>
                            <td><?=$row->mcustomer->name?></td>
                            <td><?=$row->note?></td>
                            <td><?=status_customer()[$row->status]?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- ajax -->
                <div id="ajax-modal" class="modal fade" tabindex="-1"> </div>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->

        <!-- END EXAMPLE TABLE PORTLET-->

    </div>



</div>

<!-- END PAGE CONTENT-->

<script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });

</script>