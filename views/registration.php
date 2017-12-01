<?php include ROOT . '/views/layouts/header.php'; ?>
    
    <div class="container">
        <form class="form-horizontal" method="post" action="/users/register/"
              name = "description_form" enctype="multipart/form-data" id="form__description">
            <p class="alert alert-info">
                <span class="result"><?=$data['msg']; ?></span><br>
            </p>
            <div class="form-group">
                <label for="login" class="control-label col-sm-2">Логин</label>
                <div class="col-sm-10">
                    <input name="login" type="text" id="login" class="form-control" placeholder="Логин" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-sm-2">Пароль</label>
                <div class="col-sm-10">
                    <input name="password" type="password" id="password" class="form-control" placeholder="Пароль" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="password2" class="control-label col-sm-2">Пароль повторно</label>
                <div class="col-sm-10">
                    <input name="password2" type="password" id="password2" class="form-control" placeholder="Пароль подтверждение" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">Имя</label>
                <div class="col-sm-10">
                    <input name="name" type="text" id="name" class="form-control" placeholder="Имя" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="control-label col-sm-2" >Возраст</label>
                <div class="col-sm-10">
                    <input name="age" type="number" class="form-control" placeholder="Возраст" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-sm-2" >Описание</label>
                <div class="col-sm-10">
                    <input name="description" type="text" class="form-control" placeholder="Описание" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="file1" class="control-label col-sm-2" >Фото</label>
                <div class="col-sm-10">
                    <input name="upload" id="file" type="file" class="form-control" placeholder="Фото" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="reg_submit" class="btn btn-info" value="Отправить" />
                </div>
            </div>
        </form>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>