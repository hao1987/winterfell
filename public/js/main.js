$(function() {
    $(document).on("click", ".quick-view", function () {
        var name = $(this).data('name');
        var description = $(this).data('description');

        var id = $(this).data('id');
        var price = $(this).data('price');
        var quantity = $(this).data('quantity');

        $(".modal-body #productName").text(name);
        $(".modal-body #productDescription").text(description);
        $(".modal-body input[type=hidden]").val(id);
        $(".modal-body #productUnitPrice").text('$' + price);

        $("select option").each(function() {
            $(this).remove();
        });
        for(var i=1; i<=quantity; i++) {
            var html = '<option value="'+i+'">'+i+'</option>';
            $('#inputQty').append(html);
        }
    });

    $("#addToCart").submit(function( event ) {
        event.preventDefault();

        var $form = $(this),
            product = $form.find( "input[name='product']" ).val(),
            quantity = $( "select#inputQty option:selected").val(),
            unitPrice = $("#productUnitPrice").text().substr(1),
            url = $form.attr( "action"),
            token = $('meta[name="csrf-token"]').attr('content');

        var post = $.post(url, {product: product, quantity: quantity, unitPrice: unitPrice, _token:token});

        post.done(function() {
            $("#quickView").modal('toggle');
            $("#itemsCtr").text(parseInt($("#itemsCtr").text()) + 1);
        }).fail(function() {
            window.location.href = "auth/login";
        });
    });

    $(document).on("click", ".remove-from-cart", function() {
        var remove = $(this),
            id = $(this).data('id'),
            token = $('meta[name="csrf-token"]').attr('content');

        var post = $.post('removefromcart', {shoppingCartItem: id, _token:token});

        post.done(function() {
            $(remove).closest('div .row').remove();
            $("#itemsCtr").text(parseInt($("#itemsCtr").text()) - 1);
        });
    });

    $("#applyCoupon").submit(function( event ) {
        event.preventDefault();

        var $form = $(this),
            submitBtn = $($form).find("button[type='submit']"),
            code = $form.find("input[name='couponCode']").val(),
            beforeDiscount = $('#total').text(),
            afterDiscount = beforeDiscount,
            token = $('meta[name="csrf-token"]').attr('content');

        if(!$(submitBtn).hasClass('disabled')) {
            var post = $.post('applycoupon', {coupon: code, _token:token});
            post.done(function (data) {
                if (data.error) {
                    $($form).find('span.help-block').text(data.error).css('color', 'red');
                    code = '';
                } else {
                    $($form).find('span.help-block').text("Coupon is valid.").css('color', 'green');

                    data = $.parseJSON(data);

                    if (data.percent_off > 0) {
                        afterDiscount = beforeDiscount * ( 100 - data.percent_off ) / 100;
                    } else if (data.amount_off > 0) {
                        afterDiscount = beforeDiscount - data.amount_off;
                    }

                    $('#total').html('<s style="color:#000">' + beforeDiscount + '</s> ' + Math.round(afterDiscount * 100) / 100).css('color', 'green');
                    $(submitBtn).addClass('disabled');

                }

                $('#placeOrder').data('coupon', code);
                $('#placeOrder').data('realcharges', Math.round(afterDiscount * 100) / 100);
                $('#placeOrder').data('totalcharges', beforeDiscount);

            });
        }
    });

    $(document).on("click", "#placeOrder", function() {

        var code = $('#placeOrder').data('coupon'),
            realCharges = $('#placeOrder').data('realcharges'),
            totalCharges = $('#placeOrder').data('totalcharges'),
            token = $('meta[name="csrf-token"]').attr('content');

        var post = $.post('placeorder', {coupon: code, realCharges: realCharges, amountOff: Math.round((totalCharges - realCharges) * 100) / 100, _token:token});
        post.done(function (data) {
            window.location.href = "/";
        });
    });

});
