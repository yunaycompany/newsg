<?php

/* @Twig/Exception/exception.json.twig */
class __TwigTemplate_6224efd45cd7f47f12a6a062e7045aa46d51e4329834377151bf70870d300edf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_115ac054f68371170f036f3ce44a0e7d44077d9b756ad5dcdfac0ee57041f49b = $this->env->getExtension("native_profiler");
        $__internal_115ac054f68371170f036f3ce44a0e7d44077d9b756ad5dcdfac0ee57041f49b->enter($__internal_115ac054f68371170f036f3ce44a0e7d44077d9b756ad5dcdfac0ee57041f49b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_115ac054f68371170f036f3ce44a0e7d44077d9b756ad5dcdfac0ee57041f49b->leave($__internal_115ac054f68371170f036f3ce44a0e7d44077d9b756ad5dcdfac0ee57041f49b_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}*/
/* */
