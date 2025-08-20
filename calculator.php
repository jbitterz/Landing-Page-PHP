<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
</head>
<body style="text-align: center;">

<?php
ini_set('display_errors', 0);
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];

    if (is_numeric($num1) && is_numeric($num2)) {
        if (isset($_POST['add'])) {
            $result = $num1 + $num2;
        } elseif (isset($_POST['subtract'])) {
            $result = $num1 - $num2;
        } elseif (isset($_POST['multiply'])) {
            $result = $num1 * $num2;
        } elseif (isset($_POST['divide'])) {
            $result = $num2 != 0 ? $num1 / $num2 : "Cannot divide by 0";
        } elseif (isset($_POST['modulo'])) {
            $result = $num2 != 0 ? $num1 % $num2 : "Cannot modulo by 0";
        }
    } else {
        $result = "Please enter numbers onli";
    }
}
?>

<h1>Simple Calculator</h1>

<form method="post" action="">
    First Number:<br>
    <input type="text" name="number1" value="<?php if (isset($num1)) echo $num1; ?>"><br><br>

    Second Number:<br>
    <input type="text" name="number2" value="<?php if (isset($num2)) echo $num2; ?>"><br><br>

    <input type="submit" name="add" value="+">
    <input type="submit" name="subtract" value="-">
    <input type="submit" name="multiply" value="*">
    <input type="submit" name="divide" value="/">
    <input type="submit" name="modulo" value="%"><br><br>
</form>

<?php if ($result !== ""): ?>
    <h2>Result: <?php echo $result; ?></h2>
<?php endif; ?>

</body>
</html>
