<?php



/**
 * This class defines the structure of the 'conceptoincidencia' table.
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
class ConceptoincidenciaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'feetcent_feetcenter.map.ConceptoincidenciaTableMap';

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
        $this->setName('conceptoincidencia');
        $this->setPhpName('Conceptoincidencia');
        $this->setClassname('Conceptoincidencia');
        $this->setPackage('feetcent_feetcenter');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idconceptoincidencia', 'Idconceptoincidencia', 'INTEGER', true, null, null);
        $this->addColumn('conceptoincidencia_nombre', 'ConceptoincidenciaNombre', 'VARCHAR', true, 255, null);
        $this->addColumn('conceptoincidencia_descripcion', 'ConceptoincidenciaDescripcion', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Empleadoreporte', 'Empleadoreporte', RelationMap::ONE_TO_MANY, array('idconceptoincidencia' => 'idconceptoincidencia', ), 'CASCADE', 'CASCADE', 'Empleadoreportes');
    } // buildRelations()

} // ConceptoincidenciaTableMap
