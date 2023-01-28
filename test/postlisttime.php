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
if($text=="نشر" and $chat_id ==
$gp ){
if($stlist!="post" and $post!="yes"){
if($listtext!=null){
unlink("data/postlist.json");
unlink("data/datalist.json");
$postlist["info"]["type"]="$infolist";
$postlist["info"]["st"]="post";
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"♻ جار نشر لستة: $infolist ..
",
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
'text'=>"⚠️المعذرة لا توجد لديك لستة جاهزة قم بالانشاء اولا .
",
]);
}
}else{
$inlist=$postlist["info"]["type"];
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
🚫 تعذر نشر لستة: $infolist
لديك لستة: $inlist منشورة مسبقاً في القنوات
",'parse_mode'=>'html',
'reply_to_message_id'=>$message->mrssage_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- حذف اللستة السابقة 🗑", 'callback_data'=>"dellist"]],
]
])
]);
}
}