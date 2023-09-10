# Тестовое задание
### Спроектировать модуль расчета стоимости доставки.
 - Фреймворк Laravel v8.
 - Использование реляционных баз данных - нет.
 - Версия PHP - 7.2

   
## Как развернуть веб-приложение:
 - Открыть терминал.
 - `git clone https://github.com/ukidoshi/deliveryService.git`
 - `cd deliveryService`
 - `php composer.phar install`
 - `php composer.phar update`
 - `cp .env.example .env`
 - `php artisan key:generate`
 - `php artisan config:cache`
 - `php artisan serve`
 - Терминал выдаст ссылку на развернутый локальный проект. По умолчанию, это `http://127.0.0.1:8000`, но порт может быть другим, если он занят.
 - Перейти на страницу `http://127.0.0.1:8000/shipping_calculator`.

## Скриншоты сайта:
<img width="1440" alt="image" src="https://github.com/ukidoshi/deliveryService/assets/65071194/d19678b5-9915-4b97-9819-d9742374b845">
<p align="center">Скриншот экранной формы</p>

<img width="1440" alt="image" src="https://github.com/ukidoshi/deliveryService/assets/65071194/cdbb1ba5-b829-4df4-aa55-c5b368532e54">
<p align="center">Скриншот расчета доставки используя сервис "Быстрая доставка"</p>

<img width="1440" alt="image" src="https://github.com/ukidoshi/deliveryService/assets/65071194/ab7faa28-efdd-41ad-8cac-bf44cb979932">
<p align="center">Скриншот расчета доставки используя сервис "Медленная доставка"</p>
   
<p align="center">Сарыглар Начын 2023</p>
