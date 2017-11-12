<div class="row">
    <div class="col-lg-12">
        <h1>Angkatan Argajaladri</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Angkatan</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <a href="<?php echo PATH; ?>?page=generation&&action=insert" class="btn btn-primary">+ Tambah Data Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover data-table table-striped tablesorter">
                <thead>
                    <tr>
                        <th class="header" style="width: 40px;">No</th>
                        <th style="width: 160px;">Angkatan</th>
                        <th style="width: 360px;">Arti Nama Angkatan</th>
                        <th>Singkatan</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                        <th class="header" style="width:150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data["generation"] as $generation) {
                        ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><b><?php echo $generation->name; ?></b></td>
                        <td><?php echo $generation->arti; ?></td>
                        <td><?php echo $generation->resume; ?></td>
                        <td><?php echo $generation->year; ?></td>
                        <td><?php echo $generation->total; ?></td>
                        <td>
                            <a class="btn btn-danger btn-sm" href="<?php echo SITE_URL; ?>?page=generation&&action=delete&&id=<?php echo $generation->id; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
                            <a class="btn btn-warning btn-sm" href="<?php echo SITE_URL; ?>?page=generation&&action=update&&id=<?php echo $generation->id; ?>">Edit </a>
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