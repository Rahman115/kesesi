<div class="row" >
    <div class="col-lg-12" >
        <h1>Jurusan</h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i></a>
            </li>
            <li class="active">
                <i class="fa fa-th-large"></i> Jurusan
            </li>
        </ol>
    </div>
</div>

<div class="row" >
    <div class="col-lg-12">
        <div class="form-group" >
            <a href="<?php echo PATH; ?>?page=jurusan&&action=insert" class="btn btn-primary">+ Tambah data baru</a>
        </div>

        <div class="table-responsive" >
            <table class="teble table-hover data-table table-striped tablesorter" >
                <thead>
                    <tr>
                        <th class="header" style="width: 40px;">No</th>
                        <th class="header">Jurusan</th>
                        <th class="header" style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data["jurusan"] as $jurusan) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $jurusan->nama_jurusan; ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="<?php echo SITE_URL; ?>?page=jurusan&&action=update&&id=<?php echo $jurusan->id_jurusan; ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="<?php echo SITE_URL; ?>?page=jurusan&&action=delete&&id=<?php echo $jurusan->id_jurusan; ?>" onclick="return confirm('Are sure Delete this data?')">Delete</a>
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