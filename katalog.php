<!DOCTYPE html>
<html>
<head>
    <title>Сайт</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'wewe';
        $conn = mysqli_connect($host, $user, $pass, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>
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
        <div class="aboba">
            <form method="post" action="katalog.php">
                <input type="text" name="serch_text">
                <input type="submit" name="search" value="Поиск">
            </form>
            <?php
            $query = "SELECT * FROM category";
            $result = mysqli_query($conn, $query);
            
            if ($result) {
                while($row = mysqli_fetch_array($result)) {
            ?>
                <div>
                    <form action="katalog.php" method="post">
                        <input type="submit" name="category" value="<?php echo $row[1]; ?>">
                    </form>
                </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="aboba main">
            <?php
            ini_set('display_errors', 0);
            error_reporting(E_ALL ^ E_NOTICE);
            
            $category = isset($_POST['category']) ? $_POST['category'] : '';
            $serch_text = isset($_POST['serch_text']) ? $_POST['serch_text'] : '';
            $search_clicked = isset($_POST['search']);

            $query = "SELECT * FROM product WHERE 1=1";
            
            if (!empty($category) && $category != 'Все товары') {
                $query .= " AND category = '" . mysqli_real_escape_string($conn, $category) . "'";
            }
            
            if ($search_clicked && !empty($serch_text)) {
                $search_term = mysqli_real_escape_string($conn, $serch_text);
                $query = "SELECT * FROM product WHERE 
                         name LIKE '%$search_term%' OR 
                         category LIKE '%$search_term%' OR 
                         description1 LIKE '%$search_term%' OR 
                         description2 LIKE '%$search_term%' OR 
                         description3 LIKE '%$search_term%' OR 
                         description4 LIKE '%$search_term%'";
            }
            
            $result = mysqli_query($conn, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {
            ?>
            <div class="card">
                <img src="images/image.png" alt="<?php echo htmlspecialchars($row['name']); ?>">
                <h1><?php echo htmlspecialchars($row['name']); ?></h1>
                <p>Цена: <?php echo htmlspecialchars($row['price']); ?> руб.</p>
            </div>
            <?php
                }
            } else {
                echo "<p>Товары не найдены</p>";
            }
            
            mysqli_close($conn);
            ?>
        </div>
    </section>
    <footer>
        <p>lsdfjhsdlhfsf</p>
    </footer>
</body>
</html>