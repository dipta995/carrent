<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Booking List </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Cars</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table class="table table-striped" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer name</th>
                            <th>Customer Phone</th>
                            <th>Car model</th>
                            <th>Service Charge</th>
                            <th>Driver Charge</th>
                            <th>From/To</th>
                            <th>Return status</th>
                            <th>Pick up Date Time</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Customer name</th>
                            <th>Customer Phone</th>
                            <th>Car model</th>
                            <th>Service Charge</th>
                            <th>Driver Charge</th>
                            <th>From/To</th>
                            <th>Return status</th>
                            <th>Pick up Date Time</th>
                            <th>status</th>
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

                     

                        $query = "SELECT * FROM orders LEFT JOIN cars ON cars.id = orders.car_id LEFT JOIN users ON users.id = orders.user_id where orders.status=0 Order By orders.Oid asc";
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
                                    <td><?php echo $value['driver_food_charge']; ?> Per/Meal</td>
                                    <td><?php echo $value['pickup_location']; ?>/<?php echo $value['dropup_location']; ?></td>
                                    <td><?php echo $value['date']; ?>/<?php echo $value['time']; ?></td>
                                    <td>
                                        <?php
                                        if ($value['trip_loop'] == 0) {
                                            echo "Not back";
                                        } elseif ($value['trip_loop'] == 1) {
                                            echo "Return Home";
                                        } else {
                                            echo "something went wrong";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value['status'] == 0) {
                                            echo "Pending";
                                        } elseif ($value['status'] == 1) {
                                            echo "running";
                                        } else {
                                            echo "Nice trip";
                                        }
                                        ?>

                                    </td>

                                    <td>
                                        <a href="order-confirm.php?editid=<?php echo $value['Oid']; ?>&carid=<?php echo $value['car_id']; ?>" class="btn btn-info">Confirm</a>
                                        <a href="?delid=<?php echo $value['Oid']; ?>" class="btn btn-danger">Cancell</a>
                   
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