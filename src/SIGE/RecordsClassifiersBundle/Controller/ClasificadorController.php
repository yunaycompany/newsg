<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use SIGE\SigeBundle\HandlerRest\HttpCode;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use \FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use JMS\Serializer\SerializationContext;
use SIGE\RecordsClassifiersBundle\Entity\Clasificador;

class ClasificadorController extends FOSRestController {

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\Clasificador';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\ClasificadorType';

    /**
     * ***Trazabilidad del Código***
     *Módulo: Gestión de Configuración
     *Caso de Uso: Gestionar Clasificadores
     *RF: # 14 - Listar Clasificadores
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Clasificadores",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     500 = "En caso de ocurrir una excepcion"
     *   }
     * )
     * @Annotations\Get("/clasificador")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="Cantidad de páginas que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getClasificadorsAction(Request $request, ParamFetcherInterface $paramFetcher) {
        try {
            $query = $request->query->get("query");
            $filtres = array();
            $search_type = 0; //1 es simple y 2 avanzada
            if ($query) {
                $filtres = (array) json_decode($query);
                if (isset($filtres['simple_search'])) {
                    $search_type = 1;
                    $filtres['simple_search'] = '';
                } else {
                    $search_type = 2;
                }
                $filtres = array_filter($filtres);
            }
            $dataByRange = $this->container->get('sige.class.handler')->allRange($paramFetcher, $this->entityClass, $this->formType, $filtres, $search_type);
            $data = $dataByRange->getData();
            $length = 0;
            if (count($data) > 0) {
                $allData = $this->container->get('sige.class.handler')->all($this->entityClass, $this->formType);
                $length = count($allData->getData());
            }
            $jsonData = $this->container->get('jms_serializer')->serialize($data, "json");

            return new Response(json_encode(array("success" => true, "data" => json_decode($jsonData), "length" => count($jsonData), HttpCode::HTTP_OK)));
        } catch (\Exception $ex) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Unable to list classifiers'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     *Módulo: Gestión de Configuración
     *Caso de Uso: Gestionar Clasificadores
     *RF: #
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Clasificador dado su id",
     *   output = "Clasificador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     500 = "En caso de ocurrir una excepcion"
     *   }
     * )
     * @Annotations\Get("/clasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Clasificador
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Clasificador
     */
    public function getClasificadorAction($id) {
        return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código***
     *Módulo: Gestión de Configuración
     *Caso de Uso: Gestionar Clasificadores
     *RF: # 11 Adicionar Clasificador
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Clasificador",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/clasificador")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postClasificadorAction(Request $request) {
        try {
            return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
        } catch (\Exception $ex) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Uncompleted Operation'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     *Módulo: Gestión de Configuración
     *Caso de Uso: Gestionar Clasificadores
     *RF: # 11 Adicionar Clasificador
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificador",
     *   statusCodes = {
     *  201 = "Es retornado cuando Clasificador es creado",
     *  204 = "Es retornado si no existen errores",
     *  500 = "En caso de ocurrir una excepcion"
     *   }
     * )
     * @Annotations\Put("/clasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Clasificador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Clasificador
     */
    public function putClasificadorAction(Request $request, $id) {
        try{
             $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            if (!$view->getData()) {
                return $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
            } else {
                $clasSuper = $view->getData();
                if (!isset($clasSuper['codclasificadorsup']) || $clasSuper['codclasificadorsup'] == null || $clasSuper->getCodclasificadorsup() == null) {
                    return $this->container->get('sige.class.handler')->put($view->getData(), $request->request->all(), $this->entityClass, $this->formType);
                }
            }
        }catch (\Exception $ex){
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Uncompleted Operation'), HttpCode::HTTP_SERVER_ERROR)));
        }
    }

    /**
     * ***Trazabilidad del Código***
     *Módulo: Gestión de Configuración
     *Caso de Uso: Gestionar Clasificadores
     *RF: # 13 Modificar Clasificador
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     500 = "En caso de ocurrir una excepcion"
     *   }
     * )
     * @Annotations\Patch("/clasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Clasificador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Clasificador
     */
    public function patchClasificadorAction(Request $request, $id) {
        return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código***
     *Módulo: Gestión de Configuración
     *Caso de Uso: Gestionar Clasificadores
     *RF: # 12 Eliminar Clasificador
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     500 = "En caso de ocurrir una excepcion"
     *   }
     * )
     * @Annotations\Delete("/clasificador/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Clasificador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Clasificador
     */
    public function deleteClasificadorAction(Request $request, $id) {
        return $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
    }

    /**
     * ***Trazabilidad del Código***
     *Módulo: Gestión de Configuración
     *Caso de Uso: Gestionar Clasificadores
     *RF: # 12 Eliminar Clasificador
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificador",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     500 = "En caso de ocurrir una excepcion"
     *   }
     * )
     * @Annotations\Delete("/clasificador")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id de Clasificador
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Clasificador
     */
    public function deleteClasificadorsAction(Request $request) {
        try {
            $arrayIds = json_decode($request->request->get('ids'));
            $responses = array();

            //recorremos el array de id
            foreach ($arrayIds as $id) {
                $responses[] = $this->removeClasifierById($id);
            }
            $errors = array();
            $messages = array();
            foreach ($responses as $value) {
                if (json_decode($value)->success) {
                    $messages[] = json_decode($value)->message;
                } else {
                    $errors[] = json_decode($value)->error;
                }
            }
            if (count($errors) > 0) {
                $resp = array("success" => false, "message" => $this->get('translator')->trans('cantDelete'), "data" => $errors);
                $response = new Response(json_encode($resp), "200");
                return $response;
            } else {
                $resp = array("success" => true, "message" => $this->get('translator')->trans('deleteOk'), "data" => $messages);
                $response = new Response(json_encode($resp), "200");
                return $response;
            }
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('CDFSE'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Método Auxiliar
     * RF: # 12
     * Descripcion: Elimina el clasificador dado su id
     * @param type $id
     */
    public function removeClasifierById($id) {
        $em = $this->getDoctrine()->getManager();
        $associated = false;
        $clasifier = $em->getRepository('RecordsClassifiersBundle:Clasificador')->find($id);
        if (null !== $clasifier) {
            if ($this->haveAssociatedClasificationsCI($id, $em)) {
                return json_encode(array("success" => false, "error" => array("id" => $id, "message" => $this->get('translator')->trans('associatedCIs'))));
            } elseif ($this->haveQuestions($id, $em)) {
                return json_encode(array("success" => false, "error" => array("id" => $id, "message" => $this->get('translator')->trans('associated'))));
            } else {
                if ($childrens = $this->haveChildrens($id, $em)) {
                    foreach ($childrens as $children) {
                        return $this->removeClasifierById($children->getId(), $em);
                    }
                    return $this->removeClasifierById($id, $em);
                } else {
                    if ($this->haveAssociatedRecord($id, $em)) {
                        $associated = true;
                    }
                    try {
                        $em->remove($clasifier);
                        $em->flush();
                    } catch (\Exception $exc) {
                        return json_encode(array("success" => false, "error" => array("id" => $id, "message" => $exc->getMessage())));
                    }

//                    $res = array();
//                    $res = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
//                    $correct = json_encode($res);
//                    var_dump($res);
////                    if (json_decode($correct)->success) { //cuando se eliminan dos clasificadores relacionados con registros seguidos se pierde esta propiedad.
                    if ($associated) {
                        return json_encode(array("success" => true, "message" => array("id" => $id, "message" => $this->get('translator')->trans('deleteAssociated'))));
                    } else {
                        return json_encode(array("success" => true, "message" => array("id" => $id, "message" => $this->get('translator')->trans('Ok'))));
                    }
////                    }
                }
            }
        } else {
            return json_encode(array("success" => false, "error" => array("id" => $id, "message" => $this->get('translator')->trans('noExist'))));
        }
    }

    /**
     * Método auxiliar.
     * comprueba si el clasificador tiene hijos, si los tiene devuelve el array de hijos.
     * @param type $idClasifier
     * @return boolean
     */
    private function haveChildrens($idClasifier, $em) {
        $childrems = $em->getRepository('RecordsClassifiersBundle:Clasificador')->findBy(array('codclasificadorsup' => $idClasifier));

        if ($childrems) {
            return $childrems;
        }

        return FALSE;
    }

    /**
     * Método auxiliar.
     * comprueba si el clasificador está relacionado con alguna pregunta.
     * @param type $idClasifier
     * @return boolean
     */
    private function haveQuestions($idClasifier, $em) {
        $questions = $em->getRepository('ModelGeneratorBundle:Pregunta')->findBy(array('clasificador' => $idClasifier));

        if ($questions) {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Método auxiliar.
     * comprueba si el clasificador está asociado a registros.
     * @param type $idClasifier
     * @return boolean
     */
    private function haveAssociatedRecord($idClasifier, $em) {
        $registros = $em->getRepository('RecordsClassifiersBundle:Registro')->findAll();

        if (null !== $registros) {
            foreach ($registros as $registro) {
                $clasificadores = $registro->getClasificadores();
                foreach ($clasificadores as $clasificador) {
                    if ($idClasifier == $clasificador->getId()) {
                        return true;
                    }
                }
            }
        }

        return FALSE;
    }

    /**
     * Método auxiliar.
     * comprueba si el clasificador está asociado clasificaciones y si estas a su vez
     * estan asociadas a centroinformantes.
     * @param type $idClasifier
     * @return boolean
     */
    private function haveAssociatedClasificationsCI($idClasifier, $em) {
        $Clasificaciones = $em->getRepository('RecordsClassifiersBundle:Clasificacion')->findBy(array('clasificador' => $idClasifier));

        if (!empty($Clasificaciones)) {
            foreach ($Clasificaciones as $Clasificacion) {
                $repository = $em->getRepository('RecordsClassifiersBundle:Centroinformante');
                $query = $repository->createQueryBuilder('c')
                                ->innerJoin('c.clasificaciones', 'cl')
                                ->where('cl.clasificacion = :id')
                                ->setParameter('id', $idClasifier)
                                ->getQuery()->getResult();
                if (count($query) > 0) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    /**
     * Crear Jerarquia de Clasificadores.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Crear Jerarquia de Clasificadores",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Clasificador",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/crearjerarquia")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postCreateHierarchyClassifiersAction(Request $request) {
        try {
            $em = $this->getDoctrine()->getManager();

            //Obtener los datos de la peticion
            $idClasificadorHijo = $request->get('idClasificadorHijo');
            $idClasificadorPadre = $request->get('idClasificadorPadre');
            $inicio = $request->get('inicio');
            $longitud = $request->get('longitud');

            //Obtener las clasificaciones de los clasificadores que intervienen
            $clasificacionesHijo = $em->getRepository("RecordsClassifiersBundle:Clasificador")->find($idClasificadorHijo)->getClasificaciones();
            $clasificacionesPadre = $em->getRepository("RecordsClassifiersBundle:Clasificador")->find($idClasificadorPadre)->getClasificaciones();

            //  Longitud del hijo estandar
            $longHijoEstandar = strlen($clasificacionesHijo->get(0)->getId());
            foreach ($clasificacionesHijo as $hijo) {
                if (strlen($hijo->getId()) != $longHijoEstandar) {
                    return new Response("{success:false, message: La longitud de las clasificaciones hijas no es estandar." . "}", HttpCode::HTTP_OK);
                }
            }
            //  Longitud del padre estandar
            $longPadreEstandar = strlen($clasificacionesPadre->get(0)->getId());
            foreach ($clasificacionesPadre as $padre) {
                if (strlen($padre->getId()) != $longPadreEstandar) {
                    return new Response("{success:false, message: La longitud del código de las clasificaciones padres no es estándar.}", HttpCode::HTTP_OK);
                }
            }

            //  Longitud del padre < Longitud del hijo
            if ($longPadreEstandar >= $longHijoEstandar) {
                return new Response("{success:false, message: La longitud del código de las clasificaciones padres no puede ser mayor que el de las hijas.}", HttpCode::HTTP_OK);
            }

            // Todos los hijos y padres estan asociados
            $hierarchySon = array();
            $hierarchy = array();
            foreach ($clasificacionesPadre as $padre) {
                $flag = false;
                foreach ($clasificacionesHijo as $hijo) {
                    $sub = substr($hijo->getId(), $inicio, $longitud);
                    if ($sub == $padre->getId()) {
                        $temporal = array();
                        $temporal['idclasificador'] = $hijo->getClasificador()->getId();
                        $temporal['idclasificacion'] = $hijo->getId();
                        $temporal['nombredescriptivo'] = $hijo->getNombredescriptivo();
                        $clasificacionesHijo->removeElement($hijo);
                        $flag = true;
                        $hierarchySon[] = $temporal;
                    }
                }
                if ($flag == true) {
                    $temporal = array();
                    $temporal['idclasificador'] = $padre->getClasificador()->getId();
                    $temporal['idclasificacion'] = $padre->getId();
                    $temporal['nombredescriptivo'] = $padre->getNombredescriptivo();
                    $hierarchy[] = $temporal;
                    $clasificacionesPadre->removeElement($padre);
                }
                $hierarchySon = array();
            }
            if (count($clasificacionesHijo) != 0) {
                return new Response("{success:false, message: Existen clasificaciones hijas sin asociar}", HttpCode::HTTP_OK);
            }
            if (count($clasificacionesPadre) != 0) {
                return new Response("{success:false, message: Existen clasificaciones padres sin asociar}", HttpCode::HTTP_OK);
            }
            return new Response("{success:true, data:" . json_encode($hierarchy) . ", message: La jerarquia ha sido creada satisfactoriamente" . "}", "200");
        } catch (\Exception $ex) {
            return new Response("{success: false, message: " . $ex->getMessage() . "}", $ex->getCode());
        }
    }

    /**
     * @Annotations\Get("/export_classifier")
     */
    public function exportClasificadoresAction() {
        $em = $this->getDoctrine()->getManager();

        // recuperamos los elementos de base de datos que queremos exportar
        $result = $em->getRepository('RecordsClassifiersBundle:Clasificador')->findAll();

        // solicitamos el servicio 'phpexcel' y creamos el objeto vacío...
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        // ...y le asignamos una serie de propiedades
        $phpExcelObject->getProperties()
                ->setCreator("SIGE")
                ->setLastModifiedBy("SIGE")
                ->setTitle("Clasificadores")
                ->setSubject("Clasificadores")
                ->setDescription("Listado de clasificadores.");

        // establecemos como hoja activa la primera, y le asignamos un título
        $phpExcelObject->setActiveSheetIndex(0);
        $phpExcelObject->getActiveSheet()->setTitle('Listado de clasificadores.');

        // escribimos en distintas celdas del documento el título de los campos que vamos a exportar
        $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Código')
                ->setCellValue('B1', 'Nombre')
                ->setCellValue('C1', 'Alias')
                ->setCellValue('D1', 'Dominio');
        // fijamos un ancho a las distintas columnas
        $phpExcelObject->setActiveSheetIndex(0)
                ->getColumnDimension('A')
                ->setWidth(20);
        $phpExcelObject->setActiveSheetIndex(0)
                ->getColumnDimension('B')
                ->setWidth(20);
        $phpExcelObject->setActiveSheetIndex(0)
                ->getColumnDimension('C')
                ->setWidth(20);
        $phpExcelObject->setActiveSheetIndex(0)
                ->getColumnDimension('D')
                ->setWidth(20);
        // recorremos los registros obtenidos de la consulta a base de datos escribiéndolos en las celdas correspondientes
        $row = 2;
        foreach ($result as $item) {
            $dominio = '';
            switch ($item->getDominio()->getId()) {
                case 1:
                    $dominio = 'U';
                    break;
                case 2:
                    $dominio = 'E';
                    break;
                case 3:
                    $dominio = 'R';
                    break;
                case 4:
                    $dominio = 'T';
                    break;
            }
            $phpExcelObject->setActiveSheetIndex(0)
                    ->setCellValue('A' . $row, $item->getId())
                    ->setCellValue('B' . $row, $item->getNombredescriptivo())
                    ->setCellValue('C' . $row, $item->getAlias())
                    ->setCellValue('D' . $row, $dominio);


            $row++;
        }
        // se crea el writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel2007');
        // se crea el response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // y por último se añaden las cabeceras
        // adding headers
//        $response = new Response();
//
//        $response->clearHttpHeaders();
//        $response->setHttpHeader('Content-Description', 'File Transfer');
//        $response->setContentType('application/force-download', false);
//        $response->setContentType('application/octet-stream', false);
////        $path = sfConfig::get('sf_web_dir') . '/download/' . $filename;
//        $path = $this->getParameter('webdir');
//
//        //guardando el archivo
//        $objWriter->save($path);
//        chmod($filename, 0777);
//        $response->setHttpHeader('Content-type: application/vnd-ms-excel; charset=utf-8');
//        $response->setHttpHeader('Content-Disposition', 'attachment; filename=' . $filename);
//        $response->setHttpHeader("Pragma: no-cache");
//        $response->setHttpHeader("Expires: 0");
//        $response->setHttpHeader('Content-Transfer-Encoding', 'binary');
//        $content = file_get_contents($path);
//        //eliminando el archivo temporal
//        unlink($path);








        $response->headers->set('Content-Description', 'File Transfer');
//        $response->content->set('application/force-download', false);
//        $response->content->set('application/octet-stream', false);


        $response->headers->set('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Content-Disposition', 'attachment;filename=Clasificadores.xls');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expire', '0');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
//
//
        return $response;
    }

    /**
     * @Annotations\Post("/import_classifier")
     * @param Request $request El objeto Request de la petición
     */
    public function importClasificadoresAction(Request $request) {
        try {

            $em = $this->getDoctrine()->getManager();

            // aki se mueve el fichero para la ruta que se defina en el config.yml para el parametro xls_fixture_absolute_path

            $filename = $_FILES['file'];

            if (!file_exists($filename['tmp_name']) || $filename['type'] != "application/vnd.ms-excel") {
                return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Import failed'))), '200');
            } else {
                //cargamos el archivo a procesar.
                $objPHPExcel = \PHPExcel_IOFactory::load($filename['tmp_name']);

                //se obtienen las hojas, el nombre de las hojas y se pone activa la primera hoja
                $total_sheets = $objPHPExcel->getSheetCount();
                $allSheetName = $objPHPExcel->getSheetNames();
                $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
                //Se obtiene el número máximo de filas
                $highestRow = $objWorksheet->getHighestRow();
                //Se obtiene el número máximo de columnas
                $highestColumn = $objWorksheet->getHighestColumn();
                $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
                //$headingsArray contiene las cabeceras de la hoja excel. Llos titulos de columnas
                $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
                $headingsArray = $headingsArray[1];
                $repeatedobjectid = array();
                $repeatedobjectalias = array();
                $errors = '';
                //Validacion de la cabecera del excell
                if ($headingsArray["A"] == 'Código' && $headingsArray["B"] == 'Nombre' && $headingsArray["C"] == 'Alias' && $headingsArray["D"] == 'Dominio') {
                    //Se recorre toda la hoja excel desde la fila 2 y se almacenan los datos
                    $r = -1;
                    for ($row = 2; $row <= $highestRow; ++$row) {

                        $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
                        //valida q el campo d la fila del excell no este vacio
                        if ($dataRow[$row]["A"] != NULL && $dataRow[$row]["B"] != NULL && $dataRow[$row]["C"] != NULL) {





                            $alias = $em->getRepository('RecordsClassifiersBundle:Clasificador')->findOneBy(array('alias' => $dataRow[$row]["C"]));
                            $id = $em->getRepository('RecordsClassifiersBundle:Clasificador')->find($dataRow[$row]["A"]);
                            if ($id) {
                                $errors .= 'id =>' . $id->getId() . ',  ';
                            } elseif ($alias) {
                                $errors .= 'alias =>' . $alias->getAlias() . ',  ';
                            } else {
                                // extrae el objeto dominio del clasificador
                                $domain = '';
                                switch ($dataRow[$row]["D"]) {
                                    case 'U':
                                        $domain = $em->getRepository('RecordsClassifiersBundle:DominioClasificador')->find(1);
                                        break;
                                    case 'E':
                                        $domain = $em->getRepository('RecordsClassifiersBundle:DominioClasificador')->find(2);
                                        break;
                                    case 'R':
                                        $domain = $em->getRepository('RecordsClassifiersBundle:DominioClasificador')->find(3);
                                        break;
                                    case 'T':
                                        $domain = $em->getRepository('RecordsClassifiersBundle:DominioClasificador')->find(4);
                                        break;
                                }
                                // inserta el clasificador en la BD
                                $clasificador = new Clasificador();
                                $clasificador->setId($dataRow[$row]["A"]);
                                $clasificador->setNombredescriptivo($dataRow[$row]["B"]);
                                $clasificador->setAlias($dataRow[$row]["C"]);
                                $clasificador->setDominio($domain);
                                $em->persist($clasificador);
                            }
                        } //endforeach
                    }
                } else {
                    return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Header Not Match'))), '200');
                }
                $em->flush();
                // para mostrar los archivos que no se pudieron importar debido a que el id o el alias ya existian en BD

                if ($errors != '')
                    return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Import not loaded') . ': ' . $errors)), HttpCode::HTTP_OK);
                return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Import Success'))), HttpCode::HTTP_OK);
            }
        } catch (Exception $exc) {
            return new Response(json_encode(array("success" => false, "message" => $this->get('translator')->trans('Import exception'))), '500');
        }
    }

}
