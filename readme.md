# Mosaic

## Usage/Examples

create an Api controller
```bash
  php bin/console create:controller Api
```

in /src/controllers/Api.php
```php
  namespace App\Controllers;

  use Service\Routes\Response;
  use Service\Interface\Controller;

  class Api extends Controller {
      public function index (int $number) : Response {
          return new Response([
              "controller" => "ApiController",
              "number" => $number
          ], 200);
      }
  }
```

in /src/routes/Routes.php
```php
    Controllers\Index::bind("api", "/api/(\\d+)", [
        "content-type" => "application/json",
        "method" => "GET"
    ]);
```

the result of consulting /api/18 with method GET will be :
```json
    {
        "controller": "ApiController",
        "number": 18,
        "status": 200
    }
```