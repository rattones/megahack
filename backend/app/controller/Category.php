<?php
namespace app\controller;

use core\system\Controller;
use app\model\CategoryModel;

class Category extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $category= new CategoryModel();
        $arr= $category->list();
        
        self::response(200, $arr);
    }

    public function get(string $codigo)
    {
        $category= new CategoryModel();
        $arr= $category->get($codigo);
        
        self::response(200, (array)$arr);
    }

    public function create()
    {
        $data= self::_POST();
        $category= new CategoryModel();
        $arr= $category->insert($data);

        self::response(200, (array)$arr);
    }

    public function set(string $codigo)
    {
        $data= self::_POST();
        $category= new CategoryModel();
        $arr= $category->update($codigo, $data);

        self::response(200, (array)$arr);
    }

    public function delete(string $codigo) 
    {
        $category= new CategoryModel();
        $arr= $category->delete($codigo);

        self::response(200, (array)$arr);        
    }

    public function search()
    {
        $data= self::_POST('term');
        $category= new CategoryModel();
        $arr= $category->search($data['term']);

        self::response(200, $arr);
    }
}