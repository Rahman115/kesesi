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
            <?php
            $kys = array_keys($data['rm']);
            $m = explode(".", $data['rm'][$kys[0]]->room);
            ?>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=<?php echo $m[0]; ?>"><span class="glyphicon glyphicon-arrow-left"></span></a></li>
            <?php foreach ($data['rm'] AS $rm) { ?>

                <li role="presentation" <?php // if ($data['activ'] == 'X') echo 'class="active"';        ?>><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=X"><?php echo $rm->room; ?></a></li>

            <?php } ?>
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
                        <th>CODE SISWA</th>
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>L/P</th>
                        <th>STATUS</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    foreach ($data['activ'] AS $val) {
//                        $v = explode('.', $val->room);
                        ?>
                        <tr>
                            <td><?php echo $n++; ?></td>
                            <td><?php echo $val->code_room; ?></td>
                            <td><?php echo $val->nis; ?></td>
                            <td><?php echo $val->name; ?></td>
                            <td><?php echo $val->gendre; ?></td>
                            <td><?php echo $val->status; ?></td>
                            <td>
                                <a href="<?php echo SITE_URL; ?>?page=transaksi" class="btn btn-xs btn-success" title="Pembayaran"><span class="glyphicon glyphicon-upload"></span></a>
                                <a href="<?php echo SITE_URL; ?>?page=transaksi" class="btn btn-xs btn-danger" title="Riwayat"><span class="glyphicon glyphicon-list"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
//var_dump($data['activ']);
?>