<?php include 'header.php'; ?>
<main>
<div class="container-fluid px-4">
    <h1 class="mt-4">Create new categories <a class="btn btn-info" href="categories.php">category</a></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
    <div class="card mb-4">
    <?php

    if (isset($_POST['submit'])) {
        $editid = $_GET['editid'];
        $carid = $_GET['carid'];
        $driver_id = $_POST['driver_id'];
    
        $editquery = "UPDATE orders  
        SET
        status      = 1,
        driver_id = $driver_id
     WHERE Oid = $editid";
        $edit = $con->query($editquery);
        
        if ($edit) {
            $dirverque = "UPDATE cars  
        SET
        flag       = 1
     WHERE id = $carid";
        $edit = $con->query($dirverque);
        $editquery = "UPDATE drivers  
        SET
        is_active       = 1
     WHERE driver_id = $driver_id";
        $edit = $con->query($editquery);

            echo "<script>window.location='car-booking.php';</script>";
        }
    }
                    ?>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
         
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0"> 
                                <select name="driver_id" required class="form-control">
                                    <?php
                                     $driverquery = "SELECT * FROM drivers where is_active=0 and flag=0";
                                     $drivers = $con->query($driverquery);
                                     if ($drivers->num_rows > 0) {
                                         foreach ($drivers as $key => $value) {     
                                    ?>
                                    <option value="<?php echo $value['driver_id'] ?>"><?php echo $value['driver_name'] ?></option>
                                    <?php
                                         } }
                                    ?>
                                </select>
                        
                            </div>
                        </div>
                       
                     
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button class="btn btn-primary btn-block" type="submit" name="submit">Confirm</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    <div style="height: 100vh"></div>
</div>
</main>
             <?php include 'footer.php'; ?>