<div class="row">
    <div class="col-lg-12">
        <h1>Anggota Argajaladri</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Anggota</li>
        </ol>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
            <div class="form-group">
                <a href="<?php echo PATH; ?>?page=anggota&&action=insert" class="btn btn-primary">+ Tambah Data Baru</a>
            </div>

        <div class="table-responsive">
            <table class="table table-hover data-table table-striped tablesorter">
                <thead>
                    <tr>
                        <th class="header" style="width: 40px;">No</th>
                        <th>No. Anggota</th>
                        <th>Nama Lengkap</th>
                        <th>Angkatan</th>
                        <th>No. Telp</th>
                        <th style="width: 88px;">Jenis Kelamin</th>
                        <th class="header" style="width:150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data["anggota"] as $anggota) {
                        ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $anggota->no_induk; ?></td>
                        <td><b><a href="<?php echo SITE_URL; ?>?page=anggota&&action=detail&&id=<?php echo $anggota->id_anggota; ?>"><?php echo $anggota->nama; ?></a></b></td>
                        <td><?php echo $anggota->angkatan; ?></td>
                        <td><?php echo $anggota->hp; ?></td>
                        <td><?php echo $anggota->kelamin; ?></td>
                        <td>
                            <a class="btn btn-danger btn-sm" href="<?php echo SITE_URL; ?>?page=anggota&&action=delete&&id=<?php echo $anggota->id_anggota; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
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