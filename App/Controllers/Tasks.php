<?php


namespace App\Controllers;



use Core\Controller;
use Core\View;
use App\Models\Task;
class Tasks extends Controller
{
//    generate session token for csrf token
    protected function renderToken(){
        $length = 32;
        $_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
    }
//    index get task and display to view
    public function index()
    {
        $this->renderToken();
        $data=(new Task())->getTasks();

        View::render('Tasks/index.php', $data);

    }
//    render add task view
    public function addTask()
    {
        $this->renderToken();
        View::render('Tasks/addTask.php');

    }
//    save post
    public function saveTask()
    {
        $post1=INPUT_POST;
        $post=filter_input_array($post1, FILTER_SANITIZE_STRING);
        print_r($post);
        if($post["token"]===$_SESSION["token"]){
            $model=new Task();
            $model->saveTasks($post);
            header('Location: /');
        }else{
            header('Location: /');
        }
    }
// display edit view
    public function edit(){
        $this->renderToken();
        $id=$this->route_params["id"];
        $model=new Task();
        $data=$model->getSingleTask($id);

        View::render('Tasks/editTask.php', $data);
    }
// update Task
    public function updateTask()
    {
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post["token"]===$_SESSION["token"]){
            $model=new Task();
            $model->updateTask($post);
            header('Location: /');
        }else{
            header('Location: /');
        }
    }
//    function to make task done
    public function taskDone(){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post["csrf"]===$_SESSION["token"]){
            $model=new Task();
            $model->setTaskDone($post);
            header('Location: /');
        }else{
            header('Location: /');
        }
    }
//  restore task if need delete
    public function restoreTask(){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post["csrf"]===$_SESSION["token"]){
            $model=new Task();
            $model->restoreDoneTask($post);
            header('Location: /');
        }else{
            header('Location: /');
        }
    }

//    Delete Task
    public function deleteTask(){
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post["csrf"]===$_SESSION["token"]){
            $model=new Task();
            $model->deleteDoneTask($post);
            header('Location: /');
        }else{
            header('Location: /');
        }
    }
}