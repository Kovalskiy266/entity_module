<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/koval/templates/koval_review.html.twig */
class __TwigTemplate_0b3650ba838ae576ff300088a8aa2093268dfd688c35be2c9e2aa5b27e32ae73 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("koval/guestbook.reviews"), "html", null, true);
        echo "

<div class=\"main-wrapper\">
    <div class = \"user-data-wrapper\">
      <div class=\"avatar-container\">";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "avatar", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
        echo "</div>
      <div class=\"name-container\">";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "name", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
        echo "</div>
      <div class=\"date-container\">";
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "date_created", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
        echo "</div>
    </div>
    <div class = \"review-wrapper\">
      <div class=\"comment-container\">";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "review", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
        echo "</div>
      ";
        // line 25
        if ((twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "image", [], "any", false, false, true, 25) != null)) {
            // line 26
            echo "        <div class=\"image-container\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "image", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
            echo "</div>
      ";
        }
        // line 28
        echo "    </div>
    <div class=\"contact-data-wrapper\">
      ";
        // line 30
        if (twig_in_filter("administrator", twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getroles", [], "any", false, false, true, 30))) {
            // line 31
            echo "        <div class=\"administration-buttons-wrapper\">
          ";
            // line 32
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["button"] ?? null), 32, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 35
        echo "      <div class=\"contact-container\">
        <div class=\"phone-container\">";
        // line 36
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "phone_number", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
        echo "</div>
        <div class=\"email-container\">";
        // line 37
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "email", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
        echo "</div>
      </div>
    </div>
  </div>

";
    }

    public function getTemplateName()
    {
        return "modules/custom/koval/templates/koval_review.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 37,  90 => 36,  87 => 35,  81 => 32,  78 => 31,  76 => 30,  72 => 28,  66 => 26,  64 => 25,  60 => 24,  54 => 21,  50 => 20,  46 => 19,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/koval/templates/koval_review.html.twig", "/var/www/web/modules/custom/koval/templates/koval_review.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 25);
        static $filters = array("escape" => 15);
        static $functions = array("attach_library" => 15);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
