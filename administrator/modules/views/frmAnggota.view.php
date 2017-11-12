<div class="row">
    <div class="col-lg-12">
        <h1><?php echo $data["title"]; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php echo SITE_URL; ?>?page=anggota"><i class="fa fa-users"></i> Anggota</a></li>
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
            <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=anggota">

        <?php } ?>

        <form method="post" role="form" enctype="multipart/form-data">
            <table class="table-responsive table">

                <tbody>
                <tr>
                    <td style="width: 200px;"><label>No. Anggota</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->no_induk . '"'; ?> name="no_induk" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Nama Lengkap</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="nama" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->nama . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Angkatan</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="angkatan" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->angkatan . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td><label>Tanggal Lahir</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="tgl_lahir" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->tgl_lahir . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Jenip Kelamin</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <select name="kelamin" class="form-control">
                            <option value="Laki-laki" <?php if(isset($data["anggota"])) if($data["anggota"]->kelamin == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                            <option value="Perempuan" <?php if(isset($data["anggota"])) if($data["anggota"]->kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Golongan Darah</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="darah" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->darah . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Nomor HP</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="hp" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->hp . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Alamat Email</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="email" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->email . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Nama Lapangan</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="lapangan" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->lapangan . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Alamat</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <textarea name="alamat" class="form-control" rows="5"><?php if(isset($data["anggota"])) echo $data["anggota"]->alamat; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label>Pekerjaan</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="pekerjaan" <?php if(isset($data["anggota"])) echo 'value="' . $data["anggota"]->pekerjaan . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Foto</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="file" name="photo" class="form-control">
                        <?php
                            if(isset($data["anggota"])) {
                                if($data["anggota"]->photo){
                                ?>
                                <img src="../public/images/anggota/<?php echo $data["anggota"]->photo; ?>" alt="images" style="width:100%; max-width: 200px;">
                            <?php
                                }
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-warning" href="<?php echo PATH; ?>?page=anggota">Tampilkan Semua Anggota</a> </td>
                </tr>
                </tbody>

            </table>
        </form>

    </div>
</div>