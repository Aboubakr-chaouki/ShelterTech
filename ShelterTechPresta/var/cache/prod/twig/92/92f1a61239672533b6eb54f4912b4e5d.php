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

/* @Modules/psxdesign/views/templates/components/gateway.html.twig */
class __TwigTemplate_31478290f4682626342b2a28efa1b037 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'gateway' => [$this, 'block_gateway'],
            'gateway_header' => [$this, 'block_gateway_header'],
            'gateway_content' => [$this, 'block_gateway_content'],
            'gateway_footer' => [$this, 'block_gateway_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->displayBlock('gateway', $context, $blocks);
    }

    public function block_gateway($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "<div class=\"gateway gateway--blur-background\">
    <aside class=\"card mx-auto p-3\">
        <header>
            ";
        // line 30
        $this->displayBlock('gateway_header', $context, $blocks);
        // line 32
        echo "        </header>
        <div>
            ";
        // line 34
        $this->displayBlock('gateway_content', $context, $blocks);
        // line 36
        echo "        </div>
        <footer>
            ";
        // line 38
        $this->displayBlock('gateway_footer', $context, $blocks);
        // line 40
        echo "        </footer>
    </aside>
</div>
";
    }

    // line 30
    public function block_gateway_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "            ";
    }

    // line 34
    public function block_gateway_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        echo "            ";
    }

    // line 38
    public function block_gateway_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 39
        echo "            ";
    }

    public function getTemplateName()
    {
        return "@Modules/psxdesign/views/templates/components/gateway.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  97 => 39,  93 => 38,  89 => 35,  85 => 34,  81 => 31,  77 => 30,  70 => 40,  68 => 38,  64 => 36,  62 => 34,  58 => 32,  56 => 30,  51 => 27,  44 => 26,  41 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psxdesign/views/templates/components/gateway.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psxdesign/views/templates/components/gateway.html.twig");
    }
}
