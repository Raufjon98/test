<?php
session_start();
include 'conn.php';
if ($_SESSION['vkhod'] == 0) {
    header('location: login.php');
}

?>
<div class="col-lg-10 animated fadeInRight">
    <div class="mail-box-header">

<!--        <form method="get" action="" class="pull-right mail-search">-->


<!--        </form>-->

            <?php
            if (isset($_GET['mail']) and $_GET['mail'] == 'in' or isset($_GET['sol'])) {
                include 'in_mail.php';
            }elseif (($_GET['mail']) and $_GET['mail'] == 'send' or isset($_GET['year'])) {
                include "send_mail.php";
            }elseif (isset($_GET['id_file']) and $_GET['id_file'] == 'upload') {
                include 'mail_compose.php';
            }elseif (isset($_GET['id_doc'])) {
                include 'show_mailnew.php';
            }elseif (isset($_GET['mail']) and $_GET['mail'] == 'deleted' or $_GET['delete_year'] ){
                include 'trash.php';
            }elseif (isset($_GET['mail']) and $_GET['mail'] == 'important' or $_GET['important_year'] ){
            include 'important.php';
            }elseif (isset($_GET['mail']) and $_GET['mail'] == 'letter' or $_GET['letter_year'] ){
            include 'letter.php';
            }elseif (isset($_GET['mail']) and $_GET['mail'] == 'document' or $_GET['document_year'] ){
            include 'document.php';
            }elseif (isset($_GET['id_document'])) {
                include 'show_mailnew.php';
            }elseif (isset($_GET['id_download'])){
                include 'redact.php';
            }else{
                include "all_mail.php";
            }
//            else{
//                echo 'ИИИ Чо ксид Шумо иеее! Друс ка монид гашта вая!';
//            }
            ?>
    </div>
</div>
