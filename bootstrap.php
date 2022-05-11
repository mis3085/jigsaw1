<?php

// @var $container \Illuminate\Container\Container
// @var $events \TightenCo\Jigsaw\Events\EventBus

/*
 * You can run custom code at different stages of the build process by
 * listening to the 'beforeBuild', 'afterCollections', and 'afterBuild' events.
 *
 * For example:
 *
 * $events->beforeBuild(function (Jigsaw $jigsaw) {
 *     // Your code here
 * });
 */

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

Str::macro('trans', function ($key, $locale) {
    $trans = include __DIR__ . '/trans.php';

    return Arr::get($trans, "{$locale}.{$key}", $key);
});

if (! function_exists('__')) {
    /**
     * Translate the given message.
     *
     * @param  string|null  $key
     * @param  string|null  $locale
     * @return string|array|null
     */
    function __($key = null, $locale = null)
    {
        if (is_null($key)) {
            return $key;
        }

        return Str::trans($key, $locale);
    }
}

$events->afterBuild(App\Listeners\GenerateSitemap::class);
$events->afterBuild(App\Listeners\GenerateIndex::class);
