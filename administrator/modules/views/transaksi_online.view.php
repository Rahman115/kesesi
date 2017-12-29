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
        </ul>
    </div>
</div>

<div class="row">

    <div class="col-lg-8">
        <div class="table-responsive">
            <table class="teble table-hover data-table table-striped tablesorter">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>NAMA LENGKAP</th>
                        <th>JENIS</th>
                        <th>KELAS</th>
                        <th>NOMINAL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    foreach ($data['online'] AS $online) {
                        ?>
                        <tr>
                            <td><?php echo $n++; ?></td>
                            <td><?php echo $online->id_student; ?></td>
                            <td><?php echo $online->name; ?></td>
                            <td><?php echo $online->status_transaksi; ?></td>
                            <td><?php echo $online->code_room; ?></td>
                            <td><?php echo $online->price; ?></td>
                            <td><a title="Lihat Detail Transaksi" href="<?php echo SITE_URL; ?>?page=transaksi&action=online&ID=<?php echo $online->id_transaksi; ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                        </tr>
                    <?php } 
//                    var_dump($data['ins']);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                KONFIRMASI PEMBAYARAN ONLINE
            </div>
            <div class="panel-body">
                <?php
                if ($data['info'] == TRUE) {
     
                    $exp = explode("/", $data['dataInfo']->exp);
//     var_dump($exp);
                    ?>
                    <form method="post" role="form" enctype="multipart/form-data">

                        <?php
                        if (isset($data["error"]) && count($data["error"]) > 0) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <ul class="list-square">
                                    <?php
                                    foreach ($data["error"] as $error) {
                                        ?>
                                        <li>
                                            <?php echo $error; ?>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                            <?php
                        } else if (isset($data["success"])) {
                            ?>

                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $data["success"]; ?>
                            </div>
                            <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=home">

                        <?php } ?>
                        <div class="form-group">
                            <label class="control-label">NAMA LENGKAP</label>

                            <input type="text" disabled="" value="<?php echo $data['dataInfo']->name; ?>" class="form-control">
                            <input type="hidden" name="transfer_nis_pengguna" value="<?php echo $data['dataInfo']->nis; ?>" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">JENIS PEMBAYARAN</label>
                            <input type="text" disabled="" value="<?php echo $data['dataInfo']->status_transaksi; ?>" class="form-control">
                            <input type="hidden" name="transfer_status" value="<?php echo $data['dataInfo']->status_transaksi; ?>" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">BANK TRANSFER</label>
                            <input type="text" disabled="" value="<?php echo $exp[0]; ?>" class="form-control">
                            <input type="hidden" name="transfer_bank" value="<?php echo $exp[0]; ?>" >

                        </div>
                        <div class="form-group">
                            <label class="control-label">NAMA PENGGUNA REKENING</label>
                            <input type="text" disabled="" value="<?php echo $exp[2]; ?>" class="form-control">
                            <input type="hidden" name="transfer_nama_pengguna" value="<?php echo $exp[2]; ?>" >

                        </div>
                        <div class="form-group">
                            <label class="control-label">NOMOR REKENING</label>
                            <input type="text" disabled="" value="<?php echo $exp[1]; ?>" class="form-control">
                            <input type="hidden" name="transfer_nomor_rekening_pengguna" value="<?php echo $exp[1]; ?>" >

                        </div>
                        <div class="form-group">
                            <label class="control-label">NOMINAL</label>
                            <input type="text" disabled="" value="<?php echo $data['dataInfo']->price; ?>" class="form-control">
                            <input type="hidden" name="transfer_nominal_pengguna" value="<?php echo $data['dataInfo']->price; ?>" >
                            <input type="hidden" name="transfer_date" value="<?php echo $data['dataInfo']->date_transaksi; ?>" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">BUKTI TRANSFER</label>
                            <p>

                                <img src="../public/images/bukti_pembayaran/<?php echo $exp[3]; ?>" style="width: 300px;" alt="Gambar bukti transfer">
                            </p>
                            <input type="hidden" name="transfer_bukti_pembayaran" value="<?php echo $exp[3]; ?>" >

                        </div>
                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">
                                KONFIRMASI
                            </button>
                        </div>
                    </form>
                <?php } else { ?>
                    DETAILS TRANSAKSI ONLINE BELUM DIPILIH
                <?php } ?>
            </div>
        </div>
    </div>
</div>