<?php


/**
 * Base class that represents a query for the 'loginlog' table.
 *
 *
 *
 * @method LoginlogQuery orderByIdloginlog($order = Criteria::ASC) Order by the idloginlog column
 * @method LoginlogQuery orderByIdempleado($order = Criteria::ASC) Order by the idempleado column
 * @method LoginlogQuery orderByLoginlogFechainicio($order = Criteria::ASC) Order by the loginlog_fechainicio column
 * @method LoginlogQuery orderByLoginlogFechafin($order = Criteria::ASC) Order by the loginlog_fechafin column
 * @method LoginlogQuery orderByLoginlogGeo($order = Criteria::ASC) Order by the loginlog_geo column
 *
 * @method LoginlogQuery groupByIdloginlog() Group by the idloginlog column
 * @method LoginlogQuery groupByIdempleado() Group by the idempleado column
 * @method LoginlogQuery groupByLoginlogFechainicio() Group by the loginlog_fechainicio column
 * @method LoginlogQuery groupByLoginlogFechafin() Group by the loginlog_fechafin column
 * @method LoginlogQuery groupByLoginlogGeo() Group by the loginlog_geo column
 *
 * @method LoginlogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LoginlogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LoginlogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Loginlog findOne(PropelPDO $con = null) Return the first Loginlog matching the query
 * @method Loginlog findOneOrCreate(PropelPDO $con = null) Return the first Loginlog matching the query, or a new Loginlog object populated from the query conditions when no match is found
 *
 * @method Loginlog findOneByIdempleado(int $idempleado) Return the first Loginlog filtered by the idempleado column
 * @method Loginlog findOneByLoginlogFechainicio(string $loginlog_fechainicio) Return the first Loginlog filtered by the loginlog_fechainicio column
 * @method Loginlog findOneByLoginlogFechafin(string $loginlog_fechafin) Return the first Loginlog filtered by the loginlog_fechafin column
 * @method Loginlog findOneByLoginlogGeo(string $loginlog_geo) Return the first Loginlog filtered by the loginlog_geo column
 *
 * @method array findByIdloginlog(int $idloginlog) Return Loginlog objects filtered by the idloginlog column
 * @method array findByIdempleado(int $idempleado) Return Loginlog objects filtered by the idempleado column
 * @method array findByLoginlogFechainicio(string $loginlog_fechainicio) Return Loginlog objects filtered by the loginlog_fechainicio column
 * @method array findByLoginlogFechafin(string $loginlog_fechafin) Return Loginlog objects filtered by the loginlog_fechafin column
 * @method array findByLoginlogGeo(string $loginlog_geo) Return Loginlog objects filtered by the loginlog_geo column
 *
 * @package    propel.generator.feetcent_feetcenter.om
 */
abstract class BaseLoginlogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLoginlogQuery object.
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
            $modelName = 'Loginlog';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LoginlogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LoginlogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LoginlogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LoginlogQuery) {
            return $criteria;
        }
        $query = new LoginlogQuery(null, null, $modelAlias);

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
     * @return   Loginlog|Loginlog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LoginlogPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LoginlogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Loginlog A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdloginlog($key, $con = null)
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
     * @return                 Loginlog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idloginlog`, `idempleado`, `loginlog_fechainicio`, `loginlog_fechafin`, `loginlog_geo` FROM `loginlog` WHERE `idloginlog` = :p0';
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
            $obj = new Loginlog();
            $obj->hydrate($row);
            LoginlogPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Loginlog|Loginlog[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Loginlog[]|mixed the list of results, formatted by the current formatter
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
     * @return LoginlogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LoginlogPeer::IDLOGINLOG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LoginlogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LoginlogPeer::IDLOGINLOG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idloginlog column
     *
     * Example usage:
     * <code>
     * $query->filterByIdloginlog(1234); // WHERE idloginlog = 1234
     * $query->filterByIdloginlog(array(12, 34)); // WHERE idloginlog IN (12, 34)
     * $query->filterByIdloginlog(array('min' => 12)); // WHERE idloginlog >= 12
     * $query->filterByIdloginlog(array('max' => 12)); // WHERE idloginlog <= 12
     * </code>
     *
     * @param     mixed $idloginlog The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoginlogQuery The current query, for fluid interface
     */
    public function filterByIdloginlog($idloginlog = null, $comparison = null)
    {
        if (is_array($idloginlog)) {
            $useMinMax = false;
            if (isset($idloginlog['min'])) {
                $this->addUsingAlias(LoginlogPeer::IDLOGINLOG, $idloginlog['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idloginlog['max'])) {
                $this->addUsingAlias(LoginlogPeer::IDLOGINLOG, $idloginlog['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginlogPeer::IDLOGINLOG, $idloginlog, $comparison);
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
     * @param     mixed $idempleado The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoginlogQuery The current query, for fluid interface
     */
    public function filterByIdempleado($idempleado = null, $comparison = null)
    {
        if (is_array($idempleado)) {
            $useMinMax = false;
            if (isset($idempleado['min'])) {
                $this->addUsingAlias(LoginlogPeer::IDEMPLEADO, $idempleado['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idempleado['max'])) {
                $this->addUsingAlias(LoginlogPeer::IDEMPLEADO, $idempleado['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginlogPeer::IDEMPLEADO, $idempleado, $comparison);
    }

    /**
     * Filter the query on the loginlog_fechainicio column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginlogFechainicio('2011-03-14'); // WHERE loginlog_fechainicio = '2011-03-14'
     * $query->filterByLoginlogFechainicio('now'); // WHERE loginlog_fechainicio = '2011-03-14'
     * $query->filterByLoginlogFechainicio(array('max' => 'yesterday')); // WHERE loginlog_fechainicio < '2011-03-13'
     * </code>
     *
     * @param     mixed $loginlogFechainicio The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoginlogQuery The current query, for fluid interface
     */
    public function filterByLoginlogFechainicio($loginlogFechainicio = null, $comparison = null)
    {
        if (is_array($loginlogFechainicio)) {
            $useMinMax = false;
            if (isset($loginlogFechainicio['min'])) {
                $this->addUsingAlias(LoginlogPeer::LOGINLOG_FECHAINICIO, $loginlogFechainicio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($loginlogFechainicio['max'])) {
                $this->addUsingAlias(LoginlogPeer::LOGINLOG_FECHAINICIO, $loginlogFechainicio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginlogPeer::LOGINLOG_FECHAINICIO, $loginlogFechainicio, $comparison);
    }

    /**
     * Filter the query on the loginlog_fechafin column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginlogFechafin('2011-03-14'); // WHERE loginlog_fechafin = '2011-03-14'
     * $query->filterByLoginlogFechafin('now'); // WHERE loginlog_fechafin = '2011-03-14'
     * $query->filterByLoginlogFechafin(array('max' => 'yesterday')); // WHERE loginlog_fechafin < '2011-03-13'
     * </code>
     *
     * @param     mixed $loginlogFechafin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoginlogQuery The current query, for fluid interface
     */
    public function filterByLoginlogFechafin($loginlogFechafin = null, $comparison = null)
    {
        if (is_array($loginlogFechafin)) {
            $useMinMax = false;
            if (isset($loginlogFechafin['min'])) {
                $this->addUsingAlias(LoginlogPeer::LOGINLOG_FECHAFIN, $loginlogFechafin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($loginlogFechafin['max'])) {
                $this->addUsingAlias(LoginlogPeer::LOGINLOG_FECHAFIN, $loginlogFechafin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LoginlogPeer::LOGINLOG_FECHAFIN, $loginlogFechafin, $comparison);
    }

    /**
     * Filter the query on the loginlog_geo column
     *
     * Example usage:
     * <code>
     * $query->filterByLoginlogGeo('fooValue');   // WHERE loginlog_geo = 'fooValue'
     * $query->filterByLoginlogGeo('%fooValue%'); // WHERE loginlog_geo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $loginlogGeo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LoginlogQuery The current query, for fluid interface
     */
    public function filterByLoginlogGeo($loginlogGeo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($loginlogGeo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $loginlogGeo)) {
                $loginlogGeo = str_replace('*', '%', $loginlogGeo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LoginlogPeer::LOGINLOG_GEO, $loginlogGeo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Loginlog $loginlog Object to remove from the list of results
     *
     * @return LoginlogQuery The current query, for fluid interface
     */
    public function prune($loginlog = null)
    {
        if ($loginlog) {
            $this->addUsingAlias(LoginlogPeer::IDLOGINLOG, $loginlog->getIdloginlog(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
