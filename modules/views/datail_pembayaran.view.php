<div class="row">
    <div class="col-md-8 mb-8">
        <div class="card h-100">
            <div class="card-header">
                DETAIL PEMBAYARAN SISWA
            </div>
            <div class="card-body">
                <p class="card-text"></p>
                <?php
// var_dump($data['harga']['syariah']->PRICE);
// var_dump($data['set']->praktek);
                ?>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>NAMA SISWA</td>
                            <td>:</td>
                            <td><?php echo $data['dataSiswa']->name; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TRANSAKSI</th>
                            <th>BIAYA</th>

                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- $data['harga']['syariah']->PRICE -->


                        <tr>
                            <td>1</td>
                            <td>SYARIAH</td>
                            <td><?php
                                if ($data['harga']['syariah']->PRICE == null || empty($data['harga']['syariah']->PRICE) || $data['harga']['syariah']->PRICE == '') {
                                    echo "Belum membayar";
                                } else {
                                    echo number_format($data['harga']['syariah']->PRICE, 0, ",", ".");
                                }
                                ?></td>
                            <td><?php
//                                var_dump($data['set']->syariah);
                                if (!empty($data['harga']['syariah']->PRICE) || $data['harga']['syariah']->PRICE == $data['set']->syariah) {
                                    echo "LUNAS";
                                } else if(empty($data['harga']['syariah']->PRICE)){
                                    echo "BELUM LUNAS - (" . number_format($data['set']->syariah, 0, ",", "."). ")";
                                } else {
                                    echo "BELUM LUNAS - (" . number_format($data['set']->syariah - $data['harga']['syariah']->PRICE, 0, ",", ".") . ")";
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PRAKTEK SEMESTER GANJIL</td>
                            <td><?php
                                if ($data['harga']['sGanjil']->PRICE == null || empty($data['harga']['sGanjil']->PRICE) || $data['harga']['sGanjil']->PRICE == '') {
                                    echo "Belum membayar";
                                } else {
                                    echo number_format($data['harga']['sGenap']->PRICE, 0, ",", ".");
                                }
                                ?></td>
                            <td><?php
                                    if ($data['harga']['sGanjil']->PRICE == $data['set']->praktek) {
                                        echo "LUNAS";
                                    } else {

                                        $hasil = $data['set']->praktek - $data['harga']['sGanjil']->PRICE;
                                        echo "BELUM LUNAS - (" . number_format($hasil, 0, ",", ".") . ")";
                                    }
                                
                                ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>PRAKTEK SEMESTER GENAP</td>
                            <td><?php
                                if ($data['harga']['sGenap']->PRICE == null || empty($data['harga']['sGenap']->PRICE) || $data['harga']['sGenap']->PRICE == '') {
                                    echo "Belum membayar";
                                } else {
                                    echo number_format($data['harga']['sGenap']->PRICE, 0, ",", ".");
                                }
                                ?></td>
                            <td><?php
                                if ($data['harga']['sGenap']->PRICE == $data['set']->praktek) {
                                    echo "LUNAS";
                                } else {
                                    $hasil = $data['set']->praktek - $data['harga']['sGenap']->PRICE;
                                    echo "BELUM LUNAS - (" . number_format($hasil, 0, ",", ".") . ")";
                                }
                                ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>SPP</td>
                            <td><?php
                                if ($data['harga']['spp']->PRICE == null || empty($data['harga']['spp']->PRICE) || $data['harga']['spp']->PRICE == '') {
                                    echo "Belum membayar";
                                } else {
                                    echo number_format($data['harga']['spp']->PRICE, 0, ",", ".");
                                }
                                ?></td>
                            <td><?php
                                if ($data['harga']['spp']->PRICE == $data['set']->spp) {
                                    echo "LUNAS";
                                } else {
                                    $hasil = $data['set']->spp - $data['harga']['spp']->PRICE;
                                    echo "BELUM LUNAS - (" . number_format($hasil, 0, ",", ".") . ")";
                                }
                                ?></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TRANSAKSI</th>
                            <th>BIAYA</th>
                            <th>TANGGAL TRANSAKSI</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data['siswa'] AS $key => $value) {
                            ?>
                            <tr>
                                <td><?php
                                    echo $no;
                                    $no++;
                                    ?></td>
                                <td><?php echo $value->status_transaksi; ?></td>

                                <td><?php echo $value->price; ?></td>
                                <td><?php echo $value->date_transaksi; ?></td>
                                <td><?php 
                                $v = explode('-', $value->exp);
                                if(count($v) > 1) {
                                echo $v[0];    
                                } else {
                                    echo "Menunggu Confirmasi";
                                }
//                                var_dump(count($v));
                                 ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <a href="<?php echo SITE_URL; ?>" class="btn btn-primary ">KEMBALI</a>

            </div>
        </div>
    </div>
</div>