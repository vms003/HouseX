<header class="header">
        <!-- Menu Button -->
        <div class="menu-btn">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <nav class="navbar">
            <section class="flex">
                <a href="home.php" class="logo">
                    <img src="../images/logo.png" alt="">
                    <h1>HouseX</h1>
                </a>
                <div class="menu">
                    <ul >
                        <li class="n1"><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"><i class="fas fa-user"></i> For Owner</a>
                            <ul class="submenu">
                                <li><a href="dashboard.php"><i class="fas fa-chart-bar"></i> Dashboard</a></li>
                                <li><a href="post_property.php"><i class="fas fa-plus-circle"></i> Post Property</a></li>
                                <li><a href="my_listings.php"><i class="fas fa-list"></i> My Listings</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"><i class="fas fa-search"></i> For Buyers</a>
                            <ul class="submenu">
                                <li><a href="search.php"><i class="fas fa-filter"></i> Filter Search</a></li>
                                <li><a href="listings.php"><i class="fas fa-list-alt"></i> All Listings</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"><div class="n1"><i class="fas fa-question-circle"></i> Help</div></a>
                            <ul class="submenu">
                                <li><a href="about.php"><i class="fas fa-info-circle"></i> About Us</a></li>
                                <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a></li>
                                <li><a href="contact.php#faq"><i class="fas fa-question"></i> FAQ</a></li>
                            </ul>
                        </li>
                        <li><a href="saved.php"><i class="far fa-heart"></i> <div class="n2">Saved Property</div></a></li>
                        <li><a href="post_property.php"><i class="fas fa-plus"></i> Post Property</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle"><div class="n1"><i class="fas fa-user-circle"></i> Account</div></a>
                            <ul class="submenu">
                                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login Now</a></li>
                                <li><a href="register.php"><i class="fas fa-user-plus"></i> Register</a></li>
                                <?php if($user_id != ''){ ?>
                                <li><a href="update.php"><i class="fas fa-user-edit"></i> Update Profile</a></li>
                                <li><a href="components/user_logout.php" onclick="return confirm('Logout from this website?');"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </section>
        </nav>
    </header>
    <!-- Header section ends -->

    <!-- Your other content goes here -->

    <script>
        const menuBtn = document.querySelector('.menu-btn');
        const menu = document.querySelector('.menu');

        menuBtn.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    </script>
