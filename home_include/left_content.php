﻿
 <div id="danhmucsp">
					<div class="center">
					<h4>Văn Phòng Phẩm</h4>
					<?php 
					   $sql="select * from danhmuc where dequi=0";
					   $result=$link->query($sql);
					?>
						<ul>
						<?php 
						   while($row=mysqli_fetch_array($result))
						   {
						?>
							<li><a href="index.php?madm=<?php echo $row['madm'] ?>"><?php echo $row["tendm"];?></a></li>
							<?php } ?>
							
							
						</ul>
					</div><!-- End .center -->
				</div>	<!-- End .menu-left -->
				
				
				<div id="phukien">
					<div class="center">
						<h4>Thiết Bị</h4>
						<?php 
					   $sql="select * from danhmuc where dequi=1";
					   $result=$link->query($sql);
					?>
						<ul>
						<?php 
						   while($row=mysqli_fetch_array($result))
						   {
						?>
							<li><a href="index.php?madm=<?php echo $row['madm'] ?>"><?php echo $row["tendm"];?></a></li>
							<?php } ?>
							
						</ul>
					</div><!-- End .center -->
				</div><!-- End .phukien -->	
				



				<!---------------------------->


				<div id="quangcao1">
					<div class="center">
						
						
						
					</div><!-- End .center -->
				</div><!-- End .quangcao1 -->

			