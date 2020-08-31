const csrf_token = $("meta[name='_token']").attr("content");
const home = $('base').attr('href');

$.get(home+'gio-hang/get', function(data, status) {
    if (status == 'success') load(data);
});

function load(cart) {
    let list = $("#show-cart");
    list.html("");

    let products = cart['giohang'];

    $.each(products, function(id, prod) {
        list.append("<div class='total-cart-pro'>\
        <div class='single-cart clearfix'>\
             <div class='cart-img f-left'>\
                   <a href='/Home/GetSpDetail/" + prod.id + "'>\
                      <img src= 'anh/anhsp/" + prod.hinhanh + "' alt='Cart Product' style='width:50px; height:50px; margin-top:16px;' />\
                   </a>\
             <div class='del-icon'>\
                   <a class='bt_remove_product' onclick='removeCart("+ prod.id + ")'>\
                      <i class='zmdi zmdi-close'></i>\
                   </a>\
             </div>\
        </div>\
        <div class='cart-info f-left'>\
               <h6 class='text-capitalize'>\
                      <a href='sanpham/" + prod.id + "'>" + prod.name + "</a>\
               </h6>\
               <p><span>SL<strong>:</strong></span>" + prod.soluong + "</p>\
               <p><span>Giá<strong>:</strong></span>" + prod.gia + "</p>\
        </div>\
        </div>\
</div>");
    });

    $("#total_price").html(formatNumber(cart['tong']));
}

$("[data-cart='add']").on("click", function(e) {
    e.preventDefault();

    let t = $(this);

    let id = t.attr("data-id");

    $.post(home+'gio-hang/add', {
        _token: csrf_token,
        id: id
    }, function(data, status) {
        if(data.status=="login")
        {
            location.href='khachhang';
            return;
        }
        if (status == 'success' && data.status != 'error') {
            load(data);
        }
    });
});

function removeCart(id) {
    $.get(home+'gio-hang/remove', { id: id }, function(data, status) {
        if (status == 'success' && data.status != 'error') {
            load(data);
        }
    });
}

// $("[data-view='quick-view']").on("click", function(e) {
//     e.preventDefault();

//     let t = $(this);
//     let cur_html = t.html();
//     t.html(loading);

//     let view = $("#quickViewModal");
//     let id = $(this).attr("data-id");
//     let list_image = $("[data-role='select-image']");
//     list_image.html("");

//     $.get('/san-pham/get', { id: id }, function(data, status) {
//         if (status == 'success' && data.status != 'error') {

//             view.find('#title').html(data.name);
//             view.find('#image').attr('src', data.image);
//             view.find(".product-price").html(formatNumber(data.price) + "đ");
//             view.find(".product-description").html(data.description);

//             view.find('#id').prod(data.id);

//             if (data.colors.length > 0) {
//                 $(".list-color").html("");
//                 $.each(data.colors, function(i, e) {
//                     $(".list-color").append('<label class="custom-radio mr-3">\
//                         <input type="radio" name="color" ' + (i == 0 ? 'checked' : '') + ' produe="' + e + '">\
//                         <span class="checkmark" style="background-color: ' + e + ';"></span>\
//                     </label>');
//                 });
//                 $("#select-color").show();
//             }

//             if (data.sizes.length > 0) {
//                 $("#list-size").html("");
//                 $.each(data.sizes, function(i, e) {
//                     $("#list-size").append('<option produe="' + e + '">' + e + '</option>');
//                 });
//                 $("#select-size").show();
//             }

//             $("#select-quantity").attr("max", data.quantity);
//             view.find('.modal-footer>a').attr("href", data.link);

//             view.show();
//         } else {
//             openNotifications('danger', 'Có lỗi xảy ra!');
//         }
//         t.html(cur_html);
//     });

// });

// function quickView(form) {
//     let t = $(form['submit']);
//     let cur_html = t.html();
//     t.html(loading);

//     let id = form['id'].produe;

//     let color = 0;
//     if (form['color'] !== undefined) {
//         color = form['color'].produe;
//     }

//     let size = 0;
//     if (form['size'] !== undefined) {
//         size = form['size'].produe;
//     }

//     let quantity = form['quantity'].produe;

//     try {
//         $.post('/cart/add', {
//             _token: csrf_token,
//             id: id,
//             color: color,
//             size: size,
//             quantity: quantity
//         }, function(data, status) {
//             if (status == 'success' && data.status != 'error') {
//                 load(data);
//                 openNotifications('success', 'Đã thêm sản phẩm vào giỏ.');
//             } else {
//                 openNotifications('danger', 'Có lỗi xảy ra!');
//             }
//             t.html(cur_html);
//         });
//     } catch (error) {
//         console.log(error);
//     }
//     return false;
// }

function formatNumber(nStr, decSeperate = ",", groupSeperate = ",") {
    nStr += '';
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
    }
    return x1 + x2;
}