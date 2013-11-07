<?php

/**
 * Unit
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    mediaSCORE
 * @subpackage model
 * @author     Nouman Tayyab
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Unit extends BaseUnit {

    /**
     * get the duration
     * 
     * @param integer $unitID
     * @return string 
     */
    public function getDuration($unitID) {
        $totalDuration = 0;
        $collection = Doctrine_Query::Create()
                ->from('AssetGroup ag')
                ->select('c.id,ag.id,ft.duration')
                ->innerJoin('ag.Collection c')
                ->innerJoin('ag.FormatType ft')
                ->where('c.parent_node_id  = ?', $unitID)
                ->fetchArray();
        if (sizeof($collection) > 0) {
            foreach ($collection as $key => $value) {
                $totalDuration = $totalDuration + $value['FormatType']['duration'];
            }
        }

        return minutesToHour::ConvertMinutes2Hours($totalDuration);
    }

    /**
     * get the duration
     * 
     * @param integer $unitID
     * @return string 
     */
    public function getDurationRealTime($unitID) {
        $totalDuration = 0;
        $collection = Doctrine_Query::Create()
                ->from('AssetGroup ag')
                ->select('c.id,ag.id,ft.duration')
                ->innerJoin('ag.Collection c')
                ->innerJoin('ag.FormatType ft')
                ->where('c.parent_node_id  = ?', $unitID)
                ->fetchArray();
        if (sizeof($collection) > 0) {
            foreach ($collection as $key => $value) {
                $totalDuration = $totalDuration + $value['FormatType']['duration'];
            }
        }

        return minutesToHour::ConvertMinutes2HoursRealTime($totalDuration);
    }

    public function getMediaRiversScoreRealTime($unitID, $start_score, $end_score) {
        $collection = Doctrine_Query::Create()
                ->from('AssetGroup ag')
                ->select('c.id,ag.id,ft.duration')
                ->innerJoin('ag.Collection c')
                ->innerJoin('ag.FormatType ft')
                ->where('c.parent_node_id  = ?', $unitID)
                ->andWhere('(CAST(c.collection_score as DECIMAL(3,2)))  <= ?', $end_score)
                ->andWhere('(CAST(c.collection_score as DECIMAL(3,2))) >= ?', $start_score)
                ->fetchArray();
        return $collection;
    }

    /**
     * get the Mediscore Score
     * 
     * @param int $unitID
     * @param float $start_score
     * @param float $end_score
     * @return array
     */
    public function getMediaScoreScoreRealTime($unitID, $start_score, $end_score) {
        $collection = Doctrine_Query::Create()
                ->from('AssetGroup ag')
                ->select('ag.id')
                ->innerJoin('ag.Collection c')
                ->innerJoin('ag.FormatType ft')
                ->where('c.parent_node_id  = ?', $unitID)
                ->andWhere('(CAST(ft.asset_score as DECIMAL(3,2)))  <= ?', $end_score)
                ->andWhere('(CAST(ft.asset_score as DECIMAL(3,2))) >= ?', $start_score)
                ->fetchArray();
//        print_r($collection);

        return $collection;
    }

    public function getStorageLocations($StorageLocationId) {
        $location = Doctrine_Query::Create()
                ->from('Unit u')
                ->select('u.id')
                ->innerJoin('u.StorageLocations usl')
                ->where('usl.id = ?', $StorageLocationId)
                ->fetchArray();
        
        return $location;
    }

    static public function getSearchResults($params, $user) {

        $join = '';
        $assets = array();
        if ($user->getType() == 3) {
            $join .='INNER JOIN unit_person up ON up.unit_id=s.id OR up.unit_id = s.parent_node_id';
        }
        $where = '';
//		if (count($params['formats']) > 0)
//			$where .= ' AND ft.type IN (' . implode(',', $params['formats']) . ')';
        if (count($params['store']) > 0)
            $where .= ' AND s.type IN (' . implode(',', $params['store']) . ')';
        if (count($params['location']) > 0) {
            $where .= ' AND (usl.storage_location_id IN (' . implode(',', $params['location']) . ')';
            $where .= ' OR  csl.storage_location_id IN (' . implode(',', $params['location']) . '))';
        }
        if (count($params['string']) > 0) {

            $where .= ' AND ( ';
            foreach ($params['string'] as $index => $string) {
                if (!empty($string)) {
                    if ($index == 0)
                        $where .=" (s.name LIKE '{$string}%')";
                    else
                        $where .=" OR (s.name LIKE '{$string}%')";
                }
            }
            $where .=')';
        }
        if (isset($params['s']) && !empty($params['s'])) {
            $where .=" AND s.name LIKE '{$params['s']}%'";
        }
        if (isset($params['status']) && !empty($params['status'])) {
            $where .=" AND s.status = {$params['status']}";
        }
        if (isset($params['dateType'])) {
            $from = $to = '';
            if (isset($params['from']) && trim($params['from']) != '')
                $from = $params['from'];
            if (isset($params['to']) && trim($params['to']) != '')
                $to = $params['to'];
            if ($params['dateType'] == 0) {
                if (trim($from) != '')
                    $where .=" AND DATE_FORMAT(s.created_at,\"%Y-%m-%d\") >='{$from}'";
                if (trim($to) != '')
                    $where .=" AND DATE_FORMAT(s.created_at,\"%Y-%m-%d\") <='{$to}'";
            }
            else if ($params['dateType'] == 1) {
                if (trim($from) != '')
                    $where .=" AND DATE_FORMAT(s.updated_at,\"%Y-%m-%d\") >='{$from}'";
                if (trim($to) != '')
                    $where .=" AND DATE_FORMAT(s.updated_at,\"%Y-%m-%d\") <='{$to}'";
            }
            else {
                if (trim($from) != '') {
                    $where .=" AND (DATE_FORMAT(s.created_at,\"%Y-%m-%d\") >='{$from}'";
                    $where .=" OR DATE_FORMAT(s.updated_at,\"%Y-%m-%d\") >='{$from}')";
                }
                if (trim($to) != '') {
                    $where .=" AND (DATE_FORMAT(s.created_at,\"%Y-%m-%d\") <='{$to}'";
                    $where .=" OR DATE_FORMAT(s.updated_at,\"%Y-%m-%d\") <='{$to}')";
                }
            }
        }

        if ($user->getType() == 3) {
            $where .=' AND up.person_id = ' . $user->getId();
        }
        $query = "SELECT s.id FROM store s
	     	{$join}
			LEFT JOIN unit_storage_location usl on usl.unit_id=s.id AND s.type=1 
			LEFT JOIN collection_storage_location csl on csl.collection_id=s.id AND s.type=3 
			WHERE 1=1 {$where}";


        $q = Doctrine_Manager::getInstance()->getCurrentConnection();

        $result = $q->execute($query);

        $result = $result->fetchAll();

        $filter_ID = array();
        foreach ($result as $value) {
            $filter_ID[] = $value['id'];
        }


        if (!empty($params['assetType']) || count($params['formats']) > 0) {

            $assets = Doctrine_Query::Create()
                    ->from('AssetGroup ag')
                    ->select('ag.id')
                    ->innerJoin('ag.FormatType ft')
                    ->innerJoin('ag.Collection c')
                    ->whereIn('ag.parent_node_id', $filter_ID);

            if (count($params['formats']) > 0)
                $assets = $assets->andWhereIn('ft.type', $params['formats']);
            $assets = $assets->fetchArray();

            if (count($params['store']) <= 0)
                $filter_ID = array();
            foreach ($assets as $value) {
                $filter_ID[] = $value['id'];
            }
        }

        return $filter_ID;
    }

    /**
     * get the Units Custome
     * 
     * @param  Array of adding custome values
     * @return Array of Units
     */
    static public

    function getUnitNameCustome($add_values = NULL) {
        $Units = Doctrine_Query::Create()
                ->from('Unit c')
                ->select('c.*')
                ->fetchArray();
        $UnitsArray = array();

        foreach ($Units as $Unit) {
//            var_dump($Unit);
//            exit;
            $UnitsArray[$Unit['id']] = $Unit['name'];
        }

        if ($add_values) {
            $UnitsArray[0] = $add_values;
        }
        ksort($UnitsArray);
        return $UnitsArray;
    }

}

