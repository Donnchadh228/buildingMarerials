<? session_start(); ?>

<header class="header" id="header">
    <div class="container">

        <a title="<?= isset($_SESSION['login']) ? "alt + 2 - адмін меню; alt + 5 - вийти" : ""; ?>" href=" index.php" class="site__name">stroyMat <?= isset($_SESSION['login']) ? "(А)" : ""; ?>

        </a>

        <div class="feetback">

            <a class="feetback__link" href="mailto:stroymat@gmail.com">stroymat@gmail.com</a>
            <a class="feetback__link" href="tel:+380984512341">+380984512341</a>
            <button class="button-basic">
                <a href="warehouse.php">Всі матеріали</a>
            </button>
        </div>
    </div>
</header>