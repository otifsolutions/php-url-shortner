# php-url-shortner

`   PHP 8.1.2 > PHP 8`

### How to use the library

Install via the composer

Using the composer(Recommended)

Either run the following command in the root directory of your project:

`composer require otifsolutions/shorturlapp`

Then simply run migrations to run the ShortUrl and Tracker migrations
`php artisan migrate`
Namespace for Model `ShortUrl`

```php
    use OTIFSolutions\ShortUrlApp\Models\ShortUrl;
```

- Update or Create a new `Url`

  `ShortUrl::set('KEY_GOES_HERE','/VALUE_GOES_HERE');`

  type of url is `STRING`

- Get a ShortUrl

  `ShortUrl::get('KEY_GOES_HERE');`

  If Url does not exist the system will return null

- Delete a `Url`

  `ShortUrl::remove('KEY_GOES_HERE');`

  If Url does not exist the system will return null.

### Middleware

- Middleware handles the incoming request.
- Middleware is set on route. such as

  `->middleware('short_url_tracker');`

- Middleware tracks the user when he sends `http://` request.
- Middleware take the user to the website link stored in database otherwise error is returned.