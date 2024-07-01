<?php
include __DIR__."/../config/variables.php";
include __DIR__."/config/users.php";
include_once __DIR__."/../functions/bot.php";
include_once __DIR__."/../functions/functions.php";




if ((strpos($message, "/id") === 0)||(strpos($message, "!id") === 0)||(strpos($message, ".id") === 0)||(strpos($message, "!start") === 0)||(strpos($message, "/id") === 0)||(strpos($message, "/id") === 0)){
    
    bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>" <b>[<a href='t.me/MkDarkHub'>↯</a>]</b>       𝐈𝐃 𝐋𝐨𝐨𝐤𝐮𝐩        <b>[<a href='t.me/MkDarkHub'>↯</a>]</b>
            
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐘𝐨𝐮𝐫 𝐈𝐃 :- <code>$userId</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐆𝐫𝐨𝐮𝐩 𝐈𝐃 :- <code>$chat_id</code>
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐔𝐬𝐞𝐫 :- @".$username."
<b>[<a href='t.me/MkDarkHub'>↯</a>]</b> 𝐃𝐞𝐯 :- <a href='t.me/DarkMikex1'>⋉ 𝑀𝐼𝘒𝐸 ⋊</a>",
            'parse_mode'=>'html',
            'reply_to_message_id'=> $message_id
            ]);
}


?>