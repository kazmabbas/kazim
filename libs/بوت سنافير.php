<?php
/*
DEV: @mroan
CH : @php88

*/
ob_start();
$API_KEY = "5287882245:AAG5VZ6EbwRhui5RvT3LqOSWgLGRQGdqlDE";
define('API_KEY','5287882245:AAG5VZ6EbwRhui5RvT3LqOSWgLGRQGdqlDE');
define('API_KEY','5287882245:AAG5VZ6EbwRhui5RvT3LqOSWgLGRQGdqlDE');
echo "https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SMURF_MOD'];
  
define('NO', '❌');
define('YES', '✅');
define("API_KEY", $API_KEY);
#                    AMAR AL ALI                       #
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
#                     AMAR AL ALI                       #
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$message_id = $message->message_id;
$reply = $message->reply_to_message;
$user = 'h_k_r'.$message->from->username;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$get = json_decode(file_get_contents('data.json'),true);
if($user == null){
	$user = $message->from->first_name;
}
$userid = $message->from->id;
$GLOBALS['id'] = $chat_id;
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$userid);
$info = json_decode($get, true);
$you = $info['result']['status'];
#                     AMAR AL ALI                       #
function lock($media,$type = 'del'){
    $id = $GLOBALS['id'];
    $get = json_decode(file_get_contents('data.json'),true);
    if ($type == 'del') {
        $get[$id][$media]['del'] = NO;
        $get[$id][$media]['ban'] = YES;
        $get[$id][$media]['warn'] = YES;
    }
    if ($type == 'ban') {
        $get[$id][$media]['del'] = YES;
        $get[$id][$media]['ban'] = NO;
        $get[$id][$media]['warn'] = YES;
    }
    if ($type == 'warn') {
        $get[$id][$media]['del'] = YES;
        $get[$id][$media]['ban'] = YES;
        $get[$id][$media]['warn'] = NO;
    }
    file_put_contents('data.json', json_encode($get));
}
function open($media){
    $id = $GLOBALS['id'];
    $get = json_decode(file_get_contents('data.json'),true);
    $get[$id][$media]['del'] = YES;
    $get[$id][$media]['ban'] = YES;
    $get[][$media]['warn'] = YES;
    file_put_contents('data.json', json_encode($get));
}
function check($media){
    $id = $GLOBALS['id'];
    $get = json_decode(file_get_contents('data.json'),true);
    foreach ($get[$id][$media] as $key => $value) {
        if ($get[$id][$media][$key] == NO) {
            return $key;
        }
    }
}
#                     AMAR AL ALI                       #

if($text == '/start') {
    bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"📩￤اهلا عزيزي :- $name  
▪️￤مرحبا بك في بوت الحماية
🔘￤قم باضافت البوت وارفعه ادمن وسيتم التفعيل :) 🤖
-↭",
'reply_to_message_id'=>$mid,
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [['text'=>"اضفني الى المجموعه 🇮🇶⚜️",'url'=>"t.me/?startgroup=new"]],
        [['text'=>"~ تابع 🇮🇶-⚜️", 'url'=>"t.me/TAILS_SILVEP"]]
    ]

  ])
  ]);
}
// بدايه القفل والفتح
if ($you == "creator" or $you == "administrator") {
    if($text == 'تفعيل الترحيب'){
    		
    	 bot('sendmessage',[
              'chat_id'=>$chat_id,                   'text'=>" • تم تفعيل الترحيب - ✅
- الترحيب الحالي : ".$get[$chat_id]['wel']
                    ]);
                    $get[$chat_id]['_wel'] = true; 	file_put_contents('data.json',json_encode($get));
    }
    if($text == 'تعطيل الترحيب'){
    		
    	 bot('sendmessage',[
              'chat_id'=>$chat_id,                   'text'=>" • تم تعطيل الترحيب - ".NO."
- الترحيب الحالي : ".$get[$chat_id]['wel']
                    ]);
                    $get[$chat_id]['_wel'] = false; 	file_put_contents('data.json',json_encode($get));
    }
    if($reply and $text == 'طرد' or $text == 'حظر'){
	bot('kickchatmember',[
		'chat_id'=>$chat_id,
		'user_id'=>$reply->from->id
	]);
	bot('sendMessage',[
		'chat_id'=>$chat_id,
		'text'=>"
    العضو : 🇮🇶-⚜️  ⇚〈   @".$reply->from->username."  〉
 { < 🇮🇶 تم الحظر 🇮🇶 > } 

    ",
		'reply_markup'=>json_encode([
		'inline_keyboard'=>[
		
		]
		])
	]);
}
  $update= json_decode(file_get_contents('php://input'));
#التكلم خاص والمجموعات
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
#التكلم بالقناة 
$chat= $update->channel_post->chat->id;
    $text1 = $update->channel_post->text;
#معلومات الادمن الي حظر العضو الله لايوفقه 😂
$id_admen=$update->id_admen; 
$name_admen=$update->name_admen; 
$user_admen=$update->user_admen; 
#معلومات العضو المحظور 😔💔
$ban=$update->ban;
$chatban=$update->chat;
$ban_id=$update->ban_id; 
$ban_name=$update->ban_name; 
$ban_user=$update->ban_user; 
$host=$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
if($text=="/start"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك في بوت الانتقام من المشرفين الي يحظروا متابعين قناتك
فقط قم إزالة مشرفين قناتك وارفع البوت مشرف ثم ارسل بالقناه 
/admen 1960027377
/admen ايدي العضو الي تريد ترفعه مشرف
ملاحظه هامه اذا رفعت البوت ادمن بدون صلاحية مشرف البوت تلقائي يغادر 
سياسة خاصة
البوت يعتمد علي صلاحيه اضافة مشرفين 
حتي يقدر يرفع العضو مشرف بدون هزه الصلاحية البوت يرسل رساله للقناه ويقول اي الفايده لما ترفعوني بدون صلاحية مشرف ويزعل ويغادر"]);
} 
#التحقق من قام بحظر العضو وحظره تلقائي 
if($ban=="kicked"){
bot('sendmessage',[
'chat_id'=>$chatban, 
'text'=>"تم حظر عضو من قبل المشرف @$user_admen 
اسم المشرف $name_admen 
ايدي المشرف $id_admen 
العضو المحظور 😔 
يوزر $ban_user 
الاسم $ban_name 
الايدي $ban_id
تم حذف @$user_admen من الادمنيه"]);
bot('deleteadmen',['user_id'=>$id_admen, 
'chat_id'=>$chatban
,]);
} 
#رفع ادمن بالقناه
$admen = str_replace("/admen","",$text1);
if($text1 == "/admen$admen"){
bot('updateadmen',[
'user_id'=>"$admen", 
'chat_id'=>$chat
]); 
bot('sendmessage',[
'chat_id'=>$chat,
'text'=>"تم بنجاح رفعه ادمن بالقناة"]); 
}
    if($reply and $text == 'طرد' or $text == 'حظر'){
	bot('unbanchatmember',[
		'chat_id'=>$chat_id2,
		'user_id'=>$data
	]);
	bot('editmessagetext',[
		'chat_id'=>$chat_id2,
		'text'=>"
العضو : 🇮🇶-⚜️  ⇚〈   @".$reply->from->username."  〉
 { < 🇮🇶 تم الغاء حظر 🇮🇶 > } 

    ",
		'reply_markup'=>json_encode([
		'inline_keyboard'=>[
		
		]
		])
	]);
}
  
if($reply and $text == 'تثبيت'){
	bot('pinchatmessage',[
		'chat_id'=>$chat_id,
		'message_id'=>$reply->message_id
	]);
}
if($reply and $text == 'الغاء التثبيت'){
	bot('unpinchatmessage',[
		'chat_id'=>$chat_id,
		'message_id'=>$reply->message_id
	]);
}
if(preg_match('/ضع اسم .*/',$text)){
	$text = str_replace('ضع اسم ','',$text);
	bot('setchattitle',[
		'chat_id'=>$chat_id,
		'title'=>$text
	]);
}



    if (preg_match('/(قفل)(.*)(.*)/', $text)) {
        $text = trim(str_replace('قفل', '', $text));
        $text = explode(' ', $text);
        if (isset($text[0])) {
            if ($text[0] == 'الصور' or $text[0] == 'الفيديو' or $text[0] == 'البصمات' or $text[0] == 'الصوت' or $text[0] == 'المتحركه' or $text[0] == 'الروابط' or $text[0] == 'الجهات' or $text[0] == 'الملفات' or $text[0] == 'الماركدون' or $text[0] == 'التوجيه' or $text[0] == 'البوتات' or $text[0] == 'الملصقات' or $text[0] == 'المعرف' or $text[0] == 'البوتات' and $text[1] == 'بالحذف' or $text[1] == 'بالطرد' or $text[1] == 'بالتحذير'){
                switch ($text[0]) {
                    case 'الصور':$m = 'photo';break;
                    case 'الفيديو':$m = 'video';break;
                    case 'البصمات':$m = 'voice';break;
                    case 'الصوت':$m = 'audio';break;
                    case 'المتحركه':$m = 'gif';break;
                    case 'الروابط':$m = 'link';break;
                    case 'الجهات':$m = 'contact';break;
                    case 'الملفات':$m = 'doc';break;
                    case 'الماركدون':$m = 'mark';break;
                    case 'التوجيه':$m = 'fwd';break;
                    case 'الملصقات':$m = 'sticker';break;
                    case 'المعرف':$m = 'user';break;
                    case 'البوتات':$m='bots';break;
                           if($text[1] == null){
              	$text[1] = 'بالحذف';
              }
                }
                switch ($text[1]) {
                    case 'بالحذف':$t='del';break;
                    case 'بالطرد':$t='ban';break;
                    case 'بالتحذير':$t='warn';break;
                    default:
                        $t='del';
                        break;
                }
      
                lock($m,$t);
                bot('sendmessage',[
                    'chat_id'=>$chat_id,
                    'text'=>"
                    ـ تــم قــفل 🔐 ⇚〈 $text[0]  〉
 { < 🇮🇶 خاصية : $text[1] 🇮🇶 > } 
                    "
                ]);
            }
        }
    }
    #                     SAJAD                       #
    if (preg_match('/(فتح)(.*)(.*)/', $text)) {
        $text = trim(str_replace('فتح', '', $text));
        $text = explode(' ', $text);
        if (isset($text[0])) {
            if ($text[0] == 'الصور' or $text[0] == 'الفيديو' or $text[0] == 'البصمات' or $text[0] == 'الصوت' or $text[0] == 'المتحركه' or $text[0] == 'الروابط' or $text[0] == 'الجهات' or $text[0] == 'الملفات' or $text[0] == 'الماركدون' or $text[0] == 'التوجيه' or $text[0] == 'الملصقات' or $text[0] == 'المعرف' or $text[0] == 'البوتات'){
                switch ($text[0]) {
                    case 'الصور':$m = 'photo';break;
                    case 'الفيديو':$m = 'video';break;
                    case 'البصمات':$m = 'voice';break;
                    case 'الصوت':$m = 'audio';break;
                    case 'المتحركه':$m = 'gif';break;
                    case 'الروابط':$m = 'link';break;
                    case 'الجهات':$m = 'contact';break;
                    case 'الملفات':$m = 'doc';break;
                    case 'الماركدون':$m = 'mark';break;
                    case 'التوجيه':$m = 'fwd';break;
                    case 'الملصقات':$m = 'sticker';break;
                    case 'المعرف':$m = 'user';break;
                    case 'البوتات':$m='bots';break;
                }
                open($m);
               switch(check($m)){
               	case 'del':$t='بالحذف';
               	case 'warn':$t='بالتحذير';
               	case 'ban':$t='بالطرد';
               	default:$t='بالحذف';
               } bot('sendmessage',[
                    'chat_id'=>$chat_id,
                    'text'=>"
                    تم فتح 🇮🇶-⚜️  ⇚〈 $text[0]  〉
 { < 🇮🇶 خاصية : $t 🇮🇶 > } 
                    "
                ]);
            }
        }
    }
    
}
// نهايه القفل والفتح
if ($you != "creator" and $you != "administrator") {
    if($message->photo){    #                     SAJAD                       #
        if (check('photo') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('photo') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=>"• ممنوع ارسال الصور #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('photo') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if($message->video){
        if (check('video') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('video') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال فيديو #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('video') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if($message->contact){
        if (check('contact') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('contact') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال الجهات #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('contact') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if($message->sticker){
        if (check('sticker') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('sticker') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال الملصقات #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('sticker') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if($message->forward_from or $message->forward_from_chat){
        if (check('fwd') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('fwd') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال التوجيه #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('fwd') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if($message->document){
        if (check('doc') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('doc') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال الملفات #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('doc') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if(preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me|(.*)telesco.me|telesco.me(.*)/i',$text)){
        if (check('link') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('link') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال الروابط #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('link') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if($message->new_chat_member->is_bot == true){
        if (check('bots') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$ $message->new_chat_member->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('bots') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع اضافه البوتات #:  ".$user." - ".NO
            ]);
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$ $message->new_chat_member->id
                ]);
        }
        if (check('bots') == 'del') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$ $message->new_chat_member->id
                ]);
        }
    }
    if($message->entities){
        if (check('mark') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('mark') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال الماركدوان #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('mark') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if(preg_match('/^(.*) | (.*)|(.*) (.*)|(.*)#(.*)|#(.*)|(.*)#/',$text)){
        if (check('user') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('user') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال المعرفات #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('user') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if($message->voice){
        if (check('voice') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
        }
            bot('deleteMessage',[
                'cthat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('voice') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال البصمات #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('voice') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
    }
    if($message->audio){
        if (check('audio') == 'ban') {
            bot('kickChatMember',[
                'chat_id'=>$chat_id,
                'user_id'=>$message->from->id
            ]);
        
        }
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('audio') == 'warn') {
            bot('sendmessage',[
                'chat_id'=>$chat_id,
                'text'=> "• ممنوع ارسال الصوتيات #:  ".$user." - ".NO
            ]);
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);
        }
        if (check('audio') == 'del') {
            bot('deleteMessage',[
                'chat_id'=>$chat_id,
                'message_id'=>$message->message_id
            ]);

}


if (preg_match("/\/bc .*/", $text) and $chat_id == 175279237) {
            $f = explode("\n", file_get_contents("users.txt"));
            $text = str_replace("/bc ", "", $text);
            for ($i=0; $i < count($f); $i++) { 
                bot("sendMessage",[
                    "chat_id"=>$f[$i],
                    "text"=>$text
                ]);
            }
        }
        $f = explode("\n", file_get_contents("users.txt"));
        if ($update and !in_array($chat_id, $f)) {
            file_put_contents("users.txt", $chat_id."\n",FILE_APPEND);
        } 
        if ($text == "المجموعات" or $text == "/us" and $chat_id == 462603768) {
            bot("sendMessage",[
                "chat_id"=>$chat_id,
                "text"=>count($f)
            ]);
        }

    $info = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@SMURF_MOD&user_id=".$chat_id));
$per = $info->result->status;
if ($per == 'left') {
  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>" عليك الأشتراك في القناه لأستخدام اشترك في القناه @SMURF_MOD"
  ]);
}


$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id =$message->chat->id;
$time = time() + (979 * 11 + 1 + 30);
$ex = explode('كول',$text);
$sudo = 175279237;
$id_sudo = 175279237;
$id = $message->from->id; 
$getid = file_get_contents('ied.txt');
$exid = explode("\n", $getid);
$count = count($exid);
$sudo = 175279237;
$bc = explode("/bc", $text);
$user = $update->message->from->username;
$name = $update->message->from->first_name;
$last_name = $update->message->from->last_name;
$from_id = $update->message->from->id;
$message_id = $update->message->message_id;
$user_id = $update->message->from->user_id;
$sudo = 175279237;
$user_id = $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username;

$sudo = 175279237;
$get = explode("\n", file_get_contents('memberbot.txt'));

$sudo == 175279237;
if($text == "رفع مطي مميز" and $id == $sudo){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"العضو تم رفعه مطي مميز بنجاح😹✅",
'reply_to_message_id'=>$message_id
]);
}
if($text == "رفع مطي مميز" and $id != $sudo){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"انت ليس مطور⚙️
🔖اسمك:- $name
💳ايديك:- $from_id",
'reply_to_message_id'=>$message_id
]);
}

if($text == '/start' and !in_array($chat_id, $get)){
file_put_contents('users.txt',"\n" . $chat_id, FILE_APPEND);
}

if($text == '/start' and !in_array($chat_id, $get)){
file_put_contents('memberbot.txt',"\n" . $chat_id, FILE_APPEND);
}

if($text == 'بوتي' and $id == $sudo){
bot('sendmessage',[
chat_id=>$chat_id,
'text'=>"هَــْـِْـْْـِلاّ مــْـِْـْْـِطــْـِْـْْـِوري"
]);
}

if($text == 'تفعيل' ){
bot('sendmessage',[
chat_id=>$chat_id,
'text'=>"🇮🇶-⚜️ تم تفعيل البوت بنجاح 

🔖اسمك:- $name 
💳ايديك:- $from_id"
]);
}

  $rep = $message->reply_to_message;
if(preg_match('/^(تاك)(.*)/',$text)){
 $text = str_replace('تاك للمطي  ','',$text);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"[$text](tg://user?id=".$rep->from->id.")",
 'parse_mode'=>'markdown'
 ]);
}


if($text == 'بووتي' and !$id == $sudo){
bot('sendmessage',[
chat_id=>$chat_id,
'text'=>"مو مطوري حسبالك ما عرفك"
]);
}

if($text == "م3"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"⚙️- اهلا بيك عزيزي $name في قائمة المدير🔹 
➖➖➖➖➖➖➖➖➖➖➖
📌معلوماتي ↭ لعرض معلوماتك الشخصيه

📌- ايدي لكروب ↭ لعرض ايدي لكروب

📌- كول+الكلمه

📌اضف+كلمة ↭ لاضافة رد عام
جواب الرد

📌- اسمي ↭ لعرض اسمك
➖➖➖➖➖➖➖➖➖➖➖
قناة البوت :@SMURF_MOD
",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($rep && $text == "ايدي"){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' => "id = $re_id
name = $re_name
user = $re_user",
]);
}

include 'rd.php';
if (preg_match('/^(اضف)(.*)/', $text) ) {
  $rd = str_replace('اضف ', $rd, $text);
  $ex = explode("\n", $rd);

    $put = "\n".'
    if ($text == "'.$ex[0].'") {
      bot(\'sendMessage\',[
        \'chat_id\'=>$chat_id,
        \'text\'=>"'.$ex[1].'"
      ]);
    }';
    file_put_contents('rd.php', $put,FILE_APPEND);
    bot('sendMessage',[
                'chat_id'=>$chat_id,
                'text'=>"تــم اضــافــة الـرد بـنـجـاح✅
بـواسـطـه $name",
'reply_to_message_id'=> $message_id,
                ]);
  
}

if(preg_match('/^(اضف صورة)(.*)/',$text)){
 $text = str_replace('اضف صورة ','',$text);
 $text = explode("\n",$text);
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"تم اضافة رد صورة بنجاح! 📂✓"
 ]);
 $photo1[$text[0]] = $text[1]; file_put_contents('photo.json',json_encode($photo1));
}
foreach($photo1 as $photo2 => $photo3){
if($text == $photo2){
   bot('sendphoto',[
    'chat_id'=>$chat_id,
    'photo'=>$photo1[$photo2],
    'reply_to_message_id'=>$message->message_id,
 ]);
 }
}
$video1 = json_decode(file_get_contents("video.json"),true);
if(preg_match('/^(اضف فيديو)(.*)/',$text)){
 $text = str_replace('اضف فيديو ','',$text);
 $text = explode("\n",$text);
 bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"تم اضافة رد فيديو بنجاح! 📂✓"
 ]);
 $video1[$text[0]] = $text[1]; file_put_contents('video.json',json_encode($video1));
}
foreach($video1 as $video2 => $video3){
if($text == $video2){
   bot('sendvideo',[
    'chat_id'=>$chat_id,
    'video'=>$video1[$video2],
    'reply_to_message_id'=>$message->message_id,
 ]);
 }
}
if($text== 'الاوامر'){
bot('sendMessage',[
"chat_id"=>$chat_id,
'text'=>'اهلا بك عزيزي في قائمة الاوامر

〰〰〰〰〰〰〰〰
⚙️اوامر بوت الحمايه
 
🔘اوامر الحمايه🔹  م1

🔘 اوامر المنشئ &الادمن🔹 م 2

🔘اوامر اضافيه🔹  م3

‏‎🔘اوامر الاغاني🔹 م4
➖➖➖➖➖➖➖➖
قناة البوت :@SMURF_MOD'
]);
}
$rep = $message->reply_to_message;
if(preg_match('سويله تاك',$text)){
 $text = str_replace('سويله تاك ','',$text);
 bot('sendmessage',[
 'chat_id'=>$chat_id,
 'text'=>"[$text](tg://user?id=".$rep->from->id.")",
 'parse_mode'=>'markdown'
 ]);
}

if($text=="اسمي"){
bot('sendmessage',[
'chat_id' => $chat_id,
'text'=>$name
]);
}
if($text == "م1"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"🔐 اليك اوامر حماية المجموعه 
〰〰〰〰〰〰〰〰〰〰〰
🔹 استخدم امر ( قفل ) للقفل 🔒•
🔹 استخدم امر ( فتح ) للفتح 🔓•

🔘اليك الاوامر الحمايه المتوفره -
➖➖➖➖➖➖➖➖➖➖➖
📌- الصور • 📷

📌- الفيديو • 📹

📌- الملصقات • 🎆

📌- الروابط • 🔗
️
📌- التوجيه • 🔀

📌- الجهات • 👥

📌- المعرف • #⃣

📌-  المتحركه • 🎞

📌- الملفات  • 🗂

📌- البوتات 🤖👾

📌- الصوت • 🎶
️
📌- البصمات 🔉 ؛ 

⚙️- كل الاوامر تعمل مع ( بالحذف ، بالطرد ، بالتحذير ) ؛ 🔱
مثل : قفل الروابط بالطرد 
➖➖➖➖➖➖➖➖➖➖➖ 
قناة البوت :@SMURF_MOD
",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "م2"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"☑️• اليك الاوامر الاضافيه ✨ 
➖➖➖➖➖➖➖➖➖➖➖
🔘- هذه الاوامر متاحه للادمن والمنشئ 🔹

📍- طرد ( بالرد ) • ⚠️
📍- تثبيت ( بالرد ) • 🔰
📍- الغاء التثبيت • ❗️
📍- ضع اسم + الاسم • 📜
📍- ضع وصف + الوصف • 🗒
📍- ضع ترحيب + الترحيب • ?
📍- (تفعيل ، تعطيل) الترحيب • 📝
📍- الرابط • 
〰〰〰〰〰〰〰〰〰〰〰
قناة البوت :@SMURF_MOD
",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text =="الوقت"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"🇮🇶 البلد : 🔥العراق \n" . "✨🔥  السنه  : " . date("Y") . "\n" . "🌟  الشهر🔥 : " . date("n") . "\n" . "💫  اليوم🔥 :" . date("j") . "\n" . "💏 الساعه🔥 :" . date('g', $time) . "\n" . "💋 الدقيقه🔥 :" . date('i', $time) . "\n" . " 😍",
'reply_to_message_id'=>$message->message_id
]);
}

if($text == "غني"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"ادخل للقناه وتلكه اغني يلاثول     @SMURF_MOD",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "هيلاو"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"دولي خمطتهه م̷ـــِْن خالتك",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "كول والله"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"والله",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "1$"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"غـِْاليّے كلش",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "اريد بوت"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ضيفني وصعني ادمن انه اتفاعل",
'reply_to_message_id'=>$message->message_id, 
]);
}


if($text== "ايدي لكروب"){
bot('sendMessage',[
"chat_id"=>$chat_id,
'text'=> 'هاذ ايدي لكروب ' .$chat_id,
]);
}


if($text== "ايديي"){
bot('sendMessage',[
"chat_id"=>$chat_id,
'text'=>'الايدي الخاص بك : ' .$chat_id,
]);
}
if($text == "شسمج"or $text== "شسمك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"⁽ لـٰٖـٖيـٰٖش ⁉️ تريد تزحف 🔷",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "لا"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ووجعا 😂",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "م4"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي في قائمة الاغاني🔘
➖➖➖➖➖➖➖➖➖➖➖
📍الاغاني المتوفره م̷ـــِْن 1الى10 اغنيه🔹 
📌اكتب اغنيه+الرقم
مثال🔻
اغنيه1
او 
اغنيه7
وسوف ارسل ڵـڱ الاغنيه

〰〰〰〰〰〰〰〰
قناة البوت : @SMURF_MOD
",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "اغنيه1"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/18",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "اغنيه2"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/19",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "احبك غنيلي"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"انجب هوه وجهك مال اغاني 😒",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "اغنيه3"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/20",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "اغنيه4"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/21?single",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "اغنيه5"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/22?single",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "دي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"لاخطيه",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "اغنيه6"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/23?single",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "اغنيه7"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/24?single",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "اغنيه8"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/25?single",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "اغنيه9"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/26?single",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "اغنيه10"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Smurf_mod/27?single",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "اغنيه11"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"كافي لطشت 😂😂",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "انجب"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اسف سيدي اعذرني",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "غصبن عنك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"عله راسييييييي",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "😂"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"فطير ماصيرلك جارة",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "😍"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"كبر يل غرم",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "استحي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اكو حيوان يستحي م̷ـــِْن نفسه ",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "😐"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"عليمن ماد حلكلك جنه بسطال",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "وين الربط"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شوف المدير والادمونيه",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "كول 1"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ما اكول لْـۆ تنطيني شسمه",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "🙂"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"عود ثكيل",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "🙄"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"نزل عـــ⌣̴͡͡د̲⌣̴͡͡ ــيونگ يول",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "منو"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"خالتك ام سحوره",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "تحبني"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ماحب زبايل",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "تكرهني"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اكثر من ما تتوقع",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "نعال"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"بحلكك وبخشمك",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "رفع نعال مميز"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"العضو تم رفعه نعال مميز😂😒",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "رفع عضو مميز"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"مارفعه لْـۆ تموت 😍😂",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "هه" or $text =="ههه" or $text == "هههه" or $text =="ههههه" or $text=="هههههه"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"⌣{دِْۈۈۈۈ/يّارٌبْ_مـْو_يـّوّمٌ/ۈۈۈۈمْ}⌣",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "هلوو"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"هلوات حبي",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "اريد يوزر"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اصيرلك يوزر",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "السلام عليكم"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>" وعليكم السلام",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "مروش" or $text ==" مروان"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شـتـريـد مـنـه هـذه مـطـوري",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "المطور"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"@i35k0",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "هلا"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"؟هلوات حمبي",
'reply_to_message_id'=>$message->message_id, 
]);
}
$MATHEO = explode('كول',$text);
if($MATHEO){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$MATHEO[1],
]);
}

$mid = $message->message_id;
$memb = $update->message->message_id;
$id = $message->from->id;
$us = $update->message->from->username;
if($text == "ايدي" and  $you == "creator"){
$get_progile = file_get_contents("https://api.telegram.org/bot$API_KEY/getUserProfilePhotos?user_id=$id&limit=1");
$json = json_decode($get_progile);
$user_photo = $json->result->photos[0][0]->file_id;

bot('sendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$user_photo,
'caption'=>"
🔸 • ايديك : $id
🔸 • معرفك : @$us
🔸 • موقعك ← منشئ ثكيل 🙊💥
🔸 • رسائل المجموعه ← $memb ",
'reply_to_message_id'=>$mid,
]);
}
if($text == "ايدي" and  $you == "administrator"){
$get_progile = file_get_contents("https://api.telegram.org/bot$API_KEY/getUserProfilePhotos?user_id=$id&limit=1");
$json = json_decode($get_progile);
$user_photo = $json->result->photos[0][0]->file_id;

bot('sendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$user_photo,
'caption'=>"
🔸 • ايديك : $id
🔸 • معرفك : @$us
🔸 • موقعك ← ادمن طاش 😀🍂
🔸 • رسائل المجموعه ← $memb ",
'reply_to_message_id'=>$mid,
]);
}
if($text == "ايدي" and  $you == "member"){
$get_progile = file_get_contents("https://api.telegram.org/bot$API_KEY/getUserProfilePhotos?user_id=$id&limit=1");
$json = json_decode($get_progile);
$user_photo = $json->result->photos[0][0]->file_id;

bot('sendPhoto',[
'chat_id'=>$chat_id,
'photo'=>$user_photo,
'caption'=>"
🔸 • ايديك : $id
🔸 • معرفك : @$us
🔸 • موقعك ← عضو مهتلف 😹❕
🔸 • رسائل المجموعه ← $memb ",
'reply_to_message_id'=>$mid,
]);
}


if($text == "بوتي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"هاا لك والله كاعد منايم كلي تريد شي ",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "انت"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شبيه ماعاجبك ",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "هاا"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ووجعاا",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "جبك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"دي لتزحف",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "زاحف"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"وينه خل يجي يزحف عليه",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "احبج"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شدتحس",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "صدك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"والله شبيك",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "والله"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"لتحلف",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "بوس لكروب"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اممممموووحححه خدهم مالح وحلو",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "اتفل"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"حححوك تففففف",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "اتفل على هذا"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ووين سويله رد وكلي اتفل عليه",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "ها تفل عليه"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"تففففف عليه وعل كصته ",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "تفليش"or $text=="فلش"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"خاببب دييي",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "نلعب"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"دنجب انجب",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "مطي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"مطي ابن المطي",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "اكلك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"كول ",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "يب"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اثـكـل\ي",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "الحشد"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"تاج راسك وراسي",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "حبي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"صارت قديمه هسه الجديد كله حبق ",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "شسمك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"🌝❤️ سنفور",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "ماتركس"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"هاا شتريد",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "اضحك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"هههههه",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "ابجي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ما ابجي حبق",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "ابجي مدري اضحك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شويه اضحك وشويه ابجي",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "لاا"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"والرب",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "5"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"احطه بيك واطمسه",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "1"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"حطه الك عبد الواحد",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "تدرس"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شيدرس هوه هذا فاهي",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "صدوك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"عدل حجيك تره بل شسمه",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "تروح"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"اي ليش لا",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "من وين"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"من العراق",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "حياك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"كملهه كول حياك الله",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "اخوي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"والنعم",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "فرخ"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"💔🙁انت الفرخ",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "التلي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شبي خوش برنامج اني استعمله",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "مقابل"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"كلشي صاار بمقابل",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "صح"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ي وداعتك صحح",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "خطا"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ليش",
'reply_to_message_id'=>$message->message_id, 
]);
}


if($text == "تبادل"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"@i35k0",
'reply_to_message_id'=>$message->message_id, 
]);
}



if($text == "البنات"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شبيهن",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "زاحفه"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"حل فضحوهه",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "منو حبيبك"or $text=="منو حبيبج"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"محد قابل مثلك/ج",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "جاو"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"هااا شبيك ضجت",
'reply_to_message_id'=>$message->message_id, 
]);
}


if($text == "يله جاوو"or $text== "جاوو"or $text=="يله جااوو"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شبيك ضجت لوو وين رايح",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "عود"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"مال شخاط",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "فاشل"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"مثلك",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "تهي بهي"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"هاا شبيك",
'reply_to_message_id'=>$message->message_id, 
]);
}


if($text == "رايح"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"الله ويااك",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "مغادر"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"دي الله وياك",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "شعليك"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"انجب",
'reply_to_message_id'=>$message->message_id, 
]);
}


if($text == "ابرار"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"هاي ان عيون خظر ورده من الله",
'reply_to_message_id'=>$message->message_id, 
]);
}

if($text == "حلو"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"انت الاحلا",
'reply_to_message_id'=>$message->message_id, 
]);
}if($text == "ليبيا"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"من وين تعرفها ليبيا 😱❤️",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "رفع خروف"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"تم رفع خروف بنجاح ✅",
'reply_to_message_id'=>$message->message_id, 
]);
}