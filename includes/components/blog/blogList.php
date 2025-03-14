<?php

global $conn;
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT posts.id, posts.title, users.nickname, users.avatar 
                         FROM crazyblog.posts 
                         JOIN crazyblog.users ON posts.userId = users.id 
                         ORDER BY posts.date DESC");

    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Помилка підключення: " . $e->getMessage());
}
?>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="section p-3 py-4">
                <h6 class="border-bottom pb-2 mb-0">Останні пости</h6>
                <?php if ($posts): ?>
                    <ul>
                        <?php foreach ($posts as $post): ?>
                            <a href="/blog/<?= htmlspecialchars($post['id']) ?>" class="text-decoration-none text-dark">
                                <div class="d-flex text-body-secondary pt-3">
                                    <img src=" <?= htmlspecialchars($post['avatar']) ?>" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" alt="">
                                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                                        <strong class="d-block text-gray-dark">@<?= htmlspecialchars($post['nickname']) ?></strong>
                                        <?= htmlspecialchars($post['title']) ?>
                                    </p>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Постів немає.</p>
                <?php endif; ?>
                <small class="d-block text-end mt-3">
                    <a href="#">Завантажити ще</a>
                </small>
            </div>
        </div>
    </div>
</div>