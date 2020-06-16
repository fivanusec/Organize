var givenID;

//loads Delete button on elements
function loadDelete() {
    var myNodelist = document.getElementsByClassName("li-todo");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
        var span = document.createElement("span");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.onclick = function () { deleteElement() };
        span.appendChild(txt);
        myNodelist[i].appendChild(span);
    }
}

//delete butoon pressed delete element
function deleteElement() {
    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }
}

//createsElement
function createElements() {
    var ul = document.getElementById("myList");
    var li = document.createElement("li");
    var item = document.getElementById("listItem").value;
    if (item === "") {
        item = "New TODO item";
    }
    li.className = "li-todo";
    li.innerHTML = "<a onclick='takeVariables(this.parentNode.id)' data-toggle='modal' data-target='#todoModal'>" + item + "</a>";
    li.id = Math.random().toString(5).substring(2);
    ul.appendChild(li);
    var span = document.createElement("span");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    li.appendChild(span);

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }
}

//generating ID for child elements
function generateID() {
    elements = document.getElementById("myList").childElementCount;
    var index = 0;
    for (index = 0; index < elements; index++) {
        document.getElementsByClassName("li-todo")[index].id = Math.random().toString(5).substring(2);
    }
}

//taking ID from element and displaying it
function takeVariables(ID) {
    //alert(ID);
    var list = document.getElementById("myList").children;
    var i = 0;
    for (i = 0; i < list.length; i++) {
        if (list[i].id == ID) {
            var value = document.getElementById(ID).children;
            document.getElementById("name").value = value[0].innerHTML;
        }
    }
    givenID = ID;
}

//updates new value to TODO list
function updateTODO(){
    var newValue = document.getElementById("name").value;
    //alert(givenID); testing
    var list = document.getElementById("myList").children;
    var i = 0;
    for (i = 0; i < list.length; i++) {
        if (list[i].id == givenID) {
            var value = document.getElementById(givenID).children;
            value[0].innerHTML = newValue;
        }
    }
}

function showAlert(){
    document.getElementById("alertCol").innerHTML = "<div class='alert alert-success' role='alert' id='success'> <strong>Great job!</strong> You completed your day! <button style='margin-top: 10px; margin-right: 15px;' type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>";
}
