<?php
if (preg_match('/\/register/', $message)) {
    // Load the existing users.
    $users = file_get_contents('Database/free.txt');
    $freeusers = explode("\n", $users);

    // Check if the user has already registered.
    if (in_array($userId, $freeusers)) {
        $response = "- - - - - - - - - - - - - - - - - - - - - - -                                                                                               🎉 𝐖𝐄𝐋𝐂𝐎𝐌𝐄 𝐂𝐇𝐀𝐌𝐏! 🎉!                                                                                               [ϟ] 𝐂𝐡𝐚𝐦𝐩 𝐘𝐨𝐮'𝐫𝐞 𝐚𝐥𝐫𝐞𝐚𝐝𝐲 𝐫𝐞𝐠𝐢𝐬𝐭𝐞𝐫𝐞𝐝 𝐢𝐧 𝐨𝐮𝐫 𝐝𝐚𝐭𝐚𝐛𝐚𝐬𝐞!                                                                                               [ϟ] 𝐍𝐨 𝐍𝐞𝐞𝐝 𝐭𝐨 𝐫𝐞𝐠𝐢𝐬𝐭𝐞𝐫 𝐔𝐬𝐞 𝐌𝐲 𝐅𝐮𝐥𝐥 𝐏𝐨𝐰𝐞𝐫 🎃                                                                                               - - - - - - - - - - - - - - - - - - - - - - -";
    } else {
        // If not, add the user to the file.
        $file = fopen('Database/free.txt', 'a');
        fwrite($file, $userId . "\n");
        fclose($file);

        $response = "- - - - - - - - - - - - - - - - - - - - - - -                                                                                               🎉 𝐖𝐄𝐋𝐂𝐎𝐌𝐄 𝐂𝐇𝐀𝐌𝐏! 🎉!                                                                                               [ϟ] 𝐂𝐡𝐚𝐦𝐩 𝐘𝐨𝐮'𝐫𝐞 𝐍𝐨𝐰 𝐫𝐞𝐠𝐢𝐬𝐭𝐞𝐫𝐞𝐝 𝐢𝐧 𝐨𝐮𝐫 𝐝𝐚𝐭𝐚𝐛𝐚𝐬𝐞!                                                                                               [ϟ] 𝐍𝐨𝐰 /start 𝐀𝐧𝐝 𝐔𝐬𝐞 𝐌𝐲 𝐅𝐮𝐥𝐥 𝐏𝐨𝐰𝐞𝐫 🎃                                                                                               - - - - - - - - - - - - - - - - - - - - - - -";
    }

    // Send the response.
    reply_tox($chatId, $message_id, $keyboard, $response);
}
?>
