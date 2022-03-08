<?include_once('./header.php')?>
    <?php
    
        $link = mysqli_connect("localhost", "root", "",'cards');
        $query = 'SELECT * FROM card ORDER BY id DESC LIMIT 1';
        $num = mysqli_query($link,$sql);
        $num = mysqli_fetch_all($num, MYSQLI_NUM);
        $num = array_pop($num);
        $num = $num[1]+1;



        $name = $_POST['name'];
        $price= $_POST['price'];
        $person = $_POST['person'];
        $count = $_POST['count'];
        $available = $_POST['available'] == 'on'?1:0;
        

        if($available){
            $sql = "INSERT INTO `card` (`path`,`num`, `name`, `price`, `person`, `available`,`count`) VALUES ('./img/hotel1.jpg','$num','$name', '$price','$person','$available','$count')";
            $resultt = mysqli_query($link, $sql);

            echo'<script>window.location.href="./"</script>';

            if ($resultt == false) {
                print("Произошла ошибка при выполнении запроса") . mysqli_error($link);
            }
                 
        } 
        
    ?>
    
    <form name="form" class="container form" method="POST" style="width:50%;">
                <div class="form-group">
                    <label for="formGroupExampleInput">Название</label>
                    <input type="text" class="form-control" name="name" required placeholder="Название..." >
                </div>
                <div class="form-group">
                    <span>Цена</span>
                    <input type="price" class="form-control" name="price" required id="pasport-ser" placeholder="Цена..." >
                </div>

                <div class="form-group">
                    <label for="date">Доступно номеров</label>
                    
                        <input type="number" name="count" class="form-control" required id="date" placeholder="Доступно номеров..." >
                </div>
                <div class="form-group">
                <label for="date">Доступность</label>
                        <input type="checkbox" name="available" style="-webkit-appearance:checkbox;height:39px;width:50px;" class="form-control" required id="date-out" placeholder="Дата приезда..." >
                </div>
                <div class="form-group">
                    <label for="date">Количество мест в номере:</label>
                    <input type="number" name="person" class="form-control" required id="number" placeholder="Количество мест..." >
                </div>
                <div class="submit">
                    <input type="submit" class="btn btn-outline-success" id="submit"></input>
                </div>
            </form>

