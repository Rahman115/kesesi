<div class="row">
    <div class="col-md-8 mb-8">
        <div class="card h-100">
            <div class="card-header">
                PEMBAYARAN ONLINE
            </div>
            <form method="post" role="form" enctype="multipart/form-data">
                <div class="card-body">
                    <p class="card-text">
                    <div class="form-group">
                        <label class="control-label">NAMA LENGKAP</label>
                        <?php echo $data['studend']->name; ?>
                        <input type="hidden" name="transfer_nis_pengguna" value="<?php echo $data['studend']->nis; ?>" >
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