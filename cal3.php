<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="calculatorbutton2.css">
    <script>
        function addNumber(num) {
            let activeField = document.getElementById('activeField').value;
            let inputField = document.getElementById(activeField);
            inputField.value += num;
        }
    </script>
</head>
<body>
    <?php
    $cal = '';
    $val1 = '';
    $val2 = '';
    $activeField = 'val1';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['clear'])){
            $val1 = '';
            $val2 = '';
        }else{
            $val1 = $_POST['val1'];
            $val2 = $_POST['val2'];
            $activeField = $_POST['activeField'];

            if(isset($_POST['plus'])){
                $cal = $val1 + $val2;
            }elseif(isset($_POST['minus'])){
                $cal = $val1 - $val2;
            }elseif(isset($_POST['times'])){
                $cal = $val1 * $val2;
            }elseif(isset($_POST['divide'])){
                if($val2 != 0){
                    $cal = $val1 / $val2;
                }else{
                    $cal = "Can't divide by zero";
                }
            }
        }
    }
    ?>
    <div class="box">
        <form action="" method="post" class="grid">
        <input type="text" id="val1" name="val1" value="<?php echo $val1;?>" required onclick="document.getElementById('activeField').value ='val1'">
        <input type="text" id="val2" name="val2" value="<?php echo $val2;?>" required onclick="document.getElementById('activeField').value ='val2'">
        <input type="hidden" name="activeField" id="activeField" value="<?php echo $activeField;?>">
        <input type="text" name="" value="<?php echo $cal;?>">

        <input type="submit" name="clear" value="AC" class="button">
        <input type="submit" name="plus" value="+" class="button">
        <input type="submit" name="minus" value="-" class="button">
        <input type="submit" name="times" value="*" class="button">
        <input type="submit" name="divide" value="/" class="button">

        <button type="button" class="button" onclick="addNumber('1')">1</button>
        <button type="button" class="button" onclick="addNumber('2')">2</button>
        <button type="button" class="button" onclick="addNumber('3')">3</button>
        <button type="button" class="button" onclick="addNumber('4')">4</button>
        <button type="button" class="button" onclick="addNumber('5')">5</button>
        <button type="button" class="button" onclick="addNumber('6')">6</button>
        <button type="button" class="button" onclick="addNumber('7')">7</button>
        <button type="button" class="button" onclick="addNumber('8')">8</button>
        <button type="button" class="button" onclick="addNumber('9')">9</button>
        <button type="button" class="button" onclick="addNumber('0')">0</button>
        </form>
    </div>
</body>
</html>
