jQuery(document).ready(function($) {
    var countImg = $('.slider__inner img').length;
    var lineLength = (countImg * 165) + (countImg * 30);
    var containerWidth = $('.slider').width();
    var deltaWidth = -(lineLength - containerWidth);
    $('.slider__inner').css({'width':lineLength*1.03 + 'px'});

    $('.slider__left').click(function(){
        var margin = $('.slider__inner').css('marginLeft');
        if(parseInt(margin) != 0 && parseInt(margin) < 0) {
            var deltaMargin = parseInt(margin) + 195;
            if(parseInt(margin) > -195) {
                deltaMargin = 0;
            }
            $('.slider__inner').css({'marginLeft' : deltaMargin});
        } else if(parseInt(margin) > 0) {
            $('.slider__inner').css({'marginLeft' : 0});
        }

    });

    $('.slider__right').click(function(){
        var margin = $('.slider__inner').css('marginLeft');
        if(parseInt(margin) <= 0) {
            var deltaMargin = parseInt(margin) - 195;
            if(deltaMargin < deltaWidth)
                deltaMargin = deltaWidth;
            $('.slider__inner').css({'marginLeft' : deltaMargin});
        }
    });

    //Отправка из модальных окон

    $('#consulting-form__button-modal').click(function(e){
        e.preventDefault();
        var data = $('#consulting-form-modal').serialize();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/wp-admin/admin-ajax.php",
            data: ({
                action: "mediacan_ajax",
                data: data
            }),
            success: function(res){
                console.log(res);
                $('#modal-consult').modal('hide');

                $('#modal-consult').on('hidden.bs.modal', function(e) {
                    $('#modal-thank').modal('show');
                });
                $('input:not(input[type=submit])').val('');

            },
            error: function(res){
                console.log(res);
            }
        });
    });

    //Отправка из блока consulting

    $('#consulting-form__button').click(function(e){
        e.preventDefault();
        var data = $('#consulting-form').serialize();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/wp-admin/admin-ajax.php",
            data: ({
                action: "mediacan_ajax",
                data: data
            }),
            success: function(res){
                console.log(res);
                $('#modal-thank').modal('show');
                $('input:not(input[type=submit])').val('');

            },
            error: function(res){
                console.log(res);
            }
        });
    });

    //Отправка из блока заказ

    $('#modal-order').on('show.bs.modal', function(e) {
        var hiddenField = e.relatedTarget.previousSibling.previousSibling.innerText;
        $('#order-area-info').val(hiddenField);
    });
    $('#consulting-form__order-modal').click(function(e){
        e.preventDefault();

        var data = $('#consulting-form-order').serialize();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/wp-admin/admin-ajax.php",
            data: ({
                action: "mediacan_ajax",
                data: data
            }),
            success: function(res){
                console.log(res);
                $('#modal-order').modal('hide');

                $('#modal-order').on('hidden.bs.modal', function() {
                    $('#modal-thank').modal('show');
                });
                $('input:not(input[type=submit])').val('');

            },
            error: function(res){
                console.log(res);
            }
        });
    });

    //scroll-to-top

    $('.scroll-to-top').click(function(){
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });


});