<?php


/**
 * Base class that represents a query for the 'geobin_user' table.
 *
 *
 *
 * @method GeobinUserQuery orderById($order = Criteria::ASC) Order by the id column
 * @method GeobinUserQuery orderByMail($order = Criteria::ASC) Order by the mail column
 * @method GeobinUserQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method GeobinUserQuery orderByPwd($order = Criteria::ASC) Order by the pwd column
 * @method GeobinUserQuery orderByIsEnabled($order = Criteria::ASC) Order by the is_enabled column
 *
 * @method GeobinUserQuery groupById() Group by the id column
 * @method GeobinUserQuery groupByMail() Group by the mail column
 * @method GeobinUserQuery groupByUsername() Group by the username column
 * @method GeobinUserQuery groupByPwd() Group by the pwd column
 * @method GeobinUserQuery groupByIsEnabled() Group by the is_enabled column
 *
 * @method GeobinUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GeobinUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GeobinUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GeobinUserQuery leftJoinGeobin($relationAlias = null) Adds a LEFT JOIN clause to the query using the Geobin relation
 * @method GeobinUserQuery rightJoinGeobin($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Geobin relation
 * @method GeobinUserQuery innerJoinGeobin($relationAlias = null) Adds a INNER JOIN clause to the query using the Geobin relation
 *
 * @method GeobinUser findOne(PropelPDO $con = null) Return the first GeobinUser matching the query
 * @method GeobinUser findOneOrCreate(PropelPDO $con = null) Return the first GeobinUser matching the query, or a new GeobinUser object populated from the query conditions when no match is found
 *
 * @method GeobinUser findOneByMail(string $mail) Return the first GeobinUser filtered by the mail column
 * @method GeobinUser findOneByUsername(string $username) Return the first GeobinUser filtered by the username column
 * @method GeobinUser findOneByPwd(string $pwd) Return the first GeobinUser filtered by the pwd column
 * @method GeobinUser findOneByIsEnabled(string $is_enabled) Return the first GeobinUser filtered by the is_enabled column
 *
 * @method array findById(string $id) Return GeobinUser objects filtered by the id column
 * @method array findByMail(string $mail) Return GeobinUser objects filtered by the mail column
 * @method array findByUsername(string $username) Return GeobinUser objects filtered by the username column
 * @method array findByPwd(string $pwd) Return GeobinUser objects filtered by the pwd column
 * @method array findByIsEnabled(string $is_enabled) Return GeobinUser objects filtered by the is_enabled column
 *
 * @package    propel.generator.geobin.om
 */
abstract class BaseGeobinUserQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGeobinUserQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'geobin', $modelName = 'GeobinUser', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GeobinUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   GeobinUserQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GeobinUserQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GeobinUserQuery) {
            return $criteria;
        }
        $query = new GeobinUserQuery();
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
     * @return   GeobinUser|GeobinUser[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GeobinUserPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GeobinUserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 GeobinUser A model object, or null if the key is not found
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
     * @return                 GeobinUser A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `mail`, `username`, `pwd`, `is_enabled` FROM `geobin_user` WHERE `id` = :p0';
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
            $obj = new GeobinUser();
            $obj->hydrate($row);
            GeobinUserPeer::addInstanceToPool($obj, (string) $key);
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
     * @return GeobinUser|GeobinUser[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|GeobinUser[]|mixed the list of results, formatted by the current formatter
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
     * @return GeobinUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GeobinUserPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GeobinUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GeobinUserPeer::ID, $keys, Criteria::IN);
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
     * @return GeobinUserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GeobinUserPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GeobinUserPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeobinUserPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the mail column
     *
     * Example usage:
     * <code>
     * $query->filterByMail('fooValue');   // WHERE mail = 'fooValue'
     * $query->filterByMail('%fooValue%'); // WHERE mail LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mail The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinUserQuery The current query, for fluid interface
     */
    public function filterByMail($mail = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mail)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mail)) {
                $mail = str_replace('*', '%', $mail);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GeobinUserPeer::MAIL, $mail, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinUserQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GeobinUserPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the pwd column
     *
     * Example usage:
     * <code>
     * $query->filterByPwd('fooValue');   // WHERE pwd = 'fooValue'
     * $query->filterByPwd('%fooValue%'); // WHERE pwd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pwd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinUserQuery The current query, for fluid interface
     */
    public function filterByPwd($pwd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pwd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pwd)) {
                $pwd = str_replace('*', '%', $pwd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GeobinUserPeer::PWD, $pwd, $comparison);
    }

    /**
     * Filter the query on the is_enabled column
     *
     * Example usage:
     * <code>
     * $query->filterByIsEnabled('fooValue');   // WHERE is_enabled = 'fooValue'
     * $query->filterByIsEnabled('%fooValue%'); // WHERE is_enabled LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isEnabled The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinUserQuery The current query, for fluid interface
     */
    public function filterByIsEnabled($isEnabled = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isEnabled)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $isEnabled)) {
                $isEnabled = str_replace('*', '%', $isEnabled);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GeobinUserPeer::IS_ENABLED, $isEnabled, $comparison);
    }

    /**
     * Filter the query by a related Geobin object
     *
     * @param   Geobin|PropelObjectCollection $geobin  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GeobinUserQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGeobin($geobin, $comparison = null)
    {
        if ($geobin instanceof Geobin) {
            return $this
                ->addUsingAlias(GeobinUserPeer::ID, $geobin->getGeobinUserId(), $comparison);
        } elseif ($geobin instanceof PropelObjectCollection) {
            return $this
                ->useGeobinQuery()
                ->filterByPrimaryKeys($geobin->getPrimaryKeys())
                ->endUse();
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
     * @return GeobinUserQuery The current query, for fluid interface
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
     * @param   GeobinUser $geobinUser Object to remove from the list of results
     *
     * @return GeobinUserQuery The current query, for fluid interface
     */
    public function prune($geobinUser = null)
    {
        if ($geobinUser) {
            $this->addUsingAlias(GeobinUserPeer::ID, $geobinUser->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
