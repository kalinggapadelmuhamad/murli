<!DOCTYPE html>
<html>

    <head>
        <title>Pemesanan Berhasil</title>
    </head>

    <body>
        <h1>Pemesanan Berhasil</h1>
        <p>Terima kasih telah melakukan request survei. Berikut klik link berikut untuk melihat detail request survei
            Anda :
            <a href="{{ route('detailSurvei.index', $survei) }}">Detail Request Survei</a>
        </p>
    </body>

</html>
