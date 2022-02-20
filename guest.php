<!DOCTYPE html>
<html lang="en">
<head>
<?include_once('./head.php')?>
</head>
<body>
<?
    include_once('./header.php')
?>
<main class="container">
    <div class="guest-top">
        <div class="head-title">
            Гости
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
                <th scope="col">Номер <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td class="fio">Mark Lavrely </td>
                    <td class="pasport">6012 122421</td>
                    <td class="date">21.12.2007</td>
                    <td class="number">-</td>
                    <td>
                        <button class="btn">заселить</button>
                    </td>
                </tr>
                <tr>
                <th scope="row">1</th>
                    <td class="fio">Jacob</td>
                    <td class="pasport">Thothno</td>
                    <td class="date">25.04.2017</td>
                    <td class="number">20</td>
                    <td>
                        <button class="btn">заселить</button>
                    </td>
                </tr>
            
            </tbody>
            </table>
    </div>

    <div class="pgn">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>


    <?
    session_start();

    try {
        $db = new PDO("mysql:host=localhost:3306;dbname=cards", "toor", "toor");
        $arr = $db -> query("SELECT * FROM img");
        
    } catch (PDOExeption $e) {
        echo 'ошибка';
        print $e->getMessage();
        die();
    }

?>
    
    <div class="modal hidden">
        <div class="modal-show">
            <div class="modal-close">
                ✕
            </div>
            <table class="table" style="margin:20px 0px;">
                <thead>
                    <tr>
                    <th scope="col">ФИО <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a> </th>
                    <th scope="col">Паспортные данные <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                    <th scope="col">Дата приезда <a href=""> <img class="img-icon" src="./img/sort.png" alt=""> </a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fio" scope="row"></td>
                        <td class="pasport"></td>
                        <td class="date"></td>
                    </tr>
                </tbody>
                </table>
            <div class="guest-numbers">
                <?include_once('./numbers.php')?>
            </div>
        </div>
    </div>

</main>



</body>
</html>