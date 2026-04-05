# Easy wrapper/improver/builder/tuning class for JSON response in Laravel

Wrap/improve/build/tune a response JSON data structure by
* same response structure for all responses in a project
* add a description message
* add additional key-value data
* easy output of a Laravel's collection automatically via Laravel's ResourceCollection and description message if needed
* easy handle validation errors which throws exception

Class supports like SOLID and provides:
* Structure of all responses depends from one definition place and can be changed for all responses from one place.

Class is easy to integrate in a Laravel project. You will need: 
* to put it in a Service directory (app/Services)
* Create Laravel resource classes for your entities (best practice even if without this class usage)



## JSON example responses:
#### Categories before:
```json
{
  "data": [
    {
      "id": 1,
      "name": "How-To"
    },
    {
      "id": 2,
      "name": "Listicles"
    },
    {
      "id": 3,
      "name": "The Ultimate Guide"
    },
    {
      "id": 4,
      "name": "Case Studies & Success Stories"
    },
    {
      "id": 5,
      "name": "Reviews & Comparisons"
    }
  ]
}
```

#### Categories after:
```json
{
  "success": true,
  "message": "All categories",
  "data": [
    {
      "id": 1,
      "name": "How-To"
    },
    {
      "id": 2,
      "name": "Listicles"
    },
    {
      "id": 3,
      "name": "The Ultimate Guide"
    },
    {
      "id": 4,
      "name": "Case Studies & Success Stories"
    },
    {
      "id": 5,
      "name": "Reviews & Comparisons"
    }
  ]
}
```

#### Posts before
```json
{
  "data": [
    {
      "title": "ipsa",
      "content": "Libero iste illo ut aut animi quia quibusdam consectetur sunt vel aut.",
      "category": "Listicles"
    },
    {
      "title": "aspernatur",
      "content": "Et nihil iure ut sit qui libero ab voluptatem repellat nihil aliquam impedit maiores qui provident a quo amet quaerat sit.",
      "category": "The Ultimate Guide"
    },
    {
      "title": "sed",
      "content": "Ut repellat recusandae quia at iste reprehenderit error qui deleniti quos perspiciatis accusamus nisi recusandae quidem non corporis illo et.",
      "category": "The Ultimate Guide"
    },
    {
      "title": "quasi",
      "content": "Odio ut rerum omnis deleniti minima et eaque dignissimos illum adipisci deleniti et et non.",
      "category": "Listicles"
    },
    {
      "title": "id",
      "content": "Qui repellat praesentium est minus ducimus vitae at tempora enim.",
      "category": "Case Studies & Success Stories"
    },
    {
      "title": "rem",
      "content": "Explicabo velit minima quis quo quis aut unde voluptates quia ipsam nulla est neque quis libero.",
      "category": "The Ultimate Guide"
    },
    {
      "title": "provident",
      "content": "Rerum sed est consequatur minus labore omnis deleniti eligendi optio dolores.",
      "category": "Reviews & Comparisons"
    },
    {
      "title": "deserunt",
      "content": "Quia sed explicabo aut inventore quis perferendis qui autem eius aliquid aliquid voluptatum praesentium blanditiis quibusdam.",
      "category": "Reviews & Comparisons"
    },
    {
      "title": "laboriosam",
      "content": "Et dolorem minima et in alias quasi qui ut commodi est natus laborum nulla eum in.",
      "category": "The Ultimate Guide"
    },
    {
      "title": "et",
      "content": "Rem est assumenda qui cumque voluptate laborum aspernatur optio aut ut facere facere fuga consequatur corporis distinctio.",
      "category": "The Ultimate Guide"
    },
    {
      "title": "molestiae",
      "content": "Et perspiciatis esse consequuntur mollitia qui deleniti minus et ratione.",
      "category": "Case Studies & Success Stories"
    },
    {
      "title": "et",
      "content": "Qui molestiae deleniti saepe dolores quo dolore magni veniam deleniti et aut officiis deleniti explicabo ut nihil eum molestiae ipsam.",
      "category": "Listicles"
    }
  ]
}
```

### Posts after pagination and additional specific data
```json
{
    "success": true,
    "message": "All posts with pagination and additional data",
    "categories": [
        "How-To",
        "Listicles",
        "The Ultimate Guide",
        "Case Studies & Success Stories",
        "Reviews & Comparisons"
    ],
    "pagination": {
        "current_page": 1,
        "per_page": 3,
        "last_page": 4,
        "path_url": "http://localhost/api/v3/posts",
        "pages": 12,
        "next_page_url": "http://localhost/api/v3/posts?page=2",
        "previous_page_url": null
    },
    "data": [
        {
            "title": "ipsa",
            "content": "Libero iste illo ut aut animi quia quibusdam consectetur sunt vel aut.",
            "category": "Listicles"
        },
        {
            "title": "aspernatur",
            "content": "Et nihil iure ut sit qui libero ab voluptatem repellat nihil aliquam impedit maiores qui provident a quo amet quaerat sit.",
            "category": "The Ultimate Guide"
        },
        {
            "title": "sed",
            "content": "Ut repellat recusandae quia at iste reprehenderit error qui deleniti quos perspiciatis accusamus nisi recusandae quidem non corporis illo et.",
            "category": "The Ultimate Guide"
        }
    ]
}

```

#### Show category before:
```json
{
  "data": [
    {
      "id": 1,
      "name": "How-To"
    }
  ]
}
```

#### Show category after:
```json
{
  "success": true,
  "message": "Category by id",
  "data": [
    {
      "id": 1,
      "name": "How-To"
    }
  ]
}
```

#### Show category not found case:
```json 
{
    "success": false,
    "message": "Category not found"
}
```

#### Show category validation case (in a route instead id user inserted symbol)
```json
{
    "success": false,
    "message": "Bad Request"
}
```

## PHP embed example
#### Create a resource (from a Laravel box) class for your entity like this:
```php 
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
```

#### Modify it like this:
```php 
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
```

### PHP usage example
#### Embed in entity service (CategoryService)
```php
<?php

namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryService
{
    private ResponseService $responseService;
    
    /** Injection of this service class */
    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }
    
    /** Realization of message and collection output in a JSON Response */
    public function getAll()
    {
        $categories = Category::all();

        return $this->responseService->successWithResource(
            CategoryResource::collection($categories),
            'All categories'
        );
    }

    /** Realization of message and collection with one item output and not found case in a JSON Response */
    public function show(int $id)
    {
        $category = Category::where('id', $id)->get();

        if(sizeof($category) > 0) {
            return $this->responseService->successWithResource(
                CategoryResource::collection($category),
                'Category by id'
            );
        } else {
            return $this->responseService->error('Category not found', 404);
        }
    }

}
```
#### Typical practice of call of entity service (CategoryService) from a controller (not required for your usage, just for understand how it works)
```php 
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService)
    {
    }
    public function getAll()
    {
        return $this->categoryService->getAll();
    }

    public function show(CategoryRequest $request)
    {
        $id = $request->route('id');
        return $this->categoryService->show($id);
    }
}
```

#### Validation handle example for Category entity via FormRequest. Create a FromRequest (from a Laravel's box) for entity and modify it like this
```php
<?php

namespace App\Http\Requests;

use App\Services\ResponseService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class CategoryRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('id')]);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        App::make(ResponseService::class)->errorResponseWithException('Bad Request');
    }
}
```

