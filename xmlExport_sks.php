<?php
$area_id = (isset($_POST['area_id']) ? $_POST['area_id'] : '');
$prog_id = (isset($_POST['prog_id']) ? $_POST['prog_id'] : '');
$functional_area = (isset($_POST['functional_area']) ? $_POST['functional_area'] : '');

$connect=mysqli_connect('localhost','root',null,'bughound');
 
if(mysqli_connect_errno($connect))
{
        echo 'Failed to connect';
}
$query="SELECT * FROM `area`";
mysqli_query($connect,$query);
echo $query;

  $xml     = new DOMDocument('1.0');
  $xml->formatOutput=true;

  $areas     = $xml->createElement("areas"); 
  $xml->appendChild($areas);

  $area    = $xml->createElement("area"); 
  $area->setAttribute("area_id", $area_id);
  $areas->appendChild($area); 

  $prog_id    = $xml->createElement("prog_id"); 
  $area->appendChild($prog_id);

  $functional_area     = $xml->createElement("functional_area"); 
  $area->appendChild($functional_area);




  echo"<xmp>".$xml->saveXML()."</xmp>"; 

?>