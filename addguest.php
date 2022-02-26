<!DOCTYPE html>
<html lang="en">
<?include_once('./head.php')?>
<body>
    <?include_once('./header.php')?>
    <?php
        $link = mysqli_connect("localhost", "root", "",'cards');
        $fio = $_POST['fio'];
        $number = $_POST['number'];
        $serial = $_POST['serial'];
        $date = $_POST['date'];

        if($date){
            $sql = "INSERT INTO `users` (`fio`, `pasport`, `date`, `evict`, `number`) VALUES ('$fio','$serial $number','$date','-',0)";
            $result = mysqli_query($link, $sql);
            
            if ($result == false) {
                print("Произошла ошибка при выполнении запроса");
            }     
         } 
    ?>
    <div class="add-guest">
        <form name="form" class="container form" action="./addguest.php" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">ФИО</label>
                <input type="text" class="form-control" name="fio" id="fio" required placeholder="ФИО..." >
            </div>
            <div class="form-group">
                <span>Паспортные данные</span>
                <div class="group">
                    <input type="text" class="form-control" name="serial" required id="pasport-ser" placeholder="Серия..." >
                    <input type="text" class="form-control" name="number" required id="pasport-num" placeholder="Номер..." >
                </div>
                
            </div>
            <div class="form-group">
                <label for="date">Дата приезда</label>
                <input type="date" name="date" class="form-control" required id="date" placeholder="Дата приезда..." >
            </div>
            <div class="submit">
                <input type="submit" class="btn btn-outline-success" ></button>
            </div>
        </form>
</div>
</body>
</html>