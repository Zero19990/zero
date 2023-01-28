<?php

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];

function sendtext($chat_id,
$textmessage,$message_id){
bot('SendMessage',[
'chat_id' =>$chat_id,
'text'=>"*$textmessage*
",'parse_mode'=>"markdown",
'reply_to_message_id'=>$message->mrssage_id,
]);
}
##
if($text == "/start"){
if($from_id==$admin or in_array($from_id,$sudo)){
$textmessage="
- مرحبا بك مدير

- لتشغيل البوت قم باضافتة الى جروب الادارة .
ثم ارسل الامر  تعيين الادارة - الاستقبال.

- للتعليمات ارسل الاوامر - التعليمات.
";
sendtext($chat_id,$textmessage,$message_id);
}}
///////////////
if($text == "تعيين الادارة" or $text == "تفعيل الادارة" or $text == "تفعيل الاداره" or $text == "تعين الادارة"){
if($from_id == $admin or in_array($from_id,$sudo)){
if($type=="supergroup" or $type=="group"){

$linkgp = json_decode(file_get_contents("http://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chat_id"))->result;

$databot["info"]["رابط الاداره"]="$linkgp";
$databot["info"]["قروب الاداره"]="$chat_id";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
$textmessage="✅| تم تعيين ادارة البوت
─────
$linkgp
$chat_id
";
sendtext($chat_id,$textmessage,$message_id);
}else{
$textmessage="⚠ المعذرة هذا ليس جروبا  
";
sendtext($chat_id,$textmessage,$message_id);
}}}

if($text == "تعيين الاستقبال" or $text == "تفعيل الاستقبال" or $text == "تعين الاستقبال"){
if($from_id == $admin or in_array($from_id,$sudo)){
if($type=="supergroup" or $type=="group"){

$linkgs = json_decode(file_get_contents("http://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$chat_id"))->result;

$databot["info"]["قروب الاستقبال"]="$chat_id";
$databot["info"]["رابط الاستقبال"]="$linkgs";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
$textmessage="✅| تم تعيين إستقبال البوت
─────
$linkgs
$chat_id
";
sendtext($chat_id,$textmessage,$message_id);
}else{
$textmessage="⚠ المعذرة هذا ليس جروبا للاستقبال
";
sendtext($chat_id,$textmessage,$message_id);
}}}
//////////////////////////////
if($text == "الاوامر" or $text == "تعليمات" or $text == "كل التعليمات" or $text == "التعليمات" and $chat_id == $gp){
mkdir("data");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
📌 [#كل_التعليمات]
• تعيين الادارة - الاستقبال : لتعيين المجموعات .
• تحديث القنوات : لتحديث بيانات القنوات .
• تحكم - اعدادات : لعرض لوحة التحكم .

• الحالة - تحديث : لرؤية حالة البوت .
• ابدا : لتسجيل القنوات في اللستة .
• توقف : لإيقاف تسجيل القنوات في اللستة .
• فحص : لفحص القنوات قبل النشر .
• القنوات : لرؤية القنوات المشتركة .

• معرفات - ماركدون - شفاف لاختيار نوع اللستة.
• شفاف عمود : لإنشاء لستة شفافة بعمود واحد.
• شفاف عمودين : لإنشاء لستة شفافة بعمودين .
• ترتيب القنوات : تصاعدي - تنازلي  
جهتين - عشوائي.
• الحد الادنى + العدد : لتحديد اعضاء القنوات.

• انشاء : لجلب القنوات قبل النشر .
• نشر : لنشر اللستة في القنوات .
• حذف : لحذف اللستة في القنوات .
• تقرير زيادة : لإصدار تقرير لجميع القنوات . 
• تقرير : لإصدار تقرير شامل .

• تفعيل - تعطيل الحذف : لتنفيذ تثبيت اللستة. 
• تفعيل - تعطيل الرفع : للتنفيذ التلقائي لرفع اللستة  . 
• تصميم - تصاميم : لانشاء تصميم خاص باللستة .
• حذف التصاميم : لحذف تصاميم اللستة الخاصة.
• اعلى - اسفل - فاصل + النص : لتنفيذ الكليشة المتعددة .
• اسفل شفاف : لاضافة ازرار شفافة اسفل اللستة. 
• حذف - اعلى - اسفل - الفاصل - اسفل شفاف.
• حذف الاضافات : لحذف جميع الاضافات كليا

• تعديل + ايدي القناة او المعرف + الاسم للتعديل .
• معلومات + الايدي - المعرف : لعرض المعلومات .
• حظر + معرفات : لحظر قنوات من اللستة.
• فك حظر + معرفات : لفك حظر القنوات.  
• حذف + معرفات : لحذف تخزين البوت.
• المحظورة : لعرض القنوات التي تم حظرها .
• مسح المحظورة : لمسح قائمة حظر القنوات .
• تنبيه ابدا : لتغيير رسالة استقبال القنوات .
• تنبيه توقف : لتغيير رسالة ايقاف استقبال القنوات .

• صنع منشور - انشاء منشور : لانشاء منشورات .
• انشر - احذف + رقم الكود : للتنفيذ المنشور في القنوات .
• حذف منشور + رقم كود: لحذف المنشور. 
• المنشورات : لعرض القائمة لمنشوراتك. 
• معاينة + رقم كود : لعرض المنشور . 
• اذاعة - اذاعه : لنشر اذاعة متعددة .
 
• انا : لعرض قنواتك في اللستة .
• زيادة : لعرض تقرير الزياده لقنواتك. 
• حذف + معرف او ايدي : لحذف قناتك من اللستة  .
• تستطيع اضافة قنواتك الخاصة عبر توجيه منشور من القناة الى قروب الاستقبال

• تواقيت : لعرض التواقيت الموجودة .
• توقيت : لعرض التعليمات العامة للتواقيت. 
• حذف التواقيت : لحذف جميع التواقيت .
• تفعيل التوقيت : لتفعيل وتنفيذ اوامر التوقيت
• ايقاف التوقيت : لتعطيل الامر السابق .

• توقيت مكرر - ليوم 🕞
• نشر - حذف - رفع - فحص - انشاء -  ابدا - توقف 
• انشر - احذف + رقم الكود : للتنفيذ 
",'parse_mode'=>"markdown",
'reply_to_message_id'=>$message->mrssage_id,
]); 
}
#اوامر الادمن 
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
$tngeh=$databot["info"]["تحكم"]["حذف الايموجي"];

if($text == "تحكم" or $text=="اعدادات" or $text=="الاعدادات" and $chat_id == $gp){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
🔧 الإعدَادَاتُـ 🔧 

                ✍🏼 الإدَارَة
        
              📩 الإسْتِقبَــالُـ
---
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"📊 عدد الاعضاء المقبولة | $count_memberyes ",'callback_data'=>"button"]],
[['text'=>"+10 ➕",'callback_data'=>"p10"],['text'=>"+100 ➕",'callback_data'=>"p100"],['text'=>"+1000 ➕",'callback_data'=>"p1000"]],
[['text'=>"-10 ➖",'callback_data'=>"m10"],['text'=>"-100 ➖",'callback_data'=>"m100"] ,['text'=>"-1000 ➖",'callback_data'=>"m1000"]],

[['text'=>"📊 عدد القنوات المطلوبة | $cuont_channel",'callback_data'=>"button"]],
[['text'=>"+1 ➕",'callback_data'=>"cz1"],['text'=>"+10 ➕",'callback_data'=>"cz10"]],
[['text'=>"-1 ➖",'callback_data'=>"cn1"],['text'=>"-10 ➖",'callback_data'=>"cn10"]],

[['text'=>"📊 عدد احرف القنوات | $cuont_hroof",'callback_data'=>"button"]],
[['text'=>"+1 ➕",'callback_data'=>"hz1"],['text'=>"+10 ➕",'callback_data'=>"hz10"]],
[['text'=>"-1 ➖",'callback_data'=>"hn1"],['text'=>"-10 ➖",'callback_data'=>"hn10"]],

[['text'=>'📊 فاصل القنوات كل ❪ '.$cuont_fasl.' ❫ سطر','callback_data'=>"button"]],
[['text'=>"+1 ➕",'callback_data'=>"zfasl1"],['text'=>"-1 ➖",'callback_data'=>"nfasl1"]],

[['text'=>"📊 معاينة الروابط في اللستة | $m3ainh",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"معاينة"],['text'=>"تعطيل ❌",'callback_data'=>"لامعاينة"]],

[['text'=>"📊 نمط نشر اللستة | $typee",'callback_data'=>"button"]],
[['text'=>"شفافه 🔆",'callback_data'=>"شفاف"],['text'=>"معرفات 🔆",'callback_data'=>"معرفات"],['text'=>"ماركدون 🔆 ",'callback_data'=>"ماركدون"]],


[['text'=>"📊 نمط الروابط في اللستة | $roabt",'callback_data'=>"button"]],
[['text'=>"روابط خاصة 🖇",'callback_data'=>"خاصة"],['text'=>"روابط عامة 🖇",'callback_data'=>"عامة"]],

[['text'=>"📊 نمط ترتيب القنوات | $typetrtib",'callback_data'=>"button"]],
[['text'=>"تصاعدي ⬇",'callback_data'=>"تصاعدي"],['text'=>"تنازلي ⬆",'callback_data'=>"تنازلي"],['text'=>"جهتين ↕",'callback_data'=>"جهتين"],
['text'=>"عشوائي 🔂",'callback_data'=>"عشوائي"]],

[['text'=>"📊 استقبال القنوات الخاصة | $as_ch_khash",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"as1"],['text'=>"تعطيل ❌",'callback_data'=>"as2"]],

[['text'=>"🫂 اعدادات الاعضاء | $order",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"av1"],['text'=>"تعطيل ❌",'callback_data'=>"di1"]],

[['text'=>"📊 اعدادات الرفع التلقائي | $cansh",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"av2"],['text'=>"تعطيل ❌",'callback_data'=>"di2"]],

[['text'=>"📊 اشعارات اللستة | $ash3atat",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"yesash"],['text'=>"تعطيل ❌",'callback_data'=>"noash"]],

[['text'=>"📊 حذف الايموجي | $tngeh",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"تنقيه"],['text'=>"تعطيل ❌",'callback_data'=>"لاتنقيه"]],

]
])
]);
}
function wathgsiting($chat_id,$IDBOT,$message_id){
@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);

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

$tngeh=$databot["info"]["تحكم"]["حذف الايموجي"];
 
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
🔧 الإعدَادَاتُـ 🔧 

                ✍🏼 الإدَارَة
        
              📩 الإسْتِقبَــالُـ
--
",
'reply_to_message_id'=>$message->mrssage_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"📊 عدد الاعضاء المقبولة | $count_memberyes ",'callback_data'=>"button"]],
[['text'=>"+10 ➕",'callback_data'=>"p10"],['text'=>"+100 ➕",'callback_data'=>"p100"],['text'=>"+1000 ➕",'callback_data'=>"p1000"]],
[['text'=>"-10 ➖",'callback_data'=>"m10"],['text'=>"-100 ➖",'callback_data'=>"m100"] ,['text'=>"-1000 ➖",'callback_data'=>"m1000"]],

[['text'=>"📊 عدد القنوات المطلوبة | $cuont_channel",'callback_data'=>"button"]],
[['text'=>"+1 ➕",'callback_data'=>"cz1"],['text'=>"+10 ➕",'callback_data'=>"cz10"]],
[['text'=>"-1 ➖",'callback_data'=>"cn1"],['text'=>"-10 ➖",'callback_data'=>"cn10"]],

[['text'=>"📊 عدد احرف القنوات | $cuont_hroof",'callback_data'=>"button"]],
[['text'=>"+1 ➕",'callback_data'=>"hz1"],['text'=>"+10 ➕",'callback_data'=>"hz10"]],
[['text'=>"-1 ➖",'callback_data'=>"hn1"],['text'=>"-10 ➖",'callback_data'=>"hn10"]],

[['text'=>'📊 فاصل القنوات كل ❪ '.$cuont_fasl.' ❫ سطر','callback_data'=>"button"]],
[['text'=>"+1 ➕",'callback_data'=>"zfasl1"],['text'=>"-1 ➖",'callback_data'=>"nfasl1"]],

[['text'=>"📊 معاينة الروابط في اللستة | $m3ainh",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"معاينة"],['text'=>"تعطيل ❌",'callback_data'=>"لامعاينة"]],

[['text'=>"📊 نمط نشر اللستة | $typee",'callback_data'=>"button"]],
[['text'=>"شفافه 🔆",'callback_data'=>"شفاف"],['text'=>"معرفات 🔆",'callback_data'=>"معرفات"],['text'=>"ماركدون 🔆 ",'callback_data'=>"ماركدون"]],

[['text'=>"📊 نمط الروابط في اللستة | $roabt",'callback_data'=>"button"]],
[['text'=>"روابط خاصة 🖇",'callback_data'=>"خاصة"],['text'=>"روابط عامة 🖇",'callback_data'=>"عامة"]],

[['text'=>"📊 نمط ترتيب القنوات | $typetrtib",'callback_data'=>"button"]],
[['text'=>"تصاعدي ⬇",'callback_data'=>"تصاعدي"],['text'=>"تنازلي ⬆",'callback_data'=>"تنازلي"],['text'=>"جهتين ↕",'callback_data'=>"جهتين"],
['text'=>"عشوائي 🔂",'callback_data'=>"عشوائي"]],

[['text'=>"📊 استقبال القنوات الخاصة | $as_ch_khash",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"as1"],['text'=>"تعطيل ❌",'callback_data'=>"as2"]],

[['text'=>"🫂 اعدادات الاعضاء | $order",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"av1"],['text'=>"تعطيل ❌",'callback_data'=>"di1"]],

[['text'=>"📊 اعدادات الرفع التلقائي | $cansh",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"av2"],['text'=>"تعطيل ❌",'callback_data'=>"di2"]],

[['text'=>"📊 اشعارات اللستة | $ash3atat",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"yesash"],['text'=>"تعطيل ❌",'callback_data'=>"noash"]],

[['text'=>"📊 حذف الايموجي | $tngeh",'callback_data'=>"button"]],
[['text'=>"✅ تفعيل",'callback_data'=>"تنقيه"],['text'=>"تعطيل ❌",'callback_data'=>"لاتنقيه"]],

]
])
]);
}
//////////////
if($data == "تصاعدي" or $data == "تنازلي" or $data == "جهتين" or $data == "عشوائي"){
if($chat_id == $gp){
$databot["info"]["تحكم"]["نوع الترتيب"]="$data";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
}
if($text == "تصاعدي" or $text == "تنازلي" or $text == "جهتين" or $text == "عشوائي"){
if($chat_id == $gp){
$databot["info"]["تحكم"]["نوع الترتيب"]="$text";
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅| تم ضبط الترتيب : $text 
ارسل الامر : انشاء
",'reply_to_message_id'=>$message->message_id,
]);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
}
if($data == "شفاف" or $data == "معرفات" or $data == "ماركدون"){
if($chat_id == $gp){
$databot["info"]["تحكم"]["نوع اللسته"]="$data";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
}
if($text == "شفاف" or $text == "معرفات" or $text == "ماركدون"){
if($chat_id == $gp){
$databot["info"]["تحكم"]["نوع اللسته"]="$text";
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
✅| تم ضبط اللستة : $text.
ارسل الامر انشاء.
",'reply_to_message_id'=>$message->message_id,
]);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
}
#####
if($data == "تنقيه"){
$result = "مفعلة ✅";
if($chat_id == $gp){
$databot["info"]["تحكم"]["حذف الايموجي"]="$result";
file_put_contents("data/tngeh.json",$result);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
}
if($data == "لاتنقيه"){
$result = "معطلة ❌";
if($chat_id == $gp){
unlink("data/tngeh.json");
$databot["info"]["تحكم"]["حذف الايموجي"]="$result";
file_put_contents("data/tngeh.json",$result);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
}
######
if($data == "av1"){
$result = "مفعلة ✅";
$databot["info"]["تحكم"]["اوامر الاعضاء"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "di1"){
$result = "معطلة ❌";
$databot["info"]["تحكم"]["اوامر الاعضاء"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "as1"){
$result = "مفعلة ✅";
$databot["info"]["تحكم"]["استقبال الخاصة"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "as2"){
$result = "معطلة ❌";
$databot["info"]["تحكم"]["استقبال الخاصة"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "خاصة" or $data == "عامة"){
if($chat_id == $gp){
$databot["info"]["تحكم"]["نوع الروابط"]="$data";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
}
if($data == "av2"){
$result = "مفعلة ✅";
$databot["info"]["تحكم"]["الرفع التلقائي"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "di2"){
$result = "معطلة ❌";
$databot["info"]["تحكم"]["الرفع التلقائي"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "معاينة" or $data == "لامعاينة"){
if($chat_id == $gp){
$databot["info"]["تحكم"]["معاينة الروابط"]="$data";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
}
if($data == "yesash"){
$result = "مفعلة ✅";
$databot["info"]["تحكم"]["اشعارات اللسته"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "noash"){
$result = "معطلة ❌";
$databot["info"]["تحكم"]["اشعارات اللسته"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
} 
$count_memberyes=$databot["info"]["تحكم"]["عدد الاعضاء"];
if($data == "p10"){
$result = $count_memberyes + 10;
$databot["info"]["تحكم"]["عدد الاعضاء"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "p100"){
$result = $count_memberyes + 100;
$databot["info"]["تحكم"]["عدد الاعضاء"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "p1000"){
$result = $count_memberyes + 1000;
$databot["info"]["تحكم"]["عدد الاعضاء"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "m10"){
$result = $count_memberyes - 10;
$databot["info"]["تحكم"]["عدد الاعضاء"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "m100"){
$result = $count_memberyes - 100;
$databot["info"]["تحكم"]["عدد الاعضاء"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "m1000"){
$result = $count_memberyes - 1000;
$databot["info"]["تحكم"]["عدد الاعضاء"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
#cuont_channel
if($data == "cz1"){
$result = $cuont_channel + 1;
$databot["info"]["تحكم"]["عدد القنوات"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "cz10"){
$result = $cuont_channel + 10;
$databot["info"]["تحكم"]["عدد القنوات"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "cn1"){
$result = $cuont_channel - 1;
$databot["info"]["تحكم"]["عدد القنوات"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "cn10"){
$result = $cuont_channel - 10;
$databot["info"]["تحكم"]["عدد القنوات"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
#cuont_hroof
if($data == "hz1"){
$result = $cuont_hroof + 1;
$databot["info"]["تحكم"]["عدد الحروف"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "hz10"){
$result = $cuont_hroof + 10;
$databot["info"]["تحكم"]["عدد الحروف"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "hn1"){
$result = $cuont_hroof - 1;
$databot["info"]["تحكم"]["عدد الحروف"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "hn10"){
$result = $cuont_hroof - 10;
$databot["info"]["تحكم"]["عدد الحروف"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "zfasl1"){
$result = $cuont_fasl + 1;
$databot["info"]["تحكم"]["فاصل القنوات"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}
if($data == "nfasl1"){
$result = $cuont_fasl - 1;
$databot["info"]["تحكم"]["فاصل القنوات"]="$result";
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
wathgsiting($chat_id,$IDBOT,$message_id);
}