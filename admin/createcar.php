<?php include 'header.php'; ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create New Car <a class="btn btn-info" href="cars.php">Cars</a></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Cars</li>
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

                    if (isset($_POST['submit'])) {
                        $cat_id = $_POST['cat_id'];
                        $name = $_POST['name'];
                        $model = $_POST['model'];

                        $mileage = $_POST['mileage'];
                        $seats = $_POST['seats'];
                        $fuel = $_POST['fuel'];
                        $service_charge = $_POST['service_charge'];
                        $driver_food_charge = $_POST['driver_food_charge'];
                        $description = mysqli_real_escape_string($con, $_POST['description']);
                        $flag = $_POST['flag'];
                        $luggage = $_POST['luggage'];
                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div            = explode('.', $file_name);
                        $file_ext       = strtolower(end($div));
                        $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "image/" . $unique_image;
                        $move_image = "../image/" . $unique_image;




                        if (empty($name) || empty($model) || empty($mileage) || empty($seats) || empty($service_charge)) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>";
                        } elseif (empty($file_ext)) {
                            echo "<span class='error-msg'>Image is required</span>";
                        } else if ($file_size > 1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB! </span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                        } else {
                            $airconditions = (empty($_POST['airconditions'])) ? "0" : "1";
                            $child_seat = (empty($_POST['child_seat'])) ? "0" : "1";
                            $gps = (empty($_POST['gps'])) ? "0" : "1";

                            $music = (empty($_POST['music'])) ? "0" : "1";
                            $seat_belt = (empty($_POST['seat_belt'])) ? "0" : "1";
                            $sleeping_bed = (empty($_POST['sleeping_bed'])) ? "0" : "1";
                            $water = (empty($_POST['water'])) ? "0" : "1";
                            $bluetooth = (empty($_POST['bluetooth'])) ? "0" : "1";
                            $onboard_computer = (empty($_POST['onboard_computer'])) ? "0" : "1";
                            $audio_input = (empty($_POST['audio_input'])) ? "0" : "1";
                            $long_term_trips = (empty($_POST['long_term_trips'])) ? "0" : "1";
                            $car_kit = (empty($_POST['car_kit'])) ? "0" : "1";
                            $remote_central_locking = (empty($_POST['remote_central_locking'])) ? "0" : "1";
                            $climate_control = (empty($_POST['climate_control'])) ? "0" : "1";

                            $sql = "INSERT INTO cars (cat_id,name,model,mileage,seats,fuel,service_charge,driver_food_charge,description,image,airconditions,child_seat,gps,luggage,music,seat_belt,sleeping_bed,water,bluetooth,onboard_computer,audio_input,long_term_trips,car_kit,remote_central_locking,climate_control,flag)
                    VALUES ('$cat_id','$name','$model','$mileage','$seats','$fuel','$service_charge','$driver_food_charge','$description','$uploaded_image','$airconditions','$child_seat','$gps','$luggage','$music','$seat_belt','$sleeping_bed','$water','$bluetooth','$onboard_computer','$audio_input','$long_term_trips','$car_kit','$remote_central_locking','$climate_control','$flag')";

                            if ($con->query($sql) === TRUE) {

                                move_uploaded_file($file_temp, $move_image);

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
                                <select name="cat_id" required class="form-control">
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $result = $con->query($query);
                                    if ($result->num_rows > 0) {
                                        foreach ($result as $key => $value) {

                                    ?>
                                            <option value="<?php echo $value['category_id'] ?>"><?php echo $value['cat_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>

                                <label for="inputFirstName">Category Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="name" required class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                <label for="inputFirstName">Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="model" required class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                <label for="inputLastName">Model</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="mileage" required min="0" class="form-control" id="inputFirstName" type="number" placeholder="Enter your first name" />
                                <label for="inputFirstName">Mileage</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="seats" class="form-control" id="inputLastName" min="0" require type="number" placeholder="Enter your last name" />
                                <label for="inputLastName">seats</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">

                                <select class="form-control" required name="fuel">
                                    <option value=""> -- Choose Fuel Type --</option>
                                    <option value="Desel">Desel</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Octen">Octen</option>
                                </select>
                                <label for="inputFirstName">Fuel Type</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="service_charge" class="form-control" id="inputLastName" min="0" type="number" placeholder="Enter your last name" />
                                <label for="inputLastName">Service Charge</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="driver_food_charge" class="form-control" id="inputFirstName" min="0" type="number" placeholder="Enter your first name" />
                                <label for="inputFirstName">Driver Food Charge</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-control" name="flag">

                                    <option value="0">Publish</option>
                                    <option value="1">Un Publish</option>

                                </select>
                                <label for="inputLastName">Publish Post</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <textarea name="description" class="form-control" id="inputFirstName" type="" placeholder="description"> </textarea>
                                <label for="inputFirstName">Description</label>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input name="image" class="form-control" type="file" placeholder="Enter your last name" />
                                <label for="inputFirstName">Image</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" type="number" min="0" name="luggage" />




                                <label for="inputLastName">Max Luggage</label>
                            </div>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <!--   <label for="inputFirstName">Multiple select</label> -->
                                <input type="checkbox" class="form-check-input" name="airconditions">Airconditions
                                <input type="checkbox" class="form-check-input" name="child_seat">Child Seat
                                <input type="checkbox" class="form-check-input" name="gps">GPS
                                <input type="checkbox" class="form-check-input" name="luggage">Luggage
                                <input type="checkbox" class="form-check-input" name="music">Music
                                <input type="checkbox" class="form-check-input" name="seat_belt">Seat Belt
                                <input type="checkbox" class="form-check-input" name="sleeping_bed">Sleeping Bed
                                <input type="checkbox" class="form-check-input" name="water">Water
                                <input type="checkbox" class="form-check-input" name="bluetooth">Bluetooth
                                <input type="checkbox" class="form-check-input" name="onboard_computer">Onboard computer
                                <input type="checkbox" class="form-check-input" name="audio_input">Audio input
                                <input type="checkbox" class="form-check-input" name="long_term_trips">Long Term Trips
                                <input type="checkbox" class="form-check-input" name="car_kit">Car Kit
                                <input type="checkbox" class="form-check-input" name="remote_central_locking">Remote central locking
                                <input type="checkbox" class="form-check-input" name="climate_control">Climate control



                            </div>
                        </div>

                    </div>




                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button class="btn btn-primary btn-block" type="submit" name="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>