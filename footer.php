<footer class="footer" id="footer">
    <div class="container">
        <div class="feetback">
            <p>Телефонуйте з 8:00 до 20:00 без вихідних</p>
            <a href="tel:+380984512341">+380984512341</a>
        </div>
        <ul class="svg-row">
            <a href="https://facebook.com">
                <svg width="42" height="75">
                    <use class="svg-use" href="./img/svg/sprite.svg#facebook"></use>
                </svg>
            </a>

            <a href="https://instagram.com">
                <svg width="74" height="73">
                    <use class="svg-use" href="./img/svg/sprite.svg#instagram"></use>
                </svg>
            </a>
            <a href="https://youtube.com">
                <svg width="85" height="61">
                    <use class="svg-use" href="./img/svg/sprite.svg#youtube"></use>
                </svg>
            </a>
        </ul>
    </div>
</footer>


<script src="js/js.js"></script>
<?;
if ($_SESSION['login'] == true) {
?>
    <script>
        function handleKeyPress(event) {
            if (event.altKey && event.key === "2") {
                window.location.href = "../admin_menu.php"
                event.preventDefault()
            }
            if (event.altKey && event.key === "5") {
                window.location.href = "../vender/logout.php"
                event.preventDefault()
            }
        }
        document.addEventListener("keydown", handleKeyPress)
    </script>
<?
}
?>