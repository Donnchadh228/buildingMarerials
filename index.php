<?
$title = 'StroyMat';
session_start();
include 'head.php';
function truncateText($text, $max_length = 200)
{
    if (mb_strlen($text, 'utf-8') > $max_length) {
        $truncated_text = mb_substr($text, 0, $max_length, 'utf-8') . '...';
        return $truncated_text;
    } else {

        return $text;
    }
}

?>

<body>
    <div class="wrapper">
        <? include 'header.php';



        include 'vender/getMaterial.php';

        ?>

        <div class="main">

            <div class="container">
                <h3 class="main__title title-caption">
                    Наявні стройматеріали на складі
                </h3>
                <div class="main__row row-material">
                    <? while ($material = $allMaterial->fetch()) {
                    ?>
                        <a href="material.php?id=<?= $material['wrhId']; ?>" class="main__block block-material">
                            <div class="main__img img-material">
                                <img src="img/<?= $material['img']; ?>" alt="" />
                            </div>
                            <h2 class="main__name name-material"><?= $material['name'] ?></h2>
                            <p class="main__price price-material">Ціна: <?= $material['price_per_units']; ?> грн / <?= $material['unit']; ?> </p>

                            <p class="main__description description-material">
                                <?= truncateText($material['description'], 200); ?>
                            </p>
                            <button class="main__button button-material button-basic">
                                Подивитись кількість на складі
                            </button>
                        </a>

                    <? } ?>


                </div>
                <a href="warehouse.php"><button class="button-basic main__all">
                        Всі матеріали на складах
                    </button></a>
            </div>
        </div>
        <script src="js/login.js"></script>

        <? include 'footer.php'; ?>

    </div>
</body>


</html>