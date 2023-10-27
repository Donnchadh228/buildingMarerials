<?
$title = 'StroyMat';
session_start();
include 'head.php'; ?>

<body>
	<div class="wrapper wrapper-full">
		<? include "header.php";

		include "vender/getWarehouse.php";
		include "vender/getCountry.php";
		?>
		<div class="background-main">
			<div class="container st-wr">
				<form action="vender/deleteCountry.php" method="POST" class="st-wr-form">
					<h3>Видалити країну</h3>
					<div>
						<label class="postman-label" for="country">Виберіть країну:</label>
						<select size="1" class="country select-basic" id="country" name="country">
							<option selected disabled>Виберіть країну</option>
							<? while ($country = $getCountry->fetch()) { ?>
								<option value="<?= $country['id'] ?>"><?= $country['country'] ?></option>
							<? } ?>
						</select>
						<div class="error error-r"><?= $_SESSION['error']['country']; ?></div>
						<input type="submit" value="Видалити країну" class="button-basic" />
					</div>
				</form>
				<form action="vender/addCountry.php" method="POST" class="st-wr-form">
					<h3>Додати тип</h3>
					<div>
						<label class="postman-label" for="brand">Введіть країну:</label>
						<input id="country" type="text" name="country" placeholder="Країна..." class="input-basic" />
						<div class="error"><?= $_SESSION['add']['country']; ?></div>
						<input type="submit" value="Додати країну" class="button-basic" />
					</div>
				</form>
			</div>
		</div>

		<? include "footer.php";
		unset($_SESSION['error']['country']);
		unset($_SESSION['add']['country'])
		?>
	</div>
</body>

</html>