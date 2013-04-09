<?php



/**
 * This class defines the structure of the 'geobin_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.geobin.map
 */
class GeobinUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'geobin.map.GeobinUserTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('geobin_user');
        $this->setPhpName('GeobinUser');
        $this->setClassname('GeobinUser');
        $this->setPackage('geobin');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addColumn('mail', 'Mail', 'VARCHAR', false, 255, null);
        $this->addColumn('username', 'Username', 'VARCHAR', false, 255, null);
        $this->addColumn('pwd', 'Pwd', 'VARCHAR', false, 255, null);
        $this->addColumn('is_enabled', 'IsEnabled', 'VARCHAR', false, 255, 'FALSE');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Geobin', 'Geobin', RelationMap::ONE_TO_MANY, array('id' => 'geobin_user_id', ), null, null, 'Geobins');
    } // buildRelations()

} // GeobinUserTableMap
