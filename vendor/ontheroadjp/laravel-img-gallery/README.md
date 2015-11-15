# Laravel-ImageGallery

This is forked [triasrahman/media-upload](https://github.com/triasrahman/laravel-media-upload)

###[SEE DEMO](http://laravel-media-upload.triasrahman.com)

## Requirements

- PHP >=5.3
- [Intervention Image](https://github.com/Intervention/image) (for image processing)

## Usage

Your HTML form

```html
<input type="file" name="file">
<img clas="preview" src="">
```

Using jQuery AJAX

```javascript
$('input[name=file]').change(function()
{	
	// AJAX Request
	$.post( '/media-upload', {file: $(this).val()} )
		.done(function( data )
		{
			if(data.error)
			{
				// Log the error
				console.log(error);
			}
			else
			{
				// Change the image attribute
				$( 'img.preview' ).attr( 'src', data.path );
			}
		});
});
```

## Configurations

Edit `media-upload.php` for more configurations.

```php
/*
 |--------------------------------------------------------------------------
 | Upload Types
 |--------------------------------------------------------------------------
 |
 | It's the flexibility of this package. You can define the type of upload
 | file methods. For example, you want to upload for profile picture,
 | article post, background, etc. Here is 
 |
 */

'types' => [
	// ... put your custom type ...

	'profile' => [
		'middleware' => 'auth',
		'format' => 'image',
		'image' => [
			'fit' => [400, 400],
			'thumbs' => [
				'small' => [50, 50],
				'medium' => [100, 100],
			]
		],
		'save_original' => true,
	],

	'profile-cover' => [
		'middleware' => 'auth',
		'format' => 'image',
		'image' => [
			'fit' => [1200, 400],
		],
		'multiple' => false,
	],

	'media' => [
		'middleware' => 'auth',
		'format' => 'image|video|audio',
		'image' => [
			'thumbs' => [
				'small' => [50, 50],
				'medium' => [100, 100],
			]
		],
		'multiple' => true,
	],

],   

```

## License

Laravel-ImageGallery Upload is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2015 [Trias Nur Rahman](http://triasrahman.com/)
