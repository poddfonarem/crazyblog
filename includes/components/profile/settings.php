<div class="container mt-5" style="display:none" id="settings">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="section p-3 py-4">
                <form action="/includes/authentication/update.php" method="post" enctype="multipart/form-data">
                    <label for="avatar">Завантажити фото</label>
                    <input class="w-100 p-2 my-2" name="avatar" id="avatar" type="file">
                    <label for="username">Змінити ім'я</label>
                    <input class="w-100 p-2 my-2" name="username" id="username" type="text" autocomplete="off" value="<?=$_SESSION['username']?>">
                    <label for="nickname">Змінити нік</label>
                    <input class="w-100 p-2 my-2" name="nickname" id="nickname" type="text" value="<?=$_SESSION['nickname']?>">
                    <label for="email">Змінити Email</label>
                    <input class="w-100 p-2 my-2" name="email" id="email" type="email" autocomplete="off" value="<?=$_SESSION['email']?>">
                    <button type="submit" class="btn btn-primary w-100">Оновити</button>
                </form>
            </div>
        </div>
    </div>
</div>
