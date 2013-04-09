<?php



/**
 * This class defines the structure of the 'hash' table.
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
class HashTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'geobin.map.HashTableMap';

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
        $this->setName('hash');
        $this->setPhpName('Hash');
        $this->setClassname('Hash');
        $this->setPackage('geobin');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addColumn('uri_hash', 'UriHash', 'VARCHAR', true, 12, null);
        $this->addColumn('created', 'Created', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('modified', 'Modified', 'TIMESTAMP', false, null, null);
        $this->addColumn('is_locked', 'IsLocked', 'BOOLEAN', true, 1, false);
        $this->addForeignKey('geobin_id', 'GeobinId', 'BIGINT', 'geobin', 'id', true, null, null);
        $this->addColumn('expires', 'Expires', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Geobin', 'Geobin', RelationMap::MANY_TO_ONE, array('geobin_id' => 'id', ), null, null);
    } // buildRelations()

} // HashTableMap
