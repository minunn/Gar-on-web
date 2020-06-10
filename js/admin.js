function hideChildren(div){
  console.log("click");
  //console.log(div)
  //console.log(div.children);
  for(i in div.children){
    //console.log(div.children[i].tagName);
    if (div.children[i].tagName == "FORM") {
      if (div.children[i].getAttribute("hidden")) {
        div.children[i].removeAttribute('hidden')
      }
      else{
        div.children[i].setAttribute('hidden','true')
      }
    }
  }
}
