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

  
  let phukien = [
    {
        // "id": 01,
        "Ten": "Giày Thể Thao Nam MWC - 5417 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
        "Gia": "250.000",
        "Giacu" : "270.000",
        "Hinhanh": "../img/gn1.jpg",       
    },
    {
        // "id": 02,
        "Ten": "Giày Thể Thao Nam MWC - 5418 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
        "Gia": "270.000",
        "Giacu" : "300.000",
        "Hinhanh": "../img/gn2.jpg",       
    },
    {
        // "id": 03,
        "Ten": "Giày Thể Thao Nam MWC - 5420 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
        "Gia": "190.000",  
        "Giacu" : "220.000",
        "Hinhanh": "../img/gn3.jpg",       
    },
    {
        // "id": 04,
        "Ten": "Giày Thể Thao Nam MWC - 5430 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
        "Gia": "230.000",  
        "Giacu" : "250.000",
        "Hinhanh": "../img/giaynu4.jpg",       
    },
    {
        // "id": 05,
        "Ten": "Dép Cao Su Nam MWC - 2002 Dép Cao Gót 2 Quai",
        "Gia": "250.000",  
        "Giacu" : "300.000",
        "Hinhanh": "../img/dn5.jpg",       
    },
    {
        // "id": 06,
        "Ten": "Dép Cao Su Nam MWC NUCG- 2003 Sandal Cao Gót",
        "Gia": "270.000",  
        "Giacu" : "280.000",
        "Hinhanh": "../img/giaynu6.jpg",       
    },
    {
        // "id": 07,
        "Ten": "BALO MWC - 1145 Balo Unisex Thời Trang Chống Sốc Chống Nước Nhiều Ngăn Siêu Tiện Lợi",
        "Gia": "190.000",  
        "Giacu" : "260.000",
        "Hinhanh": "../img/bl7.jpg",       
    },
    {
        // "id": 08,
        "Ten": "BALO MWC - 1141 Balo Unisex Thời Trang Chống Sốc Chống Nước Nhiều Ngăn Siêu Tiện Lợi",
        "Gia": "230.000",  
        "Giacu" : "250.000",
        "Hinhanh": "../img/bl8.jpg",       
    },
    {
        // "id": 09,
        "Ten": "BALO MWC - 1140 Balo Unisex Thời Trang Chống Sốc Chống Nước Nhiều Ngăn Siêu Tiện Lợi",
        "Gia": "250.000",  
        "Giacu" : "300.000",
        "Hinhanh": "../img/bl9.jpg",       
    },
    {
        // "id": 10,
        "Ten": "Vớ nam nữ MWC - AT57",
        "Gia": "40.000",  
        "Giacu" : "50.000",
        "Hinhanh": "../img/pk10.jpg",       
    },
    {
        // "id": 11,
        "Ten": "Vớ nam nữ MWC - AT51  ",
        "Gia": "30.000",  
        "Giacu" : "40.000",
        "Hinhanh": "../img/pk11.jpg",       
    },
    {
        // "id": 12,
        "Ten": "Vớ nam nữ MWC - AT56 ",
        "Gia": "30.000",  
        "Giacu" : "50.000",
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
           <span class="price-old"> ${phukien[i].Giacu}đ</span>
           <div class="price"> ${phukien[i].Gia}đ</div>
           </div>
       </a>
       </div>
   </div>`;
}

document.getElementById("SALE_product").innerHTML = html;
})();  


