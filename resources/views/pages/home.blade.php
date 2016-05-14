@extends('layouts.master')

@section('content')

        <!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
</ul>
        <!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="panel panel-default panel-hidden-controls">
        <div id="List">
            <div class="panel-heading">
                <h3 class="panel-title">Aplikasi Penilaian Siswa SMK Negeri 1 Kepanjen</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <center>
                    <img src="{!! asset('assets/assets/images/kanesa.png') !!}" alt="John Doe" width="100%"
                         height="100%" style="max-height: 400px; max-width: 422px;"/>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- END SCRIPTS -->
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

    function index() {
//        $('#Create').hide();
//        $('#Edit').hide();
        $('#List').show();
        $('#search').val('');
//        document.getElementById("Form-Create").reset();
//        document.getElementById("Form-Edit").reset();
        getAjax();
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
            $.getJSON("/api/v1/jurusan", function (data) {
                var jumlah = data.data.length;
                var jml_hal = Math.ceil(data.total / 10);
//                $("#pagination").append("Showing " + data.from + "to " + data.to + " of " + data.total + " entries");
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
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.jurusan + "</td>" +
                            "<td><button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button>" +
                            " <button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
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
            $.getJSON("/api/v1/jurusan?page=" + page + "&term=" + term, function (data) {
                var jumlah = data.data.length;
                var jml_hal = Math.ceil(data.total / 10);
//                $("#pagination").append("Showing " + data.from + "to " + data.to + " of " + data.total + " entries");
                $("#pagination").append("<ul class='pagination pagination-sm'><li class='disabled'><a href='#'>&laquo;</a></li></ul>");

                if (data.last_page > 1) {
                    for (var i = 1; i <= data.last_page; i++) {
                        if (data.current_page == i) {
                            $(".pagination-sm").append("<li class='active'><a href='#'>" + i + " </a></li>");
                        }
                        else {
                            $(".pagination-sm").append("<li><a href='#'>" + i + " </a></li>");
                        }
                    }
                }
                else {
                    $(".pagination-sm").append("<li class='active'><a href='#'>1</a></li>");
                }

                $(".pagination-sm").append("<li class='disabled'><a href='#'>&raquo;</a></li>");

                $.each(data.data.slice(0, jumlah), function (i, data) {
                    $("#row").append("<tr><td>" + (i + 1) + "</td>" +
                            "<td>" + data.jurusan + "</td>" +
                            "<td><button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Edit(\"" + data.id + "\")'><i class='fa fa-edit'></i></button>" +
                            " <button type='button' class='btn btn-sm btn-default' style='margin-bottom: 10px;' onclick='Hapus(\"" + data.id + "\")'><i class='fa fa-trash-o'></i></button></td></tr>");
                })
            });
        }, 2200);
    }
</script>

@endsection()