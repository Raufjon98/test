<?php
session_start();
include 'conn.php';

if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');
}
?>
<div class="mail-box">
    <div class="input-group col-md-12" >
        <!--                <input type="text" class="form-control input-sm" name="search" placeholder="">-->

        <h2 class="col-md-4">
            <b> Мактубҳо </b>
        </h2>
        <div class="input-group-btn">
            <button id="refresh" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left"
                    title="Азнавсозии саҳифа"><i class="fa fa-refresh"></i> Азнавсозӣ
            </button>
            <button id="not_important_mail" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Озодкунии мактуб!"><i class="fa fa-times-circle"></i></button>
            <button id="important_mail" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Ҳамчун муҳим қайд намудан"><i class="fa fa-exclamation"></i></button>
            <button id="delete_message" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Хориҷ кардан"><i class="fa fa-trash-o"></i></button>
        </div>

    </div>
    <?php
    $quantity=0;
    $sql_sol = "SELECT DATE_FORMAT(input_date, '%Y') sol  FROM   documents d
    INNER join letter l on d.document_id=l.document_id 
    INNER JOIN group_members gm ON gm.user_id=l.receiver or gm.group_id=l.receiver or l.receiver=0
    where ((l.receiver=" . $_SESSION['user_id'] . " or l.receiver=0) or (gm.group_id=l.receiver AND gm.user_id=" . $_SESSION['user_id'] . ") and l.sender!=" . $_SESSION['user_id'] . ") and l.document_status=1 GROUP BY sol";
    $result_sol = $conn->query($sql_sol);
    while ($row_sol = mysqli_fetch_assoc($result_sol)) {
        echo "<a href='?sol=" . $row_sol['sol'] . "'>" . $row_sol['sol'] . "</a>&nbsp ";
    }
    $where_me_on_group = " or (gm.group_id=l.receiver AND gm.user_id=" . $_SESSION['user_id'] . ")";
    if (isset($_GET['sol'])) {
        $sol = $_GET['sol'];
        $where = "and DATE_FORMAT(input_date, '%Y')=" . $sol . "";
    } else $where = '';
    $nat = $conn->query("SELECT l.unical, d.date_order, d.document_name, d.comments, l.sender, DATE_FORMAT (d.input_date, '%d.%m.%Y %H:%i:%s') AS input_date, l.receiver, l.is_file, l.is_group, d.document_id, d.document_path, d.file_name  FROM letter l 
    INNER JOIN documents d ON l.document_id=d.document_id WHERE (l.receiver=" . $_SESSION['user_id'] . " or l.receiver=0) AND l.is_group=0  " . $where . " and l.sender!=" . $_SESSION['user_id'] . " and l.document_status=1 GROUP BY l.unical
    
    UNION ALL
        
    SELECT l.unical, d.date_order, d.document_name, d.comments, l.sender, DATE_FORMAT (d.input_date, '%d.%m.%Y %H:%i:%s') AS input_date, l.receiver, l.is_file, l.is_group, d.document_id, d.document_path, d.file_name  FROM letter l 
    INNER JOIN documents d ON l.document_id=d.document_id 
    INNER JOIN groups g ON l.group_id=g.group_id
    INNER JOIN group_members gm ON g.group_id=gm.group_id
    WHERE l.is_group=1 AND ((l.receiver =" . $_SESSION['user_id'] . " or l.receiver=0)" . $where_me_on_group . ") " . $where . "  and l.sender!=" . $_SESSION['user_id'] . " and l.document_status=1 GROUP BY l.unical ORDER BY input_date desc ");
    echo "<table id='example1' class='table table-striped table-bordered table-hover dataTables-example'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th style='width: 10px'></th>";
    echo "<th>Аз тарафи кӣ</th>";
    echo "<th style='width: auto'>Номи ҳуҷҷат</th>";
    echo "<th>Барои кӣ</th>";
    echo "<th>Сана</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    $i = 1;
    while ($row = mysqli_fetch_assoc($nat)) {
        echo "<tr >";
        echo "<td> <input id='".$row['unical']."' type='checkbox' class='i-checks delete_mail'></td>";
//        echo "<td>" . $i . "</td>";
        $i++;
        $zapros = "select get_fio(" . $row['sender'] . ") as firist";
        $natija = $conn->query($zapros);
        $satr = mysqli_fetch_assoc($natija);
        echo "<td>" . $satr['firist'] . "</td>";
        if ($row['is_file'] == 1) {
            if (strlen($row['document_name'] . "</a> </b><comment> - </comment>" . (strip_tags($row['comments']))) > 75) {
                echo "<td width='40%' ><div class='col-md-10'><b><a href='index.php?id_document=" . $row['unical'] . "'>" . mb_substr($row['document_name'] . "</a> </b><comment> - </comment>" . (strip_tags($row['comments'])), 0, 75) . "<comment>...</comment></div>&nbsp<div class='col-md-1' align='right' style='margin-left: 5%'><h3><i class='fa fa-paperclip'></i></a></h3></div> </td>";
            } else {
                echo "<td width='40%'><div class='col-md-10'><b><a href='index.php?id_document=" . $row['unical'] . "'>" . $row['document_name'] . "</a> </b><comment> - </comment>" . strip_tags($row['comments']) . "</div><div class='col-md-1' align='right' style='margin-left: 5%'><h3><i class='fa fa-paperclip'></i ></a></h3> </div></td>";
            }
        } else {
            if (strlen($row['document_name'] . "</a> </b><comment> - </comment>" . (strip_tags($row['comments']))) > 75) {
                echo "<td width='40%'><div class='col-md-11'> <b> <a href='index.php?id_doc=" . $row['unical'] . "'>" . mb_substr($row['document_name'] . "</a></b><comment> - </comment>" . (strip_tags($row['comments'])), 0, 75) . "<comment>...</comment></div></td>";
            } else {
                echo "<td width='40%'><div class='col-md-11'> <b><a href='index.php?id_doc=" . $row['unical'] . "'>" . $row['document_name'] . "</a></b><comment> - </comment>" . strip_tags($row['comments']) . "</div></td>";
            }
        }
        echo "<td><div style=' height: 40px; overflow-y: auto;overflow-x: auto;'> ";
        $sql_receiver=$conn->query ("select * from letter where unical='".$row['unical']."' group by receiver" );
        while ($receiverow=mysqli_fetch_assoc($sql_receiver)){
            if ($receiverow['is_group'] == 1) {
                $sql3 = "select get_groupname(" . $receiverow ['receiver'] . ") as groupname";
                $result3 = $conn->query($sql3);
                $row3 = mysqli_fetch_assoc($result3);
                echo  $row3['groupname'] . "</br>";
            } elseif ($receiverow['is_group'] == 0) {
                $darkhost = "select get_fio(" . $receiverow['receiver'] . ") as fio";
                $javob = $conn->query($darkhost);
                $sutun = mysqli_fetch_assoc($javob);
                if ($receiverow['receiver'] == $_SESSION['user_id']) {
                    echo "Шумо<br>";
                } else {
                    echo  $sutun['fio'] . "</br>";
                }
            }
        }
        $nat1 = $conn->query("select * from saw where user_id=" . $_SESSION['user_id'] . " and document_id='" . $row['unical'] . "' limit 1");
        $row_saw = mysqli_fetch_assoc($nat1);
        if (($row_saw['user_id'] == $_SESSION['user_id']) && ($row_saw['document_id'] == $row['unical']) or $row['sender'] == $_SESSION['user_id']) {
            echo "<td>" . $row ['input_date'] . "</td>";
        } else {
            echo "<td>". $row ['input_date'] . "<br><span class='right badge badge-info'>Навтарин</span></td>";
        }
    }
    echo "</tbody>";
    echo "</table>";;
    ?>

</div>