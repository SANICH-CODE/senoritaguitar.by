<?php
    session_start();
	// Получаем идентификатор пользователя из базы данных
	$user_id = $_SESSION['user_id'];
	$connection = mysqli_connect('localhost', 'root', '', 'users');
	$query = "SELECT level FROM users WHERE id = '$user_id'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		// Обработка ошибки в случае неудачного выполнения запроса
		echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
		exit;
	}
	$user = mysqli_fetch_assoc($result);
	$level = $user['level'];
    if($level == 1){
		header("Location: /403/");//перенаправление на страницу banned.php
		exit;
	}
    if($level == 2){
		header("Location: /403/");//перенаправление на страницу banned.php
		exit;
	}
?>

<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выборка данных из таблицы 'users'
$sql = "SELECT id, surname, name, awards, stepen FROM users";
$result = $conn->query($sql);

// Вывод данных в HTML-разметку
if ($result->num_rows > 0) {
    echo "<table><tr><th>Фамилия</th><th>Имя</th><th>Степень</th><th>Диплом</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["surname"]."</td><td>".$row["name"]."</td><td>".$row["stepen"]."</td><td>".$row["awards"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Закрытие соединения с базой данных
$conn->close();
?>