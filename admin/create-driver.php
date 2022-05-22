<?php include 'header.php'; ?>
<main>
<div class="container-fluid px-4">
    <h1 class="mt-4">Create new Driver <a class="btn btn-info" href="categories.php">category</a></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Driver</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
             <?php
    //      function validation($data){
    //     $data = trim($data);
    //     $data = stripcslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }
                  
                    if(isset($_POST['submit'])){
                        $driver_name =$_POST['driver_name'];
                        $driver_phone =$_POST['driver_phone'];
                        $driver_license =$_POST['driver_license'];
                        $driver_address =$_POST['driver_address'];
                        
                        

                      

                        if (empty($driver_name)||empty($driver_phone)||empty($driver_license)||empty($driver_address) ) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        }
                        else{
                             
                             
                            $sql = "INSERT INTO drivers (driver_name,driver_phone,driver_license,driver_address)
                    VALUES ('$driver_name','$driver_phone','$driver_license','$driver_address')";

                    if ($con->query($sql) === TRUE) {
                       
                           
                    echo "<span class='success-msg'>New record created successfully</span>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                        }
                        
                    
                    }

                    ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="driver_name" required class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                <label for="inputFirstName">Driver name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="driver_phone"  required class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                <label for="inputFirstName">Phone No</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="driver_license" required class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                <label for="inputFirstName">Licence</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <textarea name="driver_address" required class="form-control" id="inputFirstName" ></textarea>
                                <label for="inputFirstName">Address</label>
                            </div>
                        </div>
                       
                     
                       
                     
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button class="btn btn-primary btn-block" type="submit" name="submit">Create Car</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    <div style="height: 100vh"></div>
    <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
</div>
</main>
             <?php include 'footer.php'; ?>