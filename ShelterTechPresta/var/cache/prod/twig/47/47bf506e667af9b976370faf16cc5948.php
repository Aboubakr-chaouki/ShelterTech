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

/* @Modules/psassistant/views/templates/admin/legal.html.twig */
class __TwigTemplate_13e07b7a62208811ff72925c71e21e4a extends Template
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
        // line 1
        echo "<div class=\"alert alert-info\">
    <ul class=\"list-unstyled\">
        <li><p>
            ";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("By activating this option, we may process your personal data in order to provide our support services. Information about this data processing can be found in our", [], "Modules.Psassistant.Admin"), "html", null, true);
        echo "<a target=\"_blank\" href=\"";
        echo twig_escape_filter($this->env, ($context["cgu_href"] ?? null), "html", null, true);
        echo "\">
            ";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("PrestaShop Account terms and conditions", [], "Modules.Psassistant.Admin"), "html", null, true);
        echo "</a>
            ";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("(see data processing agreement in the appendix).", [], "Modules.Psassistant.Admin"), "html", null, true);
        echo "
            <a target=\"_blank\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["privacy_href"] ?? null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Learn more about your data and your rights.", [], "Modules.Psassistant.Admin"), "html", null, true);
        echo "</a>
        </p></li>
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/psassistant/views/templates/admin/legal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 7,  52 => 6,  48 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/psassistant/views/templates/admin/legal.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/psassistant/views/templates/admin/legal.html.twig");
    }
}
