<?php
#جلب معلومات من مصفوفة التحكم #
function test($IDBOT,$t,$r,$tx,$test){
$txt=null;
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$txt=$databot["info"]["$t"]["$r"];
if($test=="put"){
$databot["info"]["$t"]["$r"]="$tx";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
}
if($test=="get"){
return $txt;
}
}
#اضافة القنوات
function fahs($IDBOT,$channel,$st){
@$datajson = json_decode(file_get_contents("data/channels.json"),true);

$ch_yes = $datajson["info"]["فحص"]["yeschannel"];
$ch_no = $datajson["info"]["فحص"]["nochannel"];
if(!in_array($channel,$ch_yes) and ! in_array($channel,$ch_no)){
$datajson["info"]["فحص"]["$st"][]="$channel";
file_put_contents("data/channels.json", json_encode($datajson));
}
}

//===۞𝗞𝗜𝗡𝗗𝗜۞===//
function wathqrees($channel,$token,$IDBOT){
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
if($channel != "" ){
$users=$databot["info"]["القنوات"]["info"][$channel]["user"];
if($users==null or $users=="no"){
$users=$channel;
}

$status = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channel&user_id=$IDBOT"),true);
$admins = $status['result']['status'];
$delete = $status['result']['can_delete_messages'];
$send = $status['result']['can_post_messages'];

$ch_yes = $datajson["info"]["فحص"]["yeschannel"];
#ليست مخالفة
if($admins =="administrator" and $send == "true"){
if(!in_array($channel,$ch_yes)){
fahs($IDBOT,$channel,"yeschannel");
}
}
if($users){
#حاذفة للبوت
if($admins != "administrator" and $delete !=true and $send != "true" and $users!= null){
/*i*/
file_put_contents("admin1.txt","🚫ـ @$users\n",FILE_APPEND);
fahs($IDBOT,$channel,"nochannel");
}
#مقيد الحذف
if($delete !=true and $admins == "administrator"){
file_put_contents("delete1.txt","🗑ـ @$users\n",FILE_APPEND);   
fahs($IDBOT,$channel,"nochannel");
}
#مقيد النشر
if($send !=true and $admins == "administrator"){
file_put_contents("send1.txt","⚠ـ @$users\n",FILE_APPEND); 
fahs($IDBOT,$channel,"nochannel");
}
}
}
}
#####
function resmbre($res_ch){
if($res_ch<1000){
if($res_ch>=100){
$arr1= str_split($res_ch);
$res = "0$arr1[0]𝐡";
}
if($res_ch<100){ 
$arr1= str_split($res_ch);
$res ="0$arr1[0]𝐡";   
}
}
if($res_ch>=1000){
$arr1 = str_split($res_ch);
$res = "0$arr1[0]𝐤";
}
if($res_ch>=10000){
$arr1 = str_split($res_ch);
$res = "0$arr1[0].$arr1[1]𝐤";
}
return $res;
}

function infochannel($channel,$IDBOT,$res,$name,$link){

@$datajson = json_decode(file_get_contents("data/channels.json"),true);

if(!isset($datajson["info"]["انشاء"][$channel])){
$datajson["info"]["انشاء"][$channel]["name"]="$name";
$datajson["info"]["انشاء"][$channel]["res"]="$res";
$datajson["info"]["انشاء"][$channel]["link"]="$link";
file_put_contents("data/channels.json", json_encode($datajson));
}
}
function wathqres($info_ch,$IDBOT){
$ex = explode("=",$info_ch);
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$channel = $ex[1];
$mem=$ex[0];
if($channel!=null){
$res=resmbre($mem);

$roabt = file_get_contents("data/roabt.txt");
$userch=file_get_contents("data/userch/$usernamech.txt");
$linkch=file_get_contents("data/linkch/$usernamech.txt");

$tngeh=$databot["info"]["تحكم"]["حذف الايموجي"];

$namech=$databot["info"]["القنوات"]["info"][$channel]["name"];

$roabt = $databot["info"]["تحكم"]["نوع الروابط"];

$userch=$databot["info"]["القنوات"]["info"][$channel]["user"];
$linkch=$databot["info"]["القنوات"]["info"][$channel]["link"];

if($roabt =="عامة" or $roabt ==null){
$users=$databot["info"]["القنوات"]["info"][$channel]["user"];
$users="t.me/$users";

if($userch =="no"){
$users=$databot["info"]["القنوات"]["info"][$channel]["link"];

}
}else{
$users=$databot["info"]["القنوات"]["info"][$channel]["link"];
if($linkch == null or $linkch == "no"){
$users=$databot["info"]["القنوات"]["info"][$channel]["user"];
$users="t.me/$users";
}
} 
####
$tngeh = file_get_contents("data/tngeh.json");
if($tngeh =="مفعلة ✅"){
$namec =str_replace(["ـ","َ","ً","ُ","ٌ","ٍ","ِ","ْ","ٔ",'ٕ','ٓ','ّ','ٰ','ٖ',"'",'"'],"",$namech);
$namechh
=str_replace(["♛","↝","✧","▷","─","✘","℡ᴖ̈","◉","آيۛৣمۛৣآمۛৣ","✦","𝟏","𝟐","𝟑","𝟒","𝟓 ","𝟔 ","𝟕 ","𝟖 ","𝟗","𝟎","
﷼"," ﷻ ","﷽"," ✞","ッ ","۞ ","۩","✟","𖣕","۝ ","Ξ","道"," 凸"," 父 ","个"," ¤"," 品"," 〠 ","๛"," 𖤍 ",

"ᶠᶸᶜᵏᵧₒᵤ"," ࿐"," ⍆ ","⍅ ","⇭ ","༒","  ",""," 𖠃 ",
"𖠅 ","𖠆"," 𖠊"," 𖡒"," 𖡗 ","𖣩 ","꧁ ","꧂",
"〰"," 𖥓 ","𖥏 𖥎 ","𖥌 ","𖥋 ","𖥊"," 𖥈 ",
"𖥅"," 𖥃"," 𖥂 ","𖥀"," 𖤼 ","𖤹","𖤸 ","𖤷 ",
"𖤶 ","𖤭 ","𖤫 ","𖤪 ","𖤨 ","𖤧 ",

"𖤥"," 𖤤 ","𖤣 ","𖤢 ","𖤡",
 "𖤟 ","𖤞 ","𖤝 ","𖤜 ","𖤛"," 𖤚 ",
"𖤘 ","𖤙 ","𖤗"," 𖤕 ","𖤓 ","𖤒"," 𖤐 ",
"ဏ"," ࿘ ","࿗ ","࿖"," ࿕ ","࿑ ","࿌ ","࿋"," ࿊ ",
"࿉"," ࿈"," ࿇ ","࿅ ","࿄ ","࿃"," ࿂"," ༼ ༽ ","༺"," ༻",
"༗ ","༖"," ༕ ","⏝"," ⏜"," ⏎"," ၄ ","߷"," ܛ"," ׀","𖠀 ",

"𖠁 ","𖠂 ","𖠅 ","𖠆 ","𖠇"," 𖠈"," 𖠉 ","𖠍"," 𖠎 ","𖠏"," 𖠐", 
"𖠑 ","𖠒 ","𖠓 ","𖠔"," 𖠕 ","𖠖 ","𖠗"," 𖠘"," 𖠙 ",
"𖠚 ","𖠛 ","𖠜 ","𖠝"," 𖠞"," 𖠟 ","𖠠",
 "𖠡"," 𖠢"," 𖠣"," 𖠤 ","𖠥 ",

"𖠦"," 𖠧 ","𖠨"," ??","𖠪 ","𖠫"," 𖠬 ","𖠭 ",
"𖠮 ","𖠯 ","𖠰 ","𖠱"," 𖠲 ","𖠳 ","𖠴 ","𖠵 ","𖠶 ",
"𖠷 ","𖠸"," 𖠹 ","𖠺","𖠻 ","𖠼"," 𖠽 ","𖠾"," 𖠿",
"𖡀","𖡁"," 𖡂"," 𖡃 ","𖡄","𖡅 ","𖡆"," 𖡇 ","𖡈"," 𖡉"," 𖡊",

"𖡋","𖡌 ","𖡍"," 𖡎 ","𖡏"," 𖡐 ","𖡑 ","𖡒"," 𖡓"," 𖡔 ",
"𖡕"," 𖡖"," 𖡗 ","𖡘 ","𖡙"," 𖡚 ","𖡛 ","𖡜"," 𖡝 ",
"𖡞","𖡟"," 𖡠 ","𖡡 ","𖡢"," 𖡣"," 𖡤 ","𖡥 ","𖡦 ","𖡧"," 𖡨", 
"𖡩"," 𖡪","𖡫 ","𖡬 ","𖡭 ","𖡮 ","𖡯 ","𖡰 ","𖡱 ","𖡲"," 𖡳 ","𖡴"," 𖡵 ","𖡶",

 "𖡷","𖡸","𖡹 ","𖡺 ","𖡻"," 𖡼","𖡽"," 𖡾","𖡿","𖢀","𖢁","𖢂", "𖢃 ","𖢄"," 𖢅"," 𖢆 ","𖢇"," ?? ","𖢉 ","𖢊 ","𖢋"," 𖢌",
"𖢍 ","𖢎 ","𖢏 ","𖢐"," 𖢑"," 𖢒"," 𖢓 ","𖢔",
"𖢕"," 𖢖"," 𖢗"," 𖢘"," 𖢙 ","𖢚"," 𖢛 ","𖢜 ","𖢝 ","𖢞",
"𖢟 ","𖢠 ","𖢡"," 𖢢 ","𖢣 ","𖢤","𖢥 ","𖢦 ","𖢧 ","𖢨 ","𖢩", 
"𖢪 ","𖢫"," 𖢬","𖢭"," 𖢮"," 𖢯 ","𖢰"," 𖢱 ","𖢲 ","𖢳 ",

"𖢴 ","𖢵"," 𖢶 ","𖢷 ","𖢸"," 𖢹"," 𖢺"," 𖢻"," 𖢼 ","𖢽",
"𖢾","𖢿"," 𖣀 ","𖣁"," 𖣂 ","𖣃 ","𖣄"," 𖣅 ","𖣆", 
"𖣇"," 𖣈"," 𖣉"," 𖣊 ","𖣋","𖣌"," 𖣍"," 𖣎", 
"𖣏","𖣐 ","𖣑"," 𖣒 ","𖣓 ","𖣔 ","𖣕 ",
"𖣖 ","𖣗 ","𖣘"," 𖣙"," 𖣚"," 𖣛"," 𖣜",
"𖣝"," 𖣞"," 𖣟"," 𖣠"," 𖣡"," 𖣢 ",

"𖣣 ","𖣤 ","𖣥"," 𖣦"," 𖣧 ","𖣨 ",
"𖣩 ","𖣪 ","𖣫"," 𖣬"," 𖣭"," 𖣮", 
"𖣯"," 𖣰 ","𖣱 ","𖣲"," 𖣳 ",
"𖣴"," 𖣵"," 𖣶"," 𖣷 ","𖣸", 
"𖣹 ","𖣺 ","𖣻 ","𖣼 ","𖣽", 
"𖣾"," 𖣿","☽︎☾︎","➪︎",
"㋛︎","✔︎","𑁍︎",

"𓆉︎","☏︎","☻︎","ᴥ︎","𓁹︎","𓂀︎","ꨄ︎",
"᪥︎","✯︎","߷︎","༆︎","༄︎","Ꙭ︎","⁂︎","⌘︎","᯾︎","❁︎","✰︎",
"✫︎","★︎","𐂃︎","⚣︎","𐂊︎","␈︎","𓄁︎","𓃰︎","𓆏︎",
"𓅿︎","𓀡︎","𓂺︎","𓂸︎","⌫︎","✯︎","⁂︎","᯽︎",
"☼︎","𓂉︎","⚣︎","𓀿︎","𓀿︎","𓃠︎","𓀡︎","𐂊︎",
"𓀬︎","𓂻︎","𓃗︎","♔︎","♕︎","𓆏︎","⇣",
"♯","℡ᴖ̈",

"𝄮"," 𝄵","𓃠","ま","†","♡⁩","˖꒰","ਊ ","❥","㉨","𝆹𝅥𝅮","𝄬 ",
"𝄋 ","𖤍","𖠛","𝅘𝅥𝅮","♬⁩","ㇱ","𝅘𝅥𝅯","メ","〠","〄","⩫","♥",

"🤎","❀","😀","😃","😄","😁","😆","😅","😂","🤣","☺","😊","😇","🙂","🙃","😉","😌","😍","🥰","😘","😗","😙","😚","😋","😜","😝","😛","🤑","🤗","🤪","🤨","🧐","🤓","😎","🤩","🥳","🤡","🤠","😏","😒","😞","😔","😟","😕","🙁","☹️","😣","😖","😫","😩","🥺","😤","😠","😡","🤬","🤯","😶","🥵","🥶","😐","😑","😯","😦","😧","😮","😲","😵","😳","😱","😨","😰","😢","😥","🤤","😭","😓","😪","😴","🙄","🤔","🤭","🤫","🤥","😬","🤐","🥴","🤢","🤮","🤧","😷","🤒","🤕","😈","👿","👹","👺","💩","👻","💀","☠️","👽","👾","🤖","🎃","😺","😸","😹","😻","😼","😽","🙀","😿","😾","🤲","👐","🙌","👏","🙏","🤝","👍","👎","👊","✊","🤛","🤜","🤞","✌","🤟","🤘","👌","👈","👉","👆","👇","☝","✋","🤚","🖐","🖖","👋","🤙","💪","🖕","✍","🦶","🦵","🤳","💅","💍","💄","💋","👄","🦷","👅","👂","👃","👣","👁","👀","🧠","🗣️","👤","👥","👶","🧒","👦","👧","👨","👩","👩‍🦱","👨‍🦱","👩‍🦰","👨‍🦰","👱‍♀","👱","👩‍🦳","👨‍🦳","👨‍🦲","👩‍🦲","🧔","🧓","👴","👵","👲","👳‍♀","👳","🧕","👮‍♀","👮","👷‍♀","👷","💂‍♀","💂","🕵‍♀","🕵","👩‍⚕","👨‍⚕","👩‍🌾","👨‍🌾","👩‍🍳","👨‍🍳","👩‍🎓","👨‍🎓","👩‍🎤","👨‍🎤","👩‍🏫","👨‍🏫","👩‍🏭","👨‍🏭","👩‍💻","👨‍💻","👩‍💼","👨‍💼","👩‍🔧","👨‍🔧","👩‍🔬","👨‍🔬","👩‍🎨","👨‍🎨","👩‍🚒","👨‍🚒","👩‍✈","👨‍✈","👩‍🚀","👨‍🚀","👩‍⚖","👨‍⚖","🤶","🎅","🧙‍♀️","🧙‍♂️","🧝‍♀️","🧝‍♂️","🧛‍♀️","🧛‍♂️","🧟‍♀️","🧟‍♂️","🧞‍♀️","🧞‍♂️","🧜‍♀️","🧜‍♂️","🧚‍♀️","🧚‍♂️","👸","🤴","🦸‍♂️","🦸‍♀️","🦹‍♂️","🦹‍♀️","👰","🤵","👼","🤰","🙇‍♀","🙇","💁","💁‍♂","🙅","🙅‍♂","🙆","🙆‍♂","🙋","🙋‍♂","🤦‍♀","🤦‍♂","🤷‍♀","🤷‍♂","🙎","🙎‍♂","🙍","🙍‍♂","💇","💇‍♂","💆","💆‍♂","🧖‍♀️","🧖‍♂️","🕴","💃","🕺","👯","♂️","🚶‍♀","🚶","🏃‍♀","🏃","👫","👭","👬","💑","👩‍❤‍👩","👨‍❤‍👨","💏","👩‍❤️‍💋‍👩","👨‍❤‍💋‍👨","👪","👨‍👩‍👧","👨‍👩‍👧‍👦","👨‍👩‍👦‍👦","👨‍👩‍👧‍👧","👩‍👩‍👦","👩‍👩‍👧","👩‍👩‍👧‍👦","👩‍👩‍👦‍👦","👩‍👩‍👧‍👧","👨‍👨‍👦","👨‍👨‍👧","👨‍👨‍👧‍👦","👨‍👨‍👦‍👦","👨‍👨‍👧‍👧","👩‍👦","👩‍👧","👩‍👧‍👦","👩‍👦‍👦","👩‍👧‍👧","👨‍👦","👨‍👧","👨‍👧‍👦","👨‍👦‍👦","👨‍👧‍👧","🧶","🧵","🧥","🥼","👚","👕","👖","👔","👗","👙","👘","🥿","👠","👡","👢","👞","👟","🥾","🧦","🧤","🧣","👒","🧢","🎩","🎓","👑","⛑️","🎒","👝","👛","👜","💼","🧳","👓","🕶","🥽","🌂","☂️","♀️","♂️","🐶","🐱","🐭","🐹","🐰","🦊","🐻","🐼","🐨","🐯","🦁","🐮","🐷","🐽","🐸","🐵","🙈","🙉","🙊","🐒","🐔","🐧","🐦","🐤","🐣","🐥","🦆","🦅","🦉","🦇","🐺","🐗","🐴","🦄","🐝","🐛","🦋","🐌","🐚","🦟","🐞","🐜","🦗","🕷","🕸","🐢","🐍","🦎","🦖","🦕","🦂","🦀","🦑","🐙","🦞","🦐","🐠","🐟","🐡","🐬","🦈","🐳","🐋","🐊","🐆","🐅","🦓","🐃","🐂","🐄","🦌","🦛","🐪","🐫","🦒","🦘","🐘","🦏","🦍","🐎","🐖","🦙","🐐","🐏","🐑","🐕","🐩","🐈","🐓","🦃","🦚","🦜","🦢","🕊","🐇","🐁","🦝","🦡","🐀","🐿","🦔","🐾","🐉","🐲","🌵","🎄","🌲","🌳","🌴","🌱","🌿","☘","🍀","🎍","🎋","🍃","🍂","🍁","🍄","🌾","💐","🌷","🌹","🥀","🌻","🌼","🌸","🌺","🌎","🌍","🌏","🌕","🌖","🌗","🌘","🌑","🌒","🌓","🌔","🌚","🌝","🌞","🌛","🌜","🌙","💫","⭐","🌟","✨","⚡","🔥","💥","☄","☀","🌤","⛅","🌥","🌦","🌈","☁","🌧","⛈","🌩","🌨","☃","⛄","❄","🌬","💨","🌪","🌫","🌊","💧","💦","☔","🍏","🍎","🍐","🍊","🍋","🍌","🍉","🍇","🍓","🍈","🍒","🍑","🥭","🍍","🥥","🥝","🥑","🍅","🍆","🥦","🥬","🥒","🥕","🌽","🌶","🥔","🍠","🌰","🥜","🥐","🍞","🥖","🥨","🧀","🥚","🍳","🥓","🥩","🥞","🍤","🍗","🍖","🦴","🍕","🥪","🌭","🍔","🍟","🥙","🌮","🌯","🥗","🥘","🥫","🍝","🍜","🍲","🍥","🥯","🥮","🍣","🍱","🍛","🍙","🍚","🍘","🥠","🍢","🍡","🍧","🍨","🍦","🥧","🧁","🍰","🎂","🍮","🍭","🍬","🍫","🍿","🍩","🥟","🍪","🍯","🥛","🍼","☕","🍵","🥤","🍶","🍺","🍻","🥂","🍷","🥃","🍸","🍹","??","🥄","🍴","🍽","🥣","🥡","🥢","🧂","⚽","🏀","🏈","⚾","🥎","🎾","🏐","🏉","🥏","🎱","🏓","🏸","🥅","🏒","🏑","🥍","🏏","⛳","🏹","🎣","🥊","🥋","🛹","⛸","🥌","🛷","🎿","⛷","🏂","🏋‍♀","🏋","🤺","♀️","♂️","🤸‍♀","🤸‍♂","⛹‍♀","⛹","🤾‍♀","🤾‍♂","🏌‍♀","🏌","🧘‍♀️","🧘‍♂️","🏄‍♀","🏄","🏊‍♀","🏊","🤽‍♀","🤽‍♂","🚣‍♀","🚣","🏇","🧗‍♀️","🧗‍♂️","🚴‍♀","🚴","🚵‍♀","🚵","🎽","🏅","🎖","🥇","🥈","🥉","🏆","🏵","🎗","🎫","🎟","🎪","🤹‍♀","🤹‍♂","🎭","🎨","🎬","🎤","🎧","🎼","🎹","🥁","🎷","🎺","🎸","🎻","🎲","

♟","🎯","🎳","🎮","🎰","🧩","🚗","🚕","🚙","🚌","🚎","🏎","??","🚑","🚒","🚐","🚚","🚛","🚜","🛴","🚲","🛵","🏍","🚨","🚔","🚍","🚘","🚖","??","🚠","🚟","🚃","🚋","🚞","🚝","🚄","🚅","🚈","🚂","🚆","🚇","🚊","🚉","🚁","🛩","✈","🛫","🛬","🚀","🛸","🛰","💺","🛶","⛵","🛥","🚤","🛳","⛴","🚢","⚓","🚧","⛽","🚏","🚦","🚥","🗺","🗿","🗽","⛲","🗼","🏰","🏯","🏟","🎡","🎢","🎠","⛱","🏖","🏝","⛰","🏔","🗻","🌋","🏜","🏕","⛺","🛤","🛣","🏗","🏭","🏠","🏡","🏘","🏚","🏢","🏬","🏣","🏤","🏥","🏦","🏨","🏪","🏫","🏩","💒","🏛","⛪","🕌","🕍","🕋","⛩","🗾","🎑","🏞","🌅","🌄","🌠","🎇","🎆","🌇","🌆","🏙","🌃","🌌","🌉","🌁","⌚","📱","📲","💻","⌨","🖥","🖨","🖱","🖲","🕹","🗜","💽","💾","💿","📀","📼","📷","📸","📹","🎥","📽","🎞","📞","☎","📟","📠","📺","📻","🎙","🎚","🎛","🧭","⏱","⏲","⏰","🕰","⌛","⏳","📡","🔋","🔌","💡","🔦","🕯","🧯","🗑","🛢","💸","💵","💴","💶","💷","💰","💳","??","⚖","🧰","🔧","🔨","⚒","🛠","⛏","🔩","⚙","🧱","⛓","🧲","🔫","💣","🧨","🔪","🗡","⚔","🛡","🚬","⚰","⚱","🏺","🔮","📿","🧿","💈","⚗","🔭","🔬","🕳","💊","💉","🧬","🦠","🧫","🧪","🌡","??","🧺","🧻","🚽","🚰","🚿","🛁","🛀","🧼","🧽","🧴","??","🔑","🗝","🚪","🛋","🛏","🛌","🧸","🖼","🛍","🛒","🎁","🎈","🎏","🎀","🎊","🎉","🎎","🏮","🎐","🧧","✉","📩","📨","📧","💌","📥","📤","📦","🏷","📪","📫","📬","📭","📮","📯","📜","📃","📄","📑","🧾","??","📈","📉","🗒","🗓","📆","📅","📇","🗃","🗳","🗄","📋","📁","📂","🗂","🗞","📰","📓","📔","📒","📕","📗","📘","📙","📚","📖","🔖","🧷","🔗","📎","🖇","📐","📏","🧮","📌","📍","✂","🖊","🖋","✒","🖌","🖍","📝","✏","🔍","🔎","🔏","🔐","🔒","🔓","❤","🧡","💛","💚","💙","💜","🖤","💔","❣","💕","💞","💓","💗","💖","💘","💝","💟","☮","✝","☪","🕉","☸","✡","🔯","🕎","☯","☦","🛐","⛎","♈","♉","♊","♋","♌","♍","♎","♏","♐","♑","♒","♓","🆔","⚛","🉑","","☣","📴","📳","🈶","🈚","🈸","🈺","🈷","✴","🆚","💮","🉐","㊙","㊗","🈴","🈵","🈹","🈲","🅰","🅱","🆎","🆑","🅾","??","❌","⭕","🛑","⛔","📛","🚫","💯","💢","♨","🚷","🚯","🚳","🚱","🔞","📵","🚭","❗","❕","❓","❔","‼","⁉","🔅","🔆","〽","⚠","🚸","🔱","⚜","🔰","♻","✅","🈯","💹","❇","✳","❎","🌐","💠","Ⓜ","🌀","💤","🏧","🚾","♿","🅿","🈳","🈂","🛂","🛃","🛄","🛅","🚹","🚺","🚼","🚻","🚮","🎦","📶","🈁","🔣","ℹ","🔤","🔡","🔠","🆖","🆗","🆙","🆒","🆕","🆓","0⃣","1⃣","2⃣","3⃣","4⃣","5⃣","6⃣","7⃣","8⃣","9⃣","🔟","🔢","#⃣","*⃣","⏏️","▶","⏸","⏯","⏹","⏺","⏭","⏮","⏩","⏪","⏫","⏬","◀","🔼","🔽","➡","⬅","⬆","⬇","↗","↘","↙","↖","↕","↔","↪","↩","⤴","⤵","🔀","🔁","🔂","🔄","🔃","🎵","🎶","➕","➖","➗","✖","♾","??","💱","™","©","®","〰","➰","➿","🔚","🔙","🔛","🔝","🔜","✔","☑","🔘","⚪","⚫","🔴","🔵","🔺","🔻","🔸","🔹","🔶","🔷","🔳","🔲","▪","▫","◾","◽","◼","◻","⬛","⬜","🔈","🔇","🔉","🔊","🔔","🔕","📣","📢","👁‍🗨","💬","💭","🗯","♠","♣","♥","♦","🃏","🎴","🀄","🕐","🕑","🕒","🕓","🕔","🕕","🕖","🕗","🕘","🕙","🕚","🕛","🕜","🕝","🕞","🕟","🕠","🕡","🕢","🕣","🕤","🕥","🕦","🕧","🏳","🏴","🏴‍☠️","🏁","🚩","🏳‍🌈","🇦🇫","🇦🇽","🇦🇱","🏼","??","
🇿","🇦🇸","🇦🇩","🇦🇴","🇦🇮","🇦🇶","🇦??","🇦🇷","🇦🇲","🇦🇼","🇦🇺","🇦🇹","🇦🇿","🇧🇸","🇧🇭","🇧🇩","🇧🇧","🇧🇾","🇧🇪","🇧🇿","🇧🇯","🇧🇲","🇧🇹","🇧🇴","🇧🇦","🇧🇼","🇧🇷","🇮🇴","🇻🇬","🇧🇳","🇧🇬","🇧🇫","🇧🇮","🇰🇭","🇨🇲","🇨🇦","🇮🇨","🇨🇻","🇧🇶","🇰🇾","🇨🇫","🇹🇩","🇨🇱","🇨🇳","🇨🇽","🇨🇨","🇨🇴","🇰🇲","🇨🇬","🇨🇩","🇨🇰","🇨🇷","🇨🇮","🇭🇷","🇨🇺","🇨🇼","🇨🇾","🇨🇿","🇩🇰","🇩🇯","🇩🇲","🇩🇴","🇪🇨","🇪🇬","🇸🇻","🇬🇶","🇪🇷","🇪🇪","🇪🇹","🇪🇺","🇫🇰","🇫🇴","🇫🇯","🇫🇮","🇫🇷","🇬🇫","🇵🇫","🇹🇫","🇬🇦","🇬🇲","🇬🇪","🇩🇪","🇬🇭","🇬🇮","🇬🇷","🇬🇱","🇬🇩","🇬🇵","🇬🇺","🇬🇹","🇬🇬","🇬🇳","🇬🇼","🇬🇾","🇭🇹","🇭🇳","🇭🇰","🇭🇺","🇮🇸","🇮🇳","🇮🇩","🇮🇷","🇮🇶","🇮🇪","🇮🇲","🇮🇱","🇮🇹","🇯🇲","🇯🇵","🎌","🇯🇪","🇯🇴","🇰🇿","🇰🇪","🇰🇮","🇽🇰","🇰🇼","🇰🇬","🇱🇦","🇱🇻","🇱🇧","🇱🇸","🇱🇷","🇱🇾","🇱🇮","🇱🇹","🇱🇺","🇲🇴","🇲🇰","🇲🇬","🇲🇼","🇲🇾","🇲🇻","🇲🇱","🇲🇹","🇲🇭","🇲🇶","🇲🇷","🇲🇺","🇾🇹","🇲🇽","🇫🇲","🇲🇩","🇲🇨","🇲🇳","🇲🇪","🇲🇸","🇲🇦","🇲🇿","🇲🇲","🇳🇦","🇳🇷","🇳🇵","🇳🇱","🇳🇨","🇳🇿","🇳🇮","🇳🇪","🇳🇬","🇳🇺","🇳🇫","🇰🇵","🇲🇵","🇳🇴","🇴🇲","🇵🇰","🇵🇼","🇵🇸","🇵🇦","🇵🇬","🇵🇾","🇵🇪","🇵🇭","🇵🇳","🇵🇱","🇵🇹","🇵🇷","🇶🇦","🇷🇪","🇷🇴","🇷🇺","🇷🇼","🇼🇸","🇸🇲","🇸🇹","🇸🇦","🇸🇳","🇷🇸","🇸🇨","🇸🇱","🇸🇬","🇸🇽","🇸🇰","🇸🇮","🇬🇸","🇸🇧","🇸🇴","🇿🇦","🇰🇷","🇸🇸","🇪🇸","🇱🇰","🇧🇱","🇸🇭","🇰🇳","🇱🇨","🇵🇲","🇻🇨","🇸🇩","🇸🇷","🇸🇿","🇸🇪","🇨🇭","🇸🇾","🇹🇼","🇹🇯","🇹🇿","🇹🇭","🇹🇱","🇹🇬","🇹🇰","🇹🇴","🇹🇹","🇹🇳","🇹🇷","🇹🇲","🇹🇨","🇹🇻","🇻🇮","🇺🇬","🇺🇦","🇦🇪","🇬🇧","🏴󠁧󠁢󠁥󠁮󠁧󠁿","🏴󠁧󠁢󠁳󠁣󠁴󠁿","🏴󠁧󠁢󠁷󠁬󠁳󠁿","🇺🇸","🇺🇾","🇺🇿","🇻🇺","🇻🇦","🇻🇪","🇻🇳","

🇹🇷","🇹🇲","🇹🇨","🇹🇻","🇻🇮","🇺🇬","🇺🇦","🇦🇪","🇬🇧","🏴󠁧󠁢󠁥󠁮󠁧󠁿","🏴󠁧󠁢󠁳󠁣󠁴󠁿","🏴󠁧󠁢󠁷󠁬󠁳󠁿","🇺🇸","🇺🇾","🇺🇿","🇻🇺","🇻🇦","🇻🇪","🇻🇳","🇼🇫","🇪🇭","🇾🇪","🇿🇲","🇿🇼","☂","◡","⇣̈","♪","ֆ","َ","ً","ُ","ٌ","ِ","ٍ","ّ","ْ","ـ","꙰","҉","٭","̲୭","«"],"",$namec);
$namech =str_replace( ["͘","͢","͡","͜","ٖ","֘","ٰ","⁽","₎","ٛ","ۡ","♢","❥","♡","❤","❍","♦","̆","͠","͟","͞","͝","͜","͗","͓","̸","͂","●","͒","̐","ٰ","ۧ","ۦ",],"",$namechh);
if($namech!=null){
$usersd = "$res=$users=$namech";
$namech =str_replace($im,"",$namech);
infochannel($channel,$IDBOT,$res,$namech,$users);
}
}
 
if($tngeh=="معطلة ❌" or $tngeh==""){
$databot["info"]["تحكم"]["حذف الايموجي"]="$result";
$namech =str_replace(["َ","ً","ُ","ٌ","ٍ","ِ","ْ","ٔ",'ٕ','ٓ','ّ','ٰ','ٖ',"'",'"'],"",$namech);
$usersd = "$res=$users=$namech";
infochannel($channel,$IDBOT,$res,$namech,$users);
}
}
}
#فاكشنات انشاء اللستة
function azrar($text){
@$keyboard = json_decode(file_get_contents("data/list.json"),true);

$ex = explode("\n", $text);
for($i=0;$i<count($ex);$i++){
$h = explode("\n", $text);
$ooo = str_replace("http://", "", $h[$i]);
$oo = str_replace("https://", "", $ooo);
$o = str_replace("+ ", "\n", $oo);
$u = explode("\n", $o);
$n = count($u);

if(preg_match("/^(.*) = (.*)/", $o, $ch) and $n == 1){

$n=trim($ch[1]);
$l=trim($ch[2]);
$keyboard["inline_keyboard"][]=[['text'=>"$n",'url'=>"$l"]];
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 2){
$n=trim($ch[1]);
$l=trim($ch[2]);
$n2=trim($ch[3]);
$l2=trim($ch[4]);
$keyboard["inline_keyboard"][] = [['text'=>$n,'url'=>"$l"],
['text'=>$n2,'url'=>"$l2"]];
}
}
file_put_contents("data/list.json", json_encode($keyboard));
}
###
function listin($tsmim,$link,$st){
@$keyboard = json_decode(file_get_contents("data/list.json"),true);
if($st=="1"){
$keyboard["inline_keyboard"][] = [['text'=>$tsmim,'url'=>"$link"]];
}
if($st=="2"){
$ts=explode('#str#',$tsmim);
$ts1=$ts[0];
$ts2=$ts[1];
$li=explode('#str#',$link);
$li1=$li[0];
$li2=$li[1];
$keyboard["inline_keyboard"][] = [['text'=>$ts1,'url'=>"$li1"],
['text'=>$ts2,'url'=>"$li2"]];
}
file_put_contents("data/list.json", json_encode($keyboard));
}
###
function listmark($res,$name,$link){
file_put_contents("data/listtext.txt","$res| [$name]($link)\n", FILE_APPEND);
}
####
function listinbak($res,$name,$link){
@$keyboard = json_decode(file_get_contents("data/list.json"),true);
$keyboard["inline_keyboard"][] = [['text'=>"$res| $name",'url'=>"$link"]];
file_put_contents("data/list.json", json_encode($keyboard));
}
function postlist($token,$channel,$text,$web,$bord){
@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
if($bord=="yes"){
@$list = json_decode(file_get_contents("data/list.json"),true);
$reply_markup=json_encode($list);
if($list==null){
$reply_markup=null;
}
}
$arrayyespost=$datalist["info"]["yespost"];
$arraynopost=$datalist["info"]["nopost"];

if(!in_array($channel,$arrayyespost) and !in_array($channel,$arraynopost)){
$get=bot('sendMessage',[
"chat_id"=>$channel,
"text"=>"$text",
'parse_mode'=>markdown,
'disable_web_page_preview'=>$web,
"reply_markup"=>$reply_markup
]);
$get_send=$get->result;
if(!is_null($get_send)){
$msg = $get->result->message_id;
$datalist["info"]["yespost"][]="$channel";
$datalist["info"]["infoyes"][$channel]["message_id"]="$msg";
}else{
$datalist["info"]["nopost"][]="$channel";
}
}
file_put_contents("data/datalist.json", json_encode($datalist));
}

function dellist($token,$channel,$msg){
@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
$arrayyesdel=$datalist["info"]["yesdel"];
$arraynodel=$datalist["info"]["nodel"];

if(!in_array($channel,$arrayyesdel) and !in_array($channel,$arraynodel)){
#$countmember = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatMembersCount?chat_id=$channel"))->result;
$get=bot('deleteMessage',[
"chat_id"=>$channel,
"message_id"=>"$msg",
]);
$get_del=$get->result;
if(!is_null($get_del)){
$datalist["info"]["yesdel"][]="$channel";
#$datalist["info"]["infoyes"][$channel]["resdel"]="$countmember";
}else{
$datalist["info"]["nodel"][]="$channel";
}
file_put_contents("data/datalist.json", json_encode($datalist));
}
}

function get_member($token,$channel,$st,$p){
@$resjson = json_decode(file_get_contents("data/res.json"),true);
$resmem = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatMembersCount?chat_id=$channel"))->result;

if($p=="put"){
if($resmem!=null){
$resjson["info"][$channel]["$st"]="$resmem";
$resjson["info"][$channel]["new"]="$resmem";
file_put_contents("data/res.json", json_encode($resjson));
}
}
if($p=="get"){
$resmem=$resjson["info"][$channel]["$st"];
}
if($p=="api"){
$resjson["info"][$channel]["$st"]="$resmem";
file_put_contents("data/res.json", json_encode($resjson));
}
if($resmem==null){
$resmem ="no";
}
return $resmem;
}
 