<div class="row">
    <div class="col-md-8 mb-8">
        <div class="card h-100">
            <div class="card-header">
                DATA DIRI SISWA
            </div>
            <div class="card-body">
                <p class="card-text">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>NAMA LENGKAP</td>
                            <td>:</td>
                            <td><?php echo $data['studend']->name; ?></td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><?php echo $data['studend']->nis; ?></td>
                        </tr>
                        <tr>
                            <td>Wali kelas</td>
                            <td>:</td>
                            <td><?php echo $data['code']['teacher']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?php echo $data['code']['class']; ?></td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td><?php echo $data['code']['major']; ?></td>
                        </tr>
                        <tr>
                            <td>Ruang</td>
                            <td>:</td>
                            <td><?php echo $data['code']['room']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?php
                                if ($data['studend']->gendre == 'P') {
                                    echo "Perempuan";
                                } else {
                                    echo "Laki-Laki";
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $data['studend']->status; ?></td>
                        </tr>
                    <tbody>
                </table>
                </p>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-header">
                INFO SPP
            </div>
            <div class="card-body">
                <p class="card-text">
                <p>Pembayaran Online dapat dikirim pada bank sebagai berikut : </p>
                <h3>BANK BRI </h3>
                No. Rek. : <b>29875869xxxx</b><br>
                A.n SMK NU Kesesi<br>
                <h3>BANK BNI </h3>
                No. Rek. : <b>29875869xxxx</b><br>
                A.n SMK NU Kesesi<br>
                <h3>BANK MANDIRI </h3>
                No. Rek. : <b>29875869xxxx</b><br>
                A.n SMK NU Kesesi<br>
                </p>
            </div>
            <div class="card-footer">
                <a href="?page=home&action=detail_pembayaran&token=<?php echo md5($data['studend']->nis); ?>" class="btn btn-danger">DETAIL PEMBAYARAN</a>
                <a href="?page=home&action=bayar_online&token=<?php echo md5($data['studend']->nis); ?>" class="btn btn-primary">BAYAR ONLINE</a>
            </div>
        </div>
    </div>
</div>

