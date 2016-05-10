<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
 <!--HTML::style('assets/bootstrap/css/bootstrap-tagsinput.css') -->
	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/mystyle.css" rel="stylesheet">
	
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
<!-- Scripts -->
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>-->
	
	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/AjexFileManager/ajex.js"></script>
	
	<!--<link rel="stylesheet" href="/css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/js/jquery.fancybox.pack.js?v=2.1.5"></script>-->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>
	// добавление и удаление подкатегорий аяксом
	$(document).ready(function() {
		$("#subcatAdd").click(function (e) {

			e.preventDefault();
			var myData = {
				"subcat_name": $('input[name=subcat_name]').val(),
				"cat_id": $('input[name=cat_id]').val()
			};  //post variables

			$.ajax({
				type: "GET", // HTTP метод  POST или GET
				url: "/admin/subcat/add", //url-адрес, по которому будет отправлен запрос
				//dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
				data: myData, //данные, которые будут отправлены на сервер (post переменные)
				success: function (response) {

					$(".subcat_admin_item").prepend(
							'<tr id="row_' + response + '"><td>' + $("#subcat_name").val() + '</td><td><button class="btn btn-warning del_button" id="' + response + '" type="button">Удалить</button></td></tr>');
					$("#subcat_name").val(''); //очищаем текстовое поле после успешной вставки
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert("ошиббка!"); //выводим ошибку
				}
			});
		});

		$(".cart_quantity_up").click(function (e) {
			e.preventDefault();
			var myData = {"item_id" : $('input[name=hid_id]').val()};
			$.ajax({
				type: "GET", // HTTP метод  POST или GET
				url: "/cartIncr", //url-адрес, по которому будет отправлен запрос
				data: myData, //данные, которые будут отправлены на сервер
				dataType:"json",
				success: function (response) {
					$("input[name=quantity]").val(response.qty);
					$(".cart_total_price").empty();
					$(".cart_total_price").prepend(response.subtotal);
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert("ошиббка!"); //выводим ошибку
				}
			});
		});
		$(".cart_quantity_down").click(function (e) {
			e.preventDefault();
			var myData = {"item_id" : $('input[name=hid_id]').val()};
			$.ajax({
				type: "GET", // HTTP метод  POST или GET
				url: "/cartDecr", //url-адрес, по которому будет отправлен запрос
				data: myData, //данные, которые будут отправлены на сервер
				dataType:"json",
				success: function (response) {
					$("input[name=quantity]").val(response.qty);
					$(".cart_total_price").empty();
					$(".cart_total_price").prepend(response.subtotal);
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert("ошиббка!"); //выводим ошибку
				}
			});
		});
	});
</script>
<script>
	// добавление и удаление подкатегорий аяксом
	$(document).ready(function() {
		$("#subcatAdd").click(function (e) {
			
	        e.preventDefault();
			
	        if($("#subcat_name").val()==="") //simple validation
	        {
	            alert("Введите текст!");
	            return false;
	        }
			
	        var myData = {"subcat_name" : $('input[name=subcat_name]').val(),  "cat_id":$('input[name=cat_id]').val()};  //post variables

	        $.ajax({
	            type: "GET", // HTTP метод  POST или GET
	            url: "/admin/subcat/add", //url-адрес, по которому будет отправлен запрос
	            //dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
	            data: myData, //данные, которые будут отправлены на сервер (post переменные)
	            success:function(response){
	        
	            $(".subcat_admin_item").prepend(
	            	'<tr id="row_'+response+'"><td>'+$("#subcat_name").val()+'</td><td><button class="btn btn-warning del_button" id="'+response+'" type="button">Удалить</button></td></tr>');
	            $("#subcat_name").val(''); //очищаем текстовое поле после успешной вставки
	            },
	            error:function (xhr, ajaxOptions, thrownError){
	                alert("ошиббка!"); //выводим ошибку
	            }
	        });
	    });
	    
	    //Удаляем запись при клике по кнопке
	  $("body").on("click", ".del_button", function(e) {
	   		//alert("ошиббка!");
	        e.preventDefault();
	        //var clickedID = this.id;
        	//var DbNumberID = clickedID[1]; //и получаем номер из массива
        	var myData = 'subcat_id='+ this.id; //выстраиваем  данные для POST
	        //var myData = {"sub_cat_id" : $('input[name=sub_cat_id]').val(),  "_method":$('input[name=_method]').val()}; 
 			$('#row_'+ this.id).fadeOut("slow");
 			
	        $.ajax({
	            type: "GET", // HTTP метод  POST или GET
	            url: "/admin/subcat/del", //url-адрес, по которому будет отправлен запрос
	            //dataType:"text", // Тип данных
	            data:myData, //post переменные
	            success:function(response){
	            // в случае успеха, скрываем, выбранный пользователем для удаления, элемент
	            //$('#row_'+ this.id).fadeOut("slow");
	            },
	            error:function (xhr, ajaxOptions, thrownError){
	                //выводим ошибку
	                alert("ошиббка!");
	            }
	        });
	    });
	});
</script>
<script>
// добавление и удаление подкатегорий аяксом
	$(document).ready(function() {
		$("#tagAdd").click(function (e) {
			
	        e.preventDefault();
			
	        if($("#tag_name").val()==="") //simple validation
	        {
	            alert("Введите текст!");
	            return false;
	        }
			
	        var myData = {"tag_name" : $('input[name=tag_name]').val(),"post_id":$('input[name=post_id]').val()};  //post variables ,  "tag_id":$('input[name=tag_id]').val()

	        $.ajax({
	            type: "GET", // HTTP метод  POST или GET
	            url: "/admin/tagadd", //url-адрес, по которому будет отправлен запрос
	            //dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
	            data: myData, //данные, которые будут отправлены на сервер (post переменные)
	            success:function(response){
	        
	            $(".tag_list").prepend(
	            	'<span class="tag_row" id="row_'+response+'"><span>'+$("#tag_name").val()+'</span><button class="btn btn-warning del_tag_button" id="'+response+'" type="button">x</button></span>');
	            $("#tag_name").val(''); //очищаем текстовое поле после успешной вставки
	            },
	            error:function (xhr, ajaxOptions, thrownError){
	                alert("ошиббка!"); //выводим ошибку
	            }
	        });
	    });
	    
	    //Удаляем запись при клике по кнопке
	  $("body").on("click", ".del_tag_button", function(e) {
	   		//alert("ошиббка!");
	        e.preventDefault();
	        //var clickedID = this.id;
        	//var DbNumberID = clickedID[1]; //и получаем номер из массива
        	var myData = 'tag_id='+ this.id; //выстраиваем  данные для POST
	        //var myData = {"sub_cat_id" : $('input[name=sub_cat_id]').val(),  "_method":$('input[name=_method]').val()}; 
 			$('#row_'+ this.id).fadeOut("slow");
 			
	        $.ajax({
	            type: "GET", // HTTP метод  POST или GET
	            url: "/admin/tagdel", //url-адрес, по которому будет отправлен запрос
	            //dataType:"text", // Тип данных
	            data:myData, //post переменные
	            success:function(response){
	            // в случае успеха, скрываем, выбранный пользователем для удаления, элемент
	            //$('#row_'+ this.id).fadeOut("slow");
	            },
	            error:function (xhr, ajaxOptions, thrownError){
	                //выводим ошибку
	                alert(thrownError);
	            }
	        });
	    });
	});
</script>
<script>

  function ConfirmDelete()
  {
  var x = confirm('Вы уверенны. что хотите выполнить удаление?');
  if (x)
    return true;
  else
    return false;
  }

</script>
	
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/">Главная</a></li>
					<li><a href="/admin">Админка</a></li>
					<li><a href="/items">Товары</a></li>
					<li><a href="/cart">Корзина</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	
</body>
</html>
