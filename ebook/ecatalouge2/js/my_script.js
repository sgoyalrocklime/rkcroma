$(document).ready(function() {

    $('.group').fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic',
        // closeClick: true,
        openSpeed: 1000,
        closeSpeed: 1200,
        orig: 'center',
        arrows: false,

        beforeShow: function() {
            this.title = $(this.element).data("caption");
            $('.fancybox-inner').prepend('<i class="fa fa-heart-o fav_pop"></i>');
            // $('.fancybox-inner').prepend('<div id="imgContainer"><div id="positionButtonDiv"><span><img id="zoomInButton"class="zoomButton" src="assets/zoomIn.png" title="zoom in" /><img id="zoomOutButton" class="zoomButton" src="assets/zoomOut.png" title="zoom out" alt="zoom out" /></span></div>');
            // $('.fancybox-inner').prepend('<button class="download">download</button>');

        },
        // afterShow: function() {
        // $('.fancybox-image').smartZoom({'containerClass':'zoomableContainer'});
        //    $('#zoomInButton,#zoomOutButton').bind("click", zoomButtonClickHandler);               
        //    function zoomButtonClickHandler(e){
        //        var scaleToAdd = 0.6;
        //        if(e.target.id == 'zoomOutButton')
        //            scaleToAdd = -scaleToAdd;
        //        $('.fancybox-image').smartZoom('zoom', scaleToAdd);
        //     } 
        //   },

    });
    // $('.group1').fancybox({
    //     openEffect: 'elastic',
    //     closeEffect: 'elastic',
    //     // closeClick: true,
    //     openSpeed: 1000,
    //     closeSpeed: 1200,
    //     orig: 'center',
    //     arrows: false,
    // });popup group2 list-group-item toggle-page



    $('.ui-menu-item').fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic',
        // closeClick: true,
        openSpeed: 1000,
        closeSpeed: 1200,
        orig: 'center',
        arrows: false,
        autoSize:true,
            'titleShow': 'true', 


    });



    if (typeof(Storage) !== "undefined") {

        if (localStorage.length != 0) {

            var count = localStorage.length;
            $('.fav-countholder').show().html('<i class="fa fa-heart"></i> ' + count);
        }

        $('body').on({
            click: function() {
                var marblecode = $(this).parents('.fancybox-skin ').find('.fancybox-title').text().trim() + '|';
                var marbleimage = $(this).parents('.fancybox-inner ').find('.fancybox-image').attr('src');
                var pageget = $('.fancybox-title').text().trim();
                var pageid = $('area[data-caption="' + pageget + '"]').parents('.responsive').attr('id');
                //var pageid= 

                localStorage.setItem(marblecode + pageid, marbleimage);

                $(this).parents('.fancybox-skin').prepend('<div class="alert alert-success notify" role="alert"><p>Added to Favorites</p></div>');
                var count = localStorage.length;
                $('.fav-countholder').show().html('<i class="fa fa-heart"></i> ' + count);
                setTimeout(function() {
                    $('.notify').remove();

                }, 2000)

            }
        }, '.fav_pop')

        $('#favorite').on('shown.bs.modal', function() {
            $('#favorites-hold').html('');
            var marblecode = $(this).parents('.fancybox-skin ').find('.fancybox-title').text().trim() + '|';

            $.each(localStorage, function(index, value) {

                var a = index.split('|')

                $('#favorites-hold').append('<p><button type="button" src="' + value + '" data-caption="marblecode" class="popup list-group-item toggle-page" data-id="' + a[1] + '" ><img src="' + value + '" data-caption="marblecode" class="list-group-item">' + a[0] + '</button><i class="fa fa-trash pull-right remove-fav"></i></p>')

            }); // Ending Each Function
        });



        $('body').on({
            click: function() {
                var remove1 = $(this).parents('p').find('button').attr('data-id');
                var remove2 = $(this).parents('p').find('button').text().trim() + '|';
                var remove = remove2 + remove1;
                console.log(remove);

                localStorage.removeItem(remove);

                $(this).parents('p').remove();

                var favlength = localStorage.length;

                $('.fav-countholder').html('<i class="fa fa-heart"></i> ' + favlength);

            }
        }, '.remove-fav')

        // $('body').on({
        //     click: function() {
        //         $('.group2').fancybox({
        //             openEffect: 'elastic',
        //             closeEffect: 'elastic',
        //             // closeClick: true,
        //             openSpeed: 1000,
        //             closeSpeed: 1200,
        //             orig: 'center',
        //             arrows: false,
        //             autoSize: false,

        //             'titleShow': 'true',                   
        //             afterClose:function(){

        //                 $('.popup').show();
        //             }



        //         });

        //     }
        // }, '.popup')



         
    $('.list-group-item').fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic',
        closeClick: true,
        openSpeed: 1000,
        closeSpeed: 1200,
        orig: 'center',
        arrows: false,
        autoSize: true,
    //     'width'  : '30%',           // set the width
    // 'height' : '50%',           // set the height
    // 'type'   : 'iframe',
    'titleShow': 'true', 

         afterClose:function(){

                        $('.popup').show();
                    }
    });

        $('.clear-favorites').click(function() {
            localStorage.clear();
            $('#favorites-hold').html('');
            $('.fav-countholder').show().html('<i class="fa fa-heart"><small>0</small></i> ');

        })

    } else {
        alert('Sorry !!! Your Browser Does Not Support LocalStorage')
    }


});
