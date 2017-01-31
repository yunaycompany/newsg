<?php

/**
 * Created by PhpStorm.
 * User: Yosbel Fonseca Mendoza
 * Date: 10/05/16
 * Time: 10:32
 */

namespace SIGE\SigeBundle\HandlerRest;

use Doctrine\Common\Persistence\ObjectManager;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use FOS\RestBundle\View\View;
use UCI\Boson\ExcepcionesBundle\Exception\LocalException;
use Symfony\Component\Translation\TranslatorInterface;
use \Doctrine\ORM\Query\Parameter;
use \Doctrine\Common\Collections\ArrayCollection;

class ClassHandler implements ClassHandlerInterface {

    private $om;
    private $entityClass;
    private $repository;
    private $formFactory;
    private $formType;
    private $cache;
    private $translator;
    private $user;
    private $securityContext;

    public function __construct($securityContext, TranslatorInterface $translator, ObjectManager $om, FormFactoryInterface $formFactory, $cache) {
        $this->om = $om;
        $this->formFactory = $formFactory;
        $this->cache = $cache;
        $this->translator = $translator;
        $this->securityContext = $securityContext;
        $this->user = $securityContext->getToken()->getUser();
    }

    /**
     * Procesar el Formulario
     *
     * @param ClassInterface $class
     * @param array $parameters
     * @param String $method
     *
     * @return ClassInterface
     *
     * @throws InvalidFormException
     */
    private function processForm(ClassInterface $class, array $parameters, $entityClass, $method = "PUT") {
        try {
            $form = $this->formFactory->create(new $this->formType, $class, array('method' => $method));
            $form->submit($parameters, 'PATCH' !== $method);
            if ($form->isValid()) {
                $class = $form->getData();
                $this->om->persist($class);
                $this->om->flush();
                $respuesta["success"] = true;
                $respuesta["message"] = $this->translator->trans('OK');
                $respuesta["code"] = "200";
            } else {
                throw new LocalException("S1");
            }
        } catch (\Exception $e) {
            if ($e instanceof LocalException) {
                $respuesta["message"] = $e->getMessage();
                $respuesta["success"] = false;
                $respuesta["code"] = "400";
            } else {
                $respuesta["message"] = $e->getMessage();
            }
        }
        return $respuesta;
    }

    /**
     * Crea una instancia de una ClassInterface
     * @return ClassInterface
     */
    private function createClass() {
        return new $this->entityClass();
    }

    public function inicializeParams($entityClass, $formType) {
        $this->entityClass = $entityClass;
        $this->formType = $formType;
        $this->repository = $this->om->getRepository($this->entityClass);
    }

    public function putValues($entityClass, $obj, $parameters) {
        return $this->processForm($obj, $parameters, $entityClass, 'PATCH');
    }

    /**
     * Obtener la Entidad dado un id
     *
     * @param mixed $id
     * @param $entityClass
     * @param $formType
     * @return ClassInterface
     */
    public function get($id, $entityClass, $formType, $security = true) {
        $resource = explode("\\", $entityClass);
        $resource = $resource[3];
        $this->inicializeParams($entityClass, $formType);
        if ($this->user->hasPermission($resource, 2, $security)) {
            $class = $this->repository->find($id);
            $view = View::create();
            $view->setData($class);
            $view->setFormat("json");
            return $view;
        } else {
            throw new LocalException("S4", $resource);
        }
    }

    public function searchByLike($criteria, $tipo = 3) {
        //tipo3=%value%  tipo2=%value  tipo1=value%     
        $qb = $this->repository->createQueryBuilder($this->entityClass);
        $likes = array();
        $parameters = new ArrayCollection();
        foreach ($criteria as $key => $value) {
            $likes[] = $qb->expr()->like('e.' . $key, ':' . $key);
            if ($tipo == 3) {
                $parameters->add(new Parameter($key, '%' . $value . '%', \PDO::PARAM_STR));
            } else if ($tipo == 2) {
                $parameters->add(new Parameter($key, '%' . $value, \PDO::PARAM_STR));
            } else {
                $parameters->add(new Parameter($key, $value . '%', \PDO::PARAM_STR));
            }
        }

        $qb->select('e')
                ->from($this->entityClass, 'e')
                ->where($qb->expr()->orX()->addMultiple($likes))->setParameters($parameters);
        $query = $qb->getQuery();
        $result = $query->getResult();
        return $result;
    }

    /**
     *  Obtener una lista de la Entidad por Rango
     *
     * @param ParamFetcherInterface $paramFetcher
     * @param $entityClass
     * @param $formType
     *
     * @return View
     */
    public function allRange($paramFetcher, $entityClass, $formType, $filter = array(), $search_type = 0, $security = true) {
        $resource = explode("\\", $entityClass);
        $resource = $resource[3];
        if ($this->user->hasPermission($resource, 2, $security)) {
            $this->inicializeParams($entityClass, $formType);
            $offset = $paramFetcher != null ? $paramFetcher->get('start') : null;
            $offset = null == $offset ? 0 : $offset;
            $limit = $paramFetcher != null && $paramFetcher->get('limit') ? $paramFetcher->get('limit') : 5;
            if ($search_type != 1) {
                $class = $this->repository->findBy($filter, null, $limit, $offset);
            } else {
                $class = $this->searchByLike($filter);
            }
            $view = View::create();
            $view->setData($class);
            $view->setFormat("json");
            return $view;
        } else {
            throw new LocalException("S4", $resource);
        }
    }

    /**
     *  Obtener una lista de la Entidad para el Grid
     *
     * @param $entityClass
     * @param $formType
     *
     * @return View
     */
    public function all($entityClass, $formType, $security = true) {
        $resource = explode("\\", $entityClass);
        $resource = $resource[3];
        if ($this->user->hasPermission($resource, 2, $security)) {
            $this->inicializeParams($entityClass, $formType);
            $all = $this->repository->findAll();
            $view = View::create();
            $view->setData($all);
            $view->setFormat("json");
            return $view;
        } else {
            throw new LocalException("S4", $resource);
        }
    }

    /**
     * Adicionar una entrada en la Entidad
     *
     * @param array $parameters
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function post(array $parameters, $entityClass, $formType, $security = true) {
        $resource = explode("\\", $entityClass);
        $resource = $resource[3];
        if ($this->user->hasPermission($resource, 1, $security)) {
            try {
                $this->inicializeParams($entityClass, $formType);
                $class = $this->createClass();
                return $this->processForm($class, $parameters, $entityClass, 'POST');
            } catch (InvalidFormException $exception) {
                try {
                    throw new LocalException("S2");
                } catch (\Exception $e) {
                    if ($e instanceof LocalException) {
                        $respuesta["message"] = $e->getMessage();
                        $respuesta["success"] = false;
                        $respuesta["code"] = "400";
                    } else {
                        $respuesta["message"] = $e->getMessage();
                    }
                }
            }
            return $respuesta;
        } else {
            throw new LocalException("S4", $resource);
        }
    }

    /**
     * Editar la Entidad
     *
     * @param ClassInterface $class
     * @param array $parameters
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function put($class, array $parameters, $entityClass, $formType, $security = true) {
        $resource = explode("\\", $entityClass);
        $resource = $resource[3];
        if ($this->user->hasPermission($resource, 4, $security)) {
            try {
                $this->inicializeParams($entityClass, $formType);
                $parameters['id'] = $class->getId();
                return $this->putValues($entityClass, $class, $parameters);
            } catch (InvalidFormException $exception) {
                try {
                    throw new LocalException("S2");
                } catch (\Exception $e) {
                    if ($e instanceof LocalException) {
                        $respuesta["message"] = $e->getMessage();
                        $respuesta["success"] = false;
                        $respuesta["code"] = "400";
                    } else {
                        $respuesta["message"] = $e->getMessage();
                    }
                }
            }
            return $respuesta;
        } else {
            throw new LocalException("S4", $resource);
        }
    }

    /**
     * Actualizar la Entidad parcialmente
     *
     * @param ClassInterface $class
     * @param array $parameters
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function patch($class, array $parameters, $entityClass, $formType, $security = true) {
        $resource = explode("\\", $entityClass);
        $resource = $resource[3];
        if ($this->user->hasPermission($resource, 4, $security)) {
            try {
                $this->inicializeParams($entityClass, $formType);
                $parameters['id'] = $class->getId();
                return $this->putValues($entityClass, $class, $parameters);
            } catch (InvalidFormException $exception) {
                try {
                    throw new LocalException("S2");
                } catch (\Exception $e) {
                    if ($e instanceof LocalException) {
                        $respuesta["message"] = $e->getMessage();
                        $respuesta["success"] = false;
                        $respuesta["code"] = "400";
                    } else {
                        $respuesta["message"] = $e->getMessage();
                    }
                }
            }
            return $respuesta;
        } else {
            throw new LocalException("S4", $resource);
        }
    }

    /**
     * Eliminar una entrada de la Entidad dado un id
     *
     * @param int $id
     * @param $entityClass
     * @param $formType
     * @return View
     */
    public function delete($id, $entityClass, $formType, $security = true) {
        $resource = explode("\\", $entityClass);
        $resource = $resource[3];
        if ($this->user->hasPermission($resource, 4, $security)) {
            try {
                $this->inicializeParams($entityClass, $formType);
                $temp = $this->repository->find($id);
                if (!$temp) {
                    throw new LocalException("S3");
                }
                $this->om->remove($temp);
                $this->om->flush();
                $respuesta["success"] = true;
                $respuesta["message"] = $this->translator->trans('OK');
                $respuesta["code"] = "200";
            } catch (InvalidFormException $exception) {
                try {
                    throw new LocalException("S2");
                } catch (\Exception $e) {
                    if ($e instanceof LocalException) {
                        $respuesta["message"] = $e->getMessage();
                        $respuesta["success"] = false;
                        $respuesta["code"] = "400";
                    } else {
                        $respuesta["message"] = $e->getMessage();
                    }
                }
            } catch (LocalException $e) {
                $respuesta["message"] = $e->getMessage();
                $respuesta["success"] = false;
                $respuesta["code"] = "400";
            }
            return $respuesta;
        } else {
            throw new LocalException("S4", $resource);
        }
    }

}
