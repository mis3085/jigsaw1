<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Static page demonstration',
    'siteDescription' => 'Generate an elegant blog with Jigsaw',
    'siteAuthor' => 'Author Name',
    'siteLanguages' => [
        'zhtw' => '繁中',
        'en' => 'English',
    ],

    // collections
    'collections' => [
        // 'posts' => [
        //     'author' => 'Author Name', // Default author, if not provided in a post
        //     'sort' => '-date',
        //     'path' => 'blog/{filename}',
        // ],
        // 'categories' => [
        //     'path' => '/blog/categories/{filename}',
        //     'posts' => function ($page, $allPosts) {
        //         return $allPosts->filter(function ($post) use ($page) {
        //             return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
        //         });
        //     },
        // ],
        App\Collections\WeCategory::getName('zhtw') => App\Collections\WeCategory::collect('zhtw'),
        App\Collections\WeProduct::getName('zhtw') => App\Collections\WeProduct::collect('zhtw'),
        App\Collections\Category::getName('en') => App\Collections\Category::collect('en', 20),
        App\Collections\Category::getName('zhtw') => App\Collections\Category::collect('zhtw', 20),
        App\Collections\Award::getName('en') => App\Collections\Award::collect('en', 20),
        App\Collections\Award::getName('zhtw') => App\Collections\Award::collect('zhtw', 20),
        App\Collections\Company::getName('en') => App\Collections\Company::collect('en', 20),
        App\Collections\Company::getName('zhtw') => App\Collections\Company::collect('zhtw', 20),

        'zhtw_brandings' => [
            'extends' => '_layouts.case',
            'language' => 'zhtw',
            'sort' => 'title',
            'path' => '{language}/brandings/{slug}',
            'items' => function ($config) {
                $json = json_decode(file_get_contents(__DIR__ . '/collections/data/gtmc.json'));
                $items = $json->zhtw->cases->brandings->items;

                return collect($items)
                ->groupBy('title')
                ->map(function ($group) {
                    return [
                        'slug' => Str::slug($group->first()->title, '-', 'zh'),
                        'language' => 'zhtw',
                        'title' => $group->first()->title,
                        'content' => '',
                        'thumbnail' => $group->first()->image,
                        'cover_image' => $group->first()->{'main-image'},
                        'content_images' => $group->pluck('content-image'),
                    ];
                });
            },
        ],
        'en_brandings' => [
            'extends' => '_layouts.case',
            'language' => 'en',
            'sort' => 'title',
            'path' => '{language}/brandings/{slug}',
            'items' => function ($config) {
                $json = json_decode(file_get_contents(__DIR__ . '/collections/data/gtmc.json'));
                $items = $json->zhtw->cases->brandings->items;

                return collect($items)
                ->groupBy('title')
                ->map(function ($group) {
                    return [
                        'slug' => Str::slug($group->first()->title, '-', 'zh'),
                        'language' => 'en',
                        'title' => $group->first()->title,
                        'content' => '',
                        'thumbnail' => $group->first()->image,
                        'cover_image' => $group->first()->{'main-image'},
                        'content_images' => $group->pluck('content-image'),
                    ];
                });
            },
        ],
    ],

    // helpers
    'getLocaleUrl' => function ($page, $locale) {
        $from = '/' . $page->language;
        $to = '/' . $locale;
        return str_replace($from, $to ,$page->getUrl());
    },
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $cleaned;
        }

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
];
