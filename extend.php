<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    // Register extenders here to customize your forum!
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/less/fonts.less'),

    (new Extend\Formatter)
    ->configure(function (Configurator $config) {
        $config->BBCodes->addCustom(
            '[REDIVE]{TEXT}[/REDIVE]',
            '<div class="FontRedive">{TEXT}</div>'
        );
        $config->BBCodes->addCustom(
            '[MADOKA]{TEXT}[/MADOKA]',
            '<div class="FontMadoka">{TEXT}</div>'
        );
    })
];
