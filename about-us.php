<?php 
include 'assets/nav-links.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>About Us</title>
</head>

<body>
    <?php
    if (isset($_SESSION['useremail'])) {
        include 'assets/navbar.php';
        }else
        {
             include 'assets/navbar.php';
        }
            ?>
    
    <h1 class="mt-3 fw-bolder text-center" style="font-family:roboto !important; ">About Us</h1>
    <div class="card m-5 mt-4 p-4 shadow bg-light">
    <div class="row row-cols-1 row-cols-lg-2 "  >
        <div class="col-8">
            <h1 class="  text-decoration-underline" style="font-family:Georgia !important;">Who we are -</h1> 
            <p style="font-family:roboto !important;"><b class='fs-5'>Kashmirzakat.com</b> is a one-of-its-kind Social Crowdfunding platform floated by the Sahuliyat Kashmir Voluntary Trust (SKVT)  with a view to bring the Zakat Seekers and Zakat Givers on a unified platform. 
            Its objective is to undertake its operations purely with the intent of bringing socio-economic transformation in the lives of the people, without seeking to generate any commercial surplus. 
            Zakat is a mandatory charity which Muslims are obliged to pay if wealth is above a threshold limit in a year. 
            Although most people dispense the necessary Zakat amount, it is unorganized to a great extent.
            Such unorganized disbursement isn’t a sustainable solution to the backwardness of the community. 
            Therefore, SKVT has decided to undertake an initiative for implementation of a collective system of Zakat. 
            This platform, KashmirZakat.com is a step in the direction of mobilizing the collection of Zakat, Sadqa, Fitra and other charities in a collaborative way and channelize these collections for providing benefits to the poor and backward sections of the society for their overall survival, upliftment, development and growth.</p>
            <p style="font-family:roboto !important;"><b class='fs-5'>Sahuliyat Kashmir Voluntary Trust</b>  is a registered society under the Indian Trust Act 1882, Jammu and Kashmir (Reg. No. 3159/12/18). Also Registered Under   NITI Aayog Under UID No; JK/2019/0235671 It is a non-profit organization of Like Minded Youth and volunteers to share their knowledge, intellect, experience and skills for the overall development of the society</p>
        </div>
        <div class="col-4 d-flex align-items-center">
            <img src="images/about.svg" class="" width="90%">
        </div>
    </div>
    </div>

    <?php include 'assets/footer.php'; ?>


</body>

</html>