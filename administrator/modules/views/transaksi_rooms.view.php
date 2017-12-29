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
            $kys2 = array_keys($data['activ']);
            
            $m2 = explode(".", $data['activ'][$kys2[0]]->code_room);
            $m = explode(".", $data['rm'][$kys[0]]->room);
            
//            var_dump($data['rm']);
            ?>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=transaksi&action=kelas&kelas=<?php echo $m[0]; ?>"><span class="glyphicon glyphicon-arrow-left"></span></a></li>
            <?php foreach ($data['rm'] AS $rm) { 
                $ex = explode('.', $rm->room);
//                var_dump($ex);
                  if($ex[2] == $m2[2] ) { ?>
                    <li role="presentation" <?php echo 'class="active"';?>><a href="<?php echo SITE_URL; ?>?page=transaksi&action=rooms&major=<?php echo $ex[1].'.'.$ex[2];?>&wl=<?php echo $ex[0].'.'.$rm->teacher_code;?>"><?php echo $rm->room; ?></a></li>

                <?php } else { ?>
                    <li role="presentation" ><a href="<?php echo SITE_URL; ?>?page=transaksi&action=rooms&major=<?php echo $ex[1].'.'.$ex[2];?>&wl=<?php echo $ex[0].'.'.$rm->teacher_code;?>"><?php echo $rm->room; ?></a></li>
                <?php } ?>
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
                        <!--<th>CODE SISWA</th>-->
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        
                        <th>SPP <?php echo date('M');?></th>
                        <th>PRAKTEK GANJIL</th>
                        <th>PRAKTEK GENAP</th>
                        <th>SYARIAH</th>
                        
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
                            <!--<td><?php // echo $val->code_room; ?></td>-->
                            <td><?php echo $val->nis; ?></td>
                            <td><?php echo $val->name; ?></td>
                            <td><?php echo $val->gendre; ?></td>
                            <td><?php echo $val->gendre; ?></td>
                            <td><?php echo $val->gendre; ?></td>
                            <td><?php echo $val->gendre; ?></td>
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