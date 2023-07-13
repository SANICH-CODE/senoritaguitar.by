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
    if($level == 1){
		header("Location: /403/");//перенаправление на страницу banned.php
		exit;
	}
    if($level == 2){
		header("Location: /403/");//перенаправление на страницу banned.php
		exit;
	}
?>

<head>
  <meta charset="UTF-8">
  <title>CodePen - Admin Panel Undone</title>
  <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Admin Panel</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user">&nbsp;</span>Hello,  <?php echo $username; ?></a></li>
        <li class="active"><a title="View Website" href="/"><span class="glyphicon glyphicon-globe"></span></a></li>
        <li><a href="/cp/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="col-md-3">

   
  </div>
  <div class="col-md-9 animated bounce">
    <h1 class="page-header">Dashboard</h1>
    <ul class="breadcrumb">
      <li><span class="glyphicon glyphicon-home">&nbsp;</span>Home</li>
      <li><a href="#">Dashboard</a></li>
    </ul>
    <table class="table table-hover">
      <thead>
        <th>&nbsp;</th>
        <th class="text-center">#</th>
        <th>Title</th>
        <th class="text-center">Author</th>
        <th>Status</th>
        <th class="text-center">Ссылки</th>

      </thead>
      <tbody>
        <!--
          <tr>
            <td> </td>
            <td class="text-center">1</td>
            <td width="70%">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
            <td class="text-center" width="10%">Admin</td>
            <td><span class="label label-info">Pending</span></td>
          </tr>
-->
        <!-- START CONTENT END -->
        <tr>
          <td>
             
          </td>
          <td class="text-center">1</td> <!-- Сюда вставиить id из таблицы -->
          <td width="70%">Users</td> <!-- Сюда вставиить username из таблицы -->
          <td class="text-center" width="10%">Console</td>
          
          <td><span class="label label-success"><span class="glyphicon glyphicon-ok-sign">&nbsp;</span>Ok</span></td>
          <td class="text-center" width="10%" ><a href="/admin/users.php">Перейти</a></td>
        </tr>
        <tr>
          <td>
             
          </td>
          <td class="text-center">2</td>
          <td width="70%">Awards</td>
          <td class="text-center" width="10%">s.nikitko</td>
          <td><span class="label label-success"><span class="glyphicon glyphicon-ok-sign">&nbsp;</span>Ok</span></td>
          <td class="text-center" width="10%" ><a href="/admin/awards.php">Перейти</a></td>
         <!-- <td class="text-center" width="10%">Перейти</td> -->
        </tr>
        <tr>
          <td>
             
          </td>
          <td class="text-center">3</td>
          <td width="70%">--</td>
          <td class="text-center" width="10%">--</td>
          <td><span class="label label-info"><span class="glyphicon glyphicon-time">&nbsp;</span>waiting</span>
          </td>
        </tr>
        <tr>
          <td>
           <!--  
          </td>
          <td class="text-center">4</td>
          <td width="70%">--</td>
          <td class="text-center" width="10%">--</td>
          <td><span class="label label-info"><span class="glyphicon glyphicon-time">&nbsp;</span>waiting</span>
          </td>
        </tr>
        <tr>
          <td>
             
          </td>
          <td class="text-center">1</td>
          <td width="70%">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
          <td class="text-center" width="10%">Admin</td>
          <td><span class="label label-info"><span class="glyphicon glyphicon-time">&nbsp;</span>waiting</span>
          </td>
        </tr>
        <tr>
          <td>
             
          </td>
          <td class="text-center">1</td>
          <td width="70%">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
          <td class="text-center" width="10%">Admin</td>
          <td><span class="label label-info"><span class="glyphicon glyphicon-time">&nbsp;</span>waiting</span>
          </td>
        </tr>
        <tr>
          <td>
             
          </td>
          <td class="text-center">1</td>
          <td width="70%">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
          <td class="text-center" width="10%">Admin</td>
          <td><span class="label label-info"><span class="glyphicon glyphicon-time">&nbsp;</span>waiting</span>
          </td>
        </tr>
        <tr>
          <td>
             
          </td>
          <td class="text-center">1</td>
          <td width="70%">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
          <td class="text-center" width="10%">Admin</td>
          <td><span class="label label-info"><span class="glyphicon glyphicon-time">&nbsp;</span>waiting</span>
          </td>
        </tr>
        <tr>
          <td>
             
          </td>
          <td class="text-center">1</td>
          <td width="70%">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
          <td class="text-center" width="10%">Admin</td>
          <td><span class="label label-info"><span class="glyphicon glyphicon-time">&nbsp;</span>waiting</span>
          </td>
        </tr>
        <tr>
          <td>
             
          </td>
          <td class="text-center">1</td>
          <td width="70%">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</td>
          <td class="text-center" width="10%">Admin</td>
          <td><span class="label label-info"><span class="glyphicon glyphicon-time">&nbsp;</span>waiting</span>
          </td>
        </tr>
-->
        <!-- DUMP CONTENT END -->

      </tbody>

    </table>
  </div>
</div>

</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>