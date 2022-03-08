    <?include_once('./header.php')?>
    <?php
    
        $link = mysqli_connect("localhost", "root", "",'cards');
        $fio = $_POST['fio'];
        $number_pas = $_POST['number_pas'];
        $serial = $_POST['serial'];
        $date = $_POST['date'];
        $dateOut = $_POST['date-out'];
        $number = $_POST['number'];
        

        if($date){
            $dop1 = $_POST['dop1']=='on'?1:0;
            $dop2 = $_POST['dop2']=='on'?1:0;
            $dop3 = $_POST['dop3']=='on'?1:0;

            $sql = "INSERT INTO `users` (`fio`, `pasport`, `date`, `evict`, `number`, `dop1`, `dop2`, `dop3`) VALUES ('$fio','$serial $number_pas','$date','$dateOut','$number','$dop1','$dop2','$dop3')";
            $resultt = mysqli_query($link, $sql);

            echo '<script>window.location.href="./guest.php"</script>';
            if ($resultt == false) {
                print("Произошла ошибка при выполнении запроса" . mysqli_error($link));
            }
                 
        } 
        
    ?>
    <div class="add-guest">
        <form name="form" class="container form" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">ФИО</label>
                <input type="text" class="form-control" name="fio" id="fio" required placeholder="ФИО..." >
            </div>
            <div class="form-group">
                <span>Паспортные данные</span>
                <div class="group">
                    <input type="text" class="form-control" name="serial" required id="pasport-ser" placeholder="Серия..." >
                    <input type="text" class="form-control" name="number_pas" required id="pasport-num" placeholder="Номер..." >
                </div>
                
            </div>
            <div class="form-group">
                <label for="date">Дата приезда</label>
                <input type="date" name="date" class="form-control" required id="date" placeholder="Дата приезда..." >
            </div>
            <div class="form-group">
                <label for="date">Дата отъезда</label>
                <input type="date" name="date-out" class="form-control" required id="date-out" placeholder="Дата приезда..." >
            </div>

            <div class="form-group">
                <span>Выберите доп услуги(по желанию):</span> <br>
                <input type="checkbox" name="dop1" id="">
                <label for="dop1">Завтрак в номер(10$/день)</label>
                <br>
                
                <input type="checkbox" name="dop2" id="">
                <label for="dop2">200 каналов в телевизоре(2$/день)</label>
                <br>

                <input type="checkbox" name="dop3" id="">
                <label for="dop3">Доступ к бару(15$/день)</label>
                <br>
            </div>

            <div class="form-group">
                <label for="date">Выберите номер ниже:</label>
                <input type="number" name="number" class="form-control" required readonly id="number" placeholder="Номер..." >
            </div>
            <div class="submit">
                <input type="submit" class="btn btn-outline-success" id="submit"></input>
            </div>
        </form>
</div>
