<?php require_once dirname(__DIR__).'/header.php'; ?>

    <div class="container pt-5">
    <h1 class="pb-5 text-center">Pievienojiet jaunu veicamo darbu!</h1>
    <form action="/tasks/save-task"  method="POST">
        <div class="form-group">
            <label for="title">Virsraksts:</label>
            <input type="text" required class="form-control" id="title" name="title" placeholder="Ievadiet Virsrakstu">
        </div>
        <input type="hidden" name="token" value="<?php  echo $_SESSION["token"] ?>">
        <input type="hidden" name="number" value=123123>
        <div class="form-group">
            <div class="form-group">
                <label for="description">darba apraksts:</label>
                <textarea class="form-control" id="description" name="description" rows="6"></textarea>
            </div>
        </div>

        <div class="clearfix">
            <a role="button" class="float-left btn btn-info " href="/">Atpakaļ</a>
            <button type="submit" class="btn float-right btn-success">Pievienot Uzdevumu</button>
        </div>
    </form>

<?php require_once dirname(__DIR__).'/footer.php.';?>

