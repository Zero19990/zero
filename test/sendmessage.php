<?php
function sendmessegech($channel,$m){

@$msg_id = json_decode(file_get_contents("data/message_id.json"),true);

$arrayyespost=$msg_id["info"][$m]["yespost"];
$arraynopost=$msg_id["info"][$m]["nopost"];
if(!in_array($channel,$arrayyespost) and !in_array($channel,$arraynopost)){

@$datasend = json_decode(file_get_contents("data/datasend.json"),true);

###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
$send=$datasend["info"]["post"]["send"];
$mode=$datasend["info"]["post"]["mode"];
$text=$datasend["info"]["post"]["text"];
if($send!=null){

###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
if($send=="text" and $send!="MARKDOWN"){
$get=bot('sendMessage', [
'chat_id'=>$channel,
'text'=>"$text",
'parse_mode'=>"$mode",
'disable_web_page_preview'=>false,
'disable_web_page_preview'=>true,
]);
}
###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
if($send!="text" and $send=="MARKDOWN"){
$from_chat_id=$datasend["info"]["post"]["from_chat_id"];
$message_id=$datasend["info"]["post"]["message_id"];
$get=bot('ForwardMessage', [
'chat_id'=>$channel,
'from_chat_id'=>"$from_chat_id",
'message_id'=>"$message_id",
'disable_web_page_preview'=>true,
]);
}
###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
if($send!="text" and $send!="MARKDOWN"){
$media=$datasend["info"]["post"]["media"];
$file_id=$datasend["info"]["post"]["file_id"];
$get=bot($send,[
"chat_id"=>$channel,
"$media"=>"$file_id",
'caption'=>"$text",
'disable_web_page_preview'=>false,
'disable_web_page_preview'=>true,
]);
}
$get_send=$get->result;
if(!is_null($get_send)){
$msg = $get->result->message_id;
$msg_id["info"][$m]["yespost"][]="$channel";
$msg_id["info"][$m]["infoyes"][$channel]["message_id"]="$msg";
}else{
$msg_id["info"][$m]["nopost"][]="$channel";
}
file_put_contents("data/message_id.json", json_encode($msg_id));
}
}
} 
 ###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["ÙØ±ÙØ¨ Ø§ÙØ§Ø¯Ø§Ø±Ù"];
$gs=$databot["info"]["ÙØ±ÙØ¨ Ø§ÙØ§Ø³ØªÙØ¨Ø§Ù"];
$ch_all=$databot["info"]["Ø§ÙÙÙÙØ§Øª"]["array"];
$countch=count($ch_all);

@$datasend = json_decode(file_get_contents("data/datasend.json"),true);
$amrsend = $datasend["info"]["amr"]; 
 
###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
if($text == "Ø§Ø°Ø§Ø¹Ù" or $text == "Ø§Ø°Ø§Ø¹Ø©" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ÙØ±Ø­Ø¨Ø§ Ø¨Ù Ø¹Ø²ÙØ²Ù Ø§ÙÙØ¯ÙØ±
ÙÙ ØªØ±ÙØ¯ ÙØ´Ø± Ø§Ø°Ø§Ø¹Ø© ÙÙÙÙÙØ§Øª ÙØ§ÙØ§Ø¹Ø¶Ø§Ø¡  
","reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"â | ÙØ¹Ù ","callback_data"=>"ethaa"],["text"=>"â | ÙØ§ ","callback_data"=>"eixtsend"]],
]])
]);   
}

if($data == "ethaa" and $chat_id == $gp){
if(!isset($datasend["info"])){
$send=null;
unlink("data/datasend.json");
$send["info"]["amr"]="sendmessage";
file_put_contents("data/datasend.json", json_encode($send));
bot('editmessageText',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"
â³ï¸| ÙÙ Ø¨Ø¥Ø±Ø³Ø§Ù ÙÙØ´ÙØ±Ù Ø§ÙØ§Ù .
",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- Ø§ÙØºØ§Ø¡ Ø§ÙØ§ÙØ± â ','callback_data'=>"eixtsend"]],
]])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"â ï¸| ÙØ¯ÙÙ Ø§Ø°Ø§Ø¹Ø© ÙÙØ¯ Ø§ÙÙØ´Ø± Ø§ÙØªØ¸Ø± ...",
'message_id'=>$message_id,
]);
}
}
if($data=="eixtsend" and $chat_id == $gp){
$send=null;
unlink("data/datasend.json");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"â ØªÙ Ø§ÙØºØ§Ø¡ Ø§ÙØ§ÙØ± Ø¨ÙØ¬Ø§Ø­",
'message_id'=>$message_id,
]);
} 

 ###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####

$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;
$caption = $update->message->caption;
if($photo){
$sens="sendphoto";
$file_id = $update->message->photo[1]->file_id;
}
if($document){
$sens="senddocument";
$file_id = $update->message->document->file_id;
}
if($video){
$sens="sendvideo";
$file_id = $update->message->video->file_id;
}

if($audio){
$sens="sendaudio";
$file_id = $update->message->audio->file_id;
}

if($voice){
$sens="sendvoice";
$file_id = $update->message->voice->file_id;
}

if($sticker){
$sens="sendsticker";
$file_id = $update->message->sticker->file_id;
} 
 ###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
if($message and $chat_id==$gp and $amrsend=="sendmessage" and !$message->forward_from_chat and !$message->forward_from){
$datasend["info"]["amr"]="null";

if($text){
$datasend["info"]["post"]["send"]="text";
$datasend["info"]["post"]["text"]="$text";
$qqq=$text;
$get=bot('sendMessage',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"â»| Ø¬Ø§Ø± Ø¹Ø±Ø¶ Ø§ÙÙÙØ´ÙØ± ÙÙÙØ¹Ø§ÙÙØ©...",
]);
}else{
$ss=str_replace("send","",$sens);
$datasend["info"]["post"]["send"]="$sens";
$datasend["info"]["post"]["media"]="$ss";
$datasend["info"]["post"]["file_id"]="$file_id";
$datasend["info"]["post"]["text"]="$text";
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$text",
]);
}
sleep(1);
$get=bot('editmessagetext',[
'message_id'=>$message_id +1,
//bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
â| ØªÙ Ø­ÙØ¸ ØµÙØºØ© Ø§ÙÙÙØ´ÙØ± .\n
ğµ| ÙØ¹Ø§ÙÙØ© Ø§ÙÙÙØ´ÙØ± Ø§ÙØ®Ø§Øµ Ø¨Ù : \n$qqq

ğ| Ø§ÙØµÙØºØ© Ø§ÙØ­Ø§ÙÙØ©: MARKDOWN
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- ÙØ´Ø± MARKDOWN ' ,'callback_data'=>"sendmessage"],['text'=>'- ÙØ´Ø± html ' ,'callback_data'=>"sendhtml"]],
[['text'=>'- Ø§ÙØºØ§Ø¡ Ø§ÙØ§ÙØ± â ','callback_data'=>"eixtsend"]],
]])
]);
$datasend["info"]["post"]["mode"]="MARKDOWN";
file_put_contents("data/datasend.json", json_encode($datasend));
}
if($data=="sendhtml" and $chat_id == $gp){
$datasend["info"]["post"]["mode"]="html";
file_put_contents("data/datasend.json", json_encode($datasend));
$data="sendmessage";
} 
 ###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
$projson = json_decode(file_get_contents("../../botmake/prodate.json"),true);
#ÙØªØºÙØ± Ø§ÙØ§Ø´Ø´ØªØ±Ø§Ù Ø§ÙÙØ¯ÙÙØ¹
$st_pro=$projson["info"][$IDBOT]["pro"];

if($message and $chat_id==$gp and $amrsend=="sendmessage" ){
if($message->forward_from_chat or $message->forward_from){
if($st_pro=="yes"){
bot('ForwardMessage',[
 'chat_id'=>$chat_id,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
$datasend["info"]["post"]["send"]="ForwardMessage";
$datasend["info"]["post"]["from_chat_id"]="$chat_id";
$datasend["info"]["post"]["message_id"]="$message_id";
file_put_contents("data/datasend.json", json_encode($datasend));

$get=bot('editmessagetext',[
'message_id'=>$message_id +1,
//bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
â| ØªÙ Ø­ÙØ¸ ØµÙØºØ© Ø§ÙÙÙØ´ÙØ± .\n
ğµ| ÙØ¹Ø§ÙÙØ© Ø§ÙÙÙØ´ÙØ± Ø§ÙØ®Ø§Øµ Ø¨Ù :\n$qqq

ğ| Ø§ÙØµÙØºØ© Ø§ÙØ­Ø§ÙÙØ©: ØªÙØ¬ÙØ©
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- ÙØ´Ø± ØªÙØ¬ÙØ© ğ ' ,'callback_data'=>"sendmessage"]],
[['text'=>'- Ø§ÙØºØ§Ø¡ Ø§ÙØ§ÙØ± â ','callback_data'=>"eixtsend"]],
]])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
ğ«| Ø§ÙÙØ¹Ø°Ø±Ø© Ø§ÙØªÙØ¬ÙØ© ÙÙØ¯ Ø§ÙØªØ·ÙÙØ± ..
",'message_id'=>$message_id,
]);
unlink("data/datasend.json");
}
}
} 
 ###wataw### 
$ch_all=$databot["info"]["Ø§ÙÙÙÙØ§Øª"]["array"];
$countch=count($ch_all);

if($data=="sendmessage" and $chat_id == $gp){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
â³ï¸| Ø¬Ø§Ø± Ø§ÙÙØ´Ø± Ø¨ÙØ¬Ø§Ø­ ÙÙ $countch ÙÙØ§Ø© ...
",'message_id'=>$message_id,
]);
$datasend["info"]["code"]="$message_id";
$datasend["info"]["st"]="post";
if($countch <= 50){
for($i=0;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
sendmessegech($channel,$message_id);
}
$datasend["info"]["for"]="no";
$datasend["info"]["exit"]="yes";
}else{
for($l=0;$l<50;$l++){
$channel=$ch_all[$l];
sendmessegech($channel,$message_id);
}
$datasend["info"]["for"]="yes";
$datasend["info"]["cofor"]="50";
$datasend["info"]["exit"]="no";
$tttt="ØªÙ Ø§ÙØ§Ø±Ø³Ø§Ù ÙÙ 0 Ø§ÙÙ 50 

ØªØ­Ø¯ÙØ« 
/update
";
}
file_put_contents("data/datasend.json", json_encode($datasend));
}

@$datasend = json_decode(file_get_contents("data/datasend.json"),true);
$st=$datasend["info"]["st"];
$for=$datasend["info"]["for"];
$cofor=$datasend["info"]["cofor"];

$exit=$datasend["info"]["exit"];
$countup=$countch-$cofor;
$code=$datasend["info"]["code"];

if($st=="post" and $for=="yes" and $exit=="no"){

if($countup <= 40){
for($i=$cofor;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
sendmessegech($channel,$code);
}
$datasend["info"]["for"]="no";
$datasend["info"]["exit"]="yes";

}else{
$ci=$cofor+40;
for($l=$cofor;$l<count($ch_all);$l++){
$channel=$ch_all[$l];
sendmessegech($channel,$code);
if($l==$ci){
break;
}
}
if($l<$countch){
$datasend["info"]["for"]="yes";
$datasend["info"]["cofor"]="$l";
$datasend["info"]["exit"]="no";
$tttt="ØªÙ Ø§ÙØ§Ø±Ø³Ø§Ù ÙÙ $cofor Ø§ÙÙ $ci 

ØªØ­Ø¯ÙØ« 
/update
";
bot('sendMessagee',[
'chat_id'=>$gp,
'text'=>"$tttt 
",
]);

}else{
$datasend["info"]["for"]="no";
$datasend["info"]["exit"]="yes";
}
}
file_put_contents("data/datasend.json", json_encode($datasend));
} 
 ###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
@$datasend = json_decode(file_get_contents("data/datasend.json"),true);
@$msg_id = json_decode(file_get_contents("data/message_id.json"),true);

$st=$datasend["info"]["st"];
$for=$datasend["info"]["for"];
$cofor=$datasend["info"]["cofor"];
$exit=$datasend["info"]["exit"];
$code=$datasend["info"]["code"];

if($st=="post" and $for=="no" and $exit=="yes"){

$txt=null;

$datasend["info"]["for"]="no";
$datasend["info"]["exit"]="null";
$arrayyespost=$msg_id["info"][$code]["yespost"];
$countyespost=count($arrayyespost);
$arraynopost=$msg_id["info"][$code]["nopost"];

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
if(isset($msg_id["info"][$code]["nopost"])){
foreach($arraynopost as $channel){

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);

if($channel!=null){
$namech=$databot["info"]["Ø§ÙÙÙÙØ§Øª"]["info"][$channel]["name"];
$userch=$databot["info"]["Ø§ÙÙÙÙØ§Øª"]["info"][$channel]["user"];
$ch="@$userch";
if($userch == null or $userch == "no"){
$ch="$channel";
}
$txt="$txt\n$ch";
}
}
}else{
$txt="ÙØ§ÙÙØ¬Ø¯ ÙÙÙØ§Øª ÙØ®Ø§ÙÙØ©";
}
bot('editmessagetext',[
'chat_id'=>$gp,
'text'=>"
â| ØªÙ Ø§ÙÙØ´Ø± ÙÙ: $countyespost ÙÙØ§Ø©..
ÙÙØ¯ Ø§ÙÙÙØ´ÙØ±: `$code`
â ï¸| Ø§ÙÙÙÙØ§Øª Ø§ÙÙØ®Ø§ÙÙØ©: \n$txt
",'message_id'=>$code,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- Ø­Ø°Ù Ø§ÙÙÙØ´ÙØ± ..ğ','callback_data'=>"deletemessage $code"]],]])
]);
unlink("data/datasend.json");

} 
 ###Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####
function deletemessegech($channel,$m){

@$msg_id = json_decode(file_get_contents("data/message_id.json"),true);

$arrayyespost=$msg_id["info"][$m]["yespost"];
$arraynopost=$msg_id["info"][$m]["nopost"];
if(in_array($channel,$arrayyespost) or in_array($channel,$arraynopost)){
$mess=$msg_id["info"][$m]["infoyes"][$channel]["message_id"];

bot('deleteMessage',[
"chat_id"=>$channel,
"message_id"=>"$mess",
]);
}
} 
 ###
if(preg_match('/^(deletemessage) (.*)/s', $data) and $chat_id==$gp){
$code = str_replace('deletemessage ',"",$data);
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"âº Ø¬Ø§Ø± Ø­Ø°Ù Ø§ÙÙÙØ´ÙØ±: \n$code
","message_id"=>$message_id,
]);
$send["info"]["code"]="$code";
$send["info"]["st"]="del";


if($countch <= 50){
for($i=0;$i<count($ch_all);$i++){
$channel=$ch_all[$i];

deletemessegech($channel,$code);

}
$send["info"]["for"]="no";
$send["info"]["exit"]="yes";
}else{
for($l=0;$l<50;$l++){
$channel=$ch_all[$l];
deletemessegech($channel,$code);
}
$send["info"]["for"]="yes";
$send["info"]["cofor"]="50";
$send["info"]["exit"]="no";

}
file_put_contents("data/datasend.json", json_encode($send));
} 
 ###wataw### 
@$datasend = json_decode(file_get_contents("data/datasend.json"),true);

$st=$datasend["info"]["st"];

$for=$datasend["info"]["for"];
$cofor=$datasend["info"]["cofor"];

$exit=$datasend["info"]["exit"];
$countup=$countch-$cofor;
$code=$datasend["info"]["code"];

if($st=="del" and $for=="yes" and $exit=="no"){

if($countup <= 40){
for($i=$cofor;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
deletemessegech($channel,$code);
}
$datasend["info"]["for"]="no";
$datasend["info"]["exit"]="yes";

}else{
$ci=$cofor+40;
for($l=$cofor;$l<count($ch_all);$l++){
$channel=$ch_all[$l];
deletemessegech($channel,$code);
if($l==$ci){
break;
}
}
if($l<$countch){
$datasend["info"]["for"]="yes";
$datasend["info"]["cofor"]="$l";
$datasend["info"]["exit"]="no";

}else{
$datasend["info"]["for"]="no";
$datasend["info"]["exit"]="yes";
}
}
file_put_contents("data/datasend.json", json_encode($datasend));
} 
 ####Ağ¥ğ¢ ğ¤ğ¢ğ§ğğ¢####

@$datasend = json_decode(file_get_contents("data/datasend.json"),true);
@$msg_id = json_decode(file_get_contents("data/message_id.json"),true);


$st=$datasend["info"]["st"];
$for=$datasend["info"]["for"];
$cofor=$datasend["info"]["cofor"];
$exit=$datasend["info"]["exit"];
$code=$datasend["info"]["code"];

if($st=="del" and $for=="no" and $exit=="yes"){

$txt=null;

$datasend["info"]["for"]="no";
$datasend["info"]["exit"]="null";
$arrayyespost=$msg_id["info"][$code]["yespost"];
$countyespost=count($arrayyespost);
bot('editmessagetext',[
'chat_id'=>$gp,
'text'=>"
ğ| ØªÙ Ø­Ø°Ù Ø§ÙÙÙØ´ÙØ± Ø¨ÙØ¬Ø§Ø­ .
Ø§ÙÙÙÙØ§Øª Ø§ÙØªÙ ÙÙØ°Øª Ø§ÙØ­Ø°Ù: $countyespost ÙÙØ§Ø© ..
",'message_id'=>$code,
]);
unlink("data/datasend.json");
} 
 ###@SAIEDCH####
