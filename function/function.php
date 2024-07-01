<?php

function send_reply($chatId, $message_id, $keyboard, $message) {
    global $website;
    $url = $website . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message) . "&reply_to_message_id=" . $message_id . "&parse_mode=HTML&reply_markup=" . $keyboard;
    $response = file_get_contents($url);
    
    if ($response === FALSE) {
        error_log("𝑭𝒂𝒊𝒍𝒆𝒅 𝑻𝒐 𝑬𝒅𝒊𝒕 𝑴𝒆𝒔𝒔𝒂𝒈𝒆: " . $url);
    }
    
    return json_decode($response, TRUE)['result']['message_id'];
}


function edit_sent_message($chatId, $message_id, $message) {
    global $website;
    $url = $website . "/editMessageText?chat_id=" . $chatId . "&message_id=" . $message_id . "&text=" . urlencode($message) . "&parse_mode=HTML";
    $response = file_get_contents($url);

    if ($response === FALSE) {
        error_log("𝑭𝒂𝒊𝒍𝒆𝒅 𝑻𝒐 𝑬𝒅𝒊𝒕 𝑴𝒆𝒔𝒔𝒂𝒈𝒆: " . $url);
    }
    return $response;
}


function checkAccess($userid) {
    $usersPaid = file("Database/paid.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $usersOwner = file("Database/owner.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
  $allUsers = array_merge($usersPaid, $usersOwner);
    foreach($allUsers as $user) {
        $parts = explode(" ", $user);
        $userIdFromFile = $parts[0];

        if($userid == $userIdFromFile) {
            return true;
        }
    }
    return false;
}

function editMessagei ($chatId, $message,$message_id){
global $botToken;
$url = "https://api.telegram.org/bot".$botToken."/editMessageText?chat_id=".$chatId."&message_id=".$message_id."&text=".$message."&parse_mode=HTML";
$result = file_get_contents($url);      



// ... (your existing code)

// Add this function to check if a user is spamming
function isUserSpamming($userId, $cooldownInSeconds = 10) {
    $spamFile = "Database/spam_" . $userId . ".txt";
    
    if (file_exists($spamFile)) {
        $lastRequestTime = file_get_contents($spamFile);

        // Check if the time elapsed is less than the cooldown period
        if (time() - $lastRequestTime < $cooldownInSeconds) {
            return true; // User is spamming
        }
    }

    // Update the last request time
    file_put_contents($spamFile, time());

    return false; // User is not spamming
}

// ... (your existing code)

// Example usage:
$userId = "6716561862"; // Replace with the actual user ID
if (isUserSpamming($userId)) {
    // Handle spam behavior, such as ignoring the request
    // or sending a warning to the user
    send_reply($chatId, $message_id, $keyboard, "𝑷𝒍𝒆𝒂𝒔𝒆 𝑾𝒂𝒊𝒕 𝑩𝒆𝒇𝒐𝒓𝒆 𝑴𝒂𝒌𝒊𝒏𝒈 𝑨𝒏𝒐𝒕𝒉𝒆𝒓 𝑹𝒆𝒒𝒖𝒆𝒔𝒕.");
    exit; // Exit the script or perform appropriate action
}
}

// ... (continue with your existing code)



function hasFreeAccess($chatId) {
    // Path to the file
    $filePath = 'Database/chatauth.txt';
    
    // Check if the file exists
    if (!file_exists($filePath)) {
        return false;
    }
    
    // Read the file contents into an array
    $fileContents = file_get_contents($filePath);
    
    // Trim whitespace from each line and convert to array
    $lines = explode("\n", $fileContents);
    $lines = array_map('trim', $lines);
    
    // Check if $chatId is in the array of lines
    if (in_array($chatId, $lines)) {
        return true;
    } else {
        return false;
    }
}





