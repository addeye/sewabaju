<!-- BEGIN DASHBOARD STATS 1-->

<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">

            <div class="visual">

                <i class="fa fa-shopping-bag"></i>

            </div>

            <div class="details">

                <div class="number">

                    <span>0</span>

                </div>

                <div class="desc"> Transaksi Hari Ini </div>

            </div>

        </a>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

        <a class="dashboard-stat dashboard-stat-v2 red" href="#">

            <div class="visual">

                <i class="fa fa-mail-reply"></i>

            </div>

            <div class="details">

                <div class="number">

                    <span>0</span>

                </div>

                <div class="desc"> Return Hari Ini </div>

            </div>

        </a>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

        <a class="dashboard-stat dashboard-stat-v2 green" href="#">

            <div class="visual">

                <i class="fa fa-tags"></i>

            </div>

            <div class="details">

                <div class="number">

                    <span>0</span>

                </div>

                <div class="desc"> Pendapatan Hari Ini </div>

            </div>

        </a>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">

            <div class="visual">

                <i class="fa fa-bar-chart-o"></i>

            </div>

            <div class="details">

                <div class="number">

                    <span></span>

                </div>

                <div class="desc"> Total Pendapatan </div>

            </div>

        </a>

    </div>

</div>

<div class="clearfix"></div>

<!-- END DASHBOARD STATS 1-->

<div class="row">

    <div class="col-md-12 col-sm-12">

        <!-- BEGIN PORTLET-->

        <div class="portlet box red">

            <div class="portlet-title">

                <div class="caption">

                    <i class="icon-share font-red-sunglo hide"></i>

                    <span class="caption-subject bold uppercase">Pendapatan</span>

                </div>

            </div>

            <div class="portlet-body">
                <div id="calendar"></div>
            </div>

        </div>

        <!-- END PORTLET-->

    </div>

</div>

<script>
    var events_array = <?=$dcalendar?>
</script>