# LaravelUser

## インストール

### 1. Seeder の追加
``database/seeds/DatabaseSeeder.php`` の ``run()`` に追加

```
$this->call('Ontheroadjp\LaravelUser\database\seeds\ActivityMasterTableSeeder');
```

### 2. User モデルの入れ替え

``config/auth.php`` の ``'model' => App\User::class,`` の行を書き換え

```
// 編集前
'model' => App\User::class,

// 編集後
'model' => Ontheroadjp\LaravelUser\Models\ExUser::class,
```

### 3. Exception Handler の編集

``app/Exception/Handler.php`` の ``render()`` オーバーライド

```
public function render($request, Exception $e)
    {
        if($request->wantsJson())
        {
            $error = new \stdclass();
            $error->message = $e->getMessage();
            $error->code = $e->getCode();
            $error->file = $e->getFile();
            $error->line = $e->getLine();
            return response()->json($error, 400);
        }

        //if ($e instanceof ModelNotFoundException) {
        //    $e = new NotFoundHttpException($e->getMessage(), $e);
        //}

        return parent::render($request, $e);
    }
```

### コマンドの実行

```
$ php artisan vendor:publish
$ php artisan migrate
$ php artisan db:seed
```
