<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/CSS/стили_модерации_каталога.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../public/CSS/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../public/CSS//bootstrap-reboot.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php
    require_once("blocks/header.php");
    require_once("blocks/pop_up.php");
    if (!isset($_SESSION['login'])) {
        header("Location: ./о_нас.php");
    } else if ($_SESSION["idUser"] != 1) {
        header("Location: ./о_нас.php");
    }
    if(isset($_SESSION['results'])){
        $p = "Привет";
        echo '<script>alert("Категория успешно добавлена")</script>';
        unset($_SESSION['results']);
    }else if(isset($_SESSION['error'])){
        echo '<script>alert("Такая категория уже существует")</script>';
        unset($_SESSION['error']);
    }
    ?>
    <main class="line">
        <div>
            <form action="../vendor/newCategory.php" class="newCategory" method="post">
                <div class="form-floating mb-3">
                    <input name="nmaeCategory" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Добавить категорию</label>
                </div>
                <a href="#" class="new_tovar button_reg mar">
                    <button type="submit" class="btn btn-success"><h4>Добавить</h4></button>
                </a>
            </form>
        </div>
        <table>
            <tr>
                <th><h1>Все категории</h1></th>
            </tr>
            <?php
            require_once("../function.php");
            $date = resTovar("SELECT * FROM `category`");
            foreach ($date as $a){
                echo "<tr class='separateCategory'><th style='display: flex'><button><img id='{$a['name']}' class='deleteimg' src='../public/Images/крестик.jpg'></button><h4>{$a['name']}</h4></th></tr>";
            }
            ?>
            <script>
                document.querySelector('body').onclick = function (e){
                    if(e.target.className == "deleteimg"){
                        let nameCategoryForDelete = e.target.id;
                        let text = `Вы точно хотите удалить категоорию "${nameCategoryForDelete}"?`;
                        let confirmationDelete = confirm(text);
                        if(confirmationDelete){
                            let categoryDelete = e.target.closest(".separateCategory")
                            categoryDelete.remove();
                            $.get("sortTovar.php", {dock:"deleteCategory", idCategory:nameCategoryForDelete}, function (data){
                                data = JSON.parse(data);
                                alert(data["results"])
                            });
                        }else{
                            alert("Удаление категории отменено")
                        }
                    }
                }
            </script>
        </table>
    </main>
</body>
</html>


