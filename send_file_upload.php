<?php
/**
 * PHPMailer simple file upload and send example.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

$msg = '';
if (array_key_exists('email', $_POST)) {
    // First handle the upload
    // Don't trust provided filename - same goes for MIME types
    // See http://php.net/manual/en/features.file-upload.php#114004 for more thorough upload validation
    $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256','muks.pdf'));
        // Upload handled successfully
        // Now create a message
        var_dump('muks',$_POST['email']);
        require './vendor/autoload.php';
        $mail = new PHPMailer;
        $mail->setFrom('from@example.com', 'First Last');
        $mail->addAddress($_POST['email'], 'John Doe');
        $mail->Subject = 'PHPMailer file sender';
        $mail->Body = 'My message body';
        // Attach the uploaded file
        $mail->addAttachment($uploadfile, 'My uploaded file');
        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $msg .= "Message sent to !".$_POST['email'];
        }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Auto send file to email</title>
</head>
<body>
<?php if (empty($msg)) { ?>
    <form method="post" enctype="multipart/form-data">
        <input type="email" value="" name="email" placeholder="enter email address here e.g muks@gmil.com">
        <input type="submit" value="Send File" >
    </form>
<?php } else {
    echo $msg;
} ?>
</body>
</html>
