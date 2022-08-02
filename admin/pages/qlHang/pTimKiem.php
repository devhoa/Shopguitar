<table cellspacing="0" border="1">
    <tr>
    <th width ="100">STT </th>
        <th width ="300">Tên Hãng Sản Xuất </th>
        <th width ="100">Tình Trạng </th>
        <th width ="200">Thao Tác</th>
        
    </tr>
    <?php 
        if(!isset($_POST["txtTim"]))
            DataProvider::ChangeURL("index.php?c=404");
        $id = $_POST["txtTim"];
        $sql = $sql = "SELECT * FROM hangsanxuat WHERE TenHangSanXuat like '%$id%'";
        $result = DataProvider::ExecuteQuery($sql);
        $i =1 ;
        while ($row = mysqli_fetch_array($result))
        {
            ?>
                <tr class="<?php echo $c;?>">
                    <td><?php echo $i++?></td>
                    <td><?php echo $row["TenHangSanXuat"];?></td>
                    <td>
                      <?php 
                      if($row["BiXoa"]==1)
                           echo "<img src='images/locked.png'/>";
                      else 
                           echo "<img src='images/active.png'/>"; 
                      ?>    
                  </td>
                  <td>
                      <a href="pages/qlHang/xlKhoa.php?id=<?php echo $row["MaHangSanXuat"];?>">
                         <img src="images/lock.png"/>
                     </a>
                     <a href="index.php?c=4&a=2&id=<?php echo $row["MaHangSanXuat"];?>">
                         <img src="images/edit.png"/>
                     </a>
                  </td>
                </tr>
                <?php
        }
    ?>
</table>