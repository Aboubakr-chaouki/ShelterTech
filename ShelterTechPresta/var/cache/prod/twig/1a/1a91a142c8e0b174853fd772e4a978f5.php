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

/* @Modules/psxdesign/views/templates/admin/fonts/index.html.twig */
class __TwigTemplate_c4d6dab18963fae92973b25d1c676923 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'font_customization' => [$this, 'block_font_customization'],
            'font_customization_description' => [$this, 'block_font_customization_description'],
            'font_customization_content' => [$this, 'block_font_customization_content'],
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
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@Modules/psxdesign/views/templates/admin/fonts/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "    <div class=\"container position-relative\">
        ";
        // line 30
        if ( !($context["fontFeatureAvailability"] ?? null)) {
            // line 31
            echo "            ";
            $this->loadTemplate("@Modules/psxdesign/views/templates/admin/fonts/Blocks/Gateway/font_feature_disabled_gateway.html.twig", "@Modules/psxdesign/views/templates/admin/fonts/index.html.twig", 31)->display($context);
            // line 32
            echo "        ";
        }
        // line 33
        echo "        ";
        $context["formId"] = "font_customization";
        // line 34
        echo "        ";
        $context["fontsByCategories"] = ((($context["fontFeatureAvailability"] ?? null)) ? (($context["themeFontsDataByCategories"] ?? null)) : (($context["fontsByCategoriesPlaceholder"] ?? null)));
        // line 35
        echo "        ";
        $this->displayBlock('font_customization', $context, $blocks);
        // line 57
        echo "        ";
        $this->loadTemplate("@Modules/psxdesign/views/templates/components/save_banner.html.twig", "@Modules/psxdesign/views/templates/admin/fonts/index.html.twig", 57)->display(twig_array_merge($context, ["form" =>         // line 58
($context["formId"] ?? null)]));
        // line 60
        echo "    </div>
";
    }

    // line 35
    public function block_font_customization($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 36
        echo "            <form id=\"";
        echo twig_escape_filter($this->env, ($context["formId"] ?? null), "html", null, true);
        echo "\" name=\"font_customization\" method=\"post\" action=\" ";
        echo (( !($context["fontFeatureAvailability"] ?? null)) ? ("") : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_psxdesign_upsert_font_action")));
        echo "\">
                ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fontsByCategories"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["fontsCategory"]) {
            // line 38
            echo "                    ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["fontsCategory"], "fonts", [], "any", false, false, false, 38))) {
                // line 39
                echo "                            <div class=\"row\">
                                ";
                // line 40
                $this->displayBlock('font_customization_description', $context, $blocks);
                // line 45
                echo "                                ";
                $this->displayBlock('font_customization_content', $context, $blocks);
                // line 52
                echo "                            </div>
                    ";
            }
            // line 54
            echo "                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fontsCategory'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "            </form>
        ";
    }

    // line 40
    public function block_font_customization_description($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "                                    ";
        $this->loadTemplate("@Modules/psxdesign/views/templates/admin/fonts/Blocks/FontCustomization/font_customization_description.html.twig", "@Modules/psxdesign/views/templates/admin/fonts/index.html.twig", 41)->display(twig_array_merge($context, ["font_category" =>         // line 42
($context["fontsCategory"] ?? null)]));
        // line 44
        echo "                                ";
    }

    // line 45
    public function block_font_customization_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "                                    ";
        $this->loadTemplate("@Modules/psxdesign/views/templates/admin/fonts/Blocks/FontCustomization/font_customization_content.html.twig", "@Modules/psxdesign/views/templates/admin/fonts/index.html.twig", 46)->display(twig_array_merge($context, ["disabled" =>  !        // line 47
($context["fontFeatureAvailability"] ?? null), "font_category" =>         // line 48
($context["fontsCategory"] ?? null), "category_index" => twig_get_attribute($this->env, $this->source,         // line 49
($context["loop"] ?? null), "index", [], "any", false, false, false, 49)]));
        // line 51
        echo "                                ";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/admin/fonts/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 51,  164 => 49,  163 => 48,  162 => 47,  160 => 46,  156 => 45,  152 => 44,  150 => 42,  148 => 41,  144 => 40,  139 => 55,  125 => 54,  121 => 52,  118 => 45,  116 => 40,  113 => 39,  110 => 38,  93 => 37,  86 => 36,  82 => 35,  77 => 60,  75 => 58,  73 => 57,  70 => 35,  67 => 34,  64 => 33,  61 => 32,  58 => 31,  56 => 30,  53 => 29,  49 => 28,  38 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/admin/fonts/index.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/admin/fonts/index.html.twig");
    }
}
