<?php
if (isset($_GET)) {
    function getStringComparison($numberGreater, $numberLess)
    {
        return "<h5>Число " . $numberGreater . " больше, чем число " . $numberLess . "</h5>";
    }

    function getDiffPercent($numberGreater, $numberLess)
    {
        $diffPercent = ($numberGreater / $numberLess - 1) * 100;
        return "<h5>Разница между числами в процентном соотношении " . $diffPercent . " %</h5>";
    }

    function getTaskResult($number1, $number2)
    {
        $x = '';
        if (!is_numeric($number1) || !is_numeric($number2)) {
            $x = '<h5 class="text-danger">Вы ввели некорректные данные.<br>Пожалуйста, введите два числа</h5>';
        }

        if ($number1 > $number2) {
            $x = getStringComparison($number1, $number2) . getDiffPercent($number1, $number2);
        }

        if ($number1 < $number2) {
            $x = getStringComparison($number2, $number1) . getDiffPercent($number2, $number1);
        }

        if ($number1 === $number2 || $number1 !== "NULL") {
            $x = '<h5 class="text-warning">Ваши числа одинаковы!Введите разные два числа.</h5>';
        }

        return $x;
    }
}
?>
<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-12 jumbotron text-left bg-light">
                <h3>Задание№6. Результат двух чисел.</h3>
                <h5>Определить какое число больше и вернуть разницу между числами в процентном соотношении.</h5>
            </div>
            <div class="col-sm-5 justify-content-center">
                <form action="" method="GET">
                    <fieldset>
                        <label for="">Задайте два числа:
                            <input type="text" name="firstNumber" size="15" maxlength="5" placeholder="Первое число"><br>
                            <input type="text" name="secondNumber" size="15" maxlength="5" placeholder="Второе число">
                            <br>
                        </label>
                        <input type="submit" class="btn btn-success" value="Задать">
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 jumbotron text-left">
                <?php
                if (isset($_GET["firstNumber"], $_GET["secondNumber"])) {
                    echo getTaskResult($_GET["firstNumber"], $_GET["secondNumber"]);
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>
