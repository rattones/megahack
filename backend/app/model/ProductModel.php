<?php
namespace app\model;

use core\system\Model;

class ProductModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list() : array 
    {
        $query= "select * from produto";
        $resultSet= $this->execute($query);
        
        $return= [];
        while ( $row= $resultSet->fetchObject() )
        {
            $return[]= $row;
        }

        return $return;
    }

    public function get(string $sku) : \stdClass
    {
        $query= "select * from produto where sku = '{$sku}'";
        $resultSet= $this->execute($query);

        $return= $resultSet->fetchObject();
        return ($return)? $return: new \stdClass();
    }

    public function update(string $sku, array $data) : \stdClass 
    {
        $query= "update produto set ";

        $sets= [];
        foreach ( $data as $field=>$value ) {
            $sets[]= " {$field}= '{$value}' ";
        }
        $query.= implode(',', $sets);
        $query.= " where sku = '{$sku}'";
        $this->execute($query);

        return $this->get($sku); // fetching updated row and returning
    }

    public function insert(array $data) : \stdClass
    {
        $query= "insert into produto ( ";

        $fields= [];
        $values= [];
        foreach ($data as $field=>$value) {
            $fields[]= $field;
            if ( is_string($value) ) {
                $value= "\"$value\"";
            }
            $values[]= $value;
        }

        $query.= implode(', ', $fields);
        $query.= " ) values ( ";
        $query.= implode(', ', $values);
        $query.= " ) ";

        $this->execute($query);

        return $this->get($data['sku']);  // fetching inserted row and returning
    }

    public function delete(string $sku) : bool
    {
        $query= "delete from produto where sku = '{$sku}'";

        $resultSet= $this->execute($query);
        return ($resultSet->rowCount());
    }

    public function search(string $term) : array 
    {
        $query= "select * from produto where nome like '%{$term}%' or descricao like '%{$term}%'";
        $resultSet= $this->execute($query);

        $return= [];
        while ( $row= $resultSet->fetchObject() ) {
            $return[]= $row;
        }

        return $return;
    }

}