<?php include 'header.php';
 ?>
		
	 
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-4">
        		<div class="row mb-5">
					
		          
		          
		        </div>
          </div>
          <div class="col-md-8 block-9 mb-md-5">
          <table class="vitamins">
        <thead>
            <tr>
                <th>id</th>
                <th>Car name</th>
                <th>Pickup/Dropup</th>
                <th>Journy Date/Time</th>
                <th>Trip Loop</th>
                <th>Action</th>
            </tr>
        </thead>
      
        <tbody>
            <?php
       $user_id =$_SESSION['id'];
            $query = "SELECT * FROM orders left join cars ON cars.id=orders.car_id  where user_id=$user_id";
                              $result = $con->query($query);
                              if ($result->num_rows > 0) {
                                   foreach ($result as $key => $val) {
                                    
                     
            ?>
            <tr>
                <td><?php echo $val['id']; ?></td>
                <td><?php echo $val['name']; ?> <img style="height:50px; width:50px;" src="<?php echo $val['image']; ?>" alt=""></td>
                <td><?php echo $val['pickup_location']."/".$val['dropup_location']; ?></td>
                <td><?php echo $val['date']."/".$val['time']; ?></td>
                <td>
                <?php 
                    if ($val['trip_loop']==0) {
                        echo "Not back";
                    }elseif ($val['trip_loop']==1) {
                        echo "Return Home";
                    }else{
                        echo "something went wrong";
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if ($val['status']==0) {
                        echo "Pending";
                    }elseif ($val['status']==1) {
                        echo "running";
                    }else{
                        echo "Nice trip";
                    }
                    ?>
                
                </td>
            </tr>
      <?php }} ?>
      
          
        </tbody>
    </table>
          
          </div>
        </div>
       
      </div>
    </section>
	
<style>
   @import url(https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Oxygen);

/* Page layout */

body {
    background-color: #fff;
    margin: 0;
    padding: 0;
    font-family: 'Oxygen', sans-serif;
    color: #444;
    font-size: 15px;
    line-height: 18px;
    font-weight: 300;
}

header {
    margin: 0;
    background: #000;
    height: 65px;
    padding: 1px;
}

article {
    margin: 40px 30px;
}

h1 {
    font-family: 'Open Sans Condensed', sans-serif;
    letter-spacing: 1px;
    font-size: 2.3em;
    line-height: 44px;
    text-transform: uppercase;
    color: #fff;
    font-weight: 900;
    margin: 0;
    padding: 10px 0 0 30px;
    letter-spacing: 2px;
}

h2 { margin: 20px 0 10px 0;
    font-weight: 900;
}

p {
    margin: 20px 0 5px 0;
}


/* Table Layout */

table.vitamins {
    margin: 20px 0 0 0;
    border-collapse: collapse;
    border-spacing: 0;
    background: #212121;
    color: #fff;
}

table.vitamins th, table.vitamins td {
    text-align: center;
}

table.vitamins thead {
    line-height: 12px;
    background: #2e63e7;
    text-transform: uppercase;
}

table.vitamins thead th {
    color: #fff;
    padding: 10px;
    letter-spacing: 1px;
    vertical-align: bottom;
}

table.vitamins thead th:nth-child(1) {
    width: 5%;
    text-align: left;
    padding-left: 20px;
}

table.vitamins thead th:nth-child(2) {
    width: 30%;
}

table.vitamins thead th:nth-child(3) {
    width: 20%;
}

table.vitamins thead th:nth-child(4) {
    width: 15%;
}
table.vitamins thead th:nth-child(5) {
    width: 15%;
}
table.vitamins thead th:nth-child(6) {
    width: 15%;
}

table.vitamins tbody {
    font-size: 1em;
    line-height: 15px;
}

table.vitamins tbody tr {
    border-top: 2px solid rgba(109, 176, 231, 0.8);
    transition: background 0.6s, color 0.6s;
}

table.vitamins tbody tr:nth-child(even) {
    background: rgba(255, 255, 255, 0.2);
}

table.vitamins tbody tr:hover {
    color: #000;
    background: rgba(255, 255, 255, 0.7);
    font-weight: 900;
}

table.vitamins tbody td {
    padding: 12px;
}

table.vitamins tbody tr:hover td:first-child {
    background: rgba(0,0,0,0);
}

table.vitamins tbody td:first-child {
    text-align: left;
    padding-left: 20px;
    font-weight: 700;
    background: rgba(109, 176, 231, 0.35);
    transition: backgrounf 0.6s;
}

table.vitamins tfoot {
    font-size: 0.8em;
}

table.vitamins tfoot tr {
    border-top: 2px solid #2e63e7;
}

table.vitamins tfoot td {
    color: rgba(255,255,215,0.6);
    text-align: left;
    line-height: 15px;
    padding: 15px 20px;
}


/* Mobile Layout */

@media screen and (max-width: 400px) {
    h1 {
        font-size: 34px;
        line-height: 36px;
        padding-left: 15px;
    }

    article {
        margin: 10px 15px;
    }

    table.vitamins {
        font-size: 0.8em;
    }
}
</style>
    
<?php include 'footer.php'; ?>