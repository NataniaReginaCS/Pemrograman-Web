<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="widht=device-width, initial-scale=1.0" />
        <title>PW4 - Halaman 2 - Natania Regina Clarabella Serafina</title>

        <style>
            legend{
                font-size: 30px;
            }
            td, th{
                padding: 5px;
                text-align: center;
                border: 1px solid;
            }
            .sesi{
                background-color: bisque;
            }
        </style>
    </head>
    <body>
        <ul style="list-style-type: square">
            <li><a href="{{ url('halaman1') }}">Profil</a></li>
            <li><a href="{{ url('halaman2') }}">Jadwal</a></li>
        </ul>
        <fieldset>
            <legend>Schedule</legend>
            <ht style="border: dotted;" />
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th colspan="6" style="background-color: rgb(230, 171, 84);">
                        Jadwal Kuliah
                    </th>
                </tr>
                <tr>
                    <th>Sesi</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td class="sesi">Pemrograman Web</td>
                    <td></td>
                    <td class="sesi">Manajemen Proyek Perangkat Lunak</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                    <td class="sesi">Peretasan Etis</td>
                    <td></td>
                    <td class="sesi">Penjaminan Mutu Perangkat Lunak</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td></td>
                    <td class="sesi">Teknik Penambangan Data</td>
                    <td></td>
                    <td class="sesi">Pemrograman Berbasis Platform</td>
                    <td></td>
                </tr>

                <tr>
                    <td>4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="sesi">Pemrograman Berbasis Platform</td>
                    <td></td>
                </tr>

            </table>
        </fieldset>
    </body>
</html>