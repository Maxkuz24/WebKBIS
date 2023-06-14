<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="../../assets/images/iivt.png" width="75" alt="logo">
                <h1>

                    <a href="<?php echo BASE_URL ?>">КБИС</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li>
                        <a href="#">
                            <?php echo $_SESSION['login']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>