<?php 
namespace MVC\Core;

use MVC\Config\Database;

class ResourceModel implements ResourceModelInterface{
    protected $id = null;
    protected $model = null;
    protected $table = null;
    //function _khoi tao
    public function _init($table, $id, $model)
    {
        $this->id = $id;
        $this->model = $model;
        $this->table = $table;
    }
    // function save dung de add va sua database
    public function save($model)
    {
        $arrModel= $model->getProperties();
        $placeholder=[];
        $insert_key=[];
        $placeUpdate=[];
        if ($model->getId()===null){
            // get name colunm and value colunm
            foreach ($arrModel as $key => $value) {
                $insert_key[] =$key;
                array_push($placeholder, ':'.$key);
            }
            //Convert array to string
            $strKeyIns= implode(', ',$insert_key);
            $strPlaceholder=implode(', ',$placeholder);
            //insert
            $sql_insert="INSERT INTO $this->table ({$strKeyIns}) VALUES ({$strPlaceholder})";
            $obj_insert =Database::getBdd()->prepare($sql_insert);
            return $obj_insert->execute($arrModel);
        } else {
            foreach ($arrModel as $key => $item) {
                if($key=='created_at'){
                    continue;
                }
                $insert_key[] =$key;
                array_push($placeUpdate, $key. '='. "'$item'");
            }
            //update
            $strPlaceUpdate=implode(', ',$placeUpdate);
            $sql_update="UPDATE {$this->table} SET {$strPlaceUpdate} WHERE id={$model->getId()}";
            // var_dump($sql_update);
            $obj_update=Database::getBdd()->prepare($sql_update);
            return $obj_update->execute($arrModel);
        }
    }
    //function delete data with $sql_delete is query sql and prepare is check name table and id, getBdd connect db,execute run query
    public function delete($id){
        $sql_delete = "DELETE FROM $this->table WHERE id=$id";
        $obj_delete = Database::getBdd()->prepare($sql_delete);
        return $obj_delete->execute();
    }
    public function getAll()
    {
        $sql_select = "SELECT * FROM $this->table";
        $obj_select = Database::getBdd()->prepare($sql_select);
        $obj_select->execute();
        return $obj_select->fetchAll();
    }
    public function find($id)
    {
        $sql_find = "SELECT * FROM $this->table WHERE id = $id";
        $obj_find = Database::getBdd()->prepare($sql_find);
        $obj_find->execute();
        return $obj_find->fetch();
    }
}
