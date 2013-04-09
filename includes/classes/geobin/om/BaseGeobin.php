<?php


/**
 * Base class that represents a row from the 'geobin' table.
 *
 *
 *
 * @package    propel.generator.geobin.om
 */
abstract class BaseGeobin extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'GeobinPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        GeobinPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        string
     */
    protected $id;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the description field.
     * @var        string
     */
    protected $description;

    /**
     * The value for the is_visible field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $is_visible;

    /**
     * The value for the ipaddress field.
     * @var        string
     */
    protected $ipaddress;

    /**
     * The value for the center_lat field.
     * @var        double
     */
    protected $center_lat;

    /**
     * The value for the center_lng field.
     * @var        double
     */
    protected $center_lng;

    /**
     * The value for the zoomlevel field.
     * @var        int
     */
    protected $zoomlevel;

    /**
     * The value for the geobin_user_id field.
     * @var        string
     */
    protected $geobin_user_id;

    /**
     * The value for the created field.
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        string
     */
    protected $created;

    /**
     * The value for the modified field.
     * @var        string
     */
    protected $modified;

    /**
     * @var        GeobinUser
     */
    protected $aGeobinUser;

    /**
     * @var        PropelObjectCollection|Hash[] Collection to store aggregation of Hash objects.
     */
    protected $collHashs;
    protected $collHashsPartial;

    /**
     * @var        PropelObjectCollection|Position[] Collection to store aggregation of Position objects.
     */
    protected $collPositions;
    protected $collPositionsPartial;

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
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $hashsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $positionsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->is_visible = true;
    }

    /**
     * Initializes internal state of BaseGeobin object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [description] column value.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the [is_visible] column value.
     *
     * @return boolean
     */
    public function getIsVisible()
    {
        return $this->is_visible;
    }

    /**
     * Get the [ipaddress] column value.
     *
     * @return string
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    /**
     * Get the [center_lat] column value.
     *
     * @return double
     */
    public function getCenterLat()
    {
        return $this->center_lat;
    }

    /**
     * Get the [center_lng] column value.
     *
     * @return double
     */
    public function getCenterLng()
    {
        return $this->center_lng;
    }

    /**
     * Get the [zoomlevel] column value.
     *
     * @return int
     */
    public function getZoomlevel()
    {
        return $this->zoomlevel;
    }

    /**
     * Get the [geobin_user_id] column value.
     *
     * @return string
     */
    public function getGeobinUserId()
    {
        return $this->geobin_user_id;
    }

    /**
     * Get the [optionally formatted] temporal [created] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreated($format = 'Y-m-d H:i:s')
    {
        if ($this->created === null) {
            return null;
        }

        if ($this->created === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created, true), $x);
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
     * Get the [optionally formatted] temporal [modified] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getModified($format = 'Y-m-d H:i:s')
    {
        if ($this->modified === null) {
            return null;
        }

        if ($this->modified === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->modified);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->modified, true), $x);
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
     * Set the value of [id] column.
     *
     * @param string $v new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = GeobinPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [title] column.
     *
     * @param string $v new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = GeobinPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [description] column.
     *
     * @param string $v new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setDescription($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->description !== $v) {
            $this->description = $v;
            $this->modifiedColumns[] = GeobinPeer::DESCRIPTION;
        }


        return $this;
    } // setDescription()

    /**
     * Sets the value of the [is_visible] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setIsVisible($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean) $v;
            }
        }

        if ($this->is_visible !== $v) {
            $this->is_visible = $v;
            $this->modifiedColumns[] = GeobinPeer::IS_VISIBLE;
        }


        return $this;
    } // setIsVisible()

    /**
     * Set the value of [ipaddress] column.
     *
     * @param string $v new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setIpaddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ipaddress !== $v) {
            $this->ipaddress = $v;
            $this->modifiedColumns[] = GeobinPeer::IPADDRESS;
        }


        return $this;
    } // setIpaddress()

    /**
     * Set the value of [center_lat] column.
     *
     * @param double $v new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setCenterLat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->center_lat !== $v) {
            $this->center_lat = $v;
            $this->modifiedColumns[] = GeobinPeer::CENTER_LAT;
        }


        return $this;
    } // setCenterLat()

    /**
     * Set the value of [center_lng] column.
     *
     * @param double $v new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setCenterLng($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (double) $v;
        }

        if ($this->center_lng !== $v) {
            $this->center_lng = $v;
            $this->modifiedColumns[] = GeobinPeer::CENTER_LNG;
        }


        return $this;
    } // setCenterLng()

    /**
     * Set the value of [zoomlevel] column.
     *
     * @param int $v new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setZoomlevel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->zoomlevel !== $v) {
            $this->zoomlevel = $v;
            $this->modifiedColumns[] = GeobinPeer::ZOOMLEVEL;
        }


        return $this;
    } // setZoomlevel()

    /**
     * Set the value of [geobin_user_id] column.
     *
     * @param string $v new value
     * @return Geobin The current object (for fluent API support)
     */
    public function setGeobinUserId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->geobin_user_id !== $v) {
            $this->geobin_user_id = $v;
            $this->modifiedColumns[] = GeobinPeer::GEOBIN_USER_ID;
        }

        if ($this->aGeobinUser !== null && $this->aGeobinUser->getId() !== $v) {
            $this->aGeobinUser = null;
        }


        return $this;
    } // setGeobinUserId()

    /**
     * Sets the value of [created] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Geobin The current object (for fluent API support)
     */
    public function setCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created !== null || $dt !== null) {
            $currentDateAsString = ($this->created !== null && $tmpDt = new DateTime($this->created)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created = $newDateAsString;
                $this->modifiedColumns[] = GeobinPeer::CREATED;
            }
        } // if either are not null


        return $this;
    } // setCreated()

    /**
     * Sets the value of [modified] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Geobin The current object (for fluent API support)
     */
    public function setModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modified !== null || $dt !== null) {
            $currentDateAsString = ($this->modified !== null && $tmpDt = new DateTime($this->modified)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modified = $newDateAsString;
                $this->modifiedColumns[] = GeobinPeer::MODIFIED;
            }
        } // if either are not null


        return $this;
    } // setModified()

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
            if ($this->is_visible !== true) {
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
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->title = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->is_visible = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
            $this->ipaddress = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->center_lat = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
            $this->center_lng = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
            $this->zoomlevel = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->geobin_user_id = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->created = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->modified = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = GeobinPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Geobin object", $e);
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

        if ($this->aGeobinUser !== null && $this->geobin_user_id !== $this->aGeobinUser->getId()) {
            $this->aGeobinUser = null;
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
            $con = Propel::getConnection(GeobinPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = GeobinPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aGeobinUser = null;
            $this->collHashs = null;

            $this->collPositions = null;

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
            $con = Propel::getConnection(GeobinPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = GeobinQuery::create()
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
            $con = Propel::getConnection(GeobinPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                GeobinPeer::addInstanceToPool($this);
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
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aGeobinUser !== null) {
                if ($this->aGeobinUser->isModified() || $this->aGeobinUser->isNew()) {
                    $affectedRows += $this->aGeobinUser->save($con);
                }
                $this->setGeobinUser($this->aGeobinUser);
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

            if ($this->hashsScheduledForDeletion !== null) {
                if (!$this->hashsScheduledForDeletion->isEmpty()) {
                    HashQuery::create()
                        ->filterByPrimaryKeys($this->hashsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hashsScheduledForDeletion = null;
                }
            }

            if ($this->collHashs !== null) {
                foreach ($this->collHashs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->positionsScheduledForDeletion !== null) {
                if (!$this->positionsScheduledForDeletion->isEmpty()) {
                    PositionQuery::create()
                        ->filterByPrimaryKeys($this->positionsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->positionsScheduledForDeletion = null;
                }
            }

            if ($this->collPositions !== null) {
                foreach ($this->collPositions as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[] = GeobinPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . GeobinPeer::ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(GeobinPeer::ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(GeobinPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(GeobinPeer::DESCRIPTION)) {
            $modifiedColumns[':p' . $index++]  = '`description`';
        }
        if ($this->isColumnModified(GeobinPeer::IS_VISIBLE)) {
            $modifiedColumns[':p' . $index++]  = '`is_visible`';
        }
        if ($this->isColumnModified(GeobinPeer::IPADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`ipaddress`';
        }
        if ($this->isColumnModified(GeobinPeer::CENTER_LAT)) {
            $modifiedColumns[':p' . $index++]  = '`center_lat`';
        }
        if ($this->isColumnModified(GeobinPeer::CENTER_LNG)) {
            $modifiedColumns[':p' . $index++]  = '`center_lng`';
        }
        if ($this->isColumnModified(GeobinPeer::ZOOMLEVEL)) {
            $modifiedColumns[':p' . $index++]  = '`zoomlevel`';
        }
        if ($this->isColumnModified(GeobinPeer::GEOBIN_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`geobin_user_id`';
        }
        if ($this->isColumnModified(GeobinPeer::CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`created`';
        }
        if ($this->isColumnModified(GeobinPeer::MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = '`modified`';
        }

        $sql = sprintf(
            'INSERT INTO `geobin` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_STR);
                        break;
                    case '`title`':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`description`':
                        $stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
                        break;
                    case '`is_visible`':
                        $stmt->bindValue($identifier, (int) $this->is_visible, PDO::PARAM_INT);
                        break;
                    case '`ipaddress`':
                        $stmt->bindValue($identifier, $this->ipaddress, PDO::PARAM_STR);
                        break;
                    case '`center_lat`':
                        $stmt->bindValue($identifier, $this->center_lat, PDO::PARAM_STR);
                        break;
                    case '`center_lng`':
                        $stmt->bindValue($identifier, $this->center_lng, PDO::PARAM_STR);
                        break;
                    case '`zoomlevel`':
                        $stmt->bindValue($identifier, $this->zoomlevel, PDO::PARAM_INT);
                        break;
                    case '`geobin_user_id`':
                        $stmt->bindValue($identifier, $this->geobin_user_id, PDO::PARAM_STR);
                        break;
                    case '`created`':
                        $stmt->bindValue($identifier, $this->created, PDO::PARAM_STR);
                        break;
                    case '`modified`':
                        $stmt->bindValue($identifier, $this->modified, PDO::PARAM_STR);
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
        $this->setId($pk);

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
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aGeobinUser !== null) {
                if (!$this->aGeobinUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aGeobinUser->getValidationFailures());
                }
            }


            if (($retval = GeobinPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collHashs !== null) {
                    foreach ($this->collHashs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPositions !== null) {
                    foreach ($this->collPositions as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
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
        $pos = GeobinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getId();
                break;
            case 1:
                return $this->getTitle();
                break;
            case 2:
                return $this->getDescription();
                break;
            case 3:
                return $this->getIsVisible();
                break;
            case 4:
                return $this->getIpaddress();
                break;
            case 5:
                return $this->getCenterLat();
                break;
            case 6:
                return $this->getCenterLng();
                break;
            case 7:
                return $this->getZoomlevel();
                break;
            case 8:
                return $this->getGeobinUserId();
                break;
            case 9:
                return $this->getCreated();
                break;
            case 10:
                return $this->getModified();
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
        if (isset($alreadyDumpedObjects['Geobin'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Geobin'][$this->getPrimaryKey()] = true;
        $keys = GeobinPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getDescription(),
            $keys[3] => $this->getIsVisible(),
            $keys[4] => $this->getIpaddress(),
            $keys[5] => $this->getCenterLat(),
            $keys[6] => $this->getCenterLng(),
            $keys[7] => $this->getZoomlevel(),
            $keys[8] => $this->getGeobinUserId(),
            $keys[9] => $this->getCreated(),
            $keys[10] => $this->getModified(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aGeobinUser) {
                $result['GeobinUser'] = $this->aGeobinUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collHashs) {
                $result['Hashs'] = $this->collHashs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPositions) {
                $result['Positions'] = $this->collPositions->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = GeobinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setId($value);
                break;
            case 1:
                $this->setTitle($value);
                break;
            case 2:
                $this->setDescription($value);
                break;
            case 3:
                $this->setIsVisible($value);
                break;
            case 4:
                $this->setIpaddress($value);
                break;
            case 5:
                $this->setCenterLat($value);
                break;
            case 6:
                $this->setCenterLng($value);
                break;
            case 7:
                $this->setZoomlevel($value);
                break;
            case 8:
                $this->setGeobinUserId($value);
                break;
            case 9:
                $this->setCreated($value);
                break;
            case 10:
                $this->setModified($value);
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
        $keys = GeobinPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setIsVisible($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIpaddress($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCenterLat($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCenterLng($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setZoomlevel($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setGeobinUserId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreated($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setModified($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(GeobinPeer::DATABASE_NAME);

        if ($this->isColumnModified(GeobinPeer::ID)) $criteria->add(GeobinPeer::ID, $this->id);
        if ($this->isColumnModified(GeobinPeer::TITLE)) $criteria->add(GeobinPeer::TITLE, $this->title);
        if ($this->isColumnModified(GeobinPeer::DESCRIPTION)) $criteria->add(GeobinPeer::DESCRIPTION, $this->description);
        if ($this->isColumnModified(GeobinPeer::IS_VISIBLE)) $criteria->add(GeobinPeer::IS_VISIBLE, $this->is_visible);
        if ($this->isColumnModified(GeobinPeer::IPADDRESS)) $criteria->add(GeobinPeer::IPADDRESS, $this->ipaddress);
        if ($this->isColumnModified(GeobinPeer::CENTER_LAT)) $criteria->add(GeobinPeer::CENTER_LAT, $this->center_lat);
        if ($this->isColumnModified(GeobinPeer::CENTER_LNG)) $criteria->add(GeobinPeer::CENTER_LNG, $this->center_lng);
        if ($this->isColumnModified(GeobinPeer::ZOOMLEVEL)) $criteria->add(GeobinPeer::ZOOMLEVEL, $this->zoomlevel);
        if ($this->isColumnModified(GeobinPeer::GEOBIN_USER_ID)) $criteria->add(GeobinPeer::GEOBIN_USER_ID, $this->geobin_user_id);
        if ($this->isColumnModified(GeobinPeer::CREATED)) $criteria->add(GeobinPeer::CREATED, $this->created);
        if ($this->isColumnModified(GeobinPeer::MODIFIED)) $criteria->add(GeobinPeer::MODIFIED, $this->modified);

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
        $criteria = new Criteria(GeobinPeer::DATABASE_NAME);
        $criteria->add(GeobinPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Geobin (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setDescription($this->getDescription());
        $copyObj->setIsVisible($this->getIsVisible());
        $copyObj->setIpaddress($this->getIpaddress());
        $copyObj->setCenterLat($this->getCenterLat());
        $copyObj->setCenterLng($this->getCenterLng());
        $copyObj->setZoomlevel($this->getZoomlevel());
        $copyObj->setGeobinUserId($this->getGeobinUserId());
        $copyObj->setCreated($this->getCreated());
        $copyObj->setModified($this->getModified());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getHashs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHash($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPositions() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPosition($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Geobin Clone of current object.
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
     * @return GeobinPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new GeobinPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a GeobinUser object.
     *
     * @param             GeobinUser $v
     * @return Geobin The current object (for fluent API support)
     * @throws PropelException
     */
    public function setGeobinUser(GeobinUser $v = null)
    {
        if ($v === null) {
            $this->setGeobinUserId(NULL);
        } else {
            $this->setGeobinUserId($v->getId());
        }

        $this->aGeobinUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the GeobinUser object, it will not be re-added.
        if ($v !== null) {
            $v->addGeobin($this);
        }


        return $this;
    }


    /**
     * Get the associated GeobinUser object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return GeobinUser The associated GeobinUser object.
     * @throws PropelException
     */
    public function getGeobinUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aGeobinUser === null && (($this->geobin_user_id !== "" && $this->geobin_user_id !== null)) && $doQuery) {
            $this->aGeobinUser = GeobinUserQuery::create()->findPk($this->geobin_user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aGeobinUser->addGeobins($this);
             */
        }

        return $this->aGeobinUser;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Hash' == $relationName) {
            $this->initHashs();
        }
        if ('Position' == $relationName) {
            $this->initPositions();
        }
    }

    /**
     * Clears out the collHashs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Geobin The current object (for fluent API support)
     * @see        addHashs()
     */
    public function clearHashs()
    {
        $this->collHashs = null; // important to set this to null since that means it is uninitialized
        $this->collHashsPartial = null;

        return $this;
    }

    /**
     * reset is the collHashs collection loaded partially
     *
     * @return void
     */
    public function resetPartialHashs($v = true)
    {
        $this->collHashsPartial = $v;
    }

    /**
     * Initializes the collHashs collection.
     *
     * By default this just sets the collHashs collection to an empty array (like clearcollHashs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHashs($overrideExisting = true)
    {
        if (null !== $this->collHashs && !$overrideExisting) {
            return;
        }
        $this->collHashs = new PropelObjectCollection();
        $this->collHashs->setModel('Hash');
    }

    /**
     * Gets an array of Hash objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Geobin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Hash[] List of Hash objects
     * @throws PropelException
     */
    public function getHashs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collHashsPartial && !$this->isNew();
        if (null === $this->collHashs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHashs) {
                // return empty collection
                $this->initHashs();
            } else {
                $collHashs = HashQuery::create(null, $criteria)
                    ->filterByGeobin($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collHashsPartial && count($collHashs)) {
                      $this->initHashs(false);

                      foreach($collHashs as $obj) {
                        if (false == $this->collHashs->contains($obj)) {
                          $this->collHashs->append($obj);
                        }
                      }

                      $this->collHashsPartial = true;
                    }

                    $collHashs->getInternalIterator()->rewind();
                    return $collHashs;
                }

                if($partial && $this->collHashs) {
                    foreach($this->collHashs as $obj) {
                        if($obj->isNew()) {
                            $collHashs[] = $obj;
                        }
                    }
                }

                $this->collHashs = $collHashs;
                $this->collHashsPartial = false;
            }
        }

        return $this->collHashs;
    }

    /**
     * Sets a collection of Hash objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $hashs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Geobin The current object (for fluent API support)
     */
    public function setHashs(PropelCollection $hashs, PropelPDO $con = null)
    {
        $hashsToDelete = $this->getHashs(new Criteria(), $con)->diff($hashs);

        $this->hashsScheduledForDeletion = unserialize(serialize($hashsToDelete));

        foreach ($hashsToDelete as $hashRemoved) {
            $hashRemoved->setGeobin(null);
        }

        $this->collHashs = null;
        foreach ($hashs as $hash) {
            $this->addHash($hash);
        }

        $this->collHashs = $hashs;
        $this->collHashsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Hash objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Hash objects.
     * @throws PropelException
     */
    public function countHashs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collHashsPartial && !$this->isNew();
        if (null === $this->collHashs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHashs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getHashs());
            }
            $query = HashQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGeobin($this)
                ->count($con);
        }

        return count($this->collHashs);
    }

    /**
     * Method called to associate a Hash object to this object
     * through the Hash foreign key attribute.
     *
     * @param    Hash $l Hash
     * @return Geobin The current object (for fluent API support)
     */
    public function addHash(Hash $l)
    {
        if ($this->collHashs === null) {
            $this->initHashs();
            $this->collHashsPartial = true;
        }
        if (!in_array($l, $this->collHashs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddHash($l);
        }

        return $this;
    }

    /**
     * @param	Hash $hash The hash object to add.
     */
    protected function doAddHash($hash)
    {
        $this->collHashs[]= $hash;
        $hash->setGeobin($this);
    }

    /**
     * @param	Hash $hash The hash object to remove.
     * @return Geobin The current object (for fluent API support)
     */
    public function removeHash($hash)
    {
        if ($this->getHashs()->contains($hash)) {
            $this->collHashs->remove($this->collHashs->search($hash));
            if (null === $this->hashsScheduledForDeletion) {
                $this->hashsScheduledForDeletion = clone $this->collHashs;
                $this->hashsScheduledForDeletion->clear();
            }
            $this->hashsScheduledForDeletion[]= clone $hash;
            $hash->setGeobin(null);
        }

        return $this;
    }

    /**
     * Clears out the collPositions collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Geobin The current object (for fluent API support)
     * @see        addPositions()
     */
    public function clearPositions()
    {
        $this->collPositions = null; // important to set this to null since that means it is uninitialized
        $this->collPositionsPartial = null;

        return $this;
    }

    /**
     * reset is the collPositions collection loaded partially
     *
     * @return void
     */
    public function resetPartialPositions($v = true)
    {
        $this->collPositionsPartial = $v;
    }

    /**
     * Initializes the collPositions collection.
     *
     * By default this just sets the collPositions collection to an empty array (like clearcollPositions());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPositions($overrideExisting = true)
    {
        if (null !== $this->collPositions && !$overrideExisting) {
            return;
        }
        $this->collPositions = new PropelObjectCollection();
        $this->collPositions->setModel('Position');
    }

    /**
     * Gets an array of Position objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Geobin is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Position[] List of Position objects
     * @throws PropelException
     */
    public function getPositions($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPositionsPartial && !$this->isNew();
        if (null === $this->collPositions || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPositions) {
                // return empty collection
                $this->initPositions();
            } else {
                $collPositions = PositionQuery::create(null, $criteria)
                    ->filterByGeobin($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPositionsPartial && count($collPositions)) {
                      $this->initPositions(false);

                      foreach($collPositions as $obj) {
                        if (false == $this->collPositions->contains($obj)) {
                          $this->collPositions->append($obj);
                        }
                      }

                      $this->collPositionsPartial = true;
                    }

                    $collPositions->getInternalIterator()->rewind();
                    return $collPositions;
                }

                if($partial && $this->collPositions) {
                    foreach($this->collPositions as $obj) {
                        if($obj->isNew()) {
                            $collPositions[] = $obj;
                        }
                    }
                }

                $this->collPositions = $collPositions;
                $this->collPositionsPartial = false;
            }
        }

        return $this->collPositions;
    }

    /**
     * Sets a collection of Position objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $positions A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Geobin The current object (for fluent API support)
     */
    public function setPositions(PropelCollection $positions, PropelPDO $con = null)
    {
        $positionsToDelete = $this->getPositions(new Criteria(), $con)->diff($positions);

        $this->positionsScheduledForDeletion = unserialize(serialize($positionsToDelete));

        foreach ($positionsToDelete as $positionRemoved) {
            $positionRemoved->setGeobin(null);
        }

        $this->collPositions = null;
        foreach ($positions as $position) {
            $this->addPosition($position);
        }

        $this->collPositions = $positions;
        $this->collPositionsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Position objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Position objects.
     * @throws PropelException
     */
    public function countPositions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPositionsPartial && !$this->isNew();
        if (null === $this->collPositions || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPositions) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPositions());
            }
            $query = PositionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGeobin($this)
                ->count($con);
        }

        return count($this->collPositions);
    }

    /**
     * Method called to associate a Position object to this object
     * through the Position foreign key attribute.
     *
     * @param    Position $l Position
     * @return Geobin The current object (for fluent API support)
     */
    public function addPosition(Position $l)
    {
        if ($this->collPositions === null) {
            $this->initPositions();
            $this->collPositionsPartial = true;
        }
        if (!in_array($l, $this->collPositions->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPosition($l);
        }

        return $this;
    }

    /**
     * @param	Position $position The position object to add.
     */
    protected function doAddPosition($position)
    {
        $this->collPositions[]= $position;
        $position->setGeobin($this);
    }

    /**
     * @param	Position $position The position object to remove.
     * @return Geobin The current object (for fluent API support)
     */
    public function removePosition($position)
    {
        if ($this->getPositions()->contains($position)) {
            $this->collPositions->remove($this->collPositions->search($position));
            if (null === $this->positionsScheduledForDeletion) {
                $this->positionsScheduledForDeletion = clone $this->collPositions;
                $this->positionsScheduledForDeletion->clear();
            }
            $this->positionsScheduledForDeletion[]= clone $position;
            $position->setGeobin(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->title = null;
        $this->description = null;
        $this->is_visible = null;
        $this->ipaddress = null;
        $this->center_lat = null;
        $this->center_lng = null;
        $this->zoomlevel = null;
        $this->geobin_user_id = null;
        $this->created = null;
        $this->modified = null;
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
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collHashs) {
                foreach ($this->collHashs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPositions) {
                foreach ($this->collPositions as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aGeobinUser instanceof Persistent) {
              $this->aGeobinUser->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collHashs instanceof PropelCollection) {
            $this->collHashs->clearIterator();
        }
        $this->collHashs = null;
        if ($this->collPositions instanceof PropelCollection) {
            $this->collPositions->clearIterator();
        }
        $this->collPositions = null;
        $this->aGeobinUser = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(GeobinPeer::DEFAULT_STRING_FORMAT);
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
