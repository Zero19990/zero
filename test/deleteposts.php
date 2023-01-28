<?php
#فاكشن الحذف 
function deleteposts($channel,$nu){
@$dataposts = json_decode(file_get_contents("data/dataposts.json"),true);
$arrayyespost=$dataposts["info"][$nu]["yespost"];
$arraynopost=$dataposts["info"][$nu]["nopost"];
$message=$dataposts["info"][$nu]["infoyes"][$channel]["message_id"];
bot('deleteMessage',[
"chat_id"=>$channel,
"message_id"=>"$message",
]);
}
## #####
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];

@$posts = json_decode(file_get_contents("../../post/$IDBOT.json"),true);

@$dataposts = json_decode(file_get_contents("data/dataposts.json"),true);

@$sendpost = json_decode(file_get_contents("data/sendpost.json"),true);

$numberpost=$sendpost["info"]["جاري"];
if (preg_match('/^(احذف) (.*)/s',$text) and $chat_id == $gp){
$textt = str_replace("احذف ","",$text);
$textt = str_replace(" ","",$textt);
$textt = str_replace("\n","",$textt);
$textt = str_replace("  ","",$textt);
$nupost= trim($textt);

if(isset($posts["info"]["posts"]["$nupost"]) and is_numeric($nupost)){
if($numberpost!=$nupost){
if(isset($dataposts["info"]["$nupost"])){
$ch_alldel=$dataposts["info"][$nupost]["yespost"];
$countch=count($ch_alldel);
unlink("data/infopost.json");
unlink("data/sendpost.json");
$send["info"]["جاري"]="$nupost";
$send["info"]["st"]="delll";
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🖇 جار حذف الكود : $nupost ...
",'reply_to_message_id'=>$message->message_id,
]);
if($countch <= 50){
for($i=0;$i<count($ch_alldel);$i++){
$channel=$ch_alldel[$i];
$message=$dataposts["info"][$nupost]["infoyes"][$channel]["message_id"];

bot('deleteMessage',[
"chat_id"=>$channel,
"message_id"=>"$message",
]);
#deleteposts($channel,$nupost);
}
$send["info"]["for"]="no";
$send["info"]["exit"]="yes";
}else{
for($l=0;$l<50;$l++){
$channel=$ch_alldel[$l];
#deleteposts($ch_alldel,$nupost);
$message=$dataposts["info"][$nupost]["infoyes"][$channel]["message_id"];
bot('deleteMessage',[
"chat_id"=>$channel,
"message_id"=>"$message",
]);
}
$send["info"]["for"]="yes";
$send["info"]["cofor"]="50";
$send["info"]["exit"]="no";
$tttt="تم الحذف من 0 الى 50 

تحديث 
/update
";
}

file_put_contents("data/sendpost.json", json_encode($send));

bot('sendMessagee',[
'chat_id'=>$gp,
'text'=>"$tttt 
",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ المعذرة هذا الكود لم يتم نشره. مسبقا.
",'reply_to_message_id'=>$message->message_id,
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ المعذرة هذا الكود قيد الحذف.
",'reply_to_message_id'=>$message->message_id,
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠️ المعذرة هذا الكود غير موجود ...
",'reply_to_message_id'=>$message->message_id,
]);
}
}
#######
@$sendpost = json_decode(file_get_contents("data/sendpost.json"),true);

$st=$sendpost["info"]["st"];
$for=$sendpost["info"]["for"];
$cofor=$sendpost["info"]["cofor"];
$exit=$sendpost["info"]["exit"];
$numberpost=$sendpost["info"]["جاري"];
$ch_alldel=$dataposts["info"][$numberpost]["yespost"];
$countch=count($ch_alldel);
$countup=$countch-$cofor;
if($st=="delll" and $for=="yes" and $exit=="no"){

if($countup <= 40){
for($i=$cofor;$i<count($ch_alldel);$i++){
$channel=$ch_alldel[$i];
#deleteposts($channel,$numberpost);
$message=$dataposts["info"][$nupost]["infoyes"][$numberpost]["message_id"];

bot('deleteMessage',[
"chat_id"=>$channel,
"message_id"=>"$message",
]);
}
$sendpost["info"]["for"]="no";
$sendpost["info"]["exit"]="yes";
}else{
$ci=$cofor+40;
for($l=$cofor;$l<count($ch_alldel);$l++){
$channel=$ch_alldel[$l];
#deleteposts($channel,$numberpost);
$message=$dataposts["info"][$nupost]["infoyes"][$numberpost]["message_id"];

bot('deleteMessage',[
"chat_id"=>$channel,
"message_id"=>"$message",
]);
if($l==$ci){
break;
}
}
 ## #####
if($l<$countch){
$sendpost["info"]["for"]="yes";
$sendpost["info"]["cofor"]="$l";
$sendpost["info"]["exit"]="no";
$tttt="
☑️ تم الحذف من $cofor 
الى $ci 

تحديث 
/update
$numberpost

";
bot('sendMessagee',[
'chat_id'=>$gp,
'text'=>"$tttt 
",
]);
}else{
$sendpost["info"]["for"]="no";
$sendpost["info"]["exit"]="yes";
}}
file_put_contents("data/sendpost.json", json_encode($sendpost));
}
## #####
@$sendpost = json_decode(file_get_contents("data/sendpost.json"),true);
@$dataposts = json_decode(file_get_contents("data/dataposts.json"),true);

########
$st=$sendpost["info"]["st"];
$for=$sendpost["info"]["for"];
$cofor=$sendpost["info"]["cofor"];
$exit=$sendpost["info"]["exit"];
$numberpost=$sendpost["info"]["جاري"];
$ch_alldel=$dataposts["info"][$numberpost]["yespost"];
$countch=count($ch_alldel);
if($st=="delll" and $for=="no" and $exit=="yes"){

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
'chat_id'=>$gp,
'text'=>"
✅ تم حذف الكود : $numberpost بنجاح. 
تم التنفيذ في : $countyespost قناة ..
⚠️ قنوات مخالفة:\n$txt
",'reply_to_message_id'=>$message->message_id,
]);
unset($dataposts["info"]["$numberpost"]);
file_put_contents("data/dataposts.json", json_encode($dataposts));

file_put_contents("data/sendpost.json", json_encode($sendpost));
}