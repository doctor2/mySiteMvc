<?php 
head('Вход') ?>


<div class="page">
	<div>
		<form method="POST" action="">
			<br><input type="text" name="login" placeholder="Логин" maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Не менее 3 и неболее 10 латинских символов или цифр." required>
			<br><input type="password" name="password" placeholder="Пароль" maxlength="15" pattern="[A-Za-z-0-9]{3,15}" title="Не менее 3 и неболее 15 латинских символов или цифр." required>
			<br><p><input type="checkbox" name="remember"> Запомнить меня</p>
			<input type="submit" name="enter" value="Вход"> <input type="reset" value="Очистить">
			<label><?php 
							if (!empty($_POST['login'])) echo 'Неправильный логин или пароль';
					?>
			</label>
		</form>
	</div>
</div>

<?php footer() ?>