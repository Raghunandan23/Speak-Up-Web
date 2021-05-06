<html>

<head>
    <title>Public Complaint Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include ("includes/publicNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>
    <?php
		$user_complaint_id=$_REQUEST["user_complaint_id"];
		$sqlFetch="SELECT * FROM user_complaint WHERE user_complaint_id={$user_complaint_id}";
		$result=$conn->query($sqlFetch);
		if($result->num_rows >0)
		{
			while($row = $result->fetch_assoc())
			{
				$user_complaint_id=$row["user_complaint_id"];
				$user_complaint_date=$row["user_complaint_date"];
				$user_complaint_email=$row["user_complaint_email"];
				$user_complaint_locality=$row["user_complaint_locality"];
				$user_complaint_area=$row["user_complaint_area"];
				$user_complaint_specificlocation=$row["user_complaint_specificlocation"];
				$user_complaint_type=$row["user_complaint_type"];
				$user_complaint_title=$row["user_complaint_title"];
				$user_complaint_description=$row["user_complaint_description"];
				$user_complaint_attachment=$row["user_complaint_attachment"];
				$user_complaint_status=$row["user_complaint_status"];
			}
		}
	?>
    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <h1>Complaint details</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user_complaint_id">Complaint ID :</label>
                    <input type="text" class="form-control" name="user_complaint_id"
                        value='<?php echo $user_complaint_id; ?>' id="user_complaint_id" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="user_complaint_date">Complaint Date :</label>
                    <input type="text" class="form-control" name="user_complaint_date"
                        value='<?php echo $user_complaint_date; ?>' id="user_complaint_date" readonly>
                </div>
            </div><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user_complaint_locality">Complaint Locality :</label>
                    <input type="text" class="form-control" name="user_complaint_locality"
                        value='<?php echo $user_complaint_locality; ?>' id="user_complaint_locality" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="user_complaint_area">Complaint Area :</label>
                    <input type="text" class="form-control" name="user_complaint_area"
                        value='<?php echo $user_complaint_area; ?>' id="user_complaint_area" readonly>
                </div>
            </div><br>
            <div class="form-group">
                <label for="user_complaint_specificlocation">Complaint Specific Location :</label>
                <input type="text" class="form-control" name="user_complaint_specificlocation"
                    value='<?php echo $user_complaint_specificlocation; ?>' id="user_complaint_specificlocation"
                    rows="5" readonly>
            </div><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user_complaint_type">Complaint Type :</label>
                    <input type="text" class="form-control" name="user_complaint_type"
                        value='<?php echo $user_complaint_type; ?>' id="user_complaint_type" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="user_complaint_title">Complaint Title :</label>
                    <input type="text" class="form-control" name="user_complaint_title"
                        value='<?php echo $user_complaint_title; ?>' id="user_complaint_title" readonly>
                </div>
            </div><br>
            <div class="form-group">
                <label for="user_complaint_description">Complaint Description :</label>
                <input type="text" class="form-control" name="user_complaint_description"
                    value='<?php echo $user_complaint_description; ?>' id="user_complaint_description" readonly>
            </div>
            <div class="form-group">
                <label for="user_complaint_attachment">Complaint Attachment :</label><br><br>
                <?php 
					echo "<img src=complaintsImages/".$user_complaint_attachment." width='300' height='300'>"
				?><br><br>
            </div>
            <!-- <div class="form-group">
                <label for="user_complaint_status">Complaint Status :</label>
                <input type="text" class="form-control" name="user_complaint_status"
                    value='<?php echo $user_complaint_status; ?>' id="user_complaint_status" readonly>
            </div> -->
        </div>
    </div>
</body>

</html>