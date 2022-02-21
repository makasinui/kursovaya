<?$url =$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];?>
<header>
    <div class="head-content">
        <div class="content__logo">
            <a href="./index.php"><img src="img/Luxzury.png" alt=""></a>
        </div>
        <div class="content__items">
            <nav class="menu">
                <ul class="menu__items">
                    <a href="./index.php">
                        <li class="menu__item <?=$url==='kursovaya' || $url==='kursovaya/index.php' ? 'active' : ''?>">Список номеров</li>
                    </a>
                    <a href="./guest.php">
                        <li class="menu__item <?=$url=='kursovaya/guest.php' ? 'active' : ''?>">Список гостей</li>
                    </a>
                    <a href="./evict.php">
                        <li class="menu__item <?=$url=='kursovaya/evict.php' ? 'active' : ''?>">Отъезд</li>
                    </a>
                    <a href="./statistics.php">
                        <li class="menu__item <?=$url=='kursovaya/statistics.php' ? 'active' : ''?>">Статистика</li>
                    </a>
                </ul>
            </nav>
        </div>
    </div>
</header>