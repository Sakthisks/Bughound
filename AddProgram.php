<?php
//$prog_id = (isset($_POST['prog_id']) ? $_POST['prog_id'] : '');
if(!isset($_COOKIE['username']) && !isset($_COOKIE['password'])){
    header("Location:Error 404 Page Not Found ! \n please login to the website"); 
}
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
    $connect=mysqli_connect('localhost','root',"",'bughound');
    if(mysqli_connect_errno($connect))
    {
            echo 'Failed to connect';
    }
    $query="INSERT INTO `program`( `program_name`, `program_release`, `program_version`) VALUES ('$program_name',$program_release,$program_version)";
    mysqli_query($connect,$query);
}

?>
<html>
<head>
    <title>Add Programs </title> 
    

</head>
 
<body bgcolor="#FFFFFF">

        <div align="center">
         <?php

           $conn=new mysqli("localhost","root","","bughound");
           if($conn->connect_error)
           { 
            die("connection failed:" . $conn->connect_error);
           }
           $sql="SELECT * FROM program";
           $results=$conn->query($sql);


            if(!$results){
                echo "0 results";
            }
            else{
                echo "<table border=1 ><th>Program ID</th><th>Program Name</th><th>Program Release</Th><th>Program Version</th>\n";
                $none=0;
                while($row=mysqli_fetch_row($results)) {
                        $none=1;
                        printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>\n",$row[0],$row[1],$row[2],$row[3]);
                    }
                    if($none==0)
                    Echo "<h3>No matching records found.</h3>\n";
            }
           
            ?>
        </div>
        <script type="text/javascript">
        function validate_form() {
            if (document.Add.program_name.value == "") {
                alert("Please fill in the 'Program name' box.")
                return false;
            }
            if (document.Add.program_release.value == "") {
                alert("Enter Program Release");
                return false;
            }
            if (document.Add.program_version.value == "") {
                alert("Enter Program Version");
                return false;
            }
            alert("sucessfully Submitted");
         }
 
    </script>
    <form name="Add" action="" onsubmit="return validate_form();" method="post">
        <table align="center" width=40% width="100%" cellspacing="2" cellpadding="2" border="5">
            <tr>
                <td colspan="2" align="center"><b>Add Programs</b></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Program Name <span style="color:red">*</span></td>
 
                <td width="57%"><input type="text" value="" name="program_name" size="24"></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Program Release</td>
 
                <td width="57%"><input type="text" value="" name="program_release" size="24"></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Program version </td>
                <td width="57%"><input type="text" value="" name="program_version" size="24"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="  Submit" name="B4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" value="  Reset All   " name="B5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></p>
            </tr>
 
        </table>
    </form>
    <div align="center">
    <button onclick="location.href='logout.php'">Logout</button>
    <button onclick="location.href='welcome.php'">Welcome page</button>
    <button onclick="location.href='dbmaintainence.php'">Cancel</button>
    </div>
</body>
</html>