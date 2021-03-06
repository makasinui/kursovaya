<!DOCTYPE html>
<html lang="en">
<?include_once('./head.php')?>
<body>
    <?include_once('./header.php')?>
    <?
        $date = $_GET['date'];
        $date_out = $_GET['date_out'];

        $link = mysqli_connect("localhost", "root", "",'cards');
        $sql = "SELECT * from card";
        $result = mysqli_query($link,$sql);
        $result = mysqli_fetch_all($result);
        $countNum = (count($result));
    ?>
    <main class="container">
            <form class="select-date" action="./statistics.php">
                <select name="select" id="">
                 
                    <option value="guest">Гости</option>
                    <?for($i=1;$i<$countNum+1;$i++){?>   
                    <option value="number<?=$i?>">Номер <?=$i?></option>
                    <?}?>
                </select>
                <input type="date" name="date" id="date" required>
                <input type="date" name="date_out" id="date_out" required>
                <button class="btn btn-success">Отправить</button>
            </form>
        <div class="statistic">
            <?  
            if($_GET['select']=='guest'){
                $link = mysqli_connect("localhost", "root", "",'cards');
                $sql = "SELECT * from del WHERE Date >= '$date' and Date <= '$date_out'";
                $result = mysqli_query($link,$sql);
            ?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">ФИО <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                    <th scope="col">Паспортные данные <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                    <th scope="col">Дата приезда <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                    <th scope="col">Дата отъезда <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                    <th scope="col">Номер <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                    <th scope="col">Доход</th>    
                </tr>
                </thead>
                <tbody>
                    <?
                    foreach ($result as $guest) {
                        $query = "SELECT * from card WHERE num = ".(int)$guest['number'];
                        $queryResult = mysqli_query($link,$query);
                        $queryResult = mysqli_fetch_array($queryResult);
                        $priceDop = $guest['dop1'] == 1?(abs(strtotime($guest['evict']) - strtotime($guest['date']))/86400)*10:0 + $guest['dop2'] == 1?(abs(strtotime($guest['evict']) - strtotime($guest['date']))/86400)*2:0 + $guest['dop3'] == 1?(abs(strtotime($guest['evict']) - strtotime($guest['date']))/86400)*15:0 ;
                        $price = (abs(strtotime($guest['evict']) - strtotime($guest['date']))/86400)*$queryResult['price'] + $priceDop;

                    ?>
                    <tr>
                        <th scope="row"><?=$guest['id']?></th>
                        <td class="fio"><?=$guest['fio']?> </td>
                        <td class="pasport"><?=$guest['pasport']?></td>
                        <td class="date"><?=$guest['date']?></td>
                        <td class="out"><?=$guest['evict']?></td>
                        <td class="number"><?=$guest['number'] ? $guest['number'] :'-'?></td>
                        
                        <td class="pay"><?=$price?>$</td>
                    </tr>
                    <?} ?>
                </tbody>
            </table>
                <?}?>
                <?if(strpos($url,'number')){
                    $num = substr($_GET['select'],-1);
                    $link = mysqli_connect("localhost", "root", "",'cards');
                    
                    $query = "SELECT * from card WHERE num = $num";
                    $card = mysqli_query($link,$query);
                    $card = mysqli_fetch_array($card);
                    
                    $query = "SELECT * from users WHERE number = $num and Date >= '$date' and Date <= '$date_out'";
                    $count = mysqli_query($link,$query)->num_rows;
                    foreach((mysqli_query($link,$query)) as $row){
                        $price += (abs(strtotime($row['evict']) - strtotime($row['date']))/86400)*$card['price'];
                        $priceDop = $row['dop1'] == 1?(abs(strtotime($row['evict']) - strtotime($row['date']))/86400)*10:0 + $row['dop2'] == 1?(abs(strtotime($row['evict']) - strtotime($row['date']))/86400)*2:0 + $row['dop3'] == 1?(abs(strtotime($row['evict']) - strtotime($row['date']))/86400)*15:0 ;
                        $price+=$priceDop;
                    }

                    $query = "SELECT * from del WHERE number = $num and Date >= '$date' and Date <= '$date_out'";
                    $count_del = mysqli_query($link,$query)->num_rows;
                    foreach((mysqli_query($link,$query)) as $row){
                        $price_old += (abs(strtotime($row['evict']) - strtotime($row['date']))/86400)*$card['price'];
                        $priceDop = $row['dop1'] == 1?(abs(strtotime($row['evict']) - strtotime($row['date']))/86400)*10:0 + $row['dop2'] == 1?(abs(strtotime($row['evict']) - strtotime($row['date']))/86400)*2:0 + $row['dop3'] == 1?(abs(strtotime($row['evict']) - strtotime($row['date']))/86400)*15:0 ;
                        $price+=$priceDop;
                    }

                    
                ?>
                <div class="card" style="width: 16rem;">
                    <img class="card-img card-img-top   " src="./img/hotel1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <span class="title"><?=$card['name']?></span>
                        <div class="info">
                            <span class="card-text price"><?=$card['price']?>$</span> <br>
                            <span class=<?=$card['available'] && $card['count']?"available":'notavailable'?>><?=$card['available']?'Доступен':'Не доступен'?></span> <br>
                            <span>Всего гостей заселено сейчас: <?=$count?></span> <br>
                            <span>Всего гостей было: <?=$count_del?></span>
                        </div>
                        <span class="guest"><?=$card['person']?> местный</span><br>
                        <span class="doxod">Общая прибыль:<?=$price+$price_old?>$</span>
                </div>
                <?}?>
            
        </div>
    </main>
</body>
</html>