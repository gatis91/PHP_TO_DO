<?php require_once dirname(__DIR__).'/header.php'; ?>

<!--Making items to do-->
    <div class="">
    <div class="container pt-5">
    <div class="clearfix">
        <h1 class="float-left">Darāmie darbi</h1>
        <p ><a role="button" class="float-right btn btn-primary mt-2 mb-5" href="/tasks/add-task">Pievienot jaunu darbu</a> </p>
    </div>
<div>
    <?php if(!empty($args["notDone"])): ?>
    <?php foreach($args["notDone"] as $task):?>
    <div class="card mb-2">
        <div class="card-body ">
            <div class="clearfix">
                <div class="float-left">
                    <form method="POST" action="/Tasks/task-done">
                        <input type="hidden" name="csrf" value="<?php echo $_SESSION["token"] ?>">
                        <h5 class="card-title"> <input class="chkBox" type="checkbox" value='<?php echo $task["id"] ;?>' name="id" id=""><span class="ml-2"> <?php echo $task["title"] ;?> </span></h5>
                    </form>
                </div>
                <p class="float-right card-subtitle text-muted"><?php echo \Core\Helpers::time_elapsed_string($task["created_at"]);?></p>
            </div>
            <p  class="card-text"><?php echo $task["content"]?>.</p>
            <div class="clearfix">
                <a  class="btn btn-info float-right"href="/Tasks/edit/<?php echo $task["id"] ?>" class="card-link">labot</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
        <h3 class="text-center p-5">Visi darbi paveikti! Pievienojiet jaunus!</h3>
    <?php endif; ?>

</div>

                <h1 class="center">Paveiktie darbi</h1>
                <div>
                <?php if(!empty($args["done"])): ?>
                <?php foreach($args["done"] as $task):?>
                    <div class="card">
                        <div class="card-body ">
                            <div>
                                <h6 class="float-right card-subtitle text-muted"><?php echo \Core\Helpers::time_elapsed_string($task["created_at"]);?></h6>
                            </div>
                            <div class="clearfix">

                                <h5 class="card-title float-left text-muted"><del><?php echo $task["title"] ;?></del> </h5>
                            </div>

                            <p  class="card-text text-muted"><del><?php echo $task["content"] ;?></del></p>

                            <div class="clearfix">
                                    <form action="/Tasks/delete-task" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $task["id"] ;?>">
                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION["token"] ?>">
                                            <button name="deleteTask" value="deleteTask1" class="deleteBTN btn btn-dark float-left">Dzēst</button>
                                    </form>
                                    <form action="/Tasks/restore-task" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $task["id"] ;?>">
                                            <input type="hidden" name="csrf" value="<?php echo $_SESSION["token"] ?>">
                                            <button name="restoreTask" value="id1" class="restoreBTN btn btn-success float-right">Atjaunot</button>
                                    </form>


                            </div>
                        </div>
                    </div>


                <?php endforeach; ?>
                <?php else: ?>
                    <h3 class="text-center p-5">Nav paveikto darbu!</h3>
                <?php endif; ?>
                </div>

<?php require_once dirname(__DIR__).'/footer.php.';?>