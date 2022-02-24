<!DOCTYPE html>
<html lang="en">
<?include_once('./head.php')?>
<body>
    <?include_once('./header.php')?>
    <?php
        $link = mysqli_connect("localhost", "root", "",'cards');
        $fio = $_POST['fio'];

        print_r($fio);    
        $sql = "INSERT INTO users SET fio = ";
        $result = mysqli_query($link, $sql);

        if ($result == false) {
            print("Произошла ошибка при выполнении запроса");
        }
    ?>
    <div class="add-guest">
        <form name="form" class="container form" action="./addguest.php" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">ФИО</label>
                <input type="text" class="form-control" id="fio" placeholder="ФИО..." >
            </div>
            <div class="form-group">
                <span>Паспортные данные</span>
                <div class="group">
                    <input type="text" class="form-control" id="pasport-ser" placeholder="Серия..." >
                    <input type="text" class="form-control" id="pasport-num" placeholder="Номер..." >
                </div>
                
            </div>
            <div class="form-group">
                <label for="date">Дата приезда</label>
                <input type="date" class="form-control" id="date" placeholder="Дата приезда..." >
            </div>
            <div class="submit">
                <input type="submit" class="btn btn-outline-success" >      </button>
            </div>
        </form>
</div>
</body>
</html>