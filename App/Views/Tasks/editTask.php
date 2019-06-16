<?php require_once dirname(__DIR__).'/header.php'; ?>

<div class="container pt-5">
<div class="clearfix">
    <h1 class="float-left">Rediģēt uzdevumu!</h1>
    <form action="/Tasks/delete-task" method="POST">
            <input type="hidden" name="id" value="<?php echo $args["id"] ;?>">
            <input type="hidden" name="csrf" value="<?php echo $_SESSION["token"] ?>">
            <button name="deleteTask" value="deleteTask1" class="deleteBTN btn btn-danger ml-2 float-right">Dzēst</button>
    </form>
</div>
    
    <form action="/tasks/update-task"  method="POST">
        <div class="form-group">
            <label for="title">Uzdevums:</label>
            <input type="text" required class="form-control" id="title" name="title" value="<?php echo $args["title"]; ?>" placeholder="Ievadiet Virsrakstu">
        </div>
        <input type="hidden" name="token" value="<?php echo $_SESSION["token"] ?>">
        <input type="hidden" name="id" value="<?php echo $args["id"]; ?>">
        <div class="form-group">
            <div class="form-group">
                <label for="description">Uzdevuma apraksts:</label>
                <textarea class="form-control" id="description" name="description" rows="6"><?php echo $args["content"]; ?></textarea>
            </div>
        </div>

        <div class="clearfix">

            <a role="button" class="float-left btn btn-info " href="/">Atpakaļ</a>

            <button type="submit" class="btn float-right btn-success">Rediģēt Uzdevumu</button>
        </div>
    </form>


<?php require_once dirname(__DIR__).'/footer.php.';?>
