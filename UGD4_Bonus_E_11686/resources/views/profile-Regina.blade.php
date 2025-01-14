<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>profile-Regina</title>

        <!--CSS-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">`

        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!--Font Poppins-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!--Icon logo-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/Home-11686">Atmarior</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav mx-auto my-2 my-lg-0" style="flex-grow: 1; justify-content: center;">
                        <li class="nav-item" >
                        <a class="nav-link" href="/Home-11686">
                            Home 
                        </a>
                        </li>
                        <li class="nav-item" style="display: flex; flex-direction: column; align-items: center;">
                            <a class="nav-link active" aria-current="page" href="/profile-Regina" style="font-weight: bold; display: flex; flex-direction: column; align-items: center;">Profile</a>
                            <span id="underline" style="margin-top: 38px; display: flex; flex-direction: column; align-items: center;">
                        </li>
                        <li class="nav-item dropdown" style="display: flex; flex-direction: column;align-items: center;">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i id="theme-icon" class="bi bi-brightness-high-fill"></i> 
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-theme-value="dark">
                                        <i class="bi bi-moon-fill"></i> Dark Mode
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-theme-value="light">
                                        <i class="bi bi-brightness-high-fill"></i> Light Mode
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-theme-value="auto">
                                        <i class="bi bi-circle-half"></i> Default Mode
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div style="margin-top: 60px;">
            <h1 style="text-align: center; margin-bottom: 20px;">My Profile</h1>
        </div>
        <div class="container mt-10 me-4">
            <div class="row row-cols-1 row-cols-md-3 g-2">
                <div class="col">
                    <div class="card mb-3 h-100" style="max-width: 20rem; border: 1pt solid black;" id="borderfoto">
                        <img src="{{ asset('images/profile3.jpg') }}" class="card-img-top" alt="Profile 3">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?=$nama1; ?></h5>
                            <p class="card-text text-center"><?=$quotes1; ?></p>
                            <div class="d-flex justify-content-center">
                                <a href="/Home-11686">
                                    <button type="button" class="btn btn-outline-danger">Lihat Profile ></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 h-100" style="max-width: 20rem; border: 1pt solid black;" id="borderfoto2">
                        <img src="{{ asset('images/profile1.jpg') }}" class="card-img-top" alt="Profile 1">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?=$nama2; ?></h5>
                            <p class="card-text text-center"><?=$quotes2; ?></p>
                            <div class="d-flex justify-content-center">
                                <a href="/Home-11686">
                                    <button type="button" class="btn btn-outline-danger">Lihat Profile ></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 h-100" style="max-width: 20rem; border: 1pt solid black;" id="borderfoto3"> 
                        <img src="{{ asset('images/profile2.jpg') }}" class="card-img-top" alt="Profile 2">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?=$nama3; ?></h5>
                            <p class="card-text text-center"><?=$quotes3; ?></p>
                            <div class="d-flex justify-content-center">
                                <a href="/Home-11686">
                                    <button type="button" class="btn btn-outline-danger">Lihat Profile ></button>
                                </a>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </body>
    <script>
        const getStoredTheme = () => localStorage.getItem('theme');
        const setStoredTheme = theme => localStorage.setItem('theme', theme);

        const getPreferredTheme = () => {
            const storedTheme = getStoredTheme();
                return storedTheme ? storedTheme : 'auto';
        };

        const setTheme = theme => {
            let resolvedTheme = theme;
            if (theme === 'auto') {
                resolvedTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                setStoredTheme(resolvedTheme);  
            }
            document.documentElement.setAttribute('data-bs-theme', resolvedTheme);
            updateThemeIconBorder(resolvedTheme); 
        };

        const updateThemeIconBorder = (theme) => {
            const themeIcon = document.getElementById('theme-icon');
            const border_foto = document.getElementById('borderfoto');
            const border_foto2 = document.getElementById('borderfoto2');
            const border_foto3 = document.getElementById('borderfoto3');
            const underline = document.getElementById('underline');

            if (theme === 'dark') {
                themeIcon.classList.replace('bi-brightness-high-fill', 'bi-moon-fill');
                border_foto.style.border = "1pt solid white";
                border_foto2.style.border = "1pt solid white";
                border_foto3.style.border = "1pt solid white";
                underline.style.backgroundColor = "white";
                
            } else {
                themeIcon.classList.replace('bi-moon-fill', 'bi-brightness-high-fill');
                border_foto.style.border = "1pt solid black";
                border_foto2.style.border = "1pt solid black";
                border_foto3.style.border = "1pt solid black";
                underline.style.backgroundColor = "black";
            }
        };

        setTheme(getPreferredTheme());

        const showActiveTheme = (theme, focus = false) => {
            const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`);

            document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                element.classList.remove('active');
                element.setAttribute('aria-pressed', 'false');
            });

            btnToActive.classList.add('active');
            btnToActive.setAttribute('aria-pressed', 'true');

            if (focus) {
                btnToActive.focus();
            }
        };

        window.addEventListener('DOMContentLoaded', () => {
            showActiveTheme(getPreferredTheme());

            document.querySelectorAll('[data-bs-theme-value]').forEach(toggle => {
                toggle.addEventListener('click', () => {
                const theme = toggle.getAttribute('data-bs-theme-value');
                setStoredTheme(theme);
                setTheme(theme);
                showActiveTheme(theme, true);
                });
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
