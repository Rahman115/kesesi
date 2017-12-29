<div class="row">
    <div class="col-lg-12">
        <h1>Detail Guru</h1>
        <ol class="breadcrumb">
            <li><a href="<?php SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Detail User</li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <table class="table-responsive table">

            <tbody>
                <tr>
                    <td style="width: 200px;"><b>Nama Lengkap</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->name; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>NIP</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->nip; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>NUPTK</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->nuptk; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>JENIS KELAMIN</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->gender; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>STATUS GURU</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->status_code; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>TANGGAL LULUS</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->graduate_date; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>LULUSAN</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->graduate; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>JABATAN</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->position; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>TEPAT / TANGGAL LAHIR</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->place_of_birth . " / " . $data["teacher"]->date_of_birth; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>ALAMAT</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["teacher"]->address; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <a class="btn btn-primary" href="<?php echo SITE_URL; ?>?page=teacher">KEMBALI DATA GURU</a>
                        <a class="btn btn-warning" href="<?php echo SITE_URL; ?>?page=teacher&&action=update&&id=<?php echo $data["teacher"]->id_teacher; ?>">UBAH DATA GURU</a>
                    </td>
                </tr>
            </tbody>

        </table>

    </div>
</div>