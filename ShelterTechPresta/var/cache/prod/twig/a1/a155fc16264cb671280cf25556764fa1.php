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

/* @Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_description.html.twig */
class __TwigTemplate_fb4ec0e02649ed842c8c01d19c9e778d extends Template
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
<div class=\"col-12 col-lg-4\">
    <h2>";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Colors", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "</h2>
    <p class=\"text-muted\">
        ";
        // line 29
        echo twig_striptags($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customize the colors by writing the [1]hex color code[/1] or by using the color picker.", ["[1]" => ((        // line 32
($context["isColorFeatureEnabled"] ?? null)) ? ("<a href=\"https://en.wikipedia.org/wiki/Web_colors#Hex_triplet\" target=\"_blank\" rel=\"noopener\" class=\"external-link\">") : ("<a href=\"https://en.wikipedia.org/wiki/Web_colors#Hex_triplet\" target=\"_blank\" rel=\"noopener\" tabindex=\"-1\" class=\"external-link\">")), "[/1]" => "</a>"], "Modules.Psxdesign.Admin"), "<a>");
        // line 39
        echo "
    </p>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_description.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 39,  47 => 32,  46 => 29,  41 => 27,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_description.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_description.html.twig");
    }
}
