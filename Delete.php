<?php
$logFile = 'log.html';
if (file_exists($logFile) && filesize($logFile) > 0) {
    // Read the contents of the log file
    $contents = file_get_contents($logFile);

    // Find the last occurrence of the message entry
    $lastMessagePos = strrpos($contents, "<div class='msgln'>");
    if ($lastMessagePos !== false) {
        // Remove the last message entry
        $newContents = substr($contents, 0, $lastMessagePos);

        // Write the modified content back to the file
        file_put_contents($logFile, $newContents);

        echo "Previous message deleted successfully.";
    } else {
        echo "No previous message found.";
    }
} else {
    echo "No chat history available.";
}
?>