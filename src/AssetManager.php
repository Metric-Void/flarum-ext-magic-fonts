<?php

namespace MetricVoid\MagicFonts;

use Flarum\Extend;
use Flarum\Extension\Extension;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;
use Flarum\Foundation\Application;
use Illuminate\Database\Schema\Builder;
use Illuminate\Contracts\Container\Container;

class AssetManager implements Extend\LifecycleInterface{

    static $font_file_list;
    
    public function onEnable(Container $container, Extension $extension) {
        AssetManager::copyTo();
    }

    public function onDisable(Container $container, Extension $extension) {
        AssetManager::clean();
    }

    public function extend() {
        return;
    }

    /**
     * Copy fonts from local assets to forum assets.
     * =============================================
     * This should have been done by Flarum, so this function just serves to
     * make sure that everything is OK.
     */
    public static function copyTo() {
        $asset_path = public_path()."/assets/extensions/metric-void-magic-fonts/";
        $local_path = __DIR__."/../assets/";

        $font_file_list = scandir($local_path);

        @mkdir($asset_path);

        foreach($font_file_list as $font) {
            if($font != "." && ($font != ".." )
                    && (!file_exists($asset_path.$font))
                    && is_readable($local_path.$font) 
                    && is_writeable($asset_path.$font)) {
                copy($local_path.$font, $asset_path.$font);
            }
        }
    }

    /**
     * Delete the fonts copied to Flarum assets
     * ========================================
     * Flarum does not do this for us, so on our own.
     */
    public static function clean() {
        $asset_path = public_path()."/assets/extensions/metric-void-magic-fonts/";
        $font_file_list = scandir($asset_path);

        foreach($font_file_list as $font) {
            if($font != "." && $font!=".." && is_readable($asset_path.$font) && is_writeable($asset_path.$font)) {
                unlink($asset_path.$font);
            }
        }

        // Remove the folder.
        rmdir($asset_path);
    }
}