<?
$title = 'StroyMat';
include 'head.php'; ?>
<? include 'header.php';
$LimitMaterial = 2;
session_start();
include 'vender/getMaterial.php';

?>
<div class="main">
    <div class="container">

        <div class="main__row row-material auths">
            <form method="POST" class="auth" action="vender/login.php">
                <h3 class="main__title title-caption">
                    Авторизація для працівника
                </h3>
                <label class="postman-label" for="password">Введіть пароль:</label>
                <input id="password" name="password" type="password" placeholder="Введіть пароль" class="input-basic" />
                <div class="error"><?= $_SESSION['error']['password']; ?></div>
                <input type="submit" class="button-basic">
            </form>
        </div>

    </div>
</div>
<? include 'footer.php';
unset($_SESSION['error']['password']);
?>