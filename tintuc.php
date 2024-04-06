<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tin tức</title>
</head>

<body>
	<?php
	$conn=mysqli_connect("localhost","root","") 
		or die ("Không connect đc với máy chủ");
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");
	$sql_select_lop= "SELECT * FROM `tintuc`";
	$result_se_lop=mysqli_query($conn, $sql_select_lop);
	$tong_bg=mysqli_num_rows($result_se_lop);
	
	$stt_tt=0;
while($row=mysqli_fetch_object($result_se_lop))
{
	$stt_tt++;
	$id_tt[$stt_tt]=$row->id_tt;
	$tentt[$stt_tt]=$row->tentt;
	$nd[$stt_tt]=$row->nd;
	$hinhanh[$stt_tt]=$row->hinhanh;
}
	?>
	<table width="705" height="131" border="1" align="center">
  <tbody>
    <tr>
      <td colspan="7" align="center">TIN TỨC</td>
    </tr>
    <tr>
      <td colspan="7" align="right"><a href="themtintuc.php">Thêm tin tức</a></td>
    </tr>
    <tr>
      <td width="94">STT</td>
      <td width="86">Tên tin tức</td>
     
      <td width="203">Link bài viết</td>
      <td>Hình ảnh minh họa</td>
      <td>&nbsp;</td>
    </tr>
     <?php
	  $link = "$row";
      $encodedLink = htmlentities($link);
	  for($i=1;$i<=$tong_bg;$i++)
	  {
		  ?>
    <tr>
		<td align="center"><?php echo $i?></td>
		<td align="center"><?php echo $tentt[$i]?></td>
     	<td align="center"><a href="$encodedLink<?php echo $nd[$i] ?>">Đọc</a></td>
		 <td align="center"><img src="anhs/<?php echo $hinhanh[$i] ?>"  width = "100px" height="100px" ></td>
		<td width="89"><a href="tt_sua.php?id_tt=<?php echo $id_tt[$i]?>">Sửa</a> |<a href="tt_xem.php?id_tt=<?php echo $id_tt[$i]?>">Xem</a></td>
		
    </tr>
	  <?php 
	  }
	  ?>
    </tr>
    <tr>
      <td colspan="7" align="right">Có tổng số <?php echo $tong_bg?> tin tức</td>
    </tr>
  </tbody>
</table>

</body>
</html>