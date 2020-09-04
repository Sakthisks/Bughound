<?php


if(isset($_POST['B4'])){
    if(isset($_POST['program_name'])){
        $program_name=$_POST['program_name'];
    }
    if(isset($_POST['program_release'])){
         $program_release=$_POST['program_release'];
    }
    if(isset($_POST['program_version'])){
        $program_version=$_POST['program_version'];
    }   
    if(isset($_GET["data"])){
        $prog_id=$_GET["data"];
    }

    $connect=mysqli_connect('localhost','root',"",'bughound');
    if(mysqli_connect_errno($connect))
    {   
            echo 'Failed to connect';
    }

    $query="UPDATE `program` SET `program_name`='$program_name',`program_release`='$program_release',`program_version`='$program_version' WHERE `prog_id`='$prog_id'";
    mysqli_query($connect,$query);


}

?>




<html>

<head>
 
    <title>Edit Programs </title>

</head>



<body>


<?php
if(isset($_GET["data"]))
{
    $prog_id=$_GET["data"];
    $connect=mysqli_connect('localhost','root',null,'bughound');
    
    if(mysqli_connect_errno($connect))
    {
        echo 'Failed to connect';
    }
    $sql="SELECT * from program where prog_id=$prog_id  ";
    $results=$connect->query($sql);
    $row=mysqli_fetch_array($results);
        $p_name=$row["program_name"];
        $p_release=$row["program_release"];
        $p_version=$row["program_version"];
    
}
?>

<form name="Add" action="" onsubmit="return validate_form();" method="post">
        <table align="center" width=40% width="100%" cellspacing="2" cellpadding="2" border="5">
            <tr>
                <td colspan="2" align="center"><b>Edit Program with ID: <?php echo $prog_id; ?></b></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Program Name</td>
 
                <td width="57%"><input type="text" value="<?php echo $p_name ?>" name="program_name" size="24"></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Program Release</td>
 
                <td width="57%"><input type="text" value="<?php echo $p_release?>" name="program_release" size="24"></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Program version <span style="color:red">*</span></td>
                <td width="57%"><input type="text" value="<?php echo $p_version?>" name="program_version" size="24"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="  Submit" name="B4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" value="  Reset All   " name="B5"></td>
            </tr>
 
        </table>
</form>

<button onclick="location.href='dbmaintainence.php'">cancel</button>



</body>
 
</html>