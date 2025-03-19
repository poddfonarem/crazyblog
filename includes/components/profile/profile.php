<?php
$plan = match ($_SESSION['status']) {
    '2' => 'Pro',
    '3' => 'Enterprise',
    default => 'Free',
};
$startPos = strpos($_SESSION['avatar'], 'uploads/');
$filePath = substr($_SESSION['avatar'], $startPos);
?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center">
                    <img src="<?=$filePath?>" width="140" height="100"  class="rounded-circle border" alt="">
                </div>
                <div class="text-center mt-3">
                    <span class="bg-secondary p-1 px-4 rounded text-white"><?=$plan?></span>
                    <h5 class="mt-2 mb-0"><?=$_SESSION['username']?></h5>
                    <span>@<?=$_SESSION['nickname']?></span>
                    <div class="buttons mt-3">
                        <button class="btn btn-primary px-4 ms-3" onclick="toggleAddPostForm()">Створити пост</button>
                        <button class="btn btn-primary px-4" onclick="toggleSettingsForm()">Налаштувати</button>
                    </div>
                    <?php require_once __DIR__ .'/../../alert/alertSystem.php';?>
                </div>
            </div>
        </div>
    </div>
</div>