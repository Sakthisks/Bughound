<?php   
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bughound");
?>

<?php
if(isset($_POST['B4'])){

    if(isset($_POST['programs'])){
        $programs=$_POST['programs'];
    }
    if(isset($_POST['reportType'])){
        $reportType=$_POST['reportType'];
    }
    if(isset($_POST['severity']))
    {
      $severity=$_POST['severity'];
    }
    if(isset($_POST['problem_summary'])){
        $problem_summary=$_POST['problem_summary'];
    }
    if(isset($_POST['problem'])){
        $problem=$_POST['problem'];
    }
    if(isset($_POST['suggestedFix'])){
        $suggestedFix=$_POST['suggestedFix'];
    }
    if(isset($_POST['reportedBy'])){
        $reportedBy=$_POST['reportedBy'];
    }
    if(isset($_POST['reportedDate'])){
        $reportedDate=$_POST['reportedDate'];
    }
    if(isset($_POST['functionalAreas'])){
        $functionalAreas=$_POST['functionalAreas'];
    }
    if(isset($_POST['assignedTo'])){
        $assignedTo=$_POST['assignedTo'];
    }
    if(isset($_POST['status'])){
        $status=$_POST['status'];
    }
    if(isset($_POST['priority'])){
        $priority=$_POST['priority'];
    }
    if(isset($_POST['resolution'])){
        $resolution=$_POST['resolution'];
    }
    if(isset($_POST['resolutionVersion'])){
        $resolutionVersion=$_POST['resolutionVersion'];
    }
    if(isset($_POST['resolvedBy'])){
        $resolvedBy=$_POST['resolvedBy'];
    }
    if(isset($_POST['resolvedDate'])){
        $resolvedDate=$_POST['resolvedDate'];
    }
    if(isset($_POST['testedBy'])){
        $testedBy=$_POST['testedBy'];
    }
    if(isset($_POST['testedDate'])){
        $testedDate=$_POST['testedDate'];
    }
    if(isset($_POST['comments'])){
        $comments=$_POST['comments'];
    }


    $connect=mysqli_connect('localhost','root','','bughound');
 
    if(mysqli_connect_errno($connect))
    {
        echo 'Failed to connect';
    }
    $query="INSERT INTO `bug`(`Program`,
    `Report_type`,
    `Severity`,
    `Functional_area`,
    `Assigned_to`,
    `Status`,
    `Priority`,
    `Resolution`,
    `Reported_by`,
    `Report_date`,
    `Resolved_by`,
    `Tested_by`,
    `Resolved_date`,
    `Tested_date`,
    `problem_summary`,
    `Suggested_fix`,
    `Resolution_version`,
    `Problem`,
    `Comments`) VALUES ('$programs',
    '$reportType',
    '$severity',
    '$functionalAreas',
    '$assignedTo',
    '$status',
    '$priority',
    '$resolution',
    '$reportedBy',
    '$reportedDate',
    '$resolvedBy',
    '$testedBy',
    '$resolvedDate',
    '$testedDate',
    '$problem_summary',
    '$suggestedFix',
    '$resolutionVersion',
    '$problem',
    '$comments')"; 
    
    if(mysqli_query($connect,$query)){
        
        echo '<script language="javascript">';
        echo 'alert("Bug record added successfully")';
        echo '</script>';
    }
    else{
        echo "No records inserted!";
    }

}
?>






<html>
<head>
<title>New Bug Entry page </title>
<script src="jquery-3.4.1.min.js"></script>

</head>
 
<body bgcolor="#FFFFFF">
    <form name="Edit" action="" method="post">
        <table align="center" width=60% width="100%" cellspacing="4" cellpadding="2" border="5">
            <tr>
                <td colspan="4" align="center"><b>New Bug Entry page</b></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="100%">Program</td>
                <td width="60%">
                <select name="programs" id="programs" required>
                        <option value="">Select Programs</option>
                        <?php 
                            $result=mysqli_query($link,"select * from program");
                            $rowCount=mysqli_num_rows($result);
                            if($rowCount>0){
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["prog_id"];?>><?php echo $row["program_name"]." ".$row["program_release"]." ".$row["program_version"];?></option>
                            <?php
                                }
                            }
                            else{
                                echo '<option value="">Programs not available</option>';
                            }
                         ?>
                </select>
                </td>
            </tr>
            <tr>
        		<td align="left" valign="top" width="41%">Report Type</td>
        		<td width="57%"><select name="reportType" required>
                    <option value="">Select</option>
					<option value="Coding Error">Coding Error</option>
					<option value="Design Issue">Design Issue</option>
					<option value="Suggestion">Suggestion</option>
					<option value="Documentation">Documentation</option> 
					<option value="Hardware">Hardware</option>
					<option value="Query">Query</option>
					</select></td>
 			</tr>
 			<tr>
        		<td align="left" valign="top" width="41%">Severity</td>
        		<td width="57%"><select name="severity" required>
                    <option value="">Select Severity</option>
					<option value="Fatal">Fatal</option>
					<option value="Serious">Serious</option>
					<option value="Minor">Minor</option>
					</select></td>
 			</tr>
            <tr>
                <td align="left" valign="top" width="35%">Problem Summary</td>
 
                <td width="57%"><textarea rows="4" maxlen="200" name="problem_summary" cols="50" id="check" required></textarea><input type="checkbox" id="check">Reproducible</td>
             </tr >
             <tr>
                <td align="left" valign="top" width="35%">Problem</td>
 
                <td width="57%"><textarea rows="4" maxlen="200" name="problem" cols="50" required></textarea></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="35%">Suggested Fix</td>
 
                <td width="57%"><textarea rows="4" maxlen="200" name="suggestedFix" cols="50" required></textarea></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="35%">Reported By</td>
 
                <td width="57%">
                
                <select name="reportedBy" required>
                        <option value="">Select User</option>
                        <?php 
                            $result=mysqli_query($link,"select * from employee");
                        
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["emp_id"];?>><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>
                </select>
                </td>    

                <td align="left" valign="top" width="60%">Date</td>
 
                <td width="57%"><input type="date" id="date" name="reportedDate" required></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="35%">Functional Area</td>
 
                <td width="57%">
                <select name="functionalAreas" id="functionalAreas">
                        <option value="">Select Areas</option>
                </select>
            
                
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Assigned to</td>
 
                <td width="57%">
                
                <select name="assignedTo" required>
                        <option value="">Select User</option>
                        <?php 
                            $result=mysqli_query($link,"select * from employee");
                        
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["emp_id"];?>><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>
                </select>
                
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Comments</td>
 
                <td width="57%"><textarea rows="4" maxlen="200" name="comments" cols="20" required></textarea></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Status</td>
                <td width="57%"><select name="status" required>
                    <option value="">Select Status</option>
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Priority</td>
                <td width="57%"><select name="priority" required>
                <option value="">Select Priority</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Resolution</td>
                <td width="57%"><select name="resolution" required>
                <option value="">Select Resolution</option>
                    <option value="Pending">Pending</option>
                    <option value="Fixed">Fixed</option>
                    <option value="Irreproducible">Irreproducible</option>
                    <option value="Deferred">Deferred</option> 
                    <option value="As assigned">As assigned</option>
                    <option value="Cant fix">Can't fix</option>
                    <option value="Withdrawn by Reporter">Withdrawn by Reporter</option> 
                    <option value="Need more Info">Need more Info</option>
                    <option value="Disagree with suggestion">Disagree with suggestion</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Resolution Version</td>
                <td width="57%"><select name="resolutionVersion" required>
                    <option value="">Select Resolution Version</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Resolved By</td>
 
                <td width="57%">
                
                <select name="resolvedBy" required>
                        <option value="">Select User</option>
                        <?php 
                            $result=mysqli_query($link,"select * from employee");
                        
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["emp_id"];?>><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>
                </select>
                
                </td>
                <td align="left" valign="top" width="41%">Date</td>
 
                <td width="57%"><input type="date" id="dateResolved" name="resolvedDate" required></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%" >Tested By</td>
 
                <td width="57%">
                
                <select name="testedBy" required>
                        <option value="">Select User</option>
                        <?php 
                            $result=mysqli_query($link,"select * from employee");
                        
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["emp_id"];?>><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>
                </select>
                
                </td>
                <td align="left" valign="top" width="41%">Date</td>
 
                <td width="57%"><input type="date" id="dateTested" name="testedDate" required></td>
            </tr>
                <tr>
                    <td><input type="checkbox" id="check" name="Treat as deferred"><label for="check"> Treat as Deferred</label>
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="  Submit" name="B4">
                        <input type="reset" value="  Reset All   " name="reset"></td>
            </tr>
 
        </table>
    </form>
    <div align="center">
    <button onclick="location.href='Display.php'">Display Records </button>
    <button onclick="location.href='welcome.php'">Cancel</button>
    <button onclick="location.href='logout.php'">Logout</button>
    
    
    </div>
</body>
 
</html>
<script type="text/javascript">
$(document).ready(function(){
    $('#programs').on('change',function(){
        var program_id=$(this).val();
        if(program_id){
            $.ajax({
                url:'fetch_areas.php',
                type:'POST',
                data:'programId='+program_id,
                dataType:'text',
                success:function(html){
                $('#functionalAreas').html(html);
                
                }
         });
        }
        else{
            $('#functionalAreas').html('<option value="">Select program first</option>');
        }
    });
    
});
</script>