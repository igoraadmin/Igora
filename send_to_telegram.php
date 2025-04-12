<?php
// Укажите токен вашего бота
$token = "8115718567:AAHMj0cPx6kI9cASLd6dhE7OjhoRUgkm_L8";

// Укажите ID чата, куда бот будет отправлять сообщения
$chat_id = "-4612325469";

// Получение данных из формы

$email = htmlspecialchars($_POST['email']);


// Получение IP-адреса отправителя
$ip_address = $_SERVER['REMOTE_ADDR'];

// Формирование текста сообщения для Telegram
$txt = "Новое сообщение с сайта:\n";
$txt .= "Email: $email\n";
$txt .= "IP: $ip_address";

// URL для отправки сообщения в Telegram
$url = "https://api.telegram.org/bot$token/sendMessage";

// Параметры запроса
$data = [
'chat_id' => $chat_id,
'text' => $txt
];

// Инициализация cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Выполнение запроса
$response = curl_exec($ch);
curl_close($ch);

// Проверка успешности отправки
if ($response) {
echo "Сообщение успешно отправлено.";
} else {
echo "Ошибка при отправке сообщения.";
}
?>