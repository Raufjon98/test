<?php
include 'conn.php';
if ($_SESSION['vkhod'] == 0) 	{
    header('location: login.php');
}
if (!empty($_GET['id_download'])) {

    $zip = new ZipArchive();

    if ($zip->open("test.zip", ZIPARCHIVE::CREATE) !== TRUE) {
        exit("cannot open <>\n");
    }

    $arr = array();
    $sql_load = $conn->query("SELECT d.file_name FROM letter l
                INNER JOIN documents d ON d.document_id=l.document_id
                WHERE unical='" . $_GET['id_download'] . "' GROUP BY file_name");
    while ($row_load = mysqli_fetch_assoc($sql_load)) {
        array_push($arr,"uploaded_files/". $row_load['file_name']);
    }
//    echo '<pre>';
//    print_r($arr);
//    echo '</pre>';

//add each files of $file_name array to archive
    foreach ($arr as $files) {
        $zip->addFile($files);
    }
    $zip->close();
//    echo '<pre>';
//    print_r($zip);
//    echo '</pre>';
//then send the headers to force download the zip file
    header('Content-Description: File Transfer');
    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=test.zip");
    header("Content-length: " . filesize('test.zip'));
    header('Cache-Control: must-revalidate');
    header("Pragma: public");
    header("Expires: 0");
    ob_clean();
    readfile("test.zip");
    unlink("test.zip");
}
?>