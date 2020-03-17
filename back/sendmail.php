<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    /* Exception class. */
    require 'PHPMailer-master/src/Exception.php';

    /* The main PHPMailer class. */
    require 'PHPMailer-master/src/PHPMailer.php';

    /* SMTP class, needed if you want to use SMTP. */
    require 'PHPMailer-master/src/SMTP.php';

    class sendmail{

        private $mail ;
        function __construct(){
            $this->mail =  new PHPMailer(TRUE);
        }
        public function send($name,$email,$subject,$message){
                /* Open the try/catch block. */
            try {
                /* Set the mail sender. */
                $this->mail->setFrom($email);
            
                /* Add a recipient. */
                $this->mail->addAddress('websitecontact106@gmail.com');
            
                /* Set the subject. */
                $this->mail->Subject = $subject;
            
                /* Set the mail message body. */
                $this->mail->Body = $message;
                // Content
                $this->mail->isHTML(true); // Set email format to HTML
                $this->mail->Subject = $subject;
                $this->mail->Body =
                '<h2>'.$subject.'</h2>'.
                'Name :'.$name.'<br>'.
                'Email : '.$email." Reply to this mail adress ".'<br>'.
                '<p>'.$message.'</p>' ;
            
                /* SMTP parameters. */
            
                /* Tells PHPMailer to use SMTP. */
                $this->mail->isSMTP();
                
                /* SMTP server address. */
                $this->mail->Host = 'smtp.gmail.com';

                /* Use SMTP authentication. */
                $this->mail->SMTPAuth = TRUE;
                
                /* Set the encryption system. */
                $this->mail->SMTPSecure = 'ssl';
                
                /* SMTP authentication username. */
                $this->mail->Username = 'websitecontact106@gmail.com';
                
                /* SMTP authentication password. */
                $this->mail->Password = '147852369!';
                
                /* Set the SMTP port. */
                $this->mail->Port = 465;
                
                /* Finally send the mail. */
                $this->mail->send();
                    return true;              
            }
            catch (Exception $e)
            {
                /* PHPMailer exception. */
                echo $e->errorMessage();
            }
            catch (\Exception $e)
            {
                /* PHP exception (note the backslash to select the global namespace Exception class). */
                echo $e->getMessage();
            } 
        }
    }
    
   
?>
