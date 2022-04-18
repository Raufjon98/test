<?php
$filename = "./test.zip";
if (file_exists($filename)){
    unlink($filename);
}

$zip = new ZipArchive();

if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
    exit("cannot open <$filename><br>");
}

$files = array();

if ($handle = opendir('.')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
            array_push($files, $entry);
        }
    }

    closedir($handle);
}

foreach ($files as $file) {
    $zip->addFile($file);
}

$zip->close();

$za = new ZipArchive();

$za->open($filename);

echo "numFiles: " . $za->numFiles . "<br>";
echo "status: " . $za->status  . "<br>";
echo "statusSys: " . $za->statusSys . "<br>";
echo "filename: " . $za->filename . "<br>";
echo "comment: " . $za->comment . "<br>";