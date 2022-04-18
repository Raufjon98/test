<?php
session_start();
include 'conn.php';
if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DPDTT | Mailbox</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">


    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg" style="margin: 0; height: auto">
        <?php
        include 'top_menu.php';

        ?>
        <div class="wrapper wrapper-content">
            <div class="row">
                <?php
                include 'left_menu.php';
                include 'center_menu.php';
                //                ?>
            </div>
        </div>
        <?php
        include 'footer.php'
        ?>
    </div>
</div>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/print/jQuery.print.js"></script>
<script type='text/javascript'>
    $(function () {
        $("#printable").find('.print').on('click', function () {
            $.print("#printable");
        });
    });
    $(function () {
        $("#printable1").find('.print').on('click', function () {
            $.print("#printable1");
        });
    });
</script>


<!-- SUMMERNOTE -->
<!--<script src="js/plugins/summernote/summernote.min.js"></script>-->
<!---->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!---->
<!--        $('.summernote').summernote();-->
<!--        $('.summernote').summernote({-->
<!--            airMode: true-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->

<script src="js/plugins/summernote/summernote.min.js"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>

<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="js/plugins/select2/select2.full.min.js"></script>
<script>
    $(document).ready(function () {
        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2();
        $(".select2_demo_3").select2({
            placeholder: "Select a state",
            allowClear: true
        });
    });
</script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });
</script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<script>
    $(function () {
        $(document).ready(function () {
            $("#all_people").hide();
            ('#human_checkbox').checked = true;
            $('#group_checkbox').on('ifChecked', function () {
                ('#group_checkbox').checked = true;
                $("#group").show();
                $("#person").hide();
                $("#people").hide();
                $("#all_people").hide();

            });
        });
    })
</script>
<script>
    $(function () {
        $(document).ready(function () {
            $("#group").hide();
            $("#people").hide();
            $('#human_checkbox').on('ifChecked', function () {
                ('#human_checkbox').checked = true;
                $("#person").show();
                $("#group").hide();
                $("#people").hide();
                $("#all_people").hide();

            });
        });
    })
</script>
<script>
    $(function () {
        $(document).ready(function () {
            $("#group").hide();
            $('#people_checkbox').on('ifChecked', function (event) {
                ('#people_checkbox').checked = true;
                $("#people").show();
                $("#group").hide();
                $("#person").hide();
                $("#all_people").hide();

            });
        });
    })
</script>
<script>
    $(function () {
        $(document).ready(function () {
            $("#group").hide();
            $('#all_people_checkbox').on('ifChecked', function (event) {
                ('#all_people_checkbox').checked = true;
                $("#all_people").show();
                $("#people").hide();
                $("#group").hide();
                $("#person").hide();
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
    $("#g_member").hide();
    $('.select_group').on('ifChecked', function () {
//    $('.select_group').click(function () {
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
                    $('#members').append($('<div id="div-' + g_id + '" class="alert alert-success alert-dismissible"  align="center"  ></div>'));
                    $("#div-" + g_id).append($('<h4>', {
                        id: "inp-" + g_id,
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
    });
    $('.select_group').on('ifUnchecked', function () {
        var g_id = $(this).attr('value');
        $("#div-" + g_id).remove('');
    });
</script>
<!--<script>-->
<!--    $(function () {-->
<!--        $('.delete_show').click(function(){-->
<!--            var  id = $(this).attr('id');-->
<!--            $.ajax({-->
<!--                type: 'post',-->
<!--                url: 'mail_status.php',-->
<!--                data:{-->
<!--                    id_delete: id-->
<!--                }-->
<!--            });-->
<!--            location.reload();-->
<!--        });-->
<!--        $('.delete_mail').on('ifChecked', function () {-->
<!--            var id_mail = $(this).attr('id');-->
<!--            $('#delete_message').click(function () {-->
<!--                $.ajax({-->
<!--                    type: 'POST',-->
<!--                    url: 'mail_status.php',-->
<!--                    data: {-->
<!--                        id_delete: id_mail-->
<!--                    }-->
<!--                });-->
<!--                location.reload();-->
<!--            });-->
<!--            $('#important_mail').click(function () {-->
<!--                $.ajax({-->
<!--                    type: 'POST',-->
<!--                    url: 'mail_status.php',-->
<!--                    data: {-->
<!--                        id_important: id_mail-->
<!--                    }-->
<!--                });-->
<!--                location.reload();-->
<!--            });-->
<!--            $('#not_important_mail').click(function () {-->
<!--                $.ajax({-->
<!--                    type: 'POST',-->
<!--                    url: 'mail_status.php',-->
<!--                    data: {-->
<!--                        id_not_important: id_mail-->
<!--                    }-->
<!--                });-->
<!--                location.reload();-->
<!--            });-->
<!--        });-->
<!--        $('#refresh').click(function(){-->
<!--            location.reload();-->
<!--        })-->
<!--    });-->
<!--</script>-->

<script>
    $(function () {
        $('.delete_show').click(function () {
            $('.delete_show').prop('disabled', false);

            var id = $(this).attr('id');
            $.ajax({
                type: 'post',
                url: 'mail_status.php',
                data: {
                    id_delete: id
                }
            });
            location.reload();
        });
        $('#delete_message').click(function () {
            $IDs = $("#example1 input:checkbox:checked").map(function () {
                return $(this).attr("id");
            }).get();
                    $.ajax({
                    type: 'POST',
                    url: 'mail_status.php',
                    data: {
                        id_delete: $IDs
                    }
                });
                location.reload();
            });
            $('#important_mail').click(function () {
                $IDs = $("#example1 input:checkbox:checked").map(function () {
                    return $(this).attr("id");
                }).get();
                $.ajax({
                    type: 'POST',
                    url: 'mail_status.php',
                    data: {
                        id_important: $IDs
                    }
                });
                location.reload();
            });
            $('#not_important_mail').click(function () {
                $IDs = $("#example1 input:checkbox:checked").map(function () {
                    return $(this).attr("id");
                }).get();
                $.ajax({
                    type: 'POST',
                    url: 'mail_status.php',
                    data: {
                        id_not_important: $IDs
                    }
                });
                location.reload();
            });

        $('#refresh').click(function () {
            location.reload();
        })
    });
</script>
<script>
    $('.clear').click(function () {
        $('.select_group').iCheck('uncheck');
        $("#g_member").empty();
        $("#group_names").empty();
        $("#g_member").hide();
        $('.alert-dismissible').remove();
    });
</script>
<script>

    $('.ShowMembers').click(function () {
        $('.select_group').iCheck('uncheck');
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

                $.each(arr, function (index, value) {
                    $("#g_member").append($('<li>',
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
<script src="js/plugins/toastr/toastr.min.js"></script>
<script>
    $(document).ready(function () {


        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };


        if (getUrlParameter('mail') === "saved") {

            toastr.success('Мактуби Шумо бо муваффақият сабт гардид!')

        }
    });
    $('#showsimple').click(function () {
        var mb = $('#comment').text()
    });
    $('#showsimple').click(function () {
        // Display a success toast, with a title

    });

    function getLastToast() {
        return $toastlast;
    }

    $('#clearlasttoast').click(function () {
        toastr.clear(getLastToast());
    });
    $('#cleartoasts').click(function () {
        toastr.clear();
    });
</script>


<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script>
    $("#validation_mail").hide();
    $('INPUT[type="file"]').change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'JPG':
            case 'JPEG':
            case 'jpeg':
            case 'PNG':
            case 'png':
            case 'doc':
            case 'DOC':
            case 'docx':
            case 'DOCX':
            case 'zip':
            case 'ZIP':
            case 'pdf':
            case 'PDF':
            case 'rar':
            case 'RAR':
            case 'txt':
            case 'TXT':
            case 'xls':
            case 'XLS':
            case 'xlsx':
            case 'XLSX':
            case 'pptx':
            case 'PPTX':
            case 'ppt':
            case 'PPT':
            case 'pptm':
            case 'PPTM':
                $('#uploadedfile').attr('disabled', false);
                $("#validation_mail").hide();
                break;
            default:
//                alert('Формати нодурусти файл интихоб карда шуд!');
                swal({
                    title: "Формат нодуруст аст!",
                    text: "Файли намудаш дурустро интихоб кунед!",
                    type: "warning",
//                        showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK!",
//                        closeOnConfirm: false,
                    closeOnCancel: false,
                });
                $("#validation_mail").show();
                this.value = '';
        }


    });
</script>
<script>
    $(function () {
        $('form').submit(function () {
            var isOk = true;
            $('input[type=file][data-max-size]').each(function () {
                if (typeof this.files[0] !== 'undefined') {
                    var maxSize = parseInt($(this).attr('max-size'), 10),
                        size = this.files[0].size;
                    isOk = maxSize > size;
                    return isOk;
                }
            });
            return isOk;
        });
    });
</script>
<script src="js/plugins/sweetalert/sweetalert.min.js"></script>

</body>
</html>
