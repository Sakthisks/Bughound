<?php   
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bughound");

?>


<html>
<head>
<title>fetching testing</title>
</head>
<body>
<form name="form1" action="" method="post">

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
<input type="submit" name="submit" value="Get selected areas"/>

<?php

if(isset($_POST['submit']))
{
    $program=$_POST['programs'];

     

        $conn=new mysqli("localhost","root","","bughound");
           if($conn->connect_error)
           { 
            die("connection failed:" . $conn->connect_error);
           }
           $sql="SELECT program.prog_id,program.program_name,area.area_id,area.functional_area FROM area INNER JOIN program ON  program.prog_id=$program AND program.prog_id=area.prog_id";
           $results=$conn->query($sql);
            
           if(!$results){
            echo "0 results";
            }
            else{
            echo "<table border=1 ><th>Program ID</th><th>Program Name</th><th>Area ID</th><th>Area name</th>\n";
            $none=0;
            while($row=mysqli_fetch_row($results)) {
                    $none=1;
                    printf("<tr><td>%s</td><td>%s</td><td><a href='./EditAreas.php?data=%s&data2=%s' target='_blank'>%s</a></td><td>%s</td></tr>\n",$row[0],$row[1],$row[2],$program,$row[2],$row[3]);
                }
                if($none==0)
                Echo "<h3>No matching records found.</h3>\n";
        }
 }

?>
</form>
<div>
<button onclick="location.href='dbmaintainence.php'">Cancel</button>
<button onclick="location.href='AddArea.php'">Add Another Area</button>
</div>
</body>

<html>