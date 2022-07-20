<?php 
include 'header.php'; 
$query = "SELECT * FROM office_info";
$result = $con->query($query); 
    $info = mysqli_fetch_array($result);
    if(isset($_POST['submit'])){
        $address =$_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        if (empty($address) || empty($phone) ||empty($email)  ) {
            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
        }elseif (empty($file_ext)) {
            
             $sql = "UPDATE office_info  
                    SET
                    address       = '$address',
                    phone      = '$phone',
                    email       = '$email'";
                    if ($con->query($sql) === TRUE) {
                        $msg = "<span class='success-msg'>Record Updated successfully</span>";

                    // echo "<script>window.location='officeinfo.php';</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
        }

    }
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Cars List <a class="btn btn-info" href="createcar.php">Create Car</a></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Cars</li>
                        </ol>
                        <div class="mb-4">
                        <?php
                        echo $msg;
                        ?>
                            <form class="form-control" action="" method="post">
                                <div >
                                    <label for="">Address</label>
                                    <textarea class="form-control" name="address" id="" cols="50" rows="3"><?php  echo $info['address']; ?></textarea>
                                </div>
                                <div class="form-control">
                                    <label for="">Phone</label>
                                    <input type="tel" name="phone" value="<?php  echo $info['phone']; ?>" class="form-control">
                                </div>
                                <div class="form-control">
                                    <label for="">Address</label>
                                    <input type="email" name="email" value="<?php  echo $info['email']; ?>" class="form-control">
                                </div>
                                <input type="submit" name="submit"  class="form-control btn btn-info">
                            </form>
                        </div>
                        <div style="height: 100vh"></div>
                        <div class="card mb-4"><div class="card-body"></div></div>
                    </div>
                </main>
 <?php include 'footer.php'; ?>