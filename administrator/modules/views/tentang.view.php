<div class="row">
    <div class="col-lg-12">
        <h1>Tentang Sekolah</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-building"></i> Tentang Sekolah</li>
        </ol>
    </div>
</div>
<div class="row" >
    <div class="col-lg-12" >
        <?php
        if (isset($data["error"]) && count($data["error"]) > 0) {
            ?>
            <div class="alert alert-danger" role="alert" >
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul class="list-square">
                    <?php
                    foreach ($data["error"] as $error) {
                        echo "<li>" . $error . "</li>";
                    }
                    ?>
                </ul>
            </div>
        <?php } else if (isset($data["success"])) { ?>
            <div class="alert alert-success" >
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $data["success"]; ?>
            </div>
            <meta http-equiv="refresh" content="1; url=<?php echo PATH; ?>?page=tentang">
        <?php } ?>
        <form method="post" role="form" enctype="multipart/form-data">
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        <td>
                            <textarea class="form-control editor" name="isi" rows="8" >
                                <?php echo $data["tentang"]->tentang ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
