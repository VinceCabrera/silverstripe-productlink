<?php

namespace VinceCabrera\ProductLink\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Dev\Debug;

class LeftAndMainExtension extends Extension
{
    public function updateClientConfig(&$config)
    {

        $config['form']['EditorProductLink'] = [
            'schemaUrl' => $this->getOwner()->Link('methodSchema/Modals/EditorProductLink'),
        ];

        $config['form']['EditorPCWLink'] = [
            'schemaUrl' => $this->getOwner()->Link('methodSchema/Modals/EditorPCWLink'),
        ];
    }
}
