<?= $this->getCSS(); ?>
<?= $this->getJS(); ?>

<!--Modal for todo list-->
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
                <form method="POST" action="<?= $this->makeUrl("user/createTodoListItem/{$this->user->ID}/{$this->todoID}/{$this->todolistID}"); ?>">
                    <div class="form-group">
                        <label for="card-name" class="col-form-label">Name:</label>
                        <input name="TodoName" type="text" class="form-control" id="name">
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
<!--/Modal for todo list-->

<!--Modal for editing todo list-->
<?php for ($count = 0; $count < count($this->todolist); $count++) : ?>
    <div class="modal fade" id="editModal<?= $this->todolist[$count]->Todo_Item_ID; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Todo:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" role="form">
                    <form method="POST" action="<?= $this->makeUrl("user/updateTodoListItem/{$this->user->ID}/{$this->todoID}/{$this->todolistID}/{$this->todolist[$count]->Todo_Item_ID}"); ?>">
                        <div class="form-group">
                            <label for="card-name" class="col-form-label">Name:</label>
                            <input name="TodoName<?= $this->todolist[$count]->Todo_Item_ID; ?>" type="text" class="form-control" value="<?= $this->todolist[$count]->Todo_Item_Name; ?>" id="name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" style="background-color: rgb(201, 150, 150); border:none;" data-toggle="modal" data-target="#editModal<?= $this->todolist[$count]->Todo_Item_ID; ?>">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endfor; ?>
<!--/Modal for editing todo list-->

<!--Modal for notes--->
<div class="modal fade" id="createNotesModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">New Notes:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" role="form">
                <form method="POST" action="<?= $this->makeUrl("user/createNote/{$this->user->ID}/{$this->todoID}/{$this->todolistID}"); ?>">
                    <div class="form-group">
                        <label for="card-name" class="col-form-label">Name:</label>
                        <input name="noteName" type="text" class="form-control" id="name">
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
<!--/Modal for notes--->

<!--Operations container--->
<div class="container border-left border-bottom border-top border-right justify-content-center">
    <div class="button-box text-center">
        <br>
        <a class="btn btn-primary" style="color:white; background-color: rgb(201, 150, 150); border:none;" data-toggle="modal" data-target="#createNotesModal">New Notes</a>
        <a href="<?= $this->makeURL("user/todo/{$this->user->ID}/{$this->todoID}") ?>" class="btn btn-secondary" style="border:none; color:white;">My todo lists</a>
    </div>
    <br>
</div>
<!--/Operations container-->
<br>
<!--Cards that show notes and todo list-->
<div class="container-fluid">
    <div class="row justify-content-center">
        <?php for ($count = 0; $count < count($this->notes); $count++) : ?>
            <div class="col-md-4">
                <div class="box box-aqua" role="form">
                    <div class="box-header ui-sortable-handle">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">Notes: <?= $this->notes[$count]->Note_Name; ?></h3>
                    </div>
                    <form method="POST" action="<?= $this->makeURL("user/updateNote/{$this->notes[$count]->Note_ID}/{$this->user->ID}/{$this->todoID}/{$this->todolistID}"); ?>">
                        <div class="box-body text-center form-group">
                            <textarea name="noteData<?= $this->notes[$count]->Note_ID; ?>" rows="auto" cols="auto"><?= $this->notes[$count]->Note_Data; ?></textarea>
                        </div>
                        <div class="box-footer clearfix no-border">
                            <button type="submit" class="btn btn-default pull-right"><i class="fa fa-save"></i> Save notes</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endfor; ?>
        <div class="col-md-4">
            <div class="box box-aqua">
                <div class="box-header ui-sortable-handle">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                    <ul class="todo-list ui-sortable">
                        <?php for ($count = 0; $count < count($this->todolist); $count++) : ?>
                            <li class="todo-data">
                                <form method="POST" action="<?= $this->makeUrl("user/finishTask/{$this->user->ID}/{$this->todoID}/{$this->todolistID}/{$this->todolist[$count]->Todo_Item_ID}") ?>">
                                    <span class="handle ui-sortable-handle">
                                        <i class="fa fa-ellipsis-v"></i>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>
                                    <?php if ($this->todolist[$count]->Todo_Item_Completion != "0") : ?>
                                        <input id="item<?= $this->todolist[$count]->Todo_Item_ID; ?>" class="check-box-item disable" type="checkbox" checked="true" value="0" name="checkBoxItem<?= $this->todolist[$count]->Todo_Item_ID; ?>" disabled>
                                        <span class="text disable" id="text<?= $this->todolist[$count]->Todo_Item_ID; ?>"><?= $this->todolist[$count]->Todo_Item_Name; ?></span>
                                    <?php else : ?>
                                        <input id="item<?= $this->todolist[$count]->Todo_Item_ID; ?>" class="check-box-item" type="checkbox" value="1" name="checkBoxItem<?= $this->todolist[$count]->Todo_Item_ID; ?>">
                                        <span class="text" id="text<?= $this->todolist[$count]->Todo_Item_ID; ?>"><?= $this->todolist[$count]->Todo_Item_Name; ?></span>
                                        <script>
                                            document.getElementById("item<?= $this->todolist[$count]->Todo_Item_ID; ?>").onclick = function() {
                                                disable(<?= $this->todolist[$count]->Todo_Item_ID; ?>);
                                                window.location.href = "<?= $this->makeUrl("user/finishTask/{$this->user->ID}/{$this->todoID}/{$this->todolistID}/{$this->todolist[$count]->Todo_Item_ID}"); ?>";
                                            }
                                        </script>
                                    <?php endif; ?>

                                    <div class="tools">
                                        <a href="" class="tool-link" data-toggle="modal" data-target="#editModal<?= $this->todolist[$count]->Todo_Item_ID; ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="tool-link" href="<?= $this->makeUrl("user/deleteTodoListItem/{$this->user->ID}/{$this->todoID}/{$this->todolistID}/{$this->todolist[$count]->Todo_Item_ID}"); ?>">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </div>
                                </form>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="box-footer clearfix no-border">
                    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Add item</button>
                </div>
            </div>
        </div>
    </div>
</div>
