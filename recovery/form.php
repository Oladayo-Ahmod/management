<?php
// disabling error report
error_reporting(0); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';

// including modal class
include '../modal/modal.php';
// inheriting modal class
 class Mailer extends  Modal {
   // password recover method
		public function password_recovery(){
			// setting error message
            $error = '';
            // is password recovery is set
			if (isset($_POST['password'])) {
                $email = strip_tags($_POST['email']);
                // querying from the database if email is found
				$query = "SELECT * FROM admin_details WHERE email = ?";
				$stmt = $this->conn->prepare($query);
				$stmt->bind_param('s',$email);
				if($stmt->execute()){
                    $result = $stmt->get_result();
                    // if email is found
					if (mysqli_num_rows($result) > 0) {
						$fetch = $result->fetch_assoc();
                        $recover_email = $fetch['email'];
                        $admin_id = $fetch['id'];
                        // setting the password recovery link
                        $token = uniqid(md5(time().$admin_id));
                        // inserting to the password reset table
                        $query = "INSERT INTO password_reset(email,token,admin_id) VALUES(?,?,?)";
                        $stmt = $this->conn->prepare($query);
                        $stmt->bind_param('ssi',$recover_email,$token,$admin_id);
                        // if insert is successful send reset link to the email
                        if($stmt->execute()){
                           // Instantiation and passing `true` enables exceptions
                            $mail = new PHPMailer(true);

                            try {
                                //Server settings
                                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                                $mail->isSMTP();                                            // Send using SMTP
                                $mail->Host       = "smtp.gmail.com";                    // Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                $mail->Username   = "oladayoahmod112@gmail.com";                     // SMTP username
                                $mail->Password   = 'rojeqrlsgragxipe';                             // SMTP password
                                $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                                $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                                //Recipients
                                $mail->setFrom('oladayoahmod112@gmail.com','MSSN faculty of management sciences');
                                $mail->addAddress('oladayoahmod1122@gmail.com');     // Add a recipient
                                // Name is optional
                                //$mail->addReplyTo('info@example.com', 'Information');
                                //$mail->addCC('cc@example.com');
                                //$mail->addBCC('bcc@example.com');//

                                // Attachments
                                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                // Content
                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = 'Password reset';
                                // setting the reset link through the website domain
                                $mail->Body = 'Click <a href="www.mssnmanagement.com/reset.php?token=$token">here</a> to reset your password';
                                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                $mail->send();
                                $error = '<div class="alert alert-success">Password rest link sent to your email</div>';
                            } catch (Exception $e) {
                                #echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                #header("location:index.html");
                                $error = '<div class="alert alert-danger">Error sending link to the email !</div>';
                            }

                            
                        }
						
					}
					else {
						$error = '<div class="alert alert-danger">Email not found!</div>';
					}
				}
			}
			echo $error;
		}   
 }

