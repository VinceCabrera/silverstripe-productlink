<?php

namespace VinceCabrera\ProductLink\Forms;

use SilverStripe\Admin\Forms\LinkFormFactory;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;

class EditorPCWLinkFormFactory extends LinkFormFactory{

    protected function getFormFields($controller, $name, $context) {
        $products = \Product::get()->filter(["InventoryStatus" => "Current"])->sort("InventoryCode")->map("ID", "InventoryCode");

        $fields = FieldList::create([
            DropdownField::create(
                'Link',
                'PCW Record',
                $products
            ),
            TextField::create(
                'Description',
                'Description (optional)'
            )
        ]);

        if ($context['RequireLinkText']) {
            $fields->insertAfter('Link', TextField::create('Text', 'Link text'));
        }

        return $fields;
    }

    protected function getValidator($controller, $name, $context) {
        if ($context['RequireLinkText']) {
            return RequiredFields::create('Text');
        }

        return null;
    }
}

