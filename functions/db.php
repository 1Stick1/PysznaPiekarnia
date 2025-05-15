<?php
// Получаем строку подключения из переменной окружения
$dbUrl = getenv('mysql://root:KIZQusulaxPQkezVyzmUQAIQBPDOIhfr@yamabiko.proxy.rlwy.net:35387/railway');  // В зависимости от твоей базы, это может быть DATABASE_URL для PostgreSQL или CLEARDB_DATABASE_URL для MySQL

// Разбираем строку на компоненты
$url = parse_url($dbUrl);

// Извлекаем параметры подключения из строки
$host = $url['host'];
$user = $url['user'];
$password = $url['pass'];
$dbname = ltrim($url['path'], '/');  // Убираем слэш в начале пути, который указывает на имя базы данных

// Создаем подключение
$conn = mysqli_connect($host, $user, $password, $dbname);

// Проверка на успешное подключение
if ($conn->connect_error) {
    die("Connect error: " . $conn->connect_error);
}

echo "Connected successfully";
?>
