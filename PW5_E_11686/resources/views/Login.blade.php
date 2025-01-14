<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content= "width=device-width, initial-scale=1" >
    <title>Login</title>

    <!-- Fonts -->
    <link rel= "preconnect" href="https://fonts.bunny.net" >
    <link href= "https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel= "stylesheet" integrity= "sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
</head>

<body class="antialiased">
    <style>
        body {
            font-family: 'Figtree', Helvetica, Arial, sans-serif;
        }

        section {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .background-animation {
            background: linear-gradient(-45deg, #00c3ff, #ffff1c, #ff1cf0, #1cff73);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.8) !important;
            backdrop-filter: saturate(150%) blur(30px);
        }
    </style>

    <section class="background-animation">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl (207, 91%, 95%)">
                        Primefit Indonesia<br />
                    <span style="color: hsl(207, 91%, 75%)">Transform Your Life Today</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(207, 91%, 85%); text-align: justify">
                        Ingin merasakan perubahan nyata dalam gaya hidup dan kesehatan Anda? Di Primefit Indonesia, kami menyediakan program kebugaran yang dirancang untuk membantu Anda mencapai 
                        kondisi fisik terbaik.
                    </p>
                    <p class="mb-4 opacity-70" style="color: hsl(207, 91%, 85%); text-align: justify;">
                        Dengan fasilitas modern dan instruktur profesional, Anda bisa berlatih dengan cara yang lebih efisien dan aman. Apakah tujuan Anda adalah menambah massa otot, 
                        menurunkan berat badan, atau meningkatkan kebugaran secara keseluruhan, kami siap mendukung setiap langkah Anda. Mari bergabung dan rasakan kebersamaan dalam mencapai 
                        tujuan fitness Anda!
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form class="form" action="{{ url('gyms/index') }}"> 
                                @csrf
                                <div>
                                    <h4 class="mb-3 text-center">LOGIN</h4>
                                </div>

                                <!-- Nama Input -->
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="floatingInput" 
                                        placeholder="Nama Pegawai" required>
                                    <label for="floatingInput">Nama Pegawai</label>
                                </div>

                                <!-- Password -->
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" 
                                        placeholder="Password" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                                
                                <!-- Submit button -->
                                <button type="submit" style="width: 100%;" 
                                    class="btn btn-primary btn-block mb-2 mt-3">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh950GNyZPhcTNXj1NW7RuBcsyN/0oj1pcV8Qyq46cDFL"
        crossorigin="anonymous"></script>
</body>
</html>