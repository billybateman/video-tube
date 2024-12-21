<?php

/** Check if environment is development and display errors **/
function check_image($external_link){
    if (@getimagesize($external_link)) {
       return true;
    } else {
       return false;
    }
} 


function downloadVideo($url) {

    $outputDir = CDN_FOLDER . "/videos/files/";
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    $filename = uniqid() . '.mp4';
    $filePath = $outputDir . $filename;

    $command = "/usr/local/bin/yt-dlp -o " . escapeshellarg($filePath) . " '" . $url . "'";
    
    $output = shell_exec("$command");


    if (file_exists($filePath)) {
        return $filename;
    } else {
        return "error";
    }
}


function login(){
    ?>
    <script type="text/javascript">
        window.location.href = '/login';
    </script>
    <?php
}


function filter_xss($string, $allowed_tags = array('a', 'em', 'strong', 'cite', 'code', 'ul', 'ol', 'li', 'dl', 'dt', 'dd')) {
    // Only operate on valid UTF-8 strings. This is necessary to prevent cross
    // site scripting issues on Internet Explorer 6.
    
    
    // Remove NUL characters (ignored by some browsers)
    $string = str_replace(chr(0), '', $string);
    // Remove Netscape 4 JS entities
    $string = preg_replace('%&\s*\{[^}]*(\}\s*;?|$)%', '', $string);
  
    // Defuse all HTML entities
    $string = str_replace('&', '&amp;', $string);
    // Change back only well-formed entities in our whitelist
    // Decimal numeric entities
    $string = preg_replace('/&amp;#([0-9]+;)/', '&#\1', $string);
    // Hexadecimal numeric entities
    $string = preg_replace('/&amp;#[Xx]0*((?:[0-9A-Fa-f]{2})+;)/', '&#x\1', $string);
    // Named entities
    $string = preg_replace('/&amp;([A-Za-z][A-Za-z0-9]*;)/', '&\1', $string);

    $string = htmlspecialchars($string);
    $string = htmlentities($string);
  
    return  addslashes($string);
  }

function convertTitleToURL($str) { 
    
    // Convert string to lowercase 
    $str = strtolower($str); 
    
    // Replace the spaces with hyphens 
    $str = str_replace(' ', '-', $str); 
    
    // Remove the special characters 
    $str = preg_replace('/[^a-z0-9\-]/', '', $str); 
    
    // Remove the consecutive hyphens 
    $str = preg_replace('/-+/', '-', $str); 
    
    // Trim hyphens from the beginning 
    // and ending of String 
    $str = trim($str, '-'); 
    
    return $str; 
} 

function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
    ini_set('post_max_size', '2000M');
    ini_set('upload_max_filesize', '2000M');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
    ini_set('post_max_size', '2000M');
   
}
}

//phpinfo();

//exit;


function redirect($url) {
    header("location: " . $url);
}

/** Check for Magic Quotes and remove them **/
function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes() {
    //if ( get_magic_quotes_gpc() ) {
            $_GET    = stripSlashesDeep($_GET   );
            $_POST   = stripSlashesDeep($_POST  );
            $_COOKIE = stripSlashesDeep($_COOKIE);
    //}
}

/** Check register globals and remove them **/
function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
		echo 'here';
    }
}

function send_email ($to_email, $from_email, $from_name, $subject, $msg) {
    //split up to email array, if given
    if (is_array($to_email)) {
        $to_email_string = implode(', ', $to_email);
    }
    else {
        $to_email_string = $to_email;
    }
  
    //Assemble headers
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: $from_name <$from_email>" . "\r\n";
  
    //send via PHP's mail() function
    mail($to_email_string, $subject, $msg, $headers);
}

// get html dom from file
// $maxlen is defined in the code as PHP_STREAM_COPY_ALL which is defined as -1.
function file_get_html($url, $use_include_path = false, $context=null, $offset = -1, $maxLen=-1, $lowercase = true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT)
{
	// We DO force the tags to be terminated.
	$dom = new simple_html_dom(null, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
	// For sourceforge users: uncomment the next line and comment the retreive_url_contents line 2 lines down if it is not already done.
	$contents = file_get_contents($url, $use_include_path, $context, $offset);
	// Paperg - use our own mechanism for getting the contents as we want to control the timeout.
	//$contents = retrieve_url_contents($url);
	if (empty($contents) || strlen($contents) > MAX_FILE_SIZE)
	{
		return false;
	}
	// The second parameter can force the selectors to all be lowercase.
	$dom->load($contents, $lowercase, $stripRN);
	return $dom;
}

// get html dom from string
function str_get_html($str, $lowercase=true, $forceTagsClosed=true, $target_charset = DEFAULT_TARGET_CHARSET, $stripRN=true, $defaultBRText=DEFAULT_BR_TEXT, $defaultSpanText=DEFAULT_SPAN_TEXT)
{
	$dom = new simple_html_dom(null, $lowercase, $forceTagsClosed, $target_charset, $stripRN, $defaultBRText, $defaultSpanText);
	if (empty($str) || strlen($str) > MAX_FILE_SIZE)
	{
		$dom->clear();
		return false;
	}
	$dom->load($str, $lowercase, $stripRN);
	return $dom;
}

// dump html dom tree
function dump_html_tree($node, $show_attr=true, $deep=0)
{
	$node->dump($node);
}

function randomPassword($length,$count, $characters) {
 
// $length - the length of the generated password
// $count - number of passwords to be generated
// $characters - types of characters to be used in the password
 
// define variables used within the function    
    $symbols = array();
    $passwords = array();
    $used_symbols = '';
    $pass = '';
 
// an array of different character types    
    $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
    $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $symbols["numbers"] = '1234567890';
    $symbols["special_symbols"] = '!?~@#-_+<>[]{}';
 
    $characters = explode(",",$characters); // get characters types to be used for the passsword
    foreach ($characters as $key=>$value) {
        $used_symbols .= $symbols[$value]; // build a string with all characters
    }
    $symbols_length = strlen($used_symbols) - 1; //strlen starts from 0 so to get number of characters deduct 1
     
    for ($p = 0; $p < $count; $p++) {
        $pass = '';
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $symbols_length); // get a random character from the string with all characters
            $pass .= $used_symbols[$n]; // add the character to the password string
        }
        $passwords[] = $pass;
    }
     
    return $passwords; // return the generated password
}

setReporting();
removeMagicQuotes();
unregisterGlobals();

?>