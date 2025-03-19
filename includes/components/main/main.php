<main class="container">
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Free</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/місяць</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>10 постів</li>
                        <li>2 GB of storage</li>
                        <li>Відсутність Emoji</li>
                        <li>3 запити в службу підтримки</li>
                    </ul>
                    <?php echo isset($_SESSION['status']) && $_SESSION['status'] == 1 ?
                        '<button type="button" class="w-100 btn btn-lg btn-outline-primary" disabled>Підключений</button>' :
                        '<button type="button" onclick="window.location.href=&quot;/login.php?page=registration&quot;;" class="w-100 btn btn-lg btn-outline-primary">Підключити</button>';
                    ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Pro</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$15<small class="text-body-secondary fw-light">/місяць</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>30 постів</li>
                        <li>10 GB of storage</li>
                        <li>Використання Emoji</li>
                        <li>7 запитів в службу підтримки</li>
                    </ul>
                    <?php echo isset($_SESSION['status']) && $_SESSION['status'] == 2 ?
                        '<button type="button" class="w-100 btn btn-lg btn-outline-primary" disabled>Підключений</button>' :
                        '<button type="button" class="w-100 btn btn-lg btn-outline-primary">Підключити</button>';
                    ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3 text-bg-primary">
                    <h4 class="my-0 fw-normal">Enterprise</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$29<small class="text-body-secondary fw-light">/місяць</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Безліміт по постам</li>
                        <li>15 GB of storage</li>
                        <li>Використання Emoji</li>
                        <li>Безліміт запитів до служби підтримки</li>
                    </ul>
                    <?php echo isset($_SESSION['status']) && $_SESSION['status'] == 3 ?
                        '<button type="button" class="w-100 btn btn-lg btn-outline-primary" disabled>Підключений</button>' :
                        '<button type="button" class="w-100 btn btn-lg btn-outline-primary">Підключити</button>';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <h2 class="display-6 text-center mb-4">План</h2>
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
            <tr>
                <th style="width: 34%;"></th>
                <th style="width: 22%;">Free</th>
                <th style="width: 22%;">Pro</th>
                <th style="width: 22%;">Enterprise</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" class="text-start">Публікування постів</th>
                <td><i class="fa fa-check"></i></td>
                <td><i class="fa fa-check"></i></td>
                <td><i class="fa fa-check"></i></td>
            </tr>
            <tr>
                <th scope="row" class="text-start">Оплата</th>
                <td></td>
                <td><i class="fa fa-check"></i></td>
                <td><i class="fa fa-check"></i></td>
            </tr>
            </tbody>

            <tbody>
            <tr>
                <th scope="row" class="text-start">Написання коментарів</th>
                <td><i class="fa fa-check"></i></td>
                <td><i class="fa fa-check"></i></td>
                <td><i class="fa fa-check"></i></td>
            </tr>
            <tr>
                <th scope="row" class="text-start">Поділитись коментарями</th>
                <td></td>
                <td><i class="fa fa-check"></i></td>
                <td><i class="fa fa-check"></i></td>
            </tr>
            <tr>
                <th scope="row" class="text-start">Використання Emoji</th>
                <td></td>
                <td><i class="fa fa-check"></i></td>
                <td><i class="fa fa-check"></i></td>
            </tr>
            <tr>
                <th scope="row" class="text-start">Служба підтримки 24/7</th>
                <td></td>
                <td></td>
                <td><i class="fa fa-check"></i></td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
