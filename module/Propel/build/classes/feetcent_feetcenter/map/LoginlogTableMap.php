<?php



/**
 * This class defines the structure of the 'loginlog' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.feetcent_feetcenter.map
 */
class LoginlogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'feetcent_feetcenter.map.LoginlogTableMap';

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
        $this->setName('loginlog');
        $this->setPhpName('Loginlog');
        $this->setClassname('Loginlog');
        $this->setPackage('feetcent_feetcenter');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idloginlog', 'Idloginlog', 'INTEGER', true, null, null);
        $this->addColumn('idempleado', 'Idempleado', 'INTEGER', true, null, null);
        $this->addColumn('loginlog_fechainicio', 'LoginlogFechainicio', 'TIMESTAMP', true, null, null);
        $this->addColumn('loginlog_fechafin', 'LoginlogFechafin', 'TIMESTAMP', false, null, null);
        $this->addColumn('loginlog_geo', 'LoginlogGeo', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // LoginlogTableMap
