<?
$title = 'Адмін меню';
session_start();
include 'head.php'; ?>

<body>
	<div class="wrapper admin-menu">
		<? include 'header.php';
		?>
		<div class="background-main">
			<div class="container">
				<div class="admin">
					<a href="agreement.php" class="button-basic">
						<p>Історія замовлень</p>
					</a>
					<a href="add_material.php" class="button-basic">
						<p>Замовити</p>
					</a>
					<a href="settings_warehouse.php" class="button-basic">
						<p>Налаштування складу</p>
					</a>
					<a href="settings_postman.php" class="button-basic">
						<p>Налашування постачальників</p>
					</a>
					<a href="settings_brand.php" class="button-basic">
						<p>Налаштування брендів</p>
					</a>
					<a href="settings_type.php" class="button-basic">
						<p>Налаштування типів</p>
					</a>
					<a href="settings_country.php" class="button-basic">
						<p>Налаштування країн</p>
					</a>
					<a href="settings_unit.php" class="button-basic">
						<p>Налаштування одиниць вимірювання</p>
					</a>
				</div>
			</div>
		</div>
		<? include 'footer.php'; ?>
	</div>
</body>
<script src="js/js.js"></script>

</html>