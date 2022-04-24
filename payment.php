<?php
include 'assets/connection.php';
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    // $username = $_SESSION['username'];
    $type = $_POST['type'];
    $amt = $_POST['amount'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $comment = $_POST['comment'];
    $method = $_POST['method'];
    $optional = $_POST['optional'];
    $utip = $_POST['tip'];
    if($utip == 'other'){
        $utip = $_POST['other'];
    }
    $tip = $utip * $amt / 100;
    if (!empty($_POST['checked'])) {
        $checked = $_POST['checked'];
    } else {
        $checked = '';
    }

    $tran_date = $_POST['tran_date'];
    $bank_name = $_POST['bank_name'];
    $tran_id = $_POST['tran_id'];
    $sql = "INSERT INTO bank_pending(
        raiseid,type,amount,name,email,phone,city,country,comment,method,tran_date,bank_name,tran_id,optional,checked,status,tip )values
    ('$id','$type','$amt','$name','$email','$phone','$city','$country','$comment','$method','$tran_date','$bank_name','$tran_id','$optional','$checked','complete','$tip')";

    if (mysqli_query($db, $sql)) {
        echo '<script>alert("Payment Successful")</script>';
        echo '<script>window.location = "payment-successful.php"</script>';
    } else {
        echo '<script>alert("Error in uploading data")</script>';
    }
}
