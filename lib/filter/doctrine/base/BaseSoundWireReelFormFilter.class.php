<?php

/**
 * SoundWireReel filter form base class.
 *
 * @package    mediaSCORE
 * @subpackage filter
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSoundWireReelFormFilter extends ReelCassetteFormatTypeFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('sound_wire_reel_filters[%s]');
  }

  public function getModelName()
  {
    return 'SoundWireReel';
  }
}
