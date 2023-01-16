@extends('layouts.master')
@section('content')
@can('admin')
<div id="app" v-cloak>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">DETAIL PENGUMUMAN</h2>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="table-responsive-sm">
                    <table class="table table-hover bg-white">
                        <thead>
                            <th>Status</th>
                            <th>Tanggal Dimulai</th>
                            <th>Jam Dimulai</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                                <tr>
                                    <td v-if="setting.status == 1" class="font-14"><span class="badge badge-success"> DIBUKA</span></td>
                                    <td v-if="setting.status == 0" class="font-14"><span class="badge badge-danger"> DITUTUP</span></td>
                                    <td class="font-14">@{{ setting.date }}</td>
                                    <td class="font-14">@{{ setting.time }}</td>
                                    <td><button type="button" id="btn-edit-setting" class="btn btn-info warning"
                                        data-toggle="modal" data-id="{{$setting->id}}" data-target="#editSetting">Edit</button></td>
                                </tr>
                        </tbody>
                    </table>
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
</div>
@include('setting.edit')
@endcan
@stop
@push('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script>
     $(function () {
            $(document).on('click', '#btn-edit-setting', function () {
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{url('/dashboard/setting')}}/" + id,
                    dataType: 'json',
                    success: function (res) {
                        $('#status').val(res.status);
                        $('#id').val(res.id);
                        $('#date').val(res.date);
                        $('#time').val(res.time);
                    },
                }).catch(function(error) {
                        vm.loading = false;
                        console.log(error);
                        Swal.fire(
                            'Terjadi Kesalahan!',
                            'Pastikan data terisi dengan benar.',
                            'error'
                        )
                    });
            });
        });
</script>
<script>
    new Vue({
        el: '#app',
        data: {
            setting: JSON.parse(String.raw `{!! json_encode($setting) !!}`),
        },
        methods: {


        }
    })
</script>
@endpush