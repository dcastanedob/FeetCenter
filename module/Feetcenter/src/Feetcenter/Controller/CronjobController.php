<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Feetcenter\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CronjobController extends AbstractActionController
{
    public function autologoutAction()
    {

        $administradores = \EmpleadoaccesoQuery::create()->find();
        foreach ($administradores as $admin){
            $admin->setEmpleadoaccesoEnsesion(0);
            $admin->save();
        }

    }

    public function statusAction()
    {
        $visitas = \VisitaQuery::create()->filterByVisitaStatus('confimada')->find();
        foreach ($visitas as $visita) {

          $minutes = floor(abs(strtotime($visita->getVisitaFechaInicio('Y-m-d H:i:s')) - time()) / 60);
          if($minutes > 15){
            $visita->setVisitaStatus('no se presento')->save();
          }

        }


    }

    public function membresiasAction()
    {
          $vencidas = \PacientemembresiaQuery::create()->filterByPacientemembresiaEstatus('activa')->filterByPacientemembresiaVigencia(date('Y-m-d'),\Criteria::LESS_THAN)->find();
          foreach ($vencidas as $membresia) {
            $membresia->setPacientemembresiaServiciosdisponibles(0)
                      ->setPacientemembresiaCuponesdisponibles(0)
                      ->setPacientemembresiaEstatus('vencida')
                      ->save();
          }
        

    }

}
