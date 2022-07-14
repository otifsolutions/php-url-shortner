# php-url-shortner

`   PHP 8.1.2 > PHP 8`

### How to use the library

Install via the composer

Using the composer(Recommended)

Either run the following command in the root directory of your project:

`composer require otifsolutions/shorturlapp`

Then simply run migrations to run the ShortUrl and Tracker migrations

`php artisan migrate`


### ShortUrl

Namespace for Model `ShortUrl`

```php
    use OTIFSolutions\ShortUrlApp\Models\ShortUrl;
```

- Generate a new code against `Url`

  `ShortUrl::set('Url');`

  Type of url is `STRING`

- Get a ShortUrl

  `ShortUrl::get('Url');`

  If Url does not exist the system will return null

- Delete a `Url`

  `ShortUrl::remove('Url');`

  If Url does not exist the system will return null.

### Tracker

- Namespace for Model `Tracker`,

  `use OTIFSolutions\ShortUrlApp\Models\Tracker;`

- This model tracks the `url` and stores following details:
  
  `ip_address`, `full_url`, `operating_system` and  `browser`.

### Usage

- Url will be Tracked and redirected if the user sends `/url` request with generated code.
  + `abc.xyz/url?q=W2tht`.
  +  Where 'url' is route, 'q' is a parameter and 'W2tht' is code which user generates. 
- In the case of wrong parameter, following error will be returned.
  + `return response()->json(['errors' => ['error' => 'url not exists']]);`

