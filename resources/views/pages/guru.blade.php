@extends('layouts.master')
@section('content')
        <!-- PAGE CONTENT -->
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li class="active">Guru</li>

</ul>
<!-- END BREADCRUMB -->

{{--<div class="page-title">--}}
{{--<h2><span class="fa fa-arrow-circle-o-left"></span> Siswa</h2>--}}
{{--</div>--}}

        <!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="min-height: 600px;">

    <div id="List">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Guru</h3>
                    </div>
                    <center>
                        <div id="loader2">
                            <img src=" {!! asset('assets/img/download4.gif') !!}">
                        </div>
                    </center>
                    <br>
                    <div class="panel-body">
                        <button type="button" class="btn btn-sm btn-default" style="margin-bottom: 10px;"
                                onclick="tambah()">
                            <i class="fa fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-default" style="margin-bottom: 10px;">
                            <i class="fa fa-refresh"></i>
                        </button>
                        <div class="col-md-4 pull-right">
                            <div class="input-group">
                                <input type="text" class="form-control timepicker24">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                            </div>
                        </div>
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Bidang Study</th>
                                <th>Telp</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="row">
                            {{--looping data from ajax--}}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="Create">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Guru</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Create" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="alamat"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Study:</label>
                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="mapel" id="id_mapel">
                                            <option selected>Pilih Bidang Studi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">No Telp:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="telp"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="block" style="margin-left: 260px;">
                                    <button class="btn btn-primary" type="submit" id="Simpan">Simpan</button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-primary" onclick="index()">Kembali</button>
                                </div>
                            </form>
                        </div>
                        <!-- END VALIDATIONENGINE PLUGIN -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="Edit">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Guru</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Edit" role="form" class="form-horizontal">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="alamat"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Study:</label>
                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="mapel" id="id_mapel">
                                            <option>Pilih Bidang Studi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">No Telp:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="telp"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="block" style="margin-left: 260px;">
                                    <button class="btn btn-primary" type="submit" id="Edit">Edit</button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-primary" onclick="index()">Kembali</button>
                                </div>
                            </form>
                        </div>
                        <!-- END VALIDATIONENGINE PLUGIN -->
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
<!-- END PAGE CONTENT -->
<script type="text/javascript" src="{!! asset('assets/js/plugins/jquery/jquery.min.js') !!}"></script>
<script>
    $(document).ready(function () {
        var currentRequest = null;
        index();
        $("#Simpan").click(function (event) {

            event.preventDefault();
            var $form = $("#Form-Create"),
                    id_mapel = $form.find("select[name='mapel']").val(),
                    kode_guru = '',
                    nama = $form.find("input[name='nama']").val(),
                    alamat = $form.find("input[name='alamat']").val(),
                    telp = $form.find("input[name='telp']").val();

            var posting = $.post('/api/v1/guru', {
                id_mapel: id_mapel,
                kode_guru: kode_guru,
                nama: nama,
                alamat: alamat,
                no_hp: telp,
            });

            //Put the results in a div
            posting.done(function (data) {
                window.alert(data.result.message);
                index();
            });
        });

        $("#Form-Edit").submit(function (event) {
            event.preventDefault();
            var $form = $(this),
                    id = $form.find("input[name='id']").val(),
                    id_mapel = $form.find("select[name='mapel']").val(),
                    kode_guru = '',
                    nama = $form.find("input[name='nama']").val(),
                    alamat = $form.find("input[name='alamat']").val(),
                    telp = $form.find("input[name='telp']").val();

            currentRequest = $.ajax({
                method: "PUT",
                url: '/api/v1/guru/' + id,
                data: {
                    id_mapel: id_mapel,
                    kode_guru: kode_guru,
                    nama: nama,
                    alamat: alamat,
                    no_hp: telp,
                },
                beforeSend: function () {
                    if (currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function (data) {
                    window.alert(data.result.message);
                    index();
                },
                error: function (data) {
                    window.alert(data.result.message);
                    index();
                }
            });
        });

    })

    function tambah() {
        $('#Create').show();
        document.getElementById("Form-Create").reset();
        $('#Edit').hide();
        $('#List').hide();
        getMapel();
    }

    function Edit(id) {
        $('#Create').hide();
        $('#Edit').show();
        $('#List').hide();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        $.ajax({
                    method: "Get",
                    url: '/api/v1/guru/' + id,
                    data: {}
                })
                .done(function (data_edit) {
                    $("input[name='id']").val(data_edit.id);
                    $("input[name='id_mapel']").val(data_edit.id_mapel);
                    $("input[name='nama']").val(data_edit.nama);
                    $("input[name='alamat']").val(data_edit.alamat);
                    $("input[name='telp']").val(data_edit.no_hp);
                    $.getJSON("/api/v1/list-mapel", function (data) {
                        var jumlah = data.length;
                        $.each(data.slice(0, jumlah), function (i, data) {
                            if (data_edit.mapel.id == data.id) {
                                $("select[name='mapel']").append("<option value='" + data.id + "' selected>" + data.mapel + "</option>");
                            }
                            else {
                                $("select[name='mapel']").append("<option value='" + data.id + "'>" + data.mapel + "</option>");
                            }
                        })
                    })
                });
    }

    function index() {
        $('#Create').hide();
        $('#Edit').hide();
        $('#List').show();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        getAjax();
    }

    function getMapel() {
        $('#list_mapel').children().remove();
        $.getJSON("/api/v1/list-mapel", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_mapel").append("<option value='" + data.id + "'>" + data.mapel + "</option>")
            })
        })
    }

    function Hapus(id) {
        var result = confirm("Apakah Anda Yakin Ingin Menghapus ?");
        if (result) {
            $.ajax({
                        method: "DELETE",
                        url: '/api/v1/guru/' + id,
                        data: {}
                    })

                    .done(function (data) {
                        window.alert(data.result.message);
                        getAjax();
                    });

        }
    }

    //    function Detail(id) {
    //        $("#modal-body").children().remove();
    //        $.ajax({
    //            method: "Get",
    //            url: '/obat/' + id,
    //            data: {},
    //            beforeSend: function () {
    //                $('#loader-wrapper').show();
    //            },
    //            success: function (data) {
    //
    //                $("#loader-wrapper").hide();
    //                $("#modal-body").append("<tr><td>Nama Apoteker</td><td>: </td><td>" + data.apoteker.name + "</td></tr>" +
    //                        "<tr><td>Alamat</td><td> : </td><td>" + data.apoteker.alamat + "</td></tr>" +
    //                        "<tr><td>Nama Obat</td><td> : </td><td>" + data.nama_obat + "</td></tr>" +
    //                        "<tr><td>Harga</td><td> : </td><td>" + data.harga + "</td></tr>"
    //                );
    //            }
    //        });
    //    }

    function getAjax() {
        $("#row").children().remove();

        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/guru", function (data) {
//                console.log(data);
                var jumlah = data.data.length;
                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.nama + "</td>" +
                            "<td>" + data.alamat + "</td>" +
                            "<td>" + data.mapel.mapel + "</td>" +
                            "<td>" + data.no_hp + "</td>" +
                            "<td>" +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button>" +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }
</script>
@endsection()