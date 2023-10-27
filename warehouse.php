<?
$title = 'Адмін меню';
session_start();
include 'head.php';
function truncateText($text, $max_length = 200)
{
	if (mb_strlen($text, 'utf-8') > $max_length) {
		$truncated_text = mb_substr($text, 0, $max_length, 'utf-8') . '...';
		return $truncated_text;
	} else {

		return $text;
	}
}

?>

<body>
	<div class="wrapper">
		<? include 'header.php';


		$sort = $_GET['sort'];

		include 'vender/getAllMaterial.php';
		include 'vender/getCountry.php';
		include 'vender/getType.php';
		include 'vender/getPostman.php';
		include 'vender/getUnits.php';
		$LIMITBlock = 1;
		?>
		<div class="background-main warehouse">
			<div class="container">
				<div class="warehouse__row filter-open">
					<div class="warehouse__materials warehouse__block">

						<div class="warehouse__content">

							<? while ($material = $allMaterial->fetch()) {
							?>
								<a href="material.php?id=<?= $material['idMat']; ?>" class="main__block block-material">
									<? if ($material['count'] <= 0 or $material['statusId'] == 3) { ?>
										<div class="not-avaliable">Немає в наявності</div>
									<? } ?>
									<div class="main__img img-material">
										<img src="img/<?= $material['img']; ?>" alt="" />
									</div>
									<h2 class="main__name name-material"><?= $material['name'] ?></h2>
									<p class="main__price price-material">Ціна: <?= $material['price_per_units']; ?> грн / <?= $material['unit']; ?> </p>

									<p class="main__description description-material">
										<?= truncateText($material['description']); ?>
									</p>
									<button class="main__button button-material button-basic">
										Подробніше
									</button>
								</a>

							<? } ?>

						</div>
					</div>
					<div class="warehouse_filter warehouse__block">
						<div class="warehouse__header warehouse__item">
							Фільтр
							<div class="warehouse__close warehouse__open">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<form method="GET" action="" class="warehouse__setting">
							<div class="warehouse__group">
								<div class="warehouse__title">Ціна:</div>

								<div class="warehouse__bottom">
									<div>
										<label for="priceFrom">Від:</label>
										<input id="priceFrom" name="priceFrom" value="<?= $_GET['priceFrom'] ?>" type="number" placeholder="Ціна від..." class="warehouse__input input-basic" />
									</div>
									<div>
										<label for="priceTo">До:</label>
										<input id="priceTo" name="priceTo" value="<?= $_GET['priceTo'] ?>" type="number" placeholder="Ціна до..." class="warehouse__input input-basic" />
									</div>
								</div>
							</div>
							<div class="warehouse__group">
								<div class="warehouse__title">
									<label class="postman-label" for="postman">Постачальник:</label>
								</div>

								<div class="warehouse__bottom">
									<div>
										<select size="1" class="postman select-basic" id="postman" name="postman">
											<option selected disabled>
												Виберіть постачальника
											</option>
											<? while ($postman = $getPostman->fetch()) {

											?>
												<option value="<?= $postman['id']; ?>" name="<?= $postman['id']; ?>" <? if ($_GET['postman'] == $postman['id']) echo  "selected"; ?>><?= $postman['name_company']; ?></option>

											<? } ?>


										</select>
									</div>
								</div>
							</div>




							<div class="warehouse__group">

								<div class="warehouse__title">
									<label class="postman-label" for="sort">Сортування:</label>
								</div>

								<div class="warehouse__bottom">
									<div>
										<select size="1" class="sort select-basic" id="sort" name="sort">
											<option <?= $_GET['sort'] == 'news' ? 'selected' : ''; ?> name="news" value="news">Нові</option>
											<option <?= $_GET['sort'] == 'cheap' ? 'selected' : ''; ?> name="cheap" value="cheap">Дешеві</option>
											<option <?= $_GET['sort'] == 'expensive' ? 'selected' : ''; ?> name="expensive" value="expensive">Дорогі</option>
										</select>
									</div>
								</div>
							</div>
							<div class="warehouse__group">

								<div class="warehouse__title">
									<label class="postman-label" for="unit">Виберіть одиниці вимірювання:</label>
								</div>

								<div class="warehouse__bottom">
									<div>
										<select size="1" class="unit select-basic" id="unit" name="unit">
											<option selected disabled>Одиниці вимірювання</option>
											<? while ($unit = $getUnits->fetch()) {

											?>
												<option value="<?= $unit['id']; ?>" name="<?= $unit['id']; ?>" <? if ($_GET['unit'] == $unit['id']) echo  "selected"; ?>><?= $unit['name']; ?></option>
											<? } ?>

										</select>
									</div>
								</div>
							</div>
							<div class="warehouse__group">
								<div class="warehouse__title">
									<label class="postman-label" for="type">Виберіть тип:</label>
								</div>

								<div class="warehouse__bottom">
									<div>
										<select size="1" class="type select-basic" id="type" name="type">
											<option selected disabled>Виберіть тип</option>

											<? while ($type = $getType->fetch()) {

											?>
												<option value="<?= $type['id']; ?>" name="<?= $type['id']; ?>" <? if ($_GET['type'] == $type['id']) echo  "selected"; ?>><?= $type['name']; ?></option>
											<? } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="warehouse__group">
								<span class="warehouse__title">
									<label class="type postman-label" for="available">Є на складі:</label>
									<input type="checkbox" id="available" name="available" value="1" <?= $_GET['available'] == 1 ? "checked" : ""; ?> />
								</span>
							</div>

							<div class="warehouse__group d-flex">
								<input type="submit" class="button-basic input-sub" value="Відфільтрувати">
								<a href="warehouse.php" class="button-basic input-sub">Очистити</a>
							</div>



						</form>
					</div>
				</div>
				<div class="pagination">
					<?php
					$currentUrl = $_SERVER['REQUEST_URI'];
					$urlComponents = parse_url($currentUrl);

					$query = '';
					if (isset($urlComponents['query'])) {
						parse_str($urlComponents['query'], $params);
						unset($params['page']);
						$query = http_build_query($params);
						if (!empty($query)) {
							$query = '&' . $query;
						}
					}


					for ($ii = 1; $ii < $pageCount + 1; $ii++) {
						if (!$page) $page = 1;
						$pageUrl = $urlComponents['path'] . '?page=' . $ii . $query;
					?>
						<a href="<?= $pageUrl ?>" class=" <?= $page == $ii ? 'pagination__a-active' : ""; ?>">
							<?= $ii ?>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<? include 'footer.php';

		?>
	</div>
</body>
<script src="js/js.js"></script>

</html>