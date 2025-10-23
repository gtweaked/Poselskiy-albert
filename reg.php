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
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg']) && ($_POST['reg'] == "Зарегистрироваться")) {
                $login = $_POST['login'] ?? '';
                $mail = $_POST['mail'] ?? '';
                $pass1 = $_POST['pass1'] ?? '';
                $pass2 = $_POST['pass2'] ?? '';
                $family = $_POST['family'] ?? '';
                $name = $_POST['name'] ?? '';
                $dubel_name = $_POST['dubel_name'] ?? '';

                if ($login && $mail && $pass1 && $pass2 && $family && $name && $dubel_name) {
                    if ($pass1 == $pass2) {
                        $host = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $base = 'wewe';

                        $conn = mysqli_connect($host, $user, $pass, $base);
                        if (!$conn) {
                            die('db error nigger' . mysqli_connect_error());
                        }

                        $query = "INSERT INTO reg (`login`,`mail`,`pass`,`status`,`family`,`name`,`dubel_name`) VALUES ('$login','$mail','$pass1','0','$family','$name','$dubel_name')";
                        $result = mysqli_query($conn, $query);
                        echo 'chupape';
                    } else {
                        echo 'error pass nigger';
                    }
                } else {
                    echo 'error nigger fill';
                }
            }
        ?>
        <table align="center">
            <form action='reg.php' method='post'>
                <tr>
                    <td>Введите логин</td>
                    <td><input type="text" name="login" placeholder="Логин" require></td>
                </tr>
                <tr>
                    <td>Введите почту</td>
                    <td><input type="email" name="mail" placeholder="Почта" require></td>
                </tr>
                <tr>
                    <td>Введите Фамилию</td>
                    <td><input type="text" name="family" placeholder="Фамилия" require></td>
                </tr>
                <tr>
                    <td>Введите имя</td>
                    <td><input type="text" name="name" placeholder="Имя" require></td>
                </tr>
                <tr>
                    <td>Введите отчетсво</td>
                    <td><input type="text" name="dubel_name" placeholder="Очество" require></td>
                </tr>
                <tr>
                    <td>Введите пароль</td>
                    <td><input type="text" name="pass1" placeholder="Пароль" require></td>
                </tr>
                <tr>
                    <td>Повторите пароль</td>
                    <td><input type="text" name="pass2" placeholder="Подтвердить пароль" require></td>
                </tr>   
                <tr>
                    <td>Зарегистрироваться</td>
                    <td><input type="submit" name="reg" value="Зарегистрироваться" require></td>
                </tr>
        </table>
    </section>
    <footer>
        <p>lsdfjhsdlhfsf</p>
    </footer>
</body>
