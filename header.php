<header>
    <div class="head-content">
        <div class="content__logo">
            <img src="img/Luxzury.png" alt="">
        </div>
        <div class="content__items">
            <nav class="menu">
                <ul class="menu__items">
                    <a href="">
                        <li class="menu__item <?=$_SERVER['SERVER_NAME']=='kurs' ? 'active' : ''?>">Список номеров</li>
                    </a>
                    <a href="">
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