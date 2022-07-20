<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Testimonial</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Feedback</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                <table class="table table-striped" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer name</th>
                            <th>Customer Phone</th>
                            <th>Feedback</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Customer name</th>
                            <th>Customer Phone</th>
                            <th>Feedback</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php


                        if (isset($_GET['delid'])) {
                            $delid = $_GET['delid'];
                            $DELquery = "DELETE FROM testimonials WHERE t_id = $delid";
                            $delete = $con->query($DELquery);
                            if ($delete) {
                                echo "<script>window.location='testimonial.php';</script>";
                            }
                        }
                        if (isset($_GET['editid'])) {
                            $editid = $_GET['editid'];
                            $editquery = "UPDATE testimonials  
                            SET
                            status       = 1
                         WHERE t_id = $editid";
                            $edit = $con->query($editquery);
                            if ($edit) {
                               
                                echo "<script>window.location='testimonial.php';</script>";
                            }
                        }

                        if (isset($_GET['editid_one'])) {
                            $editid = $_GET['editid_one'];
                            $editquery = "UPDATE testimonials  
                            SET
                            status       = 0
                         WHERE t_id = $editid";
                            $edit = $con->query($editquery);
                            if ($edit) {
                               
                                echo "<script>window.location='testimonial.php';</script>";
                            }
                        }


                        

                        $query = "SELECT * FROM testimonials LEFT JOIN users ON users.id = testimonials.customer_id Order By t_id asc";
                        $result = $con->query($query); 
                        if ($result->num_rows > 0) {
                            foreach ($result as $key => $value) {
                                

                        ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['image']; ?></td>
                                    <td><?php echo $value['comment']; ?></td>
                                    <td><?php echo $value['created_at']; ?></td>
                                    <td>
                                        <?php
                                        if ($value['status'] == 0) { ?>
                                          
                                          <a href="?editid=<?php echo $value['t_id']; ?>" class="btn btn-success">Confirm</a>
                                          
                                          
                                          <?php } else { ?>
                                            
                                            <a href="?editid_one=<?php echo $value['t_id']; ?>" class="btn btn-info">Cancell</a>
                                        <a href="?delid=<?php echo $value['t_id']; ?>" class="btn btn-danger">remove</a>
                                        
                                        <?php } ?>
                                    </td>
                                  

                                    <td>
                   
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