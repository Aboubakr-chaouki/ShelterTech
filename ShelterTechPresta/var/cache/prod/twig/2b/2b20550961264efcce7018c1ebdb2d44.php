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

/* @PrestaShop/Admin/Sell/Catalog/Product/SpecificPrice/FormTheme/specific_price.html.twig */
class __TwigTemplate_2742eb302d6375c9606095840405efa3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'searched_customer_row' => [$this, 'block_searched_customer_row'],
            'searched_customer_id_customer_widget' => [$this, 'block_searched_customer_id_customer_widget'],
            'searched_customer_fullname_and_email_widget' => [$this, 'block_searched_customer_fullname_and_email_widget'],
            'specific_price_impact_row' => [$this, 'block_specific_price_impact_row'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit_base.html.twig", "@PrestaShop/Admin/Sell/Catalog/Product/SpecificPrice/FormTheme/specific_price.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_searched_customer_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "  ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), ["class" => twig_trim_filter((((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 29)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 29), "")) : ("")) . " media entity-item"))]);
        // line 30
        echo "  <li ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
    <div class=\"media-body media-middle\">
      ";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "fullname_and_email", [], "any", false, false, false, 32), 'widget');
        echo "
      <i class=\"material-icons entity-item-delete\">clear</i>
    </div>
    ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "id_customer", [], "any", false, false, false, 35), 'widget');
        echo "
  </li>
";
    }

    // line 44
    public function block_searched_customer_id_customer_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        echo "  ";
        $context["attr"] = twig_array_filter($this->env, ($context["attr"] ?? null), function ($__value__, $__key__) use ($context, $macros) { $context["value"] = $__value__; $context["key"] = $__key__; return (($context["key"] ?? null) != "disabled"); });
        // line 46
        echo "  ";
        $this->displayBlock("hidden_widget", $context, $blocks);
        echo "
";
    }

    // line 49
    public function block_searched_customer_fullname_and_email_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 50
        echo "  ";
        $context["attr"] = twig_array_filter($this->env, ($context["attr"] ?? null), function ($__value__, $__key__) use ($context, $macros) { $context["value"] = $__value__; $context["key"] = $__key__; return (($context["key"] ?? null) != "disabled"); });
        // line 51
        echo "  ";
        $this->displayBlock("text_preview_widget", $context, $blocks);
        echo "
";
    }

    // line 54
    public function block_specific_price_impact_row($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 55
        echo "  ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'label');
        echo "
  ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
  ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Product/SpecificPrice/FormTheme/specific_price.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 57,  112 => 56,  107 => 55,  103 => 54,  96 => 51,  93 => 50,  89 => 49,  82 => 46,  79 => 45,  75 => 44,  68 => 35,  62 => 32,  56 => 30,  53 => 29,  49 => 28,  38 => 26,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Product/SpecificPrice/FormTheme/specific_price.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Product/SpecificPrice/FormTheme/specific_price.html.twig");
    }
}
