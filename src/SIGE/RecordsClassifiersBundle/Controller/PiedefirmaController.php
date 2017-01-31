<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:15
 */

namespace SIGE\RecordsClassifiersBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use SIGE\RecordsClassifiersBundle\Entity\Piedefirma;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\View;
use \FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations;
use Symfony\Component\Form\FormTypeInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use SIGE\SigeBundle\HandlerRest\HttpCode;
use \JMS\Serializer\SerializationContext;

class PiedefirmaController extends FOSRestController {

    private $entityClass = 'SIGE\RecordsClassifiersBundle\Entity\Piedefirma';
    private $formType = 'SIGE\RecordsClassifiersBundle\Form\PiedefirmaType';

    /**
     * Listar Piedefirma
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Listar Piedefirma",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/piedefirma")
     * @Annotations\QueryParam(name="start", requirements="\d+", nullable=true, description="Número desde el que debe comenzar la lista de páginas.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="Cantidad de páginas que se devolverán")
     * @param Request $request El objeto Request de la petición
     * @param ParamFetcherInterface $paramFetcher Servicio Param Fetcher
     *
     * @return View
     */
    public function getPiesdefirmaAction(Request $request, ParamFetcherInterface $paramFetcher) {
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
            $response = new Response("{'success': true, 'data':" . $jsonData . ",'length':" . $length . "}", HttpCode::HTTP_OK);

            return $response;
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Signfooter list failed'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Obtener Piedefirma dado su id
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Piedefirma dado su id",
     *   output = "Piedefirma",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores"
     *   }
     * )
     * @Annotations\Get("/piedefirma/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int $id El id del Piedefirma
     *
     * @return array
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Piedefirma
     */
    public function getPiedefirmaAction($id) {
        try {
            return $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Signfooter list by id failed'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Adicionar Piedefirma.
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Adicionar Piedefirma",
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Piedefirma",
     *   statusCodes = {
     *     200 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Post("/piedefirma")
     * @param Request $request El objeto Request de la petición
     * @return FormTypeInterface|View
     */
    public function postPiedefirmaAction(Request $request) {
        try {
            $respuesta = $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Signfooter post success');
            }
            return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Signfooter post error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Si no existe el id de Piedefirma Adiciona, si existe Modifica
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Piedefirma",
     *   statusCodes = {
     *  201 = "Es retornado cuando Piedefirma es creado",
     *  204 = "Es retornado si no existen errores",
     *  400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Put("/piedefirma/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Piedefirma
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Piedefirma
     */
    public function putPiedefirmaAction(Request $request, $id) {
//        try {
            $view = $this->container->get('sige.class.handler')->get($id, $this->entityClass, $this->formType);
            if (!$view->getData()) {
                $respuesta = $this->container->get('sige.class.handler')->post($request->request->all(), $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('Signfooter post success');
                }
                return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
            } else {
                $respuesta = $this->container->get('sige.class.handler')->put($view->getData(), $request->request->all(), $this->entityClass, $this->formType);
                if ($respuesta["success"]) {
                    $respuesta["message"] = $this->get('translator')->trans('Signfooter put success');
                }
                return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
            }
//        } catch (\Exception $exc) {
//            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Signfooter put error'))), HttpCode::HTTP_SERVER_ERROR);
//        }
    }

    /**
     * Actualiza o Crea Piedefirma en un lugar específico
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Piedefirma",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Patch("/piedefirma/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Piedefirma
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada en Piedefirma
     */
    public function patchPiedefirmaAction(Request $request, $id) {
        try {
            return $this->container->get('sige.class.handler')->patch($this->get($id), $request->request->all(), $this->entityClass, $this->formType);
        } catch (\Exception $exc) {
            return new Response('{success:false, message:' . $exc->getMessage() . '}', $exc->getCode());
        }
    }

    /**
     * Eliminar Piedefirma dado un id
     *
     * @ApiDoc(
     *   resource = true,
     *   input = "SIGE\RecordsClassifiersBundle\Entity\Piedefirma",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/piedefirma/{id}")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Piedefirma
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Piedefirma
     */
    public function deletePiedefirmaAction(Request $request, $id) {
        try {
            $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Signfooter delete success');
            }
            return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Signfooter delete error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * Eliminar Piedefirma dado varios id
     *
     * @ApiDoc(
     *   resource = true,
     *   input ="SIGE\SecurityManagerBundle\Entity\Piedefirma",
     *   statusCodes = {
     *     204 = "Es retornado si no existen errores",
     *     400 = "Es retornado si existen errores"
     *   }
     * )
     * @Annotations\Delete("/piedefirma")
     * @param Request $request El objeto Request de la petición
     * @param int     $id      El id de Piedefirma
     *
     * @return FormTypeInterface|View
     *
     * @throws NotFoundHttpException No existe ninguna entrada de Entidad
     */
    public function deletePiesdefirmaAction(Request $request) {
        try {
            $params = json_decode($request->request->get('ids'));
            foreach ($params as $id) {
                $respuesta = $this->container->get('sige.class.handler')->delete($id, $this->entityClass, $this->formType);
            }
            if ($respuesta["success"]) {
                $respuesta["message"] = $this->get('translator')->trans('Signfooters delete success');
            }
            return new Response(json_encode(array("success" => true, "message" => $respuesta["message"])), HttpCode::HTTP_OK);
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Signfooters delete error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

    /**
     * @Annotations\Get("/export_signfooter")
     */
    public function exportSignfootersAction() {        
        try {
            
            $em = $this->getDoctrine()->getManager();

            // recuperamos los elementos de base de datos que queremos exportar
            $result = $em->getRepository('RecordsClassifiersBundle:Piedefirma')->findAll();

            // solicitamos el servicio 'phpexcel' y creamos el objeto vacío...
            $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

            // ...y le asignamos una serie de propiedades
            $phpExcelObject->getProperties()
                    ->setCreator("SIGE")
                    ->setLastModifiedBy("SIGE")
                    ->setTitle("Pies_de_Firma")
                    ->setSubject("Pies_de_Firma")
                    ->setDescription("Pies de Firma.");

            // establecemos como hoja activa la primera, y le asignamos un título
            $phpExcelObject->setActiveSheetIndex(0);
            $phpExcelObject->getActiveSheet()->setTitle('Pies de Firma.');

            // escribimos en distintas celdas del documento el título de los campos que vamos a exportar
            $phpExcelObject->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Código')
                    ->setCellValue('B1', 'Denominacion')
                    ->setCellValue('C1', 'Primer Firmante')
                    ->setCellValue('D1', 'Segundo Firmante')
                    ->setCellValue('E1', 'Nota de Clasificación');
            // fijamos un ancho a las distintas columnas
            $phpExcelObject->setActiveSheetIndex(0)
                    ->getColumnDimension('A')
                    ->setWidth(40);
            $phpExcelObject->setActiveSheetIndex(0)
                    ->getColumnDimension('B')
                    ->setWidth(40);
            $phpExcelObject->setActiveSheetIndex(0)
                    ->getColumnDimension('C')
                    ->setWidth(40);
            $phpExcelObject->setActiveSheetIndex(0)
                    ->getColumnDimension('D')
                    ->setWidth(40);
            $phpExcelObject->setActiveSheetIndex(0)
                    ->getColumnDimension('E')
                    ->setWidth(40);
            // recorremos los registros obtenidos de la consulta a base de datos escribiéndolos en las celdas correspondientes
            $row = 2;
            foreach ($result as $item) {
                $phpExcelObject->setActiveSheetIndex(0)
                        ->setCellValue('A' . $row, $item->getId())
                        ->setCellValue('B' . $row, $item->getDenominaciondelpie())
                        ->setCellValue('C' . $row, $item->getPrimercargo())
                        ->setCellValue('D' . $row, $item->getSegundocargo())
                        ->setCellValue('E' . $row, $item->getNotadecertificacion());


                $row++;
            }
            // se crea el writer
            $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel2007');
            // se crea el response
            $response = $this->get('phpexcel')->createStreamedResponse($writer);

            $response->headers->set('Content-Description', 'File Transfer');
            $response->headers->set('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
            $response->headers->set('Content-Disposition', 'attachment; filename = Pies_de_firma.xls');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expire', '0');
            $response->headers->set('Content-Transfer-Encoding', 'binary');
            
            if ($response["success"]) {
                $response["message"] = $this->get('translator')->trans('Signfooters export success');
            }
            
            return new Response(json_encode(array("success" => true, "message" => $response["message"])), HttpCode::HTTP_OK);
            
        } catch (\Exception $exc) {
            return new Response(json_encode(array("success" => true, "message" => $this->get('translator')->trans('Signfooters export error'))), HttpCode::HTTP_SERVER_ERROR);
        }
    }

}
