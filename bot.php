<?php 
ob_start(); 
$token = "توكن مصنعك"; # Token
$user_bot_sudo="معرف بوت المصنع بدون @";

define("API_KEY", $token);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}}

# Short
$update = json_decode(file_get_contents("php://input"));
file_put_contents("update.txt",json_encode($update));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){

$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}
$id = $update->inline_query->from->id; 
if(isset($update->inline_query)){
$chat_id = $update->inline_query->chat->id;
$from_id = $update->inline_query->from->id;
$name = $update->inline_query->from->first_name.' '.$update->inline_query->from->last_name;
$text_inline = $update->inline_query->query;
$mes_id = $update->inline_query->inline_message_id; 
$user = strtolower($update->inline_query->from->username); 
}
$sudo = array("572206438");

$folder="https://".$_SERVER['SERVER_NAME'].str_replace("/botmake/bot.php","",$_SERVER['SCRIPT_NAME']);

function getChatstats($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id='.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}



 function getmember($token,$idchannel,$from_id) {
  $join = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=$idchannel&user_id=".$from_id);
if((strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"Bad Request: user not found"') or strpos($join,'"ok": false') or strpos($join,'"status":"kicked"')) !== false){
$wataw="no";}else{$wataw="yes";}
return $wataw;
}

function coins($from_id,$p,$coin) {
$coinsjson = json_decode(file_get_contents("coins.json"),true);
$coins=$coinsjson["info"][$from_id]["coins"];
if($p!="null"){
if($p=="z"){
$co=$coins+$coin;
}
if($p=="n"){
$co=$coins-$coin;
}
$coinsjson["info"][$from_id]["coins"]=$co;
file_put_contents("coins.json", json_encode($coinsjson));
return $co;
}else{
return $coins;
}
}

$coinsjson = json_decode(file_get_contents("coins.json"),true);

////////// 
 ###wataw### 
 
 @$infosudo = json_decode(file_get_contents("sudo.json"),true);
if (!file_exists("sudo.json")) {
#	$put = [];
	$infosudo["info"]["admins"][]="$admin";
$infosudo["info"]["stbot"]="مفعل";
$infosudo["info"]["fwrmember"]="معطل";
$infosudo["info"]["tnbih"]="مفعل";
$infosudo["info"]["silk"]="مفعل";
$infosudo["info"]["allch"]="مفردة";
$infosudo["info"]["start"]="non";
$infosudo["info"]["klish_sil"]="كليشة الاشتراك الإجباري";


file_put_contents("sudo.json", json_encode($infosudo));
}

$st_bot=$infosudo["info"]["stbot"];
$fwrmember=$infosudo["info"]["fwrmember"];
$tnbih=$infosudo["info"]["tnbih"];
$silk=$infosudo["info"]["silk"];
$allch=$infosudo["info"]["allch"];
$start=$infosudo["info"]["start"];
$klish_sil=$infosudo["info"]["klish_sil"];
$klish_info=$infosudo["info"]["klish_info"];

$wathq = $infosudo["info"]["gp"];
 
$fromjson = json_decode(file_get_contents("from_id.json"),true);
$amrjson=$fromjson["info"][$from_id]["amr"];


#فانكشن اضافة - حظر عضو 
function member($from_id,$p){
$memberjson = json_decode(file_get_contents("members.json"),true);
if($p!="null"){
if($p=="add"){
$memberjson["info"]["members"][]="$from_id";
}
if($p=="ban"){
$memberjson["info"]["ban"][]="$from_id";
}

file_put_contents("members.json", json_encode($memberjson));
}
}


if($text or $data or preg_match('/^\/([Ss]tart) (.*)/',$text)){
if(preg_match('/^\/([Ss]tart) (.*)/',$text)){
preg_match('/^\/([Ss]tart) (.*)/',$text,$match);
$code=$match[2];

if(strpos($code,'ref-') !== false){
$ex=explode('-',$code);
if($ex[0]=="ref"){
$idmem=$ex[1];
if($idmem!=null ){

$refjson = json_decode(file_get_contents("ref.json"),true);
$refjson["info"][$from_id]["st"]="yes";
$refjson["info"][$from_id]["text"]="$text";
file_put_contents("ref.json", json_encode($refjson));
}}
}}
$false="";
if($allch!="مفردة"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$s ){

$namechannel= $s["name"];
$st= $s["st"];
$userchannel=str_replace('@','', $s["user"]);
if($namechannel!=null){
$stuts = getmember($token,$co,$from_id);
if($stuts=="no"){
if($st=="عامة"){
$url="t.me/$userchannel";
$tt=$s["user"];
}else{
$url =$s["user"];
$tt=$s["user"];
}
if($silk=="مفعل"){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'url'=>$url]];

}else{
$txt=$txt."\n".$tt;

}
$false="yes";
}

}

}
$reply_markup=json_encode($keyboard);
if($false=="yes"){
	bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$klish_sil
$txt
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup,
]);
return $false;}
}else{
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];




foreach($orothe as $co=>$s ){
$keyboard["inline_keyboard"]=[];
$namechannel= $s["name"];
$st= $s["st"];
$userchannel=str_replace('@','', $s["user"]);
if($namechannel!=null){
$stuts = getmember($token,$co,$from_id);
if($stuts=="no"){
if($st=="عامة"){
$url="t.me/$userchannel";
$tt=$s["user"];
}else{
$url =$s["user"];
$tt=$s["user"];

}
if($silk=="مفعل"){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'url'=>$url]];

}


#$reply_markup=json_encode($keyboard);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$klish_sil
$tt
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode($keyboard),
]);
return $false;

}

}

}

}


}

$memberjson = json_decode(file_get_contents("members.json"),true);
$members=$memberjson["info"]["members"];
$count_mb = count($members);

$ban=$memberjson["info"]["ban"];
$count_ban = count($ban);




$refjson = json_decode(file_get_contents("ref.json"),true);

if($refjson["info"][$from_id]["st"]=="yes"){
$text=$refjson["info"][$from_id]["text"];
unset($refjson["info"][$from_id]);
file_put_contents("ref.json", json_encode($refjson));
}
if(preg_match('/^\/([Ss]tart) (.*)/',$text)){
preg_match('/^\/([Ss]tart) (.*)/',$text,$match);
$code=$match[2];
$ex=explode('-',$code);
if($ex[0]=="ref"){
$idmem=$ex[1];
$stn = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$idmem"))->result;
$nn= $stn->first_name." ".$stn->last_name;

if($idmem!=null and $nn!=null){
if($idmem!=$from_id){
if(!in_array($from_id,$members)){
if(in_array($idmem,$members)){
if(!in_array($idmem,$ban)){
$coins=coins($idmem,"z","1");
bot("sendmessage",[
"chat_id"=>$idmem,
"text"=>"-🔰 قام  🚶‍♂
$name 
بالدخول من الرابط الخاص بك وحصلت على 1 نقطة  
💰 نقاطك الحالية : $coins
",
]);
bot("sendmessage",[
"chat_id"=>$from_id,
"text"=>"-✅ لقد قمت بالدخول من رابط الإحالة الخاص ب : $nn  وتم اضافة 1 نقطة الى نقاط العضو .
",
]);
}else{
bot("sendmessage",[
"chat_id"=>$from_id,
"text"=>"🚫 لايمكن احتساب نقاط الاحالة من رابط خاص بعضو محظور من البوت .
",
]);
}
}else{
bot("sendmessage",[
"chat_id"=>$from_id,
"text"=>"🚫 لايمكن احتساب نقاط الاحالة من رابط خاص بعضو ليس متواجد في البوت .",
]);
}
}else{
bot("sendmessage",[
"chat_id"=>$from_id,
"text"=>"🚫 لايمكن احتساب النقاط انت مشترك في البوت من قبل .",
]);
}

}else{
bot("sendmessage",[
"chat_id"=>$from_id,
"text"=>"🚫 لايمكن احتساب نقاط الاحالة 
عبر دخولك من رابطك .",
]);

}
}else{
bot("sendmessage",[
"chat_id"=>$from_id,
"text"=>"🚫 لايوجد شخص في تليقرام يحمل هذا الايدي $idmem ",
]);
}
}}



if($message  and in_array($from_id,$ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ لا تستطيع استخدام البوت انت محظور ❌
",
]);return false;}

if($text=="تحديث" ){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تم تحديث البوت بنجاح
",
'reply_to_message_id'=>$message_id,
]);
return false;
}
if( $text=="قفل البوت" and in_array($from_id ,$sudo)){
$infosudo["info"]["stbot"]="معطل";
file_put_contents("sudo.json", json_encode($infosudo));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تم قفل البوت من اجل التحديث 
",
'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "فتح البوت" and in_array($from_id ,$sudo)){
$infosudo["info"]["stbot"]="مفعل";
file_put_contents("sudo.json", json_encode($infosudo));
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅ تم فتح البوت 
",
'reply_to_message_id'=>$message->message_id,
]);
}

if($message and $stbot=="معطل" and !in_array($from_id,$sudo) and $type =="private" and $chat_id !=$channeladmin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
البوت قيد التحديث الرجاء الانتظار حتى يتم الانتهاء من التحديث سيتم اشعاركم بذالك فور الانتهاء 
",
'reply_to_message_id'=>$message->message_id,
]);
return false;
}

if($update and !in_array($from_id,$members) and $type == "private" and ! $data){
member($from_id,"add");
if($tnbih=="مفعل"){
bot("sendmessage",[
"chat_id"=>$wathq,
"text"=>"- دخل شخص إلى البوت 🚶‍♂
[....$name](tg://user?id=$from_id) 
- ايديه $from_id 🆔
- معرفة :*$user*
---------
عدد اعضاء بوتك هو : $count_mb
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);
}}

#start


if($text=="/start"){
$coins=coins($from_id,"null","get");
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"اهلاً بك [$name]

$start
……………………………
نقاطك : $coins
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'💡 نبذة عن البوت  ' ,'callback_data'=>"infobots"]],
[['text'=>'صنع بوت لستة ✅ ' ,'callback_data'=>"sn3botfre"],
['text'=>'🚀 بوتاتك ' ,'callback_data'=>"mybots"]],
[['text'=>'💱 ربح نقاط' ,'callback_data'=>"refelr"]],
[['text'=>'👮 مطور البوت   ' ,'url'=>"t.me/SAIEDCH/20"]],
[['text'=>'📡 قناة البوت' ,'url'=>"https://t.me/TeamSyria"],['text'=>'قناة سعيد' ,'url'=>"https://t.me/SAEEDFiles"]],
   ] 
   ])
]);
}

if($data=="infobots"){

bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"مرحباً بك [$name]
$klish_info
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'تراجع  ' ,'callback_data'=>"hoome"]],
   ] 
   ])
]);
}
if($data=="hoome"){
$fromjson["info"][$from_id]["amr"]="null";
file_put_contents("from_id.json", json_encode($fromjson));
$coins=coins($from_id,"null","get");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"اهلاً بك [$name]

$start
……………………………
نقاطك : $coins
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'💡 نبذة عن البوت  ' ,'callback_data'=>"infobots"]],
[['text'=>'صنع بوت لستة ✅ ' ,'callback_data'=>"sn3botfre"],
['text'=>'🚀 بوتاتك ' ,'callback_data'=>"mybots"]],
[['text'=>'💱 ربح نقاط' ,'callback_data'=>"refelr"]],

[['text'=>'👮 مطور البوت   ' ,'url'=>"t.me/SAIEDCH/20"]],
[['text'=>'📡 قناة البوت' ,'url'=>"https://t.me/TeamSyria"],['text'=>'قناة سعيد' ,'url'=>"https://t.me/SAEEDFiles"]],
   ] 
   ])
]);
}
if($data=="refelr"){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>" 📌 من خلال رابطك الخاص قم بدعوة اصدقائك لدخول للبوت من رابطك واحصل على 1  نقطة عن كل شخص  .
🔮 تستطيع استخدام نقاطك لشراء اشتراك مدفوع لبوتاتك .

- رابطك الخاص : 
https://t.me/$user_bot_sudo?start=ref-$from_id

",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'عودة ' ,'callback_data'=>"hoome"]],
] 
])
]);
} 
if($data=="sn3botfre"){
$fromjson["info"][$from_id]["amr"]="sn3new";
file_put_contents("from_id.json", json_encode($fromjson));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"👮|  مرحبا بك عزيزي 
قوم بارسال توكن البوت الذي تود صنعه 
تستطيع جلب التوكن من هنا : @botfather
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'تراجع  ' ,'callback_data'=>"hoome"]],
   ] 
   ])
]);
}
#صنع بوت جديد
$infobots=json_decode(file_get_contents("infobots.json"),true);

if($text and $amrjson =="sn3new"){

$url = "https://api.telegram.org/bot".$text."/getWebhookInfo";
 $check_token = json_decode(file_get_contents($url));

$check = $check_token;
$yes=$check->ok ;
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"⏰ انتظر قليلا جاري فحص التوكن  
",
]);
$fromjson["info"][$from_id]["amr"]="non";
file_put_contents("from_id.json", json_encode($fromjson));
if($yes == "true"){



  $url = "https://api.telegram.org/bot$text/getme";
 $getidbots = json_decode(file_get_contents($url) , true);
 
 $idbot = $getidbots['result']['id'];
 $userbot = $getidbots['result']['username'];
$name1bot = $getidbots["result"]["first_name"];
 $userbot=trim($userbot);
 $idbot=trim($idbot);



mkdir("../bots");
mkdir("../data");
mkdir("../post");
mkdir("../member");
mkdir("../bots/$userbot");

//عدم التكرار التخزين للعضو
@$fromjson = json_decode(file_get_contents("from_id.json"),true);
$arrayuserbot=$fromjson["info"][$from_id]["userbots"];

if(!in_array($userbot,$arrayuserbot)){

$fromjson["info"][$from_id]["userbots"][]="$userbot";
file_put_contents("from_id.json", json_encode($fromjson));


}
#تخزين بيانات البوت
$infobots["info"][$idbot]="$userbot";
$infobots["info"][$userbot]["admin"]="$from_id";
$infobots["info"][$userbot]["user"]="$userbot";
$infobots["info"][$userbot]["idbot"]="$idbot";
$infobots["info"][$userbot]["namebot"]="$name1bot";
file_put_contents("infobots.json", json_encode($infobots));

$idmember=explode("\n",file_get_contents("idmember.txt"));

$idbotsmake=explode("\n",file_get_contents("idbots.txt"));

#bots

if(!in_array($from_id,$idmember)){
file_put_contents("idmember.txt",$from_id."\n",FILE_APPEND);


}

if(!in_array($idbot,$idbotsmake)){
file_put_contents("idbots.txt",$idbot."\n",FILE_APPEND);

file_put_contents("index.php","\n".'$'.$userbot.'= "'.$text.'";',FILE_APPEND);

}


$run=file_get_contents("../make/run.php");

$run=str_replace("[*[TOKEN]*]","$text",$run);
$run=str_replace("[*[IDBOT]*]","$idbot",$run);
$run=str_replace("[*[USERBOT]*]","$userbot",$run);
file_put_contents("../bots/$userbot/run.php","$run");


$mak=file_get_contents("../make/make.php");

$mak=str_replace("[*[TOKEN]*]","$text",$mak);
$mak=str_replace("[*[IDBOT]*]","$idbot",$mak);
$mak=str_replace("[*[USERBOT]*]","$userbot",$mak);

file_put_contents("../bots/$userbot/$userbot.php","$mak");


file_get_contents("https://api.telegram.org/bot".$text."/setwebhook?url=$folder/bots/$userbot/$userbot.php");

@$siting = json_decode(file_get_contents("siting.json"),true);
$kl_make=$siting["info"]["كليشات"]["make"];
if($kl_make==null){

$kl_make="✅ لقد تم صنع بوتك بنجاح ";
}

file_get_contents("https://api.telegram.org/bot$text/sendmessage?chat_id=$from_id&text=$kl_make&parse_mode=MarkDown");


bot('sendmessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
"text"=>"🎊 تم صنع بوتك بنجاح 🎊
- معرف البوت : @$userbot
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
	[['text'=>"- دخول الى البوت؛🎒",'url'=>"https://t.me/$userbot?start"]],
   ] 
   ])
]);

// تحميل الاعدادات 
bot('sendmessage',[
'chat_id'=>$wathq,
'message_id'=>$message_id,
"text"=>"👮|  تم صنع بوت لستة جديد بنجاح ✅ 
ℹ معلومات البوت 
توكن : `$text`
يوزر البوت : `$userbot@`
namebot : `$name1bot`
idbot : `$idbot`
معلومات صاحب البوت 🙎 
الاسم : *$name*
الايدي : `$from_id`
[$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
	[['text'=>"- دخول الى البوت؛🎒",'url'=>"https://t.me/$userbot?start"]
	],
   ] 
   ])
]);


}else{


bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
"text"=>"🚫 هناك خطاء التوكن الذي قمت بارسالة خاطئ تاكد من التوكن وقم بالارسال مره اخرى  

",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'معاودة المحاولة مجددا   ' ,'callback_data'=>"sn3botfre"]],
   ] 
   ])
]);
}
}


#mybots


if($data=="mybots"){
if(isset($fromjson["info"][$from_id]["userbots"])){

$arrayuserbot=$fromjson["info"][$from_id]["userbots"];
$keyboard["inline_keyboard"]=[];
      	for ($i=0; $i < count($arrayuserbot); $i++) { 
      $u=$arrayuserbot[$i];
     
      
$userbot="@".$u;
$in="infobot ".$u;

 @$infobots = json_decode(file_get_contents("infobots.json"),true);

$namebot=$infobots["info"][$u]["namebot"];

if($namebot !=null){
	$keyboard["inline_keyboard"][$i] = [['text'=>$userbot,'url'=>"t.me/$u"],
['text'=>'💢 عرض','callback_data'=>$in]];
      	}
      }
      
		$keyboard["inline_keyboard"][] = [['text'=>" رجوع  ",'callback_data'=>"hoome"]];	$reply_markup=json_encode($keyboard);
	bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"👦| اهلا بك عزيزي المستخدم
📡 | هذه هي قائمة بوتاتك المصنوعة ..

- قم بالضغط على عرض 💢 لعرض معلوماتة وامكانية التعديل علية.

",
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}else{
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"❌ لم تصنع بوت من قبل  ",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' عودة   ' ,'callback_data'=>"hoome"]],
   ] 
   ])
]);
}
}

#عرض معلومات البوت 


if(preg_match('/^(infobot) (.*)/s', $data)){
$userbot = str_replace('infobot ',"",$data);
	$userbot = str_replace(' ',"",$userbot);

 @$infobots = json_decode(file_get_contents("infobots.json"),true);

$namebot=$infobots["info"][$userbot]["namebot"];
$idbot=$infobots["info"][$userbot]["idbot"];

$mm=explode("\n",file_get_contents("../data/$idbot.txt"));
@$databot = json_decode(file_get_contents("../data/$idbot.json"),true);

$memb=$databot["info"]["members"];
$co=count($memb);
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"معلومات بوتك  : 
`@$userbot`

ايدي : `$idbot`
اسم : `$namebot`

•عدد الاعضاء المشتركين في البوت : $co
",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'🚫 حذف  ' ,'callback_data'=>"deletebot ".$userbot],
['text'=>'نقل الملكية  ' ,'callback_data'=>"naglbotmember ".$userbot],
['text'=>'✅ تفعيل مدفوع ' ,'callback_data'=>"proobot ".$userbot]],

[['text'=>' رجوع   ' ,'callback_data'=>"mybots"]],
   ] 
   ])
]);
}
	
if(preg_match('/^(deletebot) (.*)/s', $data)){

$userbot = str_replace('deletebot ',"",$data);
	$userbot = str_replace(' ',"",$userbot);
	$arrayuserbot=$fromjson["info"][$from_id]["userbots"];
			
if(in_array($userbot,$arrayuserbot ) and $userbot!=null){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ستفقد جميع بياناتك اذا قمت بحذف البوت .

هل انت متاكد من قرارك بحذف البوت ؟
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'لا   ' ,'callback_data'=>"mybots"],['text'=>'نعم   ' ,'callback_data'=>"deletebotyes ".$userbot]],
]
])
]);
}else{
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"🚫هناك خطاء لايمكنك حذف هذا البوت : @$userbot
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'عودة   ' ,'callback_data'=>"mybots"]],
]
])
]);


}}



if(preg_match('/^(deletebotyes) (.*)/s', $data)){

$userbot = str_replace('deletebotyes ',"",$data);
	$userbot = str_replace(' ',"",$userbot);
	$arrayuserbot=$fromjson["info"][$from_id]["userbots"];
			
if(in_array($userbot,$arrayuserbot ) and $userbot!=null){

 @$infobots = json_decode(file_get_contents("infobots.json"),true);

$namebot=$infobots["info"][$userbot]["namebot"];
$idbot=$infobots["info"][$userbot]["idbot"];


unset($infobots["info"][$idbot]);
unset($infobots["info"][$userbot]);

file_put_contents("infobots.json", json_encode($infobots));

unlink("../bots/$userbot/$userbot.php");
unlink("../data/$idbot.json");
unlink("../post/$idbot.json");
unlink("../member/$idbot.json");
$index = array_search($userbot, $arrayuserbot);
unset($fromjson["info"][$from_id]["userbots"][$index]);
$fromjson["info"][$from_id]["userbots"]=array_values($fromjson["info"][$from_id]["userbots"]);
file_put_contents("from_id.json", json_encode($fromjson));

if($idbot!=null){
$us11=file_get_contents("idbots.txt");
$us11=str_replace("$idbot\n","",$us11);
file_put_contents("idbots.txt",$us11);
}
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✅ تم حذف البوت بنجاح 
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'العودة  ' ,'callback_data'=>"mybots"]],
]
])
]);


bot('sendmessage',[
'chat_id'=>$wathq,
'message_id'=>$message_id,
"text"=>" تم حذف بوت مجاني  ❌ 
ℹ معلومات البوت 

يوزر البوت : *@$userbot*
ايدي البوت : `$idbot`


معلومات صاحب البوت 🙎 
الاسم : *$name*
الايدي : `$from_id`
[$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
}}

#نقل ملكية 

$codejson = json_decode(file_get_contents("code.json"),true);
if (!file_exists("code.json")) {
	$put = [];

file_put_contents("code.json", json_encode($put));
}
if(preg_match('/^(naglbotmember) (.*)/s', $data)){
$userbot = str_replace('naglbotmember ',"",$data);
$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), -17);


 @$infobots = json_decode(file_get_contents("infobots.json"),true);
$idbot=$infobots["info"][$userbot]["idbot"];
$id=$infobots["info"][$userbot]["admin"];
 
if($id!=null and $id==$from_id){




$codejson["info"][$code]["st"]="yes";
$codejson["info"][$code]["idbot"]="$idbot";
$codejson["info"][$code]["userbot"]="$userbot";
$codejson["info"][$code]["admin"]="$id";
 
file_put_contents("code.json", json_encode($codejson));
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"• هذا هو كود النقل الخاص ببوتك 
https://t.me/$user_bot_sudo?start=userbot-$code

- قم بارسالة للشخص الذي تريد نقل البوت الية.
⚠ - تنوية :
عند نقل البوت لشخص اخر ستفقد امكانية التحكم في البوت .
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' عودة    ' ,'callback_data'=>"mybots"]],
   ] 
   ])
]);
}
}
if(preg_match('/^\/([Ss]tart) (.*)/',$text)){
preg_match('/^\/([Ss]tart) (.*)/',$text,$match);
$code=$match[2];

$ex=explode('-',$code);
if($ex[1]=="userbot"){
$code=$ex[1];
$codejson = json_decode(file_get_contents("code.json"),true);

$st=$codejson["info"][$code]["st"];
$idbot=$codejson["info"][$code]["idbot"];
$userbot=$codejson["info"][$code]["userbot"];
$admin=$codejson["info"][$code]["admin"];


$arrayuser=$fromjson["info"][$admin]["userbots"];

	if($admin!=$from_id){
if($st=="yes" and $admin!=null and $ex[0]=="userbot"){	
if(in_array($userbot,$arrayuser ) and $idbot!=null){




$index = array_search($userbot, $arrayuser);

unset($fromjson["info"][$from_id]["userbots"][$index]);
$fromjson["info"][$from_id]["userbots"]=array_values($fromjson["info"][$from_id]["userbots"]);




$arrayuserbot=$fromjson["info"][$from_id]["userbots"];
if(!in_array($userbot,$arrayuserbot)){

$fromjson["info"][$from_id]["userbots"][]="$userbot";
file_put_contents("from_id.json", json_encode($fromjson));
}

$infobots["info"][$userbot]["admin"]="$from_id";
file_put_contents("infobots.json", json_encode($infobots));




 @$infobots = json_decode(file_get_contents("infobots.json"),true);

$namebot=$infobots["info"][$userbot]["namebot"];
$idbot=$infobots["info"][$userbot]["idbot"];


@$memberbot = json_decode(file_get_contents("../member/$idbot.json"),true);

$memb=$memberbot["info"]["members"];
$co=count($memb);
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"✅ تم نقل البوت اليك بنجاح 
بيانات البوت .

- اسم البوت : $namebot
- معرف البوت : @$userbot

- عدد الاعضاء المشتركين في البوت : $co
",
]);
bot('sendmessage',[
'chat_id'=>$admin,
"text"=>"
تم نقل [بوت](t.me/$userbot) الى [$from_id](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
]);
unset($codejson["info"][$code]);
file_put_contents("code.json", json_encode($codejson));
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"ارسال /start .!
",
'reply_to_message_id'=>$message_id,
]);

}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"لايمكنك نقل البوت لنفسك 
",
'reply_to_message_id'=>$message_id,
]);

}
}
}
# تفعيل مدفوع 

if(preg_match('/^(proobot) (.*)/s', $data)){

$userbot = str_replace('proobot ',"",$data);
	$userbot = str_replace(' ',"",$userbot);
	$arrayuserbot=$fromjson["info"][$from_id]["userbots"];
$coins=	coins($from_id,'null',$co);
if($coins < 10){
$tx="عدد نقاطك أقل من 10 نقاط ";
}
if($coins == null ){
$tx="ليس لديك نقاط ";
}
if($coins >= 10){


$co_day=$coins/10;
if(in_array($userbot,$arrayuserbot ) and $userbot!=null){

 @$infobots = json_decode(file_get_contents("infobots.json"),true);

$namebot=$infobots["info"][$userbot]["namebot"];

$idbot=$infobots["info"][$userbot]["idbot"];

$fromjson["info"][$from_id]["amr"]="adddaypro";
$fromjson["info"][$from_id]["idbot"]="$idbot";
file_put_contents("from_id.json", json_encode($fromjson));





bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"عدد نقاطك هو : $coins
- ارسل عدد الايام التي تريد تفعيل الاشتراك فيها .
اقصى عدد للايام بالنسبه لعدد نقاطك هو : $co_day
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الغاء  ' ,'callback_data'=>"mybots"]],
]
])
]);

}
}else{
bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"🚫 لايمكنك الاشتراك $tx ",
            'show_alert'=>true
]);
}}

if($text and $amrjson =="adddaypro" and is_numeric($text)){
$coins=	coins($from_id,'null',$co);
$day=$text*10;
$co_day=$coins/10;
if($day<=$coins){
$idbot=$fromjson["info"][$from_id]["idbot"];
$fromjson["info"][$from_id]["amr"]="adddaypro";
$fromjson["info"][$from_id]["idbot"]="$idbot";
file_put_contents("from_id.json", json_encode($fromjson));

$coins=	coins($from_id,'n',$day);

$dayc=86400;
$time=time()+(3600 * 1);

$ti=$time+($dayc * $text);

$projson = json_decode(file_get_contents("prodate.json"),true);
$projson["info"][$idbots]["pro"]="yes";
$projson["info"][$idbots]["dateon"]="$time";
$projson["info"][$idbots]["dateoff"]="$ti";
file_put_contents("prodate.json", json_encode($projson));


$dayon = date('Y/m/d',$time);
$timeon =date('H:i:s A',$time);
$dayoff = date('Y/m/d',$ti);
$timeoff =date('H:i:s A',$ti);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم اضافة الاشتراك المدفوع بنجاح 

ℹ معلومات البوت 
يوزر البوت : @$userbot
ايدي البوت : $idbot

ℹمعلومات الاشتراك 
- وقت الاشتراك : 
⏰ $timeon
📅 $dayon
- موعد انتهاء الاشتراك : 
⏰ $timeoff
📅 $dayoff
وتم خصم $day من نقاطك : 
نقاطك الحالية : $coins نقطة  .
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>" عودة  ",'callback_data'=>"mybots"]],
]
])
]);

}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 لايمكن الاشتراك لمدة $text يوم رصيدك لا يكفي لهذه الايام .

اقصى عدد للايام بالنسبه لعدد نقاطك هو : $co_day
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>" عودة  ",'callback_data'=>"mybots"]],
]
])
]);


}
}
$infobots=json_decode(file_get_contents("infobots.json"),true);


if (preg_match('/^(معلومات) (.*)/s',$text) and in_array($from_id,$sudo)) {
$textt = str_replace("معلومات "," ",$text);
$textt = str_replace("\n"," ",$textt);
//$textt = str_replace("  "," ",$textt);
$textt = str_replace(" ","=",$textt);
$botinfo = explode("=",$textt);
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$textt)){
$wataw=2000;
}}



if($wataw==2000){
$wataw=null;
for($l=0;$l<count($botinfo);$l++){
if($botinfo[$l]!=""){
$use=$botinfo[$l];
$userb=str_replace("@","",$use);
$userb=str_replace(" ","",$userb);

 @$infobots = json_decode(file_get_contents("infobots.json"),true);

$namebot=$infobots["info"][$userb]["namebot"];
$idbot=$infobots["info"][$userb]["idbot"];
$adminbot=$infobots["info"][$userb]["admin"];

$admin = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$adminbot"))->result;
$from=$id;
$namead= $admin->first_name;

$adminstext="- [$namead](tg://user?id=$from) `$from`";
@$databot = json_decode(file_get_contents("../data/$idbot.json"),true);

$chids=$databot["info"]["القنوات"]["array"];
$co_ch=count($chids);
@$memberbot = json_decode(file_get_contents("../member/$idbot.json"),true);

$memb=$memberbot["info"]["members"];
$comember=count($memb);

$projson = json_decode(file_get_contents("prodate.json"),true);
if($projson["info"][$idbot]["pro"]=="yes"){


$time=$projson["info"][$idbot]["dateon"];
$ti=$projson["info"][$idbot]["dateoff"];

$dayon = date('Y/m/d',$time);
$timeon =date('H:i:s A',$time);
$dayoff = date('Y/m/d',$ti);
$timeoff =date('H:i:s A',$ti);
$tx="- وقت الاشتراك : 
⏰ $timeon
📅 $dayon
- موعد انتهاء الاشتراك : 
⏰ $timeoff
📅 $dayoff";
}else{
$tx="🚫 لا يوجد اشتراك مدفوع " ;
}

bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"🙋|   مرحبا بك عزيزي المطور

معلومات البوت المصنوع  : 
`$use`
idbot : `$idbot`
namebot : `$namebot`

~~~~~~~~~~~~~~~
صاحب البوت : $adminstext
~~~~~~~~~~~~~~~
عدد اعضاء البوت : $comember 

عدد القنوات المشتركة في البوت : $co_ch

--------------------
ℹمعلومات الاشتراك المدفوع : 

$tx
 

",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,


]);
}
}
}

require_once("sudo.php");


