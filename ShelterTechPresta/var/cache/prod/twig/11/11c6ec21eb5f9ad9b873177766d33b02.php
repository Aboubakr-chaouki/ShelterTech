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

/* @Modules/psxdesign/views/templates/admin/fonts/Blocks/Partials/fonts_form.html.twig */
class __TwigTemplate_90cb4e060915bbd510d84af797acfd60 extends Template
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
<div>
    <p class=\"mb-3\">
        ";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "description", [], "any", false, false, false, 28), "html", null, true);
        echo "
    </p>
    <input type=\"hidden\" name=\"";
        // line 30
        echo twig_escape_filter($this->env, ($context["form_index"] ?? null), "html", null, true);
        echo "[variable_name]\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "variableName", [], "any", false, false, false, 30), "html", null, true);
        echo "\"/>
    <input type=\"hidden\" name=\"";
        // line 31
        echo twig_escape_filter($this->env, ($context["form_index"] ?? null), "html", null, true);
        echo "[variable_type]\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "variableType", [], "any", false, false, false, 31), "html", null, true);
        echo "\"/>
    ";
        // line 32
        if ((twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", true, true, false, 32) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 32)))) {
            // line 33
            echo "        <input type=\"hidden\" name=\"";
            echo twig_escape_filter($this->env, ($context["form_index"] ?? null), "html", null, true);
            echo "[id]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "id", [], "any", false, false, false, 33), "html", null, true);
            echo "\"/>
    ";
        }
        // line 35
        echo "    ";
        $this->loadTemplate("@Modules/psxdesign/views/templates/components/text_editor.html.twig", "@Modules/psxdesign/views/templates/admin/fonts/Blocks/Partials/fonts_form.html.twig", 35)->display(twig_array_merge($context, ["disabled" =>         // line 36
($context["disabled"] ?? null), "fontList" =>         // line 37
($context["fonts"] ?? null), "fontVariants" =>         // line 38
($context["fontVariants"] ?? null), "fontFamily" => ["id" => (        // line 40
($context["form_index"] ?? null) . "_font_family"), "name" => (        // line 41
($context["form_index"] ?? null) . "[font]"), "value" => twig_get_attribute($this->env, $this->source,         // line 42
($context["data"] ?? null), "font", [], "any", false, false, false, 42)], "fontStyle" => ["id" => (        // line 45
($context["form_index"] ?? null) . "_font_style"), "name" => (        // line 46
($context["form_index"] ?? null) . "[style]"), "value" => twig_get_attribute($this->env, $this->source,         // line 47
($context["data"] ?? null), "style", [], "any", false, false, false, 47)], "fontSize" => ["id" => (        // line 50
($context["form_index"] ?? null) . "_font_size"), "name" => (        // line 51
($context["form_index"] ?? null) . "[size]"), "min" => 10, "max" => 100, "value" => twig_get_attribute($this->env, $this->source,         // line 54
($context["data"] ?? null), "size", [], "any", false, false, false, 54)], "textArea" => ["id" => (        // line 57
($context["form_index"] ?? null) . "_textarea"), "ariaLabel" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Try your font", [], "Modules.Psxdesign.Admin"), "value" => (((twig_get_attribute($this->env, $this->source,         // line 59
($context["data"] ?? null), "placeholder", [], "any", true, true, false, 59) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "placeholder", [], "any", false, false, false, 59)))) ? (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "placeholder", [], "any", false, false, false, 59)) : (twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "label", [], "any", false, false, false, 59))), "multiline" => false, "readonly" => true]]));
        // line 64
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/admin/fonts/Blocks/Partials/fonts_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 64,  84 => 59,  83 => 57,  82 => 54,  81 => 51,  80 => 50,  79 => 47,  78 => 46,  77 => 45,  76 => 42,  75 => 41,  74 => 40,  73 => 38,  72 => 37,  71 => 36,  69 => 35,  61 => 33,  59 => 32,  53 => 31,  47 => 30,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/admin/fonts/Blocks/Partials/fonts_form.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/admin/fonts/Blocks/Partials/fonts_form.html.twig");
    }
}
