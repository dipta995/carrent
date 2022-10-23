<?php include 'header.php';  

if(isset($_GET['confirmid'])){
    $confirmid = $_GET['confirmid'];
    $editquery = "UPDATE orders  
    SET
    finished_at = now()
    WHERE Oid = $confirmid";
   $con->query($editquery);
                    
   $query = "SELECT * FROM cars left join orders ON cars.id = orders.car_id WHERE orders.Oid=$confirmid";
   $value_order = mysqli_fetch_array( $con->query($query));
   $total_time = round((strtotime($value_order['finished_at']) - strtotime($value_order['created_at']))/3600, 1);


   $required_amount = $total_time* $value_order['service_charge'];
   
}

if (isset($_POST['submit'])) {
                        $payment_type = mysqli_real_escape_string($con,$_POST['payment_type']);
                        $amount = $_POST['amount'];
                        $account_no = $_POST['account_no'];
                        if (empty($payment_type)) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>";
                        } else {

    $query = "SELECT * FROM orders WHERE Oid=$confirmid";
    $result = $con->query($query);
    $value = mysqli_fetch_array( $con->query($query));

    $carid = $value['car_id'];
    $driver_id = $value['driver_id'];
    $endtime = date("Y-m-d");
    $editquery = "UPDATE orders  
    SET
    account_no       = '$account_no',
    payment_type       = '$payment_type',
    amount       = $amount,
    status       = '2',
    finished_at = now()
    WHERE Oid = $confirmid";
    $edit = $con->query($editquery);
    if ($edit) {
        $editquery = "UPDATE cars  
        SET
        flag       = '0'
        WHERE id = $carid";
        $edit = $con->query($editquery);
        $editquery = "UPDATE drivers  
        SET
        is_active       = 0
        WHERE driver_id = $driver_id";
        $edit = $con->query($editquery);
        echo "<script>window.location='orderlist.php';</script>";
    }
}
     
}



?>
<main>
<div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
          <li><strong>Total Hours :</strong> <?php echo $total_time ;?> hours</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                
            <div class="row mb-3">                        
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <select class="form-control" name="payment_type" required>
                                    <option value="">--Select payment method--</option>
                                    <option value="Bkash">Bkash</option>
                                    <option value="Rocket">Rocket</option>
                                </select>
                                <label for="inputFirstName">Payment Type</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                 <input class="form-control" type="number" required name="account_no" min="0">
                                <label for="inputFirstName">Account No</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" type="number" name="amount" value="<?php echo $required_amount ?>" readonly>
                                <label for="inputFirstName">Amount</label>
                            </div>
                        </div>


                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit" name="submit">Create</button>
                            </div>
                        </div>
                        </div>
                </form>
                </div>
        </div>
        <div style="height: 100vh"></div>
    </div>
</main>
<?php include 'footer.php'; ?>>