## Интернет-магазин

REST-интерфейс для интернет-магазина.

## system requirements

Версия php не ниже 7.3

## settings
 
- .env.example нужно скопировать в .env и задать настройки подключения к БД.
- в корневой директории проекта выполнить composer update
- в корневой директории проекта выполнить php artisan migrate
- в корневой директории проекта выполнить php artisan key:generate
- в корневой директории проекта выполнить php artisan passport:install
- в корневой директории проекта выполнить php artisan serve(для запуска приложения)

### Api

- Login: метод:POST, URL:http://127.0.0.1:8000/api/login (params: email, password)
- Register: метод:POST, URL:http://127.0.0.1:8000/api/register (params: name, email, password, password_confirmation)
  
- Category List: метод:GET, URL:http://127.0.0.1:8000/api/categorys
- Category Create: метод:POST, URL:http://127.0.0.1:8000/api/categorys (params: name, description)
- Category Update: метод:PUT, URL:http://127.0.0.1:8000/api/categorys/{id} (params: name, description)
- Category Delete: метод:DELETE, URL:http://127.0.0.1:8000/api/categorys/{id}

- Product List: метод:GET, URL:http://127.0.0.1:8000/api/products (params: page)
- Product Create: метод:POST, URL:http://127.0.0.1:8000/api/products (params: category_id, name, description, price, count)
- Product Show: метод:GET, URL:http://127.0.0.1:8000/api/products/{id}
- Product Update: метод:PUT, URL:http://127.0.0.1:8000/api/products/{id} (params: category_id, name, description, price, count)
- Product Delete: метод:DELETE, URL:http://127.0.0.1:8000/api/products/{id}

Для методов api/login, api/register и api/products, аутентификация не нужна, для остальных нужна.
При регистрации api/register возвращается токен, его еще можно получить методом api/login передав логин и пароль пользователя.
В методах работы с контактами необходимо передавать полученный токен в Headers в поле Authorization. Например Authorization Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1...
