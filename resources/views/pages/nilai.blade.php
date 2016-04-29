@extends('layouts.master')
@section('content')
        <!-- PAGE CONTENT -->
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li class="active">Nilai Siswa</li>
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
                        <h3 class="panel-title">Daftar Penilaian Siswa</h3>
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
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Bidang Study</th>
                                <th>Nilai Tugas</th>
                                <th>Nilai UTS</th>
                                <th>Nilai UAS</th>
                                <th>Nilai Akhir</th>
                                <th>Keterangan</th>
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
                        <h3 class="panel-title">Tambah Daftar Nilai</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Create" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>
                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="kelas" id="id_kelas"
                                                onchange="getSiswa()">
                                            <option>Pilih Kelas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama:</label>
                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="siswa" id="id_siswa">
                                            <option>Pilih Nama Siswa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Study:</label>
                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="mapel" id="id_mapel">
                                            <option>Pilih Bidang Study</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai Tugas:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tugas"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai UTS:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="uts"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai UAS:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="uas"
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
                        <h3 class="panel-title">Edit Daftar Nilai</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Edit" role="form" class="form-horizontal">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="siswa"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="kelas"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Studi:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="mapel"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai Tugas:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tugas"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai UTS:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="uts"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai UAS:</label>
                                    <div class="col-md-6">
                                        <input type="text" name="uas"
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
                    siswa = $form.find("select[name='siswa']").val(),
                    kelas = $form.find("select[name='kelas']").val(),
                    mapel = $form.find("select[name='mapel']").val(),
                    tugas = $form.find("input[name='tugas']").val(),
                    uts = $form.find("input[name='uts']").val(),
                    uas = $form.find("input[name='uas']").val(),
                    akhir = $form.find("input[name='akhir']").val();

            var posting = $.post('/api/v1/nilai', {
                        id_siswa: siswa,
                        id_mapel: mapel,
                        n_tugas: tugas,
                        n_uts: uts,
                        n_uas: uas,
                        n_akhir: akhir,
                    })
                    ;

            //Put the results in a div
            posting.done(function (data) {
                //console.log(data);
                window.alert(data.result.message);
//                getAjax();
                index();
            });
        });

        $("#Form-Edit").submit(function (event) {
            event.preventDefault();
            var $form = $(this),
                    id = $form.find("input[name='id']").val(),
                    tugas = $form.find("input[name='tugas']").val(),
                    uts = $form.find("input[name='uts']").val(),
                    uas = $form.find("input[name='uas']").val();

            currentRequest = $.ajax({
                method: "PUT",
                url: '/api/v1/nilai/' + id,
                data: {
                    n_tugas: tugas,
                    n_uts: uts,
                    n_uas: uas,

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
//        getSiswa();
        getKelas();
        getMapel();
    }

    function index() {
        $('#Create').hide();
        $('#Edit').hide();
        $('#List').show();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        getAjax();
    }

    function Edit(id) {
        $('#Create').hide();
        $('#Edit').show();
        $('#List').hide();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        $.ajax({
                    method: "Get",
                    url: '/api/v1/nilai/' + id,
                    data: {}
                })
                .done(function (data_edit) {
                    $("input[name='id']").val(data_edit.id);
                    $("input[name='siswa']").val(data_edit.siswa.nama);
                    $("input[name='kelas']").val(data_edit.siswa.kelas.kelas + ' ' + data_edit.siswa.kelas.jurusan.jurusan);
                    $("input[name='mapel']").val(data_edit.mapel.mapel);
                    $("input[name='tugas']").val(data_edit.n_tugas);
                    $("input[name='uts']").val(data_edit.n_uts);
                    $("input[name='uas']").val(data_edit.n_uas);
                });
    }

    function getAjax() {
        $("#row").children().remove();

        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/nilai", function (data) {
//                console.log(data);
                var jumlah = data.data.length;
                $.each(data.data.slice(0, jumlah), function (i, data) {
                    if (data.n_akhir >= data.mapel.kkm) {
//                        var ket = "Lulus";
                        $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td>" +
                                "<td>" + data.mapel.mapel + "</td>" +
                                "<td>" + data.n_tugas + "</td>" +
                                "<td>" + data.n_uts + "</td>" +
                                "<td>" + data.n_uas + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-info label-form'>Lulus</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button>" +
                                "</td></tr>");
                    }
                    else {
                        $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td>" +
                                "<td>" + data.mapel.mapel + "</td>" +
                                "<td>" + data.n_tugas + "</td>" +
                                "<td>" + data.n_uts + "</td>" +
                                "<td>" + data.n_uas + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-danger label-form'>Remidi</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button>" +
                                "</td></tr>");
                    }

                })
            });
        }, 2200);
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

    function getKelas() {
        $('#list_kelas').children().remove();
        $.getJSON("/api/v1/list-kelas", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_kelas").append("<option value='" + data.id + "'>" + data.kelas + " " + data.jurusan.jurusan + "</option>")
            })
        })
    }

    function getSiswa() {
        var $form = $("#Form-Create"),
                kelas = $form.find("select[name='kelas']").val();
        $('#id_siswa').children().remove();
        $.getJSON("/api/v1/list-siswa-by-kelas/" + kelas, function (data) {
            var jumlah = data.length;
            $("#id_siswa").append("<option> Pilih Nama Siswa </option>")
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_siswa").append("<option value='" + data.id + "'>" + data.nama + "</option>")
            })
        })
    }


</script>
@endsection()