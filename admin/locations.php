<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Location List <a class="btn btn-info" href="create-location.php">Create Location</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Location</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "DELETE FROM locations  
                        WHERE id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='locations.php';</script>";
                            }
                        }

                        $query = "SELECT * FROM locations";
                        $result = $con->query($query);
                        if ($result->num_rows > 0) {
                            $i = 0;
                            foreach ($result as $key => $value) {
                                $i++;

                        ?>
                                <tr>
                                    <td><?php echo $i + 1; ?></td>
                                    <td><?php echo $value['location_name'] ?></td>

                                    <td>
                                        <a href="edit-location.php?editid=<?php echo $value['id']; ?>" class="btn btn-info">Edit</a>
                                        <a href="?delid=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
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