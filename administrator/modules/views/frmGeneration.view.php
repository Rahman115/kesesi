<div class="row">
    <div class="col-lg-12">
        <h1><?php echo $data["title"]; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php echo SITE_URL; ?>?page=generation"><i class="fa fa-users"></i> Angkatan</a></li>
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
            <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=generation">

        <?php } ?>

        <form method="post" role="form" >
            <table class="table-responsive table">

                <tbody>
                <tr>
                    <td style="width: 200px;"><label>Nama Angkatan</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" <?php if(isset($data["generation"])) echo 'value="' . $data["generation"]->name . '"'; ?> name="name" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Arti Angkatan</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="arti" <?php if(isset($data["generation"])) echo 'value="' . $data["generation"]->arti . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Singkatan</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="text" name="resume" <?php if(isset($data["generation"])) echo 'value="' . $data["generation"]->resume . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td><label>Angkatan Tahun</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="number" min="1990" name="year" <?php if(isset($data["generation"])) echo 'value="' . $data["generation"]->year . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td><label>Jumlah</label></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <input type="number" name="total" <?php if(isset($data["generation"])) echo 'value="' . $data["generation"]->total . '"'; ?> class="form-control">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-warning" href="<?php echo PATH; ?>?page=generation">Tampilkan Semua Angkatan</a> </td>
                </tr>
                </tbody>

            </table>
        </form>

    </div>
</div>