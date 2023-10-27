<?
$title = 'StroyMat';
session_start();
include 'head.php'; ?>


<body>
	<div class="wrapper wrapper-full">
		<? include "header.php";
		include 'vender/getPostman.php';
		?>
		<div class="background-main">
			<div class="container st-wr">
				<form action="vender/deletePostman.php" method="POST" class="st-wr-form">
					<h3>Видалити постачальника</h3>
					<div>
						<label class="postman-label" for="postman">Виберіть постачальника:</label>
						<select size="1" class="select-basic" id="postman" name="postman">
							<option selected disabled>Виберіть постачальника</option>
							<? while ($postman = $getPostman->fetch()) {

							?>
								<option value="<?= $postman['id']; ?>" name="postman"><?= $postman['name_company']; ?></option>

							<? } ?>
						</select>
						<div class="error error-r"><?= $_SESSION['error']['postman']; ?></div>
						<input type="submit" value="Видалити постачальника" class="button-basic" />
					</div>
				</form>
				<form action="vender/addPostman.php" method="POST" class="st-wr-form">
					<h3>Додати постачальника</h3>
					<div>
						<label class="postman-label" for="name_company">Назва компанії:</label>
						<input id="name_company" name="name_company" type="text" placeholder="Назва компанії.." class="input-basic" />
						<br /><br />
						<label class="postman-label" for="address_postman">Адреса постачальника:</label>
						<input id="address_postman" name="address_postman" type="address_postman" placeholder="Адреса постачальника.." class="input-basic" />
						<br /><br />
						<label class="postman-label" for="phone_postman">Номер телефону:</label>
						<input id="phone_postman" name="phone_postman" type="phone" placeholder="Номер телефону.." class="input-basic" />
						<br /><br />
						<label class="postman-label" for="email_postman">Email:</label>
						<input id="email_postman" name="email" type="email" placeholder="Email..." class="input-basic" />
						<div class="error"><?= $_SESSION['add']['postman']; ?></div>
						<input type="submit" value="Додати склад" class="button-basic" />
					</div>
				</form>
			</div>
		</div>
		<? include "footer.php";

		unset($_SESSION['error']['postman']);
		unset($_SESSION['add']['postman']) ?>
	</div>
</body>

</html>