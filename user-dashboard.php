<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Dashoard</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>
<?php
include 'assets/connection.php';
if (isset($_SESSION['username'])) {
$useremail = $_SESSION['useremail'];
$result = mysqli_query($db, "SELECT * FROM accepted_form where email='$useremail' and status='Accepted'");
$user = mysqli_query($db, "SELECT * FROM users where email='$useremail'");
$query = mysqli_query($db, "SELECT * FROM payments where email='$useremail'and status='complete'");
if (!$db) die('could not connect Mysql server');
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <div class="l-navbar " id="nav-bar">
            <nav class="nav" style="z-index: 100 !important;">
                <div>
                    <a href="user-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_logo">
                        <i class='bx bx-layer nav_logo-icon'></i>
                        <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                    <div class="nav_list">
                        <a href="user-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="campaigns.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Causes" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-megaphone nav_icon '></i>
                            <span class="nav_name">Causes</span> </a>
                        <a href="donations.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money nav_icon'></i>
                            <span class="nav_name">Donations</span> </a>
                        <a href="my-donations.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-donate-heart nav_icon'></i>
                            <span class="nav_name">My Donations</span> </a>
                        <a href="withdrawls.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bx-money-withdraw nav_icon'></i>
                            <span class="nav_name">Withdrawls</span> </a>
                        <a href="dashboard-scholarship.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="Scholaarship" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <i class='bx bxs-graduation nav_icon'></i>
                            <span class="nav_name">Scholarships</span> </a>
                    </div>
                </div>
                <a href="logout.php" class="nav_link">
                    <i class='bx bx-log-out nav_icon' title="Signout" data-bs-toggle="tooltip" data-bs-placement="bottom"></i>
                    <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class=" bg-light">
            <h1> Dashboard</h1>
            <div class="row">

                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-warning shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">
                                        <?php
                                        $quer1 = mysqli_query($db, "SELECT * FROM accepted_form where email='$useremail' and status='Accepted'");
                                        $sum = 0;
                                        while ($row3 = mysqli_fetch_array($quer1)) {
                                            $id = $row3['id'];
                                            $pay = mysqli_query($db, "SELECT * FROM payments where raiseid='$id' and status='complete'");
                                            $sum += mysqli_num_rows($pay);
                                        }
                                        echo $sum;
                                        
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Donations</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class='bx bx-donate-heart fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                    </div>
                            </div>
                        </div>
                        <a href="donations.php?useremail=<?php echo $useremail; ?>">
                            <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-success shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">₹
                                        <?php
                                        $donations = 0;
                                        $quer = mysqli_query($db, "SELECT * FROM payments where email='$useremail'and status='complete'");
                                        while ($row = mysqli_fetch_array($quer))
                                            $donations += $row['amount'];
                                        echo $donations;
                                        ?></h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Funds Raised</div>
                                </div>
                                <div class="col-auto">
                                    <i class='fas fa-rupee-sign fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                            <small>Funds Raised</small>
                            <!-- <a href="#"><i class="fas fa-arrow-circle-right text-light"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card bg-danger shadow h-100 " style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <h1 class="mb-3 fw-bolder text-light" style="font-size: 50px !important;">
                                        <?php
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </h1>
                                    <div class="text-xs font-weight-bold text-light mb-1">
                                        Causes</div>
                                </div>
                                <div class="col-auto">
                                    <i class='bx bxs-megaphone fs-5' style="color:rgba(0,0,0,0.5); font-size:100px !important;" ;></i>
                                </div>
                            </div>
                        </div>
                        <a href="campaigns.php?useremail=<?php echo $useremail; ?>">
                            <div class=" text-light text-center p-1 mb-0 " style="background-color: rgba(0,0,0,0.3);">
                                <small>view....</small><i class="fas fa-arrow-circle-right text-light"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--Container Main end-->

            <?php
            $sql = "SELECT * FROM payments where email='$useremail'and status='complete'";
            $result = mysqli_query($db, $sql);
            $chart_data = "";
            while ($row = mysqli_fetch_array($result)) {

                $productname = $row['name'];
                $month[]  = date_format(date_create($row['date']), "M d,Y");
                $sales[] = $row['amount'];
            }
            if(mysqli_num_rows($result)>0){
                
            ?>

            <div class="col-12 col-lg-6 col-md-6">
                <h3 class="page-header py-2">Donations </h3>
                <canvas id="chartjs_line"></canvas>
            </div>
            <?php
            } ?>

            <div class="row row-cols-1 mt-2 row-cols-md-2 row-cols-lg-2 g-4">
                <div class="col col-12 col-lg-6 col-md-6">
                        <?php
                        $quer1 = mysqli_query($db, "SELECT * FROM accepted_form where email='$useremail' and status='Accepted'");
                    while ($row3 = mysqli_fetch_array($quer1)) {
                        $id = $row3['id'];
                        $res = mysqli_query($db, "SELECT * FROM payments where raiseid='$id'and status='complete' LIMIT 1");
                        if (mysqli_num_rows($res) > 0) {
                            while ($row2 = mysqli_fetch_array($res)) {
                                $date  = date_format(date_create($row2['date']), "M d,Y");
                                $name = $row2['name'];
                                if ($row2['checked'] == 'yes') {
                                    $donar = 'Anonymous';
                                } else {
                                    $donar = $row2['name'];
                                }
                                $email = $res2['email'];
                        ?>
                    <div class="card h-100 rounded-1 shadow">
                                <h5 class="card-title p-2 text-muted">Recent Donations</h5>
                                <div class="media d-flex justify-content-around border" style=" padding:10px;">
                                    <?php
                                    $res2 = mysqli_query($db, "SELECT * FROM users where email='$email' ");
                                    if (mysqli_num_rows($res2) > 0) {
                                        while ($row3 = mysqli_fetch_array($res2)) {
                                            if ($row2['checked'] == 'yes') {
                                                $image = 'profile.png';
                                            } else {
                                                $image = $row3['profile_pic'];
                                            }
                                    ?>
                                            <img src="<?php echo "images/" . $image; ?>" height="64px" width="64px" class="rounded-circle " alt="...">
                                        <?php
                                        }
                                        $days = 1;
                                    } else { ?>
                                        <img src="images/profile.png" height="64px" width="64px" class="rounded-circle " alt="...">
                                    <?php
                                    } ?>
                                    <div class="media-body card-body w-75">
                                        <?php
                                        $quer1 = mysqli_query($db, "SELECT * FROM accepted_form where id='$id' and status='Accepted' ");
                                        while ($row3 = mysqli_fetch_array($quer1)) {
                                        ?>
                                            <a href="payment-details.php?tid=<?php echo $row2['tran_id']; ?>"><?php echo $row3['cause_title']; ?></a>
                                            <div class=" d-flex justify-content-between">
                                            <?php } ?>
                                            <h6 class="mt-0 text-muted mt-1">by <?php echo $donar; ?>/<?php echo $date ?></h6>
                                            <b class="text-success">₹<?php echo $row2['amount']; ?></b>
                                            </div>
                                    </div>
                                </div>
                                <a class="card-title border-top p-1 text-center" href="campaigns.php?useremail=<?php echo $useremail; ?>">View all</a>
                            <?php } }
                        } ?>
                    </div>
                </div>
                <div class="col col-12 col-lg-6 col-md-6  ">
                        <?php
                        $res = mysqli_query($db, "SELECT * FROM accepted_form where email='$useremail' and status='Accepted' LIMIT 1");
                        if (mysqli_num_rows($res) > 0) {
                            while ($row2 = mysqli_fetch_array($res)) {
                                $date  = date_format(date_create($row2['date']), "M d,Y");
                        ?>
                    <div class="card rounded-1 shadow">
                                <h5 class="card-title p-2 text-muted">Recent Causes</h5>
                                <div class="media d-flex justify-content-around border" style=" padding:10px;">
                                            <img src="<?php echo "images/" . $row2['profile_pic']; ?>" height="64px" width="64px" class="rounded-circle " alt="...">
                                        <?php
                                         ?>
                                    <div class="media-body card-body w-75">
                                        <?php
                                        $quer1 = mysqli_query($db, "SELECT * FROM accepted_form where id='$id' and status='Accepted'");
                                        while ($row3 = mysqli_fetch_array($quer1)) {
                                        ?>
                                            <a href="payment-details.php?tid=<?php echo $row2['cause_title']; ?>"><?php echo $row2['cause_title']; ?></a>
                                            <div class=" d-flex justify-content-between">
                                            <?php } ?>
                                            <h6 class="mt-0 text-muted mt-1">by <?php echo $username; ?>/<?php echo $date ?></h6>
                                            </div>
                                    </div>
                                </div>
                                <a class="card-title border-top p-1 text-center" href="campaigns.php?useremail=<?php echo $useremail; ?>">View all</a>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
<?php include 'assets/footer-dash.php';?>
    </body>

</html>
<script src=" //code.jquery.com/jquery-1.9.1.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("chartjs_line").getContext('2d');

    var myChart = new Chart(ctx, {

        type: 'line',

        axisY: {
            lineThickness: 3,
            lineColor: "blue"

        },

        data: {
            labels: <?php echo json_encode($month); ?>,

            datasets: [{
                backgroundColor: [
                    "rgba(0,0,0,0)"
                ],
                color: ["#fff"],
                borderColor: ["rgba(0,0,255)"],
                data: <?php echo json_encode($sales); ?>,
            }]
        },
        options: {

            legend: {
                display: true,
                position: 'bottom',

                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
            },


        }
    });
</script>

</div>
<?php
}else{
    echo '<script>alert("Unauthorised user")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>