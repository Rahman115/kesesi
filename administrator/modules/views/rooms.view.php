<div class="row">
    <div class="col-lg-12">
        <h1>Data Ruangan Kelas SMK NU Kesesi</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Data Ruang Kelas</li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="table-responsive">
            <table class="table table-hover data-table table-striped tablesorter">
                <thead>
                    <tr>
                        <th class="header" style="width: 40px;">No</th>
                        <th>Code Room</th>
                        <th>Jumlah Laki-Laki</th>
                        <th>Jumlas Perempuan</th>
                        <th>Jumlah Siswa</th>
                        <th>NIP</th>
                        <th>Wali Kelas</th>
                        <!--<th class="header" style="width:150px;">Action</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data["rooms"] as $ruang) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $ruang->room; ?></td>
                            <td><?php echo $ruang->sum_l; ?></td>
                            <td><?php echo $ruang->sum_p; ?></td>
                            <td><?php echo $ruang->sum_all; ?></td>
                            <td><?php echo $ruang->teacher_code; ?></td>
                            <td><?php echo $ruang->name; ?></td>
                            <!--<td>-->
                                <!--<a class="btn btn-danger btn-sm" href="<?php echo SITE_URL; ?>?page=anggota&&action=delete&&id=<?php echo $ruang->id_teacher; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>-->
                            <!--</td>-->
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
