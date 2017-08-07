<?php
namespace Modules\register;
use Triadev\PasswordHashing\PasswordHash;
use Views\ModuleTemplate;
class Register extends \Controllers\baseController
{
    public function __construct() {
        $this->template = new ModuleTemplate('mvp','register');
    }
    public function index()
    {
        
    }
    public function register($model)
    {
        $salt = $this->generateSalt(22);//salt za hashiranje passworda
        $_POST['password']= PasswordHash::hash($_POST['password'], PASSWORD_BCRYPT, 12, $salt);
        $_POST['salt'] = $this->generateSalt(22, true).md5(uniqid(rand(), true));//salt za link za potvrdu
        $reg = $model::create($_POST);
        if($reg)
        {
            if($this->sendConfirmationMail($_POST))
            {
               return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    public function confirm($model,$salt)
    {
        $retArray=array();
        $studentWithSalt =  $model::Salt($salt)->get();
        //dd($studentWithSalt[0]->ID);
        if(count($studentWithSalt)>0)
        {
            //$studnet = $model::find($studentWithSalt->ID);
            $studentWithSalt[0]->status=1;
            $studentWithSalt[0]->salt=$this->generateSalt(22, true).md5(uniqid(rand(), true));
            if($studentWithSalt[0]->save())
            {
                 $retArray['Message']="You activated your account successfully";
                 $retArray['Done']=true;
            }
            else
            {
                $retArray['Message']="A problem occured";
                $retArray['Done']=false;
            }
        }
        else
        {
            $retArray['Message']="This user does not exist";
            $retArray['Done']=false;
            
        }
        $this->template->setData('contentHead','Registation confirmation');
        $this->template->setData('message',$retArray['Message']);
        $this->template->setData('done',$retArray['Done']);
        $this->template->render('confirm');
    }
    private function sendConfirmationMail($data){
        $mail = new \PHPMailer;
        //$mail->SMTPDebug = 3;
                                              // Set mailer to use SMTP
        
        if(_ENVIROMENT == 'DEVELOPMENT'){
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'savicdragan2707@gmail.com';                 // SMTP username
            $mail->Password = 'spodoba1222';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        }
        
        $mail->setFrom('savicdragan2707@gmail.com', 'All out shine');
        $mail->addAddress($data['email'], $data['name']." ".$data['surname']);     // Add a recipient
        $mail->addReplyTo('savicdragan2707@gmail.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Registration confirmation mail';
        $mail->Body    = 'Sie haben sich erfolgreich Registriert wenn sie ihr Profil aktivieren möchten klicken sie auf diesen <a href="'._WEB_PATH.'confirm/'.$data['salt'].'"><b>link!</b></a>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
           // echo 'Message has been sent';
            return true;
        }
    }
}
