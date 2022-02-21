<?
    $link = mysqli_connect("localhost", "root", "",'cards');
    $sql = 'SELECT * from card';
    $result = mysqli_query($link,$sql);

?>
<main class="numbers container">
    <div class="numbers__head">
        <div class="head-title">
            Номера
        </div>
        <div class="head-arrows">
            <a href="#"><span class="arrow-left"><</span></a>
            <a href="#"><span class="arrow-right">></span></a>
        </div>
    </div>
    <div class="nums">
        <div class="numbers-select">
            <ul class="select-menu">
                <a href="">
                    <li class="select-items active">Бюджет</li>
                </a>
                <a href="">
                    <li class="select-items">Средний класс</li>
                </a>
                <a href="">
                    <li class="select-items">Люкс</li>
                </a>
            </ul>
        </div>
        <div class="numbers-card">
            <?
                foreach ($result as $card) {
            ?>
            <figure class="card">
                <div class="card-img">
                    <img src="<?=$card['path']?>" alt="">
                </div>

                <figcaption class="card-description">
                    <span class="title"><?=$card['name']?></span>
                    <div class="info">
                        <span class="price"><?=$card['price']?>$</span><br>
                        <span class="available"><?=$card['available']?'Доступен' :'Не доступен'?></span> <br>
                    </div>
                    <span class="guest"><?=$card['person']?> местный</span>
                    <?

                        if($url == 'kursovaya/guest.php'){
                    ?><button class="btn" style="width:50%;">Заселить</button>
                    <?}?>
                </figcaption>
                
            </figure>
            <?}?>
        </div>
    </div>

</main>