<?php

# @SAIEDCH

mkdir("data");
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];

$stopbot = json_decode(file_get_contents("../../botmake/stopbot.json"),true);
$st_stop=$stopbot["info"][$userbot]["stop"];
#شرط ايقاف البوتات 
if($st_stop!="yes"){

$sy_delete=$databot["info"]["تحكم"]["الحذف"];
$sy_uplode=$databot["info"]["تحكم"]["الرفع التلقائي"];
$sy_mragbh=$databot["info"]["تحكم"]["المراقبة"];



@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
$stlist=$postlist["info"]["st"];
$exit=$postlist["info"]["exit"];

#شرط تنفيذ احد اوضاع (الرفع - المراقبة - الحذف )
if($stlist=="post" and $exit=="null" and $update->channel_post ){
if($sy_delete=="مفعلة ✅" or $sy_uplode=="مفعلة ✅" or $sy_mragbh=="مفعلة ✅"){
bot('sendMmessage',[
'chat_id'=>$gp,
'text'=>"تم ",

]);
require_once("sy_channel.php");
}
}
if($chat_id==null or $chat_id ==0){
;}
require_once("function.php");

$azrarlist = json_decode(file_get_contents("../../botmake/azrzrlist.json"),true);
#متغير تفعيل الازرار
$st_azrzr=$azrarlist["info"]["st"];
#متغير البوتات المستنثناه
$arraybot=$azrarlist["info"]["stoparray"];
$projson = json_decode(file_get_contents("../../botmake/prodate.json"),true);
#متغير الاششتراك المدفوع
$st_pro=$projson["info"][$IDBOT]["pro"];

if($chat_id==$gp or $from_id==$admin or  in_array($from_id,$sudo)){

require_once("admin.php");
require_once("groupadmin.php");
require_once("fahs.php");
require_once("posts.php");
require_once("sitingtime.php");
}
if($st_pro!="yes" and $st_azrzr=="yes" and !in_array($userbot,$arraybot)){
require_once("newlist.php");
}else{
require_once("newlistpro.php");
}
if($chat_id==$gs){
require_once("groupmember.php");
}
require_once("postlist.php");
require_once("dellist.php"); 
require_once("deleteposts.php"); 
require_once("sendposts.php"); 
require_once("sendmessage.php"); 
require_once("private.php");

@$memberbot = json_decode(file_get_contents("../../member/$IDBOT.json"),true);

$members=$memberbot["info"]["members"];

if(!in_array($from_id,$members) and $type=="private"){
$memberbot["info"]["members"][]="$from_id";
file_put_contents("../../member/$IDBOT.json", json_encode($memberbot));
}
}else{
if($from_id==$admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🚫 تم إيقاف بوتك من قبل مطور مصنع بوتات اللستة ",

]);
}
return false;
}

