<!DOCTYPE html>
<html>
<head>
    <title>Тест</title>
    <style>
        body {
            background: radial-gradient(circle, rgba(226,228,208,1) 0%, rgba(128,90,62,1) 100%);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="radio"],
        input[type="checkbox"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
        }

        p {
            margin-bottom: 10px;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <?php
    // Проверка, была ли отправлена форма
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Проверка на заполнение имени пользователя
        if (empty($_POST["username"])) {
            echo "Пожалуйста, введите ваше имя.";
        } else {
            $username = $_POST["username"];

            // Вопросы и правильные ответы
            $questions = array(
                "Вопрос 1: На каком инструменте я играю?",
                "Вопрос 2: Сколько струн имеет укулеле?",
                "Вопрос 3: Чьи песни играют чаще всего?"
            );
            $correct_answers = array("a", "b", array("a", "c"));

            // Получение ответов пользователя
            $user_answers = array(
                $_POST["question1"],
                $_POST["question2"],
                isset($_POST["question3"]) ? $_POST["question3"] : array()
            );

            // Вывод результатов
            echo "<h2>Результаты теста</h2>";
            echo "<p>Имя пользователя: $username</p>";

            for ($i = 0; $i < count($questions); $i++) {
                echo "<p>$questions[$i]</p>";
                echo "<p>Ваш ответ: " . ($user_answers[$i] ? implode(", ", $user_answers[$i]) : "Не выбран") . "</p>";
                echo "<p>Правильный ответ: " . ($i == 2 ? "Кино(В.Цой), Макс Корж" : ($correct_answers[$i] == "a" ? "Укулеле" : "4")) . "</p>";
                echo "<hr>";
            }
        }
    }
    ?>

    <h1>Пройдите тест</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Введите ваше имя:</label>
        <input type="text" name="username" id="username">
        <br><br>

        <p>Вопросы:</p>

        <p>1. На каком инструменте я играю?</p>
        <input type="radio" name="question1" value="a" > Укулеле
        <br>
        <input type="radio" name="question1" value="b"> Гитара
        <br><br>

        <p>2. Сколько струн имеет укулеле</p>
        <input type="radio" name="question2" value="a" > 4
        <br>
        <input type="radio" name="question2" value="b"> 6 , как и гитара. Что за глупый вопрос?
        <br><br>

        <p>3. Чьи песни играют чаще всего? (можно выбрать несколько вариантов)</p>
        <input type="checkbox" name="question3[]" value="a" > Кино(В.Цой)
        <br>
        <input type="checkbox" name="question3[]" value="b"> Пётр Петров
        <br>
        <input type="checkbox" name="question3[]" value="c"> Макс Корж
        <br><br>

        <input type="submit" value="Отправить">
    </form>
</body>
</html>
