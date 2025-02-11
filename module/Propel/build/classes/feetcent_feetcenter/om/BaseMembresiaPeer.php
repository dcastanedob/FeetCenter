<?php


/**
 * Base static class for performing query and update operations on the 'membresia' table.
 *
 *
 *
 * @package propel.generator.feetcent_feetcenter.om
 */
abstract class BaseMembresiaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'feetcent_feetcenter';

    /** the table name for this class */
    const TABLE_NAME = 'membresia';

    /** the related Propel class for this table */
    const OM_CLASS = 'Membresia';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MembresiaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the idmembresia field */
    const IDMEMBRESIA = 'membresia.idmembresia';

    /** the column name for the membresia_nombre field */
    const MEMBRESIA_NOMBRE = 'membresia.membresia_nombre';

    /** the column name for the membresia_descripcion field */
    const MEMBRESIA_DESCRIPCION = 'membresia.membresia_descripcion';

    /** the column name for the membresia_servicios field */
    const MEMBRESIA_SERVICIOS = 'membresia.membresia_servicios';

    /** the column name for the membresia_cupones field */
    const MEMBRESIA_CUPONES = 'membresia.membresia_cupones';

    /** the column name for the servicio_generaingreso field */
    const SERVICIO_GENERAINGRESO = 'membresia.servicio_generaingreso';

    /** the column name for the servicio_generacomision field */
    const SERVICIO_GENERACOMISION = 'membresia.servicio_generacomision';

    /** the column name for the servicio_tipocomision field */
    const SERVICIO_TIPOCOMISION = 'membresia.servicio_tipocomision';

    /** the column name for the servicio_comision field */
    const SERVICIO_COMISION = 'membresia.servicio_comision';

    /** the column name for the membresia_precio field */
    const MEMBRESIA_PRECIO = 'membresia.membresia_precio';

    /** the column name for the membresia_vigencia field */
    const MEMBRESIA_VIGENCIA = 'membresia.membresia_vigencia';

    /** The enumerated values for the servicio_tipocomision field */
    const SERVICIO_TIPOCOMISION_PORCENTAJE = 'porcentaje';
    const SERVICIO_TIPOCOMISION_CANTIDAD = 'cantidad';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Membresia objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Membresia[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MembresiaPeer::$fieldNames[MembresiaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Idmembresia', 'MembresiaNombre', 'MembresiaDescripcion', 'MembresiaServicios', 'MembresiaCupones', 'ServicioGeneraingreso', 'ServicioGeneracomision', 'ServicioTipocomision', 'ServicioComision', 'MembresiaPrecio', 'MembresiaVigencia', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idmembresia', 'membresiaNombre', 'membresiaDescripcion', 'membresiaServicios', 'membresiaCupones', 'servicioGeneraingreso', 'servicioGeneracomision', 'servicioTipocomision', 'servicioComision', 'membresiaPrecio', 'membresiaVigencia', ),
        BasePeer::TYPE_COLNAME => array (MembresiaPeer::IDMEMBRESIA, MembresiaPeer::MEMBRESIA_NOMBRE, MembresiaPeer::MEMBRESIA_DESCRIPCION, MembresiaPeer::MEMBRESIA_SERVICIOS, MembresiaPeer::MEMBRESIA_CUPONES, MembresiaPeer::SERVICIO_GENERAINGRESO, MembresiaPeer::SERVICIO_GENERACOMISION, MembresiaPeer::SERVICIO_TIPOCOMISION, MembresiaPeer::SERVICIO_COMISION, MembresiaPeer::MEMBRESIA_PRECIO, MembresiaPeer::MEMBRESIA_VIGENCIA, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDMEMBRESIA', 'MEMBRESIA_NOMBRE', 'MEMBRESIA_DESCRIPCION', 'MEMBRESIA_SERVICIOS', 'MEMBRESIA_CUPONES', 'SERVICIO_GENERAINGRESO', 'SERVICIO_GENERACOMISION', 'SERVICIO_TIPOCOMISION', 'SERVICIO_COMISION', 'MEMBRESIA_PRECIO', 'MEMBRESIA_VIGENCIA', ),
        BasePeer::TYPE_FIELDNAME => array ('idmembresia', 'membresia_nombre', 'membresia_descripcion', 'membresia_servicios', 'membresia_cupones', 'servicio_generaingreso', 'servicio_generacomision', 'servicio_tipocomision', 'servicio_comision', 'membresia_precio', 'membresia_vigencia', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MembresiaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Idmembresia' => 0, 'MembresiaNombre' => 1, 'MembresiaDescripcion' => 2, 'MembresiaServicios' => 3, 'MembresiaCupones' => 4, 'ServicioGeneraingreso' => 5, 'ServicioGeneracomision' => 6, 'ServicioTipocomision' => 7, 'ServicioComision' => 8, 'MembresiaPrecio' => 9, 'MembresiaVigencia' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idmembresia' => 0, 'membresiaNombre' => 1, 'membresiaDescripcion' => 2, 'membresiaServicios' => 3, 'membresiaCupones' => 4, 'servicioGeneraingreso' => 5, 'servicioGeneracomision' => 6, 'servicioTipocomision' => 7, 'servicioComision' => 8, 'membresiaPrecio' => 9, 'membresiaVigencia' => 10, ),
        BasePeer::TYPE_COLNAME => array (MembresiaPeer::IDMEMBRESIA => 0, MembresiaPeer::MEMBRESIA_NOMBRE => 1, MembresiaPeer::MEMBRESIA_DESCRIPCION => 2, MembresiaPeer::MEMBRESIA_SERVICIOS => 3, MembresiaPeer::MEMBRESIA_CUPONES => 4, MembresiaPeer::SERVICIO_GENERAINGRESO => 5, MembresiaPeer::SERVICIO_GENERACOMISION => 6, MembresiaPeer::SERVICIO_TIPOCOMISION => 7, MembresiaPeer::SERVICIO_COMISION => 8, MembresiaPeer::MEMBRESIA_PRECIO => 9, MembresiaPeer::MEMBRESIA_VIGENCIA => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('IDMEMBRESIA' => 0, 'MEMBRESIA_NOMBRE' => 1, 'MEMBRESIA_DESCRIPCION' => 2, 'MEMBRESIA_SERVICIOS' => 3, 'MEMBRESIA_CUPONES' => 4, 'SERVICIO_GENERAINGRESO' => 5, 'SERVICIO_GENERACOMISION' => 6, 'SERVICIO_TIPOCOMISION' => 7, 'SERVICIO_COMISION' => 8, 'MEMBRESIA_PRECIO' => 9, 'MEMBRESIA_VIGENCIA' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('idmembresia' => 0, 'membresia_nombre' => 1, 'membresia_descripcion' => 2, 'membresia_servicios' => 3, 'membresia_cupones' => 4, 'servicio_generaingreso' => 5, 'servicio_generacomision' => 6, 'servicio_tipocomision' => 7, 'servicio_comision' => 8, 'membresia_precio' => 9, 'membresia_vigencia' => 10, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
        MembresiaPeer::SERVICIO_TIPOCOMISION => array(
            MembresiaPeer::SERVICIO_TIPOCOMISION_PORCENTAJE,
            MembresiaPeer::SERVICIO_TIPOCOMISION_CANTIDAD,
        ),
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = MembresiaPeer::getFieldNames($toType);
        $key = isset(MembresiaPeer::$fieldKeys[$fromType][$name]) ? MembresiaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MembresiaPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, MembresiaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MembresiaPeer::$fieldNames[$type];
    }

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return MembresiaPeer::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM column
     *
     * @param string $colname The ENUM column name.
     *
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = MembresiaPeer::getValueSets();

        if (!isset($valueSets[$colname])) {
            throw new PropelException(sprintf('Column "%s" has no ValueSet.', $colname));
        }

        return $valueSets[$colname];
    }

    /**
     * Gets the SQL value for the ENUM column value
     *
     * @param string $colname ENUM column name.
     * @param string $enumVal ENUM value.
     *
     * @return int SQL value
     */
    public static function getSqlValueForEnum($colname, $enumVal)
    {
        $values = MembresiaPeer::getValueSet($colname);
        if (!in_array($enumVal, $values)) {
            throw new PropelException(sprintf('Value "%s" is not accepted in this enumerated column', $colname));
        }

        return array_search($enumVal, $values);
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. MembresiaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MembresiaPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(MembresiaPeer::IDMEMBRESIA);
            $criteria->addSelectColumn(MembresiaPeer::MEMBRESIA_NOMBRE);
            $criteria->addSelectColumn(MembresiaPeer::MEMBRESIA_DESCRIPCION);
            $criteria->addSelectColumn(MembresiaPeer::MEMBRESIA_SERVICIOS);
            $criteria->addSelectColumn(MembresiaPeer::MEMBRESIA_CUPONES);
            $criteria->addSelectColumn(MembresiaPeer::SERVICIO_GENERAINGRESO);
            $criteria->addSelectColumn(MembresiaPeer::SERVICIO_GENERACOMISION);
            $criteria->addSelectColumn(MembresiaPeer::SERVICIO_TIPOCOMISION);
            $criteria->addSelectColumn(MembresiaPeer::SERVICIO_COMISION);
            $criteria->addSelectColumn(MembresiaPeer::MEMBRESIA_PRECIO);
            $criteria->addSelectColumn(MembresiaPeer::MEMBRESIA_VIGENCIA);
        } else {
            $criteria->addSelectColumn($alias . '.idmembresia');
            $criteria->addSelectColumn($alias . '.membresia_nombre');
            $criteria->addSelectColumn($alias . '.membresia_descripcion');
            $criteria->addSelectColumn($alias . '.membresia_servicios');
            $criteria->addSelectColumn($alias . '.membresia_cupones');
            $criteria->addSelectColumn($alias . '.servicio_generaingreso');
            $criteria->addSelectColumn($alias . '.servicio_generacomision');
            $criteria->addSelectColumn($alias . '.servicio_tipocomision');
            $criteria->addSelectColumn($alias . '.servicio_comision');
            $criteria->addSelectColumn($alias . '.membresia_precio');
            $criteria->addSelectColumn($alias . '.membresia_vigencia');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MembresiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MembresiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MembresiaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MembresiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return Membresia
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MembresiaPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return MembresiaPeer::populateObjects(MembresiaPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MembresiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MembresiaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MembresiaPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param Membresia $obj A Membresia object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdmembresia();
            } // if key === null
            MembresiaPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Membresia object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Membresia) {
                $key = (string) $value->getIdmembresia();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Membresia object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MembresiaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Membresia Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MembresiaPeer::$instances[$key])) {
                return MembresiaPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (MembresiaPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        MembresiaPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to membresia
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in MembresiaclinicaPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        MembresiaclinicaPeer::clearInstancePool();
        // Invalidate objects in PacientemembresiaPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        PacientemembresiaPeer::clearInstancePool();
        // Invalidate objects in VisitadetallePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        VisitadetallePeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = MembresiaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MembresiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MembresiaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MembresiaPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Membresia object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MembresiaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MembresiaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MembresiaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MembresiaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MembresiaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(MembresiaPeer::DATABASE_NAME)->getTable(MembresiaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMembresiaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMembresiaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \MembresiaTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return MembresiaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Membresia or Criteria object.
     *
     * @param      mixed $values Criteria or Membresia object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MembresiaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Membresia object
        }

        if ($criteria->containsKey(MembresiaPeer::IDMEMBRESIA) && $criteria->keyContainsValue(MembresiaPeer::IDMEMBRESIA) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MembresiaPeer::IDMEMBRESIA.')');
        }


        // Set the correct dbName
        $criteria->setDbName(MembresiaPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Membresia or Criteria object.
     *
     * @param      mixed $values Criteria or Membresia object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MembresiaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MembresiaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MembresiaPeer::IDMEMBRESIA);
            $value = $criteria->remove(MembresiaPeer::IDMEMBRESIA);
            if ($value) {
                $selectCriteria->add(MembresiaPeer::IDMEMBRESIA, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MembresiaPeer::TABLE_NAME);
            }

        } else { // $values is Membresia object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MembresiaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the membresia table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MembresiaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += MembresiaPeer::doOnDeleteCascade(new Criteria(MembresiaPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(MembresiaPeer::TABLE_NAME, $con, MembresiaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MembresiaPeer::clearInstancePool();
            MembresiaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Membresia or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Membresia object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(MembresiaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Membresia) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MembresiaPeer::DATABASE_NAME);
            $criteria->add(MembresiaPeer::IDMEMBRESIA, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(MembresiaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += MembresiaPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                MembresiaPeer::clearInstancePool();
            } elseif ($values instanceof Membresia) { // it's a model object
                MembresiaPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    MembresiaPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            MembresiaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = MembresiaPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related Membresiaclinica objects
            $criteria = new Criteria(MembresiaclinicaPeer::DATABASE_NAME);

            $criteria->add(MembresiaclinicaPeer::IDMEMBRESIA, $obj->getIdmembresia());
            $affectedRows += MembresiaclinicaPeer::doDelete($criteria, $con);

            // delete related Pacientemembresia objects
            $criteria = new Criteria(PacientemembresiaPeer::DATABASE_NAME);

            $criteria->add(PacientemembresiaPeer::IDMEMBRESIA, $obj->getIdmembresia());
            $affectedRows += PacientemembresiaPeer::doDelete($criteria, $con);

            // delete related Visitadetalle objects
            $criteria = new Criteria(VisitadetallePeer::DATABASE_NAME);

            $criteria->add(VisitadetallePeer::IDMEMBRESIA, $obj->getIdmembresia());
            $affectedRows += VisitadetallePeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Membresia object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Membresia $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MembresiaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MembresiaPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(MembresiaPeer::DATABASE_NAME, MembresiaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Membresia
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = MembresiaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MembresiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(MembresiaPeer::DATABASE_NAME);
        $criteria->add(MembresiaPeer::IDMEMBRESIA, $pk);

        $v = MembresiaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Membresia[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MembresiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(MembresiaPeer::DATABASE_NAME);
            $criteria->add(MembresiaPeer::IDMEMBRESIA, $pks, Criteria::IN);
            $objs = MembresiaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseMembresiaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMembresiaPeer::buildTableMap();

