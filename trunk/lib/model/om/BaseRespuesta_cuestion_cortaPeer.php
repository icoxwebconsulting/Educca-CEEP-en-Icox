<?php


abstract class BaseRespuesta_cuestion_cortaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'respuesta_cuestion_corta';

	
	const CLASS_DEFAULT = 'lib.model.Respuesta_cuestion_corta';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'respuesta_cuestion_corta.ID';

	
	const ID_EJERCICIO_RESUELTO = 'respuesta_cuestion_corta.ID_EJERCICIO_RESUELTO';

	
	const ID_CUESTION_CORTA = 'respuesta_cuestion_corta.ID_CUESTION_CORTA';

	
	const RESPUESTA = 'respuesta_cuestion_corta.RESPUESTA';

	
	const COMENTARIO = 'respuesta_cuestion_corta.COMENTARIO';

	
	const PUNTUACION = 'respuesta_cuestion_corta.PUNTUACION';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdEjercicioResuelto', 'IdCuestionCorta', 'Respuesta', 'Comentario', 'Puntuacion', ),
		BasePeer::TYPE_COLNAME => array (Respuesta_cuestion_cortaPeer::ID, Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO, Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA, Respuesta_cuestion_cortaPeer::RESPUESTA, Respuesta_cuestion_cortaPeer::COMENTARIO, Respuesta_cuestion_cortaPeer::PUNTUACION, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_ejercicio_resuelto', 'id_cuestion_corta', 'respuesta', 'comentario', 'puntuacion', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdEjercicioResuelto' => 1, 'IdCuestionCorta' => 2, 'Respuesta' => 3, 'Comentario' => 4, 'Puntuacion' => 5, ),
		BasePeer::TYPE_COLNAME => array (Respuesta_cuestion_cortaPeer::ID => 0, Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO => 1, Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA => 2, Respuesta_cuestion_cortaPeer::RESPUESTA => 3, Respuesta_cuestion_cortaPeer::COMENTARIO => 4, Respuesta_cuestion_cortaPeer::PUNTUACION => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_ejercicio_resuelto' => 1, 'id_cuestion_corta' => 2, 'respuesta' => 3, 'comentario' => 4, 'puntuacion' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Respuesta_cuestion_cortaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Respuesta_cuestion_cortaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Respuesta_cuestion_cortaPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(Respuesta_cuestion_cortaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::ID);

		$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO);

		$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA);

		$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::RESPUESTA);

		$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COMENTARIO);

		$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::PUNTUACION);

	}

	const COUNT = 'COUNT(respuesta_cuestion_corta.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT respuesta_cuestion_corta.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Respuesta_cuestion_cortaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = Respuesta_cuestion_cortaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Respuesta_cuestion_cortaPeer::populateObjects(Respuesta_cuestion_cortaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Respuesta_cuestion_cortaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Respuesta_cuestion_cortaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinEjercicio_resuelto(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO, Ejercicio_resueltoPeer::ID);

		$rs = Respuesta_cuestion_cortaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinCuestion_corta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA, Cuestion_cortaPeer::ID);

		$rs = Respuesta_cuestion_cortaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinEjercicio_resuelto(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Respuesta_cuestion_cortaPeer::addSelectColumns($c);
		$startcol = (Respuesta_cuestion_cortaPeer::NUM_COLUMNS - Respuesta_cuestion_cortaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		Ejercicio_resueltoPeer::addSelectColumns($c);

		$c->addJoin(Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO, Ejercicio_resueltoPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Respuesta_cuestion_cortaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = Ejercicio_resueltoPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEjercicio_resuelto(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRespuesta_cuestion_corta($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRespuesta_cuestion_cortas();
				$obj2->addRespuesta_cuestion_corta($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinCuestion_corta(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Respuesta_cuestion_cortaPeer::addSelectColumns($c);
		$startcol = (Respuesta_cuestion_cortaPeer::NUM_COLUMNS - Respuesta_cuestion_cortaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		Cuestion_cortaPeer::addSelectColumns($c);

		$c->addJoin(Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA, Cuestion_cortaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Respuesta_cuestion_cortaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = Cuestion_cortaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getCuestion_corta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addRespuesta_cuestion_corta($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initRespuesta_cuestion_cortas();
				$obj2->addRespuesta_cuestion_corta($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO, Ejercicio_resueltoPeer::ID);

		$criteria->addJoin(Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA, Cuestion_cortaPeer::ID);

		$rs = Respuesta_cuestion_cortaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Respuesta_cuestion_cortaPeer::addSelectColumns($c);
		$startcol2 = (Respuesta_cuestion_cortaPeer::NUM_COLUMNS - Respuesta_cuestion_cortaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		Ejercicio_resueltoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + Ejercicio_resueltoPeer::NUM_COLUMNS;

		Cuestion_cortaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + Cuestion_cortaPeer::NUM_COLUMNS;

		$c->addJoin(Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO, Ejercicio_resueltoPeer::ID);

		$c->addJoin(Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA, Cuestion_cortaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Respuesta_cuestion_cortaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = Ejercicio_resueltoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEjercicio_resuelto(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRespuesta_cuestion_corta($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initRespuesta_cuestion_cortas();
				$obj2->addRespuesta_cuestion_corta($obj1);
			}


					
			$omClass = Cuestion_cortaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getCuestion_corta(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addRespuesta_cuestion_corta($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initRespuesta_cuestion_cortas();
				$obj3->addRespuesta_cuestion_corta($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptEjercicio_resuelto(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA, Cuestion_cortaPeer::ID);

		$rs = Respuesta_cuestion_cortaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptCuestion_corta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Respuesta_cuestion_cortaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO, Ejercicio_resueltoPeer::ID);

		$rs = Respuesta_cuestion_cortaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptEjercicio_resuelto(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Respuesta_cuestion_cortaPeer::addSelectColumns($c);
		$startcol2 = (Respuesta_cuestion_cortaPeer::NUM_COLUMNS - Respuesta_cuestion_cortaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		Cuestion_cortaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + Cuestion_cortaPeer::NUM_COLUMNS;

		$c->addJoin(Respuesta_cuestion_cortaPeer::ID_CUESTION_CORTA, Cuestion_cortaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Respuesta_cuestion_cortaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = Cuestion_cortaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getCuestion_corta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRespuesta_cuestion_corta($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRespuesta_cuestion_cortas();
				$obj2->addRespuesta_cuestion_corta($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptCuestion_corta(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		Respuesta_cuestion_cortaPeer::addSelectColumns($c);
		$startcol2 = (Respuesta_cuestion_cortaPeer::NUM_COLUMNS - Respuesta_cuestion_cortaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		Ejercicio_resueltoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + Ejercicio_resueltoPeer::NUM_COLUMNS;

		$c->addJoin(Respuesta_cuestion_cortaPeer::ID_EJERCICIO_RESUELTO, Ejercicio_resueltoPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = Respuesta_cuestion_cortaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = Ejercicio_resueltoPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getEjercicio_resuelto(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addRespuesta_cuestion_corta($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initRespuesta_cuestion_cortas();
				$obj2->addRespuesta_cuestion_corta($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return Respuesta_cuestion_cortaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Respuesta_cuestion_cortaPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(Respuesta_cuestion_cortaPeer::ID);
			$selectCriteria->add(Respuesta_cuestion_cortaPeer::ID, $criteria->remove(Respuesta_cuestion_cortaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(Respuesta_cuestion_cortaPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(Respuesta_cuestion_cortaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Respuesta_cuestion_corta) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Respuesta_cuestion_cortaPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Respuesta_cuestion_corta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Respuesta_cuestion_cortaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Respuesta_cuestion_cortaPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(Respuesta_cuestion_cortaPeer::DATABASE_NAME, Respuesta_cuestion_cortaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Respuesta_cuestion_cortaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(Respuesta_cuestion_cortaPeer::DATABASE_NAME);

		$criteria->add(Respuesta_cuestion_cortaPeer::ID, $pk);


		$v = Respuesta_cuestion_cortaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(Respuesta_cuestion_cortaPeer::ID, $pks, Criteria::IN);
			$objs = Respuesta_cuestion_cortaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRespuesta_cuestion_cortaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Respuesta_cuestion_cortaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Respuesta_cuestion_cortaMapBuilder');
}
