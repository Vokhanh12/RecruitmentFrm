<!DOCTYPE html>
<html>
<head>
    <title>Ứng tuyển Vị trí</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mt-4" enctype="multipart/form-data">
                    <h2 class="text-center">Ứng tuyển</h2>
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input type="tel" name="phone" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="position">Vị trí ứng tuyển:</label>
                        <select name="position" class="form-control" required>
                            <option value="Intern Java">Intern Java</option>
                            <option value="Fresher Java">Fresher Java</option>
                            <option value="Junior Java">Junior Java</option>
                            <option value="Senior Java">Senior Java</option>
                            <!-- Các tùy chọn khác -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Gửi CV:</label>
                        <input type="file" name="resume" class="form-control-file" required>
                    </div>

                    <div class="form-group">
                        <label for="cover-letter">Nội dung:</label>
                        <textarea name="cover-letter" rows="4" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Gửi ứng tuyển</button>
                </form>
            </div>
        </div>
    </div>

       
    <?php include __DIR__ . './public_html/sendmail.php'; ?>
</body>

</html>
