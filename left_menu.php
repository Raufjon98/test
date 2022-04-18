<?php
session_start();
include 'conn.php';

if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');
}
?>
<div class="col-lg-2">
    <div class="ibox float-e-margins">
        <div class="ibox-content mailbox-content">
            <div style="margin: 1%">
                <div>
                    <?php
                    //                print_r($_SESSION);
                    $nat=$conn->query("Select * from users_tmp WHERE user_id=".$_SESSION['user_id']."");
                    $row=mysqli_fetch_assoc($nat);
                    echo "<img  class='img-circle' src='".$row['image']."' width='70' height='70' />";
                    ?>
                </div>
                <div>
                    <?php
                    echo $row['fio'];
                    $quantity=0;
                    $where_me_on_group = " or (gm.group_id=l.receiver AND gm.user_id=" . $_SESSION['user_id'] . ")";
                    $nat = $conn->query("SELECT l.unical, d.date_order, d.document_name, d.comments, l.sender, DATE_FORMAT (d.input_date, '%d.%m.%Y %H:%i:%s') AS input_date, l.receiver, l.is_file, l.is_group, d.document_id, d.document_path, d.file_name  FROM letter l 
                    INNER JOIN documents d ON l.document_id=d.document_id WHERE (l.receiver=" . $_SESSION['user_id'] . " or l.receiver=0) AND l.is_group=0  " . $where . " and l.sender!=" . $_SESSION['user_id'] . " and l.document_status!=0 GROUP BY l.unical
                    
                    UNION ALL
                        
                    SELECT l.unical, d.date_order, d.document_name, d.comments, l.sender, DATE_FORMAT (d.input_date, '%d.%m.%Y %H:%i:%s') AS input_date, l.receiver, l.is_file, l.is_group, d.document_id, d.document_path, d.file_name  FROM letter l 
                    INNER JOIN documents d ON l.document_id=d.document_id 
                    INNER JOIN groups g ON l.group_id=g.group_id
                    INNER JOIN group_members gm ON g.group_id=gm.group_id
                    WHERE l.is_group=1 AND ((l.receiver =" . $_SESSION['user_id'] . " or l.receiver=0)" . $where_me_on_group . ") " . $where . "  and l.sender!=" . $_SESSION['user_id'] . " and l.document_status!=0 GROUP BY l.unical ORDER BY input_date desc ");
                    while ($row = mysqli_fetch_assoc($nat)) {
                        $nat1 = $conn->query("select * from saw where user_id=" . $_SESSION['user_id'] . " and document_id='" . $row['unical'] . "' limit 1");
                        $row_saw = mysqli_fetch_assoc($nat1);
                        if (($row_saw['user_id'] == $_SESSION['user_id']) && ($row_saw['document_id'] == $row['unical']) or $row['sender'] == $_SESSION['user_id']) {
                        } else {
                            $quantity++;
                        }
                    }

                    ?>
                </div>
            </div>
            <br>
            <div class="file-manager">
                <a class="btn btn-block btn-primary compose-mail" href="index.php?id_file=upload">Навиштани мактуб</a>
                <div class="space-25"></div>
                <ul class="folder-list m-b-md" style="padding: 0">
                    <li><a href="index.php?mail=in" title="Мактубҳои қабулшуда"> <i class="fa fa-inbox "></i> Қабулшуда <span class="badge badge-light"><?if($quantity>0) echo $quantity?></span></a> </li>
                    <li><a href="index.php?mail=send" title="Мактубҳои фиристодашуда"> <i class="fa fa-envelope-o"></i> Фиристодашуда</a></li>
                    <li><a href="index.php?mail=important" title="Мактубҳои муҳим"> <i class="fa fa-certificate"></i> Муҳим</a></li>
                    <li><a href="index.php?mail=deleted" title="Мактубҳои хориҷшуда"> <i class="fa fa-trash-o"></i> Партов</a></li>
                </ul>
                <h5>Категорияҳо</h5>
                <ul class="category-list" style="padding: 0">
                    <li><a href="index.php?mail=letter" title="Фақат мактубҳо"> <i class="fa fa-circle text-navy"></i> Мактуб </a></li>
                    <li><a href="index.php?mail=document" title="Фақат ҳуҷҷатҳо"> <i class="fa fa-circle text-danger"></i> Ҳуҷҷат</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>