function switchDivChildren(div){
  console.log("click");
  //console.log(div)
  div = div.parentElement.parentElement
  //console.log(div.children);
  for(i in div.children){
    //console.log(div.children[i].tagName);
    if (div.children[i].tagName == "DIV") {
      if (div.children[i].getAttribute("hidden")) {
        div.children[i].removeAttribute('hidden')
      }
      else{
        div.children[i].setAttribute('hidden','true')
      }
    }

  }
};

function switchFormChildren(id){
  console.log("click");
  console.log(id);
  let div = document.getElementById(id)
  console.log(div)
  div = div.parentElement.parentElement
  let currentlyOpened = document.getElementById(getCookie("openedForm"))
  console.log(currentlyOpened);
  if (currentlyOpened) {
    currentlyOpened = currentlyOpened.parentElement.parentElement.children[1]
    console.log(currentlyOpened);
    currentlyOpened.setAttribute("hidden","true")
  }
  for(i in div.children){
    //console.log(div.children[i].tagName);
    if (div.children[i].tagName == "FORM") {
      if (div.children[i].getAttribute("hidden")) {
        div.children[i].removeAttribute('hidden')
        setCookie("openedForm",id,1)
      }
    }

  }
};

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


// NOTE: deprecated
function hideChildren(div){
  console.log("click");
  //console.log(div)
  div = div.parentElement.parentElement
  //console.log(div.children);
  for(i in div.children){
    //console.log(div.children[i].tagName);
    if (div.children[i].tagName == "DIV" || div.children[i].tagName == "FORM") {
      if (div.children[i].getAttribute("hidden")) {
        div.children[i].removeAttribute('hidden')
      }
      else{
        div.children[i].setAttribute('hidden','true')
      }
    }

  }
};
