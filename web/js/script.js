$('body').flipLightBox();


//slides the element with class "menu_body" when paragraph with class "menu_head" is clicked
$("#firstpane p.menu_head").click(function()
{

    $(this)
        .css({backgroundImage:"url(down.png)"})
        .next("div.menu_body")
        .slideToggle(300)
        .siblings("div.menu_body").slideUp("slow");

    $(this)
        .siblings()
        .css({backgroundImage:"url(left.png)"});
});


$('.checkbox').on('click', function () {
    e.preventDefault();
    var check= document.getElementById('checkbox').value;

    // document.getElementById("email-send").value='';
    if(check == 1){
        alert(123);
    }


});


$('.get_pay').on('click', function (e) {
    e.preventDefault();

    var group_id = document.getElementById('vacantion-group_id').value;
    var vac_name = document.getElementById('vacantion-vac_name').value;
    var price = document.getElementById('vacantion-price').value;
    var address = document.getElementById('vacantion-address').value;
    var contact_name = document.getElementById('vacantion-contact_name').value;
    var organization = document.getElementById('vacantion-organization').value;
    var phone = document.getElementById('vacantion-phone').value;
    var email = document.getElementById('vacantion-email').value;

    $.ajax({
        url: '/vacancy/payment',
        data: {
            group_id: group_id,
            vac_name: vac_name,
            price: price,
            address: address,
            contact_name: contact_name,
            organization: organization,
            phone: phone,
            email: email
        },
        type: 'POST',
        success: function(res){

             document.location.href = '/vacancy/payment';
        },
        error: function(){
            alert('Ошибка ввода данных!');
        }
    });


});