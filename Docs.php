<?php

 //Установка компосера
php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php
php -r "if (hash('SHA384', file_get_contents('composer-setup.php')) === 'fd26ce67e3b237fffd5e5544b45b0d92c41a4afe3e3f778e942e43ce6be197b9cdc7c251dcde6e2a52297ea269370680') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); }"
php composer-setup.php
php -r "unlink('composer-setup.php');"


//Установка Ларавал:
composer create-project laravel/laravel Owl 5.1 --prefer-dist

//обновление
php composer.phar update
composer update

//Список всех доступных команд
php artisan list

//Помощь по выбранной команде
php artisan help migrate
// просмотр всех маршрутов
php artisan route:list

//Установка контроллеров 
php artisan make:controller *имя контроллера*
php artisan make:model **
php artisan make:middleware *имя*

//создаст специальную таблицу в базе данных, чтобы отследить, когда миграция выполнена
php artisan migrate:install

composer dump-autoload
//создание миграций
//накатить все миграции
php artisan migrate //--force  если на продакшине
//накатить выбранные
php artisan make:migration *название миграции*
php artisan make:migration create_order_table --table=order --create
php artisan make:migration create_item_table --table=item --create
php artisan make:migration create_cat_table --table=cat --create
php artisan make:migration create_subcat_table --table=subcat --create

//вставить в файл миграции, для создания нужной таблицы
Schema::create('pages', function (Blueprint $table) {
 $table->increments('id');
 $table->string('slug', 255);
 $table->string('status', 255);
 $table->string('title', 255);
 $table->text('content');
 $table->timestamps();		
});


Schema::drop('pages');

//Запись сидов в базу
php artisan db:seed ;


//Шаблонизатор Blade
//вывод шапки
@extends('app')

//блок для контента
@section('content')
	//тут контент
@endsection // или @stop

//вставка переменных в шаблон
{{ $post->title }} //с экранированием тегов
{!! $post->title !!}//без экранирования тегов



//дебагбар
composer require barryvdh/laravel-debugbar
//providers
'Barryvdh\Debugbar\ServiceProvider',
//aliases
'Debugbar' => 'Barryvdh\Debugbar\Facade',


//composer пакеты для установки
"laravelcollective/html": "~5.0",
"barryvdh/laravel-debugbar": "~2.0",
"patricktalmadge/bootstrapper": "~5",
"cviebrock/eloquent-sluggable": ">=3.0.0-alpha",
"doctrine/dbal": "2.5.0",
"laracasts/generators": "~1.1",
"laracasts/flash": "~1.3",
"barryvdh/laravel-ide-helper": "~2.0",
"creativeorange/gravatar": "~1.0",
"intervention/image": "~2.2",
"ivanlemeshev/laravel5-cyrillic-slug": "1.0.0"

"sleeping-owl/admin": "2.*"
"gloudemans/shoppingcart": "~1.2"
//GIT
 //убрать ошибку при обращении к гитхабу
git config --global core.autocrlf false
git config --global core.safecrlf false

git add *file*
git commit -m "message"
git remote add origin https://github.com/
git push -u origin master
git pull origin master // скачать с репрозитория на локалку





