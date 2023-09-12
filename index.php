<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Calculator</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <?php
    echo ("калькулятор");
    $operations = ["+", "-", "*", "/"];
    if (isset($_POST['calculate'])) {
        $leftOperand = $_POST['leftOperand'];
        $rightOperand = $_POST['rightOperand'];
        $operation = $_POST['operation'];

        // заполнение поля + проверка на числа
        // (!!) уже 10-й калькулятор, невыносимо раздражает каждый раз их придумывать на других языках - без доп проверок на большие числа, доп оформление и т.п....
        // тратится столько времени, а практического применения 0 (!!)
        if (!$operation || (!$leftOperand && $leftOperand != '0') || (!$rightOperand && $rightOperand != '0')) {
            $result = "Не заполнено поле";
        } else {
            if (!is_numeric($leftOperand) || !is_numeric($rightOperand)) {
                $result = "Не число";
            } else
                switch ($operation) {
                    case "+":
                        $result = $leftOperand + $rightOperand;
                        break;
                    case "-":
                        $result = $leftOperand - $rightOperand;
                        break;
                    case "*":
                        $result = $leftOperand * $rightOperand;
                        break;
                    case "/":
                        if ($rightOperand == '0')
                            $result = "Деление на ноль невозможно";
                        else
                            $result = $leftOperand / $rightOperand;
                        break;
                }

        }
    }

    ?>
    <form method="post" action="index.php" class="row">
        <div class="col-2">
            <input type="text" name="leftOperand" placeholder="введите число" value="<?= $leftOperand ?>" />
        </div>
        <div class="col-1">
            <select name="operation">
                <?php
                foreach ($operations as $value) {
                    ?><option value="<?= $value ?>" <?php if ($value == $operation) {?> selected <?php } ?> ><?= $value ?></option><?php
                }
                ?>
            </select>
        </div>
        <div class="col-2">
            <input type="text" name="rightOperand" placeholder="введите число" value="<?= $rightOperand ?>" />
        </div>
        <div class="col-2">
            <input type="submit" name="calculate" value="вычислить" />
        </div>
        <div class="col-2">
            <output name="result">
                <?php
                if (isset($result)) {
                    echo ($result);
                } else {
                    echo ("");
                }
                ?>
            </output>
        </div>
    </form>


    <script src="~/lib/jquery/dist/jquery.min.js"></script>
    <script src="~/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

