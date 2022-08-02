<?php
    class Product{
        var $id;
        var $num;
    }
    class ShoppingCart{
        var $listProduct;
        public function __construct()
        {
            $this->listProduct = array();
        }
        public function update($id, $newNum){
            for($i=0; $i<count($this->listProduct); $i++){
                if($this->listProduct[$i]->id==$id){
                    $this->listProduct[$i]->num = $newNum;
                }
            }
        }
        public function delete($id){
            for($i=0; $i<count($this->listProduct); $i++){
                if($this->listProduct[$i]->id==$id){
                    array_splice($this->listProduct,$i,1);
                }
            }
        }
        public function add($id){
            if(count($this->listProduct)==0){
                $p=new Product();
                $p->id = $id;
                $p->num = 1;
                $this->listProduct[]=$p;
            }
            else{
            // da co san pham trong gio hang roi
            // can kiem tra san pham do da ton tai trong gio hang chua
            // neu da co roi thi chi can cap nhat so luong len 1
            // neu chua co thi them moi san pham do vao gio hang
                for($i=0; $i<count($this->listProduct); $i++){
                    if($this->listProduct[$i]->id==$id){
                    break;
                    }
                }
                if($i==count($this->listProduct)){
                // da duyet het gio hang ma khong co san pham can them vao
                // them san pham moi vao gio hang
                    $p = new Product();
                    $p->id = $id;
                    $p->num = 1;
                    $this->listProduct[]=$p;
                }
                else{
                    $this->listProduct[$i]->num++;
                }
            }
        
        }
    }
?>