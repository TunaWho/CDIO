$( document ).ready(function() {
    updateOn = function(id,qty){
    let quantity = qty;
        $(document).off('click', '#plus').on('click', '#plus',function() {
            quantity = 1;
            }); 
        $(document).off('click', '#minus').on('click', '#minus',function() {
            quantity = -1;
            });
    $.get(
        "http://localhost/myproject1/cart/update",
        {id:id,qty:quantity},
        function(){
            location.reload();
        });
    }
    $('.xs').click(function (e) { 
        e.preventDefault();
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        url: "http://localhost/myproject1/home",
        data: {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
        },
        dataType: 'json',
        success: function(response){
            if(response.success == true){
                $('#form').submit();
                }else{
                    let res = JSON.parse(JSON.stringify(response));
                    $('.alert-danger').css('display','block');
                    if($('.alert-danger span').length>0){$('.alert-danger span').remove();}
                    $.each(res, function(key, value){
                        $('.alert-danger').append('<span>'+value+'</span>');
                    })
                }
            }
        });	
    });
});