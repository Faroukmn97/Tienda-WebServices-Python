$(document).ready(function(){
    ProductsData();
});

const displayProductsData =(ProductsData)=>{
    ProductsData.forEach(products=>{
        $('#space-list').append("<div class='product-box'>\n\
                <a href='product.php?p="+products.id_product+"'>\n\
                  <div class='product'> \n\
                      <img src='assets/products/"+products.rutaimg+"'>\n\
                      <div class='detail-title'>"+products.namepro+"</div>\n\
                      <div class='detail-description'>"+products.descriptionpro+"</div>\n\
                      <div class='detail-price'>"+formatprice(products.pricepro)+"</div>\n\
                  </div>\n\
                </a>\n\
            </div>");
        })
    return true;
}

function formatprice(price){
    let valor = price.toString();
    let recorrer = price.split(".");
    return "S/. "+recorrer[0]+".<span>"+recorrer[1]+"</span>";

}

const ProductsData= async()=>{
$.ajax({
        type: "GET",
        url: GlobalApisLocation+"ProductController.php?op=GetAll", // AQUI apuntamos al webservices
        data: "",
        dataType: 'json',
        success: function (datos) {
        console.log(datos); 
        displayProductsData(datos);
        },
        error: function (datos) {
            console.log("Error");
    }
});
}