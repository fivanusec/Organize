// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// Declare store variable
var sentID;

// List View
function listView() {
    for (i = 0; i < elements.length; i++) {
        elements[i].style.width = "100%";
    }
}

// Grid View
function gridView() {
    for (i = 0; i < elements.length; i++) {
        elements[i].style.width = "49%";
    }
}

$(document).ready(function() {
    var height = window.innerHeight;
    var width = window.innerWidth;

    if (height <= 900 && width <= 500) {
        $("#gridBtn").prop('disabled', true);
        listView();
    }
});