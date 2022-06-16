<?php

namespace VinceCabrera\ProductLink\Forms;

use SilverStripe\Admin\ModalController;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\Form;

/**
 * Decorates ModalController with insert phone link
 * @see ModalController
 */
class ProductLinkModalExtension extends Extension
{
    private static $allowed_actions = [
        'EditorProductLink',
    ];

    /**
     * @return ModalController
     */
    public function getOwner()
    {
        /** @var ModalController $owner */
        $owner = $this->owner;
        return $owner;
    }


    /**
     * Form for inserting internal link pages
     *
     * @return Form
     */
    public function EditorProductLink()
    {
        $showLinkText = $this->getOwner()->getRequest()->getVar('requireLinkText');
        $factory = EditorProductLinkFormFactory::singleton();
        return $factory->getForm(
            $this->getOwner(),
            "EditorProductLink",
            ['RequireLinkText' => isset($showLinkText)]
        );
    }
}
