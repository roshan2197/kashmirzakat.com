<?php session_start(); ?>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<title>Withdrawl Requested</title>
<script src="js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav-dash.css">
<script src="js/nav-dash.js"></script>
<?php
$wid = $_GET['wid'];
include 'assets/connection.php';
$query1 = mysqli_query($db, "SELECT * FROM withdrawl_pending where wid = '$wid' ");
$query = mysqli_query($db, "SELECT * FROM withdrawl_request where wid = '$wid' ");
if (mysqli_num_rows($query1) == 0) {
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') { ?>

        <body id="body-pd">
            <?php
            include 'assets/admin-navbar-dash.php';
            ?>
            <div class="l-navbar " id="nav-bar">
                <nav class="nav" style="z-index: 100 !important;">
                    <div>
                        <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?> " class="nav_logo">
                            <i class='bx bx-layer nav_logo-icon'></i>
                            <span class="nav_logo-name"><b>DASHBOARD</b></span> </a>
                        <div class="nav_list">
                            <a href="admin-dashboard.php?useremail=<?php echo $useremail; ?>" class="nav_link ">
                                <i class='bx bx-grid-alt nav_icon'></i>
                                <span class="nav_name">Dashboard</span> </a>
                            <a href="admin-campaigns.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Causes" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class='bx bxs-megaphone nav_icon '></i>
                                <span class="nav_name">Causes</span> </a>
                            <a href="admin-donations.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class='bx bx-money nav_icon'></i>
                                <span class="nav_name">Donations</span> </a>
                            <a href="users.php?useremail=<?php echo $useremail; ?>" class="nav_link" title="My Donations" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class='bx bxs-user nav_icon'></i>
                                <span class="nav_name">Users</span> </a>
                            <a href="bank-pending.php?useremail=<?php echo $useremail; ?>" class="nav_link " title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <i class='bx bx-time-five nav_icon'></i>
                                <span class="nav_name">Bank Pending</span> </a>
                            <a href="admin-withdrawls.php?useremail=<?php echo $useremail; ?>" class="nav_link active" title="Withdrawls" data-bs-toggle="tooltip" data-bs-placement="bottom">
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
            <div class="height-100 p-3">

                <h1> Withdrawl Invoice</h1>
                <?php
                while ($row1 = mysqli_fetch_array($query)) {
                ?>
                    <form action="" method="post" class=" border border-2 p-3 rounded-1">
                        <div class="form-group mb-3">
                            <label class="control-label form-floating " for="fname">User Name</label>
                            <input type="text" class="form-control" value="<?php echo $row1['name']; ?>" id="" placeholder="Enter Bank Name" value="" name="name" required>
                        </div>
                        <label class="control-label form-floating " for="fname">Requested Amount</label>
                        <div class="input-group mb-3 flex-nowrap">
                            <span class="input-group-text bg-success text-light fw-bold " id="addon-wrapping">₹</span>
                            <input type="number" value="<?php echo $row1['amount']; ?>" class="form-control" name="amount" placeholder="Minimum amount ₹50 INR " aria-label="amount" aria-describedby="addon-wrapping" required>
                        </div>
                        <?php $raiseid = $row1['raiseid'];
                        $result1 = mysqli_query($db, "SELECT * FROM accepted_form where id='$raiseid' and status='Accepted' ");
                        while ($rows = mysqli_fetch_array($result1)) {
                        ?>
                            <label for="">Cause Title</label>
                            <div class="form-group mb-3 border border-1 p-2 rounded-1">
                                <a href="raise-detail.php?cause=<?php echo $rows['cause_title']; ?>">
                                    <img src="<?php echo "images/" . $rows['profile_pic']; ?>" width="40px" alt="" srcset=""> <?php echo $rows['cause_title']; ?>
                                    <i class="fas fa-external-link"></i>
                                </a>
                            </div>

                        <?php } ?>
                        <div class="form-group mb-3">
                            <label class="control-label form-floating " for="fname">Transaction Date</label>
                            <input type="date" class="form-control" id="" value="" name="tran_date">
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label form-floating " for="fname">Bank Name</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Bank Name" value="" name="bank_name">
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label form-floating " for="fname">Transaction ID</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Transaction ID / Reference No. " value="" name="tran_id">
                        </div>
                        <div class="form-group mb-3">
                            <label class="control-label " for="comment">Other Details(Optional)</label>
                            <textarea class="form-control" rows="1" placeholder="Write any optional details" name="optional" id="optional"><?php echo $row1['optional']; ?></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class=" btn btn-success me-2  fs-5" name="submit">Accept</button>
                            <button type="submit" class=" btn btn-danger fs-5" name="reject">Reject</button>
                        </div>

                    </form>
                    <?php include 'assets/footer-dash.php'; ?>

        </body>
    <?php
                }
    ?>
    </div>
    <?php
        $db = mysqli_connect("localhost", "root", "", "db");
        if (!$db) die('could not connect Mysql server');
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $tran_date = $_POST['tran_date'];
            $bank_name = $_POST['bank_name'];
            $tran_id = $_POST['tran_id'];
            $optional = $_POST['optional'];
            $status = 'accepted';
            $sql = "INSERT INTO withdrawl_pending(
                name,raiseid,samount,tran_date,bank_name,tran_id,others,status,wid ) values
                ('$name','$raiseid','$amount','$tran_date','$bank_name','$tran_id','$optional','$status','$wid') ";

            if (mysqli_query($db, $sql)) {
                $result = mysqli_query($db, "DELETE FROM withdrawl_request where wid= '$wid'");
                echo '<script>alert("Withdrawl Requested accepted by Admin")</script>';
                echo '<script>window.location = "index.php"</script>';
            } else {
                echo '<script>alert("Error in uploading data.Try again")</script>';
            }
        }

        if (isset($_POST['reject'])) {
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $optional = $_POST['optional'];
            $status = 'rejected';
            $sql = "INSERT INTO withdrawl_pending(
                name,raiseid,samount,others,status,wid ) values
                ('$name','$raiseid','$amount','$optional','$status','$wid') ";

            if (mysqli_query($db, $sql)) {
                $result = mysqli_query($db, "DELETE FROM withdrawl_request where wid= '$wid'");
                echo '<script>alert("Withdrawl request Rejected by Admin")</script>';
                echo '<script>window.location = "index.php"</script>';
            } else {
                echo '<script>alert("Error in uploading data.Try again")</script>';
            }
        }

    ?>

<?php
    } else {
        echo '<script>alert("Action Not Allowed")</script>';
        echo '<script>window.location = "index.php"</script>';
    }
} else {
    echo '<script>alert("User Request is already viewed")</script>';
    echo '<script>window.location = "index.php"</script>';
}
?>

</html>