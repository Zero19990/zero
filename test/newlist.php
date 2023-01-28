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
$a3la=$databot["info"]["تحكم"]["اعلى"];
$asfl=$databot["info"]["تحكم"]["اسفل"];
$fasl=$databot["info"]["تحكم"]["فاصل"];
$no3lissh=$databot["info"]["تحكم"]["amodin"];
#انشاء
$m3ainh=$databot["info"]["تحكم"]["معاينة الروابط"];
if(!$m3ainh or $m3ainh=="لامعاينة"){
$m3ainhr="true";
}else{
$m3ainhr="false";
}
if(!$a3la or $a3la==""){
$a3la="*.*";
}
#مدفوع ...
$projson = json_decode(file_get_contents("../../botmake/prodate.json"),true);
$probotlist=$projson["info"][$IDBOT]["pro"];

$azrarlist = json_decode(file_get_contents("../../botmake/azrzrlist.json"),true);
$getazrarlist=$azrarlist["info"]["text"];
$countazrarlist=$azrarlist["info"]["count"];

@$datajson = json_decode(file_get_contents("data/channels.json"),true);

$arrayansh=$datajson["info"]["انشاء"];
if($text == "انشااء" and $chat_id == $gp ){
if($typee=="شفاف" or $typee==null ){
unlink("data/listtext.txt");
unlink("data/list.json");
file_put_contents("data/listtext.txt", "$a3la\n");

if($no3lissh == null or $no3lissh == 'no'){
foreach($arrayansh as $channel=>$info ){
$res = $info["res"];
$user = $info["link"];
$namech = $info["name"];
$co_zir=$co_zir+1;
$link="$user";
$gettsmimshfaf= file_get_contents("tsmimshfaf.txt");
if ($gettsmimshfaf!=null){
$tsmim=str_replace(["ME","NE"],["$res","$namech"],"$gettsmimshfaf");
}else{
$tsmim="$res| $namech";
}
if($tsmim == null){
$tsmim="$res| $namech";
}
$coz=file_get_contents("data/coz.txt");
$co_z=$co_zir+$coz+$countazrarlist ;

if($co_z<=99){
listin($tsmim,$link,"1");
}else{
listmark($res,$namech,$link);
}
}
}else{
$arraych=$datajson["info"]["فحص"]["yeschannel"];
for($i=0;$i<count($arraych);$i++){
if($arraych[$i] != ""){
$id=$arraych[$i];
$info=$datajson["info"]["انشاء"][$id];
$res = $info["res"];
$user = $info["link"];
$namech = $info["name"];
$link="$user";
$wat=$i+1;
$id2=$arraych[$wat];
$info2=$datajson["info"]["انشاء"][$id2];
$res2 = $info2["res"];
$user2 = $info2["link"];
$namech2 = $info2["name"];
$link2="$user2";
$gettsmimshfaf= file_get_contents("tsmimshfaf.txt");
if ($gettsmimshfaf!=null){
$tsmim=str_replace(["ME","NE"],["$res","$namech"],"$gettsmimshfaf");
$tsmim2=str_replace(["ME","NE"],["$res2","$namech2"],"$gettsmimshfaf");
}else{
$tsmim="$res| $namech";
$tsmim2="$res2| $namech2";
}
if($tsmim == null){
$tsmim="$res| $namech";
$tsmim2="$res2| $namech2";
}

$coz=file_get_contents("data/coz.txt");
$co_z=$i+$coz+$countazrarlist ;
if($co_z< 98){
if($arraych[$wat]!="" ){
listin("$tsmim#str#$tsmim2","$link#str#$link2","2");
$i++;
}else{
listin($tsmim,$link,"1");
}
}else{
listmark($res,$namech,$link);
}
}
}
}
$getazrar=file_get_contents("data/addazrar.txt");
if($getazrar!=null){
azrar($getazrar);}
if($getazrarlist!=null){
azrar($getazrarlist);}

@$list = json_decode(file_get_contents("data/list.json"),true);
$reply_markup=json_encode($list);
if($list==null){
$reply_markup=null;
}
$listtext = file_get_contents("data/listtext.txt");
bot('sendMessage',[
"chat_id"=>$chat_id,
"text"=>"$listtext
",'parse_mode'=>markdown,
'disable_web_page_preview'=>$m3ainhr,
"reply_markup"=>$reply_markup
]);
}
}
##
if($text == "انشااء" and  $typee == "ماركدون" and $chat_id == $gp){
$no3ansha="ماركدون";
}
if($no3ansha == "ماركدون"){
$no3ansha="";
unlink("data/list.json");
file_put_contents("data/listtext.txt","$a3la\n");

$f=null;
$co=null;
foreach($arrayansh as $channel=>$info){
$co++;
$res = $info["res"];
$user = $info["link"];
$namech = $info["name"];
$link="$user";
if($co<71){

$gettsmimmark= file_get_contents("tsmimmark.txt");
$tsmim=str_replace(["ME","MARK"],["$res","[$namech]($link)"],"$gettsmimmark");

if($gettsmimmark != null){
file_put_contents("data/listtext.txt","$tsmim \n", FILE_APPEND);
}else{
file_put_contents("data/listtext.txt","$res| [$namech]($link)\n", FILE_APPEND);
}

if($cuont_fasl!=null and $cuont_fasl >= 1){
$f++;
if($f==$cuont_fasl){
$f=null;
file_put_contents("data/listtext.txt","$fasl\n", FILE_APPEND);
}
}
}else{
listinbak($res,$namech,$link);
}
}

$getazrar=file_get_contents("data/addazrar.txt");
if($getazrar!=null){
azrar($getazrar);}

if($getazrarlist!=null){
azrar($getazrarlist);}

file_put_contents("data/listtext.txt","$asfl", FILE_APPEND);

@$keyboard = json_decode(file_get_contents("data/list.json"),true);
$reply_markup=json_encode($keyboard);
if($keyboard==null){
$reply_markup=null;
}
$listtext = file_get_contents("data/listtext.txt");
bot('sendMessage',[
"chat_id"=>$chat_id,
"text"=>"$listtext
",'parse_mode'=>markdown,
'disable_web_page_preview'=>$m3ainhr,
"reply_markup"=>$reply_markup
]);
}
##
if($text == "انشااء" and  $typee == "معرفات" and $chat_id == $gp){
$no3ansha="معرفات";
}
if($no3ansha == "معرفات"){
$no3ansha="";
unlink("data/list.json");
unlink("data/listtext.txt");
file_put_contents("data/listtext.txt","$a3la\n");

$f=0;
$co=0;
foreach($arrayansh as $channel=>$info){
$co++;
$res = $info["res"];
$user = $info["link"];
$namech = $info["name"];
$namech =str_replace(["ــ","َ","ً","ُ","ٌ","ٍ","ِ","ْ","ٔ",'ٕ','ٓ','ّ','ٰ','ٖ',"'",'"','_','*','`'],"",$namech);
$id="@$channel";
if(strpos($user,"https://t.me/joinchat") !== false){
$link="[$id]($user)";
}else{
$user =str_replace('t.me/',"",$user);
$link="[@$user]"; 
}
if($co<100){
$gettsmim= file_get_contents("tsmim.txt");
$tsmim=str_replace(["ME","US","NE"],["$res","$link","$namech"],"$gettsmim");

if($gettsmim != null){
file_put_contents("data/listtext.txt","$tsmim \n", FILE_APPEND);
}else{
file_put_contents("data/listtext.txt","$res| $link $namech \n", FILE_APPEND);
}
if($cuont_fasl!=null and $cuont_fasl >= 1){
$f++;
if($f==$cuont_fasl){
$f=null;
file_put_contents("data/listtext.txt","$fasl\n", FILE_APPEND);
}
}
}else{
listinbak($res,$namech,$user);
}
}
$getazrar=file_get_contents("data/addazrar.txt");
if($getazrar!=null){
azrar($getazrar);}
if($getazrarlist!=null){
azrar($getazrarlist);}
file_put_contents("data/listtext.txt","$asfl", FILE_APPEND);

@$list = json_decode(file_get_contents("data/list.json"),true);
$reply_markup=json_encode($list);
if($list==null){
$reply_markup=null;
}

$listtext = file_get_contents("data/listtext.txt");
bot('sendMessage',[
"chat_id"=>$chat_id,
"text"=>"$listtext
",'parse_mode'=>markdown,
'disable_web_page_preview'=>$m3ainhr,
"reply_markup"=>$reply_markup
]);
}

$ids=$databot["info"]["القنوات"]["array"];
$getban=$databot["info"]["القنوات"]["ban"];
if (preg_match('/^(add) (.*)/s',$text)  and $chat_id == $gp) {
$textt = str_replace("add ","",$text);
$textt = str_replace("  ","",$textt);
$textt = str_replace(" ","",$textt);
$ex = explode("\n",$textt);

for($i=0;$i<count($ex);$i++){
$channel =$ex[$i];
$channel=trim($channel);
if(preg_match('/^(.*)@|@(.*)|(.*)@(.*)|(.*)@(.*)|@(.*)|(.*)@/',$channel)) {
$userch = str_replace("@","",$channel);
}else{
$userch="no";
}

if($channel!=null){
$admins = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatAdministrators?chat_id=$channel"))->ok;
if($admins == 1){

$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$channel"))->result->id;
if($ch_id==null){
$ch_id=$channel;
$userch="no";
}
if(!in_array($ch_id,$ids)){
if(!in_array($ch_id,$ban)){
$chname = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$channel"))->result->title;
if($chname != null ){

$ch_count = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChatMembersCount?chat_id=$channel"))->result;
if($ch_count > $count_memberyes){

$link = json_decode(file_get_contents("http://api.telegram.org/bot$token/exportChatInviteLink?chat_id=$channel"))->result;
if($link!=null ){
$res=resmbre($ch_count);
$databot["info"]["القنوات"]["array"][]="$ch_id";
$databot["info"]["القنوات"]["info"][$ch_id]["name"]="$chname";
$databot["info"]["القنوات"]["info"][$ch_id]["user"]="$userch";
$databot["info"]["القنوات"]["info"][$ch_id]["link"]="$link";
$databot["info"]["القنوات"]["info"][$ch_id]["count_mem"]="$ch_count";
$databot["info"]["القنوات"]["info"][$ch_id]["res"]="$res";
$yesadd="$yesadd\n$channel";
}else{
$nolink="$nolink\n$channel";
}
}else{
$nomem="$nomem\n$channel";
}
}else{
$noinfo="$noinfo\n$channel";
}
}else{
$yesban="$yesban\n$channel";
}
}else{
$noadd="$noadd\n$channel";
}
}else{
$noadmin="$noadmin\n$channel";
}
}
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅قنوات تمت اضافتها \n$yesadd
- قنوات مضافة مسبقاً : \n$noadd
- قنوات البوت ليس مشرف فيها : \n$noadmin
- قنوات عدد اعضائها قليل : \n$nomem
- قنوات لايمكن للبوت استخراج رابطها : \n$nolink
- قنوات غير موجودة : \n$noinfo
- قنوات محظورة :\n$yesban
",'reply_to_message_id'=>$message->message_id,
]);
file_put_contents("../../data/$IDBOT.json", json_encode($databot));
} 