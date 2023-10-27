<?
$title = 'StroyMat';
session_start();
include 'head.php'; ?>

<body>
	<div class="wrapper wrapper-full">
		<? include "header.php";

		include "vender/getWarehouse.php";
		include "vender/getBrand.php";
		?>
		<div class="background-main">
			<div class="container st-wr">
				<form action="vender/deleteBrand.php" method="POST" class="st-wr-form">
					<h3>Видалити бренд</h3>
					<div>
						<label class="postman-label" for="brand">Виберіть бренд:</label>
						<select size="1" class="type select-basic" id="brand" name="brand">
							<option selected disabled>Виберіть бренд</option>
							<? while ($brand = $getBrand->fetch()) { ?>
								<option value="<?= $brand['id'] ?>"><?= $brand['brand'] ?></option>
							<? } ?>
						</select>
						<div class="error error-r"><?= $_SESSION['error']['brand']; ?></div>
						<input type="submit" value="Видалити бренд" class="button-basic" />
					</div>
				</form>
				<form action="vender/addBrand.php" method="POST" class="st-wr-form">
					<h3>Додати бренд</h3>
					<div>
						<label class="postman-label" for="brand">Введіть бренд:</label>
						<input id="brand" type="text" name="brand" placeholder="Бренд..." class="input-basic" />
						<div class="error"><?= $_SESSION['add']['brand']; ?></div>
						<input type="submit" value="Додати бренд" class="button-basic" />
					</div>
				</form>
			</div>
		</div>

		<? include "footer.php";
		unset($_SESSION['error']['brand']);
		unset($_SESSION['add']['brand'])
		?>
	</div>
</body>

</html>