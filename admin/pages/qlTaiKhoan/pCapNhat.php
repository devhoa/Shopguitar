<form action="pages/qlTaiKhoan/xlCapNhat.php" method="get">
     <fieldset class ="capnhatTaiKhoan">
         <legend>Update account </legend>
         <?php 
             if(isset($_GET["id"]))
             {
                 $id = $_GET["id"];
                 $sql = "SELECT TenDangNhap , MaLoaiTaiKhoan FROM TaiKhoan WHERE MaTaiKhoan = $id";
                 $result = DataProvider::ExecuteQuery($sql);
                 $row = mysqli_fetch_array($result);
                 $TenDangNhap =$row["TenDangNhap"];
                 $MaLoaiTaiKhoan =$row["MaLoaiTaiKhoan"];

             }
          ?>
          <div class="Ten" >
              <span>Name User : </span>
              <input type="text" value=" <?php echo $TenDangNhap;?>"/>
              
          </div>
          <div >
              <span>Loại Tài Khoản :</span>
              <select name="cmbLoaiTaiKhoan">
                  <?php 
                      $sql ="SELECT * FROM LoaiTaiKhoan";
                      $result = DataProvider::ExecuteQuery($sql);
                      while ($row = mysqli_fetch_array($result))
                      {
                          if($row["MaLoaiTaiKhoan"]==$MaLoaiTaiKhoan )
                            echo "<option value='".$row["MaLoaiTaiKhoan"]."'selected>".$row["TenLoaiTaiKhoan"]."</option>";
                         else 
                            echo "<option value='".$row["MaLoaiTaiKhoan"]."'>".$row["TenLoaiTaiKhoan"]."</option>";
                      }
                  ?>
              </select>
              <input type="hidden" name="id" value="<?php echo $id;?>"/>
          </div>
          <div >
              <input type ="submit"value="Cập nhật"/>
          </div>
     </fieldset>
</form>