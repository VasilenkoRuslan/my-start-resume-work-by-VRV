<?php
if (isset($_POST["firstNumber"])) {
    function getTaskResult($number1, $number2, $Sign)
    {
        switch ($Sign) {
            case "+" :
                return $number1 + $number2;
            case "-" :
                return $number1 - $number2;
            case "*" :
                return $number1 * $number2;
            case "/" :
                return $number1 / $number2;
        }
    }
}
?>
<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№11. Создать форму в которой пользователь будет вводить два числа.</h3>
                <h5>Создать форму в которую пользователь будет вводить два числа,
                    выбирать из выпадающего списка математическую операцию («+» «-» «*» «/») и
                    на экране должен получать результат. На стороне php дописать валидацию на
                    вводимые значения. Должны быть только числа. В противном случае выводить сообщение об ошибке.</h5>
            </div>
            <div class="col-md-12">
                <form action="" method="POST">
                    <fieldset>
                        <label for="">Задайте два числа и действие:<br>
                            <input type="number" name="firstNumber" size="12" maxlength="5" placeholder="Первое число"
                                <?php
                                if (isset($_POST["firstNumber"])) { ?>
                                    value="<?= $_POST["firstNumber"]; ?>"
                                    <?php
                                }
                                ?>
                                   required>
                            <select class="default-select" name="mathSign">
                                <option value="+"> +</option>
                                <option value="-"> -</option>
                                <option value="*"> *</option>
                                <option value="/"> /</option>
                            </select>
                            <input type="number" name="secondNumber" size="12" maxlength="5" placeholder="Второе число"
                                <?php
                                if (isset($_POST["secondNumber"])) { ?>
                                    value="<?= $_POST["secondNumber"]; ?>"
                                    <?php
                                }
                                ?>
                                   required>
                        </label>
                        <input type="submit" class="btn btn-success" value="     =     ">
                    </fieldset>
                </form>
            </div>
            <div class="col-md-10 jumbotron text-center">
                <?php
                if (isset($_POST["firstNumber"])) {
                    if ($_POST["mathSign"] == "/" && $_POST["secondNumber"] == 0) { ?>
                        <p class="text-danger">На ноль делить нельзя!</p>
                        <?php
                        exit();
                    }
                    ?>
                    <h5> <?= getTaskResult($_POST["firstNumber"], $_POST["secondNumber"], $_POST["mathSign"]); ?> </h5>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php require "footer.php"; ?>
