<?php require "header.php"; ?>
<section class="tasks bg-info">
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-md-12 jumbotron text-left bg-light">
                <h3>Задание№31. Добавить колонку «Владелец».</h3>
                <h5>Используя наработки из задачи 15:
                    В имеющуюся таблицу где мы выводим список товаров<br>
                    — добавить колонку «Владелец» и вывести туда имя и фамилию пользователя,<br> которому принадлежит
                    товар.</h5>
            </div>
            <div class="col-sm-12 justify-content-center">
                <div class="getProduct">
                    <h5>Выводим список всех товаров по алфавиту:</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-light borderForm">
        <div class="row">
            <div class="col-sm-12 text-center table-responsive">
                <div class="text-left">
                    <?php
                    $sql = true;
                    if (isset($_GET['delete_id'])) {
                        $sql = mysqlQuery("DELETE FROM `products2` WHERE `id` = {$_GET['delete_id']}");
                    }

                    if (isset($_POST['update_id'])) {
                        $sql = mysqlQuery("UPDATE `products2` SET `name` = '{$_POST['name']}',`price` = '{$_POST['price']}',`amount` = '{$_POST['amount']}',`manager_id` = '{$_POST['manager']}' WHERE `id`='{$_POST['update_id']}'");
                    }

                    if (isset($_POST['create'])) {
                        $sql = mysqlQuery("INSERT INTO `products2` (`name`,`price`,`amount`,`manager_id`) VALUES ('{$_POST['name']}','{$_POST['price']}','{$_POST['amount']}','{$_POST['manager']}')");
                    }

                    if (!$sql) {
                        global $mysqlConnect;
                        ?>
                        <p>Произошла ошибка: <?= mysqli_error($mysqlConnect); ?></p>
                        <?php
                    }
                    ?>
                    <h2>Список продуктов</h2>
                    <div class=" table-sm table-responsive-xl borderForm bg-dark">
                        <table class="table table-dark table-hover">
                            <thead>
                            <tr class="table-active text-primary">
                                <th>Title</th>
                                <th>Price of a piece</th>
                                <th>Amount</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Redaction</th>
                                <th>Deletion</th>
                            </tr>
                            <tr class="table-active text-warning">
                                <th>Продукт</th>
                                <th>Цена за шт.</th>
                                <th>Количество</th>
                                <th>Дата создания</th>
                                <th>Дата обновления</th>
                                <th>Менеджер</th>
                                <th>Редактирование</th>
                                <th>Удаление</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                $sqlQuery = mysqlQuery('SELECT *, p.name AS nameP, m.name AS nameM FROM `products2` p, `managers2` m WHERE p.manager_id = m.id ORDER BY p.name');
                                while ($product = mysqli_fetch_assoc($sqlQuery)) {
                                ?>
                                <td> <?= $product['nameP']; ?></td>
                                <td> <?= $product['price']; ?> EUR</td>
                                <td> <?= $product['amount']; ?> pieces</td>
                                <td> <?= $product['created_at']; ?></td>
                                <td> <?= $product['updated_at']; ?></td>
                                <td> <?= $product['nameM']; ?></td>
                                <td><a href="task15update.php?update_id=<?= $product['id']; ?>"
                                       class="btn btn-info">Изменить</a></td>
                                <td>
                                    <button onclick="deleteConfirm('<?= $product['id']; ?>', '<?= $product['nameP']; ?>');"
                                            class="btn btn-danger">Удалить
                                    </button>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7" class="text-center"><a href="task15create.php"
                                                                       class="btn btn-success">Добавить новый
                                        товар</a></td>
                                <td colspan="1" class="text-center"><a href="task15.php" class="btn btn-primary">Обновить</a>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function deleteConfirm(id, product) {
        let r = confirm("Вы уверены что хотите удалить \nпродукт '" + product + "'?");
        if (r === true) {
            document.location = "?delete_id=" + id;
        }
    }
</script>
<?php include "footer.php"; ?>
