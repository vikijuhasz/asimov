<?php
  namespace App\Controllers;
  use Core\{Controller,H,Session,Router};
  use App\Models\Email;
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  class ContactController extends Controller {

    public function indexAction() 
    {       
        $email = new Email();
        if ($this->request->isPost()) {
            $this->request->csrfCheck();            
            $email->assign($this->request->get());
            $email->validator();
            if ($email->validationPassed()) {   
                $this->sendEmailAction($email);
            }                        
        } 
        $this->view->email = $email;
        $this->view->displayErrors = $email->getErrorMessages();
        $this->view->render('contact/index');
    }
    
    private function sendEmailAction($email) 
    {
        
        $mail = new PHPMailer();
        $mail->CharSet='UTF-8';
        $mail->isSMTP();
        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ));
        $mail->SMTPDebug = 0;      
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->IsHTML(true);
        $mail->Username = SMTP_USERNAME;        // Set in the config file
        $mail->Password = SMTP_PASSWORD;        // Set in the config file
        $mail->setFrom($email->email, html_entity_decode($email->first_name). ' ' . html_entity_decode($email->last_name));
        //Set who the message is to be sent to
        $mail->addAddress($address='', $name = '');
        //Set subject of message
        $mail->Subject = '';
        $mail->Body = $email->message;
        if (!$mail->send()) {
            Session::addMsg('warning', 'Message could not be sent. Please try again later');
        } 
        else {
          Session::set('name', $email->first_name);
          Router::redirect('contact/success/');
        }
    }
    
    public function successAction()
    {
        if (Session::exists('name')) {
            $this->view->render('contact/success'); 
        }
    } 
  }
