<?
$title = 'StroyMat';
session_start();
include 'head.php'; ?>

<body>
	<div class="wrapper wrapper-full">
		<? include "header.php";

		include "vender/getWarehouse.php";
		include "vender/getUnits.php";
		?>
		<div class="background-main">
			<div class="container st-wr">
				<form action="vender/deleteUnit.php" method="POST" class="st-wr-form">
					<h3>Видалити одиницю вимірювання</h3>
					<div>
						<label class="postman-label" for="unit">Виберіть одиницю вимірювання:</label>
						<select size="1" class="type select-basic" id="unit" name="unit">
							<option selected disabled>Виберіть одиницю вимірювання</option>
							<? while ($unit = $getUnits->fetch()) { ?>
								<option value="<?= $unit['id'] ?>"><?= $unit['name'] ?></option>
							<? } ?>
						</select>
						<div class="error error-r"><?= $_SESSION['error']['unit']; ?></div>
						<input type="submit" value="Видалити одиницю вимірювання" class="button-basic" />
					</div>
				</form>
				<form action="vender/addUnit.php" method="POST" class="st-wr-form">
					<h3>Додати одиниці вимірювання</h3>
					<div>
						<label class="postman-label" for="unit">Введіть бренд:</label>
						<input id="unit" type="text" name="unit" placeholder="Одиниця вимірювання..." class="input-basic" />
						<div class="error"><?= $_SESSION['add']['unit']; ?></div>
						<input type="submit" value="Додати одиницю вимірювання" class="button-basic" />
					</div>
				</form>
			</div>
		</div>

		<? include "footer.php";
		unset($_SESSION['error']['unit']);
		unset($_SESSION['add']['unit'])
		?>
	</div>
</body>

</html>