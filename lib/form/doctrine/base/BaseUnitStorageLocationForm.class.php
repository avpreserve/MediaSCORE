<?php

/**
 * UnitStorageLocation form base class.
 *
 * @method UnitStorageLocation getObject() Returns the current form's model object
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUnitStorageLocationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'unit_id'             => new sfWidgetFormInputHidden(),
      'storage_location_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'unit_id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('unit_id')), 'empty_value' => $this->getObject()->get('unit_id'), 'required' => false)),
      'storage_location_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('storage_location_id')), 'empty_value' => $this->getObject()->get('storage_location_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('unit_storage_location[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UnitStorageLocation';
  }

}
