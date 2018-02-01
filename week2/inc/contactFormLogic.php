<?php
session_start();


//Setup the variables used by the page
  $inFirstName = "";
  $inLastName = "";
  $inEmail = "";
  $inComments= "";
 $inUser="";
 $contactDate="";
 $contactTime="";
  //error messages
  $firstNameErrMsg= "";
  $lastNameErrMsg= "";
  $emailErrMsg = "";
  $commentsErrMsg = "";
  $userErrMsg="";
  $validForm = false;

  if(isset($_POST["submit"]))
  {
  //The form has been submitted and needs to be processed

  //Get the name value pairs from the $_POST variable into PHP variables
  $inFirstName = $_POST['inFirstName'];
  $inLastName = $_POST['inLastName'];
  $inEmail = $_POST['inEmail'];
  $inComments = $_POST['inComments'];
  //$inUser=$_POST['g-recaptcha-response'];
  $contactDate= date('Y-m-d');
  $contactTime=date('H:i:s');
  /*	FORM VALIDATION PLAN

  The page will validate the form fields according to the following validation tests.
  Name Field:  Required, Check HTML special characters
  Email Field: Required, Must be a valid email format.
  Comments: Required.
  Make sure to SANITIZE all inputs.
  */
  //VALIDATION FUNCTIONS
  function validateFirstName($inFirstName)
  {
    global $validForm, $firstNameErrMsg;		// GLOBAL Version
    $firstNameErrMsg = "";

    if(!preg_match('/^(?i)([À-ÿa-z\-]{2,})\x20([À-ÿa-z\-]{2,})(?-i)/', $inFirstName))
    {
      $validForm = false;
      $firstNameErrMsg = "First Name is Invalid.";
    }
    elseif($inFirstName=="")
    {
      $validForm = false;
      $firstNameErrMsg = "Your First Name is required";
    }
    else {
  		$inFirstName = ltrim($inFirstName);
  	}
  }//end validateFirstName()

  function validateLastName($inLastName)
  {
    global $validForm, $lastNameErrMsg;		// GLOBAL Version
    $lastNameErrMsg = "";

    if(!preg_match('/^(?i)([À-ÿa-z\-]{2,})\x20([À-ÿa-z\-]{2,})(?-i)/', $inLastName))
    {
      $validForm = false;
      $lastNameErrMsg = "First Name is Invalid.";
    }
    elseif($inLastName=="")
    {
      $validForm = false;
      $lastNameErrMsg = "Your First Name is required";
    }
    else {
  		$inLastName = ltrim($inLastName);
  	}
  }//end validateLastName()


  function validateEmail($inEmail)
  {
    global $validForm, $emailErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
    $emailErrMsg = "";
    if($inEmail=="")
  	{
  		$validForm = false;
  		$emailErrMsg = "E-mail is required";
  	}
  elseif(!preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $inEmail))
    {
      $validForm = false;
      $emailErrMsg = "Email is invalid";
    }
  }//end validateEmail()


  function validateComments($inComments)
  {
    global $validForm, $commentstErrMsg;
    $commentsErrMsg = "";
}//end validateComments()


function validateUser($inUser){
  global $validForm, $usertErrMsg;
  $userErrMsg = "";
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $privatekey = '6LelqTQUAAAAAMpcK_8arjKNwvWeq7ursy-A4o3K';
  //$response = file_get_contents($url."?secret=". $privatekey."&response=". $_POST['g-recaptcha-response'].
  //"&remoteip".$_SERVER['REMOTE_ADDR']);
  //$data = json_decode($response);
if(empty($inUser)){
  $validForm = false;
  $userErrMsg= "You must fill out the recaptcha.";
}
else{
}

  }
  $validForm = true;		//switch for keeping track of any form validation errors
  // Call Validate Functions
  validateFirstName($inFirstName);
  validateLastName($inLastName);
  validateEmail($inEmail);
  validateComments($inComments);
  validateUser($inUser);

  //Check if Valid Form

  if($validForm)
  {
    $recipient =  $_POST["inEmail"] ;
    $message =   strip_tags("<html><body> \r\n");
    $message .=  strip_tags("<h2>This Email was sent on  " . date("l Y/m/d") . "</h2> \r\n");
    $message .=  strip_tags("<h2>Hello there  " . $_POST["inFirstName"] . ",</h2> \r\n");
    $message .=  strip_tags("<h2>Your email address is:  " .  $_POST["inEmail"]."</h2> \r\n" );
    $message .=  strip_tags( "<h2>Comments:  ".   $_POST["inComments"]."</h2> \r\n" );
    $message .=   strip_tags("<h1>Thank You for contacting us! </h1></body></html>");

      include 'emailClass.php';
      $contactEmail = new Email("");  //instantuate contactEmail
      $contactEmail -> setRecipient($recipient);
      $contactEmail -> setSender("amlogan2@dmacc.edu");
      $contactEmail -> setSubject("Contact Form");
      $contactEmail -> setMessage(" The Message that you sent us follows.    " .  $message);
      $emailStatus = $contactEmail-> sendMail(); //Sends the mail

      $businessEmail = new Email("");// instatuate businessEmail
      $businessEmail-> setRecipient("amlogan2@dmacc.edu");
      $businessEmail -> setSender("Me");
      $businessEmail -> setSubject("Contact Form");
      $businessEmail -> setMessage(" The Message that you sent us follows.    " . $message);
      $emailStatus = $businessEmail-> sendMail(); //Sends the mail
  }
  else
  {
    $message = "Something went wrong";
  }

  if ($validForm == true) {
    $serverName = "localhost";
    $username = "adamloga_root";
    $password = "password";
    $database = "adamloga_contactform";

    try {
        $conn = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

  		//Create the SQL command string
  		$sql = "INSERT INTO contactform_table (";
  		$sql .= "contact_first_name, ";
      $sql .= "contact_last_name, ";
  		$sql .= "contact_email, ";
  		$sql .= "contact_comments, ";
      $sql .= "contact_date, ";
      $sql .= "contact_time ";	  //Last column does NOT have a comma after it.
  		$sql .= ") VALUES (?,?,?,?,?,?)";	//? Are placeholders for variables

  		//Display the SQL command to see if it correctly formatted.
  		//echo "<p>$sql</p>";

  		$query = $conn->prepare($sql);	//Prepares the query statement
  		//Binds the parameters to the query.
      $query->bindParam(2, $inFirstName, PDO::PARAM_STR, 100);
      $query->bindParam(2, $inLastName, PDO::PARAM_STR, 100);
      $query->bindParam(3, $inEmail, PDO::PARAM_STR, 100);
      $query->bindParam(4, $inComments, PDO::PARAM_STR, 100);
      $query->bindParam(6, $contact_date, PDO::PARAM_STR, 100);
      $query->bindParam(6, $contact_time, PDO::PARAM_STR, 100);
  		//Run the SQL prepared statements
  		if ( $query->execute(array($inFirstName, $inLastName, $inEmail, $inComments, $inSelect, $inMailing, $inInfo, $contactDate, $contactTime) ))
  		{
  		$message = "<h1>Your record has been successfully added to the database.</h1>";
  		}
  		else
  		{
  		$message = "<h1>You have encountered a problem.</h1>";
  		}
  $query=null;
  $conn=null;	//closes the connection to the database once this page is complete.
}
}// ends if submit
else
{
  //Form has not been seen by the user.  display the form

}
//}//end Valid User True
//else
//{
//Invalid User attempting to access this page. Send person to Login Page
//	header('Location: presentersLogin.php');
//}

 ?>
