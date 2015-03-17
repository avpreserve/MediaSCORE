<?php

/**
 * CharacteristicsFormatExtended form base class.
 *
 * @method CharacteristicsFormatExtended getObject() Returns the current form's model object
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCharacteristicsFormatExtendedForm extends FormatTypeForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('characteristics_format_extended[%s]');
  }

  public function getModelName()
  {
    return 'CharacteristicsFormatExtended';
  }

}
