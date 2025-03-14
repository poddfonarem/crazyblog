<?php
$pageId = $_GET['id'];

global $conn;
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT posts.id, posts.title, posts.text, posts.date, users.nickname 
                         FROM crazyblog.posts 
                         JOIN crazyblog.users ON posts.userId = users.id WHERE posts.id = $pageId
                         ORDER BY posts.date DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt2 = $conn->query("SELECT comments.id, comments.comment, comments.date, users.nickname as nick, users.avatar as img
                      FROM crazyblog.comments 
                      JOIN crazyblog.users ON comments.userId = users.id
                      JOIN crazyblog.posts ON comments.postId = posts.id 
                      WHERE posts.id = $pageId 
                      ORDER BY comments.date DESC");

    $comments = $stmt2->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}

if ($posts):
foreach ($posts as $post): ?>
<main class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
        <div class="col-lg-6 px-0">
            <h1 class="display-4 fst-italic"><?= htmlspecialchars($post['title']) ?></h1>
            <p class="lead mb-0"><a href="#body" class="text-body-emphasis fw-bold">Перейти...</a></p>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-md-8">
            <article class="blog-post">
                <p class="blog-post-meta"><?= date("d.m.Y", strtotime($post['date'])) ?>
                    <a href="#">@<?= htmlspecialchars($post['nickname']) ?></a></p>
                <hr id="body">
                <p><?= htmlspecialchars($post['text']) ?></p>
            </article>
            <form action="/includes/posts/addComment.php" method="POST">
                <label for="post_comment">Написати коментар</label>
                <textarea class="w-100" rows="5" id="post_comment" name="post_comment"></textarea>
                <input type="hidden" name="post_id" value="<?= $pageId ?>">
                <button type="submit" class="btn w-100">Опублікувати</button>
            </form>
            <?php require_once __DIR__ .'/../../alert/alertSystem.php';
                if ($comments):
                    foreach ($comments as $comment):
                        if ($comment['nick'] == $_SESSION['nickname']):
                            $deleteBtn = '<form action="/includes/posts/deleteComment.php" method="post">
                                            <input type="hidden" name="comment_id" value="'.$comment['id'].'">
                                            <button type="submit" class="btn" onclick="return confirm(\'Ви впевнені, що хочете видалити цей коментар?\');">
                                                Видалити
                                            </button>
                                          </form>';
                        else:
                            $deleteBtn = '';
                        endif;
                        ?>
                    <div class="d-flex text-body-secondary pt-3">
                        <img src="<?= htmlspecialchars($comment['img']) ?>" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" alt="">
                        <p class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <strong class="d-block text-gray-dark">@<?= htmlspecialchars($comment['nick']) ?> (<small><?= date("d.m.Y H:i", strtotime($comment['date'])) ?></small>) </strong>
                            <?= htmlspecialchars($comment['comment']) .'<div class="m-3"></div>'. $deleteBtn ?>

                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h5 class="my-4 text-center">Коментарі відсутні</h5>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic">Про систему</h4>
                    <p class="mb-0">Система створена для публікування та редагування постів. Всі помилки можете відправити
                        <a href="mailto:vitalii.breusenko@gmail.com">vitalii.breusenko@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php endforeach; ?>
<?php else: ?>
    <h2 class="text-center">Пост відсутній.</h2>
<?php endif; ?>
