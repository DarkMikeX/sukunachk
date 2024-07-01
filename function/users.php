<?php

$owners = ["6447766151"];  // Add owner ids here

function getUsersCount($filename) {
    if(file_exists($filename)) {
        $lines = file($filename);
        return count($lines);
    } else {
        return 0; // Return 0 if the file doesn't exist
    }
}

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message']['text'])) {
    $message = $update['message']['text'];
    $chat_id = $update['message']['chat']['id'];

    if ($message === '/users') {
        if (in_array($chat_id, $owners)) {
            $freeUserCount = getUsersCount('Database/free.txt');
            $paidUserCount = getUsersCount('Database/paid.txt');
            $banUserCount = getUsersCount('Database/banned.txt');
            $response = "[×] 𝑻𝒐𝒕𝒂𝒍 𝑼𝒔𝒆𝒓𝒔: {$freeUserCount}%0A[×] 𝑷𝒂𝒊𝒅 𝑼𝒔𝒆𝒓𝒔: {$paidUserCount}%0A[×] 𝑩𝒂𝒏𝒏𝒆𝒅 𝑼𝒔𝒆𝒓𝒔: {$banUserCount}%0A%0A[×] 𝑩𝒐𝒕 𝑩𝒚: @DarkMikeX ";
        } else {
            $response = "𝑶𝑶𝑷𝑺! 𝒀𝑶𝑼 𝑨𝑹𝑬 𝑵𝑶𝑻 𝑨𝑫𝑴𝑰𝑵  ❌";
        }
        sendMessage($chat_id, $response, $message_id);
    }
}
?>
