
<?php
$ftp_server = "d-werkpro.host-ed.eu";
$ftp_user_name = "u_spinlink";
$ftp_user_pass = "zPDPhSq38Q";
$ftp_port = "22622";
$destination_file = "/var/hpwsites/u_spinlink/website/html/webroot/SpinLinkMail/faces/";
$source_file = $_FILES['file']['tmp_name'];

// set up basic connection
$conn_id = ftp_connect($ftp_server,$ftp_port);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
// ftp passive cmd
ftp_pasv($conn_id, true);

// check connection
if ((!$conn_id) || (!$login_result)) { 
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
    exit; 
} else {
    echo "Connected to $ftp_server, for user $ftp_user_name";
}

// upload the file
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 

// check upload status
if (!$upload) { 
echo "FTP upload has failed!";
} else {
echo "Uploaded $source_file to $ftp_server as $destination_file";
}

// close the FTP stream 
ftp_close($conn_id);
?>