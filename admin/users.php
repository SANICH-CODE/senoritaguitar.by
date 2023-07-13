<?php
// Подключение к БД
$mysqli = new mysqli('localhost', 'root', '', 'users');

// Проверка соединения
if ($mysqli->connect_error) {
    die('Ошибка подключения: ' . $mysqli->connect_error);
}

// Запрос на выборку данных из таблицы users
$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

// Проверка наличия данных
if ($result->num_rows > 0) {
    // Вывод данных и добавление указанного кода на каждую строку
    while ($row = $result->fetch_assoc()) {
        echo '<div class="row">
                  <div class="col-lg-4">
                      <div class="text-center card-box">
                          <div class="member-card pt-2 pb-2">
                              <div class="">
                                  <h4>' . $row["name"] . ' '   .$row["surname"].'</h4>
                                  <p class="text-muted">@' . $row["username"] . ' <span>| </span><span><a class="text-pink">Доступ: '   .$row["access"].'; Блокировка: '   .$row["ban"].'</a></span></p>
                              </div>
                              <div class="mt-4">
                                  <div class="row">
                                      <div class="col-4">
                                          <div class="mt-3">
                                          <h4>ID в системе: ' . $row["id"] . '</h4>
                                              <h4>Ранг в системе: ' . $row["rang"] . '</h4>
                                              
                                          </div>
                                      </div>
                                      
                                      <div class="col-4">
                                          <div class="mt-3">
                                              <h4>Информация</h4>
                                              <p class="mb-0 text-muted">Время регистрации: ' . $row["time_reg"] . '</p>
                                              <p class="mb-0 text-muted">Уровень доступа: ' . $row["level"] . '</p>
                                              <p class="mb-0 text-muted">Администратор: ' . $row["admin"] . '</p>
                                              <p class="mb-0 text-muted">Сообщение от администратора: ' . $row["news"] . '</p>
                                              <p class="mb-0 text-muted">Причина наказания: ' . $row["reason"] . '</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>';
    }
} else {
    echo "Нет данных";
}

// Закрытие соединения с БД
$mysqli->close();
?>
<div class="timer-container">
      <div><a href="javascript:history.back()">Назад</a></span> </div>
    <!-- <button style="timer-container button" onclick="stopTimer()">СТОП</button>-->
    </div>
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

	body{
    background:#DCDCDC;
    margin-top:20px;
}
.card-box {
    padding: 20px;
    border-radius: 3px;
    margin-bottom: 30px;
    background-color: #fff;
}

.social-links li a {
    border-radius: 50%;
    color: rgba(121, 121, 121, .8);
    display: inline-block;
    height: 30px;
    line-height: 27px;
    border: 2px solid rgba(121, 121, 121, .5);
    text-align: center;
    width: 30px
}

.social-links li a:hover {
    color: #797979;
    border: 2px solid #797979
}
.thumb-lg {
    height: 88px;
    width: 88px;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.text-pink {
    color: #ff679b!important;
}
.btn-rounded {
    border-radius: 2em;
}
.text-muted {
    color: #98a6ad!important;
}
h4 {
    line-height: 22px;
    font-size: 18px;
}
</style>