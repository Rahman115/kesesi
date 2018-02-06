<div class="row">
    <div class="col-md-6 mb-6">
        <div class="card h-100">
            <div class="card-header">
                DATA DIRI KEPALA SEKOLAH
            </div>
            <div class="card-body">
                <p class="card-text">
				 <?php // var_dump ($data['kepsek']); ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>NAMA LENGKAP</td>
                            <td>:</td>
                            <td><?php echo $data['kepsek']->name; ?></td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><?php echo $data['kepsek']->nip; ?></td>
                        </tr>
						<tr>
                            <td>NUPTK</td>
                            <td>:</td>
                            <td><?php echo $data['kepsek']->nuptk; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $data['kepsek']->status; ?></td>
                        </tr>
                    <tbody>
                </table>
                </p>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header">
                LAPORAN KEUANGAN BULAN <?php 
				$s = $data['bln'];
				echo $data['bulan'][$s];?>
            </div>
            <div class="card-body">
                <p class="card-text">
				
                <table class="table table-hover ">
				<form method ="post" role="form">
				<div class="input-group">
				<input value="<?php echo $data['thn']; ?>" class="form-control" name = "tahun" >
					<select class="form-control" name="bulan">
					<?php foreach($data['bulan'] AS $key => $value) {
						if($key == ($data['bln'])){
							echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
						} else {
						echo '<option value="'.$key.'">'.$value.'</option>';	
						}
						
					} ?>
						
					</select>
					<span class="input-group-btn">
					<input type="submit" class="btn btn-prymary" value="PILIH">
					</span>
					</div>
				</form>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>JURUSAN</th>
                            <th>TOTAL PEMASUKKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>X</td>
                            <td class="text-right"><?php 
							if($data['kelasData'][0][0]->JUMLAH == null){
								echo '0';
							} else {
								
							echo "Rp. " . number_format($data['kelasData'][0][0]->JUMLAH, 2, ',', '.');
							} ?></td>
                        </tr>
						<tr>
                            <td>2</td>
                            <td>XI</td>
                            <td class="text-right"><?php 
							if($data['kelasData'][1][0]->JUMLAH == null){
								echo '0';
							} else {
								
							echo "Rp. " . number_format($data['kelasData'][1][0]->JUMLAH, 2, ',', '.');
							} ?></td>
                        </tr>
						<tr>
                            <td>3</td>
                            <td>XII</td>
                            <td class="text-right"><?php 
							if($data['kelasData'][2][0]->JUMLAH == null){
								echo '0';
							} else {
								
							echo "Rp. " . number_format($data['kelasData'][2][0]->JUMLAH, 2, ',', '.');
							} ?></td>
                        </tr>
						<tr>
                            <td>#</td>
                            <td>TOTAL</td>
                            <td class="text-right"><?php 
							$arr = array($data['kelasData'][0][0]->JUMLAH, $data['kelasData'][1][0]->JUMLAH, $data['kelasData'][2][0]->JUMLAH);
							echo "Rp." . number_format(array_sum($arr), 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
				
                </p>
            </div>
			<!--
            <div class="card-footer">
                <a href="?page=home&action=detail_pembayaran&token=<?php echo md5($data['kepsek']->nis); ?>" class="btn btn-danger">DETAIL PEMBAYARAN</a>
                <a href="?page=home&action=bayar_online&token=<?php echo md5($data['kepsek']->nis); ?>" class="btn btn-primary">BAYAR ONLINE</a>
            </div>
			-->
        </div>
    </div>
</div>

