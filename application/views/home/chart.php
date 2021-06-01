<!-- Bootstrap core CSS -->

<head>
    <title><?= $title ?></title>
    <meta http-equiv="refresh" content="30">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body class="container mt-4">
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6 col-md-3 col-sm-3">
                <!-- small box -->
                <div class="small-box bg-warning" style="height:80px">
                    <div class="inner">
                        <b><?= $positif ?></b>

                        <p>Total Positif</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6 col-md-3 col-sm-3">
                <!-- small box -->
                <div class="small-box bg-success" style="height:80px">
                    <div class="inner">
                        <b><?= $sembuh ?></b>

                        <p>Total Sembuh</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6 col-md-3 col-sm-3">
                <!-- small box -->
                <div class="small-box bg-danger" style="height:80px">
                    <div class="inner">
                        <b><?= $meninggal ?></b>

                        <p>Total Meninggal</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6 col-md-3 col-sm-3">
                <!-- small box -->
                <div class="small-box bg-primary" style="height:80px">
                    <div class="inner">
                        <b><?= $dirawat ?></b>

                        <p>Total Dirawat</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
</body>
