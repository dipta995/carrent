<?php include 'header.php'; ?>
<main>
<div class="container-fluid px-4">
    <h1 class="mt-4">Create new categories <a class="btn btn-info" href="categories.php">category</a></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Categories</li>
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

    if (empty($_GET['editid']) || $_GET['editid']==NULL|| !isset($_GET['editid'])) {
        echo "<script>window.location='categories.php';</script>";

    }
    else {
        $editid=$_GET['editid'];
        $query = "SELECT * FROM categories WHERE category_id=$editid";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            $value = mysqli_fetch_array($result);
        }
    }
      
        
                  
                    if(isset($_POST['submit'])){
                        $cat_name =$_POST['cat_name'];
                        
                        

                      

                        if (empty($cat_name) ) {
                            echo "<span class='error-msg'>Field Must Not be Empty</span>"; 
                        }
                        else{
                             
                             
                            $sql = "UPDATE categories  
                            SET
                            cat_name       = '$cat_name'
                            WHERE category_id=$editid";

                    if ($con->query($sql) === TRUE) {
                        echo "<script>window.location='categories.php';</script>";
                           
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
                                <input name="cat_name" value="<?php echo $value['cat_name'] ?>" required class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                <label for="inputFirstName">category name</label>
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