<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace MetricVoid\MagicFonts;

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;
use Flarum\Foundation\Application;
use Illuminate\Database\Schema\Builder;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__.'/less/fonts.less'),

    (new AssetManager),

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
        $config->BBCodes->addCustom(
            '[MCENCHANT]{TEXT}[/MCENCHANT]',
            '<div class="FontMcEnchant">{TEXT}<div>'
        );
    })
];
