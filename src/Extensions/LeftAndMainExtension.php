<?php

namespace VinceCabrera\ProductLink\Extensions;

use SilverStripe\Core\Extension;

class LeftAndMainExtension extends Extension
{
    public function updateClientConfig(&$config)
    {

        $config['form']['EditorPCWLink'] = [
            'schemaUrl' => $this->getOwner()->Link('methodSchema/Modals/EditorPCWLink'),
        ];

        $config['form']['EditorProductLink'] = [
            'schemaUrl' => $this->getOwner()->Link('methodSchema/Modals/EditorProductLink'),
        ];


    }
}
