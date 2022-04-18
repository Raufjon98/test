<?php
session_start();
include 'conn.php';
?>
<div id="printable">
    <?php
    if (!empty($_GET['id_document'])) {

    $query = "select * from letter where unical='" . $_GET['id_document'] . "'";
    $res = $conn->query($query);
    $rows = mysqli_fetch_assoc($res);
    if (empty($rows)) {
        echo "<h1><b>Истифодабарандаи гиромӣ! Амали мазкур ба шумо зебон нест!</b></h1>";
        EXIT;
    }
    $saw = $conn->query("insert into saw (id_saw, document_id, user_id, document_status,unicaly ) values (DEFAULT, '" . $_GET['id_document'] . "', " . $_SESSION['user_id'] . ",3,'" . $_SESSION['user_id'] . $_GET['id_document'] . "')");
    $zapros = ("select * from documents where document_id='" . $rows['document_id'] . "' group by document_name");
    $result = $conn->query($zapros);
    $row = mysqli_fetch_assoc($result);
    $id = $_GET['id_document'];
    $comment = $row['comments'];
    $name = $row['document_name'];
    $date = $row['input_date'];
    //    $nat = $conn->query("insert into saw (document_id, user_id, document_status,unicaly ) values ($id, " . $_SESSION['user_id'] . ",2," . $_SESSION['user_id'] . $id . " )");
    //    $nat1 = $conn->query("update documents set date_order=now() where document_id=$id");
    //    echo "<div class='col-md-10' style='height: 20px'><h2><b>" . $name . "</b></h2></div> ";
    //    echo "<div class='col-md-2' style='height: 20px'>" . $date . "</div>";
    //echo "<br><br>";
    //    echo "<p align='right'>" . $date . "</p>";?>
    <div class="pull-right tooltip-demo">
        <a href="index.php?id_download=<?= $_GET['id_document'] ?>" id=""
           class="btn btn-white btn-sm replyButton" data-toggle="tooltip"
           data-placement="top" title="Ҳамчун архив сабт намудан"><i class="fa fa-download"></i></a>
        <a href="index.php?id_file=upload&id_reply=<?= $row['user_id'] ?>" id="<? echo $row['user_id'] ?>"
           class="btn btn-white btn-sm replyButton" data-toggle="tooltip"
           data-placement="top" title="Ҷавоб додан"><i class="fa fa-reply"></i> Ҷавоб </a>
        <button class="btn btn-white btn-sm print" data-toggle="tooltip" data-placement="top"
                title="Чопи мактуб"><i class="fa fa-print"></i></button>
        <a href="index.php" class="btn btn-white btn-sm delete_show " id="<? echo $id ?>" data-toggle="tooltip"
           data-placement="top" title="Хориҷ кардан"><i class="fa fa-trash-o"></i> </a>
    </div>
    <?php
    echo "<h2><b>" . $name . "</b></h2> ";


    //        if ($rows['sender'] == $_SESSION['user_id'])
    //            echo "Ҳуҷҷати фиристодашуда";
    //        elseif ($rows['receiver'] == $_SESSION['user_id'] or $rows['receiver'] == 0) {
    //            echo "Ҳуҷҷати қабулшуда";
    //        }
    $sql_image = $conn->query("select image from users_tmp where user_id =" . $rows['sender'] . "");
    $row_image = mysqli_fetch_assoc($sql_image);
    $zapros = "select get_fio(" . $rows['sender'] . ") as firist";
    $natija = $conn->query($zapros);
    $satr = mysqli_fetch_assoc($natija);
    ?>
    <div class="mail-tools tooltip-demo m-t-md">
                <span class="pull-right font-normal"><?
                    echo $date; ?></span>
        <span class="font-normal">Аз: </span><br><?php
        if ($rows['sender'] == $_SESSION['user_id']) {
            echo "<td style='width: 40px; height: 30px'><img  class='img-circle' src='" . $row_image['image'] . "' style='height: 30px; width: 30px' /></td><td> Шумо</td>";
        } else {
            echo "<td style='width: 40px; height: 30px'><img  class='img-circle' src='" . $row_image['image'] . "' style='height: 30px; width: 30px' /></td><td>" . $satr['firist'] . "</td>";
        }

        ?>
    </div>
    <?
    echo "Барои: <br>";
    echo "<table>";
    echo "<tbody>";
    $queryReceiver = " SELECT l.is_group, l.receiver, u.image FROM letter l
       INNER JOIN documents d ON l.document_id =d.document_id
         LEFT JOIN users_tmp u ON l.receiver =u.user_id 
        where unical='" . $_GET['id_document'] . "' group by receiver";
    $natReceiver = $conn->query($queryReceiver);
    while ($rowReceiver = mysqli_fetch_assoc($natReceiver)) {
        echo "<tr>";
        if ($rowReceiver['is_group'] == 1) {
            $sql3 = "select get_groupname(" . $rowReceiver ['receiver'] . ") as groupname";
            $result3 = $conn->query($sql3);
            $row3 = mysqli_fetch_assoc($result3);
            echo "<td>" . $row3['groupname'] . "</td>";
        } elseif ($rowReceiver['is_group'] == 0) {
            $darkhost = "select get_fio(" . $rowReceiver['receiver'] . ") as fio";
            $javob = $conn->query($darkhost);
            while ($sutun = mysqli_fetch_assoc($javob)) {
                if ($rowReceiver['receiver'] == $_SESSION['user_id']) {
                    echo "<td style='width: 40px; height: 30px'><img  class='img-circle' src='" . $rowReceiver['image'] . "' style='height: 30px; width: 30px' /></td><td>Шумо</td> ";
                } elseif ($rowReceiver['receiver'] == 0) {
                    echo "<td>" . $sutun['fio'] . "</td>";
                } else {
                    echo "<td style='width: 40px; height: 30px'><img  class='img-circle' src='" . $rowReceiver['image'] . "' style='height: 30px; width: 30px' /></td><td>" . $sutun['fio'] . "</td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";


    echo "<br><br>";
    echo "<div class='mail-body ' >" . $comment . "</div>";
    ?>
</div>
<div class="mail-attachment">
    <!--        <p>-->
    <!--            <span><i class="fa fa-paperclip"></i> 2 attachments - </span>-->
    <!--            <a href="#">Download all</a>-->
    <!--            |-->
    <!--            <a href="#">View all images</a>-->
    <!--        </p>-->

    <div class="attachment">
        <?php
        //    $db=dbase_open ($row['document_path'] ."/". $row['file_name'] );
        //    echo "<a href=" . $row['document_path'] . $row['file_name'] . " >Дидани файл</a>";
        $doc_query = "SELECT * FROM letter l INNER JOIN documents d 
        ON d.document_id= l.document_id where unical='" . $_GET['id_document'] . "' GROUP BY file_name";
        $doc_nat = $conn->query($doc_query);
        while ($doc_row = mysqli_fetch_assoc($doc_nat)) {
            $show_query = "select * from documents where document_id ='" . $doc_row['document_id'] . "'";
            $show_nat = $conn->query($show_query);
            $show_row = mysqli_fetch_assoc($show_nat);
            ?>


            <div class="file-box">
                <div class="file">
                    <?php echo '<a href="' . $show_row['document_path'] . $show_row['file_name'] . '">' ?>
                    <span class="corner"></span>
                    <div class="icon">
                        <?php
                        if ($show_row['extension'] == 'png' or $show_row['extension'] == 'jpeg' or $show_row['extension'] == 'jpg') {
                            echo '<i class="fa fa-image"></i>';
                        } elseif ($show_row['extension'] == 'zip' or $show_row['extension'] == 'rar') {
                            echo '<i class="fa fa-file-archive-o"></i>';
                        } elseif ($show_row['extension'] == 'doc' or $show_row['extension'] == 'docx') {
                            echo '<i class="fa fa-file-word-o"></i>';
                        } elseif ($show_row['extension'] == 'xls' or $show_row['extension'] == 'xlsx') {
                            echo '<i class="fa fa-file-excel-o"></i>';
                        } elseif ($show_row['extension'] == 'pptx' or $show_row['extension'] == 'ppt' or $show_row['extension'] == 'pptm') {
                            echo '<i class="fa fa-file-powerpoint-o"></i>';
                        } elseif ($show_row['extension'] == 'pdf') {
                            echo '<i class="fa fa-file-pdf-o"></i>';
                        } elseif ($show_row['extension'] == 'txt') {
                            echo '<i class="fa fa-file-text"></i>';
                        }
                        ?>
                    </div>
                    <div class="file-name">
                        <?
                        echo '<a href="' . $show_row['document_path'] . "/" . $show_row['file_name'] . '" download>' . $show_row['document_name'] . "." . $show_row['extension'] . "</a>";
                        ?>
                    </div>
                    </a>
                </div>
            </div>


            <?
        }
        //    echo "<a href=" . $row['document_path'] . $row['file_name'] . " download>Cабт</a>";
        ?>
        <div class="clearfix"></div>
    </div>
</div>
<div id="printable1"><?php
    } elseif (!empty($_GET['id_doc'])) {
        $query1 = "select * from letter where unical='" . $_GET['id_doc'] . "'";
        $res1 = $conn->query($query1);
        $rows1 = mysqli_fetch_assoc($res1);
        if (empty($rows1)) {
            echo "<h1><b>Истифодабарандаи гиромӣ! Амали мазкур ба шумо зебон нест!</b></h1>";
            EXIT;
        }
        $zapros = ("select * from documents where document_id='" . $rows1['document_id'] . "' group by document_name");
        $result = $conn->query($zapros);
        $row = mysqli_fetch_assoc($result);
        $id_doc = $_GET['id_doc'];
        $comment = $row['comments'];
        $name = $row['document_name'];
        $date = $row['input_date'];
        $nat = $conn->query("insert into saw (id_saw, document_id, user_id, document_status,unicaly ) values (DEFAULT, '" . $_GET['id_doc'] . "', " . $_SESSION['user_id'] . ",3,'" . $_SESSION['user_id'] . $_GET['id_doc'] . "' )");
//        $nat1 = $conn->query("update documents set date_order=now() where document_id=$id_doc");
//    echo "<p align='right'>" . $date . "</p>";
        ?>
        <div class="pull-right tooltip-demo">
            <a href="index.php?id_file=upload&id_reply=<?= $row['user_id'] ?>" id=""
               class="btn btn-white btn-sm replyButton" data-toggle="tooltip"
               data-placement="top" title="Ҷавоб додан"><i class="fa fa-reply"></i> Ҷавоб </a>
            <button class="btn btn-white btn-sm print" data-toggle="tooltip" data-placement="top"
                    title="Чопи мактуб"><i class="fa fa-print"></i></button>
            <a href="index.php" class="btn btn-white btn-sm delete_show" id="<? echo $_GET['id_doc'] ?>"
               data-toggle="tooltip"
               data-placement="top" title="Хориҷ кардан"><i class="fa fa-trash-o"></i> </a>
        </div>
        <?php
        echo "<h2><b>" . $name . "</b></h2> ";


//        if ($rows1['sender'] == $_SESSION['user_id'])
//            echo "Ҳуҷҷати фиристодашуда";
//        elseif ($rows1['receiver'] == $_SESSION['user_id'] or $rows1['receiver'] == 0) {
//            echo "Ҳуҷҷати қабулшуда";
//        }
        $sql_image1 = $conn->query("select image from users_tmp where user_id =" . $rows1['sender'] . "");
        $row_image1 = mysqli_fetch_assoc($sql_image1);
        $zapros = "select get_fio(" . $rows1['sender'] . ") as firist";
        $natija = $conn->query($zapros);
        $satr = mysqli_fetch_assoc($natija);
        ?>
        <div class="mail-tools tooltip-demo m-t-md">

                <span class="pull-right font-normal"><?
                    echo $date; ?></span>
            <span class="font-normal">Аз: </span><br><?php
            if ($rows1['sender'] == $_SESSION['user_id']) {
                echo "<td style='width: 40px; height: 30px'><img  class='img-circle' src='" . $row_image1['image'] . "' style='height: 30px; width: 30px' /></td><td> Шумо</td>";
            } else {
                echo "<td style='width: 40px; height: 30px'><img  class='img-circle' src='" . $row_image1['image'] . "' style='height: 30px; width: 30px' /></td><td>" . $satr['firist'] . "</td>";
            }
            ?>
        </div>
        <?
        echo "Барои:<br>";
        echo "<table>";
        echo "<tbody>";
        $queryReceiver1 = " SELECT l.is_group, l.receiver, u.image FROM letter l
        INNER JOIN documents d ON l.document_id =d.document_id
         LEFT JOIN users_tmp u ON l.receiver =u.user_id 
        where unical='" . $_GET['id_doc'] . "' group by receiver";
        $natReceiver1 = $conn->query($queryReceiver1);
        while ($rowReceiver1 = mysqli_fetch_assoc($natReceiver1)) {
            echo "<tr >";
            if ($rowReceiver1['is_group'] == 1) {
                $sql3 = "select get_groupname(" . $rowReceiver1['receiver'] . ") as groupname";
                $result3 = $conn->query($sql3);
                $row3 = mysqli_fetch_assoc($result3);
                echo "<td>" . $row3['groupname'] . "</td>";
            } elseif ($rowReceiver1['is_group'] == 0) {
                $darkhost = "select get_fio(" . $rowReceiver1['receiver'] . ") as fio";
                $javob = $conn->query($darkhost);
                $sutun = mysqli_fetch_assoc($javob);
                if ($rowReceiver1['receiver'] == $_SESSION['user_id']) {
                    echo "<td style='width: 40px; height: 30px'><img  class='img-circle' src='" . $rowReceiver1['image'] . "' style='height: 30px; width: 30px' /></td><td>Шумо</td>";
                } elseif ($rowReceiver1['receiver'] == 0) {
                    echo "<td>" . $sutun['fio'] . "</td>";
                } else {
                    echo "<td style='width: 40px; height: 30px'><img  class='img-circle' src='" . $rowReceiver1['image'] . "' style='height: 30px; width: 30px' /></td><td>" . $sutun['fio'] . "</td>";
                }
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
//    echo "<br>";
        echo "<div class='mail-body'>" . $comment . "</div><br>";
//    echo $comment;
//    echo "<br>";
//    echo "\n";
    } ?></div>

