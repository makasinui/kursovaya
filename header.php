<?$url =$_SERVER['REQUEST_URI'];?>
<header>
    <div class="head-content">
        <div class="content__logo">
            <a href="./index.php"><img src="img/Luxzury.png" alt=""></a>
        </div>
        <div class="content__items">
            <nav class="menu">
                <div class="hamburger hamburger-one"></div>
                    <ul class="menu__items">
                        <a href="./index.php">
                            <li class="menu__item <?=$url==='/' || $url==='/index.php' ? 'active' : ''?>">Список номеров</li>
                        </a>
                        <a href="./guest.php">
                            <li class="menu__item <?=$url=='/guest.php' ? 'active' : ''?>">Список гостей</li>
                        </a>
                        <a href="./evict.php">
                            <li class="menu__item <?=$url=='/evict.php' ? 'active' : ''?>">Отъезд</li>
                        </a>
                        <a href="./statistics.php">
                            <li class="menu__item <?=$url=='/statistics.php' ? 'active' : ''?>">Статистика</li>
                        </a>
                    
                    </ul>
                
            </nav>
        </div>
    </div>
</header>