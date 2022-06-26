<?php

namespace VinceCabrera\ProductLink\Forms;

use SilverStripe\Dev\Debug;
use SilverStripe\Admin\Forms\LinkFormFactory;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;

class EditorPCWLinkFormFactory extends LinkFormFactory{

    protected function getFormFields($controller, $name, $context) {

        $records = \PCWRecord::get()->filter(["Status" => "CURRENT"])->sort("TypeID, Name");
        $pcwRecordss = new ArrayList();
        foreach ($records as $pcwRecord){
            $pcwRecordss->push(new ArrayData(["ID" => $pcwRecord->ID, "Name" => $pcwRecord->Type()->Name . ": " . $pcwRecord->Name]));
        }

        $pcwRecords = $pcwRecordss->sort("Name")->map("ID", "Name");

        $fields = FieldList::create([
            DropdownField::create(
                'Link',
                'PCW Record',
                $pcwRecords
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
