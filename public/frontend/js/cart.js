$("a.delete").click(function () {
    event.preventDefault();
    $(this).parent().parent().hide(400);
    let urlDelCart = $(this).data("url");
    $.ajax({
        type: "GET",
        url: urlDelCart,
        success: function (data) {},
    });
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/total-price",
        success: function (data) {
            let total = JSON.parse(data);
            $("#total-pet").html(total["thucung"]);
            $("#total-item").html(total["vatdung"]);
            $("#total-price").html(total["tong"]);
            $("#price").val(total["tong"]);
        },
    });
});
function reload() {
    location.reload();
}

$.ajax({
    type: "GET",
    url: "http://127.0.0.1:8000/cart",
    success: function (data) {
        console.log();
    },
});
