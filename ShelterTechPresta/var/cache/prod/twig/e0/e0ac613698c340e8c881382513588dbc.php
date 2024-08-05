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

/* @Modules/psxdesign/views/templates/components/save_banner.html.twig */
class __TwigTemplate_b0b2a5f649ee983c3486cc8b908554dc extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 31
        echo "
<div class=\"save-banner save-banner--hidden\">
    <p class=\"save-banner__text\">
        ";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Unsaved changes", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "
    </p>
    <div class=\"save-banner__actions\">
        ";
        // line 37
        if (( !array_key_exists("resettable", $context) || (($context["resettable"] ?? null) != false))) {
            // line 38
            echo "            <button type=\"reset\" id=\"cancel-button\" form=\"";
            echo twig_escape_filter($this->env, ($context["form"] ?? null), "html", null, true);
            echo "\" class=\"btn btn-outline-light\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Modules.Psxdesign.Admin"), "html", null, true);
            echo "</button>
        ";
        }
        // line 40
        echo "        <button type=\"submit\" id=\"save-button\" form=\"";
        echo twig_escape_filter($this->env, ($context["form"] ?? null), "html", null, true);
        echo "\" class=\"btn btn-primary\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save changes", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "</button>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/components/save_banner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 40,  53 => 38,  51 => 37,  45 => 34,  40 => 31,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/components/save_banner.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/components/save_banner.html.twig");
    }
}
