<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL ?>/assets/images/iivt.png" width="75"
                        alt="logo"></a>

                <h1>

                    <a href="<?php echo BASE_URL ?>">КБИС</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>


                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="#">
                                <?php echo $_SESSION['login']; ?>

                            </a>

                            <ul>
                                <?php if ($_SESSION['admin'] == 2)
                                : ?>
                                    <li>
                                        <a href="<?php echo BASE_URL . "sadmin/posts/index.php"; ?>">Админ панель</a>
                                    </li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a></li>
                            </ul>
                        <?php else: ?>
                            <a href="<?php echo BASE_URL . "log.php"; ?>">Профиль</a>
                            <ul>
                                <li><a href="<?php echo BASE_URL . "reg.php"; ?>">Регистрация</a></li>
                            </ul>
                        <?php endif; ?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>