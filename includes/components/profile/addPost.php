<div class="container mt-5" style="display:none" id="addPost">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="section p-3 py-4">
                <form action="/includes/posts/addPost.php" method="post">
                    <label for="titlePost">Назва посту</label>
                    <input class="w-100 p-2 my-2" name="titlePost" id="titlePost" type="text" value="">
                    <label for="textPost">Текст посту</label>
                    <textarea class="w-100 p-2 my-2" name="textPost" rows="8" id="textPost"></textarea>
                    <button type="submit" class="btn btn-primary w-100">Опублікувати</button>
                </form>
            </div>
        </div>
    </div>
</div>
