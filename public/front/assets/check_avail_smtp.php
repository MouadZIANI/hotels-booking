<?php
if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

// Email verification, do not edit.
function isEmail($email_booking ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$email_booking ));
}

$check_in     = $_POST['check_in'];
$check_out    = $_POST['check_out'];
$adults    = $_POST['adults'];
$children   = $_POST['children'];
$room_type = $_POST['room_type'];
$name_booking   = $_POST['name_booking'];
$email_booking   = $_POST['email_booking'];

if(trim($check_in) == '') {
	echo '<div class="error_message">Enter check in date.</div>';
	exit();
} else if(trim($check_out ) == '') {
	echo '<div class="error_message">Enter check out date.</div>';
	exit();
} else if(trim($adults ) == '') {
	echo '<div class="error_message">Enter adults number.</div>';
	exit();
} else if(trim($room_type ) == '') {
	echo '<div class="error_message">Please select room type</div>';
	exit();
} else if(trim($name_booking ) == '') {
	echo '<div class="error_message">Enter your Name and Last name.</div>';
	exit();
} else if(trim($email_booking) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email_booking)) {
	echo '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
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
$mail->Subject = "Booking request";

//Enter the content of your email message:
$mail->Message = "You have been contacted by $name_contact $lastname_contact with additional message is as follows:<br/><br/>Check in:$check_in.<br/>Check out:$check_out.<br/>Room Type: $room_type.<br/>Number of adults: $adults.<br/>Number of child: $children.<br/><br/>You can contact $name_booking via email: $email_booking." . PHP_EOL . PHP_EOL;

//Optional extras
$mail->ContentType = "text/html";    // Defaults to "text/plain; charset=iso-8859-1"
//$mail->Headers['X-SomeHeader'] = 'abcde';    // Set some extra headers if required

$response= NULL;
if(!$mail->Send()) {
    $response = "Mailer Error: " . $mail->ErrorInfo;
} else {
    $response = "<div id='success_page' style='padding:20px 0 40px 0; text-align:center;'><div style='font-size:90px; font-weight:normal; margin-bottom:20px;'><i class='icon_set_1_icon-76'></i></div><strong >Email Sent.</strong><br/>Thank you <strong>$name_booking</strong>,<br/>your message has been submitted. We will contact you shortly.</div>";
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