$(document).ready(function () {
    updateOn = function (id, qty) {
        let quantity = qty;
        $(document)
            .off("click", "#plus")
            .on("click", "#plus", function () {
                quantity = 1;
            });
        $(document)
            .off("click", "#minus")
            .on("click", "#minus", function () {
                quantity = -1;
            });
        $.get(
            "http://localhost/myproject1/cart/update",
            { id: id, qty: quantity },
            function () {
                location.reload();
            }
        );
    };
    $(".xs").click(function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "post",
            url: "http://localhost/myproject1/home",
            data: {
                email: $("input[name='email']").val(),
                password: $("input[name='password']").val()
            },
            dataType: "json",
            success: function (response) {
                if (response.success == true) {
                    $("#form").submit();
                } else {
                    if (validate()) {
                        //Chuyen response tra ve thanh chuoi JSON
                        let res = JSON.parse(JSON.stringify(response));
                        $(".alert-danger").css("display", "block");
                        if ($(".alert-danger p").length > 0) {
                            $(".alert-danger p").remove();
                        } //Ngan chan alert loop
                        $.each(res, function (key, value) {
                            $(".alert-danger").append("<p>" + value + "</p>");
                        });
                        $(".alert-danger").find('p').css("margin-bottom", ".7rem");
                    }
                }
            }
        });
    });
    $(".rgt").click(function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "post",
            url: "http://localhost/myproject1/",
            data: {
                fullname: $('input[name="fullname"]').val(),
                mail: $('input[name="mail"]').val(),
                pass: $('input[name="pass"]').val(),
                re_pass: $('input[name="re_pass"]').val()
            },
            dataType: "json",
            success: function (response) {
                let error = JSON.parse(JSON.stringify(response));
                if ($(".alert-danger p").length > 0 || $(".alert-success p").length > 0) {
                    $(".alert-danger p").remove();
                    $(".alert-success p").remove();
                } //Ngan chan alert loop
                if (error.success === undefined) {
                    $(".alert-danger.reg").css("display", "block");
                    $(".alert-success").css("display", "none");
                    $.each(error.errors, function (key, value) {
                        $.each(value, function (key, value) {
                            $(".alert-danger.reg").append("<p>" + value + "</p>");
                        });
                    });
                } else {
                    $(".alert-danger.reg").css("display", "none");
                    $(".alert-success").css("display", "block");
                    $(".alert-success").append("<p>" + error.success + "</p>");
                }
            }
        });
    });
    function validate() {
        const mail = document.forms["valid"]["email"].value;
        const password = document.forms["valid"]["password"].value;
        const alert = document.querySelectorAll("p");
        if (mail == "") {
            alert[0].innerHTML = "You have to enter E-mail";
            alert[1].innerHTML = "";
        } else if (password == "") {
            alert[0].innerHTML = "";
            alert[1].innerHTML = "Password can't be empty";
        } else {
            alert[0].innerHTML = "";
            alert[1].innerHTML = "";
            return true;
        }
        return false;
    }
});
