<?php
session_start();
if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');
}
include 'conn.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ҳуҷҷатҳо</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Datatable -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- select: style-->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <!--select bootstrap4-->
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<?php
include 'sidebar.php';
include 'leftmenu.php';
include 'content.php';
include 'footer.php';
?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
<script>
    $(function () {
        $(document).ready(function () {
            ('#human').checked = true;
            $("#grupp").click(function () {
                ('#group').checked = true;
                $("#gruppa").show();
                $("#shakhs").hide();
                $("#creategroup").hide();
            });
        });
    })
</script>
<script>
    $(function () {
        $(document).ready(function () {
            $("#gruppa").hide();
            $("#creategroup").hide();
            $("#human").click(function () {
                ('#human').checked = true;
                $("#shakhs").show();
                $("#gruppa").hide();
                $("#creategroup").hide();
            });
        });
    })
</script>
<script>
    $(function () {
        $(document).ready(function () {
            $("#gruppa").hide();
            $("#creategroup").hide();
            $("#creategroups").click(function () {
                ('#creategroups').checked = true;
                $("#creategroup").show();
                $("#gruppa").hide();
                $("#shakhs").hide();
            });
        });
    })
</script>

<script>
    function insert(elem) {
        var doc_id = $(elem).data('id');
        var comment = $(elem).data('cat');
        alert(comment);
        $.ajax({
            url: 'search.php',
            type: 'POST',
            data: {
                doc_id: doc_id,
                comment: comment
            },
            dataType: "json",
        })
    }
</script>
<script>
    $(function () {
        $(".download").click(function () {
            var doc_id = $(this).attr('id');
            $.ajax({
                url: 'search.php',
                type: 'POST',
                data: {doc_id: doc_id},
                dataType: "json",
            })
        })
    })
</script>
<script>
    $(function () {
        $(".see").click(function () {
            var ii = $(this).attr("data-message");
            $('#message1').text(ii);
            var doc_id = $(this).attr('id');
            $.ajax({
                url: 'search.php',
                type: 'POST',
                data: {doc_id: doc_id},
                dataType: "json",
            })
        })
    })
</script>
<script>
    $(function () {

        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            language: {
                "processing": "<b>Мунтазир шавед...</b>",
                "search": "Ҷустуҷӯ:",
                "lengthMenu": "<b>Намоиши <span class='text-danger'>_MENU_</span> Сабтҳо</b>",
                "info": "<b>Сабтҳо аз <span class='text-danger'>_START_</span> то <span class='text-danger'>_END_</span> аз <span class='text-danger'>_TOTAL_</span> сабтҳо</b>",
                "infoEmpty": "<b>Сабтҳо аз <span class='text-danger'>0</span> то <span class='text-danger'>0</span> аз <span class='text-danger'>0</span> сабтҳо</b>",
                "infoFiltered": "(филтронии <b><span class='text-danger'>_MAX_</span></b> сабтҳо)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Сабтҳо мавҷуд нестанд.",
                "emptyTable": "Дар ҷадвал маълумот мавҷуд нест",
                "paginate": {
                    "first": "Аввалин",
                    "previous": "Пешина",
                    "next": "Оянда",
                    "last": "Охирин>"
                }
            }
        });
    });
</script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script>
    $("#g_member").hide();
    $('.form-check-input').click(function () {
        $("#g_member").hide();
        $("#group_names").empty();
        var g_id = $(this).attr('value');
        if ($(this).is(':checked')) {
            $.ajax({
                type: 'GET',
                url: 'ajax.php',
                data: {
                    g_id: g_id
                },
                dataType: "json",
                success: function (data) {
                    $('#members').append($('<div id="div-' + g_id + '" class="alert alert-info alert-dismissible"  align="center" ></div>'));
                    $("#div-" + g_id).append($('<h5>',{
                        id: "inp-"+g_id,
                        text: data.g_name
                }));

                },
                error: function () {
                    alert('does not work');
                }
            })
        } else {
            $("#div-" + g_id).remove('');
        }
    })
</script>
<script>
    $('.clear').click(function(){
        $(".form-check-input").prop("checked", false);
        $("#g_member").empty();
        $("#group_names").empty();
        $("#g_member").hide();
        $('.alert-dismissible').remove();
    });
    </script>
    <script>

    $('.ShowMembers').click(function () {
        $(".form-check-input").prop("checked", false);
        $("#g_member").empty();
        $("#g_member").show();

        $('.alert-dismissible').remove();
        var group_id = $(this).attr('id');
        $.ajax({
                type: 'GET',
                url: 'ajax.php',
                data: {
                    group_id: group_id
                },
                success: function (data) {
                    var arr = jQuery.parseJSON(data);

                    $.each(arr, function(index, value) {
                        $("#g_member").append($('<option>',
                            {
                                text: value['user_name']
                            }));
                    });
                },
                error: function () {
                    alert('does not work');
                }
            })
    })
</script>
<!---->
<!--<script>-->
<!--    $('.form-check-input').click(function () {-->
<!--        $(".mems").show();-->
<!--        $("#g_member").hide();-->
<!--        var id_this = $(this).attr('value');-->
<!--        if ($(this).is(':checked')) {-->
<!--            $.ajax({-->
<!--                type: 'GET',-->
<!--                url: 'ajax.php',-->
<!--                data: {-->
<!--                    id_this: id_this-->
<!--                },-->
<!--                success: function (data) {-->
<!--                    var arr = $.parseJSON(data);-->
<!--                    var i = 0;-->
<!--                    $('#members').append($('<div id="div-' + id_this + '" class="mems"></div>',-->
<!--                        {-->
<!--                            class: 'col-md-4'-->
<!--                        }));-->
<!--                    $("#div-" + id_this).append($('<select></select>',-->
<!--                        {-->
<!--                            size: 3,-->
<!--                            id: "sel"+id_this,-->
<!--                            class: 'form-control',-->
<!--                        }-->
<!--                    ));-->
<!--                    while (i <= arr.length) {-->
<!--//                        $("#members").append(arr[i]['user_name'] + '<br>');-->
<!--                        $("#sel"+id_this).append($('<option>',-->
<!--                            {-->
<!--                                id : "opt"+id_this,-->
<!--                                text: arr[i]['user_name'],-->
<!--                            }));-->
<!--                        i++;-->
<!--                    }-->
<!--                    $("#members").append($('<br>'))-->
<!--                },-->
<!--                error: function () {-->
<!--                    alert('does not work');-->
<!--                }-->
<!--            })-->
<!--        } else {-->
<!--            $("#div-" + id_this).html('');-->
<!--        }-->
<!--    })-->
<!--</script>-->

</body>
</html>
