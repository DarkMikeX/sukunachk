<?php

if (strpos($message, "/redeem") === 0) {
    $codeToRedeem = trim(substr($message, 8));

    $codesAndExpiryDays = file('Database/codes.txt', FILE_IGNORE_NEW_LINES);
    $found = false;
    $newCodesAndExpiryDays = [];

    foreach ($codesAndExpiryDays as $line) {
        $line = trim($line);
        if (strpos($line, '[') === 0 && strpos($line, ']') !== false) {
            $parts = explode("|", substr($line, 1, -1));
            $codeFromFile = trim($parts[0]);

            if (strcasecmp($codeToRedeem, $codeFromFile) === 0 && !$found) {
                $found = true;
                
                $expiryDays = (int) $parts[1];
                $expiryDate = date('Y-m-d', strtotime("+$expiryDays days"));
                file_put_contents('Database/paid.txt', "$userId $expiryDate\n", FILE_APPEND);

                sendMessage($chatId, "𝑲𝒆𝒚 𝑹𝒆𝒅𝒆𝒆𝒎𝒆𝒅 𝑺𝒖𝒄𝒄𝒆𝒔𝒔𝒇𝒖𝒍𝒍𝒚!! 🎉
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  
𝑵𝒐𝒘 𝒀𝒐𝒖 𝑯𝒂𝒗𝒆 𝑼𝒏𝒍𝒊𝒎𝒊𝒕𝒆𝒅 𝑪𝒓𝒆𝒅𝒊𝒕𝒔 𝑼𝒏𝒕𝒊𝒍 𝑼𝒓 𝑷𝒍𝒂𝒏 𝑰𝒔 𝑫𝒆𝒂𝒅✨
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -   
 𝐉𝐨𝐢𝐧 - @MkDarkHub", $messageId);
            } else {
                $newCodesAndExpiryDays[] = $line;
            }
        }
    }

    if ($found) {
        file_put_contents('Database/codes.txt', implode("\n", $newCodesAndExpiryDays));
    } else {
        sendMessage($chatId, "𝑰𝒏𝒗𝒂𝒍𝒊𝒅 𝑶𝒓 𝑨𝒍𝒓𝒆𝒂𝒅𝒚 𝑹𝒆𝒅𝒆𝒆𝒎𝒆𝒅 𝑪𝒐𝒅𝒆!! ❌", $messageId);
    }
}
?>
