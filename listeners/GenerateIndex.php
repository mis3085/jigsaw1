<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateIndex
{
    public function handle(Jigsaw $jigsaw)
    {
        // $data = collect($jigsaw->getCollection('posts')->map(function ($page) use ($jigsaw) {
        //     return [
        //         'title' => $page->title,
        //         'categories' => $page->categories,
        //         'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
        //         'snippet' => $page->getExcerpt(),
        //     ];
        // })->values())
        $data = collect()

        ->concat($jigsaw->getCollection('zhtw_ex_companies')->map(function ($page) use ($jigsaw) {
            return [
                'type' => 'companies',
                'language' => $page->language,
                'title' => $page->title . ' ' . $page->model_number,
                'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                'snippet' => filter_var($page->description, FILTER_SANITIZE_SPECIAL_CHARS),
            ];
        })->values())

        ->concat($jigsaw->getCollection('zhtw_ex_awards')->map(function ($page) use ($jigsaw) {
            return [
                'type' => 'awards',
                'language' => $page->language,
                'medal' => $page->medal,
                'year' => $page->year,
                'image' => head($page->images),
                'category' => $page->category_id,
                'company' => $page->company_id,
                'model_number' => $page->model_number,
                'title' => $page->title . ' ' . $page->model_number,
                'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                'snippet' => filter_var($page->description, FILTER_SANITIZE_SPECIAL_CHARS),
            ];
        })->values())

        // ->concat($jigsaw->getCollection('en_ex_awards')->map(function ($page) use ($jigsaw) {
        //     return [
        //         'type' => 'awards',
        //         'language' => $page->language,
        //         'medal' => $page->medal,
        //         'year' => $page->year,
        //         'image' => head($page->images),
        //         'category' => $page->category_id,
        //         'company' => $page->company_id,
        //         'model_number' => $page->model_number,
        //         'title' => $page->title . ' ' . $page->model_number,
        //         'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
        //         'snippet' => filter_var($page->description, FILTER_SANITIZE_SPECIAL_CHARS),
        //     ];
        // })->values())

        ;

        file_put_contents($jigsaw->getDestinationPath() . '/index.json', json_encode($data, JSON_UNESCAPED_UNICODE));

        $this->indexWeProducts($jigsaw);
    }

    protected function indexWeProducts(Jigsaw $jigsaw)
    {
        $data = collect()
            ->concat($jigsaw->getCollection('zhtw_we_products')->map(function ($page) use ($jigsaw) {
                return [
                    'type' => 'we_products',
                    'language' => $page->language,
                    'category_id' => $page->category_id,
                    'features' => $page->features,
                    'image' => $page->image,
                    'title' => $page->title . ' ' . $page->model_number,
                    'link' => rightTrimPath($jigsaw->getConfig('baseUrl')) . $page->getPath(),
                    'snippet' => filter_var($page->description, FILTER_SANITIZE_SPECIAL_CHARS),
                ];
            })->values())
            ;

        file_put_contents(
            $jigsaw->getDestinationPath() . '/index_we_products.json',
            json_encode($data, JSON_UNESCAPED_UNICODE)
        );
    }
}
