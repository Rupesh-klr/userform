var identifer=false;
var userloginbtn=document.getElementById("userloginbtn");
function checked(){
    console.log(identifer);
    if(identifer){
        userloginbtn.setAttribute("style","visibility:visible;")
    }else{
        userloginbtn.setAttribute("style","visibility:hidden;")
    }
}