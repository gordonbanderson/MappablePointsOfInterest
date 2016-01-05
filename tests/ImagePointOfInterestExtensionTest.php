<?php

class ImagePointOfInterestExtensionTest extends SapphireTest
{
    public function setUpOnce()
    {
        $this->requiredExtensions = array(
            'ImagePotTestPageTO' => array('MapExtension', 'ImagePointOfInterestExtension'),
        );
        parent::setUpOnce();
    }

    public function testUpdateCMSFields()
    {
        $page = new ImagePotTestPageTO();
        $fields = $page->getCMSFields();
        $tab = $fields->findOrMakeTab('Root.Main');
        $fields = $tab->FieldList();
        $names = array();
        foreach ($fields as $field) {
            $names[] = $field->getName();
        }

        error_log(print_r($names, 1));
    }
}

class ImagePotTestPageTO extends Page implements TestOnly
{
}
