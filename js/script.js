$('document').ready(function(){

    $('a.fancyboxItem').fancybox({'overlayOpacity': 0.8,
                                  'overlayColor': '#000'});
    
    
    $('#slider').cycle({fx: 'scrollLeft',
                    pager: '.pager',
                    speed: 500});
    
    
    
    $('#sidebar nav ul li span').click(function(){
    
            $(this).parent().children('ul').toggle("slow");
    
    });
    
    
        $("#ajax-form").submit(function(event) {
            // Stop the browser from submitting the form.
            event.preventDefault();
    
            $.post(
            $("#ajax-form").attr('action'),
            $("#ajax-form").serialize(),
                /*    {imie: $("input[name=imie]").val(),
                                    nazwisko: $("input[name=nazwisko]").val(),
                                    email: $("input[name=email]").val(),
                                    tresc: $("textarea[name=tresc]").val()},*/
                function(data)
                {
                    $("#overlay").css({'display' : 'block', 'opacity' : '0.5'});
                    $("#alert").fadeIn("slow");
                    $("#alert p").text(data);
    
            $("input[name=imie]").val('');
            $("input[name=nazwisko]").val('');
            $("input[name=email]").val('');
            $("textarea[name=tresc]").val('');
                }
    
            );
        });
    
    
            $("#alert header a").click(function(){
                $('#overlay').css({'display' : 'none'});
                $("#alert").fadeOut("slow");
            });
    
    
    });