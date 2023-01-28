<?php
#فاكشن الارسال .  
function openpost($nu,$IDBOT){
@$posts = json_decode(file_get_contents("../../post/$IDBOT.json"),true);
$po=$posts["info"]["posts"][$nu];
$infopost["info"]["number"]=$nu;
$infopost["info"]["infopost"]=$po;
file_put_contents("data/infopost.json", json_encode($infopost));
}
#الارسال...
function sendposts($channel,$nu){
@$dataposts = json_decode(file_get_contents("data/dataposts.json"),true);

$arrayyespost=$dataposts["info"][$nu]["yespost"];
$arraynopost=$dataposts["info"][$nu]["nopost"];
if(!in_array($channel,$arrayyespost) and !in_array($channel,$arraynopost)){

@$infopost = json_decode(file_get_contents("data/infopost.json"),true);

$k=$infopost["info"]["infopost"]["key"];
$keyboard=$infopost["info"]["infopost"]["inline_keyboard"];
if($k=="yes"){
$reply_markup=json_encode($keyboard);
}
if($reply_markup==null or $keyboard==null){
$reply_markup=null;
}

$web=$infopost["info"]["infopost"]["web"];
$send=$infopost["info"]["infopost"]["send"];
$mode=$infopost["info"]["infopost"]["mode"];
$text=$infopost["info"]["infopost"]["text"];

if($send=="text"){
$get=bot('sendMessage',[
'chat_id'=>$channel,
'text'=>"$text",
'parse_mode'=>"$mode",
'disable_web_page_preview'=>$web,
'reply_markup'=>$reply_markup
]);
}else{
$media=$infopost["info"]["infopost"]["media"];
$file_id=$infopost["info"]["infopost"]["file_id"];
$get=bot($send,[
"chat_id"=>$channel,
"$media"=>"$file_id",
'caption'=>"$text",
'disable_web_page_preview'=>$web,
'reply_markup'=>$reply_markup
]);
}
$get_send=$get->result;
if(!is_null($get_send)){
$msg = $get->result->message_id;
$dataposts["info"][$nu]["yespost"][]="$channel";
$dataposts["info"][$nu]["infoyes"][$channel]["message_id"]="$msg";
}else{
$dataposts["info"][$nu]["nopost"][]="$channel";
}
file_put_contents("data/dataposts.json", json_encode($dataposts));
}
}

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];
$ch_all=$databot["info"]["القنوات"]["array"];
$countch=count($ch_all);

@$posts = json_decode(file_get_contents("../../post/$IDBOT.json"),true);

@$dataposts = json_decode(file_get_contents("data/dataposts.json"),true);

@$sendpost = json_decode(file_get_contents("data/sendpost.json"),true);

$numberpost=$sendpost["info"]["جاري"];

if (preg_match('/^(انشر) (.*)/s',$text) and $chat_id == $gp) {
$textt = str_replace("انشر ","",$text);
$textt = str_replace(" ","",$textt);
$textt = str_replace("\n","",$textt);
$textt = str_replace("  ","",$textt);
$nupost= trim($textt);
if(isset($posts["info"]["posts"]["$nupost"]) and is_numeric($nupost)){
if($numberpost!=$nupost){
if(!isset($dataposts["info"]["$nupost"])){
unlink("data/infopost.json");
unlink("data/sendpost.json");
$send["info"]["جاري"]="$nupost";
$send["info"]["st"]="post";
openpost($nupost,$IDBOT);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🖇 جار نشر الكود رقم $nupost 
",'reply_to_message_id'=>$message->message_id,
]);
if($countch <= 50){
for($i=0;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
sendposts($channel,$nupost);
}
$send["info"]["for"]="no";
$send["info"]["exit"]="yes";
}else{
for($l=0;$l<30;$l++){
$channel=$ch_all[$l];
sendposts($channel,$nupost);
}
$send["info"]["for"]="yes";
$send["info"]["cofor"]="30";
$send["info"]["exit"]="no";
$tttt="تم الارسال من 0 الى 50 

تحديث 
/update
";
}

file_put_contents("data/sendpost.json", json_encode($send));

bot('ssendMessage',[
'chat_id'=>$gp,
'text'=>"$tttt 
",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- تحديث النشر ' ,'callback_data'=>"updatesend"]],
]])
]);

}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠ المعذرة الكود منشور في القنوات مسبقا.
",'reply_to_message_id'=>$message->message_id,
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠ المعذرة الكود قيد النشر ..   
",'reply_to_message_id'=>$message->message_id,
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠ المعذرة الكود غير موجود .
",'reply_to_message_id'=>$message->message_id,
]);
}
}

@$sendpost = json_decode(file_get_contents("data/sendpost.json"),true);
$st=$sendpost["info"]["st"];
$for=$sendpost["info"]["for"];
$cofor=$sendpost["info"]["cofor"];
$exit=$sendpost["info"]["exit"];
$countup=$countch-$cofor;
$numberpost=$sendpost["info"]["جاري"];
if($st=="post" and $for=="yes" and $exit=="no" or $data=="updatesend"){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
♲ جار نشر الكود رقم $nupost
",'message_id'=>$message->message_id,
]);
if($countup <= 30){
for($i=$cofor;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
sendposts($channel,$numberpost);
}
$sendpost["info"]["for"]="no";
$sendpost["info"]["exit"]="yes";

}else{
$ci=$cofor+30;
for($l=$cofor;$l<count($ch_all);$l++){
$channel=$ch_all[$l];
sendposts($channel,$numberpost);
if($l==$ci){
break;
}
}
if($l<$countch){
$sendpost["info"]["for"]="yes";
$sendpost["info"]["cofor"]="$l";
$sendpost["info"]["exit"]="no";
$tttt="تم الارسال من $cofor الى $ci 

تحديث 
/update
";

bot('ssendMessage',[
'chat_id'=>$chat_id,
'text'=>"$tttt",
'message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- تحديث النشر ' ,'callback_data'=>"updatesend"]],
]])


]);
}else{
$sendpost["info"]["for"]="no";
$sendpost["info"]["exit"]="yes";
}
}
file_put_contents("data/sendpost.json", json_encode($sendpost));
}

@$sendpost = json_decode(file_get_contents("data/sendpost.json"),true);
@$dataposts = json_decode(file_get_contents("data/dataposts.json"),true);


$st=$sendpost["info"]["st"];
$for=$sendpost["info"]["for"];
$cofor=$sendpost["info"]["cofor"];
$exit=$sendpost["info"]["exit"];
$numberpost=$sendpost["info"]["جاري"];

if($st=="post" and $for=="no" and $exit=="yes"){

$txt=null;
$sendpost["info"]["جاري"]="null";
$sendpost["info"]["for"]="no";
$sendpost["info"]["exit"]="null";
$arrayyespost=$dataposts["info"][$numberpost]["yespost"];
$countyespost=count($arrayyespost);

$arraynopost=$dataposts["info"][$numberpost]["nopost"];
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
if(isset($dataposts["info"][$numberpost]["nopost"])){
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
'message_id'=>$message_id +1,
//bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
✅ تم نشر الكود : $numberpost بنجاح.
تنفيذ في : $countyespost قناة ..
⚠ قنوات مخالفة : \n$txt
",'reply_to_message_id'=>$message->message_id,
]);
file_put_contents("data/sendpost.json", json_encode($sendpost));
}