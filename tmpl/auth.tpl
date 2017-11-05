
<!DOCTYPE html>
<html lang="en">
<?=$header?>
<body>
<div class="container">
<div class="row">
    <div class="col-md-4 col-xs-8">
        <form class="form-signin" name="auth" action="/<?=$action?>" method="post">
            <h2 class="form-signin-heading">Вход в админ-панель</h2>
            <label for="inputEmail" class="sr-only">Логин</label>
            <input name="login" type="text" id="inputLogin" class="form-control" placeholder="Логин" required autofocus>
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
            <?php include "message.tpl"; ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Запомнить меня
                </label>
            </div>
            <input type="hidden" name="func" value="authAdmin" />
            <input type="submit" class="btn btn-lg btn-primary btn-block" >
        </form>
    </div>
</div>
</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
