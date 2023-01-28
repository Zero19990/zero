<?php

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
$gs=$databot["info"]["قروب الاستقبال"];
@$timejson = json_decode(file_get_contents("time.json"),true);
if($text=="توقيت" and $chat_id == $gp){
bot('sendMessage',[
'chat_id'=>$gp, 
'text'=>"
- اوامر التوقيت للبوت :
مكرر - ليوم :

نشر - حذف - ابدا - توقف - انشاء - فحص 
انشر - احذف 

- نمط تفعيل التوقيت :
 توقيت مكرر 6:00ص نشر
توقيت ليوم 6:00م حذف
",
]);
}
////////التواقيت/////// 
$ar_no3=array("مكرر","ليوم");
$ar_amr=array("حذف","نشر","ابدا","توقف","فحص","انشاء","انشر","احذف");

if(preg_match('/^(توقيت) (.*)/s',$text) and $chat_id == $gp){
$text1=str_replace(["  ","\n","توقيت "]," ",$text);
 $ex = explode(" ",$text1);
foreach($ex as $co=> $a){
$a=trim($a);
if(in_array($a,$ar_no3)){
$no3time=$a;
}
if(in_array($a,$ar_amr)){
$amrtime=$a;
}
if(strpos($a,":") !== false){
$time=$a;
if(strpos($a,"ص") !== false){
$tim = str_replace("ص","am",$a);
$time = str_replace("ص","صباحاً",$time);
$time1 = date('H-i',strtotime("$tim"));
}
if(strpos($a,"م") !== false){
$tim = str_replace("م","pm",$a);
$time = str_replace("م","مساء",$time);
$time1 = date('H-i',strtotime("$tim"));
}
}
}
if($no3time == "مكرر"){
$timejson["info"]["timeall"]["$time1"]="$amrtime";
$timejson["info"]["days"]["$time1"]="$amrtime";

file_put_contents("time1/time/$time1.txt","$amrtime");
file_put_contents("time1/days/$time1.txt","$amrtime");
}

if($no3time == "ليوم"){
$timejson["info"]["timeall"]["$time1"]="$amrtime";
$timejson["info"]["day"]["$time1"]="$amrtime";

file_put_contents("time1/time/$time1.txt","$amrtime");
file_put_contents("time1/days/$time1.txt","$amrtime");
file_put_contents("time1/day/$time1.txt","$amrtime");
}
file_put_contents("time.json", json_encode($timejson));

if($no3time !=null and $time !=null and $amrtime !=null){
bot('Sendmessage',[
'chat_id'=> $chat_id,
'text'=>" 
🕞 تم انشاء التوقيت بنجاح ✅ 
| نمط التوقيت : $no3time
| الوقت : $time 🕞
| الامر : $amrtime
",'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"🗑 حذف التوقيت ...🗑",'callback_data'=>"del_time ".$time1]]
]])
]);
}}

if(preg_match('/^(del_time) (.*)/s',$data) and $chat_id == $gp){
$data1 = explode(" ",$data);
$time1= $data1['1'];
bot('editmessagetext', [
'chat_id' => $chat_id,
'text'=>"✅| تم حذف التوقيت بنجاح.
🕞 $time1
",'message_id'=>$message_id,
'disable_web_page_preview'=>true,
]);
unset($timejson["info"]["timeall"]["$time1"]);
unset($timejson["info"]["day"]["$time1"]);
unset($timejson["info"]["days"]["$time1"]);
file_put_contents("time.json", json_encode($timejson));
}
if($text =="حذف التواقيت" and $chat_id == $gp){
unset($timejson["info"]);
file_put_contents("time.json", json_encode($timejson));
bot('SendMessage',[
'chat_id' => $chat_id,
'text'=>"🕞 تم حذف التواقيت بنجاح.
",'parse_mode'=>"html",
'reply_to_message_id'=>$message_id,
]);
}
if($text =="تواقيت" and $chat_id == $gp){
$timeall=$timejson["info"]["timeall"];
$s=0; $d=0;
foreach($timeall as $times=>$amrtime){
$del=str_replace("-","_",$times);
$delet="/del_".$del;
$times2=str_replace("-",":",$times);
$ex=explode(':',$times2);
$sa=$ex['0'];
$da=$ex['1'];
if($sa >= 13){
$saa=$sa-12;
$time3=$saa.":".$da." مساء";
}
if($sa == 12){
$saa=$sa;
$time3=$saa.":".$da." مساء";
}
if($sa < 12){
$time3=$times2." صباحاً";
}

if(isset($timejson["info"]["days"][$times])){
$s=1;
$timedays = $timedays."\n🕞 $time3 $amrtime \n🗑$delet";
}else{
$d=1;
$timeday = $timeday."\n🕞 $time3 $amrtime \n🗑$delet";
}
}
if($d==0)
{$timeday="🕞 لايوجد تواقيت ليوم واحد.";}
if($s==0)
{$timedays="🕞 لايوجد تواقيت مكررة يوميا.";}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"*⏰- تواقيت مكررة↯\n$timedays\n\n⏰- تواقيت ليوم واحد↯\n$timeday*
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
}
if(stristr($text,"/del_") and $chat_id == $gp){
$text=str_replace("/del_","",$text);
$text=str_replace("@".$userbot,"",$text);
$time1=str_replace("_","-",$text);
unset($timejson["info"]["timeall"]["$time1"]);
unset($timejson["info"]["day"]["$time1"]);
unset($timejson["info"]["days"]["$time1"]);
file_put_contents("time.json", json_encode($timejson));
bot('SendMessage', [
'chat_id' => $chat_id,
'text'=>"🕞 تم حذف التوقيت بنجاح",
]);
}

$timesss=file_get_contents("times.txt");
if($text=="ايقاف التواقيت" && $timesss!="❌" and $chat_id == $gp){
file_put_contents("times.txt", "❌");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"🕞 تم إيقاف التوقيت بنجاح.
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
}

if($text=="تفعيل التواقيت" && $timesss!="✅" and $chat_id == $gp){
file_put_contents("times.txt", "✅");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"🕞 تم تفعيل التوقيت بنجاح.
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
}

if($text=="ايقاف التواقيت" && $timesss=="❌" and $chat_id == $gp){
file_put_contents("times.txt", "❌");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"🕞 التواقيت متوقفة مسبقا
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
}
if($text=="تفعيل التواقيت" && $timesss=="✅" and $chat_id == $gp){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"🕞 التواقيت مفعله مسبقا 
",'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
]);
}