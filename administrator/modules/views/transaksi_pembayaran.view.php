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

            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">Data Pembayaran Syariah
                <div class="close">
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL; ?>?page=transaksi&action=pembayaran&pembayaran=SYARIAH&ID=<?php
                    echo $data['siswa']->nis;
                    ;
                    ?>">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php
                if ($data['syariah'][0]->PRICE == NULL) {
                    echo '<div class="alert alert-info" role="alert">Belum melukan pembayaran syariah</div>';
                } else {
                    echo '<div class="alert alert-info" role="alert">Total pembayaran syariah <b>Rp ' . $data['syariah'][0]->PRICE . '</b> - ' . $data['exp_syariah'][0]->EXP . '</div>';
                }
                ?>
                <div class="table-responsive" >
                    <table class="teble table-hover data-table table-striped tablesorter" >
                        <thead>
                            <tr>
                                <th class="header">No</th>
                                <th class="header">TANGGAL</th>
                                <th class="header">BAYAR</th>
                                <th class="header">STATUS</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data["tr"] as $transaksi) {
                                if ($transaksi->status_transaksi == 'SYARIAH') {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $transaksi->date_transaksi; ?></td>
                                        <td>Rp.<?php echo $transaksi->price; ?></td>
                                        <td><?php echo $transaksi->exp; ?></td>
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
        <div class="panel panel-success">
            <div class="panel-heading">Data Pembayaran Praktek
                <div class="close">
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL; ?>?page=transaksi&action=pembayaran&pembayaran=PRAKTEK&ID=<?php
                    echo $data['siswa']->nis;
                    ;
                    ?>">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php // var_dump($data['tr']);      ?>
                <div class="table-responsive" >
                    <table class="teble table-hover data-table table-striped tablesorter" >
                        <thead>
                            <tr>
                                <th class="header">No</th>
                                <th class="header">TANGGAL</th>
                                <th class="header">BAYAR</th>
                                <th class="header">SEMESTER</th>
                                <th class="header">STATUS</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data["tr"] as $transaksi) {
                                if ($transaksi->status_transaksi == 'PRAKTEK') {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $transaksi->date_transaksi; ?></td>
                                        <td>Rp.<?php echo $transaksi->price; ?></td>
                                        <td><?php
                                            if ($transaksi->jenis_transaksi == 'SEMESTER_GENAP') {
                                                echo "GENAP";
                                            } else {
                                                echo "GANJIL";
                                            }
                                            ?></td>
                                        <td><?php echo $transaksi->exp; ?></td>
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
    </div>
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">TRANSAKSI PEMBAYARAN <?php echo $data['pembayaran']; ?></div>
            <div class="panel-body">
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
                    <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=transaksi&action=pembayaran&ID=<?php echo $data['siswa']->nis; ?>">

                <?php } ?>
                <?php
                if ($data['pembayaran'] == NULL) {
                    echo "Belum ada pembayaran";
                } else if ($data['pembayaran'] == 'SPP') {
                    ?>
                    <form method="POST" role="form">
                        <table class="table table-condensed">
                            <tr>
                                <td style="width: 200px;"><b>NAMA SISWA</b></td>
                                <td style="width: 10px;">:</td>
                                <td ><?php echo $data['siswa']->name; ?>
                                    <input type="hidden" name="transaksi_id" value="<?php echo $data['siswa']->nis; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><b>JENIS PEMBAYARAN</b></td>
                                <td>:</td>
                                <td >
                                    <input type="text" value="<?php echo $data['pembayaran'] ?>" class="form-control" disabled="">
                                    <input type="hidden" value="<?php echo $data['pembayaran'] ?>" name="transaksi_type">
                                    <input type="hidden" value="BULANAN" name="transaksi_jenis">
                                </td>
                            </tr>
                            <tr>
                                <td><b>BAYAR SEJUMLAH (Rp.)</b></td>
                                <td>:</td>
                                <td >
                                    <!--<input type="number" id="input_rupiah" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">-->
                                    <input type="number" id="input_rupiah" onkeyup="convertToRupiah(this);" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><b>BAYAR BULAN</b></td>
                                <td>:</td>
                                <td >
                                    <!--<input type="number" id="input_rupiah" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">-->
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Tanggal Transaksi" name="transaksi_date" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><b>KETERANGAN</b></td>
                                <td>:</td>
                                <td >
                                    <select name="transaksi_explanation" class="form-control">

                                        <option value="LUNAS">LUNAS</option>
                                        <option value="BELUM_LUNAS">BELUM LUNAS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary btn-sm" name="simpan_data">
                                        <span class="glyphicon glyphicon-save"></span> BAYAR
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                } else if ($data['pembayaran'] == 'SYARIAH') {
                    ?>
                    <form method="POST" role="form">
                        <table class="table table-condensed">
                            <tr>
                                <td style="width: 200px;"><b>NAMA SISWA</b></td>
                                <td style="width: 10px;">:</td>
                                <td ><?php echo $data['siswa']->name; ?>
                                    <input type="hidden" name="transaksi_id" value="<?php echo $data['siswa']->nis; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><b>JENIS PEMBAYARAN</b></td>
                                <td>:</td>
                                <td >
                                    <input type="text" value="<?php echo $data['pembayaran'] ?>" class="form-control" disabled="">
                                    <input type="hidden" value="<?php echo $data['pembayaran'] ?>" name="transaksi_type">
                                    <input type="hidden" value="BULANAN" name="transaksi_jenis">
                                </td>
                            </tr>
                            <tr>
                                <td><b>BAYAR SEJUMLAH (Rp.)</b></td>
                                <td>:</td>
                                <td >
                                    <!--<input type="number" id="input_rupiah" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">-->
                                    <input type="number" id="input_rupiah" onkeyup="convertToRupiah(this);" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><b>BAYAR BULAN</b></td>
                                <td>:</td>
                                <td >
                                    <!--<input type="number" id="input_rupiah" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">-->
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Tanggal Transaksi" name="transaksi_date" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><b>TOTAL PEMBAYARAN</b></td>
                                <td>:</td>
                                <td >
                                    <?php
                                    if ($data['syariah'][0]->PRICE == NULL) {
                                        echo '<input disabled="" value="BELUM TRANSAKSI" type="number" class="form-control">';
                                    } else {
                                        echo '<input disabled="" value="' . $data['syariah'][0]->PRICE . '" type="number" class="form-control">';
                                    }
                                    ?>

                                </td>
                            </tr>
                            <tr>
                                <td><b>KETERANGAN</b></td>
                                <td>:</td>
                                <td >
    
                                    <input disabled="" <?php if(isset($data['exp_syariah'][0]->EXP)){ echo 'value="'.$data['exp_syariah'][0]->EXP.'"'; } else { echo 'value="No_Transaksi"';} ?> type="text" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary btn-sm" name="simpan_data">
                                        <span class="glyphicon glyphicon-save"></span> BAYAR
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                } else if ($data['pembayaran'] == 'PRAKTEK') {
                    ?>
                    <form method="POST" role="form">
                        <table class="table table-condensed">
                            <tr>
                                <td style="width: 200px;"><b>NAMA SISWA</b></td>
                                <td style="width: 10px;">:</td>
                                <td ><?php echo $data['siswa']->name; ?>
                                    <input type="hidden" name="transaksi_id" value="<?php echo $data['siswa']->nis; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><b>JENIS PEMBAYARAN</b></td>
                                <td>:</td>
                                <td >
                                    <input type="text" value="<?php echo $data['pembayaran'] ?>" class="form-control" disabled="">
                                    <input type="hidden" value="<?php echo $data['pembayaran'] ?>" name="transaksi_type">

                                </td>
                            </tr>
                            <tr>
                                <td><b>BAYAR SEJUMLAH (Rp.)</b></td>
                                <td>:</td>
                                <td >
                                    <!--<input type="number" id="input_rupiah" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">-->
                                    <input type="number" id="input_rupiah" onkeyup="convertToRupiah(this);" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><b>BAYAR BULAN</b></td>
                                <td>:</td>
                                <td >
                                    <!--<input type="number" id="input_rupiah" placeholder="Bayar Sejumlah" name="transaksi_price" class="form-control">-->
                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="Tanggal Transaksi" name="transaksi_date" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td><b>PEMBAYARAN</b></td>
                                <td>:</td>
                                <td >

                                    <select name="transaksi_jenis" class="form-control">

                                        <option value="SEMESTER_GANJIL">SEMESTER GANJIL</option>
                                        <option value="SEMESTER_GENAP">SEMESTER GENAP</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary btn-sm" name="simpan_data">
                                        <span class="glyphicon glyphicon-save"></span> BAYAR
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
                ?>

            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">Data Pembayaran SPP
                <div class="close">
                    <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL; ?>?page=transaksi&action=pembayaran&pembayaran=SPP&ID=<?php
                    echo $data['siswa']->nis;
                    ;
                    ?>">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php // var_dump($data['tr']);     ?>
                <div class="table-responsive" >
                    <table class="teble table-hover data-table table-striped tablesorter" >
                        <thead>
                            <tr>
                                <th class="header">No</th>
                                <th class="header">TANGGAL</th>
                                <th class="header">BAYAR</th>
                                <th class="header">STATUS</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data["tr"] as $transaksi) {
                                if ($transaksi->status_transaksi == 'SPP') {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $transaksi->date_transaksi; ?></td>
                                        <td>Rp.<?php echo $transaksi->price; ?></td>
                                        <td><?php echo $transaksi->exp; ?></td>
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
    </div>
</div>
