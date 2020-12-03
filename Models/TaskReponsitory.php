<?php 
namespace MVC\Models;

use MVC\Models\TaskResoucreModel;

class TaskReponsitory {
    private $taskResoucreModel;
    function __construct(){
        $this->taskResoucreModel = new TaskResoucreModel();
    }

    public function add($model)
    {
        return $this->taskResoucreModel->save($model);
    }

    public function delete($id)
    {
        return $this->taskResoucreModel->delete($id);
    }

    public function getAll()
    {
        return $this->taskResoucreModel->getAll();
    }

    public function edit($model)
    {
        return $this->taskResoucreModel->save($model);
    }

    public function find($id)
    {
        return $this->taskResoucreModel->find($id);
    }
}
