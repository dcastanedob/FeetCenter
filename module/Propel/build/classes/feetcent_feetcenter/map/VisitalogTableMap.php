<?php



/**
 * This class defines the structure of the 'visitalog' table.
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
class VisitalogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'feetcent_feetcenter.map.VisitalogTableMap';

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
        $this->setName('visitalog');
        $this->setPhpName('Visitalog');
        $this->setClassname('Visitalog');
        $this->setPackage('feetcent_feetcenter');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idvisitalog', 'Idvisitalog', 'INTEGER', true, null, null);
        $this->addColumn('idvisita', 'Idvisita', 'INTEGER', true, null, null);
        $this->addColumn('idempleado', 'Idempleado', 'INTEGER', false, null, null);
        $this->addColumn('visitalog_fecha', 'VisitalogFecha', 'TIMESTAMP', false, null, null);
        $this->addColumn('visitalog_accion', 'VisitalogAccion', 'VARCHAR', false, 45, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // VisitalogTableMap
