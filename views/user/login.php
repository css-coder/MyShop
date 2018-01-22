<?php include ROOT . '/views/layouts/header.php'?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Войти в кабинет</h2>
                    <form action="#">
                        <input type="text" placeholder="Имя" />
                        <input type="email" placeholder="Email" />
                        <span>
								<input type="checkbox" class="checkbox">
								Запомни меня
							</span>
                        <button type="submit" class="btn btn-default">Войти</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">ИЛИ</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Регистрация</h2>
                    <form action="#">
                        <input type="text" placeholder="Имя"/>
                        <input type="email" placeholder="Email"/>
                        <input type="password" placeholder="Пароль"/>
                        <button type="submit" class="btn btn-default">Регистрация</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

<?php include ROOT . '/views/layouts/footer.php'?>