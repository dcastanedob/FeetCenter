<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Login\Controller;



use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class LoginController extends AbstractActionController
{

  public function get_client_ip()
    {
      $ipaddress = '';
      if (isset($_SERVER['HTTP_CLIENT_IP'])) {
          $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
      } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
          $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
      } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
          $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
      } else if (isset($_SERVER['HTTP_FORWARDED'])) {
          $ipaddress = $_SERVER['HTTP_FORWARDED'];
      } else if (isset($_SERVER['REMOTE_ADDR'])) {
          $ipaddress = $_SERVER['REMOTE_ADDR'];
      } else {
          $ipaddress = 'UNKNOWN';
      }

      return $ipaddress;
    }


    public function cortecajaAction(){

        $session = new \Shared\Session\AouthSession();
        $session = $session->getData();

        $today = new \DateTime();
        $total = \VisitapagoQuery::create()->select(array('total'))->withColumn('SUM(visitapago_cantidad)', 'total')->filterByVisitapagoFecha(array('min' => $today->format('Y-m-d').' 00:00:00'))->useVisitaQuery()->filterByIdclinica($session['idclinica'])->endUse()->findOne();
        $total = !is_null($total) ? $total : 0;

        $total_efectivo = \VisitapagoQuery::create()->select(array('total'))->withColumn('SUM(visitapago_cantidad)', 'total')->filterByVisitapagoTipo('efectivo')->filterByVisitapagoFecha(array('min' => $today->format('Y-m-d').' 00:00:00'))->useVisitaQuery()->filterByIdclinica($session['idclinica'])->endUse()->findOne();
        $total_efectivo = !is_null($total_efectivo) ? $total_efectivo : 0;

        $total_tarjeta = \VisitapagoQuery::create()->select(array('total'))->withColumn('SUM(visitapago_cantidad)', 'total')->filterByVisitapagoTipo('tarjeta')->filterByVisitapagoFecha(array('min' => $today->format('Y-m-d').' 00:00:00'))->useVisitaQuery()->filterByIdclinica($session['idclinica'])->endUse()->findOne();
        $total_tarjeta = !is_null($total_tarjeta) ? $total_tarjeta : 0;

        return new ViewModel(array(
            'total_tarjeta' => $total_tarjeta,
            'total_efectivo' => $total_efectivo,
            'total' => $total,
        ));

    }


    public function indexAction()
    {




        //Nuesta session
        $session = new \Shared\Session\AouthSession();


        if($session->isActive()){
            return $this->redirect()->toRoute('agenda');
        }


        //Instanciamos nuestro formulario
        $form = new \Login\Form\LoginForm();


       //echo '<pre>';var_dump(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'firefox'));echo '</pre>';
       //echo '<pre>';var_dump(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mozilla'));echo '</pre>';exit();
        if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'firefox') != false || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mozilla') != false){


        }else{

            $this->flashMessenger()->addErrorMessage('No se esta utilizando el navegador correcto. Por favor utilice Mozilla Firefox');
            //return $this->redirect()->toUrl('/login');
        }

        return new ViewModel(array(
            'form' => $form,
            'errorMessages' => $this->flashMessenger()->getErrorMessages(),
        ));


    }


    public function inAction()
    {


        $request = $this->getRequest();
        $response = $this->getResponse();


        //Instanciamos nuestro formulario
        $form = new \Login\Form\LoginForm();


        //Nuesta session
         $session = new \Shared\Session\AouthSession();

        if($request->isPost()){


            $post_data = $request->getPost();


            $post_data['empleadoacceso_password'] = md5($post_data['empleadoacceso_password']);

            //if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'firefox') != false  || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mozilla') != false){

                //Verificamos si los datos de acceso son correctos
                if(\EmpleadoaccesoQuery::create()->filterByEmpleadoaccesoUsername($post_data['empleadoacceso_username'])->filterByEmpleadoaccesoPassword($post_data['empleadoacceso_password'])->exists()){


                    $empleado_acceso = \EmpleadoaccesoQuery::create()->filterByEmpleadoaccesoUsername($post_data['empleadoacceso_username'])->filterByEmpleadoaccesoPassword($post_data['empleadoacceso_password'])->findOne();


                    //Verificamos que ese usario ya este asiganod alguna clinica
                    if(\ClinicaempleadoQuery::create()->filterByIdempleado($empleado_acceso->getIdempleado())->exists() || in_array($empleado_acceso->getIdrol(), array(1,6))){
                        $clinica_empleado = \ClinicaempleadoQuery::create()->filterByIdempleado($empleado_acceso->getIdempleado())->findOne();



                        if(in_array($empleado_acceso->getIdrol(), array(1,6))){
                            $idclinica = NULL;
                        }else{
                            $idclinica = $clinica_empleado->getIdclinica();

                            if($empleado_acceso->getIdrol() )

                            //VERIFICAMOS QUE NO EXISTA UN EMPLEADO DE TIPO ENCARGADLO LOGUEADO POR CLINICA
                           $empleados_clinica = \ClinicaempleadoQuery::create()->filterByIdclinica($idclinica)->find();

                           $flag = false;
                           foreach ($empleados_clinica as $empleado){
                               if(\EmpleadoaccesoQuery::create()->filterByIdempleado($empleado->getIdempleado())->filterByEmpleadoaccesoEnsesion(true)->exists()){
                                  $flag = true;
                               }
                           }

                           if($flag){
                                $rol = \RolQuery::create()->findPk($empleado_acceso->getIdrol());
                                $this->flashMessenger()->addErrorMessage('Ya existe un empleado con el rol de '.$rol->getRolNombre()    .' en sesión!');
                                return $this->redirect()->toRoute('login');

                           }

                        }


                        //Verificamos que el usuario no este logueado actualmente
                        if(!$empleado_acceso->getEmpleadoaccesoEnsesion()){

                            /*
                             * NOTIFICACIONES
                             */

                            if(in_array($empleado_acceso->getIdrol(), array(1,6))){


                                $transferencias = \TransferenciaQuery::create()->filterByTransferenciaEstatus('enviada')->count();
                            }else{


                                $transferencias = \TransferenciaQuery::create()->filterByIdclinicadestinataria($empleado_acceso->getIdrol())->filterByTransferenciaEstatus('enviada')->count();
                            }

                            $publicIP = $this->get_client_ip();
                            $publicIP = '187.190.160.199';

                            //Uses ipinfo.io to get the location of the IP Address, you can use another site but it will probably have a different implementation
                            $json     = file_get_contents("http://ipinfo.io/$publicIP/geo");
                            $arr = json_decode($json, true);

                            $loginlog = new \Loginlog();
                            $loginlog->setIdempleado($empleado_acceso->getIdempleado())
                                     ->setLoginlogFechainicio(date('Y-m-d H:i:s'));

                            if(!isset($arr['status'])){
                              $loginlog->setLoginlogGeo($json);
                            }

                            $loginlog->save();



                            $test = new \Loginlog();

                            //Creamos nuestra session
                            $session->Create(array(
                                'idempleadoacceso' => $empleado_acceso->getIdempleadoacceso(),
                                'idempleado' => $empleado_acceso->getIdempleado(),
                                'idclinica' => $idclinica,
                                'idrol' => $empleado_acceso->getIdrol(),
                                'rol' => $empleado_acceso->getRol()->getRolNombre(),
                                'empleadoacceso_username' => $empleado_acceso->getEmpleadoaccesoUsername(),
                                'empleado_nombre' => $empleado_acceso->getEmpleado()->getEmpleadoNombre(),
                                'empleado_foto' => $empleado_acceso->getEmpleado()->getEmpleadoFoto(),
                                'transferencias_pendientes' => $transferencias,
                                'idloginlog' => $loginlog->getIdloginlog(),
                            ));


                            $empleado_acceso->setEmpleadoaccesoEnsesion(1);
                            $empleado_acceso->save();

                            if(in_array($empleado_acceso->getIdrol(), array(1,6,3,5))){
                                return $this->redirect()->toRoute('agenda');
                            }else{
                                return $this->redirect()->toUrl('/login/cortecaja');
                            }


                        }else{
                            
                            $this->flashMessenger()->addErrorMessage('El usuario ya ha iniciado sesión en otro dispositivo');
                            return $this->redirect()->toRoute('login');
                        }

                    }else{
                        $this->flashMessenger()->addErrorMessage('No es posible iniciar sesion con este usuario ya que no ha sido asignado a ninguna clinica');
                        return $this->redirect()->toRoute('login');
                    }

                }else{
                    $this->flashMessenger()->addErrorMessage('Nombre de usuario y/o contraseña incorrecta');
                    return $this->redirect()->toRoute('login');
                }
            //}else{
            //    $this->flashMessenger()->addErrorMessage('No se esta utilizando el navegador correcto. Por favor utilice Mozilla Firefox');
            //    return $this->redirect()->toRoute('login');
            //}

        }

    }

    public function outAction() {

         $AouthSession = new \Shared\Session\AouthSession();
         $session = $AouthSession->getData();

         $empleado_acesso = \EmpleadoaccesoQuery::create()->findPk($AouthSession->getIdempleadoacceso());

         if(!is_null($empleado_acesso)){
            $empleado_acesso->setEmpleadoaccesoEnsesion(0);
            $empleado_acesso->save();
         }

         if(!is_null($session['idloginlog'])){
            $loginlog = \LoginlogQuery::create()->findPk($session['idloginlog']);
            $loginlog->setLoginlogFechafin(date('Y-m-d H:i:s'))->save();
         }


         $AouthSession->Close();
         return $this->redirect()->toRoute('login');
    }


}
