<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="widht=device-width, initial-scale=1.0" />
        <title>PW4 - Halaman 1 - 220711686</title>

        <style>
            img {
                width: 150px;
            }
            legend {
                font-size: 30px;
            }
            td,
            th {
                padding: 5px;
                border: 1px solid;
            }
        </style>
    </head>
    <body>
        
        <ul style="list-style-type: square">
            <li><a href="{{ url('halaman1') }}">Profil</a></li>
            <li><a href="{{ url('halaman2') }}">Jadwal</a></li>
        </ul>
        
        <fieldset>
            <legend>Profil</legend>
            
            <hr style="border: dotted" />
            <table style="width: auto; margin: 0 auto">
                <tr>
                    <th colspan="5">kontak orang Keren</th>
                </tr>

                <tr>
                    <th>Photo</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Tanggal lahir</th>
                </tr>

                <tr>
                    <td>
                        <img src="{{asset('images/download.jpeg')}}" alt=""ini gambar 1.1" />
                    </td>
                    <td>Natania Regina Clarabella Serafina-220711686</td>
                    <td>089618492967</td>
                    <td>23-11-2003</td>
                </tr>
            </table>
        </fieldset>
    </body>
</html>