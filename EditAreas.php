<html>
<body>
<?php
if(isset($_GET["data"]))
{
    $area_id=$_GET["data"];
    $program_id=$_GET["data2"];
}
?>
<form action="" method="post">

<table align="center" width=40% width="100%" cellspacing="2" cellpadding="2" border="5">
            <tr>
                <td colspan="2" align="center"><b>Edit Area with ID <?php echo $area_id; ?></b></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Area Name</td>
                <td width="57%"><input type="text" value="" name="name" size="24"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="  Submit" name="B4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
            </tr>
</table>
</form>
<?php


if(isset($_POST['B4'])){

$name = (isset($_POST['name']) ? $_POST['name'] : '');


$connect=mysqli_connect('localhost','root',null,'bughound');
 
if(mysqli_connect_errno($connect))
{
        echo 'Failed to connect';
}
$query="UPDATE `area` SET `functional_area`='$name' WHERE `area_id`='$area_id'";
mysqli_query($connect,$query);

$conn=new mysqli("localhost","root","","bughound");
       if($conn->connect_error)
       { 
        die("connection failed:" . $conn->connect_error);
       }
       $sql="SELECT * FROM area WHERE area_id=$area_id";
       $results=$conn->query($sql);

       if(!$results){
        echo "0 results";
        }
        else{
        echo "<table border=1 ><th>Area ID</th><th>Program ID</th><th>Area name</th>\n";
        $none=0;
        while($row=mysqli_fetch_row($results)) {
                $none=1;
                printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>\n",$row[0],$row[1],$row[2]);
            }
            if($none==0)
            Echo "<h3>No matching records found.</h3>\n";
    }
}
?>
</body>
</html>