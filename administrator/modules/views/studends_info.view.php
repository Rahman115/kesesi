<div class="row">
    <div class="col-lg-12">
        <h1>Detail Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="<?php SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Detail Siswa</li>
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
                        <?php echo $data["studends"]->name; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>KODE RUANGAN</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["studends"]->code_room; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>NIS</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["studends"]->nis; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>JENIS KELAMIN</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["studends"]->gendre; ?>
                    </td>
                </tr>
                <tr>
                    <td><b>STATUS</b></td>
                    <td style="width: 1px;">:</td>
                    <td>
                        <?php echo $data["studends"]->status; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <a class="btn btn-primary" href="<?php echo SITE_URL; ?>?page=studends">KEMBALI DATA SISWA</a>
                        <a class="btn btn-warning" href="<?php echo SITE_URL; ?>?page=studends&&action=update&&id=<?php echo $data["studends"]->id_studend; ?>">UBAH DATA SISWA</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>