<header class="animated fade_1">
    <a href="/lublio/learn/" class="logo">
        <p>LUBLIO</p>
    </a>
    <i id="menu" class="fa-solid fa-bars"></i>
</header>
<div class="overlay">
    <a class="close">&times;</a>
    <div class="overlay_content">
        <ul class="menu_list">
            <li>
                <a href="/lublio/learn/" class="menu_link">
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="/lublio/learn/" class="menu_link">
                    <p>Blog</p>
                </a>
            </li>
            <li>
                <a href="/lublio/learn/" class="menu_link">
                    <p>Learn</p>
                </a>
            </li>
            <li>
                <a href="/lublio/learn/" class="menu_link">
                    <p>About Us</p>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    const doc = document;

    /* HEADER SCROLL */

    window.addEventListener(
        "scroll",
        function () {
            var header = doc.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        }
    );

    /* MENU */

    const menuOpen = doc.querySelector("#menu");
    const menuClose = doc.querySelector(".close");
    const overlay = doc.querySelector(".overlay");

    menuOpen.addEventListener(
        "click",
        () => {
            overlay.classList.toggle("overlay_active");
        }
    );

    menuClose.addEventListener(
        "click",
        () => {
            overlay.classList.remove("overlay_active");
        }
    );

    /* Theme */

    // const btnDark = document.querySelector('#btn_dark');
    // const btnLight = document.querySelector('#btn_light');

    // btnLight.style.cssText = "display: none;";

    // btnDark.addEventListener(
    //     'click',
    //     e => {
    //         document.documentElement.setAttribute('color-theme', 'dark');
    //         btnDark.style.cssText = "display: none;";
    //         btnLight.style.cssText = "display: block;";
    //     }
    // );

    // btnLight.addEventListener(
    //     'click',
    //     e => {
    //         document.documentElement.setAttribute('color-theme', 'light');
    //         btnLight.style.cssText = "display: none;";
    //         btnDark.style.cssText = "display: block;";
    //     }
    // );
</script>