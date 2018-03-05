var menu = document.getElementById('aside');
var container = document.getElementById('container')
var boolean = false;

function menuVertical() {
  if (boolean == false) {
    menu.style.margin = "55px 0px 0px 0px";
    menu.style.position = "fixed";
    menu.style.transition = "1s";
    container.style.margin = "65px 10px 0 235px";
    container.style.transition = ".7s";
    boolean = true;
  } else {
    menu.style.margin = "55px 0 0 -100%";
    menu.style.position = "none";
    menu.style.transition = "2s";
    container.style.margin = "65px 10px 0 10px";
    container.style.transition = "1s";
    boolean = false;
  }
}
