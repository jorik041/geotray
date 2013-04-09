<?php


/**
 * Base class that represents a query for the 'geobin' table.
 *
 *
 *
 * @method GeobinQuery orderById($order = Criteria::ASC) Order by the id column
 * @method GeobinQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method GeobinQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method GeobinQuery orderByIsVisible($order = Criteria::ASC) Order by the is_visible column
 * @method GeobinQuery orderByIpaddress($order = Criteria::ASC) Order by the ipaddress column
 * @method GeobinQuery orderByCenterLat($order = Criteria::ASC) Order by the center_lat column
 * @method GeobinQuery orderByCenterLng($order = Criteria::ASC) Order by the center_lng column
 * @method GeobinQuery orderByZoomlevel($order = Criteria::ASC) Order by the zoomlevel column
 * @method GeobinQuery orderByGeobinUserId($order = Criteria::ASC) Order by the geobin_user_id column
 * @method GeobinQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method GeobinQuery orderByModified($order = Criteria::ASC) Order by the modified column
 *
 * @method GeobinQuery groupById() Group by the id column
 * @method GeobinQuery groupByTitle() Group by the title column
 * @method GeobinQuery groupByDescription() Group by the description column
 * @method GeobinQuery groupByIsVisible() Group by the is_visible column
 * @method GeobinQuery groupByIpaddress() Group by the ipaddress column
 * @method GeobinQuery groupByCenterLat() Group by the center_lat column
 * @method GeobinQuery groupByCenterLng() Group by the center_lng column
 * @method GeobinQuery groupByZoomlevel() Group by the zoomlevel column
 * @method GeobinQuery groupByGeobinUserId() Group by the geobin_user_id column
 * @method GeobinQuery groupByCreated() Group by the created column
 * @method GeobinQuery groupByModified() Group by the modified column
 *
 * @method GeobinQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GeobinQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GeobinQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GeobinQuery leftJoinGeobinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the GeobinUser relation
 * @method GeobinQuery rightJoinGeobinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GeobinUser relation
 * @method GeobinQuery innerJoinGeobinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the GeobinUser relation
 *
 * @method GeobinQuery leftJoinHash($relationAlias = null) Adds a LEFT JOIN clause to the query using the Hash relation
 * @method GeobinQuery rightJoinHash($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Hash relation
 * @method GeobinQuery innerJoinHash($relationAlias = null) Adds a INNER JOIN clause to the query using the Hash relation
 *
 * @method GeobinQuery leftJoinPosition($relationAlias = null) Adds a LEFT JOIN clause to the query using the Position relation
 * @method GeobinQuery rightJoinPosition($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Position relation
 * @method GeobinQuery innerJoinPosition($relationAlias = null) Adds a INNER JOIN clause to the query using the Position relation
 *
 * @method Geobin findOne(PropelPDO $con = null) Return the first Geobin matching the query
 * @method Geobin findOneOrCreate(PropelPDO $con = null) Return the first Geobin matching the query, or a new Geobin object populated from the query conditions when no match is found
 *
 * @method Geobin findOneByTitle(string $title) Return the first Geobin filtered by the title column
 * @method Geobin findOneByDescription(string $description) Return the first Geobin filtered by the description column
 * @method Geobin findOneByIsVisible(boolean $is_visible) Return the first Geobin filtered by the is_visible column
 * @method Geobin findOneByIpaddress(string $ipaddress) Return the first Geobin filtered by the ipaddress column
 * @method Geobin findOneByCenterLat(double $center_lat) Return the first Geobin filtered by the center_lat column
 * @method Geobin findOneByCenterLng(double $center_lng) Return the first Geobin filtered by the center_lng column
 * @method Geobin findOneByZoomlevel(int $zoomlevel) Return the first Geobin filtered by the zoomlevel column
 * @method Geobin findOneByGeobinUserId(string $geobin_user_id) Return the first Geobin filtered by the geobin_user_id column
 * @method Geobin findOneByCreated(string $created) Return the first Geobin filtered by the created column
 * @method Geobin findOneByModified(string $modified) Return the first Geobin filtered by the modified column
 *
 * @method array findById(string $id) Return Geobin objects filtered by the id column
 * @method array findByTitle(string $title) Return Geobin objects filtered by the title column
 * @method array findByDescription(string $description) Return Geobin objects filtered by the description column
 * @method array findByIsVisible(boolean $is_visible) Return Geobin objects filtered by the is_visible column
 * @method array findByIpaddress(string $ipaddress) Return Geobin objects filtered by the ipaddress column
 * @method array findByCenterLat(double $center_lat) Return Geobin objects filtered by the center_lat column
 * @method array findByCenterLng(double $center_lng) Return Geobin objects filtered by the center_lng column
 * @method array findByZoomlevel(int $zoomlevel) Return Geobin objects filtered by the zoomlevel column
 * @method array findByGeobinUserId(string $geobin_user_id) Return Geobin objects filtered by the geobin_user_id column
 * @method array findByCreated(string $created) Return Geobin objects filtered by the created column
 * @method array findByModified(string $modified) Return Geobin objects filtered by the modified column
 *
 * @package    propel.generator.geobin.om
 */
abstract class BaseGeobinQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGeobinQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'geobin', $modelName = 'Geobin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GeobinQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   GeobinQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GeobinQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GeobinQuery) {
            return $criteria;
        }
        $query = new GeobinQuery();
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
     * @return   Geobin|Geobin[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GeobinPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GeobinPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Geobin A model object, or null if the key is not found
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
     * @return                 Geobin A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `title`, `description`, `is_visible`, `ipaddress`, `center_lat`, `center_lng`, `zoomlevel`, `geobin_user_id`, `created`, `modified` FROM `geobin` WHERE `id` = :p0';
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
            $obj = new Geobin();
            $obj->hydrate($row);
            GeobinPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Geobin|Geobin[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Geobin[]|mixed the list of results, formatted by the current formatter
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
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GeobinPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GeobinPeer::ID, $keys, Criteria::IN);
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
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(GeobinPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(GeobinPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeobinPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GeobinPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GeobinPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the is_visible column
     *
     * Example usage:
     * <code>
     * $query->filterByIsVisible(true); // WHERE is_visible = true
     * $query->filterByIsVisible('yes'); // WHERE is_visible = true
     * </code>
     *
     * @param     boolean|string $isVisible The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByIsVisible($isVisible = null, $comparison = null)
    {
        if (is_string($isVisible)) {
            $isVisible = in_array(strtolower($isVisible), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(GeobinPeer::IS_VISIBLE, $isVisible, $comparison);
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
     * @return GeobinQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GeobinPeer::IPADDRESS, $ipaddress, $comparison);
    }

    /**
     * Filter the query on the center_lat column
     *
     * Example usage:
     * <code>
     * $query->filterByCenterLat(1234); // WHERE center_lat = 1234
     * $query->filterByCenterLat(array(12, 34)); // WHERE center_lat IN (12, 34)
     * $query->filterByCenterLat(array('min' => 12)); // WHERE center_lat >= 12
     * $query->filterByCenterLat(array('max' => 12)); // WHERE center_lat <= 12
     * </code>
     *
     * @param     mixed $centerLat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByCenterLat($centerLat = null, $comparison = null)
    {
        if (is_array($centerLat)) {
            $useMinMax = false;
            if (isset($centerLat['min'])) {
                $this->addUsingAlias(GeobinPeer::CENTER_LAT, $centerLat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($centerLat['max'])) {
                $this->addUsingAlias(GeobinPeer::CENTER_LAT, $centerLat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeobinPeer::CENTER_LAT, $centerLat, $comparison);
    }

    /**
     * Filter the query on the center_lng column
     *
     * Example usage:
     * <code>
     * $query->filterByCenterLng(1234); // WHERE center_lng = 1234
     * $query->filterByCenterLng(array(12, 34)); // WHERE center_lng IN (12, 34)
     * $query->filterByCenterLng(array('min' => 12)); // WHERE center_lng >= 12
     * $query->filterByCenterLng(array('max' => 12)); // WHERE center_lng <= 12
     * </code>
     *
     * @param     mixed $centerLng The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByCenterLng($centerLng = null, $comparison = null)
    {
        if (is_array($centerLng)) {
            $useMinMax = false;
            if (isset($centerLng['min'])) {
                $this->addUsingAlias(GeobinPeer::CENTER_LNG, $centerLng['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($centerLng['max'])) {
                $this->addUsingAlias(GeobinPeer::CENTER_LNG, $centerLng['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeobinPeer::CENTER_LNG, $centerLng, $comparison);
    }

    /**
     * Filter the query on the zoomlevel column
     *
     * Example usage:
     * <code>
     * $query->filterByZoomlevel(1234); // WHERE zoomlevel = 1234
     * $query->filterByZoomlevel(array(12, 34)); // WHERE zoomlevel IN (12, 34)
     * $query->filterByZoomlevel(array('min' => 12)); // WHERE zoomlevel >= 12
     * $query->filterByZoomlevel(array('max' => 12)); // WHERE zoomlevel <= 12
     * </code>
     *
     * @param     mixed $zoomlevel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByZoomlevel($zoomlevel = null, $comparison = null)
    {
        if (is_array($zoomlevel)) {
            $useMinMax = false;
            if (isset($zoomlevel['min'])) {
                $this->addUsingAlias(GeobinPeer::ZOOMLEVEL, $zoomlevel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($zoomlevel['max'])) {
                $this->addUsingAlias(GeobinPeer::ZOOMLEVEL, $zoomlevel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeobinPeer::ZOOMLEVEL, $zoomlevel, $comparison);
    }

    /**
     * Filter the query on the geobin_user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGeobinUserId(1234); // WHERE geobin_user_id = 1234
     * $query->filterByGeobinUserId(array(12, 34)); // WHERE geobin_user_id IN (12, 34)
     * $query->filterByGeobinUserId(array('min' => 12)); // WHERE geobin_user_id >= 12
     * $query->filterByGeobinUserId(array('max' => 12)); // WHERE geobin_user_id <= 12
     * </code>
     *
     * @see       filterByGeobinUser()
     *
     * @param     mixed $geobinUserId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByGeobinUserId($geobinUserId = null, $comparison = null)
    {
        if (is_array($geobinUserId)) {
            $useMinMax = false;
            if (isset($geobinUserId['min'])) {
                $this->addUsingAlias(GeobinPeer::GEOBIN_USER_ID, $geobinUserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($geobinUserId['max'])) {
                $this->addUsingAlias(GeobinPeer::GEOBIN_USER_ID, $geobinUserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeobinPeer::GEOBIN_USER_ID, $geobinUserId, $comparison);
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
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByCreated($created = null, $comparison = null)
    {
        if (is_array($created)) {
            $useMinMax = false;
            if (isset($created['min'])) {
                $this->addUsingAlias(GeobinPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($created['max'])) {
                $this->addUsingAlias(GeobinPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeobinPeer::CREATED, $created, $comparison);
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
     * @return GeobinQuery The current query, for fluid interface
     */
    public function filterByModified($modified = null, $comparison = null)
    {
        if (is_array($modified)) {
            $useMinMax = false;
            if (isset($modified['min'])) {
                $this->addUsingAlias(GeobinPeer::MODIFIED, $modified['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modified['max'])) {
                $this->addUsingAlias(GeobinPeer::MODIFIED, $modified['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeobinPeer::MODIFIED, $modified, $comparison);
    }

    /**
     * Filter the query by a related GeobinUser object
     *
     * @param   GeobinUser|PropelObjectCollection $geobinUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GeobinQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGeobinUser($geobinUser, $comparison = null)
    {
        if ($geobinUser instanceof GeobinUser) {
            return $this
                ->addUsingAlias(GeobinPeer::GEOBIN_USER_ID, $geobinUser->getId(), $comparison);
        } elseif ($geobinUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GeobinPeer::GEOBIN_USER_ID, $geobinUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGeobinUser() only accepts arguments of type GeobinUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GeobinUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function joinGeobinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GeobinUser');

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
            $this->addJoinObject($join, 'GeobinUser');
        }

        return $this;
    }

    /**
     * Use the GeobinUser relation GeobinUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   GeobinUserQuery A secondary query class using the current class as primary query
     */
    public function useGeobinUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGeobinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GeobinUser', 'GeobinUserQuery');
    }

    /**
     * Filter the query by a related Hash object
     *
     * @param   Hash|PropelObjectCollection $hash  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GeobinQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByHash($hash, $comparison = null)
    {
        if ($hash instanceof Hash) {
            return $this
                ->addUsingAlias(GeobinPeer::ID, $hash->getGeobinId(), $comparison);
        } elseif ($hash instanceof PropelObjectCollection) {
            return $this
                ->useHashQuery()
                ->filterByPrimaryKeys($hash->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByHash() only accepts arguments of type Hash or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Hash relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function joinHash($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Hash');

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
            $this->addJoinObject($join, 'Hash');
        }

        return $this;
    }

    /**
     * Use the Hash relation Hash object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   HashQuery A secondary query class using the current class as primary query
     */
    public function useHashQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinHash($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Hash', 'HashQuery');
    }

    /**
     * Filter the query by a related Position object
     *
     * @param   Position|PropelObjectCollection $position  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GeobinQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPosition($position, $comparison = null)
    {
        if ($position instanceof Position) {
            return $this
                ->addUsingAlias(GeobinPeer::ID, $position->getGeobinId(), $comparison);
        } elseif ($position instanceof PropelObjectCollection) {
            return $this
                ->usePositionQuery()
                ->filterByPrimaryKeys($position->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPosition() only accepts arguments of type Position or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Position relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function joinPosition($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Position');

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
            $this->addJoinObject($join, 'Position');
        }

        return $this;
    }

    /**
     * Use the Position relation Position object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PositionQuery A secondary query class using the current class as primary query
     */
    public function usePositionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPosition($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Position', 'PositionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Geobin $geobin Object to remove from the list of results
     *
     * @return GeobinQuery The current query, for fluid interface
     */
    public function prune($geobin = null)
    {
        if ($geobin) {
            $this->addUsingAlias(GeobinPeer::ID, $geobin->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
