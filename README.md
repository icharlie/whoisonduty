# whoisonduty
Who is on duty?





--
## Laravel 5 notes
#### Testing

##### If failed on VerifyCsrfToken
 change
 
 ```php
 if ($this->isReading($request) || $this->tokensMatch($request))
 ```
 to
 
  ```php
  if (env("APP_ENV")=="testing" || $this->isReading($request) || $this->tokensMatch($request))
  ```

#### If failed on testing verify unique

- run `php artisan migrate --env testing` to setup testing database environment.

	Check **Illuminate\Validation\DatabasePresenceVerifier.php** and you will know why.


#### If failed on testing redirect on creation page

If you are testing user creation page and url is like `/users/create`, you need to use `$this->call('GET', '/users/create')` to visit the page first then testing  `POST`. Otherwise, it will redirect to `'/'` instand of `'/users/create'` and testing will always be **FAILURES**


