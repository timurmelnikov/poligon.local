1. Laravel урок №1: [ Установка фреймворка ] - https://www.youtube.com/watch?v=jlplQaItZa0

- Конфиг апача:
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "C:/xampp/htdocs/poligon.local/public"
    ServerName poligon.local

    <Directory /xampp/htdocs/poligon.local/public>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order Allow,Deny
        Allow from all
    </Directory>

    ErrorLog "logs/poligon.local-error.log"
    CustomLog "logs/poligon.local-access.log" common
</VirtualHost>


- Указываем версию при установке:
composer create-project --prefer-dist laravel/laravel=5.7.2

- После клонирования репозитория:

Копировать .env.example в .env

php artisan key:generate

2. Laravel урок №2: [ Установка базовых пакетов и плагинов ] - https://www.youtube.com/watch?v=iG6RtfkkoKQ

- Устанавливаем плагин  PhpStorm - https://plugins.jetbrains.com/plugin/7532-laravel

- Устанавливаем пакет - https://github.com/barryvdh/laravel-ide-helper
composer require --dev barryvdh/laravel-ide-helper

- Настраиваем его!!!

Добавляем в композер
"scripts":{
    "post-update-cmd": [
        "Illuminate\\Foundation\\ComposerScripts::postUpdate",
        "php artisan ide-helper:generate",
        "php artisan ide-helper:meta"
    ]
},

выполняем - composer update


- Создаем парпку docs

- Настраиваем директории PhpStorm

- Устанавливаем composer require barryvdh/laravel-debugbar --dev

3. Laravel урок №3: [ Создание БД. Миграции ] - https://www.youtube.com/watch?v=RnZhGrz7aLE

- Создаем БД poligon в кодировке utf8mb4_unicode_ci

- Создаем модели и миграции:
php artisan make:model Models/BlogCategory -m
php artisan make:model Models/BlogPost -m

4. Laravel урок №4: [ Создание таблиц ] - https://www.youtube.com/watch?v=5dZEVePueGQ

- правим AppServiceProvider
Добавляем в     public function boot()
                {
                    Schema::defaultStringLength(191); // Было в Laravel урок №3: [ Создание БД. Миграции ]
                }
Это связано с версией БД и описано в - https://laravel.com/docs/5.7/migrations

- php artisan migrate


5. Laravel урок №5: [ Структура таблиц ] - https://www.youtube.com/watch?v=cUjMnDGKS78

- Переносим User в модели
- Эксклудим папки bootstrap, storage в настройках проекта

6. Laravel урок №6: [ Seeds - заполнение БД тестовыми данными ] - https://www.youtube.com/watch?v=RjztD_1kQwc

- Пользователей и категории, создаем с помощью сидов.

- Создаем сиды:
php artisan make:seeder UsersTableSeeder
php artisan make:seeder BlogCategoriesTableSeeder

- Запускаем сиды:
php artisan db:seed
php artisan db:seed --class=UsersTableSeeder
php artisan migrate:refresh --seed

7. Laravel урок №7: [ Seeds - Фабрики, Facker ] - https://www.youtube.com/watch?v=go1gUbAivYQ

php artisan make:factory BlogPostFactory

php artisan migrate:refresh --seed

В случае ошибки:
ReflectionException : Class r does not exist
Выполнить:
composer dump-autoload


7.1. #1 [Ответы на вопросы по курсу Laravel ] - https://www.youtube.com/watch?v=cKvQ8lX7RDk&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=12

8. Laravel урок №8: [ REST, route, Создаем первый контроллер ] - https://www.youtube.com/watch?v=q9_do7NdRhw&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=13

php artisan make:controller RestTestController --resource

2:40 https://www.youtube.com/watch?v=q9_do7NdRhw&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=13

Список всех маршрутов:
php artisan route:list

9. Laravel урок №9: [ Контроллер статей блога ] - https://www.youtube.com/watch?v=Ld7qNpSxp0s&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=14

php artisan make:controller Blog/BaseController

php artisan make:controller Blog/PostController --resource

10. Laravel урок №10: [ Вывод всех статей. Новый маршрут ] - https://www.youtube.com/watch?v=fQ6j-nZzXJE&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=15

11. Laravel урок №11: [ Добавляем вёрстку "из коробки" ] - https://www.youtube.com/watch?v=VENj6euwpSU&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=16

php artisan make:auth

php artisan migrate

http://poligon.local/register

12. Laravel урок №12: [ Контроллер управления категориями ] - https://www.youtube.com/watch?v=gDvBi3_2TuA&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=17

php artisan make:controller Blog/Admin/CategoryController --resource

13. Laravel урок №13: [ Управление категориями. Продолжение ] - https://www.youtube.com/watch?list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&v=gu6uA9MXykQ

php artisan make:controller Blog/Admin/BaseController

14. Laravel урок №14: [ Страница всех категорий. Админка ] - https://www.youtube.com/watch?v=fqogoFzH5kA&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=19

artisan route:list > route.txt
route.txt - загитигнорен

15. Laravel урок №15: [ Пагинация ] - https://www.youtube.com/watch?v=WuAzRZqwo3s&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=20

16. Laravel урок №:16 [ Страница редактирования категории ] - https://www.youtube.com/watch?v=DEnuj8jFG54&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=21

17. Laravel урок №17: [ Продолжение: Страница редактирования категории ] - https://www.youtube.com/watch?v=tMpuJzbAINg&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=22

18. Laravel урок №18: [ Обновление (изменение) категории #1 ] - https://www.youtube.com/watch?v=Io1GfLuSAbc&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=23

19. Laravel урок №19: [ Изменение (обновление) категории #2 ] - https://www.youtube.com/watch?v=TpiU6txBEfQ&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=24

20. Laravel урок №20: [Представления - обновление категории #3] - https://www.youtube.com/watch?v=d3_An9p8u4k&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=25

21. Laravel урок №21: [ Валидация данных ] - https://www.youtube.com/watch?v=0fxQ6AL29i4&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=26

22. Laravel урок №22: [ Валидация данных 2. Продолжение ] - https://www.youtube.com/watch?v=Z2RxRCEKV9o&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=27

php artisan make:request BlogCategoryUpdateRequest

23. Laravel урок №23: [ Добавление категории (insert, create) ] - https://www.youtube.com/watch?v=LavUiLTuIFY&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=28

php artisan migrate:refresh --seed

24. Laravel урок №24: [ Добавление категории. Продолжение ] - https://www.youtube.com/watch?v=bdg7OLom_YY&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=29

https://designpatternsphp.readthedocs.io/ru/latest/More/Repository/README.html

25. Laravel урок №25: [ Что такое Репозиторий? #1 ] - https://www.youtube.com/watch?list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&v=Y-GxEsNiIGU

26. Laravel урок №26: [ Что такое Репозиторий? #2 ] - https://www.youtube.com/watch?v=_2nrUJtIsCo&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=31

27. Laravel урок №27: [ Что такое Репозиторий? #3 ] - https://www.youtube.com/watch?v=RLs29NVgkMc&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=32

28. Laravel урок №28: [ Создание репозитория для категорий #1 ] - https://www.youtube.com/watch?v=S5k0I9F4bO0&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=33

29. Laravel урок №29: [ Создание репозитория для категорий #2 ] - https://www.youtube.com/watch?v=S5AIDTd8vIk&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=34

30. Laravel урок №30: [ Переносим логику запросов в репозиторий #1 ] - https://www.youtube.com/watch?v=UKF1xvVKJFA&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=35

31. Laravel урок №31: [ Переносим логику запросов в репозиторий #2 ] - https://www.youtube.com/watch?v=kGOkQTcIrLY&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=36

32. Laravel урок №32: [ Управление статьями блога на Ларавел ] - https://www.youtube.com/watch?v=Ggzb7UPZbAA&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=37

php artisan make:controller Blog/Admin/PostController -r

33. Laravel урок №33: [ Вывод всех статей блога на Ларавел ] - https://www.youtube.com/watch?v=hVVC_kpOIPk&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=38

34. Laravel урок №34: [ Отношения Eloquent: Relationships - первые шаги ] - https://www.youtube.com/watch?v=YBBS2JsIpjg&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=39

35. Laravel урок №35: [ Laravel 5.8 Что нового? ] - https://www.youtube.com/watch?v=PgRcyJe76C8&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=40

36. Laravel урок № 0 / 36: [ Переход с Laravel 5.7 на 5.8 ] #1 -  https://www.youtube.com/watch?v=bEFFIO7FLkY&list=PLoonZ8wII66iP0fJPHhkLXa3k7CMef9ak&index=4

37. Laravel урок № 0.1 / 37: [ Переход с Laravel 5.7 на 5.8 ] #2 - https://www.youtube.com/watch?v=43LNZGfSFSw

Удаляем таблицы БД
накатываем миграции и сиды:
php artisan migrate --seed

38. Laravel урок №38: [ Страница редактирования статьи блога ] #1 - https://www.youtube.com/watch?v=AjXv3anpomw

39. Laravel урок №39: [ Страница редактирования статьи блога ] #2 - https://www.youtube.com/watch?v=kY3XxW9CeSM

40. Laravel урок №40: [ Обновление статьи блога на Ларавел ] - https://www.youtube.com/watch?v=OtLxvt2RTl0

41. Laravel урок №41: [ Наблюдатель. Observer. Обсервер ] - https://www.youtube.com/watch?v=8axUabsTJS0

php artisan make:observer BlogPostObserver --model=Models\BlogPost
php artisan make:observer BlogCategoryObserver --model=Models\BlogCategory

42. Laravel урок №42: [ Обсервер для категорий ] - https://www.youtube.com/watch?v=mune-kXSavA

