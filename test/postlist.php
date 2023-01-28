<?php

@$datajson = json_decode(file_get_contents("data/channels.json"),true);

if($text=="نشر" and $chat_id ==
$gp){
if($typee=="شفاف" or $typee==null){
$infolist="شفاف";
}
if($typee=="ماركدون"){
$infolist="روابط";
}
if($typee=="معرفات"){
$infolist="معرفات";
}
}
$ch_all=$databot["info"]["القنوات"]["array"];
$countch=count($ch_all);
$listtext = file_get_contents("data/listtext.txt");
@$postlist = json_decode(file_get_contents("data/postlist.json"),true);

$stlist=$postlist["info"]["st"];
if(!$m3ainh or $m3ainh=="لامعاينة"){
$m3ainhr="true";
}else{
$m3ainhr="false";
}

$post=$postlist["info"]["post"];
if($text=="نشر" and $chat_id ==$gp){
if($stlist!="post" and $post!="yes"){
if($listtext!=null){
unlink("data/postlist.json");
unlink("data/datalist.json");
$postlist["info"]["type"]="$infolist";
$postlist["info"]["st"]="post";
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"جار نشر اللستة في القنوات 
نمط اللستة: $infolist ..
",'reply_to_message_id'=>$message->message_id,
]);
if($countch <= 50){
for($i=0;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
postlist($token,$channel,$listtext,$m3ainhr,"yes");
}
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="yes";
}else{
for($l=0;$l<50;$l++){
$channel=$ch_all[$l];
postlist($token,$channel,$listtext,$m3ainhr,"yes");
}
$postlist["info"]["for"]="yes";
$postlist["info"]["cofor"]="50";
$postlist["info"]["exit"]="no";
$tttt="تحديث 
-for yes
-co 40
-exit no
";
}
file_put_contents("data/postlist.json", json_encode($postlist));
bot('sendMessagee',[
'chat_id'=>$gp,
'text'=>"$tttt 
",
]);
}else{
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
⚠️ المعذرة لا توجد لستة جاهزة .
",'reply_to_message_id'=>$message->message_id,
]);
}
}else{
$inlist=$postlist["info"]["type"];
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
⚠ تعذر نشر لستة: $infolist .
لديك لستة: $inlist منشورة مسبقاً.
",'parse_mode'=>html,
'reply_to_message_id'=>$message->mrssage_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 حذف اللستة السابقة..🗑",'callback_data'=>"dellist"]],
]])
]);
}
}

@$postlist = json_decode(file_get_contents("data/postlist.json"),true);

$stlist=$postlist["info"]["st"];
$for=$postlist["info"]["for"];
$cofor=$postlist["info"]["cofor"];
$exit=$postlist["info"]["exit"];
$countup=$countch-$cofor;
if($stlist=="post" and $for=="yes" and $exit=="no"){

if($countup <= 50){
for($i=$cofor;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
postlist($token,$channel,$listtext,$m3ainhr,"yes");
}
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="yes";
}else{
$ci=$cofor+50;
for($l=$cofor;$l<count($ch_all);$l++){
$channel=$ch_all[$l];
postlist($token,$channel,$listtext,$m3ainhr,"yes");
if($l==$ci){
break;
}
}
if($l<$countch){
$postlist["info"]["for"]="yes";
$postlist["info"]["cofor"]="$l";
$postlist["info"]["exit"]="no";
$tttt="تحديث 
-for yes
-co $l
-exit no
-ci $ci
-cofor $cofor
";
bot('sendMessagee',[
'chat_id'=>$gp,
'text'=>"$tttt 
",
]);
}else{
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="yes";
}
}
file_put_contents("data/postlist.json", json_encode($postlist));
}

@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
@$datalist = json_decode(file_get_contents("data/datalist.json"),true);

$stlist=$postlist["info"]["st"];
$for=$postlist["info"]["for"];
$cofor=$postlist["info"]["cofor"];
$exit=$postlist["info"]["exit"];

if($stlist=="post" and $for=="no" and $exit=="yes"){
$txt=null;
$postlist["info"]["post"]="yes";
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="null";
$arrayyespost=$datalist["info"]["yespost"];
$countyespost=count($arrayyespost);
$arraynopost=$datalist["info"]["nopost"];

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
if(isset($datalist["info"]["nopost"])){
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
bot('sendmessage',[
'chat_id'=>$gp,
'text'=>"
✅ تم نشر اللستة في القنوات بنجاح.
تم تنفيذ النشر في : $countyespost قناة ..
⚠️ قنوات مخالفة : \n$txt
",
]);
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>"✅ تم بفضل اللَّه نشر اللسْتة في القنوات.👇
",
]);

@$keyboard = json_decode(file_get_contents("data/list.json"),true);
$reply_markup=json_encode($keyboard);
if($keyboard==null){
$reply_markup=null;
}
$listtext=file_get_contents("data/listtext.txt");
bot('sendMessage',[
"chat_id"=>$gs,
"text"=>"$listtext
",'parse_mode'=>markdown,
'disable_web_page_preview'=>$m3ainhr,
'reply_markup'=>$reply_markup
]);

@$list = json_decode(file_get_contents("data/list.json"),true);
$postlist["info"]["list"]["inline_keyboard"]=$list;
$postlist["info"]["list"]["listtext"]="$listtext";
file_put_contents("data/postlist.json", json_encode($postlist));
}
