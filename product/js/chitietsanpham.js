// bars mobi
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

(function () {
    let btnbuycart = document.querySelector(".product_details-btn-buycard");

    btnbuycart.onclick = () => {
        window.alert("sản phẩm đã được thêm vào giỏ hàng ");
    };
})();

//  scroll Y
(function () {
    let header = document.getElementById("header");
    let login = document.querySelector(".login");
    let register = document.querySelector(".register");
    window.addEventListener("scroll", (event) => {
        var scroll_y = this.scrollY;
        if (scroll_y !== 0) {
            if (header.classList.contains("login") === false) {
                header.style.background = "white";
                header.style.boxShadow = "0 0 2px black";
            } else {
                login.style.color = "black";
                register.style.color = "black";
                header.style.background = "white";
                header.style.boxShadow = "0 0 2px black";
            }
        } else if (scroll_y === 0) {
            header.style.boxShadow = "none";
            header.style.background = "none";
        }
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
