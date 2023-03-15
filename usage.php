<h2>USAGE :: PHP Message Authentication Code</h2>
<?php
require_once("PhpMessageAuthenticationCode.inc.php");
$obj=new PhpMessageAuthenticationCode();

//---------------------------------------------------------------//
//Example 1
//---------------------------------------------------------------//
$data="30";
$hash=$obj->generateHash($data);
$encode_link=0;

$basiclink=$obj->prepareLink("./test.php", $data, $hash, $encode_link);
echo "<hr>MAC Link1: <a target='_blank' href='$basiclink'>$basiclink</a>";
echo "\n";


//---------------------------------------------------------------//
//Example 2
//---------------------------------------------------------------//
$data="a=10&b=20&c=30";
$hash=$obj->generateHash($data);
$encode_link=0;

$advancelink1=$obj->prepareLink("./test.php", $data, $hash, $encode_link);
echo "<hr>MAC Link2: <a target='_blank' href='$advancelink1'>$advancelink1</a>";
echo "\n";



//---------------------------------------------------------------//
//Example 3
//---------------------------------------------------------------//
$data="param1=value1&amp;param2=value2";
$enc_data=base64_encode($data);
$hash=$obj->generateHash($enc_data);
$encode_link=1;

$advancelink2=$obj->prepareLink("./test.php", $data, $hash, $encode_link);
echo "<hr>MAC Link3: <a target='_blank' href='$advancelink2'>$advancelink2</a>";
echo "\n";

// -------------- Symmetric Encryption --------------  //
//Example 4

$information = "my secret information";
$chiper = "AES-256-CBC";
$secret = str_repeat("0", 32);
$options = 0;
$iv = str_repeat("0", openssl_cipher_iv_length($chiper));
// $iv = random_bytes(16);

$encryptedString = openssl_encrypt($information, $chiper, $secret, $options, $iv);
echo "encrypted string:" .$encryptedString;
echo "\n";

$decryptedString = openssl_decrypt($encryptedString, $chiper, $secret, $options, $iv);
echo "decrypted string:" .$decryptedString;
echo "\n";

?>