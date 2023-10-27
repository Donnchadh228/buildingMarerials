<?
$title = 'StroyMat';
session_start();
include 'head.php';

$id = $_GET['id'];
include 'vender/getOneMaterial.php';

?>

<body>
    <div class="wrapper wrapper-full">
        <? include 'header.php';

        ?>
        <div class="background-main material-main">
            <div class="container">
                <div class="material">
                    <h3><?= $material['name']; ?></h3>
                    <div class="material__top">
                        <div class="material__img">
                            <img src="img/<?= $material['img']; ?>" alt="" />
                            <? if ($material['statusId'] == 3) { ?>
                                <div class="meterial__available-no">Немає в наявності</div>
                            <? } ?>
                        </div>
                        <div class="material__code">Код: <?= $material['idMat']; ?></div>
                        <div class="material__topCenter">
                            <div class="material__price">
                                Ціна: <br /><?= $material['price_per_units']; ?> <span>грн / 1 <?= $material['unit']; ?></span>
                            </div>
                            Кількість на складі: <?= $material['count']; ?>
                            <div class="material__description">
                                <h2>Опис:</h2>
                                <?= $material['description']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="material__characteristics">
                        <? if ($_SESSION['login']) { ?>
                            <form action="vender/changeCount.php" method="POST" class="material__characteristic form-characteristic">
                                <input id="idM" type="number" name='idM' style="display:none" value="<?= $material['idMat']; ?>" />
                                <div class="form-ch">
                                    <label class="postman-label" for="count1<?= $material['idMat']; ?>">Введіть кількість матеріалу, який залишився на складі:</label>
                                    <input name="count1" id="count1" type="number" placeholder="Кількість..." class="input-basic" />

                                </div>
                                <div class=" error-r"><?= $_SESSION['change']['count']; ?></div>
                                <input type="submit" value="Змінити кількість" class="button-basic" />
                            </form>
                        <? } ?>
                        <h2 class="material__characteristic">Характеристики</h2>

                        <div class="material__characteristic">
                            Термін придатності : <?= $material['expiration_date']; ?>
                        </div>
                        <div class="material__characteristic">Розмір: <?= $material['size']; ?></div>
                        <div class="material__characteristic">
                            Країна виробник: <?= $material['country']; ?>
                        </div>
                        <div class="material__characteristic">Бренд : <?= $material['brand']; ?></div>
                        <div class="material__characteristic">
                            Склад: <?= $material['address']; ?>
                        </div>
                        <div class="material__characteristic">
                            Тип: <?= $material['type']; ?>
                        </div>
                        <div class="material__characteristic">
                            Дата отримання: <?= $material['appearance_date']; ?>
                        </div>
                        <div class="material__characteristic">
                            Постачальник: <?= $material['name_postman']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? include 'footer.php';
        unset($_SESSION['change']['count'])
        ?>

    </div>
</body>

</html>