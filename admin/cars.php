<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Car List <a class="btn btn-info" href="createcar.php">Create Car</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Cars</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Service Charge</th>
                            <th>Milage</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Service Charge</th>
                            <th>Milage</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php


                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "UPDATE cars  
                                                SET
                                                flag       = '3'
                                             WHERE id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='cars.php';</script>";
                            }
                        }

                        $query = "SELECT * FROM cars where flag=0 Order By id desc";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {

                        ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['name'] . " " . $value['model'] ?></td>
                                    <td><?php echo $value['service_charge']; ?> Taka/Hour</td>
                                    <td><?php echo $value['mileage']; ?> KM/L</td>
                                    <td><img style="height:60px;width: 60px;" src="../<?php echo $value['image']; ?>"></td>

                                    <td>
                                        <a href="editcar.php?editid=<?php echo $value['id']; ?>" class="btn btn-info">Edit</a>
                                        <a href="?delid=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
                                        <a target="_blank" href="../car-single.php?carid=<?php echo $value['id']; ?>" class="btn btn-success">Show Details</a>
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