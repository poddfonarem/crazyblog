<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    try {
        require_once __DIR__ . "/../../function/func.php";
        global $conn;

        $sql = "SELECT id, reset_token, token_expiry FROM crazyblog.users WHERE reset_token = :token";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':token', $token, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $storedToken = $row['reset_token'];
            $expiry = $row['token_expiry'];

            if (time() < $expiry) { ?>

                <div class="container mt-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7">
                            <div class="card p-3 py-4">
                                <div class="text-center">
                                    <img src="/assets/images/Logo.png" width="200" height="70" alt="">
                                </div>
                                <form action="/includes/authentication/updatePassword.php" method="post">
                                    <h1 class="h3 mb-3 fw-normal">Скидання пароля</h1>
                                    <?php require_once __DIR__ . '/../../alert/alertSystem.php'; ?>
                                    <input type="hidden" name="token" value="<?=$token?>">
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control my-3" id="newPassword"
                                               name="newPassword" placeholder="1">
                                        <label for="newPassword">Введіть новий пароль</label>
                                    </div>
                                    <button class="btn btn-primary py-2 w-100" type="submit">Зберегти</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            } else {
                echo "Термін дії посилання для скидання пароля минув.";
            }
        } else {
            echo "Невірний токен.";
        }
    } catch (PDOException $e) {
        echo "Помилка бази даних: " . $e->getMessage();
    }
    $conn = null;
}