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
        <table class="table table-condensed">
            <form method="post" role="form" >
            <tr>
                <td>
                    Kelas
                </td>
                <td>
                    Jurusan
                </td>
                <td>
                    Ruang
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <select name="kelas" class="form-control">
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </td>
                <td>
                    <select name="jurusan" class="form-control">
                        <option value="AKT">Akutansi</option>
                        <option value="TSM">Teknik Sepeda Motor</option>
                        <option value="TKR">Teknik Kendaraan Ringan</option>
                    </select>

                </td>
                <td>
                    <select name="ruang" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                </td>
                <td>
                    <button class="btn btn-danger btn-group-justified" type="submit" >Cari</button>
                </td>
            </tr>
</form>
        </table>

    </div>
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
                        <th class="header">L/P</th>
                        <th class="header">STATUS PEMBAYARAN</th>
                        <th class="header" style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data["transaksi"] as $transaksi) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $transaksi->code_room; ?></td>
                            <td><?php echo $transaksi->nis; ?></td>
                            <td><?php echo $transaksi->name; ?></td>
                            <td><?php echo $transaksi->gendre; ?></td>
                            <td><?php
                                if ($transaksi->status_transaksi == NULL) {
                                    echo "Belum Transaksi";
                                } else {
                                    echo $transaksi->status_transaksi;
                                }
                                ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="<?php echo SITE_URL; ?>?page=transaksi&&action=update&&id=<?php echo $transaksi->id_transaksi; ?>">Bayar</a>
                                <a class="btn btn-danger btn-sm" href="<?php echo SITE_URL; ?>?page=transaksi&&action=delete&&id=<?php echo $transaksi->id_transaksi; ?>" onclick="return confirm('Are sure Delete this data?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>