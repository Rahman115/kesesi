<div class="row">
    <div class="col-lg-12">
        <h1>Data Guru SMK NU Kesesi</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Data Guru</li>
        </ol>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <a href="<?php echo PATH; ?>?page=teacher&&action=insert" class="btn btn-primary">+ Tambah Data Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover data-table table-striped tablesorter">
                <thead>
                    <tr>
                        <th class="header" style="width: 40px;">No</th>
                        <th>NIP / NIS</th>
                        <th>Nama Lengkap</th>
                        <th style="width: 88px;">Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th class="header" style="width:150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data["teacher"] as $guru) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $guru->nip; ?></td>
                            <td><b><a href="<?php echo SITE_URL; ?>?page=anggota&&action=detail&&id=<?php echo $guru->id_teacher; ?>"><?php echo $guru->name; ?></a></b></td>
                            <td><?php echo $guru->gender; ?></td>
                            <td><?php echo $guru->position; ?></td>
                            <td><?php echo $guru->status; ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="<?php echo SITE_URL; ?>?page=anggota&&action=delete&&id=<?php echo $guru->id_teacher; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
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
