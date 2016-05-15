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
                                onclick="getAjax();">
                            <i class="fa fa-refresh"></i>
                        </button>
                        <div class="input-group col-md-3 push-down-10 pull-right">
                            <input type="text" class="form-control" placeholder="Keywords..." id="search"/>

                            <div class="input-group-btn">
                                <button class="btn btn-primary" onclick="getData(1)"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3 push-down-10 pull-right">
                            <select class="form-control" style="" name="kelas" id="kelas">
                                <option value="">Pilih kelas</option>
                            </select>
                        </div>
                        <div class="col-md-3 push-down-10 pull-right">
                            <select class="form-control" style="" name="mapel" id="id_mapel">
                                <option value="">Pilih Bidang Studi</option>
                            </select>
                        </div>
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Bidang Study</th>
                                <th>Nilai Akhir</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>

                            </tr>
                            </thead>
                            <tbody id="row">
                            {{--looping data from ajax--}}
                            </tbody>
                        </table>

                        <div id="pagination">
                            {{--Pagination goes here--}}
                        </div>
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
                                        <select class="form-control select kelas" style="" name="kelas"
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
                                               class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="kelas"
                                               class="form-control" readonly/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Studi:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="mapel"
                                               class="form-control" readonly/>
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

{{--Detail--}}
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal Content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>
                    <fond face="Bernard MT">Detail Nilai Siswa</fond>
                </h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody id="modal-body">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
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
        $("#search").val('');
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        getAjax();
        getKelas();
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

    function Detail(id) {
        $("#modal-body").children().remove();
        $.ajax({
            method: "Get",
            url: '/api/v1/nilai/' + id,
            data: {},
            beforeSend: function () {
//                $('#loader-wrapper').show();
            },
            success: function (data) {
//                $("#loader-wrapper").hide();
                if (data.n_akhir >= data.mapel.kkm) {
                    $("#modal-body").append("<tr><td> NIS </td><td>: </td><td>" + data.siswa.nis + "</td></tr>" +
                            "<tr><td> Nama </td><td> : </td><td>" + data.siswa.nama + "</td></tr>" +
                            "<tr><td> Kelas </td><td> : </td><td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td></tr>" +
                            "<tr><td> Bidang Studi </td><td> : </td><td>" + data.mapel.mapel + "</td></tr>" +
                            "<tr><td> KKM </td><td> : </td><td>" + data.mapel.kkm + "</td></tr>" +
                            "<tr><td> Nilai Tugas </td><td> : </td><td>" + data.n_tugas + "</td></tr>" +
                            "<tr><td> Nilai UTS </td><td> : </td><td>" + data.n_uts + "</td></tr>" +
                            "<tr><td> Nilai UAS </td><td> : </td><td>" + data.n_uas + "</td></tr>" +
                            "<tr><td> Nilai Akhir </td><td> : </td><td>" + data.n_akhir + "</td></tr>" +
                            "<tr><td> Keterangan </td><td> : </td><td><span class='label label-info label-form'>Lulus</span></td></tr>"
                    );
                }
                else {
                    $("#modal-body").append("<tr><td> NIS </td><td>: </td><td>" + data.siswa.nis + "</td></tr>" +
                            "<tr><td> Nama </td><td> : </td><td>" + data.siswa.nama + "</td></tr>" +
                            "<tr><td> Kelas </td><td> : </td><td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td></tr>" +
                            "<tr><td> Bidang Studi </td><td> : </td><td>" + data.mapel.mapel + "</td></tr>" +
                            "<tr><td> KKM </td><td> : </td><td>" + data.mapel.kkm + "</td></tr>" +
                            "<tr><td> Nilai Tugas </td><td> : </td><td>" + data.n_tugas + "</td></tr>" +
                            "<tr><td> Nilai UTS </td><td> : </td><td>" + data.n_uts + "</td></tr>" +
                            "<tr><td> Nilai UAS </td><td> : </td><td>" + data.n_uas + "</td></tr>" +
                            "<tr><td> Nilai Akhir </td><td> : </td><td>" + data.n_akhir + "</td></tr>" +
                            "<tr><td> Keterangan </td><td> : </td><td><span class='label label-danger label-form'>Remidi</span></td></tr>"
                    );
                }
            }
        });
    }

    function Hapus(id) {
        var result = confirm("Apakah Anda Yakin Ingin Menghapus ?");
        if (result) {
            $.ajax({
                method: "DELETE",
                url: '/api/v1/nilai/' + id,
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
        $("#pagination").children().remove();
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/nilai", function (data) {
//                console.log(data);
                var jumlah = data.data.length;

                // Init pagination
                $("#pagination").append("<ul class='pagination pagination-sm'><li class='disabled'><a href='#'>&laquo;</a></li></ul>");

                if (data.last_page > 1) {
                    for (var i = 1; i <= data.last_page; i++) {
                        if (data.current_page == i) {
                            $(".pagination-sm").append("<li class='active'><a href='#'>" + i + " </a></li>");
                        }
                        else {
                            $(".pagination-sm").append("<li><a onclick='getData(" + i + ")'> " + i + " </a></li>");
                        }
                    }
                }
                else {
                    $(".pagination-sm").append("<li class='active'><a href='#'>1</a></li>");
                }

                $(".pagination-sm").append("<li class='disabled'><a href='#'>&raquo;</a></li>");

                $.each(data.data.slice(0, jumlah), function (i, data) {
                    if (data.n_akhir >= data.mapel.kkm) {
//                        var ket = "Lulus";
                        $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td>" +
                                "<td>" + data.mapel.mapel + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-info label-form'>Lulus</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' onclick='Detail(\"" + data.id + "\")'><i class='fa fa-eye'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button>" +
                                "</td></tr>");
                    }
                    else {
                        $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td>" +
                                "<td>" + data.mapel.mapel + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-danger label-form'>Remidi</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' onclick='Detail(\"" + data.id + "\")'><i class='fa fa-eye'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button>" +
                                "</td></tr>");
                    }

                })
            });
        }, 2200);
    }

    function getData(page) {
        $("#row").children().remove();
        $("#pagination").children().remove();
        var term = $("#search").val();
        var kelas = $("select[name='kelas']").val();
        var mapel = $("select[name='mapel']").val();
        if (kelas == '' || kelas == null) {
            var url = "/api/v1/nilai?page=" + page + "&term=" + term + "&mapel=" + mapel;
        }
        else if (mapel == '' || mapel == null) {
            var url = "/api/v1/nilai?page=" + page + "&term=" + term + "&kelas=" + kelas;
        }
        else if (mapel != '' && kelas != '') {
            var url = "/api/v1/nilai?page=" + page + "&term=" + term + "&kelas=" + kelas + "&mapel=" + mapel;
        }
        else {
            var url = "/api/v1/nilai?page=" + page + "&term=" + term;
        }
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON(url, function (data) {
                var jumlah = data.data.length;

                // Init pagination
                $("#pagination").append("<ul class='pagination pagination-sm'><li class='disabled'><a href='#'>&laquo;</a></li></ul>");

                if (data.last_page > 1) {
                    for (var i = 1; i <= data.last_page; i++) {
                        if (data.current_page == i) {
                            $(".pagination-sm").append("<li class='active'><a href='#'>" + i + " </a></li>");
                        }
                        else {
//                            $(".pagination-sm").append("<li><a onclick='getData(\"" + cari + "\"," + i + ")'> " + i + " </a></li>");
                            $(".pagination-sm").append("<li><a onclick='getData(" + i + ")'> " + i + " </a></li>");
                        }
                    }
                }
                else {
                    $(".pagination-sm").append("<li class='active'><a href='#'>1</a></li>");
                }

                $(".pagination-sm").append("<li class='disabled'><a href='#'>&raquo;</a></li>");

                $.each(data.data.slice(0, jumlah), function (i, data) {
                    if (data.n_akhir >= data.mapel.kkm) {
//                        var ket = "Lulus";
                        $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td>" +
                                "<td>" + data.mapel.mapel + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-info label-form'>Lulus</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' onclick='Detail(\"" + data.id + "\")'><i class='fa fa-eye'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button>" +
                                "</td></tr>");
                    }
                    else {
                        $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.siswa.kelas.kelas + " " + data.siswa.kelas.jurusan.jurusan + "</td>" +
                                "<td>" + data.mapel.mapel + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-danger label-form'>Remidi</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' onclick='Detail(\"" + data.id + "\")'><i class='fa fa-eye'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button>" +
                                "</td></tr>");
                    }

                })
            });
        }, 2200);
    }

    function getMapel() {
        $('#id_mapel').children().remove();
        $("#id_mapel").append("<option value=''>Pilih Bidang Study</option>")
        $.getJSON("/api/v1/list-mapel", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_mapel").append("<option value='" + data.id + "'>" + data.mapel + "</option>")
            })
        })
    }

    function getKelas() {
        $('#kelas').children().remove();
        $("#kelas").append("<option value=''>Pilih Kelas</option>")
        $.getJSON("/api/v1/list-kelas", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#kelas").append("<option value='" + data.id + "'>" + data.kelas + " " + data.jurusan.jurusan + "</option>")
            })
        })
    }

    function getSiswa() {
        var $form = $("#Form-Create"),
                kelas = $form.find("select[name='kelas']").val();
        $('#id_siswa').children().remove();
        $("#id_siswa").append("<option>Pilih Nama Siswa</option>");
        $.getJSON("/api/v1/list-siswa-by-kelas/" + kelas, function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_siswa").append("<option value='" + data.id + "'>" + data.nama + "</option>")
            })
        })
    }


</script>
@endsection()