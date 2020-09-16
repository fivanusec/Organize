<?= $this->getCSS(); ?>

<div class="container border-left border-bottom border-top border-right justify-content-center">
  <div class="button-box text-center">
    <br>
    <a class="btn btn-primary" style="color:white; background-color: rgb(201, 150, 150); border:none;" data-toggle="modal" data-target="#createModal">New Todo List</a>
    <a href="<?= $this->makeURL("User/dash/{$this->user->ID}") ?>" class="btn btn-secondary" style="color:white; border:none;">Dashboard</a>
  </div>
  <br>
</div>
<br>
<div class="container-fluid">
  <br>
  <div class="row justify-content-center">
    <?php for ($count = 0; $count < count($this->Todo_List); $count++) : ?>
      <div id="<?= $this->Todo_List[$count]->Todo_List_ID; ?>" class="card text-center">
        <div class="card-body">
          <?php if (count($this->check) != 0) : ?>
            <?php if ($this->check[$count] == true) : ?>
              <h5 class="card-title"><?= $this->Todo_List[$count]->Todo_Name; ?> <i class="fa fa-check-square"></i></h5>
            <?php else : ?>
              <h5 class="card-title"><?= $this->Todo_List[$count]->Todo_Name; ?> <i class="fa fa-times-circle"></i></h5>
            <?php endif; ?>
          <?php else : ?>
            <h5 class="card-title"><?= $this->Todo_List[$count]->Todo_Name; ?> <i class="fa fa-times-circle"></i></h5>
          <?php endif; ?>
          <p class="card-text"><?= $this->Todo_List[$count]->Todo_Description; ?></p>
          <a href="<?= $this->makeUrl("user/todoList/{$this->user->ID}/{$this->todoID}/{$this->Todo_List[$count]->Todo_List_ID}"); ?>" style="color:white; background-color: rgb(201, 150, 150); border:none;" class="btn btn-primary">Open todo</a>
          <a class="btn btn-secondary" style="border:none; color:white;" data-toggle="modal" data-target="#editModal<?= $this->Todo_List[$count]->Todo_List_ID; ?>">Edit</a>
          <a id="del<?= $this->Todo_List[$count]->Todo_List_ID; ?>" class="btn btn-secondary" style="border:none; color:white;">Delete todo</a>
        </div>
      </div>
      <script>
        document.getElementById("del<?= $this->Todo_List[$count]->Todo_List_ID; ?>").onclick = function() {
          window.location.href = "<?= $this->makeUrl("user/deleteTodo/{$this->Todo_List[$count]->Todo_List_ID}/{$this->user->ID}/{$this->todoID}"); ?>";
        }
      </script>
    <?php endfor; ?>
    <br>
  </div>

  <!--Create modal-->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="form">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">New Todo:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" role="form">
          <form method="POST" action="<?= $this->makeUrl("User/createTodo/{$this->user->ID}/{$this->todoID}"); ?>">
            <div class="form-group">
              <label for="card-name" class="col-form-label">Name:</label>
              <input name="TodoName" type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
              <label for="card-description" class="col-form-label">Description:</label>
              <input name="TodoDesc" type="text" class="form-control" id="description">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" style="background-color: rgb(201, 150, 150); border:none;" data-toggle="modal" data-target="#createModal">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Edit modal-->
  <?php for ($count = 0; $count < count($this->Todo_List); $count++) : ?>
    <div class="modal fade" id="editModal<?= $this->Todo_List[$count]->Todo_List_ID; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="form">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit card</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" role="form">
            <form method="POST" action="<?= $this->makeUrl("User/updateTodo/{$this->Todo_List[$count]->Todo_List_ID}/{$this->todoID}/{$this->user->ID}"); ?>">
              <div class="form-group">
                <label for="card-name" class="col-form-label">Name:</label>
                <input name="todoNameEdit<?= $this->Todo_List[$count]->Todo_List_ID; ?>" value="<?= $this->Todo_List[$count]->Todo_Name; ?>" type="text" class="form-control" id="name">
              </div>
              <div class="form-group">
                <label for="card-description" class="col-form-label">Description</label>
                <input name="todoDescEdit<?= $this->Todo_List[$count]->Todo_List_ID; ?>" type="text" value="<?= $this->Todo_List[$count]->Todo_Description; ?>" class="form-control" id="description">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="background-color: rgb(201, 150, 150); border:none;" data-toggle="modal" data-target="#editModal<?= $this->Todo_List[$count]->Todo_List_ID; ?>">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php endfor; ?>