# WebinarAPI

Модуль для работы с API [webinar.ru](https://webinar.ru "webinar.ru").

![](https://img.shields.io/badge/PHP-7%2B-blue) ![](https://img.shields.io/badge/version-0.53-lightgrey)

## Установка

1. Скачайте архив с последним релизом и распакуйте его в директорию вашего приложения.
2. Пропишите в точке входа следующее:
```php
use WebinarAPI\Handler;
require_once __DIR__.'/WebinarAPI/autoload.php';
// переменная $token должна содержать ваш ключ авторизации
// ключ авторизации можно получить в вашем личном кабинете webinar.ru
// подробнее: https://help.webinar.ru/ru/articles/3147750
$webinarapi = new Handler($token);
```

## Как пользоваться

Каждый публичный метод класса **WebinarAPI\Handler** позволяет обратиться к API [webinar.ru](https://webinar.ru "webinar.ru") по определённому маршруту. О том, какой метод с каким маршрутом ассоциирован, а также о правилах вызова методов, вы можете узнать в [wiki](https://github.com/drnoisier/webinarapi/wiki "wiki"). 