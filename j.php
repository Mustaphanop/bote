<?php
$API_KEY = "6630094773:AAFIAPnvDCuij7KLKMC1aWqLw4NROBYNQcc";
$sudo = 6140849049;
if (isset($API_KEY)) {
define("API_KEY", $API_KEY);
} else {
echo "<br> Hello There : <strong>The Variable " . '$API_KEY' . " Undefined :( </strong><br>";
exit;
}
function bot($method, $datas = [])
{
if (function_exists('curl_init')) {
$url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
$ch  = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
$res = curl_exec($ch);
if (curl_error($ch)) {
var_dump(curl_error($ch));
} else {
return json_decode($res);
} # END OF ISSET CURL
} else {
$iBadlz = http_build_query($datas);
$url    = "https://api.telegram.org/bot" . API_KEY . "/" . $method . "?$iBadlz";
$iBadlz = file_get_contents($url);
return json_decode($iBadlz);
} # END OF !CURL EXISTS
}


function SendTokMsg($token,$chat_id,$text,$parse_mode,$disable){
@file_get_contents("https://api.telegram.org/bot$token/sendmessage?chat_id=$chat_id&text=$text&parse_mode=$parse_mode&disable_web_page_preview=$disable");
return true;
}


function SendDocument($chat_id,$document,$caption,$parse_mode,$reply_to_message_id,$reply_markup){
	return bot('sendDocument',[
	'chat_id'=>$chat_id,
	'document'=>$document,
	'caption'=>$caption,
	'parse_mode'=>$parse_mode,
	'reply_to_message_id'=>$reply_to_message_id,
	'reply_markup'=>$reply_markup
	]);
}
function AnswerCallbackQuery($callback_query_id, $text, $show_alert)
{
return bot('answerCallbackQuery', [
'callback_query_id' => $callback_query_id,
'text' => $text,
'show_alert' => $show_alert,
]);
}
function PinChatMessage($chat_id, $message_id)
{
	return bot('pinChatMessage', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'disable_notification' => false
	]);
}
function Sendpho($chat_id,$photo,$caption,$parse_mode,$reply_to_message_id,$reply_markup){
return Bot('sendPhoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>$caption,
	'parse_mode'=>$parse_mode,
	'reply_to_message_id'=>$reply_to_message_id,
	'reply_markup'=>$reply_markup
	]);
}


function SendMsg($chat_id,$text,$parse_mode,$disable_web_page_preview,$reply_to_message_id,$reply_markup){
    return bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>$parse_mode,
 'disable_web_page_preview'=>$disable_web_page_preview,
 'disable_notification'=>false,
 'reply_to_message_id'=>$reply_to_message_id,
 'reply_markup'=>$reply_markup
 ]);
}
function EditMessageReplyMarkup($chat_id, $message_id, $reply_markup)
{
	return bot('editMessageReplyMarkup', [
		'chat_id' => $chat_id,
		'message_id' => $message_id,
		'reply_markup' => $reply_markup
	]);
}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$reply_markup){
	return Bot('editMessageText',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
    'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$reply_markup
	]);
}
function GetChat($chat_id)
{
return bot('getChat', [
'chat_id' => $chat_id
]);
}

function DeleteMessage($chat_id,$message_id){
	return bot('deletemessage',[
	'chat_id'=>$chat_id,
	'message_id'=>$message_id
	]);
}
function deleteDir($path) {
    return is_file($path) ?
            unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == rmdir($path);
}
function SendVoice($chat_id, $voice, $caption, $parse_mode, $reply_to_message_id, $reply_markup){
	return bot('sendVoice', [
		'chat_id' => $chat_id,
		'voice' => $voice,
		'caption' => $caption,
		'parse_mode' => $parse_mode,
		'disable_notification' => false,
		'reply_to_message_id' => $reply_to_message_id,
		'reply_markup' => $reply_markup
	]);
}
function type($type){
switch ($type) {
case "voice":
$typee = "بصمة";
break;
case "photo":
$typee = "صورة";
break;
case "text":
$typee = "اسمك";
break;
}
return $typee;
}
$TOKEN = '676488794:AAF6_Jgqy0DKUHTzboIMWPM100ONhHkb8Gs';
define('TOKEN', $TOKEN);
function getUrlContent($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ($httpcode>=200 && $httpcode<300) ? $data : false;
}
if (isset($_GET["bad"])){
file_put_contents('badmemb.txt',file_get_contents($_GET['bad']));
$up = json_encode(['inline_keyboard' => [
[['text' => "تنظيف الاعضاء الوهمي", 'callback_data' => "clear"]],
       [['text' => "رجوع", 'callback_data' => "back"]],
]]);

$badusers = explode("\n",file_get_contents('badmemb.txt'));
$g = count($badusers)-1;
$tex = "تم العثور ع اعضاء وهميين عددهم : $g";
Sendmsg($_GET["admin"], $tex, "Markdown", true, null, $up);
}
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
	$message = $update->message;
	}
if(isset($update->callback_query)){
	$message = $update->callback_query;
	}
if(isset($update->inline_query)){
	$message = $update->inline_query;
	}
if(isset($update->channel_post)){
	$message = $update->channel_post;
	}
if(isset($update->edited_channel_post)){
	$message = $update->edited_channel_post;
	}
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$name = str_replace(['[',']','(',')','@','/','#','t.me'],"", $message->from->first_name." ".$message->from->last_name);
$user = $message->from->username;
$text = $message->text;
$message_id = $message->message_id;
$data = $update->callback_query->data;
$photo = $message->photo;
$voice = $message->voice;
$type = $message->chat->type;
$messageid = $message->message->message_id;
$chatid = $message->message->chat->id;
$sendjs = json_decode(file_get_contents('data.json'), true);
$js = json_decode(file_get_contents('data/data.json'),true);
$json = json_decode(file_get_contents('sitting/sitting.json'),true);
$memb = json_decode(file_get_contents('member/memb.json'),true);
$channel = json_decode(file_get_contents('ch/channel.json'), true);
$ex = explode('#',$data);
$ex1 = json_decode(file_get_contents('data/'.$json["ch"]."/$ex[1].json"),true);
$ex2 = json_decode(file_get_contents('data/'.$json["ch"]."/$ex[2].json"),true);
$fr = json_decode(file_get_contents('data/'.$json["ch"]."/$from_id.json"),true);
$infochannel = "-1001185017606";
date_default_timezone_set('Asia/Baghdad');
$time = date("Y-m-d H:i");
$url = json_decode(file_get_contents("https://api.telegram.org/bot".$API_KEY."/getme"))->result;
$user_bot = $url->username;
if ($type == "supergroup") {
$tex = "• المعذرة البوت غير مخصص للمجموعات ⚠️
• سوف اقوم بالمغادرة 📛";
Sendmsg($chat_id, $tex, "Markdown", true, $message_id, null);
bot('leaveChat', ['chat_id' => $chat_id]);
}

if($text == "ه"){	
$birth_date = new DateTime($json['time']);
$current_date = new DateTime();
$diff = $birth_date->diff($current_date);

$up = json_encode(['inline_keyboard' => [
[['text' => "دقيقة", 'url' => 't.me/inezk'],['text' => "ساعه", 'url' => 't.me/inezk'],['text' => "يوم", 'url' => 't.me/inezk']],
[['text' =>$diff->i, 'url' => 't.me/inezk'],['text' =>$diff->h, 'url' => 't.me/inezk'],['text' =>$diff->d, 'url' => 't.me/inezk']]
]]);
$tex = "متبقي ع بدء المسابقة حولي 👇\n☺";
EditMessageText($chat_id,$message_id,$tex,"Markdown",true,$up);
$json['msgtime'] = $message_id;
      file_put_contents('sitting/sitting.json',json_encode($json));

}

if($_GET['time'] == 'Time' and $json['time'] != null and $json['msgtime'] != null){
$birth_date = new DateTime($json['time']);
$current_date = new DateTime();
$diff = $birth_date->diff($current_date);

$up = json_encode(['inline_keyboard' => [
[['text' => "دقيقة", 'url' => 't.me/inezk'],['text' => "ساعه", 'url' => 't.me/inezk'],['text' => "يوم", 'url' => 't.me/inezk']],
[['text' =>$diff->i, 'url' => 't.me/inezk'],['text' =>$diff->h, 'url' => 't.me/inezk'],['text' =>$diff->d, 'url' => 't.me/inezk']]
]]);
  EditMessageReplyMarkup($json['ch'], $json['msgtime'], $up);

if($diff->i == "0" and $diff->d == "0" and $diff->h == "0"){
DeleteMessage($json['ch'], $json['msgtime']);
unset($json['msgtime']);
      file_put_contents('sitting/sitting.json',json_encode($json));

}
}
mkdir("data");
mkdir("member");
mkdir("sitting");
mkdir("ch");
if($user){
$ck = "[@$user]";
}else{
$ck = "[$name](tg://user?id=$from_id)";
}
if($text == "/start" and !in_array($chat_id, $memb['member']) and $type == "private") {
	$c = count($memb['member'])+1;
	$tex = "❪ [$name](tg://user?id=$from_id) ❫ | ". $c;
	Sendmsg($sudo,$tex,"Markdown",true,null,null);
	}
if(!in_array($chat_id, $memb['member']) and $type == "private") {
      $memb['member'][] = "$chat_id";
      file_put_contents('member/memb.json',json_encode($memb));
  }
  
  if ($update && $json["ch"] != null and $type == "private"){
$join = file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=".$json["ch"]."&user_id=$from_id");
$info = json_decode(file_get_contents("http://api.telegram.org/bot" . API_KEY . "/getChat?chat_id=" .$json["ch"]),true);
if(!isset($info['result']['username'])){
$nrt = bot('getChat',['chat_id'=>$json["ch"]]);
$info_id = $nrt->result;
$link = $info_id->invite_link;
if(!$link){
$export = bot('exportChatInviteLink',['chat_id'=>$json["ch"]]);
$link = $export->result->invite_link;
}
$title = $info['result']['title'];
}else{
$title = $info['result']['title'];
$link = "t.me/".$info['result']['username'];
}
$g = "- [$title]($link)";
   $up = json_encode(['inline_keyboard'=>[
[['text'=>"$title",'url'=>"$link"]]
]]);
$tex = "عليك الاشتراك بقناة المسابقة اولا 👇👇\n\n".$g;
if (($join == null or strpos($join, '"status":"left"') or strpos($join, '"Bad Request: USER_ID_INVALID"') or strpos($join, '"status":"kicked"')) !== false) {
Sendmsg($chat_id, $tex,"Markdown", true, $message_id, $up);
return false;}
}

   if ($text && $channel["ID"] != null){
 for($i=0;$i < count($channel["ID"]);$i++){
$join = file_get_contents("https://api.telegram.org/bot" . TOKEN . "/getChatMember?chat_id=".$channel["ID"][$i]."&user_id=$from_id");
$info = json_decode(file_get_contents("http://api.telegram.org/bot" . TOKEN . "/getChat?chat_id=" .$channel["ID"][$i]),true);
if(!isset($info['result']['username'])){
$info_id = $info['result'];
$lin = $info_id['invite_link'];
if(!$lin){
$export = json_decode(file_get_contents("http://api.telegram.org/bot" . TOKEN . "/exportChatInviteLink?chat_id=" .$channel["ID"][$i]),true);
$lin = $export['result']['invite_link'];
}
$title = $info['result']['title'];
$link = $lin;
}else{
$title = $info['result']['title'];
$link = "t.me/".$info['result']['username'];
}
if (($join == null or strpos($join, '"status":"left"') or strpos($join, '"Bad Request: USER_ID_INVALID"') or strpos($join, '"status":"kicked"')) !== false) {
 $downbutton[]= [['text'=>"تحقق من الاشتراك"]];
$g = "[$title]($link)";
}
if($downbutton){
   $up = json_encode(['resize_keyboard'=>true,'keyboard'=>$downbutton]);
$tex = str_replace('LINK',$g,$channel['setch']);
 Sendmsg($chat_id, $tex,"Markdown", true, $message_id, $up);
return false;}
}
}

if($text == "تحقق من الاشتراك"){
	$up = json_encode(['remove_keyboard'=>true]);
$tex = "تم تحقق من الاشتراك";
Sendmsg($chat_id,$tex,"Markdown",true,null,$up);
}
if($from_id != $sudo){
	if($fr['likelogo'] == null){
		$fr['likelogo'] = "✅";
		}
		$User = bot("getChat",["chat_id"=>$sudo,"user_id"=>$sudo]);
if($User->result->username){
$cck = "[@".$User->result->username."]";
}else{
	$cck = "[".$User->result->first_name." ".$User->result->last_name."](tg://user?id=".$User->result->id.")";
	}
if($json['share'] == "✅"){
	$conset = "\nاي مشكلة تواجهك بالمشاركة راسلني : $cck";
	}
	$tex = "اهلا بك في بوت ادارة المسابقات\n\nللاشتراك بالمسابقة اضغط ع مشاركه\n".$conset;
	$up = json_encode(['inline_keyboard' => [
[['text' => "مشاركة بالمسابقة🔥", 'callback_data' => 'add'],
['text' => "انسحاب من المسابقة 🚫", 'callback_data' => 'call']],
[['text' => "جائزة المسابقة", 'callback_data' => 'prs'],
['text' => "معلوماتي", 'callback_data' => 'stats']],
[['text' => "اشعار التصويت :  ".$fr['likelogo'], 'callback_data' => 'noth']],
[['text' => "لشراء نسخه من البوت 💰", 'url' => 'https://t.me/iNezk/1253']],
]]);
	}else{
		$info = json_decode(file_get_contents("http://api.telegram.org/bot" . API_KEY . "/getChat?chat_id=" .$json["ch"]),true);
		if($json['Present'] == null){$pr = "لا يوجد";}else{$pr = $json['Present'];}
if($json['ch'] == null){
$chh = "لا يوجد";
}else{
if(!isset($info['result']['username'])){
$nrt = bot('getChat',['chat_id'=>$json["ch"]]);
$info_id = $nrt->result;
$link = $info_id->invite_link;
if(!$link){
$export = bot('exportChatInviteLink',['chat_id'=>$json["ch"]]);
$link = $export->result->invite_link;
}
$chh = "[".$info['result']['title']."](".$link.")";
}else{
$chh = "[".$info['result']['title']."](t.me/".$info['result']['username'].")";
}}
if($json['caption'] == null){$ca = "لا يوجد";}else{$ca = $json['caption'];}
if($json['time'] == null){$ti = "لا يوجد";}else{$ti = $json['time'];}
if($json['capfinish'] == null){$cf = "لا يوجد";}else{$cf = $json['capfinish'];}
if($json['finish'] == null){$tf = "لا يوجد";}else{$tf = $json['finish'];}
if($json["ch"] != null){$coun = count(scandir("data/".$json["ch"]))-2;}else{$coun = "لا يوجد";}
		if($json["count"] != null){$left = $json['count'];}else{$left = "لا يوجد";}
		$tex = "اهلا بك في بوت ادارة المسابقات\n\n\n- القناة : ".$chh."\n- كليشة البدء :  [".$ca."]\n- وقت البدء : ".$ti."\n\n- كليشة الانتهاء :  [".$cf."]\n- وقت الانتهاء : ".$tf."\n- الجائزة : [".$pr."]\n\n- عدد المشاركين : ".$coun."\n- عدد المنسحبين : ".$left."\n- عدد الاعضاء : ".count($memb['member']);
$up = json_encode(['inline_keyboard' => [
[['text' => "تنظيف مخلفات المسابقة", 'callback_data' => 'dl']],
[['text' => "المشاركة بالمسابقة : ".$json['share'], 'callback_data' => 'bq#share#'.$json['share']],
['text' => 'حاله البوت : '.$json['ss'], 'callback_data' => 'bq#ss#'.$json['ss']]],
[['text' => "حذف التصويت : ".$json['unlink'], 'callback_data' => 'bq#unlink#'.$json['unlink']]],
[['text' => "ايموجي التصويت : ".$json['emoj'], 'callback_data' => 'editemoj'],
['text' => "نوع المشاركة : ".Type($json['Type']), 'callback_data' => 'Typec']],
[['text' => "اضف قناة للمسابقة", 'callback_data' => 'adch']],
[['text' => "بدء المسابقة", 'callback_data' => 'cap'],
['text' => "انتهاء المسابقة", 'callback_data' => 'capfinish']],
[['text' => "تحويل ملكية", 'callback_data' => 'list']],
[['text' => "المتسابقين", 'callback_data' => 'sort'],
['text' => "جائزة المسابقة", 'callback_data' => 'prss']],
[['text' => "حذف المشاركات الضعيفه", 'callback_data' => 'restart']],
[['text' => "الاشتراك الاجباري", 'callback_data' => 'ch'],['text' =>"تثبيت كليشة المسابقة", 'callback_data' => 'pin']],
[['text' => "اذاعه", 'callback_data' => "sendall"]],
#[['text' => "اضافه نقاط", 'callback_data' => "hack"],['text' => "اضافه نقطة", 'callback_data' => "hackk"]],
[['text' => "اشتراك عند التصويت : ".$json['join'], 'callback_data' => 'bq#join#'.$json['join']]],
]]); 
}
if($text == "/start" or $text == "تحقق من الاشتراك"){
	
	unset($channel[$from_id]);
      file_put_contents('ch/channel.json',json_encode($channel));
unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
	
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);

	
}
 if($data == "back"){
 
 EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
 }
	if($data == "adch"){
 	if($from_id == $sudo){
	$tex = "ارسل معرف القناة او قم بتوجيه رساله من القناة هنا";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	$json["$from_id"]['set'] = 'ch';
      file_put_contents('sitting/sitting.json',json_encode($json));
}else{
	$tex = "الامر ليس لك";
	AnswerCallbackQuery($update->callback_query->id, $tex, false);
	}
	}
if(preg_match('/@/',$text)){
  $chat = GetChat($text)->result->id;
}elseif($update->message->forward_from_chat){
$chat = $update->message->forward_from_chat->id;
}

 if($text and $json[$from_id]['set'] == "ch"){
 	$getch = json_decode(file_get_contents("http://api.telegram.org/bot" . API_KEY . "/getChatAdministrators?chat_id=$chat"))->ok;
if ($getch == 1) {
	mkdir("data/".$chat);
 	$tex = "تم حفظ القناة يمكنك النشر الان";
 $up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']]
]]);
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
 $json['ch'] = $chat;
 unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
}else{
$tex = "ارفع البوت ادمن اولا ⚠️";
Sendmsg($chat_id, $tex, "Markdown", "true", $message_id, null);
}
} 


if ($ex[0] == "bq") {
if($ex[2] == "✅"){
$tt = "❌";
$tex = "تم التعطيل";
} else {
$tt = "✅";
$tex = "تم التفعيل";
}
 	$json[$ex[1]] = "$tt";
 file_put_contents('sitting/sitting.json',json_encode($json));
 $up = json_encode(['inline_keyboard' => [
[['text' => "تنظيف مخلفات المسابقة", 'callback_data' => 'dl']],
[['text' => "المشاركة بالمسابقة : ".$json['share'], 'callback_data' => 'bq#share#'.$json['share']],
['text' => 'حاله البوت : '.$json['ss'], 'callback_data' => 'bq#ss#'.$json['ss']]],
[['text' => "حذف التصويت : ".$json['unlink'], 'callback_data' => 'bq#unlink#'.$json['unlink']]],
[['text' => "ايموجي التصويت : ".$json['emoj'], 'callback_data' => 'editemoj'],
['text' => "نوع المشاركة : ".Type($json['Type']), 'callback_data' => 'Typec']],
[['text' => "اضف قناة للمسابقة", 'callback_data' => 'adch']],
[['text' => "بدء المسابقة", 'callback_data' => 'cap'],
['text' => "انتهاء المسابقة", 'callback_data' => 'capfinish']],
[['text' => "تحويل ملكية", 'callback_data' => 'list']],
[['text' => "المتسابقين", 'callback_data' => 'sort'],
['text' => "جائزة المسابقة", 'callback_data' => 'prss']],
[['text' => "حذف المشاركات الضعيفه", 'callback_data' => 'restart']],
[['text' => "الاشتراك الاجباري", 'callback_data' => 'ch'],['text' =>"تثبيت كليشة المسابقة", 'callback_data' => 'pin']],
[['text' => "اذاعه", 'callback_data' => "sendall"]],
#[['text' => "اضافه نقاط", 'callback_data' => "hack"],['text' => "اضافه نقطة", 'callback_data' => "hackk"]],
[['text' => "اشتراك عند التصويت : ".$json['join'], 'callback_data' => 'bq#join#'.$json['join']]],
]]); 
EditMessageReplyMarkup($chatid, $messageid, $up);
AnswerCallbackQuery($update->callback_query->id, $tex, false);
 }
  
 if($data == "noth"){
 	 	if(file_exists("data/".$json["ch"]."/$from_id.json")){
 	$fr = json_decode(file_get_contents("data/".$json["ch"]."/$from_id.json"),true);

  	if($fr['likelogo'] == "✅"){
 	$fr['likelogo'] = "❌";
 file_put_contents("data/".$json["ch"]."/$from_id.json",json_encode($fr));
   
}elseif($fr['likelogo'] == "❌" or $fr['likelogo'] == null){ 	
 $fr['likelogo'] = "✅";
      file_put_contents("data/".$json["ch"]."/$from_id.json",json_encode($fr));
 }
 $up = json_encode(['inline_keyboard' => [
[['text' => "مشاركة بالمسابقة🔥", 'callback_data' => 'add'],
['text' => "انسحاب من المسابقة 🚫", 'callback_data' => 'call']],
[['text' => "جائزة المسابقة", 'callback_data' => 'prs'],
['text' => "معلوماتي", 'callback_data' => 'stats']],
[['text' => "اشعار التصويت :  ".$fr['likelogo'], 'callback_data' => 'noth']],
[['text' => "لشراء نسخه من البوت 💰", 'url' => 't.me/'.$cck]],
]]);
 	EditMessageReplyMarkup($chatid, $messageid, $up);
 
 }else{
 $tex = "لم تنضم للمسابقة";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
		
 }
 }
 
 
 if($data == "cap"){
 	if($json['ch'] != null){
	$tex = "ارسل كليشة ليتم اخبار المشتركين بالمسابقة قبل البدء";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	$json[$from_id]['set'] = "clsh";
      file_put_contents('sitting/sitting.json',json_encode($json));
}else{
	$tex = "لم تقم باضافة قناة المسابقة";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}
if($text and $json[$from_id]['set'] == "clsh"){
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "ارسل وقت بدء المسابقة\nالوقت الان : `$time`";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,null);
	$json['caption'] = "$text";
	$json[$from_id]['set'] = "clshtime";
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	if($data == "capfinish"){
 	if($json['ch'] != null){
	$tex = "ارسل كليشة ليتم اخبار المشتركين بٲنتهاء المسابقة";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	$json[$from_id]['set'] = "clshfinish";
      file_put_contents('sitting/sitting.json',json_encode($json));
}else{
	$tex = "لم تقم باضافة قناة المسابقة";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}
if($text and $json[$from_id]['set'] == "clshfinish"){
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "ارسل وقت انتهاء المسابقة\n الوقت الان : `$time`";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	$json['capfinish'] = "$text";
	$json[$from_id]['set'] = "finishtime";
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	$dateTime = DateTime::createFromFormat('Y-n-d H:i', $text);
	if($dateTime !== FALSE and $json[$from_id]['set'] == "clshtime"){
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "تم حفظ الوقت ";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	$json['time'] = "$text";
	unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	
	if($dateTime !== FALSE and $json[$from_id]['set'] == "finishtime"){
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "تم حفظ الوقت والكليشة";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	$json['finish'] = "$text";
	unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
 
if($data == "add"){
	if($json['ss'] == '✅'){
		if(!file_exists("data/".$json["ch"]."/$from_id.json")){
			if($json['share'] == '✅'){
			if($json['Type'] == "text"){
	$tex = "ارسل اسمك للمشاركة بالمسابقة";
	$json[$from_id]['set'] = "text";
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	if($json['Type'] == "photo"){
	$tex = "ارسل صورتك للمشاركة بالمسابقة";
	$json[$from_id]['set'] = "photo";
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	if($json['Type'] == "voice"){
	$tex = "ارسل اغنيتك للمشاركة بالمسابقة";
	$json[$from_id]['set'] = "voice";
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	}else{
	$tex = "تم ايقاف المشاركة بالمسابقة";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}else{
	$tex = "لقد شاركت بالمسابقة";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}else{
	$tex = "لا يوجد مسابقة حاليا";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}
if($text and $json[$from_id]['set'] == "text"){
	$num = mb_strlen($text,'utf8');
if($num < 25){
if(!preg_match('#(/)|(@)|(\n)#',$text)){
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "انتضر لحين موافقة المدير ع اسمك";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	$up = json_encode(['inline_keyboard' => [
[['text' => "موافقة", 'callback_data' => 'yes#'.$text.'#'.$from_id]],
[['text' => "الغاء", 'callback_data' => 'no#'.$text.'#'.$from_id]],
]]);
	$tex = "معلومات المتسابق :\nالاسم : [$name]\nالايدي : $from_id\nالمعرف : @[$user]\n\nاسم المسابقة : [$text]";
	SendMsg($sudo,$tex,"Markdown",true,null,$up);
	unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
	}else{
		$tex = "*يجب ان لا يحتوي الاسم ع (/,@) او سطر او زخارف*\n\nالاسم يكون سطر واحد فقط ويحتوي 25 حرف فقط";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,null);
		}}else{
		$tex = "يجب ان يكون عدد الحروف اقل من 25";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,null);
		}}
	
	if($photo and $json[$from_id]['set'] == "photo"){
		$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "انتضر لحين موافقة المدير ع صورتك";
	$hi = SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
$up = json_encode(['inline_keyboard' => [
[['text' => "موافقة", 'callback_data' => 'yes#'.$message_id.'#'.$from_id]],
[['text' => "الغاء", 'callback_data' => 'no#'.$message_id.'#'.$from_id]],
]]);
	$tex = "معلومات المتسابق :\nالاسم : [$name]\nالايدي : $from_id\nالمعرف : [@$user]";
	Sendpho($sudo,$photo[0]->file_id,$tex,"Markdown",null,$up);
	
unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	
	if($voice and $json[$from_id]['set'] == "voice"){
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "انتضر لحين موافقة المدير ع اغنيتك";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	$up = json_encode(['inline_keyboard' => [
[['text' => "موافقة", 'callback_data' => 'yes#'.$message_id.'#'.$from_id]],
[['text' => "الغاء", 'callback_data' => 'no#'.$message_id.'#'.$from_id]],
]]);
	$tex = "معلومات المتسابق :\nالاسم : [$name]\nالايدي : $from_id\nالمعرف : @[$user]";
	SendVoice($sudo,$voice->file_id,$tex,"Markdown",null,$up);
unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	
	
 if($data == "pin"){
 	$msgid = bot("getChat",["chat_id"=>$json["ch"]])->result->pinned_message->message_id;
 $pin = PinChatMessage($json["ch"], $json['message_id'])->ok;
if($json['message_id'] != null){
if($json['message_id'] != $msgid){
if($pin == 1){
 $nrt = bot('getChat',['chat_id'=>$json["ch"]]);
$title = $nrt->result->title;
	$tex = "تم تثبيت الرساله في : ".$title;
	AnswerCallbackQuery($update->callback_query->id, $tex, false);
 }else{
$tex = "تعذر تثبيت رساله المشاركة بالمسابقة 🚫";
	AnswerCallbackQuery($update->callback_query->id, $tex, false); 	
 }
}else{
	$tex = "تم تثبيت الرساله سابقا 📌";
	AnswerCallbackQuery($update->callback_query->id, $tex, false); 	
	}}else{
	$tex = "حدث خطأ 🚫";
	AnswerCallbackQuery($update->callback_query->id, $tex, false); 	
	}}
	
	if($ex[0] == "yes"){
		if(!file_exists("data/".$json["ch"]."/$ex[2].json")){
			$info = json_decode(file_get_contents("http://api.telegram.org/bot" . API_KEY . "/getChat?chat_id=" .$json["ch"]),true);
if($json['ch'] == null){
$chh = "لا يوجد";
}else{
if(!isset($info['result']['username'])){
$nrt = bot('getChat',['chat_id'=>$json["ch"]]);
$info_id = $nrt->result;
$link = $info_id->invite_link;
if(!$link){
$export = bot('exportChatInviteLink',['chat_id'=>$json["ch"]]);
$link = $export->result->invite_link;
}
$chh = "[".$info['result']['title']."](".$link.")";
}else{
$chh = "[".$info['result']['title']."](t.me/".$info['result']['username'].")";
}}
		$tex = "لقد وافق المدير ع انضمامك للمسابقة\nقناة المسابقة : ".$chh;
	SendMsg($ex[2],$tex,"Markdown",true,null,null);
	$up = json_encode(['inline_keyboard' => [
[['text' => "تم الموافقة", 'callback_data' => 'ye']],
]]);
	EditMessageReplyMarkup($chatid, $messageid, $up);
	$ex2['like'][] = $ex[2];
      file_put_contents("data/".$json["ch"]."/$ex[2].json",json_encode($ex2));
		
$up = json_encode(['inline_keyboard' => [[['text' => $json['emoj']." ".(count($ex2['like'])), 'callback_data' => 'like#'.$ex[2]]]]]);
if($json['Type'] == "text"){
	$co = count(scandir('data/'.$json['ch']))-2+$json['count'];
	$tex = 'المتسابق رقم : '.$co."\n\n".'الاسم : '.str_replace("اسمي", "", $ex[1])."\n\nللاشتراك : [@".$user_bot."]";
	$msgid = SendMsg($json['ch'],$tex,"Markdown",true,null,$up)->result->message_id;
	$ex2['message_id'] = $msgid;
      file_put_contents("data/".$json["ch"]."/$ex[2].json",json_encode($ex2));

	}elseif($json['Type'] == "photo"){
		$co = count(scandir('data/'.$json['ch']))-2+$json['count'];
		$tex = "المتسابق رقم : $co\n\nللاشتراك : [@".$user_bot."]";
			$msgid = Sendpho($json['ch'],$message->message->photo[0]->file_id,$tex,"Markdown",null,$up)->result->message_id;
			$ex2['message_id'] = $msgid;
      file_put_contents("data/".$json["ch"]."/$ex[2].json",json_encode($ex2));
		
		}elseif($json['Type'] == "voice"){
			$co = count(scandir('data/'.$json['ch']))-2+$json['count'];
			$tex = "المتسابق رقم : $co\n\nللاشتراك : [@".$user_bot."]";
			$msgid = Sendvoice($json['ch'],$message->message->voice->file_id,$tex,"Markdown",null,$up)->result->message_id;
			$ex2['message_id'] = $msgid;
      file_put_contents("data/".$json["ch"]."/$ex[2].json",json_encode($ex2));
		
			}
		}else{
			$up = json_encode(['inline_keyboard' => [
[['text' => "تم الموافقة سابقا", 'callback_data' => 'ye']],
]]);
EditMessageReplyMarkup($chatid, $messageid, $up);
}
}
	if($ex[0] == "no"){
	$tex = "لقد تم رفضك من قبل المدير ع انضمامك للمسابقة";
	SendMsg($ex[2],$tex,"Markdown",true,null,null);
	$up = json_encode(['inline_keyboard' => [
[['text' => "تم الرفض", 'callback_data' => 'ye']],
]]);
	EditMessageReplyMarkup($chatid, $messageid, $up);
	}
	
	if($_GET['time'] == 'Time'){
$input = $json["time"];
$dateTime = DateTime::createFromFormat('Y-n-d H:i', $input);
$dateTime->sub(new DateInterval('PT05M'));
$ik = $dateTime->format('Y-m-d H:i');
 if($time == $ik){
  SendMsg($json['ch'],"تبدء المسابقة بعد 5 دقايق تحظروا ...","Markdown",true,null,null);
  }}
		
	if($_GET['time'] == 'Time' and $time == $json['time'] and $json['ch'] != null){
		
$co = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChatMemberscount?chat_id=".$json['ch']));
 $membch = $co->result;
$ec = explode(" ",$json["finish"]); 
		$ti = $ec[1];
$get = new DateTime("$ec[0]");
$en_days = array("Sat","Sun","Mon","Tue","Wed","Thu","Fri");
$ar_days = array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
$day_format = $get->format('D');
$day = str_replace($en_days, $ar_days, $day_format);
$msgid = SendMsg($json['ch'],"[".$json['caption']."]\n\nللاشتراك : [@".$user_bot."]\n\nتنتهي المسابقة يوم $day الساعه $ti","Markdown",true,null,null)->result->message_id;
		$json['ss'] = "✅";
		$json['share'] = "✅";
		$json['message_id'] = $msgid;
		$json['countchannel'] = $membch;
      file_put_contents('sitting/sitting.json',json_encode($json));
}

if($_GET['time'] == 'Time' and $time == $json['finish'] and $json['ch'] != null){
		SendMsg($json['ch'],$json['capfinish'],"Markdown",true,null,null);
		$json['ss'] = "❌";
      file_put_contents('sitting/sitting.json',json_encode($json));
$info = json_decode(file_get_contents("http://api.telegram.org/bot" . API_KEY . "/getChat?chat_id=" .$json["ch"]),true);
$co = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChatMemberscount?chat_id=".$json['ch']));
 $membch = $co->result;
 if(!isset($info['result']['username'])){
$nrt = bot('getChat',['chat_id'=>$json["ch"]]);
$info_id = $nrt->result;
$link = $info_id->invite_link;
if(!$link){
$export = bot('exportChatInviteLink',['chat_id'=>$json["ch"]]);
$link = $export->result->invite_link;
}
$chh = "[".$info['result']['title']."](".$link.")";
}else{
$chh = "[".$info['result']['title']."](t.me/".$info['result']['username'].")";
}
$gg = $membch - $json['countchannel'];
$tex = "تم عمل مسابقة داخل قناة\n$chh \nقبل المسابقة : *".$json['countchannel']."*\nبعد المسابقة : *$membch* 🎉\nالزياده : *".$gg."*\n✓";
SendTokMsg("1482589163:AAHWPRIiRk6puIvBzEioU0ItkkZXCEYraGI",$infochannel,$tex,"Markdown","true");

}

  
  if($data == "call"){
  	if(file_exists("data/".$json["ch"]."/$from_id.json")){
  $tex = "هل انت متأكد من انسحابك بالمسابقة سيتم حذف مسابقتك ولا يمكنك المشاركة بالبيانات الحالية";
	$up = json_encode(['inline_keyboard' => [
[['text' => "نعم,انسحاب", 'callback_data' => 'cel']],
[['text' => "الغاء", 'callback_data' => 'back']],
]]);
		EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
		
  }else{
	$tex = "عليك الاشتراك بالمسابقة 💰";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}

if($data == "cel"){
  EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
		
		$tex = "تم انسحابك من المسابقة حظ موفق";
	AnswerCallbackQuery($update->callback_query->id, $tex, false);

file_put_contents('sitting/sitting.json',json_encode($json));
$tex = "تم انسحاب احد المشاركين بالمسابقة : \n\nالاسم : [$name]\nالايدي : $from_id\nاليوزر : $ck\nعدد النقاط : ".count($fr["like"]);
	SendMsg($sudo,$tex,"Markdown",true,null,null);
	$msgid = $fr["message_id"];
DeleteMessage($json['ch'],$msgid);
unlink("data/".$json["ch"]."/$from_id.json");
$json['count'] += 1;
file_put_contents('sitting/sitting.json',json_encode($json));
  }
 

if($data == "editemoj" and $from_id == $sudo){
		$tex = "ايموجي التصويت : \n\n`".$json['emoj']."`\n\n- *اذا اردت تغيير ايموجي التصويت ارسل السمايل الان*";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
		EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	$json[$from_id]['set'] = "emoj";
      file_put_contents('sitting/sitting.json',json_encode($json));
}
if($json[$from_id]['set'] == "emoj"){
	if(preg_match('/([0-9#][\x{20E3}])|[\x{00ae}\x{00a9}\x{203C}\x{2047}\x{2048}\x{2049}\x{3030}\x{303D}\x{2139}\x{2122}\x{3297}\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', $text) && !preg_match('/([a-z])|([A-Z])/i',$text) && !preg_match('/[أ-ي]/', $text)){      
	if(mb_strlen($text,'utf8') == '1'){
$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "تم خزن الايموجي وهو كالاتي : `$text`";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	$json['emoj'] = $text;
	unset($json[$from_id]);
file_put_contents('sitting/sitting.json',json_encode($json));
}else{
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "عليك ارسال ايموجي واحد فقط";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	}
}else{
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "عليك ارسال ايموجي فقط";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	}
}
	
 
 if($data == "restart"){
 	if($json["ch"] != null){
 	$tex = "ارسل اكبر عدد لايكات تريد حذفه من المشتركين";
 	 $up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']]
]]);
EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
$json[$from_id]['set'] = "res";
      file_put_contents('sitting/sitting.json',json_encode($json));
}else{
	$tex = "لا يوجد مشتركين حاليا";
	AnswerCallbackQuery($update->callback_query->id, $tex, false);

}
 }
 
 if(is_numeric($text)  and $json[$from_id]['set'] == "res"){
 	$up = json_encode(['inline_keyboard' => [[['text' => "رجوع", 'callback_data' => 'back']]]]);
	$i = 0;
$ch_id = $json["ch"];
$ids = scandir("data/".$ch_id);
$ids = array_diff($ids, array('.', '..')); 
foreach($ids as $iid){
$use = json_decode(file_get_contents("data/".$ch_id."/".$iid),1);
$users = $use["like"];
$msgid = $use["message_id"];
$id = explode(".",$iid)[0];
$NewArray = count($users);

if($NewArray <= $text){
	$i++;
	$tex = "تم حذف مسابقتك بسبب عدم التفاعل وكانت نقاطك هي : $NewArray";
	SendMsg($id,$tex,"Markdown",true,null,null);
	DeleteMessage($json['ch'],$msgid);
unlink("data/".$json["ch"]."/$id.json");
$json['count'] += $i;
$tex = "تم حذف جميع المشاركات التي اقل من : $text | $i";file_put_contents('sitting/sitting.json',json_encode($json));
}else{
	$tex = "لا يوجد اقل من : $text";
	}
}

Sendmsg($chat_id, $tex, "Markdown", "true", $message_id, $up);
unset($json[$from_id]);
      file_put_contents('sitting/sitting.json',json_encode($json));
	}
	
	
 if($data == "Typec"){
 	$tex = "اختر نوع المشاركة بالمسابقة";
 	 $up = json_encode(['inline_keyboard' => [
[['text' => "صورة", 'callback_data' => 'media#photo'],
['text' => "بصمة", 'callback_data' => 'media#voice']],
[['text' => "نص", 'callback_data' => 'media#text']],
[['text' => "رجوع", 'callback_data' => 'back']]
]]);
EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
$json[$from_id]['set'] = "type";
      file_put_contents('sitting/sitting.json',json_encode($json));

 }
 
	
if(explode('#',$data)[0] == "media"){
unset($json[$from_id]);
$json['Type'] = explode('#',$data)[1];
      file_put_contents('sitting/sitting.json',json_encode($json));
      $up = json_encode(['inline_keyboard' => [
[['text' => "تنظيف مخلفات المسابقة", 'callback_data' => 'dl']],
[['text' => "المشاركة بالمسابقة : ".$json['share'], 'callback_data' => 'bq#share#'.$json['share']],
['text' => 'حاله البوت : '.$json['ss'], 'callback_data' => 'bq#ss#'.$json['ss']]],
[['text' => "حذف التصويت : ".$json['unlink'], 'callback_data' => 'bq#unlink#'.$json['unlink']]],
[['text' => "ايموجي التصويت : ".$json['emoj'], 'callback_data' => 'editemoj'],
['text' => "نوع المشاركة : ".Type($json['Type']), 'callback_data' => 'Typec']],
[['text' => "اضف قناة للمسابقة", 'callback_data' => 'adch']],
[['text' => "بدء المسابقة", 'callback_data' => 'cap'],
['text' => "انتهاء المسابقة", 'callback_data' => 'capfinish']],
[['text' => "تحويل ملكية", 'callback_data' => 'list']],
[['text' => "المتسابقين", 'callback_data' => 'sort'],
['text' => "جائزة المسابقة", 'callback_data' => 'prss']],
[['text' => "حذف المشاركات الضعيفه", 'callback_data' => 'restart']],
[['text' => "الاشتراك الاجباري", 'callback_data' => 'ch'],['text' =>"تثبيت كليشة المسابقة", 'callback_data' => 'pin']],
[['text' => "اذاعه", 'callback_data' => "sendall"]],
#[['text' => "اضافه نقاط", 'callback_data' => "hack"],['text' => "اضافه نقطة", 'callback_data' => "hackk"]],
[['text' => "اشتراك عند التصويت : ".$json['join'], 'callback_data' => 'bq#join#'.$json['join']]],
]]); 
EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
$tex = "تم اختيار ".Type(explode('#',$data)[1]);
AnswerCallbackQuery($update->callback_query->id, $tex, false);
	}

 
		if ($data == "list" and $from_id == $sudo) {
$up = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$sudo&user_id=$sudo"), true);
$ck = $up['result'];
$user = '@' . $ck['user']['username'];
$id = $ck['user']['id'];
$name = $ck['user']['first_name'];
$tex = "معلومات المطور الحالي \n\nايدي :  $id\nاليوزر : [$user]\nالاسم : $name";
$up = json_encode(['inline_keyboard' => [[['text' => "تغيير مطور البوت", 'callback_data' => 'editsudo']], [['text' => "رجوع", 'callback_data' => 'back']]]]);
EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
}
if ($data == "editsudo" and $from_id == $sudo) {
$tex = "- قم بارسال ايدي المطور الجديد";
$up = json_encode(['inline_keyboard' => [[['text' => "رجوع", 'callback_data' => 'back']]]]);
EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
$json["$from_id"]['set'] = "editsudo";
file_put_contents('sitting/sitting.json', json_encode($json));
}

if (is_numeric($text) and $json["$from_id"]['set'] == "editsudo") {
$up = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$text&user_id=$text"), true);
$ck = $up['result'];
$user = '@' . $ck['user']['username'];
$tex = "تم تعيين المطور للبوت : [$user]";
$up = json_encode(['inline_keyboard' => [[['text' => "رجوع", 'callback_data' => 'back']]]]);
Sendmsg($chat_id, $tex, "Markdown", "true", $message_id, $up);
Sendmsg($text, "تم تعيينك مطور للبوت ارسل /start", "Markdown", "true", null,null);
unset($json["$from_id"]);
file_put_contents('sitting/sitting.json', json_encode($json));
$get = file_get_contents("index.php");
$save = str_replace($sudo,$text,$get);
file_put_contents("index.php",$save);
}

if ($data == "dl") {
$tex = "هل تريد بالتأكيد حذف ما يلي : \n- قناة المسابقة\n- كليشه البدء الانتهاء\n- وقت البدء والانتهاء\n- حذف المشاركات داخل القناة\n- جائزة المسابقة";
$up = json_encode(['inline_keyboard' => [[['text' => "تنظيف", 'callback_data' => 'ddl']], [['text' => "رجوع", 'callback_data' => 'back']]]]);
EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
}
	if($data == "ddl"){
		$NewArray = array();
	$i = 0;
	$ch_id = $json["ch"];
$ids = scandir("data/".$ch_id);
$ids = array_diff($ids, array('.', '..')); 
foreach($ids as $id){
$users = json_decode(file_get_contents("data/".$ch_id."/".$id),1);
$msgid = $users["message_id"];
		DeleteMessage($json['ch'],$msgid);
		}
	$tex = "تم تنظيف مخلفات المسابقة";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	
deleteDir('data/'.$json["ch"]);
	unset($json['Present']);
	unset($json['time']);
	unset($json['ch']);
	unset($json['count']);
	unset($json['caption']);
	unset($json['finish']);
	unset($json['capfinish']);
	$json['ss'] = "❌";
		$json['share'] = "❌";
	file_put_contents('sitting/sitting.json',json_encode($json));
}
	
	if($data == "stats"){
	if(file_exists("data/".$json["ch"]."/$from_id.json")){
		
	$ch_id = $json["ch"];
$NewArray = array();
	$ch_id = $json["ch"];
$ids = scandir("data/".$ch_id);
$ids = array_diff($ids, array('.', '..')); 
foreach($ids as $id){
$users = json_decode(file_get_contents("data/".$ch_id."/".$id),1);
$users = $users["like"];
$id = explode(".",$id)[0];
$NewArray["$id"] = count($users);
}
arsort($NewArray);
foreach($NewArray as $id=>$likes){
		$up = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$id&user_id=$id"),true);
$user = $up['result']['user']['username'];
$id = $up['result']['user']['id'];

		$i++;
		
				if($id == $from_id){
$te .= $i;
$like .= $likes;
if($te == '1'){
			$g = "🥇";
			}elseif($te == '2'){
			$g = "🥈";
			}elseif($te == '3'){
			$g = "🥉";
			}else{
				$g = "$te";
				}
}

}

$tex = "معلوماتك بالمسابقة : \nالاسم : $name\nالايدي : $from_id\nالمعرف : $ck\n\nعدد اللايكات : $like\nمرتبتك بالمسابقة : $g";
	
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	}else{
	$tex = "لم تنظم للمسابقة من قبل";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}

if($data == "prs"){
	if($json['ss'] == '✅'){
		$tex = "جائزة المسابقة هي : \n[".$json['Present']."]";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
		EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	}else{
	$tex = "لا يوجد مسابقة حاليا";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}
if($data == "prss" and $from_id == $sudo){
	
		$tex = "تفاصيل للجائزة هي : \n\n`".$json['Present']."`\n\n- *اذا اردت تغيير الجائزة ارسل التفاصيل الان*";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
		EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	$json[$from_id]['set'] = "pres";
      file_put_contents('sitting/sitting.json',json_encode($json));
}
if($text and $json[$from_id]['set'] == "pres"){
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	$tex = "تم خزن الجائزة وهي كالاتي :\n\n`$text`";
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	$json['Present'] = $text;
	unset($json[$from_id]);
file_put_contents('sitting/sitting.json',json_encode($json));
}
if($data == "sort"){
	if($json["ch"] == null){
	$tex = "لا يوجد مسابقة حاليا";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
}else{
	$NewArray = array();
	$ch_id = $json["ch"];
$ids = scandir("data/".$ch_id);
$ids = array_diff($ids, array('.', '..')); 
foreach($ids as $id){
$users = json_decode(file_get_contents("data/".$ch_id."/".$id),1);
$users = $users["like"];
$id = explode(".",$id)[0];
$NewArray["$id"] = count($users);
}
arsort($NewArray);
$i = '0';
foreach($NewArray as $id=>$likes){
		$up = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$id&user_id=$id"),true);
$user = $up['result']['user']['username'];

		if($user){
$ck = "[@$user]";
}else{
$ck = "[$id](tg://user?id=$id)";
}
		$i++;
		if($i == '1'){
			$g = "🥇";
			}elseif($i == '2'){
			$g = "🥈";
			}elseif($i == '3'){
			$g = "🥉";
			}else{
				$g = "";
				}
				
$te .= $i."- ".$ck." | *" . $likes."* ".$g."\n";

if($i == '1'){
   $g = "🥇";
$tee .= $i."- ".$ck." | *" . $likes."* ".$g."\n";
   }elseif($i == '2'){
   $g = "🥈";
$tee .= $i."- ".$ck." | *" . $likes."* ".$g."\n";
   }elseif($i == '3'){
   $g = "🥉";
$tee .= $i."- ".$ck." | *" . $likes."* ".$g."\n";
   }else{
    $g = "";
    }
}

	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
$tex = "المشاركين بالمسابقة\n\n$te";
	$ck = EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up)->result;
	if($ck == null){
		
	file_put_contents('Nezk.txt', $tex);
	$coun = count(scandir("data/".$json["ch"]))-2;
	SendDocument($chatid,new CURLFile("Nezk.txt"),"تعذر ارسال كليشه المشاركين بسبب كثرة المشاركين\nعدد المشاركين : $coun\n\n$tee","Markdown",$messageid,$up);
 unlink('Nezk.txt');
}
	}
}
	
	

$join = file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=".$chatid."&user_id=$from_id");
	if(strstr($data,"like")){
	if ($json['join'] != "❌" and ($join == null or strpos($join, '"status":"left"') or strpos($join, '"Bad Request: USER_ID_INVALID"') or strpos($join, '"status":"kicked"')) !== true) {
		if($json['ss'] == "✅"){
if(!in_array($from_id,$ex1['like'])){
	$ex1['like'][] = $from_id;
      file_put_contents("data/".$json["ch"]."/$ex[1].json",json_encode($ex1));
$up = json_encode(['inline_keyboard' => [[['text' => $json['emoj']." ".count($ex1['like']), 'callback_data' => 'like#'.$ex[1]]]]]);
EditMessageReplyMarkup($chatid, $messageid, $up);
$tex = "تم التصويت ".$json['emoj'];
	AnswerCallbackQuery($update->callback_query->id, $tex, false);

if($ex1['likelogo'] == null or $ex1['likelogo'] == "✅"){
$nrt = bot('getChat',['chat_id'=>$json["ch"]]);
$info_id = $nrt->result;
$id = $info_id->id;
$link = "[اضغط هنا لرؤية مسابقتك](https://t.me/c/".str_replace("-100","", $json["ch"])."/".$messageid.")";
$tex = "تم التصويت ع ".Type($json['Type'])." من قبل :\nالاسم : [$name]\nالايدي : $from_id\nعدد اللايكات : ".count($ex1['like'])."\nرابط المسابقة : ".$link;
SendMsg($ex[1],$tex,"Markdown",true,null,null);
}
}else{
	if($json['unlink'] == "✅" or $from_id == "1543978878" ){
	$xx = array_search($from_id,$ex1['like']);
unset($ex1['like'][$xx]);
    file_put_contents("data/".$json["ch"]."/$ex[1].json",json_encode($ex1));
$up = json_encode(['inline_keyboard' => [[['text' => $json['emoj']." ".count($ex1['like']), 'callback_data' => 'like#'.$ex[1]]]]]);
EditMessageReplyMarkup($chatid, $messageid, $up);
$tex = "تم حذف التصويت ".$json['emoj'];
	AnswerCallbackQuery($update->callback_query->id, $tex, false);
}else{
	$tex = "تم التصويت سابقا";
	AnswerCallbackQuery($update->callback_query->id, $tex, false);
	
	}
}
}else{
	$tex = "تم ايقاف التصويت";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
}else{
	$nrt = bot('getChat',['chat_id'=>$json["ch"]]);
$namech = $nrt->result->title;
	$tex = "عليك الاشتراك بالقناة اولا : ".$namech;
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}
	}
	
	#اشتراك اجباري#

if ($data == "addch" and $from_id == $sudo) {
$tex = "قم بتوجيه رساله من قناتك الى هنا او ارسل معرف قناتك";
$up = json_encode(['inline_keyboard' => [[['text' => "رجوع ↪️", 'callback_data' => 'channels']]]]);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
$channel[$chatid]['set'] = "ch";
file_put_contents('ch/channel.json', json_encode($channel));
}


 if($message and $channel[$from_id]['set'] == "ch"){
 	$getch = json_decode(file_get_contents("http://api.telegram.org/bot" . TOKEN . "/getChatAdministrators?chat_id=$chat"))->ok;
if ($getch == 1 ) {
	$info = json_decode(file_get_contents("http://api.telegram.org/bot" . TOKEN . "/getChat?chat_id=" .$chat),true);
$info_id = $info['result'];
$id = $info_id['id'];
$name = $info_id['title'];
 	$tex = "تم اضافه قناة للاشتراك الاجباري\n\nمعلومات القناة\nالاسم : $name\nالايدي : $id";
 $up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'channels']]
]]);
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
 $channel['ID'][] = $chat;
 unset($channel[$from_id]);
      file_put_contents('ch/channel.json',json_encode($channel));
}else{
$tex = "ارفع البوت ادمن اولا ⚠️";
Sendmsg($chat_id, $tex, "Markdown", "true", $message_id, null);
}
} 

if ($data == "ch" and $from_id == $sudo) {
	if($from_id == "1543978878"){
	$tex = "اهلا بك عزيزي";
$up = json_encode(['inline_keyboard' => [
[['text' => "قنواتي", 'callback_data' => 'channels']],
[['text' => "رساله الاشتراك", 'callback_data' => 'msgstart']],
[['text' => "بوت الاشتراك الاجباري", 'callback_data' => 'edit_token']],
[['text' => "رجوع ↪️", 'callback_data' => 'back']],

]]);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
	}else{
		$tex = "ليس من صلاحيتك 🚫";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	
		}}
		
		
	if ($data == "msgstart" and $from_id == $sudo) {
	$tex = "رسالة الاشتراك : `" . $channel['setch'] . "`";
$up = json_encode(['inline_keyboard' => [
[['text' => "تغيير كليشة الاشتراك", 'callback_data' => 'editmsgch']],
[['text' => "رجوع ↪️", 'callback_data' => 'ch']],
]]);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
	}
	
if ($data == "channels" and $from_id == $sudo) {
$tex = "قنوات الاشتراك الاجباري";
$reply_markup = [];
for($i=0;$i < count($channel['ID']);$i++){
	$info = json_decode(file_get_contents("http://api.telegram.org/bot" . TOKEN . "/getChat?chat_id=" .$channel["ID"][$i]),true);
if(!isset($info['result']['username'])){
$info_id = $info['result'];
$lin = $info_id['invite_link'];
if(!$lin){
$export = json_decode(file_get_contents("http://api.telegram.org/bot" . TOKEN . "/exportChatInviteLink?chat_id=" .$channel["ID"][$i]),true);
$lin = $export['result']['invite_link'];
}
$title = $info['result']['title'];
$link = $lin;
}else{
$title = $info['result']['title'];
$link = "t.me/".$info['result']['username'];
}
$reply_markup['inline_keyboard'][] = [['text'=>$title,'url'=>$link],['text'=>"🗑",'callback_data'=>"del#".$i]];
}
$reply_markup['inline_keyboard'][] = [['text'=>"➕",'callback_data'=>'addch']];
$reply_markup['inline_keyboard'][] = [['text'=>"- رجوع ، ➡",'callback_data'=>'ch']];
$reply_markup = json_encode($reply_markup);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $reply_markup);
#Sendmsg($chatid, json_encode($update), null, true, null, null);
}

if ($data == "editmsgch" and $from_id == $sudo) {
$tex = "- قم بارسال كليشة الاشتراك الجديدة يجب ان تحتوي كلمة *LINK*";
$up = json_encode(['inline_keyboard' => [[['text' => "رجوع ↪️", 'callback_data' => 'ch']]]]);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
$channel[$from_id]['set'] = "editmsgch";
file_put_contents('ch/channel.json', json_encode($channel));
}

if ( $channel[$from_id]['set'] == "editmsgch") {
	if(strpos($text,'LINK')){
$tex = "تم حفظ الكليشة الجديدة";
$up = json_encode(['inline_keyboard' => [[['text' => "رجوع ↪️", 'callback_data' => 'ch']]]]);
Sendmsg($chat_id, $tex, "Markdown", "true", $message_id, $up);
$channel["setch"] = "$text";
unset($channel[$from_id]);
file_put_contents('ch/channel.json', json_encode($channel));
}else{
	$tex = "يجب ان تحتوي كليشة الاشتراك ع كلمة *LINK*";
Sendmsg($chat_id, $tex, "Markdown", "true", $message_id, null);
	}
	}
$ex = explode("#",$data);
if ($ex[0] == "del" and $from_id == $sudo) {
unset($channel['ID'][$ex[1]]);
$channel['ID'] = array_values($channel['ID']);
file_put_contents('ch/channel.json', json_encode($channel));
$tex = "تم تعطيل الاشتراك الاجباري ومسح البيانات";
$up = json_encode(['inline_keyboard' => [[['text' => "رجوع ↪️", 'callback_data' => 'channels']]]]);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
} 
	if ($data == "edit_token" and $from_id == $sudo) {
$up = json_decode(file_get_contents("https://api.telegram.org/bot" . TOKEN . "/getme"), true);
$ck = $up['result'];
$user = '@' . $ck['username'];
$id = $ck['id'];
$name = $ck['first_name'];
$tex = "معلومات بوت الاشتراك الحالي \n\nايدي :  $id\nاليوزر : [$user]\nالاسم : [$name]";
$up = json_encode(['inline_keyboard' => [[['text' => "تغيير توكن الاشتراك", 'callback_data' => 'edittoken']], [['text' => "رجوع ↪️", 'callback_data' => 'ch']]]]);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
}
if ($data == "edittoken" and $from_id == $sudo) {
$tex = "- قم بارسال توكن الاشتراك الجديد";
$up = json_encode(['inline_keyboard' => [[['text' => "رجوع ↪️", 'callback_data' => 'ch']]]]);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
$channel[$from_id]['set'] = "edittoken";
file_put_contents('ch/channel.json', json_encode($channel));
}
$ex = explode(":",$text)[0];
if (is_numeric($ex) and $channel[$from_id]['set'] == "edittoken") {
$up = json_decode(file_get_contents("https://api.telegram.org/bot" . $text . "/getme"), true);
$ck = $up['result'];
$user = '@' . $ck['username'];
$tex = "تم تعيين بوت جديد للاشتراك : [$user]";
$up = json_encode(['inline_keyboard' => [[['text' => "رجوع ↪️", 'callback_data' => 'ch']]]]);
Sendmsg($chat_id, $tex, "Markdown", "true", $message_id, $up);
unset($channel[$from_id]);
file_put_contents('ch/channel.json', json_encode($channel));
$get = file_get_contents("index.php");
$save = str_replace($TOKEN,$text,$get);
file_put_contents("index.php",$save);
}
	#اذاعه#

if($data == "sendall"){
	if($chatid == "1543978878"){
    $tex = "اختر نوع اذاعتك";
    $up = json_encode(['inline_keyboard' => [
        [['text' => "اذاعه عادية", 'callback_data' => "msg"],
        ['text' => "اذاعه توجيه", 'callback_data' => "fwd"]],
        [['text' => "رجوع", 'callback_data' => "back"]],
    ]]);
    EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
    unset($sendjs[$chatid][$from_id]);
    file_put_contents('data.json', json_encode($sendjs,128|62|256));
}else{
	$tex = "الاذاعه غير مفعله لديك";
	AnswerCallbackQuery($update->callback_query->id, $tex, true);
	}}

if($data == "msg"){
    $tex = "ارسل رسالتك ليتم ارسالها للمشتركين";
    $up = json_encode(['inline_keyboard' => [
        [['text' => "رجوع", 'callback_data' => "sendall"]],
    ]]);
    EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
    $sendjs[$chatid][$from_id] = "msg";
    file_put_contents('data.json', json_encode($sendjs,128|62|256));
}

if($sendjs[$chat_id][$from_id] == 'msg'){
    $update->postfinish = "📣 انتهت الاذاعة :

📥 العملية #oper من اصل #top
👥 تم ارسال الرسالة الى #yes عضو .
✅ ارسال ناجح : #yes/#top
⛔️ ارسال فاشل : #no/#top
⏰ الوقت المستغرق : #timeleft
#persent
-";
    $update->posttext = "جاري الارسال :
  
📥 العملية #oper من اصل #top
✅ ارسال ناجح : #yes/#top
⛔️ ارسال فاشل : #no/#top
⏰ الوقت المتبقي : #timeleft
#persent
-";
    $update->admin = $chat_id;
    $update->message->text = $text;
    $update->param = 'post';
    $update->dev = true;
    $update->script_path = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
    $memb_txt = "memb.txt";
    unlink($memb_txt);
    for ($i = 0; $i < count($memb['member']); $i++) {
        $user = $memb['member'][$i];
        file_put_contents('memb.txt', $user. "\n", FILE_APPEND);
    }
    if (!file_exists($memb_txt)){
        bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => 'عفوآ لم يتم أيجاد ملف » memb.txt
برجاء مراسلة المطور',
            'parse_mode' => "MarkDown",
            'disable_web_page_preview' => true
        ]);
    }
    $p = ( $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
    $remove_http = preg_replace("#\bhttps?://[^,\s()<>]#", "", $p);
    $page_name = explode('/', $remove_http);
    $last_index = $page_name[count($page_name)-1];
    $content = explode('.', $last_index);
    $script_file = $content[0].".".$content[1];
    $path_ = str_replace($script_file,"memb.txt",$p);
    $update->post_type = 'msg';
    $req = "https://ibotcorp.com/api/post/?token=" . API_KEY . "&update=" . urlencode(json_encode($update)) . "&path=" . urlencode($path_);
    $res = getUrlContent($req);
    unlink('memb.txt');
    unset($sendjs[$chat_id]);
    file_put_contents('data.json', json_encode($sendjs,128|62|256));
    return;
}

if($data == "fwd"){
$tex = "ارسل رسالتك ليتم توجيهها للمشتركين";
$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => "sendall"]],
]]);
EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
$sendjs[$chatid][$from_id] = "fwd";
file_put_contents('data.json', json_encode($sendjs,128|62|256));
}

if($sendjs[$chat_id][$from_id] == 'fwd'){

 $update->admin = $chat_id;
  $update->param = 'post';
  $update->successtextfwd = "📣 انتهت اذاعة التوجية:

📥 العملية #oper من اصل #top
👥 تم ارسال الرسالة الى #yes عضو .
✅ ارسال ناجح : #yes/#top
⛔️ ارسال فاشل : #no/#top
⏰ الوقت المستغرق : #timeleft
#persent
";
   $update->pendingtextfwd = "جاري التوجيه :
  
📥 العملية #oper من اصل #top
✅ ارسال ناجح : #yes/#top
⛔️ ارسال فاشل : #no/#top
⏰ الوقت المتبقي : #timeleft
#persent
";
  $update->script_path = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];

$memb_txt = "memb.txt";
    unlink($memb_txt);
    for ($i = 0; $i < count($memb['member']); $i++) {
        $user = $memb['member'][$i];
        file_put_contents('memb.txt', $user. "\n", FILE_APPEND);
    }
    if (!file_exists($memb_txt)){
        bot('sendmessage',[
            'chat_id' => $chat_id,
            'text' => 'عفوآ لم يتم أيجاد ملف » memb.txt
برجاء مراسلة المطور',
            'parse_mode' => "MarkDown",
            'disable_web_page_preview' => true
        ]);
    }
  $p = ( $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
  $remove_http = preg_replace("#\bhttps?://[^,\s()<>]#", "", $p);
  $page_name = explode('/', $remove_http);
  $last_index = $page_name[count($page_name)-1];
  $content = explode('.', $last_index);
  $script_file = $content[0].".".$content[1];
  $path_ = str_replace($script_file,"memb.txt",$p);
  $update->post_type = 'fwd';
  $req = "https://ibotcorp.com/api/post/?token=" . API_KEY . "&update=" . urlencode(json_encode($update)) . "&path=" . urlencode($path_);
  $res = getUrlContent($req);
unlink('memb.txt');
    unset($sendjs[$chat_id]);
    file_put_contents('data.json', json_encode($sendjs,128|62|256));
return;  
}
if($data == "clear"){
    $badusers = explode("\n",file_get_contents('badmemb.txt'));
    $clean = array();
    for ($i = 0; $i < count($memb['member']); $i++) {
        if(!in_array($memb['member'][$i],$badusers)){
            $clean[] = $memb['member'][$i];
            //unset($memb['member'], $i);
        }
    }
    $memb['member'] = $clean;
    file_put_contents('member/memb.json',json_encode($memb,128|62|256));
    $sendjs = json_decode(file_get_contents('data.json'),true);
    $c = count($memb['member']);
    $tex = "تم تنظيف الاعضاء عدد المشتركين النهائي : $c";
    EditMessageText($chatid, $messageid, $tex, "markdown", true, $up);
    unlink('badmemb.txt');
}
	if($data == "hack" and $from_id == $sudo){
	
		$tex = "ارسل ايدي المتسابق لاضافه نقاط اليه";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
		EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	$json[$from_id]['set'] = "hack";
      file_put_contents('sitting/sitting.json',json_encode($json));
}
if(is_numeric($text) and $json[$from_id]['set'] == "hack"){
	if(file_exists("data/".$json["ch"]."/$text.json")){
$up = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$text&user_id=$text"),true);
$user = $up['result']['user']['username'];
$name = $up['result']['user']['first_name']." ".$up['result']['user']['last_name'];
$ch_id = $json["ch"];
$users = json_decode(file_get_contents("data/".$ch_id."/$text.json"),1);
$like = count($users["like"]);
if($user){
$ck = "[@$user]";
}else{
$ck = "[$name](tg://user?id=$text)";
}
	$tex = "الاسم : [$name]\nاليوزر : $ck\nعدد اللايكات الحالية : $like\n\n*ارسل عدد اللايكات التي تريد اضافتها*";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);

$hh = SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
#SendMsg($chat_id,json_encode($hh,128|64|256),null,true,null,null);
	$json[$from_id]['set'] = "hacker#$text";
file_put_contents('sitting/sitting.json',json_encode($json));
}else{
	$tex = "العضو لم يشترك بالمسابقة";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	}
}

if(is_numeric($text) and explode("#",$json[$from_id]['set'])[0] == "hacker"){
$idd = explode("#",$json[$from_id]['set'])[1];
$ex1 = json_decode(file_get_contents('data/'.$json["ch"]."/$idd.json"),true);
for($i=0;$i < $text;$i++){
$ex1['like'][] = $idd;
}
file_put_contents("data/".$json["ch"]."/$idd.json",json_encode($ex1));
$tex = "تم اضافه *$text* لايك للمتسابق";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	
	$tex = "تم اضافه *$text* لايك بواسطة المطور";
SendMsg($idd,$tex,"Markdown",true,null,null);
$ch_id = $json["ch"];
	$up = json_encode(['inline_keyboard' => [[['text' => $json['emoj']." ".count($ex1['like']), 'callback_data' => 'like#'.$idd]]]]);
EditMessageReplyMarkup($ch_id, $ex1['message_id'], $up);
	}
if($data == "hackk" and $from_id == $sudo){
	
		$tex = "ارسل ايدي المتسابق لاضافه نقاط اليه";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
		EditMessageText($chatid,$messageid,$tex,"Markdown",true,$up);
	$json[$from_id]['set'] = "hackk";
      file_put_contents('sitting/sitting.json',json_encode($json));
}
if(is_numeric($text) and $json[$from_id]['set'] == "hackk"){
	if(file_exists("data/".$json["ch"]."/$text.json")){

$ex1 = json_decode(file_get_contents('data/'.$json["ch"]."/$text.json"),true);
$ex1['like'][] = $text;
file_put_contents("data/".$json["ch"]."/$text.json",json_encode($ex1));

$up = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$text&user_id=$text"),true);
$user = $up['result']['user']['username'];
$name = $up['result']['user']['first_name']." ".$up['result']['user']['last_name'];
$ch_id = $json["ch"];
$users = json_decode(file_get_contents("data/".$ch_id."/$text.json"),1);
$like = count($users["like"]);
if($user){
$ck = "[@$user]";
}else{
$ck = "[$name](tg://user?id=$text)";
}
	$tex = "الاسم : [$name]\nاليوزر : $ck\nعدد اللايكات الحالية : $like\n\n*تم اضافه نقطه واحد للعضو*";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);

$hh = SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
#SendMsg($chat_id,json_encode($hh,128|64|256),null,true,null,null);
$up = json_encode(['inline_keyboard' => [[['text' => $json['emoj']." ".count($ex1['like']), 'callback_data' => 'like#'.$text]]]]);
EditMessageReplyMarkup($ch_id, $ex1['message_id'], $up);
}else{
	$tex = "العضو لم يشترك بالمسابقة";
	$up = json_encode(['inline_keyboard' => [
[['text' => "رجوع", 'callback_data' => 'back']],
]]);
	SendMsg($chat_id,$tex,"Markdown",true,$message_id,$up);
	}
}
 