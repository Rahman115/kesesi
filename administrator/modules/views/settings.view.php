<div class="row">
    <div class="col-lg-12">
        <h1><?php echo $data["title"]; ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
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
            <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=settings">

        <?php } ?>


        <form method="post" role="form" enctype="multipart/form-data">
            <table class="table-responsive table">

                <tbody>
                    <tr>
                        <td style="width: 200px;"><label>PEMBAYARAN SPP</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <input type="text" name="form_set_spp" <?php if (isset($data["set"])) echo 'value="' . $data["set"]->spp . '"'; ?> class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"><label>PEMBAYARAN PRAKTEK</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <input type="text" name="form_set_praktek" <?php if (isset($data["set"])) echo 'value="' . $data["set"]->praktek . '"'; ?> class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 200px;"><label>PEMBAYARAN SYARIAH</label></td>
                        <td style="width: 1px;">:</td>
                        <td>
                            <input type="text" name="form_set_syariah" <?php if (isset($data["set"])) echo 'value="' . $data["set"]->syariah . '"'; ?> class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-primary">SIMPAN DATA</button>
                            
                    </tr>
                </tbody>

            </table>
        </form>

    </div>
</div>