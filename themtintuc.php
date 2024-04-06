<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XE</title>
    <script src="ckeditor5/ckeditor.js"></script>
    <script src="ckeditor5/ckfinder/ckfinder.js"></script>
</head>
<body>
    <form method="POST" action="themtintuc_save.php" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td colspan="3" align="center">Thêm tin tức mới</td>
            </tr>
            <tr>
                <td width="200">ID</td>
                <td width="241"><input type="text" name="id_tt" ></td>
            </tr>
            <tr>
                <td width="200">Tên tin tức</td>
                <td><input type="text" name="tentintuc" ></td>
            </tr>
            <tr>
                <td width="200" height="47">Link bài viết</td>
              <td><input type="text" name="linkbaiviet" ></td>
            </tr>
            <tr>
                <td width="200" height="45">Hình ảnh minh họa</td>
              <td><input type="file" name="hinhanh" ></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Gửi"/></td>
            </tr>
        </table>
    </form>
    <script>
       

        ClassicEditor
            .create(document.querySelector('#post_content'), {
                ckfinder: {
                  uploadUrl: 'connector.php'
                }
            })
            .then(editor => {
                console.log("Editor 2 created:", editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
