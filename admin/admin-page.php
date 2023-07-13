<?php
session_start();

//проверка наличия куки
if(isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])){
  
  //подключение к базе данных
  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = '';
  $db_name = 'users';
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

  //получение значения поля 'ban' из базы данных по id пользователя из куки
  $user_id = $_COOKIE['user_id'];
  $query = "SELECT ban FROM users WHERE id='$user_id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  //проверка значения поля 'ban'
  if($row['ban'] == 1){

    //пользователь заблокирован, переадресация на страницу banned.php
    header("Location: banned.php");
    exit;
  }}
?>
<?php
  session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: /login.php');
        exit;
    } else {
		
        // Получаем имя пользователя из базы данных
        $user_id = $_SESSION['user_id'];
        $connection = mysqli_connect('localhost', 'root', '', 'users');
        $query = "SELECT username FROM users WHERE id = '$user_id'";

        $result = mysqli_query($connection, $query);
        if(!$result) {
            // Обработка ошибки в случае неудачного выполнения запроса
            echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
            exit;
        }
        $user = mysqli_fetch_assoc($result);
        $username = $user['username'];}
		
?>
<?php
    
        // Получаем идентификатор пользователя из базы данных
        $user_id = $_SESSION['user_id'];
        $connection = mysqli_connect('localhost', 'root', '', 'users');
        $query = "SELECT id FROM users WHERE id = '$user_id'";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            // Обработка ошибки в случае неудачного выполнения запроса
            echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
            exit;
        }
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];
?>
<?php
    
	// Получаем идентификатор пользователя из базы данных
	$user_id = $_SESSION['user_id'];
	$connection = mysqli_connect('localhost', 'root', '', 'users');
	$query = "SELECT ban FROM users WHERE id = '$user_id'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		// Обработка ошибки в случае неудачного выполнения запроса
		echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
		exit;
	}
	$user = mysqli_fetch_assoc($result);
	$ban = $user['ban'];
	if($ban == 1){
		header("Location: /ban/");//перенаправление на страницу banned.php
		exit;
	}
?>
<?php
    
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
?>
<?php
    
	// Получаем идентификатор пользователя из базы данных
	$user_id = $_SESSION['user_id'];
	$connection = mysqli_connect('localhost', 'root', '', 'users');
	$query = "SELECT rang FROM users WHERE id = '$user_id'";
	$result = mysqli_query($connection, $query);
	if(!$result) {
		// Обработка ошибки в случае неудачного выполнения запроса
		echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
		exit;
	}
	$user = mysqli_fetch_assoc($result);
	$rang = $user['rang'];
?>
<div id="welcome">
    <h2>Добро пожаловать, <span><?php echo $username; ?>! </span></h2>
	<h3>Ваш ID в системе <span><?php echo $user_id; ?> </span></h3>
	<h3>Ваши блокировки <span><?php echo $ban; ?> </span></h3>
    <h3>Ваш Ранг <span><?php echo $rang; ?> </span></h3>
	<h3>Ваш уровень доступа к Ya.Cloud (max 3) <span><?php echo $level; ?> </span></h3>
    <h3>Ваш уровень доступа к Ya.Plus (max 3) <span><?php echo $level; ?> </span></h3>
	<p><a href="/admin/">Войти</a> в админ-панель</p>
    <p><a href="logout.php">Выйти</a> из системы</p>
</div>


<style>
    /*= ОБЩИЕ СТИЛИ
	--------------------------------------------------------*/
	body {
   background: #efefef;
   font-family: 'Open Sans', sans-serif;
   color: #777;
	}

	a {
   color: #f58220;
 font-weight: 400;
	}
	
	span {
   font-weight: 300;
   color: #f58220;
	}

	.mlogin {
   margin: 170px auto 0;
	}

	.mregister {
  margin: 80px auto 0;
	}

	.error {
   margin: 40px auto 0;
	border: 1px solid #777;
 padding: 3px;
	color: #fff;
   text-align: center;
 width: 650px;
 background: #f58220;
	}

	.regtext {
   font-size: 13px;
   margin-top: 26px;
   color: #777;
	}
	
	/*= КОНТЕЙНЕРЫ
	--------------------------------------------------------*/
	.container {
	padding: 25px 16px 25px 10px;
	font-weight: 400;
	overflow: hidden;
	width: 350px;
	height: auto;
	background: #fff;
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,.13);
	box-shadow: 0 1px 3px rgba(0,0,0,.13);
	}
	
	#welcome {
	width: 500px;
	padding: 30px;
	background: #fff;
	margin: 160px auto 0;
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,.13);
   box-shadow: 0 1px 3px rgba(0,0,0,.13);
	}
	
	.container h1 {
	color: #777;
	text-align: center;
	font-weight: 300;
   border: 1px dashed #777;
   margin-top: 13px;
	}

	.container label {
	color: #777;
	font-size: 14px;
	}

	#login {
  width: 320px;
	margin: auto;
	padding-bottom: 15px;
	}

	.container form .input,.container input[type=text],.container input[type=password],.container input[type=e] {
	background: #fbfbfb;
	font-size: 24px;
	line-height: 1;
	width: 100%;
	padding: 3px;
 margin: 0 6px 5px 0;
   outline: none;
   border: 1px solid #d9d9d9;
	}
	
	.container form .input:focus {
	border: 1px solid #f58220;
 -webkit-box-shadow: 0 0 3px 0 rgba(245,130,32,0.75);
-moz-box-shadow: 0 0 3px 0 rgba(245,130,32,0.75);
 box-shadow: 0 0 3px 0 rgba(245,130,32,0.75);
	}
	
	/*= КНОПКИ
	--------------------------------------------------------*/
	
	.button{
	border: solid 1px #da7c0c;
	background: #f78d1d;
	background: -webkit-gradient(linear, left top, leftbottom, from(#faa51a), to(#f47a20));
	background: -moz-linear-gradient(top,  #faa51a, #f47a20);
  filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
   color: #fff;
	padding: 7px 12px;
	-webkit-border-radius:4px;
moz-border-radius:4px;
 border-radius:4px;
	float: right;
	cursor: pointer;
	}
	
	.button:hover{
	background: #f47c20;
  background: -webkit-gradient(linear, left top, leftbottom, from(#f88e11), to(#f06015));
	background: -moz-linear-gradient(top,  #f88e11, #f06015);
  filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f88e11', endColorstr='#f06015');
	}
	/*= ПОДВАЛ
	--------------------------------------------------------*/
	footer {
color: #777;
font-size: 12px;
text-align: center;
margin-top: 20px;
	}
</style>