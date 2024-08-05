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

/* @PrestaShop/Admin/Sell/Catalog/Attachment/Blocks/form.html.twig */
class __TwigTemplate_fbf0c60da61f935f3aecd102bd59584e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'attachment_form' => [$this, 'block_attachment_form'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "
";
        // line 26
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["attachmentForm"] ?? null), [0 => "@PrestaShop/Admin/TwigTemplateForm/prestashop_ui_kit.html.twig"], true);
        // line 27
        echo "
";
        // line 28
        $this->displayBlock('attachment_form', $context, $blocks);
    }

    public function block_attachment_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "  ";
        // line 30
        echo "  ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["attachmentForm"] ?? null), 'form_start', ["attr" => ["data-attachment-id" => ((array_key_exists("attachmentId", $context)) ? (_twig_default_filter(($context["attachmentId"] ?? null), "")) : (""))]]);
        echo "
    <div class=\"card\">
      <h3 class=\"card-header\">
        <i class=\"material-icons\">attachment</i>
        ";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("File", [], "Admin.Global"), "html", null, true);
        echo "
      </h3>
      <div class=\"card-body\">
        <div class=\"form-wrapper\">
          ";
        // line 38
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["attachmentForm"] ?? null), 'errors');
        echo "
          ";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["attachmentForm"] ?? null), 'widget');
        echo "

          ";
        // line 41
        if (array_key_exists("attachmentId", $context)) {
            // line 42
            echo "            <div class=\"form-group row\">
              <div class=\"col-sm float-right\">
                <a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_attachments_view", ["attachmentId" => ($context["attachmentId"] ?? null)]), "html", null, true);
            echo "\" class=\"btn btn-primary float-right\">
                  <i class=\"material-icons\">cloud_download</i>
                  ";
            // line 46
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download current file", [], "messages"), "html", null, true);
            echo "
                </a>
              </div>
            </div>
          ";
        }
        // line 51
        echo "        </div>
      </div>
      <div class=\"card-footer\">
          <a href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['PrestaShopBundle\Twig\Extension\PathWithBackUrlExtension']->getPathWithBackUrl("admin_attachments_index"), "html", null, true);
        echo "\" class=\"btn btn-outline-secondary cancel-btn\">
          ";
        // line 55
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "
        </a>
        <button class=\"btn btn-primary float-right submit-btn\">
          ";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
        </button>
      </div>
    </div>
  ";
        // line 62
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["attachmentForm"] ?? null), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Sell/Catalog/Attachment/Blocks/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 62,  113 => 58,  107 => 55,  103 => 54,  98 => 51,  90 => 46,  85 => 44,  81 => 42,  79 => 41,  74 => 39,  70 => 38,  63 => 34,  55 => 30,  53 => 29,  46 => 28,  43 => 27,  41 => 26,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Sell/Catalog/Attachment/Blocks/form.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/src/PrestaShopBundle/Resources/views/Admin/Sell/Catalog/Attachment/Blocks/form.html.twig");
    }
}
