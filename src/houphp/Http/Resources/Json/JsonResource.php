<?php

namespace Houphp\Http\Resources\Json;

use ArrayAccess;
use JsonSerializable;
use Houphp\Container\Container;
use Houphp\Contracts\Support\Arrayable;
use Houphp\Contracts\Routing\UrlRoutable;
use Houphp\Contracts\Support\Responsable;
use Houphp\Http\Resources\DelegatesToResource;
use Houphp\Http\Resources\ConditionallyLoadsAttributes;

class JsonResource implements ArrayAccess, JsonSerializable, Responsable, UrlRoutable
{
    use ConditionallyLoadsAttributes, DelegatesToResource;

    /**
     * The resource instance.
     *
     * @var mixed
     */
    public $resource;

    /**
     * The additional data that should be added to the top-level resource array.
     *
     * @var array
     */
    public $with = [];

    /**
     * The additional meta data that should be added to the resource response.
     *
     * Added during response construction by the developer.
     *
     * @var array
     */
    public $additional = [];

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'data';

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Create a new resource instance.
     *
     * @param  mixed  ...$parameters
     * @return static
     */
    public static function make(...$parameters)
    {
        return new static(...$parameters);
    }

    /**
     * Create new anonymous resource collection.
     *
     * @param  mixed  $resource
     * @return \Houphp\Http\Resources\Json\AnonymousResourceCollection
     */
    public static function collection($resource)
    {
        return tap(new AnonymousResourceCollection($resource, static::class), function ($collection) {
            if (property_exists(static::class, 'preserveKeys')) {
                $collection->preserveKeys = (new static([]))->preserveKeys === true;
            }
        });
    }

    /**
     * Resolve the resource to an array.
     *
     * @param  \Houphp\Http\Request|null  $request
     * @return array
     */
    public function resolve($request = null)
    {
        $data = $this->toArray(
            $request = $request ?: Container::getInstance()->make('request')
        );

        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        } elseif ($data instanceof JsonSerializable) {
            $data = $data->jsonSerialize();
        }

        return $this->filter((array) $data);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Houphp\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (is_null($this->resource)) {
            return [];
        }

        return is_array($this->resource)
            ? $this->resource
            : $this->resource->toArray();
    }

    /**
     * Get any additional data that should be returned with the resource array.
     *
     * @param  \Houphp\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return $this->with;
    }

    /**
     * Add additional meta data to the resource response.
     *
     * @param  array  $data
     * @return $this
     */
    public function additional(array $data)
    {
        $this->additional = $data;

        return $this;
    }

    /**
     * Customize the response for a request.
     *
     * @param  \Houphp\Http\Request  $request
     * @param  \Houphp\Http\JsonResponse  $response
     * @return void
     */
    public function withResponse($request, $response)
    {
        //
    }

    /**
     * Set the string that should wrap the outer-most resource array.
     *
     * @param  string  $value
     * @return void
     */
    public static function wrap($value)
    {
        static::$wrap = $value;
    }

    /**
     * Disable wrapping of the outer-most resource array.
     *
     * @return void
     */
    public static function withoutWrapping()
    {
        static::$wrap = null;
    }

    /**
     * Transform the resource into an HTTP response.
     *
     * @param  \Houphp\Http\Request|null  $request
     * @return \Houphp\Http\JsonResponse
     */
    public function response($request = null)
    {
        return $this->toResponse(
            $request ?: Container::getInstance()->make('request')
        );
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Houphp\Http\Request  $request
     * @return \Houphp\Http\JsonResponse
     */
    public function toResponse($request)
    {
        return (new ResourceResponse($this))->toResponse($request);
    }

    /**
     * Prepare the resource for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->resolve(Container::getInstance()->make('request'));
    }
}
