<?php
$fileName = $_GET['requested'];
echo '<script type="text/javascript">alert("' . base_url() . '")</script>';
fetchImage();
function fetchImage(){
$imagesDir = $_SERVER['DOCUMENT_ROOT'].'run/application/uploads/'.$fileName;
//$content = file_get_contents($imagesDir.$_GET['requested']);
$content = base64_encode($imagesDir);

$data = "data:image/png;base64,{$content}";

header('Content-Type: image/png');
echo base64_decode($data);
}
?>