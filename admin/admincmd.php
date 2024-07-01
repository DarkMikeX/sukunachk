<?php
if ((strpos($message, "/owner") === 0)||(strpos($message, "!owner") === 0)||(strpos($message, ".owner") === 0))
{
  $owners = file_get_contents('Database/owner.txt');
  $admins = explode("\n", $owners);
  if (!in_array($userId, $admins)) {
      sendMessage($chatId,"𝑶𝑶𝑷𝑺! 𝒀𝑶𝑼 𝑨𝑹𝑬 𝑵𝑶𝑻 𝑨𝑫𝑴𝑰𝑵  ❌",$messageId);
  } else
  {
  sendMessage($chatId,urlencode(
    "<b>
Admin commands here

Code generate: /code day-amount
Usage: <code>/code 1-1</code>

Delete expired: /remexp
Usage: <code>/remexp</code>

Soon adding more...

</b>"),$messageId);
  }
}

?>