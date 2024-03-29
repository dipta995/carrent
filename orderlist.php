<?php include 'header.php';
if (isset($_SESSION['id'])) {
} else {
    header('Location:login.php');
}
if (isset($_GET['confirmid'])) {
    $confirmid = $_GET['confirmid'];
    $query = "SELECT * FROM orders WHERE Oid=$confirmid";
    $result = $con->query($query);
    $value = mysqli_fetch_array($result);
    $carid = $value['car_id'];
    $driver_id = $value['driver_id'];
    $endtime = date("Y-m-d"); 
    $editquery = "UPDATE orders  
    SET
    status       = '2',
    finished_at =  now()
    WHERE Oid = $confirmid";
    $edit = $con->query($editquery);
    if ($edit) {
        $editquery = "UPDATE cars  
        SET
        flag       = '0'
     WHERE id = $carid";
        $edit = $con->query($editquery);
        $editquery = "UPDATE drivers  
        SET
        is_active       = 0
     WHERE driver_id = $driver_id";
        $edit = $con->query($editquery);

        echo "<script>window.location='orderlist.php';</script>";
    }
}
?>



<style>
    .table thead th {
        border-bottom: 2px solid #01d28e !important;
        border-radius: 10px !important;
    }
</style>
<section class="ftco-section contact-section">
    <h4 class="d-flex justify-content-center">My Order List</h4>
    <hr>
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 block-9 mb-md-5">
                <table class="table table-striped" id="datatablesSimple">
                    <thead>
                        <tr style="border: 2px solid #01d28e; text-align:center;">
                            <th>ID</th>
                            <th>Car Model</th>
                            <th>Service Charge</th>
                            <th>Driver Charge</th>
                            <th class="desable-menu">Hours || Payment || Account No</th>
                            <th>From/To</th>
                            <th>Pickup (Date/Time)</th>
                            <th>Driver</th>
                            <th>Return Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody style="margin-top: 10px;">
                        <?php
                        $user_id = $_SESSION['id'];

                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "DELETE FROM orders WHERE Oid = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='orderlist.php';</script>";
                            }
                        }

                        $query = "SELECT orders.*,cars.*,drivers.*,orders.created_at as created_at,orders.finished_at as finished_at FROM orders LEFT JOIN cars 
                        ON cars.id = orders.car_id LEFT JOIN drivers 
                        ON orders.driver_id = drivers.driver_id
                        where orders.user_id=$user_id Order By orders.status asc";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {
                                $total_time = round((strtotime($value['finished_at']) - strtotime($value['date'] . $value['time']))/3600, 1);                        ?>
                        
                                <tr style="border: 2px solid #6197cd; text-align:center;">
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['model']; ?></td>
                                    <td><?php echo $value['service_charge']; ?> Taka/Hour</td>
                                    <td><?php echo $value['driver_food_charge']; ?> Taka/Meal</td>
                                   <?php if($value['finished_at'] != null){ ?>
                                
                                <td><?php echo $total_time; ?> hours|| <?php echo $value['amount']; ?> Taka  || <?php echo (empty($value['account_no'])) ? "Cash": $value['account_no']; ?>  </td>
                                <?php }else{ ?>
                                    <td>N/A</td>
                                </style>
                                <?php } ?>
                                    <td><?php echo $value['pickup_location']; ?>/<?php echo $value['dropup_location']; ?></td>
                                    <td><?php echo $value['date']; ?>/<?php echo $value['time']; ?></td>
                                    <td>
                                        <?php echo $value['driver_name'] . "<br>" . $value['driver_phone']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value['trip_loop'] == 0) {
                                            echo "Not Back";
                                        } elseif ($value['trip_loop'] == 1) {
                                            echo "Return Home";
                                        } else {
                                            echo "Something went wrong";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $tz = 'Asia/Dhaka';
                                        $tz_obj = new DateTimeZone($tz);
                                        $today = new DateTime("now", $tz_obj);
                                        $today_formatted = $today->format('Y-m-d H:i');
                                        if ($value['status'] == 0) {
                                            echo "<button class='btn btn-primary btn-sm'>Pending</button>"; ?>
                                            <a href="?delid=<?php echo $value['Oid']; ?>" class="btn btn-danger btn-sm">Cancel</a>

                                        <?php } elseif ($value['status'] == 1) {

                                            if(strtotime($value['date'] . $value['time'])<strtotime($today_formatted)){
                                                echo "<button class='btn btn-primary btn-sm'>Running</button>";
                                            }else{
                                                echo "<button class='btn btn-primary btn-sm'>Booked</button>";

                                            }
                                             if(strtotime($value['date'] . $value['time'])<strtotime($today_formatted)){
                                        ?>
                                            
                                            <a href="payment.php?confirmid=<?php echo $value['Oid']; ?>" class="btn btn-info btn-sm">Finish</a>

                                        <?php } } else {
                                            echo "<strong style='color:green;'>".$value['finished_at']. "</strong><button class='btn btn-primary btn-sm'>Finished</button>"; ?>
                                            <a href="car-single.php?carid=<?php echo $value['car_id']; ?>" class="btn btn-success btn-sm">Rating Us</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Oxygen);

    /* Page layout */

    body {
        background-color: #fff;
        margin: 0;
        padding: 0;
        font-family: 'Oxygen', sans-serif;
        color: #444;
        font-size: 15px;
        line-height: 18px;
        font-weight: 300;
    }

    header {
        margin: 0;
        background: #000;
        height: 65px;
        padding: 1px;
    }

    article {
        margin: 40px 30px;
    }

    h1 {
        font-family: 'Open Sans Condensed', sans-serif;
        letter-spacing: 1px;
        font-size: 2.3em;
        line-height: 44px;
        text-transform: uppercase;
        color: #fff;
        font-weight: 900;
        margin: 0;
        padding: 10px 0 0 30px;
        letter-spacing: 2px;
    }

    h2 {
        margin: 20px 0 10px 0;
        font-weight: 900;
    }

    p {
        margin: 20px 0 5px 0;
    }


    /* Table Layout */

    table.vitamins {
        margin: 20px 0 0 0;
        border-collapse: collapse;
        border-spacing: 0;
        background: #212121;
        color: #fff;
    }

    table.vitamins th,
    table.vitamins td {
        text-align: center;
    }

    table.vitamins thead {
        line-height: 12px;
        background: #2e63e7;
        text-transform: uppercase;
    }

    table.vitamins thead th {
        color: #fff;
        padding: 10px;
        letter-spacing: 1px;
        vertical-align: bottom;
    }

    table.vitamins thead th:nth-child(1) {
        width: 5%;
        text-align: left;
        padding-left: 20px;
    }

    table.vitamins thead th:nth-child(2) {
        width: 30%;
    }

    table.vitamins thead th:nth-child(3) {
        width: 20%;
    }

    table.vitamins thead th:nth-child(4) {
        width: 15%;
    }

    table.vitamins thead th:nth-child(5) {
        width: 15%;
    }

    table.vitamins thead th:nth-child(6) {
        width: 15%;
    }

    table.vitamins tbody {
        font-size: 1em;
        line-height: 15px;
    }

    table.vitamins tbody tr {
        border-top: 2px solid rgba(109, 176, 231, 0.8);
        transition: background 0.6s, color 0.6s;
    }

    table.vitamins tbody tr:nth-child(even) {
        background: rgba(255, 255, 255, 0.2);
    }

    table.vitamins tbody tr:hover {
        color: #000;
        background: rgba(255, 255, 255, 0.7);
        font-weight: 900;
    }

    table.vitamins tbody td {
        padding: 12px;
    }

    table.vitamins tbody tr:hover td:first-child {
        background: rgba(0, 0, 0, 0);
    }

    table.vitamins tbody td:first-child {
        text-align: left;
        padding-left: 20px;
        font-weight: 700;
        background: rgba(109, 176, 231, 0.35);
        transition: backgrounf 0.6s;
    }

    table.vitamins tfoot {
        font-size: 0.8em;
    }

    table.vitamins tfoot tr {
        border-top: 2px solid #2e63e7;
    }

    table.vitamins tfoot td {
        color: rgba(255, 255, 215, 0.6);
        text-align: left;
        line-height: 15px;
        padding: 15px 20px;
    }


    /* Mobile Layout */

    @media screen and (max-width: 400px) {
        h1 {
            font-size: 34px;
            line-height: 36px;
            padding-left: 15px;
        }

        article {
            margin: 10px 15px;
        }

        table.vitamins {
            font-size: 0.8em;
        }
    }
</style>

<?php include 'footer.php'; ?>