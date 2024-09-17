<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="calculatorbutton2.css">
</head>
<body>
    <?php 
    $cal = '';
    $val1 = '';
    $val2 ='';
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
                    $cal = "Cant divde by zero";
                }
            }elseif(isset($_POST['num'])){
                $num = $_POST['num'];
                if($activeField == 'val1'){
                    $val1 .= $num;
                }else{
                    $val2 .= $num;
                }
            }
        }
    }
    ?>
    <div class="box">
        <form action="" method="post" class="grid">
            <input type="text" name="val1" value="<?php echo $val1;?>" onclick="document.getElementById('activeField').value='val1'">
            <input type="text" name="val2" value="<?php echo $val2;?>" onclick="document.getElementById('activeField').value= 'val2'">
            <input type="hidden" name="activeField" id="activeField" value="<?php echo $activeField;?>">
            <input type="text" name="" value="<?php echo $cal;?>">

            <input type="submit" name="clear" value="AC" class="button">
            <input type="submit" name="plus" value="+" class="button">
            <input type="submit" name="minus" value="-" class="button">
            <input type="submit" name="times" value="*" class="button">
            <input type="submit" name="divide" value="/" class="button">

            <input type="submit" name="num" value="1" class="button">
            <input type="submit" name="num" value="2" class="button">
            <input type="submit" name="num" value="3" class="button">
            <input type="submit" name="num" value="4" class="button">
            <input type="submit" name="num" value="5" class="button">
            <input type="submit" name="num" value="6" class="button">
            <input type="submit" name="num" value="7" class="button">
            <input type="submit" name="num" value="8" class="button">
            <input type="submit" name="num" value="9" class="button">
            <input type="submit" name="num" value="0" class="button">

        </form>
    </div>
</body>
</html>