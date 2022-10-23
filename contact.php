<?php
 include 'header.php'; 
 $query = "SELECT * FROM office_info";
$result = $con->query($query); 
$info = mysqli_fetch_array($result);


                
 ?>
    
   
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-4">
        		<div class="row mb-5">
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-map-o"></span>
			          	</div>
			            <p><span>Address:</span><?php  echo $info['address']; ?></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-mobile-phone"></span>
			          	</div>
			            <p><span>Phone:</span> <a href="tel://1234567920"><?php  echo $info['phone']; ?></a></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-envelope-o"></span>
			          	</div>
			            <p><span>Email:</span> <a href="mailto:info@yoursite.com"><?php  echo $info['email']; ?></a></p>
			          </div>
		          </div>
		        </div>
          </div>
          <div style="color:red;" class="col-md-8 block-9 mb-md-5">
            <?php
              if (isset($_POST['submit'])) { 
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];
               if ( strlen ($phone) != 11) {  
                  echo $txt =  "<span class='error-msg'>Phone Only 11 Digit</span>";  
                           
              }else{
              
              $html = "<ul><li><strong> Name:</strong>";
              $html .= $name."</li><li><strong> Phone:</strong>";
              $html .= $phone."</li><li><strong> Message:</strong>";
              $html .= $message."</li></ul>";
              $html_data = $html;
              
              
                require("mail/src/PHPMailer.php");
                require("mail/src/SMTP.php");
                require("mail/src/Exception.php");
                require("mail/constants.php");
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                try {      
                    $mail->IsSMTP(); 
                   //$mail->SMTPDebug = 1; 
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'ssl'; 
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 465; 
                    $mail->IsHTML(true);
                    $mail->Username = "jannatul071997@gmail.com";
                    $mail->Password ='jannat1234';
                    $mail->SetFrom("jannatul071997@gmail.com");
                 
                     $mail->isHTML(true); 
                     $mail->Subject = $subject;
                     $mail->Body = $html_data;
                   
                     $mail->AddAddress("jannatul071997@gmail.com");
                    if($mail->Send()){
                    //echo $agentemail;
                    echo "<span class='success-msg'>Thank you for your feedback</span>";
                    }else{
                 
                    }
                    
                  } catch (Exception $e) {
                     
                  }
                }
              }
            ?>
            <form action="" method="POST" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input type="text" required class="form-control" name="name" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="number" required min="0" class="form-control" name="phone" placeholder="Your Phone">
              </div>
              <div class="form-group">
                <input type="text" required class="form-control" name="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" required id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>

      </div>
    </section>
	

    <?php include 'footer.php'; ?>