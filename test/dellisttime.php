<?php


@$postlist = json_decode(file_get_contents("data/postlist.json"),true);

@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
$ch_all=$datalist["info"]["yespost"];

$inlist=$postlist["info"]["type"];

$exit=$postlist["info"]["exit"];


if($text=="حذف" and $chat_id ==
$gp){
if($inlist=="شفاف"){
$infolist="شفاف";
}
if($inlist=="ماركدون"){
$infolist="روابط";
}
if($inlist=="معرفات"){
$infolist="معرفات";
}
}


$stlist=$postlist["info"]["st"];

$countch=count($ch_all); 
 ###wataw### 
if($text=="حذف" and $chat_id ==
$gp ){
if($stlist=="post" and $exit=="null"){
$postlist["info"]["post"]="no";
$postlist["info"]["st"]="del";
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"⏳جار حذف اللستة: $infolist .....",
]);
if($countch <= 50){
for($i=0;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
$msg=$datalist["info"]["infoyes"][$channel]["message_id"];
dellist($token,$channel,$msg);
}
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="yes";
}else{
for($l=0;$l<50;$l++){
$channel=$ch_all[$l];
$msg=$datalist["info"]["infoyes"][$channel]["message_id"];
dellist($token,$channel,$msg);
}
$postlist["info"]["for"]="yes";
$postlist["info"]["cofor"]="50";
$postlist["info"]["exit"]="no";

}
file_put_contents("data/postlist.json", json_encode($postlist));


}else{
$inlist=$postlist["info"]["type"];
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
⚠️ المعذرة عزيزي
لايوجد لستة منشورة مسبقا.
",
'reply_to_message_id'=>$message->mrssage_id, 
'parse_mode'=>html,
'disable_web_page_preview'=>true,
]);
}
} 