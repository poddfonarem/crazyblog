<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center">
                    <img src="/assets/images/Logo.png" width="200" height="70"  alt="">
                </div>
                <form action="/includes/authentication/registration.php" method="post">
                    <h1 class="h3 mb-3 fw-normal">Реєстрація в системі</h1>
                    <?php require_once __DIR__ .'/../../alert/alertSystem.php';?>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="nickname" id="floatingNickName" placeholder="ivanoff">
                        <label for="floatingNickName">Нік користувача</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="username" id="floatingName" autocomplete="on" placeholder="Іванов Іван Іванович">
                        <label for="floatingName">Ім'я користувача</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" name="email" id="floatingInput" autocomplete="on" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Пароль</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password_confirm" id="floatingPasswordConfirm" placeholder="Password">
                        <label for="floatingPasswordConfirm">Підтвердження пароля</label>
                    </div>
                    <div class="form-check text-start my-3 d-flex justify-content-between">
                        <p>Вже є акаунт? <a href="/login">Увійдіть</a></p>
                    </div>
                    <button class="btn btn-primary py-2 w-100" type="submit">Зареєструватись</button>
                </form>
            </div>
        </div>
    </div>
</div>