<?php

/**
 * Unit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    mediaSCORE
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Unit extends BaseUnit {
    /* public function setUp() {

      parent::setUp();
      $this->hasMany('Phonenumber as Phonenumbers', array(
      'local' => 'id',
      'foreign' => 'user_id'
      ));

      } */

//    public function getNameSlug() {
//        return urlSlug::slugify($this->getName()); 
//    }
    public function getDuration($unitID) {
        $totalDuration = 0;
        $collection = Doctrine_Query::Create()
                ->from('Collection c')
                ->select('c.*')
                ->where('c.parent_node_id  = ?', $unitID)
                ->fetchArray();
        if (sizeof($collection) > 0) {
            foreach ($collection as $value) {
                $assetGroup = Doctrine_Query::Create()
                        ->from('AssetGroup ag')
                        ->select('ag.*')
                        ->where('ag.parent_node_id  = ?', $value['id'])
                        ->fetchArray();
                if (sizeof($assetGroup) > 0) {
                    foreach ($assetGroup as $valueAG) {
                        $formatType = Doctrine_Query::Create()
                                ->from('FormatType ft')
                                ->select('ft.*')
                                ->where('ft.id  = ?', $valueAG['format_id'])
                                ->fetchArray();
                        if (sizeof($formatType) > 0)
                            $totalDuration = $totalDuration + $formatType[0]['duration'];
                    }
                }
            }
        }
       
        return  minutesToHour::ConvertMinutes2Hours($totalDuration);
    }

    

}
