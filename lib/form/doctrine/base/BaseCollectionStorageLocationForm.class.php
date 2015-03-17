<?php

/**
 * CollectionStorageLocation form base class.
 *
 * @method CollectionStorageLocation getObject() Returns the current form's model object
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCollectionStorageLocationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'collection_id'       => new sfWidgetFormInputHidden(),
      'storage_location_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'collection_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('collection_id')), 'empty_value' => $this->getObject()->get('collection_id'), 'required' => false)),
      'storage_location_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('storage_location_id')), 'empty_value' => $this->getObject()->get('storage_location_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('collection_storage_location[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CollectionStorageLocation';
  }

}
