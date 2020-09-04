<?php
$conn=new mysqli("localhost","root","","bughound");
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$bug=$_GET['data'];
$sql="DELETE FROM bug where `BugID`=$bug";
if($conn->query($sql)===TRUE){
    echo '<script>alert("Record deleted Successfully")</script>';
}
else{
    echo "Error Deleteing record: " . $conn->error;
}
$conn->close();

?>
