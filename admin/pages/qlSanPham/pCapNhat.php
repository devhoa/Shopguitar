<?php 
    if(!isset($_GET["id"]))
        DataProvider::ChangeURL("index.php?c=404");
    $id = $_GET["id"];
    $sql = "SELECT s.MaSanPham,s.TenSanPham,s.HinhURL,s.GiaSanPham,s.NgayNhap,s.SoLuongTon,s.SoLuongBan,
    s.SoLuocXem,s.MoTa,s.BiXoa,s.MaHangSanXuat,s.MaLoaiSanPham,l.TenLoaiSanPham,h.TenHangSanXuat FROM SanPham s, LoaiSanPham l, HangSanXuat h WHERE 
    s.MaLoaiSanPham =l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaSanPham =$id ";
     $result = DataProvider::ExecuteQuery($sql);
     $row = mysqli_fetch_array($result);
?>
<form action ="pages/qlSanPham/xlCapNhat.php" method="post" onsubmit="return KiemTra();"enctype="multipart/form-data">
      <fieldset class ="capnhatSanPham" border=1>
          <legend>Cập nhật thông tin sản phẩm mới </legend>
          <div >
               <span>Tên hãng sản xuất : </span>
               <input type="text" name ="txtTen" id="txtTen"/>
               <i id="errorTen"></i>
          </div>
           <div >
                <span>Hãng sản xuất : </span>
                <select name="cmbHang">
                    <?php 
                        $sql= "SELECT *FROM HangSanXuat where BiXoa=0";
                        $result =DataProvider::ExecuteQuery($sql);
                        while($row1 =mysqli_fetch_array($result))
                        {
                            ?>
                                <option value="<?php echo $row1["MaHangSanXuat"];?>"<?php if($row["MaHangSanXuat"]==$row1["MaHangSanXuat"]) echo "selected";?>>
                                 <?php echo $row1["TenHangSanXuat"];?> </option>
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
                        while($row1 =mysqli_fetch_array($result))
                        {
                            ?>
                                <option value="<?php echo $row1["MaLoaiSanPham"];?>"<?php if($row["MaLoaiSanPham"]==$row1["MaLoaiSanPham"]) echo "selected";?>>
                                <?php echo $row1["TenLoaiSanPham"];?></option>
                            <?php
                        }
                    ?>
                </select>
           </div>
           <div>
               <span>Hình :</span>
               <input type="file" name="fHinh" id="fHinh"/><br/>
               <img src="../images/<?php echo $row["HinhURL"];?>"width ="75"/>
           </div>
           <div>
               <span>Giá :</span>
               <input type="text" name="txtGia"id="txtGia"value="<?php echo $row["GiaSanPham"];?>"/>
               <i id="errGia"></i>
           </div>
           <div>
               <span>Số Lượng tồn :</span>
               <input type="text" name="txtTon"id="txtTon"value="<?php echo $row["SoLuongTon"];?>"/>
               <i id="errTon"></i>
           </div>
           <div>
               <span>Số Lượng bán :</span>
               <input type="text" name="txtBan"id="txtBan"value="<?php echo $row["SoLuongBan"];?>"/>
               <i id="errBan"></i>
           </div>
           <div>
               <span>Mô tả :</span>
               <textarea name="txtMoTa"id="txtMoTa"><?php echo $row["MoTa"];?></textarea>
           </div>
           <div class="capnhat" >
               <input type="hidden" name="id" value="<?php echo $row["MaSanPham"];?>"/>
               <input type="submit" value="Cập Nhật"/>
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