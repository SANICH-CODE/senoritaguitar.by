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
	$query = "SELECT access, name, surname, admin FROM users WHERE id = '$user_id'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		// Обработка ошибки в случае неудачного выполнения запроса
		echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
		exit;
	}
	$user = mysqli_fetch_assoc($result);
	$access = $user['access'];
	$name = $user['name'];
	$surname = $user['surname'];
	$admin = $user['admin'];
  if($access == 1){
	
	header("Location: /cp/");//перенаправление на страницу cp.php
		exit;
  }

?>
<html lang="id" dir="ltr">

<head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <meta name="description" content="" />
     <meta name="author" content="" />

     <!-- Title -->
     <title>Sorry, This Page Can&#39;t Be Accessed</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous" />
</head>

<body class="bg-dark text-white py-5">
     <div class="container py-5">
          <div class="row">
               <div class="col-md-2 text-center">
                    <p><i class="fa fa-exclamation-triangle fa-5x"></i><br/>Status Code: 403</p>
               </div>
               <div class="col-md-10">
                    <h3>Упс...</h3>
                    <p>Уважаемый(ая), <?php echo $surname ?> <?php echo $name ?>.</p>
					<p>Ваш доступ аннулирован</p>
					<p>Администратор <?php echo $admin ?>.</p>
					<p>Администратор <?php echo $reason ?>.</p>
                    <a class="btn btn-danger" href="javascript:history.back()">Назад</a>
                    <a class="btn btn-danger" href="/login.php">Авторизация</a>
               </div>
          </div>
     </div>

     <div id="footer" class="text-center">
          Senoritaguitar 2023 | Sergei Nikitko
     </div>
</body>

</html>
  
</body>
</html>
