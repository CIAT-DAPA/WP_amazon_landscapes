<?php
/*
 * Author: CodexWorld
 * URL: http://www.codexworld.com
 * License URL: http://www.codexworld.com/license
 */
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'edarague@gmail.com';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

            //dirección del remitente 
            $headers .= "From: Admin SAL <saladmin@landscapes.org>\r\n"; 

            //dirección de respuesta, si queremos que sea distinta que la del remitente 
            $headers .= "Reply-To: edarague@gmail.com\r\n"; 

            //ruta del mensaje desde origen a destino 
            $headers .= "Return-path: edarague@gmail.com\r\n"; 

            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
              wp_redirect(admin_url('admin.php?page=page-contacto&msg=success'));
              exit();
            }else{
               wp_redirect(admin_url('admin.php?page=page-contacto&msg=failed'));
              exit();
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
}
?>
  <?php get_header(); ?>
  <div class="container noticia">
    <h2 class="blog-post-title">
    - Contacto -
  </h2>
    <div class="contactFrm">
      <?php if(!empty($statusMsg)){ ?>
      <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>">
        <?php echo $statusMsg; ?>
      </p>
      <?php } ?>
      <form action="" method="post">
        <div class="row">
          <div class="col-md-6">
            <h4>Tu nombre:</h4>
            <input type="text" name="name" placeholder="Tu nombre" required="">
            <h4>Tu correo:</h4>
            <input type="email" name="email" placeholder="email@example.com" required="">
            <h4>Asunto:</h4>
            <input type="text" name="subject" placeholder="Escribe tu asunto" required=""> </div>
          <div class="col-md-6">
            <h4>Mensaje:</h4>
            <textarea name="message" placeholder="Escribe tu mensaje aquí" required=""> </textarea>
          </div>
        </div>
        <div class="row button-contact">
          <input type="submit" name="submit" value="Enviar"> </div>
        <div class="clear"> </div>
      </form>
    </div>
  </div>
  <?php get_footer(); ?>
