<?php
$page = (isset($_GET['page']) && $_GET['page']) ? $_GET['page'] : '';

// this configuration path for website
//define('PATH', 'http://192.168.113.52/kesesi/'); // isi path dari website anda
define('PATH', 'https://rahman115.github.io/kesesi/'); // isi path dari website anda
define('SITE_URL', PATH . 'index.php');
define('POSITION_URL', PATH . '?page=' . $page);

// this configuration for database website
define('DB_HOST', 'localhost'); // host yang di gunakan
define('DB_USERNAME', 'root'); // username host
define('DB_PASSWORD', ''); // password host
define('DB_NAME', 'db_smk_nu_kesesi'); // database yang di gunakan
// define('DB_NAME', 'kesesi'); // database yang di gunakan
?>
