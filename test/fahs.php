<?php

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];

$count_memberyes=$databot["info"]["تحكم"]["عدد الاعضاء"];
$cuont_channel=$databot["info"]["تحكم"]["عدد القنوات"];
$cuont_hroof=$databot["info"]["تحكم"]["عدد الحروف"];
$cuont_fasl=$databot["info"]["تحكم"]["فاصل القنوات"];
$m3ainh=$databot["info"]["تحكم"]["معاينة الروابط"];
$typee=$databot["info"]["تحكم"]["نوع اللسته"];
$roabt=$databot["info"]["تحكم"]["نوع الروابط"];
$typetrtib=$databot["info"]["تحكم"]["نوع الترتيب"];
$as_ch_khash=$databot["info"]["تحكم"]["استقبال الخاصة"];
$order=$databot["info"]["تحكم"]["اوامر الاعضاء"];
$cansh=$databot["info"]["تحكم"]["الرفع التلقائي"];
$ash3atat=$databot["info"]["تحكم"]["اشعارات اللسته"];
$addyes=$databot["info"]["تحكم"]["ابداء"];

##$##
if($text == "فحص" and $chat_id == $gp){
@$datajson = json_decode(file_get_contents("data/channels.json"),true);
unset($datajson["info"]["فحص"]["yeschannel"]);
unset($datajson["info"]["فحص"]["nochannel"]);
file_put_contents("data/channels.json", json_encode($datajson));
}
if($text == "فحص" and $chat_id == $gp){
unlink("send1.txt");
unlink("delete1.txt");
unlink("admin1.txt");
$f=0;
$s=0;
$d=0;
$br=null;
$upda="null";
$keyboard["inline_keyboard"]=[];
@$datajson = json_decode(file_get_contents("data/channels.json"),true);
$arraych=$datajson["info"]["فحص"]["yeschannel"];
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"جار فحص القنوات ..
",'reply_to_message_id'=>$message_id, 
]);
$ch_all=$databot["info"]["القنوات"]["array"];
foreach($ch_all as $channel ){
if($channel!=""){
$br++;
$b=100;
@$datajson = json_decode(file_get_contents("data/channels.json"),true);
$arrayyes=$datajson["info"]["فحص"]["yeschannel"];
$arrayno=$datajson["info"]["فحص"]["nochannel"];
if(!in_array($channel,$arrayyes) and !in_array($channel,$arrayno)){
wathqrees($channel,$token,$IDBOT);
if($b==$break){
break;
$upda="yes";
}
}
}
}
if($upda=="yes"){
for($i=100;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
if($channel!=""){
$b=150;
@$datajson = json_decode(file_get_contents("data/channels.json"),true);
$arrayyes=$datajson["info"]["فحص"]["yeschannel"];
$arrayno=$datajson["info"]["فحص"]["nochannel"];
if(!in_array($channel,$arrayyes) and !in_array($channel,$arrayno)){
wathqrees($channel,$token,$IDBOT);
if($b==$i){
break;
$upda="up";
}
}
}
}
}
if($upda=="up"){
for($i=150;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
if($channel!=""){
$b=200;
@$datajson = json_decode(file_get_contents("data/channels.json"),true);
$arrayyes=$datajson["info"]["فحص"]["yeschannel"];
$arrayno=$datajson["info"]["فحص"]["nochannel"];
if(!in_array($channel,$arrayyes) and !in_array($channel,$arrayno)){
wathqrees($channel,$token,$IDBOT);
if($b==$i){
break;
$upda="no";
}
}
}
}
}

$send1 = file_get_contents("send1.txt");
$admin1 = file_get_contents("admin1.txt");
$delete1 = file_get_contents("delete1.txt");
if(!$send1){
$send1 = "➖ لايوجد قنوات قيدت نشر اللستة."; 
$s=1;
}
if(!$delete1){
$delete1 = "➖ لايوجد قنوات قيدت حذف اللستة.";
$d=1;
}
if(!$admin1){
$f=1;
$admin1 ="➖ لايوجد قنوات حظرت البوت.";}
if($f==1 and $s==1 and $d==1 ){
$keyboard["inline_keyboard"][] = [['text'=>"➕ لا توجد قنوات مخالفة ✅",'callback_data'=>"null"]];
}else{
$keyboard["inline_keyboard"][] = [['text'=>"⚠ حذف القنوات المخالفة..🗑 ",'callback_data'=>"delchannelmk"]];
}
$reply_markup=json_encode($keyboard);
//sleep(10);
bot('sendMessage',[
'chat_id'=>$gp,
'message_id'=>$m,
'text'=>"📊 تقرير فحص القنوات.\n\n➕ حظرت البوت من القنوات.\n$admin1\n➕ قيدت البوت من نشر اللستة.\n$send1\n➕ قيدت البوت من حذف اللستة.\n$delete1
",'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);
unlink("send1.txt");
unlink("delete1.txt");
unlink("admin1.txt");
}
#حذف القنوات المخالفة ..
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
if($data == "delchannelmk" and $chat_id == $gp){

@$datajson = json_decode(file_get_contents("data/channels.json"),true);

$arraych=$datajson["info"]["فحص"]["yeschannel"];
bot('editmessagetext',[
'chat_id'=>$gp,
'text'=>"جار حذف القنوات المخالفة..
","message_id"=>$message_id,
]);
$ch_arrayno=$datajson["info"]["فحص"]["nochannel"];
$co=0;
$txt=null;
if(isset($datajson["info"]["فحص"]["nochannel"])){
foreach($ch_arrayno as $channel){
if($channel!="" and !in_array($channel,$arraych)){

$arraych=$databot["info"]["القنوات"]["array"];
$index = array_search($channel, $arraych);

if($channel== $databot["info"]["القنوات"]["array"][$index] and $channel != null and $index != null){

$namech=$databot["info"]["القنوات"]["info"][$channel]["name"];
$userch=$databot["info"]["القنوات"]["info"][$channel]["user"];
if($userch==null or $userch=="no"){
$userch=$channel;
}
$co++;
unset($databot["info"]["القنوات"]["info"][$channel]);
unset($databot["info"]["القنوات"]["array"][$index]);
$databot["info"]["القنوات"]["array"]=array_values($databot["info"]["القنوات"]["array"]);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
$txt="$txt\n$co-$userch";
}
}
}
$in="القنوات المحذوفة : \n$txt";
}else{
$in="لاتوجد قنوات محذوفة";
}
bot('Editmessagetext',[
'chat_id'=>$gp,
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"✅ $in",
]);
}
//////////
if($text == "انشاء" and $chat_id == $gp){
@$datajson = json_decode(file_get_contents("data/channels.json"),true);
unset($datajson["info"]["انشاء"]);
file_put_contents("data/channels.json", json_encode($datajson));
}
@$datajson = json_decode(file_get_contents("data/channels.json"),true);
$ch_yes_id = $datajson["info"]["فحص"]["yeschannel"];
if($text == "انشاء" and $chat_id == $gp){
$txtch = null;
$wathq1=0;
$wathq2=0;
$wathq3=0;
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"جار الترتيب انتظر قليلا.. 
نمط الترتيب: $typetrtib  
",'reply_to_message_id'=>$message_id, 
]);
if($wathq1==0){
$wathq1=null;
for($i=0;$i<count($ch_yes_id);$i++){
if($ch_yes_id[$i]!=""){

$channel=$ch_yes_id[$i];
$res=$databot["info"]["القنوات"]["info"][$channel]["count_mem"];
$txtch = "$res=$channel\n$txtch";
}}
$wathq2=2;
}
////////////
if($wathq2==2){
$wathq2=null;
$wathq3=0;
$bdtrtib=explode("\n",$txtch);
if($typetrtib == "تصاعدي" or $typetrtib == "عشوائي" or $typetrtib == null){
sort($bdtrtib, SORT_NATURAL | SORT_FLAG_CASE);
for($i=0;$i<count($bdtrtib);$i++){
wathqres("$bdtrtib[$i]",$IDBOT);
}
}
if($typetrtib == "تنازلي" ){
rsort($bdtrtib, SORT_NATURAL | SORT_FLAG_CASE);
for($i=0;$i<count($bdtrtib);$i++){
if($bdtrtib[$i]!=null){
wathqres("$bdtrtib[$i]",$IDBOT);
}
}
}
if($typetrtib == "جهتين" ){
$cunt=count($bdtrtib);
$co=$cunt/2;
sort($bdtrtib, SORT_NATURAL | SORT_FLAG_CASE);
for($i=0;$i<$co;$i++){
if($bdtrtib[$i]!=null){
wathqres("$bdtrtib[$i]",$IDBOT);
}}
rsort($bdtrtib, SORT_NATURAL | SORT_FLAG_CASE);
for($l=0;$l<$co;$l++){
if($bdtrtib[$i]!=null){
wathqres("$bdtrtib[$l]",$IDBOT);
}}
}
$wathq3=2;
}
if($wathq3==2){
$wathq3=null;
bot('EditMessageText',[
'chat_id'=>$gp,
'message_id'=>$message_id+1,
'text'=>"
✅ تم ترتيب القنوات.
نمط الترتيب: $typetrtib .
♻ جار انشاء لستة: $typee .
",'reply_to_message_id'=>$message->mrssage_id, 
]);
$text = "انشااء";
}
}
if($text=="الوقت" and $chat_id == $gp){
$time=time()+(3600 * 1 + 60);
$t=$time+60;
$todaydate = date('Y-m-d',$t);
$now_date=date('H-i',$t);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*🕞- Ti $now_date
📅- DY $todaydate*
",'parse_mode'=>"markdown",
'reply_to_message_id'=>$message->mrssage_id,
]);
}