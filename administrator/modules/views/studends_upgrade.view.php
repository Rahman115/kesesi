<div class="row">
    <div class="col-lg-12">
        <h2><?php echo $data['title']; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php echo SITE_URL; ?>?page=studends"><i class="fa fa-users"></i> Data Siswa</a></li>
            <li class="active"><i class="fa fa-users"></i> <?php echo $data['title']; ?></li>
        </ol>

    </div>
</div>
<div class="row">
    <form method="POST" role="form">
        <div class="col-lg-5">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Pengaturan Kenaikan Kelas
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputWaliKelas">WALI KELAS</label>
                        <select class="form-control" name="formWaliKelas">
                            <?php
                            foreach ($data['guru'] AS $guru) {
                                if ($guru->nip == $data['guruWhere']->nip) {
                                    ?>
                                    <option selected="selected" value="<?php echo $guru->nip; ?>"><?php echo $guru->name; ?></option>
                                <?php } else {
                                    ?>
                                    <option value="<?php echo $guru->nip; ?>"><?php echo $guru->name; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">KELAS</label>
                        <input type="hidden" value="<?php echo $data['arrKelas']['upKelas']; ?>" name="form_kelas_baru">
                        <input type="hidden" value="<?php echo $data['arrKelas']['defaultKelas']; ?>" name="form_major_baru">
                        <span class="form-control">DARI KELAS <b><?php echo $data['arrKelas']['downKelas'].'.'.$data['arrKelas']['defaultKelas']; ?></b> <?php
                            if ($data['arrKelas']['upKelas'] != 'LULUS')
                                echo 'NAIK KELAS ';
                            else
                                echo '->';
                            ?> <b><?php echo $data['arrKelas']['upKelas'].'.'.$data['arrKelas']['defaultKelas']; ?></b></span>
                    </div>

                    <button type="submit" class="btn btn-primary">NAIK KELAS</button>
                    <a class="btn btn-danger" href="<?php echo SITE_URL; ?>?page=studends&action=major&major=<?php echo $data['arrKelas']['downKelas'].'.'.$data['arrKelas']['defaultKelas']; ?>">KEMBALI</a>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Pengaturan Siswa
                </div>
                <div class="panel-body">
                    <table class="table table-active">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIS</th>
                                <th>NAMA LENGKAP</th>
                                <th>L/P</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 0;
                            foreach ($data['siswa'] AS $s) {
                                ?>
                                <tr>

                                    <td><input type="checkbox" name="formSiswaCheck[<?php echo $n; $n++; ?>]" checked="checked" value="<?php echo $s->nis; ?>"></td>
                                    <td><?php echo $s->nis; ?></td>
                                    <td><?php echo $s->name; ?></td>
                                    <td><?php echo $s->gendre; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<script language="JavaScript">
    function toggle(source) {
        checkboxes = document.getElementsByName('formSiswaCheck');
        for (var checkbox in checkboxes)
            checkbox.checked = source.checked;
    }
</script>