window.onload = function(){
    var A=window.location.search.split('=');
    //console.log(JSON.parse(A[1].replaceAll("%22",'"').replaceAll("\"",'"').toString()));
    ProductsOrderPayData(JSON.parse(A[1].replaceAll("%22",'"').replaceAll("\"",'"').toString()));
};


const displayProductsOrderPayData =(ProductsOrderPayData)=>{
    ProductsOrderPayData.forEach(productsorder=>{
        $('#body-orders-id').append("<div class='item-orders'>\n\
            <div class='img-order'>\n\
                <img src='assets/products/"+productsorder.rutaimg+"'>\n\
            </div>\n\
            <div class='detail-order'>\n\
                <h3>"+productsorder.namepro.replaceAll('%20',' ').replaceAll('%C3%B1','ñ')+"</h3>\n\
                <p><b>Price:</b>S/"+formatprice(productsorder.pricepro)+"</p>\n\
                <p><b>Date:</b>"+productsorder.date_order+"</p>\n\
                <p><b>State:</b>"+state(productsorder.state_order)+"</p>\n\
                <p><b>Address:</b>"+productsorder.address_order.replaceAll('%20',' ').replaceAll('%C3%B1','ñ')+"</p>\n\
                <p><b>Phone:</b>"+productsorder.phone_order+"</p>\n\
            </div>");
        })
    return true;
}
function formatprice(price){
    let valor = price.toString();
    let recorrer = price.split(".");
    return "S/. "+recorrer[0]+".<span>"+recorrer[1]+"</span>"

}
function state(sta){
    switch (sta) {
        case 1:
            return 'For processing';
            break;
        case 2:
            return 'Paid';
            break;
        default:
            break;
    }
}


 const ProductsOrderPayData= async(data)=>{
   // let Jsonp = localStorage.Jsonp;
    console.log(data);
    displayProductsOrderPayData(data);
} 