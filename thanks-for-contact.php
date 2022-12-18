<?php

$str_json = file_get_contents('php://input');
$obj_json = json_decode($str_json);

// count files in a directory
// Set the current working directory
$directory = getcwd() . "/form-contacts/";

// Initialize filecount variable
$filecount = 0;

$files2 = glob($directory . "*");

if ($files2) {
    $filecount = count($files2);
}

$fp = fopen('./form-contacts/' . (string)($filecount + 1) . '.txt', 'a');

foreach ($obj_json as $item) {
    fwrite($fp, $item . "\n");
}

fclose($fp);

// make a response for the client
$myObj = (object)[];
$myObj->success = True;
$myObj->message = "Your message is sent successfully!";
$myObj->error_code = 200;
$myObj->data = (object)[];


$myJSON = json_encode($myObj);

echo $myJSON;
