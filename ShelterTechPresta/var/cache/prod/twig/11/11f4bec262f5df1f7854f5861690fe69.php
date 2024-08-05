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

/* @Modules/psxdesign/views/templates/admin/colors/index.html.twig */
class __TwigTemplate_aaa58dbb8b5eaac45983e0b94561f0ba extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'colors' => [$this, 'block_colors'],
            'colors_description' => [$this, 'block_colors_description'],
            'colors_content' => [$this, 'block_colors_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        $context["formId"] = "current_color_palette";
        // line 26
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@Modules/psxdesign/views/templates/admin/colors/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 30
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "  <div class=\"container position-relative\">
    ";
        // line 32
        if ( !($context["isColorFeatureEnabled"] ?? null)) {
            // line 33
            echo "        ";
            $this->loadTemplate("@Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig", "@Modules/psxdesign/views/templates/admin/colors/index.html.twig", 33)->display($context);
            // line 34
            echo "    ";
        }
        // line 35
        echo "    ";
        $this->displayBlock('colors', $context, $blocks);
        // line 45
        echo "    ";
        $this->loadTemplate("@Modules/psxdesign/views/templates/components/save_banner.html.twig", "@Modules/psxdesign/views/templates/admin/colors/index.html.twig", 45)->display(twig_array_merge($context, ["form" =>         // line 46
($context["formId"] ?? null)]));
        // line 48
        echo "  </div>
";
    }

    // line 35
    public function block_colors($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
        echo "      <form id=\"";
        echo twig_escape_filter($this->env, ($context["formId"] ?? null), "html", null, true);
        echo "\" method=\"POST\" ";
        echo ((($context["isColorFeatureEnabled"] ?? null)) ? ("") : ("disabled"));
        echo " action=\"";
        echo ((($context["isColorFeatureEnabled"] ?? null)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_psxdesign_upsert_color_palette_action")) : (""));
        echo "\" class=\"row\">
        ";
        // line 37
        $this->displayBlock('colors_description', $context, $blocks);
        // line 40
        echo "        ";
        $this->displayBlock('colors_content', $context, $blocks);
        // line 43
        echo "      </form>
    ";
    }

    // line 37
    public function block_colors_description($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 38
        echo "          ";
        $this->loadTemplate("@Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_description.html.twig", "@Modules/psxdesign/views/templates/admin/colors/index.html.twig", 38)->display($context);
        // line 39
        echo "        ";
    }

    // line 40
    public function block_colors_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "          ";
        $this->loadTemplate("@Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_content.html.twig", "@Modules/psxdesign/views/templates/admin/colors/index.html.twig", 41)->display($context);
        // line 42
        echo "        ";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/admin/colors/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 42,  117 => 41,  113 => 40,  109 => 39,  106 => 38,  102 => 37,  97 => 43,  94 => 40,  92 => 37,  83 => 36,  79 => 35,  74 => 48,  72 => 46,  70 => 45,  67 => 35,  64 => 34,  61 => 33,  59 => 32,  56 => 31,  52 => 30,  47 => 26,  45 => 28,  38 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/admin/colors/index.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/admin/colors/index.html.twig");
    }
}
