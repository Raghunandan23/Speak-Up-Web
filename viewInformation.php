<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Public Announcements</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include ("includes/publicNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <div class="container">
        <div class="jumbotron" style="background: #24252a;">

            <?php
            $sqlFetch="SELECT * FROM govt_information";
            $result=$conn->query($sqlFetch);
            if($result->num_rows >0){
                echo "<h1>Today's Announcements</h1><br>";
                while($row = $result->fetch_assoc())
                {
                    echo "
                    <div class='card' style='width: 18rem;'>

                        <img class='card-img-top' src='postInformationImages/".$row["govt_information_attachment"]."' alt='Image Load Failed'>

                        <div class='card-body'>

                            <h5 class='card-title text-dark'>{$row['govt_information_title']}</h5>

                            <p class='card-text text-dark'><b> Date: </b>{$row['govt_information_date']}</p>
                            <p class='card-text text-dark'><b> Locality: </b>{$row['govt_information_locality']}</p>
                            <p class='card-text text-dark'><b>Area: </b>{$row['govt_information_area']}</p>
                            <p class='card-text text-dark'>{$row['govt_information_description']}</p>

                            <footer class='blockquote-footer text-dark'>{$row['govt_information_name']}</footer>

                        </div>

                    </div><br><br>
                    ";
                }
            }
            else
            {
                echo "<h1>No Announcement Available</h1>";
            }
        ?>

        </div>
    </div>
</body>

</html>