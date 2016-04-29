@extends('layouts.master')
@section('content')
        <!-- PAGE CONTENT -->
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li class="active">Kelas</li>
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
                        <h3 class="panel-title">Daftar Kelas</h3>
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
                        {{--<form role="form">--}}
                        {{--<input type="text" name="search" placeholder="Search..."/>--}}
                        {{--</form>--}}

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
                                <th>Kelas</th>
                                <th>Jumlah Siswa</th>
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
                        <h3 class="panel-title">Tambah Kelas</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Create" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="kelas"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jurusan:</label>
                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="jurusan" id="id_jurusan">
                                            <option>Pilih Jurusan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jumlah Siswa:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="jml"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="block" style="margin-left: 260px;">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
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
                        <h3 class="panel-title">Edit Kelas</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Edit" role="form" class="form-horizontal">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="kelas"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jurusan:</label>
                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="jurusan" id="id_jurusan">
                                            <option>Pilih Jurusan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jumlah Siswa:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="jml"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="block" style="margin-left: 260px;">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
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
                    id_jurusan = $form.find("select[name='jurusan']").val(),
                    kelas = $form.find("input[name='kelas']").val(),
                    jml = $form.find("input[name='jml']").val();

            var posting = $.post('/api/v1/kelas', {
                id_jurusan: id_jurusan,
                kelas: kelas,
                jml: jml,
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
                    id_jurusan = $form.find("select[name='jurusan']").val(),
                    kelas = $form.find("input[name='kelas']").val(),
                    jml = $form.find("input[name='jml']").val();

            currentRequest = $.ajax({
                method: "PUT",
                url: '/api/v1/kelas/' + id,
                data: {
                    id: id,
                    id_jurusan: id_jurusan,
                    kelas: kelas,
                    jml: jml,
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
        getJurusan();
    }

    function Edit(id) {
        $('#Create').hide();
        $('#Edit').show();
        $('#List').hide();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        $.ajax({
                    method: "Get",
                    url: '/api/v1/kelas/' + id,
                    data: {}
                })
                .done(function (data_edit) {
                    $("input[name='id']").val(data_edit.id);
                    $("input[name='kelas']").val(data_edit.kelas);
                    $("input[name='jml']").val(data_edit.jml);
                    $.getJSON("/api/v1/list-jurusan", function (data) {
                        var jumlah = data.length;
                        $.each(data.slice(0, jumlah), function (i, data) {
                            if (data_edit.jurusan.id == data.id) {
                                $("select[name='jurusan']").append("<option value='" + data.id + "' selected>" + data.jurusan + "</option>");
                            }
                            else {
                                $("select[name='jurusan']").append("<option value='" + data.id + "'>" + data.jurusan + "</option>");
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

    function getJurusan() {
        $('#list_jurusan').children().remove();
        $.getJSON("/api/v1/list-jurusan", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_jurusan").append("<option value='" + data.id + "'>" + data.jurusan + "</option>")
            })
        })
    }

    function Hapus(id) {
        var result = confirm("Apakah Anda Yakin Ingin Menghapus ?");
        if (result) {
            $.ajax({
                        method: "DELETE",
                        url: '/api/v1/kelas/' + id,
                        data: {}
                    })

                    .done(function (data) {
                        window.alert(data.result.message);
                        getAjax();
                    });

        }
    }
    function getAjax() {
        $("#row").children().remove();

        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/kelas", function (data) {
                var jumlah = data.data.length;
                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.kelas + " " + data.jurusan.jurusan + "</td>" +
                            "<td>" + data.jml + "</td>" +
                            "<td><button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }
</script>

@endsection()