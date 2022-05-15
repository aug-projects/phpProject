<header class="flex justify-between bg-primary p-2">
    <!--  menu  -->
    <div class="flex">
        <?php
            foreach ($headerMenus as $menu) {
                echo "
                    <ul>
                        <li>
                            <a href='{$menu['url']}' class='text-black font-navbar' >{$menu['title']}</a>
                        </li>
                    </ul>
                ";
            }
        ?>
    </div>
    <!--  logo  -->
    <div>
        <img src="/assets/images/logo.png" alt="logo" width="60px" title="logo"/>
    </div>
</header>