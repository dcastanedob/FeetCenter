<?php


/**
 * Base class that represents a query for the 'pacientelog' table.
 *
 *
 *
 * @method PacientelogQuery orderByIdpacientelog($order = Criteria::ASC) Order by the idpacientelog column
 * @method PacientelogQuery orderByIdpaciente($order = Criteria::ASC) Order by the idpaciente column
 * @method PacientelogQuery orderByIdempleado($order = Criteria::ASC) Order by the idempleado column
 * @method PacientelogQuery orderByPacientelogFecha($order = Criteria::ASC) Order by the pacientelog_fecha column
 * @method PacientelogQuery orderByPacientelogNombreOld($order = Criteria::ASC) Order by the pacientelog_nombre_old column
 * @method PacientelogQuery orderByPacientelogTelefonoOld($order = Criteria::ASC) Order by the pacientelog_telefono_old column
 * @method PacientelogQuery orderByPacientelogNombreNew($order = Criteria::ASC) Order by the pacientelog_nombre_new column
 * @method PacientelogQuery orderByPacientelogTelefonoNew($order = Criteria::ASC) Order by the pacientelog_telefono_new column
 *
 * @method PacientelogQuery groupByIdpacientelog() Group by the idpacientelog column
 * @method PacientelogQuery groupByIdpaciente() Group by the idpaciente column
 * @method PacientelogQuery groupByIdempleado() Group by the idempleado column
 * @method PacientelogQuery groupByPacientelogFecha() Group by the pacientelog_fecha column
 * @method PacientelogQuery groupByPacientelogNombreOld() Group by the pacientelog_nombre_old column
 * @method PacientelogQuery groupByPacientelogTelefonoOld() Group by the pacientelog_telefono_old column
 * @method PacientelogQuery groupByPacientelogNombreNew() Group by the pacientelog_nombre_new column
 * @method PacientelogQuery groupByPacientelogTelefonoNew() Group by the pacientelog_telefono_new column
 *
 * @method PacientelogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PacientelogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PacientelogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PacientelogQuery leftJoinEmpleado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Empleado relation
 * @method PacientelogQuery rightJoinEmpleado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Empleado relation
 * @method PacientelogQuery innerJoinEmpleado($relationAlias = null) Adds a INNER JOIN clause to the query using the Empleado relation
 *
 * @method PacientelogQuery leftJoinPaciente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Paciente relation
 * @method PacientelogQuery rightJoinPaciente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Paciente relation
 * @method PacientelogQuery innerJoinPaciente($relationAlias = null) Adds a INNER JOIN clause to the query using the Paciente relation
 *
 * @method Pacientelog findOne(PropelPDO $con = null) Return the first Pacientelog matching the query
 * @method Pacientelog findOneOrCreate(PropelPDO $con = null) Return the first Pacientelog matching the query, or a new Pacientelog object populated from the query conditions when no match is found
 *
 * @method Pacientelog findOneByIdpaciente(int $idpaciente) Return the first Pacientelog filtered by the idpaciente column
 * @method Pacientelog findOneByIdempleado(int $idempleado) Return the first Pacientelog filtered by the idempleado column
 * @method Pacientelog findOneByPacientelogFecha(string $pacientelog_fecha) Return the first Pacientelog filtered by the pacientelog_fecha column
 * @method Pacientelog findOneByPacientelogNombreOld(string $pacientelog_nombre_old) Return the first Pacientelog filtered by the pacientelog_nombre_old column
 * @method Pacientelog findOneByPacientelogTelefonoOld(string $pacientelog_telefono_old) Return the first Pacientelog filtered by the pacientelog_telefono_old column
 * @method Pacientelog findOneByPacientelogNombreNew(string $pacientelog_nombre_new) Return the first Pacientelog filtered by the pacientelog_nombre_new column
 * @method Pacientelog findOneByPacientelogTelefonoNew(string $pacientelog_telefono_new) Return the first Pacientelog filtered by the pacientelog_telefono_new column
 *
 * @method array findByIdpacientelog(int $idpacientelog) Return Pacientelog objects filtered by the idpacientelog column
 * @method array findByIdpaciente(int $idpaciente) Return Pacientelog objects filtered by the idpaciente column
 * @method array findByIdempleado(int $idempleado) Return Pacientelog objects filtered by the idempleado column
 * @method array findByPacientelogFecha(string $pacientelog_fecha) Return Pacientelog objects filtered by the pacientelog_fecha column
 * @method array findByPacientelogNombreOld(string $pacientelog_nombre_old) Return Pacientelog objects filtered by the pacientelog_nombre_old column
 * @method array findByPacientelogTelefonoOld(string $pacientelog_telefono_old) Return Pacientelog objects filtered by the pacientelog_telefono_old column
 * @method array findByPacientelogNombreNew(string $pacientelog_nombre_new) Return Pacientelog objects filtered by the pacientelog_nombre_new column
 * @method array findByPacientelogTelefonoNew(string $pacientelog_telefono_new) Return Pacientelog objects filtered by the pacientelog_telefono_new column
 *
 * @package    propel.generator.feetcent_feetcenter.om
 */
abstract class BasePacientelogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePacientelogQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'feetcent_feetcenter';
        }
        if (null === $modelName) {
            $modelName = 'Pacientelog';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PacientelogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PacientelogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PacientelogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PacientelogQuery) {
            return $criteria;
        }
        $query = new PacientelogQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Pacientelog|Pacientelog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PacientelogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PacientelogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Pacientelog A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdpacientelog($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Pacientelog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idpacientelog`, `idpaciente`, `idempleado`, `pacientelog_fecha`, `pacientelog_nombre_old`, `pacientelog_telefono_old`, `pacientelog_nombre_new`, `pacientelog_telefono_new` FROM `pacientelog` WHERE `idpacientelog` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Pacientelog();
            $obj->hydrate($row);
            PacientelogPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Pacientelog|Pacientelog[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Pacientelog[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PacientelogPeer::IDPACIENTELOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PacientelogPeer::IDPACIENTELOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idpacientelog column
     *
     * Example usage:
     * <code>
     * $query->filterByIdpacientelog(1234); // WHERE idpacientelog = 1234
     * $query->filterByIdpacientelog(array(12, 34)); // WHERE idpacientelog IN (12, 34)
     * $query->filterByIdpacientelog(array('min' => 12)); // WHERE idpacientelog >= 12
     * $query->filterByIdpacientelog(array('max' => 12)); // WHERE idpacientelog <= 12
     * </code>
     *
     * @param     mixed $idpacientelog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByIdpacientelog($idpacientelog = null, $comparison = null)
    {
        if (is_array($idpacientelog)) {
            $useMinMax = false;
            if (isset($idpacientelog['min'])) {
                $this->addUsingAlias(PacientelogPeer::IDPACIENTELOG, $idpacientelog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idpacientelog['max'])) {
                $this->addUsingAlias(PacientelogPeer::IDPACIENTELOG, $idpacientelog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PacientelogPeer::IDPACIENTELOG, $idpacientelog, $comparison);
    }

    /**
     * Filter the query on the idpaciente column
     *
     * Example usage:
     * <code>
     * $query->filterByIdpaciente(1234); // WHERE idpaciente = 1234
     * $query->filterByIdpaciente(array(12, 34)); // WHERE idpaciente IN (12, 34)
     * $query->filterByIdpaciente(array('min' => 12)); // WHERE idpaciente >= 12
     * $query->filterByIdpaciente(array('max' => 12)); // WHERE idpaciente <= 12
     * </code>
     *
     * @see       filterByPaciente()
     *
     * @param     mixed $idpaciente The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByIdpaciente($idpaciente = null, $comparison = null)
    {
        if (is_array($idpaciente)) {
            $useMinMax = false;
            if (isset($idpaciente['min'])) {
                $this->addUsingAlias(PacientelogPeer::IDPACIENTE, $idpaciente['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idpaciente['max'])) {
                $this->addUsingAlias(PacientelogPeer::IDPACIENTE, $idpaciente['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PacientelogPeer::IDPACIENTE, $idpaciente, $comparison);
    }

    /**
     * Filter the query on the idempleado column
     *
     * Example usage:
     * <code>
     * $query->filterByIdempleado(1234); // WHERE idempleado = 1234
     * $query->filterByIdempleado(array(12, 34)); // WHERE idempleado IN (12, 34)
     * $query->filterByIdempleado(array('min' => 12)); // WHERE idempleado >= 12
     * $query->filterByIdempleado(array('max' => 12)); // WHERE idempleado <= 12
     * </code>
     *
     * @see       filterByEmpleado()
     *
     * @param     mixed $idempleado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByIdempleado($idempleado = null, $comparison = null)
    {
        if (is_array($idempleado)) {
            $useMinMax = false;
            if (isset($idempleado['min'])) {
                $this->addUsingAlias(PacientelogPeer::IDEMPLEADO, $idempleado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idempleado['max'])) {
                $this->addUsingAlias(PacientelogPeer::IDEMPLEADO, $idempleado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PacientelogPeer::IDEMPLEADO, $idempleado, $comparison);
    }

    /**
     * Filter the query on the pacientelog_fecha column
     *
     * Example usage:
     * <code>
     * $query->filterByPacientelogFecha('2011-03-14'); // WHERE pacientelog_fecha = '2011-03-14'
     * $query->filterByPacientelogFecha('now'); // WHERE pacientelog_fecha = '2011-03-14'
     * $query->filterByPacientelogFecha(array('max' => 'yesterday')); // WHERE pacientelog_fecha < '2011-03-13'
     * </code>
     *
     * @param     mixed $pacientelogFecha The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByPacientelogFecha($pacientelogFecha = null, $comparison = null)
    {
        if (is_array($pacientelogFecha)) {
            $useMinMax = false;
            if (isset($pacientelogFecha['min'])) {
                $this->addUsingAlias(PacientelogPeer::PACIENTELOG_FECHA, $pacientelogFecha['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pacientelogFecha['max'])) {
                $this->addUsingAlias(PacientelogPeer::PACIENTELOG_FECHA, $pacientelogFecha['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PacientelogPeer::PACIENTELOG_FECHA, $pacientelogFecha, $comparison);
    }

    /**
     * Filter the query on the pacientelog_nombre_old column
     *
     * Example usage:
     * <code>
     * $query->filterByPacientelogNombreOld('fooValue');   // WHERE pacientelog_nombre_old = 'fooValue'
     * $query->filterByPacientelogNombreOld('%fooValue%'); // WHERE pacientelog_nombre_old LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pacientelogNombreOld The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByPacientelogNombreOld($pacientelogNombreOld = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pacientelogNombreOld)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pacientelogNombreOld)) {
                $pacientelogNombreOld = str_replace('*', '%', $pacientelogNombreOld);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PacientelogPeer::PACIENTELOG_NOMBRE_OLD, $pacientelogNombreOld, $comparison);
    }

    /**
     * Filter the query on the pacientelog_telefono_old column
     *
     * Example usage:
     * <code>
     * $query->filterByPacientelogTelefonoOld('fooValue');   // WHERE pacientelog_telefono_old = 'fooValue'
     * $query->filterByPacientelogTelefonoOld('%fooValue%'); // WHERE pacientelog_telefono_old LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pacientelogTelefonoOld The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByPacientelogTelefonoOld($pacientelogTelefonoOld = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pacientelogTelefonoOld)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pacientelogTelefonoOld)) {
                $pacientelogTelefonoOld = str_replace('*', '%', $pacientelogTelefonoOld);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PacientelogPeer::PACIENTELOG_TELEFONO_OLD, $pacientelogTelefonoOld, $comparison);
    }

    /**
     * Filter the query on the pacientelog_nombre_new column
     *
     * Example usage:
     * <code>
     * $query->filterByPacientelogNombreNew('fooValue');   // WHERE pacientelog_nombre_new = 'fooValue'
     * $query->filterByPacientelogNombreNew('%fooValue%'); // WHERE pacientelog_nombre_new LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pacientelogNombreNew The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByPacientelogNombreNew($pacientelogNombreNew = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pacientelogNombreNew)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pacientelogNombreNew)) {
                $pacientelogNombreNew = str_replace('*', '%', $pacientelogNombreNew);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PacientelogPeer::PACIENTELOG_NOMBRE_NEW, $pacientelogNombreNew, $comparison);
    }

    /**
     * Filter the query on the pacientelog_telefono_new column
     *
     * Example usage:
     * <code>
     * $query->filterByPacientelogTelefonoNew('fooValue');   // WHERE pacientelog_telefono_new = 'fooValue'
     * $query->filterByPacientelogTelefonoNew('%fooValue%'); // WHERE pacientelog_telefono_new LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pacientelogTelefonoNew The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function filterByPacientelogTelefonoNew($pacientelogTelefonoNew = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pacientelogTelefonoNew)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pacientelogTelefonoNew)) {
                $pacientelogTelefonoNew = str_replace('*', '%', $pacientelogTelefonoNew);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PacientelogPeer::PACIENTELOG_TELEFONO_NEW, $pacientelogTelefonoNew, $comparison);
    }

    /**
     * Filter the query by a related Empleado object
     *
     * @param   Empleado|PropelObjectCollection $empleado The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PacientelogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEmpleado($empleado, $comparison = null)
    {
        if ($empleado instanceof Empleado) {
            return $this
                ->addUsingAlias(PacientelogPeer::IDEMPLEADO, $empleado->getIdempleado(), $comparison);
        } elseif ($empleado instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PacientelogPeer::IDEMPLEADO, $empleado->toKeyValue('PrimaryKey', 'Idempleado'), $comparison);
        } else {
            throw new PropelException('filterByEmpleado() only accepts arguments of type Empleado or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Empleado relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function joinEmpleado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Empleado');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Empleado');
        }

        return $this;
    }

    /**
     * Use the Empleado relation Empleado object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EmpleadoQuery A secondary query class using the current class as primary query
     */
    public function useEmpleadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEmpleado($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Empleado', 'EmpleadoQuery');
    }

    /**
     * Filter the query by a related Paciente object
     *
     * @param   Paciente|PropelObjectCollection $paciente The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PacientelogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPaciente($paciente, $comparison = null)
    {
        if ($paciente instanceof Paciente) {
            return $this
                ->addUsingAlias(PacientelogPeer::IDPACIENTE, $paciente->getIdpaciente(), $comparison);
        } elseif ($paciente instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PacientelogPeer::IDPACIENTE, $paciente->toKeyValue('PrimaryKey', 'Idpaciente'), $comparison);
        } else {
            throw new PropelException('filterByPaciente() only accepts arguments of type Paciente or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Paciente relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function joinPaciente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Paciente');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Paciente');
        }

        return $this;
    }

    /**
     * Use the Paciente relation Paciente object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PacienteQuery A secondary query class using the current class as primary query
     */
    public function usePacienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPaciente($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Paciente', 'PacienteQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Pacientelog $pacientelog Object to remove from the list of results
     *
     * @return PacientelogQuery The current query, for fluid interface
     */
    public function prune($pacientelog = null)
    {
        if ($pacientelog) {
            $this->addUsingAlias(PacientelogPeer::IDPACIENTELOG, $pacientelog->getIdpacientelog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
