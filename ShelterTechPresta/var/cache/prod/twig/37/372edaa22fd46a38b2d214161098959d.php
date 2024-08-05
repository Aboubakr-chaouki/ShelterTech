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

/* @Modules/ps_linklist/views/templates/admin/fields.html.twig */
class __TwigTemplate_597d17a007659ffafcc61950f60247fd extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'choice_widget_expanded' => [$this, 'block_choice_widget_expanded'],
            'checkbox_widget' => [$this, 'block_checkbox_widget'],
            'form_row' => [$this, 'block_form_row'],
            'form_row_class' => [$this, 'block_form_row_class'],
            'unlabeled_form_group_class' => [$this, 'block_unlabeled_form_group_class'],
            'custom_url_widget' => [$this, 'block_custom_url_widget'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 48
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 67
        echo "
";
        // line 68
        $this->displayBlock('form_row', $context, $blocks);
        // line 84
        echo "
";
        // line 85
        $this->displayBlock('form_row_class', $context, $blocks);
        // line 88
        echo "
";
        // line 89
        $this->displayBlock('unlabeled_form_group_class', $context, $blocks);
        // line 93
        $this->displayBlock('custom_url_widget', $context, $blocks);
    }

    // line 21
    public function block_choice_widget_expanded($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 23), "choices", [], "any", false, false, false, 23));
        foreach ($context['_seq'] as $context["name"] => $context["choices"]) {
            // line 24
            echo "      ";
            if (twig_test_iterable($context["choices"])) {
                // line 25
                echo "
        <label class=\"choice_category\">
          <strong>
            ";
                // line 28
                echo twig_escape_filter($this->env, (((($context["choice_translation_domain"] ?? null) === false)) ? ($context["name"]) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["name"], [], ($context["choice_translation_domain"] ?? null)))), "html", null, true);
                echo "
          </strong>
        </label>
        <div>
          ";
                // line 32
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["choices"]);
                foreach ($context['_seq'] as $context["key"] => $context["choice"]) {
                    // line 33
                    echo "            ";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_0 = ($context["form"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["key"]] ?? null) : null), 'widget');
                    echo "
            ";
                    // line 34
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_1 = ($context["form"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["key"]] ?? null) : null), 'label');
                    echo "
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['choice'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "        </div>

      ";
            } else {
                // line 40
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_2 = ($context["form"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[$context["name"]] ?? null) : null), 'widget');
                // line 41
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((($__internal_compile_3 = ($context["form"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[$context["name"]] ?? null) : null), 'label', ["translation_domain" => ($context["choice_translation_domain"] ?? null)]);
            }
            // line 44
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['choices'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "  </div>";
    }

    // line 48
    public function block_checkbox_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), "")) : (""));
        // line 50
        $context["switch"] = ((array_key_exists("switch", $context)) ? (_twig_default_filter(($context["switch"] ?? null), "")) : (""));
        // line 51
        ob_start(function () { return ''; });
        // line 52
        echo "    <input type=\"checkbox\" class=\"js-bulk-action-checkbox\"
           ";
        // line 53
        if (($context["switch"] ?? null)) {
            echo "data-toggle=\"switch\"";
        }
        echo " ";
        if (($context["switch"] ?? null)) {
            echo "class=\"";
            echo twig_escape_filter($this->env, ($context["switch"] ?? null), "html", null, true);
            echo "\"";
        }
        echo " ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\"";
        }
        if (($context["checked"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " />
    <i class=\"md-checkbox-control\"></i>
  ";
        $context["checkbox_input"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 56
        echo "
  ";
        // line 57
        if (twig_in_filter("checkbox-inline", ($context["parent_label_class"] ?? null))) {
            // line 58
            echo "    <div class=\"md-checkbox md-checkbox-inline\">";
            // line 59
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => ($context["checkbox_input"] ?? null)]);
            // line 60
            echo "</div>
  ";
        } else {
            // line 62
            echo "<div class=\"md-checkbox my-1\">";
            // line 63
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label', ["widget" => ($context["checkbox_input"] ?? null)]);
            // line 64
            echo "</div>";
        }
    }

    // line 68
    public function block_form_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
        ob_start(function () { return ''; });
        // line 70
        echo "    <div class=\"";
        $this->displayBlock("form_row_class", $context, $blocks);
        echo " ";
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " has-error";
        }
        echo "\">
      ";
        // line 71
        if ( !(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 71), "label", [], "any", false, false, false, 71) === false)) {
            // line 72
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
            echo "
        ";
            // line 73
            $context["formGroupClasses"] =             $this->renderBlock("form_group_class", $context, $blocks);
            // line 74
            echo "      ";
        } else {
            // line 75
            echo "        ";
            $context["formGroupClasses"] =             $this->renderBlock("unlabeled_form_group_class", $context, $blocks);
            // line 76
            echo "      ";
        }
        // line 77
        echo "      <div class=\"";
        echo twig_escape_filter($this->env, ($context["formGroupClasses"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
        ";
        // line 79
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
      </div>
    </div>
  ";
        $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 69
        echo twig_spaceless($___internal_parse_0_);
    }

    // line 85
    public function block_form_row_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 86
        echo "form-group row";
    }

    // line 89
    public function block_unlabeled_form_group_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 90
        echo "col-sm-12";
    }

    // line 93
    public function block_custom_url_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 94
        $context["classes"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 94), "attr", [], "any", false, true, false, 94), "class", [], "any", true, true, false, 94)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 94), "attr", [], "any", false, true, false, 94), "class", [], "any", false, false, false, 94), "")) : ("")) . " js-locale-input");
        // line 95
        echo "  ";
        $context["classes"] = ((($context["classes"] ?? null) . " js-locale-") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 95), "label", [], "any", false, false, false, 95));
        // line 96
        echo "
  <div class=\"form-control ";
        // line 97
        echo twig_escape_filter($this->env, ($context["classes"] ?? null), "html", null, true);
        echo "\">
    ";
        // line 98
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "title", [], "any", false, false, false, 98), 'row');
        echo "
    ";
        // line 99
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "url", [], "any", false, false, false, 99), 'row');
        echo "
  </div>";
    }

    public function getTemplateName()
    {
        return "@Modules/ps_linklist/views/templates/admin/fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  279 => 99,  275 => 98,  271 => 97,  268 => 96,  265 => 95,  263 => 94,  259 => 93,  255 => 90,  251 => 89,  247 => 86,  243 => 85,  239 => 69,  232 => 79,  228 => 78,  223 => 77,  220 => 76,  217 => 75,  214 => 74,  212 => 73,  207 => 72,  205 => 71,  196 => 70,  194 => 69,  190 => 68,  185 => 64,  183 => 63,  181 => 62,  177 => 60,  175 => 59,  173 => 58,  171 => 57,  168 => 56,  144 => 53,  141 => 52,  139 => 51,  137 => 50,  135 => 49,  131 => 48,  127 => 45,  121 => 44,  118 => 41,  116 => 40,  111 => 36,  103 => 34,  98 => 33,  94 => 32,  87 => 28,  82 => 25,  79 => 24,  75 => 23,  70 => 22,  66 => 21,  62 => 93,  60 => 89,  57 => 88,  55 => 85,  52 => 84,  50 => 68,  47 => 67,  45 => 48,  43 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_linklist/views/templates/admin/fields.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/ps_linklist/views/templates/admin/fields.html.twig");
    }
}
