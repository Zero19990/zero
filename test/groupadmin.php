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

################
if($data== "noo" and $chat_id == $gp){
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"- تم الغاء الامر بنجاح ✅
",'reply_to_message_id'=>$message->message_id,
]);
}
########
if( $text == "الحالة" and $chat_id == $gp or $text == "الحالة" and  in_array($from_id,$sudo)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| البوت يعمل بحالة جيدة.
",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"♻ تحديث البوت ♻",'callback_data'=>"ref"]],
]])]);}

if($data == "ref" or $text=="تحديث" and $chat_id == $gp){
bot('editmessagetext',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"
✅| تم تحديث البوت بنجاح.
",'reply_to_message_id'=>$message->message_id,
]);
$gp=null;
$chat_id=null;
return false;
}
##
if($text == "شفاف عمودين" || $text == "عمودين" || $text == "2" and $chat_id == $gp){
test($IDBOT,'تحكم','amodin','yes',"put");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم ضبط اللستة: $text.
ارسل الامر انشاء.
",'reply_to_message_id'=>$message->message_id,
]);
}
if($text == "شفاف عمود" || $text == "عمود" || $text == "1" and $chat_id == $gp){
test($IDBOT,'تحكم','amodin','no','put');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم ضبط اللستة: $text.
ارسل الامر انشاء.
",'reply_to_message_id'=>$message->message_id,
]);
}
##
if($text == "تفعيل الرفع" and $chat_id == $gp){
$result = "مفعلة ✅";
test($IDBOT,'تحكم','الرفع التلقائي',$result,'put');
test($IDBOT,'تحكم','المراقبة','❌ معطلة','put');
unlink("mragbh/amr.txt");
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
✅| تم تفعيل وضع الرفع التلقائي.
سيتم ايقاف وضع المراقبة.
",'reply_to_message_id'=>$message->mrssage_id,
]);}

if($text == "تعطيل الرفع" and $chat_id == $gp){
$result = "معطلة ❌";
test($IDBOT,'تحكم','الرفع التلقائي',$result,'put');
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
✅| تم تعطيل وضع الرفع التلقائي.
",'reply_to_message_id'=>$message->mrssage_id,
]);}

if($text == "تفعيل الحذف" and $chat_id == $gp){
$result = "مفعلة ✅";
test($IDBOT,'تحكم','الحذف',$result,'put');
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
✅| تم تفعيل وضع الحذف 
سيقوم البوت بمراقبة القنوات اولا وحذف اي منشور يتم نشره بعد اللستة.
",'reply_to_message_id'=>$message->mrssage_id,
]);
}

if($text == "تعطيل الحذف" and $chat_id == $gp){
$result = "معطلة ❌";
test($IDBOT,'تحكم','الحذف',$result,'put');
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
✅| تم تعطيل وضع الحذف.
",'reply_to_message_id'=>$message->mrssage_id,
]);
}

$amr=test($IDBOT,'admin','amr',"null",'get');
if($text == "ابدا" and  $chat_id == $gp ){
test($IDBOT,'تحكم','ابداء',"yes",'put');
$k_ast= test($IDBOT,'تحكم','كليشه ابداء',"null",'get');
if($k_ast== null){
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
تم بدء استقبال القنوات...
",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"✳️ تغيير الرسالة",'callback_data'=>"setstart"]],
]])
]);
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>"
🔓| تم بدء استقبال القنوات.

• ارسل معرف قناتك اذكانت عامة..
• للقنوات الخاصة قم بتوجيه منشور....
",'reply_to_message_id'=>$message->message_id,
]);
}else{
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>".
$k_ast
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"✏ تغيير الرسالة",'callback_data'=>"setstart"]],
]])]);
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>".
$k_ast
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
]);
}}

$amr=test($IDBOT,'admin','amr',"null",'get');
if($data == "setstart" or $text=="تنبيه ابدا" and $chat_id == $gp ){
test($IDBOT,'admin','amr',"setstart",'put');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✴️| ارسل كليشة البدء لاستقبال القنوات.
",'reply_to_message_id'=>$message->mrssage_id,
]);}

if($text and $amr == "setstart" and $chat_id == $gp){
test($IDBOT,'تحكم','كليشه ابداء',"$text","put");
test($IDBOT,'admin','amr',"non","put");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅| تم حفظ كليشة بدء الاستقبال بنجاح. 
- الكليشة:
$text 
",'reply_to_message_id'=>$message->mrssage_id,
]);}

///////////////
if($text == "توقف" and $chat_id == $gp){
test($IDBOT,'تحكم','ابداء',"no",'put');
$k_noast= test($IDBOT,'تحكم','كليشه توقف',"null",'get');
if($k_noast== null){
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
تم ايقاف استقبال القنوات...
",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"🔘 تغيير الرسالة.",'callback_data'=>"setstop"]],
]])]);
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>"
🔐| تم ايقاف تسجيل القنوات الان 
• يتم تحضير اللستة للنشر ...
",'reply_to_message_id'=>$message->mrssage_id,
]);
}else{
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>".
$k_noast
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"🔘 تغيير الرسالة.",'callback_data'=>"setstop"]],
]]
)
]);
bot('sendMessage',[
'chat_id'=>$gs,
'text'=>"
$k_noast
",'parse_mode'=>"markdown",
]);
}
}

if($data == "setstop" and $chat_id == $gp or $text=="تنبيه توقف" and $chat_id == $gp){
test($IDBOT,'admin','amr',"setstop",'put');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- ارسل كليشة توقف لاستقبال القنوات
",'reply_to_message_id'=>$message->mrssage_id,
]);}

if($text and $amr == "setstop" and $chat_id == $gp){
test($IDBOT,'admin','amr',"non",'put');
test($IDBOT,'تحكم','كليشه توقف',"$text",'put');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅| تم حفظ كليشة توقف الاستقبال بنجاح. 
- الكليشة:\n$text 
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->mrssage_id,
]);}

function wordCut1($text, $limit ,$chat_id, $zrar,$pres,$web,$rep){  
$str=mb_strlen($text,"utf-8");

if($str > $limit){  
$ex = explode("\n", $text);  
$mbcount=0;
$array=[];
for($i=0;$i<count($ex);$i++){  

$n= $ex[$i];
$str_n=mb_strlen($n,"utf-8");
$mbcount= $mbcount + $str_n;
$meb=$mbcount;
if($meb < $limit ){
$nn= $nn."\n".$n;

}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
$nn
",'parse_mode'=>"$pres",
'disable_web_page_preview'=>$web,
'reply_to_message_id'=>$rep,
"reply_markup"=>$zrar,
]);
$nn=null;
$mbcount=null;
}
}
if($nn!=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"..
$nn
",'parse_mode'=>"$pres",
'disable_web_page_preview'=>$web,
'reply_to_message_id'=>$rep,
"reply_markup"=>$zrar,
]);
}
}else{  
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$text
",'parse_mode'=>"$pres",
'disable_web_page_preview'=>$web,
'reply_to_message_id'=>$rep,
"reply_markup"=>$zrar,
]);
}  
#return $array;
}  
//============القنوات============||
if($text == "القنوات" and $chat_id == $gp){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
جار جلب القنوات انتظر 
",'reply_to_message_id'=>$message->message_id,
]);
#الاولى
$arraych=$databot["info"]["القنوات"]["array"];
foreach($arraych as $channel ){

if($channel!=""){
$res=$databot["info"]["القنوات"]["info"][$channel]["count_mem"];
$chname=$databot["info"]["القنوات"]["info"][$channel]["name"];
$userch=$databot["info"]["القنوات"]["info"][$channel]["user"];
$user1=$userch;
$user12="@".$user1
;
if($user1!="no"){
$co= $co+1;
$txt = "$txt\n$co $res ┊$user12 $chname";
}
if($userch =="no"){
$user11=$databot["info"]["القنوات"]["info"][$channel]["link"];
$coll++;
$txtk = "$txtk\n$coll $res ┊$chname \n$user11\n id : $channel 
";
}
}
}
if(!$txtk)
{$txtk ="لا توجد لديك قنوات خاصة ";
}
if(!$txt)
{$txt ="لا توجد لديك قنوات عامة";
}
$textch="▫ هذه قائمة القنوات:\n
- القنوات الخاصة:\n$txtk
- القنوات العامة:\n$txt";
wordCut1($textch,"3000
",$chat_id,$zrar,$pres,$web,$message->message_id);
}
////// أسفل شفاف 
if($data == "shtt" and $chat_id == $gp){
unlink("data/addazrar.txt");
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"
✅| تم حذف الشفاف اسفل اللستة.
",'reply_to_message_id'=>$message->mrssage_id,
]);
}

if($text=="حذف اسفل شفاف" or $text=="حذف أسفل شفاف" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$gp,
'text'=>"
✅| هل تريد حذف الشفاف اسفل.
",'reply_to_message_id'=>$message->mrssage_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"✅ | نعم ","callback_data"=>"shtt"],["text"=>"❌ | لا ","callback_data"=>"noo"]],
]])
]);   
}
#####
if($text == "أسفل شفاف" or $text == "اسفل شفاف" and $chat_id == $gp){
test($IDBOT,'تحكم','اسفل شفاف',"",'put');
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
✳️| تستطيع اضافة ازرار شفافة اسفل اللستة..
",'reply_to_message_id'=>$message->mrssage_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"- عودة للخلف 🔂",'callback_data'=>"back"]],[['text'=>"- اضافة ازرار ✳️",'callback_data'=>"addz"]],
]
])
]); 
}
if($data == "addz" and $chat_id == $gp){
test($IDBOT,'admin','amr',"azrar",'put');
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✳️| لانشاء ازرار شفافة عمودية قم بكتابة: 
• اسم القناه = رابط القناه

✳️| لانشاء ازرار شفافة افقية قم بكتابة.
اسم القناة = رابط القناة + اسم القناة = رابط القناة

⚠️ تنبيه:
• عدد الازرار العمودية المسموح بها :5
• عدد الازرار الافقية المسموح بها :3

",'parse_mode'=>"markdown",
'reply_to_message_id'=>$message->mrssage_id,
]);
}

if($text and !$data and $amr == "azrar" and $chat_id == $gp){
test($IDBOT,'admin','amr',"non",'put');
$ex = explode("\n", $text);
$amode = count($ex);
if($amode <= 5){

file_put_contents("data/azrar.txt",$text);
#unlink("data/azrar.txt");
file_put_contents("data/listaziadh.php", '<?php'."\n".'$listaziadh = json_encode(['."\n".'"inline_keyboard"=>['."\n");

for($i=0;$i<count($ex);$i++){
$h = explode("\n", $text);
$ooo = str_replace("http://", "", $h[$i]);
$oo = str_replace("https://", "", $ooo);
$o = str_replace("+ ", "\n", $oo);
$u = explode("\n", $o);
$n = count($u);

if(preg_match("/^(.*) = (.*)/", $o, $ch) and $n == 1){
$coz++;
file_put_contents("data/listaziadh.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"]],', FILE_APPEND);
}
if(preg_match("/^(.*) = (.*)\n(.*) = (.*)/", $o, $ch) and $n == 2){
 $coz = $coz+2;
file_put_contents("data/listaziadh.php", "\n".'[["text"=>"'.$ch[1].'", "url"=>"'.$ch[2].'"],["text"=>"'.$ch[3].'", "url"=>"'.$ch[4].'"]],', FILE_APPEND);
}
}

file_put_contents("data/listaziadh.php", "\n]]);", FILE_APPEND);
include "data/listaziadh.php";
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"
✴️| هذه هي الازرار التي قمت باضافتها للستة 
- عدد الازرار : $coz  
",'disable_web_page_preview'=>true,
"reply_markup"=>$listaziadh
]);
file_put_contents("data/co.txt", "$coz");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅| تم الانشاء بنجاح هل تريد الحفظ ؟.
",'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- حفظ الانشاء ☑️ ",'callback_data'=>"seveazrar"]],
[['text'=>"- عودة للخلف 🔂",'callback_data'=>"noo"]],
]
])
]);
}else
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
⚠️ المعذرة تجاوزت الحد المسموح
- حاول مجددا الان. 
",'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"⚠️ محاولة اخرئ
",'callback_data'=>"addz"]],
]
])
]);
}

if($data == "seveazrar" and $chat_id == $gp){
unlink("data/listaziadh.php");
$getazrar=file_get_contents("data/azrar.txt");
file_put_contents("data/addazrar.txt","$getazrar");
$coz=file_get_contents("data/co.txt");
file_put_contents("data/coz.txt", "$coz");
unlink("data/co.txt");
unlink("data/azrar.txt");
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
✅| تم حفظ الازرار بنجاح.
ارسل الامر : انشاء.
",'reply_to_message_id'=>$message->message_id,
]);
}

if($text == "تصميم" or $text=="تصاميم" and $chat_id == $gp){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- اهلا بك عزيزي في قسم التصميم 
- تستطيع تصميم لستاتك بحريه تامة من خلال وضع نمط ليتم بناء اللستة عليه 
- قم باختيار قسم اللستة من الاسفل لعمل التصميم الخاص لها 
",'reply_to_message_id'=>$message->mrssage_id, 
'parse_mode'=>html,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"شفاف 🔆",'callback_data'=>"تصميمشفاف"],['text'=>"ماركدوان 🔆",'callback_data'=>"تصميمماركدون"],['text'=>"معرفات 🔆", 'callback_data'=>"تصميممعرفات"]],
[['text'=>"🗑حذف جميع التصاميم..🗑", 'callback_data'=>"deel"]],
]
])
]);
}

if($text=="حذف التصاميم" or $text=="حذف التصميم" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$gp,
'text'=>"
✅| هل تريد حذف تصاميم اللستة .
",'reply_to_message_id'=>$message->mrssage_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"✅ | نعم ","callback_data"=>"delltsmim"],["text"=>"❌ | لا ","callback_data"=>"noo"]],
]])
]);   
}
//////////
if($data == "deel" and $chat_id == $gp){
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"
- سيتم اعادة ضبط كل تصاميم اللستة
- سيتم فقد كل التصاميم السابقة للبوت تابع ↯
",'reply_to_message_id'=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"✅ | نعم","callback_data"=>"delltsmim"],["text"=>"❌ | لا","callback_data"=>"noo"]],
]])
]);   
}
if($data == "delltsmim" and $chat_id == $gp){
test($IDBOT,'admin','amr',"non",'put');
unlink("tsmimshfaf.txt");
unlink("tsmimmark.txt");
unlink("tsmim.txt");
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"✅| تم حذف جميع التصاميم.
",'reply_to_message_id'=>$message->mrssage_id,
]);
}

if($data == "تصميمشفاف" and $chat_id == $gp){
test($IDBOT,'admin','amr',"تصميمشفاف",'put');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- الرموز المستخدمة لانشاء التصميم الخاص بك

- ME = عدد الاعضاء 
- NE = اسم القناة  
• ┉ • ┉ • ┉ • ┉ •
- اذا كنت تريد انشاء تصميم للستة الشفافة
يجب ان يكون تصميمك على النحو التالي:

- قم بارسال التصميم الخاص
مثال لانشاء التصميم 
- `ME | NE`

- معاينة التصميم :👇
",'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"10k| قناة بوتات", 'url'=>"https://t.me/SAEEDFiles"]],
]
])
]);
}

if($data == "تصميمماركدون" and $chat_id == $gp){
test($IDBOT,'admin','amr',"تصميمماركدون",'put');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- الرموز المستخدمة لانشاء التصميم الخاص 

ME = عدد الاعضاء 
MARK = اسم القناة ورابطها 
• ┉ • ┉ • ┉ • ┉ • ┉ •
- اذا كنت تريد انشاء تصميم لستة ماركداون
- يجب ان يكون تصميمك على النحو التالي:
- مثال للتصميم
`⁽ME₎ ⁞ MARK`
- معاينة التصميم :👇

⁽10k₎ ⁞ [قناة بوتات](https://t.me/SAEEDFiles)

قم بارسال تصميمك حالاً
",'parse_mode'=>"markdown",
'reply_to_message_id'=>$message->mrssage_id,
]);
}

if($data == "تصميممعرفات" and $chat_id == $gp ){
test($IDBOT,'admin','amr',"تصميممعرفات",'put');
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- الرموز المستخدمة لانشاء التصميم الخاص بك

ME = عدد الاعضاء 
US = الرابط او المعرف
NE = اسم القناة 
• ┉ • ┉ • ┉ • ┉ •
- اذا كنت تريد انشاء تصميم للستة المعرفات 
- يجب ان يكون تصميمك على النحو التالي:
- مثال للتصميم

`⁽ME₎ ⁞ NE US `
- معاينة التصميم :👇

⁽10k₎ ⁞ قناة بوتات @SAEEDFiles

قم بإرسال تصميمك فوراً
",'parse_mode'=>"markdown",
'reply_to_message_id'=>$message->mrssage_id,
]);
}
if($text and $amr== "تصميمشفاف" and $chat_id == $gp ){
unlink("tsmimshfaf.txt");
test($IDBOT,'admin','amr',"non",'put');
file_put_contents("tsmimshfaf.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم حفظ التصميم بنجاح.
",'reply_to_message_id'=>$message->mrssage_id, 
]);
$gettsmimshfaf= file_get_contents("tsmimshfaf.txt");
$tsmim=str_replace(["ME","NE"],["7k","قناة بوتات"],"$gettsmimshfaf");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- سيتم عرض القنوات كالاتي:\n$tsmim
",'reply_to_message_id'=>$message->mrssage_id, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$tsmim", 'url'=>"https://t.me/SAEEDFiles"]],
]])
]);
}
if($text and $amr== "تصميمماركدون" and $chat_id == $gp ){
unlink("tsmimmark.txt");
test($IDBOT,'admin','amr',"non",'put');
file_put_contents("tsmimmark.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم حفظ التصميم بنجاح.
",'reply_to_message_id'=>$message->mrssage_id, 
]);
$gettsmimmark= file_get_contents("tsmimmark.txt");
$tsmim=str_replace(["ME","MARK"],["1k","[قناة بوتات](t.me/SAEEDFiles) "],"$gettsmimmark");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- سيتم عرض القنوات كالاتي:\n$tsmim
",'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->mrssage_id, 
]);
}
if($text and $amr== "تصميممعرفات" and $chat_id == $gp ){
unlink("tsmim.txt");
test($IDBOT,'admin','amr',"non",'put');
file_put_contents("tsmim.txt","$text");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم حفظ التصميم بنجاح.
",'reply_to_message_id'=>$message->mrssage_id, 
]);
$gettsmim= file_get_contents("tsmim.txt");
$tsmim=str_replace(["ME","US","NE"],["1k","@SAEEDFiles","قناة بوتات"],"$gettsmim");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
- سيتم عرض القنوات كالاتي:\n$tsmim
",'reply_to_message_id'=>$message->mrssage_id, 
]);
}
if (preg_match('/^(الحد الادنى) (.*)/s',$text) and $chat_id == $gp){
$textt = str_replace(" ","",$text);
$textt = str_replace("\n","",$textt);
$textt = str_replace("  ","",$textt);
$textt = str_replace(" ","",$textt);
$textt = str_replace("الحدالادنى","",$textt);
$txt= trim($textt);
$databot["info"]["تحكم"]["عدد الاعضاء"]="$txt";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم تعيين الحد الادنى 
لقبول القنوات :\n$txt عضواً
",'reply_to_message_id'=>$message->message_id,
]);
}

if(preg_match('/^(تعديل) (.*)/s',$text) and $chat_id == $gp){
$ex = explode(" ",$text);
$channel= $ex['1'];
$chname = str_replace("تعديل","",$text);
$chname = str_replace("$channel ","",$chname);
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$channel"))->result->id;

if($ch_id!=null){
$databot["info"]["القنوات"]["info"][$ch_id]["name"]="$chname";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
$nameg=$databot["info"]["القنوات"]["info"][$ch_id]["name"];
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم تعديل اسم القناة بنجاح

- الاسم الجديد: $chname
- ايدي القناة: **` $ch_id `**
- معرف القناة: $channel
",'parse_mode'=>"markdown",
 'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->mrssage_id,
]);
}
}

if(preg_match('/^(وضع قوانين) (.*)/s',$text)and $chat_id == $gp){
$textt = str_replace("وضع قوانين ","",$text);
test($IDBOT,'تحكم','كليشه قوانين',"$text",'put');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم تعيين قائمة القوانين: \n$textt 
",'reply_to_message_id'=>$message->message_id,
]);
}

if(preg_match('/^(فاصل) (.*)/s',$text)and $chat_id == $gp){
$textt = str_replace("فاصل ","",$text);
$strlen=mb_strlen($textt);
if($strlen < 50){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم اضافة فاصل اللستة بنجاح
الفاصل:\n$textt
",'reply_to_message_id'=>$message->mrssage_id,
]);
test($IDBOT,'تحكم','فاصل',"$textt",'put');
}else{
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
⚠ المعذرة فاصل اللستة كبير
يجب ان يكون اقل من (50) رمزا او حرفا 
",'reply_to_message_id'=>$message->mrssage_id,
]);
}
}

if($text=="حذف الاضافات" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$gp,
'text'=>"
- هل تريد حذف الاضافات الان ...
- اعلى - اسفل - الفاصل - اسفل شفاف.
",'reply_to_message_id'=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"✅ | نعم","callback_data"=>"delett"],["text"=>"❌ | لا ","callback_data"=>"noo"]],
]])
]);   
}
if($data == "delett" and $chat_id == $gp){
test($IDBOT,'تحكم','اعلى',"",'put');
test($IDBOT,'تحكم','اسفل',"",'put');
test($IDBOT,'تحكم','فاصل',"",'put');
unlink("data/addazrar.txt");
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"
✅| تم حذف جميع الاضافات بنجاح.
اعلى - اسفل - فاصل - شفاف. 
",'reply_to_message_id'=>$message->mrssage_id,
]);
}
 
if($text=="حذف اعلى اللستة" or $text=="حذف اعلى اللسته" or $text=="حذف اعلى" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$gp,
'text'=>"
هل تريد حذف النص اعلى اللستة 
",'reply_to_message_id'=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"✅ | نعم","callback_data"=>"delaa"],["text"=>"❌ | لا","callback_data"=>"noo"]],
]])
]);   
}
if($data == "delaa" and $chat_id == $gp){
test($IDBOT,'تحكم','اعلى',"",'put');
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"
✅| تم حذف النص اعلى اللستة بنجاح
",'reply_to_message_id'=>$message->message_id,
]);
}

if($text=="حذف اسفل اللستة" or $text=="حذف اسفل اللسته" or $text=="حذف اسفل" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$gp,
'text'=>"
هل تريد حذف النص اسفل اللستة
",'reply_to_message_id'=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"✅ | نعم","callback_data"=>"delas"],["text"=>"❌ | لا","callback_data"=>"noo"]],
]])
]);   
}
if($data == "delas" and $chat_id == $gp){
test($IDBOT,'تحكم','اسفل',"",'put');
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"
✅| تم حذف النص اسفل اللستة بنجاح.
",'reply_to_message_id'=>$message->message_id,
]);
}
#####
if($text=="حذف فاصل اللستة" or $text=="حذف فاصل اللسته" or $text=="حذف الفاصل" or $text=="حذف فاصل" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$gp,
'text'=>"هل تريد حذف الفواصل في اللستة ✅ 
",'reply_to_message_id'=>$message->message_id,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"✅ | نعم ","callback_data"=>"delf"],["text"=>"❌ | لا ","callback_data"=>"noo"]],
]])
]);   
}
if($data == "delf" and $chat_id == $gp){
test($IDBOT,'تحكم','فاصل',"",'put');
unlink("data/addazrar.txt");
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$gp,
'text'=>"
✅| تم حذف فواصل اللستة بنجاح.
",'reply_to_message_id'=>$message->message_id,
]);
}
if(preg_match('/^(اعلى) (.*)/s',$text)and $chat_id == $gp){
$textt = str_replace("اعلى ","",$text);
test($IDBOT,'تحكم','اعلى',"$textt",'put');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅| تم اضافة نص اعلى اللستة بنجاح  .
- النص:\n$textt 
",'parse_mode'=>"markdown",
 'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);
}

if(preg_match('/^(اسفل) (.*)/s',$text) and $chat_id == $gp){
$ex = explode(" ",$text);
if($ex['1']!="شفاف"){
$textt = str_replace("اسفل ","",$text);
test($IDBOT,'تحكم','اسفل',"$textt",'put');
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅| تم اضافة نص اسفل اللستة بنجاح.
- النص: \n$textt 
",'parse_mode'=>"markdown",
 'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);
}}

if($text == "تفعيل المراقبة" and $chat_id == $gp){
$result = "مفعلة ✅";
test($IDBOT,'تحكم','المراقبة',$result,'put');
test($IDBOT,'تحكم','الرفع التلقائي','❌ معطلة','put');
unlink("mragbh/amr.txt");
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
✅| تم تفعيل وضع المراقبة
",'reply_to_message_id'=>$message->message_id,
]);}
if($text == "تعطيل المراقبة" and $chat_id == $gp){
$result = "معطلة ❌";
test($IDBOT,'تحكم','المراقبة',$result,'put');
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"
✅| تم تعطيل وضع المراقبة.
",'reply_to_message_id'=>$message->message_id,
]);} 

if(preg_match('/^(معلومات) (.*)/s',$text) and $chat_id == $gp){
$textt = str_replace("معلومات ","",$text);
$textt = str_replace("\n"," ",$textt);
$textt = str_replace("  "," ",$textt);
$textt = str_replace(" ","=",$textt);
$texttt = explode("=",$textt);

$ids=$databot["info"]["القنوات"]["array"];
$getban=$databot["info"]["القنوات"]["ban"];
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$textt) or preg_match('/^(.*)-100|-100(.*)|(.*)-100(.*)|(.*)-100(.*)|-100(.*)|(.*)-100/',$textt)){
bot('sendmessage',[
'chat_id'=>$chat_id,
"message_id"=>$message_id,
'text'=>"⏳ جار جلب معلومات القنوات 
",'reply_to_message_id'=>$message->message_id,
]);
$text1=$texttt;
for($h=0;$h<count($text1);$h++){
if($text1[$h]!=""){
$id =$text1[$h];
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id"))->result->id;
if($ch_id ==null){
$ch_id ==$id;
}
if(in_array($ch_id, $ids) or in_array($ch_id, $getban)){
$json1 = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$ch_id"))->result;
$name1 = $json1->title; 

$res = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatMembersCount?chat_id=$ch_id"))->result;

$user=$databot["info"]["القنوات"]["info"][$ch_id]["user"];

if($user=="no" ){
$linkch=$databot["info"]["القنوات"]["info"][$ch_id]["link"];
}
$namech=$databot["info"]["القنوات"]["info"][$ch_id]["name"];
$adminch=$databot["info"]["القنوات"]["info"][$ch_id]["admin"];

if(in_array($ch_id, $ids) and in_array($ch_id, $getban)){
$biinu=" محظورة بسبب المخالفة";
}
if(in_array($ch_id, $ids) and !in_array($ch_id, $getban)){
$biinu=" مسجلة في اللستة ";
}
$info="📊 معلومات القناة 

الاسم : $namech
الايدي : *`$ch_id`*
المعرف : $text1[$h]
المشترك : *[صاحب القناة](tg://user?id=$adminch)*
 
اعضاء القناة حالياً : $res عضواً
الزيادة : $ress 
الوضع : $biinu 
";
if(!in_array($ch_id, $ids) and in_array($ch_id, $getban)){
$info="$zi ┊ $name1
🚫 المعذرة القناة محظورة  
- معرف القناة : $text1[$h] ";
}
}else{
$info="$zi ┊ $name1
❎ المعذرة القناة غير موجودة في قاعدة البيانات
- معرف القناة : $text1[$h] ";
}
file_put_contents("binch/ziiii.txt","$zii");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*$info*
",'parse_mode'=>MARKDOWN,
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);
}
}
}
}

$ids=$databot["info"]["القنوات"]["array"];
$getban=$databot["info"]["القنوات"]["ban"];
$fromjson = json_decode(file_get_contents("from_id.json"),true);

if(preg_match('/^(حذف) (.*)/s',$text) and $chat_id == $gp ){
$ex = explode(" ",$text);
if($ex['1']!="الاضافات" and $ex['1']!="منشور" and $ex['1']!="تعديل" and $ex['1']!="التواقيت" and $ex['1']!="التصاميم"){
$textt = str_replace("تعديل ","",$text);
$textt = str_replace("حذف ","",$text);
$textt = str_replace("\n"," ",$textt);
$textt = str_replace("  "," ",$textt);
$textt = str_replace(" ","=",$textt);
$texttt = explode("=",$textt);

if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$textt) or preg_match('/^(.*)-100|-100(.*)|(.*)-100(.*)|(.*)-100(.*)|-100(.*)|(.*)-100/',$textt)){
$biinu=null;
bot('sendmessage',[
'chat_id'=>$chat_id,
"message_id"=>$message_id,
'text'=>"جار حذف القنوات... 
",'reply_to_message_id'=>$message->message_id,
]);
$text1=$texttt;
for($h=0;$h<10;$h++){
if($text1[$h]!= ""){
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text1[$h]) ){
$id =$text1[$h];
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id"))->result->id;
$id=$ch_id;
}else{
$id =$text1[$h];
}
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$ids=$databot["info"]["القنوات"]["array"];
$getban=$databot["info"]["القنوات"]["ban"];

$adminch=$databot["info"]["القنوات"]["info"][$id]["admin"];
$idc=$fromjson["info"][$adminch]["channel"];
if(in_array($id, $ids)){

$index = array_search($id, $ids);
if($id == $databot["info"]["القنوات"]["array"][$index] and $id != null ){
unset($databot["info"]["القنوات"]["info"][$id]);
unset($databot["info"]["القنوات"]["array"][$index]);
$databot["info"]["القنوات"]["array"]=array_values($databot["info"]["القنوات"]["array"]);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));

$index2 = array_search($id, $idc);
unset($fromjson["info"][$adminch]["members"][$id]);
unset($fromjson["info"][$adminch]["channel"][$index2]);
$fromjson["info"][$adminch]["channel"]=array_values($fromjson["info"][$adminch]["channel"]);
file_put_contents("from_id.json", json_encode($fromjson));
$biinu="$biinu\n✅ | $text1[$h]";
}else{
$biinu="$biinu\n❌ | $text1[$h]";
}
}
if(!in_array($id, $ids)){
$biinu="$biinu\n❌ | $text1[$h]";
}
}
}

bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"ℹ حالة حذف هذة القنوات 
------------------
$biinu
------------------
✅  | تم حذف القناة 
❌  | القناة ليست مشتركة اساسا
",
]);
}
}
}

if(preg_match('/^(حظر) (.*)/s',$text) and $chat_id == $gp){
$textt = str_replace("حظر","",$text);
$textt = str_replace("\n"," ",$textt);
$textt = str_replace("  "," ",$textt);
$textt = str_replace(" ","=",$textt);
$texttt = explode("=",$textt);
$biinu=null;
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$textt) or preg_match('/^(.*)-100|-100(.*)|(.*)-100(.*)|(.*)-100(.*)|-100(.*)|(.*)-100/',$textt)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"جار حظر القنوات....  
",'reply_to_message_id'=>$message->message_id,
]);
$text1=$texttt;
for($h=0;$h<10;$h++){
if($text1[$h] != ""){
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text1[$h]) ){
$id =$text1[$h];
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id"))->result->id;
$id=$ch_id;
}else{
$id =$text1[$h];
}

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$ids=$databot["info"]["القنوات"]["array"];
$getban=$databot["info"]["القنوات"]["ban"];
if(in_array($id, $ids) and !in_array($id, $getban)){
$biinu="$biinu\n✅ | $text1[$h]";
$index = array_search($id, $ids);
if($id == $databot["info"]["القنوات"]["array"][$index] and $id != null ){
$index = array_search($id, $ids);
unset($databot["info"]["القنوات"]["array"][$index]);
$databot["info"]["القنوات"]["array"]=array_values($databot["info"]["القنوات"]["array"]);
$databot["info"]["القنوات"]["ban"][]="$id";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
}}

#محظورة مسبقا
if(!in_array($id, $ids) and in_array($id, $getban)){
$biinu="$biinu\n♻ | $text1[$h]";
}
#تم حظرها احتياطا
if(!in_array($id, $ids) and !in_array($id, $getban)){
$biinu="$biinu\n❌ | $text1[$h]";
}
}}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"ℹ حالة حظر هذة القنوات 
------------------
$biinu
------------------
✅ | تم حظر القناة 
♻  | القناة محظورة مسبقاً
❌ | القناة ليست مشتركة باللستة لاكن تم حظرها احتياطا 
",
]);
}
}

$ids=$databot["info"]["القنوات"]["array"];
$getban=$databot["info"]["القنوات"]["ban"];
if (preg_match('/^(فك حظر) (.*)/s',$text) or preg_match('/^(الغاء حظر) (.*)/s',$text)){

if( $chat_id == $gp){
$textt = str_replace("فك حظر ","",$text);
$textt = str_replace("الغاء حظر ","",$textt);
$textt = str_replace("\n"," ",$textt);
$textt = str_replace("  "," ",$textt);
$textt = str_replace(" ","=",$textt);
$texttt = explode("=",$textt);
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$textt) or preg_match('/^(.*)-100|-100(.*)|(.*)-100(.*)|(.*)-100(.*)|-100(.*)|(.*)-100/',$textt)){
bot('sendmessage',[
'chat_id'=>$chat_id,
"message_id"=>$message_id,
'text'=>"- جار الغاء حظر القنوات ...
$textt
",'reply_to_message_id'=>$message->message_id,
]);

$text1=$texttt;
for($h=0;$h<count($text1);$h++){
if($text1[$h]!= ""){
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text1[$h]) ){
$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text1[$h]"))->result->id;
$id=$ch_id;
}else{
$id =trim($text1[$h]);
}

$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$ids=$databot["info"]["القنوات"]["array"];
$getban=$databot["info"]["القنوات"]["ban"];
if(in_array($id,$getban)){
$index = array_search($id, $getban);
if($id == $databot["info"]["القنوات"]["ban"][$index] and $id != null ){
$index = array_search($id, $getban);
unset($databot["info"]["القنوات"]["ban"][$index]);
$databot["info"]["القنوات"]["ban"]=array_values($databot["info"]["القنوات"]["ban"]);
$databot["info"]["القنوات"]["array"][]="$id";
$biinu="$biinu\n✅ | $text1[$h]";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
}
}
if(!in_array($id, $getban)){
$biinu="$biinu\n❌ | $text1[$h]";
}
}}
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"ℹ حالة الغاء حظر هذة القنوات 
------------------
$biinu
------------------
✅ | تم الغاء حظر القناة 
ℹ |  تم الغاء حظر القناة بالرغم انها لم تقم بالإشتراك مسبقا 
❌ | القناة ليس محظورة مسبقاً
",
]);
}
}
}

$ids=$databot["info"]["القنوات"]["array"];
$coids=count($ids);
$getban=$databot["info"]["القنوات"]["ban"];
$coban=count($getban);
@$datajson = json_decode(file_get_contents("data/channels.json"),true);
$arrayyes=$datajson["info"]["فحص"]["yeschannel"];
$coyesch=count($arrayyes);
$arrayno=$datajson["info"]["فحص"]["nochannel"];
$conoch=count($arrayno);
if($text=="تقرير" and $chat_id == $gp){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
✴ تقرير 
✅ | القنوات المشتركة: *$coids* قناة.
❌ | القنوات المحظورة: *$coban* قناة.
♻ | القنوات المدرجة في اللستة: *$coyesch* قناة.
ℹ | القنوات الغير مدرجة: *$conoch* قناة.
",'parse_mode'=>"markdown",
'reply_to_message_id'=>$message->message_id,
]);
}

if($text=="محظورة" or $text=="المحظورة" or $text=="محظوره" or $text=="المحظوره" or $text=="الحظر"){
if($chat_id == $gp){
$biinu=null;
for($i=0;$i<count($getban);$i++){
if($getban[$i]!=""){
$channel=$getban[$i];
$usech=$databot["info"]["القنوات"]["info"][$channel]["user"];

if($usech=="no" ){
$usech=$channel;
}else{
$usech = "@".$usech;
}
$biinu="$biinu\n$usech";
}}
if($biinu==null){
$biinu="لا توجد قنوات محظورة ";
}
bot('sendmessage',[
'chat_id'=>$chat_id,
"text"=>"® | هذة هي القنوات المحظورة 
$biinu
--------------------
",'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'حذف قائمة الحظر ','callback_data'=>"deleteban"]],
] 
])
]);
}}

if($data == "deleteban" and $chat_id == $gp){
unset($databot["info"]["القنوات"]["ban"]);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"✅| تم حذف قائمة الحظر بنجاح 
",
]);
}

$resjson = json_decode(file_get_contents("res.json"),true);
 
if($text == "تقرير الزيادة" or $text == "تقرير الزياده"   or $text == "زيادة"){
if($chat_id == $gp){
$ids=$databot["info"]["القنوات"]["array"];;
$countids = count($ids);
if(isset($databot["info"]["القنوات"]["array"]) and $countids > 0){
bot('sendmessage',[
'chat_id'=>$gp,
"text"=>"- جار انشاء تقرير الزيادة ...
",'reply_to_message_id'=>$message->message_id,
]);
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
$ktadl = "⚠ $tadl | $memnew $ch";
}
if($memad < $memnew){
$tadl = $memnew - $memad;
$ktadl = "♻ $tadl | $memnew $ch";
}
if($memad > $memnew){
$tadl = $memnew - $memad;
$ktadl = "💔 $tadl | $memnew $ch";
}
$txt="$txt\n$ktadl";
$ziiadh=$ziiadh+$tadl;

# من وقت الاشتراك

if($memberas == $memnew){
$tadll = $memberas - $memnew;
$ktadlll = "🚫 $tadll | $memnew $ch";
}
if($memnew > $memberas){
$tadll = $memnew - $memberas;
$ktadlll = "🔥 $tadll | $memnew $ch";
}
if($memnew < $memberas){
$tadll = $memberas - $memnew;
$ktadlll = "📉  $tadll | $memnew $ch";
}
$txtall="$txtall\n$ktadlll";
$ziiadhall=$ziiadhall+$tadll;
$countmall=$countmall+$memnew;
}
}
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"📊 تقرير الزيادة المتجددة في: ( $countids ) قناة:\n$txt
ـ--------------------
➕ زيادة في جميع القنوات: ( $ziiadh )
👥 عدد اعضاء جميع القنوات: ( $countmall )
",
'reply_to_message_id'=>$message->message_id,
]);
bot('sendMessage',[
'chat_id'=>$gp,
'text'=>"📊 تقرير الزيادة من بداية الاشتراك في: ( $countids )قناة:\n$txtall
ـ--------------------
➕ زيادة في جميع القنوات: ( $ziiadhall )
👥 عدد اعضاء جميع القنوات: ( $countmall )
",
'reply_to_message_id'=>$message->message_id,
]);
}
}
}
