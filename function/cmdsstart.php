
application/x-httpd-php cmdsstart.php ( PHP script, UTF-8 Unicode text )

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('log_errors', TRUE);
ini_set('error_log', 'errors.log');


$users = file_get_contents('Database/free.txt');
$freeusers = explode("\n", $users);

$videoURLStart = "https://t.me/MkDarkHub/1163";


if (preg_match('/^(\/start|\.start|!start)/', $text)) {
    if (in_array($userId, $freeusers)) {
        $caption = "☆  Wᴇʟᴄᴏᴍᴇ Tᴏ Mɪᴋᴇ Dᴇsᴛʀᴏʏᴇʀ Bᴏᴛ  ☆
☆ 『 <code>$username</code> 』 Yᴏᴜ Aʀᴇ 『 <code>$rank</code> 』 ☆
────────⊳⋆⊲────────
々Oᴜʀ Dᴇsᴛʀᴏʏᴇʀ Cʜᴇᴄᴋᴇʀ Mᴀᴅᴇ Fᴏʀ Dᴇsᴛʀᴏʏɪɴɢ Wᴀɴɴᴀ Dᴇsᴛʀᴏʏ. 々

々 Jᴜsᴛ Dᴏ /register Aɴᴅ Bᴏᴏᴍ. 々

『 ...Kɴᴏᴡ Cᴏᴍᴍᴀɴᴅs... 』
────────⊳⋆⊲────────
々 Dᴇsᴛʀᴏʏᴇʀ Cᴍᴅs :- /cmds 々 

★ Oᴡɴᴇʀ :- Mɪᴋᴇ ㊑ Sᴜᴋᴜɴᴀ ★
★ Dᴇᴠ :- @Darkmikex ★
────────⊳⋆⊲────────
『 Bᴏᴛ Gᴀᴛᴇs , Fᴜɴᴄᴛɪᴏɴ , Tᴏᴏʟs Aʀᴇ ɢᴇᴛᴛɪɴɢ Uᴘᴅᴀᴛᴇᴅ Fᴏʀ Bᴏᴛ Uᴘᴅᴀᴛᴇs Jᴏɪɴ @MkDarkHub Nᴏᴡ Dᴇsᴛʀᴏʏ Sɪᴛᴇs... 』

🍁 Eɴᴊᴏʏ...Aɴᴅ...Dᴇsᴛʀᴏʏ 🍁";
        sendVideox($chatId, $videoURLStart, $caption, $keyboard);
    } else {
        reply_tox($chatId,$message_id,$keyboard,"Hᴇʏ 『 <code>$username</code> 』Yᴏᴜ Aʀᴇ Nᴏᴛ Rᴇɢɪsᴛᴇʀᴇᴅ Iɴ Mʏ Dᴀᴛᴀʙᴀsᴇ
 ☆ Dᴏ /register Fᴏʀ Usᴇ  ☆");
    }
}
//=========START END========//
if (preg_match('/^(\/cmds|\.cmds|!cmds)/', $text)) {

    $videoUrl = "https://t.me/MkDarkHub/1163"; 

    $keyboard2 = json_encode([
        'inline_keyboard' => [
            [
                             ['text' => '𝑮𝒂𝒕𝒆𝒘𝒂𝒚𝒔', 'callback_data' => 'gates'],
                                 ['text' => '𝑻𝒐𝒐𝒍𝒔 ', 'callback_data' => 'herr'],
                                 ],
                                 [
                                 ['text' => '@DarkMikeX', 'callback_data' => 'channel'],
                             ],
        ]
    ]);

    $caption = "☆『 <code>$username</code> 』 Wᴇʟᴄᴏᴍᴇ Tᴏ Mɪᴋᴇ Dᴇsᴛʀᴏʏᴇʀ Bᴏᴛ Cᴍᴅ Sᴇᴄᴛɪᴏɴ ☆ 

☆ Bᴜʏ Pʟᴀɴ Tᴏ Usᴇ Mᴇ ☆ 
    
☆ Dᴏ /price ☆ ";
    file_get_contents("https://api.telegram.org/bot$botToken/deleteMessage?chat_id=$chatId&message_id=$messageId");

    // Using sendVideo endpoint instead of sendPhoto
    file_get_contents("https://api.telegram.org/bot$botToken/sendVideo?chat_id=$chatId&video=$videoUrl&caption=" . urlencode($caption) . "&parse_mode=HTML&reply_markup=$keyboard2");
}

// Price \\\

if (preg_match('/^(\/price|\.price|!price)/', $text))

{

    $videoUrl = "https://t.me/MkDarkHub/1163"; 

    $keyboard2 = json_encode([
        'inline_keyboard' => [
            [
                      
                                 ['text' => '☆ Vᴇʀɪғʏ Pᴀʏᴍᴇɴᴛ ☆', 'url' => 'https://t.me/DarkMikeX'],   ], ]
    ]);

 $caption="☆ Pʀɪᴄɪɴɢ Mɪᴋᴇ Dᴇsᴛʀᴏʏᴇʀ  ☆ 
────────⊳⋆⊲────────
● Sᴛᴀʀᴛᴇʀ - Uɴʟɪᴍɪᴛᴇᴅ Cʀᴇᴅɪᴛs + Pʀᴇᴍɪᴜᴍ Aᴄᴄᴇss Fᴏʀ 1 Wᴇᴇᴋ ᴀᴛ 1.50$
────────⊳⋆⊲────────
● Sɪʟᴠᴇʀ - Uɴʟɪᴍɪᴛᴇᴅ Cʀᴇᴅɪᴛs + Pʀᴇᴍɪᴜᴍ Aᴄᴄᴇss Fᴏʀ  2 Wᴇᴇᴋs ᴀᴛ 2.5$
────────⊳⋆⊲────────
● Gᴏʟᴅ - Uɴʟɪᴍɪᴛᴇᴅ Cʀᴇᴅɪᴛs + Pʀᴇᴍɪᴜᴍ Aᴄᴄᴇss Fᴏʀ 1 Mᴏɴᴛʜ ᴀᴛ 4.50$
────────⊳⋆⊲────────
● Pʟᴀᴛɪɴᴜᴍ  - Uɴʟɪᴍɪᴛᴇᴅ Cʀᴇᴅɪᴛs + Pʀᴇᴍɪᴜᴍ Aᴄᴄᴇss Fᴏʀ 6  Mᴏɴᴛʜ ᴀᴛ 15$
────────⊳⋆⊲────────
● Lɪғᴇᴛɪᴍᴇ - Uɴʟɪᴍɪᴛᴇᴅ Cʀᴇᴅɪᴛs + Pʀᴇᴍɪᴜᴍ Aᴄᴄᴇss Fᴏʀ Lɪғᴇᴛɪᴍᴇ ᴀᴛ 25$
────────⊳⋆⊲────────
 ☆ Bɪɴᴀɴᴄᴇ: 

 ☆ Bᴛᴄ: 

 ☆ Usᴅᴛ : 
────────⊳⋆⊲────────
Aғᴛᴇʀ Cᴏᴍᴘʟᴇᴛᴇ Pᴀʏᴍᴇɴᴛ Sᴇɴᴅ Sᴄʀᴇᴇɴsʜᴏᴛ Aɴᴅ Tᴇʟᴇɢʀᴀɴ Usᴇʀ Iᴅ..
────────⊳⋆⊲────────
Aʟʟ Pʟᴀɴ ᴡɪʟʟ ʙᴇ Vᴀʟɪᴅ ғᴏʀ 7/15/30  ᴅᴀʏs . Aғᴛᴇʀ ᴛʜᴀᴛ ʏᴏᴜ ʜᴀᴠᴇ ᴛᴏ ᴘᴜʀᴄʜᴀsᴇ ᴀɢᴀɪɴ ᴀɴʏ ᴏғ ᴛʜɪs ᴘʟᴀɴ ᴛᴏ ᴄᴏɴᴛɪɴᴜᴇ ᴜsɪɴɢ. Aʟʟ Pʟᴀɴ ᴀʀᴇ ɴᴏɴ ʀᴇғᴜɴᴅᴀʙʟᴇ.";
  

file_get_contents("https://api.telegram.org/bot$botToken/deleteMessage?chat_id=$chatId&message_id=$messageId");

    // Using sendVideo endpoint instead of sendPhoto
    file_get_contents("https://api.telegram.org/bot$botToken/sendVideo?chat_id=$chatId&video=$videoUrl&caption=" . urlencode($caption) . "&parse_mode=HTML&reply_markup=$keyboard2");
}