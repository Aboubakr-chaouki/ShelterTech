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

/* @Modules/ps_linklist/views/templates/admin/link_block/form.html.twig */
class __TwigTemplate_67ed0f30e0bd38d06120f17704c181c2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'link_block_form' => [$this, 'block_link_block_form'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 19
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["linkBlockForm"] ?? null), [0 => "@Modules/ps_linklist/views/templates/admin/fields.html.twig"], true);
        // line 19
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@Modules/ps_linklist/views/templates/admin/link_block/form.html.twig", 19);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 23
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "vars", [], "any", false, true, false, 24), "data", [], "any", false, true, false, 24), "link_block", [], "any", false, true, false, 24), "id_link_block", [], "any", true, true, false, 24) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "vars", [], "any", false, false, false, 24), "data", [], "any", false, false, false, 24), "link_block", [], "any", false, false, false, 24), "id_link_block", [], "any", false, false, false, 24)))) {
            // line 25
            echo "        ";
            $context["formAction"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin_link_block_edit_process", ["linkBlockId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "vars", [], "any", false, false, false, 25), "data", [], "any", false, false, false, 25), "link_block", [], "any", false, false, false, 25), "id_link_block", [], "any", false, false, false, 25)]);
            // line 26
            echo "    ";
        } else {
            // line 27
            echo "        ";
            $context["formAction"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin_link_block_create_process");
            // line 28
            echo "    ";
        }
        // line 29
        echo "    ";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["linkBlockForm"] ?? null), 'form_start', ["action" => ($context["formAction"] ?? null), "attr" => ["class" => "form", "id" => "link_block_form"]]);
        echo "
    <div class=\"row justify-content-center\">
        ";
        // line 31
        $this->displayBlock('link_block_form', $context, $blocks);
        // line 73
        echo "    </div>
    ";
        // line 74
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["linkBlockForm"] ?? null), 'form_end');
        echo "
";
    }

    // line 31
    public function block_link_block_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 32
        echo "            <div class=\"col-xl-10\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">mode_edit</i>
                        ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "vars", [], "any", false, true, false, 36), "data", [], "any", false, true, false, 36), "link_block", [], "any", false, true, false, 36), "id_link_block", [], "any", true, true, false, 36)) {
            // line 37
            echo "                            ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Edit the link block.", [], "Modules.Linklist.Admin"), "html", null, true);
            echo "
                        ";
        } else {
            // line 39
            echo "                        ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("New link block", [], "Modules.Linklist.Admin"), "html", null, true);
            echo "
                        ";
        }
        // line 41
        echo "                    </h3>
                    <div class=\"card-block row\">
                        <div class=\"card-text m-auto w-75\">
                            ";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 44), "block_name", [], "any", false, false, false, 44), 'row');
        echo "
                            ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 45), "id_hook", [], "any", false, false, false, 45), 'row');
        echo "
                            ";
        // line 46
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 46), "cms", [], "any", false, false, false, 46), 'row');
        echo "
                            ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 47), "product", [], "any", false, false, false, 47), 'row');
        echo "
                            ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 48), "category", [], "any", false, false, false, 48), 'row');
        echo "
                            ";
        // line 49
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 49), "static", [], "any", false, false, false, 49), 'row');
        echo "
                            ";
        // line 50
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, true, false, 50), "shop_association", [], "any", true, true, false, 50)) {
            // line 51
            echo "                                ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 51), "shop_association", [], "any", false, false, false, 51), 'row');
            echo "
                            ";
        }
        // line 53
        echo "                            <div class=\"form-group\">
                                ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 54), "custom", [], "any", false, false, false, 54), 'row');
        echo "
                                <div class=\"d-flex justify-content-end\">
                                    <button data-collection-id=\"";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 56), "custom", [], "any", false, false, false, 56), "vars", [], "any", false, false, false, 56), "id", [], "any", false, false, false, 56), "html", null, true);
        echo "\" class=\"btn btn-primary add-collection-btn\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Add", [], "Admin.Actions"), "html", null, true);
        echo "</button>
                                </div>
                            </div>
                            ";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 59), 'rest');
        echo "
                            ";
        // line 60
        twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["linkBlockForm"] ?? null), "link_block", [], "any", false, false, false, 60), "setRendered", [], "any", false, false, false, 60);
        // line 61
        echo "                            ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["linkBlockForm"] ?? null), 'rest');
        echo "
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-between\">
                            <a href=\"";
        // line 66
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin_link_block_list");
        echo "\" class=\"btn btn-secondary\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cancel", [], "Admin.Actions"), "html", null, true);
        echo "</a>
                            <button class=\"btn btn-primary\">";
        // line 67
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }

    // line 77
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 78
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("../modules/ps_linklist/views/public/form.bundle.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@Modules/ps_linklist/views/templates/admin/link_block/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 80,  199 => 78,  195 => 77,  185 => 67,  179 => 66,  170 => 61,  168 => 60,  164 => 59,  156 => 56,  151 => 54,  148 => 53,  142 => 51,  140 => 50,  136 => 49,  132 => 48,  128 => 47,  124 => 46,  120 => 45,  116 => 44,  111 => 41,  105 => 39,  99 => 37,  97 => 36,  91 => 32,  87 => 31,  81 => 74,  78 => 73,  76 => 31,  70 => 29,  67 => 28,  64 => 27,  61 => 26,  58 => 25,  55 => 24,  51 => 23,  46 => 19,  44 => 21,  37 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_linklist/views/templates/admin/link_block/form.html.twig", "/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/ps_linklist/views/templates/admin/link_block/form.html.twig");
    }
}
