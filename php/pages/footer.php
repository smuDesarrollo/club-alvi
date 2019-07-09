<footer class="container-fluid  footer  fixed-top">
	<div class="item  p2  ph12  center  nofw">
		<p>Todos los derechos reservados a Club Mayorista Alvi    |    Términos y Condiciones de uso    |    Locales</p>
	</div>
</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script defer src="php/js/jquery.flexslider.js"></script>

<script type="text/javascript">
	$(function(){
	SyntaxHighlighter.all();
	});
	$(window).load(function(){
	$('.flexslider').flexslider({
		animation: "slide",
		start: function(slider){
		$('body').removeClass('loading');
		}
	});
	});
</script>

<script src="php/js/jquery.min.js" ></script>
<script src="php/js/responsiveslides.min.js"></script>
<script src="php/js/myscript.js" ></script>

</body>
</html>