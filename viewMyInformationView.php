<!DOCTYPE html>
<html>

<head>
    <title>View Announcement Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
			while($row = $result->fetch_assoc())
			{
				$govt_information_name=$row["govt_information_name"];
				$govt_information_email=$row["govt_information_email"];
				$govt_information_number=$row["govt_information_number"];
				$govt_information_locality=$row["govt_information_locality"];
				$govt_information_area=$row["govt_information_area"];
				$govt_information_title=$row["govt_information_title"];
				$govt_information_description=$row["govt_information_description"];
				$govt_information_attachment=$row["govt_information_attachment"];
				$govt_information_date=$row["govt_information_date"];

				// echo $govt_information_name."<br>";
				// echo $govt_information_email."<br>";
				// echo $govt_information_number."<br>";
				// echo $govt_information_locality."<br>";
				// echo $govt_information_area."<br>";
				// echo $govt_information_title."<br>";
				// echo $govt_information_description."<br>";
				// echo $govt_information_date."<br>";
			}
		}
	?>

    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <h1>Announcement details</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="govt_complaint_id">Announcement ID :</label>
                    <input type="text" class="form-control" name="govt_complaint_id"
                        value='<?php echo $govt_information_id; ?>' id="govt_complaint_id" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="govt_complaint_date">Announcement Posted Date :</label>
                    <input type="text" class="form-control" name="govt_complaint_date"
                        value='<?php echo $govt_information_date; ?>' id="govt_complaint_date" readonly>
                </div>
            </div><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="govt_complaint_locality">Announcement Locality :</label>
                    <input type="text" class="form-control" name="govt_complaint_locality"
                        value='<?php echo $govt_information_locality; ?>' id="govt_complaint_locality" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="govt_complaint_area">Announcement Area :</label>
                    <input type="text" class="form-control" name="govt_complaint_area"
                        value='<?php echo $govt_information_area; ?>' id="govt_complaint_area" readonly>
                </div>
            </div><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="govt_complaint_title">Announcement Title :</label>
                    <input type="text" class="form-control" name="govt_complaint_title"
                        value='<?php echo $govt_information_title; ?>' id="govt_complaint_title" readonly>
                </div>
            </div><br>
            <div class="form-group">
                <label for="govt_complaint_description">Announcement Description :</label>
                <input type="text" class="form-control" name="govt_complaint_description"
                    value='<?php echo $govt_information_description; ?>' id="govt_complaint_description" readonly>
            </div>
            <div class="form-group">
                <label for="govt_complaint_attachment">Announcement Attachment :</label><br><br>
                <?php 
					echo "<img src=postInformationImages/".$govt_information_attachment." width='300' height='300'>"
				?><br><br>
            </div>
        </div>
    </div>

</body>

</html>