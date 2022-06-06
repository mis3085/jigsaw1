<?php


//[![Netlify Status](https://api.netlify.com/api/v1/badges/f2cb6570-6ad2-4f8e-8656-e00db9a2ca17/deploy-status)](https://app.netlify.com/sites/astounding-toffee-23ac3c/deploys)

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class GenerateReadme
{
    public function handle(Jigsaw $jigsaw)
    {
        file_put_contents(
            $jigsaw->getDestinationPath() . '/readme.md',
            '[![Netlify Status](https://api.netlify.com/api/v1/badges/f2cb6570-6ad2-4f8e-8656-e00db9a2ca17/deploy-status)](https://app.netlify.com/sites/astounding-toffee-23ac3c/deploys)'
        );
    }
}
