<div class="row">
    <div class="col-lg-12">
        <h1>Data Kelas SMK NU Kesesi</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Data Kelas</li>
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
                        <th>Code Class</th>
                        <th>Jurusan</th>
                        <th>Jumlas Siswa</th>
                        <th>Jumlah Ruangan</th>
                        <th>Rombel</th>
                        <th class="header" style="width:150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data["class"] as $kelas) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $kelas->class; ?></td>
                            <td><?php echo $kelas->major_code; ?></td>
                            <td><?php echo $kelas->sum_students; ?></td>
                            <td><?php echo $kelas->sum_rooms; ?></td>
                            <td><?php echo $kelas->rombel; ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="<?php echo SITE_URL; ?>?page=anggota&&action=delete&&id=<?php echo $kelas->id_teacher; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
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
