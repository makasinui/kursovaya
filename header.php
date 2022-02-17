<header>
    <div class="head-content">
        <div class="content__logo">
            <a href="./index.php"><img src="img/Luxzury.png" alt=""></a>
        </div>
        <div class="content__items">
            <nav class="menu">
                <ul class="menu__items">
                    <a href="./index.php">
                        <li class="menu__item <?=$_SERVER['SERVER_NAME']=='kurs' ? 'active' : ''?>">Список номеров</li>
                    </a>
                    <a href="./guest.php">
                        <li class="menu__item <?=$_SERVER['SERVER_NAME']=='kurs/guests' ? 'active' : ''?>">Список гостей</li>
                    </a>
                    <a href="">
                        <li class="menu__item <?=$_SERVER['SERVER_NAME']=='kurs/otezd' ? 'active' : ''?>">Отъезд</li>
                    </a>
                </ul>
            </nav>
        </div>
    </div>
</header>