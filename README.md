Установка
------------
1. Из корневой директории проекта в консоли набрать php composer.phar update (or composer update), чтобы composer докачал ядро Yii
2. Импортировать дамп базы Yii2.sql
3. Отредактировать файл config/db.php и подставить реальные данные
4. Доступ в администраторский раздел: admin/admin


### Важное описание ###
-------------
Так как я с Yii2 познакомился только 21.04.2016, то ввиду ограничений по срокам (сдача 22.04.2015 до 15:00), мне, к сожалению, не удалось реализовать выдачу данных в формате json по RESTful протоколу.
Когда подключал в сonfig/web.php выдачу json-кода, то у меня выводилась ошибка: cookieValidationKey must be configured with a secret key.
Хотя cookieValidationKey у меня в файле прописан и layouts был прописан <?= Html::csrfMetaTags() ?, но ошибка не исчезала и документация не помогла решить проблему. Уверен, что решение было на поверхности, просто из-за отсутствия опыта с фрейморком не удалось решить задачу. 

Также есть простая гостевая книга на Symfony 3 (https://github.com/linux815/guest_book) и собственная самописная CMS (https://github.com/linux815/bcms)

Плюс еще есть профиль на https://www.upwork.com/freelancers/~01d4f045abe2c14393



### Install via Composer

You can then install this project template using the following command:

~~~
php composer.phar update
or 
composer update
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
```
