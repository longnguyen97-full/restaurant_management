$(document).ready(function () {
    $("a.add-to-cart").click(function (e) {
        e.preventDefault();
        let data = getData(this);
        ajaxAddToCart(data);
    });

    $("a.remove-from-cart").click(function (e) {
        e.preventDefault();
        let data = getData(this);
        ajaxRemoveFromCart(data);
    });

    $(".quantity input").change(function () {
        console.log($(this).val());
        console.log($(this).data("id"));
        let data = getData(this);
        let quantity = $(this).val();
        data["quantity"] = quantity;
        ajaxUpdateQuantity(data);
    });

    // Helpers
    const getData = (item) => {
        let id = $(item).data("id");
        let numberOfItem = $(".increase-number-of-item");

        return {
            id: id,
            numberOfItem: numberOfItem,
        };
    };

    // Ajax functions
    const ajaxAddToCart = (data) => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        $.ajax({
            url: `/carts`,
            method: "POST",
            data: {
                // Any data to be sent to the server
                id: data.id,
            },
            success: function (response) {
                // Handle the response from the server
                let totalItem = data.numberOfItem.text();
                $(data.numberOfItem).html(parseInt(totalItem) + 1);
            },
        });
    };

    const ajaxRemoveFromCart = (data) => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        $.ajax({
            url: `/carts/${data.id}`,
            method: "DELETE",
            data: {
                // Any data to be sent to the server
                id: data.id,
            },
            success: function (response) {
                // Handle the response from the server
                let item = $(`.row-${data.id}`);
                let quantity = $(item).find(".quantity input");

                let totalItem = data.numberOfItem.text();
                $(data.numberOfItem).html(parseInt(totalItem) - quantity.val());

                item.remove();
            },
        });
    };

    const ajaxUpdateQuantity = (data) => {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        $.ajax({
            url: `/carts/${data.id}`,
            method: "PUT",
            data: {
                // Any data to be sent to the server
                id: data.id,
                quantity: data.quantity,
            },
            success: function (response) {
                // Handle the response from the server
                $(data.numberOfItem).html("");
                let quantity_list = $(".quantity input");
                let quantity = 0;
                $.map(quantity_list, function (value) {
                    quantity += parseInt($(value).val());
                });
                $(data.numberOfItem).html(quantity);
            },
        });
    };
});
