<?php

abstract class BaseTicketPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ticket';

	
	const CLASS_DEFAULT = 'lib.model.Ticket';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'ticket.ID';

	
	const ID_ALUMNO = 'ticket.ID_ALUMNO';
	
	const CODIGO = 'ticket.CODIGO';
	const ASUNTO = 'ticket.ASUNTO';
	const MENSAJE = 'ticket.MENSAJE';
	const ESTADO = 'ticket.ESTADO';
	const AUTOR = 'ticket.AUTOR';
	const ORIGEN = 'ticket.ORIGEN';
	const ABIERTO = 'ticket.ABIERTO';
	const ACTUALIZADO = 'ticket.ACTUALIZADO';
	const CERRADO = 'ticket.CERRADO';

	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdAlumno', 'Codigo', 'Asunto', 'Mensaje', 'Estado', 'Autor', 'Origen', 'Abierto', 'Actualizado', 'Cerrado', ),
		BasePeer::TYPE_COLNAME => array (TicketPeer::ID, TicketPeer::ID_ALUMNO, TicketPeer::CODIGO, TicketPeer::ASUNTO, TicketPeer::MENSAJE, TicketPeer::ESTADO, TicketPeer::AUTOR, TicketPeer::ORIGEN, TicketPeer::ABIERTO, TicketPeer::ACTUALIZADO, TicketPeer::CERRADO,),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_alumno', 'codigo', 'asunto', 'mensaje', 'estado', 'autor', 'origen', 'abierto', 'actualizado', 'cerrado',),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdAlumno' => 1, 'Codigo' => 2, 'Asunto' => 3, 'Mensaje' => 4, 'Estado' => 5, 'Autor' => 6, 'Origen' => 7, 'Abierto' => 8, 'Actualizado' => 9, 'Cerrado' => 10, ),
		BasePeer::TYPE_COLNAME => array (TicketPeer::ID => 0, TicketPeer::ID_ALUMNO => 1, TicketPeer::CODIGO => 2, TicketPeer::ASUNTO => 3, TicketPeer::MENSAJE => 4, TicketPeer::ESTADO => 5, TicketPeer::AUTOR => 6, TicketPeer::ORIGEN => 7, TicketPeer::ABIERTO => 8, TicketPeer::ACTUALIZADO => 9, TicketPeer::CERRADO => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_alumno' => 1, 'codigo' => 2, 'asunto' => 3, 'mensaje' => 4, 'estado' => 5, 'autor' => 6, 'origen' => 7, 'abierto' => 8, 'actualizado' => 9, 'cerrado' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TicketMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TicketMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TicketPeer::getTableMap();
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
		return str_replace(TicketPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TicketPeer::ID);

		$criteria->addSelectColumn(TicketPeer::ID_ALUMNO);

		$criteria->addSelectColumn(TicketPeer::CODIGO);
		$criteria->addSelectColumn(TicketPeer::ASUNTO);
		$criteria->addSelectColumn(TicketPeer::MENSAJE);
		$criteria->addSelectColumn(TicketPeer::ESTADO);
		$criteria->addSelectColumn(TicketPeer::AUTOR);
		$criteria->addSelectColumn(TicketPeer::ORIGEN);
		$criteria->addSelectColumn(TicketPeer::ABIERTO);
		$criteria->addSelectColumn(TicketPeer::ACTUALIZADO);
		$criteria->addSelectColumn(TicketPeer::CERRADO);
	}

	const COUNT = 'COUNT(ticket.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ticket.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TicketPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TicketPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TicketPeer::doSelectRS($criteria, $con);
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
		$objects = TicketPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TicketPeer::populateObjects(TicketPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TicketPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TicketPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinUsuarioRelatedByIdAlumno(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TicketPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TicketPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TicketPeer::ID_ALUMNO, UsuarioPeer::ID);

		$rs = TicketPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectJoinUsuarioRelatedByIdAlumno(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TicketPeer::addSelectColumns($c);
		$startcol = (TicketPeer::NUM_COLUMNS - TicketPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		UsuarioPeer::addSelectColumns($c);

		$c->addJoin(TicketPeer::ID_ALUMNO, UsuarioPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TicketPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = UsuarioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getUsuarioRelatedByIdAlumno(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addTicketRelatedByIdAlumno($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initTicketsRelatedByIdAlumno();
				$obj2->addTicketRelatedByIdAlumno($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}
	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TicketPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TicketPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(TicketPeer::ID_ALUMNO, UsuarioPeer::ID);

		$rs = TicketPeer::doSelectRS($criteria, $con);
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

		TicketPeer::addSelectColumns($c);
		$startcol2 = (TicketPeer::NUM_COLUMNS - TicketPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		UsuarioPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + UsuarioPeer::NUM_COLUMNS;

		$c->addJoin(TicketPeer::ID_ALUMNO, UsuarioPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TicketPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);
					
			$omClass = UsuarioPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getUsuarioRelatedByIdAlumno(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addTicketRelatedByIdAlumno($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initTicketsRelatedByIdAlumno();
				$obj2->addTicketRelatedByIdAlumno($obj1);
			}
			$results[] = $obj1;
		}
		return $results;
	}

	public static function doCountJoinAllExceptUsuarioRelatedByIdAlumno(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TicketPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TicketPeer::COUNT);
		}

		foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TicketPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectJoinAllExceptUsuarioRelatedByIdAlumno(Criteria $c, $con = null)
	{
		$c = clone $c;

		if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		TicketPeer::addSelectColumns($c);
		$startcol2 = (TicketPeer::NUM_COLUMNS - TicketPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = TicketPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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
		return TicketPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TicketPeer::ID); 

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
			$comparison = $criteria->getComparison(TicketPeer::ID);
			$selectCriteria->add(TicketPeer::ID, $criteria->remove(TicketPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TicketPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TicketPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ticket) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TicketPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ticket $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TicketPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TicketPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TicketPeer::DATABASE_NAME, TicketPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TicketPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TicketPeer::DATABASE_NAME);

		$criteria->add(TicketPeer::ID, $pk);


		$v = TicketPeer::doSelect($criteria, $con);

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
			$criteria->add(TicketPeer::ID, $pks, Criteria::IN);
			$objs = TicketPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTicketPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TicketMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TicketMapBuilder');
}