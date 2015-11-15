# LaravelUser

## インストール



### Seeder の追加
``database/seeds/DatabaseSeeder.php`` の ``run()`` に追加

```
$this->call('Ontheroadjp\LaravelUser\database\seeds\ActivityMasterTableSeeder');
```

### User モデルの入れ替え

``config/auth.php`` の ``'model'`` を書き換え

```
// 編集前
'model' => App\User::class,

// 編集後
'model' => Ontheroadjp\LaravelUser\Models\ExUser::class,
```

### コマンドの実行

```
$ php artisan vendor:publish
$ php artisan migrate
$ php artisan db:seed
```
