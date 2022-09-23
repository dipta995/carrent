<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Driver List <a class="btn btn-info" href="create-driver.php">Create New Driver</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Drivers</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>License</th>
                            <th>Address</th>
                            <th>Riding Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>License</th>
                            <th>Address</th>
                            <th>Riding Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php


                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "UPDATE drivers  
                                                SET
                                                flag       = '1'
                                             WHERE driver_id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='drivers.php';</script>";
                            }
                        }

                        $query = "SELECT * FROM drivers where flag=0 Order By driver_id desc";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {

                        ?>
                                <tr>
                                    <td><?php echo $value['driver_id']; ?></td>
                                    <td><?php echo $value['driver_name'] ?></td>
                                    <td><?php echo $value['driver_phone']; ?></td>
                                    <td><?php echo $value['driver_license']; ?> </td>
                                    <td><?php echo $value['driver_address']; ?> </td>
                                    <td><?php echo ($value['is_active'] == 1) ? "<span style='color:red;'>Booked</spna>" : "<span style='color:green;'>Free</spna>"; ?></td>
                                    <td>
                                        <a href="edit-driver.php?editid=<?php echo $value['driver_id']; ?>" class="btn btn-info">Edit</a>
                                        <a href="?delid=<?php echo $value['driver_id']; ?>" class="btn btn-danger">Delete</a>
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