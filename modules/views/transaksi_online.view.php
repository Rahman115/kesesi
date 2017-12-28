<div class="row">
    <div class="col-md-8 mb-8">
        <div class="card h-100">
            <div class="card-header">
                PEMBAYARAN ONLINE
            </div>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="card-body">
                    <p class="card-text">
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
                        <meta http-equiv="refresh" content="1;url=<?php echo PATH; ?>?page=home">

                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label">NAMA LENGKAP</label>
                        
                        <input type="text" disabled="" value="<?php echo $data['studend']->name; ?>" class="form-control">
                        <input type="hidden" name="transfer_nis_pengguna" value="<?php echo $data['studend']->nis; ?>" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">JENIS PEMBAYARAN</label>
                        <select name="transfer_status" class="form-control">
                            <option value="LUNAS">SPP</option>
                            <option value="PRAKTEK-GANJIL">PRAKTEK - SEMESTER GANJIL</option>
                            <option value="PRAKTEK-GENAP">PRAKTEK - SEMESTER GENAP</option>
                            <option value="SYARIAH">SYARIAH</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">BANK TRANSFER</label>
                        <select name="transfer_bank" class="form-control">
                            <option value="BRI">BRI</option>
                            <option value="MANDIRI">MANDIRI</option>
                            <option value="BNI">BNI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">NAMA PENGGUNA REKENING</label>
                        <input type="text" class="form-control" name="transfer_nama_pengguna" placeholder="A.n">
                    </div>
                    <div class="form-group">
                        <label class="control-label">NOMOR REKENING</label>
                        <input type="number" class="form-control" name="transfer_nomor_rekening_pengguna" placeholder="9890xxx">
                    </div>
                    <div class="form-group">
                        <label class="control-label">NOMINAL</label>
                        <input type="number" class="form-control" name="transfer_nominal_pengguna" placeholder="100000">
                    </div>
                    <div class="form-group">
                        <label class="control-label">BUKTI TRANSFER</label>
                        <input type="file" class="form-control" name="transfer_bukti_pembayaran">
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">
                            KIRIM
                        </button>
                    </div>

                    </p>
                </div>
            </form>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>