<html>

<head>
    <title>Government Information Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php include ("includes/governmentNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>

    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <h1>Information details</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user_information_id">Information ID :</label>
                    <input type="text" class="form-control" name="user_information_id" id="user_information_id"
                        readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="user_information_date">Information Date :</label>
                    <input type="text" class="form-control" name="user_information_date" id="user_information_date"
                        readonly>
                </div>
            </div><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user_information_locality">Information Locality :</label>
                    <input type="text" class="form-control" name="user_information_locality"
                        id="user_information_locality" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="user_information_area">Information Area :</label>
                    <input type="text" class="form-control" name="user_information_area" id="user_information_area"
                        readonly>
                </div>
            </div><br>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user_information_title">Information Title :</label>
                    <input type="text" class="form-control" name="user_information_title" id="user_information_title"
                        readonly>
                </div>
            </div><br>
            <div class="form-group">
                <label for="user_information_description">Information Description :</label>
                <input type="text" class="form-control" name="user_information_description"
                    id="user_information_description" readonly>
            </div>
            <div class="form-group">
                <label for="user_information_attachment">Information Attachment :</label><br><br>
                <br><br>
            </div>
        </div>
    </div>
</body>

</html>