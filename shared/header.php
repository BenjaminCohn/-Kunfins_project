<header>
    <div class="boxshadow1">
        <div class="boxshadow2">
            <div class="boxshadow3">
                <div class="boxshadow4">
                    <div class="boxshadow5">
                        <div class="logo">
                            <img class="imgLogo" src="../css/clef-de-fa.png" alt="clé de fa" height="120px" , width="170px">
                        </div>

                        <div class="titre">
                            <h1 class="headerh1">BASS PLAYER RANKING</h1>
                        </div>
                        <nav>
                            <ul class="features">
                                <li class="feature"><a href="../index.php">
                                        <h2 class="fh2">Home</h2>
                                    </a></li>

                                <?php if ($idSession) : ?>
                                    <li class="feature">
                                        <a href="../user/profile.php">
                                            <h2 class="fh2">Profile</h2>
                                        </a>
                                    </li>
                                    <li class="feature">
                                        <a href="../Creator/selectStyle.php">
                                            <h2 class="fh2">Creation TL</h2>
                                        </a>
                                    </li>

                                <?php else : ?>
                                    <li class="feature">
                                        <a href="./login.php">
                                            <h2 class="fh2">Login</h2>
                                        </a>
                                    </li>
                                    <li class="feature">
                                        <a href=".register.php">
                                            <h2 class="fh2">Sign Up</h2>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>

                            <ul class="burger">
                                <li onclick="openNav()"><a href="#">
                                        <img class="bars" src="../css/img_like&btn/4 bars.png" alt="" height="60px" width="60px">
                                    </a></li>
                            </ul>
                            <div id="myNav" class="overlay">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <div class="overlay-content">
                                    <li class="feature"><a href="../index.php">
                                            <h2 class="fh2">Home</h2>
                                        </a></li>

                                    <?php if ($idSession) : ?>
                                        <li class="feature">
                                            <a href="../user/profile.php">
                                                <h2 class="fh2">Profile</h2>
                                            </a>
                                        </li>
                                        <li class="feature">
                                            <a href="../Creator/selectStyle.php">
                                                <h2 class="fh2">Creation TL</h2>
                                            </a>
                                        </li>

                                    <?php else : ?>
                                        <li class="feature">
                                            <a href="./login.php">
                                                <h2 class="fh2">Login</h2>
                                            </a>
                                        </li>
                                        <li class="feature">
                                            <a href="./register.php">
                                                <h2 class="fh2">Sign Up</h2>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>