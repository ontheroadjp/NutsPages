# LaravelUser

## インストール

``database/seeds/DatabaseSeeder.php`` の ``run()`` に追加

```
$this->call('Ontheroadjp\LaravelUser\database\seeds\ActivityMasterTableSeeder');
```

```
$ php artisan database:seed
```
