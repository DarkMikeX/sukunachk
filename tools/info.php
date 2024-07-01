
<?php

function getUserProfilePhoto($userId) {
    global $website;
    $url = $website . "/getUserProfilePhotos?user_id=" . $userId . "&limit=1";

    $response = json_decode(file_get_contents($url), TRUE);

    if ($response === FALSE) {
        error_log("𝑭𝒂𝒊𝒍𝒆𝒅 𝑻𝒐 𝑮𝒆𝒕 𝑼𝒔𝒆𝒓 𝑷𝒓𝒐𝒇𝒊𝒍𝒆 𝑷𝒉𝒐𝒕𝒐: " . $url);
        return null;
    }
    if ($response['ok'] && count($response['result']['photos']) > 0) {
        return $response['result']['photos'][0][0]['file_id'];
    }

    return null;
}



//============function end==========//
if (preg_match('/^(\/info|\.id|!id)/', $text)) {

    $photoId = getUserProfilePhoto($userId);

    $m = " 𝑼𝒔𝒆𝒓 𝑰𝑵𝑭𝑶𝑹𝑴𝑨𝑻𝑰𝑶𝑵 ✅%0A━━━━━━━━━━━━━%0A× 𝑼𝑺𝑬𝑹𝑵𝑨𝑴𝑬 - @$username%0A× 𝑼𝑺𝑨𝑮𝑬 𝑵𝑨𝑴𝑬  ↯ $firstname%0A× 𝑻𝑮 𝑰𝑫  ↯ <code>$userId</code>%0A× 𝑪𝒉𝒂𝒕 𝑰𝑫 ↯ <code>$chatId</code>%0A× 𝑹𝑨𝑵𝑲 ↯ $rank%0A× 𝑷𝒍𝒂𝒏 𝑬𝒙𝒑𝒊𝒓𝒚 ↯ $expiryDate%0A━━━━━━━━━━━━━%0A|×| 𝑫𝒆𝒗 - @DarkMikeX";

    if ($photoId) {
        sendPhotox($chatId, $photoId, $m);
    } else {
        sendMessage($chatId, $m, $message_id);
    }
}
