<header class="header--login">
    <h1 class='logoHead animate__animated  animate__flipInY' >Via<span class='logoColor animate__animated  animate__flipInY'>UY</span></h1>
    <div class="dropdowns">
        <div class="dropdown">
            <button type="button" class="dropbtn" id="homeLanguage"></button>
            <div class="dropdown-content">
                <button type='button' id="enHome" class="enHome"></button>
                <button type='button' id="esHome" class="esHome"></button>
                <button type='button' id="prHome" class="prHome"></button>
            </div>
        </div>
        <div class="dropdown">
           
            <?php if (isset($login)): ?>
                <button type="button" class="dropbtn"><?php echo ($login["nombre"]) ?></button>
                <div class="dropdown-content">
                    <a href="./logout" id="closeSesion"></a>
                </div>
            <?php else: ?>
                <button type="button" class="dropbtn" id="homeSesion"></button>
                <div class="dropdown-content">
                    <a type='button' id="homeLogin" href="./login"></a>
                    <a type='button' id="homeRegister" href="./register"></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>