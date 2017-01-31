<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // sige_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'sige_homepage');
            }

            return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\DefaultController::indexAction',  '_route' => 'sige_homepage',);
        }

        if (0 === strpos($pathinfo, '/estado')) {
            // sige_sige_estado_getestados
            if ($pathinfo === '/estado') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sige_sige_estado_getestados;
                }

                return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\EstadoController::getEstadosAction',  '_route' => 'sige_sige_estado_getestados',);
            }
            not_sige_sige_estado_getestados:

            // sige_sige_estado_getestado
            if (preg_match('#^/estado/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sige_sige_estado_getestado;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_sige_estado_getestado')), array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\EstadoController::getEstadoAction',));
            }
            not_sige_sige_estado_getestado:

            // sige_sige_estado_postestado
            if ($pathinfo === '/estado') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_sige_sige_estado_postestado;
                }

                return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\EstadoController::postEstadoAction',  '_route' => 'sige_sige_estado_postestado',);
            }
            not_sige_sige_estado_postestado:

            // sige_sige_estado_putestado
            if (preg_match('#^/estado/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_sige_sige_estado_putestado;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_sige_estado_putestado')), array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\EstadoController::putEstadoAction',));
            }
            not_sige_sige_estado_putestado:

            // sige_sige_estado_patchestado
            if (preg_match('#^/estado/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PATCH') {
                    $allow[] = 'PATCH';
                    goto not_sige_sige_estado_patchestado;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_sige_estado_patchestado')), array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\EstadoController::patchEstadoAction',));
            }
            not_sige_sige_estado_patchestado:

            // sige_sige_estado_deleteestado
            if (preg_match('#^/estado/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_sige_sige_estado_deleteestado;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_sige_estado_deleteestado')), array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\EstadoController::deleteEstadoAction',));
            }
            not_sige_sige_estado_deleteestado:

            // sige_sige_estado_deleteestados
            if ($pathinfo === '/estado') {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_sige_sige_estado_deleteestados;
                }

                return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\EstadoController::deleteEstadosAction',  '_route' => 'sige_sige_estado_deleteestados',);
            }
            not_sige_sige_estado_deleteestados:

        }

        if (0 === strpos($pathinfo, '/periodicidad')) {
            // sige_sige_periodicidad_getperiodicidads
            if ($pathinfo === '/periodicidad') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sige_sige_periodicidad_getperiodicidads;
                }

                return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\PeriodicidadController::getPeriodicidadsAction',  '_route' => 'sige_sige_periodicidad_getperiodicidads',);
            }
            not_sige_sige_periodicidad_getperiodicidads:

            // sige_sige_periodicidad_getperiodicidad
            if (preg_match('#^/periodicidad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sige_sige_periodicidad_getperiodicidad;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_sige_periodicidad_getperiodicidad')), array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\PeriodicidadController::getPeriodicidadAction',));
            }
            not_sige_sige_periodicidad_getperiodicidad:

            // sige_sige_periodicidad_postperiodicidad
            if ($pathinfo === '/periodicidad') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_sige_sige_periodicidad_postperiodicidad;
                }

                return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\PeriodicidadController::postPeriodicidadAction',  '_route' => 'sige_sige_periodicidad_postperiodicidad',);
            }
            not_sige_sige_periodicidad_postperiodicidad:

            // sige_sige_periodicidad_putperiodicidad
            if (preg_match('#^/periodicidad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_sige_sige_periodicidad_putperiodicidad;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_sige_periodicidad_putperiodicidad')), array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\PeriodicidadController::putPeriodicidadAction',));
            }
            not_sige_sige_periodicidad_putperiodicidad:

            // sige_sige_periodicidad_patchperiodicidad
            if (preg_match('#^/periodicidad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PATCH') {
                    $allow[] = 'PATCH';
                    goto not_sige_sige_periodicidad_patchperiodicidad;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_sige_periodicidad_patchperiodicidad')), array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\PeriodicidadController::patchPeriodicidadAction',));
            }
            not_sige_sige_periodicidad_patchperiodicidad:

            // sige_sige_periodicidad_deleteperiodicidad
            if (preg_match('#^/periodicidad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_sige_sige_periodicidad_deleteperiodicidad;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_sige_periodicidad_deleteperiodicidad')), array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\PeriodicidadController::deletePeriodicidadAction',));
            }
            not_sige_sige_periodicidad_deleteperiodicidad:

            // sige_sige_periodicidad_deleteperiodicidads
            if ($pathinfo === '/periodicidad') {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_sige_sige_periodicidad_deleteperiodicidads;
                }

                return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\PeriodicidadController::deletePeriodicidadsAction',  '_route' => 'sige_sige_periodicidad_deleteperiodicidads',);
            }
            not_sige_sige_periodicidad_deleteperiodicidads:

        }

        if (0 === strpos($pathinfo, '/log')) {
            // login
            if ($pathinfo === '/login') {
                return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
            }

            // logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'SIGE\\SigeBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'logout',);
            }

        }

        // discipline_homepage
        if (rtrim($pathinfo, '/') === '/discipline') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'discipline_homepage');
            }

            return array (  '_controller' => 'SIGE\\DisciplineBundle\\Controller\\DefaultController::indexAction',  '_route' => 'discipline_homepage',);
        }

        if (0 === strpos($pathinfo, '/security_manager')) {
            if (0 === strpos($pathinfo, '/security_manager/a')) {
                if (0 === strpos($pathinfo, '/security_manager/app')) {
                    // sige_securitymanager_app_getapps
                    if ($pathinfo === '/security_manager/app') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_app_getapps;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AppController::getAppsAction',  '_route' => 'sige_securitymanager_app_getapps',);
                    }
                    not_sige_securitymanager_app_getapps:

                    // sige_securitymanager_app_getapp
                    if (preg_match('#^/security_manager/app/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_app_getapp;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_app_getapp')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AppController::getAppAction',));
                    }
                    not_sige_securitymanager_app_getapp:

                    // sige_securitymanager_app_postapp
                    if ($pathinfo === '/security_manager/app') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_securitymanager_app_postapp;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AppController::postAppAction',  '_route' => 'sige_securitymanager_app_postapp',);
                    }
                    not_sige_securitymanager_app_postapp:

                    // sige_securitymanager_app_putapp
                    if (preg_match('#^/security_manager/app/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_sige_securitymanager_app_putapp;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_app_putapp')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AppController::putAppAction',));
                    }
                    not_sige_securitymanager_app_putapp:

                    // sige_securitymanager_app_patchapp
                    if (preg_match('#^/security_manager/app/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PATCH') {
                            $allow[] = 'PATCH';
                            goto not_sige_securitymanager_app_patchapp;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_app_patchapp')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AppController::patchAppAction',));
                    }
                    not_sige_securitymanager_app_patchapp:

                    // sige_securitymanager_app_deleteapp
                    if (preg_match('#^/security_manager/app/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_securitymanager_app_deleteapp;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_app_deleteapp')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AppController::deleteAppAction',));
                    }
                    not_sige_securitymanager_app_deleteapp:

                }

                if (0 === strpos($pathinfo, '/security_manager/authtype')) {
                    // sige_securitymanager_authtype_getauthtypes
                    if ($pathinfo === '/security_manager/authtype') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_authtype_getauthtypes;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AuthTypeController::getAuthTypesAction',  '_route' => 'sige_securitymanager_authtype_getauthtypes',);
                    }
                    not_sige_securitymanager_authtype_getauthtypes:

                    // sige_securitymanager_authtype_getauthtype
                    if (preg_match('#^/security_manager/authtype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_authtype_getauthtype;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_authtype_getauthtype')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AuthTypeController::getAuthTypeAction',));
                    }
                    not_sige_securitymanager_authtype_getauthtype:

                    // sige_securitymanager_authtype_postauthtype
                    if ($pathinfo === '/security_manager/authtype') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_securitymanager_authtype_postauthtype;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AuthTypeController::postAuthTypeAction',  '_route' => 'sige_securitymanager_authtype_postauthtype',);
                    }
                    not_sige_securitymanager_authtype_postauthtype:

                    // sige_securitymanager_authtype_putauthtype
                    if (preg_match('#^/security_manager/authtype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_sige_securitymanager_authtype_putauthtype;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_authtype_putauthtype')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AuthTypeController::putAuthTypeAction',));
                    }
                    not_sige_securitymanager_authtype_putauthtype:

                    // sige_securitymanager_authtype_patchauthtype
                    if (preg_match('#^/security_manager/authtype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PATCH') {
                            $allow[] = 'PATCH';
                            goto not_sige_securitymanager_authtype_patchauthtype;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_authtype_patchauthtype')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AuthTypeController::patchAuthTypeAction',));
                    }
                    not_sige_securitymanager_authtype_patchauthtype:

                    // sige_securitymanager_authtype_deleteauthtype
                    if (preg_match('#^/security_manager/authtype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_securitymanager_authtype_deleteauthtype;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_authtype_deleteauthtype')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AuthTypeController::deleteAuthTypeAction',));
                    }
                    not_sige_securitymanager_authtype_deleteauthtype:

                }

                // sige_securitymanager_authtype_deleteauthtypes
                if ($pathinfo === '/security_manager/allauthtype') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_securitymanager_authtype_deleteauthtypes;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\AuthTypeController::deleteAuthTypesAction',  '_route' => 'sige_securitymanager_authtype_deleteauthtypes',);
                }
                not_sige_securitymanager_authtype_deleteauthtypes:

            }

            if (0 === strpos($pathinfo, '/security_manager/ipaddress')) {
                // sige_securitymanager_ipaddress_getipaddresss
                if ($pathinfo === '/security_manager/ipaddress') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_securitymanager_ipaddress_getipaddresss;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\IpAddressController::getIpAddresssAction',  '_route' => 'sige_securitymanager_ipaddress_getipaddresss',);
                }
                not_sige_securitymanager_ipaddress_getipaddresss:

                // sige_securitymanager_ipaddress_getipaddress
                if (preg_match('#^/security_manager/ipaddress/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_securitymanager_ipaddress_getipaddress;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_ipaddress_getipaddress')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\IpAddressController::getIpAddressAction',));
                }
                not_sige_securitymanager_ipaddress_getipaddress:

                // sige_securitymanager_ipaddress_postipaddress
                if ($pathinfo === '/security_manager/ipaddress') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_securitymanager_ipaddress_postipaddress;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\IpAddressController::postIpAddressAction',  '_route' => 'sige_securitymanager_ipaddress_postipaddress',);
                }
                not_sige_securitymanager_ipaddress_postipaddress:

                // sige_securitymanager_ipaddress_putipaddress
                if (preg_match('#^/security_manager/ipaddress/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_securitymanager_ipaddress_putipaddress;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_ipaddress_putipaddress')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\IpAddressController::putIpAddressAction',));
                }
                not_sige_securitymanager_ipaddress_putipaddress:

                // sige_securitymanager_ipaddress_patchipaddress
                if (preg_match('#^/security_manager/ipaddress/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_securitymanager_ipaddress_patchipaddress;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_ipaddress_patchipaddress')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\IpAddressController::patchIpAddressAction',));
                }
                not_sige_securitymanager_ipaddress_patchipaddress:

                // sige_securitymanager_ipaddress_deleteipaddress
                if (preg_match('#^/security_manager/ipaddress/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_securitymanager_ipaddress_deleteipaddress;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_ipaddress_deleteipaddress')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\IpAddressController::deleteIpAddressAction',));
                }
                not_sige_securitymanager_ipaddress_deleteipaddress:

                // sige_securitymanager_ipaddress_deleteipaddresss
                if ($pathinfo === '/security_manager/ipaddress') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_securitymanager_ipaddress_deleteipaddresss;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\IpAddressController::deleteIpAddresssAction',  '_route' => 'sige_securitymanager_ipaddress_deleteipaddresss',);
                }
                not_sige_securitymanager_ipaddress_deleteipaddresss:

            }

            if (0 === strpos($pathinfo, '/security_manager/ldapconnections')) {
                // sige_securitymanager_ldapconnections_getldapconnectionss
                if ($pathinfo === '/security_manager/ldapconnections') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_securitymanager_ldapconnections_getldapconnectionss;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\LdapConnectionsController::getLdapConnectionssAction',  '_route' => 'sige_securitymanager_ldapconnections_getldapconnectionss',);
                }
                not_sige_securitymanager_ldapconnections_getldapconnectionss:

                // sige_securitymanager_ldapconnections_getldapconnections
                if (preg_match('#^/security_manager/ldapconnections/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_securitymanager_ldapconnections_getldapconnections;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_ldapconnections_getldapconnections')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\LdapConnectionsController::getLdapConnectionsAction',));
                }
                not_sige_securitymanager_ldapconnections_getldapconnections:

                // sige_securitymanager_ldapconnections_postldapconnections
                if ($pathinfo === '/security_manager/ldapconnections') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_securitymanager_ldapconnections_postldapconnections;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\LdapConnectionsController::postLdapConnectionsAction',  '_route' => 'sige_securitymanager_ldapconnections_postldapconnections',);
                }
                not_sige_securitymanager_ldapconnections_postldapconnections:

                // sige_securitymanager_ldapconnections_putldapconnections
                if (preg_match('#^/security_manager/ldapconnections/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_securitymanager_ldapconnections_putldapconnections;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_ldapconnections_putldapconnections')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\LdapConnectionsController::putLdapConnectionsAction',));
                }
                not_sige_securitymanager_ldapconnections_putldapconnections:

                // sige_securitymanager_ldapconnections_patchldapconnections
                if (preg_match('#^/security_manager/ldapconnections/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_securitymanager_ldapconnections_patchldapconnections;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_ldapconnections_patchldapconnections')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\LdapConnectionsController::patchLdapConnectionsAction',));
                }
                not_sige_securitymanager_ldapconnections_patchldapconnections:

                // sige_securitymanager_ldapconnections_deleteldapconnections
                if (preg_match('#^/security_manager/ldapconnections/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_securitymanager_ldapconnections_deleteldapconnections;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_ldapconnections_deleteldapconnections')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\LdapConnectionsController::deleteLdapConnectionsAction',));
                }
                not_sige_securitymanager_ldapconnections_deleteldapconnections:

                // sige_securitymanager_ldapconnections_deleteldapconnectionss
                if ($pathinfo === '/security_manager/ldapconnections') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_securitymanager_ldapconnections_deleteldapconnectionss;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\LdapConnectionsController::deleteLdapConnectionssAction',  '_route' => 'sige_securitymanager_ldapconnections_deleteldapconnectionss',);
                }
                not_sige_securitymanager_ldapconnections_deleteldapconnectionss:

                // sige_securitymanager_ldapconnections_getdatafromldap
                if ($pathinfo === '/security_manager/ldapconnections/usuario') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_securitymanager_ldapconnections_getdatafromldap;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\LdapConnectionsController::getDatafromLDAP',  '_route' => 'sige_securitymanager_ldapconnections_getdatafromldap',);
                }
                not_sige_securitymanager_ldapconnections_getdatafromldap:

            }

            if (0 === strpos($pathinfo, '/security_manager/rol')) {
                // sige_securitymanager_rol_getrols
                if ($pathinfo === '/security_manager/rol') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_securitymanager_rol_getrols;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RolController::getRolsAction',  '_route' => 'sige_securitymanager_rol_getrols',);
                }
                not_sige_securitymanager_rol_getrols:

                // sige_securitymanager_rol_getrol
                if (preg_match('#^/security_manager/rol/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_securitymanager_rol_getrol;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_rol_getrol')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RolController::getRolAction',));
                }
                not_sige_securitymanager_rol_getrol:

                // sige_securitymanager_rol_postrol
                if ($pathinfo === '/security_manager/rol') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_securitymanager_rol_postrol;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RolController::postRolAction',  '_route' => 'sige_securitymanager_rol_postrol',);
                }
                not_sige_securitymanager_rol_postrol:

                // sige_securitymanager_rol_putrol
                if (preg_match('#^/security_manager/rol/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_securitymanager_rol_putrol;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_rol_putrol')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RolController::putRolAction',));
                }
                not_sige_securitymanager_rol_putrol:

                // sige_securitymanager_rol_patchrol
                if (preg_match('#^/security_manager/rol/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_securitymanager_rol_patchrol;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_rol_patchrol')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RolController::patchRolAction',));
                }
                not_sige_securitymanager_rol_patchrol:

                // sige_securitymanager_rol_deleterol
                if (preg_match('#^/security_manager/rol/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_securitymanager_rol_deleterol;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_rol_deleterol')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RolController::deleteRolAction',));
                }
                not_sige_securitymanager_rol_deleterol:

                // sige_securitymanager_rol_deleteroles
                if ($pathinfo === '/security_manager/rol') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_securitymanager_rol_deleteroles;
                    }

                    return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RolController::deleteRolesAction',  '_route' => 'sige_securitymanager_rol_deleteroles',);
                }
                not_sige_securitymanager_rol_deleteroles:

                if (0 === strpos($pathinfo, '/security_manager/rolesusers')) {
                    // sige_securitymanager_roleuser_getrolesusers
                    if ($pathinfo === '/security_manager/rolesusers') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_roleuser_getrolesusers;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RoleUserController::getRolesUsersAction',  '_route' => 'sige_securitymanager_roleuser_getrolesusers',);
                    }
                    not_sige_securitymanager_roleuser_getrolesusers:

                    // sige_securitymanager_roleuser_getrol
                    if (preg_match('#^/security_manager/rolesusers/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_roleuser_getrol;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_roleuser_getrol')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RoleUserController::getRolAction',));
                    }
                    not_sige_securitymanager_roleuser_getrol:

                    // sige_securitymanager_roleuser_postrol
                    if ($pathinfo === '/security_manager/rolesusers') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_securitymanager_roleuser_postrol;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RoleUserController::postRolAction',  '_route' => 'sige_securitymanager_roleuser_postrol',);
                    }
                    not_sige_securitymanager_roleuser_postrol:

                    // sige_securitymanager_roleuser_putrol
                    if (preg_match('#^/security_manager/rolesusers/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_sige_securitymanager_roleuser_putrol;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_roleuser_putrol')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RoleUserController::putRolAction',));
                    }
                    not_sige_securitymanager_roleuser_putrol:

                    // sige_securitymanager_roleuser_patchrol
                    if (preg_match('#^/security_manager/rolesusers/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PATCH') {
                            $allow[] = 'PATCH';
                            goto not_sige_securitymanager_roleuser_patchrol;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_roleuser_patchrol')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RoleUserController::patchRolAction',));
                    }
                    not_sige_securitymanager_roleuser_patchrol:

                    // sige_securitymanager_roleuser_deleterol
                    if (preg_match('#^/security_manager/rolesusers/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_securitymanager_roleuser_deleterol;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_roleuser_deleterol')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RoleUserController::deleteRolAction',));
                    }
                    not_sige_securitymanager_roleuser_deleterol:

                    // sige_securitymanager_roleuser_deleteroles
                    if ($pathinfo === '/security_manager/rolesusers') {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_securitymanager_roleuser_deleteroles;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\RoleUserController::deleteRolesAction',  '_route' => 'sige_securitymanager_roleuser_deleteroles',);
                    }
                    not_sige_securitymanager_roleuser_deleteroles:

                }

            }

            if (0 === strpos($pathinfo, '/security_manager/us')) {
                if (0 === strpos($pathinfo, '/security_manager/userprofile')) {
                    // sige_securitymanager_userprofile_getuserprofiles
                    if ($pathinfo === '/security_manager/userprofile') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_userprofile_getuserprofiles;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UserProfileController::getUserProfilesAction',  '_route' => 'sige_securitymanager_userprofile_getuserprofiles',);
                    }
                    not_sige_securitymanager_userprofile_getuserprofiles:

                    // sige_securitymanager_userprofile_getuserprofile
                    if (preg_match('#^/security_manager/userprofile/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_userprofile_getuserprofile;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_userprofile_getuserprofile')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UserProfileController::getUserProfileAction',));
                    }
                    not_sige_securitymanager_userprofile_getuserprofile:

                    // sige_securitymanager_userprofile_postuserprofile
                    if ($pathinfo === '/security_manager/userprofile') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_securitymanager_userprofile_postuserprofile;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UserProfileController::postUserProfileAction',  '_route' => 'sige_securitymanager_userprofile_postuserprofile',);
                    }
                    not_sige_securitymanager_userprofile_postuserprofile:

                    // sige_securitymanager_userprofile_putuserprofile
                    if (preg_match('#^/security_manager/userprofile/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_sige_securitymanager_userprofile_putuserprofile;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_userprofile_putuserprofile')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UserProfileController::putUserProfileAction',));
                    }
                    not_sige_securitymanager_userprofile_putuserprofile:

                    // sige_securitymanager_userprofile_patchuserprofile
                    if (preg_match('#^/security_manager/userprofile/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PATCH') {
                            $allow[] = 'PATCH';
                            goto not_sige_securitymanager_userprofile_patchuserprofile;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_userprofile_patchuserprofile')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UserProfileController::patchUserProfileAction',));
                    }
                    not_sige_securitymanager_userprofile_patchuserprofile:

                    // sige_securitymanager_userprofile_deleteuserprofile
                    if (preg_match('#^/security_manager/userprofile/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_securitymanager_userprofile_deleteuserprofile;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_userprofile_deleteuserprofile')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UserProfileController::deleteUserProfileAction',));
                    }
                    not_sige_securitymanager_userprofile_deleteuserprofile:

                    // sige_securitymanager_userprofile_deleteuserprofiles
                    if ($pathinfo === '/security_manager/userprofile') {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_securitymanager_userprofile_deleteuserprofiles;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UserProfileController::deleteUserProfilesAction',  '_route' => 'sige_securitymanager_userprofile_deleteuserprofiles',);
                    }
                    not_sige_securitymanager_userprofile_deleteuserprofiles:

                }

                if (0 === strpos($pathinfo, '/security_manager/usuario')) {
                    // sige_securitymanager_usuario_getusuarios
                    if ($pathinfo === '/security_manager/usuario') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_usuario_getusuarios;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UsuarioController::getUsuariosAction',  '_route' => 'sige_securitymanager_usuario_getusuarios',);
                    }
                    not_sige_securitymanager_usuario_getusuarios:

                    // sige_securitymanager_usuario_getusuario
                    if (preg_match('#^/security_manager/usuario/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_securitymanager_usuario_getusuario;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_usuario_getusuario')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UsuarioController::getUsuarioAction',));
                    }
                    not_sige_securitymanager_usuario_getusuario:

                    // sige_securitymanager_usuario_postusuario
                    if ($pathinfo === '/security_manager/usuario') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_securitymanager_usuario_postusuario;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UsuarioController::postUsuarioAction',  '_route' => 'sige_securitymanager_usuario_postusuario',);
                    }
                    not_sige_securitymanager_usuario_postusuario:

                    // sige_securitymanager_usuario_putusuario
                    if (preg_match('#^/security_manager/usuario/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_sige_securitymanager_usuario_putusuario;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_usuario_putusuario')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UsuarioController::putUsuarioAction',));
                    }
                    not_sige_securitymanager_usuario_putusuario:

                    // sige_securitymanager_usuario_patchusuario
                    if (preg_match('#^/security_manager/usuario/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PATCH') {
                            $allow[] = 'PATCH';
                            goto not_sige_securitymanager_usuario_patchusuario;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_usuario_patchusuario')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UsuarioController::patchUsuarioAction',));
                    }
                    not_sige_securitymanager_usuario_patchusuario:

                    // sige_securitymanager_usuario_deleteusuario
                    if (preg_match('#^/security_manager/usuario/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_securitymanager_usuario_deleteusuario;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_securitymanager_usuario_deleteusuario')), array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UsuarioController::deleteUsuarioAction',));
                    }
                    not_sige_securitymanager_usuario_deleteusuario:

                    // sige_securitymanager_usuario_deleteusuarios
                    if ($pathinfo === '/security_manager/usuario') {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_securitymanager_usuario_deleteusuarios;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UsuarioController::deleteUsuariosAction',  '_route' => 'sige_securitymanager_usuario_deleteusuarios',);
                    }
                    not_sige_securitymanager_usuario_deleteusuarios:

                    // sige_securitymanager_usuario_importusuario
                    if ($pathinfo === '/security_manager/usuario/import') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_securitymanager_usuario_importusuario;
                        }

                        return array (  '_controller' => 'SIGE\\SecurityManagerBundle\\Controller\\UsuarioController::importUsuarioAction',  '_route' => 'sige_securitymanager_usuario_importusuario',);
                    }
                    not_sige_securitymanager_usuario_importusuario:

                }

            }

        }

        if (0 === strpos($pathinfo, '/records_classifiers')) {
            // records_classifiers_homepage
            if (rtrim($pathinfo, '/') === '/records_classifiers') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'records_classifiers_homepage');
                }

                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\DefaultController::indexAction',  '_route' => 'records_classifiers_homepage',);
            }

            if (0 === strpos($pathinfo, '/records_classifiers/aspecto')) {
                // sige_recordsclassifiers_aspecto_getaspectos
                if ($pathinfo === '/records_classifiers/aspecto') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_aspecto_getaspectos;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\AspectoController::getAspectosAction',  '_route' => 'sige_recordsclassifiers_aspecto_getaspectos',);
                }
                not_sige_recordsclassifiers_aspecto_getaspectos:

                // sige_recordsclassifiers_aspecto_getaspecto
                if (preg_match('#^/records_classifiers/aspecto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_aspecto_getaspecto;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_aspecto_getaspecto')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\AspectoController::getAspectoAction',));
                }
                not_sige_recordsclassifiers_aspecto_getaspecto:

                // sige_recordsclassifiers_aspecto_postaspecto
                if ($pathinfo === '/records_classifiers/aspecto') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_aspecto_postaspecto;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\AspectoController::postAspectoAction',  '_route' => 'sige_recordsclassifiers_aspecto_postaspecto',);
                }
                not_sige_recordsclassifiers_aspecto_postaspecto:

                // sige_recordsclassifiers_aspecto_putaspecto
                if (preg_match('#^/records_classifiers/aspecto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_recordsclassifiers_aspecto_putaspecto;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_aspecto_putaspecto')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\AspectoController::putAspectoAction',));
                }
                not_sige_recordsclassifiers_aspecto_putaspecto:

                // sige_recordsclassifiers_aspecto_patchaspecto
                if (preg_match('#^/records_classifiers/aspecto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_recordsclassifiers_aspecto_patchaspecto;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_aspecto_patchaspecto')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\AspectoController::patchAspectoAction',));
                }
                not_sige_recordsclassifiers_aspecto_patchaspecto:

                // sige_recordsclassifiers_aspecto_deleteaspecto
                if (preg_match('#^/records_classifiers/aspecto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_aspecto_deleteaspecto;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_aspecto_deleteaspecto')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\AspectoController::deleteAspectoAction',));
                }
                not_sige_recordsclassifiers_aspecto_deleteaspecto:

                // sige_recordsclassifiers_aspecto_deleteaspectos
                if ($pathinfo === '/records_classifiers/aspecto') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_aspecto_deleteaspectos;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\AspectoController::deleteAspectosAction',  '_route' => 'sige_recordsclassifiers_aspecto_deleteaspectos',);
                }
                not_sige_recordsclassifiers_aspecto_deleteaspectos:

            }

            if (0 === strpos($pathinfo, '/records_classifiers/c')) {
                if (0 === strpos($pathinfo, '/records_classifiers/centroinformante')) {
                    // sige_recordsclassifiers_centroinformante_getcentroinformantes
                    if ($pathinfo === '/records_classifiers/centroinformante') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_recordsclassifiers_centroinformante_getcentroinformantes;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\CentroinformanteController::getCentroinformantesAction',  '_route' => 'sige_recordsclassifiers_centroinformante_getcentroinformantes',);
                    }
                    not_sige_recordsclassifiers_centroinformante_getcentroinformantes:

                    // sige_recordsclassifiers_centroinformante_getcentroinformante
                    if (preg_match('#^/records_classifiers/centroinformante/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_recordsclassifiers_centroinformante_getcentroinformante;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_centroinformante_getcentroinformante')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\CentroinformanteController::getCentroinformanteAction',));
                    }
                    not_sige_recordsclassifiers_centroinformante_getcentroinformante:

                    // sige_recordsclassifiers_centroinformante_postcentroinformante
                    if ($pathinfo === '/records_classifiers/centroinformante') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_recordsclassifiers_centroinformante_postcentroinformante;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\CentroinformanteController::postCentroinformanteAction',  '_route' => 'sige_recordsclassifiers_centroinformante_postcentroinformante',);
                    }
                    not_sige_recordsclassifiers_centroinformante_postcentroinformante:

                    // sige_recordsclassifiers_centroinformante_putcentroinformante
                    if (preg_match('#^/records_classifiers/centroinformante/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_sige_recordsclassifiers_centroinformante_putcentroinformante;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_centroinformante_putcentroinformante')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\CentroinformanteController::putCentroinformanteAction',));
                    }
                    not_sige_recordsclassifiers_centroinformante_putcentroinformante:

                    // sige_recordsclassifiers_centroinformante_patchcentroinformante
                    if (preg_match('#^/records_classifiers/centroinformante/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PATCH') {
                            $allow[] = 'PATCH';
                            goto not_sige_recordsclassifiers_centroinformante_patchcentroinformante;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_centroinformante_patchcentroinformante')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\CentroinformanteController::patchCentroinformanteAction',));
                    }
                    not_sige_recordsclassifiers_centroinformante_patchcentroinformante:

                    // sige_recordsclassifiers_centroinformante_deletecentroinformante
                    if (preg_match('#^/records_classifiers/centroinformante/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_recordsclassifiers_centroinformante_deletecentroinformante;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_centroinformante_deletecentroinformante')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\CentroinformanteController::deleteCentroinformanteAction',));
                    }
                    not_sige_recordsclassifiers_centroinformante_deletecentroinformante:

                    // sige_recordsclassifiers_centroinformante_deletecentroinformantes
                    if ($pathinfo === '/records_classifiers/centroinformante') {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_recordsclassifiers_centroinformante_deletecentroinformantes;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\CentroinformanteController::deleteCentroinformantesAction',  '_route' => 'sige_recordsclassifiers_centroinformante_deletecentroinformantes',);
                    }
                    not_sige_recordsclassifiers_centroinformante_deletecentroinformantes:

                }

                if (0 === strpos($pathinfo, '/records_classifiers/clasifica')) {
                    if (0 === strpos($pathinfo, '/records_classifiers/clasificacion')) {
                        if (0 === strpos($pathinfo, '/records_classifiers/clasificacion/clasificador')) {
                            // sige_recordsclassifiers_clasificacion_getclasificacions
                            if ($pathinfo === '/records_classifiers/clasificacion/clasificadorl;k') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_sige_recordsclassifiers_clasificacion_getclasificacions;
                                }

                                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionController::getClasificacionsAction',  '_route' => 'sige_recordsclassifiers_clasificacion_getclasificacions',);
                            }
                            not_sige_recordsclassifiers_clasificacion_getclasificacions:

                            // sige_recordsclassifiers_clasificacion_getclasificationsbyclasificator
                            if ($pathinfo === '/records_classifiers/clasificacion/clasificador') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_sige_recordsclassifiers_clasificacion_getclasificationsbyclasificator;
                                }

                                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionController::getClasificationsByClasificatorAction',  '_route' => 'sige_recordsclassifiers_clasificacion_getclasificationsbyclasificator',);
                            }
                            not_sige_recordsclassifiers_clasificacion_getclasificationsbyclasificator:

                        }

                        // sige_recordsclassifiers_clasificacion_getclasificacion
                        if (preg_match('#^/records_classifiers/clasificacion/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_sige_recordsclassifiers_clasificacion_getclasificacion;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificacion_getclasificacion')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionController::getClasificacionAction',));
                        }
                        not_sige_recordsclassifiers_clasificacion_getclasificacion:

                        if (0 === strpos($pathinfo, '/records_classifiers/clasificacion/clasificador')) {
                            // sige_recordsclassifiers_clasificacion_postclasificacion
                            if ($pathinfo === '/records_classifiers/clasificacion/clasificador') {
                                if ($this->context->getMethod() != 'POST') {
                                    $allow[] = 'POST';
                                    goto not_sige_recordsclassifiers_clasificacion_postclasificacion;
                                }

                                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionController::postClasificacionAction',  '_route' => 'sige_recordsclassifiers_clasificacion_postclasificacion',);
                            }
                            not_sige_recordsclassifiers_clasificacion_postclasificacion:

                            // sige_recordsclassifiers_clasificacion_putclasificacion
                            if (preg_match('#^/records_classifiers/clasificacion/clasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'PUT') {
                                    $allow[] = 'PUT';
                                    goto not_sige_recordsclassifiers_clasificacion_putclasificacion;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificacion_putclasificacion')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionController::putClasificacionAction',));
                            }
                            not_sige_recordsclassifiers_clasificacion_putclasificacion:

                        }

                        // sige_recordsclassifiers_clasificacion_patchclasificacion
                        if (preg_match('#^/records_classifiers/clasificacion/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PATCH') {
                                $allow[] = 'PATCH';
                                goto not_sige_recordsclassifiers_clasificacion_patchclasificacion;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificacion_patchclasificacion')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionController::patchClasificacionAction',));
                        }
                        not_sige_recordsclassifiers_clasificacion_patchclasificacion:

                        if (0 === strpos($pathinfo, '/records_classifiers/clasificacion/clasificador')) {
                            // sige_recordsclassifiers_clasificacion_deleteclasificacion
                            if (preg_match('#^/records_classifiers/clasificacion/clasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'DELETE') {
                                    $allow[] = 'DELETE';
                                    goto not_sige_recordsclassifiers_clasificacion_deleteclasificacion;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificacion_deleteclasificacion')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionController::deleteClasificacionAction',));
                            }
                            not_sige_recordsclassifiers_clasificacion_deleteclasificacion:

                            // sige_recordsclassifiers_clasificacion_deleteclasificaciones
                            if ($pathinfo === '/records_classifiers/clasificacion/clasificador') {
                                if ($this->context->getMethod() != 'DELETE') {
                                    $allow[] = 'DELETE';
                                    goto not_sige_recordsclassifiers_clasificacion_deleteclasificaciones;
                                }

                                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionController::deleteClasificacionesAction',  '_route' => 'sige_recordsclassifiers_clasificacion_deleteclasificaciones',);
                            }
                            not_sige_recordsclassifiers_clasificacion_deleteclasificaciones:

                        }

                        if (0 === strpos($pathinfo, '/records_classifiers/clasificacionseguridad')) {
                            // sige_recordsclassifiers_clasificacionseguridad_getclasificacionseguridads
                            if ($pathinfo === '/records_classifiers/clasificacionseguridad') {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_sige_recordsclassifiers_clasificacionseguridad_getclasificacionseguridads;
                                }

                                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionSeguridadController::getClasificacionSeguridadsAction',  '_route' => 'sige_recordsclassifiers_clasificacionseguridad_getclasificacionseguridads',);
                            }
                            not_sige_recordsclassifiers_clasificacionseguridad_getclasificacionseguridads:

                            // sige_recordsclassifiers_clasificacionseguridad_getclasificacionseguridad
                            if (preg_match('#^/records_classifiers/clasificacionseguridad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                    $allow = array_merge($allow, array('GET', 'HEAD'));
                                    goto not_sige_recordsclassifiers_clasificacionseguridad_getclasificacionseguridad;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificacionseguridad_getclasificacionseguridad')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionSeguridadController::getClasificacionSeguridadAction',));
                            }
                            not_sige_recordsclassifiers_clasificacionseguridad_getclasificacionseguridad:

                            // sige_recordsclassifiers_clasificacionseguridad_postclasificacionseguridad
                            if ($pathinfo === '/records_classifiers/clasificacionseguridad') {
                                if ($this->context->getMethod() != 'POST') {
                                    $allow[] = 'POST';
                                    goto not_sige_recordsclassifiers_clasificacionseguridad_postclasificacionseguridad;
                                }

                                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionSeguridadController::postClasificacionSeguridadAction',  '_route' => 'sige_recordsclassifiers_clasificacionseguridad_postclasificacionseguridad',);
                            }
                            not_sige_recordsclassifiers_clasificacionseguridad_postclasificacionseguridad:

                            // sige_recordsclassifiers_clasificacionseguridad_putclasificacionseguridad
                            if (preg_match('#^/records_classifiers/clasificacionseguridad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'PUT') {
                                    $allow[] = 'PUT';
                                    goto not_sige_recordsclassifiers_clasificacionseguridad_putclasificacionseguridad;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificacionseguridad_putclasificacionseguridad')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionSeguridadController::putClasificacionSeguridadAction',));
                            }
                            not_sige_recordsclassifiers_clasificacionseguridad_putclasificacionseguridad:

                            // sige_recordsclassifiers_clasificacionseguridad_patchclasificacionseguridad
                            if (preg_match('#^/records_classifiers/clasificacionseguridad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'PATCH') {
                                    $allow[] = 'PATCH';
                                    goto not_sige_recordsclassifiers_clasificacionseguridad_patchclasificacionseguridad;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificacionseguridad_patchclasificacionseguridad')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionSeguridadController::patchClasificacionSeguridadAction',));
                            }
                            not_sige_recordsclassifiers_clasificacionseguridad_patchclasificacionseguridad:

                            // sige_recordsclassifiers_clasificacionseguridad_deleteclasificacionseguridad
                            if (preg_match('#^/records_classifiers/clasificacionseguridad/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                if ($this->context->getMethod() != 'DELETE') {
                                    $allow[] = 'DELETE';
                                    goto not_sige_recordsclassifiers_clasificacionseguridad_deleteclasificacionseguridad;
                                }

                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificacionseguridad_deleteclasificacionseguridad')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionSeguridadController::deleteClasificacionSeguridadAction',));
                            }
                            not_sige_recordsclassifiers_clasificacionseguridad_deleteclasificacionseguridad:

                            // sige_recordsclassifiers_clasificacionseguridad_deleteclasificacionseguridads
                            if ($pathinfo === '/records_classifiers/clasificacionseguridad') {
                                if ($this->context->getMethod() != 'DELETE') {
                                    $allow[] = 'DELETE';
                                    goto not_sige_recordsclassifiers_clasificacionseguridad_deleteclasificacionseguridads;
                                }

                                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificacionSeguridadController::deleteClasificacionSeguridadsAction',  '_route' => 'sige_recordsclassifiers_clasificacionseguridad_deleteclasificacionseguridads',);
                            }
                            not_sige_recordsclassifiers_clasificacionseguridad_deleteclasificacionseguridads:

                        }

                    }

                    if (0 === strpos($pathinfo, '/records_classifiers/clasificador')) {
                        // sige_recordsclassifiers_clasificador_getclasificadors
                        if ($pathinfo === '/records_classifiers/clasificador') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_sige_recordsclassifiers_clasificador_getclasificadors;
                            }

                            return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::getClasificadorsAction',  '_route' => 'sige_recordsclassifiers_clasificador_getclasificadors',);
                        }
                        not_sige_recordsclassifiers_clasificador_getclasificadors:

                        // sige_recordsclassifiers_clasificador_getclasificador
                        if (preg_match('#^/records_classifiers/clasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_sige_recordsclassifiers_clasificador_getclasificador;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificador_getclasificador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::getClasificadorAction',));
                        }
                        not_sige_recordsclassifiers_clasificador_getclasificador:

                        // sige_recordsclassifiers_clasificador_postclasificador
                        if ($pathinfo === '/records_classifiers/clasificador') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_sige_recordsclassifiers_clasificador_postclasificador;
                            }

                            return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::postClasificadorAction',  '_route' => 'sige_recordsclassifiers_clasificador_postclasificador',);
                        }
                        not_sige_recordsclassifiers_clasificador_postclasificador:

                        // sige_recordsclassifiers_clasificador_putclasificador
                        if (preg_match('#^/records_classifiers/clasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PUT') {
                                $allow[] = 'PUT';
                                goto not_sige_recordsclassifiers_clasificador_putclasificador;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificador_putclasificador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::putClasificadorAction',));
                        }
                        not_sige_recordsclassifiers_clasificador_putclasificador:

                        // sige_recordsclassifiers_clasificador_patchclasificador
                        if (preg_match('#^/records_classifiers/clasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'PATCH') {
                                $allow[] = 'PATCH';
                                goto not_sige_recordsclassifiers_clasificador_patchclasificador;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificador_patchclasificador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::patchClasificadorAction',));
                        }
                        not_sige_recordsclassifiers_clasificador_patchclasificador:

                        // sige_recordsclassifiers_clasificador_deleteclasificador
                        if (preg_match('#^/records_classifiers/clasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_sige_recordsclassifiers_clasificador_deleteclasificador;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_clasificador_deleteclasificador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::deleteClasificadorAction',));
                        }
                        not_sige_recordsclassifiers_clasificador_deleteclasificador:

                        // sige_recordsclassifiers_clasificador_deleteclasificadors
                        if ($pathinfo === '/records_classifiers/clasificador') {
                            if ($this->context->getMethod() != 'DELETE') {
                                $allow[] = 'DELETE';
                                goto not_sige_recordsclassifiers_clasificador_deleteclasificadors;
                            }

                            return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::deleteClasificadorsAction',  '_route' => 'sige_recordsclassifiers_clasificador_deleteclasificadors',);
                        }
                        not_sige_recordsclassifiers_clasificador_deleteclasificadors:

                    }

                }

                // sige_recordsclassifiers_clasificador_postcreatehierarchyclassifiers
                if ($pathinfo === '/records_classifiers/crearjerarquia') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_clasificador_postcreatehierarchyclassifiers;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::postCreateHierarchyClassifiersAction',  '_route' => 'sige_recordsclassifiers_clasificador_postcreatehierarchyclassifiers',);
                }
                not_sige_recordsclassifiers_clasificador_postcreatehierarchyclassifiers:

            }

            // sige_recordsclassifiers_clasificador_exportclasificadores
            if ($pathinfo === '/records_classifiers/export_classifier') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sige_recordsclassifiers_clasificador_exportclasificadores;
                }

                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::exportClasificadoresAction',  '_route' => 'sige_recordsclassifiers_clasificador_exportclasificadores',);
            }
            not_sige_recordsclassifiers_clasificador_exportclasificadores:

            // sige_recordsclassifiers_clasificador_importclasificadores
            if ($pathinfo === '/records_classifiers/import_classifier') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_sige_recordsclassifiers_clasificador_importclasificadores;
                }

                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\ClasificadorController::importClasificadoresAction',  '_route' => 'sige_recordsclassifiers_clasificador_importclasificadores',);
            }
            not_sige_recordsclassifiers_clasificador_importclasificadores:

            if (0 === strpos($pathinfo, '/records_classifiers/dominioclasificador')) {
                // sige_recordsclassifiers_dominioclasificador_getdominioclasificadors
                if ($pathinfo === '/records_classifiers/dominioclasificador') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_dominioclasificador_getdominioclasificadors;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\DominioClasificadorController::getDominioClasificadorsAction',  '_route' => 'sige_recordsclassifiers_dominioclasificador_getdominioclasificadors',);
                }
                not_sige_recordsclassifiers_dominioclasificador_getdominioclasificadors:

                // sige_recordsclassifiers_dominioclasificador_getdominioclasificador
                if (preg_match('#^/records_classifiers/dominioclasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_dominioclasificador_getdominioclasificador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_dominioclasificador_getdominioclasificador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\DominioClasificadorController::getDominioClasificadorAction',));
                }
                not_sige_recordsclassifiers_dominioclasificador_getdominioclasificador:

                // sige_recordsclassifiers_dominioclasificador_postdominioclasificador
                if ($pathinfo === '/records_classifiers/dominioclasificador') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_dominioclasificador_postdominioclasificador;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\DominioClasificadorController::postDominioClasificadorAction',  '_route' => 'sige_recordsclassifiers_dominioclasificador_postdominioclasificador',);
                }
                not_sige_recordsclassifiers_dominioclasificador_postdominioclasificador:

                // sige_recordsclassifiers_dominioclasificador_putdominioclasificador
                if (preg_match('#^/records_classifiers/dominioclasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_recordsclassifiers_dominioclasificador_putdominioclasificador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_dominioclasificador_putdominioclasificador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\DominioClasificadorController::putDominioClasificadorAction',));
                }
                not_sige_recordsclassifiers_dominioclasificador_putdominioclasificador:

                // sige_recordsclassifiers_dominioclasificador_patchdominioclasificador
                if (preg_match('#^/records_classifiers/dominioclasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_recordsclassifiers_dominioclasificador_patchdominioclasificador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_dominioclasificador_patchdominioclasificador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\DominioClasificadorController::patchDominioClasificadorAction',));
                }
                not_sige_recordsclassifiers_dominioclasificador_patchdominioclasificador:

                // sige_recordsclassifiers_dominioclasificador_deletedominioclasificador
                if (preg_match('#^/records_classifiers/dominioclasificador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_dominioclasificador_deletedominioclasificador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_dominioclasificador_deletedominioclasificador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\DominioClasificadorController::deleteDominioClasificadorAction',));
                }
                not_sige_recordsclassifiers_dominioclasificador_deletedominioclasificador:

                // sige_recordsclassifiers_dominioclasificador_deletedominioclasificadors
                if ($pathinfo === '/records_classifiers/dominioclasificador') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_dominioclasificador_deletedominioclasificadors;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\DominioClasificadorController::deleteDominioClasificadorsAction',  '_route' => 'sige_recordsclassifiers_dominioclasificador_deletedominioclasificadors',);
                }
                not_sige_recordsclassifiers_dominioclasificador_deletedominioclasificadors:

            }

            if (0 === strpos($pathinfo, '/records_classifiers/indicador')) {
                // sige_recordsclassifiers_indicador_getindicadors
                if ($pathinfo === '/records_classifiers/indicador') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_indicador_getindicadors;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\IndicadorController::getIndicadorsAction',  '_route' => 'sige_recordsclassifiers_indicador_getindicadors',);
                }
                not_sige_recordsclassifiers_indicador_getindicadors:

                // sige_recordsclassifiers_indicador_getindicador
                if (preg_match('#^/records_classifiers/indicador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_indicador_getindicador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_indicador_getindicador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\IndicadorController::getIndicadorAction',));
                }
                not_sige_recordsclassifiers_indicador_getindicador:

                // sige_recordsclassifiers_indicador_postindicador
                if ($pathinfo === '/records_classifiers/indicador') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_indicador_postindicador;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\IndicadorController::postIndicadorAction',  '_route' => 'sige_recordsclassifiers_indicador_postindicador',);
                }
                not_sige_recordsclassifiers_indicador_postindicador:

                // sige_recordsclassifiers_indicador_putindicador
                if (preg_match('#^/records_classifiers/indicador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_recordsclassifiers_indicador_putindicador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_indicador_putindicador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\IndicadorController::putIndicadorAction',));
                }
                not_sige_recordsclassifiers_indicador_putindicador:

                // sige_recordsclassifiers_indicador_patchindicador
                if (preg_match('#^/records_classifiers/indicador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_recordsclassifiers_indicador_patchindicador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_indicador_patchindicador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\IndicadorController::patchIndicadorAction',));
                }
                not_sige_recordsclassifiers_indicador_patchindicador:

                // sige_recordsclassifiers_indicador_deleteindicador
                if (preg_match('#^/records_classifiers/indicador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_indicador_deleteindicador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_indicador_deleteindicador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\IndicadorController::deleteIndicadorAction',));
                }
                not_sige_recordsclassifiers_indicador_deleteindicador:

                // sige_recordsclassifiers_indicador_deleteindicadors
                if ($pathinfo === '/records_classifiers/indicador') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_indicador_deleteindicadors;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\IndicadorController::deleteIndicadorsAction',  '_route' => 'sige_recordsclassifiers_indicador_deleteindicadors',);
                }
                not_sige_recordsclassifiers_indicador_deleteindicadors:

            }

            if (0 === strpos($pathinfo, '/records_classifiers/o')) {
                if (0 === strpos($pathinfo, '/records_classifiers/ome')) {
                    // sige_recordsclassifiers_ome_getomes
                    if ($pathinfo === '/records_classifiers/ome') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_recordsclassifiers_ome_getomes;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OmeController::getOmesAction',  '_route' => 'sige_recordsclassifiers_ome_getomes',);
                    }
                    not_sige_recordsclassifiers_ome_getomes:

                    // sige_recordsclassifiers_ome_getome
                    if (preg_match('#^/records_classifiers/ome/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_recordsclassifiers_ome_getome;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_ome_getome')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OmeController::getOmeAction',));
                    }
                    not_sige_recordsclassifiers_ome_getome:

                    // sige_recordsclassifiers_ome_postome
                    if ($pathinfo === '/records_classifiers/ome') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_recordsclassifiers_ome_postome;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OmeController::postOmeAction',  '_route' => 'sige_recordsclassifiers_ome_postome',);
                    }
                    not_sige_recordsclassifiers_ome_postome:

                    // sige_recordsclassifiers_ome_putome
                    if (preg_match('#^/records_classifiers/ome/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_sige_recordsclassifiers_ome_putome;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_ome_putome')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OmeController::putOmeAction',));
                    }
                    not_sige_recordsclassifiers_ome_putome:

                    // sige_recordsclassifiers_ome_patchome
                    if (preg_match('#^/records_classifiers/ome/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PATCH') {
                            $allow[] = 'PATCH';
                            goto not_sige_recordsclassifiers_ome_patchome;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_ome_patchome')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OmeController::patchOmeAction',));
                    }
                    not_sige_recordsclassifiers_ome_patchome:

                    // sige_recordsclassifiers_ome_deleteome
                    if (preg_match('#^/records_classifiers/ome/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_recordsclassifiers_ome_deleteome;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_ome_deleteome')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OmeController::deleteOmeAction',));
                    }
                    not_sige_recordsclassifiers_ome_deleteome:

                    // sige_recordsclassifiers_ome_deleteomes
                    if ($pathinfo === '/records_classifiers/ome') {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_recordsclassifiers_ome_deleteomes;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OmeController::deleteOmesAction',  '_route' => 'sige_recordsclassifiers_ome_deleteomes',);
                    }
                    not_sige_recordsclassifiers_ome_deleteomes:

                }

                if (0 === strpos($pathinfo, '/records_classifiers/ote')) {
                    // sige_recordsclassifiers_ote_getotes
                    if ($pathinfo === '/records_classifiers/ote') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_recordsclassifiers_ote_getotes;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OteController::getOtesAction',  '_route' => 'sige_recordsclassifiers_ote_getotes',);
                    }
                    not_sige_recordsclassifiers_ote_getotes:

                    // sige_recordsclassifiers_ote_getote
                    if (preg_match('#^/records_classifiers/ote/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_sige_recordsclassifiers_ote_getote;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_ote_getote')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OteController::getOteAction',));
                    }
                    not_sige_recordsclassifiers_ote_getote:

                    // sige_recordsclassifiers_ote_postote
                    if ($pathinfo === '/records_classifiers/ote') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_sige_recordsclassifiers_ote_postote;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OteController::postOteAction',  '_route' => 'sige_recordsclassifiers_ote_postote',);
                    }
                    not_sige_recordsclassifiers_ote_postote:

                    // sige_recordsclassifiers_ote_putote
                    if (preg_match('#^/records_classifiers/ote/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PUT') {
                            $allow[] = 'PUT';
                            goto not_sige_recordsclassifiers_ote_putote;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_ote_putote')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OteController::putOteAction',));
                    }
                    not_sige_recordsclassifiers_ote_putote:

                    // sige_recordsclassifiers_ote_patchote
                    if (preg_match('#^/records_classifiers/ote/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'PATCH') {
                            $allow[] = 'PATCH';
                            goto not_sige_recordsclassifiers_ote_patchote;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_ote_patchote')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OteController::patchOteAction',));
                    }
                    not_sige_recordsclassifiers_ote_patchote:

                    // sige_recordsclassifiers_ote_deleteote
                    if (preg_match('#^/records_classifiers/ote/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_recordsclassifiers_ote_deleteote;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_ote_deleteote')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OteController::deleteOteAction',));
                    }
                    not_sige_recordsclassifiers_ote_deleteote:

                    // sige_recordsclassifiers_ote_deleteotes
                    if ($pathinfo === '/records_classifiers/ote') {
                        if ($this->context->getMethod() != 'DELETE') {
                            $allow[] = 'DELETE';
                            goto not_sige_recordsclassifiers_ote_deleteotes;
                        }

                        return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\OteController::deleteOtesAction',  '_route' => 'sige_recordsclassifiers_ote_deleteotes',);
                    }
                    not_sige_recordsclassifiers_ote_deleteotes:

                }

            }

            if (0 === strpos($pathinfo, '/records_classifiers/piedefirma')) {
                // sige_recordsclassifiers_piedefirma_getpiesdefirma
                if ($pathinfo === '/records_classifiers/piedefirma') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_piedefirma_getpiesdefirma;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\PiedefirmaController::getPiesdefirmaAction',  '_route' => 'sige_recordsclassifiers_piedefirma_getpiesdefirma',);
                }
                not_sige_recordsclassifiers_piedefirma_getpiesdefirma:

                // sige_recordsclassifiers_piedefirma_getpiedefirma
                if (preg_match('#^/records_classifiers/piedefirma/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_piedefirma_getpiedefirma;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_piedefirma_getpiedefirma')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\PiedefirmaController::getPiedefirmaAction',));
                }
                not_sige_recordsclassifiers_piedefirma_getpiedefirma:

                // sige_recordsclassifiers_piedefirma_postpiedefirma
                if ($pathinfo === '/records_classifiers/piedefirma') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_piedefirma_postpiedefirma;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\PiedefirmaController::postPiedefirmaAction',  '_route' => 'sige_recordsclassifiers_piedefirma_postpiedefirma',);
                }
                not_sige_recordsclassifiers_piedefirma_postpiedefirma:

                // sige_recordsclassifiers_piedefirma_putpiedefirma
                if (preg_match('#^/records_classifiers/piedefirma/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_recordsclassifiers_piedefirma_putpiedefirma;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_piedefirma_putpiedefirma')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\PiedefirmaController::putPiedefirmaAction',));
                }
                not_sige_recordsclassifiers_piedefirma_putpiedefirma:

                // sige_recordsclassifiers_piedefirma_patchpiedefirma
                if (preg_match('#^/records_classifiers/piedefirma/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_recordsclassifiers_piedefirma_patchpiedefirma;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_piedefirma_patchpiedefirma')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\PiedefirmaController::patchPiedefirmaAction',));
                }
                not_sige_recordsclassifiers_piedefirma_patchpiedefirma:

                // sige_recordsclassifiers_piedefirma_deletepiedefirma
                if (preg_match('#^/records_classifiers/piedefirma/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_piedefirma_deletepiedefirma;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_piedefirma_deletepiedefirma')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\PiedefirmaController::deletePiedefirmaAction',));
                }
                not_sige_recordsclassifiers_piedefirma_deletepiedefirma:

                // sige_recordsclassifiers_piedefirma_deletepiesdefirma
                if ($pathinfo === '/records_classifiers/piedefirma') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_piedefirma_deletepiesdefirma;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\PiedefirmaController::deletePiesdefirmaAction',  '_route' => 'sige_recordsclassifiers_piedefirma_deletepiesdefirma',);
                }
                not_sige_recordsclassifiers_piedefirma_deletepiesdefirma:

            }

            // sige_recordsclassifiers_piedefirma_exportsignfooters
            if ($pathinfo === '/records_classifiers/export_signfooter') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sige_recordsclassifiers_piedefirma_exportsignfooters;
                }

                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\PiedefirmaController::exportSignfootersAction',  '_route' => 'sige_recordsclassifiers_piedefirma_exportsignfooters',);
            }
            not_sige_recordsclassifiers_piedefirma_exportsignfooters:

            // sige_recordsclassifiers_registro_getregistros
            if ($pathinfo === '/records_classifiers/manage_registers') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sige_recordsclassifiers_registro_getregistros;
                }

                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\RegistroController::getRegistrosAction',  '_route' => 'sige_recordsclassifiers_registro_getregistros',);
            }
            not_sige_recordsclassifiers_registro_getregistros:

            if (0 === strpos($pathinfo, '/records_classifiers/registro')) {
                // sige_recordsclassifiers_registro_getregistro
                if (preg_match('#^/records_classifiers/registro/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_registro_getregistro;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_registro_getregistro')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\RegistroController::getRegistroAction',));
                }
                not_sige_recordsclassifiers_registro_getregistro:

                // sige_recordsclassifiers_registro_postregistro
                if ($pathinfo === '/records_classifiers/registro') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_registro_postregistro;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\RegistroController::postRegistroAction',  '_route' => 'sige_recordsclassifiers_registro_postregistro',);
                }
                not_sige_recordsclassifiers_registro_postregistro:

                // sige_recordsclassifiers_registro_putregistro
                if (preg_match('#^/records_classifiers/registro/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_recordsclassifiers_registro_putregistro;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_registro_putregistro')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\RegistroController::putRegistroAction',));
                }
                not_sige_recordsclassifiers_registro_putregistro:

                // sige_recordsclassifiers_registro_patchregistro
                if (preg_match('#^/records_classifiers/registro/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_recordsclassifiers_registro_patchregistro;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_registro_patchregistro')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\RegistroController::patchRegistroAction',));
                }
                not_sige_recordsclassifiers_registro_patchregistro:

                // sige_recordsclassifiers_registro_deleteregistro
                if (preg_match('#^/records_classifiers/registro/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_registro_deleteregistro;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_registro_deleteregistro')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\RegistroController::deleteRegistroAction',));
                }
                not_sige_recordsclassifiers_registro_deleteregistro:

                // sige_recordsclassifiers_registro_deleteregistros
                if ($pathinfo === '/records_classifiers/registro') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_registro_deleteregistros;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\RegistroController::deleteRegistrosAction',  '_route' => 'sige_recordsclassifiers_registro_deleteregistros',);
                }
                not_sige_recordsclassifiers_registro_deleteregistros:

            }

            if (0 === strpos($pathinfo, '/records_classifiers/sistemadeinformacion')) {
                // sige_recordsclassifiers_sistemadeinformacion_getsistemadeinformacions
                if ($pathinfo === '/records_classifiers/sistemadeinformacion') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_sistemadeinformacion_getsistemadeinformacions;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\SistemadeinformacionController::getSistemadeinformacionsAction',  '_route' => 'sige_recordsclassifiers_sistemadeinformacion_getsistemadeinformacions',);
                }
                not_sige_recordsclassifiers_sistemadeinformacion_getsistemadeinformacions:

                // sige_recordsclassifiers_sistemadeinformacion_getsistemadeinformacion
                if (preg_match('#^/records_classifiers/sistemadeinformacion/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_sistemadeinformacion_getsistemadeinformacion;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_sistemadeinformacion_getsistemadeinformacion')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\SistemadeinformacionController::getSistemadeinformacionAction',));
                }
                not_sige_recordsclassifiers_sistemadeinformacion_getsistemadeinformacion:

                // sige_recordsclassifiers_sistemadeinformacion_postsistemadeinformacion
                if ($pathinfo === '/records_classifiers/sistemadeinformacion') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_sistemadeinformacion_postsistemadeinformacion;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\SistemadeinformacionController::postSistemadeinformacionAction',  '_route' => 'sige_recordsclassifiers_sistemadeinformacion_postsistemadeinformacion',);
                }
                not_sige_recordsclassifiers_sistemadeinformacion_postsistemadeinformacion:

                // sige_recordsclassifiers_sistemadeinformacion_putsistemadeinformacion
                if (preg_match('#^/records_classifiers/sistemadeinformacion/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_recordsclassifiers_sistemadeinformacion_putsistemadeinformacion;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_sistemadeinformacion_putsistemadeinformacion')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\SistemadeinformacionController::putSistemadeinformacionAction',));
                }
                not_sige_recordsclassifiers_sistemadeinformacion_putsistemadeinformacion:

                // sige_recordsclassifiers_sistemadeinformacion_patchsistemadeinformacion
                if (preg_match('#^/records_classifiers/sistemadeinformacion/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_recordsclassifiers_sistemadeinformacion_patchsistemadeinformacion;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_sistemadeinformacion_patchsistemadeinformacion')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\SistemadeinformacionController::patchSistemadeinformacionAction',));
                }
                not_sige_recordsclassifiers_sistemadeinformacion_patchsistemadeinformacion:

                // sige_recordsclassifiers_sistemadeinformacion_deletesistemadeinformacion
                if (preg_match('#^/records_classifiers/sistemadeinformacion/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_sistemadeinformacion_deletesistemadeinformacion;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_sistemadeinformacion_deletesistemadeinformacion')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\SistemadeinformacionController::deleteSistemadeinformacionAction',));
                }
                not_sige_recordsclassifiers_sistemadeinformacion_deletesistemadeinformacion:

                // sige_recordsclassifiers_sistemadeinformacion_deletesistemasdeinformacion
                if ($pathinfo === '/records_classifiers/sistemadeinformacion') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_sistemadeinformacion_deletesistemasdeinformacion;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\SistemadeinformacionController::deleteSistemasdeinformacionAction',  '_route' => 'sige_recordsclassifiers_sistemadeinformacion_deletesistemasdeinformacion',);
                }
                not_sige_recordsclassifiers_sistemadeinformacion_deletesistemasdeinformacion:

            }

            if (0 === strpos($pathinfo, '/records_classifiers/tematica')) {
                // sige_recordsclassifiers_tematica_gettematicas
                if ($pathinfo === '/records_classifiers/tematica') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_tematica_gettematicas;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TematicaController::getTematicasAction',  '_route' => 'sige_recordsclassifiers_tematica_gettematicas',);
                }
                not_sige_recordsclassifiers_tematica_gettematicas:

                // sige_recordsclassifiers_tematica_gettematica
                if (preg_match('#^/records_classifiers/tematica/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_tematica_gettematica;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_tematica_gettematica')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TematicaController::getTematicaAction',));
                }
                not_sige_recordsclassifiers_tematica_gettematica:

                // sige_recordsclassifiers_tematica_posttematica
                if ($pathinfo === '/records_classifiers/tematica') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_tematica_posttematica;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TematicaController::postTematicaAction',  '_route' => 'sige_recordsclassifiers_tematica_posttematica',);
                }
                not_sige_recordsclassifiers_tematica_posttematica:

                // sige_recordsclassifiers_tematica_puttematica
                if (preg_match('#^/records_classifiers/tematica/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_recordsclassifiers_tematica_puttematica;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_tematica_puttematica')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TematicaController::putTematicaAction',));
                }
                not_sige_recordsclassifiers_tematica_puttematica:

                // sige_recordsclassifiers_tematica_patchtematica
                if (preg_match('#^/records_classifiers/tematica/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_recordsclassifiers_tematica_patchtematica;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_tematica_patchtematica')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TematicaController::patchTematicaAction',));
                }
                not_sige_recordsclassifiers_tematica_patchtematica:

                // sige_recordsclassifiers_tematica_deletetematica
                if (preg_match('#^/records_classifiers/tematica/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_tematica_deletetematica;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_tematica_deletetematica')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TematicaController::deleteTematicaAction',));
                }
                not_sige_recordsclassifiers_tematica_deletetematica:

                // sige_recordsclassifiers_tematica_deletetematicas
                if ($pathinfo === '/records_classifiers/tematica') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_tematica_deletetematicas;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TematicaController::deleteTematicasAction',  '_route' => 'sige_recordsclassifiers_tematica_deletetematicas',);
                }
                not_sige_recordsclassifiers_tematica_deletetematicas:

            }

            // sige_recordsclassifiers_tematica_gettematicasindicators
            if ($pathinfo === '/records_classifiers/indicadorestematicas') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_sige_recordsclassifiers_tematica_gettematicasindicators;
                }

                return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TematicaController::getTematicasIndicatorsAction',  '_route' => 'sige_recordsclassifiers_tematica_gettematicasindicators',);
            }
            not_sige_recordsclassifiers_tematica_gettematicasindicators:

            if (0 === strpos($pathinfo, '/records_classifiers/tipoindicador')) {
                // sige_recordsclassifiers_tipoindicador_gettipoindicadors
                if ($pathinfo === '/records_classifiers/tipoindicador') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_tipoindicador_gettipoindicadors;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TipoIndicadorController::getTipoIndicadorsAction',  '_route' => 'sige_recordsclassifiers_tipoindicador_gettipoindicadors',);
                }
                not_sige_recordsclassifiers_tipoindicador_gettipoindicadors:

                // sige_recordsclassifiers_tipoindicador_gettipoindicador
                if (preg_match('#^/records_classifiers/tipoindicador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_recordsclassifiers_tipoindicador_gettipoindicador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_tipoindicador_gettipoindicador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TipoIndicadorController::getTipoIndicadorAction',));
                }
                not_sige_recordsclassifiers_tipoindicador_gettipoindicador:

                // sige_recordsclassifiers_tipoindicador_posttipoindicador
                if ($pathinfo === '/records_classifiers/tipoindicador') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_recordsclassifiers_tipoindicador_posttipoindicador;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TipoIndicadorController::postTipoIndicadorAction',  '_route' => 'sige_recordsclassifiers_tipoindicador_posttipoindicador',);
                }
                not_sige_recordsclassifiers_tipoindicador_posttipoindicador:

                // sige_recordsclassifiers_tipoindicador_puttipoindicador
                if (preg_match('#^/records_classifiers/tipoindicador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_recordsclassifiers_tipoindicador_puttipoindicador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_tipoindicador_puttipoindicador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TipoIndicadorController::putTipoIndicadorAction',));
                }
                not_sige_recordsclassifiers_tipoindicador_puttipoindicador:

                // sige_recordsclassifiers_tipoindicador_patchtipoindicador
                if (preg_match('#^/records_classifiers/tipoindicador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_recordsclassifiers_tipoindicador_patchtipoindicador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_tipoindicador_patchtipoindicador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TipoIndicadorController::patchTipoIndicadorAction',));
                }
                not_sige_recordsclassifiers_tipoindicador_patchtipoindicador:

                // sige_recordsclassifiers_tipoindicador_deletetipoindicador
                if (preg_match('#^/records_classifiers/tipoindicador/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_tipoindicador_deletetipoindicador;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_recordsclassifiers_tipoindicador_deletetipoindicador')), array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TipoIndicadorController::deleteTipoIndicadorAction',));
                }
                not_sige_recordsclassifiers_tipoindicador_deletetipoindicador:

                // sige_recordsclassifiers_tipoindicador_deletetipoindicadors
                if ($pathinfo === '/records_classifiers/tipoindicador') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_recordsclassifiers_tipoindicador_deletetipoindicadors;
                    }

                    return array (  '_controller' => 'SIGE\\RecordsClassifiersBundle\\Controller\\TipoIndicadorController::deleteTipoIndicadorsAction',  '_route' => 'sige_recordsclassifiers_tipoindicador_deletetipoindicadors',);
                }
                not_sige_recordsclassifiers_tipoindicador_deletetipoindicadors:

            }

        }

        if (0 === strpos($pathinfo, '/model_generator')) {
            // model_generator_homepage
            if (rtrim($pathinfo, '/') === '/model_generator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'model_generator_homepage');
                }

                return array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\DefaultController::indexAction',  '_route' => 'model_generator_homepage',);
            }

            if (0 === strpos($pathinfo, '/model_generator/indicadorpagina')) {
                // sige_modelgenerator_indicadorpagina_getindicadorpaginas
                if ($pathinfo === '/model_generator/indicadorpagina') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_modelgenerator_indicadorpagina_getindicadorpaginas;
                    }

                    return array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\IndicadorPaginaController::getIndicadorPaginasAction',  '_route' => 'sige_modelgenerator_indicadorpagina_getindicadorpaginas',);
                }
                not_sige_modelgenerator_indicadorpagina_getindicadorpaginas:

                // sige_modelgenerator_indicadorpagina_getindicadorpagina
                if (preg_match('#^/model_generator/indicadorpagina/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_modelgenerator_indicadorpagina_getindicadorpagina;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_modelgenerator_indicadorpagina_getindicadorpagina')), array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\IndicadorPaginaController::getIndicadorPaginaAction',));
                }
                not_sige_modelgenerator_indicadorpagina_getindicadorpagina:

                // sige_modelgenerator_indicadorpagina_postindicadorpagina
                if ($pathinfo === '/model_generator/indicadorpagina') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_modelgenerator_indicadorpagina_postindicadorpagina;
                    }

                    return array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\IndicadorPaginaController::postIndicadorPaginaAction',  '_route' => 'sige_modelgenerator_indicadorpagina_postindicadorpagina',);
                }
                not_sige_modelgenerator_indicadorpagina_postindicadorpagina:

                // sige_modelgenerator_indicadorpagina_putindicadorpagina
                if (preg_match('#^/model_generator/indicadorpagina/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_modelgenerator_indicadorpagina_putindicadorpagina;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_modelgenerator_indicadorpagina_putindicadorpagina')), array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\IndicadorPaginaController::putIndicadorPaginaAction',));
                }
                not_sige_modelgenerator_indicadorpagina_putindicadorpagina:

                // sige_modelgenerator_indicadorpagina_patchindicadorpagina
                if (preg_match('#^/model_generator/indicadorpagina/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_modelgenerator_indicadorpagina_patchindicadorpagina;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_modelgenerator_indicadorpagina_patchindicadorpagina')), array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\IndicadorPaginaController::patchIndicadorPaginaAction',));
                }
                not_sige_modelgenerator_indicadorpagina_patchindicadorpagina:

                // sige_modelgenerator_indicadorpagina_deleteindicadorpagina
                if (preg_match('#^/model_generator/indicadorpagina/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_modelgenerator_indicadorpagina_deleteindicadorpagina;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_modelgenerator_indicadorpagina_deleteindicadorpagina')), array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\IndicadorPaginaController::deleteIndicadorPaginaAction',));
                }
                not_sige_modelgenerator_indicadorpagina_deleteindicadorpagina:

                // sige_modelgenerator_indicadorpagina_deleteindicadorpaginas
                if ($pathinfo === '/model_generator/indicadorpagina') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_modelgenerator_indicadorpagina_deleteindicadorpaginas;
                    }

                    return array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\IndicadorPaginaController::deleteIndicadorPaginasAction',  '_route' => 'sige_modelgenerator_indicadorpagina_deleteindicadorpaginas',);
                }
                not_sige_modelgenerator_indicadorpagina_deleteindicadorpaginas:

            }

            if (0 === strpos($pathinfo, '/model_generator/variante')) {
                // sige_modelgenerator_variante_getvariantes
                if ($pathinfo === '/model_generator/variante') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_modelgenerator_variante_getvariantes;
                    }

                    return array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\VarianteController::getVariantesAction',  '_route' => 'sige_modelgenerator_variante_getvariantes',);
                }
                not_sige_modelgenerator_variante_getvariantes:

                // sige_modelgenerator_variante_getvariante
                if (preg_match('#^/model_generator/variante/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_modelgenerator_variante_getvariante;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_modelgenerator_variante_getvariante')), array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\VarianteController::getVarianteAction',));
                }
                not_sige_modelgenerator_variante_getvariante:

                // sige_modelgenerator_variante_postvariante
                if ($pathinfo === '/model_generator/variante') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_modelgenerator_variante_postvariante;
                    }

                    return array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\VarianteController::postVarianteAction',  '_route' => 'sige_modelgenerator_variante_postvariante',);
                }
                not_sige_modelgenerator_variante_postvariante:

                // sige_modelgenerator_variante_putvariante
                if (preg_match('#^/model_generator/variante/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_modelgenerator_variante_putvariante;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_modelgenerator_variante_putvariante')), array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\VarianteController::putVarianteAction',));
                }
                not_sige_modelgenerator_variante_putvariante:

                // sige_modelgenerator_variante_patchvariante
                if (preg_match('#^/model_generator/variante/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_modelgenerator_variante_patchvariante;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_modelgenerator_variante_patchvariante')), array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\VarianteController::patchVarianteAction',));
                }
                not_sige_modelgenerator_variante_patchvariante:

                // sige_modelgenerator_variante_deletevariante
                if (preg_match('#^/model_generator/variante/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_modelgenerator_variante_deletevariante;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_modelgenerator_variante_deletevariante')), array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\VarianteController::deleteVarianteAction',));
                }
                not_sige_modelgenerator_variante_deletevariante:

                // sige_modelgenerator_variante_deletevariantes
                if ($pathinfo === '/model_generator/variante') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_modelgenerator_variante_deletevariantes;
                    }

                    return array (  '_controller' => 'SIGE\\ModelGeneratorBundle\\Controller\\VarianteController::deleteVariantesAction',  '_route' => 'sige_modelgenerator_variante_deletevariantes',);
                }
                not_sige_modelgenerator_variante_deletevariantes:

            }

        }

        if (0 === strpos($pathinfo, '/data_entry')) {
            // data_entry_homepage
            if (rtrim($pathinfo, '/') === '/data_entry') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'data_entry_homepage');
                }

                return array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\DefaultController::indexAction',  '_route' => 'data_entry_homepage',);
            }

            if (0 === strpos($pathinfo, '/data_entry/modelo')) {
                // sige_dataentry_modelo_getmodelos
                if ($pathinfo === '/data_entry/modelo') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_dataentry_modelo_getmodelos;
                    }

                    return array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\ModeloController::getModelosAction',  '_route' => 'sige_dataentry_modelo_getmodelos',);
                }
                not_sige_dataentry_modelo_getmodelos:

                // sige_dataentry_modelo_getmodelostree
                if ($pathinfo === '/data_entry/modelo/root') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_dataentry_modelo_getmodelostree;
                    }

                    return array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\ModeloController::getModelosTreeAction',  '_route' => 'sige_dataentry_modelo_getmodelostree',);
                }
                not_sige_dataentry_modelo_getmodelostree:

                // sige_dataentry_modelo_getmodelo
                if (preg_match('#^/data_entry/modelo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sige_dataentry_modelo_getmodelo;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_dataentry_modelo_getmodelo')), array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\ModeloController::getModeloAction',));
                }
                not_sige_dataentry_modelo_getmodelo:

                // sige_dataentry_modelo_postmodelo
                if ($pathinfo === '/data_entry/modelo') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_sige_dataentry_modelo_postmodelo;
                    }

                    return array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\ModeloController::postModeloAction',  '_route' => 'sige_dataentry_modelo_postmodelo',);
                }
                not_sige_dataentry_modelo_postmodelo:

                // sige_dataentry_modelo_putmodelo
                if (preg_match('#^/data_entry/modelo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_sige_dataentry_modelo_putmodelo;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_dataentry_modelo_putmodelo')), array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\ModeloController::putModeloAction',));
                }
                not_sige_dataentry_modelo_putmodelo:

                // sige_dataentry_modelo_patchmodelo
                if (preg_match('#^/data_entry/modelo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PATCH') {
                        $allow[] = 'PATCH';
                        goto not_sige_dataentry_modelo_patchmodelo;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_dataentry_modelo_patchmodelo')), array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\ModeloController::patchModeloAction',));
                }
                not_sige_dataentry_modelo_patchmodelo:

                // sige_dataentry_modelo_deletemodelo
                if (preg_match('#^/data_entry/modelo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_dataentry_modelo_deletemodelo;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sige_dataentry_modelo_deletemodelo')), array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\ModeloController::deleteModeloAction',));
                }
                not_sige_dataentry_modelo_deletemodelo:

                // sige_dataentry_modelo_deletemodelos
                if ($pathinfo === '/data_entry/modelo') {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_sige_dataentry_modelo_deletemodelos;
                    }

                    return array (  '_controller' => 'SIGE\\DataEntryBundle\\Controller\\ModeloController::deleteModelosAction',  '_route' => 'sige_dataentry_modelo_deletemodelos',);
                }
                not_sige_dataentry_modelo_deletemodelos:

            }

        }

        // admin_homepage
        if (rtrim($pathinfo, '/') === '/admin') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'admin_homepage');
            }

            return array (  '_controller' => 'SIGE\\AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'admin_homepage',);
        }

        // nelmio_api_doc_index
        if (0 === strpos($pathinfo, '/doc') && preg_match('#^/doc(?:/(?P<view>[^/]++))?$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_nelmio_api_doc_index;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'nelmio_api_doc_index')), array (  '_controller' => 'Nelmio\\ApiDocBundle\\Controller\\ApiDocController::indexAction',  'view' => 'default',));
        }
        not_nelmio_api_doc_index:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
