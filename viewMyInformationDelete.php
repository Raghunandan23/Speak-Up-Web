<!DOCTYPE html>
<html>

<head>
    <title>Delete Announcement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/delete.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php include ("includes/governmentNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <?php
		$govt_information_id=$_REQUEST["govt_information_id"];
		// echo $govt_information_id."<br>";
		$sqlFetch="SELECT * FROM govt_information WHERE govt_information_id={$govt_information_id}";
		$result=$conn->query($sqlFetch);
		if($result->num_rows >0)
		{
			if($row = $result->fetch_assoc())
			{
				$govt_information_name=$row["govt_information_name"];
				$govt_information_email=$row["govt_information_email"];
				$govt_information_number=$row["govt_information_number"];
				$govt_information_locality=$row["govt_information_locality"];
				$govt_information_area=$row["govt_information_area"];
				$govt_information_title=$row["govt_information_title"];
				$govt_information_description=$row["govt_information_description"];
				$govt_information_date=$row["govt_information_date"];

				// echo $govt_information_name."<br>";
				// echo $govt_information_email."<br>";
				// echo $govt_information_number."<br>";
				// echo $govt_information_locality."<br>";
				// echo $govt_information_area."<br>";
				// echo $govt_information_title."<br>";
				// echo $govt_information_description."<br>";
				// echo $govt_information_date."<br><br>";

				?>
    <div class="container">
        <div class="sub-container">
            <div class="teams">
                <img src="https://img.icons8.com/cute-clipart/50/000000/delete-forever.png" />
                <br><br>
                <div class="name">Are you sure want to delete the Announcement?</div>
                <br>
                <form method="post">
                    <button class="btn btn-danger" name="delete">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <?php
			}
		}

		if(isset($_POST["delete"]))
		{
			$sqlDelete="DELETE FROM govt_information WHERE govt_information_id={$govt_information_id}";
			if($conn->query($sqlDelete))
			{
				echo "<script>alert('Information Deleted Successfully');</script>";
				echo "<script>location.replace('viewMyInformation.php');</script>";
			}
			else
				echo "<script>alert('Error While Deleting the Information');</script>";
		}
		
	?>

</body>

</html>