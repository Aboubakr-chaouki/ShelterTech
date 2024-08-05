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

/* @Modules/psxdesign/views/templates/admin/colors/Blocks/Partials/color_form.html.twig */
class __TwigTemplate_9a4af8c98064b86e1685ed169d8c1e43 extends Template
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
<div class=\"mb-3\">
    <label class=\"mb-1\" for=\"";
        // line 27
        echo twig_escape_filter($this->env, (($context["form_index"] ?? null) . "_color"), "html", null, true);
        echo "\">
        <span class=\"sr-only\">";
        // line 28
        echo twig_escape_filter($this->env, ($context["category_title"] ?? null), "html", null, true);
        echo "</span> ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "label", [], "any", false, false, false, 28), "html", null, true);
        echo "
    </label>
    ";
        // line 30
        if ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", true, true, false, 30) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 30)))) {
            // line 31
            echo "        <input type=\"hidden\" name=\"";
            echo twig_escape_filter($this->env, ($context["form_index"] ?? null), "html", null, true);
            echo "[id]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 31), "html", null, true);
            echo "\">
    ";
        }
        // line 33
        echo "    <input type=\"hidden\" name=\"";
        echo twig_escape_filter($this->env, ($context["form_index"] ?? null), "html", null, true);
        echo "[palette_id]\" value=\"";
        ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "paletteId", [], "any", true, true, false, 33)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "paletteId", [], "any", false, false, false, 33), "html", null, true))) : (print (0)));
        echo "\">
    <input type=\"hidden\" name=\"";
        // line 34
        echo twig_escape_filter($this->env, ($context["form_index"] ?? null), "html", null, true);
        echo "[variable_name]\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "variableName", [], "any", false, false, false, 34), "html", null, true);
        echo "\">
    <input type=\"hidden\" name=\"";
        // line 35
        echo twig_escape_filter($this->env, ($context["form_index"] ?? null), "html", null, true);
        echo "[variable_type]\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "variableType", [], "any", false, false, false, 35), "html", null, true);
        echo "\">
    ";
        // line 36
        $this->loadTemplate("@Modules/psxdesign/views/templates/components/color_input.html.twig", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Partials/color_form.html.twig", 36)->display(twig_array_merge($context, ["disabled" =>  !        // line 37
($context["isColorFeatureEnabled"] ?? null), "color" => ["name" => (        // line 39
($context["form_index"] ?? null) . "[value]"), "id_color" => (        // line 40
($context["form_index"] ?? null) . "_color"), "id_hex" => (        // line 41
($context["form_index"] ?? null) . "_hex"), "value" => twig_get_attribute($this->env, $this->source,         // line 42
($context["data"] ?? null), "value", [], "any", false, false, false, 42), "aria_label_hex" => (((        // line 43
($context["category_title"] ?? null) . " ") . twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "label", [], "any", false, false, false, 43)) . " hex")]]));
        // line 46
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/admin/colors/Blocks/Partials/color_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 46,  87 => 43,  86 => 42,  85 => 41,  84 => 40,  83 => 39,  82 => 37,  81 => 36,  75 => 35,  69 => 34,  62 => 33,  54 => 31,  52 => 30,  45 => 28,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Partials/color_form.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/admin/colors/Blocks/Partials/color_form.html.twig");
    }
}
