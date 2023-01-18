@if($pendaftar->lulus == 1)
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

<table border="0" width="100%">
    
</table>
<br>

<body>
    {{-- <h4 align="center" style="margin-top:0px;"><u>{{ $school->nama_surat }}</u> --}}
        <h4 align="center" style="margin-top:0px;"><u>Ini Nama Surat</u>
        {{-- <p>Nomor: {{ $school->no_surat }}</p> --}}
        <p>Nomor: Ini Nomor Surat</p>
    </h4>


    <br>
    {{-- <p>{{ $school->pembuka_surat }}</p> --}}
    <p>Ini Pembuka Surat</p>
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
    Yang Bersangkutan dinyatakan :
    <center>
        <table style="border: 1px solid black;">

            <td>
                <p><i><b> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;LULUS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</b></i></p>
            </td>

        </table>
    </center>
    <br>
    {{-- <p>{{ $pendaftar->}}</p> --}}
    {{-- tempat kalimat penutup --}}
    <br>
    <br>
    <br>
    <br>

    
    <br><br><br><br><br><br><br><br><br><br>



</body>
@else
ANDA TIDAK BISA CETAK KARTU
@endif