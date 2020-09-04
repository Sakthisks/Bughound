
<?php


$conn=new mysqli("localhost","root","","bughound");
    if($conn->connect_error)
    { 
     die("connection failed:" . $conn->connect_error);
    }
    
    $query="SELECT * from bug";
    $results=$conn->query($query);    
    $num=$results->num_rows;      
     if($num == 0){
         echo "No records found ! ";
     }
     else{
         echo "<table border=1 ><th>Bug ID</th>
         <th>Program ID</th>
         <th>Program Name</th>
         <th>Report_type</Th>
         <th>Severity</th>
         <th>Area ID</th>
         <th>Functional Area</th>
         <th>Assigned To</th>
         <th>Status</th>
         <th>Priority</th>
         <th>Resolution</th>
         <th>Reported By</th>
         <th>Report Date</th>
         <th>Resolved By</th>
         <th>Tested By</th>
         <th>Resolved Date</th>
         <th>Tested Date</th>
         <th>Problem Summary</th>
         <th>Suggested Fix</th>
         <th>Resolution Version</th>
         <th>Problem</th>
         <th>Comments</th>\n";
         $none=0;
        
         while($row=mysqli_fetch_row($results)) {
                 $none=1;
                 $query1="SELECT program_name from program where prog_id=$row[1]";
                 $query2="SELECT functional_area from area where area_id=$row[4]";
                 $program_result=$conn->query($query1); 
                 $area_result=$conn->query($query2);
                 if($program_result->num_rows > 0){
                     $prow=mysqli_fetch_row($program_result);
                 } 
                 if($area_result->num_rows > 0 ){
                     $arow=mysqli_fetch_row($area_result);
                 }
                 
                 printf("<tr>
                 <td><a href='./bugupdate.php?data=%s' target='_blank'>%s</a></td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 <td>%s</td>
                 </tr>\n",$row[0],$row[0],$row[1],$prow[0],$row[2],$row[3],$row[4],$arow[0],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17],$row[18],$row[19]);
             }
             if($none==0)
             Echo "<h3>No matching records found.</h3>\n";
     }
    



?>