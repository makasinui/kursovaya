<!DOCTYPE html>
<html lang="en">
<?include_once('./head.php')?>
<body>
    <?include_once('./header.php')?>
    <?
        $date = $_GET['date'];
        $date_out = $_GET['date_out']
    ?>
    <main class="container">
        <form class="select-date" action="./statistics.php">
            <select name="select" id="">
                <option value="guest">Гости</option>
                <option value="numbers">Номера</option>
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
                        $price = (abs(strtotime($guest['evict']) - strtotime($guest['date']))/86400)*$queryResult['price'];

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
                    <?}?>
                </tbody>
            </table>
                <?}?>
            
        </div>
    </main>
</body>
</html>