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

    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi">Transaksi</a></li>
            <li role="presentation" class="active"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=online">Transaksi Online</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=X">Data Transaksi Kelas X</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=XI">Data Transaksi Kelas XI</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=XII">Data Transaksi Kelas XII</a></li>
<!--            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=laporan&&action=laporan_bulanan">Bulanan</a></li>-->
        </ul>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="teble table-hover data-table table-striped tablesorter">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jurusan</th>
                        <th>Jumlah Laki-laki</th>
                        <th>Jumlah Perempuan</th>
                        <th>Total Siswa</th>
                        <th>Wakil Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    foreach ($data['rooms'] AS $val) {
                        $v = explode('.', $val->room);
                        ?>
                        <tr>
                            <td><?php echo $n++; ?></td>
                            <td><?php echo $val->room; ?></td>
                            <td><?php echo $val->sum_l; ?></td>
                            <td><?php echo $val->sum_p; ?></td>
                            <td><?php echo $val->sum_all; ?></td>
                            <td><?php echo $val->name; ?></td>
                            <td><a href="<?php echo SITE_URL; ?>?page=transaksi&action=rooms&major=<?php echo $v[1] . "." . $v[2]; ?>&wl=<?php echo $v[0] . "." . $val->teacher_code; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>