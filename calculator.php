<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
</head>
<body style="text-align: center;">

<?php
ini_set('display_errors', 0);
$result = "";

function add($a, $b) { return $a + $b; }
function subtract($a, $b) { return $a - $b; }
function multiply($a, $b) { return $a * $b; }
function divide($a, $b) { return $b != 0 ? $a / $b : "Cannot divide by 0"; }
function modulo($a, $b) { return $b != 0 ? $a % $b : "Cannot modulo by 0"; }

$operations = [
    'add' => 'add',
    'subtract' => 'subtract',
    'multiply' => 'multiply',
    'divide' => 'divide',
    'modulo' => 'modulo'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];

    if (is_numeric($num1) && is_numeric($num2)) {
        foreach ($operations as $key => $function) {
            if (isset($_POST[$key])) {
                $result = $function($num1, $num2);
                break;
            }
        }
    } else {
        $result = "Please enter numbers only";
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

