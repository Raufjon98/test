<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
session_start();
include 'conn.php';
$uniq='';

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
//    echo  $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK;
    if (!empty($_FILES['uploadedFile']['name'][0]) ) {
//        var_dump($_FILES['uploadedFile']['name'][0]);
        $total_count = count($_FILES['uploadedFile']['name']);
        $uniq=uniqid();
        for ($i = 0; $i < $total_count; $i++) {
        //    echo "<pre>" . print_r(, true) . "</pre>";
            $doc_name = strip_tags($_POST['doc_name']);
            $comment = $_POST['comment'];
            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'][$i];
            $fileName = $_FILES['uploadedFile']['name'][$i];
            $fileSize = $_FILES['uploadedFile']['size'][$i];
            $fileType = $_FILES['uploadedFile']['type'][$i];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = uniqid('file_') .'.'.  $fileExtension;
            //md5(time() . $fileName);
            $allowedfileExtension = array('png', 'jpg', 'doc', 'zip', 'pdf', 'rar', 'txt', 'docx', 'xls', 'xlsx', 'pptx', 'ppt', 'pptm');
            if (in_array($fileExtension, $allowedfileExtension)) {
                $uploadFileDir = 'uploaded_files';
                $dest_path = $uploadFileDir ."/". $newFileName;
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $message = 'File succesfully uploaded!';

                } else {
                    $message = 'Error on moving file.';
                }
                if (!empty($_POST['persons']) && ($_POST['check'] == 'human_checkbox')) {
                    foreach ($_POST['persons'] as $item) {
                        $sqlquery = "INSERT INTO documents(file_name, document_name, document_path, comments, user_id,input_date, user_status, extension, date_order, document_status) 
                              VALUES ('$newFileName','$doc_name','$uploadFileDir','$comment','" . $_SESSION['user_id'] . "', now(),'" . $_SESSION['status'] . "','$fileExtension', now(), 1)";
                        $nat = $conn->query($sqlquery);
                        $doc_id = mysqli_insert_id($conn);
                        $sql_letter = " insert into letter (is_group, receiver, sender, document_id, is_file, unical, document_status) values 
                                (0,'" . $item . "','" . $_SESSION['user_id'] . "','" . $doc_id . "',true, '$uniq',1)";
                        $result = $conn->query($sql_letter);
                    }
                } elseif (!empty($_POST['department']) && ($_POST['check'] == 'group_checkbox')) {
                    foreach ($_POST['department'] as $item) {
                        $sqlquery = "INSERT INTO documents(file_name, document_name, document_path, comments, user_id,input_date, user_status,  extension, date_order, document_status) 
                            VALUES ('$newFileName','$doc_name','$uploadFileDir','$comment','" . $_SESSION['user_id'] . "', now(),'" . $_SESSION['status'] . "', '$fileExtension', now(), 1)";
                        $nat = $conn->query($sqlquery);
                        $doc_id = mysqli_insert_id($conn);
                        $sql_letter = " insert into letter (is_group, receiver, sender, document_id, group_id, is_file, unical, document_status ) values 
                            (1,'" . $item . "','" . $_SESSION['user_id'] . "','" . $doc_id . "','" . $item . "', true, '$uniq', 1)";
                        $result = $conn->query($sql_letter);
                    }
                } elseif (!empty($_POST['creategroup']) && ($_POST['check'] == 'people_checkbox')) {
                    foreach ($_POST['creategroup'] as $item) {
                        $sqlquery = "INSERT INTO documents(file_name, document_name, document_path, comments, user_id,input_date, user_status,  extension, date_order, document_status) 
                              VALUES ('$newFileName','$doc_name','$uploadFileDir','$comment','" . $_SESSION['user_id'] . "', now(),'" . $_SESSION['status'] . "','$fileExtension', now(), 1)";
                        $nat = $conn->query($sqlquery);
                        $doc_id = mysqli_insert_id($conn);
                        $sql_letter = " insert into letter (is_group, receiver, sender, document_id, is_file, unical, document_status) values 
                                (0,'" . $item . "','" . $_SESSION['user_id'] . "','" . $doc_id . "',true, '$uniq', 1)";
                        $result = $conn->query($sql_letter);
                    }
                } elseif ($_POST['check'] == 'all_people_checkbox') {
                    $sqlquery = "INSERT INTO documents(file_name, document_name, document_path, comments, user_id, input_date, user_status,  extension, date_order, document_status) 
                              VALUES ('$newFileName','$doc_name','$uploadFileDir','$comment','" . $_SESSION['user_id'] . "', now(),'" . $_SESSION['status'] . "','$fileExtension', now(), 1)";
                    $nat = $conn->query($sqlquery);
                    $doc_id = mysqli_insert_id($conn);
                    $sql_letter = " insert into letter (is_group, receiver, sender, document_id, is_file, unical, document_status) values 
                                (0,0,'" . $_SESSION['user_id'] . "','" . $doc_id . "',true, '$uniq', 1)";
                    $result = $conn->query($sql_letter);

                }
//            else {
//                echo "Qabulkunandai maktub nomuayyan!";
//            }
            } else {
                $err_mes = '404';
            }
        }
    } else {
//        var_dump($_POST);
        $doc_name = strip_tags($_POST['doc_name']);
        $comment = $_POST['comment'];
        $uniq=uniqid();

        if (!empty($_POST['persons']) && ($_POST['check'] == 'human_checkbox')) {
            foreach ($_POST['persons'] as $item) {
                $sqlquery = "INSERT INTO documents( document_name,  comments, user_id, input_date, user_status, extension, date_order, document_status) 
                  VALUES ('$doc_name','$comment','" . $_SESSION['user_id'] . "', now(),'" . $_SESSION['status'] . "','$fileExtension', now(), 1)";
                $nat = $conn->query($sqlquery);
                $doc_id = mysqli_insert_id($conn);
               $sql_letter= " insert into letter (is_group, receiver, sender, document_id, is_file, unical, document_status) values 
                         (0,'" . $item . "','" . $_SESSION['user_id'] . "','" . $doc_id . "', false, '$uniq', 1 )";
                $result = $conn->query($sql_letter);
            }
        } elseif (!empty($_POST['department']) && ($_POST['check'] == 'group_checkbox')) {
            foreach ($_POST['department'] as $item) {
                $sqlquery = "INSERT INTO documents( document_name,  comments, user_id, input_date, user_status,  extension, date_order, document_status) 
                VALUES ('$doc_name','$comment','" . $_SESSION['user_id'] . "', now(),'" . $_SESSION['status'] . "','$fileExtension', now(), 1)";
                $nat = $conn->query($sqlquery);
                $doc_id = mysqli_insert_id($conn);
                $sql_letter = " insert into letter (is_group, receiver, sender, document_id, group_id, is_file, unical, document_status) values 
                (1,'" . $item . "','" . $_SESSION['user_id'] . "','" . $doc_id . "','" . $item . "',false, '$uniq',1 )";
                $result = $conn->query($sql_letter);
            }
        } elseif (!empty($_POST['creategroup']) && ($_POST['check'] == 'people_checkbox')) {
            foreach ($_POST['creategroup'] as $item) {
                $sqlquery = "INSERT INTO documents( document_name,  comments, user_id, input_date, user_status, extension, date_order, document_status) 
                  VALUES ('$doc_name','$comment','" . $_SESSION['user_id'] . "', now(),'" . $_SESSION['status'] . "','$fileExtension', now(), 1)";
                $nat = $conn->query($sqlquery);
                $doc_id = mysqli_insert_id($conn);
                $sql_letter = " insert into letter (is_group, receiver, sender, document_id, is_file, unical, document_status) values 
                         (0,'" . $item . "','" . $_SESSION['user_id'] . "','" . $doc_id . "', false, '$uniq', 1)";
                $result = $conn->query($sql_letter);
            }
        } elseif ($_POST['check'] == 'all_people_checkbox') {
            $sqlquery = "INSERT INTO documents( document_name,  comments, user_id, input_date, user_status, extension, date_order, document_status) 
                  VALUES ('$doc_name','$comment','" . $_SESSION['user_id'] . "', now(),'" . $_SESSION['status'] . "','$fileExtension', now(), 1)";
            $nat = $conn->query($sqlquery);
            $doc_id = mysqli_insert_id($conn);
            $sql_letter = " insert into letter (is_group, receiver, sender, document_id, is_file, unical, document_status) values 
                         (0,0,'" . $_SESSION['user_id'] . "','" . $doc_id . "', false, '$uniq', 1)";
            $result = $conn->query($sql_letter);

        } else {
            echo "Qabulkunandai maktub nomuayyan!";
        }
    }
} else {
    echo "Ном ва эзоҳи ҳуҷҷатро ҳатман ворид кунед!";
}
if ($err_mes != "") {
//    echo $err_mes;
    header("location: index.php?id_file=upload&mess=" . $err_mes . "");
    die();
} else {
   header('location: index.php?mail=saved');
}

?>