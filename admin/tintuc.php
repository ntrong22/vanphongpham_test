<link rel="stylesheet" href="css/hienthi_sp.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
	include ('../include/connect.php');
	
    $select = "select * from tintuc ";
    $query = $link->query($select);
    $dem = mysqli_num_rows($query);
?>
<div class="quanlysp">
	<h3>QUẢN LÝ TIN TỨC</h3>
	<a href='?admin=themtt' style="color:blue;" >Thêm tin tức</a><br>
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> tin tức</p>
	<form action="admin.php?admin=xulytt" method="post">
		<div id="check">
			<p>
				<input type="submit" name="xoa" value="Xóa" />

			</p>
		</div>
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
		<td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>ID</td>
        <td>Tiêu đề</td>
        <td>Nội dung ngắn</td>
        <td>Hình ảnh</td>
        <td>Tác giả</td>
        <td>Active</td>
    </tr>

    <?php
	


		if(!isset($_GET['page'])){  
		$page = 1;  
		} else {  
		$page = $_GET['page'];  
		}  

	
		$max_results = 10;  


		$from = (($page * $max_results) - $max_results);  

	

		$sql = $link->query("SELECT * FROM tintuc order by matt DESC LIMIT $from, $max_results"); 



								
    if($dem > 0)
        while ($bien = mysqli_fetch_array($sql))
        {
?>
            <tr class='noidung_hienthi_sp'>
				<td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$bien['matt']?>"/></td>
                <td class="masp_hienthi_sp" width="30"><?php  echo $bien['matt'] ?></td>
                <td class="stt_hienthi_sp"><?php echo $bien['tieude'] ?></td>
                <td class="img_hienthi_sp" width="300"> <?php echo $bien['ndngan'] ?>  </td>
				<td class="sl_hienthi_sp"><img src="../img/tintuc/<?php echo $bien['hinhanh'] ?>" width="80" height="60"/></td>
				<td class="sl_hienthi_sp"><?php echo $bien['tacgia'] ?></td>
                <td class="active_hienthi_sp">
                    <a href='?admin=suatt&matt=<?php echo $bien['matt'] ?>'><img src="img/sua.png" title="Sửa"></a>
				 </td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có khách hàng</td></tr>";
	
?>
</table>
</form>
	<div id="phantrang_sp">
	
	<?php

			$total_results = mysqli_num_rows($link->query("SELECT * FROM tintuc"));  


			$total_pages = ceil($total_results / $max_results);  



			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthitt&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthitt&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  

	
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthitt&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>