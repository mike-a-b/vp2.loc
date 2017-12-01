<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- Begin page content -->
<div class="container">
        <div class="form-container">
                <form class="form-horizontal" method="post" action=>
                <div class="form-group">
                    <label for="inputLogin" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="inputLogin" id="inputLogin" placeholder="Логин">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-default" value="Войти">
                        <br>
                        Нет аккаунта? <a href="/users/register/">Зарегистрируйтесь</a><br>
                    </div>
                </div>
            </form>
        </div>
</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>