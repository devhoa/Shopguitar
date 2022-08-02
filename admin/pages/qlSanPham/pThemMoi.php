<form action ="pages/qlSanPham/xlThemMoi.php" method="post" onsubmit="return KiemTra();"enctype="multipart/form-data">
      <fieldset class ="themSanPham">
          <legend>Thêm sản phẩm mới </legend>
          <div >
               <span>Tên hãng sản xuất : </span>
               <input type="text" name ="txtTen" id="txtTen"/>
               <i id="errorTen"></i>
          </div>
           <div >
                <span>Hãng sản xuất :</span>
                <select name="cmbHang">
                    <?php 
                        $sql= "SELECT *FROM HangSanXuat where BiXoa=0";
                        $result =DataProvider::ExecuteQuery($sql);
                        while($row =mysqli_fetch_array($result))
                        {
                            ?>
                                <option value="<?php echo $row["MaHangSanXuat"];?>"><?php echo $row["TenHangSanXuat"];?></option>
                            <?php
                        }
                    ?>
                </select>
           </div>
           <div >
                <span>Loại sản phẩm :</span>
                <select name="cmbLoai">
                    <?php 
                        $sql= "SELECT *FROM LoaiSanPham where BiXoa=0";
                        $result =DataProvider::ExecuteQuery($sql);
                        while($row =mysqli_fetch_array($result))
                        {
                            ?>
                                <option value="<?php echo $row["MaLoaiSanPham"];?>"><?php echo $row["TenLoaiSanPham"];?></option>
                            <?php
                        }
                    ?>
                </select>
           </div>
           <div>
               <span>Hình :</span>
               <input type="file" name="fHinh" id="fHinh"/>
           </div>
           <div>
               <span>Giá :</span>
               <input type="text" name="txtGia"id="txtGia"/>
               <i id="errGia"></i>
           </div>
           <div>
               <span>Số Lượng tồn :</span>
               <input type="text" name="txtTon"id="txtTon"/>
               <i id="errTon"></i>
           </div>
           <div>
               <span>Mô tả :</span>
               <textarea name="txtMoTa" id="txtMoTa"></textarea>
           </div>
           <div class="btnThem">
               <input type="submit" value="Thêm mới"/>
           </div>

      </fieldset>
</form>
<script type="text/javascript">
      function KiemTra()
      {
        var ten =document.getElementById("txtTen");
         var err =document.getElementById("errTen");
         if(ten.value=="")
         {
             err.interHTMl ="Tên sản phẩm không được rỗng";
             ten.focus();
             return false;
         }
         else 
            err.interHTML ="";

         var ten =document.getElementById("txtGia");
         var err =document.getElementById("errGia");
         if(ten.value=="")
         {
             err.interHTMl ="Giá sản phẩm không được rỗng";
             ten.focus();
             return false;
         }
         else 
            err.interHTML ="";

         var ten =document.getElementById("txtTon");
         var err =document.getElementById("errTon");
         if(ten.value=="")
         {
             err.interHTMl ="Số lượng sản phẩm Tồn không được rỗng";
             ten.focus();
             return false;
         }
         else 
            err.interHTML ="";

        return true;
      }
</script>