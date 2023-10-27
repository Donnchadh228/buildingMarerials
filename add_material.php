<?
$title = 'Адмін меню';
session_start();
include 'head.php'; ?>

<body>
	<div class="wrapper wrapper-full">
		<? include 'header.php';
		include 'vender/getCountry.php';
		include 'vender/getType.php';
		include 'vender/getBrand.php';
		include 'vender/getPostman.php';
		include 'vender/getUnits.php';
		include 'vender/getStatus.php';
		include 'vender/getWarehouse.php';
		?>
		<div class="background-main">
			<div class="container st-wr">
				<form action="vender/createMaterial.php" method="POST" enctype="multipart/form-data" class=" st-wr-form add_ma">
					<h3>Замовлення матеріалу</h3>
					<div class="add_material">
						<label class="postman-label" for="postman">Виберіть постачальника:</label>
						<select size="1" class="postman select-basic" id="postman" name="postman">
							<option selected disabled>
								Виберіть постачальника
							</option>
							<? while ($postman = $getPostman->fetch()) {

							?>
								<option value="<?= $postman['id']; ?>" <? if ($_SESSION['postman'] == $postman['id']) echo  "selected"; ?>><?= $postman['name_company']; ?></option>

							<? } ?>


						</select>
					</div>
					<div class="add_material">
						<label class="postman-label" for="name_material">Введіть назву матераілу:</label>
						<input id="name_matrerial" type="text" name="name_material" value="<?= $_SESSION['name_material'] ?>" placeholder="Назва матеріалу..." class="input-basic" />
					</div>
					<div class="add_material">
						<label class="postman-label" for="img_material">Виберіть зображення:</label>
						<input id="img_material" accept="image/*" type="file" name="image" class="input-basic" />
					</div>
					<div class="add_material">
						<label class="postman-label" for="description_material">Введіть опис матераілу:</label>
						<textarea name="description_material" id="description_material" cols="30" rows="10" placeholder="Опис..." class="input-basic"><?= $_SESSION['description_material']; ?></textarea>
					</div>
					<div class="add_material">
						<label class="postman-label" for="price_material">Ціна за 1 товару, грн:</label>
						<input id="price_material" value="<?= $_SESSION['price_material']; ?>" name="price_material" type="number" class="input-basic" placeholder="Ціна за 1 товар" />
					</div>

					<div class="add_material">
						<label class="postman-label" for="size_material">Введіть розмір (якщо є):</label>
						<input id="size_material" value="<?= $_SESSION['size_material']; ?>" name="size_material" type="text" class="input-basic" placeholder="Наприклад: 20х20х5" />
					</div>
					<div class="add_material">
						<label class="postman-label" for="expiration_date">Введіть термін придатності (якщо є):</label>
						<input id="expiration_date" value="<?= $_SESSION['expiration_date']; ?>" name="expiration_date" type="text" class="input-basic" placeholder="Наприклад: 150 років" />
					</div>
					<div class="add_material">
						<label class="postman-label" for="type_material">Виберіть тип:</label>
						<select size="1" class="type select-basic" id="type" name="type">
							<option selected disabled>Виберіть тип</option>

							<? while ($type = $getType->fetch()) {

							?>
								<option value="<?= $type['id']; ?>" <? if ($_SESSION['type'] == $type['id']) echo  "selected"; ?>><?= $type['name']; ?></option>
							<? } ?>
						</select>
					</div>
					<div class="add_material">
						<label class="postman-label" for="brand_material">Виберіть бренд:</label>
						<select size="1" class="type select-basic" id="brand" name="brand">
							<option selected disabled>Виберіть бренд</option>

							<? while ($brand = $getBrand->fetch()) {

							?>
								<option value="<?= $brand['id']; ?>" <? if ($_SESSION['brand'] == $brand['id']) echo  "selected"; ?>><?= $brand['brand']; ?></option>
							<? } ?>
						</select>
					</div>
					<div class="add_material">
						<label class="postman-label" for="brand_material">Виберіть країну:</label>
						<select size="1" class="type select-basic" id="country" name="country">
							<option selected disabled>Виберіть країну</option>

							<? while ($country = $getCountry->fetch()) {

							?>
								<option value="<?= $country['id']; ?>" <? if ($_SESSION['country'] == $country['id']) echo  "selected"; ?>><?= $country['country']; ?></option>
							<? } ?>
						</select>
					</div>
					<div class="add_material">
						<label class="postman-label" for="unit">Виберіть одиницю вимірювання:</label>
						<select size="1" class="unit select-basic" id="unit" name="unit">
							<option selected disabled>Одиниці вимірювання</option>
							<? while ($unit = $getUnits->fetch()) {

							?>
								<option value="<?= $unit['id']; ?>" <? if ($_SESSION['unit'] == $unit['id']) echo  "selected"; ?>><?= $unit['name']; ?></option>
							<? } ?>

						</select>
					</div>
					<div class="add_material">
						<label class="postman-label" for="count">Кількість товару</label>
						<input id="count" value="<?= $_SESSION['count']; ?>" name="count" type="number" class="input-basic" placeholder="Кількість товару" />
					</div>
					<div class="add_material">
						<label class="postman-label" for="warehouse">Виберіть адресу складу :</label>
						<select size="1" class="warehouse select-basic" id="warehouse" name="warehouse">
							<option selected disabled>Адреса</option>
							<? while ($warehouse = $getWarehouse->fetch()) {

							?>
								<option value="<?= $warehouse['id']; ?>" <? if ($_SESSION['warehouse'] == $warehouse['id']) echo  "selected"; ?>><?= $warehouse['address']; ?></option>
							<? } ?>

						</select>
					</div>
					<div class="error e-error"><?= $_SESSION['error']; ?></div>
					<input type="submit" value="Додати матеріал постачальника" class="button-basic" />
				</form>
			</div>
		</div>
		<? include 'footer.php'; ?>
		<? unset($_SESSION['postman']);
		unset($_SESSION['description_material']);
		unset($_SESSION['price_material']);
		unset($_SESSION['size_material']);
		unset($_SESSION['type']);
		unset($_SESSION['brand']);
		unset($_SESSION['country']);
		unset($_SESSION['unit']);
		unset($_SESSION['name_material']);
		unset($_SESSION['expiration_date']);
		unset($_SESSION['warehouse']);
		unset($_SESSION['count']);
		unset($_SESSION['error']);

		?>
	</div>
</body>

</html>