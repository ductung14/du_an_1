<?php 

class HomeController
{
    public $modelProduct;

    public function __construct(){
      $this -> modelProduct = new Product();
    }
    public function home(){
      echo " Đây là home";
    }

    public function trangChu(){
      echo " Đây là Trang chủ";
    }

    public function listProduct(){
      $listProduct = $this->modelProduct->getAllProduct();
      var_dump($listProduct);
      require_once "./views/listProduct.php";
      die();
    }

}