
<?php
require('fpdf.php');

$pdf = new FPDF();
if (array_key_exists('content', $_POST)) {
$content = $_POST['content'];
$content = $_POST['content2'];
$attacment = $content.''.$content;
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$attacment);
$pdf->Output('F','./muks.pdf');
header('location:./send_file_upload.php');
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Create email attachment</title>
</head>
<body>
<?php if (empty($msg)) { ?>
    <form method="post" enctype="multipart/form-data">
        <input type="text" value="" name="content" placeholder="create attacment">
        <input type="text" value="" name="content2" placeholder="create attacment">
        <input type="submit" value="create attacment" >
    </form>
<?php } else {
    echo $msg;
} ?>
</body>
</html>
