<?php
if ((strpos($message, "-apm") === 0) || (strpos($message, "?apm") === 0) || (strpos($message, "😁apm") === 0)) {
    // Check if $userId is in the list of owner users
    $ownerUsers = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);
    $isUserOwner = in_array($userId, $ownerUsers);

    if ($isUserOwner) {
        // Extract the ID and expiration date from the message
        $parts = explode(" ", $message); // Split the message by spaces
        $apmId = $parts[1]; // ID to add
        $expirationDate = $parts[2] ?? 7; // Default expiration date if not provided

        // Check if the ID is provided
        if (empty($apmId)) {
            sendMessage($chat_id, "Please provide a user ID and expiration date to add", $message_id);
            exit();
        }

        // Path to the paid.txt file
        $paidFile = 'Database/paid.txt';

        // Read existing entries from paid.txt
        $paidEntries = file($paidFile, FILE_IGNORE_NEW_LINES);

        // Check if the user ID already exists in paid.txt
        $userExists = false;
        foreach ($paidEntries as $entry) {
            list($existingId, $existingDate) = explode(' ', $entry);
            if ($apmId == $existingId) {
                $userExists = true;
                break;
            }
        }

        if ($userExists) {
            sendMessage($chat_id, "User with ID $apmId is already paid user", $message_id);
        } else {
            // Set the expiration date
            $expirationDateFormatted = date("Y-m-d", strtotime("+$expirationDate days"));

            // Add the user ID and expiration date to the paid list
            $newEntry = "$apmId $expirationDateFormatted";
            file_put_contents($paidFile, $newEntry . PHP_EOL, FILE_APPEND | LOCK_EX);

            // Notify the user
           /* $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$apmId&text=" . urlencode("Your purchase is confirmed. Access granted until $expirationDateFormatted.");
            file_get_contents($url); */
          $dev = "<code>@DarkMikeX1</code>";
            $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$apmId&text=" . urlencode("<b>- - - - - - - - - - - - - - - - - - - - - -\nYour Purchase Is confirmed ✅\n- - - - - - - - - - - - - - - - - - - - - -\n🎉 Access Granted 🎉\nPlan: PREMIUM\nValid for: $expirationDateFormatted\nStatus:ACTIVE\nId: $apmId\nFor More: /info\n- - - - - - - - - - - - - - - - - - - - - -\nAny Problem Contact: @DarkMikeX1\n- - - - - - - - - - - - - - - - - - - - - -\nDev » $dev</b>");
            $url .= "&parse_mode=HTML"; // Add the parse_mode parameter


            file_get_contents($url);
            sendMessage($chat_id, "User with ID $apmId has been added to the paid users with expiration date $expirationDateFormatted.", $message_id);
        }
    } else {
        sendMessage($chat_id, "Only owners can perform this action", $message_id);
    }
}
?>

