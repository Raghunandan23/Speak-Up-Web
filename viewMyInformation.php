<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Government My Announcements</title>
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
                $sqlFetch="SELECT * FROM govt_information WHERE govt_information_email='{$user_email}'";
                $result=$conn->query($sqlFetch);
                if($result->num_rows >0){
                    echo "<h1>My Announcements</h1>
                    <table>
                        <tr>
                            <th>Information ID</th>
                            <th>Information Date</th>
                            <th>Title of the Complaint</th>
                            <th>Details</th>
                            <th>Delete</th>
                        </tr>";
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>
                            <td>{$row["govt_information_id"]}</td>
                            <td>{$row["govt_information_date"]}</td>
                            <td>{$row["govt_information_title"]}</td>"?>
            <td><a class="btn btn-primary"
                    href="viewMyInformationView.php?govt_information_id=<?php echo $row["govt_information_id"]; ?>">View</a>
            </td>
            <td><a class="btn btn-danger"
                    href="viewMyInformationDelete.php?govt_information_id=<?php echo $row["govt_information_id"]; ?>">Delete</a>
            </td>

            <?php echo"</tr>";
                    }
                    echo "</table>";
                }
                else
                    echo "<h1>No Announcements Posted...!!!</h1>";
            ?>
        </div>
    </div>
</body>

</html>