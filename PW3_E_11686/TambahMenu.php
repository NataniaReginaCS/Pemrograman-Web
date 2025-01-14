    <?php
    session_start();

    $detail = [
        "name" => "Atma Kitchen",
        "tagline" => "Restaurant & Bar",
        "page_title" => "Atma Kitchen Restaurant & Co",
        "logo" => "./assets/images/HatCook.png",
        "user" => " Natania Regina Clarabella Serafina/220711686"
    ];



    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title><?php echo $detail["page_title"]; ?></title>
            <meta name="viewport" content="width= device-width, initial-scale=1.0" />

            <!-- Icon Tab-->
            <link rel="icon" href="<?php echo $detail["logo"]; ?> " type="image/x-icon" />

            <!--Bootstrap 5.3 CSS-->
            <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

            <!--Poppins dari Google Fonts-->
            <link rel="preconnect" href="https://fonts.googleapis.com">=
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="./assets/css/poppins.min.css" rel="stylesheet">

            <!--Custom CSS-->
            <link rel="stylesheet" href="./assets/css/style.css" />
        
            <!-- Link to Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

            <style>
                #formAuth {
                    max-width : 100%;
                    margin: 0 auto;
                }
            </style>    
        </head>
        <body>
            <header class="fixed-top scrolled" id="navbar">
                <nav class="container nav-top py-2">
                    <a href="./" class="rounded py-2 px-3 d-flex align-items-center nav-home-btn " style="background-color: #EE4D2D;">
                        <img src="<?php echo $detail['logo']; ?>" class="crown-logo" />
                        <div>
                            <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                            <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                        </div>
                    </a>

                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a href="./" class="nav-link text" style="color: #EE4D2D;">Home</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a href="#" class="nav-link active text-white" aria-current="page" style="background-color: #EE4D2D;">Admin Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="./processLogout.php" class="nav-link text-danger">Logout</a>
                        </li>  
                    </ul>
                </nav>
            </header>
            <main style="padding-top: 84px;" class="container">
                <h1 style="font-size: 45px"><strong>Tambah Menu</strong></h1>
                <hr />

                <!--https://getbootstrap.com/docs/4.3/components/forms/-->
                <form  action="./prosesTambahMenu.php" method="POST" id="formAuth" enctype="multipart/form-data">
                    <div class="form-group row" style="padding-bottom: 5px;">
                        <label for="inputdate" class="col-sm-2 col-form-label" >Tanggal Pemesanan</label>
                        <div class="col-sm-10" style="padding-left: 200px;">
                            <input type="date" class="form-control" id="inputdate" placeholder="mm/dd/yyyy" name="tglPemesanan" required>
                        </div>
                    </div>
                    <div class="form-group row" style="padding-bottom: 5px;">
                        <label for="inputmenu" class="col-sm-2 col-form-label" >Menu yang Dipesan</label>
                        <div class="col-sm-10" style="padding-left: 200px;">
                            <select class="form-select" id="selectOption" name="menuPaket" required>
                                <option value="">Pilih Menu Paket</option>
                                <option value="1">Paket 1</option>
                                <option value="2">Paket 2</option>
                                <option value="3">Paket 3</option>
                                <option value="4">Paket 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" style="padding-bottom: 5px;">
                        <label for="inputbiaya" class="col-sm-2 col-form-label" >Biaya Pemesanan</label>
                        <div class="col-sm-10" style="padding-left: 200px;">
                            <input type="text" class="form-control" id="inputbiaya" placeholder="Biaya Pemesanan(Rp)" name="biayaPemesanan" required>
                        </div>
                    </div>
                    <div class="form-group row" style="padding-bottom: 5px;">
                        <label for="inputTextarea" class="col-sm-2 col-form-label">Catatan Menu</label>
                        <div class="col-sm-10" style="padding-left: 200px;" >
                            <textarea class="form-control" id="inputTextarea" rows="4" placeholder="catatanMenu" name="catatanMenu" required></textarea>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" style="border: none; background-color: #ee4d2d">
                            <i class="fa-solid fa-floppy-disk" style="color: white; padding-right: 10px;"></i>Simpan
                        </button>
                        <!--Kita mengirimkan "menambah-list" ke form sebagai indikator bahwa user sudah menambah list-->
                        <input type="hidden" name="menambah_list" value="1" />
                    </div>
                </form>
            </main>
    </html>