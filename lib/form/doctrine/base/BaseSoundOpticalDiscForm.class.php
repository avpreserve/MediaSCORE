<?php

/**
 * SoundOpticalDisc form base class.
 *
 * @method SoundOpticalDisc getObject() Returns the current form's model object
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSoundOpticalDiscForm extends OpticalDiscFormatTypeForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('sound_optical_disc[%s]');
  }

  public function getModelName()
  {
    return 'SoundOpticalDisc';
  }

}
