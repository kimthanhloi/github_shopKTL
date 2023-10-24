//  scroll Y
(function() {
    let header = document.getElementById("header")
    let login = document.querySelector(".login")
    let register = document.querySelector(".register")
          window.addEventListener("scroll",(event)=>{
        var scroll_y = this.scrollY; 
        if(scroll_y!==0){
            if(header.classList.contains("login") === false){
                header.style.background ="white"
                header.style.boxShadow = "0 0 2px black"
            }else{
                login.style.color = "black"
                register.style.color = "black"
                header.style.background ="white"
                header.style.boxShadow = "0 0 2px black"
            }
           
        }else if( scroll_y === 0 ) {
            header.style.boxShadow = "none"
            header.style.background ="none"
           
        }
    })
 })();
  

// bars mobi 
(function() {
  // thanh header
  let bars = document.querySelector(".bars")
  let overplay = document.querySelector(".overplay")
  let container_bar = document.querySelector(".container_bar")  
  bars.addEventListener("click",(e)=>{
   if(bars){
      overplay.classList.remove("none")   
   }  
  })
 overplay.addEventListener("click" , (e) =>{
  if(overplay){

      overplay.classList.add("none")
  }
 }  )
 container_bar.addEventListener("click" , (e) =>{
  e.stopPropagation()
 }  )
})();
  
// show password
(function(){
    const password = document.getElementById("userpassword")
    const showpassword = document.querySelector(".show_eye")
    const hiddenpassword = document.querySelector(".hidden_eye")
    showpassword.onclick = function(){
    showpassword.classList.add("none")
    hiddenpassword.classList.add("block")
    password.setAttribute("type","text")
    }
    hiddenpassword.onclick = function(){
      
        hiddenpassword.classList.remove("block")
        showpassword.classList.remove("none")
        password.setAttribute("type","password")
        console.log("2");
    }
}()) ;
// validate login 
(function(){
    const name = document.querySelector(".user_name") ;
    const password = document.querySelector(".user_password")
    const mess_login = document.querySelector(".mess-login")
    name.addEventListener("blur",()=>{
       if(name.value  === ""){
           mess_login.innerText = "vui lòng nhập tên"
    }else{
        mess_login.innerText = ""
       }       
    })
    password.addEventListener("blur",()=>{
        if(password.value  === ""){
           document.querySelector(".mess-login-password").innerText = "vui lòng nhập password"
     }else{
        document.querySelector(".mess-login-password").innerText = ""
        }           
     })
     const submid_login = document.querySelector(".submid_login")
     submid_login.onclick = (event)=>{
        // event.preventDefault();
        if(name.value  === ""){
            mess_login.innerText = "vui lòng nhập tên"
     }else{
         mess_login.innerText = ""
 
        }
        if(password.value  === ""){
         document.querySelector(".mess-login-password").innerText = "vui lòng nhập password"
     }else{
        document.querySelector(".mess-login-password").innerText = ""
 
        }
         
     }
}());

