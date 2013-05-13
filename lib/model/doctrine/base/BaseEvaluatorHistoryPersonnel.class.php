<?php

/**
 * BaseEvaluatorHistoryPersonnel
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $evaluator_history_id
 * @property integer $person_id
 * @property EvaluatorHistory $EvaluatorHistory
 * @property Person $Person
 * 
 * @method integer                   getEvaluatorHistoryId()   Returns the current record's "evaluator_history_id" value
 * @method integer                   getPersonId()             Returns the current record's "person_id" value
 * @method EvaluatorHistory          getEvaluatorHistory()     Returns the current record's "EvaluatorHistory" value
 * @method Person                    getPerson()               Returns the current record's "Person" value
 * @method EvaluatorHistoryPersonnel setEvaluatorHistoryId()   Sets the current record's "evaluator_history_id" value
 * @method EvaluatorHistoryPersonnel setPersonId()             Sets the current record's "person_id" value
 * @method EvaluatorHistoryPersonnel setEvaluatorHistory()     Sets the current record's "EvaluatorHistory" value
 * @method EvaluatorHistoryPersonnel setPerson()               Sets the current record's "Person" value
 * 
 * @package    mediaSCORE
 * @subpackage model
 * @author     Nouman Tayyab
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEvaluatorHistoryPersonnel extends sfDoctrineRecord {

    public function setTableDefinition() {
        $this->setTableName('evaluator_history_personnel');
        $this->hasColumn('evaluator_history_id', 'integer', null, array(
            'type' => 'integer',
        ));
        $this->hasColumn('person_id', 'integer', null, array(
            'type' => 'integer',
        ));
    }

    public function setUp() {
        parent::setUp();
        $this->hasOne('EvaluatorHistory', array(
            'local' => 'evaluator_history_id',
            'foreign' => 'id',
            'onDelete' => 'CASCADE',
            'onUpdate' => 'CASCADE'));

        $this->hasOne('Person', array(
            'local' => 'person_id',
            'foreign' => 'id',
            'onDelete' => 'CASCADE',
            'onUpdate' => 'CASCADE'));
    }

}