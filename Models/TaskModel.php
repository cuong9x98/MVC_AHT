<?php 
namespace MVC\Models;

use MVC\Core\Model;

class TaskModel extends Model
{
    // Khai bao protected de lop con co the dung bien lop cha
    protected $id=null;
    protected $title=null;
    protected $description=null;
    protected $updated_at=null;
    protected $created_at=null;
    //Get set Id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    //Get set Title
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    //Get set description
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }

    //Get set Create
    public function getCreateat()
    {
        return $this->created_at;
    }
  
    public function setCreateat($updated_at)
    {
        $this->create_at = $create_at;
    }

    //Get set Update
    public function getUpdateat()
    {
        return $this->updated_at;
    }
    public function setUpdateat($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
