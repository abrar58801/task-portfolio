<body>

    <!-- menu -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="./">
            <?php 
            $logo = @$select_website_setting[0]['logo'] ? "./upload/".@$select_website_setting[0]['logo'] : "./assets/images/mylogo.png";
            ?>
                <img src="<?= $logo ?>" alt="Abrar Ahmad" class="img-fluid logo"
                    style="height: 40px; padding-left: 10px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php#project">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- menu -->
