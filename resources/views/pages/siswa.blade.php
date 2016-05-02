@extends('layouts.master')
@section('content')
        <!-- PAGE CONTENT -->
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li class="active">Siswa</li>
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
                        <h3 class="panel-title">Daftar Siswa</h3>
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
                        <div class="input-group col-md-3 push-down-10 pull-right">
                            <input type="text" class="form-control" placeholder="Keywords..." id="search"/>

                            <div class="input-group-btn">
                                <button class="btn btn-primary" onclick="getData(1)"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        {{--<div class="col-md-3 push-down-10 pull-right">--}}
                        {{--<select class="form-control select" style="" name="kelas" id="id_kelas">--}}
                        {{--<option>Pilih kelas</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Alamat</th>
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
                        <h3 class="panel-title">Tambah Siswa</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Create" role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nis:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="nis"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="nama"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>

                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="kelas" id="id_kelas">
                                            <option>Pilih kelas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin:</label>

                                    <div class="col-md-4">
                                        <label class="check">
                                            <input type="radio" class="iradio" name="jk" value="L" id="L"/> Laki-Laki
                                        </label>

                                        <label class="check">
                                            <input type="radio" class="iradio" name="jk" value="P" id="P"/> Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Agama:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="agama"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="alamat"
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
                        <h3 class="panel-title">Edit Siswa</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Edit" role="form" class="form-horizontal">
                                <input type="hidden" name="id">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nis:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="nis"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="nama"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas:</label>

                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="kelas" id="id_kelas">
                                            <option>Pilih kelas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jenis Kelamin:</label>

                                    <div class="col-md-4">
                                        <label class="check">
                                            <input type="radio" class="iradio" name="jk" value="L" id="laki"/> Laki-Laki
                                        </label>

                                        <label class="check">
                                            <input type="radio" class="iradio" name="jk" value="P" id="perempuan"/>
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Agama:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="agama"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Alamat:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="alamat"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
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

{{--Detail--}}
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal Content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>
                    <fond face="Bernard MT">Detail Siswa</fond>
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

<script type="text/javascript" src="{!! asset('assets/js/plugins/jquery/jquery.min.js') !!}"></script>
<script>
    $(document).ready(function () {
        var currentRequest = null;
        index();
        $("#Simpan").click(function (event) {

            event.preventDefault();
            var $form = $("#Form-Create"),
                    id_kelas = $form.find("select[name='kelas']").val(),
                    nis = $form.find("input[name='nis']").val(),
                    nama = $form.find("input[name='nama']").val(),
//                    jk = $form.find("input[name='jk']").val(),
                    agama = $form.find("input[name='agama']").val(),
                    alamat = $form.find("input[name='alamat']").val();

            if (document.getElementById("laki").checked = true) {
                var jk = 'L';
            }
            if (document.getElementById("perempuan").checked = true) {
                var jk = 'P';
            }

            var posting = $.post('/api/v1/siswa', {
                id_kelas: id_kelas,
                nis: nis,
                nama: nama,
                jk: jk,
                agama: agama,
                alamat: alamat,
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
                    id_kelas = $form.find("select[name='kelas']").val(),
                    nis = $form.find("input[name='nis']").val(),
                    nama = $form.find("input[name='nama']").val(),
//                    jk = $form.find("input[name='jk']").val(),
                    agama = $form.find("input[name='agama']").val(),
                    alamat = $form.find("input[name='alamat']").val();

            if (document.getElementById("laki").checked = true) {
                var jk = 'L';
            }
            if (document.getElementById("perempuan").checked = true) {
                var jk = 'P';
            }

            currentRequest = $.ajax({
                method: "PUT",
                url: '/api/v1/siswa/' + id,
                data: {
                    id_kelas: id_kelas,
                    nis: nis,
                    nama: nama,
                    jk: jk,
                    agama: agama,
                    alamat: alamat,
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
        getKelas();
    }

    function Edit(id) {
        $('#Create').hide();
        $('#Edit').show();
        $('#List').hide();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        $.ajax({
                    method: "Get",
                    url: '/api/v1/siswa/' + id,
                    data: {}
                })
                .done(function (data_edit) {
                    $("input[name='id']").val(data_edit.id);
                    $("input[name='nis']").val(data_edit.nis);
                    $("input[name='nama']").val(data_edit.nama);
                    $("input[name='alamat']").val(data_edit.alamat);
                    $("input[name='agama']").val(data_edit.agama);
                    if (data_edit.jk == 'L') {
                        document.getElementById("laki").checked = true;
                        console.log('laki-laki');
                    }
                    if (data_edit.jk == 'P') {
                        document.getElementById("perempuan").checked = true;
                        console.log('perempuan');
                    }

                    $.getJSON("/api/v1/list-kelas", function (data) {
                        var jumlah = data.length;
                        $.each(data.slice(0, jumlah), function (i, data) {
                            if (data_edit.kelas.id == data.id) {
                                $("select[name='kelas']").append("<option value='" + data.id + "' selected>" + data.kelas + " " + data.jurusan.jurusan + "</option>");
                            }
                            else {
                                $("select[name='kelas']").append("<option value='" + data.id + "'>" + data.kelas + " " + data.jurusan.jurusan + "</option>");
                            }
                        })
                    })
                });
    }

    function Detail(id) {
        $("#modal-body").children().remove();
        $.ajax({
            method: "Get",
            url: '/api/v1/siswa/' + id,
            data: {},
            beforeSend: function () {
//                $('#loader-wrapper').show();
            },
            success: function (data) {
//                $("#loader-wrapper").hide();
                if (data.jk == 'L') {
                    var jk = 'Laki-laki';
                }
                if (data.jk == 'P') {
                    var jk = 'Perempuan';
                }
                $("#modal-body").append("<tr><td> NIS </td><td>: </td><td>" + data.nis + "</td></tr>" +
                        "<tr><td> Nama </td><td> : </td><td>" + data.nama + "</td></tr>" +
                        "<tr><td> Jenis Kelamin </td><td> : </td><td>" + jk + "</td></tr>" +
                        "<tr><td> Agama </td><td> : </td><td>" + data.agama + "</td></tr>" +
                        "<tr><td> Alamat </td><td> : </td><td>" + data.alamat + "</td></tr>"
                );
            }
        });
    }

    function index() {
        $('#Create').hide();
        $('#Edit').hide();
        $('#List').show();
        $("#search").val('');
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        getAjax();
//        getKelas();
    }

    function getKelas() {
        $('#id_kelas').children().remove();
        $("#id_kelas").append("<option value=''>Pilih Kelas</option>")
        $.getJSON("/api/v1/list-kelas", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_kelas").append("<option value='" + data.id + "'>" + data.kelas + " " + data.jurusan.jurusan + "</option>")
            })
        })
    }

    function Hapus(id) {
        var result = confirm("Apakah Anda Yakin Ingin Menghapus ?");
        if (result) {
            $.ajax({
                        method: "DELETE",
                        url: '/api/v1/siswa/' + id,
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
        var cari = $("#search").val();
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/siswa", function (data) {
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
                    if (data.jk == 'L') {
                        jk = 'Laki-Laki';
                    }
                    if (data.jk == 'P') {
                        jk = 'Perempuan';
                    }
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.nama + "</td>" +
                            "<td>" + data.kelas.kelas + " " + data.kelas.jurusan.jurusan + "</td>" +
                            "<td>" + jk + "</td>" +
                            "<td>" + data.agama + "</td>" +
                            "<td>" + data.alamat + "</td>" +
                            "<td>" +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' onclick='Detail(" + data.id + ")'><i class='fa fa-eye'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }

    function getData(page) {
        $("#row").children().remove();
        $("#pagination").children().remove();
        var term = $("#search").val();
//        var kelas = $("select[name='kelas']").val();
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/siswa?page=" + page + "&term=" + term, function (data) {
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
                    if (data.jk == 'L') {
                        jk = 'Laki-Laki';
                    }
                    if (data.jk == 'P') {
                        jk = 'Perempuan';
                    }
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.nama + "</td>" +
                            "<td>" + data.kelas.kelas + " " + data.kelas.jurusan.jurusan + "</td>" +
                            "<td>" + jk + "</td>" +
                            "<td>" + data.agama + "</td>" +
                            "<td>" + data.alamat + "</td>" +
                            "<td>" +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }
</script>
<!-- END PAGE CONTENT WRAPPER -->
<!-- END PAGE CONTENT -->
@endsection()