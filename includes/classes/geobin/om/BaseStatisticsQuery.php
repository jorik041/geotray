<?php


/**
 * Base class that represents a query for the 'statistics' table.
 *
 *
 *
 * @method StatisticsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method StatisticsQuery orderByIpaddress($order = Criteria::ASC) Order by the ipaddress column
 * @method StatisticsQuery orderByUriHash($order = Criteria::ASC) Order by the uri_hash column
 * @method StatisticsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 *
 * @method StatisticsQuery groupById() Group by the id column
 * @method StatisticsQuery groupByIpaddress() Group by the ipaddress column
 * @method StatisticsQuery groupByUriHash() Group by the uri_hash column
 * @method StatisticsQuery groupByCreated() Group by the created column
 *
 * @method StatisticsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StatisticsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StatisticsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Statistics findOne(PropelPDO $con = null) Return the first Statistics matching the query
 * @method Statistics findOneOrCreate(PropelPDO $con = null) Return the first Statistics matching the query, or a new Statistics object populated from the query conditions when no match is found
 *
 * @method Statistics findOneByIpaddress(string $ipaddress) Return the first Statistics filtered by the ipaddress column
 * @method Statistics findOneByUriHash(string $uri_hash) Return the first Statistics filtered by the uri_hash column
 * @method Statistics findOneByCreated(string $created) Return the first Statistics filtered by the created column
 *
 * @method array findById(string $id) Return Statistics objects filtered by the id column
 * @method array findByIpaddress(string $ipaddress) Return Statistics objects filtered by the ipaddress column
 * @method array findByUriHash(string $uri_hash) Return Statistics objects filtered by the uri_hash column
 * @method array findByCreated(string $created) Return Statistics objects filtered by the created column
 *
 * @package    propel.generator.geobin.om
 */
abstract class BaseStatisticsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStatisticsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'geobin', $modelName = 'Statistics', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StatisticsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StatisticsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StatisticsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StatisticsQuery) {
            return $criteria;
        }
        $query = new StatisticsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
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
     * @return   Statistics|Statistics[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StatisticsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StatisticsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Statistics A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
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
     * @return                 Statistics A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `ipaddress`, `uri_hash`, `created` FROM `statistics` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Statistics();
            $obj->hydrate($row);
            StatisticsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Statistics|Statistics[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Statistics[]|mixed the list of results, formatted by the current formatter
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
     * @return StatisticsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StatisticsPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StatisticsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StatisticsPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StatisticsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StatisticsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StatisticsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatisticsPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the ipaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByIpaddress('fooValue');   // WHERE ipaddress = 'fooValue'
     * $query->filterByIpaddress('%fooValue%'); // WHERE ipaddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipaddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StatisticsQuery The current query, for fluid interface
     */
    public function filterByIpaddress($ipaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipaddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipaddress)) {
                $ipaddress = str_replace('*', '%', $ipaddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StatisticsPeer::IPADDRESS, $ipaddress, $comparison);
    }

    /**
     * Filter the query on the uri_hash column
     *
     * Example usage:
     * <code>
     * $query->filterByUriHash('fooValue');   // WHERE uri_hash = 'fooValue'
     * $query->filterByUriHash('%fooValue%'); // WHERE uri_hash LIKE '%fooValue%'
     * </code>
     *
     * @param     string $uriHash The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StatisticsQuery The current query, for fluid interface
     */
    public function filterByUriHash($uriHash = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($uriHash)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $uriHash)) {
                $uriHash = str_replace('*', '%', $uriHash);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StatisticsPeer::URI_HASH, $uriHash, $comparison);
    }

    /**
     * Filter the query on the created column
     *
     * Example usage:
     * <code>
     * $query->filterByCreated('2011-03-14'); // WHERE created = '2011-03-14'
     * $query->filterByCreated('now'); // WHERE created = '2011-03-14'
     * $query->filterByCreated(array('max' => 'yesterday')); // WHERE created > '2011-03-13'
     * </code>
     *
     * @param     mixed $created The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StatisticsQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(StatisticsPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(StatisticsPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatisticsPeer::CREATED, $created, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Statistics $statistics Object to remove from the list of results
     *
     * @return StatisticsQuery The current query, for fluid interface
     */
    public function prune($statistics = null)
    {
        if ($statistics) {
            $this->addUsingAlias(StatisticsPeer::ID, $statistics->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
