<div class="row">
    <div class="col-lg-12">
        <h2>Data Siswa SMK NU Kesesi</h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Data Siswa</li>
        </ol>

    </div>
</div>
<div class="row">

    <div class="col-lg-12">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="<?php echo SITE_URL; ?>?page=studends">DATA SISWA</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=studends&action=kelas&kelas=X">DATA KELAS X</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=studends&action=kelas&kelas=XI">DATA KELAS XI</a></li>
            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=studends&action=kelas&kelas=XII">DATA KELAS XII</a></li>
<!--            <li role="presentation"><a href="<?php echo SITE_URL; ?>?page=laporan&&action=laporan_bulanan">Bulanan</a></li>-->
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <!--<a href="<?php echo PATH; ?>?page=teacher&&action=insert" class="btn btn-primary">+ Tambah Data Baru</a>-->
        </div>

        <div class="table-responsive">
            <table class="table table-hover data-table table-striped tablesorter">
                <thead>
                    <tr>
                        <th class="header" style="width: 40px;">No</th>
                        <th>Code RooM</th>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th style="width: 88px;">Jenis Kelamin</th>
                        <th>Status</th>
                        <!--<th class="header" style="width:150px;">Action</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data["studends"] as $siswa) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $siswa->code_room; ?></td>
                            <td><?php echo $siswa->nis; ?></td>
                            <td><b><a href="<?php echo SITE_URL; ?>?page=studends&&action=detail&&id=<?php echo $siswa->id_studend; ?>"><?php echo $siswa->name; ?></a></b></td>
                            <td><?php echo $siswa->gendre; ?></td>
                            <td><?php echo $siswa->status; ?></td>
    <!--                            <td>
                                <a class="btn btn-danger btn-xs" href="<?php echo SITE_URL; ?>?page=anggota&&action=delete&&id=<?php echo $siswa->id_studend; ?>" onclick="return confirm('Are you sure delete this data?');">
                                    <span class="glyphicon glyphicon-refresh"> </span>
                                </a>
                            </td>-->
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
