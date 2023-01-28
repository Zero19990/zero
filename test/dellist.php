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
if($text=="حذف" and $chat_id ==$gp){
if($stlist=="post" and $exit=="null"){
$postlist["info"]["post"]="no";
$postlist["info"]["st"]="del";
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"جار حذف اللستة من القنوات...
نمط اللستة: $infolist
",
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
'text'=>"⚠️ لايوجد لستة منشورة سابقا.
نوع اللستة: $infolist. 
",'reply_to_message_id'=>$message->mrssage_id, 
'parse_mode'=>html,
'disable_web_page_preview'=>true,
]);
}
} 

#### dellist ####
if($data=="dellist" and $chat_id ==$gp){
if($stlist=="post" and $exit=="null"){
$postlist["info"]["post"]="no";
$postlist["info"]["st"]="del";
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"جار حذف اللستة من القنوات...
نمط اللستة: $infolist
",
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
'text'=>"⚠️ لايوجد لستة منشورة سابقا.
نوع اللستة: $infolist. 
",'reply_to_message_id'=>$message->mrssage_id, 
'parse_mode'=>html,
'disable_web_page_preview'=>true,
]);
}
} 

@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
$stlist=$postlist["info"]["st"];
$for=$postlist["info"]["for"];
$cofor=$postlist["info"]["cofor"];
$exit=$postlist["info"]["exit"];
$countup=$countch-$cofor;

if($stlist=="del" and $for=="yes" and $exit=="no"){
if($countup <= 50){
for($i=$cofor;$i<count($ch_all);$i++){
$channel=$ch_all[$i];
$msg=$datalist["info"]["infoyes"][$channel]["message_id"];
dellist($token,$channel,$msg);
}
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="yes";
$postlist["info"]["stgrir"]="yes";
}else{
$ci=$cofor+50;
for($l=$cofor;$l<count($ch_all);$l++){
$channel=$ch_all[$l];
$msg=$datalist["info"]["infoyes"][$channel]["message_id"];
dellist($token,$channel,$msg);
if($l==$ci){
break;
}
}
if($l<$countch){
$postlist["info"]["for"]="yes";
$postlist["info"]["cofor"]="$l";
$postlist["info"]["exit"]="no";
$postlist["info"]["stgrir"]="no";
}else{
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="yes";
$postlist["info"]["stgrir"]="yes";
}
}
file_put_contents("data/postlist.json", json_encode($postlist));
} 

@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
$stlist=$postlist["info"]["st"];
$for=$postlist["info"]["for"];
$cofor=$postlist["info"]["cofor"];
$exit=$postlist["info"]["exit"];

@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
if($stlist=="del" and $for=="no" and $exit=="yes"){
$postlist["info"]["post"]="no";
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="null";
$arrayyesdel=$datalist["info"]["yesdel"];
$countyesdel=count($arrayyesdel);
$arraynodel=$datalist["info"]["nodel"];

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);

if(isset($datalist["info"]["nodel"])){
foreach($arraynodel as $channel){
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
✅ تم حذف اللستة من القنوات بنجاح.
تم التنفيذ في : $countyesdel قناة ..
⚠️ قنوات مخالفة:\n$txt
",
]);
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>"❎ تم بفضل اللَّه حذف اللسْتَة من القنَـوات.👆
",
]);
$postlist["info"]["stgrirsy"]="yes";
file_put_contents("data/postlist.json", json_encode($postlist));
}
@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
$stgrir=$postlist["info"]["stgrir"];
@$datalist = json_decode(file_get_contents("data/datalist.json"),true);
$resjson = json_decode(file_get_contents("res.json"),true);

if($exit=="yes"){
$postlist["info"]["post"]="no";
$postlist["info"]["for"]="no";
$postlist["info"]["exit"]="null";
$arrayyesdel=$datalist["info"]["yesdel"];
$countyesdel=count($arrayyesdel);
$arraynodel=$datalist["info"]["nodel"];
$msg=$databot["info"]["القنوات"]["array"];;
$countids = count($msg);
if(isset($databot["info"]["القنوات"]["array"]) and $countids > 0){
 
$chadmin=$fromjson["info"][$from_id]["channel"];
$ids=$databot["info"]["القنوات"]["array"];
$countids = count($ids);
for($i=0;$i<count($ids);$i++){
$ch_id = $ids[$i];
if($ch_id !=""){
$channel = trim($ch_id);
$resjson = json_decode(file_get_contents("data/res.json"),true);
$userch=$databot["info"]["القنوات"]["info"][$channel]["user"];
$ch="@$userch";
if($userch == null or $userch == "no"){
$ch="$channel";
}

$memberas=$databot["info"]["القنوات"]["info"][$channel]["count_mem"];
$memad=$resjson["info"][$channel]["sudo"];
$memnew=get_member($token,$channel,'sudo','put');
#متجدد
if($memad == $memnew){
$tadl = $memad - $memnew;
$ktadl = "⚠ $tadl  ┊ $memnew $ch";
}
if($memad < $memnew){
$tadl = $memnew - $memad;
$ktadl = "♻ $tadl  ┊ $memnew $ch";
}
if($memad > $memnew){
$tadl = $memnew - $memad;
$ktadl = "💔 $tadl ┊ $memnew $ch";
}
$txtq="$txtq\n$ktadl";
$ziiadh=$ziiadh+$tadl;
# من وقت الاشتراك
if($memberas == $memnew){
$tadll = $memberas - $memnew;
$ktadlll = "🚫 $tadll  ┊ $memnew $ch";
}
if($memnew > $memberas){
$tadll = $memnew - $memberas;
$ktadlll = "🔥 $tadll ┊ $memnew $ch";
}
if($memnew < $memberas){
$tadll = $memberas - $memnew;
$ktadlll = "📉  $tadll ┊ $memnew $ch";
}
$txtall="$txtall\n$ktadlll";
$ziiadhall=$ziiadhall+$tadll;
$countmall=$countmall+$memnew;
}
}
if($ash3atat=="مفعلة ✅"){
$result = "معطلة ❌";
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>"⏳ جار اصدار تقرير الزيادة ....
",
]);
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>"📊 تقرير الزيادة المتجدد لـ {$countids} قناة..\n$txtq
ـ──────────
⚠ قنوات لم يزد الاعضاء .
♻ قنوات زاد عدد الاعضاء .
💔 قنوات نقص عدد الاعضاء .
➕ قنوات زاد عدد الاعضاء: {$ziiadh} عضوا.
👥 عدد الاعضاء في القنوات: {$countmall} عضوا.
",
]);
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>"📊 تقرير الزيادة من بداية الاشتراك لـ {$countids} قناة..\n$txtall
ـ────────────
➕ زيادة في جميع القنوات: {$ziiadhall} عضوا.
👥 عدد اعضاء جميع القنوات: {$countmall} عضوا.
",
]);
}
}
}
 
@$postlist = json_decode(file_get_contents("data/postlist.json"),true);
$stgrirsy=$postlist["info"]["stgrirsy"];

@$datalist = json_decode(file_get_contents("data/datalist.json"),true);

if($stgrirsy=="yes"){
if($sy_delete=="مفعلة ✅" or $sy_mragbh=="مفعلة ✅" or
$sy_uplode=="مفعلة ✅"){
$txt=null;
$txtm=null;
$z=0;
$postlist["info"]["stgrirsy"]="no";
file_put_contents("data/postlist.json", json_encode($postlist));

$arrayyesdel=$datalist["info"]["yesdel"];
$countyesdel=count($arrayyesdel);

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);

foreach($arrayyesdel as $channel){
if($channel!=null){
$r++;
$userch=$databot["info"]["القنوات"]["info"][$channel]["user"];
$ch="@$userch";
if($userch == null or $userch == "no"){
$ch="$channel";
}
$count_del=$datalist["info"]["infoyes"][$channel]["count_del"];
$count_mkdel=$datalist["info"]["infoyes"][$channel]["count_mkdel"];
$count_up=$datalist["info"]["infoyes"][$channel]["count_up"];
$count_mkup=$datalist["info"]["infoyes"][$channel]["count_mkup"];
$co_mkmrag=$datalist["info"]["infoyes"][$channel]["count_mkmragbh"];
if($co_mkmrag >= 1){
$z=1;
$infooo="⚠ $co_mkmrag ⁞ $ch";
$txtm="$txtm\n$infooo";
}
$info="$r ⁞ $ch\n✅┊📊 $count_del 📄 $count_up  ⁞  🚫┊🗑 $count_mkdel 📄 $count_mkup";
$txt="$txt\n$info";
}
}
if($sy_delete!="مفعلة ✅" and 
$sy_uplode=="مفعلة ✅" and 
$sy_mragbh!="مفعلة ✅"){
$e="نظام الرفع التلقائي";
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"⏳ جاري اصدار تقرير النظام ....",
]);
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"⚠ تقرير $e لـ {$countyesdel} قناة ..\n$txt
ـ• ┉ • ┉ • ┉ • ┉ •
✅ تم الحذف والنشر بنجاح
🚫 مخالفة الحذف - اانشر 
📊 عدد مرات النشر
🗑 عدد مرات الحذف 
",
'reply_to_message_id'=>$message->message_id,
]);
}
##
if($sy_delete!="مفعلة ✅" 
and $sy_uplode!="مفعلة ✅" 
and $sy_mragbh=="مفعلة ✅" ){
if($z==0){
$txtm=" ✅ لاتوجد قنوات مخالفة";
}
$e="نظام المراقبة";
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"⚠ تقرير $e لـ ( $countyesdel ) قناة ..
قنوات قامت بحذف اللستة..\n$txtm
",
]);
}
}
}