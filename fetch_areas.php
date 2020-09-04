<?php
$connect=mysqli_connect("localhost","root","","bughound");
$output='';
$sql="SELECT * FROM area where prog_id='".$_POST["programId"]."'";
$result=mysqli_query($connect,$sql);
$rowCount=mysqli_num_rows($result);
if($rowCount>0){
    $output.='<option value="">Select Areas</option>';
while($row=mysqli_fetch_array($result)){
    $output.='<option value="'.$row["area_id"].'">'.$row["functional_area"].'</option>';

}
echo $output;
}
else{
    echo '<option value="">area not available</option>';
}
?>