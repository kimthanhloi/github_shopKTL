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
    
 // shoes_woman => show product shoes  
 let sanphamnu = [
    {
        // "id": 01,
        "Ten": "Giày Sandal Nữ MWC - 2798 Sandal Đế Bằng Phối Màu Siêu Cute,Hack Dáng Phối Lưới Với 2 Quai Ngang Lót Dán Thời Trang",
        "Gia": "250.000",
        "Hinhanh": "../img/giaynu1.jpg",       
    },
    {
        // "id": 02,
        "Ten": "Giày Sandal Nữ MWC - 2791 Sandal Đế Bằng Phối Màu Siêu Cute,Hack Dáng Phối Lưới Với 2 Quai Ngang Lót Dán Thời Trang",
        "Gia": "270.000",
        "Hinhanh": "../img/giaynu2.jpg",       
    },
    {
        // "id": 03,
        "Ten": "Giày Sandal Nữ MWC - 2795 Sandal Đế Bằng Phối Màu Siêu Cute,Hack Dáng Phối Lưới Với 2 Quai Ngang Lót Dán Thời Trang",
        "Gia": "190.000",
        "Hinhanh": "../img/giaynu3.jpg",       
    },
    {
        // "id": 04,
        "Ten": "Giày Sandal Nữ MWC - 2799 Sandal Đế Bằng Phối Màu Siêu Cute,Hack Dáng Phối Lưới Với 2 Quai Ngang Lót Dán Thời Trang",
        "Gia": "230.000",
        "Hinhanh": "../img/giaynu4.jpg",       
    },
    {
        // "id": 05,
        "Ten": "Giày thể thao nữ MWC - 0167 Giày Thể Thao Nữ Đế Bằng Phối Vải,Sneaker Vải Siêu Êm Chân Hot Trend",
        "Gia": "250.000",
        "Hinhanh": "../img/dn5.jpg",       
    },
    {
        // "id": 06,
        "Ten": "Giày thể thao nữ MWC - 0169 Giày Thể Thao Nữ Đế Bằng Phối Vải,Sneaker Vải Siêu Êm Chân Hot Trend",
        "Gia": "270.000",
        "Hinhanh": "../img/giaynu6.jpg",       
    },
    {
        // "id": 07,
        "Ten": "Giày thể thao nữ MWC - 0170 Giày Thể Thao Nữ Đế Bằng Phối Vải,Sneaker Vải Siêu Êm Chân Hot Trend",
        "Gia": "190.000",
        "Hinhanh": "../img/giaynu7.jpg",       
    },
    {
        // "id": 08,
        "Ten": "Giày thể thao nữ MWC - 0178 Giày Thể Thao Nữ Đế Bằng Phối Vải,Sneaker Vải Siêu Êm Chân Hot Trend",
        "Gia": "230.000",
        "Hinhanh": "../img/giaynu8.jpg",       
    },
    {
        // "id": 09,
        "Ten": "Dép Cao Gót MWC - 4334 Dép Cao Gót 2 Quai",
        "Gia": "250.000",
        "Hinhanh": "../img/cg3.jpg",       
    },
    {
        // "id": 10,
        "Ten": "Giày cao gót MWC NUCG- 4400 Sandal Cao Gót",
        "Gia": "270.000",
        "Hinhanh": "../img/cg1.jpg",       
    },
    {
        // "id": 11,
        "Ten": "Giày cao gót MWC NUCG- 4401 Sandal Cao Gót",
        "Gia": "190.000",
        "Hinhanh": "../img/cg4.jpg",       
    },
    {
        // "id": 12,
        "Ten": "Giày cao gót MWC NUCG- 4393 Cao Gót Nữ Da",
        "Gia": "230.000",
        "Hinhanh": "../img/cg1.jpg",       
    },



];


(function(){
var html1 = "" ;
for (let i = 0; i < sanphamnu.length; i++) {
    html1 += ` <div class="col l-3 m-6 c-12">
       <div class="item_product">
       <a href="../html/chitietsanpham.php" class="item_product_img">
           <img src="${sanphamnu[i].Hinhanh}" alt="" />
       </a>
       <a href="../html/chitietsanpham.php"class="item_product_content">
           <div class="item_product_detail" >
           <p class="title">
           ${sanphamnu[i].Ten}
           </p>
           <div class="price"> ${sanphamnu[i].Gia}đ</div>
           </div>
       </a>
       </div>
   </div>`;
}
console.log("123");
document.getElementById("show_productwoman").innerHTML = html1;
})();  