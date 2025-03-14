<header class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/">
            <img src="/assets/images/Logo.png" width="120" height="40" alt="CrazyBlog">
        </a>
    </div>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/blog" class="nav-link px-2"><i class="fa fa-pagelines"></i> Блоги</a></li>
    </ul>
    <div class="buttons col-md-3 text-end">
        <?php
        if(isset($_SESSION['logged'])){
            echo '
            <button type="button" onclick="window.location.href=&quot;/profile&quot;;" class="btn btn-outline-primary me-2">Кабінет</button>
            <button onclick="window.location.href=&quot;/logout&quot;;" type="button" class="btn btn-outline-primary"><i class="fa fa-sign-out"></i></i></button>
            ';
        }else{
            echo '
            <button type="button" onclick="window.location.href=&quot;/login&quot;;" class="btn btn-outline-primary me-2">Вхід</button>
            <button type="button" onclick="window.location.href=&quot;/registration&quot;;" class="btn btn-primary">Реєстрація</button>
            ';
        }
        ?>
    </div>
</header>