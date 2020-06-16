function checkpassword(password) {
  var strength = 0;

  if (String(password).match(/[a-z]+/)) {
    strength += 20;
  }
  if (String(password).match(/[A-Z]+/)) {
    strength += 20;
  }
  if (String(password).match(/[0-9]+/)) {
    strength += 20;
  }
  if (String(password).match(/[$@#&!]+/)) {
    strength += 20;
  }
  if(String(password).match(/[$@#&!]+/)&&String(password).match(/[0-9]+/)&&String(password).match(/[A-Z]+/)&&String(password).match(/[a-z]+/)){
    strength +=20;
  }


  switch (strength) {
    case 20:
        document.getElementById("danger").setAttribute('aria-valuenow','20');
        document.getElementById("danger").setAttribute('style','width:'+strength+'%');
      break;

    case 40:
      document.getElementById("warning").setAttribute('aria-valuenow','40');
      document.getElementById("warning").setAttribute('style','width:'+strength+'%');
      break;

    case 60:
      document.getElementById("warning").setAttribute('aria-valuenow','60');
      document.getElementById("warning").setAttribute('style','width:'+strength+'%');
      break;

    case 80:
      document.getElementById("success").setAttribute('aria-valuenow','80');
      document.getElementById("success").setAttribute('style','width:'+strength+'%');
      break;

    case 100:
      document.getElementById("success").setAttribute('aria-valuenow','100');
      document.getElementById("success").setAttribute('style','width:'+strength+'%');
      break;
  }

  if(password==""){
    document.getElementById("danger").setAttribute('aria-valuenow','0');
    document.getElementById("danger").setAttribute('style','width:0%');
    document.getElementById("warning").setAttribute('aria-valuenow','0');
    document.getElementById("warning").setAttribute('style','width:0%');
    document.getElementById("success").setAttribute('aria-valuenow','0');
    document.getElementById("success").setAttribute('style','width:0%');
  }
}

