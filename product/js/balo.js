//  scroll Y
(function() {
    let header = document.getElementById("header")
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
  let balo = [
    {
        // "id": 01,
        "Ten": "Balô Túi Đeo Chéo MWC - 0834 Balô Túi Đeo Chéo Nam Nữ Unisex Nhiều Ngăn Tiện Ích",
        "Gia": "250.000",
        "Hinhanh": "../img/bl1.jpg",       
    },
    {
        // "id": 02,
        "Ten": "BALO MWC - 1145 BALO Unisex Chống Sốc Chống Nước Nhiều Ngăn",
        "Gia": "270.000",
        "Hinhanh": "../img/bl2.jpg",       
    },
    {
        // "id": 03,
        "Ten": "BALO MWC- 1150 Balo Unisex Chống Sốc Chống Nước Nhiều Ngăn",
        "Gia": "190.000",
        "Hinhanh": "../img/bl3.jpg",       
    },
    {
        // "id": 04,
        "Ten": "BALO MWC - 1164 Balo Phong Cách Basic Cao Cấp Chất Vải Mềm Mịn,Đa Năng Đi Học ",
        "Gia": "230.000",
        "Hinhanh": "../img/bl4.jpg",       
    },
    {
        // "id": 05,
        "Ten": "BALO MWC - 1190 Balo Phong Cách Basic Cao Cấp Chất Vải Mềm Mịn,Đa Năng Đi Học",
        "Gia": "250.000",
        "Hinhanh": "../img/bl5.jpg",       
    },
    {
        // "id": 06,
        "Ten": "BALO MWC - 1200 Balo Phong Cách Basic Cao Cấp Chất Vải Mềm Mịn,Đa Năng Đi Học",
        "Gia": "270.000",
        "Hinhanh": "../img/bl6.jpg",       
    },
    {
        // "id": 07,
        "Ten": "BALO MWC - 1305 Balo Phong Cách Basic Cao Cấp Chất Vải Mềm Mịn,Đa Năng Đi Học",
        "Gia": "190.000",
        "Hinhanh": "../img/bl7.jpg",       
    },
    {
        // "id": 08,
        "Ten": "BALO MWC - 1136 Balo Phong Cách Basic Cao Cấp Chất Vải Mềm Mịn,Đa Năng Đi Học",
        "Gia": "230.000",
        "Hinhanh": "../img/bl8.jpg",       
    },
    {
        // "id": 09,
        "Ten": "BALO MWC - 1117 Balo Unisex Thời Trang Chống Sốc Chống Nước Nhiều Ngăn Siêu Tiện Lợi",
        "Gia": "250.000",
        "Hinhanh": "../img/bl9.jpg",       
    },
    {
        // "id": 10,
        "Ten": "BALO MWC - 1120 Balo Unisex Thời Trang Chống Sốc Chống Nước Nhiều Ngăn Siêu Tiện Lợi",
        "Gia": "270.000",
        "Hinhanh": "../img/bl10.jpg",       
    },
    {
        // "id": 11,
        "Ten": "BALO MWC - 1130 Balo Unisex Thời Trang Chống Sốc Chống Nước Nhiều Ngăn Siêu Tiện Lợi",
        "Gia": "190.000",
        "Hinhanh": "../img/bl11.jpg",       
    },
    {
        // "id": 12,
        "Ten": "BALO MWC - 1140 Balo Unisex Thời Trang Chống Sốc Chống Nước Nhiều Ngăn Siêu Tiện Lợi",
        "Gia": "230.000",
        "Hinhanh": "../img/bl12.jpg",       
    },



];


(function(){
let html = ''
for (let i = 0; i < balo.length; i++) {
    html += ` <div class="col l-3 m-6 c-12">
       <div class="item_product">
       <a href="../html/login.php" class="item_product_img">
           <img src="${balo[i].Hinhanh}" alt="" />
       </a>
       <a href="../html/login.php"class="item_product_content">
           <div class="item_product_detail" >
           <p class="title">
           ${balo[i].Ten}
           </p>
           <div class="price"> ${balo[i].Gia}đ</div>
           </div>
       </a>
       </div>
   </div>`;
}

document.getElementById("show_accessory").innerHTML = html;
})();  


