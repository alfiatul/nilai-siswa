@extends('layouts.master')
@section('content')
        <!-- PAGE CONTENT -->
<!-- START BREADCRUMB -->
{{--<ul class="breadcrumb">--}}
{{--<li><a href="/">Home</a></li>--}}
{{--<li class="active">Guru</li>--}}

{{--</ul>--}}
<!-- END BREADCRUMB -->

{{--<div class="page-title">--}}
{{--<h2><span class="fa fa-arrow-circle-o-left"></span> Siswa</h2>--}}
{{--</div>--}}
<div id="crumb">

</div>

<div id="Alert">

</div>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="min-height: 700px;">
    <div id="List">
        {{--<ul class="breadcrumb">--}}
        {{--<li><a href="/">Home</a></li>--}}
        {{--<li class="active">Guru</li>--}}

        {{--</ul>--}}
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
                        {{--<button type="button" class="btn btn-sm btn-default" style="margin-bottom: 10px;">--}}
                        {{--<i class="fa fa-refresh"></i>--}}
                        {{--</button>--}}

                        <div class="input-group col-md-3 push-down-10 pull-right">
                            <input type="text" class="form-control" placeholder="Keywords..." id="search-guru"/>

                            <div class="input-group-btn">
                                <button class="btn btn-primary" onclick="getDataGuru(1)"><i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                {{--<th>Bidang Study</th>--}}
                                <th>Telp</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="row">
                            {{--looping data from ajax--}}
                            </tbody>
                        </table>

                        <div id="pagination-guru">
                            {{--Pagination goes here--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="Ajar">
        {{--<ul class="breadcrumb">--}}
        {{--<li><a href="/">Home</a></li>--}}
        {{--<li><a href="#" onclick="index()">Guru</a></li>--}}
        {{--<li class="active">Bidang Studi Guru</li>--}}

        {{--</ul>--}}
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Bidang Studi Guru</h3> <br><br>

                        <div class='col-md-4 label label-primary' id="info-guru">

                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="btn-mapel-guru">

                        </div>

                        {{--<div class="input-group col-md-3 push-down-10 pull-right">--}}
                        {{--<input type="text" class="form-control" placeholder="Keywords..." id="search-ajar"/>--}}

                        {{--<div class="input-group-btn" id="btn-cari-ajar">--}}

                        {{--</div>--}}
                        {{--</div>--}}
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Bidang Studi</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="data-mengajar">
                            {{--looping data from ajax--}}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="Create-Ajar">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Kelas Ajar</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Create-Ajar" role="form" class="form-horizontal" method="post">
                                <input type="hidden" name="id_guru">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bidang Studi :</label>

                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="mapel-ajar" id="mapel-ajar">
                                            <option selected>Pilih Bidang Studi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Kelas :</label>

                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="kelas-ajar" id="kelas-ajar">
                                            <option selected>Pilih Bidang Studi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="block" style="margin-left: 260px;">
                                    <button class="btn btn-primary" type="submit" id="Simpan-Ajar">Simpan</button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-primary" type="button" onclick="BackAjar()">Kembali</button>
                                </div>
                            </form>
                        </div>
                        <!-- END VALIDATIONENGINE PLUGIN -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="Nilai">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Nilai Siswa</h3> <br><br>

                        <div class='col-md-4 label label-primary' id="info-nilai">

                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="btn-nilai-siswa">

                        </div>

                        <div class="input-group col-md-3 push-down-10 pull-right">
                            <input type="text" class="form-control" placeholder="Keywords..." id="search-nilai"/>

                            <div class="input-group-btn" id="btn-cari-nilai">

                            </div>
                        </div>
                        <table class="table table-hover ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Nilai Tugas</th>
                                <th>Nilai UTS</th>
                                <th>Nilai UAS</th>
                                <th>Nilai Akhir</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="data-nilai">
                            {{--looping data from ajax--}}
                            </tbody>
                        </table>

                        <div id="pagination-nilai">
                            {{--Pagination Goes Here--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="Create-Nilai">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Nilai Siswa</h3>
                    </div>
                    <div class="panel-body">
                        <!-- START VALIDATIONENGINE PLUGIN -->
                        <div class="block col-md-8">
                            <form id="Form-Create-Nilai" role="form" class="form-horizontal" method="post">
                                <input type="hidden" name="id_ngajar">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">NIS :</label>

                                    <div class="col-md-6">
                                        <select class="form-control select" style="" name="nis" id="nis">
                                            <option selected>Pilih Siswa</option>
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
                                    <button class="btn btn-primary" type="submit" id="Simpan-Nilai">Simpan</button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-primary" type="button" onclick="BackNilai()"
                                            id="Kembali-Nilai">Kembali
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- END VALIDATIONENGINE PLUGIN -->
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
                            <form id="Form-Create" role="form" class="form-horizontal" method="post">
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
                                    <label class="col-md-3 control-label">No Telp:</label>

                                    <div class="col-md-6">
                                        <input type="text" name="telp"
                                               class="validate[required,custom[integer],min[18],max[120]] form-control"/>
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

{{--Detail--}}
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal Content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>
                    <font face="Bernard MT">Detail Nilai Siswa</font>
                </h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody id="modal-body">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="edit-nilai">Simpan</button>
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
        $("#Form-Create").submit(function (event) {

            event.preventDefault();
            var $form = $(this),
//                    id_mapel = $form.find("select[name='mapel']").val(),
                    id_mapel = '',
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
//                    id_mapel = $form.find("select[name='mapel']").val(),
                    id_mapel = '',
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

        // Simpan Ajar
        $("#Form-Create-Ajar").submit(function (event) {

            event.preventDefault();
            var $form = $("#Form-Create-Ajar"),
                    id_guru = $form.find("input[name='id_guru']").val(),
                    id_mapel = $form.find("select[name='mapel-ajar']").val(),
                    id_kelas = $form.find("select[name='kelas-ajar']").val();

            var posting = $.post('/api/v1/mengajar', {
                id_guru: id_guru,
                id_mapel: id_mapel,
                id_kelas: id_kelas
            });

//            //Put the results in a div
            posting.done(function (data) {
                window.alert(data.result.message);
                Ajar(id_guru);
            });
        });

        // Simpan Nilai
        $("#Form-Create-Nilai").submit(function (event) {

            event.preventDefault();

            var $form = $("#Form-Create-Nilai"),
                    id_ngajar = $form.find("input[name='id_ngajar']").val(),
                    id_siswa = $form.find("select[name='nis']").val(),
                    n_tugas = $form.find("input[name='tugas']").val(),
                    n_uts = $form.find("input[name='uts']").val(),
                    n_uas = $form.find("input[name='uas']").val();

            $.ajax({
                method: "POST",
                url: '/api/v1/nilai-by-mengajar/' + id_ngajar,
                data: {
                    id_ngajar: id_ngajar,
                    id_siswa: id_siswa,
                    n_tugas: n_tugas,
                    n_uts: n_uts,
                    n_uas: n_uas
                },
                success: function (data) {

                    Nilai(id_ngajar);
                    $("#Alert").children().remove();
                    $("#Alert").append("<div class='alert alert-success' role='alert'>" +
                            "<button type='button' class='close' data-dismiss='alert'>" +
                            "<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>" +
                            "Data Berhasil Disimpan </div>"
                    );

                },
                error: function (data) {
                    $("#Alert").children().remove();
                    $("#Alert").append("<div class='alert alert-danger' role='alert'>" +
                            "<button type='button' class='close' data-dismiss='alert'>" +
                            "<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>" +
                            "Data Gagal Disimpan, Mohon cek kembali inputan anda </div>"
                    );
                }
            });
        });

        // Edit Nilai Siswa
        $("#edit-nilai").click(function (event) {
            event.preventDefault();

            var id = $("#edit-id").val(),
                    ajar = $("#edit-ajar").val(),
                    nilai_tugas = $("#edit-ntugas").val(),
                    nilai_uts = $("#edit-nuts").val(),
                    nilai_uas = $("#edit-nuas").val();

//            console.log(id + "\n" + nilai_tugas + "\n" + nilai_uts + "\n" + nilai_uas);
            currentRequest = $.ajax({
                method: "PUT",
                url: '/api/v1/nilai/' + id,
                data: {
                    n_tugas: nilai_tugas,
                    n_uts: nilai_uts,
                    n_uas: nilai_uas
                },
                beforeSend: function () {
                    if (currentRequest != null) {
                        currentRequest.abort();
                    }
                },
                success: function (data) {
//                    window.alert(data.result.message);
                    Nilai(ajar);
                    $("#Alert").children().remove();
                    $("#Alert").append("<div class='alert alert-success' role='alert'>" +
                            "<button type='button' class='close' data-dismiss='alert'>" +
                            "<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>" +
                            "Data Berhasil Diubah </div>"
                    );
                },
                error: function (data) {
//                    window.alert(data.result.message);
                    Nilai(ajar);
                    $("#Alert").children().remove();
                    $("#Alert").append("<div class='alert alert-danger' role='alert'>" +
                            "<button type='button' class='close' data-dismiss='alert'>" +
                            "<span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>" +
                            "Data Gagal Disimpan, Mohon cek kembali inputan anda </div>"
                    );
                }
            });
        });

    })

    function tambah() {
        $('#Create').show();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        document.getElementById("Form-Create-Ajar").reset();
        $('#Edit').hide();
        $('#List').hide();
        $('#Ajar').hide();
        $('#Nilai').hide();
        $('#Create-Ajar').hide();
        getMapel();
    }

    function tambah_ajar(id) {
        console.log("id guru : " + id);
        $('#Create').hide();
        $('#Edit').hide();
        $('#List').hide();
        $('#Ajar').hide();
        $('#Nilai').hide();
        $('#Create-Ajar').show();
        $('#Create-Nilai').hide();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        document.getElementById("Form-Create-Ajar").reset();
        document.getElementById("Form-Create-Nilai").reset();
        $("input[name='id_guru']").val(id);
//        List Mapel
        $('#mapel-ajar').children().remove();
        $("#mapel-ajar").append("<option>Pilih Bidang Studi</option>")
        $.getJSON("/api/v1/list-mapel", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#mapel-ajar").append("<option value='" + data.id + "'>" + data.mapel + "</option>")
            })
        });

        // List Kelas Ajar
        $('#kelas-ajar').children().remove();
        $("#kelas-ajar").append("<option value=''>Pilih Kelas</option>")
        $.getJSON("/api/v1/list-kelas", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#kelas-ajar").append("<option value='" + data.id + "'>" + data.kelas + " " + data.jurusan.jurusan + "</option>")
            })
        });
    }

    function tambah_nilai_siswa(id) {
//        console.log("id ngajar : " + id);
        $('#Create').hide();
        $('#Edit').hide();
        $('#List').hide();
        $('#Ajar').hide();
        $('#Nilai').hide();
        $('#Create-Ajar').hide();
        $('#Create-Nilai').show();
        $('#Alert').children().remove();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        document.getElementById("Form-Create-Ajar").reset();
        document.getElementById("Form-Create-Nilai").reset();
        $("input[name='id_ngajar']").val(id);

        $.ajax({
            method: "Get",
            url: '/api/v1/mengajar/' + id,
            data: {}
        })
                .done(function (data_ajar) {
//                    console.log('kelas : ' + data_ajar.id_kelas);
//                    console.log('mapel : ' + data_ajar.id_mapel);
                    $('#nis').children().remove();
                    $("#nis").append("<option value=''>Pilih Siswa</option>")
                    $.getJSON("/api/v1/list-siswa-by-nilai/" + data_ajar.id_kelas + "/" + data_ajar.id_mapel, function (data) {
                        var jumlah = data.length;
                        $.each(data.slice(0, jumlah), function (i, data) {
                            $("#nis").append("<option value='" + data.id + "'>" + data.nis + " | " + data.nama + "</option>")
                        })
                    })
                });
    }

    function Edit(id) {
        $('#Create').hide();
        $('#Edit').show();
        $('#List').hide();
        $('#Ajar').hide();
        $('#Nilai').hide();
        $('#Create-Ajar').hide();
        $('#Create-Nilai').hide();
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        document.getElementById("Form-Create-Ajar").reset();
        document.getElementById("Form-Create-Nilai").reset();
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

    function BackAjar() {
        var id = $("input[name='id_guru']").val();
        Ajar(id);
    }

    function Ajar(id) {
        $('#Create').hide();
        $('#Edit').hide();
        $('#List').hide();
        $('#Ajar').show();
        $('#Nilai').hide();
        $('#Create-Ajar').hide();
        $('#Create-Nilai').hide();
        $("#search-guru").val('');
        $("#search-ajar").val('');
        $("#search-nilai").val('');
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        document.getElementById("Form-Create-Ajar").reset();
        document.getElementById("Form-Create-Nilai").reset();

        $("#btn-mapel-guru").children().remove();
        $("#crumb").children().remove();
        $("#data-mengajar").children().remove();
        $("#info-guru").children().remove();
        $("#btn-mapel-guru").append("<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='tambah_ajar(\"" + id + "\")'>" +
                "<i class='fa fa-plus'></i></button>");
        $("#crumb").append("<ul class='breadcrumb'><li><a href='/'>Home</a></li>" +
                "<li><a href='#' onclick='index()'>Guru</a></li>" +
                "<li class='active'>Bidang Studi Guru</li>" +
                "</ul>");
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/mengajar-by-guru/" + id, function (data) {
                var jumlah = data.data.length;

                // Add info
                $.ajax({
                    method: "Get",
                    url: '/api/v1/guru/' + id,
                    data: {}
                })
                        .done(function (data_guru) {
                            $("#info-guru").append("<table style='text-align: left;'>" +
                                    "<tr>" +
                                    "<td style='padding: 5px;'>Nama Guru</td> " +
                                    "<td style='padding: 5px;'>:</td> " +
                                    "<td style='padding: 5px;'>" + data_guru.nama + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                    "<td style='padding: 5px;'>Nomor Telpon</td> " +
                                    "<td style='padding: 5px;'>:</td> " +
                                    "<td style='padding: 5px;'>" + data_guru.no_hp + "</td>" +
                                    "</tr>" +
                                    "</table>");
                        });

                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#data-mengajar").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.mapel.mapel + "</td>" +
                            "<td>" + data.kelas.kelas + " " + data.kelas.jurusan.jurusan + "</td>" +
                            "<td>" +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Nilai(\"" + data.id + "\")'><i class='fa fa-clipboard'></i></button></td></tr>");
                })
            });
        }, 2200);
    }

    function BackNilai() {
        var id = $("input[name='id_ngajar']").val();
        Nilai(id);
    }

    function Nilai(id) {
        $('#Create').hide();
        $('#Edit').hide();
        $('#List').hide();
        $('#Ajar').hide();
        $('#Nilai').show();
        $('#Create-Ajar').hide();
        $('#Create-Nilai').hide();
        $("#search-guru").val('');
        $("#search-ajar").val('');
        $("#search-nilai").val('');
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        document.getElementById("Form-Create-Ajar").reset();
        document.getElementById("Form-Create-Nilai").reset();

        $("#data-nilai").children().remove();
        $("#crumb").children().remove();
        $("#info-nilai").children().remove();
        $("#pagination-nilai").children().remove();
        $("#btn-nilai-siswa").children().remove();
        $("#btn-cari-nilai").children().remove();

        $("#btn-nilai-siswa").append("<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='tambah_nilai_siswa(\"" + id + "\")'>" +
                "<i class='fa fa-plus'></i></button>");
        $("#btn-cari-nilai").append("<button class='btn btn-primary' onclick='getDataNilai(\"" + id + "\"," + 1 + ")'><i class='fa fa-search'></i></button>");
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/nilai-by-mengajar/" + id, function (data) {
                var jumlah = data.data.length;

                // Add info
                $.ajax({
                    method: "Get",
                    url: '/api/v1/mengajar/' + id,
                    data: {}
                })
                        .done(function (data_ajar) {
                            $("#crumb").append("<ul class='breadcrumb'><li><a href='/'>Home</a></li>" +
                                    "<li><a href='#' onclick='index()'>Guru</a></li>" +
                                    "<li><a href='#' onclick='Ajar(\"" + data_ajar.id_guru + "\")'>Bidang Studi Guru</a></li>" +
                                    "<li class='active'>Nilai Siswa</li>" +
                                    "</ul>");

                            $("#info-nilai").append("<table style='text-align: left;'>" +
                                    "<tr>" +
                                    "<td style='padding: 5px;'>Kelas</td> " +
                                    "<td style='padding: 5px;'>:</td> " +
                                    "<td style='padding: 5px;'>" + data_ajar.kelas.kelas + " " + data_ajar.kelas.jurusan.jurusan + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                    "<td style='padding: 5px;'>Bidang Studi</td> " +
                                    "<td style='padding: 5px;'>:</td> " +
                                    "<td style='padding: 5px;'>" + data_ajar.mapel.mapel + "</td>" +
                                    "</tr>" +
                                    "<tr>" +
                                    "<td style='padding: 5px;'>KKM</td> " +
                                    "<td style='padding: 5px;'>:</td> " +
                                    "<td style='padding: 5px;'>" + data_ajar.mapel.kkm + "</td>" +
                                    "</tr>" +
                                    "</table>");
                        });

                // Init pagination
                $("#pagination-nilai").append("<ul class='pagination pagination-sm'><li class='disabled'><a href='#'>&laquo;</a></li></ul>");

                if (data.last_page > 1) {
                    for (var i = 1; i <= data.last_page; i++) {
                        if (data.current_page == i) {
                            $(".pagination-sm").append("<li class='active'><a href='#'>" + i + " </a></li>");
                        }
                        else {
                            $(".pagination-sm").append("<li><a onclick='getDataNilai(\"" + id + "\"," + i + ")'> " + i + " </a></li>");
                        }
                    }
                }
                else {
                    $(".pagination-sm").append("<li class='active'><a href='#'>1</a></li>");
                }

                $(".pagination-sm").append("<li class='disabled'><a href='#'>&raquo;</a></li>");

                $.each(data.data.slice(0, jumlah), function (i, data) {
                    if (data.n_akhir >= data.mapel.kkm) {
                        $("#data-nilai").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.n_tugas + "</td>" +
                                "<td>" + data.n_uts + "</td>" +
                                "<td>" + data.n_uas + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-info label-form'>Lulus</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' tolltip='Edit Nilai Siswa' onclick='Detail(\"" + data.id + "\",\"" + id + "\")'><i class='fa fa-pencil'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='das(\"" + data.id + "\")'><i class='fa fa-eye'></i></button>" +
                                "</td></tr>");
                    }
                    else {
                        $("#data-nilai").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.n_tugas + "</td>" +
                                "<td>" + data.n_uts + "</td>" +
                                "<td>" + data.n_uas + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-danger label-form'>Remidi</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' tolltip='Edit Nilai Siswa' onclick='Detail(\"" + data.id + "\",\"" + id + "\")'><i class='fa fa-pencil'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='das(\"" + data.id + "\")'><i class='fa fa-edit'></i></button>" +
                                "</td></tr>");
                    }
                })
            });
        }, 2200);
    }

    function getDataNilai(id, page) {
        $("#data-nilai").children().remove();
        $("#btn-nilai-siswa").children().remove();
        $("#btn-cari-nilai").children().remove();
        $("#pagination-nilai").children().remove();

        var term = $("#search-nilai").val();
        $("#btn-nilai-siswa").append("<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='tambah_nilai_siswa(\"" + id + "\")'>" +
                "<i class='fa fa-plus'></i></button>");
        $("#btn-cari-nilai").append("<button class='btn btn-primary' onclick='getDataNilai(\"" + id + "\"," + 1 + ")'><i class='fa fa-search'></i></button>");
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/nilai-by-mengajar/" + id + "?page=" + page + "&term=" + term, function (data) {
                var jumlah = data.data.length;

                // Init pagination
                $("#pagination-nilai").append("<ul class='pagination pagination-sm'><li class='disabled'><a href='#'>&laquo;</a></li></ul>");

                if (data.last_page > 1) {
                    for (var i = 1; i <= data.last_page; i++) {
                        if (data.current_page == i) {
                            $(".pagination-sm").append("<li class='active'><a href='#'>" + i + " </a></li>");
                        }
                        else {
                            $(".pagination-sm").append("<li><a onclick='getDataNilai(\"" + id + "\"," + i + ")'> " + i + " </a></li>");
                        }
                    }
                }
                else {
                    $(".pagination-sm").append("<li class='active'><a href='#'>1</a></li>");
                }

                $(".pagination-sm").append("<li class='disabled'><a href='#'>&raquo;</a></li>");

                $.each(data.data.slice(0, jumlah), function (i, data) {
                    if (data.n_akhir >= data.mapel.kkm) {
                        $("#data-nilai").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.n_tugas + "</td>" +
                                "<td>" + data.n_uts + "</td>" +
                                "<td>" + data.n_uas + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-info label-form'>Lulus</span></td>" +
                                "<td>" +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='das(\"" + data.id + "\")'><i class='fa fa-eye'></i></button>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' tolltip='Edit Nilai Siswa' onclick='Detail(\"" + data.id + "\",\"" + id + "\")'><i class='fa fa-pencil'></i></button> " +
                                "</td></tr>");
                    }
                    else {
                        $("#data-nilai").append("<tr><td>" + (i + 1) + "</td>" +
                                "<td>" + data.siswa.nis + "</td>" +
                                "<td>" + data.siswa.nama + "</td>" +
                                "<td>" + data.n_tugas + "</td>" +
                                "<td>" + data.n_uts + "</td>" +
                                "<td>" + data.n_uas + "</td>" +
                                "<td>" + data.n_akhir + "</td>" +
                                "<td><span class='label label-danger label-form'>Remidi</span></td>" +
                                "<td>" +
                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' tolltip='Edit Nilai Siswa' onclick='Detail(\"" + data.id + "\",\"" + id + "\")'><i class='fa fa-pencil'></i></button> " +
//                                "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='das(\"" + data.id + "\")'><i class='fa fa-edit'></i></button>" +
                                "</td></tr>");
                    }
                })
            });
        }, 2200);
    }

    function index() {
        $('#Create').hide();
        $('#Edit').hide();
        $('#Ajar').hide();
        $('#Nilai').hide();
        $('#List').show();
        $('#Create-Ajar').hide();
        $('#Create-Nilai').hide();
        $("#search-guru").val('');
        $("#search-ajar").val('');
        $("#search-nilai").val('');
        document.getElementById("Form-Create").reset();
        document.getElementById("Form-Edit").reset();
        document.getElementById("Form-Create-Ajar").reset();
        document.getElementById("Form-Create-Nilai").reset();
        getAjax();
    }

    function getMapel() {
        $('#id_mapel').children().remove();
        $("#id_mapel").append("<option>Pilih Bidang Study</option>")
        $.getJSON("/api/v1/list-mapel", function (data) {
            var jumlah = data.length;
            $.each(data.slice(0, jumlah), function (i, data) {
                $("#id_mapel").append("<option value='" + data.id + "'>" + data.mapel + "</option>")
            })
        })
    }

    function Detail(id, ajar) {
        $.ajax({
            method: "Get",
            url: '/api/v1/nilai/' + id,
            data: {},
            beforeSend: function () {
//                $('#loader-wrapper').show();
            },
            success: function (data) {
//                $("#loader-wrapper").hide();
                $('#Alert').children().remove();
                $("#modal-body").children().remove();
                if (data.siswa.jk == 'L') {
                    var jk = 'Laki-Laki';
                }
                else {
                    var jk = 'Perempuan';
                }

                $("#modal-body").append(
                        "<tr><td> NIS </td><td> : </td><td>" + data.siswa.nis + "</td></tr>" +
                        "<tr><td> Nama </td><td> : </td><td>" + data.siswa.nama + "</td></tr>" +
                        "<tr><td> Jenis Kelamin </td><td> : </td><td>" + jk + "</td></tr>" +
                        "<tr><td> Bidang Studi </td><td> : </td><td>" + data.mapel.mapel + "</td></tr>" +
                        "<tr><td> Nilai Tugas </td><td> : </td><td><input type='text' id='edit-ntugas' value='" + data.n_tugas + "'></td></tr>" +
                        "<tr><td> Nilai UTS </td><td> : </td><td><input type='text' id='edit-nuts' value='" + data.n_uts + "'></td></tr>" +
                        "<tr><td> Nilai UAS </td><td> : </td><td><input type='text' id='edit-nuas' value='" + data.n_uas + "'></td></tr>" +
                        "<tr><td><input type='hidden' id='edit-id' value='" + id + "'> <input type='hidden' id='edit-ajar' value='" + ajar + "'></td></tr>"
                );
            }
        });
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

    function getAjax() {
        $("#row").children().remove();
        $("#crumb").children().remove();
        $("#pagination-guru").children().remove();

        $("#crumb").append("<ul class='breadcrumb'><li><a href='/'>Home</a></li>" +
                "<li class='active'>Guru</li>" +
                "</ul>");
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/guru", function (data) {
//                console.log(data);
                var jumlah = data.data.length;

                // Init pagination
                $("#pagination-guru").append("<ul class='pagination pagination-sm'><li class='disabled'><a href='#'>&laquo;</a></li></ul>");

                if (data.last_page > 1) {
                    for (var i = 1; i <= data.last_page; i++) {
                        if (data.current_page == i) {
                            $(".pagination-sm").append("<li class='active'><a href='#'>" + i + " </a></li>");
                        }
                        else {
                            $(".pagination-sm").append("<li><a onclick='getDataGuru(" + i + ")'> " + i + " </a></li>");
                        }
                    }
                }
                else {
                    $(".pagination-sm").append("<li class='active'><a href='#'>1</a></li>");
                }

                $(".pagination-sm").append("<li class='disabled'><a href='#'>&raquo;</a></li>");

                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.nama + "</td>" +
                            "<td>" + data.alamat + "</td>" +
//                            "<td>" + data.mapel.mapel + "</td>" +
                            "<td>" + data.no_hp + "</td>" +
                            "<td>" +
//                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' onclick='Detail(\"" + data.id + "\")'><i class='fa fa-eye'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='tooltip' data-placement='top' title='Mengajar' onclick='Ajar(\"" + data.id + "\")'><i class='fa fa-group'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }

    function getDataGuru(page) {
        $("#row").children().remove();
        $("#pagination-guru").children().remove();
        var term = $("#search-guru").val();
        $("#loader2").delay(2000).animate({
            opacity: 0,
            width: 0,
            height: 0
        }, 500);
        setTimeout(function () {
            $.getJSON("/api/v1/guru?page=" + page + "&term=" + term, function (data) {
                var jumlah = data.data.length;

                // Init pagination
                $("#pagination-guru").append("<ul class='pagination pagination-sm'><li class='disabled'><a href='#'>&laquo;</a></li></ul>");

                if (data.last_page > 1) {
                    for (var i = 1; i <= data.last_page; i++) {
                        if (data.current_page == i) {
                            $(".pagination-sm").append("<li class='active'><a href='#'>" + i + " </a></li>");
                        }
                        else {
                            $(".pagination-sm").append("<li><a onclick='getDataGuru(" + i + ")'> " + i + " </a></li>");
                        }
                    }
                }
                else {
                    $(".pagination-sm").append("<li class='active'><a href='#'>1</a></li>");
                }

                $(".pagination-sm").append("<li class='disabled'><a href='#'>&raquo;</a></li>");

                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.nama + "</td>" +
                            "<td>" + data.alamat + "</td>" +
//                            "<td>" + data.mapel.mapel + "</td>" +
                            "<td>" + data.no_hp + "</td>" +
                            "<td>" +
//                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='modal' data-target='#myModal' onclick='Detail(\"" + data.id + "\")'><i class='fa fa-eye'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button>" +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' data-toggle='tooltip' data-placement='top' title='Mengajar' onclick='Ajar(\"" + data.id + "\")'><i class='fa fa-group'></i></button> " +
                            "<button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }
</script>
@endsection()