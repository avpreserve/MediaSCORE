<?php

/**
 * BasePerson
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property Doctrine_Collection $Units
 * @property Doctrine_Collection $consultationRecords
 * @property Doctrine_Collection $UnitPerson
 * @property Doctrine_Collection $EvaluatorHistoryPersonnel
 * 
 * @method Doctrine_Collection getUnits()                     Returns the current record's "Units" collection
 * @method Doctrine_Collection getConsultationRecords()       Returns the current record's "consultationRecords" collection
 * @method Doctrine_Collection getUnitPerson()                Returns the current record's "UnitPerson" collection
 * @method Doctrine_Collection getEvaluatorHistoryPersonnel() Returns the current record's "EvaluatorHistoryPersonnel" collection
 * @method Person              setUnits()                     Sets the current record's "Units" collection
 * @method Person              setConsultationRecords()       Sets the current record's "consultationRecords" collection
 * @method Person              setUnitPerson()                Sets the current record's "UnitPerson" collection
 * @method Person              setEvaluatorHistoryPersonnel() Sets the current record's "EvaluatorHistoryPersonnel" collection
 * 
 * @package    mediaSCORE
 * @subpackage model
 * @author     Nouman Tayyab
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePerson extends User {

    public function setUp() {
        parent::setUp();
        $this->hasMany('Unit as Units', array(
            'refClass' => 'UnitPerson',
            'local' => 'person_id',
            'foreign' => 'unit_id'));

        $this->hasMany('EvaluatorHistory as consultationRecords', array(
            'refClass' => 'EvaluatorHistoryPersonnel',
            'local' => 'person_id',
            'foreign' => 'evaluator_history_id'));

        $this->hasMany('UnitPerson', array(
            'local' => 'id',
            'foreign' => 'person_id'));

        $this->hasMany('EvaluatorHistoryPersonnel', array(
            'local' => 'id',
            'foreign' => 'person_id'));
    }

}