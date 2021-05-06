<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Government Complaint Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    text-align: center;
    width: 100%;
}

td,
th {
    border: 1px solid;
    text-align: center;
    padding: 8px;
}
</style>

<body>
    <?php include ("includes/governmentNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <?php
                $user_email=$_SESSION["user_email"];
                $sqlFetch="SELECT * FROM user_complaint";
                $result=$conn->query($sqlFetch);
                if($result->num_rows >0){
                    echo "<h1>View Complaints</h1>
                    <table>
                        <tr>
                            <th>Complaint ID</th>
                            <th>Complaint Date</th>
                            <th>Title of the Complaint</th>
                            <th>Current Status</th>
                            <th>Details</th>
                        </tr>";
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>
                            <td>{$row["user_complaint_id"]}</td>
                            <td>{$row["user_complaint_date"]}</td>
                            <td>{$row["user_complaint_title"]}</td>
                            <td>{$row["user_complaint_status"]}</td>"?>
            <td><a class="btn btn-primary"
                    href="setStatus.php?user_complaint_id=<?php echo $row["user_complaint_id"]; ?>">Set Status</a>
            </td>
            <?php echo"</tr>";
                    }
                    echo "</table>";
                }
                else
                    echo "<h1>No Complaints Available...!!!</h1>";
            ?>
        </div>
    </div>
</body>

</html>