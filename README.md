#Шаблон приложения на основе yii2-app-advanced


##Развертывание приложения

### Настройка окружений

1. ./environments/dev/common/config/main-local.php    - настройка соединения с БД
1. ./environments/prod/common/config/main-local.php   - настройка соединения с БД

### Установка приложения

Сконфигурированные базы данных должны быть созданы и доступны для приложения до применения миграций

```php
> composer install --ignore-platform-reqs
> init
> yii migrate
```

Важно! при использовании php 7.0 использовать флаг --ignore-platform-reqs.
Некоторые пакеты при установке требуют PHP 7.1 (но на 7.0 тоже работают)

### Создание администратора

Создать учетную запись (зарегистрироваться) и добавить созданной учетной записи права:
 
1. backend-user   - доступ к административному интерфейсу
1. access-admin   - доступ к управлению учетными записями
1. developer      - доступ к инструментам разработчика

## БД по умолчанию
1. subscribetest имя бд
2. mysql логин
3. mysql пароль
4. 3306 порт стандартный

### При выполнении миграций создаётся пользователь с ролью backend-user и 

логином: backend-user@subscribe.test.ru
паролем: backend-user@subscribe.test.ru

### Document root web сервера должен смотреть в frontend/web
Домен по умолчанию сайта: subscribe.test.ru

### Document root web сервера админки должен смотреть в backend/web
Домен по умолчанию админки: subscribe.backend.test.ru
