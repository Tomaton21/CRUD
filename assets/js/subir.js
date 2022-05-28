document.getElementById("boton-arriba").addEventListener("click",scrollup);

function scrollup(){
    var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
    
    if(currentScroll > 0){
      //  window.requestAnimationFrame(scrollup);
        window.scrollTo(0,0);
    }
}

buttonUp = document.getElementById("boton-arriba");

window.onscroll = function(){
    var scroll = document.documentElement.scrollTop;

    if(scroll > 740){
      
        buttonUp.style.transform = "scale(1)";
    }else if(scroll < 740){
        buttonUp.style.transform = "scale(0)";
    }
}