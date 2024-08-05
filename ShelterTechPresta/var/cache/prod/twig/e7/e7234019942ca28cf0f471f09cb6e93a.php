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

/* @Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig */
class __TwigTemplate_a38e6866676ca25c2b9943e68a5f6991 extends Template
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
        // line 26
        $this->loadTemplate("@Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig", 26, "1838529478")->display($context);
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig");
    }
}


/* @Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig */
class __TwigTemplate_a38e6866676ca25c2b9943e68a5f6991___1838529478 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'gateway_header' => [$this, 'block_gateway_header'],
            'gateway_content' => [$this, 'block_gateway_content'],
            'gateway_footer' => [$this, 'block_gateway_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@Modules/psxdesign/views/templates/components/gateway.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@Modules/psxdesign/views/templates/components/gateway.html.twig", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_gateway_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "        <h2 class=\"h3 mb-3\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Use a compatible theme to customize colors", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "</h2>
    ";
    }

    // line 30
    public function block_gateway_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "        <img class=\"d-block mx-auto mb-3\" src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("../modules/psxdesign/views/img/custom_design.png"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Customize your theme image", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "\"/>
        <p class=\"text-muted mb-3\">
            ";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Choose a theme from the list in the Themes page.", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "
        </p>
    ";
    }

    // line 36
    public function block_gateway_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        echo "        <div class=\"d-flex flex-wrap form-group inline-switch-widget mb-0\">
            <a class=\"btn btn-outline-primary flex-grow-1\" href=\"";
        // line 38
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_psxdesign_themes_index");
        echo "\"><i class=\"material-icons\">arrow_back</i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Go to Themes", [], "Modules.Psxdesign.Admin"), "html", null, true);
        echo "</a>
        </div>
    ";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 38,  131 => 37,  127 => 36,  120 => 33,  112 => 31,  108 => 30,  101 => 28,  97 => 27,  40 => 26,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/admin/colors/Blocks/Gateway/color_feature_disabled_gateway.html.twig");
    }
}
