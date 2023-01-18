@if($pendaftar->lulus == 1)
<html>
<style>
    @media print {

        .printme,
        .printme * {
            visibility: visible;
        }

        html,
        body {
            height: auto;
            font-size: 10pt;
        }

        @page {

            margin: 20px;

        }

        @media screen {
            div.divFooter {
                display: none;
            }
        }

        @media print {
            div.divFooter {
                position: fixed;
                bottom: 0;
            }
        }
    }
</style>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<table border="0" width="100%">
    <tr>
        <td align="center">
            <img src="img/k.png" alt="logo2" width="70">
        </td>
        <td align="center">
            <b style="font-size:28px; text-transform: uppercase;">{{ $kampuses->kop_nama_kampus }}</b> <br>
            <b style="font-size:19px; text-transform: uppercase;">TAHUN PELAJARAN {{ $kampuses->kop_th_pelajaran }}</b>
        </td>
        <td align="center">
            <img src="img/k.png" alt="logo2" width="70">
        </td>
    </tr>
    <tr>
        <td colspan="3" align="center" style="font-size:15px;">
            Alamat : {{ $kampuses->kop_alamat }} &nbsp; &nbsp;{{ $kampuses->kop_telepon }}
            &nbsp;{{ $kampuses->kop_pos }}
            <br>
            Website : {{ $kampuses->kop_website }} e-mail : {{ $kampuses->kop_email }}
        </td>
    </tr>
    <tr>
        <td colspan="3" align="center">
            <hr size="0" color="black" style="margin:0px;margin-bottom:1px;">
            <hr size="2" color="black" style="margin:0px;">
        </td>
    </tr>

</table>
<br>

<body>
    <h4 align="center" style="margin-top:0px;"><u>{{ $kampuses->nama_surat }}</u>
        <p>Nomor: {{ $kampuses->no_surat }}</p>
    </h4>


    <br>
    <p>{{ $kampuses->pembuka_surat }}</p>

    <br>

    <table width="100%" border="0">

        <tr>
            <td width="200">NO Regristrasi</td>
            <td width="1">:</td>
            <td>{{ $pendaftar->no_reg }}</td>
        </tr>
        <tr>
            <td>NAMA LENGKAP</td>
            <td>:</td>
            <td>{{ $pendaftar->nama }}</td>
        </tr>

        <tr>
            <td>Tempat, Tanggal lahir</td>
            <td>:</td>
            <td>{{ $pendaftar->tempat_lahir }},&nbsp;{{ $pendaftar->tanggal_lahir }}</td>
        </tr>
        <tr>
            <td >Nama Orangtua</td>
            <td >:</td>
            <td>{{ $pendaftar->nama_ibu }}</td>
        </tr>
        
        <tr>
            <td >Asal Sekolah</td>
            <td >:</td>
            <td>{{ $pendaftar->asal_sekolah }}</td>
        </tr>
        <tr>
            <td >Jurusan</td>
            <td >:</td>
            <td>{{ $pendaftar->jurusan->nama_jurusan }}</td>
        </tr>


    </table>
    <br>
    <br>
    <div class="text-align-center" >
        Yang Bersangkutan dinyatakan :
        <br>
        <div class="row">
           <div class="col m-12">
            <center>
                <table style="border: 1px solid black;">
        
                    <td>
                        <p><i><b> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;LULUS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</b></i></p>
                    </td>
        
                </table>
            </center>
           </div>
           
        </div>
    </div>
    
    <br>
    <p>{{ $kampuses->penutup_surat}}</p>
    <br>
    <br>
    <br>
    <br>
    <div style="float:right;">
        {{ $kampuses->tempat }}, {{ $kampuses->tanggal }} <br>
        {{ $kampuses->jabatan_penandatangan }}, <br>
        <img src="/files/ttd/{{ $kampuses->tanda_tangan}}" alt="" width="100"><br>
        <br>

        <b><u>{{ $kampuses->nama_penandatangan }}</u></b><br>
        NIP. {{ $kampuses->nip_penandatangan }}
    </div>
    
    <br><br><br><br><br><br><br><br><br><br>



</body>
</html>
@else
ANDA TIDAK BISA CETAK KARTU
@endif