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
            <li role="presentation" class="active"><a href="<?php echo SITE_URL; ?>?page=transaksi">Transaksi</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=online">Transaksi Online</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=X">Data Transaksi Kelas X</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=XI">Data Transaksi Kelas XI</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=XII">Data Transaksi Kelas XII</a></li>
<!--            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=laporan&&action=laporan_bulanan">Bulanan</a></li>-->
        </ul>
    </div>
</div>

<div class="row">
    <form method="POST" role="form">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-6">

            <input class="form-control" name="search_name" type="text" placeholder="Cari Nama Siswa" autofocus="" autocomplete="off">
        </div>

        <div class="col-lg-4">
            <input class="btn btn-primary" type="submit" value="Cari Siswa">
        </div>
    </form>
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="table-responsive" >
            <table class="teble table-hover data-table table-striped tablesorter" >
                <thead>
                    <tr>
                        <th class="header">No</th>
                        <th class="header">CODE KELAS</th>
                        <th class="header">NIS</th>
                        <th class="header">Nama Siswa</th>
                        <th class="header">STATUS</th>
                        <th class="header">TANGGAL TRANSAKSI</th>
                        <th class="header" style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
//                    var_dump($data["transaksi"]);
                    if ($data["transaksi"] != NULL) {
                        foreach ($data["transaksi"] as $transaksi) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $transaksi->code_room; ?></td>
                                <td><?php echo $transaksi->nis; ?></td>
                                <td><?php echo $transaksi->name; ?></td>
                                <td><?php
                                    if ($transaksi->status_transaksi != NULL) {
                                        echo $transaksi->status_transaksi;
                                    } else {
                                        echo "-";
                                    }
                                    ?></td>
                                <td><?php
                                    if ($transaksi->date_transaksi != NULL) {
                                        echo $transaksi->date_transaksi;
                                    } else {
                                        echo "-";
                                    }
                                    ?></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="<?php echo SITE_URL; ?>?page=transaksi&action=pembayaran&ID=<?php echo $transaksi->nis; ?>" title="Pembayaran">
                                        <span class="glyphicon glyphicon-credit-card"></span>
                                    </a>
        <!--                                    <a class="btn btn-danger btn-xs" href="<?php echo SITE_URL; ?>?page=transaksi&&action=delete&&id=<?php echo $transaksi->id_transaksi; ?>" onclick="return confirm('Are sure Delete this data?')" title="Hapus Data">
                                        <span class="glyphicon glyphicon-erase"></span>
                                    </a>-->
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>