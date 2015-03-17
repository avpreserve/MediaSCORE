<?php

/**
 * SimpleSubUnit form base class.
 *
 * @method SimpleSubUnit getObject() Returns the current form's model object
 *
 * @package    mediaSCORE
 * @subpackage form
 * @author     Nouman Tayyab
 * @version    SVN: $Id: sfDoctrineFormGeneratedInheritanceTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSimpleSubUnitForm extends UnitForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('simple_sub_unit[%s]');
  }

  public function getModelName()
  {
    return 'SimpleSubUnit';
  }

}
