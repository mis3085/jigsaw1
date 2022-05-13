<?php

namespace App\Collections;

use Illuminate\Support\Arr;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Fluent;
use JsonMachine\Items;

class WeProduct
{
    public const SINGULAR = 'we_product';
    public const PLURAL = 'we_products';

    /**
     * locale of collection
     *
     * @var string
     */
    protected $locale;

    /**
     * max items
     *
     * @var int
     */
    protected $maxItems;

    /**
     * json file
     *
     * @var string
     */
    protected $fileUri = __DIR__ . '/data/products.json';

    public function __construct($locale, $maxItems = 0)
    {
        $this->locale = $locale;
        $this->maxItems = $maxItems > 0 ? $maxItems : 0;
    }

    /**
     * make a collection
     *
     * @return void
     */
    public function make()
    {
        return [
            'extends' => '_layouts.we_products.show',
            'sort' => 'title',
            'path' => '{language}/' . static::PLURAL . '/{slug}',

            'items' => LazyCollection::make(function () {
                $items = Items::fromFile($this->fileUri);
                foreach ($items as $index => $item) {
                    if ($this->maxItems && $index > $this->maxItems - 1) {
                        break;
                    }

                    yield $this->map($item);
                }
            }),
        ];
    }

    /**
     * transform remote item into local item
     *
     * @param object $item
     * @return array
     */
    public function map($item)
    {
        return [
            'language'     => $this->locale,

            'id'           => $item->id,
            'slug'         => $item->slug,
            'category_id'  => $item->category_id,

            'featured' => rand(0, 10) > 9 ? true : false,
            'hot' => rand(0, 10) > 9 ? true : false,

            'title'        => $item->title,
            'description'  => $item->description,
            'image' => head($item->images),
            'images'       => (array) $item->images,

            'features' => json_decode(collect($item->features)->toJson(), true),
            'overviews' => json_decode(collect($item->overviews)->toJson(), true),
            'introductions' => json_decode(collect($item->introductions)->toJson(), true),
            'faq' => json_decode(collect($item->faq)->toJson(), true),

            'category_collection' => WeCategory::getName($this->locale),
        ];
    }

    /**
     * make collection of specified locale
     *
     * @param string $locale
     * @param int $maxItems
     * @return void
     */
    public static function collect($locale, $maxItems = 0)
    {
        return (new static($locale, $maxItems))->make();
    }

    public static function getName($locale)
    {
        return $locale . '_' . static::PLURAL;
    }
}
