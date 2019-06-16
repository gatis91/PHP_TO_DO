<?php


namespace App\Models;


use Core\Model;

class Task extends Model
{
//    Get all tasks from DB
    public function getTasks(){
        $tasks=["notDone" => $this->getTasksToDo(),
            "done"=> $this->getDoneTasks()];
        return $tasks;
    }
// Get Done Tasks From DB
    public function getDoneTasks(){
        $this->query('SELECT * FROM tasks WHERE status=:status ORDER BY created_at DESC');
        $this->bind(':status', 'true');
        $rows=$this->resultSet();
        if (isset($rows)) {
            return $rows;
        }
    }
//    Get Tasks who is still in progress
    public function getTasksToDo(){
        $this->query('SELECT * FROM tasks WHERE status=:status ORDER BY created_at ASC');
        $this->bind(':status', 'false');
        $rows=$this->resultSet();
        if (isset($rows)) {
            return $rows;
        }
    }
// Save Task from DB
    public function saveTasks($post){

        if($post){
            if($post['title']===''){
                return;
            }
            $this->query('INSERT INTO tasks (title, content, status) VALUES(:title, :content, :status)');
            $this->bind(':title', $post['title']);
            $this->bind(':content', $post['description']);
            $this->bind(':status', 'false');
            $this->execute();
        }
        return;
    }
//    Get single task
    public function getSingleTask($id){

        $this->query('SELECT * FROM tasks WHERE id=:id');
        $this->bind(':id', $id);
        $row=$this->single();
        return $row;

    }
//    Update Task
    public function updateTask($post){
        if($post){
            if($post['title']===''){
                return;
            }
            $this->query('UPDATE tasks SET title=:title, content=:content WHERE id=:id');
            $this->bind(':id', $post['id']);
            $this->bind(':title', $post['title']);
            $this->bind(':content', $post['description']);
            $this->execute();
            return;


        }

        return;
    }
// Set task is done value in db
// if task is done status value is true
    public function setTaskDone($post){
        if($post){
            $this->query('UPDATE tasks SET status=:status WHERE id=:id');
            $this->bind(':id', $post['id']);
            $this->bind(':status', 'true');

            $this->execute();
            return;


        }

        return;

    }
//    set value for task not done
//    if tas is not done status values is false
    public function restoreDoneTask($post){
        if($post){
            $this->query('UPDATE tasks SET status=:status WHERE id=:id');
            $this->bind(':id', $post['id']);
            $this->bind(':status', 'false');

            $this->execute();
            return;


        }

        return;

    }
//    Delete from DB Task

    public function deleteDoneTask($post){
        if($post){
            $this->query('DELETE FROM tasks WHERE id=:id ');
            $this->bind(':id', $post['id']);
           

            $this->execute();
            return;


        }

        return;

    }
}




















































