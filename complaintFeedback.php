<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Complaint Feedback</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body>
    <?php include ("includes/governmentNavbar.php");?>
    <?php include ("dbConnect.php"); ?>

    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="feedback_complaint_id">Complaint ID :</label>
                        <input type="text" class="form-control" name="feedback_complaint_id" id="feedback_complaint_id">
                    </div>
                </div>
                <div class="form-group">
                    <label for="feedback_message">Feedbacks</label>
                    <textarea name="feedback_message" class="form-control" id="feedback_message" rows="5"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary" id="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST["submit"]))
        {
            $feedback_complaint_id=$_POST["feedback_complaint_id"];
            $feedback_user_name=$_SESSION["user_name"];
            $feedback_user_email=$_SESSION["user_email"];
            $feedback_message=$_POST["feedback_message"];

            $sqlInsert="INSERT INTO user_feedback (feedback_user_email,
                feedback_user_name,
                feedback_complaint_id,
                feedback_message) VALUES 
                ('{$feedback_user_email}',
                '{$feedback_user_name}',
                {$feedback_complaint_id},
                '{$feedback_message}')";
            
            if($conn->query($sqlInsert))
            {

                $to       = "speakupquries24.7@gmail.com";
                $subject  = 'Speak Up Feedback Regarding...!!';
                $message = '<html><body>';
                $message .='<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
<div style="margin:50px auto;width:70%;padding:20px 0">';
                $message .='<div style="border-bottom:1px solid #eee">';
                $message .='<a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Speak Up</a>';
                $message .='</div>';
                $message .='<p style="font-size:1.1em">Hi, You have got an Feedback</p>';
                $message .='<p>Your Response</p>';
                $message .='<p>Name: '.$feedback_user_name.'</p>';
                $message .='<p>Email ID: '.$feedback_user_email.'</p>';
                $message .='<p>Complaint ID: '.$feedback_complaint_id.'</p>';
                $message .='<p>Feedback Message: '.$feedback_message.'</p>';
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
                    echo "<script>location.replace('success/feedbackSuccess.php');</script>";
                else
                    echo "<script>alert('Email Sent Failed');</script>";
            }
            else {
            echo $conn->error;
            }

        }
    ?>


</body>

</html>