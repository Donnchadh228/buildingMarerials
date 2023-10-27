<?
$title = 'StroyMat';
session_start();
include 'head.php'; ?>

<body>
	<div class="wrapper admin-menu">
		<?
		include 'header.php';
		include 'vender/getAllMeterialAg.php';
		include 'vender/getCountry.php';
		include 'vender/getType.php';
		include 'vender/getPostman.php';
		include 'vender/getUnits.php';
		include 'vender/getStatus.php';

		?>
		<div class="background-main">
			<div class="container">
				<div class="agreement">
					<div class="agreement__filter">
						<div class="warehouse__header warehouse__item">
							Фільтр
							<div class="warehouse__close ">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<form method="GET" class="warehouse__setting warehouse__setting-close">
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
								<div class="warehouse__title">Дата:</div>

								<div class="warehouse__bottom">
									<div>
										<label for="dateFrom">Від:</label>
										<input id="dateFrom" name="dateFrom" type="date" value="<?= $_GET['dateFrom'] ?>" placeholder="Дата від..." class="warehouse__input input-basic" />
									</div>
									<div>
										<label for="dateTo">До:</label>

										<input id="dateTo" name="dateTo" type="date" value="<?= $_GET['dateTo']; ?>" placeholder="Дата до..." class="warehouse__input input-basic" />
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
									<select size="1" class="type select-basic" id="type" name="type">
										<option selected disabled>Виберіть тип</option>

										<? while ($type = $getType->fetch()) {

										?>
											<option value="<?= $type['id']; ?>" name="<?= $type['id']; ?>" <? if ($_GET['type'] == $type['id']) echo  "selected"; ?>><?= $type['name']; ?></option>
										<? } ?>
									</select>
								</div>
							</div>
							<div class="warehouse__group">
								<div class="warehouse__title">
									<label class="postman-label" for="status">Виберіть статус:</label>
								</div>

								<div class="warehouse__bottom">
									<div>

										<select size="1" class="type select-basic" id="status" name="status">
											<option selected disabled>Виберіть тип</option>

											<? while ($status = $getStatus->fetch()) {

											?>
												<option value="<?= $status['id']; ?>" name="<?= $status['id']; ?>" <? if ($_GET['status'] == $status['id']) echo  "selected"; ?>><?= $status['name']; ?></option>
											<? } ?>
										</select>
									</div>
								</div>
							</div>
							<input type="submit" value="Відфільтрувати" class="button-basic">
							<a href="agreement.php" class="button-basic input-sub">Очистити</a>

						</form>
					</div>
					<div class="agreement__row">
						<div class="agreement__item agreement__item-title">
							<div class="agreement__status">Статус</div>
							<div class="agreement__name">Назва</div>
							<div class="agreement__count">Кількість замовлених</div>
							<div class="agreement__price">Ціна</div>
							<div class="agreement__fullPrice">Всього</div>
							<div class="agreement__date">Дата замовлення</div>
							<div class="agreement__close1"></div>
						</div>
						<? while ($material = $allMaterial->fetch()) { ?>

							<div class="agreement__block">
								<div class="agreement__item">
									<? if ($material['statusPostman'] == 2) { ?>
										<div class="agreement__status agreement__status-agreement">
											Замовлений
										</div>
									<? } else { ?>
										<div class="agreement__status agreement__status-have">
											На складі
										</div>
									<? } ?>

									<div class="agreement__name"><?= $material['name'] ?></div>
									<div class="agreement__count"><?= $material['countPostman'] ?> <?= $material['unit'] ?></div>
									<div class="agreement__price"><?= $material['price_per_unit'] ?> грн / <?= $material['unit'] ?></div>
									<div class="agreement__fullPrice"> <?= $material['price_per_unit'] * $material['countPostman'] ?> грн </div>
									<div class="agreement__date"><?= $material['datePostman'] ?></div>
									<div class="agreement__close1">
										<div class="agreement__close">
											<span></span>
											<span></span>
											<span></span>
										</div>
									</div>
								</div>

								<div class="agreement__full">
									<div class="material">
										<h3><?= $material['name']; ?></h3>
										<div class="material__top">
											<div class="material__img">
												<img src="img/<?= $material['img']; ?>" alt="" />
											</div>
											<div class="material__code">Код: <?= $material['materialId']; ?></div>
											<div class="material__topCenter">
												<div class="material__price">


													<br />
													<? if ($material['statusPostman'] == 2) { ?>
														Ще не продається
													<? } else { ?>
														Ціна: <br /><?= $material['price_per_units']; ?> <span>грн / 1 шт</span>
													<? } ?>


												</div>
												<div class="material__description">
													<h2>Опис:</h2>
													<?= $material['description']; ?>
												</div>
											</div>
										</div>
										<div class="material__characteristics">
											<? if ($material['statusPostman'] == 2) { ?>

												<form action="vender/addMaterialWa.php" method="POST" class="material__characteristic form-characteristic">
													<input id="id" type="number" name='id' style="display:none" value="<?= $material['materialId']; ?>" />
													<div class="form-ch">
														<label class="postman-label" for="prices<?= $material['materialId']; ?>">Введіть ціну за 1 од. товару, грн:</label>
														<input name="prices" id="prices<?= $material['materialId']; ?>" type="number" placeholder="Ціна за 1 од. товару" class="input-basic" />
													</div>
													<input type="submit" value="Відправити на продажу" class="button-basic" />
												</form>
											<? } else { ?>

											<? } ?>

											<h2 class="material__characteristic">Характеристики</h2>
											<div class="material__characteristic">
												Кількість на складі : <?= $material['countWM']; ?>
											</div>

											<div class="material__characteristic">
												Термін придатності : <?= $material['expiration_date']; ?>
											</div>

											<div class="material__characteristic">
												Розмір: <?= $material['size']; ?>
											</div>
											<div class="material__characteristic">
												Країна виробник: <?= $material['country']; ?>
											</div>
											<div class="material__characteristic">
												Бренд : <?= $material['brand']; ?>
											</div>
											<div class="material__characteristic">
												Склад: <?= $material['address']; ?>
											</div>
											<div class="material__characteristic">
												Постачальник: <?= $material['name_postman']; ?>
											</div>
											<div class="material__characteristic">
												Дата отримання: <?= $material['appearance_date']; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<? } ?>


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
		<?
		include 'footer.php';
		?>
	</div>
</body>
<script src="js/js.js"></script>

</html>