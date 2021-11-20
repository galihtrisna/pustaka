<?php

include 'koneksi.php';

	
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // fetch file to download from database
    $sql = "SELECT * FROM data_buku WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'file/' . $file['file_buku'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('file/' . $file['file_buku']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();
        
        readfile('file/' . $file['file_buku']);

    }

}
$conn->close();