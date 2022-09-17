<?php

namespace App\Controller\seguridad;

use App\Entity\Usuario;
use App\Form\Type\Usuario\RegistroType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController  extends AbstractController
{
    /**
     * @Route("/registro", name="registro",)
     */
    public function registro(Request $request, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $arRegistro = new Usuario();
        $nitEmpresa = "";
//        if ($codigoEmpresa != 0) {
//            $arEmpresa = $em->find(Empresa::class, $codigoEmpresa);
//            if ($arEmpresa) {
//                $nitEmpresa = $arEmpresa->getNit();
//                unset($arEmpresa);
//            }
//        }
        $form = $this->createForm(RegistroType::class, $arRegistro);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('btnGuardar')->isClicked()) {
//                $error = false;
//                $chkTerminosCondiciones = $request->request->get("chkTerminosCondiciones");
//                if ($chkTerminosCondiciones) {
                    $arRegistro->setCodigoUsuarioPk($arRegistro->getNumeroIdentificacion());
//                    $booUsuario = $em->getRepository(Usuario::class)->validarNumeroIdentificacion($arRegistro);
//                    if ($booUsuario) {
//                        if (is_numeric($form->get('numeroIdentificacion')->getData())) {
//                            if ($request->request->get("txtNitEmpresa")) {
//                                $arEmpresa = $em->getRepository(Empresa::class)->findOneBy(['nit' => $request->request->get("txtNitEmpresa")]);
//                                if ($arEmpresa) {
//                                    $parametros = ['tipoIdentificacion' => $arRegistro->getIdentificacionRel()->getCodigoIdentificacionPk(), 'numeroIdentificacion' => $arRegistro->getNumeroIdentificacion()];
//                                    $booValidarIdentifiacion = FuncionesController::consumirApi($arEmpresa, $parametros, "/recursohumano/api/empleado/validarIdentifiacion");
//                                    if ($booValidarIdentifiacion) {
//                                        $arRegistro->setEmpresaRel($arEmpresa);
//                                        $arRegistro->setEmpleado(true);
//                                    } else {
//                                        Mensajes::error("El tipo de identificación + número de identificación no están registrados como empleado en la empresa seleccionada");
//                                        $error = true;
//                                    }
//                                } else {
//                                    Mensajes::error("No existe empresa con el nit {$request->request->get("txtNitEmpresa")}");
//                                    $error = true;
//                                }
//                            } else {
//                                $arRegistro->setEmpresaRel(null);
//                            }
//                            if ($error == false) {
                                $arRegistro->setClave($arRegistro->getNumeroIdentificacion());
                                $arRegistro->setFechaRegistro(new \DateTime('now'));
                                $arRegistro->setCodigoIdentificacionFk('cc');
//                                $arRegistro->setCodigoRolFk('ROLE_USER');
//                                $arRegistro->setPersona(true);
                                $em->persist($arRegistro);
                                $em->flush();
//                                Mensajes::success("Registro completo, el usuario y contraseña son el número de identificación");
//                                if ($codigoEmpresa) {
//                                    return $this->redirect($this->generateUrl('login', ['codigoEmpresa' => $codigoEmpresa]));
//                                } else {
                                    return $this->redirect($this->generateUrl('login'));
//                                }
//                            }
//                        } else {
//                            Mensajes::warning("El número de identificación agregado no es numérico o contiene caracteres que no son permitidos");
//                        }
//                    }
//                } else {
//                    Mensajes::warning("Por favor aceptar términos de uso");
//                }
            }
        }
        return $this->render('seguridad/registro.html.twig',[
            'form' => $form->createView(),
//            'nitEmpresa' => $nitEmpresa,
//            'codigoEmpresa' => $codigoEmpresa
        ] );
    }
}