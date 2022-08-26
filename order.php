  <?php include 'header.php';
if (isset($_SESSION['id'] )) {
  
}else{
  header('Location:login.php');
}
        if (empty($_GET['carid']) || $_GET['carid']==NULL|| !isset($_GET['carid'])) {
                      echo "<script>window.location='car.php';</script>";
                  }
                  else {
                      $carid=$_GET['carid'];
                      $user_id =$_SESSION['id'];
                      $query = "SELECT * FROM cars WHERE id=$carid";
                      $result = $con->query($query);
                      if ($result->num_rows > 0) {
                          $value = mysqli_fetch_array($result);
                      }
                      $orderque = "SELECT * FROM orders WHERE car_id='$carid' AND user_id='$user_id' AND status=0";
                      $orderresult = $con->query($orderque);
                      
                      $orderque1 = "SELECT * FROM orders WHERE car_id='$carid' AND status IN(0, 1)";
                      $orderresult1 = $con->query($orderque1);
                      
                  }
  if (isset($_POST['confirmorder'])){
    
    $car_id =$value['id'];
    $dropup_location = $_POST['dropup_location'];
    $pickup_location = $_POST['pickup_location'];
    $trip_loop = $_POST['trip_loop'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    if (empty($car_id)) {
      echo "Field must not be empty";
    }elseif ($orderresult->num_rows > 0) { 
      echo "You Already Boked this car";
    }elseif ($orderresult1->num_rows > 0) {
      echo "Not Available Right Now";
    }
    else{
      $sql = "INSERT INTO orders (car_id,user_id,pickup_location,dropup_location,trip_loop,date,time,status)VALUES('$car_id','$user_id','$pickup_location','$dropup_location','$trip_loop','$date','$time','$status')";
      if ($con->query($sql) === TRUE) {
        echo "<script>window.location='orderlist.php';</script>";
      }else {
        echo "something wrong";
      }
    }
  }

  ?>
      
    
      <section class="ftco-section contact-section">
        <div class="container">
          <div class="row d-flex mb-5 contact-info">
            <div class="col-md-4">
              <div class="row mb-5">
            
                <img style="height:200px;width:200;" src="<?php echo $value['image']; ?>" alt="">
                
              </div>
            </div>
            <div class="col-md-8 block-9 mb-md-5">
              <form action="" method="post" class="bg-light p-5 contact-form">
                <div class="form-group">
                <select name="pickup_location" required class="form-control">
                  <option value="">--Choose Pickup Location --</option>
                                    <?php
                                     $query = "SELECT * FROM locations";
                                     $result = $con->query($query);
                                     if ($result->num_rows > 0) {
                                         foreach ($result as $key => $location) {
                                             
                                    ?>
                                    <option value="<?php echo $location['id'] ?>"><?php echo $location['location_name'] ?></option>
                                    <?php
                                         } }
                                    ?>
                                </select>
                </div>
                <div class="form-group">
                <select name="dropup_location" required class="form-control">
                  <option value="">--Choose Dropup Location --</option>
                                    <?php
                                     $query = "SELECT * FROM locations";
                                     $result = $con->query($query);
                                     if ($result->num_rows > 0) {
                                         foreach ($result as $key => $location) {
                                             
                                    ?>
                                    <option value="<?php echo $location['id'] ?>"><?php echo $location['location_name'] ?></option>
                                    <?php
                                         } }
                                    ?>
                                </select>
                </div>
                <div class="form-group">
                <label for="appt">Choose pickup time :</label>
                <input type="date" required name="date" min="<?php $datetime = new DateTime('tomorrow');
echo $datetime->format('Y-m-d'); ?>" class="form-control" placeholder="Dropup Location">
                </div>
                <div class="form-group">
                <label for="appt">Choose pickup time :</label>

<input type="time" id="appt" name="time"
       min="09:00" max="21:00" required>

<small>Office hours are 9am to 9pm</small>
                </div>
                <div class="form-group">
            <select class="form-control" required name="trip_loop" id="">
              <option value="">Choose if you want to return</option>
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
                </div>
              <!--  <div class="form-group">
                  <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div> -->
                <div class="form-group">
                  <?php
                    if ($_SESSION['flag']==0) {
           
                  ?>
                  <input type="submit" name="confirmorder" value="Confirm" class="btn btn-primary py-3 px-5">
               
                  <?php } ?>
                </div>
              </form>
            
            </div>
          </div>
        
        </div>
      </section>
    

      <section class="ftco-section ftco-no-pt">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
              <span class="subheading">Choose Car</span>
              <h2 class="mb-2">Related Cars</h2>
            </div>
          </div>
          <div class="row">
            <?php 
            $seats = $value['seats'];
    $query = "SELECT * FROM cars WHERE seats=$seats order by rand() limit 3";
                      $result = $con->query($query);
                      if ($result->num_rows > 0) {
                          foreach ($result as $key => $val) {
                            
            ?>
            <div class="col-md-4">
              <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo $val['image']; ?>);">
                </div>
                <div class="text">
                  <h2 class="mb-0"><a href="order.php?carid=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></h2>
                  <div class="d-flex mb-3">
                    <span class="cat"><?php echo $val['model']; ?></span>
                    <p class="price ml-auto"><?php echo $val['service_charge']; ?> <span>Taka/hour</span></p>
                  </div>
                  <p class="d-flex mb-0 d-block"><a href="order.php?carid=<?php echo $val['id']; ?>" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.php?carid=<?php echo $val['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
                </div>
              </div>
            </div>
        <?php }} ?>
            
          </div>
        </div>
      </section>
      
  <?php include 'footer.php'; ?>