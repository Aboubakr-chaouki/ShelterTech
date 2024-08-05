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

/* @Modules/psxdesign/views/templates/components/color_input.html.twig */
class __TwigTemplate_52024ac0e4b0dccd677d136885205c46 extends Template
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
        // line 37
        echo "
<fieldset class=\"color-input\" ";
        // line 38
        echo (((array_key_exists("disabled", $context) && (($context["disabled"] ?? null) == true))) ? ("disabled") : (""));
        echo ">
    <input
            class=\"color-input__color\" name=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "name", [], "any", false, false, false, 40), "html", null, true);
        echo "\"
            id=\"";
        // line 41
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "id_color", [], "any", true, true, false, 41)) ? (twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "id_color", [], "any", false, false, false, 41)) : ((twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "name", [], "any", false, false, false, 41) . "_color"))), "html", null, true);
        echo "\"
            type=\"color\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "value", [], "any", false, false, false, 42), "html", null, true);
        echo "\" ";
        echo (((twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "required", [], "any", true, true, false, 42) && (twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "required", [], "any", false, false, false, 42) == true))) ? ("required=\"\"") : (""));
        echo "
    >
    <input
            class=\"color-input__hex\" type=\"text\"
            id=\"";
        // line 46
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "id_hex", [], "any", true, true, false, 46)) ? (twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "id_hex", [], "any", false, false, false, 46)) : ((twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "name", [], "any", false, false, false, 46) . "_hex"))), "html", null, true);
        echo "\"
            maxlength=\"7\"
            pattern=\"^#+([a-fA-F0-9]{6})\$\"
            value=\"";
        // line 49
        ((twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "value", [], "any", true, true, false, 49)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "value", [], "any", false, false, false, 49), "html", null, true))) : (print ("#000000")));
        echo "\"
            aria-label=\"";
        // line 50
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "aria_label_hex", [], "any", true, true, false, 50)) ? (twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "aria_label_hex", [], "any", false, false, false, 50)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Hexadecimal color", [], "Modules.Psxdesign.Admin"))), "html", null, true);
        echo "\"
            aria-describedby=\"";
        // line 51
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "name", [], "any", false, false, false, 51) . "_error"), "html", null, true);
        echo "\"
    >
    <button
            type=\"button\"
            class=\"input_color__copy\"
            aria-label=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Copy", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "\"
            data-original-title=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Copy", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "\"
            data-updated-title=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Copied", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo " <span class='material-icons'>done</span>\"
            data-toggle=\"pstooltip\"
            data-placement=\"left\"
    >
        <span class=\"material-icons input_color__copy_icon\">
            content_copy
        </span>
    </button>
    <div id=\"";
        // line 66
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["color"] ?? null), "name", [], "any", false, false, false, 66) . "_error"), "html", null, true);
        echo "\" class=\"color-input__error\" role=\"alert\">
        <p class=\"error__message\">
            ";
        // line 68
        echo twig_striptags($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enter a valid [1]hex code[/1] or use the color picker.", ["[1]" => "<a href=\"https://en.wikipedia.org/wiki/Web_colors#Hex_triplet\" class=\"external-link\" target=\"_blank\" rel=\"noopener\">", "[/1]" => "</a>"], "Modules.Psxdesign.Admin"), "<a>");
        echo "
        </p>
    </div>
</fieldset>
";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/components/color_input.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 68,  106 => 66,  95 => 58,  91 => 57,  87 => 56,  79 => 51,  75 => 50,  71 => 49,  65 => 46,  56 => 42,  52 => 41,  48 => 40,  43 => 38,  40 => 37,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/components/color_input.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/components/color_input.html.twig");
    }
}
