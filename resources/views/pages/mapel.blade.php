@extends('layouts.master')
@section('content')
        <!-- PAGE CONTENT -->
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li class="active">Bidang Study</li>
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
                        <h3 class="panel-title">Daftar Bidang Study</h3>
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
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Bidang Study</th>
                                <th>KKM</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="row">
                            {{--looping data from Ajax--}}
                            </tbody>
                        </table>

                        <div id="pagination">

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
                        <h3 class="panel-title">Tambah Bidang Study</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8" style="margin-left: 0px;">
                            <form id="Form-Create" role="form" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Study:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="mapel"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">KKM:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="kkm"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="block" style="margin-left: 260px;">
                                    <button class="btn btn-primary" type="submit" id="Simpan">Simpan</button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-primary" type="button" onclick="index()">Kembali</button>
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
                        <h3 class="panel-title">Edit Kompetensi Keahlian</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Edit" role="form" class="form-horizontal" method="post">
                                <input type="hidden" name="id">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Study:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="mapel"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">KKM:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="kkm"
                                               class="validate[required,maxSize[8]] form-control"/>
                                    </div>
                                </div>
                                <div class="block" style="margin-left: 260px;">
                                    <button class="btn btn-primary" type="submit" id="Edit">Edit</button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-primary" type="button" onclick="index()">Kembali</button>
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

<script type="text/javascript" src="{!! asset('assets/js/plugins/jquery/jquery.min.js') !!}"></script>
<script>
    $(document).ready(function () {
        var currentRequest = null;
        index();
        $("#Form-Create").submit(function (event) {

            event.preventDefault();
            var $form = $(this),
                    mapel = $form.find("input[name='mapel']").val(),
                    kkm = $form.find("input[name='kkm']").val();

            var posting = $.post('/api/v1/mapel', {
                mapel: mapel,
                kkm: kkm,
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
                    mapel = $form.find("input[name='mapel']").val(),
                    kkm = $form.find("input[name='kkm']").val();

            currentRequest = $.ajax({
                method: "PUT",
                url: '/api/v1/mapel/' + id,
                data: {
                    id: id,
                    mapel: mapel,
                    kkm: kkm,
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
    }

    function Edit(id) {
        $('#Create').hide();
        $('#Edit').show();
        $('#List').hide();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        $.ajax({
            method: "Get",
            url: '/api/v1/mapel/' + id,
            data: {}
        })
                .done(function (data_edit) {
                    $("input[name='id']").val(data_edit.id);
                    $("input[name='mapel']").val(data_edit.mapel);
                    $("input[name='kkm']").val(data_edit.kkm);
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
    }

    function Hapus(id) {
        var result = confirm("Apakah Anda Yakin Ingin Menghapus ?");
        if (result) {
            $.ajax({
                method: "DELETE",
                url: '/api/v1/mapel/' + id,
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
            $.getJSON("/api/v1/mapel", function (data) {
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
                    $("#row").append("<tr><td>" + (i + 1) + "</td><td>" + data.mapel + "</td><td>" + data.kkm + "</td><td><button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> <button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }

    function getData(page) {
        $("#row").children().remove();
        $("#pagination").children().remove();
        var term = $("#search").val();
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/mapel?page=" + page + "&term=" + term, function (data) {
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
                    $("#row").append("<tr><td>" + (i + 1) + "</td><td>" + data.mapel + "</td><td>" + data.kkm + "</td><td><button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> <button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }
</script>
<!-- END PAGE CONTENT WRAPPER -->
<!-- END PAGE CONTENT -->
@endsection()