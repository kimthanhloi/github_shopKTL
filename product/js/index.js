// let htmlProduct3 = "";
// for (let i = 0; i < sanpham3.length; i++) {

//     htmlProduct3 += ` <div class="col l-3 m-6 c-12">
//         <div class="item_product">
//         <a href="../html/chitietsanpham.php" class="item_product_img">
//             <img src="${sanpham3[i].Hinhanh}" alt="" />
//         </a>
//         <a href="../html/chitietsanpham.php"class="item_product_content">
//             <div class="item_product_detail" >
//             <p class="title">
//             ${sanpham3[i].Ten}
//             </p>
//             <div class="price"> ${sanpham3[i].Gia}đ</div>
//             </div>
//         </a>
//         </div>
//     </div>`;
// }
$(document).ready(function () {
    // render

    // sữa
    // $("#editcmt").click(function () {
    //     $.ajax({
    //         url: "/index.php?pages=editcmt",
    //         method: "post",
    //         data: {
    //             idproduct: $("#productid").val(),
    //             iduser: $("#iduser").val(),
    //             content: $("#content").val(),
    //         },

    //         success: function (result) {
    //             // $("#inne").html(result);
    //             alert(result);
    //         },
    //     });
    // });
    let contentedit = document.querySelectorAll(".main_edit");

    contentedit.forEach((tab, index) => {
        let header_edit = tab.querySelector(".edit_cmt_user");
        let edit = tab.querySelector(".edit_cmt_user_from");

        header_edit.onclick = function () {
            edit.classList.toggle("active");
            if (edit.classList.contains("active")) {
                edit.style.display = "block";
            } else {
                edit.style.display = "none";
            }
        };
    });
    // $("#themcmt").click(function () {
    //     $(".tchomnone").css("display", "none");
    //     $.ajax({
    //         url: "/index.php?pages=addcmt",
    //         method: "post",
    //         data: {
    //             idproduct: $("#idproduct").val(),
    //             iduser: $("#iduser").val(),
    //             content: $("#content").val(),
    //         },

    //         success: function (result) {
    //             $("#inne").html(result);
    //             // alert(result);
    //         },
    //     });
    // });
});
function travecmt(id_prodoct, iduser) {
    $.ajax({
        url: "/index.php?pages=rendercmt",
        method: "post",
        data: {
            idproduct: id_prodoct,
            iduser: iduser,
        },

        success: function (result) {
            $("#inne").html(result);
            alert(result);
        },
    });
}
$(document).ajaxStop(function () {
    // $(".main_edit").on("click", ".edit_cmt_user", function () {
    //     let contentedit = document.querySelectorAll(".main_edit");
    //     contentedit.forEach((tab, index) => {
    //         let header_edit = tab.querySelector(".edit_cmt_user");
    //         let edit = tab.querySelector(".edit_cmt_user_from");
    //         header_edit.onclick = function () {
    //             edit.classList.toggle("active");
    //             if (edit.classList.contains("active")) {
    //                 edit.style.display = "block";
    //             } else {
    //                 edit.style.display = "none";
    //             }
    //         };
    //     });
    // });
});

// function get() {
//     let contentedit = document.querySelectorAll(".main_edit");

//     contentedit.forEach((tab, index) => {
//         let header_edit = tab.querySelector(".edit_cmt_user");
//         let edit = tab.querySelector(".edit_cmt_user_from");

//         header_edit.onclick = function () {
//             console.log(edit);
//             edit.classList.toggle("active");
//             if (edit.classList.contains("active")) {
//                 edit.style.display = "block";
//             } else {
//                 edit.style.display = "none";
//             }
//         };
//     });
// }
// get();
// $(".main_edit").each(function (tab, index) {
//     $(".edit_cmt_user").click(function () {
//         $(".active").toggle();
//         // edit.classList.toggle("active");
//         if ($(".edit_cmt_user_from").hasClass("active")) {
//             $(".edit_cmt_user_from").css("display", "block");
//         } else {
//             $(".edit_cmt_user_from").css("display", "none");
//         }
//     });
// });
$(document).ready(function () {
    (function () {
        window.addEventListener("scroll", (event) => {
            var scroll_y = this.scrollY;
            if (scroll_y !== 0) {
                if ($(".login") && $(".register")) {
                    $(".login").css("color", "black");
                    $(".register").css("color", "black");
                    $("#header").css("background", "white");
                    $("#header").css("boxShadow", "0 0 2px rgba(0,0,0,0.2)");
                }
            } else if (scroll_y === 0) {
                if ($("#header")) {
                    $("#header").css("boxShadow", "none");
                    $("#header").css("background", "none");
                }
            }
        });
    })();
});
(function () {
    // thanh header
    let bars = document.querySelector(".bars");
    let overplay = document.querySelector(".overplay");
    let container_bar = document.querySelector(".container_bar");
    bars.addEventListener("click", (e) => {
        if (bars) {
            overplay.classList.remove("none");
        }
    });
    overplay.addEventListener("click", (e) => {
        if (overplay) {
            overplay.classList.add("none");
        }
    });
    container_bar.addEventListener("click", (e) => {
        e.stopPropagation();
    });
})();
// active size and color
(function () {
    let sizetab = document.querySelectorAll(".item_size");
    let colortab = document.querySelectorAll(".product_details-color-white");

    sizetab.forEach((tab, index) => {
        tab.onclick = function () {
            document
                .querySelector(".item_size.active_item_size")
                .classList.remove("active_item_size");
            tab.classList.add("active_item_size");
            var value_size = tab.innerHTML;
            if (value_size == "37") {
                value_size = 2;
            } else if (value_size == "38") {
                value_size = 3;
            } else if (value_size == "36") {
                value_size = 1;
            } else if (value_size == "39") {
                value_size = 4;
            } else if (value_size == "40") {
                value_size = 5;
            }

            let result_size = (document.getElementById("size").value =
                value_size);
            console.log(value_size);
        };
    });
    colortab.forEach((tab, index) => {
        tab.onclick = function () {
            document
                .querySelector(".product_details-color-white.active_item_size")
                .classList.remove("active_item_size");
            tab.classList.add("active_item_size");
            var valuecolor = tab.getAttribute("title");
            let result_color = (document.getElementById("color").value =
                Number(valuecolor));
        };
    });
})();

function selecoption() {
    var form = document.getElementById("myForm");
    var select = document.getElementById("mySelect");

    select.addEventListener("change", function () {
        var selectedOption = this.options[this.selectedIndex];
        var hiddenInput = document.createElement("input");
        hiddenInput.setAttribute("type", "hidden");
        hiddenInput.setAttribute("name", "selectedOption");
        hiddenInput.setAttribute("value", selectedOption.value);
        form.appendChild(hiddenInput);
        form.submit();
    });
}
selecoption();
//  scroll Y
// (function () {
//     let header = document.getElementById("header");
//     // let login = document.querySelector(".login");
//     // let register = document.querySelector(".register");

//     window.addEventListener("scroll", (event) => {
//         var scroll_y = this.scrollY;
//         if (scroll_y !== 0) {
//             // classList kiểm tra element cha có thằng con không (kiểu bool)
//             if (header.classList.contains("login") === false) {
//                 header.style.background = "white";
//                 header.style.boxShadow = "0 0 2px rgba(0,0,0,0.2)";
//             } else {
//                 login.style.color = "black";
//                 register.style.color = "black";
//                 header.style.background = "white";
//                 header.style.boxShadow = "0 0 2px rgba(0,0,0,0.2)";
//             }
//         } else if (scroll_y === 0) {
//             header.style.boxShadow = "none";
//             header.style.background = "none";
//         }
//     });
// })();

// // bars mobi
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
