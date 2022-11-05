<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Rent History</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Histories</li>
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
                            <th>Hours || Payment || Account No || Note</th>
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
                            <th>Hours || Payment || Account No || Note</th>
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
                            $DELquery = "DELETE FROM orders WHERE id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='car-booking.php';</script>";
                            }
                        }

                        if (isset($_GET['confirmid'])) {
                            $confirmid = $_GET['confirmid'];
                            $endtimedate("Y-m-d");
                            $editquery = "UPDATE orders  
                            SET
                            status       = '2',
                            finished_at =  now()
                            WHERE Oid = $confirmid";
                            $edit = $con->query($editquery);
                            if ($edit) {
                                echo "<script>window.location='last-rent.php';</script>";
                            }
                        }

                        $query = "SELECT orders.*,cars.*,users.*,orders.created_at as created_at,orders.finished_at as finished_at FROM orders LEFT JOIN cars ON cars.id = orders.car_id LEFT JOIN users ON users.id = orders.user_id where orders.status=2 Order By orders.Oid asc";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {
                                $total_time = round((strtotime($value['finished_at']) - strtotime($value['date'] . $value['time']))/3600, 1);
                                
                                ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['model']; ?></td>
                                    <td><?php echo $value['service_charge']; ?> Taka/Hour</td>
                                    <td><?php echo $total_time; ?> hours|| <?php echo $value['amount']; ?> Taka  || <?php echo (empty($value['account_no'])) ? "Cash": $value['account_no']; ?>  || <?php echo $value['ref']; ?></td>
                                    <td><?php echo $value['pickup_location']; ?>/<?php echo $value['dropup_location']; ?></td>
                                    <td><?php echo $value['date']; ?>/<?php echo $value['time']; ?></td>
                                    <td>
                                        <?php
                                        if ($value['trip_loop'] == 0) {
                                            echo "Not Back";
                                        } elseif ($value['trip_loop'] == 1) {
                                            echo "Return Home";
                                        } else {
                                             
                                        }
                                        echo "<br><strong>".$value['finished_at'] ."</strong>";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value['status'] == 0) {
                                            echo "<button class='btn btn-primary btn-sm'>Pending</button>";
                                        } elseif ($value['status'] == 1) {
                                            echo "<button class='btn btn-primary btn-sm'>Running</button>";
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