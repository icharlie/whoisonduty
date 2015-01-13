# whoisonduty
Who is on duty?







### Test

#### If failed on VerifyCsrfToken
 change
 
 ```php
 if ($this->isReading($request) || $this->tokensMatch($request))
 ```
 to
 
  ```php
  if (env("APP_ENV")=="testing" || $this->isReading($request) || $this->tokensMatch($request))
  ```
