<div class="container mt-5">
<div class="row d-flex justify-content-center">
    <div class="col-md-7">
        <div class="card p-3 py-4">
            <div class="text-center">
                <img src="/assets/images/Logo.png" width="200" height="70"  alt="">
            </div>
            <form action="/includes/authentication/resetPassword.php" method="post">
                <h1 class="h3 mb-3 fw-normal">Скидання пароля</h1>
                <?php require_once __DIR__ .'/../../alert/alertSystem.php';?>
                <div class="form-floating mb-4">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <button class="btn btn-primary py-2 w-100" type="submit">Скинути</button>
            </form>
        </div>
    </div>
</div>
</div>