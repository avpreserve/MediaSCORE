<?php

/**
 * CharacteristicsFormatExtended filter form base class.
 *
 * @package    mediaSCORE
 * @subpackage filter
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedInheritanceTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCharacteristicsFormatExtendedFormFilter extends FormatTypeFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('characteristics_format_extended_filters[%s]');
  }

  public function getModelName()
  {
    return 'CharacteristicsFormatExtended';
  }
}
