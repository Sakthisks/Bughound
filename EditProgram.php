<html>
 
<head>
 
    <title>Edit Programs </title>
 
    
 
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
                        printf("<tr><td><a href='./UpdateProgram.php?data=%s' target='_blank'>%s</a></td><td>%s</td><td>%d</td><td>%d</td></tr>\n",$row[0],$row[0],$row[1],$row[2],$row[3]);
                    }
                    if($none==0)
                    Echo "<h3>No matching records found.</h3>\n";
            }
           
            ?>
        </table>
        </div>
        <div align="center">
        <button onclick="location.href='dbmaintainence.php'">Cancel</button>
    <button onclick="location.href='welcome.php'">Welcome page</button>
    <button onclick="location.href='logout.php'">Logout</button>
    </div>

</body>

</html>