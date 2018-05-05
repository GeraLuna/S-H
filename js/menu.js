$(document).ready(function(){
	//seleccionamos los elementos (li) del menú que tienen un (ul)
	$('.menu li:has(ul)').click(function(e){
		e.preventDefault();

		//Comprobación de los elementos li si estan activos o no
		if($(this).hasClass('activado')){
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();
		}else{
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
		}
	});

	$('.btn-menu').click(function() {
		$('.contenedor-menu .menu').slideToggle();
	});

	$(window).resize(function() {
		if($(document).width() > 450){
			$('.contenedor-menu .menu').css({'display' : 'block'});
		}

		if($(document).width() < 450){
			$('.contenedor-menu .menu').css({'display' : 'none'});
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
		}
	});

	$('.menu li ul li a').click(function(){
		window.location.href= $(this).attr("href");
	});
});
