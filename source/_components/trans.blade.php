@props([
    'byLocale' => [
        'zhtw' => [
            'Read' => '閱讀更多',
            'Products' => '產品',
            'medals' => [
                'ex' => '精品',
                'gold' => '金獎',
                'silver' => '銀獎',
            ],
            'All medals' => '全部獎別',
            'All years' => '全部年份',
        ],
        'en' => [
            'Read' => 'Read More',
            'Products' => 'Products',
        ],
    ],
    'locale',
    'key',
])
{{ \Illuminate\Support\Arr::get($byLocale, "{$locale}.{$key}", $key) }}
