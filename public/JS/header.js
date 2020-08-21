//set defaulet active element
var element="navElement1"; //set default value

function setOnLoad(ID)
{
    var cookieExists = checkCookie();
    if(cookieExists==true)
    {
        element= getCookie("Active%20Element");
        if(element=="")
        {
            element="navElement1"
        }
    }
    
    //check if ID is null
    if(ID!=null)
    {
        element=ID;
        setCookies('Active Element',ID,0);
    }

    if(ID===null)
    {
      setCookies('Active Element',element,0);
    }

    var setOnLoad = document.getElementById(element);
    if(setOnLoad.classList!="active")
    {
        setOnLoad.classList+=" active";
    }
}

function setCookies(name, value, days) 
{
    var expires;
    if (days) 
    {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toGMTString();
    }
    else 
    {
      expires = "";
    }
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function getCookie(cname) 
{
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) 
    {
      var c = ca[i];
      while (c.charAt(0) == ' ') 
      {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) 
      {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

function checkCookie() {
    var cookie = getCookie("Active%20Element");
    if (cookie != "") {
     return true;
    } else {
        return false;
    }
}
