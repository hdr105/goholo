<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PhpMailerLib 
{

    private $mail;  

	function __construct()
	{
		require_once(APPPATH."third_party/phpmailer/PHPMailer.php");
        $this->mail = new \PHPMailer\PHPMailer\PHPMailer;
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'goholoads@gmail.com';
        $this->mail->Password = 'Jamal123';
        $this->mail->SMTPSecure = 'ssl';                            
        $this->mail->Port = '465';
	}

	public function welcome_email($data)
	{
        $this->mail->setFrom($this->mail->Username, 'GoHolo Ads');
        $this->mail->addAddress($data['email']); 
    
        $this->mail->isHTML(true);                                  // Set email format to HTML
        $this->mail->Subject = 'Welcome to the GoHOLO Network';
        $this->mail->Body    = "
            <div> <b> Hey ".$data['first_name']." ".$data['last_name']."</b>, </div>
            <br>
            <div><p>Thank you for becoming a part of the GoHOLO Network. To start receiving direct deposit payments please reply to this email with the following information:</p></div>
            <br>
            Account type (Chequing or Savings)
            <br>
            Transit Number
            <br>
            Institution number
            <br>
            Account Number
            <br>
            <div><p>Thanks again for joining the GoHOLO Network we are excited to have you join our team! If you have any questions or concerns please let us know and we will be happy to help.</p></div>
            <br>
            <div> <b>Best Regards,</b> <br> GoHOLO </div>
            ";


            $email = $this->mail->send();

            $res = array('res'=>$email,'data'=>$this->mail);
        
            return $res;

        }
    }

