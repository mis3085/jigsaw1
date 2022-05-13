<?php

namespace App\Collections;

use JsonMachine\Items;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\LazyCollection;

class WeCategory
{
    public const SINGULAR = 'we_category';
    public const PLURAL = 'we_categories';

    /**
     * locale of collection
     *
     * @var string
     */
    protected $locale;

    /**
     * max items
     *
     * @var int|null
     */
    protected $maxItems;

    /**
     * json file
     *
     * @var string
     */
    protected $fileUri = __DIR__ . '/data/categories.json';

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
            'extends' => '_layouts.we_categories.show',
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
            'language'    => $this->locale,

            'id'          => $item->id,
            'slug'        => Str::slug($item->title, '-', 'zh'),
            'title'       => $item->title,
            'sub_title' => $item->sub_title,
            'image' => $item->image,
            'feature_image' => $item->feature_image,

            'product_collection' => WeProduct::getName($this->locale),
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
