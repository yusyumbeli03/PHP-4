<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, rgba(226,228,208,1) 0%, rgba(128,90,62,1) 100%);
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .question {
            margin-bottom: 20px;
        }
        .question label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Пройдите тест</h2>
    <form method="post">
        <div class="question">
            <label for="name">Введите ваше имя:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="question">
    <label>На каком инструменте я играю?</label><br>
    <label><input type="radio" id="ukulele" name="q1" value="Укулеле" required> Укулеле</label><br>
    <label><input type="radio" id="guitar" name="q1" value="Гитара"> Гитара</label>
</div>
<div class="question">
    <label>Сколько струн имеет укулеле?</label><br>
    <label><input type="radio" id="four" name="q2" value="4" required> 4</label><br>
    <label><input type="radio" id="six" name="q2" value="6, как и гитара. Что за глупый вопрос?"> 6, как и гитара. Что за глупый вопрос?</label>
</div>

        <div class="question">
    <label>Чьи песни играют чаще всего? (можно выбрать несколько вариантов)</label><br>
    <label><input type="checkbox" name="q3[]" value="Кино(В.Цой)" > Кино(В.Цой) </label><br>
    <label><input type="checkbox" name="q3[]" value="Пётр Петров"> Пётр Петров</label><br>
    <label><input type="checkbox" name="q3[]" value="Макс Корж"> Макс Корж </label>
</div>

        <button type="submit">Отправить</button>
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questions = [
        "1. На каком инструменте я играю?",
        "2. Сколько струн имеет укулеле?",
        "3. Чьи песни играют чаще всего?"
    ];

    $answers = [
        $_POST["q1"] ?? '',
        $_POST["q2"] ?? '',
        $_POST["q3"] ?? ["Не выбрано"]
    ];
    $name = $_POST["name"];?>
    <div class='result'>
    <h3>Результаты для $name:</h3>
    <?php
    // Вывод вопросов и ответов
    for ($i = 0; $i < count($questions); $i++) {
        echo "<p>" . $questions[$i] . " - " . (is_array($answers[$i]) ? implode(", ", $answers[$i]) : $answers[$i]) . "</p>";
    }
    ?>
    </div>
    <?php
}
?>
</div>
</body>
</html>
