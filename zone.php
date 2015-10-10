<?
$dir = 'zones/';
$sdir = array_diff(scandir($dir), array('..', '.'));
natsort($sdir);
$features = array();
foreach($sdir as $file){
   $data = file_get_contents($dir.$file, 0, null, null);
   $json = json_decode($data);
   array_push($features, $json->features[0]);
}

$json->features = $features;
header('Content-Type: application/json');
echo json_encode($json);
?>
