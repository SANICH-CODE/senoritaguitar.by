<?php
    session_start();
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
    if($ban == 0){
		header("Location: /");//перенаправление на страницу banned.php
		exit;
	}

?>
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
<html lang="ru"></html>
    <meta charset="utf-8">
        <title>Вы заблокированы</title>

<h1>BAN</h1>
<div><p>> <span>BAN CODE</span>: "<i>B06 BANNED</i>"</p>
<!--<p>> <span>Описание</span>: "<i>Вы заблокированы!</i>"</p>-->
<p>> <span>Причина</span>: [<b><?php echo $reason; ?></b>]</p>
<p>> <span>Администратор</span>: <b>console</b></p>
<p>> <span>У вас есть разрешение</span>: [<a href="/">Главная</a>]</p>
</div>

<script>
    var str = document.getElementsByTagName('div')[0].innerHTML.toString();
var i = 0;
document.getElementsByTagName('div')[0].innerHTML = "";

setTimeout(function() {
    var se = setInterval(function() {
        i++;
        document.getElementsByTagName('div')[0].innerHTML = str.slice(0, i) + "|";
        if (i == str.length) {
            clearInterval(se);
            document.getElementsByTagName('div')[0].innerHTML = str;
        }
    }, 10);
},0);

</script>
<style>
.user{
    align-items: center;
    margin-top: 30px;
}
body{
	background-color: #eee;
}
.card{
	background-color: #fff;
	width: 280px;
	border-radius: 33px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	padding: 2rem !important;
}
.top-container{
	display: flex;
	align-items: center;
}
.profile-image{
	border-radius: 10px;
	border: 2px solid #5957f9;
}
.name{
	font-size: 15px;
	font-weight: bold;
	color: #272727;
	position: relative;
	top: 8px;
}
.mail{
	font-size: 14px;
	color: grey;
	position: relative;
	top: 2px;
}
.middle-container{
	background-color: #eee;
	border-radius: 12px;

}
.middle-container:hover {
	border: 1px solid #5957f9;
}
.dollar-div{
	background-color: #5957f9;
	padding: 12px;
	border-radius: 10px;
}
.round-div{
	border-radius: 50%;
	width: 35px;
	height: 35px;
	background-color: #fff;
	display: flex;
	justify-content: center;
	align-items: center;
	text-align: center;
}
.dollar{
	font-size: 16px !important;
	color: #5957f9 !important;
	font-weight: bold !important;
}


.current-balance{
	font-size: 15px;
	color: #272727;
	font-weight: bold;
}
.amount{
	color: #5957f9;
	font-size: 16px;
	font-weight: bold;
}
.dollar-sign{
	font-size: 16px;
	color: #272727;
	font-weight: bold;
}

.recent-border{
	border-left: 2px solid #5957f9;
	display: flex;
	align-items: center;

}
.recent-border:hover {
	border-bottom: 1px solid #dee2e6!important;
}

.recent-orders{
	font-size: 16px;
	font-weight: 700;
	color: #5957f9;
	margin-left: 2px;
}

.wishlist{
	font-size: 16px;
	font-weight: 700;
	color: #272727;

}
.wishlist-border:hover{
	border-bottom: 1px solid #dee2e6!important;
}
.fashion-studio{
	font-size: 16px;
	font-weight: 700;
	color: #272727;
}
.fashion-studio-border:hover {
	border-bottom: 1px solid #dee2e6!important;
}

    @import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700");

* {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
    box-sizing: border-box;
    color: inherit;
}

body {
    background-image: linear-gradient(120deg, #4f0088 0%, #000000 100%);
    height: 100vh;
}

h1 {
    font-size: 45vw;
    text-align: center;
    position: fixed;
    width: 100vw;
    z-index: 1;
    color: #ffffff26;
    text-shadow: 0 0 50px rgba(0, 0, 0, 0.07);
    top: 50%;
    transform: translateY(-50%);
    font-family: "Montserrat", monospace;
}

div {
    background: rgba(0, 0, 0, 0);
    width: 70vw;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    margin: 0 auto;
    padding: 30px 30px 10px;
    box-shadow: 0 0 150px -20px rgba(0, 0, 0, 0.5);
    z-index: 3;
}

P {
    font-family: "Share Tech Mono", monospace;
    color: #f5f5f5;
    margin: 0 0 20px;
    font-size: 17px;
    line-height: 1.2;
}

span {
    color: #f0c674;
}

i {
    color: #8abeb7;
}

div a {
    text-decoration: none;
}

b {
    color: #81a2be;
}

a.avatar {
    position: fixed;
    bottom: 15px;
    right: -100px;
    animation: slide 0.5s 4.5s forwards;
    display: block;
    z-index: 4
}

a.avatar img {
    border-radius: 100%;
    width: 44px;
    border: 2px solid white;
}

@keyframes slide {
    from {
        right: -100px;
        transform: rotate(360deg);
        opacity: 0;
    }
    to {
        right: 15px;
        transform: rotate(0deg);
        opacity: 1;
    }
}

</style>