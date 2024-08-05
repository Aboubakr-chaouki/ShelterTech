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

/* @Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_content.html.twig */
class __TwigTemplate_e2fe4778d9d0638682ed2f631d75836d extends Template
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
<div class=\"col-12 col-lg-8\">
    <div class=\"card p-3\">
        ";
        // line 28
        $context["colors"] = ((($context["isColorFeatureEnabled"] ?? null)) ? (($context["colors"] ?? null)) : (($context["colorsPlaceholder"] ?? null)));
        // line 29
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["colors"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["colorsCategory"]) {
            // line 30
            echo "            ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["colorsCategory"], "colors", [], "any", false, false, false, 30))) {
                // line 31
                echo "                <div class=\"row\">
                    <div class=\"col-12 col-md-5\">
                        <h3>
                            ";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["colorsCategory"], "title", [], "any", false, false, false, 34), "html", null, true);
                echo "
                        </h3>
                    </div>
                    <div class=\"col-12 col-md-7\">
                        ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["colorsCategory"], "colors", [], "any", false, false, false, 38));
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
                foreach ($context['_seq'] as $context["_key"] => $context["color"]) {
                    // line 39
                    echo "                            ";
                    $this->loadTemplate("@Modules/psxdesign/views/templates/admin/colors/Blocks/Partials/color_form.html.twig", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_content.html.twig", 39)->display(twig_array_merge($context, ["category_title" => twig_get_attribute($this->env, $this->source,                     // line 40
$context["colorsCategory"], "title", [], "any", false, false, false, 40), "data" =>                     // line 41
$context["color"], "form_index" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 42
$context["loop"], "parent", [], "any", false, false, false, 42), "loop", [], "any", false, false, false, 42), "index", [], "any", false, false, false, 42) . "-") . twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 42))]));
                    // line 44
                    echo "                        ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['color'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "                    </div>
                </div>
            ";
            }
            // line 48
            echo "        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['colorsCategory'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 49,  119 => 48,  114 => 45,  100 => 44,  98 => 42,  97 => 41,  96 => 40,  94 => 39,  77 => 38,  70 => 34,  65 => 31,  62 => 30,  44 => 29,  42 => 28,  37 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_content.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/admin/colors/Blocks/Colors/colors_content.html.twig");
    }
}
