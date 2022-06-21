<?php
use SilverStripe\Core\Manifest\ModuleLoader;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

call_user_func(function () {
    $module = ModuleLoader::inst()->getManifest()->getModule('vincecabrera/silverstripe-productlink');

    // Enable insert-link to products
//\SilverStripe\Dev\Debug::show($module->getResource('client/dist/js/TinyMCE_sslink-pcw.js'));
    TinyMCEConfig::get('cms')
        ->enablePlugins([
            'sslinkproduct' => $module->getResource('client/dist/js/TinyMCE_sslink-product.js'),
            'sslinkpcw' => $module->getResource('client/dist/js/TinyMCE_sslink-pcw.js'),
        ]);
});
