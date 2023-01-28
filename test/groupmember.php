<?php
$fromjson = json_decode(file_get_contents("from_id.json"),true);

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

if($cuont_channel >= 150 or $cuont_channel == null or $cuont_channel == "0"){
$cuont_channel =150;
}
if($cuont_hroof ==null or $cuont_hroof == "0"){
$cuont_hroof =2000;
}
##
$ids=$databot["info"]["القنوات"]["array"];
$getban=$databot["info"]["القنوات"]["ban"];
$countyas=count($ids);
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text)  and ! preg_match('/^(حذف) (.*)/s',$text) and $chat_id != $gp){

$txtrep=str_replace("\n"," ",$text);
$txtrep=str_replace("  "," ",$txtrep);
$texts = explode(" ",$txtrep);}

for($h=0;$h<4; $h++){
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$texts[$h])){
$textch=trim($texts[$h]);
$ok = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$textch"))->ok; 
if($ok ==1){

$astgb="yes";
$chname=str_replace("$textch","",$text);
}
}
}

if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$textch)  and $astgb=="yes")
{
$astgb=null;
$chuser=trim($textch);

if($addyes != "no" ){
if($countyas < $cuont_channel ){

$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$chuser"))->result->id; 
if($chname==null){
$chname = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$ch_id"))->result->title;
}
$a = strlen($chname);
if($a <= $cuont_hroof or $cuont_hroof==null){
$admins = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$chuser"))->ok;

$ch_count = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatMembersCount?chat_id=$chuser"))->result;
$link = json_decode(file_get_contents("http://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$ch_id"))->result;
########
if(!in_array($ch_id,$ids) and $ch_count > $count_memberyes and $admins == 1 and !in_array($ch_id,$getban)){
mkdir("adminsch/$from_id");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id)

♻️┊تم اضافة قناتك بنجاح.

  $chname
• ┉ • ┉ • ┉ • 
*$ch_count | $chuser
*`$ch_id`*
$link*
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"✬ [$name](tg://user?id=$from_id)

♻️︙قام بإضافة قناة جديدة.

  $chname.
• ┉ • ┉ • ┉ • 
*$ch_count | $chuser
*`$ch_id`*
$link*
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
]);
$chuser=str_replace('@','',$chuser);
$databot["info"]["القنوات"]["array"][]="$ch_id";
$databot["info"]["القنوات"]["info"][$ch_id]["name"]="$chname";
$databot["info"]["القنوات"]["info"][$ch_id]["user"]="$chuser";
$databot["info"]["القنوات"]["info"][$ch_id]["link"]="$link";
$databot["info"]["القنوات"]["info"][$ch_id]["count_mem"]="$ch_count";
$databot["info"]["القنوات"]["info"][$ch_id]["admin"]="$from_id";

file_put_contents("../../data/$IDBOT.json", json_encode($databot));

$fromjson = json_decode(file_get_contents("from_id.json"),true);

$arraymem=$fromjson["info"][$from_id]["channel"];
if(!in_array($ch_id,$arraymem)){
$fromjson["info"][$from_id]["channel"][]="$ch_id";
}
$fromjson["info"][$from_id]["members"][$ch_id]="$ch_count";
file_put_contents("from_id.json", json_encode($fromjson));
}
if(!in_array($ch_id,$ids) and $ch_count < $count_memberyes and !in_array($ch_id,$getban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
[$name](tg://user?id=$from_id)
⚠️| المَعذِرة عَدد مُشتركي قناتك أقلّ من: $count_memberyes. 
---
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
if(in_array($ch_id,$ids)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id)

♻️┊قناتك مضافة وتم التحديث.

  $chname
• ┉ • ┉ • ┉ • 
*$ch_count | $chuser
*`$ch_id`*
$link*
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"✬ [$name](tg://user?id=$from_id)

♻️︙قام بتحديث قناته في اللستة.

  $chname
• ┉ • ┉ • ┉ •
*$ch_count | $chuser
*`$ch_id`*
$link*
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
]);
$chuser=str_replace('@','',$chuser);
$databot["info"]["القنوات"]["info"][$ch_id]["name"]="$chname";
$databot["info"]["القنوات"]["info"][$ch_id]["user"]="$chuser";
$databot["info"]["القنوات"]["info"][$ch_id]["link"]="$link";
$databot["info"]["القنوات"]["info"][$ch_id]["count_mem"]="$ch_count";
$databot["info"]["القنوات"]["info"][$ch_id]["admin"]="$from_id";

file_put_contents("../../data/$IDBOT.json", json_encode($databot));

}
if(!in_array($ch_id,$ids) and $ch_count > $count_memberyes and $admins != 1 and !in_array($ch_id,$getban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id) 
⚠️ قنَاتُكَ لَمـ تُضَافـ !
 أضِفـ البُوتـ.@$userbot.إدَارِي بِقنَاتُك ثُمَّ
 ↩️ أعِد ارَسِالُ مٌْعرَفَـ قَناتُك الُى ُهـنَا.
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
if(!in_array($ch_id,$ids) and $ch_count > $count_memberyes and $admins == 1 and in_array($ch_id,$getban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
[$name](tg://user?id=$from_id)
⚠️| المعذرة لم يتم إضافة قناتك.
راسل الادارة لازالة الحظر .
---
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}
else
{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
[$name](tg://user?id=$from_id)
⚠️| المَعذِرة اسم القناة كبير جدا.
--
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"- [$name](tg://user?id=$from_id)

⚠️| تم اكتمال عدد القنوات المشتركة باللستة  .
يرجى التحدث الى مالك البوت ليقوم باضافة قناتك.
--
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}
else
{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
[$name](tg://user?id=$from_id)
⚠️| المَعذِرة استقبال القنوات مغلق.
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}
#القنوات الخاصة
$astgbkhsh=null;
if($message->forward_from_chat and $chat_id != $gp){
$astgbkhsh="yes";
}

if($astgbkhsh=="yes" ){
$astgbkhsh=null;
if( $as_ch_khash != "معطلة ❌"){
if($countyas < $cuont_channel ){
$ch_id = $message->forward_from_chat->id; 
$chname = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$ch_id"))->result->title;
$a = strlen($chname);
if($a <= $cuont_hroof or $cuont_hroof==null){
$admins = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$ch_id"))->ok;

$ch_count = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatMembersCount?chat_id=$ch_id"))->result;
$link = json_decode(file_get_contents("http://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$ch_id"))->result;
//============
if( $admins == 1){
$res=resmbre($ch_count);
if($link!=null ){

if(!in_array($ch_id,$ids) and $ch_count > $count_memberyes and $admins == 1 and !in_array($ch_id,$getban)){
mkdir("adminsch/$from_id");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id)

♻️┊تم إضافة قناتك الخاصة.

  $chname
• ┉ • ┉ • ┉ • 
*$ch_count | $link
*`$ch_id`**
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"✬ [$name](tg://user?id=$from_id)

♻️︙قام بإضافة قناته الخاصة.

  $chname
• ┉ • ┉ • ┉ • 
*$ch_count | $link
*`$ch_id`**
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
]);

$databot["info"]["القنوات"]["array"][]="$ch_id";
$databot["info"]["القنوات"]["info"][$ch_id]["name"]="$chname";
$databot["info"]["القنوات"]["info"][$ch_id]["user"]="no";
$databot["info"]["القنوات"]["info"][$ch_id]["link"]="$link";
$databot["info"]["القنوات"]["info"][$ch_id]["count_mem"]="$ch_count";
$databot["info"]["القنوات"]["info"][$ch_id]["admin"]="$from_id";

file_put_contents("../../data/$IDBOT.json", json_encode($databot));

$fromjson = json_decode(file_get_contents("from_id.json"),true);
$arraymem=$fromjson["info"][$from_id]["channel"];
if(!in_array($ch_id,$arraymem)){
$fromjson["info"][$from_id]["channel"][]="$ch_id";
}
$fromjson["info"][$from_id]["members"][$ch_id]="$ch_count";
file_put_contents("from_id.json", json_encode($fromjson));
}
if(in_array($ch_id,$ids)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id)

♻️┊قناتك مضافة وتم التحديث.

  $chname
• ┉ • ┉ • ┉ • 
*$ch_count | $link
*`$ch_id`**
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"✬[$name](tg://user?id=$from_id)

♻️︙قناته مضافة وتم تحديثها.

  $chname
• ┉ • ┉ • ┉ • 
*$ch_count | $link
*`$ch_id`**
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
]);
$databot["info"]["القنوات"]["info"][$ch_id]["name"]="$chname";
$databot["info"]["القنوات"]["info"][$ch_id]["user"]="no";
$databot["info"]["القنوات"]["info"][$ch_id]["link"]="$link";
$databot["info"]["القنوات"]["info"][$ch_id]["count_mem"]="$ch_count";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
-『 [$name](tg://user?id=$from_id) 』
⚠️| المَعذِرة البوت ليس لدية صلاحية جلب الرابط
---
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}
if(!in_array($ch_id,$ids) and $ch_count < $count_memberyes and !in_array($ch_id,$getban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id)
⚠️| المَعذِرة عَدد مُشتركي قناتك أقلّ من: $count_memberyes.
--
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}

if(!in_array($ch_id,$ids) and $admins != 1 and !in_array($ch_id,$getban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id)
⚠️ قنَاتُكَ لَمـ تُضَافـ !
 أضِفـ البُوتـ.@$userbot.إدَارِي بِقنَاتُك ثُمَّ
 ↩️ أعِد توَجْيَةِ مٌْنشور قَناتُك الُى ُهـنَا.
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
if(!in_array($ch_id,$ids) and $ch_count > $count_memberyes and $admins == 1 and in_array($ch_id,$getban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id)
⚠️| المعذرة لم يتم إضافة القناة في اللستة.
- راسل الادارة للتوضيح.
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
]);
}
}
else
{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✬ [$name](tg://user?id=$from_id)
ℹ اسم القناة كبير جدا قم بختصاره. 
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
-『 [$name](tg://user?id=$from_id) 』
⚠️| تم اكتمال عدد القنوات في اللستة.
تواصل مع ادارة البوت ليقوم باضافة قناتك.
---
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}
else
{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔏| استقبال القنوات الخاصة مغلق.
- راسل ادارة البوت للمزيد. 
--
",'reply_to_message_id'=>$message->message_id,
]);
}
}
///////// انا ////////////////
if($text == "زيادة" or $text == "زياده" or $text == "/زيادة" or $text == "/زياده" or $text =="#زيادة"

or $text =="انا" or $text =="أنا" or $text =="/انا" or $text =="#انا" and $chat_id == $gs ){

if($order!="مفعلة ✅" and $chat_id == $gs ){
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"⚠️| اوامر الاعضاء غير متاحة.
",'reply_to_message_id'=>$message->message_id,
]);
}
}

$resjson = json_decode(file_get_contents("res.json"),true);

if($text == "زيادة" or $text == "زياده" or $text == "/زيادة" or $text == "/زياده" or $text =="#زيادة" and $chat_id == $gs ){
if($order!="معطلة ❌" and $chat_id == $gs ){
$idc=$fromjson["info"][$from_id]["channel"];
$bamem = count($idc);
if(isset($fromjson["info"][$from_id]["channel"]) and $bamem > 0){
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"
- جار اصدار تقرير الزيادة ....
",'reply_to_message_id'=>$message->message_id,
]);
$chadmin=$fromjson["info"][$from_id]["channel"];
$idc=$fromjson["info"][$from_id]["channel"];
$bamem = count($idc);
for($i=0;$i<count($idc);$i++){
$ch_id = $idc[$i];
if($ch_id !=""){
$channel = trim($ch_id);
$resjson = json_decode(file_get_contents("data/res.json"),true);
$userch=$databot["info"]["القنوات"]["info"][$channel]["user"];
$ch="@$userch";
if($userch == null or $userch == "no"){
$ch="$channel";
}

$memberas=$databot["info"]["القنوات"]["info"][$channel]["count_mem"];
$memad=$resjson["info"][$channel]["admin"];
$memnew=get_member($token,$channel,'admin','put');
#متجدد
if($memad == $memnew){
$tadl = $memad - $memnew;
$ktadl = "⚠ $tadl ┊ $memnew $ch";
}
if($memad < $memnew){
$tadl = $memnew - $memad;
$ktadl = "♻ $tadl ┊ $memnew $ch";
}
if($memad > $memnew){
$tadl = $memnew - $memad;
$ktadl = "💔 $tadl ┊ $memnew $ch";
}
$txt="$txt\n$ktadl";
$ziiadh=$ziiadh+$tadl;
# من وقت الاشتراك
if($memberas == $memnew){
$tadll = $memberas - $memnew;
$ktadlll = "🚫 $tadll ┊ $memnew $ch";
}
if($memnew > $memberas){
$tadll = $memnew - $memberas;
$ktadlll = "🔥 $tadll ┊ $memnew $ch";
}
if($memnew < $memberas){
$tadll = $memberas - $memnew;
$ktadlll = "📉 $tadll ┊ $memnew $ch";
}
$txtall="$txtall\n$ktadlll";
$ziiadhall= $ziiadhall+$tadll;
$countmall= $countmall+$memnew;
}}
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✴| تقرير الزيادة اليومية لـ $bamem قناة ..\n$txt
ـ------------------------------------
➕| زيادة في جميع القنوات: $ziiadh عضوا.
👥| عدد اعضاء جميع القنوات: $countmall عضوا.

",'parse_mode'=>'MarkDown',
'disable_web_page_preview'=>true,
]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✳| تقرير الزيادة من بداية الاشتراك لـ $bamem قناة ..\n$txtall
ـ-------------------------------------
➕ زيادة في جميع القنوات: $ziiadhall عضوا.
👥 عدد اعضاء جميع القنوات: $countmall عضوا.
",'parse_mode'=>'MarkDown',
'disable_web_page_preview'=>true,
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"
⚠️| المَعذِرة ليس لديك قنوات في اللستة ...
",'reply_to_message_id'=>$message->message_id,
]);
}
}
}

if($text =="انا" or $text =="أنا" or $text =="/انا" or $text =="#انا" and $chat_id == $gs ){
if($order!="معطلة ❌" and $chat_id == $gs ){
$idc=$fromjson["info"][$from_id]["channel"];
$bamem = count($idc);
if(isset($fromjson["info"][$from_id]["channel"]) and $bamem > 0){

bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"
جار استخراج قنواتك ...
",'reply_to_message_id'=>$message->message_id,
]);
$chadmin=$fromjson["info"][$from_id]["channel"];
$idc=$fromjson["info"][$from_id]["channel"];
$bamem = count($idc);
for($i=0;$i<count($idc);$i++){
$ch_id = $idc[$i];
if($ch_id !=""){
$ch_id = trim($ch_id);
$json1 = $databot["info"]["القنوات"]["info"][$ch_id]["user"];
$user1 = "t.me/$json1";
$name1 = $databot["info"]["القنوات"]["info"][$ch_id]["name"];
 $name1=str_replace("'","",$name1);
$name1=str_replace('"','',$name1);
$name1=str_replace('_','',$name1);

if($json1=="no" or $json1==null){
$user1 = $databot["info"]["القنوات"]["info"][$ch_id]["link"];
}
$ids = $databot["info"]["القنوات"]["array"];
///////// ✅ مشتركة
if(in_array($ch_id, $ids) and !in_array($ch_id, $getban) ){
$biinu="$biinu\n📢┊ [$name1]($user1)";
}
/////////// 🚫 محظورة 
if(in_array($ch_id, $ids) and in_array($ch_id, $getban)){
$biinu="$biinu\n🚫┊ [$name1]($user1)";
}
}
}
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"*
📑 | قائمة قنواتك المشتركة هي : $bamem قناة..\n*$biinu**
ـ─────────
📢┊مشتركة بنتظام.
🚫┊مشتركة تم حظرها.
",'parse_mode' =>"MarkDown",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id,
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"
⚠️| المعذرة لايوجد لديك قنوات في اللستة ...
",'reply_to_message_id'=>$message->message_id,
]);
}
}
}
if(preg_match('/^(حذف) (.*)/s',$text) and $chat_id == $gs){
$textt = str_replace("حذف ","",$text);
$textt = str_replace("\n"," ",$textt);
$textt = str_replace("  "," ",$textt);
$textt = str_replace(" ","=",$textt);
$texttt = explode("=",$textt);

$text1=$texttt;
for($h=0;$h<5;$h++){
if($text1[$h]!= ""){

if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text1[$h]) ){
$id =$text1[$h];
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id"))->result->id;
$id=$ch_id;
$ok = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id"))->ok; 
if($ok ==1){
$ch_id=$id;
}else{
$ch_id=null;
}
}else{
$id =$text1[$h];
$ch_id=$id;
}

if($ch_id!=null){
$adminch=$databot["info"]["القنوات"]["info"][$id]["admin"];
$idc=$fromjson["info"][$from_id]["channel"];
if(in_array($id, $ids) and  $adminch==$from_id and in_array($id, $idc)){

$index = array_search($id, $ids);
if($id == $databot["info"]["القنوات"]["array"][$index] and $id != null and $index != null){
unset($databot["info"]["القنوات"]["info"][$id]);
unset($databot["info"]["القنوات"]["array"][$index]);
$databot["info"]["القنوات"]["array"]=array_values($databot["info"]["القنوات"]["array"]);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));

$index2 = array_search($id, $idc);
unset($fromjson["info"][$from_id]["members"][$id]);
unset($fromjson["info"][$from_id]["channel"][$index2]);
$fromjson["info"][$from_id]["channel"]=array_values($fromjson["info"][$from_id]["channel"]);

file_put_contents("from_id.json", json_encode($fromjson));
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"
- [$name](tg://user?id=$from_id)

**`$id`**

✅| تم حذف قناتك بنجاح .
",'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}
if(in_array($id, $ids) and  $from_id!=$adminch){
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"
- [$name](tg://user?id=$from_id)

**`$id`**

♺| المَعذِرة هذه القناة ليست لك.
شخص اخر قام باضافتها. 
",'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);
}
if(!in_array($id, $ids)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"
- [$name](tg://user?id=$from_id)

**`$id`**

⚠️| المَعذِرة هذة القناة ليست مشتركة.  
",'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}
}
}
}