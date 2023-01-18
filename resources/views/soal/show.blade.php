<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Pendaftaran Mahasiswa Baru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
{{-- header belum lengkap --}}

<body>
    <div class="container p-3 my-3 border">
        <p class="float-right" id="demo"></p>
        <h1>Soal</h1>
        <form id="form" method="post" action="{{ route('soal.submit') }}">
            @csrf
            @include('layouts.soalLayout')
            <hr />
            <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
              var detik = 0; // Jumlah Detik Waktu Hitung Mundur
              var menit = '{{$waktu->menit}}' / 60; // Jumlah Menit Waktu Hitung Mundur
              function hitung() {
                setTimeout(hitung,1000);
                $('#demo').html( ' Sisa Waktu ' + menit + ' menit ' + detik + ' detik lagi.');
                detik --;
                if(detik < 0) {
                  detik = 59;
                  menit --;
                  if(menit < 0) {
                    menit = 0;
                    detik = 0;
                    document.getElementById('form').submit();
                  }
                }
              }
            hitung();
            });
        </script>
        <script type="text/javascript"> 
        history.pushState(null, null, location.href); 
        window.onpopstate = function () { 
          history.go(1);

        }; </script>

</body>

</html>
