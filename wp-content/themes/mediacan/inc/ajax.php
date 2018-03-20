<?php
if ( ! function_exists( 'mediacan_ajax' ) ) {
	function mediacan_ajax() {

		parse_str($_POST['data'], $output);

		if(isset($_POST['data'])) {
			$name = $output['name'];
			$tel = $output['phone'];
			$email = $output['email'];
		}

		if(isset($output['link'])) {
			$link = $output['link'];
		} else {
			$link = "//";
		}

		if(isset($output['order'])) {
			$order = $output['order'];
		} else {
			$order = "не заказано";
		}


		$data = "\r\nВремя заказа - " . date("d-m-Y H:i:s", time() + 3600) .
				"\r\nИмя - $name" .
				"\r\nТелефон - $tel" .
				"\r\nE-mail - $email" .
				"\r\nСсылка - $link" .
				"\r\nЗаказан пакет услуг - $order\r\n______\r\n";

		file_put_contents ("orders.txt", $data, FILE_APPEND);
		send_mime_mail('Робот mediacan.ru', 'tomin.artem@yandex.ua', 'Админ', 'artem.donetsk@gmail.com', 'UTF-8', 'UTF-8', 'Уведомление о новом заказе', $data);
		wp_send_json_success($_POST);
		wp_die();
	}
}

add_action('wp_ajax_mediacan_ajax', 'mediacan_ajax');
add_action('wp_ajax_nopriv_mediacan_ajax', 'mediacan_ajax');


function send_mime_mail($name_from, // имя отправителя
	$email_from, // email отправителя
	$name_to, // имя получателя
	$email_to, // email получателя
	$data_charset, // кодировка переданных данных
	$send_charset, // кодировка письма
	$subject, // тема письма
	$body, // текст письма
	$html = FALSE, // письмо в виде html или обычного текста
	$reply_to = FALSE
) {

	$to = mime_header_encode($name_to, $data_charset, $send_charset)
	      . ' <' . $email_to . '>';
	$subject = mime_header_encode($subject, $data_charset, $send_charset);
	$from =  mime_header_encode($name_from, $data_charset, $send_charset)
	         .' <' . $email_from . '>';
	if($data_charset != $send_charset) {
		$body = iconv($data_charset, $send_charset, $body);
	}
	$headers = "From: $from\r\n";
	$type = ($html) ? 'html' : 'plain';
	$headers .= "Content-type: text/$type; charset=$send_charset\r\n";
	$headers .= "Mime-Version: 1.0\r\n";
	if ($reply_to) {
		$headers .= "Reply-To: $reply_to";
	}

	echo json_encode($to);
	return mail($to, $subject, $body, $headers);
}

function mime_header_encode($str, $data_charset, $send_charset) {
	if($data_charset != $send_charset) {
		$str = iconv($data_charset, $send_charset, $str);
	}
	return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}