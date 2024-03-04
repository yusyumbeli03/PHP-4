<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP 4th lab</title>
    <style>
        body{
            /* background: linear-gradient(90deg, rgba(191,132,204,1) 0%, rgba(184,116,61,1) 88%); */
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        }
        fieldset{
            background:#b7c6c2;
            font-size:18px;
            font-family:monospace;
        }

    </style>
</head>
<body>
<div class="form">
 <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
 <fieldset>
 <legend>Оставьте отзыв!</legend>
 <div id="main_info" style="display: flex; flex-direction: column; gap: 10px;">
 <div>
 <label for="name">Имя:
 <input type="text" id="name" name="name"/>
 </label>
 </div>
 <div>
 <label for="email">Email:
 <input type="email" id="email" name="email"/>
 </label>
 </div>
 </div>
 <div id="extra_info">
 <div>
 <p><label for="review">Оцените наш сервис!</label></p>
 <div style="display: flex; flex-direction: column;">
 <p><input id="review" type="radio" name="review" value="10" checked>Хорошо</p>
 <p><input id="review" type="radio" name="review" value="8">Удовлетворительно</p>
 <p><input id="review" type="radio" name="review" value="5">Плохо</p>
 </div>
 </div>
 </div>
 <div id="message_info">
 <div>
 <p><label for="comment">Ваш комментарий: </label></p>
 <textarea id="comment" name="comment" cols="30" rows="10" class="comment"></textarea>
 </div>
 </div>
 <div id="buttons" style="display: flex; flex-direction: row; gap: 10px; margin-top: 10px;">
 <input type="submit" value="Отправить"/>
 <input type="reset" value="Удалить"/>
 </div>
 </fieldset>
 </form>
 <?php
function validateFormData($formData) {
    $errors = array();

    if (empty($formData['name'])) {
        $errors[] = "Пожалуйста, введите ваше имя.";
    }
    // Проверка валидности e-mail
    if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Пожалуйста, введите корректный e-mail адрес.";
    }

    if (empty($formData['comment'])) {
        $errors[] = "Пожалуйста, напишите ваш комментарий.";
    }
    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validationErrors = validateFormData($_POST);

    if (empty($validationErrors)) {
        echo '<div id="result">
        <p>Ваше имя: <b>'. $_POST["name"].'</b></p>
        <p>Ваш e-mail: <b>'. $_POST["email"].'</b></p>
        <p>Оценка товара: <b>'. $_POST["review"].'</b></p>
        <p>Ваше сообщение: <b>' . $_POST["comment"].'</b></p>
        </div>';
        echo "<p>Форма успешно отправлена!</p>";
    } else {
        echo "<div style='color: red;font-size:20px;'>";
        foreach ($validationErrors as $error) {
            echo "<p>$error</p>";
        }
        echo "</div>";
    }
}
?>
</div>
</body>
</html>