<?php

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];
@$newpost = json_decode(file_get_contents("data/newpost.json"),true);
$amrpost=$newpost["info"]["amr"];
function back($chat_id){
@$newpost = json_decode(file_get_contents("data/newpost.json"),true);
$k=$newpost["info"]["انشاء"]["key"];
$keyboard=$newpost["info"]["انشاء"]["inline_keyboard"];
if($k=="yes"){
$reply_markup=json_encode($keyboard);
}
if($reply_markup==null or $keyboard==null){
$reply_markup=null;
}

$web=$newpost["info"]["انشاء"]["web"];
if($web=="❌"){
$webb="true";
}else{
$webb="false";
}
$send=$newpost["info"]["انشاء"]["send"];
$mode=$newpost["info"]["انشاء"]["mode"];
$text=$newpost["info"]["انشاء"]["text"];
if($send=="text"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$text",
'parse_mode'=>"$mode",
'disable_web_page_preview'=>$web,
'reply_markup'=>$reply_markup
]);
}else{
$media=$newpost["info"]["انشاء"]["media"];
$file_id=$newpost["info"]["انشاء"]["file_id"];

bot($send,[
"chat_id"=>$chat_id,
"$media"=>"$file_id",
'caption'=>"$text",
'disable_web_page_preview'=>$web,
'reply_markup'=>$reply_markup
]);
}
}

function sivepost($chat_id,$IDBOT,$message_id){

@$posts = json_decode(file_get_contents("../../post/$IDBOT.json"),true);
$countpost=$posts["info"]["co"]+1;


@$newpost = json_decode(file_get_contents("data/newpost.json"),true);
$k=$newpost["info"]["انشاء"]["key"];
$keyboard=$newpost["info"]["انشاء"]["inline_keyboard"];
if($k=="yes"){
$reply_markup=json_encode($keyboard);
if($reply_markup!=null and $keyboard!=null){
$reply_markup=null;
$posts["info"]["posts"]["$countpost"]["key"]="yes";
$posts["info"]["posts"]["$countpost"]["inline_keyboard"]=$keyboard;
}
}
$web=$newpost["info"]["انشاء"]["web"];
if($web=="❌"){
$webb="true";
}else{
$webb="false";
}
$send=$newpost["info"]["انشاء"]["send"];
$mode=$newpost["info"]["انشاء"]["mode"];
$text=$newpost["info"]["انشاء"]["text"];
$media=$newpost["info"]["انشاء"]["media"];
$file_id=$newpost["info"]["انشاء"]["file_id"];

$posts["info"]["posts"]["$countpost"]["send"]="$send";
$posts["info"]["posts"]["$countpost"]["text"]="$text";
$posts["info"]["posts"]["$countpost"]["mode"]="$mode";
$posts["info"]["posts"]["$countpost"]["web"]="$webb";

if($send!="text"){
$posts["info"]["posts"]["$countpost"]["media"]="$media";
$posts["info"]["posts"]["$countpost"]["file_id"]="$file_id";
}
$posts["info"]["co"]="$countpost";
file_put_contents("../../post/$IDBOT.json", json_encode($posts));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"✅| تم حفظ المنشور بنجاح 
كود المنشور : $countpost
",'message_id'=>$message_id,
'reply_to_message_id'=>$message_id, 
]);
}

if($data=="siveostnew" and $chat_id==$gp){
sivepost($chat_id,$IDBOT,$message_id);
}

if($text=="صنع منشور" or $text=="انشاء منشور" and $chat_id==$gp){
$newpost["info"]["amr"]="newpost";
unset($newpost["info"]["انشاء"]);
file_put_contents("data/newpost.json", json_encode($newpost));
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"مرحبا بك في قسم انشاء منشورات الدعم الفردي .
🔗: ارسل لي صورة او نص او فيديو او الخ ...
",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'❎ الغاء الامر ','callback_data'=>"exitpost"]],
] 
])
]);
}
## A𝐥𝐢 𝐤𝐢𝐧𝐝𝐢 ###
if($data=="صنع منشور" or $data=="انشاء منشور" and $chat_id==$gp){
$newpost["info"]["amr"]="newpost";
unset($newpost["info"]["انشاء"]);
file_put_contents("data/newpost.json", json_encode($newpost));
bot('editmessagetext',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"مرحبا بك في قسم انشاء منشورات الدعم الفردي .
🔗: ارسل لي صورة او نص او فيديو او الخ ...
",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'❎ الغاء الامر ','callback_data'=>"exitpost"]],
] 
])
]);
}
////////////////
$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;
$caption = $update->message->caption;
if($photo){
$sens="sendphoto";
$file_id = $update->message->photo[1]->file_id;
}
if($document){
$sens="senddocument";
$file_id = $update->message->document->file_id;
}
if($video){
$sens="sendvideo";
$file_id = $update->message->video->file_id;
}
if($audio){
$sens="sendaudio";
$file_id = $update->message->audio->file_id;
}
if($voice){
$sens="sendvoice";
$file_id = $update->message->voice->file_id;
}

if($sticker){
$sens="sendsticker";
$file_id = $update->message->sticker->file_id;
}

//===۞𝗞𝗜𝗡𝗗𝗜۞===//
if($message and $chat_id==$gp and $amrpost=="newpost"){
$newpost["info"]["amr"]="null";

if($text){
$newpost["info"]["انشاء"]["send"]="text";
$newpost["info"]["انشاء"]["text"]="$text";
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$text
",'parse_mode'=>"html",
'disable_web_page_preview'=>true,
]);

}else{
$ss=str_replace("send","",$sens);
$newpost["info"]["انشاء"]["send"]="$sens";
$newpost["info"]["انشاء"]["media"]="$ss";
$newpost["info"]["انشاء"]["file_id"]="$file_id";
$newpost["info"]["انشاء"]["text"]="$text";
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$text",
]);
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم اضافة الاعلان الخاص بك.
- اضافة ازرار : لإضافة ازرار شفافة للمنشور .
- تعديل نص : لتعديل نص او وصف المنشور .
- معاينة الرابط : لعرض الرابط في المنشور او الغاء عرضه .
- نوع المنشور : اختيار نوع MarkDown او  html  .
- حفظ : لحفظ تصميم المنشور .
- الغاء : لالغاء الصنع .
",'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- تعديل نص ' ,'callback_data'=>"t3dil"],['text'=>'- اضافة ازرار ' ,'callback_data'=>"addazrar"]],
[['text'=>'- معاينة الرابط| ❌ ' ,'callback_data'=>"webpost"],['text'=>'- نوع المنشور | html ' ,'callback_data'=>"modepost"]],
[['text'=>'- حفظ الانشاء ✅','callback_data'=>"siveostnew"],['text'=>'- الغاء الامر ❎ ','callback_data'=>"exitpost"]],
]])
]);
$newpost["info"]["انشاء"]["web"]="❌";
$newpost["info"]["انشاء"]["mode"]="html";
file_put_contents("data/newpost.json", json_encode($newpost));
}
function homepost($chat_id,$message_id){
@$newpost = json_decode(file_get_contents("data/newpost.json"),true);
$k=$newpost["info"]["انشاء"]["key"];
$keyboard=$newpost["info"]["انشاء"]["inline_keyboard"];
if($k=="yes"){
$reply_markup=json_encode($keyboard);
}
if($reply_markup==null or $keyboard==null){
$reply_markup=null;
}
$web=$newpost["info"]["انشاء"]["web"];
$mode=$newpost["info"]["انشاء"]["mode"];
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
- اضافة ازرار : لإضافة ازرار شفافة للمنشور .
- تعديل نص :لتعديل نص او وصف المنشور .
- معاينة الرابط : لعرض الرابط في المنشور او الغاء عرضه .
- نوع المنشور : اختيار نوع MarkDown او html  .
- حفظ : لحفظ تصميم المنشور .
- الغاء : لالغاء الصنع .
",'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- تعديل نص ','callback_data'=>"t3dil"],['text'=>'- اضافة ازرار ','callback_data'=>"addazrar"]],
[['text'=>"- معاينة الرابط| $web ",'callback_data'=>"webpost"],['text'=>"- نوع المنشور | $mode ",'callback_data'=>"modepost"]],
[['text'=>'- حفظ الانشاء ✅ ','callback_data'=>"siveostnew"],['text'=>'- الغاء الامر ❎' ,'callback_data'=>"exitpost"]],
]])
]);
}
#===۞𝗞𝗜𝗡𝗗𝗜۞===#
if($data=="t3dil" and $chat_id==$gp){
$newpost["info"]["amr"]="textpost";
file_put_contents("data/newpost.json", json_encode($newpost));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"- قم بإرسال نص او وصف المنشور 
",'message_id'=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- عودة للخلف 🔂','callback_data'=>"back"]],
] 
])
]);
}
if($data=="back" and $chat_id==$gp){
$newpost["info"]["amr"]="null";
file_put_contents("data/newpost.json", json_encode($newpost));
$web=$newpost["info"]["انشاء"]["web"];
$mode=$newpost["info"]["انشاء"]["mode"];
bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
]);
back($chat_id);
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"
- اضافة ازرار : لإضافة ازرار شفافة للمنشور .
- تعديل نص : لتعديل نص او وصف المنشور .
- معاينة الرابط : لعرض الرابط في المنشور او الغاء عرضه .
- نوع المنشور : اختيار نوع MarkDown او  html  .
- حفظ : لحفظ تصميم المنشور .
- الغاء : لالغاء الصنع .
",'message_id'=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- تعديل نص ','callback_data'=>"t3dil"],['text'=>'- اضافة ازرار ' ,'callback_data'=>"addazrar"]],
[['text'=>"- معاينة الرابط| $web ",'callback_data'=>"webpost"],['text'=>"- نوع المنشور | $mode ",'callback_data'=>"modepost"]],
[['text'=>'- حفظ الانشاء ✅ ' ,'callback_data'=>"siveostnew"],['text'=>'- الغاء الامر ❎' ,'callback_data'=>"exitpost"]],
]])
]);
}
if($data=="webpost" and $chat_id==$gp){
$web=$newpost["info"]["انشاء"]["web"];
if($web=="❌"){
$webb="✅";
}else{
$webb="❌";
}
$newpost["info"]["انشاء"]["web"]="$webb";
file_put_contents("data/newpost.json", json_encode($newpost));
homepost($chat_id,$message_id);
}
if($data=="modepost" and $chat_id==$gp){
$mode=$newpost["info"]["انشاء"]["mode"];
if($web=="MarkDown"){
$mode="html";
}else{
$mode="MarkDown";
}
$newpost["info"]["انشاء"]["mode"]="$mode";
file_put_contents("data/newpost.json", json_encode($newpost));
homepost($chat_id,$message_id);
}

if($data=="exitpost" and $chat_id==$gp){
unlink("data/newpost.json");
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"✅| تم الغاء الانشاء بنجاح. 
",'message_id'=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"🔘 انشاء جديد 🔘",'callback_data'=>"انشاء منشور"]],
] 
])
]);
}
function getpost($chat_id,$nu,$IDBOT){
@$posts = json_decode(file_get_contents("../../post/$IDBOT.json"),true);
$k=$posts["info"]["posts"][$nu]["key"];
$keyboard=$posts["info"]["posts"][$nu]["inline_keyboard"];
if($k=="yes"){
$reply_markup=json_encode($keyboard);
}
if($reply_markup==null or $keyboard==null){
$reply_markup=null;
}
$web=$posts["info"]["posts"][$nu]["web"];
$send=$posts["info"]["posts"][$nu]["send"];
$mode=$posts["info"]["posts"][$nu]["mode"];
$text=$posts["info"]["posts"][$nu]["text"];
if($send=="text"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$text
",'parse_mode'=>"$mode",
'disable_web_page_preview'=>$web,
'reply_markup'=>$reply_markup
]);
}else{
$media=$posts["info"]["posts"][$nu]["media"];
$file_id=$posts["info"]["posts"][$nu]["file_id"];
bot($send,[
"chat_id"=>$chat_id,
"$media"=>"$file_id",
'caption'=>"$text",
'disable_web_page_preview'=>$web,
'reply_markup'=>$reply_markup
]);
}
}
#===۞𝗞𝗜𝗡𝗗𝗜۞===#
if($text and $chat_id==$gp and $amrpost=="textpost"){
$newpost["info"]["textpost"]="$text";
file_put_contents("data/newpost.json", json_encode($newpost));
$web=$newpost["info"]["انشاء"]["web"];
$send=$newpost["info"]["انشاء"]["send"];
if($send=="text"){
$inf="✅| تم تغيير نص المنشور الى";
}else{
$media=$newpost["info"]["انشاء"]["media"];
$inf="✅| تم تغيير وصف منشور الـ $media الى";
}
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"$inf :\n$text

✅| اضغط حفظ التعديل او قم بإرسال نص اخر لاستبدالة 
",'parse_mode'=>"html",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'حفظ التعديل ✅ ','callback_data'=>"sivepost"]],
] 
])
]);
}
#===۞𝗞𝗜𝗡𝗗𝗜۞===#
if($data=="sivepost" and $chat_id==$gp){
$newpost["info"]["amr"]="null";
$newpost["info"]["انشاء"]["text"]
=
$newpost["info"]["textpost"];
file_put_contents("data/newpost.json", json_encode($newpost));
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"- تم الحفظ بنجاح ✅
",'message_id'=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- عودة للخلف 🔂','callback_data'=>"back"]],
] 
])
]);
}
#===۞𝗞𝗜𝗡𝗗𝗜۞===#
if($data=="addazrar" and $chat_id==$gp){
$newpost["info"]["amr"]="addazrars";
file_put_contents("data/newpost.json", json_encode($newpost));
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"
- قم بإرسال اسم الزر = رابط الزر مثال : 
TeamSyria = t.me/TeamSyria
او لإضافة مجموعة ازرار دفعه واحدة استخدم هذا النمط :

TeamSyria = t.me/TeamSyria + SAEEDFiles = t.me/SAEEDFiles
illusion = t.me/Oneillusion
",'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"ᗷ꯭꯭ᗩ꯭꯭ᑕ꯭꯭K 🔙",'callback_data'=>"back"]],
]
])
]);
}
#===۞𝙺𝙸𝙽𝙳𝙸۞===#
if($text and $chat_id==$gp and $amrpost=="addazrars"){
$text = str_replace("http://", "",$text);
$text = str_replace("https://", "", $text);
#$newpost["info"]["amr"]="null";
$newpost["info"]["textazrar"]="$text";
file_put_contents("data/newpost.json", json_encode($newpost));
$keyboard["inline_keyboard"]=[]; 
$ex = explode("\n", $text);
for($i=0;$i< 4;$i++){
if($ex[$i]!=""){
$k=[];
if(strpos($ex[$i],'+')!== false){
$h=explode("+", $ex[$i]);
for($l=0;$l<3;$l++){
if($h[$l]!=""){
$z2=explode("=", $h[$l]);
$n=$z2[0];
$link=trim($z2[1]);
$k[]=['text'=>"$n",'url'=>"$link"];
}
}
}else{
$z1=explode("=", $ex[$i]);
$n=$z1[0];
$link=trim($z1[1]);
$k[]=['text'=>"$n",'url'=>"$link"];
}
$keyboard["inline_keyboard"][] = $k;
}
}

$reply_markup=json_encode($keyboard);
if($reply_markup==null){
$reply_markup=null;
$xx="🚫 هناك خطاء بصناعة الازرار قم بإعادة الادخال ";
$keyboard["inline_keyboard"]=[]; 
$keyboard["inline_keyboard"][] = [['text'=>"اعادة الادخال ",'callback_data'=>"addzrars"]];
$reply_markup=json_encode($keyboard);
}else{
$keyboard["inline_keyboard"][] = [['text'=>"حفظ  ",'callback_data'=>"siveazraz"],['text'=>"اعادة الادخال  ",'callback_data'=>"addzrars"]];
$xx="✅ هذه هي الازرار المصنوعة قم بالضغط على حفظ لحفظها او قم بإعادة ادخالها مرة اخرى ";
$reply_markup=json_encode($keyboard);
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$xx
","message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);
} 

if($data=="siveazraz" and $chat_id==$gp){
$textt=$newpost["info"]["textazrar"];
$textt = str_replace("http://", "",$textt);
$textt = str_replace("https://", "", $textt);
$keyboard["inline_keyboard"]=[]; 
$ex = explode("\n", $textt);
for($i=0;$i< 4;$i++){
if($ex[$i]!=""){
$k=[];
if(strpos($ex[$i],'+')!== false){
$h=explode("+", $ex[$i]);
for($l=0;$l<3;$l++){
if($h[$l]!=""){
$z2=explode("=", $h[$l]);
$n=$z2[0];
$link=trim($z2[1]);
$k[]=['text'=>"$n",'url'=>"$link"];
}
}
}else{
$z1=explode("=", $ex[$i]);
$n=$z1[0];
$link=trim($z1[1]);
$k[]=['text'=>"$n",'url'=>"$link"];
}
$keyboard["inline_keyboard"][] = $k;
}
}

$reply_markup=json_encode($keyboard);
$newpost["info"]["انشاء"]["inline_keyboard"] = $keyboard;#str#$newpost["info"]["انشاء"]["inline_keyboard"] = $reply_markup;
$newpost["info"]["انشاء"]["key"] = "yes";
file_put_contents("data/newpost.json", json_encode($newpost));
bot('editmessagetext',[
'chat_id'=>$chat_id,
"text"=>"- تم الحفظ 
",'message_id'=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- عودة للخلف 🔂
','callback_data'=>"back"]],
] 
])
]);
}
#معاينة 
@$posts = json_decode(file_get_contents("../../post/$IDBOT.json"),true);

if(preg_match('/^(معاينة) (.*)/s',$text) and $chat_id == $gp){
$textt = str_replace("معاينة ","",$text);
$textt = str_replace(" ","",$textt);
$textt = str_replace("\n","",$textt);
$textt = str_replace("  ","",$textt);
$nupost= trim($textt);
if(isset($posts["info"]["posts"]["$nupost"]) and is_numeric($nupost)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
جار عرض الكود رقم $nupost بنجاح.. 
",'reply_to_message_id'=>$message->message_id,
]);
getpost($chat_id,$nupost,$IDBOT);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
🚫 المعذرة هذا الكود غير موجود
",'reply_to_message_id'=>$message->message_id,
]);
}
}

if($text== "المنشورات" and $chat_id == $gp){
$tst=null;
$postsall=$posts["info"]["posts"];
foreach($postsall as $post=>$pp ){
$tst="$tst\n منشور رقم : $post";
}
if(!$tst){
$tst = "لايوجد منشورات حاليا";
}elseif($tst){
$tst = "$tst";
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- المنشورات هي\n$tst
ـ--------------------
- لعرض المنشور والمعاينة قم بارسال الامر .
- معاينة + رقم الكود : مثال .
- معاينة 1.
",'parse_mode'=>"markdown",
]);
}
