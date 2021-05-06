<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Government Set Complaint Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body>
    <?php include ("includes/governmentNavbar.php");?>
    <?php include ("dbConnect.php"); ?>
    <?php $user_complaint_id=$_REQUEST["user_complaint_id"];

    $sqlCheck="SELECT * FROM user_complaint WHERE user_complaint_id={$user_complaint_id}";
            $result=$conn->query($sqlCheck);
            if($result->num_rows >0){
                while($row = $result->fetch_assoc())
                {
                    $user_complaint_status=$row["user_complaint_status"];
                }
            }
    ?>
    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_complaint_id">Complaint ID :</label>
                        <input type="text" class="form-control" name="user_complaint_id" id="user_complaint_id"
                            value='<?php echo $user_complaint_id; ?>' readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_complaint_id">Current Status :</label>
                        <input type="text" class="form-control" name="user_complaint_status" id="user_complaint_status"
                            value='<?php echo $user_complaint_status; ?>' readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_complaint_status">Status</label>
                        <select class="form-control" name="user_complaint_status" id="user_complaint_status"
                            onChange="fun()">
                            <option value="Not Acknowledged">Not Acknowledged</option>
                            <option value="Acknowledged" id="user_complaint_status_acknowledged">Acknowledged</option>
                            <option value="On Process" id="user_complaint_status_onprogress">On Progress</option>
                            <option value="Completed" id="user_complaint_status_completed">Completed</option>
                        </select>
                    </div>
                </div>

                <button type="submit" name="save" class="btn btn-primary" id="save">Save Changes</button>
                <button type="submit" name="delete" class="btn btn-danger" id="delete" disabled="true">Delete
                    Complaint</button>
            </form>
        </div>
    </div>

    <script>
    function fun() {
        if (document.getElementById("user_complaint_status").value == "Completed") {
            document.getElementById("delete").disabled = false;
            document.getElementById("save").disabled = true;
        } else
            document.getElementById("delete").disabled = true;
        if (document.getElementById("user_complaint_status").value == "Completed")
            document.getElementById("user_complaint_status_attachment").disabled = false;
        else
            document.getElementById("user_complaint_status_attachment").disabled = true;

    }
    </script>
    <?php
        if(isset($_POST["save"]))
        {
            $user_complaint_status=$_POST["user_complaint_status"];
            $sqlUpdate="UPDATE user_complaint SET user_complaint_status='{$user_complaint_status}' WHERE user_complaint_id={$user_complaint_id}";
            if($conn->query($sqlUpdate))
            {
                echo "<script>alert('Status has been updated successfully');</script>";
                echo "<script>location.replace('governmentSetComplaintStatus.php');</script>";
            }
            else 
            echo $conn->error;
        }
        if(isset($_POST["delete"]))
        {
            $sqlDelete="DELETE FROM user_complaint WHERE user_complaint_id={$user_complaint_id} ";
            $sqlCheck="SELECT * FROM user_complaint WHERE user_complaint_id={$user_complaint_id}";
            $result=$conn->query($sqlCheck);
            if($result->num_rows >0){
                while($row = $result->fetch_assoc())
                {
                    $user_complaint_email=$row["user_complaint_email"];
                    $to       = $user_complaint_email;
                    $subject  = 'Speak Up Complaint Status Regarding...!!';
                    $message = '<html><body>';
                    $message .='<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">';
                    $message .='<div style="border-bottom:1px solid #eee">';
                    $message .='<a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Speak Up</a>';
                    $message .='</div>';
                    $message .='<p style="font-size:1.1em">Hi,</p>';
                    $message .='<p>Your complaint no '.$user_complaint_id.' has been successfully Acknowledged and Solved by our Officials.</p>';
                    $message .='<p>Please ensure from your side and give us feedback.</p>';
                    $message .='<p style="font-size:0.9em;">Regards,<br />Speak Up</p>';
                    $message .='<hr style="border:none;border-top:1px solid #eee" />';
                    $message .='<div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">';
                    $message .='<p>Speak Up</p>';
                    $message .='<p>SKCET</p>';
                    $message .='<p>Coimbatore</p>';
                    $message .='</div>';
                    $message .='</div>';
                    $message .='</div>';
                    $message .= '</body></html>';
                    $headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                                'MIME-Version: 1.0' . "\r\n" .
                                'Content-type: text/html; charset=utf-8';
                    if(mail($to, $subject, $message, $headers))
                        echo "<script>alert('Email Sent Successfully');</script>";
                    else
                        echo "<script>alert('Email Sent Failed');</script>";
                }
            }
            if($conn->query($sqlDelete))
            {
                echo "<script>alert('Complaint has been deleted successfully');</script>";
                echo "<script>location.replace('governmentSetComplaintStatus.php');</script>";
            }
            else 
            echo $conn->error;   
        }
    ?>
</body>

</html>