<?
$title = 'StroyMat';
session_start();
include 'head.php'; ?>

<body>
	<div class="wrapper wrapper-full">
		<? include "header.php";

		include "vender/getWarehouse.php";
		include "vender/getType.php";
		?>
		<div class="background-main">
			<div class="container st-wr">
				<form action="vender/deleteType.php" method="POST" class="st-wr-form">
					<h3>Видалити тип</h3>
					<div>
						<label class="postman-label" for="type">Виберіть тип:</label>
						<select size="1" class="type select-basic" id="type" name="type">
							<option selected disabled>Виберіть тип</option>
							<? while ($type = $getType->fetch()) { ?>
								<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
							<? } ?>
						</select>
						<div class="error error-r"><?= $_SESSION['error']['type']; ?></div>
						<input type="submit" value="Видалити тип" class="button-basic" />
					</div>
				</form>
				<form action="vender/addType.php" method="POST" class="st-wr-form">
					<h3>Додати тип</h3>
					<div>
						<label class="postman-label" for="brand">Введіть тип:</label>
						<input id="type" type="text" name="type" placeholder="Тип..." class="input-basic" />
						<div class="error"><?= $_SESSION['add']['type']; ?></div>
						<input type="submit" value="Додати тип" class="button-basic" />
					</div>
				</form>
			</div>
		</div>

		<? include "footer.php";
		unset($_SESSION['error']['type']);
		unset($_SESSION['add']['type'])
		?>
	</div>
</body>

</html>