<?php


$memberjson = json_decode(file_get_contents("members.json"),true);
$members=$memberjson["info"]["members"];
$count_mb = count($members);

$ban=$memberjson["info"]["ban"];
$count_ban = count($ban);

$bots=$infobots["info"];
$count_bots = count($bots);
if($text == "م" and in_array($from_id,$sudo)){

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي الادمن في قائمة التحكم الخاص 

- الاحصائية : 

• عدد الاعضاء : $count_mb

• المحظورين: $count_ban

• البوتات المصنوعة : $count_bots

#الاوامر النصية :
قفل البوت : لقفل البوت .
فتح البوت : لفتح البوت .
معلومات + معرف بوت : لعرض معلومات عنه.
حذف + معرف بوت : لحذف بوت مصنوع .
تعيين الادارة : لتعين قروب لادارة المصنع .

",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- تعيين رسالة /start ",'callback_data'=>"start"]],
[['text'=>"- تعيين رسالة /start للبوتات ",'callback_data'=>"startbot"]],
[['text'=>"- رسالة بداء البوتات ",'callback_data'=>"startmakebot"]],

[['text'=>"- زر المطور ",'callback_data'=>"zr_sudo"],['text'=>"- زر قناة المصنع ",'callback_data'=>"zr_chsudo"]],

[['text'=>"- كليشة معلومات عن البوت ",'callback_data'=>"klis_info"]]
,
[['text'=>"- اشتراك مدفوع ",'callback_data'=>"probotnew"],['text'=>"- الغاء اشتراك ",'callback_data'=>"delprobot"]],
[['text'=>"- ايقاف بوت ",'callback_data'=>"offbots"],['text'=>"- تشغيل بوت ",'callback_data'=>"onbots"]],

[['text'=>"- صنع ازرار شفافة ",'callback_data'=>"inline"]]
,
[['text'=>"- تفعيل الازرار ",'callback_data'=>"inline_yes"]
,
['text'=>"- تعطيل الازرار ",'callback_data'=>"inline_no"]]
,



[['text'=>"- التوجية من الاعضاء :$fwrmember",'callback_data'=>"fwrmember"]],
[['text'=>"- تنبية دخول الاعضاء : $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"- حظر عضو ",'callback_data'=>"ban"],['text'=>"- الغاء حظر عضو ",'callback_data'=>"unban"]],
[['text'=>"- مسح قائمة الحظر ",'callback_data'=>"unbanall"]],

[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],[['text'=>"- عرض قنوات الاشتراك الاجباري ",'callback_data'=>"viwechannel"]],
[['text'=>"- تعيين رسالة الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"- خيارات عرض الاشتراك الاجباري ",'callback_data'=>"null"]],
[['text'=>"- ازرار انلاين :$silk ",'callback_data'=>"silk"],
['text'=>"- الرسالة :$allch ",'callback_data'=>"allch"]],

]
])
]);
}

function sendwataw($chat_id,$message_id){

$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
$tnbih=$infosudo["info"]["tnbih"];
$silk=$infosudo["info"]["silk"];
$allch=$infosudo["info"]["allch"];
$memberjson = json_decode(file_get_contents("members.json"),true);
$members=$memberjson["info"]["members"];
$count_mb = count($members);

$ban=$memberjson["info"]["ban"];
$count_ban = count($ban);

$infobots=json_decode(file_get_contents("infobots.json"),true);

$bots=$infobots["info"];
$count_bots = count($bots);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي الادمن في قائمة التحكم الخاص 

- الاحصائية : 

• عدد الاعضاء : $count_mb

• المحظورين: $count_ban

• البوتات المصنوعة : $count_bots

#الاوامر النصية :
قفل البوت : لقفل البوت .
فتح البوت : لفتح البوت .
معلومات + معرف بوت : لعرض معلومات عنه.
حذف + معرف بوت : لحذف بوت مصنوع .
تعيين الادارة : لتعين قروب لادارة المصنع .

",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- تعيين رسالة /start ",'callback_data'=>"start"]],
[['text'=>"- تعيين رسالة /start للبوتات ",'callback_data'=>"startbot"]],
[['text'=>"- رسالة بداء البوتات ",'callback_data'=>"startmakebot"]],

[['text'=>"- زر المطور ",'callback_data'=>"zr_sudo"],['text'=>"- زر قناة المصنع ",'callback_data'=>"zr_chsudo"]],

[['text'=>"- كليشة معلومات عن البوت ",'callback_data'=>"klis_info"]]
,
[['text'=>"- اشتراك مدفوع ",'callback_data'=>"probotnew"],['text'=>"- الغاء اشتراك ",'callback_data'=>"delprobot"]],
[['text'=>"- ايقاف بوت ",'callback_data'=>"offbots"],['text'=>"- تشغيل بوت ",'callback_data'=>"onbots"]],

[['text'=>"- صنع ازرار شفافة ",'callback_data'=>"inline"]]
,
[['text'=>"- تفعيل الازرار ",'callback_data'=>"inline_yes"]
,
['text'=>"- تعطيل الازرار ",'callback_data'=>"inline_no"]]
,



[['text'=>"- التوجية من الاعضاء :$fwrmember",'callback_data'=>"fwrmember"]],
[['text'=>"- تنبية دخول الاعضاء : $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"- حظر عضو ",'callback_data'=>"ban"],['text'=>"- الغاء حظر عضو ",'callback_data'=>"unban"]],
[['text'=>"- مسح قائمة الحظر ",'callback_data'=>"unbanall"]],

[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],[['text'=>"- عرض قنوات الاشتراك الاجباري ",'callback_data'=>"viwechannel"]],
[['text'=>"- تعيين رسالة الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"- خيارات عرض الاشتراك الاجباري ",'callback_data'=>"null"]],
[['text'=>"- ازرار انلاين :$silk ",'callback_data'=>"silk"],
['text'=>"- الرسالة :$allch ",'callback_data'=>"allch"]],

]
])
]);
} 

@$infosudo = json_decode(file_get_contents("sudo.json"),true);
$sudoamr= $infosudo["info"]["amr"];
if($data == "probotnew"){
$infosudo["info"]["amr"]="probotnew";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"قم بارسال معرف مع عدد ايام الاشتراك بهذة الصورة .
@userbot+count day
مثال:
@botlist+10

",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="probotnew" and in_array($from_id,$sudo)){
$ex=explode('+',$text);
$userbot=trim($ex[0]);
$count_day=trim($ex[1]);
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$userbot) and is_numeric($count_day)) {
$userbot = str_replace("@","",$userbot);

$namebot=$infobots["info"][$userbot]["namebot"];
$idbot=$infobots["info"][$userbot]["idbot"];
$adminbot=$infobots["info"][$userbot]["admin"];


$dayc=86400;
$time=time()+(3600 * 1);

$ti=$time+($dayc * $count_day);

$projson = json_decode(file_get_contents("prodate.json"),true);
$projson["info"][$idbot]["pro"]="yes";
$projson["info"][$idbot]["dateon"]="$time";
$projson["info"][$idbot]["dateoff"]="$ti";
file_put_contents("prodate.json", json_encode($projson));


$dayon = date('Y/m/d',$time);
$timeon =date('H:i:s A',$time);
$dayoff = date('Y/m/d',$ti);
$timeoff =date('H:i:s A',$ti);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم اضافة الاشتراك المدفوع بنجاح 

ℹ معلومات البوت 
يوزر البوت : @$userbot
ايدي البوت : $idbot

ℹمعلومات الاشتراك 
- وقت الاشتراك : 
⏰ $timeon
📅 $dayon
- موعد انتهاء الاشتراك : 
⏰ $timeoff
📅 $dayoff
",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

bot('sendmessage',[
'chat_id'=>$adminbot, 
'text'=>"✅ تم اضافة اشتراك مدفوع من قبل المطور بنجاح 

ℹ معلومات بوتك 
يوزر البوت : @$userbot

ℹمعلومات الاشتراك 
- وقت الاشتراك : 
⏰ $timeon
📅 $dayon
- موعد انتهاء الاشتراك : 
⏰ $timeoff
📅 $dayoff
",

]);

}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"❌❌ خطاء معلومات غير صحيحة

يوزر البوت : @$userbot
ايدي البوت : $idbot
عدد الايام : $count_day
",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- معاودة المحاولة  ",'callback_data'=>"probotnew"]],
]
])
]);

}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}

#الغاء الاشتراك المدفوع
@$infosudo = json_decode(file_get_contents("sudo.json"),true);
if($data == "delprobot"){
$infosudo["info"]["amr"]="delprobot";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"قم بارسال معرف البوت الذي تود الغاء اشتراكة المدفوع 
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="delprobot" and in_array($from_id,$sudo)){

if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text) ) {
$userbot = str_replace("@","",$text);


$idbot=$infobots["info"][$userbot]["idbot"];
$adminbot=$infobots["info"][$userbot]["admin"];
$projson = json_decode(file_get_contents("prodate.json"),true);
if(isset($projson["info"][$idbot]) and isset($infobots["info"][$userbot])){
unset($projson["info"][$idbot]);
file_put_contents("prodate.json", json_encode($projson));



bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم حذف الاشتراك المدفوع بنجاح 

ℹ معلومات البوت 
يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);

bot('sendmessage',[
'chat_id'=>$adminbot, 
'text'=>"🚫 تم حذف اشتراك مدفوع من قبل المطور بنجاح 

ℹ معلومات بوتك 
يوزر البوت : @$userbot

",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"❌❌ هذا البوت لا يمتلك اشتراك مدفوع . او لم يتم صنعة من مصنعك .
يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة ",'callback_data'=>"home"]],
]
])
]);
}

}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"❌❌ خطاء معلومات غير صحيحة

يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- معاودة المحاولة  ",'callback_data'=>"delprobot"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}


#ايقاف البوتات 

@$infosudo = json_decode(file_get_contents("sudo.json"),true);
if($data == "offbots"){
$infosudo["info"]["amr"]="offbots";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"🔒 ايقاف البوتات ...
قم بارسال معرف البوت الذي تود ايقافة .
⚠ تنوية : سيتوقف البوت نهائيا عن العمل حتى لو قام العضو بحذف بوته وصناعتة من جديد ..
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}
if($text  and $text !="/start" and $sudoamr=="offbots" and in_array($from_id,$sudo)){

if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text) ) {
$userbot = str_replace("@","",$text);


$idbot=$infobots["info"][$userbot]["idbot"];
if(isset($infobots["info"][$userbot])){

$adminbot=$infobots["info"][$userbot]["admin"];
$stopbot = json_decode(file_get_contents("stopbot.json"),true);
$stopbot["info"][$userbot]["stop"]="yes";
file_put_contents("stopbot.json", json_encode($stopbot));



bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم 🔒 ايقاف البوت عن العمل ..
ℹ معلومات البوت 
يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);

bot('sendmessage',[
'chat_id'=>$adminbot, 
'text'=>"🚫 تم ايقاف بوتك عن العمل عن طريق مطور البوت 
ℹ معلومات بوتك 
يوزر البوت : @$userbot

",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"❌❌ خطاء هذا البوت لم يصنع من قبل في مصنعك 
يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة ",'callback_data'=>"home"]],
]
])
]);
}

}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"❌❌ خطاء معلومات غير صحيحة

يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- معاودة المحاولة  ",'callback_data'=>"delprobot"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}




#إعادة تشغيل البوتات

@$infosudo = json_decode(file_get_contents("sudo.json"),true);
if($data == "onbots"){
$infosudo["info"]["amr"]="onbots";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"🔓 تشغيل البوتات ...
قم بارسال معرف البوت الذي تود إعادة تشغيله .
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="onbots" and in_array($from_id,$sudo)){

if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$text) ) {
$userbot = str_replace("@","",$text);


$idbot=$infobots["info"][$userbot]["idbot"];
if(isset($infobots["info"][$userbot])){

$adminbot=$infobots["info"][$userbot]["admin"];
$stopbot = json_decode(file_get_contents("stopbot.json"),true);
if($stopbot["info"][$userbot]["stop"]=="yes"){
$stopbot["info"][$userbot]["stop"]="no";
file_put_contents("stopbot.json", json_encode($stopbot));



bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم ✅ إعادة تشغيل البوت  بنجاح ..
ℹ معلومات البوت 
يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
]);

bot('sendmessage',[
'chat_id'=>$adminbot, 
'text'=>"✅ تم ♻إعادة تشغيل بوتك من قبل المطور .
ℹ معلومات بوتك 
يوزر البوت : @$userbot

",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"❌❌ خطاء هذا البوت لم يكن موقفاً
يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة ",'callback_data'=>"home"]],
]
])
]);


}


}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"❌❌ خطاء هذا البوت لم يصنع من قبل في مصنعك 
يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة ",'callback_data'=>"home"]],
]
])
]);
}

}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"❌❌ خطاء معلومات غير صحيحة

يوزر البوت : @$userbot
ايدي البوت : $idbot
",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- معاودة المحاولة  ",'callback_data'=>"delprobot"]],
]
])
]);

}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}








#home
if($data == "home" and in_array($from_id,$sudo)){
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}

 ###wataw### 
#رسالة ستارت
@$infosudo = json_decode(file_get_contents("sudo.json"),true);
$sudoamr= $infosudo["info"]["amr"];
if($data == "start"){
$infosudo["info"]["amr"]="start";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص كليشة /start
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="start" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة /start 
-الكليشة : 
$text ",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["start"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}
#كليشة معلومات البوت 
if($data == "klis_info"){
$infosudo["info"]["amr"]="klis_info";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص رسالة كليشة نبذة عن البوت
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="klis_info" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة نبذة عن البوت 
-الكليشة : 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["klish_info"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}
#التوجية من الاعضاء 
if($data == "fwrmember"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
if($fwrmember=="مفعل"){
$infosudo["info"]["fwrmember"]="معطل";
}
if($fwrmember=="معطل"){
$infosudo["info"]["fwrmember"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
#تنبية الدخول
if($data == "tnbih"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$tnbih=$infosudo["info"]["tnbih"];
if($tnbih=="مفعل"){
$infosudo["info"]["tnbih"]="معطل";
}
if($tnbih=="معطل"){
$infosudo["info"]["tnbih"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
#حظر عضو 

if($data == "ban"){
$infosudo["info"]["amr"]="ban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال أيدي العضو لحظره",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="ban" and in_array($from_id,$sudo) and is_numeric($text)){
if(!in_array($text,$ban)){

member($text,'ban');
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حظر العضو بنجاح 
$text",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"❌ لقد قام الادمن بحظرك من استخدام البوت",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 العضو محظور مسبقاً",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}
#الغاء الحظر
if($data == "unban"){
$infosudo["info"]["amr"]="unban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال أيدي العضو للإلغاء الحظر عنه",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="unban" and in_array($from_id,$sudo) and is_numeric($text)){
if(in_array($text,$ban)){
$memberjson = json_decode(file_get_contents("members.json"),true);
$ban=$memberjson["info"]["ban"];

$index = array_search($text, $ban);
unset($memberjson["info"]["ban"][$index]);
$memberjson["info"]["ban"]=array_values($memberjson["info"]["ban"]);
file_put_contents("members.json", json_encode($memberjson));

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم الغاء حظر العضو بنجاح 
$text",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"✅ لقد قام الادمن بالغاء الحظر عنك  .",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 العضو ليسِ محظور مسبقاً",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}
$count_ban = count($ban);
if($data == "unbanall"){
if($countban > 0){
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم مسح قائمة المحظورين بنجاح ",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}else{
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"🚫 ليس لديك اعضاء محظورين ",
        'show_alert'=>true
        ]);

}
}

#مسح قناة 

if($data == "delchannel" and in_array($from_id, $sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$s ){

$namechannel= $s["name"];
$st= $s["st"];
$userchannel= $s["user"];
if($namechannel!=null){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>'🚫 حذف','callback_data'=>'deletchannel '.$co],['text'=>$st,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بالضغط على خيار الحذف بالاسفل 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}

if(preg_match('/^(deletchannel) (.*)/s', $data)){
$nn = str_replace('deletchannel ',"",$data);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف القناة بنجاح 
-id $nn
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- عودة  ",'callback_data'=>"delchannel"]],
 ]])
]);
unset($infosudo["info"]["channel"][$nn]);
file_put_contents("sudo.json", json_encode($infosudo));
}


#اضافة قناة 

if($data == "addchannel"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];
$count=count($orothe);
if($count<4){
$infosudo["info"]["amr"]="addchannel";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- اذا كانت القناة التي تريد اضافتها عامة قم بارسال معرفها .
* اذا كانت خاصة قم بإعادة توجية منشور من القناة إلى هنا .
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- 🚫 لا يمكنك اضافة اكثر من  3 قنوات للإشتراك الاجباري 
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
}
}
if($text  and $text !="/start" and $sudoamr=="addchannel" and in_array($from_id,$sudo) and !$message->forward_from_chat ){

$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$idchan=$ch_id;
if($ch_id != null){

  $checkadmin = getChatstats($text,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->title;
$infosudo["info"]["channel"][$ch_id]["st"]="عامة";
$infosudo["info"]["channel"][$ch_id]["user"]="$text";
$infosudo["info"]["channel"][$ch_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : $text 
name : $namechannel
id : $ch_id
 ", 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إضافة قناة آخرى  ",'callback_data'=>"addchannel"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
❌ لم تتم إضافة القناة لا توجد قناة تمتلك هذا المعرف 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- عودة   ",'callback_data'=>"home"]],
 ]])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}


if($message->forward_from_chat and $sudoamr=="addchannel" and in_array($from_id, $sudo)){
$id_channel= $message->forward_from_chat->id;
if($id_channel != null){

  $checkadmin = getChatstats($id_channel,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id_channel"))->result->title;
$infosudo["info"]["channel_id"]="$id_channel";


bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : • قناة خاصة • 
name : $namechannel
id : $id_channel

*يجب عليك ارسال رابط القناة الخاص قم بارسالة الان
 ", 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- الغاء ",'callback_data'=>"addchannel"]],
 ]])
 ]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}
}
$infosudo["info"]["amr"]="channel_id";
file_put_contents("sudo.json", json_encode($infosudo));
}
$channel_id=$infosudo["info"]["channel_id"];

if($text  and $text !="/start" and $sudoamr=="channel_id" and in_array($from_id,$sudo) and !$message->forward_from_chat ){

  $checkadmin = getChatstats($channel_id,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$channel_id"))->result->title;
$infosudo["info"]["channel"][$channel_id]["st"]="خاصة";
$infosudo["info"]["channel"][$channel_id]["user"]="$text";
$infosudo["info"]["channel"][$channel_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
link : $text 
name : $namechannel
id : $channel_id
 ", 'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إضافة قناة آخرى  ",'callback_data'=>"addchannel"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);
}
$infosudo["info"]["amr"]="null";
$infosudo["info"]["channel_id"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}


# عرض القنوات

if($data == "viwechannel" and in_array($from_id, $sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co ){

$namechannel= $co["name"];
$st= $co["st"];
$userchannel= $co["user"];
if($namechannel!=null){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>$userchannel,'callback_data'=>'null'],['text'=>$st,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- هذة هي قنوات الاشتراك الاجباري الخاصة بك 
",
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);
}

#كليشة الاشتراك 

if($data == "klish_sil"){
$infosudo["info"]["amr"]="klish_sil";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال كليشة الاشتراك الاجباريي 
","message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}
if($text  and $text !="/start" and $sudoamr=="klish_sil" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة الاشتراك الاجباري 
-الكليشة : 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["klish_sil"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}

#تابع الاشتراك الاجباري
if($data == "silk"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$skil=$infosudo["info"]["silk"];
if($skil=="مفعل"){
$infosudo["info"]["silk"]="معطل";
}
if($skil=="معطل"){
$infosudo["info"]["silk"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}

if($data == "allch"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$allch=$infosudo["info"]["allch"];
if($allch=="مفردة"){
$infosudo["info"]["allch"]="مجموعة";
}
if($allch=="مجموعة"){
$infosudo["info"]["allch"]="مفردة";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendwataw($chat_id,$message_id);
}
#توجية للادمن 

if($message and $fwrmember=="مفعل"){
bot('ForwardMessage',[
 'chat_id'=>$gp,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
}

if($data == "inline" and in_array($from_id,$sudo) ){

bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تستطيع اضافة ازرار شفاف لاسفل اللسته 

",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"✴ عرض الازرار",'callback_data'=>"viewazrar"]],[['text'=>"- صنع ازرار جديدة",'callback_data'=>"addazrzr"]],

]
])
]); 
}









#صنع ازرار شفافة...
if($data == "addazrzr" and in_array($from_id,$sudo) ){
$infosudo["info"]["amr"]="addazrzr";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
لصنع ازرار شفافه عموديه قم بكتابه 
اسم القناه = رابط القناه
اسم القناه = رابط القناه

لصنع ازرار شفافه افقية قم بكتابه 
اسم القناه = رابط القناه + اسم القناه = رابط القناه

*ملاحظة :
عدد الازرار العمودية المسموح بها :5
 عدد الازرار الافقية المسموح بها :3
",
]);
}

if($text  and $text !="/start" and $sudoamr=="addazrzr" and in_array($from_id,$sudo)){

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
"text"=>"هذه هي الازرار التي قمت باضافتها للسته 
 عدد الازرار : $coz  
",
'disable_web_page_preview'=>true,
"reply_markup"=>$listaziadh
]);
file_put_contents("data/co.txt", "$coz");
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم الانشاء بنجاح هل تريد الحفظ ؟.
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>" حفظ ", 'callback_data'=>"seveazrarnew"]],
]
])
]);
}else
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" المعــــذرة تجَإوزت عــــدد آإلآزرإر آلــــشفآإفةة آلمسِمــــوحِ بهــــآإ  ",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"محاولة مره اخرئ", 'callback_data'=>"addazrzr"]],
]
])
]);

}


if($data == "seveazrarnew" and in_array($from_id,$sudo) ){
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"
تم حفظ الازرار بنجاح 
",
'reply_to_message_id'=>$message->message_id,
]);
unlink("data/listaziadh.php");

$getazrar=file_get_contents("data/azrar.txt");
$coz=file_get_contents("data/co.txt");

$azrarlist = json_decode(file_get_contents("azrzrlist.json"),true);
$azrarlist["info"]["text"]="$getazrar";
$azrarlist["info"]["count"]="$coz";
file_put_contents("azrzrlist.json", json_encode($azrarlist));

unlink("data/co.txt");
unlink("data/azrar.txt");
}

#ايقاف الازرار...
$azrarlist = json_decode(file_get_contents("azrzrlist.json"),true);
$st_azrar=$azrarlist["info"]["st"];
if($st_azrar=="yes"){
$txtst="✅ مفعلة";

}else{
$txtst="❌ معطلة";
}

if($data == "inline_no" and in_array($from_id,$sudo) ){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ℹاهلا بك في قسم ايقاف ازرار اسفل اللستة .
لإيقاف الزرار عن كل البوتات قم بالضغط على : ايقاف للكل 
لإيقاف الازرار لبوتات محددة قم بالضغط على : تخصيص .

- حالة الازرار حاليا : $txtst
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"🔗 ايقاف للكل ",'callback_data'=>"stopazrzrall"],['text'=>"💡 تخصيص ",'callback_data'=>"stopazrzrbot"]],
[['text'=>"عودة", 'callback_data'=>"home"]],
]
])
]); 
}

#للكل 

if($data == "stopazrzrall" and in_array($from_id,$sudo) ){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"⚠ هل انت متاكد من ايقاف الازرار لكل البوتات المصنوعة ؟!

- حالة الازرار حاليا : $txtst
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"- YES  ",'callback_data'=>"stopazrzrallyes"],['text'=>" NO ! ",'callback_data'=>"inline_no"]],
]
])
]); 
}

if($data == "stopazrzrallyes" and in_array($from_id,$sudo) ){

$azrarlist["info"]["st"]="no";

file_put_contents("azrzrlist.json", json_encode($azrarlist));


bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"✅ تم ايقاف الازرار الشفافة لكل البوتات ...
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"عودة  ",'callback_data'=>"home"]],
]
])
]); 
}

#تخصيص


if($data == "stopazrzrbot" and in_array($from_id,$sudo) ){
$infosudo["info"]["amr"]="stopazrzrbot";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ℹ لإيقاف الازرار لبوتات مخصصه قم بإرسال معرفات البوتات وساقوم بإستثانهم من الازرار .
لرؤية البوتات المستثناه قم بالضغط على عرض المخصصين 
- حالة الازرار حاليا : $txtst
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"عرض المخصصين ",'callback_data'=>"viewnotazrzr"],['text'=>" عودة ",'callback_data'=>"home"]],
]
])
]); 
}
 @$infobots = json_decode(file_get_contents("infobots.json"),true);


if($text  and $text !="/start" and $sudoamr=="stopazrzrbot" and in_array($from_id,$sudo)){

$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
$textt = str_replace("\n"," ",$text);
$textt = str_replace(" ","=",$textt);
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$textt)){
$wataw=20000;
$text_user=$textt;
}}



if($wataw==20000){
$userbotsall = explode("=",$text_user);
$wataw=null;
for($l=0;$l<count($userbotsall);$l++){
if($userbotsall[$l]!=""){

$use=$userbotsall[$l];
if(strpos($use,'@')!== false){
$userbot=str_replace("@","",trim($use));

if(isset($infobots["info"][$userbot])){
$azrarlist = json_decode(file_get_contents("azrzrlist.json"),true);
$arraybot=$azrarlist["info"]["stoparray"];
if(!in_array($userbot,$arraybot)){
$azrarlist["info"]["stoparray"][]="$userbot";
$infotxt="$infotxt\n✅|$use";

}else{
$infotxt="$infotxt\n♻|$use";
}
}else{
$infotxt="$infotxt\n❌|$use";
}
}else{
$infotxt="$infotxt\n🚫|$use";
}
}
}
file_put_contents("azrzrlist.json", json_encode($azrarlist));

bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ℹ معلومات التخصيص
$infotxt
❌ تعطيل 
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"عرض المخصصين ",'callback_data'=>"viewnotazrzr"],['text'=>" عودة ",'callback_data'=>"inline_no"]],
]
])
]); 
}
#عرض المخصصين.


if($data == "viewnotazrzr" and in_array($from_id,$sudo) ){
$azrarlist = json_decode(file_get_contents("azrzrlist.json"),true);
$arraybot=$azrarlist["info"]["stoparray"];
foreach($arraybot as $ues ){
$tst="$tst\n @$ues";
}
$coo=count($arraybot);
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ℹ البوتات التي تم ايقاف الازرار عليها هي ($coo) بوت : 
-----------------------------
$tst


- حالة الازرار حاليا : $txtst
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>" عودة ",'callback_data'=>"home"]],
]
])
]); 
}

#تفعيل البوتات ...


if($data == "inline_yes" and in_array($from_id,$sudo) ){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ℹاهلا بك في قسم ✅تفعيل ازرار اسفل اللستة .
لتفعيل الزرار لكل البوتات قم بالضغط على : تفعيل للكل 
لتفعيل الازرار لبوتات محددة قم بالضغط على : تخصيص .

- حالة الازرار حاليا : $txtst
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"🔗 تفعيل للكل ",'callback_data'=>"nostopazrzrall"],['text'=>"💡 تخصيص ",'callback_data'=>"stopazrzrbot"]],
[['text'=>"عودة", 'callback_data'=>"home"]],
]
])
]); 
}

#للكل 

if($data == "nostopazrzrall" and in_array($from_id,$sudo) ){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"⚠ هل انت متاكد من ✅تفعيل الازرار لكل البوتات المصنوعة ؟!
- سيتم الغاء تخصيص البوتات المستثناه من الايقاف .
- حالة الازرار حاليا : $txtst
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"- YES  ",'callback_data'=>"nostopazrzrallyes"],['text'=>" NO ! ",'callback_data'=>"inline_yes"]],
]
])
]); 
}

if($data == "nostopazrzrallyes" and in_array($from_id,$sudo) ){

$azrarlist["info"]["st"]="yes";
unset($azrarlist["info"]["stoparray"]);
file_put_contents("azrzrlist.json", json_encode($azrarlist));


bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"✅ تم تفعيل ✅ الازرار الشفافة لكل البوتات ...
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"عودة  ",'callback_data'=>"home"]],
]
])
]); 
}

#تخصيص


if($data == "nostopazrzrbot" and in_array($from_id,$sudo) ){
$infosudo["info"]["amr"]="nostopazrzrbot";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ℹ لتفعيل ✅ الازرار لبوتات مخصصه قم بإرسال معرفات البوتات وساقوم بحذفهم من الاستثناء من الازرار .

- حالة الازرار حاليا : $txtst
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>" عودة ",'callback_data'=>"home"]],
]
])
]); 
}
 @$infobots = json_decode(file_get_contents("infobots.json"),true);


if($text  and $text !="/start" and $sudoamr=="nostopazrzrbot" and in_array($from_id,$sudo)){

$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
$textt = str_replace("\n"," ",$text);
$textt = str_replace(" ","=",$textt);
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$textt)){
$wataw=200000;
$text_user=$textt;
}}



if($wataw==200000){
$userbotsall = explode("=",$text_user);
$wataw=null;
for($l=0;$l<count($userbotsall);$l++){
if($userbotsall[$l]!=""){

$use=$userbotsall[$l];
if(strpos($use,'@')!== false){
$userbot=str_replace("@","",trim($use));

if(isset($infobots["info"][$userbot])){
$azrarlist = json_decode(file_get_contents("azrzrlist.json"),true);
$arraybot=$azrarlist["info"]["stoparray"];
if(in_array($userbot,$arraybot)){
$azrarlist = json_decode(file_get_contents("azrzrlist.json"),true);
$index = array_search($userbot, $arraybot);
unset($azrarlist["info"]["stoparray"][$index]);

$infotxt="$infotxt\n✅|$use";

}else{
$infotxt="$infotxt\n♻|$use";
}
}else{
$infotxt="$infotxt\n❌|$use";
}
}else{
$infotxt="$infotxt\n🚫|$use";
}
}
}
$azrarlist["info"]["stoparray"]=array_values($azrarlist["info"]["stoparray"]);

file_put_contents("azrzrlist.json", json_encode($azrarlist));

bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ℹ معلومات التخصيص
$infotxt
✅ تفعيل 
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"عرض المخصصين ",'callback_data'=>"viewnotazrzr"],['text'=>" عودة ",'callback_data'=>"inline_yes"]],
]
])
]); 
}
#عرض المخصصين.



if($text == "تعيين الادارة" or $text == "تفعيل الادارة" or $text == "تفعيل الاداره" 
){
if(in_array($from_id,$sudo)){
if($type=="supergroup" or $type=="group"){
$infosudo["info"]["gp"]="$chat_id";
file_put_contents("sudo.json", json_encode($infosudo));
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"✅ تم تعيين هذا القروب ليكون قروبا للادارة 
",
'reply_to_message_id'=>$message->message_id, 
]);
}
}
}
#ستارات لكل البوتات 



if($data == "startbot"){
$infosudo["info"]["amr"]="startbot";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص كليشة /start
لجميع البوتات المصنوعة   
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="startbot" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة /start لكل البوتات بنجاح  ..

-الكليشة : 
$text ",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
@$siting = json_decode(file_get_contents("siting.json"),true);
$siting["info"]["كليشات"]["start"]="$text";
 file_put_contents("siting.json", json_encode($siting));
}



#ذر المطور

if($data == "zr_sudo"){
$infosudo["info"]["amr"]="zr_sudo";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"ارسل نص الزر = رابط الزر 
مثال 
مطور البوت = t.me/wataw
",
"message_id"=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
[['text'=>"حذف الزر السابق ",'callback_data'=>"delzr_sudo"]],
]
])
]);
}
if($data == "delzr_sudo"){
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
@$siting = json_decode(file_get_contents("siting.json"),true);
unset($siting["info"]["كليشات"]["zr_sudo"]);
 file_put_contents("siting.json", json_encode($siting));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم حذف الزر السابق بنجاح ",
"message_id"=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="zr_sudo" and in_array($from_id,$sudo)){
$ex=explode('=',$text);
$sname=trim($ex[0]);
$slink=trim($ex[1]);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ الزر كما في الزر اسفل 👇👇

 ",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"$sname ",'url'=>"https://$slink"]],
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
@$siting = json_decode(file_get_contents("siting.json"),true);
$siting["info"]["كليشات"]["zr_sudo"]="$text";
 file_put_contents("siting.json", json_encode($siting));
}
#زر قناة المصنع ..

if($data == "zr_chsudo"){
$infosudo["info"]["amr"]="zr_chsudo";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"ارسل نص الزر = رابط الزر 
مثال 
قناة البوت  = t.me/TeamSyria
",
"message_id"=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
[['text'=>"حذف الزر السابق ",'callback_data'=>"delzr_chsudo"]],

]
])
]);
}
if($data == "delzr_chsudo"){
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
@$siting = json_decode(file_get_contents("siting.json"),true);
unset($siting["info"]["كليشات"]["ch_sudo"]);
 file_put_contents("siting.json", json_encode($siting));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"✅ تم حذف الزر السابق بنجاح ",
"message_id"=>$message_id,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

}


if($text  and $text !="/start" and $sudoamr=="zr_chsudo" and in_array($from_id,$sudo)){
$ex=explode('=',$text);
$sname=trim($ex[0]);
$slink=trim($ex[1]);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ الزر كما في الزر اسفل 👇👇

 ",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"$sname ",'url'=>"https://$slink"]],
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
@$siting = json_decode(file_get_contents("siting.json"),true);
$siting["info"]["كليشات"]["ch_sudo"]="$text";
 file_put_contents("siting.json", json_encode($siting));
}


#كليشة بداء البوتات 

if($data == "startmakebot"){
$infosudo["info"]["amr"]="startmakebot";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص الكليشة الترحيبية التي سيتم ارسالها لخاص البوت المصنوع لتصل الا ادمن البوت 
لجميع البوتات المصنوعة   
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $sudoamr=="startmakebot" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة بداء البوتات لكل البوتات بنجاح  ..

-الكليشة : 
$text ",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
@$siting = json_decode(file_get_contents("siting.json"),true);
$siting["info"]["كليشات"]["make"]="$text";
 file_put_contents("siting.json", json_encode($siting));
}

