<?php


/**
 * Base class that represents a query for the 'hash' table.
 *
 *
 *
 * @method HashQuery orderById($order = Criteria::ASC) Order by the id column
 * @method HashQuery orderByUriHash($order = Criteria::ASC) Order by the uri_hash column
 * @method HashQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method HashQuery orderByModified($order = Criteria::ASC) Order by the modified column
 * @method HashQuery orderByIsLocked($order = Criteria::ASC) Order by the is_locked column
 * @method HashQuery orderByGeobinId($order = Criteria::ASC) Order by the geobin_id column
 * @method HashQuery orderByExpires($order = Criteria::ASC) Order by the expires column
 *
 * @method HashQuery groupById() Group by the id column
 * @method HashQuery groupByUriHash() Group by the uri_hash column
 * @method HashQuery groupByCreated() Group by the created column
 * @method HashQuery groupByModified() Group by the modified column
 * @method HashQuery groupByIsLocked() Group by the is_locked column
 * @method HashQuery groupByGeobinId() Group by the geobin_id column
 * @method HashQuery groupByExpires() Group by the expires column
 *
 * @method HashQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method HashQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method HashQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method HashQuery leftJoinGeobin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Geobin relation
 * @method HashQuery rightJoinGeobin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Geobin relation
 * @method HashQuery innerJoinGeobin($relationAlias = null) Adds a INNER JOIN clause to the query using the Geobin relation
 *
 * @method Hash findOne(PropelPDO $con = null) Return the first Hash matching the query
 * @method Hash findOneOrCreate(PropelPDO $con = null) Return the first Hash matching the query, or a new Hash object populated from the query conditions when no match is found
 *
 * @method Hash findOneByUriHash(string $uri_hash) Return the first Hash filtered by the uri_hash column
 * @method Hash findOneByCreated(string $created) Return the first Hash filtered by the created column
 * @method Hash findOneByModified(string $modified) Return the first Hash filtered by the modified column
 * @method Hash findOneByIsLocked(boolean $is_locked) Return the first Hash filtered by the is_locked column
 * @method Hash findOneByGeobinId(string $geobin_id) Return the first Hash filtered by the geobin_id column
 * @method Hash findOneByExpires(string $expires) Return the first Hash filtered by the expires column
 *
 * @method array findById(string $id) Return Hash objects filtered by the id column
 * @method array findByUriHash(string $uri_hash) Return Hash objects filtered by the uri_hash column
 * @method array findByCreated(string $created) Return Hash objects filtered by the created column
 * @method array findByModified(string $modified) Return Hash objects filtered by the modified column
 * @method array findByIsLocked(boolean $is_locked) Return Hash objects filtered by the is_locked column
 * @method array findByGeobinId(string $geobin_id) Return Hash objects filtered by the geobin_id column
 * @method array findByExpires(string $expires) Return Hash objects filtered by the expires column
 *
 * @package    propel.generator.geobin.om
 */
abstract class BaseHashQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseHashQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'geobin', $modelName = 'Hash', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new HashQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   HashQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return HashQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof HashQuery) {
            return $criteria;
        }
        $query = new HashQuery();
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
     * @return   Hash|Hash[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = HashPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(HashPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Hash A model object, or null if the key is not found
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
     * @return                 Hash A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `uri_hash`, `created`, `modified`, `is_locked`, `geobin_id`, `expires` FROM `hash` WHERE `id` = :p0';
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
            $obj = new Hash();
            $obj->hydrate($row);
            HashPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Hash|Hash[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Hash[]|mixed the list of results, formatted by the current formatter
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
     * @return HashQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(HashPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return HashQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(HashPeer::ID, $keys, Criteria::IN);
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
     * @return HashQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(HashPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(HashPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HashPeer::ID, $id, $comparison);
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
     * @return HashQuery The current query, for fluid interface
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

        return $this->addUsingAlias(HashPeer::URI_HASH, $uriHash, $comparison);
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
     * @return HashQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(HashPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(HashPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HashPeer::CREATED, $created, $comparison);
    }

    /**
     * Filter the query on the modified column
     *
     * Example usage:
     * <code>
     * $query->filterByModified('2011-03-14'); // WHERE modified = '2011-03-14'
     * $query->filterByModified('now'); // WHERE modified = '2011-03-14'
     * $query->filterByModified(array('max' => 'yesterday')); // WHERE modified > '2011-03-13'
     * </code>
     *
     * @param     mixed $modified The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HashQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(HashPeer::MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(HashPeer::MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HashPeer::MODIFIED, $modified, $comparison);
    }

    /**
     * Filter the query on the is_locked column
     *
     * Example usage:
     * <code>
     * $query->filterByIsLocked(true); // WHERE is_locked = true
     * $query->filterByIsLocked('yes'); // WHERE is_locked = true
     * </code>
     *
     * @param     boolean|string $isLocked The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HashQuery The current query, for fluid interface
     */
    public function filterByIsLocked($isLocked = null, $comparison = null)
    {
        if (is_string($isLocked)) {
            $isLocked = in_array(strtolower($isLocked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(HashPeer::IS_LOCKED, $isLocked, $comparison);
    }

    /**
     * Filter the query on the geobin_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGeobinId(1234); // WHERE geobin_id = 1234
     * $query->filterByGeobinId(array(12, 34)); // WHERE geobin_id IN (12, 34)
     * $query->filterByGeobinId(array('min' => 12)); // WHERE geobin_id >= 12
     * $query->filterByGeobinId(array('max' => 12)); // WHERE geobin_id <= 12
     * </code>
     *
     * @see       filterByGeobin()
     *
     * @param     mixed $geobinId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HashQuery The current query, for fluid interface
     */
    public function filterByGeobinId($geobinId = null, $comparison = null)
    {
        if (is_array($geobinId)) {
            $useMinMax = false;
            if (isset($geobinId['min'])) {
                $this->addUsingAlias(HashPeer::GEOBIN_ID, $geobinId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geobinId['max'])) {
                $this->addUsingAlias(HashPeer::GEOBIN_ID, $geobinId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HashPeer::GEOBIN_ID, $geobinId, $comparison);
    }

    /**
     * Filter the query on the expires column
     *
     * Example usage:
     * <code>
     * $query->filterByExpires('2011-03-14'); // WHERE expires = '2011-03-14'
     * $query->filterByExpires('now'); // WHERE expires = '2011-03-14'
     * $query->filterByExpires(array('max' => 'yesterday')); // WHERE expires > '2011-03-13'
     * </code>
     *
     * @param     mixed $expires The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return HashQuery The current query, for fluid interface
     */
    public function filterByExpires($expires = null, $comparison = null)
    {
        if (is_array($expires)) {
            $useMinMax = false;
            if (isset($expires['min'])) {
                $this->addUsingAlias(HashPeer::EXPIRES, $expires['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expires['max'])) {
                $this->addUsingAlias(HashPeer::EXPIRES, $expires['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(HashPeer::EXPIRES, $expires, $comparison);
    }

    /**
     * Filter the query by a related Geobin object
     *
     * @param   Geobin|PropelObjectCollection $geobin The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 HashQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGeobin($geobin, $comparison = null)
    {
        if ($geobin instanceof Geobin) {
            return $this
                ->addUsingAlias(HashPeer::GEOBIN_ID, $geobin->getId(), $comparison);
        } elseif ($geobin instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(HashPeer::GEOBIN_ID, $geobin->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGeobin() only accepts arguments of type Geobin or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Geobin relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return HashQuery The current query, for fluid interface
     */
    public function joinGeobin($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Geobin');

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
            $this->addJoinObject($join, 'Geobin');
        }

        return $this;
    }

    /**
     * Use the Geobin relation Geobin object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   GeobinQuery A secondary query class using the current class as primary query
     */
    public function useGeobinQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGeobin($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Geobin', 'GeobinQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Hash $hash Object to remove from the list of results
     *
     * @return HashQuery The current query, for fluid interface
     */
    public function prune($hash = null)
    {
        if ($hash) {
            $this->addUsingAlias(HashPeer::ID, $hash->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
