<!-- Bootstrap core CSS -->

<head>
    <title><?= $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/tempusdominus-bootstrap-4.min.css">
</head>

<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $positif?></h3>

                        <p>Total Positif</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $sembuh?></h3>

                        <p>Total Sembuh</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $meninggal?></h3>

                        <p>Total Meninggal</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?= $dirawat?></h3>

                        <p>Total Dirawat</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>