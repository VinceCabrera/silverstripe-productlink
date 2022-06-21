<?php

namespace VinceCabrera\ProductLink\Forms;

use SilverStripe\Admin\ModalController;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\Form;

/**
 * Decorates ModalController with insert phone link
 * @see ModalController
 */
class PCWLinkModalExtension extends Extension
{
    private static $allowed_actions = [
        'EditorPCWLink',
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
    public function EditorPCWLink()
    {
        $showLinkText = $this->getOwner()->getRequest()->getVar('requireLinkText');
        $factory = EditorPCWLinkFormFactory::singleton();
        return $factory->getForm(
            $this->getOwner(),
            "EditorPCWLink",
            ['RequireLinkText' => isset($showLinkText)]
        );
    }
}
