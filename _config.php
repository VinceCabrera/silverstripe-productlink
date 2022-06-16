<?php
use SilverStripe\Core\Manifest\ModuleLoader;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

call_user_func(function () {
    $module = ModuleLoader::inst()->getManifest()->getModule('VinceCabrera/silverstripe-productlink');

    // Enable insert-link to products
    TinyMCEConfig::get('cms')
        ->enablePlugins([
            'sslinkphone' => $module->getResource('client/dist/js/TinyMCE_sslink-product.js'),
        ]);
});
