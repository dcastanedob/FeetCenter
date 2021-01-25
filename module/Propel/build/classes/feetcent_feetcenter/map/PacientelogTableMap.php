<?php



/**
 * This class defines the structure of the 'pacientelog' table.
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
class PacientelogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'feetcent_feetcenter.map.PacientelogTableMap';

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
        $this->setName('pacientelog');
        $this->setPhpName('Pacientelog');
        $this->setClassname('Pacientelog');
        $this->setPackage('feetcent_feetcenter');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idpacientelog', 'Idpacientelog', 'INTEGER', true, null, null);
        $this->addForeignKey('idpaciente', 'Idpaciente', 'INTEGER', 'paciente', 'idpaciente', true, null, null);
        $this->addForeignKey('idempleado', 'Idempleado', 'INTEGER', 'empleado', 'idempleado', true, null, null);
        $this->addColumn('pacientelog_fecha', 'PacientelogFecha', 'TIMESTAMP', true, null, null);
        $this->addColumn('pacientelog_nombre_old', 'PacientelogNombreOld', 'VARCHAR', true, 255, '');
        $this->addColumn('pacientelog_telefono_old', 'PacientelogTelefonoOld', 'VARCHAR', true, 255, '');
        $this->addColumn('pacientelog_nombre_new', 'PacientelogNombreNew', 'VARCHAR', true, 255, '');
        $this->addColumn('pacientelog_telefono_new', 'PacientelogTelefonoNew', 'VARCHAR', true, 255, '');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Empleado', 'Empleado', RelationMap::MANY_TO_ONE, array('idempleado' => 'idempleado', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Paciente', 'Paciente', RelationMap::MANY_TO_ONE, array('idpaciente' => 'idpaciente', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // PacientelogTableMap
