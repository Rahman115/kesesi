<div class="row" >
    <div class="col-lg-12" >
        <h1>Transaksi</h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i></a>
            </li>
            <li class="active">
                <i class="fa fa-newspaper-o"></i> Transaksi
            </li>
        </ol>
    </div>
</div>
<div class="row">

    <div class="col-lg-6">
        <div class="panel panel-success">
            <div class="panel-heading">Data Siswa</div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <tr>
                        <td style="width: 120px;"><b>NAMA SISWA</b></td>
                        <td style="width: 10px;">:</td>
                        <td ><?php echo $data['siswa']->name; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 120px;"><b>NIS SISWA</b></td>
                        <td style="width: 10px;">:</td>
                        <td ><?php echo $data['siswa']->nis; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 120px;"><b>JENIS KELAMIN</b></td>
                        <td style="width: 10px;">:</td>
                        <td ><?php echo $data['siswa']->gendre; ?></td>
                    </tr>
                </table>
                <?php // var_dump($data['siswa']); ?>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">Data Pembayaran Syariah</div>
            <div class="panel-body">

            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">Data Pembayaran Praktek</div>
            <div class="panel-body">

            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Transaksi Pembayaran</div>
            <div class="panel-body">

            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">Data Pembayaran SPP</div>
            <div class="panel-body">

            </div>
        </div>
    </div>
</div>
