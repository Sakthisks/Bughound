
<html>
    <body>
        <form method="post" action="export.php">
        <select name="table">
        <option value="employee">Employee</option>
        <option value="area">Areas</option>
        <option value="program">Program</option>
        </select>
            <input type="submit" name="export" value="CSV Export" />
        </form>
        <form method="post" action="xmlExport_sks.php">
        <select name="table">
        <option value="employee">Employee</option>
        <option value="area">Areas</option>
        <option value="program">Program</option>
        </select>
            <input type="submit" name="export" value="xml Export" />
        </form>
        <button name="cancel" onclick="location.href='dbmaintainence.php'">Cancel</button>
        <button onclick="location.href='welcome.php'">Welcome page</button>
        <button onclick="location.href='logout.php'">Logout</button>
    </body>
</html>