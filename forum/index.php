<link rel="stylesheet" type="text/css" href="/forum/style.css">
<?php
  session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: /403/');
        exit;
    } else {
		
        // Получаем имя пользователя из базы данных
        $user_id = $_SESSION['user_id'];
        $connection = mysqli_connect('localhost', 'root', '', 'users');
        $query = "SELECT username, name, surname, id, ban, level, rang, access, awards, stepen, news FROM users WHERE id = '$user_id'";

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
<!-- <div class="timer-container">
      <div>Сообщение от администратора: </span> </div>
    
    </div> -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка подключения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Запрос на выборку значения из столбца "cp"
$sql = "SELECT * FROM posts";

$result = mysqli_query($conn, $sql);

// Проверка успешного выполнения запроса
if ($result->num_rows > 0) {
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    // Сортировка массива записей по убыванию ID
    usort($rows, function($a, $b) {
        if ($a['priority'] === 'high' && $b['priority'] !== 'high') {
            return -1;
        } elseif ($a['priority'] !== 'high' && $b['priority'] === 'high') {
            return 1;
        } else {
            return $b['id'] - $a['id'];
        }
    });
   
    foreach($rows as $row) {
        $id = $row["id"];
        $author = $row["author"];
        $time = $row["time"];
        $priority = $row["priority"];
        $name = $row["name"];
        $text = $row["text"];
        $comment = $row["comment"];
        $tag_1 = $row["tag_1"];
        $tag_2 = $row["tag_2"];
        $tag_3 = $row["tag_3"];
       

        if ($priority == "high") {
            $status = "ВЫСОКИЙ"; // Создание переменной со значением "ВЫСОКИЙ"
        } elseif ($priority == "low") {
            $status = "СТАНДАРТНЫЙ"; // Создание переменной со значением "СТАНДАРТНЫЙ"
        } else {
            $status = "НЕИЗВЕСТНО"; // В случае, если значение priority не равно ни "high", ни "low"
        }
        
        echo '<div class="blog-container">';
        echo '<div class="blog-header">';
        echo '<div class="blog-cover">';
        echo '<div class="blog-author">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="blog-body">';
        echo '<div class="blog-title">';
        echo '<h1>' . $name . '</h1>';
        echo '</div>';
        echo '<div class="blog-summary">';
        echo '<p>' . $text . '</p>';
        echo '</div>';
        echo '<div class="blog-tags">';
        echo '<ul>';
        echo '<li><a>id:' . $id . '</a></li>';
        echo '<li><a>' . $comment . '</a></li>';
        
        echo '<li><a>' . $tag_1 . '</a></li>';
        echo '<li><a>' . $tag_2 . '</a></li>';
        echo '<li><a>' . $tag_3 . '</a></li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '<div class="blog-footer">';
        echo '<ul>';
        echo '<li class="published-date">' . $author . '</li>';
        echo '<li class="published-date">Приоритет: ' . $status . '</li>';

        echo '<li class="published-date">' . $time . '</li>';
        echo '</ul>';

        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="no-posts">Нет записей</p>';
}
?>

<style>
.timer-container {
    text-align: center;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background-color: #f2f2f2;
    padding: 10px;
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}




</style>

 


<style>body {
  background: #e5ded8;
  box-sizing: border-box;
}



.blog-container {
  background: #fff;
  border-radius: 5px;
  box-shadow: rgba(0, 0, 0, 0.2) 0 4px 2px -2px;
  font-family: "adelle-sans", sans-serif;
  font-weight: 100;
  margin: 48px auto;
  width: 20rem;
}
@media screen and (min-width: 480px) {
  .blog-container {
    width: 28rem;
  }
}
@media screen and (min-width: 767px) {
  .blog-container {
    width: 40rem;
  }
}
@media screen and (min-width: 959px) {
  .blog-container {
    width: 50rem;
  }
}

.blog-container a {
  color: #4d4dff;
  text-decoration: none;
  transition: 0.25s ease;
}
.blog-container a:hover {
  border-color: #ff4d4d;
  color: #ff4d4d;
}

.blog-cover {
  background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/17779/yosemite-3.jpg");
  background-size: cover;
  border-radius: 5px 5px 0 0;
  height: 15rem;
  box-shadow: inset rgba(0, 0, 0, 0.2) 0 64px 64px 16px;
}

.blog-author,
.blog-author--no-cover {
  margin: 0 auto;
  padding-top: 0.125rem;
  width: 80%;
}


.blog-author h3 {
  color: #fff;
  font-weight: 100;
}

.blog-author--no-cover h3 {
  color: #999999;
  font-weight: 100;
}

.blog-body {
  margin: 0 auto;
  width: 80%;
}

.video-body {
  height: 100%;
  width: 100%;
}

.blog-title h1 a {
  color: #333;
  font-weight: 100;
}

.blog-summary p {
  color: #4d4d4d;
}

.blog-tags ul {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  list-style: none;
  padding-left: 0;
}

.blog-tags li + li {
  margin-left: 0.5rem;
}

.blog-tags a {
  border: 1px solid #999999;
  border-radius: 3px;
  color: #999999;
  font-size: 0.75rem;
  height: 1.5rem;
  line-height: 1.5rem;
  letter-spacing: 1px;
  padding: 0 0.5rem;
  text-align: center;
  text-transform: uppercase;
  white-space: nowrap;
  width: 5rem;
}

.blog-footer {
  border-top: 1px solid #e6e6e6;
  margin: 0 auto;
  padding-bottom: 0.125rem;
  width: 80%;
}

.blog-footer ul {
  list-style: none;
  display: flex;
  flex: row wrap;
  justify-content: flex-end;
  padding-left: 0;
}

.blog-footer li:first-child {
  margin-right: auto;
}

.blog-footer li + li {
  margin-left: 0.5rem;
}

.blog-footer li {
  color: #999999;
  font-size: 0.75rem;
  height: 1.5rem;
  letter-spacing: 1px;
  line-height: 1.5rem;
  text-align: center;
  text-transform: uppercase;
  position: relative;
  white-space: nowrap;
}
.blog-footer li a {
  color: #999999;
}

.comments {
  margin-right: 1rem;
}

.published-date {
  border: 1px solid #999999;
  border-radius: 3px;
  padding: 0 0.5rem;
}

.numero {
  position: relative;
  top: -0.5rem;
}

.icon-star,
.icon-bubble {
  fill: #999999;
  height: 24px;
  margin-right: 0.5rem;
  transition: 0.25s ease;
  width: 24px;
}
.icon-star:hover,
.icon-bubble:hover {
  fill: #ff4d4d;
}</style>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>NEWS</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;display=swap'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="main"></div>
<div class="footer">
  
  <div class="content">
    <div>
      
      <div><b>Ссылки   </b><a href="/cp/">Профиль   </a>   <a href="/cp/logout.php">logout</a>
    </div>
    <div><a class="image" href="https://codepen.io/z-" target="_blank" style="background-image: url(&quot;https://s3-us-west-2.amazonaws.com/s.cdpn.io/199011/happy.svg&quot;)"></a>
      <p>©2023 Sergei Nikitko</p>
    </div>
  </div>
</div>
<svg style="position:fixed; top:100vh">
  <defs>
    <filter id="blob">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="blob"></feColorMatrix>
      <!--feComposite(in="SourceGraphic" in2="blob" operator="atop") //After reviewing this after years I can't remember why I added this but it isn't necessary for the blob effect-->
    </filter>
  </defs>
</svg>
<!-- partial -->
  
</body>
</html>
<html>
    
</html>
