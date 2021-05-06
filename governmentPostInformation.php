<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Government Post Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<style>
body::-webkit-scrollbar {
    width: 1em;
}

body::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px #24252a;
}

body::-webkit-scrollbar-thumb {
    background-color: #24252a;
    outline: 1px solid #24252a;
}
</style>

<body>
    <?php include ("includes/governmentNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>

    <?php
        $user_name=$_SESSION["user_name"];
        $user_email=$_SESSION["user_email"];
        $user_phonenumber=$_SESSION["user_phonenumber"];
    ?>

    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <h1>Announcing Official Details</h1>
            <form name="myform" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_name">Name :</label>
                        <input type="text" class="form-control" name="user_name" value='<?php echo $user_name;?>'
                            id="user_name" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_email">Email-ID :</label>
                        <input type="text" class="form-control" name="user_email" value='<?php echo $user_email;?>'
                            id="user_email" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="user_phonenumber">Phone Number :</label>
                        <input type="number" class="form-control" name="user_phonenumber"
                            value='<?php echo $user_phonenumber;?>' id="user_phonenumber" readonly>
                    </div>
                </div>
                <h1>Select Area of Information</h1>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_information_locality">Locality</label>
                        <select class="form-control" name="user_information_locality" id="user_information_locality">
                            <option value="Choose">Choose</option>
                            <option value="Avarampalayam" id="area_avarampalayam">Avarampalayam</option>
                            <option value="Chinniyampalayam" id="area_chinniyampalayam">Chinniyampalayam</option>
                            <option value="Edayarpalayam" id="area_edayarpalayam">Edayarpalayam</option>
                            <option value="Gandhipuram" id="area_gandhipuram">Gandhipuram</option>
                            <option value="Koundampalayam" id="area_koundampalayam">Koundampalayam</option>
                            <option value="Kovaipudur" id="area_kovaipudur">Kovaipudur</option>
                            <option value="Kuniyamuthur" id="area_kuniyamuthur">Kuniyamuthur</option>
                            <option value="Madukkarai" id="area_madukkarai">Madukkarai</option>
                            <option value="Neelambur" id="area_neelambur">Neelambur</option>
                            <option value="Ondipudhur" id="area_ondipudhur">Ondipudhur</option>
                            <option value="Peelamedu" id="area_peelamedu">Peelamedu</option>
                            <option value="P N Palayam" id="area_pnpalayam">P N Palayam</option>
                            <option value="Podanur" id="area_podanur">Podanur</option>
                            <option value="Perur" id="area_perur">Perur</option>
                            <option value="Ramanathapuram" id="area_ramanathapuram">Ramanathapuram</option>
                            <option value="Saibaba Colony" id="area_saibabacolony">Saibaba Colony</option>
                            <option value="Saravanampatti" id="area_saravanampatti">Saravanampatti</option>
                            <option value="Singanallur" id="area_singanallur">Singanallur</option>
                            <option value="Sundarapuram" id="area_sundarapuram">Sundarapuram</option>
                            <option value="Thudiyalur" id="area_thudiyalur">Thudiyalur</option>
                            <option value="Ukkadam" id="area_ukkadam">Ukkadam</option>
                            <option value="Vadavalli" id="area_vadavalli">Vadavalli</option>
                        </select>
                        <div id="user_information_locality_error"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_information_area">Area</label>
                        <select class="form-control" name="user_information_area" value="" id="user_information_area"
                            disabled>
                            <option value="">Choose</option>
                        </select>
                    </div>
                </div>
                <h1>Information</h1>
                <div class="form-group">
                    <label for="user_information_title">Title of the Information</label>
                    <input type="text" class="form-control" name="user_information_title" id="user_information_title">
                    <div id="user_information_title_error"></div>
                </div>
                <div class="form-group">
                    <label for="user_information_description">Description of your Information</label>
                    <textarea class="form-control" name="user_information_description" id="user_information_description"
                        rows="5"> </textarea>
                    <div id="user_information_description_error"></div>
                </div>
                <h1>Attachments</h1>
                <div class="form-group">
                    <label for="user_information_attachment">Upload Photography of Government Order</label>
                    <input type="file" class="form-control" name="user_information_attachment"
                        id="user_information_attachment" accept=".jpg,.jpeg,.png" onchange="validateFileType(this)"
                        style="background-color:#eee;border:none;" />
                    <div id="user_information_attachment_error"></div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
    // validating form
    function validateform() {
        // validating select locality
        var user_information_locality_error = "";
        if (document.getElementById('user_information_locality').value == "Choose") {
            document.getElementById('user_information_locality_error').innerHTML = "*Please Select the locality";
            return false;
        }
        document.getElementById('user_information_locality_error').innerHTML = "";

        //validating information title
        var user_information_title_error = "";
        var user_information_title = document.getElementById('user_information_title');
        if (user_information_title.value.trim() == "") {
            document.getElementById('user_information_title_error').innerHTML =
                "*Title of your information is required!";
            return false;
        }
        document.getElementById('user_information_title_error').innerHTML = "";
        var user_information_title_pattern = /^[a-zA-Z0-9\s,'-/]*$/;
        if ((!user_information_title.value.match(user_information_title_pattern))) {
            document.getElementById('user_information_description_error').innerHTML =
                "*Invalid Title";
            return false;
        }
        document.getElementById('user_information_title_error').innerHTML = "";

        // validating description of Information
        var user_information_description_error = "";
        var user_information_description = document.getElementById('user_information_description');
        if (user_information_description.value.trim() == "") {
            document.getElementById('user_information_description_error').innerHTML =
                "*Description of your information is required!";
            return false;
        }
        document.getElementById('user_information_description_error').innerHTML = "";
        var user_information_description_pattern = /^[a-zA-Z0-9\s,'-/]*$/;
        if ((!user_information_description.value.match(user_information_description_pattern))) {
            document.getElementById('user_information_description_error').innerHTML =
                "*Invalid Description";
            return false;
        }
        document.getElementById('user_information_description_error').innerHTML = "";
    }

    //validating file upload
    function validateFileType(input) {
        var fileName = input.value,
            idxDot = fileName.lastIndexOf(".") + 1,
            extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (!["jpg", "jpeg", "png"].includes(extFile)) {
            document.getElementById('user_information_attachment_error').innerHTML =
                "*Invalid File format upload in .jpg .jpeg .png";
            return false;
        }
        document.getElementById('user_information_attachment_error').innerHTML = "";
    }

    // sort text in select and search text
    $(document).ready(function() {
        $('select').selectize({
            sortField: 'text'
        });
    });

    // disable select until first select is selected
    $("select[name='user_information_locality']").change(function() {
        $("select[name='user_information_area']").removeAttr("disabled");
    });

    // areas according to locality
    $(document).ready(function() {
        $("#user_information_locality").change(function() {
            var user_information_locality = $(this).val();
            if (user_information_locality == "Avarampalayam") {
                $("#user_information_area").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Gandhi Nagar'  id='user_area_gandhinagar'>Gandhi Nagar</option>" +
                    "<option value='Illango Nagar'  id='user_area_illangonagar'>Illango Nagar</option>" +
                    "<option value='Kamaraj Nagar'  id='user_area_kamarajnagar'>Kamaraj Nagar</option>"
                );
            } else if (user_information_locality == "Chinniyampalayam") {
                $("#user_information_area").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Gem Nagar'  id='user_area_gemnagar'>Gem Nagar</option>" +
                    "<option value='Teachers Colony'  id='user_area_teacherscolony'>Teachers Colony</option>" +
                    "<option value='Thanam Nagar'  id='user_area_thanamnagar'>Thanam Nagar</option>"
                );
            } else if (user_information_locality == "Edayarpalayam") {
                $("#user_information_area").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Cauvery Street'  id='user_area_cauverystreet'>Cauvery Street</option>" +
                    "<option value='MGR Colony Road'  id='user_area_mgrcolonyroad'>MGR Colony Road</option>" +
                    "<option value='Rajiv Gandhi Street'  id='user_area_rajivgandhistreet'>Rajiv Gandhi Street</option>"
                );
            } else if (user_information_locality == "Gandhipuram") {
                $("#user_information_area").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Cross Cut Road'  id='user_area_crosscutroad'>Cross Cut Road</option>" +
                    "<option value='Dr Radhakrishnan Street'  id='user_area_drradhakrishnanstreet'>Dr Radhakrishnan Street</option>" +
                    "<option value='Nehru Street'  id='user_area_nehrustreet'>Nehru Street</option>"
                );
            } else if (user_information_locality == "Koundampalayam") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Cheran Nagar'  id='user_area_cherannagar'>Cheran Nagar</option>" +
                    "<option value='J P Nagar'  id='user_area_jpnagar'>J P Nagar</option>" +
                    "<option value='R S Nagar'  id='user_area_rsnagar'>R S Nagar</option>"
                );
            } else if (user_information_locality == "Kovaipudur") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Arivozi Nagar'  id='user_area_arivozinagar'>Arivozi Nagar</option>" +
                    "<option value='Gokulam Colony'  id='user_area_gokulamcolony'>Gokulam Colony</option>" +
                    "<option value='K K Nagar'  id='user_area_kknagar'>K K Nagar</option>"
                );
            } else if (user_information_locality == "Kuniyamuthur") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Archana Nagar'  id='user_area_archananagar'>Archana Nagar</option>" +
                    "<option value='Kumuram Garden'  id='user_area_illangonagar'>Kumuram Garden</option>" +
                    "<option value='Rathinapuri'  id='user_area_rathinapuri'>Rathinapuri</option>"
                );
            } else if (user_information_locality == "Madukkarai") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Kurumbapalayam'  id='user_area_kurumbapalayam'>Kurumbapalayam</option>" +
                    "<option value='Navakkarai'  id='user_area_navakkarai'>Navakkarai</option>"
                );
            } else if (user_information_locality == "Neelambur") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='NPS Nagar'  id='user_area_npsnagar'>NPS Nagar</option>"
                );
            } else if (user_information_locality == "Ondipudhur") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Stanes Colony'  id='user_area_stanescolony'>Stanes Colony</option>" +
                    "<option value='Tagore Colony'  id='user_area_tagorecolony'>Tagore Colony</option>" +
                    "<option value='Weavers Colony'  id='user_area_weaverscolony'>Weavers Colony</option>"
                );
            } else if (user_information_locality == "Peelamedu") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='PKD Nagar'  id='user_area_pkdnagar'>PKD Nagar</option>" +
                    "<option value='Ragavendra Nagar'  id='user_area_ragavendranagar'>Ragavendra Nagar</option>" +
                    "<option value='Sivasakthi Nagar'  id='user_area_sivasakthinagar'>Sivasakthi Nagar</option>"
                );
            } else if (user_information_locality == "P N Palayam") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='G K S Nagar'  id='user_area_gksnagar'>G K S Nagar</option>"
                );
            } else if (user_information_locality == "Podanur") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Indra Nagar'  id='user_area_indranagar'>Indra Nagar</option>" +
                    "<option value='Srinivasa Nagar'  id='user_area_srinivasanagar'>Srinivasa Nagar</option>" +
                    "<option value='SRP Colony'  id='user_area_srpcolony'>SRP Colony</option>"
                );
            } else if (user_information_locality == "Perur") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Kurunji Nagar'  id='user_area_kurunjinagar'>Kurunji Nagar</option>" +
                    "<option value='Priya Nagar'  id='user_area_priyanagar'>Priya Nagar</option>" +
                    "<option value='Roja Nagar'  id='user_area_rojanagar'>Roja Nagar</option>"
                );
            } else if (user_information_locality == "Ramanathapuram") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Bharathi Nagar'  id='user_area_bharathinagar'>Bharathi Nagar</option>" +
                    "<option value='Murugan Nagar'  id='user_area_murugannagar'>Murugan Nagar</option>" +
                    "<option value='T Nagar'  id='user_area_tnagar'>T Nagar</option>"
                );
            } else if (user_information_locality == "Saibabacolony") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='K K Pudur'  id='user_area_kkpudur'>K K Pudur</option>" +
                    "<option value='Nesavalar Colony'  id='user_area_nesavalarcolony'>Nesavalar Colony</option>" +
                    "<option value='Ramalingam Nagar'  id='user_area_ramalingamnagar'>Ramalingam Nagar</option>"
                );
            } else if (user_information_locality == "Saravanampatti") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Amman Nagar'  id='user_area_ammannagar'>Amman Nagar</option>" +
                    "<option value='Kandasamy Nagar'  id='user_area_kandasamynagar'>Kandasamy Nagar</option>" +
                    "<option value='Revenue Nagar'  id='user_area_revenuenagar'>Revenue Nagar</option>"
                );
            } else if (user_information_locality == "Singanallur") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Agraharam'  id='user_area_agraharam'>Agraharam</option>" +
                    "<option value='NKG Nagar'  id='user_area_nkgnagar'>NKG Nagar</option>" +
                    "<option value='VL Nagar'  id='user_area_vlnagar'>VL Nagar</option>"
                );
            } else if (user_information_locality == "Sundarapuram") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='LIC Colony'  id='user_area_liccolony'>LIC Colony</option>" +
                    "<option value='MGR Nagar'  id='user_area_mgrnagar'>MGR Nagar</option>" +
                    "<option value='Thirumarai Nagar'  id='user_area_thirumarainagar'>Thirumarai Nagar</option>"
                );
            } else if (user_information_locality == "Thudiyalur") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Bharathiyar Nagar'  id='user_area_bharathiyarnagar'>Bharathiyar Nagar</option>" +
                    "<option value='Mullai Nagar'  id='user_area_mullainagar'>Mullai Nagar</option>" +
                    "<option value='NGGO Colony'  id='user_area_nggocolony'>NGGO Colony</option>"
                );
            } else if (user_information_locality == "Ukkadam") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Aathupalam'  id='user_area_aathupalam'>Aathupalam</option>" +
                    "<option value='Alameen Colony'  id='user_area_alameencolony'>Alameen Colony</option>" +
                    "<option value='Hilmu Nagar'  id='user_area_hilmunagar'>Hilmu Nagar</option>"
                );
            } else if (user_information_locality == "Vadavalli") {
                $("#user_information_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='EB Colony'  id='user_area_ebcolony'>EB Colony</option>" +
                    "<option value='Marutha Nagar'  id='user_area_maruthanagar'>Marutha Nagar</option>" +
                    "<option value='RG Nagar'  id='user_area_rgnagar'>RG Nagar</option>"
                );
            }
        });
    });
    </script>

    <?php
        if(isset($_POST["submit"]))
        {
            $user_name=$_POST["user_name"];
            $user_email=$_POST["user_email"];
            $user_phonenumber=$_POST["user_phonenumber"];
            $user_information_locality=$_POST["user_information_locality"];
            $user_information_area=$_POST["user_information_area"];
            $user_information_title=$_POST["user_information_title"];
            $user_information_description=$_POST["user_information_description"];
            $user_information_date=date("d m Y");

            $name=$_FILES['user_information_attachment']['name'];  
            $temp_name=$_FILES['user_information_attachment']['tmp_name'];  
            if(isset($name) and !empty($name))
            {
                $location = 'postInformationImages/';      
                move_uploaded_file($temp_name, $location.$name);
            }
            $user_information_attachment=$name;

            $sqlInsert="INSERT INTO govt_information (
                govt_information_name,
                govt_information_email,
                govt_information_number,
                govt_information_locality,
                govt_information_area,
                govt_information_title,
                govt_information_description,
                govt_information_attachment,
                govt_information_date) VALUES (
                '$user_name',
                '$user_email',
                '$user_phonenumber',
                '$user_information_locality',
                '$user_information_area',
                '$user_information_title',
                '$user_information_description',
                '$user_information_attachment',
                '$user_information_date')";

            if($conn->query($sqlInsert))
            {
                echo "<script>location.replace('success/postInformationSuccess.php');</script>";
            }
            else 
            {
                echo $conn->error;
            }

        }
    ?>

</body>

</html>