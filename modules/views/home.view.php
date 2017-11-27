<div class="col-md-8 mb-8">
    <div class="card h-100">
        <div class="card-body">
            <h2 class="card-title"><?php echo $data['studend']->name; ?></h2>
            <p class="card-text">
				<table class="table">
					<tbody>
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
								if($data['studend']->gendre == 'P') {
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
            <a href="#" class="btn btn-primary">More Info</a>
        </div>
    </div>
</div>

