<!DOCTYPE html>
<html lang="en">
<head>
<?include_once('./head.php')?>
</head>
<body>
<?
    include_once('./header.php')
?>
<?
       if (isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
        $_GET['page']=1;
    }

    $kol = 10;  //количество записей для вывода
    $art = ($page * $kol) - $kol; // определяем, с какой записи нам выводить
    
    $link = mysqli_connect("localhost", "root", "",'cards');
    $sql = "SELECT * from users LIMIT $art,$kol";
    $result = mysqli_query($link,$sql);

?>
<main class="container">
    <div class="guest-top">
        <div class="head-title">
            Отъезд
        </div>
        <div class="search">
            <input type="search" name="" id=""> <img src="./img/search.png" alt="">
        </div>
    </div>
    <div class="tbl">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                <th scope="col">Паспортные данные <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                <th scope="col">Дата приезда <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                <th scope="col">Дата отъезда <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                <th scope="col">Номер <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?
                foreach ($result as $guest) {
                ?>
                <tr>
                    <th scope="row"><?=$guest['id']?></th>
                    <td class="fio"><?=$guest['fio']?> </td>
                    <td class="pasport"><?=$guest['pasport']?></td>
                    <td class="date"><?=$guest['date']?></td>
                    <td class="out"><?=$guest['evict']?></td>
                    <td class="number"><?=$guest['number'] ? $guest['number'] :'-'?></td>
                    <td>
                        <button class="btn btn-evict">выселить</button>
                    </td>
                </tr>
                <?}?>
            </tbody>
            </table>
    </div>

    <?
        $link = mysqli_connect("localhost", "root", "",'cards');
        $sql = "SELECT COUNT(*) from users";
        $result = mysqli_query($link,$sql);
    
        $result = mysqli_fetch_array($result);
        $str_pag = ceil($result['COUNT(*)']/$kol);
    ?>
    <div class="pgn">
        <nav aria-label="...">
            <ul class="pagination">
                <?
                if($str_pag!=1){
                    for($i=1;$i<=$str_pag;$i++){
                ?>
                <li class="page-item <?=$_GET['page']==$i ? 'active' : ''?>">
                    <a class="page-link" href="evict.php?page=<?=$i?>"><?=$i?></a>
                </li>
                <?}}?>
            </ul>
        </nav>
    </div>
    
    <div class="modal hidden">
        <div class="modal-show">
            <div class="modal-close">
                ✕
            </div>
            <table class="table" style="margin:20px 0px;">
                <thead>
                    <tr>
                    <th scope="col">ФИО <a href=""> </a> </th>
                    <th scope="col">Паспортные данные <a href=""></a></th>
                    <th scope="col">Номер <a href=""></a></th>
                    <th scope="col">Дата приезда <a href=""> </a></th>
                    <th scope="col">Дата отъезда <a href=""> </a></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fio" scope="row"></td>
                        <td class="pasport"></td>
                        <td class="number"></td>
                        <td class="date"></td>
                        <td class="out"></td>
                    </tr>
                </tbody>
                </table>
                
                <div class="out-container">
                    <div class="out-date"></div>
                    <div class="out-price"></div>
                    <div class="button">
                        <button class="btn" >Выселить</button>
                    </div>
                </div>
                
        </div>
    </div>

</main>



</body>
</html>