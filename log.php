<head>
    <title>сайт</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Сайт</h1>
        <nav>
            <a href='index.php'>Главная</a>
            <a href='log.php'>Логин</a>
            <a href='reg.php'>Регистрация</a>
            <a href='katalog.php'>Каталог</a>
        </nav>
</header>
    <section>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['log']) && ($_POST['log'] == "Войти"))
        $username = $_POST['login'];
        $password = $_POST['password'];

        if ($username === 'admin' && $password === '12345') {
            session_start();
            $_SESSION['user'] = $username;
            echo "<h1>Добро пожаловать, {$_SESSION['user']}!</h1>";
            echo "<p><a href='profile.php'>Перейти в профиль</a></p>";
        } else {
            echo "Неверный логин или пароль. <a href='login.html'>Попробуйте снова</a>";
        }
        ?>
         <form action="login.php" method="post">
        Логин: <input type="text" name="login"><br>
        Пароль: <input type="password" name="password"><br>
        <input type="submit" value="Войти">
    </form>
    </section>
    <footer>
        <p>lsdfjhsdlhfsf</p>
    </footer>
</body>