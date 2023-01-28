<?php

if(isset($update->channel_post)){
$title = $update->channel_post->chat->title;
$user_channel = $update->channel_post->chat->username;
$Caption= $update->channel_post->Caption;
$channel_id = $update->channel_post->chat->id;
$channeltext= $update->channel_post->text;
$channel_message_id= $update->channel_post->message_id;
}
if(!$m3ainh or $m3ainh=="لامعاينة"){
$m3ainhr="true";
}else{
$m3ainhr="false";
} 
 ########
function sy_uplode($channel,$web,$bord){
@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
if($bord=="yes"){
@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
$list=$postlist["info"]["list"]["inline_keyboard"];
$text=$postlist["info"]["list"]["listtext"];
$reply_markup=json_encode($list);
if($list==null){
$reply_markup=null;
}
}
$arrayyespost=$datalist["info"]["yespost"];

$count_up=$datalist["info"]["infoyes"][$channel]["count_up"]+1;
$count_mkup=$datalist["info"]["infoyes"][$channel]["count_mkup"]+1;
if(in_array($channel,$arrayyespost)){
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
$datalist["info"]["infoyes"][$channel]["message_id"]="$msg";
$datalist["info"]["infoyes"][$channel]["count_up"]="$count_up";
}else{
$datalist["info"]["infoyes"][$channel]["count_mkup"]="$count_mkup";
}
}
file_put_contents("data/datalist.json", json_encode($datalist));
} 
 #########
function sy_delete($channel){
@$datalist = json_decode(file_get_contents("data/datalist.json"),true);

$arrayyespost=$datalist["info"]["yespost"];

$count_del=$datalist["info"]["infoyes"][$channel]["count_del"]+1;
$count_mkdel=$datalist["info"]["infoyes"][$channel]["count_mkdel"]+1;

$message=$datalist["info"]["infoyes"][$channel]["message_id"];

if(in_array($channel,$arrayyespost)){
$get=bot('deleteMessage',[
"chat_id"=>$channel,
"message_id"=>"$message",
]);
$get_del=$get->result;
if(!is_null($get_del)){
$datalist["info"]["infoyes"][$channel]["count_del"]="$count_del";
}else{
$datalist["info"]["infoyes"][$channel]["count_mkdel"]="$count_mkdel";
}
}
file_put_contents("data/datalist.json", json_encode($datalist));
} 
 #########
function sy_mragbh($channel,$web,$bord){
$wataw="no";
@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
if($bord=="yes"){
@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
$list=$postlist["info"]["list"]["inline_keyboard"];
$text=$postlist["info"]["list"]["listtext"];
$reply_markup=json_encode($list);
if($list==null){
$reply_markup=null;
}
}
$arrayyespost=$datalist["info"]["yespost"];

$count_mkmragbh=$datalist["info"]["infoyes"][$channel]["count_mkmragbh"]+1;
$mess=$datalist["info"]["infoyes"][$channel]["message_id"];

if(in_array($channel,$arrayyespost)){
$get=bot('editmessagetext',[
"message_id"=>"$mess",
"chat_id"=>$channel,
"text"=>"$text",
'parse_mode'=>markdown,
'disable_web_page_preview'=>$web,
"reply_markup"=>$reply_markup
]);

$get_edit = $get->description;
if (strpos($get_edit,'MESSAGE_ID_INVALID')!== false or strpos($get_edit,'message to edit not found')!== false){
sy_uplode($channel,$web,"yes");

@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
$datalist["info"]["infoyes"][$channel]["count_mkmragbh"]="$count_mkmragbh";
file_put_contents("data/datalist.json", json_encode($datalist));

$wataw="yes";
}else{


$wataw="no";
}

return $wataw;
}

} 
 #########
@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
$stlist=$postlist["info"]["st"];

@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
$ch_all=$datalist["info"]["yespost"];

if($stlist=="post" and $exit=="null" and in_array($channel_id,$ch_all)){

if($sy_delete=="مفعلة ✅" and $sy_uplode!="مفعلة ✅" and $sy_mragbh!="مفعلة ✅"){
if($update->channel_post){
bot('deleteMessage',[
"chat_id"=>$channel_id,
"message_id"=>"$channel_message_id",
]);
}
}
#الرفع التلقائي..
if($sy_delete!="مفعلة ✅" and $sy_uplode=="مفعلة ✅" and $sy_mragbh!="مفعلة ✅"){
if($update->channel_post){
sy_delete($channel_id);
sy_uplode($channel_id,$m3ainhr,"yes");
}}
#المراقبة
if($sy_delete!="مفعلة ✅" and $sy_uplode!="مفعلة ✅" and $sy_mragbh=="مفعلة ✅"){
if($update->channel_post){
$stuts=sy_mragbh($channel_id,$m3ainhr,"yes");
if($stuts=="yes"){
if($user_channel!=null){
$ttxt="قناة عامة
-USER : @$user_channel
";
}else{
$ttxt="قناة خاصة
-ID : $channel_id
";
}

bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"⚠ مخالفة 
- $ttxt 
🗑 حذفت اللستة
",
]);
}
}}
#return false;
} 
 ########
