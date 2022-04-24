<?php session_start(); ?>
<?php
error_reporting(0);
include 'assets/connection.php';
$useremail = $_SESSION['useremail'];
$six_digit_number = random_int(1000, 9999);

if ($email != '') {
    echo $six_digit_number;
}

// If upload button is clicked ...
if (isset($_POST['submit'])) {

    $profile_pic = $_FILES["profile_pic"]["name"];
    $tempname4 = $_FILES["profile_pic"]["tmp_name"];
    $folder4 = "images/" . $profile_pic;

    $cause_title = $_POST['cause_title'];
    $purpose = $_POST['purpose'];
    $amount = $_POST['amount'];
    $country = $_POST['country'];
    $location = $_POST['location'];
    $eligible = $_POST['eligible'];
    $cause_explain = $_POST['cause_explain'];
    $cause_summary = $_POST['cause_summary'];

    $doc1 = $_FILES["doc1"]["name"];
    $tempname1 = $_FILES["doc1"]["tmp_name"];
    $folder1 = "images/" . $doc1;

    $doc2 = $_FILES["doc2"]["name"];
    $tempname2 = $_FILES["doc2"]["tmp_name"];
    $folder2 = "images/" . $doc2;

    // $doc3 = $_FILES["doc3"]["name"];
    // $tempname3 = $_FILES["doc3"]["tmp_name"];
    // $folder3 = "images/" . $doc3;

    $person = $_POST['person'];
    $ngo_name = $_POST['ngo_name'];
    $ngo_num = $_POST['ngo_num'];
    $acc_name = $_POST['acc_name'];
    $acc_num = $_POST['acc_num'];
    $bank_name = $_POST['bank_name'];
    $ifsc = $_POST['ifsc'];

    // $passbook = $_FILES["passbook"]["name"];
    // $tempname7 = $_FILES["passbook"]["tmp_name"];
    // $folder7 = "images/" . $passbook;

    $pan_num = $_POST['pan_num'];

    $pan_copy = $_FILES["pan_copy"]["name"];
    $tempname5 = $_FILES["pan_copy"]["tmp_name"];
    $folder5 = "images/" . $pan_copy;

    $adhaar_num = $_POST['adhaar_num'];

    $adhaar_copy = $_FILES["adhaar_copy"]["name"];
    $tempname6 = $_FILES["adhaar_copy"]["tmp_name"];
    $folder6 = "images/" . $adhaar_copy;

    $optional = $_POST['optional'];
    
    $sql = "INSERT INTO funds_form(
        profile_pic,
        cause_title,
        purpose,
        amount, 
        country,
        location,
        eligible,
        cause_explain,
        doc1,
        doc2,
        // doc3,
        ngo_name,
        ngo_num,
        acc_name,
        acc_num,
        bank_name,
        ifsc,
        // passbook,
        pan_num,
        pan_copy,
        adhaar_num,
        adhaar_copy,
        optional,
        person,
        cause_summary,
        email)
        VALUES(
        '$profile_pic',
        '$cause_title',
        '$purpose',
        '$amount ',
        '$country',
        '$location',
        '$eligible',
        '$cause_explain',
        '$doc1',
        '$doc2',
        // '$doc3',
        '$acc_name',
        '$acc_num',
        '$bank_name',
        '$ifsc',
        // '$passbook',
        '$ngo_name',
        '$ngo_num',
        '$pan_num',
        '$pan_copy',
        '$adhaar_num',
        '$adhaar_copy',
        '$optional',
        '$person',
        '$cause_summary',
        '$useremail') ";


    if (!move_uploaded_file($tempname1, $folder1) || !move_uploaded_file($tempname2, $folder2)  || !move_uploaded_file($tempname4, $folder4) || !move_uploaded_file($tempname5, $folder5) || !move_uploaded_file($tempname6, $folder6) )
    if (mysqli_query($db, $sql)) {
        $subject = "You have raised a cause in kashmirzakat ";
        $to = $_SESSION['useremail'];
        $mailBody = '<html>
            <body>
                <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                <div>Hi, ' . $_SESSION['username'] . '</div>
                <div><h4>You have successfully raised a Cause </h4></div>
                <div><h3>'.$cause_title.'</h3></div>
                <div>Our team will update you soon</div>
                </div>
            </body>
            </html>';
        $headers = 'From: Kashmirzakat ' . "\r\n" ;
        $headers=  'Reply-To: '.$to . "\r\n" ;
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $mailBody, $headers);
        echo '<script>alert("Your request have been submitted successfully, we reach you for confirmation")</script>';
        echo '<script>window.location = "index.php"</script>';
    } else {
        echo '<script>alert("Error in Submition please try again")</script>';
        echo '<script>window.location = "fund-raise-form.php"</script>';
    }

    mysqli_close($db);
}
