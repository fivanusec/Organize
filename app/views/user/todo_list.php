<?php include VIEW . 'user/teamplate/header.php'; ?>

<link rel="stylesheet" type="text/css" href="/public/css/todoList.css">

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
                <form method="POST" action="#">
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
                <form method="POST" action="#">
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
<!--/Modal for notes--->

<!--Operations container--->
<div class="container border-left border-bottom border-top border-right justify-content-center">
    <div class="button-box text-center">
        <br>
        <a class="btn btn-primary" style="color:white; background-color: rgb(201, 150, 150); border:none;" data-toggle="modal" data-target="#createModal">New Todo List</a>
        <a class="btn btn-primary" style="color:white; background-color: rgb(201, 150, 150); border:none;" data-toggle="modal" data-target="#createNotesModal">New Notes</a>
        <a class="btn btn-secondary" style="border:none; color:white;">Delete</a>
    </div>
    <br>
</div>
<!--/Operations container-->
<br>
<!--Cards that show notes and todo list-->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="box box-aqua">
                <div class="box-header ui-sortable-handle">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Notes: name</h3>
                </div>
                <div class="box-body text-center">
                    <textarea rows="14" cols="65" style="resize:none; height: 276px;"></textarea>
                </div>
                <div class="box-footer clearfix no-border">
                    <a type="button" class="btn btn-default pull-right"><i class="fa fa-save"></i> Save notes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-aqua">
                <div class="box-header ui-sortable-handle">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">To Do List</h3>
                </div>

                <div class="box-body">
                    <ul class="todo-list ui-sortable">
                        <li>
                            <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Design a nice theme</span>

                            <div class="tools">
                                <a class="tool-link" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="tool-link" href="#">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Make the theme responsive</span>

                            <div class="tools">
                                <a class="tool-link" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="tool-link" href="#">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Let theme shine like a star</span>

                            <div class="tools">
                                <a class="tool-link" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="tool-link" href="#">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Let theme shine like a star</span>

                            <div class="tools">
                                <a class="tool-link" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="tool-link" href="#">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Check your messages and notifications</span>

                            <div class="tools">
                                <a class="tool-link" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="tool-link" href="#">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <span class="handle ui-sortable-handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" value="" name="">
                            <span class="text">Let theme shine like a star</span>

                            <div class="tools">
                                <a class="tool-link" href="#">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="tool-link" href="#">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="box-footer clearfix no-border">
                    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Add item</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include VIEW . 'user/teamplate/footer.php'; ?>