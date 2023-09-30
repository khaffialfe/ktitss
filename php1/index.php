<link rel='stylesheet' href='.//style.css' />
<?php
// Функция для валидации формы
function validate_form($name, $email, $phone) {
  // Проверка имени на пустоту и длину
  if (empty($name)) {
    return "Ошибка: имя не может быть пустым";
  }
  if (strlen($name) > 50) {
    return "Ошибка: имя не может быть длиннее 50 символов";
  }
  // Проверка email на пустоту, длину и формат
  if (empty($email)) {
    return "Ошибка: email не может быть пустым";
  }
  if (strlen($email) > 100) {
    return "Ошибка: email не может быть длиннее 100 символов";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return "Ошибка: email имеет неверный формат";
  }
  // Проверка номера телефона на пустоту и количество символов
  if (empty($phone)) {
    return "Ошибка: номер телефона не может быть пустым";
  }
  if (strlen($phone) != 10) {
    return "Ошибка: номер телефона должен состоять из 10 цифр";
  }
  // Если все проверки пройдены, возвращаем true
  return true;
}

// Получение данных из формы
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Вызов функции валидации и вывод результата
$result = validate_form($name, $email, $phone);
if ($result === true) {
  echo "Форма успешно отправлена";
} else {
  echo $result;
}
?>
