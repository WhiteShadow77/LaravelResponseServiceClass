# Easy wrapper/improver/builder/tuning class for JSON response in Laravel

Wrap/improve/build/tune a response JSON data structure by
* same response status variant for all responses in a project
* add a description message
* add additional key-value data
* easy output of a Laravel's collection

Class is easy to integrate in a Laravel project. You will need: 
* to put it in a Service directory
* Create Laravel resource classes for your entities (best practice even if without this class usage)  and modify them
* Create Laravel resource collection classes for your entities (best practice even if without this class usage) and modify them

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

#### Posts after
```json
{
    "success": true,
    "message": "All posts",
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

#### Posts after with additional pagination data
```json
{
    "Success": true,
    "message": "All posts with pagination",
    "pagination": {
        "current_page": 1,
        "per_page": 5,
        "last_page": 3,
        "path_url": "http://localhost/api/v2/posts",
        "pages": 12,
        "next_page_url": "http://localhost/api/v2/posts?page=2",
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
        }
    ]
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

#### Create a resource collection (from a Laravel box) class for your entity like this:
```php
<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
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
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryResourceCollection extends ResourceCollection
{
    private bool $isSuccessfullResponse;
    private string $message;
    private ?array $additionalInfo;

    public function __construct(bool $isSuccessfullResponse, string $message, $resource, ?array $additionalInfo = null)
    {
        $this->isSuccessfullResponse = $isSuccessfullResponse;
        $this->message = $message;
        $this->additionalInfo = $additionalInfo;
        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $result = [
            'success' => $this->isSuccessfullResponse,
        ];
        $result['message'] = $this->message;
        if(!is_null($this->additionalInfo)){
            $result[key($this->additionalInfo)] = current($this->additionalInfo);
        }
        $result['data'] = $this->collection;
        return $result;
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
        return $this->responseService->successResponseWithResourceCollection(
            'All categories', CategoryResource::class, $categories, null
        );
    }

    /** Realization of message and collection with one item output and not found case in a JSON Response */
    public function show(int $id)
    {
        $category = Category::where('id', $id)->get();

        if(sizeof($category) > 0) {
            return $this->responseService->successResponseWithResourceCollection(
                'Category by id', CategoryResource::class, $category, null
            );
        } else {
            return $this->responseService->errorResponse('Category not found', 404);
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
        return $this->categoryService->show($request->route('id'));
    }
}
```

