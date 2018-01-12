<?php 

$view = new View($viewName);
$view->bind('data', $data);
$view->forceRender();

?>