<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm Tin tức</title>
</head>

<body>
    <?php
    // Kiểm tra xem các trường cần thiết có được gửi từ form hay không
    if(isset($_REQUEST["id_tt"]) && isset($_REQUEST["tentintuc"]) && isset($_REQUEST["linkbaiviet"]) && isset($_FILES["hinhanh"])) {
        $id_tt = $_REQUEST["id_tt"];
        $tentintuc = $_REQUEST["tentintuc"];
        $linkbaiviet = $_REQUEST["linkbaiviet"];
        
        $uploadDir_img_logo = "anhs/";
        
        $file_tmp = $_FILES['hinhanh']['tmp_name'];
        $file_name = $_FILES['hinhanh']['name'];
        $file__name__ = uniqid() . '_' . $file_name; // Tạo tên file mới để tránh trùng lặp
        
        if(move_uploaded_file($file_tmp, $uploadDir_img_logo.$file__name__)) {
            // Nếu upload file thành công
            $conn = mysqli_connect("localhost", "root", "", "btcknhom5") or die("Không thể kết nối với máy chủ");
            
            // Sử dụng prepared statement để tránh SQL injection
            $sql = $conn->prepare("INSERT INTO `tintuc` (`id_tt`, `tentt`, `nd`, `hinhanh`) VALUES (?, ?, ?, ?)");
            $sql->bind_param("ssss", $id_tt, $tentintuc, $linkbaiviet, $file__name__);
            $sql->execute();
            
            $sql->close();
            $conn->close();
            
            header("Location: tintuc.php");
            exit();
        } else {
            echo "Có lỗi xảy ra khi upload file.";
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin và chọn file hình ảnh.";
    }
    ?>
</body>
</html