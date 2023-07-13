<!-- Это личный кабинет пользователя :)
Тут мы ппроверяем access, ban-->

<?php
  session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: /403/');
        exit;
    } else {
		
        // Получаем имя пользователя из базы данных
        $user_id = $_SESSION['user_id'];
        $connection = mysqli_connect('localhost', 'root', '', 'users');
        $query = "SELECT * FROM users WHERE id = '$user_id'";

        $result = mysqli_query($connection, $query);
        if(!$result) {
            // Обработка ошибки в случае неудачного выполнения запроса
            echo "Произошла ошибка при выполнении запроса: " . mysqli_error($connection);
            exit;
        }
        $user = mysqli_fetch_assoc($result);
        $username = $user['username'];
		$name = $user['name'];
		$surname = $user['surname'];
		$user_id = $user['id'];
    $time_reg = $user['time_reg'];
		$ban = $user['ban'];
	if($ban == 1){
		header("Location: /ban/");//перенаправление на страницу banned.php
		exit;
	}
		$level = $user['level'];
		$rang = $user['rang'];
		$access = $user['access'];
		if($access == 0){
			header("Location: /access/");//перенаправление на страницу banned.php
			exit;
		}
		$awards = $user['awards'];
		$stepen = $user['stepen'];
    $news = $user['news'];
    
	}
?>

 



<div id="welcome">
    <h2>Добро пожаловать, <span><?php echo $surname;?> <?php echo $name; ?>! </span></h2>
	<h3>Ваш ваш username: <span><?php echo $username; ?> </span></h3>
	<h3>Ваш ID в системе: <span><?php echo $user_id; ?> </span></h3>
  <h3>Время регистрации аккаунта: <span><?php echo $time_reg; ?> </span></h3>
	<!--<h3>Ваши блокировки: <span><?php echo $ban; ?> </span></h3>-->
    <h3>Ваш Ранг: <span><?php echo $rang; ?> </span></h3>
	<!--<h3>Ваш уровень доступа: <span><?php echo $level; ?> </span></h3>-->
    <!-- <h2>Дипломы: <span><?php echo $stepen;?> <?php echo $awards;?> </span></h2> -->
    
	<p><a href="/admin/">Войти</a> в админ-панель</p>
  <p><a href="/forum/">Войти</a> на форум</p>
    <p><a href="logout.php">Выйти</a> из системы</p>
</div>
<body>
    <div class="timer-container">
      <div>Сообщение от администратора: <?php echo $news; ?><!--<br>До закрытия сессии: <span id="timer">--></span> </div>
    <!-- <button style="timer-container button" onclick="stopTimer()">СТОП</button>-->
    </div>

    <!--<script>
        var timerInterval; // Переменная для хранения интервала таймера

        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            timerInterval = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    window.location.href = "/cp/logout.php";
                }
            }, 1000);
        }

    //    function stopTimer() {
    //var password = prompt("Введите пароль:");
    //if (password === "azsxdc") { // Замените "mypassword" на свой пароль
    //    clearInterval(timerInterval);
    //    var display = document.querySelector('#timer');
    //    display.textContent = "Отключено";
    //    var button = document.querySelector('#stopButton');
    //    button.remove();
    //} else {
    //    alert("Неверный пароль");
    //}
    //}

        window.onload = function () {
            var fiveMinutes = 1 * 60, // 59
                display = document.querySelector('#timer');
            startTimer(fiveMinutes, display);
        };
    </script>-->
</body>
      
     
<style>
  .timer-container {
        text-align: center;
        position: fixed;
        down: 0;
        left: 0;
        width: 100%;
        background-color: #f2f2f2;
        padding: 10px;
        font-size: 24px;
    }
    .message {
text-align: center;
position: absolute; /* Добавляем абсолютное позиционирование */
bottom: 0; /* Блок будет располагаться внизу контейнера */
left: 50%; /* Центрируем блок по горизонтали */
transform: translateX(-50%); /* Центрируем блок по вертикали */
width: 500px; /* Примерный размер блока */
background-color: red; /* Цвет блока */
}
    .timer-container button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        margin-left: 10px;
    }

    .timer-container button:hover {
        background-color: #45a049;
    }
</style>




 

  

<style>
   
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
	
	footer {
color: #777;
font-size: 12px;
text-align: center;
margin-top: 20px;
	}
	body {
  display: grid;
  grid-template-rows: 1fr 10rem auto;
  grid-template-areas: "main" "." "footer";
  overflow-x: hidden;
  background: #F5F7FA;
  min-height: 100vh;
  font-family: "Open Sans", sans-serif;
}
body .footer {
  z-index: 1;
  --footer-background:#ED5565;
  display: grid;
  position: relative;
  grid-area: footer;
  min-height: 12rem;
}
body .footer .bubbles {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1rem;
  background: var(--footer-background);
  filter: url("#blob");
}
body .footer .bubbles .bubble {
  position: absolute;
  left: var(--position, 50%);
  background: var(--footer-background);
  border-radius: 100%;
  -webkit-animation: bubble-size var(--time, 4s) ease-in infinite var(--delay, 0s), bubble-move var(--time, 4s) ease-in infinite var(--delay, 0s);
          animation: bubble-size var(--time, 4s) ease-in infinite var(--delay, 0s), bubble-move var(--time, 4s) ease-in infinite var(--delay, 0s);
  transform: translate(-50%, 100%);
}
body .footer .content {
  z-index: 2;
  display: grid;
  grid-template-columns: 1fr auto;
  grid-gap: 4rem;
  padding: 2rem;
  background: var(--footer-background);
}
body .footer .content a, body .footer .content p {
  color: #F5F7FA;
  text-decoration: none;
}
body .footer .content b {
  color: white;
}
body .footer .content p {
  margin: 0;
  font-size: 0.75rem;
}
body .footer .content > div {
  display: flex;
  flex-direction: column;
  justify-content: center;
}
body .footer .content > div > div {
  margin: 0.25rem 0;
}
body .footer .content > div > div > * {
  margin-right: 0.5rem;
}
body .footer .content > div .image {
  align-self: center;
  width: 4rem;
  height: 4rem;
  margin: 0.25rem 0;
  background-size: cover;
  background-position: center;
}

@-webkit-keyframes bubble-size {
  0%, 75% {
    width: var(--size, 4rem);
    height: var(--size, 4rem);
  }
  100% {
    width: 0rem;
    height: 0rem;
  }
}

@keyframes bubble-size {
  0%, 75% {
    width: var(--size, 4rem);
    height: var(--size, 4rem);
  }
  100% {
    width: 0rem;
    height: 0rem;
  }
}
@-webkit-keyframes bubble-move {
  0% {
    bottom: -4rem;
  }
  100% {
    bottom: var(--distance, 10rem);
  }
}
@keyframes bubble-move {
  0% {
    bottom: -4rem;
  }
  100% {
    bottom: var(--distance, 10rem);
  }
}
</style>
<?php
// Проверяем значение level из базы данных
$level = 1; // Здесь предполагается, что значение level равно 1, 2 или 3

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




// Устанавливаем время таймера в зависимости от значения level
if ($level == 2) {
    // Если level равен 2, вызываем JavaScript функцию startTimer15()
    echo '<script>startTimer15();</script>';
} elseif ($level == 1) {
    // Если level равен 1, вызываем JavaScript функцию startTimer()
    echo '<script>startTimer();</script>';
} else {
    // Если level равен 3 или другому значению, отключаем таймер
    exit;
}

// Запускаем сессию (если еще не запущена)
if (!isset($_SESSION)) {
    session_start();
}

// Проверяем, есть ли уже установленное время в сессии
if (!isset($_SESSION['timer_start'])) {
    // Если нет, устанавливаем текущее время
    $_SESSION['timer_start'] = time();
} else {
    // Если есть, проверяем, истекло ли время таймера
    $timer_duration = ($level == 2) ? 900 : 300; // Устанавливаем продолжительность таймера в зависимости от level
    $time_elapsed = time() - $_SESSION['timer_start'];
    
    if ($time_elapsed >= $timer_duration) {
        // Если истекло, перенаправляем на страницу /cp/logout.php
        header("Location: /cp/logout.php");
        exit;
    }
}
?>
<?php
// Проверяем значение level из базы данных
$level = 1; // Здесь предполагается, что значение level равно 1, 2 или 3

// Получаем значение level из БД
$result = mysqli_query($db, "SELECT level FROM users WHERE user_id = '1'");
if ($row = mysqli_fetch_assoc($result)) {
    $level = $row['level'];
}

// Устанавливаем время таймера в зависимости от значения level
if ($level == 2) {
    // Если level равен 2, вызываем JavaScript функцию startTimer15()
    echo '<script>startTimer15();</script>';
} elseif ($level == 1) {
    // Если level равен 1, вызываем JavaScript функцию startTimer()
    echo '<script>startTimer();</script>';
} else {
    // Если level равен 3 или другому значению, отключаем таймер
    exit;
}

// Запускаем сессию (если еще не запущена)
if (!isset($_SESSION)) {
    session_start();
}

// Проверяем, есть ли уже установленное время в сессии
if (!isset($_SESSION['timer_start'])) {
    // Если нет, устанавливаем текущее время
    $_SESSION['timer_start'] = time();
} else {
    // Если есть, проверяем, истекло ли время таймера
    $timer_duration = ($level == 2) ? 900 : 300; // Устанавливаем продолжительность таймера в зависимости от level
    $time_elapsed = time() - $_SESSION['timer_start'];
    
    if ($time_elapsed >= $timer_duration) {
        // Если истекло, перенаправляем на страницу /cp/logout.php
        header("Location: /cp/logout.php");
        exit;
    }
}
?>