<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Public Post Complaints</title>
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
    <?php include ("includes/publicNavbar.php"); ?>
    <?php include ("dbConnect.php"); ?>

    <?php

        $user_name=$_SESSION["user_name"];
        $user_email=$_SESSION["user_email"];
        $user_gender=$_SESSION["user_gender"];
        $user_address=$_SESSION["user_address"];
        $user_street=$_SESSION["user_street"];
        $user_city=$_SESSION["user_city"];
        $user_pincode=$_SESSION["user_pincode"];
        $user_phonenumber=$_SESSION["user_phonenumber"];
        $user_proof=$_SESSION["user_proof"];
        $user_password=$_SESSION["user_password"];

    ?>

    <div class="container">
        <div class="jumbotron" style="background: #24252a;">
            <h1>Complaining Person Details</h1>
            <form name="myform" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_name">Name :</label>
                        <input type="text" class="form-control" name="user_name" value='<?php echo $user_name;?>'
                            id="user_name" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_gender">Gender :</label><br>
                        <input type="text" class="form-control" name="user_gender" value='<?php echo $user_gender;?>'
                            id="user_gender" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_email">Email-ID :</label>
                        <input type="text" class="form-control" name="user_email" value='<?php echo $user_email;?>'
                            id="user_email" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_address">Address :</label>
                        <input type="text" class="form-control" name="user_address" value='<?php echo $user_address;?>'
                            id="user_address" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="user_street">Street :</label>
                        <input type="text" class="form-control" name="user_street" value='<?php echo $user_street;?>'
                            id="user_street" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="user_city">City :</label>
                        <input type="text" class="form-control" name="user_city" value='<?php echo $user_city;?>'
                            id="user_city" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="user_pincode">Pincode :</label>
                        <input type="text" class="form-control" name="user_pincode" value='<?php echo $user_pincode;?>'
                            id="user_pincode" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="user_phonenumber">Phone Number :</label>
                        <input type="number" class="form-control" name="user_phonenumber"
                            value='<?php echo $user_phonenumber;?>' id="user_phonenumber" readonly>
                    </div>
                </div>
                <h1>Complaint Location</h1>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_complaint_locality">Locality</label>
                        <select class="form-control" name="user_complaint_locality" id="user_complaint_locality">
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
                        <div id="user_complaint_locality_error"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_complaint_area">Area</label>
                        <select class="form-control" name="user_complaint_area" value="" id="user_complaint_area"
                            disabled>
                            <option value="">Choose</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_complaint_specificlocation">Specific Location</label>
                    <textarea class="form-control" name="user_complaint_specificlocation"
                        id="user_complaint_specificlocation" rows="5"> </textarea>
                    <div id="user_complaint_specificlocation_error"></div>
                </div>
                <h1>Complaint Types</h1>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="user_complaint_type">Choose your Complaint</label>
                        <select class="form-control" name="user_complaint_type" id="user_complaint_type"
                            onchange='Others(this.value);'>
                            <option value="Choose">Choose</option>
                            <option value="Garbage" id="user_complaint_type_garbage">Garbage</option>
                            <option value="General" id="user_complaint_type_general">General</option>
                            <option value="Park and Playground" id="user_complaint_type_parkandplayground">Park and
                                Playground</option>
                            <option value="Public Health" id="user_complaint_type_publichealth">Public Health</option>
                            <option value="Road and Footpath" id="user_complaint_type_roadandfootpath">Road and Footpath
                            </option>
                            <option value="Street Light" id="user_complaint_type_streetlight">Street Light</option>
                            <option value="Water Stagnation" id="user_complaint_type_waterstagnation">Water Stagnation
                            </option>
                            <option value="Others" id="user_complaint_type_others">Others</option>
                        </select>
                        <div id="user_complaint_type_error"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="user_complaint_type_complaint">Title of the complaint</label>
                        <select class="form-control" name="user_complaint_type_complaint"
                            id="user_complaint_type_complaint" disabled>
                            <option value="">Choose</option>
                        </select>
                    </div>
                </div>
                <div class="others box">
                    <label for="user_complaint_type_othertext" id="user_complaint_other_label"
                        style='display:none;'>Title of
                        the complaint :<p>(Fill
                            only if your complaint
                            type is others)</p></label>
                    <input type="text" value="" class="form-control" name="user_complaint_type_othertext"
                        id="user_complaint_type_othertext" style='display:none;'>
                    <div id="user_complaint_type_othertext_error"></div>
                </div>
                <div class="form-group">
                    <label for="user_complaint_description">Description of your Complaint</label>
                    <textarea class="form-control" name="user_complaint_description" id="user_complaint_description"
                        rows="5"> </textarea>
                    <div id="user_complaint_description_error"></div>
                </div>
                <h1>Attachments</h1>
                <div class="form-group">
                    <label for="user_complaint_attachment">Upload Photography of your complaint</label>
                    <input type="file" class="form-control" name="user_complaint_attachment"
                        id="user_complaint_attachment" accept=".jpg,.jpeg,.png" onchange="validateFileType(this)"
                        style="background-color:#eee;border:none;" />
                    <div id="user_complaint_attachment_error"></div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
    // validating form
    function validateform() {
        // validating select locality
        var user_complaint_locality_error = "";
        if (document.getElementById('user_complaint_locality').value == "Choose") {
            document.getElementById('user_complaint_locality_error').innerHTML = "*Please Select your locality";
            return false;
        }
        document.getElementById('user_complaint_locality_error').innerHTML = "";

        // validating specific location
        var user_complaint_specificlocation_error = "";
        var user_complaint_specificlocation = document.getElementById('user_complaint_specificlocation');
        if (user_complaint_specificlocation.value.trim() == "") {
            document.getElementById('user_complaint_specificlocation_error').innerHTML =
                "*Specific location is required!";
            return false;
        }
        document.getElementById('user_complaint_specificlocation_error').innerHTML = "";
        var user_complaint_specificlocation_pattern = /^[a-zA-Z0-9\s,'-/]*$/;
        if ((!user_complaint_specificlocation.value.match(user_complaint_specificlocation_pattern))) {
            document.getElementById('user_complaint_specificlocation_error').innerHTML =
                "*Invalid specific location";
            return false;
        }
        document.getElementById('user_complaint_specificlocation_error').innerHTML = "";

        // validating choose complaint
        var user_complaint_type_error = "";
        if (document.getElementById('user_complaint_type').value == "Choose") {
            document.getElementById('user_complaint_type_error').innerHTML = "*Please select your complaint type";
            return false;
        }
        document.getElementById('user_complaint_type_error').innerHTML = "";

        // // validating title of a complaint
        // var user_complaint_type_othertext_error = "";
        // var user_complaint_type_othertext = document.getElementById('user_complaint_type_othertext');
        // if (user_complaint_type_othertext.value == "") {
        //     document.getElementById('user_complaint_type_othertext_error').innerHTML =
        //         "*Title of your complaint is Required!";
        //     return false;
        // }
        // var user_complaint_type_othertext_pattern = /^[A-Za-z ]+$/;
        // if ((!user_complaint_type_othertext.value.match(user_complaint_type_othertext_pattern))) {
        //     document.getElementById('user_complaint_type_othertext_error').innerHTML =
        //         "*Title must contain only alphabets";
        //     return false;
        // }
        // document.getElementById('user_complaint_type_othertext').innerHTML = "";

        // validating description of a complaint
        var user_complaint_description_error = "";
        var user_complaint_description = document.getElementById('user_complaint_description');
        if (user_complaint_description.value.trim() == "") {
            document.getElementById('user_complaint_description_error').innerHTML =
                "*Description of your complaint is required!";
            return false;
        }
        document.getElementById('user_complaint_description_error').innerHTML = "";
        var user_complaint_description_pattern = /^[a-zA-Z0-9\s,'-/]*$/;
        if ((!user_complaint_description.value.match(user_complaint_description_pattern))) {
            document.getElementById('user_complaint_description_error').innerHTML =
                "*Invalid Description";
            return false;
        }
        document.getElementById('user_complaint_description_error').innerHTML = "";
    }

    //validating file upload
    function validateFileType(input) {
        var fileName = input.value,
            idxDot = fileName.lastIndexOf(".") + 1,
            extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (!["jpg", "jpeg", "png"].includes(extFile)) {
            document.getElementById('user_complaint_attachment_error').innerHTML =
                "*Invalid File format upload in .jpg .jpeg .png";
            return false;
        }
        document.getElementById('user_complaint_attachment_error').innerHTML = "";
    }

    // sort text in select and search text
    $(document).ready(function() {
        $('select').selectize({
            sortField: 'text'
        });
    });

    function Others(val) {
        var element = document.getElementById('user_complaint_type_othertext');
        var label = document.getElementById('user_complaint_other_label');
        if (val == 'Choose' || val == 'Others')
            element.style.display = 'block';
        else
            element.style.display = 'none';
        if (val == 'Choose' || val == 'Others')
            label.style.display = 'block';
        else
            label.style.display = 'none';
    }



    // disable select until first select is selected
    $("select[name='user_complaint_locality']").change(function() {
        $("select[name='user_complaint_area']").removeAttr("disabled");
    });

    $("select[name='user_complaint_type']").change(function() {
        $("select[name='user_complaint_type_complaint']").removeAttr("disabled");
    });

    // areas according to locality
    $(document).ready(function() {
        $("#user_complaint_locality").change(function() {
            var user_complaint_locality = $(this).val();
            if (user_complaint_locality == "Avarampalayam") {
                $("#user_complaint_area").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Gandhi Nagar'  id='user_area_gandhinagar'>Gandhi Nagar</option>" +
                    "<option value='Illango Nagar'  id='user_area_illangonagar'>Illango Nagar</option>" +
                    "<option value='Kamaraj Nagar'  id='user_area_kamarajnagar'>Kamaraj Nagar</option>"
                );
            } else if (user_complaint_locality == "Chinniyampalayam") {
                $("#user_complaint_area").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Gem Nagar'  id='user_area_gemnagar'>Gem Nagar</option>" +
                    "<option value='Teachers Colony'  id='user_area_teacherscolony'>Teachers Colony</option>" +
                    "<option value='Thanam Nagar'  id='user_area_thanamnagar'>Thanam Nagar</option>"
                );
            } else if (user_complaint_locality == "Edayarpalayam") {
                $("#user_complaint_area").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Cauvery Street'  id='user_area_cauverystreet'>Cauvery Street</option>" +
                    "<option value='MGR Colony Road'  id='user_area_mgrcolonyroad'>MGR Colony Road</option>" +
                    "<option value='Rajiv Gandhi Street'  id='user_area_rajivgandhistreet'>Rajiv Gandhi Street</option>"
                );
            } else if (user_complaint_locality == "Gandhipuram") {
                $("#user_complaint_area").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Cross Cut Road'  id='user_area_crosscutroad'>Cross Cut Road</option>" +
                    "<option value='Dr Radhakrishnan Street'  id='user_area_drradhakrishnanstreet'>Dr Radhakrishnan Street</option>" +
                    "<option value='Nehru Street'  id='user_area_nehrustreet'>Nehru Street</option>"
                );
            } else if (user_complaint_locality == "Koundampalayam") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Cheran Nagar'  id='user_area_cherannagar'>Cheran Nagar</option>" +
                    "<option value='J P Nagar'  id='user_area_jpnagar'>J P Nagar</option>" +
                    "<option value='R S Nagar'  id='user_area_rsnagar'>R S Nagar</option>"
                );
            } else if (user_complaint_locality == "Kovaipudur") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Arivozi Nagar'  id='user_area_arivozinagar'>Arivozi Nagar</option>" +
                    "<option value='Gokulam Colony'  id='user_area_gokulamcolony'>Gokulam Colony</option>" +
                    "<option value='K K Nagar'  id='user_area_kknagar'>K K Nagar</option>"
                );
            } else if (user_complaint_locality == "Kuniyamuthur") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Archana Nagar'  id='user_area_archananagar'>Archana Nagar</option>" +
                    "<option value='Kumuram Garden'  id='user_area_illangonagar'>Kumuram Garden</option>" +
                    "<option value='Rathinapuri'  id='user_area_rathinapuri'>Rathinapuri</option>"
                );
            } else if (user_complaint_locality == "Madukkarai") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Kurumbapalayam'  id='user_area_kurumbapalayam'>Kurumbapalayam</option>" +
                    "<option value='Navakkarai'  id='user_area_navakkarai'>Navakkarai</option>"
                );
            } else if (user_complaint_locality == "Neelambur") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='NPS Nagar'  id='user_area_npsnagar'>NPS Nagar</option>"
                );
            } else if (user_complaint_locality == "Ondipudhur") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Stanes Colony'  id='user_area_stanescolony'>Stanes Colony</option>" +
                    "<option value='Tagore Colony'  id='user_area_tagorecolony'>Tagore Colony</option>" +
                    "<option value='Weavers Colony'  id='user_area_weaverscolony'>Weavers Colony</option>"
                );
            } else if (user_complaint_locality == "Peelamedu") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='PKD Nagar'  id='user_area_pkdnagar'>PKD Nagar</option>" +
                    "<option value='Ragavendra Nagar'  id='user_area_ragavendranagar'>Ragavendra Nagar</option>" +
                    "<option value='Sivasakthi Nagar'  id='user_area_sivasakthinagar'>Sivasakthi Nagar</option>"
                );
            } else if (user_complaint_locality == "P N Palayam") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='G K S Nagar'  id='user_area_gksnagar'>G K S Nagar</option>"
                );
            } else if (user_complaint_locality == "Podanur") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Indra Nagar'  id='user_area_indranagar'>Indra Nagar</option>" +
                    "<option value='Srinivasa Nagar'  id='user_area_srinivasanagar'>Srinivasa Nagar</option>" +
                    "<option value='SRP Colony'  id='user_area_srpcolony'>SRP Colony</option>"
                );
            } else if (user_complaint_locality == "Perur") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Kurunji Nagar'  id='user_area_kurunjinagar'>Kurunji Nagar</option>" +
                    "<option value='Priya Nagar'  id='user_area_priyanagar'>Priya Nagar</option>" +
                    "<option value='Roja Nagar'  id='user_area_rojanagar'>Roja Nagar</option>"
                );
            } else if (user_complaint_locality == "Ramanathapuram") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Bharathi Nagar'  id='user_area_bharathinagar'>Bharathi Nagar</option>" +
                    "<option value='Murugan Nagar'  id='user_area_murugannagar'>Murugan Nagar</option>" +
                    "<option value='T Nagar'  id='user_area_tnagar'>T Nagar</option>"
                );
            } else if (user_complaint_locality == "Saibaba Colony") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='K K Pudur'  id='user_area_kkpudur'>K K Pudur</option>" +
                    "<option value='Nesavalar Colony'  id='user_area_nesavalarcolony'>Nesavalar Colony</option>" +
                    "<option value='Ramalingam Nagar'  id='user_area_ramalingamnagar'>Ramalingam Nagar</option>"
                );
            } else if (user_complaint_locality == "Saravanampatti") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Amman Nagar'  id='user_area_ammannagar'>Amman Nagar</option>" +
                    "<option value='Kandasamy Nagar'  id='user_area_kandasamynagar'>Kandasamy Nagar</option>" +
                    "<option value='Revenue Nagar'  id='user_area_revenuenagar'>Revenue Nagar</option>"
                );
            } else if (user_complaint_locality == "Singanallur") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Agraharam'  id='user_area_agraharam'>Agraharam</option>" +
                    "<option value='NKG Nagar'  id='user_area_nkgnagar'>NKG Nagar</option>" +
                    "<option value='VL Nagar'  id='user_area_vlnagar'>VL Nagar</option>"
                );
            } else if (user_complaint_locality == "Sundarapuram") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='LIC Colony'  id='user_area_liccolony'>LIC Colony</option>" +
                    "<option value='MGR Nagar'  id='user_area_mgrnagar'>MGR Nagar</option>" +
                    "<option value='Thirumarai Nagar'  id='user_area_thirumarainagar'>Thirumarai Nagar</option>"
                );
            } else if (user_complaint_locality == "Thudiyalur") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Bharathiyar Nagar'  id='user_area_bharathiyarnagar'>Bharathiyar Nagar</option>" +
                    "<option value='Mullai Nagar'  id='user_area_mullainagar'>Mullai Nagar</option>" +
                    "<option value='NGGO Colony'  id='user_area_nggocolony'>NGGO Colony</option>"
                );
            } else if (user_complaint_locality == "Ukkadam") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Aathupalam'  id='user_area_aathupalam'>Aathupalam</option>" +
                    "<option value='Alameen Colony'  id='user_area_alameencolony'>Alameen Colony</option>" +
                    "<option value='Hilmu Nagar'  id='user_area_hilmunagar'>Hilmu Nagar</option>"
                );
            } else if (user_complaint_locality == "Vadavalli") {
                $("#user_complaint_area").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='EB Colony'  id='user_area_ebcolony'>EB Colony</option>" +
                    "<option value='Marutha Nagar'  id='user_area_maruthanagar'>Marutha Nagar</option>" +
                    "<option value='RG Nagar'  id='user_area_rgnagar'>RG Nagar</option>"
                );
            }
        });
    });

    // selecting particular complaint
    $(document).ready(function() {
        $("#user_complaint_type").change(function() {
            var user_complaint_type = $(this).val();
            if (user_complaint_type == "Garbage") {
                $("#user_complaint_type_complaint").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Broken Bin'  id='user_complaint_type_00'>Broken Bin</option>" +
                    "<option value='Burning Of Garbage'  id='user_complaint_type_01'>Burning Of Garbage</option>" +
                    "<option value='Improper Sweeping'  id='user_complaint_type_02'>Improper Sweeping</option>" +
                    "<option value='Removal Of Garbage'  id='user_complaint_type_03'>Removal Of Garbage</option>" +
                    "<option value='Spilling of Garbage from Lorry'  id='user_complaint_type_04'>Spilling of Garbage from Lorry</option>"
                );
            } else if (user_complaint_type == "General") {
                $("#user_complaint_type_complaint").html(
                    "<option value=''  id='Choose'>Choose</option>" +
                    "<option value='Complaints regarding Bridges/ Flyovers/ Subways'  id='user_complaint_type_10'>Complaints regarding Bridges/ Flyovers/ Subways</option>" +
                    "<option value='Complaints regarding Community hall'  id='user_complaint_type_11'>Complaints regarding Community hall</option>" +
                    "<option value='Encroachment Of public property'  id='user_complaint_type_12'>Encroachment Of public property</option>" +
                    "<option value='Poor Quality of work'  id='user_complaint_type_13'>Poor Quality of work</option>" +
                    "<option value='Slow Progress of Work'  id='user_complaint_type_14'>Slow Progress of Work</option>" +
                    "<option value='Unauthorized Advertisement Boards'  id='user_complaint_type_15'>Unauthorized Advertisement Boards</option>"
                );
            } else if (user_complaint_type == "Park and Playground") {
                $("#user_complaint_type_complaint").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Complaints regarding Playground'  id='user_complaint_type_20'>Complaints regarding Playground</option>" +
                    "<option value='Complaints regarding Park'  id='user_complaint_type_21'>Complaints regarding Park</option>" +
                    "<option value='Complaints regarding Broken Items'  id='user_complaint_type_22'>Complaints regarding Broken Items</option>" +
                    "<option value='Obstruction of Trees'  id='user_complaint_type_23'>Obstruction of Trees</option>" +
                    "<option value='Removal of Fallen Trees'  id='user_complaint_type_24'>Removal of Fallen Trees</option>" +
                    "<option value='Unauthorized Tree Cutting'  id='user_complaint_type_25'>Unauthorized Tree Cutting</option>"
                );
            } else if (user_complaint_type == "Public Health") {
                $("#user_complaint_type_complaint").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Biomedical waste / Health hazard waste removal'  id='user_complaint_type_30'>Biomedical waste / Health hazard waste removal</option>" +
                    "<option value='Complaints regarding Corporation Hospitals'  id='user_complaint_type_31'>Complaints regarding Corporation Hospitals</option>" +
                    "<option value='Complaints regarding non availability of Doctors'  id='user_complaint_type_32'>Complaints regarding non availability of Doctors</option>" +
                    "<option value='Complaints Regarding Plastics'  id='user_complaint_type_33'>Complaints Regarding Plastics</option>" +
                    "<option value='Death of Stray Animals'  id='user_complaint_type_34'>Death of Stray Animals</option>" +
                    "<option value='Dog Menace'  id='user_complaint_type_35'>Dog Menace</option>" +
                    "<option value='Flies Menace from Dumping Ground'  id='user_complaint_type_36'>Flies Menace from Dumping Ground</option>" +
                    "<option value='Illegal Draining of Sewage to SWD / Open Site'  id='user_complaint_type_37'>Illegal Draining of Sewage to SWD / Open Site</option>" +
                    "<option value='Mosquito Menace'  id='user_complaint_type_38'>Mosquito Menace</option>" +
                    "<option value='Public Health / Dengue / Malaria  / Gastro Enteritis'  id='user_complaint_type_39'>Public Health / Dengue / Malaria  / Gastro Enteritis</option>"
                );
            } else if (user_complaint_type == "Road and Footpath") {
                $("#user_complaint_type_complaint").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Formation of New Road'  id='user_complaint_type_40'>Formation of New Road</option>" +
                    "<option value='Pot hole fill up / Repairs to the damaged surface'  id='user_complaint_type_41'>Pot hole fill up / Repairs to the damaged surface</option>" +
                    "<option value='Relaying of Road'  id='user_complaint_type_42'>Relaying of Road</option>" +
                    "<option value='Removal of Shops in the Footpath'  id='user_complaint_type_43'>Removal of Shops in the Footpath</option>" +
                    "<option value='Repairs to existing Footpath'  id='user_complaint_type_44'>Repairs to existing Footpath</option>" +
                    "<option value='Request to provide Footpath'  id='user_complaint_type_45'>Request to provide Footpath</option>"
                );
            } else if (user_complaint_type == "Street Light") {
                $("#user_complaint_type_complaint").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Burning of street light in daytime'  id='user_complaint_type_50'>Burning of street light in daytime</option>" +
                    "<option value='Damage to the Electric pole'  id='user_complaint_type_51'>Damage to the Electric pole</option>" +
                    "<option value='Electric shock due to street light'  id='user_complaint_type_52'>Electric shock due to street light</option>" +
                    "<option value='New Street lights'  id='user_complaint_type_53'>New Street lights</option>" +
                    "<option value='Overhead cable wires running in a haphazard manner<'  id='user_complaint_type_54'>Overhead cable wires running in a haphazard manner</option>" +
                    "<option value='Shifting of Street light pole'  id='user_complaint_type_55'>Shifting of Street light pole</option>"
                );
            } else if (user_complaint_type == "Water Stagnation") {
                $("#user_complaint_type_complaint").html(
                    "<option value=''  id='choose'>Choose</option>" +
                    "<option value='Stagnation of Water'  id='user_complaint_type_60'>Stagnation of Water</option>" +
                    "<option value='Obstruction of Water Flow'  id='user_complaint_type_61'>Obstruction of Water Flow</option>" +
                    "<option value='Disposal of Removed Silt on the Road'  id='user_complaint_type_62'>Disposal of Removed Silt on the Road</option>" +
                    "<option value='New Drain Construction'  id='user_complaint_type_63'>New Drain Construction</option>" +
                    "<option value='Covering  Manholes of Storm Water Drain'  id='user_complaint_type_64'>Covering  Manholes of Storm Water Drain</option>" +
                    "<option value='Repairs to Storm Water Drain'  id='user_complaint_type_65'>Repairs to Storm Water Drain</option>" +
                    "<option value='Desilting of Canal'  id='user_complaint_type_66'>Desilting of Canal</option>" +
                    "<option value='Desilting of Drain'  id='user_complaint_type_67'>Desilting of Drain</option>"
                );
            } else if (user_complaint_type == "Others") {
                $("#user_complaint_type_complaint").prop('disabled', true);
                $("#user_complaint_type_complaint").html();
            }
        });
    });
    </script>

    <?php
        
        if(isset($_POST["submit"]))
        {
            $user_complaint_date=date("d m Y");
            $user_complaint_email=$user_email;
            $user_complaint_locality=$_POST["user_complaint_locality"];
            $user_complaint_area=$_POST["user_complaint_area"];
            $user_complaint_specificlocation=$_POST["user_complaint_specificlocation"];
            $user_complaint_type=$_POST["user_complaint_type"];
            $user_complaint_title=$_POST["user_complaint_type_complaint"].$_POST["user_complaint_type_othertext"];
            $user_complaint_description=$_POST["user_complaint_description"];
            $user_complaint_status="Not Acknowledged";


            $name=$_FILES['user_complaint_attachment']['name'];  
            $temp_name=$_FILES['user_complaint_attachment']['tmp_name'];  
            if(isset($name) and !empty($name))
            {
                $location = 'complaintsImages/';      
                move_uploaded_file($temp_name, $location.$name);
            }
            $user_complaint_attachment=$name;

            $sqlInsert="INSERT INTO user_complaint (user_complaint_date, user_complaint_email, user_complaint_locality, user_complaint_area, user_complaint_specificlocation, user_complaint_type, user_complaint_title, user_complaint_description, user_complaint_attachment, user_complaint_status) VALUES ('{$user_complaint_date}', '{$user_complaint_email}', '{$user_complaint_locality}', '{$user_complaint_area}', '{$user_complaint_specificlocation}', '{$user_complaint_type}', '{$user_complaint_title}', '{$user_complaint_description}', '{$user_complaint_attachment}', '{$user_complaint_status}')";
            if($conn->query($sqlInsert))
            {
                echo "<script>location.replace('success/postComplaintSuccess.php');</script>";
            }
            else 
            {
                echo $conn->error;
            }
        }
    ?>

</body>

</html>