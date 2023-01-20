@extends('layouts.master')
@section('content')
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Daftar Calon Mahasiswa Baru</h2>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="overview-wrap">
                            <div class="col-md-6">
                                <a href="{{ route('emailPengingat') }}" class="btn btn-info"><i
                                    class="fa fa-box"></i>
                                    Kirim Email Pengingat Pendaftaran</a>
                                </div>
                                <div class="col-md-8">
                                <form action="/dashboard/nonaktif" method="post">
                                    @method('patch')
                                    @csrf
                                    @foreach ($calonMhs as $value)
                                    @endforeach
                                    @if ($value->can_update == true)
                                        <button type="submit" name="Submit" id="Submit" class="btn btn-warning">Nonaktifkan
                                            Fungsi Edit Form Registrasi</button>
                                    @else
                                        <button type="submit" name="Submit" id="Submit" class="btn btn-danger">Aktifkan
                                            Fungsi Edit Form Registrasi</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <form id="table-form" action="/admin/fungsi-seleksi" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fa fa-warehouse"></i> Jalankan Fungsi
                                Seleksi Otomatis</button>
                            <hr />
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('export.excel') }}" class="btn btn-success" target="_blank"><i
                                        class="fa fa-file-excel"></i> Export</a>
                                    <a href="{{ route('dashboard.pdf') }}" class="btn btn-danger" target="_blank"><i
                                            class="fa fa-file-pdf"></i> Print Hasil</a>
                                    <a href="{{ route('emails.Pemberitahuan') }}" class="btn btn-light"><i
                                            class="fa fa-box"></i>
                                        Kirim Email Pengumuman Kelulusan</a>
                                </div>
                                <hr />
                            </div>
                            <table class="table table-hover bg-white" id="myTable">
                                <thead>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>Total Nilai</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @forelse($calonMhs as $item)
                                        <tr>
                                            <td>{{ $item->no_reg }}</td>
                                            <input type="hidden" value="{{ $item->no_reg }}" name="id[]">
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                @php
                                                    $ujian = $item->nilai_ujian;
                                                    $indonesia = $item->nilai_indonesia;
                                                    $nilaiIndonesia = explode(',', $indonesia);
                                                    $total_indonesia = array_sum($nilaiIndonesia);
                                                    $inggris = $item->nilai_inggris;
                                                    $nilaiinggris = explode(',', $inggris);
                                                    $total_inggris = array_sum($nilaiinggris);
                                                    $mtk = $item->nilai_mtk;
                                                    $nilaimtk = explode(',', $mtk);
                                                    $total_mtk = array_sum($nilaimtk);
                                                    $ujian = $item->nilai_ujian;
                                                    $total_nilai = $total_mtk + $total_indonesia + $total_inggris + $ujian;
                                                @endphp
                                                <input type="hidden" name="nilai[]" value="{{ $total_nilai }}"
                                                    id="">
                                                {{ $total_nilai }}
                                            </td>
                                            <td>
                                                @if ($item->lulus == 1)
                                                    <p class="badge badge-success">Lulus</p>
                                                @elseif ($item->lulus == 0)
                                                <p class="badge badge-danger">Tidak</p>
                                                @else
                                                <p class="badge badge-warning">Belum Diseleksi</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <h1>Belum ada Pendaftar</h1>
                                    @endforelse
                                </tbody>
                            </table>
                        </form>
                    </div>
                    {{-- <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div> --}}
                </div>
            </div>
        </div>
@endsection
