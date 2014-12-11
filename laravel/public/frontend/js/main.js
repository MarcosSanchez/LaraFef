$(document).ready(function ($) {
  
    // Sidebar Toggle
    
    $('.btn-navbar').click( function() {
        $('html').toggleClass('expanded');
    });
    
    
    // Slide Toggles
    
    $('#section3 .button').on('click', function () {
        
        var section = $(this).parent();
        
        section.toggle();
        section.siblings(".slide").slideToggle('2000', "easeInQuart");
    });
    
    $('#section3 .read-more').on('click', function () {
        
        var section = $(this).parent();
        
        section.toggle();
        section.siblings(".slide").slideToggle('2000', "easeInQuart");
    });
    
    $('#section4 .article-tags li').on('click', function () {
        
        var section = $(this).parents('.span4');
        var category = $(this).attr('data-blog');
        var articles = section.siblings();


                console.log(section);
                // console.log(category);
               //   console.log(articles);
               alert(section);
        


        // Change Tab BG's
        $(this).siblings('.current').removeClass('current');
        $(this).addClass('current');
        
        // Hide/Show other articles
        section.siblings('.current').removeClass('current').hide();
        
        $(articles).each(function (index) {
            
            var newCategory = $(this).attr('data-blog');
            //alert(this);
            if ( newCategory == category ) {
                console.log(articles);
                $(this).slideDown('1000', "easeInQuart").addClass('current');
            }
        });

    });
    
    
        
    // Waypoints Scrolling
    
    var links = $('.navigation').find('li');
    var button = $('.intro button');
    var section = $('section');
    var mywindow = $(window);
    var htmlbody = $('html,body');

    
    section.waypoint(function (direction) {

        var datasection = $(this).attr('data-section');

        if (direction === 'down') {
            $('.navigation li[data-section="' + datasection + '"]').addClass('active').siblings().removeClass('active');
        }
        else {
            var newsection = parseInt(datasection) - 1;
            $('.navigation li[data-section="' + newsection + '"]').addClass('active').siblings().removeClass('active');
        }

    });
    
    mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
            $('.navigation li[data-section="1"]').addClass('active');
            $('.navigation li[data-section="2"]').removeClass('active');
        }
    });
    
    function goToByScroll(datasection) {
        
        if (datasection == 1) {
            htmlbody.animate({
                scrollTop: $('.section[data-section="' + datasection + '"]').offset().top
            }, 500, 'easeOutQuart');
        }
        else {
            htmlbody.animate({
                scrollTop: $('.section[data-section="' + datasection + '"]').offset().top + 70
            }, 500, 'easeOutQuart');
        }
        
    }

    links.click(function (e) {
        e.preventDefault();
        var datasection = $(this).attr('data-section');
        goToByScroll(datasection);
    });
    
    button.click(function (e) {
        e.preventDefault();
        var datasection = $(this).attr('data-section');
        goToByScroll(datasection);
    });
  
    // Snap to scroll (optional)
    
    /*

    section.waypoint(function (direction) {

        var nextpos = $(this).attr('data-section');
        var prevpos = $(this).prev().attr('data-section');

        if (nextpos != 1) {
            if (direction === 'down') {
                htmlbody.animate({
                    scrollTop: $('.section[data-section="' + nextpos + '"]').offset().top
                }, 750, 'easeOutQuad');
            }
            else {
                htmlbody.animate({
                    scrollTop: $('.section[data-section="' + prevpos + '"]').offset().top
                }, 750, 'easeOutQuad');
            }
        }
        

    }, { offset: '60%' });  
    
    */
   
       
    
    
    // Redirect external links
    
    $("a[rel='external']").click(function(){
        this.target = "_blank";
    });     
    
    
    // Modernizr SVG backup
    
    if(!Modernizr.svg) {
        $('img[src*="svg"]').attr('src', function() {
            return $(this).attr('src').replace('.svg', '.png');
        });
    }    
        
    

  // boton formulario contacto
                
                $("#FormContact").submit(function(e){
                    e.preventDefault();
                    
                    var dataString = $("#FormContact").serialize(); 
                    console.log(dataString);
                    $.ajax({
                        type: "POST",
                        url : "contacto",
                        data : dataString,
                   
                        beforeSend : function(){
                            console.log('beforeSend');

                            //$("#FormContact").hide();
                            $('.formAlert').html('Enviando...');
                            $('.formAlert').show('slow');
                            
                        },
                        error: function(errores){
                            console.log('errores');
                            console.log(errores);
                            console.log('errores2');

                        },
                        success : function(data){   
                            
                            console.log('success');
                            console.log(data);
                            console.log('success');
                                                    
                            if(data.error) {
                                
                                var errores = '';
                                for(datos in data.error){
                                    errores += '<small class="error">' + data.error[datos] + '</small><br>';
                                console.log(errores);
                                }


                                $('.formAlert').html('Se han producido errores:<br/> '+errores);    
                            
                               /* if(data.error.email[0])
                                    $('.formAlert').append(data.error.email[0]+'<br/>')
                                    
                                if(data.error.nombre[0])
                                    $('.formAlert').append(data.error.nombre[0]+'<br/>')
                                    
                                if(data.error.asunto[0])
                                    $('.formAlert').append(data.error.asunto[0]+'<br/>')
                            
                               // $("#FormContact").show();  */
                            }                      
                            
                            if(data.success)
                            {
                                
                                $('.formAlert').html(data.success);
                                
                            }   
                            
                            $('.formAlert').show('slow');
                            
                        }
                    },"json");
    
                });
            

  // validacion de login

$("#FormLogin").submit(function(e){
    e.preventDefault();
    var dataString = $("#FormLogin").serialize(); 
    console.log(dataString);
    
    $.ajax({
        type: "POST",
        url : "login",
        data : dataString,
                   
        beforeSend : function(){
            console.log('beforeSend');

            //$("#FormContact").hide();
            $('#formAlertLogin').html('Enviando...');
            $('#formAlertLogin').show('slow');
                            
        },
        complete:function(data){
            console.log('data');
            console.log(data);
            console.log('data');

        },
        success : function(data){   
                            
         console.log('success');
         console.log(data);
         console.log('success');


         if(data.success == false){
            var errores = '';
            for(datos in data.errors){
                errores += '<small class="error">' + data.errors[datos] + '</small><br>';
                console.log('data.errors[datos]');
            }
            $('#formAlertLogin').html('Se han producido errores:<br/> '+errores);    
                            
         }else{
            window.location.href = "admin/users";
            //$('#FormLogin')[0].reset();
            //$('.success_message').show().html(data.message);
         }
        },
        error: function(errores){
            console.log('errores');
            console.log(errores);
            console.log('errores2');
            $('.before').hide();
            $('.errors_form').html("");
            $('.errors_form').html(errores);

        }
                                
     });
     return false;
 });

});