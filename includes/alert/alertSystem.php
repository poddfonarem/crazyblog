<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger my-2"><?= $_SESSION['error'];
        unset($_SESSION['error']); ?></div>
<?php endif; ?>
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success  my-2"><?= $_SESSION['success'];
        unset($_SESSION['success']); ?></div>
<?php endif; ?>
