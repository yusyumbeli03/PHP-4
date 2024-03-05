<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        body{
            background: linear-gradient(90deg, rgba(245,230,255,1) 0%, rgba(235,182,182,1) 54%, rgba(232,193,137,1) 100%);
            margin: 0;
            padding: 0;
        }
        form {
            width: 50%;
            margin: 0 auto;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .error {
            color: red;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        header {
    background-color: #845aa2;
    color: #fff;
    padding: 7px;
    height: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 3px;
}
nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline;
    font-size:20px;
}
nav li :hover{
    color:#665555;
}
nav ul li a {
    color: #fff;
    text-decoration: none;
    margin-left: 20px;
}
    </style>
</head>
<body>
<header>
        <h1>#my-shop</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Comments</a></li>
                <li><a href="#">Exit</a></li>
            </ul>
        </nav>
    </header>
    <?php
    $name = $email = $comment = $agree = "";
    $nameErr = $emailErr = $commentErr = $agreeErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Валидация поля "name"
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // проверка на длину имени и отсутствие цифр
            if (strlen($name) < 3 || strlen($name) > 20 || preg_match('/[0-9]/', $name)) {
                $nameErr = "Name must be between 3 and 20 characters long and contain no digits";
            }
        }

        // Валидация поля "email"
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // проверка соответствия формату email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Валидация поля "comment"
        if (empty($_POST["comment"])) {
            $commentErr = "Comment is required";
        } else {
            $comment = test_input($_POST["comment"]);
        }

        // Валидация чекбокса "agree"
        if (empty($_POST["agree"])) {
            $agreeErr = "You must agree to data processing";
        } else {
            $agree = test_input($_POST["agree"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr; ?></span>
        <br><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        <span class="error"><?php echo $commentErr; ?></span>
        <br><br>
        Do you agree with data processing? <input type="checkbox" name="agree" value="yes">
        <span class="error"><?php echo $agreeErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Send">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $nameErr == "" && $emailErr == "" && $commentErr == "" && $agreeErr == "") {
        echo "<h2>Thank you for your submission!</h2>";
    }
    ?>
</body>
</html>
