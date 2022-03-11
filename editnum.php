<?php session_start();?>
<html lang="en">
<?include_once('./head.php')?>
<body>
    <?
        if(isset($_POST['num'])){
            $_SESSION['num'] = $_POST['num'];
        }

        $number = $_SESSION['num'];

        $link = mysqli_connect("localhost", "root", "",'cards');

        $query = "SELECT * from card WHERE num = $number";
        $card = mysqli_query($link,$query);
        $card = mysqli_fetch_array($card);
    

    ?>
     <div class="editnum">
         <div class="card" style="width: 34rem;">
            <img class="card-img card-img-top   " src="./img/hotel1.jpg" alt="Card image cap">
            <div class="card-body">
                <span class="title"><?=$card['name']?></span>
                <div class="info">
                        <span class="card-text price"><?=$card['price']?>$</span> <br>
                        <span class="count"><?='Доступно номеров: '.$card['count']?></span>
                    </div>
                <span class="guest"><?=$card['person']?> местный</span><br>
             </div>

    </div>
        <form name="form" class="container form" method="GET" style="width:50%;">
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
                    
                        <input type="number" name="available_num" class="form-control" required id="date" placeholder="Доступно номеров..." >
                </div>
                <div class="form-group">
                <label for="date">Доступность</label>
                        <input type="checkbox" name="available" style="-webkit-appearance:checkbox;height:39px;width:50px;" class="form-control" id="date-out" placeholder="Дата приезда..." >
                </div>
                <div class="form-group">
                    <label for="date">Количество мест в номере:</label>
                    <input type="number" name="number" class="form-control" required id="number" placeholder="Количество мест..." >
                </div>
                <div class="submit">
                    <input type="submit" class="btn btn-outline-success" id="submit"></input>
                </div>
            </form>
            
     </div>
     <a href="./"><button style="margin:50px;"class="btn btn-success">Вернуться назад</button></a>
     <?
        $name = $_GET['name'];
        $price= $_GET['price'];
        $available_num = $_GET['available_num'];
        $available = $_GET['available'] == 'on'?1:0;
        $num = $_GET['number'];
        if($num){
            $query = "UPDATE card SET name ='$name', price = '$price', count = '$available_num', available = '$available', person = '$num' WHERE num = $number";
            if(!mysqli_query($link,$query)){
                print_r(mysqli_error($link));
            }

            echo '<script>window.location.href="./editnum.php"</script>';
        }
     ?>
</body>
</html>