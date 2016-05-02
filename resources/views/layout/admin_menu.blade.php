<div class="panel-body sitebar col-md-3">
	<p>Товары</p>
	<ul>
		<li>{!! link_to_route('admin.items.index','Все рецепты') !!}</li>	
		<li>{!! link_to_route('admin.items.create','Добавить рецепт') !!}</li>
		
	</ul>
	
	<p>Категории</p>
	<ul>
		<li>{!! link_to_route('admin.cat.index','Все категории') !!}</li>	
		<li>{!! link_to_route('admin.cat.create','Добавить категорию') !!}</li>
		
	</ul>
	
	
</div>