var swiper = new Swiper(".mySwiper", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
  spaceBetween: 0,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  thumbs: {
    swiper: swiper,
  },
});
var swiper = new Swiper(".cardSwiper", {
  slidesPerView: 1,
  centeredSlides: true,
  grabCursor: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".indexSwiper", {
  slidesPerView: 4,
  freeMode: true,
  spaceBetween: 50,
  grabCursor: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
$(document).ready(function () {
 // validatio roles

 $( "form" ).validate({
  rules: {
    password:{
      required:true,
      minlength: 8,
      
    } ,
    passconf: {
      equalTo: "#password-field1"
    },
    email:{
      required:true,
      email: true,
      
    } ,
  },messages:{
    password:{
      required:"Please Enter your Password "
    },
    email:{
      required:"Please Enter your Email ",
      email: "Please Enter your Valid Email ",
      
    } ,
  },
  submitHandler:function (form) {
    form.submit();
  }
});
  var $this;
  $('.addCard').on('click', function (e) {
    e.preventDefault();
    let pro_qty = $(".pro_qty").val();
    let pro_sellingPrice = $(".pro_sellingPrice").data('sellingprice');
    let pro_MRP = $(".pro_mrp").data('mrp');
    let user_id = $(this).data('id');
    let fk_product_id = $(".fk_product_id").val();
    $.ajax({
      type: "POST",
      cache: false,
      url: baseUrl + "proDetails",
      data: { fk_product_id: fk_product_id, user_id: user_id, pro_qty: pro_qty, pro_sellingPrice: pro_sellingPrice, pro_MRP: pro_MRP },
      success: function (data) {
        let cardData = JSON.parse(data);
        if (cardData) {
          $("#CardCout").text(cardData['count']);
          $("#Update").text(cardData['Success']);
        } else {
          $("#errors").text('not added to card');
        }
      }
    });
    return false;
  })
  $('.updateQty').on('change', function (e) {
    let pro_qty = $(".pro_qty").val();
    let pro_sellingPrice = $(".pro_sellingPrice").data('sellingprice');
    let pro_MRP = $(".pro_mrp").data('mrp');
    let CostTotal = pro_sellingPrice * pro_qty;
    let MrpTotal = pro_MRP * pro_qty
    $(".pro_sellingPrice").text('₹' + " " + CostTotal);
    $(".pro_mrp").text('₹' + " " + MrpTotal);
  });
  $('.selectQty').on('change', function (e) {
    e.preventDefault();
    let pro_qty = $(this).val();
    let pro_sellingPrice = $(this).parents('.custom-row').find("h5").data('sellingprice');
    let pro_MRP = $(this).parents('.custom-row').find("del").data('cardmrp');
    let card_id = $(this).parents('.custom-row').find("input").val();
    let CostTotal = pro_sellingPrice * pro_qty;
    let MrpTotal = pro_MRP * pro_qty;
    $(this).parents('.custom-row').find("h5").text('₹' + " " + CostTotal);
    $(this).parents('.custom-row').find("del").text('₹' + " " + MrpTotal);
    // $(this).parents('.custom-row').find("span").text( off +' % OFF') ;
    $.ajax({
      type: "POST",
      cache: false,
      url: baseUrl + "quantity",
      data: { card_id: card_id, pro_qty: pro_qty, pro_sellingPrice: pro_sellingPrice, pro_MRP: pro_MRP },
      success: function (data) {
        console.log(data);
      }
    });
    return false;
  })
  // Rmove add card data function
  $('.cart_remove').on('click', function (e) {
    e.preventDefault();
    let id = $(this).data('id');
    parentElement = $(this).parents(".custom-row");
    $.ajax({
      type: "POST",
      cache: false,
      url: baseUrl + "card",
      data: { id: id },

      success: function (data) {
        let cardData = JSON.parse(data);
        if (cardData) {
          parentElement.remove();
          $("#delete").empty();
          $("#CardCout").text(cardData['count']);
          $("#delete").text(cardData['Success']);
        } else {
          $("#errors").text('not added to card');
        }

        console.log(data);
      }
    });
    return false;
  })

  // Rmove add card data 


  //  save user addresses
  $('#saveAddress').on('click', function (e) {
    e.preventDefault();
    let fullName = $('#addressName').val();
    let state = $('#addressState').val();
    let distic = $('#addressDistic').val();
    let subDistic = $('#addressSubDistic').val();
    let houseNo = $('#addressHouse').val();
    let streetAria = $('#addressStreet').val();
    let mobileNo = $('#addressMobile').val();
    let email = $('#addressEmail').val();
    let pinCode = $('#addressPin').val();
    let userId = $(this).data('id');

    $.ajax({
      type: "POST",
      cache: false,
      url: baseUrl + "checkout",
      data: {
        fullName: fullName, state: state, distic: distic, subDistic: subDistic,
        houseNo: houseNo, streetAria: streetAria, mobileNo, mobileNo,
        email: email, pinCode: pinCode, userId: userId
      },

      success: function (data) {
        $('#exampleModal').modal('hide');
        let addressData = JSON.parse(data);
        let addressNew = setFormData(addressData);
        $('.checkout_paymentform').append(addressNew);

      }
    });
    return false;
  })
  function setFormData(addressData) {
    let addressNew = "";
    addressNew += "<div class='addressContainer'>";
    addressNew += "<input type='radio' id='ratioBtn' name='ratio'/><label>";
    addressNew += " " + addressData['fullName'];
    addressNew += " " + addressData['state'];
    addressNew += " " + addressData['distic'];
    addressNew += " " + addressData['subDistic'];
    addressNew += " " + addressData['houseNo'];
    addressNew += " " + addressData['streetAria'];
    addressNew += " " + addressData['mobileNo'];
    addressNew += " " + addressData['pinCode'] + "</label>";
    addressNew += '<a class="consualt_btn" data-toggle="modal" data-target="#updateModel"  data-id=' + addressData["id"] + '>Edit</a>';

    addressNew += '</div>';
    return addressNew;
  };

  $('.editBtn').on('click', function (e) {
    e.preventDefault();
    $this = $(this).parent('.addressContainer').find('label');
    let id = $(this).data('id');
    let parentSelector = $(this).parent('.addressContainer');
    $.ajax({
      type: "POST",
      cache: false,
      url: baseUrl + "AddressFetch",
      data: { id: id },

      success: function (data) {
        let addressData = JSON.parse(data);
        $('#updateAddressName').val(addressData[0]['fullName']);
        $('#updateAddressState').val(addressData[0]['state']);
        $('#updateAddressDistic').val(addressData[0]['distic']);
        $('#updateAddressSubDistic').val(addressData[0]['subDistic']);
        $('#updateAddressHouse').val(addressData[0]['houseNo']);
        $('#updateAddressStreet').val(addressData[0]['streetAria']);
        $('#updateAddressMobile').val(addressData[0]['mobileNo']);
        $('#updateAddressEmail').val(addressData[0]['email']);
        $('#updateAddressPin').val(addressData[0]['pinCode']);
        $('#updateSaveAddress').val(addressData[0]['id']);
        $('#updateModel').modal("show")

      }
    });
    return false;

  });

  // save Update address

  $('#updateSaveAddress').on('click', function (e) {
 
    e.preventDefault();
    let id = $(this).val();
    let fullName = $('#updateAddressName').val();
    let state = $('#updateAddressState').val();
    let distic = $('#updateAddressSubDistic').val();
    let subDistic = $('#updateAddressSubDistic').val();
    let houseNo = $('#updateAddressHouse').val();
    let streetAria = $('#updateAddressStreet').val();
    let mobileNo = $('#updateAddressMobile').val();
    let email = $('#updateAddressEmail').val();
    let pinCode = $('#updateAddressPin').val();
    $.ajax({
      type: "POST",
      cache: false,
      url: baseUrl + "updateAddress",
      data: {
        fullName: fullName, state: state, distic: distic, subDistic: subDistic,
        houseNo: houseNo, streetAria: streetAria, mobileNo, mobileNo,
        email: email, pinCode: pinCode, id: id
      },

      success: function (data) {
        $('#updateModel').modal('hide');
        let addressData = JSON.parse(data);
         let updateAddressData = addressData['fullName']+"  "+ addressData['state'] +"  "+ addressData['distic'] +"  "+ addressData['subDistic']+"  " + addressData['houseNo'] +"  "+ addressData['streetAria'] +"  "+ addressData['mobileNo'] +"  "+ addressData['pinCode'];
         $this.text(updateAddressData);
      }
    });
    return false;

  });
  $('.addressContainer input[type="radio"]').on('click', function () {
    $(".btn_pay").removeClass("disabled");   
  });

$('#btnPay').on('click',function (e) {
  e.preventDefault();
  if ($('input[name="paymentMode"]').is(':checked')) {
    
    let address = $('input[name="ratio"]:checked').val();
    let paymentMode = $("input[name='paymentMode']:checked").val();
   $.ajax({
    type: "POST",
    cache: false,
    url: baseUrl + "paymentProcess",
    data: {
      id:address,paymentMode:paymentMode
    },

    success: function (data) {
      let orderId = JSON.parse(data);
       window.location = baseUrl +'success/'+ orderId['orderId'];
    }
    
  });
}else{
  alert("please Select PaymenthMode");
}

  
})
$('#buybtnPay').on('click',function (e) {
  e.preventDefault();
  if ($('input[name="paymentMode"]').is(':checked')) {
    
    let address = $('input[name="ratio"]:checked').val();
    let paymentMode = $("input[name='paymentMode']:checked").val();
    let pro_id = $(this).data('id');
   $.ajax({
    type: "POST",
    cache: false,
    url: baseUrl + "buypaymentProcess",
    data: {
      id:address,paymentMode:paymentMode,pro_id:pro_id 
    },

    success: function (data) {
      let orderId = JSON.parse(data);
       window.location = baseUrl +'success/'+ orderId['orderId'];
    }
    
  });
}else{
  alert("please Select PaymenthMode");
}

  
})
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
//   btnBuyNow
$('.btnBuyNow').on('click',function (e) {
  e.preventDefault();   
   let proId = $(this).data('proid');
    let proQty = $('#pro_qty').val();
   $.ajax({
    type: "POST",
    cache: false,
    url: baseUrl + "buyProduct",
    data: {
      proId:proId,proQty:proQty
    },

    success: function (data) {
      window.location = baseUrl +'buyCheckout/'+data;
    }
    
  });

})

$('.btnReadMore').on('click',function() {
  $(this).parent('span').parent('.des_div').find('.des_more').toggleClass('readMore');
  $(this).parent('span').parent('.des_div').find('.description').toggleClass('readless');
})

});

