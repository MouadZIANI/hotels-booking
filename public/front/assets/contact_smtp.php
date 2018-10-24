<?php
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

// Email verification, do not edit.
function isEmail($email_contact ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$email_contact ));
}

$name_contact     = $_POST['name_contact'];
$lastname_contact    = $_POST['lastname_contact'];
$email_contact    = $_POST['email_contact'];
$phone_contact   = $_POST['phone_contact'];
$message_contact = $_POST['message_contact'];
$verify_contact = $_POST['verify_contact'];

if(trim($name_contact) == '') {
	echo '<div class="error_message">You must enter your Name.</div>';
	exit();
} else if(trim($lastname_contact ) == '') {
	echo '<div class="error_message">You must enter your Last name.</div>';
	exit();
} else if(trim($email_contact) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email_contact)) {
	echo '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
	exit();
	} else if(trim($phone_contact) == '') {
	echo '<div class="error_message">Please enter a valid phone number.</div>';
	exit();
} else if(!is_numeric($phone_contact)) {
	echo '<div class="error_message">Phone number can only contain numbers.</div>';
	exit();
} else if(trim($message_contact) == '') {
	echo '<div class="error_message">Please enter your message.</div>';
	exit();
} else if(!isset($verify_contact) || trim($verify_contact) == '') {
	echo '<div class="error_message"> Please enter the verification number.</div>';
	exit();
} else if(trim($verify_contact) != '4') {
	echo '<div class="error_message">The verification number you entered is incorrect.</div>';
	exit();
}

$mail = new EMail;

//Enter your SMTP server (defaults to "127.0.0.1" or localhost):
$mail->Server = "localhost";    

//Enter your FULL email address:
$mail->Username = 'info@yourdomain.com';    

//Enter the password for your email address:
$mail->Password = 'YourPassword';
    
//Enter the email address you wish to send FROM (Name is an optional friendly name):
$mail->SetFrom("info@yourdomain.com","YOUR NAME");  

//Enter the email address you wish to send TO (Name is an optional friendly name):
$mail->AddTo("info@yourdomain.com","YOUR NAME");

//You can add multiple recipients:
//$mail->AddTo("someother2@address.com");

//Enter the Subject of your message:
$mail->Subject = "Contact Form Message";

//Enter the content of your email message:
$mail->Message = "You have been contacted by $name_contact $lastname_contact with additional message is as follows:<br/><br/>$message_contact<br/><br/>You can contact $lastname_contact via email $email_contact or via telephone $phone_contact." . PHP_EOL . PHP_EOL;

//Optional extras
$mail->ContentType = "text/html";    // Defaults to "text/plain; charset=iso-8859-1"
//$mail->Headers['X-SomeHeader'] = 'abcde';    // Set some extra headers if required

$response= NULL;
if(!$mail->Send()) {
    $response = "Mailer Error: " . $mail->ErrorInfo;
} else {
    $response = "<div id='success_page' style='padding:20px 0'><strong >Email Sent.</strong>Thank you <strong>$name_contact</strong>,<br> your message has been submitted. We will contact you shortly.</div>";
}
echo($response);

/*
This is the EMail class.
Anything below this should not be edited unless you really know what you're doing.
*/
class EMail
{
  const newline = "\r\n";

  private
    $Port, $Localhost, $skt;

  public
    $Server, $Username, $Password, $ConnectTimeout, $ResponseTimeout,
    $Headers, $ContentType, $From, $To, $Cc, $Subject, $Message,
    $Log;

  function __construct()
  {
    $this->Server = "127.0.0.1";
    $this->Port = 25;
    $this->Localhost = "localhost";
    $this->ConnectTimeout = 30;
    $this->ResponseTimeout = 8;
    $this->From = array();
    $this->To = array();
    $this->Cc = array();
    $this->Log = array();
    $this->Headers['MIME-Version'] = "1.0";
    $this->Headers['Content-type'] = "text/plain; charset=iso-8859-1";
  }

  private function GetResponse()
  {
    stream_set_timeout($this->skt, $this->ResponseTimeout);
    $response = '';
    while (($line = fgets($this->skt, 515)) != false)
    {
 $response .= trim($line) . "\n";
 if (substr($line,3,1)==' ') break;
    }
    return trim($response);
  }

  private function SendCMD($CMD)
  {
    fputs($this->skt, $CMD . self::newline);

    return $this->GetResponse();
  }

  private function FmtAddr(&$addr)
  {
    if ($addr[1] == "") return $addr[0]; else return "\"{$addr[1]}\" <{$addr[0]}>";
  }

  private function FmtAddrList(&$addrs)
  {
    $list = "";
    foreach ($addrs as $addr)
    {
      if ($list) $list .= ", ".self::newline."\t";
      $list .= $this->FmtAddr($addr);
    }
    return $list;
  }

  function AddTo($addr,$name = "")
  {
    $this->To[] = array($addr,$name);
  }

  function AddCc($addr,$name = "")
  {
    $this->Cc[] = array($addr,$name);
  }

  function SetFrom($addr,$name = "")
  {
    $this->From = array($addr,$name);
  }
  function Send()
  {
    $newLine = self::newline;

    //Connect to the host on the specified port
    $this->skt = fsockopen($this->Server, $this->Port, $errno, $errstr, $this->ConnectTimeout);

    if (empty($this->skt))
      return false;

    $this->Log['connection'] = $this->GetResponse();

    //Say Hello to SMTP
    $this->Log['helo']     = $this->SendCMD("EHLO {$this->Localhost}");

    //Request Auth Login
    $this->Log['auth']     = $this->SendCMD("AUTH LOGIN");
    $this->Log['username'] = $this->SendCMD(base64_encode($this->Username));
    $this->Log['password'] = $this->SendCMD(base64_encode($this->Password));

    //Email From
    $this->Log['mailfrom'] = $this->SendCMD("MAIL FROM:<{$this->From[0]}>");

    //Email To
    $i = 1;
    foreach (array_merge($this->To,$this->Cc) as $addr)
      $this->Log['rcptto'.$i++] = $this->SendCMD("RCPT TO:<{$addr[0]}>");

    //The Email
    $this->Log['data1'] = $this->SendCMD("DATA");

    //Construct Headers
    if (!empty($this->ContentType))
      $this->Headers['Content-type'] = $this->ContentType;
    $this->Headers['From'] = $this->FmtAddr($this->From);
    $this->Headers['To'] = $this->FmtAddrList($this->To);
    if (!empty($this->Cc))
      $this->Headers['Cc'] = $this->FmtAddrList($this->Cc);
    $this->Headers['Subject'] = $this->Subject;
    $this->Headers['Date'] = date('r');

    $headers = '';
    foreach ($this->Headers as $key => $val)
      $headers .= $key . ': ' . $val . self::newline;

    $this->Log['data2'] = $this->SendCMD("{$headers}{$newLine}{$this->Message}{$newLine}.");

    // Say Bye to SMTP
    $this->Log['quit']  = $this->SendCMD("QUIT");

    fclose($this->skt);

    return substr($this->Log['data2'],0,3) == "250";
  }
}
?>