// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// Declare store variable
var sentID;

function loadPic() {
  document.getElementById("profilePicture").src = "img/user.png";
}

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

//Create new card
function createNewcard() {
  var newBtn = document.createElement("button");
  newBtn.className = "column";
  newBtn.innerHTML = "<h2>" + document.getElementById("name").value + "</h2>";
  if (document.getElementById("name").value == "") {
    newBtn.innerHTML = "<h2>New day organiser</h2>";
  }
  newBtn.innerHTML += "<p>" + document.getElementById("description").value + "</p>"
  if (document.getElementById("description").value == "") {
    newBtn.innerHTML += "<p>No description</p>";
  }
  for (i = 0; i < elements.length; i++) {
    if (elements[i].style.width == "49%") {
      newBtn.style.width = "49%";
    }
    if (elements[i].style.width == "100%") {
      newBtn.style.width = "49%";
    }
  }
  newBtn.id = Math.random().toString(5).substring(2);
  newBtn.onclick = function () {
    openDay(this.id);
  };
  document.getElementById("row").appendChild(newBtn);
  
}

//open selected day
function openDay(ID) {
  window.location.href = "opendDay.html"
  $(document).ready(function () {
    sentID = ID;
    setCookies("ID", $(window).height(), "2");
  });
}

//saving cookies
function setCookies(name, value, days) {
  alert("Setting cookies");
  value = sentID;
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

//get ID
function getID(clickedID) {
  var clickedID = clickedID;
  return clickedID;
}


