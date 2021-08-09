$(document).ready(function(){
    ProductsData();
});

const displayProductsData =(ProductsData)=>{
    ProductsData.forEach(products=>{
        if(products.id_product == p){
            $('#imageid').attr('src','assets/products/'+products.rutaimg);
            $('#titleid').html(products.namepro);
            $('#priceid').html(formatprice(products.pricepro));
            $('#descriptionid').html(products.descriptionpro); 
        }
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
    return "S/. "+recorrer[0]+".<span>"+recorrer[1]+"</span>"

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
function start_Buy() {
    $('#load-modal-id').css('display','flex');
    swal({
        title: "Are you sure?",
        text: "You are about to add a new product to your cart",
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
                    $.ajax({
                    type: "POST",
                    url: GlobalApisLocation+"SessionController.php",
                    data:{id_product:p},
                    dataType: 'json',
                    success: function (datos) {
                    console.log(datos); 
                        if(datos.state){
                           // console.log(datos.detail);
                            var addprocess = JSON.stringify({id_user:u,id_product:p,date_order:"now()", state_order:"1", address_order:"--------", phone_order:"--------"});
                            console.log(addprocess);
                                $.ajax({
                                    type: "POST",
                                    url: GlobalApisLocation+"OrderController.php?op=Shopping",
                                    data: addprocess,
                                    dataType: 'json',
                                    success: function (datos) {
                                    $('#load-modal-id').css('display','none');
                                    console.log(datos); 
                                    if (datos.state) {
                                        swal("Correcto", datos.detail, "success");   
                                        open_index();     
                                    } else {
                                        swal("Advertencia",datos.detail,"info");
                                    }
                                },
                                error: function (datos) {
                                    console.log("Error");
                                }
                            });
                        }else{
                          //  console.log(datos.detail);
                            if(datos.open_login){
                                open_login();
                            }
                        }
                    },
                    error: function (datos) {
                        console.log("Error");
                }
            }); 
        }
        },
        function() {
        console.log("BACK");
        }
        );
 
}
function open_index(){
    window.location.href="index.php";
}
function open_login(){
    window.location.href="login.php";
}