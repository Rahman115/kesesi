<div class="row">
    <div class="col-lg-12">
        <h1>Detail Anggota</h1>
        <ol class="breadcrumb">
            <li><a href="<?php SITE_URL; ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li class="active"><i class="fa fa-users"></i> Detail Anggota</li>
        </ol>

    </div>
</div>
<div class="row">
    <div class="col-lg-12">

        <table class="table-responsive table">

            <tbody>
            <tr>
                <td style="width: 200px;"><b>Nomor Anggota</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->no_induk; ?>
                </td>
            </tr>
            <tr>
                <td><b>Nama Lengkap</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->nama; ?>
                </td>
            </tr>
            
            <tr>
                <td><b>Nama Lapangan</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->lapangan; ?>
                </td>
            </tr>
            <tr>
                <td><b>Tanggal Lahir</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->tgl_lahir; ?>
                </td>
            </tr>
            
            <tr>
                <td><b>Nomor HP</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->hp; ?>
                </td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->email; ?>
                </td>
            </tr>
            
            <tr>
                <td><b>Jenis Kelamin</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->kelamin; ?>
                </td>
            </tr>
            
            <tr>
                <td><b>Golongan Darah</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->darah; ?>
                </td>
            </tr>
            <tr>
                <td><b>Alamat</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->alamat; ?>
                </td>
            </tr>
            <tr>
                <td><b>Pekerjaan</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->pekerjaan; ?>
                </td>
            </tr>
            <tr>
                <td><b>Agama</b></td>
                <td style="width: 1px;">:</td>
                <td>
                    <?php echo $data["anggota"]->agama; ?>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td></td>
                <td>
                    <a class="btn btn-primary" href="<?php echo SITE_URL; ?>?page=anggota">Daftar Anggota</a>
                    <a class="btn btn-warning" href="<?php echo SITE_URL; ?>?page=anggota&&action=update&&id=<?php echo $data["anggota"]->id_anggota; ?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo SITE_URL; ?>?page=anggota&&action=delete&&id=<?php echo $data["anggota"]->id_anggota; ?>" onclick="return confirm('Are you sure delete this data?');">Delete</a>
                </td>
            </tr>
            </tbody>

        </table>

    </div>
</div>