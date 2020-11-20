<?php 
namespace MVC\Models;

use MVC\Models\TaskResoucreModel;

class TaskReponsitory {
    private $taskResoucreModel;
    function __construct(){
        $this->taskResoucreModel = new TaskResoucreModel();
    }
    // function add
    public function add($model)
    {
        return $this->taskResoucreModel->save($model);
    }
    // function delete
    public function delete($id)
    {
        return $this->taskResoucreModel->delete($id);
    }
    // function index
    public function getAll()
    {
        return $this->taskResoucreModel->getAll();
    }
    //function update
    public function edit($model)
    {
        return $this->taskResoucreModel->save($model);
    }
    public function find($id)
    {
        return $this->taskResoucreModel->find($id);
    }
}
