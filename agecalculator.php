<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator</title>
    <style>
        .age-box {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 2px 2px 12px #aaa;
        }
        .button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: blue;
            color: white;
            border: 1px solid blue;
            outline: none;
        }
    </style>
</head>
<body>
    <?php 
    $result = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $birthdate = $_POST['birthdate'];
        if (!empty($birthdate)) {
            $birthdate = new DateTime($birthdate);
            $today = new DateTime('today');
            $age = $birthdate->diff($today)->y;
            $result = "Your age is $age years.";
        } else {
            $result = 'Please enter a valid date.';
        }
    }
    ?>
    <div class="age-box">
        <form action="" method="post">
            <input type="date" name="birthdate">
            <input type="submit" value="Calculate Age" class="button">
        </form>
        <div>
            <?php echo htmlspecialchars($result); ?>
        </div>
    </div>
</body>
</html>
