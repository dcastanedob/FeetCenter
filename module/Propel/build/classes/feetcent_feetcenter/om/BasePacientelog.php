<?php


/**
 * Base class that represents a row from the 'pacientelog' table.
 *
 *
 *
 * @package    propel.generator.feetcent_feetcenter.om
 */
abstract class BasePacientelog extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'PacientelogPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PacientelogPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the idpacientelog field.
     * @var        int
     */
    protected $idpacientelog;

    /**
     * The value for the idpaciente field.
     * @var        int
     */
    protected $idpaciente;

    /**
     * The value for the idempleado field.
     * @var        int
     */
    protected $idempleado;

    /**
     * The value for the pacientelog_fecha field.
     * @var        string
     */
    protected $pacientelog_fecha;

    /**
     * The value for the pacientelog_nombre field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pacientelog_nombre;

    /**
     * The value for the pacientelog_telefono field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $pacientelog_telefono;

    /**
     * @var        Empleado
     */
    protected $aEmpleado;

    /**
     * @var        Paciente
     */
    protected $aPaciente;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->pacientelog_nombre = '';
        $this->pacientelog_telefono = '';
    }

    /**
     * Initializes internal state of BasePacientelog object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [idpacientelog] column value.
     *
     * @return int
     */
    public function getIdpacientelog()
    {

        return $this->idpacientelog;
    }

    /**
     * Get the [idpaciente] column value.
     *
     * @return int
     */
    public function getIdpaciente()
    {

        return $this->idpaciente;
    }

    /**
     * Get the [idempleado] column value.
     *
     * @return int
     */
    public function getIdempleado()
    {

        return $this->idempleado;
    }

    /**
     * Get the [optionally formatted] temporal [pacientelog_fecha] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPacientelogFecha($format = 'Y-m-d H:i:s')
    {
        if ($this->pacientelog_fecha === null) {
            return null;
        }

        if ($this->pacientelog_fecha === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->pacientelog_fecha);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->pacientelog_fecha, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [pacientelog_nombre] column value.
     *
     * @return string
     */
    public function getPacientelogNombre()
    {

        return $this->pacientelog_nombre;
    }

    /**
     * Get the [pacientelog_telefono] column value.
     *
     * @return string
     */
    public function getPacientelogTelefono()
    {

        return $this->pacientelog_telefono;
    }

    /**
     * Set the value of [idpacientelog] column.
     *
     * @param  int $v new value
     * @return Pacientelog The current object (for fluent API support)
     */
    public function setIdpacientelog($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idpacientelog !== $v) {
            $this->idpacientelog = $v;
            $this->modifiedColumns[] = PacientelogPeer::IDPACIENTELOG;
        }


        return $this;
    } // setIdpacientelog()

    /**
     * Set the value of [idpaciente] column.
     *
     * @param  int $v new value
     * @return Pacientelog The current object (for fluent API support)
     */
    public function setIdpaciente($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idpaciente !== $v) {
            $this->idpaciente = $v;
            $this->modifiedColumns[] = PacientelogPeer::IDPACIENTE;
        }

        if ($this->aPaciente !== null && $this->aPaciente->getIdpaciente() !== $v) {
            $this->aPaciente = null;
        }


        return $this;
    } // setIdpaciente()

    /**
     * Set the value of [idempleado] column.
     *
     * @param  int $v new value
     * @return Pacientelog The current object (for fluent API support)
     */
    public function setIdempleado($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->idempleado !== $v) {
            $this->idempleado = $v;
            $this->modifiedColumns[] = PacientelogPeer::IDEMPLEADO;
        }

        if ($this->aEmpleado !== null && $this->aEmpleado->getIdempleado() !== $v) {
            $this->aEmpleado = null;
        }


        return $this;
    } // setIdempleado()

    /**
     * Sets the value of [pacientelog_fecha] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Pacientelog The current object (for fluent API support)
     */
    public function setPacientelogFecha($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->pacientelog_fecha !== null || $dt !== null) {
            $currentDateAsString = ($this->pacientelog_fecha !== null && $tmpDt = new DateTime($this->pacientelog_fecha)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->pacientelog_fecha = $newDateAsString;
                $this->modifiedColumns[] = PacientelogPeer::PACIENTELOG_FECHA;
            }
        } // if either are not null


        return $this;
    } // setPacientelogFecha()

    /**
     * Set the value of [pacientelog_nombre] column.
     *
     * @param  string $v new value
     * @return Pacientelog The current object (for fluent API support)
     */
    public function setPacientelogNombre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pacientelog_nombre !== $v) {
            $this->pacientelog_nombre = $v;
            $this->modifiedColumns[] = PacientelogPeer::PACIENTELOG_NOMBRE;
        }


        return $this;
    } // setPacientelogNombre()

    /**
     * Set the value of [pacientelog_telefono] column.
     *
     * @param  string $v new value
     * @return Pacientelog The current object (for fluent API support)
     */
    public function setPacientelogTelefono($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->pacientelog_telefono !== $v) {
            $this->pacientelog_telefono = $v;
            $this->modifiedColumns[] = PacientelogPeer::PACIENTELOG_TELEFONO;
        }


        return $this;
    } // setPacientelogTelefono()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->pacientelog_nombre !== '') {
                return false;
            }

            if ($this->pacientelog_telefono !== '') {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->idpacientelog = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->idpaciente = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->idempleado = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->pacientelog_fecha = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->pacientelog_nombre = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->pacientelog_telefono = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = PacientelogPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Pacientelog object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

        if ($this->aPaciente !== null && $this->idpaciente !== $this->aPaciente->getIdpaciente()) {
            $this->aPaciente = null;
        }
        if ($this->aEmpleado !== null && $this->idempleado !== $this->aEmpleado->getIdempleado()) {
            $this->aEmpleado = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PacientelogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PacientelogPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aEmpleado = null;
            $this->aPaciente = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PacientelogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PacientelogQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PacientelogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                PacientelogPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aEmpleado !== null) {
                if ($this->aEmpleado->isModified() || $this->aEmpleado->isNew()) {
                    $affectedRows += $this->aEmpleado->save($con);
                }
                $this->setEmpleado($this->aEmpleado);
            }

            if ($this->aPaciente !== null) {
                if ($this->aPaciente->isModified() || $this->aPaciente->isNew()) {
                    $affectedRows += $this->aPaciente->save($con);
                }
                $this->setPaciente($this->aPaciente);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = PacientelogPeer::IDPACIENTELOG;
        if (null !== $this->idpacientelog) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PacientelogPeer::IDPACIENTELOG . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PacientelogPeer::IDPACIENTELOG)) {
            $modifiedColumns[':p' . $index++]  = '`idpacientelog`';
        }
        if ($this->isColumnModified(PacientelogPeer::IDPACIENTE)) {
            $modifiedColumns[':p' . $index++]  = '`idpaciente`';
        }
        if ($this->isColumnModified(PacientelogPeer::IDEMPLEADO)) {
            $modifiedColumns[':p' . $index++]  = '`idempleado`';
        }
        if ($this->isColumnModified(PacientelogPeer::PACIENTELOG_FECHA)) {
            $modifiedColumns[':p' . $index++]  = '`pacientelog_fecha`';
        }
        if ($this->isColumnModified(PacientelogPeer::PACIENTELOG_NOMBRE)) {
            $modifiedColumns[':p' . $index++]  = '`pacientelog_nombre`';
        }
        if ($this->isColumnModified(PacientelogPeer::PACIENTELOG_TELEFONO)) {
            $modifiedColumns[':p' . $index++]  = '`pacientelog_telefono`';
        }

        $sql = sprintf(
            'INSERT INTO `pacientelog` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`idpacientelog`':
                        $stmt->bindValue($identifier, $this->idpacientelog, PDO::PARAM_INT);
                        break;
                    case '`idpaciente`':
                        $stmt->bindValue($identifier, $this->idpaciente, PDO::PARAM_INT);
                        break;
                    case '`idempleado`':
                        $stmt->bindValue($identifier, $this->idempleado, PDO::PARAM_INT);
                        break;
                    case '`pacientelog_fecha`':
                        $stmt->bindValue($identifier, $this->pacientelog_fecha, PDO::PARAM_STR);
                        break;
                    case '`pacientelog_nombre`':
                        $stmt->bindValue($identifier, $this->pacientelog_nombre, PDO::PARAM_STR);
                        break;
                    case '`pacientelog_telefono`':
                        $stmt->bindValue($identifier, $this->pacientelog_telefono, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdpacientelog($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aEmpleado !== null) {
                if (!$this->aEmpleado->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aEmpleado->getValidationFailures());
                }
            }

            if ($this->aPaciente !== null) {
                if (!$this->aPaciente->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPaciente->getValidationFailures());
                }
            }


            if (($retval = PacientelogPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = PacientelogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdpacientelog();
                break;
            case 1:
                return $this->getIdpaciente();
                break;
            case 2:
                return $this->getIdempleado();
                break;
            case 3:
                return $this->getPacientelogFecha();
                break;
            case 4:
                return $this->getPacientelogNombre();
                break;
            case 5:
                return $this->getPacientelogTelefono();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['Pacientelog'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Pacientelog'][$this->getPrimaryKey()] = true;
        $keys = PacientelogPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdpacientelog(),
            $keys[1] => $this->getIdpaciente(),
            $keys[2] => $this->getIdempleado(),
            $keys[3] => $this->getPacientelogFecha(),
            $keys[4] => $this->getPacientelogNombre(),
            $keys[5] => $this->getPacientelogTelefono(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aEmpleado) {
                $result['Empleado'] = $this->aEmpleado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPaciente) {
                $result['Paciente'] = $this->aPaciente->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = PacientelogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdpacientelog($value);
                break;
            case 1:
                $this->setIdpaciente($value);
                break;
            case 2:
                $this->setIdempleado($value);
                break;
            case 3:
                $this->setPacientelogFecha($value);
                break;
            case 4:
                $this->setPacientelogNombre($value);
                break;
            case 5:
                $this->setPacientelogTelefono($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = PacientelogPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdpacientelog($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdpaciente($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdempleado($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPacientelogFecha($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPacientelogNombre($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setPacientelogTelefono($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PacientelogPeer::DATABASE_NAME);

        if ($this->isColumnModified(PacientelogPeer::IDPACIENTELOG)) $criteria->add(PacientelogPeer::IDPACIENTELOG, $this->idpacientelog);
        if ($this->isColumnModified(PacientelogPeer::IDPACIENTE)) $criteria->add(PacientelogPeer::IDPACIENTE, $this->idpaciente);
        if ($this->isColumnModified(PacientelogPeer::IDEMPLEADO)) $criteria->add(PacientelogPeer::IDEMPLEADO, $this->idempleado);
        if ($this->isColumnModified(PacientelogPeer::PACIENTELOG_FECHA)) $criteria->add(PacientelogPeer::PACIENTELOG_FECHA, $this->pacientelog_fecha);
        if ($this->isColumnModified(PacientelogPeer::PACIENTELOG_NOMBRE)) $criteria->add(PacientelogPeer::PACIENTELOG_NOMBRE, $this->pacientelog_nombre);
        if ($this->isColumnModified(PacientelogPeer::PACIENTELOG_TELEFONO)) $criteria->add(PacientelogPeer::PACIENTELOG_TELEFONO, $this->pacientelog_telefono);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(PacientelogPeer::DATABASE_NAME);
        $criteria->add(PacientelogPeer::IDPACIENTELOG, $this->idpacientelog);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdpacientelog();
    }

    /**
     * Generic method to set the primary key (idpacientelog column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdpacientelog($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdpacientelog();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Pacientelog (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdpaciente($this->getIdpaciente());
        $copyObj->setIdempleado($this->getIdempleado());
        $copyObj->setPacientelogFecha($this->getPacientelogFecha());
        $copyObj->setPacientelogNombre($this->getPacientelogNombre());
        $copyObj->setPacientelogTelefono($this->getPacientelogTelefono());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdpacientelog(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return Pacientelog Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return PacientelogPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PacientelogPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Empleado object.
     *
     * @param                  Empleado $v
     * @return Pacientelog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEmpleado(Empleado $v = null)
    {
        if ($v === null) {
            $this->setIdempleado(NULL);
        } else {
            $this->setIdempleado($v->getIdempleado());
        }

        $this->aEmpleado = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Empleado object, it will not be re-added.
        if ($v !== null) {
            $v->addPacientelog($this);
        }


        return $this;
    }


    /**
     * Get the associated Empleado object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Empleado The associated Empleado object.
     * @throws PropelException
     */
    public function getEmpleado(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aEmpleado === null && ($this->idempleado !== null) && $doQuery) {
            $this->aEmpleado = EmpleadoQuery::create()->findPk($this->idempleado, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEmpleado->addPacientelogs($this);
             */
        }

        return $this->aEmpleado;
    }

    /**
     * Declares an association between this object and a Paciente object.
     *
     * @param                  Paciente $v
     * @return Pacientelog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPaciente(Paciente $v = null)
    {
        if ($v === null) {
            $this->setIdpaciente(NULL);
        } else {
            $this->setIdpaciente($v->getIdpaciente());
        }

        $this->aPaciente = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Paciente object, it will not be re-added.
        if ($v !== null) {
            $v->addPacientelog($this);
        }


        return $this;
    }


    /**
     * Get the associated Paciente object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Paciente The associated Paciente object.
     * @throws PropelException
     */
    public function getPaciente(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPaciente === null && ($this->idpaciente !== null) && $doQuery) {
            $this->aPaciente = PacienteQuery::create()->findPk($this->idpaciente, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPaciente->addPacientelogs($this);
             */
        }

        return $this->aPaciente;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->idpacientelog = null;
        $this->idpaciente = null;
        $this->idempleado = null;
        $this->pacientelog_fecha = null;
        $this->pacientelog_nombre = null;
        $this->pacientelog_telefono = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->aEmpleado instanceof Persistent) {
              $this->aEmpleado->clearAllReferences($deep);
            }
            if ($this->aPaciente instanceof Persistent) {
              $this->aPaciente->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aEmpleado = null;
        $this->aPaciente = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PacientelogPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
