<?php

@$siting = json_decode(file_get_contents("../../botmake/siting.json"),true);
$start=$siting["info"]["كليشات"]["start"];
#كليشة استارت .
if($start==null){
$start="لم يتم تعيين كليشة الترحيب /start ";
}
#زر المطور 
$start_ky["inline_keyboard"]=[];

$zr_sudo=$siting["info"]["كليشات"]["zr_sudo"];
if($zr_sudo!=null){
$ex=explode('=',$zr_sudo);
$sname=trim($ex[0]);
$slink=trim($ex[1]);
$start_ky["inline_keyboard"][] = [['text'=>"$sname ",'url'=>"https://$slink"]];
}


@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];
$linkgs=$databot["info"]["رابط الاستقبال"];

$start_ky["inline_keyboard"][] = [['text'=>"➕ للاشتراك في اللستة . ",'callback_data'=>"ashtraklist"]];

$goanen=$databot["info"]["تحكم"]["كليشه قوانين"];
$start_ky["inline_keyboard"][] = [['text'=>"قناة بوتات",'url'=>"t.me/SAEEDFiles"]];
$start_ky["inline_keyboard"][] = [['text'=>"فريق سوريا",'url'=>"t.me/TeamSyria"]];


#زر قناة البوت 

$ch_sudo=$siting["info"]["كليشات"]["ch_sudo"];
if($ch_sudo!=null){
$ex=explode('=',$ch_sudo);
$cname=trim($ex[0]);
$clink=trim($ex[1]);
$start_ky["inline_keyboard"][] = [['text'=>"$cname ",'url'=>"$clink"]];
}

$reply_start= json_encode($start_ky);

@$infobots = json_decode(file_get_contents("../../botmake/infobots.json"),true);

$namebot=$infobots["info"][$userbot]["namebot"];
$idbot=$infobots["info"][$userbot]["idbot"];

if($text=="/start" and $from_id!=$admin){
if($reply_start==null){
$reply_start=null;
}

bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*🔖 | مرحبا : *[$name](tg://user?id=$id)*
في بوت اللستات المطورة حديثا.* 
",'disable_web_page_preview'=>true,
'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>$reply_start,
]);
} 


if($data=="hooome" and $from_id!=$admin){
if($reply_start==null){
$reply_start=null;
}

bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"*🔖 | مرحبا : *[$name](tg://user?id=$id)*
في بوت اللستات المطورة مجددا. *
",'disable_web_page_preview'=>true,
'parse_mode'=>"MarkDown",
'message_id'=>$message_id,
'reply_markup'=>$reply_start,
]);
}

if($data=="ashtraklist" and $from_id!=$admin){
if($linkgs==null){
$linkgs="لم يتم تعيين جروب الاستقبال";
}
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"
📑 *تعليمات الاشتراك في اللستة* :

- ارفع البوت *@$userbot* في قناتك ادمن
- اذا كانت قناتك عامة ارسل المعرف الى جروب الاستقبال.
- اذا كانت خاصة قم بتوجية منشور من القناة الى جروب الاستقبال.
----------------------
➕ مجموعة الاستقبال : *$linkgs*

",'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'عودة للخلف ' ,'callback_data'=>"hooome"]],
   ] 
   ])
]);
}
if($data=="goanen" and $from_id!=$admin){
if($goanen==null){
$goanen="لم يتم انشاء قوانين من قبل مالك البوت .";

}
bot('editmessagetext',[
'chat_id'=>$chat_id,
'text'=>"💠 قوانين : 
$goanen
",
'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>' عودة   ' ,'callback_data'=>"hooome"]],
   ] 
   ])
]);
}