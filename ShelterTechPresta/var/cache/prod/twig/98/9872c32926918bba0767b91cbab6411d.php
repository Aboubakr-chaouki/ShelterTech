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

/* @PrestaShop/Admin/Sell/Catalog/Product/light_list.html.twig */
class __TwigTemplate_0ae65533708ababcf426b820d23a95b0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'products_light_listing' => [$this, 'block_products_light_listing'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "  ";
        $this->displayBlock('products_light_listing', $context, $blocks);
    }

    public function block_products_light_listing($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "    <div class=\"product-light-list-container\">
      ";
        // line 28
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", ["grid" => ($context["productLightGrid"] ?? null)]);
        echo "
      </div>
  ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Product/light_list.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  57 => 28,  54 => 27,  46 => 26,  39 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Product/light_list.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Product/light_list.html.twig");
    }
}
