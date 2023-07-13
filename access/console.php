<?php
    session_start();
	// Получаем идентификатор пользователя из базы данных
	$user_id = $_SESSION['user_id'];
	$connection = mysqli_connect('localhost', 'root', '', 'users');
	$query = "SELECT reason FROM users WHERE id = '$user_id'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		// Обработка ошибки в случае неудачного выполнения запроса
		echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
		exit;
	}
	$user = mysqli_fetch_assoc($result);
	$reason = $user['reason'];


?>
<?php
 
	// Получаем идентификатор пользователя из базы данных
	$user_id = $_SESSION['user_id'];
	$connection = mysqli_connect('localhost', 'root', '', 'users');
	$query = "SELECT access FROM users WHERE id = '$user_id'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		// Обработка ошибки в случае неудачного выполнения запроса
		echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
		exit;
	}
	$user = mysqli_fetch_assoc($result);
	$access = $user['access'];
  if($access == 1){
		header("Location: /cp/");//перенаправление на страницу cp.php
		exit;
  }

?>
<html lang="ru" >
<head>
  <meta charset="UTF-8">
  <title>Доступ ограничен</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="lock"></div>
<div class="message">
  <h1>Нельзя пройти авторизацию</h1>
  <p>Ваш ранг (console) не позволяет пройти авторизацию. </p>
  <p>Admin: database; </p>
  <p>Reason: <?php echo $reason; ?> </p>
</div>
<!-- partial -->
  
</body>
</html>
