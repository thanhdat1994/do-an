$(function(){
    $('#content .close').click(function(){
        $(this).parent().fadeOut();
        return false;
    });

    $('.alert').animate({opacity: 1.0}, 5000).fadeOut();

    // Preview image before uploaded
    $("input[type='file']").change(function () {
        $("#wrapper-image-upload-preview").removeClass("hidden");
        readURL(this);
        $('.salons.form #edit-salon-image-result').addClass("hidden");
    });
});

function toogleMenuMobile(x) {
    x.classList.toggle("change");
    $('.menu-mobile').toggle();
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var $imagePreview = $('#image-upload-preview');

        reader.onload = function (e) {
            $imagePreview.attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// type: 'DD-MM-YYYY', 'MM-DD-YYYY', 'YYYY-MM-DD'
    // return array of first day of month
    function getRangeDate(type) {
        var fullDate = new Date();
        var twoDigitMonth = ((fullDate.getMonth()+1) < 10)? '0'+ (fullDate.getMonth()+1) : (fullDate.getMonth()+1);
        var twoDigitNextMonth = ((fullDate.getMonth()+2) < 10)? '0' + (fullDate.getMonth()+2) : (fullDate.getMonth()+2);
    
        var twoDigitDate = '01';
        var rangreDate;

        if (type === 'DD-MM-YYYY') {
            rangreDate = [
                twoDigitDate + "-" + twoDigitMonth + "-" + fullDate.getFullYear(),
                twoDigitDate + "-" + twoDigitNextMonth + "-" + fullDate.getFullYear()
            ];
        } else if (type === 'MM-DD-YYYY') {  
            rangreDate = [
                twoDigitMonth + "-" + twoDigitDate + "-" + fullDate.getFullYear(),
                twoDigitNextMonth + "-" + twoDigitDate + "-" + fullDate.getFullYear()
            ];
        } else if (type === 'YYYY-MM-DD') {
            rangreDate = [
                fullDate.getFullYear() + "-" + twoDigitDate + "-" + twoDigitMonth + "-".
                fullDate.getFullYear() + "-" + twoDigitDate + "-" + twoDigitNextMonth + "-"
            ];
        }
        return rangreDate;
    }
