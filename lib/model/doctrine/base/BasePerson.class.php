<?php

/**
 * BasePerson
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Doctrine_Collection $Units
 * @property Doctrine_Collection $consultedForAssetGroups
 * 
 * @method Doctrine_Collection getUnits()                   Returns the current record's "Units" collection
 * @method Doctrine_Collection getConsultedForAssetGroups() Returns the current record's "consultedForAssetGroups" collection
 * @method Person              setUnits()                   Sets the current record's "Units" collection
 * @method Person              setConsultedForAssetGroups() Sets the current record's "consultedForAssetGroups" collection
 * 
 * @package    mediaSCORE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePerson extends User
{
    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Unit as Units', array(
             'refClass' => 'UnitPerson',
             'local' => 'person_id',
             'foreign' => 'unit_id'));

        $this->hasMany('EvaluatorHistory as consultedForAssetGroups', array(
             'refClass' => 'EvaluatorHistoryPersonnel',
             'local' => 'person_id',
             'foreign' => 'evaluator_history_id'));
    }
}