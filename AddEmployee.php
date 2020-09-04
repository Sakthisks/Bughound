<?php
if(isset($_POST['B4'])){

    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['username'])){
        $username=$_POST['username'];
    }
    if(isset($_POST['password']))
    {
      $password=$_POST['password'];
    }
    if(isset($_POST['level'])){
        $level=$_POST['level'];
    }

    $connect=mysqli_connect('localhost','root',"",'bughound');
 
    if(mysqli_connect_errno($connect))
    {
        echo 'Failed to connect';
    }
    $query="INSERT INTO `employee`(`name`, `username`, `password`,`level`) VALUES ('$name','$username','$password','$level')"; 
    if(mysqli_query($connect,$query)){
        
        echo '<script language="javascript">';
        echo 'alert("Employee added successfully")';
        echo '</script>';
    
    }

}
?>


<html>
 
<head>
 
    <title>Add Employee </title>
    <script>
         function myFunction() {
            var x = document.getElementById("check");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function validate_form() {
            if (document.Add.name.value == "") {
                alert("Please fill in the 'Employee name' box.")
                return false;
            }
            if (document.Add.username.value == "") {
                alert("Enter User Name");
                return false;
            }
            if (document.Add.password.value == "") {
                alert("Enter Password");
                return false;
            }
            alert("sucessfully Submitted");
        }
    </script>
    
</head>
 
<body bgcolor="#FFFFFF">
    <form name="Add" action="" onsubmit="return validate_form();" method="post">
        <table align="center" width=40% width="100%" cellspacing="2" cellpadding="2" border="5">
            <tr>
                <td colspan="2" align="center"><b>Add Employees</b></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Name</td>
                <td width="57%"><input type="text" value="" name="name" size="24" required></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">User Name</td>
 
                <td width="57%"><input type="text" value="" name="username" size="24" required></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Password</td>
 
                <td width="57%"><input type="password" value="" name="password" id="check" size="24" required><input type="checkbox" onclick="myFunction()">Show Password</td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Level</td>
 
                <td width="57%"><input type="hidden" name="action" value="contact_agent"><select name="level" required><option value="0" >Select</option><option value="1">User level 1</option><option value="2">User level 2</option><option value="3">User level 3</option></select></td>
            </tr >

            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="  Submit" name="B4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" value="  Reset All   " name="B5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="location.href='dbmaintainence.php'">Cancel</button></td>
            </tr>
 
        </table>
    </form>
    <div align="center">
    <button onclick="location.href='logout.php'">Logout</button>
    <button onclick="location.href='welcome.php'">Welcome page</button>
    </div>
</body>
 
</html>