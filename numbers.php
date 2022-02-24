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
    </div>
    <div class="nums">
        <div class="numbers-card">
            <?
                foreach ($result as $card) {
            ?>
            <div class="card" style="width: 18rem;">
                <img class="card-img card-img-top   " src="./img/hotel1.jpg" alt="Card image cap">
                <div class="card-body">
                    <span class="title"><?=$card['name']?></span>
                    <div class="info">
                        <span class="card-text price"><?=$card['price']?>$</span> <br>
                        <span class=<?=$card['available']?"available":'notavailable'?>><?=$card['available']?'Доступен':'Не доступен'?></span>
                    </div>
                    <span class="guest"><?=$card['person']?> местный</span><br>
                    <?
                    if($url == '/guest.php'){
                    ?><button class="btn" style="width:50%;">Заселить</button>
                    <?}?>
                </div>
            </div>

         
                    
                
                
            
            <?}?>
        </div>
    </div>

</main>