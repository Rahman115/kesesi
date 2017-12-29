<div class="row">
    <div class="col-lg-12">
        <h1><?php echo $data["title"]; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php SITE_URL; ?>?page=teacher"><i class="fa fa-teachers"></i> Guru</a></li>
            <li class="active"><i class="fa fa-pencil"></i> <?php echo $data["title"]; ?></li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php
        if(isset($data["error"]) && count($data["error"]) > 0) {
            ?>
            <div class="alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul class="list-square">
                    <?php
                    foreach($data["error"] as $error) {
                        ?>
                        <li>
                            <?php echo $error; ?>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        <?php

        }else if(isset($data["success"])) {
            ?>

            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $data["success"]; ?>
            </div>
            <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=teacher">

        <?php } ?>


        <form method="post" role="form" enctype="multipart/form-data">
            <table class="table-responsive table">

                <tbody>
                <tr>
                    <td style="width: 200px;"><label>Nama Lengkap</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="form_guru_name" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->name . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>NIP</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="number" name="form_guru_nip" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->nip . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>NUPTK</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="number" name="form_guru_nuptk" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->nuptk . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>JENIS KELAMIN</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        
                        <input type="radio" <?php if(isset($data["teacher"]) && $data["teacher"]->gender == 'L') echo 'checked="checked"'; ?> value="L" name="form_guru_gender"  > LAKI - LAKI 
                        <input type="radio" <?php if(isset($data["teacher"]) && $data["teacher"]->gender == 'P') echo 'checked="checked"'; ?> value="P" name="form_guru_gender"  > PEREMPUAN
                        <!--<input type="text" name="form_guru_gender" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->gender . '"'; ?> class="form-control">-->
                    </td>
                </tr>
                <tr>
                    <td><label>STATUS KEGURUAN</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="form_guru_status_code" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->status_code . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>LULUSAN</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="form_guru_graduate" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->graduate . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>TANGGAL KELULUSAN</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="date" name="form_guru_graduate_date" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->graduate_date . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>POSISI</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="form_guru_position" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->position . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>TEMPAT LAHIR</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="form_guru_place_of_birth" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->place_of_birth . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>TANGGAL LAHIR</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="date" name="form_guru_date_of_birth" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->date_of_birth . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>ALAMAT</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="form_guru_address" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->address . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>status</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="form_guru_status" <?php if(isset($data["teacher"])) echo 'value="' . $data["teacher"]->status . '"'; ?> class="form-control">
                    </td>
                </tr>
                <?php
                if(isset($data["teacher"])) {
                ?>
                <?php

                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-warning" href="<?php echo PATH; ?>?page=teacher">Tampilkan Semua User</a> </td>
                </tr>
                </tbody>

            </table>
        </form>

    </div>
</div>