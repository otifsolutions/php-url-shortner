# php-url-shortner

`   PHP 8.1.2 > PHP 8`

### How to use the library

Install via the composer

Using the composer(Recommended)

Either run the following command in the root directory of your project:

`composer require otifsolutions/shorturlapp`

Then simply run migrations to run the ShortUrl and Tracker migrations

`php artisan migrate`


###ShortUrl

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

###Tracker

- Namespace for Model `Tracker`,

  `use OTIFSolutions\ShortUrlApp\Models\Tracker;`

- This model tracks the `url` and store details such as, `ip_address`, `full_url`, `operating_system` and  `browser`.

###Example

- Url will be Tracked if the user sends `http://` request with query parameter, and it exists in database otherwise error will be returned.
- Use `/url` route with generated query parameter e.g. `http://localhost/url?q=3XY5F`.
