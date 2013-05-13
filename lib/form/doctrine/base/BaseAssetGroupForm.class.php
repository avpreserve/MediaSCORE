<?php

/**
 * AssetGroup form base class.
 *
 * @method AssetGroup getObject() Returns the current form's model object
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAssetGroupForm extends SubUnitForm {

    protected function setupInheritance() {
        parent::setupInheritance();

        $this->widgetSchema->setNameFormat('asset_group[%s]');
    }

    public function getModelName() {
        return 'AssetGroup';
    }

}
