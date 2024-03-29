<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tracking List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Cars</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table class="table table-striped" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Car Model</th>
                            <th>Service Charge</th>
                            <th>Driver Charge</th>
                            <th>Driver</th>
                            <th>From/To</th>
                            <th>Pick up (Date/Time)</th>
                            <th>Return Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Car Model</th>
                            <th>Service Charge</th>
                            <th>Driver Charge</th>
                            <th>Driver</th>
                            <th>From/To</th>
                            <th>Pick up (Date/Time)</th>
                            <th>Return Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php


                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "DELETE FROM orders WHERE Oid = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='car-booking.php';</script>";
                            }
                        }

                       
                        $query = "SELECT * FROM orders LEFT JOIN cars ON cars.id = orders.car_id LEFT JOIN drivers ON orders.driver_id = drivers.driver_id LEFT JOIN users ON users.id = orders.user_id where orders.status=1 Order By orders.Oid asc";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {

                        ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['model']; ?></td>
                                    <td><?php echo $value['service_charge']; ?> Taka/Hour</td>
                                    <td><?php echo $value['driver_food_charge']; ?> Taka/Meal</td>
                                    <td><?php echo $value['driver_name'] . "<br>" . $value['driver_phone']; ?></td>
                                    <td><?php echo $value['pickup_location']; ?>/<?php echo $value['dropup_location']; ?></td>
                                    <td><?php echo $value['date']; ?>/<?php echo $value['time']; ?></td>
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
                                            echo "<button class='btn btn-primary btn-sm'>Pending</button>";
                                        } elseif ($value['status'] == 1) {
                                            if(strtotime($value['date'] . $value['time'])<strtotime($today_formatted)){
                                                echo "<button class='btn btn-primary btn-sm'>Running</button>"; ?>
                                               <a href="payment.php?confirmid=<?php echo $value['Oid']; ?>" class="btn btn-info btn-sm">Finish</a>

                                            <?php }else{
                                                echo "<button class='btn btn-primary btn-sm'>Booked</button>";

                                            }
                                            // echo "<button class='btn btn-primary btn-sm'>Running</button>";
                                        } else {
                                            echo "<button class='btn btn-primary btn-sm'>Nice Trip</button>";
                                        }
                                        ?>

                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body"></div>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>