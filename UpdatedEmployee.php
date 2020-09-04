
<?php


if(isset($_POST['B4'])){
if(isset($_POST['name'])){
    $name=$_POST['name'];
}

if(isset($_POST['username'])){
    $username=$_POST['username'];
}
if(isset($_POST['password'])){
    $password=$_POST['password'];
} 
//$level = (isset($_POST['level']) ? $_POST['level'] : '');
if(isset($_POST['level'])){
    $level=$_POST['level'];
}

if(isset($_GET["data"])){
        $employee_id=$_GET["data"];
}


$connect=mysqli_connect('localhost','root',null,'bughound');
 
if(mysqli_connect_errno($connect))
{
        echo 'Failed to connect';
}
$query="UPDATE `employee` SET `name`='$name',`username`='$username',`password`='$password',`level`='$level' WHERE `emp_id`='$employee_id'";
if(mysqli_query($connect,$query)){
echo '<script language="javascript">';
echo 'alert("Employee edited successfully")';
echo '</script>';
}
}

?>


<html>
 
<head>
 
    <title>Edit Employee </title>
    <script>
         function myFunction() {
            var x = document.getElementById("check");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
}
    </script>
 
</head>
 
<body bgcolor="#FFFFFF">


<?php
if(isset($_GET["data"]))
{
    $employee_id=$_GET["data"];
    $connect=mysqli_connect('localhost','root',null,'bughound');
    
    if(mysqli_connect_errno($connect))
    {
        echo 'Failed to connect';
    }
    $sql="SELECT * from employee where emp_id=$employee_id";
    $results=$connect->query($sql);
    $row=mysqli_fetch_array($results);
        $e_name=$row['name'];
        $e_uname=$row['username'];
        $p_password=$row['password'];

        
    
}
?>
<form name="Add" action="" onSubmit="return myFunction();"  method="post">
        <table align="center" width=40% width="100%" cellspacing="2" cellpadding="2" border="5">
            <tr>
                <td colspan="2" align="center"><b>Edit Employee with ID <?php echo $employee_id; ?></b></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Name</td>
                <td width="57%"><input type="text" value="<?php echo $e_name?>" name="name" size="24" required></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">User Name</td>
 
                <td width="57%"><input type="text" value="<?php echo $e_uname?>" name="username" size="24" required></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Password</td>
 
                <td width="57%"><input type="password" name="password" value="<?php echo $p_password?>" id="check" size="24" required><input type="checkbox" onclick="myFunction()">Show Password</td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Level</td>
 
                <td width="57%"><input type="hidden" name="action" value="contact_agent" required><select name="level" ><option value="0" >Select</option><option value="1">User level 1</option><option value="2">User level 2</option><option value="3">User level 3</option></select></td>
            </tr >

            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="  Submit" name="B4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" value="  Reset All   " name="B5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
 
        </table>
</form>
<div align="center">
<button onclick="location.href='EditEmployee.php'">Display</button>
<button onclick="location.href='dbmaintainence.php'"> Cancel</button>
</div>

</body>
 
</html>