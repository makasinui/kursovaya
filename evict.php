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
    
    $id = $_GET['id'];
    $date = date("Y-m-d");

    if($id){
        $query = "UPDATE users SET evict ='$date' WHERE id = $id";
        mysqli_query($link,$query);

        $query = "INSERT INTO del SELECT * FROM users WHERE id = '$id'";
        mysqli_query($link,$query);

        $query = "DELETE FROM users WHERE id = '$id'";
        mysqli_query($link,$query);
        
        echo '<script>window.location.href="./evict.php"</script>';
    }
    
?>
<main class="container">
    <div class="guest-top">
        <div class="head-title">
            Отъезд
        </div>
        <div class="search">
            <input type="search" class="search" name="" id=""> <img src="./img/search.png" alt="">
        </div>
    </div>
    <div class="tbl table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО </th>
                <th scope="col">Паспортные данные</th>
                <th scope="col">Дата приезда </th>
                <th scope="col">Дата отъезда </th>
                <th scope="col">Номер </th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?
                foreach ($result as $guest) {
                ?>
                <tr>
                    <form action="./evict.php">
                        <th scope="row">
                            <input type="text" name="id" size=1 value=<?=$guest['id']?> style="border:none;color:black;font-weight:bold;cursor:default;background-color:white;">  
                        </th>
                        <td class="fio"><?=$guest['fio']?> </td>
                        <td class="pasport"><?=$guest['pasport']?></td>
                        <td class="date"><?=$guest['date']?></td>
                        <td class="out"><?=$guest['evict']?></td>
                        <td class="number"><?=$guest['number'] ? $guest['number'] :'-'?></td>
                        <td>
                            <button class="btn btn-evict">выселить</button>
                        </td>
                    </form>
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
</main>



</body>
</html>