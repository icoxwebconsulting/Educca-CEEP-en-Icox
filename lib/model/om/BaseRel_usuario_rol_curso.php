<?php


abstract class BaseRel_usuario_rol_curso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_usuario;


	
	protected $id_rol;


	
	protected $id_curso;


	
	protected $cal_dias_antes;


	
	protected $cal_dias_despues;


	
	protected $created_at;


	
	protected $presencial = 0;
	
	
	protected $tripartita = 0;

	
	protected $aUsuario;

	
	protected $aRol;

	
	protected $aCurso;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getIdUsuario()
	{

		return $this->id_usuario;
	}

	
	public function getIdRol()
	{

		return $this->id_rol;
	}

	
	public function getIdCurso()
	{

		return $this->id_curso;
	}

	
	public function getCalDiasAntes()
	{

		return $this->cal_dias_antes;
	}

	
	public function getCalDiasDespues()
	{

		return $this->cal_dias_despues;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPresencial()
	{

		return $this->presencial;
	}
	
	
	public function getTripartita()
	{

		return $this->tripartita;
	}

	
	public function setIdUsuario($v)
	{

		
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_usuario !== $v) {
			$this->id_usuario = $v;
			$this->modifiedColumns[] = Rel_usuario_rol_cursoPeer::ID_USUARIO;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

	} 
	
	public function setIdRol($v)
	{

		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_rol !== $v) {
			$this->id_rol = $v;
			$this->modifiedColumns[] = Rel_usuario_rol_cursoPeer::ID_ROL;
		}

		if ($this->aRol !== null && $this->aRol->getId() !== $v) {
			$this->aRol = null;
		}

	} 
	
	public function setIdCurso($v)
	{
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->id_curso !== $v) {
			$this->id_curso = $v;
			$this->modifiedColumns[] = Rel_usuario_rol_cursoPeer::ID_CURSO;
		}

		if ($this->aCurso !== null && $this->aCurso->getId() !== $v) {
			$this->aCurso = null;
		}

	} 
	
	public function setCalDiasAntes($v)
	{
		
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cal_dias_antes !== $v) {
			$this->cal_dias_antes = $v;
			$this->modifiedColumns[] = Rel_usuario_rol_cursoPeer::CAL_DIAS_ANTES;
		}

	} 
	
	public function setCalDiasDespues($v)
	{

		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cal_dias_despues !== $v) {
			$this->cal_dias_despues = $v;
			$this->modifiedColumns[] = Rel_usuario_rol_cursoPeer::CAL_DIAS_DESPUES;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = Rel_usuario_rol_cursoPeer::CREATED_AT;
		}

	} 
	
	public function setPresencial($v)
	{

		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->presencial !== $v || $v === 0) {
			$this->presencial = $v;
			$this->modifiedColumns[] = Rel_usuario_rol_cursoPeer::PRESENCIAL;
		}

	} 
	
	public function setTripartita($v)
	{
	
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tripartita !== $v || $v === 0) {
			$this->tripartita = $v;
			$this->modifiedColumns[] = Rel_usuario_rol_cursoPeer::TRIPARTITA;
		}

	} 
	
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id_usuario = $rs->getString($startcol + 0);

			$this->id_rol = $rs->getString($startcol + 1);

			$this->id_curso = $rs->getString($startcol + 2);

			$this->cal_dias_antes = $rs->getString($startcol + 3);

			$this->cal_dias_despues = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->presencial = $rs->getInt($startcol + 6);

			$this->tripartita = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

			return $startcol + 8;
		}
		catch (Exception $e) {
			throw new PropelException("Error populating Rel_usuario_rol_curso object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Rel_usuario_rol_cursoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Rel_usuario_rol_cursoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(Rel_usuario_rol_cursoPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Rel_usuario_rol_cursoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
			}

			if ($this->aRol !== null) {
				if ($this->aRol->isModified()) {
					$affectedRows += $this->aRol->save($con);
				}
				$this->setRol($this->aRol);
			}

			if ($this->aCurso !== null) {
				if ($this->aCurso->isModified()) {
					$affectedRows += $this->aCurso->save($con);
				}
				$this->setCurso($this->aCurso);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = Rel_usuario_rol_cursoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Rel_usuario_rol_cursoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aUsuario !== null) {
				if (!$this->aUsuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuario->getValidationFailures());
				}
			}

			if ($this->aRol !== null) {
				if (!$this->aRol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRol->getValidationFailures());
				}
			}

			if ($this->aCurso !== null) {
				if (!$this->aCurso->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCurso->getValidationFailures());
				}
			}


			if (($retval = Rel_usuario_rol_cursoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Rel_usuario_rol_cursoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdUsuario();
				break;
			case 1:
				return $this->getIdRol();
				break;
			case 2:
				return $this->getIdCurso();
				break;
			case 3:
				return $this->getCalDiasAntes();
				break;
			case 4:
				return $this->getCalDiasDespues();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getPresencial();
				break;
			case 7:
				return $this->getTripartita();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Rel_usuario_rol_cursoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdUsuario(),
			$keys[1] => $this->getIdRol(),
			$keys[2] => $this->getIdCurso(),
			$keys[3] => $this->getCalDiasAntes(),
			$keys[4] => $this->getCalDiasDespues(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getPresencial(),
			$keys[7] => $this->getTripartita(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Rel_usuario_rol_cursoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdUsuario($value);
				break;
			case 1:
				$this->setIdRol($value);
				break;
			case 2:
				$this->setIdCurso($value);
				break;
			case 3:
				$this->setCalDiasAntes($value);
				break;
			case 4:
				$this->setCalDiasDespues($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setPresencial($value);
				break;
			case 7:
				$this->setTripartita($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Rel_usuario_rol_cursoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdUsuario($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdRol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdCurso($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCalDiasAntes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCalDiasDespues($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPresencial($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTripartita($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Rel_usuario_rol_cursoPeer::DATABASE_NAME);

		if ($this->isColumnModified(Rel_usuario_rol_cursoPeer::ID_USUARIO)) $criteria->add(Rel_usuario_rol_cursoPeer::ID_USUARIO, $this->id_usuario);
		if ($this->isColumnModified(Rel_usuario_rol_cursoPeer::ID_ROL)) $criteria->add(Rel_usuario_rol_cursoPeer::ID_ROL, $this->id_rol);
		if ($this->isColumnModified(Rel_usuario_rol_cursoPeer::ID_CURSO)) $criteria->add(Rel_usuario_rol_cursoPeer::ID_CURSO, $this->id_curso);
		if ($this->isColumnModified(Rel_usuario_rol_cursoPeer::CAL_DIAS_ANTES)) $criteria->add(Rel_usuario_rol_cursoPeer::CAL_DIAS_ANTES, $this->cal_dias_antes);
		if ($this->isColumnModified(Rel_usuario_rol_cursoPeer::CAL_DIAS_DESPUES)) $criteria->add(Rel_usuario_rol_cursoPeer::CAL_DIAS_DESPUES, $this->cal_dias_despues);
		if ($this->isColumnModified(Rel_usuario_rol_cursoPeer::CREATED_AT)) $criteria->add(Rel_usuario_rol_cursoPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(Rel_usuario_rol_cursoPeer::PRESENCIAL)) $criteria->add(Rel_usuario_rol_cursoPeer::PRESENCIAL, $this->presencial);
		if ($this->isColumnModified(Rel_usuario_rol_cursoPeer::TRIPARTITA)) $criteria->add(Rel_usuario_rol_cursoPeer::TRIPARTITA, $this->tripartita);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Rel_usuario_rol_cursoPeer::DATABASE_NAME);

		$criteria->add(Rel_usuario_rol_cursoPeer::ID_USUARIO, $this->id_usuario);
		$criteria->add(Rel_usuario_rol_cursoPeer::ID_CURSO, $this->id_curso);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getIdUsuario();

		$pks[1] = $this->getIdCurso();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setIdUsuario($keys[0]);

		$this->setIdCurso($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdRol($this->id_rol);

		$copyObj->setCalDiasAntes($this->cal_dias_antes);

		$copyObj->setCalDiasDespues($this->cal_dias_despues);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setPresencial($this->presencial);

		$copyObj->setTripartita($this->tripartita);

		$copyObj->setNew(true);

		$copyObj->setIdUsuario(NULL); 
		$copyObj->setIdCurso(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new Rel_usuario_rol_cursoPeer();
		}
		return self::$peer;
	}

	
	public function setUsuario($v)
	{


		if ($v === null) {
			$this->setIdUsuario(NULL);
		} else {
			$this->setIdUsuario($v->getId());
		}


		$this->aUsuario = $v;
	}


	
	public function getUsuario($con = null)
	{
		if ($this->aUsuario === null && (($this->id_usuario !== "" && $this->id_usuario !== null))) {
						include_once 'lib/model/om/BaseUsuarioPeer.php';

			$this->aUsuario = UsuarioPeer::retrieveByPK($this->id_usuario, $con);

			
		}
		return $this->aUsuario;
	}

	
	public function setRol($v)
	{


		if ($v === null) {
			$this->setIdRol(NULL);
		} else {
			$this->setIdRol($v->getId());
		}


		$this->aRol = $v;
	}


	
	public function getRol($con = null)
	{
		if ($this->aRol === null && (($this->id_rol !== "" && $this->id_rol !== null))) {
						include_once 'lib/model/om/BaseRolPeer.php';

			$this->aRol = RolPeer::retrieveByPK($this->id_rol, $con);

			
		}
		return $this->aRol;
	}

	
	public function setCurso($v)
	{


		if ($v === null) {
			$this->setIdCurso(NULL);
		} else {
			$this->setIdCurso($v->getId());
		}


		$this->aCurso = $v;
	}


	
	public function getCurso($con = null)
	{
		if ($this->aCurso === null && (($this->id_curso !== "" && $this->id_curso !== null))) {
						include_once 'lib/model/om/BaseCursoPeer.php';

			$this->aCurso = CursoPeer::retrieveByPK($this->id_curso, $con);

			
		}
		return $this->aCurso;
	}

} 