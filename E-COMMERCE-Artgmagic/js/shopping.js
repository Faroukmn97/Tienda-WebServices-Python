$(document).ready(function(){
    ProductsOrderData();
});

const displayProductsOrderData =(ProductsOrderData)=>{
    ProductsOrderData.forEach(productsorder=>{
        $('#body-orders-id').append("<div class='item-orders'>\n\
            <div class='img-order'>\n\
                <img src='assets/products/"+productsorder.rutaimg+"'>\n\
            </div>\n\
            <div class='detail-order'>\n\
                <h3>"+productsorder.namepro+"</h3>\n\
                <p><b>Price:</b>S/"+formatprice(productsorder.pricepro)+"</p>\n\
                <p><b>Date:</b>"+productsorder.date_order+"</p>\n\
                <p><b>State:</b>"+state(productsorder.state_order)+"</p>\n\
                <p><b>Address:</b>"+productsorder.address_order+"</p>\n\
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
            return 'To pay';
            break;
        default:
            break;
    }
}

const ProductsOrderData= async()=>{
    $.ajax({
            type: "GET",
            url: GlobalApisLocation+"OrderController.php?op=Product_order", // AQUI apuntamos al webservices
            data: "",
            dataType: 'json',
            success: function (datos) {
            console.log(datos); 
            json_order = datos;
            displayProductsOrderData(datos);
            },
            error: function (datos) {
                console.log("Error");
        }
    });
}

function processbuy(){
    $('#load-modal-id').css('display','flex');
    swal({
        title: "Are you sure?",
        text: "You are about to purchase these products",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Cancel",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirm",
        closeOnConfirm: false
        }
        ).then(
        function (isConfirm) {
        if (isConfirm) {

        const cardnumerID = $("#cardnumerID").val(); 
        const cardnameID = $("#cardnameID").val();
        const cardmonthID = $("#cardmonthID").val();
        const cardyearID = $("#cardyearID").val();
        const cardccvID = $("#cardccvID").val();

        const phoneuserID = $("#phoneuserID").val(); 
        const addressuserID = $("#addressuserID").val(); 
        if (phoneuserID === "" || addressuserID === "" || cardnumerID === "" || cardnameID === "" || 
        cardmonthID === "" || cardyearID === "" || cardccvID === "") {
            swal("Complete los campos", "error");
            $('#load-modal-id').css('display','none');
            } else
            {
            var buyprocesscreditcard = JSON.stringify({cardnumer:cardnumerID, cardname:cardnameID, cardmonth:cardmonthID,cardyear:cardyearID,cardccv:cardccvID});     
            console.log(buyprocesscreditcard);
                 $.ajax({
                    method: 'POST',
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    url: 'http://localhost:5000/validcardstore',
                    data: buyprocesscreditcard,
                    success: function(data) {
                        console.log(data);
                        alert("Su tarjeta de crédito" + data.type + "es válida");
                        if(data.state){
                        var buyprocess = JSON.stringify({json_order:json_order, address_order:addressuserID, phone_order:phoneuserID});
                        console.log(buyprocess);
                            $.ajax({
                                    type: "PUT",
                                    url: GlobalApisLocation+"OrderController.php?op=Confirm_product", // AQUI apuntamos al webservices
                                    data: buyprocess,
                                    dataType: 'json',
                                    success: function (datos) {
                                    $('#load-modal-id').css('display','none');
                                        if (datos.state) {
                                            swal("Correcto", datos.detail, "success");  
                                            var myJsonString = JSON.stringify(datos.body);

                                        //  amplify.store("myJsonString",myJsonString)
                                            open_order(myJsonString);

                                        } else {
                                            swal("Advertencia",datos.detail,"info");
                                        }
                                    },
                                    error: function (datos) {
                                        console.log("Error");
                                }
                            });
                            $('#load-modal-id').css('display','none');
                        }else{
                            swal("Error al verificar la tarjeta de crédito", "error");
                            $('#load-modal-id').css('display','none');
                        }
                    },
                    error: function (data) {
                        console.error(data);
                        swal("Error al verificar la tarjeta de crédito", "error");
                        $('#load-modal-id').css('display','none');
                    }
                });  
                

           
            }
        }
        },
        function() {
        console.log("BACK");
        }
        );

}
function open_order(param){
    window.location.href="order.php?VarjsonGlobal="+param;
}