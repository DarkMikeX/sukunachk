<?php


if (strpos($message, "/rmexp") === 0) {
    // Read the owner's chat ID from the file
    $ownerId = trim(file_get_contents('Database/owner.txt'));

    // Check if the user's chat ID matches the owner's chat ID
    if ($chatId != $ownerId) {
        sendMessage($chatId, "𝑶𝑶𝑷𝑺! 𝒀𝑶𝑼 𝑨𝑹𝑬 𝑵𝑶𝑻 𝑨𝑫𝑴𝑰𝑵 ❌", $randomArgument);
    } else {
        // The rest of your code goes here
        $lines = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
        $currentDate = date('Y-m-d');
        foreach ($lines as $index => $line) {
            list($userIdFromFile, $expiryDate) = explode(" ", $line);
            if ($expiryDate < $currentDate) {
                unset($lines[$index]); // remove the expired entry
            }
        }
        // save the remaining (non-expired) entries back to the file
        $result = file_put_contents('Database/paid.txt', implode("\n", $lines));
        if ($result !== false) {
            sendMessage($chatId, "𝑨𝒍𝒍 𝑻𝒉𝒆 𝑬𝒙𝒑𝒊𝒓𝒆𝒅 𝑼𝒔𝒆𝒓𝒔 𝑨𝒓𝒆 𝑹𝒆𝒎𝒐𝒗𝒆𝒅 𝑺𝒖𝒄𝒄𝒆𝒔𝒔𝒇𝒖𝒍𝒍𝒚 ✅", $randomArgument);
        } else {
            sendMessage($chatId, "𝑨𝒏 𝑬𝒓𝒓𝒐𝒓 𝑶𝒄𝒄𝒖𝒓𝒓𝒆𝒅 ❌", $randomArgument);
        }
    }
}
