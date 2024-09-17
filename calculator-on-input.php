<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    
    <!-- <style>
        .button {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
    </style> -->
    <link rel="stylesheet" href="calculator.css">
</head>
<body>

<h1>PHP Calculator</h1>
<div class="Box">
<form method="post" action="">
    <input type="text" name="display" id="display" ><br>

    <input type="submit" class="button" name="num" value="1">
    <input type="submit" class="button" name="num" value="2">
    <input type="submit" class="button" name="num" value="3">
    <input type="submit" class="button" name="op" value="+"><br>

    <input type="submit" class="button" name="num" value="4">
    <input type="submit" class="button" name="num" value="5">
    <input type="submit" class="button" name="num" value="6">
    <input type="submit" class="button" name="op" value="-"><br>

    <input type="submit" class="button" name="num" value="7">
    <input type="submit" class="button" name="num" value="8">
    <input type="submit" class="button" name="num" value="9">
    <input type="submit" class="button" name="op" value="*"><br>

    <input type="submit" class="button" name="num" value="0">
    <input type="submit" class="button" name="op" value="/">
    <input type="submit" class="button" name="clear" value="C">
    <input type="submit" class="button" name="calculate" value="="><br>

</form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['num'])) {
        $num = $_POST['num'];
        $display = $_POST['display'] ?? '';
        $display .= $num;
    } elseif (isset($_POST['op'])) {
        $op = $_POST['op'];
        $display = $_POST['display'] ?? '';
        $display .= " $op ";
    } elseif (isset($_POST['clear'])) {
        $display = '';
    } elseif (isset($_POST['calculate'])) {
        $display = $_POST['display'] ?? '';
        try {
            eval('$result = '.$display.';');
            $display = $result;
        } catch (Throwable $e) {
            $display = 'Error';
        }
    }
} else {
    $display = '';
}
?>

<script>
    document.getElementById('display').value = '<?php echo $display; ?>';
</script>

</body>
</html>
