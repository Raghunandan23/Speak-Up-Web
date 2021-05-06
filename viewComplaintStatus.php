<!DOCTYPE html>
<html>

<head>
    <title>Public Complaint Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include ("includes/publicNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>

    <?php
        $user_complaint_status="";
        $user_complaint_id="";
        $user_complaint_date="";
        if(isset($_POST["submit"]))
        {
            $user_complaint_id=$_POST["user_complaint_id"];
            $user_complaint_old_date=$_POST["user_complaint_date"];
            $user_complaint_date=date("d m Y",strtotime($user_complaint_old_date));

            $sqlFetch="SELECT * FROM user_complaint WHERE user_complaint_id='{$user_complaint_id}'  AND user_complaint_date='{$user_complaint_date}'";
            $result=$conn->query($sqlFetch);

            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $user_complaint_status=$row["user_complaint_status"];
                }
            }
            else{
                echo "<script>alert('Invalid Complaint ID or Date');</script>";
            }
        }
    ?>

    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <h1>View Complaint Status</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="user_complaint_id">Enter your Complaint ID :</label>
                    <input type="text" class="form-control" name="user_complaint_id" id="user_complaint_id"
                        value='<?php echo $user_complaint_id;?>'>
                </div>
                <div class="form-group" id="user_complaint_date_div">
                    <label for="user_complaint_date">Enter your Complaint Date :</label>
                    <input type="date" class="form-control" name="user_complaint_date" id="user_complaint_date"
                        value='<?php echo $user_complaint_date;?>' required="required">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" id="status_view"
                    value="hide/show">View</button><br><br>
            </form>
            <div class="form-group">
                <label for="user_complaint_status">Your Complaint Status :</label>
                <input type="text" class="form-control" name="user_complaint_status" id="user_complaint_status"
                    value='<?php echo $user_complaint_status;?>' readonly>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#status_view').click(function() {
            $('#user_complaint_date_div').toggle('show');
        });
    });
    </script>

</body>

</html>