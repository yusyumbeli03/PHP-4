<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2 {
            color: #333;
            text-align: center 
        }

        p{
            text-align: center 
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>PHP Form Example</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Проверка отправки формы
    if(isset($_POST['submit'])) {
        // Извлечение введённых данных формы
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        echo "<h2>Submitted Data:</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Age: $age</p>";
        echo "<p>Gender: $gender</p>";
    }
    ?>
</body>
</html>
