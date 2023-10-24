// bars mobi
// (function () {
//     // thanh header
//     let bars = document.querySelector(".bars");
//     let overplay = document.querySelector(".overplay");
//     let container_bar = document.querySelector(".container_bar");
//     bars.addEventListener("click", (e) => {
//         if (bars) {
//             overplay.classList.remove("none");
//         }
//     });
//     overplay.addEventListener("click", (e) => {
//         if (overplay) {
//             overplay.classList.add("none");
//         }
//     });
//     container_bar.addEventListener("click", (e) => {
//         e.stopPropagation();
//     });
// })();

//  scroll Y
// (function() {
//     let header = document.getElementById("header")
//     let login = document.querySelector(".login")
//     let register = document.querySelector(".register")
//           window.addEventListener("scroll",(event)=>{
//         var scroll_y = this.scrollY;
//         if(scroll_y!==0){
//             if(header.classList.contains("login") === false){
//                 header.style.background ="white"
//                 header.style.boxShadow = "0 0 2px rgba(0,0,0,0.2)"
//              }  else{
//                 login.style.color = "black"
//                 register.style.color = "black"
//                 header.style.background ="white"
//                 header.style.boxShadow = "0 0 2px rgba(0,0,0,0.2)"
//              }
//         }else if( scroll_y === 0 ) {
//             header.style.boxShadow = "none"
//             header.style.background ="none"

//         }
//     })
//  })();
