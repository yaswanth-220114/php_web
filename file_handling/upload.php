<?php


if(isset($_GET['file'])) {

    $file_name = $_GET['file'];
    $file_path = "uploads/" . $file_name;

    if(file_exists($file_path)) {

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $file_name);
        header("Content-Length: " . filesize($file_path));

        readfile($file_path);
        exit;
    } else {
        echo "File not found!";
    }
}



$uploaded_file = "";

if(isset($_POST['upload'])) {
    $file = $_FILES['uploaded_file'];
    $file_name = $_FILES['uploaded_file']['name'];
    $tmp_name = $_FILES['uploaded_file']['tmp_name'];
    $file_size = $_FILES['uploaded_file']['size'];

    if(move_uploaded_file($tmp_name, 'uploads/'. $file_name)) {
        $uploaded_file = $file_name;
        echo "file size = ". $file_size;
        print_r($file);
        echo "<p style='color:green;'>File uploaded successfully!</p>";
    } else {
        echo "<p style='color:red;'>File upload failed!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload & Download</title>
</head>
<body>

<h2>Upload File</h2>

<form method="POST" enctype="multipart/form-data"> <!-- necessary to pass file data to the PHP script -->
    <input type="file" name="uploaded_file" required>
    <button type="submit" name="upload">Upload</button>
</form>

<?php
if($uploaded_file != "") {
    echo "<br><a href='?file=$uploaded_file'>Download File</a>";
    echo '<br><a href="uploads/' . $uploaded_file . '" target="_blank">View File</a>';
}
?>

</body>
</html>
