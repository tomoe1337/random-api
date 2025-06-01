1.	Клонируйте репозиторий
```bash
git clone https://github.com/tomoe1337/random-api.git 
cd random-api
```

2. Настройка автозагрузки классов
```bash
composer install
```

3. Запуск сервер
```bash
php -S localhost:8000 index.php
```

4. В отдельном терменале запустите пример работы с клиентом
```bash
php client/example.php
```