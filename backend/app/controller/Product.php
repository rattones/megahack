<?php
namespace app\controller;

use core\system\Controller;
use app\model\ProductModel;

class Product extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $product= new ProductModel();
        $arr= $product->list();
        
        self::response(200, $arr);
    }

    public function get(string $sku)
    {
        $product= new ProductModel();
        $arr= $product->get($sku);
        
        self::response(200, (array)$arr);
    }

    public function create()
    {
        $data= self::_POST();
        $product= new ProductModel();
        $arr= $product->insert($data);

        self::response(200, (array)$arr);
    }

    public function set(string $sku)
    {
        $data= self::_POST();
        $product= new ProductModel();
        $arr= $product->update($sku, $data);

        self::response(200, (array)$arr);
    }

    public function delete(string $sku) 
    {
        $product= new ProductModel();
        $arr= $product->delete($sku);

        self::response(200, (array)$arr);        
    }

    public function search()
    {
        $data= self::_POST('term');
        $product= new ProductModel();
        $arr= $product->search($data['term']);

        self::response(200, $arr);
    }
}