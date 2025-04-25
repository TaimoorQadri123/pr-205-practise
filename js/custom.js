$(document).on('click','.inc',function(){
    let productId = $(this).closest('.qtyBox').find('.pId').val();
    // console.log(productId);
    let productQty =$(this).closest('.qtyBox').find('.num-product');
    let productQtyInt = parseInt(productQty.val());
    // console.log(productQtyInt);
    if(!isNaN(productQtyInt)){
        let updatedQty = productQtyInt;
        // console.log(updatedQty,'hi');
        updatedQtyIncDec(productId,updatedQty);
    }

});

$(document).on('click','.dec',function(){
    let productId = $(this).closest('.qtyBox').find('.pId').val();
    // console.log(productId);
    let productQty =$(this).closest('.qtyBox').find('.num-product');
    let productQtyInt = parseInt(productQty.val());
    // console.log(productQtyInt);
    if(!isNaN(productQtyInt)){
        let updatedQty = productQtyInt;
        // console.log(updatedQty,'hi');
        updatedQtyIncDec(productId,updatedQty);
    }

});

function updatedQtyIncDec(pId,pQty){
    $.ajax({

        url:"shoping-cart.php",
        type:"post",
        data : {
            "incDec":true ,
            "prId":pId ,
            "prQty":pQty
        },
        success : function(data){
            // console.log(data);
        }
    })
}