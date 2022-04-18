<?php
session_start();
include 'conn.php';
if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');
}
?>
<div class="wrapper">
    <div id="content" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ҳуҷҷатҳо</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a id="usedoc" href="index.php" class="accent-dark">Асосӣ</a>
                            </li>
                            <li class="breadcrumb-item active">Ҳуҷҷатҳо</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_GET['mail']) and $_GET['mail'] == 'out' or isset($_GET['year'])) {
                            include 'sender.php';
                        } elseif (isset($_GET['mail']) and $_GET['mail'] == 'in' or isset($_GET['sol'])) {
                            include 'receiver.php';
                        } elseif (isset($_GET['id_file']) and $_GET['id_file'] == 'upload') {
                            include 'add_file.php';
                        } elseif (isset($_GET['id_doc'])) {
                            include 'show_mail.php';
                        } elseif (isset($_GET['id_document'])) {
                            include 'show_mail.php';
                        } else {
                            $sql_sol = "SELECT DATE_FORMAT(input_date, '%Y') sol  FROM   documents d 
                              INNER JOIN letter l on d.document_id=l.document_id
                              INNER JOIN group_members gm ON gm.user_id=l.receiver or gm.group_id=l.receiver or l.receiver=0
                              WHERE l.sender=" . $_SESSION['user_id'] . " or (l.receiver=" . $_SESSION['user_id'] . " or receiver=0 or l.receiver=gm.group_id) GROUP BY sol";
                            $result_sol = $conn->query($sql_sol);
                            while ($row_sol = mysqli_fetch_assoc($result_sol)) {
                                echo "<a href='?god=" . $row_sol['sol'] . "'>" . $row_sol['sol'] . "</a>&nbsp";
                            }
                            $where_me_on_group = " or (gm.group_id=l.receiver AND gm.user_id=" . $_SESSION['user_id'] . ")";
                            if (isset($_GET['god'])) {
                                $sol = $_GET['god'];
                                $where = "and DATE_FORMAT(input_date, '%Y')=" . $sol . "";
                            } else $where = '';
                            $nat = $conn->query("SELECT d.date_order, d.document_name, d.extension, d.comments, l.sender, DATE_FORMAT (d.input_date, '%d.%m.%Y %H:%i:%s') AS input_date, l.receiver, l.is_file, l.is_group, d.document_id, d.document_path, d.file_name, 0 is_ready FROM letter l 
                            INNER JOIN documents d ON l.document_id=d.document_id WHERE l.sender=" . $_SESSION['user_id'] . " AND l.is_group=0  " . $where . " AND (l.receiver != 0 or l.receiver !=" . $_SESSION['user_id'] . ")
                           
                            UNION ALL
                             
                            SELECT d.date_order, d.document_name, d.extension, d.comments, l.sender, DATE_FORMAT (d.input_date, '%d.%m.%Y %H:%i:%s') AS input_date, l.receiver, l.is_file, l.is_group, d.document_id, d.document_path, d.file_name,0 is_ready  FROM letter l 
                            INNER JOIN documents d ON l.document_id=d.document_id WHERE  (l.receiver=" . $_SESSION['user_id'] . "  or l.receiver=0)  " . $where . " and l.sender !=" . $_SESSION['user_id'] . "
                            
                            UNION ALL
                              
                            SELECT d.date_order, d.document_name, d.extension, d.comments, l.sender, DATE_FORMAT (d.input_date, '%d.%m.%Y %H:%i:%s') AS input_date, l.receiver, l.is_file, l.is_group, d.document_id, d.document_path, d.file_name,0 is_ready  FROM letter l 
                            INNER JOIN documents d ON l.document_id=d.document_id 
                            INNER JOIN groups g ON l.group_id=g.group_id
                            WHERE l.is_group=1 AND l.sender =" . $_SESSION['user_id'] . "  " . $where . " and (l.receiver != 0 or l.receiver !=" . $_SESSION['user_id'] . ") 
                            
                            UNION ALL
                              
                            SELECT d.date_order, d.document_name, d.extension, d.comments, l.sender, DATE_FORMAT (d.input_date, '%d.%m.%Y %H:%i:%s') AS input_date,  l.receiver, l.is_file, l.is_group, d.document_id, d.document_path, d.file_name, ss.document_status is_ready  FROM letter l 
                             LEFT JOIN saw ss ON l.document_id=ss.document_id 
                            INNER JOIN documents d ON l.document_id=d.document_id 
                            INNER JOIN groups g ON l.group_id=g.group_id
                            INNER JOIN group_members gm ON g.group_id=gm.group_id
                            WHERE l.is_group=1 AND l.receiver =" . $_SESSION['user_id'] . " or l.receiver=0  " . $where_me_on_group . " " . $where . " and l.sender!=" . $_SESSION['user_id'] . " ORDER BY input_date desc ");
                            echo "<table id='example1' class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th style='width: 10px'>№</th>";
                            echo "<th>Аз тарафи кӣ</th>";
                            echo "<th style='width: auto'>Номи ҳуҷҷат</th>";
                            echo "<th >Барои кӣ</th>";
                            echo "<th style='width: auto'>Сана</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($nat)) {
                                echo "<tr >";
                                echo "<td>" . $i . "</td>";
                                $i++;
                                $zapros = "select get_fio(" . $row['sender'] . ") as firist";
                                $natija = $conn->query($zapros);
                                $satr = mysqli_fetch_assoc($natija);
                                if ($row['sender'] == $_SESSION['user_id']) {
                                    echo "<td>Шумо</td>";
                                } else {
                                    echo "<td>" . $satr['firist'] . "</td>";
                                }
                                if ($row['is_file'] == 1) {
                                    if (strlen($row['document_name'] . "</a> </b><comment> - </comment>" . (strip_tags($row['comments']))) > 75) {
                                        echo "<td><b><a href='index.php?id_document=" . $row['document_id'] . "'>" . mb_substr($row['document_name'] . "</a> </b><comment> - </comment>" . (strip_tags($row['comments'])), 0, 75) . "<comment>...</comment><br><h6><a href='" . $row['document_path'] . $row['file_name'] . "' download><i class='fa  fa-download' title='Сабт' style='color: rgb(16, 74, 90);'></i></a></h6> </td>";
                                    } else {
                                        echo "<td><b><a href='index.php?id_document=" . $row['document_id'] . "'>" . $row['document_name'] . "</a> </b><comment> - </comment>" . strip_tags($row['comments']) . "<br><h6><a href='" . $row['document_path'] . $row['file_name'] . "' download><i class='fa  fa-download' title='Сабт' style='color: rgb(16, 74, 90);'></i></a></h6> </td>";
                                    }
                                } else {
                                    if (strlen($row['document_name'] . "</a> </b><comment> - </comment>" . (strip_tags($row['comments']))) > 75) {
                                        echo "<td><b> <a href='index.php?id_doc=" . $row['document_id'] . "'>" . mb_substr($row['document_name'] . "</a></b><comment> - </comment>" . (strip_tags($row['comments'])), 0, 75) . "<comment>...</comment></td>";
                                    } else {
                                        echo "<td><b> <a href='index.php?id_doc=" . $row['document_id'] . "'>" . $row['document_name'] . "</a></b><comment> - </comment>" . strip_tags($row['comments']) . "</td>";
                                    }
                                }
                                if ($row['is_group'] == 1) {
                                    $sql3 = "select get_groupname(" . $row ['receiver'] . ") as groupname";
                                    $result3 = $conn->query($sql3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    echo "<td>" . $row3['groupname'] . "</td>";
                                } elseif ($row['is_group'] == 0) {
                                    $darkhost = "select get_fio(" . $row['receiver'] . ") as fio";
                                    $javob = $conn->query($darkhost);
                                    $sutun = mysqli_fetch_assoc($javob);
                                    if ($row['receiver'] == $_SESSION['user_id']) {
                                        echo "<td>Шумо</td>";
                                    } else {
                                        echo "<td>" . $sutun['fio'] . "</td>";
                                    }
                                }
                                $nat1 = $conn->query("select * from saw where user_id=" . $_SESSION['user_id'] . " and document_id=" . $row['document_id'] . " limit 1");
                                $row_saw = mysqli_fetch_assoc($nat1);
                                if (($row_saw['user_id'] == $_SESSION['user_id']) && ($row_saw['document_id'] == $row['document_id']) or $row['sender'] == $_SESSION['user_id']) {

                                    echo "<td>" . $row ['input_date'] . "</td>";
                                } else {
                                    echo "<td>" . $row ['input_date'] . "<br><span class='right badge badge-info'>Навтарин</span></td>";
                                }
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";;
                            ?>
                        <? } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
