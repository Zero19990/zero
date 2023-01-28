<?php

@$databot = json_decode(file_get_contents("../../data/$IDBOT.json"),true);
$gp=$databot["info"]["قروب الاداره"];
bot('SendMessaage',[
'chat_id'=>$gp,
'text'=>"🕞 اتصال",
]);
if($_GET['wataw']){
$run_wataw=$_GET['wataw'];
}

if($run_wataw !="update"){
$run_wataw=null;
$timesss=file_get_contents("times.txt");
@$timejson = json_decode(file_get_contents("time.json"),true);

if($timesss=="✅"){
$t=time()+(3600 * 1);
for($i=0;$i<3;$i++){
$st=0;    
$todaydate = date('Y-m-d',$t);
$now_date=date('H-i',$t);
if(isset($timejson["info"]["timeall"][$now_date])){

if(isset($timejson["info"]["days"][$now_date])){
$arraydate=$timejson["info"]["date"][$todaydate];
}

if(isset($timejson["info"]["days"][$now_date]) and !in_array($now_date,$arraydate)){
$timejson["info"]["date"][$todaydate][]="$now_date";
$amr = $timejson["info"]["days"][$now_date];
$amr=trim($amr);
if($amr!=null){
$st=1;
}
}
if(isset($timejson["info"]["day"][$now_date])){
$amr = $timejson["info"]["day"][$now_date];
$amr=trim($amr);
if($amr!=null){
$st=1;
}
unset($timejson["info"]["day"][$now_date]);
unset($timejson["info"]["timeall"]["$now_date"]);
}
file_put_contents("time.json", json_encode($timejson));

if($st==1){
$get=bot('SendMessage',[
'chat_id'=>$gp,
'text'=>"🕞  $amr",
]);
$m= $get->result->message_id;
bot('SendMessage',[
'chat_id'=>$gp,
'text'=>"🕞 تنفيذ $amr",
]);
$text=trim($amr);
$chat_id=$gp;
require_once("function.php");
require_once("groupadmin.php");
require_once("fahs.php");
require_once("newlistpro.php");
require_once("postlist.php");
require_once("dellist.php");
#require_once("postlisttime.php");
#require_once("dellisttime.php");
break;
}}
}}
}