<div class="row">
    <div class="col-lg-12">
        <h1><?php echo $data["title"]; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php SITE_URL; ?>?page=studends"><i class="fa fa-studendss"></i> Siswa</a></li>
            <li class="active"><i class="fa fa-pencil"></i> <?php echo $data["title"]; ?></li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php
        if (isset($data["error"]) && count($data["error"]) > 0) {
            ?>
            <div class="alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul class="list-square">
                    <?php
                    foreach ($data["error"] as $error) {
                        ?>
                        <li>
                            <?php echo $error; ?>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <?php
        } else if (isset($data["success"])) {
            ?>

            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $data["success"]; ?>
            </div>
            <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=studends">

        <?php } ?>


        <form method="post" role="form" enctype="multipart/form-data">
            <table class="table-responsive table">

                <tbody>
                    <tr>
                        <td style="width: 200px;"><label>Nama Lengkap</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <input type="text" name="form_siswa_name" <?php if (isset($data["studends"])) echo 'value="' . $data["studends"]->name . '"'; ?> class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><label>NIS</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <input type="number" name="form_siswa_nis" <?php if (isset($data["studends"])) echo 'value="' . $data["studends"]->nis . '"'; ?> class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><label>JENIS KELAMIN</label></td>
                        <td style="width: 1px;">:</td>
                        <td>

                            <input type="radio" <?php if (isset($data["studends"]) && $data["studends"]->gendre == 'L') echo 'checked="checked"'; ?> value="L" name="form_siswa_gendre"  > LAKI - LAKI 
                            <input type="radio" <?php if (isset($data["studends"]) && $data["studends"]->gendre == 'P') echo 'checked="checked"'; ?> value="P" name="form_siswa_gendre"  > PEREMPUAN
                            <!--<input type="text" name="form_siswa_gendre" <?php if (isset($data["studends"])) echo 'value="' . $data["studends"]->gendre . '"'; ?> class="form-control">-->
                        </td>
                    </tr>
                    <?php
                    $exp = explode('.', $data["studends"]->code_room);
                    ?>
                    <tr>
                        <td><label>KELAS</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[0] == 'X') echo 'checked="checked"'; ?> value="X" name="form_siswa_code_room[0]"  > X 
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[0] == 'XI') echo 'checked="checked"'; ?> value="XI" name="form_siswa_code_room[0]"  > XI
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[0] == 'XII') echo 'checked="checked"'; ?> value="XII" name="form_siswa_code_room[0]"  > XII


                        </td>
                    </tr>
                    <tr>
                        <td><label>JURUSAN</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[1] == 'AKT') echo 'checked="checked"'; ?> value="AKT" name="form_siswa_code_room[1]"  > AKT 
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[1] == 'TSM') echo 'checked="checked"'; ?> value="TSM" name="form_siswa_code_room[1]"  > TSM
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[1] == 'TKR') echo 'checked="checked"'; ?> value="TKR" name="form_siswa_code_room[1]"  > TKR
                        </td>
                    </tr>
                    <tr>
                        <td><label>RUANGAN</label></td>
                        <td style="width: 1px;">:</td>
                        <td>

                            <input type="radio" <?php if (isset($data["studends"]) && $exp[2] == '1') echo 'checked="checked"'; ?> value="1" name="form_siswa_code_room[2]"  > 1 
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[2] == '2') echo 'checked="checked"'; ?> value="2" name="form_siswa_code_room[2]"  > 2 
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[2] == '3') echo 'checked="checked"'; ?> value="3" name="form_siswa_code_room[2]"  > 3
                            <input type="radio" <?php if (isset($data["studends"]) && $exp[2] == '4') echo 'checked="checked"'; ?> value="4" name="form_siswa_code_room[2]"  > 4

                        </td>
                    </tr>
                    <tr>
                        <td><label>WALI KELAS</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <select name="form_siswa_code_room[3]" class="form-control">
                                <?php
                                foreach ($data['guru'] AS $val) {
                                    if (isset($data["studends"]) && $exp[3] == $val->nip) {
                                        echo '<option value="' . $val->nip . '" selected="selected">' . $val->name . '</option>';
                                    } else {
                                        echo '<option value="' . $val->nip . '" >' . $val->name . '</option>';
                                    }
                                }
                                ?>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td><label>STATUS</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <input type="text" name="form_siswa_status" <?php if (isset($data["studends"])) echo 'value="' . $data["studends"]->status . '"'; ?> class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-primary">SIMPAN DATA</button>
                            <a class="btn btn-warning" href="<?php echo PATH; ?>?page=studends">DATA SISWA</a> </td>
                    </tr>
                </tbody>

            </table>
        </form>

    </div>
</div>