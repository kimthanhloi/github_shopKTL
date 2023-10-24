//  scroll Y
(function() {
    // let header = document.getElementById("header")
    let login = document.querySelector(".login")
    let register = document.querySelector(".register")
          window.addEventListener("scroll",(event)=>{
        var scroll_y = this.scrollY; 
        if(scroll_y!==0){
            login.style.color = "black"
            register.style.color = "black"
            header.style.background ="white"
            header.style.boxShadow = "0 0 2px black"
        }else if( scroll_y === 0 ) {
            header.style.boxShadow = "none"
            header.style.background ="none"
           
        }
    })
 })();
  
 // bars mobi 
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

  let phukien = [
    {
        // "id": 01,
        "Ten": "dây thể thao MWC - 1200 ",
        "Gia": "50.000",
        "Hinhanh": "../img/pk1.jpg",       
    },
    {
        // "id": 02,
        "Ten": "Vớ nam nữ MWC - AT57",
        "Gia": "70.000",
        "Hinhanh": "../img/pk2.jpg",       
    },
    {
        // "id": 03,
        "Ten": "Vớ nam nữ MWC - AT40",
        "Gia": "60.000",
        "Hinhanh": "../img/pk3.jpg",       
    },
    {
        // "id": 04,
        "Ten": "Vớ nam nữ MWC - AT45",
        "Gia": "30.000",
        "Hinhanh": "../img/pk4.jpg",       
    },
    {
        // "id": 05,
        "Ten": "Vớ nam nữ MWC - AT54",
        "Gia": "50.000",
        "Hinhanh": "../img/pk5.jpg",       
    },
    {
        // "id": 06,
        "Ten": "Vớ nam nữ MWC - AT58",
        "Gia": "40.000",
        "Hinhanh": "../img/pk6.jpg",       
    },
    {
        // "id": 07,
        "Ten": "Vớ nam nữ MWC - AT65",
        "Gia": "40.000",
        "Hinhanh": "../img/pk7.jpg",       
    },
    {
        // "id": 08,
        "Ten": "Vớ nam nữ MWC - AT57",
        "Gia": "40.000",
        "Hinhanh": "../img/pk8.jpg",       
    },
    {
        // "id": 09,
        "Ten": "Vớ nam nữ MWC - AT55",
        "Gia": "50.000",
        "Hinhanh": "../img/pk9.jpg",       
    },
    {
        // "id": 10,
        "Ten": "Vớ nam nữ MWC - AT51",
        "Gia": "270.000",
        "Hinhanh": "../img/pk10.jpg",       
    },
    {
        // "id": 11,
        "Ten": "Vớ nam nữ MWC - AT44",
        "Gia": "40.000",
        "Hinhanh": "../img/pk11.jpg",       
    },
    {
        // "id": 12,
        "Ten": "Vớ nam nữ MWC - AT43",
        "Gia": "30.000",
        "Hinhanh": "../img/pk12.jpg",       
    },



];


(function(){
let html = ''
for (let i = 0; i < phukien.length; i++) {
    html += ` <div class="col l-3 m-6 c-12">
       <div class="item_product">
       <a href="../html/chitietsanpham.php" class="item_product_img">
           <img src="${phukien[i].Hinhanh}" alt="" />
       </a>
       <a href="../html/chitietsanpham.php"class="item_product_content">
           <div class="item_product_detail" >
           <p class="title">
           ${phukien[i].Ten}
           </p>
           <div class="price"> ${phukien[i].Gia}đ</div>
           </div>
       </a>
       </div>
   </div>`;
}

document.getElementById("show_accessory").innerHTML = html;
})();  


