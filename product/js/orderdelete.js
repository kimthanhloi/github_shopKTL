deleteId = "";
function getId(...data) {
    document.getElementById("product_id").value = data[0][0];
    document.getElementById("order_id").value = data[0][1];
    // document.getElementById("giagoc").value = data[0][2];
    console.log(data[0][2], data[0][3], data[0][4]);
    $total_bill = 0;

    $trutien = data[0][3] * data[0][4];
    $total_product = data[0][2] - $trutien;
    // $total_bill += $total_product;
    // console.log($trutien, $total_product);
    document.getElementById("tongtien").value = $total_product;
}
