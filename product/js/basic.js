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

 // shoes_man => show product shoes  
 let sanphamnam = [
        {
            // "id": 01,
            "Ten": "Giày Thể Thao Nam MWC - 5417 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
            "Gia": "250.000",
            "Hinhanh": "../img/gn1.jpg",       
        },
        {
            // "id": 02,
            "Ten": "Giày Thể Thao Nam MWC - 5420 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
            "Gia": "270.000",
            "Hinhanh": "../img/gn2.jpg",       
        },
        {
            // "id": 03,
            "Ten": "Giày Thể Thao Nam MWC - 5430 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
            "Gia": "190.000",
            "Hinhanh": "../img/gn3.jpg",       
        },
        {
            // "id": 04,
            "Ten": "Giày Thể Thao Nam MWC - 5435 Giày Thể Thao Nam Phối Sọc Thể Thao, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
            "Gia": "230.000",
            "Hinhanh": "../img/gn4.jpg",       
        },
        {
            // "id": 05,
            "Ten": "Giày Thể Thao Nam MWC NATT- 5450 Giày Thể Thao Nam Cao Cấp, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
            "Gia": "250.000",
            "Hinhanh": "../img/dn5.jpg",       
        },
        {
            // "id": 06,
            "Ten": "Giày Thể Thao Nam MWC NATT- 5455 Giày Thể Thao Nam Cao Cấp, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
            "Gia": "270.000",
            "Hinhanh": "../img/gn6.jpg",       
        },
        {
            // "id": 07,
            "Ten": "Giày Thể Thao Nam MWC NATT- 5448 Giày Thể Thao Nam Cao Cấp, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
            "Gia": "190.000",
            "Hinhanh": "../img/gn7.jpg",       
        },
        {
            // "id": 08,
            "Ten": "Giày Thể Thao Nam MWC NATT- 5458 Giày Thể Thao Nam Cao Cấp, Sneaker Nam Cổ Thấp Năng Động Cá Tính",
            "Gia": "230.000",
            "Hinhanh": "../img/gn8.jpg",       
        },
        {
            // "id": 09,
            "Ten": "Giày Thể Thao Nam MWC NATT - 5351",
            "Gia": "250.000",
            "Hinhanh": "../img/dn1.jpg",       
        },
        {
            // "id": 10,
            "Ten": "Giày Thể Thao Nam MWC NATT - 5354",
            "Gia": "270.000",
            "Hinhanh": "../img/gn10.jpg",       
        },
        {
            // "id": 11,
            "Ten": "Giày Thể Thao Nam MWC NATT - 5358",
            "Gia": "190.000",
            "Hinhanh": "../img/gn11.jpg",       
        },
        {
            // "id": 12,
            "Ten": "Giày Thể Thao Nam MWC NATT - 5360",
            "Gia": "230.000",
            "Hinhanh": "../img/dn4.jpg",       
        },

    

 ];


//  (function(){
//     let html = ''
//     for (let i = 0; i < sanphamnam.length; i++) {
//         html += ` <div class="col l-3 m-6 c-12">
//            <div class="item_product">
//            <a href="../html/chitietsanpham.php" class="item_product_img">
//                <img src="${sanphamnam[i].Hinhanh}" alt="" />
//            </a>
//            <a href="../html/chitietsanpham.php"class="item_product_content">
//                <div class="item_product_detail" >
//                <p class="title">
//                ${sanphamnam[i].Ten}
//                </p>
//                <div class="price"> ${sanphamnam[i].Gia}đ</div>
//                </div>
//            </a>
//            </div>
//        </div>`;
//    }

//    document.getElementById("show_productman").innerHTML = html;
//  })();  


