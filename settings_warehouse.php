<?
$title = 'StroyMat';
session_start();
include 'head.php'; ?>

<body>
	<div class="wrapper wrapper-full">
		<? include "header.php";

		include "vender/getWarehouse.php";

		?>
		<div class="background-main">
			<div class="container st-wr">
				<form action="vender/deleteWarehouse.php" method="POST" class="st-wr-form">
					<h3>Видалити склад</h3>
					<div>
						<label class="postman-label" for="warehouse">Адреса складу:</label>
						<select size="1" class="type select-basic" id="warehouse" name="warehouse">
							<option selected disabled>Виберіть Склад</option>
							<? while ($warehouse = $getWarehouse->fetch()) { ?>
								<option name="<?= $warehouse['id'] ?>" value="<?= $warehouse['id'] ?>"><?= $warehouse['address'] ?></option>
							<? } ?>
						</select>
						<div class="error error-r"><?= $_SESSION['error']['warehouse']; ?></div>
						<input type="submit" value="Видалити склад" class="button-basic" />
					</div>
				</form>
				<form action="vender/addWarehouse.php" method="POST" class="st-wr-form">
					<h3>Додати склад</h3>
					<div>
						<label class="postman-label" for="address">Введіть адресу складу:</label>
						<input id="address" type="text" name="address" placeholder="Адрес..." class="input-basic" />
						<div class="error"><?= $_SESSION['add']['warehouse']; ?></div>
						<input type="submit" value="Додати склад" class="button-basic" />
					</div>
				</form>
			</div>
		</div>

		<? include "footer.php";
		unset($_SESSION['error']['warehouse']);
		unset($_SESSION['add']['warehouse'])
		?>
	</div>
</body>

</html>