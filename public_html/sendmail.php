
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameRm = $_POST["name"];
    $emailRm = $_POST["email"];
    $phoneRm = $_POST["phone"];
    $positionRm = $_POST["position"];
    $coverLetterRm = $_POST["cover-letter"];

    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $attachment = $_FILES['resume']['tmp_name'];
        $attachmentName = $_FILES['resume']['name'];
        // ...
    } else {
        // Xử lý khi không có tệp tin được tải lên
        echo 'Có lỗi xảy ra khi gửi file không được';
    }


    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP(); // Sử dụng SMTP để gửi mail
        $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
        $mail->SMTPAuth = true; // Bật xác thực SMTP
        $mail->Username = 'khanhyou2018@gmail.com'; // Tài khoản email
        $mail->Password = 'sagrijfcylxerzyj'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $mail->Port = 465; // Cổng kết nối SMTP là 465

        //Recipients
        $mail->setFrom($emailRm.trim(), $nameRm.trim()); // Địa chỉ email và tên người gửi
        $mail->addAddress('khanhyou2018@gmail.com','khanh'); // Địa chỉ mail và tên người nhận

        //Content
        $mail->isHTML(true); // Set email format to HTML
        // Thêm tệp tin đính kèm vào email
        $mail->addAttachment($attachment, $attachmentName);
        $mail->Subject = 'Ứng tuyển vị trí: ' . $position; // Tiêu đề
        $mail->Body = "Họ và tên: $nameRm <br>"
                    . "Email: $emailRm <br>"
                    . "Số điện thoại: $phoneRm <br>"
                    . "Vị trí ứng tuyển: $positionRm <br>"
                    . "Nội dung: $coverLetterRm"; // Nội dung

        $mail->send();
        echo 'Gửi thành công!';
    } catch (Exception $e) {
        echo 'Có lỗi xảy ra khi gửi. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>