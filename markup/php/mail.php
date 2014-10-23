<?php header('Content-Type: text/html; charset=utf-8');
$form = ini_get('magic_quotes_gpc') == 1 ? stripslashes( $_POST['jsonData'] ) : $_POST['jsonData'];
$data = json_decode($form, true);


//Формируем заголовок
$subject = '[ SeinText ] Новое сообщение';
//Составляем сообщение
$message  = '<table cellpadding="0" cellspacing="1" style="width: 300px"; border: 1px solid #000>';

if ($data['name'] != '') {
	$message .=	'<tr><td style="border: 1px solid #000; padding: 5px; margin: 1px;"><b>Имя:</b></td><td style="border: 1px solid #000; padding: 5px; margin: 1px;">'.$data['name'].'</td></tr>';
}
if ($data['phone'] != '') {
	$message .=	'<tr><td style="border: 1px solid #000; padding: 5px; margin: 1px;"><b>Телефон:</b></td><td style="border: 1px solid #000; padding: 5px; margin: 1px;">'.$data['phone'].'</td></tr>';
}
if ($data['email'] != '') {
	$message .=	'<tr><td style="border: 1px solid #000; padding: 5px; margin: 1px;"><b>Email:</b></td><td style="border: 1px solid #000; padding: 5px; margin: 1px;">'.$data['email'].'</td></tr>';
}
if ($data['question'] != '') {
	$message .=	'<tr><td style="border: 1px solid #000; padding: 5px; margin: 1px;"><b>Вопрос:</b></td><td style="border: 1px solid #000; padding: 5px; margin: 1px;">'.$data['question'].'</td></tr>';
}
if ($data['formtype'] != '') {
	$message .= '<tr><td style="border: 1px solid #000; padding: 5px; margin: 1px;"><b>Название формы:</b></td><td style="border: 1px solid #000; padding: 5px; margin: 1px;">'.$data['formtype'].'</td></tr>';
}
$message  .= '</table>';

//ХВОСТЫ
/*if ($data['utmSource'] != '') {
	$message .=	'<b>Источник:</b> '.$data['utmSource'].'<br />';
}
if ($data['utmCampaign'] != '') {
	$message .=	'<b>Кампания:</b> '.$data['utmCampaign'].'<br />';
}
if ($data['utmTerm'] != '') {
	$message .=	'<b>Ключевое слово:</b> '.$data['utmTerm'].'<br />';
}*/


$to = "<info@oxem.ru>" . ", ";
//второй ящик 
//$to .= "<alexey.swn@gmail.com>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: seintex' . "\r\n";
echo mail($to, $subject, $message, $headers);