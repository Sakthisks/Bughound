<?php   
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bughound");
?>


<html>
<head>
<title>Delete a Bug report Search Bug page </title>
<script src="jquery-3.4.1.min.js"></script>

</head>
 
<body bgcolor="#FFFFFF">
    <form name="Edit" action="deleteBug.php" method="post">
        <table align="center" width=60% width="100%" cellspacing="4" cellpadding="2" border="5">
            <tr>
                <td colspan="4" align="center"><b>Search a Bug report to delete</b></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="100%">Program</td>
                <td width="60%">
                <select name="programs" id="programs" >
                        <option value="">ALL</option>
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
        		<td width="57%"><select name="reportType" >
                    <option value="">ALL</option>
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
        		<td width="57%"><select name="severity" >
                    <option value="">ALL</option>
					<option value="Fatal">Fatal</option>
					<option value="Serious">Serious</option>
					<option value="Minor">Minor</option>
					</select></td>
 			</tr>
            <tr>
                <td align="left" valign="top" width="35%">Reported By</td>
 
                <td width="57%">
                
                <select name="reportedBy" >
                        <option value="">ALL</option>
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
                <td align="left" valign="top" width="35%">Functional Area</td>
 
                <td width="57%">
                <select name="functionalAreas" id="functionalAreas">
                        <option value="">ALL</option>
                </select>
            
                
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Assigned to</td>
 
                <td width="57%">
                
                <select name="assignedTo" >
                        <option value="">ALL</option>
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
                <td align="left" valign="top" width="41%">Status</td>
                <td width="57%"><select name="status" >
                    <option value="">ALL</option>
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Priority</td>
                <td width="57%"><select name="priority">
                <option value="">ALL</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Resolution</td>
                <td width="57%"><select name="resolution">
                <option value="">ALL</option>
                    <option value="Pending">Pending</option>
                    <option value="Fixed">Fixed</option>
                    <option value="Irreproducible">Irreproducible</option>
                    <option value="Deferred">Deferred</option> \
                    <option value="As assigned">As assigned</option>
                    <option value="Can't fix">Can't fix</option>
                    <option value="Withdrawn by Reporter">Withdrawn by Reporter</option> \
                    <option value="Need more Info">Need more Info</option>
                    <option value="Disagree with suggestion">Disagree with suggestion</option>
                    </select></td>
            </tr>
           
           
            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="  Submit" name="B4">
                        <input type="reset" value="  Reset All   " name="B5">
                        <input type="button" name="cancel" value="cancel">
                    </td>
            </tr>
 
        </table>
    </form>
    
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
            $('#functionalAreas').html('<option value="">Select program first</otpion>');
        }
    });
    
});
</script>