const pass_field2 = document.getElementById("password");
const show_btn2 = document.getElementById("mata");
show_btn2.addEventListener("click", function(){
if(pass_field2.type === "password"){
    pass_field2.type = "text";
    show_btn2.classList.add("hide");
}else{
    pass_field2.type = "password";
    show_btn2.classList.remove("hide");
}
});









