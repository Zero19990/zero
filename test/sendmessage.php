<?php
function sendmessegech($channel,$m){

@$msg_id = json_decode(file_get_contents("data/message_id.json"),true);

$arrayyespost=$msg_id["info"][$m]["yespost"];
$arraynopost=$msg_id["info"][$m]["nopost"];
if(!in_array($channel,$arrayyespost) and !in_array($channel,$arraynopost)){

@$datasend = json_decode(file_get_contents("data/datasend.json"),true);

###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
$send=$datasend["info"]["post"]["send"];
$mode=$datasend["info"]["post"]["mode"];
$text=$datasend["info"]["post"]["text"];
if($send!=null){

###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
if($send=="text" and $send!="MARKDOWN"){
$get=bot('sendMessage', [
'chat_id'=>$channel,
'text'=>"$text",
'parse_mode'=>"$mode",
'disable_web_page_preview'=>false,
'disable_web_page_preview'=>true,
]);
}
###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
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
###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
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
 ###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];
$ch_all=$databot["info"]["القنوات"]["array"];
$countch=count($ch_all);

@$datasend = json_decode(file_get_contents("data/datasend.json"),true);
$amrsend = $datasend["info"]["amr"]; 
 
###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
if($text == "اذاعه" or $text == "اذاعة" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
مرحبا بك عزيزي المدير
هل تريد نشر اذاعة للقنوات والاعضاء  
","reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"✅ | نعم ","callback_data"=>"ethaa"],["text"=>"❌ | لا ","callback_data"=>"eixtsend"]],
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
✳️| قم بإرسال منشورك الان .
",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- الغاء الامر ❎ ','callback_data'=>"eixtsend"]],
]])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"⚠️| لديك اذاعة قيد النشر انتظر ...",
'message_id'=>$message_id,
]);
}
}
if($data=="eixtsend" and $chat_id == $gp){
$send=null;
unlink("data/datasend.json");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"✅ تم الغاء الامر بنجاح",
'message_id'=>$message_id,
]);
} 

 ###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####

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
 ###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
if($message and $chat_id==$gp and $amrsend=="sendmessage" and !$message->forward_from_chat and !$message->forward_from){
$datasend["info"]["amr"]="null";

if($text){
$datasend["info"]["post"]["send"]="text";
$datasend["info"]["post"]["text"]="$text";
$qqq=$text;
$get=bot('sendMessage',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"♻| جار عرض المنشور للمعاينة...",
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
✅| تم حفظ صيغة المنشور .\n
🕵| معاينة المنشور الخاص بك : \n$qqq

🔘| الصيغة الحالية: MARKDOWN
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- نشر MARKDOWN ' ,'callback_data'=>"sendmessage"],['text'=>'- نشر html ' ,'callback_data'=>"sendhtml"]],
[['text'=>'- الغاء الامر ❎ ','callback_data'=>"eixtsend"]],
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
 ###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
$projson = json_decode(file_get_contents("../../botmake/prodate.json"),true);
#متغير الاششتراك المدفوع
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
✅| تم حفظ صيغة المنشور .\n
🕵| معاينة المنشور الخاص بك :\n$qqq

🔘| الصيغة الحالية: توجية
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- نشر توجية 🔂 ' ,'callback_data'=>"sendmessage"]],
[['text'=>'- الغاء الامر ❎ ','callback_data'=>"eixtsend"]],
]])
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🚫| المعذرة التوجية قيد التطوير ..
",'message_id'=>$message_id,
]);
unlink("data/datasend.json");
}
}
} 
 ###wataw### 
$ch_all=$databot["info"]["القنوات"]["array"];
$countch=count($ch_all);

if($data=="sendmessage" and $chat_id == $gp){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
✳️| جار النشر بنجاح في $countch قناة ...
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
$tttt="تم الارسال من 0 الى 50 

تحديث 
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
$tttt="تم الارسال من $cofor الى $ci 

تحديث 
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
 ###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
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
$namech=$databot["info"]["القنوات"]["info"][$channel]["name"];
$userch=$databot["info"]["القنوات"]["info"][$channel]["user"];
$ch="@$userch";
if($userch == null or $userch == "no"){
$ch="$channel";
}
$txt="$txt\n$ch";
}
}
}else{
$txt="لايوجد قنوات مخالفة";
}
bot('editmessagetext',[
'chat_id'=>$gp,
'text'=>"
✅| تم النشر في: $countyespost قناة..
كود المنشور: `$code`
⚠️| القنوات المخالفة: \n$txt
",'message_id'=>$code,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- حذف المنشور ..🗑','callback_data'=>"deletemessage $code"]],]])
]);
unlink("data/datasend.json");

} 
 ###A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####
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
'text'=>"⏺ جار حذف المنشور: \n$code
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
 ####A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢####

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
🗑| تم حذف المنشور بنجاح .
القنوات التي نفذت الحذف: $countyespost قناة ..
",'message_id'=>$code,
]);
unlink("data/datasend.json");
} 
 ###@SAIEDCH####
