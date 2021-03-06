<?php

/**
 * PressedAudioDiscFormatType form base class.
 *
 * @method PressedAudioDiscFormatType getObject() Returns the current form's model object
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePressedAudioDiscFormatTypeForm extends SoftDiskFormatTypeForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('pressed_audio_disc_format_type[%s]');
  }

  public function getModelName()
  {
    return 'PressedAudioDiscFormatType';
  }

}
