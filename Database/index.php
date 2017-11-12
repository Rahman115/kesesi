<?php 
define('CSV_PATH','C:/xampp/htdocs/kesesi/Database/');

$csv_guru = CSV_PATH . "data_guru_dos.csv";
$csv_jurusan = CSV_PATH . "Jurusan.csv";
$csv_kelas = CSV_PATH . "data_kelas_dos.csv";
$csv_ruang = CSV_PATH . "data_ruang_dos.csv";
$csv_siswa = CSV_PATH . "data_siswa_dos.csv";
$csv_struktur = CSV_PATH . "Struktur.csv";

function bulan($value) {
	
	switch($value) {
		
		case 'Januari':
		$value = 01;
		break;
		case 'Februari':
		$value = 02;
		break;
		case 'Maret':
		$value = 03;
		break;
		case 'April':
		$value = 04;
		break;
		case 'Mei':
		$value = 05;
		break;
		case 'Juni':
		$value = 06;
		break;
		case 'Juli':
		$value = 07;
		break;
		case 'Agustus':
		$value = 8;
		break;
		case 'September':
		$value = 9;
		break;
		
		case 'Oktober':
		$value = 10;
		break;
		case 'November':
		$value = 11;
		break;
		case 'Nopember':
		$value = 11;
		break;
		case 'Desember':
		$value = 12;
		break;
		
	}
	
	
	return $value;
			
}

if (($handle = fopen($csv_siswa, "r")) !== FALSE) {
   fgetcsv($handle);   
   $result = "";
   $i = 0;
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $cols = array();
        for ($c=0; $c < $num; $c++) {
          $cols[$c] = $data[$c];
        }
        $col = explode(";",$cols[0]);
		
		
		/**
		// Data guru dos
		$date = explode(" ", $col[7]);
		$date2 = explode(" ", $col[10]);
		
		$col[7] = $date[2] . "-" . bulan($date[1]) . "-" . $date[0];
		$col[10] = $date2[2] . "-" . bulan($date2[1]) . "-" . $date2[0];
		
		
		
		// var_dump($col[10]);
		
		
		$array[$i] = array($col[0],$col[1],$col[2],$col[3],$col[4],$col[5],$col[6],$col[7],$col[8],$col[9],$col[10],$col[11],$col[12]) ;
		**/
		$ro = $col[0].".".$col[1].".".$col[2].".".$col[4];
		
		// var_dump($col);
		$array[$i] = array($ro,$col[5],$col[6],$col[7],$col[8]) ;
		
		$i++;
	}


fclose($handle);
}

// var_dump($array[0][0]);

for($j = 0; $j < count($array); $j++) {
	$qry = "INSERT INTO `studends`(`id_studend`, `code_room`, `nis`, `name`, `gendre`, `status`) VALUES (";
	
/**
	$qry .= "'" . $array[$j][0] ."','".$array[$j][4] ."','".$array[$j][3] ."','" . $array[$j][1] ."','".$array[$j][2] ."','".$array[$j][6] ."','" . $array[$j][7] ."',";
	$qry .= "'" . $array[$j][11] ."','".$array[$j][8] ."','".$array[$j][9] ."','" . $array[$j][10] ."','".$array[$j][12] ."','".$array[$j][5] ."'";

**/
	$qry .= "'','" . $array[$j][0] ."','".$array[$j][1] ."','".$array[$j][2] ."','" . $array[$j][3] ."','" . $array[$j][4] ."'";
	
	
	$qry .= " ); <br>";
	 
	 echo $qry;
}


?>