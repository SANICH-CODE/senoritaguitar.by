<?php

session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: /login.php');
        exit;
    }
// проверка авторизации


// подключение к базе данных
$servername = "localhost"; // замените на свое значение
$username = "root"; // замените на свое значение
$password = ""; // замените на свое значение
$dbname = "users"; // замените на свое значение

$conn = new mysqli($servername, $username, $password, $dbname);

// проверка на ошибки подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// обработка POST-запроса для изменения значения access в базе данных
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $new_reason = $_POST["reason"];
    $new_access = isset($_POST["access"]) ? $_POST["access"] : 0; // определяем значение access в зависимости от состояния переключателя

    // обновление столбцов reason и access в базе данных
    $sql = "UPDATE users SET reason='$new_reason', access='$new_access' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// получение всех записей и формирование выпадающего списка
$sql = "SELECT id, name, surname FROM users";
$result = $conn->query($sql);
$select_options = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $select_options .= "<option value='" . $row["id"] . "'>" . $row["name"] . " " . $row["surname"] . "</option>";
    }
}

// получение выбранной записи
$id = "";
$name = "";
$surname = "";
$reason = "";
$access = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    // получение столбцов name, surname, reason и access по выбранному id
    $sql = "SELECT name, surname, reason, access FROM users WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $surname = $row["surname"];
        $reason = $row["reason"];
        $access = $row["access"];
    }
}

// отображение формы
echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
echo 'Select a user:';
echo '<select name="id">';
echo $select_options;
echo '</select><br>';
echo 'Name: ' . $name . '<br>';
echo 'Surname: ' . $surname . '<br>';
echo 'Reason: <input type="text" name="reason" value="' . $reason . '"><br>';
echo 'Access: <input type="checkbox" name="access" value="1" ' . ($access == 1 ? "checked" : "") . '><br>';
echo '<input type="submit" value="Save">';
echo '</form>';

?>
<style>
    form {
  max-width: 500px;
  margin: auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #eee;
  border-radius: 10px;
  padding: 20px;
}

select,
input[type="text"],
label {
  margin: 10px 0;
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: none;
}

select:focus,
input[type="text"]:focus {
  outline: none;
  box-shadow: 0 0 5px #ccc;
}

input[type="checkbox"] {
  margin: 10px 5px;
  width: auto;
  height: auto;
}

input[type="submit"] {
  width: 100%;
  margin-top: 20px;
  background-color: #3399FF;
  color: white;
  padding: 10px;
  border-radius: 5px;
  border: none;
}

input[type="submit"]:hover {
  cursor: pointer;
  background-color: #0077FF;
}
</style>