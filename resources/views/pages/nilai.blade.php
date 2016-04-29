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
                                    <label class="col-md-3 control-label">Nama:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nama"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="kelas"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Study:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="mapel"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai Tugas:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="tugas"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai UTS:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="uts"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai UAS:</label>
                                    <div class="col-md-8">
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
                                    <div class="col-md-8">
                                        <input type="text" name="nama"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="kelas"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Study:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="mapel"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai Tugas:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="tugas"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai UTS:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="uts"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nilai UAS:</label>
                                    <div class="col-md-8">
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
                    nama = $form.find("input[name='nama']").val(),
                    kelas = $form.find("input[name='kelas']").val(),
                    mapel = $form.find("input[name='mapel']").val(),
                    tugas = $form.find("input[name='tugas']").val(),
                    uts = $form.find("input[name='uts']").val(),
                    uas = $form.find("input[name='uas']").val(),
                    akhir = $form.find("input[name='akhir']").val();

            var posting = $.post('/api/v1/nilai', {
                        nama: nama,
                        kelas: kelas,
                        mapel: mapel,
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
    })
    function tambah() {
        $('#Create').show();
        document.getElementById("Form-Create").reset();
        $('#Edit').hide();
        $('#List').hide();
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
                    $("input[name='nama']").val(data_edit.nama);
                    $("input[name='kelas']").val(data_edit.kelas);
                    $("input[name='mapel']").val(data_edit.mapel);
                    $("input[name='n_tugas']").val(data_edit.n_tugas);
                    $("input[name='n_uts']").val(data_edit.n_uts);
                    $("input[name='n_uas']").val(data_edit.n_uas);
                    $("input[name='n_akhir']").val(data_edit.n_akhir);
                    $.getJSON("/api/v1/list-nilai", function (data) {
                        var jumlah = data.length;
                        $.each(data.slice(0, jumlah), function (i, data) {
                            if (data_edit.mapel.id == data.id) {
                                $("select[name='nilai']").append("<option value='" + data.id + "' selected>" + data.nama + "</option>");
                            }
                            else {
                                $("select[name='nilai']").append("<option value='" + data.id + "'>" + data.nama + "</option>");
                            }
                        })
                    })
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
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.siswa.nis + "</td>" +
                            "<td>" + data.siswa.nama + "</td>" +
                            "<td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td>" +
                            "<td>" + data.mapel.mapel + "</td>" +
                            "<td>" + data.n_tugas + "</td>" +
                            "<td>" + data.n_uts + "</td>" +
                            "<td>" + data.n_uas + "</td>" +
                            "<td>" + data.n_akhir + "</td>" +
                            "<td>" +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button>" +
                            "</td></tr>");
                })
            });
        }, 2200);
    }

    function getMapel() {
        $('#list_mapel').children().remove();
        $.getJSON("/api/v1/list-mapel", function (data) {
            var jumlah = data.length;
//            $("#id_apoteker").append("<option selected>pilih nama apoteker</option>");
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_apoteker").append("<option value='" + data.id + "'>" + data.name + "</option>")
            })
        })
    }

</script>
@endsection()