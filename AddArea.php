<?php   
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bughound");

?>


<html>
<head>
<title>fetching testing</title>
</head>
<body>
<form name="form1" action="AddingArea.php" method="post">

<label>Select Program for areas</label>
<select name="programs">
<option value="">Select</option>
<?php 
    $result=mysqli_query($link,"select * from program");
   
    while($row=mysqli_fetch_array($result))
    {
        ?>
    <option value=<?php echo $row["prog_id"];?>><?php echo $row["program_name"]." ".$row["program_release"]." ".$row["program_version"];?></option>
    <?php
    }
    ?>
</select>
<input type="submit" name="submit" value="Add Area"/>
</form>
</div>
<button onclick="location.href='dbmaintainence.php'">cancel</button>
<button onclick="location.href='logout.php'">Logout</button>
<button onclick="location.href='welcome.php'">Welcome page</button>
</div>
</body>

<html>