<div class="page">
	<div class="register">
		<form method="POST" action="">
			<input type="text" name="login" placeholder="Логин" maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Не менее 3 и неболее 10 латинских символов или цифр." required>
			<br><input type="email" name="email" placeholder="E-Mail" required>
			<br><input type="password" name="password" placeholder="Пароль" maxlength="15" pattern="[A-Za-z-0-9]{5,15}" title="Не менее 5 и неболее 15 латинских символов или цифр." required>
			<br><input type="text" name="name" placeholder="Имя" maxlength="10" pattern="[А-Яа-яЁё]{4,10}" title="Не менее 4 и неболее 10 латинских символов или цифр." required>
			<br>
			<input type="submit" name="enter" value="Регистрация"> <input type="reset" value="Очистить">
			<br>
			<label>
			<?php 
				if (!empty($_POST['login'])) echo 'Логин '.$_POST['login'].' уже сушествует';
			?>
			</label>
		</form>

	</div>
</div>