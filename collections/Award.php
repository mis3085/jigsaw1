<?php

namespace App\Collections;

use Illuminate\Support\Arr;
use Illuminate\Support\LazyCollection;
use JsonMachine\Items;

class Award
{
    public const SINGULAR = 'ex_award';
    public const PLURAL = 'ex_awards';

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
    protected $fileUri = __DIR__ . '/data/twex_awards.json';

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
            'extends' => '_layouts.awards.show',
            'sort' => 'sort',
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
        $translation = Arr::first($item->translations, function ($translation) {
            return $translation->locale == ($this->locale == 'zhtw' ? 'zh_TW' : $this->locale);
        });

        return [
            'language'     => $this->locale,

            'id'           => $item->id,
            'slug'         => $item->slug,
            'sort'         => $item->sort,
            'year'         => $item->year,
            'medal'        => $item->medal,
            'company_id'   => $item->company_id,
            'category_id'  => head($item->categories)->id,
            'images'       => (array) $item->images,
            'model_number' => $translation->model_number,
            'title'        => $translation->name,
            'description'  => $translation->description,

            'parent_collection' => Company::getName($this->locale),
            'category_collection' => Category::getName($this->locale),
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
