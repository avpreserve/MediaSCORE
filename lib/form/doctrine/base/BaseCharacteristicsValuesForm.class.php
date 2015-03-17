<?php

/**
 * CharacteristicsValues form base class.
 *
 * @method CharacteristicsValues getObject() Returns the current form's model object
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCharacteristicsValuesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'c_name'                   => new sfWidgetFormInputText(),
      'c_score'                  => new sfWidgetFormInputText(),
      'format_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FormatType'), 'add_empty' => true)),
      'constraint_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CharacteristicsConstraints'), 'add_empty' => true)),
      'parent_characteristic_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CharacteristicsFormat'), 'add_empty' => true)),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'c_name'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'c_score'                  => new sfValidatorNumber(array('required' => false)),
      'format_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('FormatType'), 'required' => false)),
      'constraint_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CharacteristicsConstraints'), 'required' => false)),
      'parent_characteristic_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CharacteristicsFormat'), 'required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('characteristics_values[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CharacteristicsValues';
  }

}
