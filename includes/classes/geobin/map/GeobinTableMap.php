<?php



/**
 * This class defines the structure of the 'geobin' table.
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
class GeobinTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'geobin.map.GeobinTableMap';

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
        $this->setName('geobin');
        $this->setPhpName('Geobin');
        $this->setClassname('Geobin');
        $this->setPackage('geobin');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'LONGVARCHAR', false, null, null);
        $this->addColumn('is_visible', 'IsVisible', 'BOOLEAN', true, 1, true);
        $this->addColumn('ipaddress', 'Ipaddress', 'VARCHAR', true, 45, null);
        $this->addColumn('center_lat', 'CenterLat', 'FLOAT', true, 10, null);
        $this->addColumn('center_lng', 'CenterLng', 'FLOAT', true, 10, null);
        $this->addColumn('zoomlevel', 'Zoomlevel', 'INTEGER', true, null, null);
        $this->addForeignKey('geobin_user_id', 'GeobinUserId', 'BIGINT', 'geobin_user', 'id', true, null, null);
        $this->addColumn('created', 'Created', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('modified', 'Modified', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('GeobinUser', 'GeobinUser', RelationMap::MANY_TO_ONE, array('geobin_user_id' => 'id', ), null, null);
        $this->addRelation('Hash', 'Hash', RelationMap::ONE_TO_MANY, array('id' => 'geobin_id', ), null, null, 'Hashs');
        $this->addRelation('Position', 'Position', RelationMap::ONE_TO_MANY, array('id' => 'geobin_id', ), null, null, 'Positions');
    } // buildRelations()

} // GeobinTableMap
