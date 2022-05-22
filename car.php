<?php 
include 'header.php';

?>


		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    		
    			<?php 




 if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 12;
        $offset = ($pageno-1) * $no_of_records_per_page;

       
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }
        if (isset($_GET['catid'])) {
          $catid = $_GET['catid'];
          $total_pages_sql = "SELECT COUNT(*) FROM cars where  cat_id = $catid and flag=0 ";
      } else {
        $total_pages_sql = "SELECT COUNT(*) FROM cars where flag=0 ";
         
      }

        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];

        $total_pages = ceil($total_rows / $no_of_records_per_page);
        if (isset($_GET['catid'])) {
          $catid = $_GET['catid'];
          
          $sqls = "SELECT * FROM cars where cat_id = $catid and flag=0 LIMIT $offset, $no_of_records_per_page";
        } else {
        $sqls = "SELECT * FROM cars where flag=0 LIMIT $offset, $no_of_records_per_page";
        
         
      }

        $res_data = mysqli_query($con,$sqls);
      if ($res_data->num_rows > 0) {
          foreach ($res_data as $key => $value) {
          ?>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo $value['image']; ?>);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php?carid=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat"><?php echo $value['model']; ?></span>
	    						<p class="price ml-auto"><?php echo $value['service_charge']; ?> <span>Taka/hour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="order.php?carid=<?php echo $value['id']; ?>" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.php?carid=<?php echo $value['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
        <?php } } ?>
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
          <?php
           if (isset($_GET['catid'])) {
            $catid = $_GET['catid']; ?>
        
        <ul>
                  <li><a href="?catid=<?php echo $catid;?>&pageno=1">&lt;</a></li>
                  <li class="">
                    <?php
                    for ($i=1; $i <= $total_pages ; $i++) { ?>
                      <li><a href="?catid=<?php echo $catid;?>&pageno=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php  }
                    ?>
                      <a href=""></a>
                  </li>
                  <li><a href="?catid=<?php echo $catid;?>&pageno=<?php echo $total_pages;?>">&gt;</a></li>
              </ul>
        <?php } else { ?>
         
          <ul>
                  <li><a href="?pageno=1">&lt;</a></li>
                  <li class="">
                    <?php
                    for ($i=1; $i <= $total_pages ; $i++) { ?>
                      <li><a href="?pageno=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php  }
                    ?>
                      <a href=""></a>
                  </li>
                  <li><a href="?pageno=<?php echo $total_pages; ?>">&gt;</a></li>
              </ul>
         <?php }  ?>








            </div>
          </div>
        </div>
    	</div>
    </section>
    
<?php include 'footer.php'; ?>