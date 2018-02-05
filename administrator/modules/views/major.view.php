<div class="row">
    <div class="col-lg-12">
        <h1>Data Jurusan SMK NU Kesesi</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Data Jurusan</li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-6">

        <div class="panel panel-default">
            <div class="panel-heading">Data Jurusan</div>
            <div class="panel-body">
<!--                <div class="">
                    <a class="btn btn-primary" href="<?php echo SITE_URL; ?>?page=major&action=insert">TAMBAH JURUSAN</a>
                </div>-->
                <div class="table-responsive">
                    <form method="POST" role="form">
                        <table class="table table-hover table-striped tablesorter">
                            <thead>
                                <tr>
                                    <th class="header" style="width: 40px;">No</th>
                                    <th  class="header" style="width: 60px;">Code</th>
                                    <th  class="header" style="width: 170px;">Arti</th>
                                    <th class="header" style="width:140px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data["major"] as $jurusan) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $jurusan->code; ?></td>
                                        <td><?php echo $jurusan->stands; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="<?php echo SITE_URL; ?>?page=major&&action=kelas&&id=<?php echo $jurusan->code; ?>">
                                                <span class="glyphicon glyphicon-home"></span>
                                            </a>
                                            <!--<a class="btn btn-danger btn-xs" href="<?php echo SITE_URL; ?>?page=major&&action=select&&id=<?php echo $jurusan->code; ?>" onclick="return confirm('Are you sure Select this data?');">Select</a>-->

                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                ?>
                                <tr>
                                    <td>#</td>
                                    <td><input type="text" class="form_control" placeholder="KODE" name="form_kode"></td>
                                    <td><input type="text" class="form_control" placeholder="ARTI" name="form_arti"></td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-save"></span></button>
                                        <!--<input type="submit" value="Simpan" class="btn btn-xs btn-primary">-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">

        <?php if ($data['access'] == TRUE) { ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo "Data Kelas " . $data['id']; ?></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped tablesorter">
                            <thead>
                                <tr>
                                    <th class="header" style="width: 40px;">No</th>
                                    <th  class="header" style="width: 60px;">Kelas</th>
                                    <th  class="header" style="width: 170px;">Jumlah Siswa</th>
                                    <th  class="header" style="width: 170px;">Jumlah Kelas</th>
                                    <th  class="header" style="width: 170px;">Rombel</th>
                                    <th class="header" style="width:140px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data["selectMajor"] as $selMajor) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $selMajor->class; ?></td>
                                        <td><?php echo $selMajor->sum_students; ?></td>
                                        <td><?php echo $selMajor->sum_rooms; ?></td>
                                        <td><?php echo $selMajor->rombel; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-xs" href="<?php echo SITE_URL; ?>?page=major&&action=kelas&&id=<?php echo $jurusan->code; ?>">Ruang</a>

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
                <?php
            }
            ?>
        </div>
    </div>
