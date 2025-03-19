<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center">
                    <img src="/assets/images/Logo.png" width="200" height="70"  alt="">
                </div>
                <form action="/includes/authentication/login.php" method="post">
                    <?php require_once __DIR__ .'/../../alert/alertSystem.php';?>
                    <h1 class="h3 mb-3 fw-normal">Вхід в систему</h1>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="nickname" id="floatingInput" autocomplete="on" placeholder="name@example.com">
                        <label for="floatingInput">Ім'я користувача</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="floatingPassword" autocomplete="on" placeholder="Password">
                        <label for="floatingPassword">Пароль</label>
                    </div>
                    <div class="form-check text-start my-3 d-flex justify-content-between">
                        <p>Немає акаунту? <a href="/registration" class="mx-auto">Зареєструйтесь</a></p>
                        <a href="/resetPassword">Забули пароль?</a>
                    </div>
                    <button class="btn btn-primary py-2 w-100" type="submit">Вхід</button>
                </form>
            </div>
        </div>
    </div>
</div>
