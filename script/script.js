const menuBtn = document.getElementById("menuBtn");
const menuItem = document.getElementById("menuItems");
menuBtn.addEventListener("click", menuToggle);
console.log(menuItem);
function menuToggle (){
    if(menuItem.style.height == "0px" || menuItem.style.height == ""){
        menuItem.style.height = "150px";
        
    }else{
        menuItem.style.height = "0px";
    }
}

function popUpShow(){
    const popUp = document.getElementById("PopUp");
    popUp.style.visibility = "visible";
}
function Close(){
    const popUp = document.getElementById("PopUp");
    popUp.style.visibility = "hidden";
}

  