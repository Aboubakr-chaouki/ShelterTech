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

/* __string_template__f9c3c5f0f5a62cb54f4ee6512b2eb962 */
class __TwigTemplate_befe50d56a48acc53c45298946e8f1ed extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_stylesheets' => [$this, 'block_extra_stylesheets'],
            'content_header' => [$this, 'block_content_header'],
            'content' => [$this, 'block_content'],
            'content_footer' => [$this, 'block_content_footer'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
            'javascripts' => [$this, 'block_javascripts'],
            'extra_javascripts' => [$this, 'block_extra_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/ShelterTech/ShelterTechPresta/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/ShelterTech/ShelterTechPresta/img/app_icon.png\" />

<title>Produits • Shelter Tech</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminProducts';
    var iso_user = 'fr';
    var lang_is_rtl = '0';
    var full_language_code = 'fr';
    var full_cldr_language_code = 'fr-FR';
    var country_iso_code = 'FR';
    var _PS_VERSION_ = '8.1.6';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'Une nouvelle commande a été passée sur votre boutique.';
    var order_number_msg = 'Numéro de commande : ';
    var total_msg = 'Total : ';
    var from_msg = 'Du ';
    var see_order_msg = 'Afficher cette commande';
    var new_customer_msg = 'Un nouveau client s\\'est inscrit sur votre boutique.';
    var customer_name_msg = 'Nom du client : ';
    var new_msg = 'Un nouveau message a été posté sur votre boutique.';
    var see_msg = 'Lire le message';
    var token = '3261029a1a322ec0d5aa153a82abe820';
    var currentIndex = 'index.php?controller=AdminProducts';
    var employee_token = '3deba65badb9fd8edd08e408e099a906';
    var choose_language_translate = 'Choisissez la langue :';
    var default_language = '1';
    var admin_modules_link = '/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/modules/manage?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4';
    var admin_notification_get_link = '/ShelterTech/ShelterTechPresta/ps-admin/index.php/common/notifications?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4';
    var admin_notification_push_link = adminNotificationPushLink = '/ShelterTech/ShelterTechPresta/ps-admin/index.php/common/noti";
        // line 40
        echo "fications/ack?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4';
    var tab_modules_list = '';
    var update_success_msg = 'Mise à jour réussie';
    var search_product_msg = 'Rechercher un produit';
  </script>



<link
      rel=\"preload\"
      href=\"/ShelterTech/ShelterTechPresta/ps-admin/themes/new-theme/public/2d8017489da689caedc1.preload..woff2\"
      as=\"font\"
      crossorigin
    >
      <link href=\"/ShelterTech/ShelterTechPresta/ps-admin/themes/new-theme/public/create_product_default_theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/ps-admin/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"https://unpkg.com/@prestashopcorp/edition-reskin/dist/back.min.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/modules/blockwishlist/public/backoffice.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/modules/ps_mbo/views/css/cdc-error-templating.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/modules/ps_mbo/views/css/recommended-modules.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/modules/klaviyopsautomation/dist/css/klaviyops-admin-global.e510d42b.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/ps-admin/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/modules/psxdesign/views/css/admin/dashboard-notification.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/modules/psxmarketingwithgoogle/views/css/admin/menu.css\" re";
        // line 65
        echo "l=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/ShelterTech/ShelterTechPresta/modules/ps_facebook/views/css/admin/menu.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var baseAdminDir = \"\\/ShelterTech\\/ShelterTechPresta\\/ps-admin\\/\";
var baseDir = \"\\/ShelterTech\\/ShelterTechPresta\\/\";
var changeFormLanguageUrl = \"\\/ShelterTech\\/ShelterTechPresta\\/ps-admin\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\";
var currency = {\"iso_code\":\"EUR\",\"sign\":\"\\u20ac\",\"name\":\"Euro\",\"format\":null};
var currency_specifications = {\"symbol\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"EUR\",\"currencySymbol\":\"\\u20ac\",\"numberSymbols\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.00\\u00a0\\u00a4\",\"negativePattern\":\"-#,##0.00\\u00a0\\u00a4\",\"maxFractionDigits\":2,\"minFractionDigits\":2,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var number_specifications = {\"symbol\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"numberSymbols\":[\",\",\"\\u202f\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var prestashop = {\"debug\":false};
var psxDesignUpdateNotification = \"\\n<div class=\\\"psxdesign-notification\\\">\\n  1\\n<\\/div>\\n\";
var show_new_customers = \"1\";
var show_new_messages = \"1\";
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/modules/ps_edition_basic/views/js/favicon.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/ps-admin/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" sr";
        // line 84
        echo "c=\"/ShelterTech/ShelterTechPresta/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/js/admin.js?v=8.1.6\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/ps-admin/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/js/tools.js?v=8.1.6\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/ps-admin/themes/new-theme/public/create_product.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/modules/blockwishlist/public/vendors.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/modules/ps_mbo/views/js/cdc-error-templating.js\"></script>
<script type=\"text/javascript\" src=\"https://assets.prestashop3.com/dst/mbo/v1/mbo-cdc.umd.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/modules/ps_mbo/views/js/recommended-modules.js?v=4.11.3\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/modules/gamification/views/js/gamification_bt.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/modules/ps_emailalerts/js/admin/ps_emailalerts.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/ps-admin/themes/default/js/vendor/nv.d3.min.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>
<script type=\"text/javascript\" src=\"/ShelterTech/ShelterTechPresta/modules/ps_faviconnotificationbo/views/js/ps_faviconnotificationbo.js\"></script>

  <script type=\"module\" src=\"/ShelterTech/ShelterTechPresta/modules/psxdesign/views/js/upgrade-notification.js\"></script>
<script>
            var admin_gamification_ajax_url = \"http:\\/\\/localhost:8888\\/Shelte";
        // line 102
        echo "rTech\\/ShelterTechPresta\\/ps-admin\\/index.php?controller=AdminGamification&token=68dda4831051ce6da2446c94c2b104db\";
            var current_id_tab = 10;
        </script><script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '#DF0067',
      textColor: '#FFFFFF',
      notificationGetUrl: '/ShelterTech/ShelterTechPresta/ps-admin/index.php/common/notifications?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4',
      CHECKBOX_ORDER: 1,
      CHECKBOX_CUSTOMER: 1,
      CHECKBOX_MESSAGE: 1,
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>
    <script>
        window.userLocale  = 'fr';
        window.userflow_id = 'ct_55jfryadgneorc45cjqxpbf6o4';
    </script>
    <script type=\"module\" src=\"https://unpkg.com/@prestashopcorp/smb-edition-homepage/dist/assets/index.js\"></script>

";
        // line 123
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>";
        echo "

<body
  class=\"lang-fr adminproducts\"
  data-base-url=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php\"  data-token=\"OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\">

  <header id=\"header\" class=\"d-print-none\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/pseditionbasic/homepage?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\"></a>
      <span id=\"shop_version\">8.1.6</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Accès rapide
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item quick-row-link \"
         href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/orders?token=1e94545a496e16c07c98bc4ada6b4c9a\"
                 data-item=\"Commandes\"
      >Commandes</a>
          <a class=\"dropdown-item quick-row-link \"
         href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=62b0bdb37688ce6fafde278589db3e56\"
                 data-item=\"Évaluation du catalogue\"
      >Évaluation du catalogue</a>
          <a class=\"dropdown-item quick-row-link \"
         href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/modules/manage?token=1e94545a496e16c07c98bc4ada6b4c9a\"
                 data-item=\"Modules installés\"
      >Modules installés</a>
          <a class=\"dropdown-item quick-row-link \"
         href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCartRules&amp;addcart_rule&amp;t";
        // line 157
        echo "oken=a40aa8d0b4f65612bd7a6b033d24a259\"
                 data-item=\"Nouveau bon de réduction\"
      >Nouveau bon de réduction</a>
          <a class=\"dropdown-item quick-row-link new-product-button\"
         href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/products-v2/create?token=1e94545a496e16c07c98bc4ada6b4c9a\"
                 data-item=\"Nouveau produit\"
      >Nouveau produit</a>
          <a class=\"dropdown-item quick-row-link \"
         href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/categories/new?token=1e94545a496e16c07c98bc4ada6b4c9a\"
                 data-item=\"Nouvelle catégorie\"
      >Nouvelle catégorie</a>
        <div class=\"dropdown-divider\"></div>
          <a id=\"quick-add-link\"
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-rand=\"92\"
        data-icon=\"icon-AdminCatalog\"
        data-method=\"add\"
        data-url=\"index.php/sell/catalog/products-v2/27/edit\"
        data-post-link=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminQuickAccesses&token=c4f875c74ff8d2d7a9776b717887ba46\"
        data-prompt-text=\"Veuillez nommer ce raccourci :\"
        data-link=\"Produits - Liste\"
      >
        <i class=\"material-icons\">add_circle</i>
        Ajouter la page actuelle à l'accès rapide
      </a>
        <a id=\"quick-manage-link\" class=\"dropdown-item\" href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminQuickAccesses&token=c4f875c74ff8d2d7a9776b717887ba46\">
      <i class=\"material-icons\">settings</i>
      Gérez vos accès rapides
    </a>
  </div>
</div>
      </div>
      <div class=\"component component-search\" id=\"header-search-container\">
        <div class=\"component-search-body\">
          <div class=\"component-search-top\">
            <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form collapsed\"
      method=\"post\"
      ";
        // line 196
        echo "action=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminSearch&amp;token=6310a1ba06c4cd5bd5a9c513cab690be\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" value=\"\" placeholder=\"Rechercher (ex. : référence produit, nom du client, etc.)\" aria-label=\"Barre de recherche\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Partout
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Partout\" href=\"#\" data-value=\"0\" data-placeholder=\"Que souhaitez-vous trouver ?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Partout</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Catalogue\" href=\"#\" data-value=\"1\" data-placeholder=\"Nom du produit, référence, etc.\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Catalogue</a>
        <a class=\"dropdown-item\" data-item=\"Clients par nom\" href=\"#\" data-value=\"2\" data-placeholder=\"Nom\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Clients par nom</a>
        <a class=\"dropdown-item\" data-item=\"Clients par adresse IP\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.89\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Clients par adresse IP</a>
        <a class=\"dropdown-item\" data-item=\"Commandes\" href=\"#\" data-value=\"3\" data-placeholder=\"ID commande\" data-icon=\"icon-credit-card\"><i class=\"material-icons\">shopping_basket</i> Commandes</a>
        <a class=\"dropdown-item\" data-item=\"Factures\" href=\"#\" data-value=\"4\" data-placeholder=\"Numéro de facture\" data-icon=\"icon-book\"><i class=\"material-icons\">book</i> Factures";
        // line 212
        echo "</a>
        <a class=\"dropdown-item\" data-item=\"Paniers\" href=\"#\" data-value=\"5\" data-placeholder=\"ID panier\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Paniers</a>
        <a class=\"dropdown-item\" data-item=\"Modules\" href=\"#\" data-value=\"7\" data-placeholder=\"Nom du module\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Modules</a>
      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">RECHERCHE</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
            <button class=\"component-search-cancel d-none\">Annuler</button>
          </div>

          <div class=\"component-search-quickaccess d-none\">
  <p class=\"component-search-title\">Accès rapide</p>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/orders?token=1e94545a496e16c07c98bc4ada6b4c9a\"
             data-item=\"Commandes\"
    >Commandes</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=62b0bdb37688ce6fafde278589db3e56\"
             data-item=\"Évaluation du catalogue\"
    >Évaluation du catalogue</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/modules/manage?token=1e94545a496e16c07c98bc4ada6b4c9a\"
             data-item=\"Modules installés\"
    >Modules installés</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=a40aa8d0b4f65612bd7a6b033d24a259\"
             data-ite";
        // line 247
        echo "m=\"Nouveau bon de réduction\"
    >Nouveau bon de réduction</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/products-v2/create?token=1e94545a496e16c07c98bc4ada6b4c9a\"
             data-item=\"Nouveau produit\"
    >Nouveau produit</a>
      <a class=\"dropdown-item quick-row-link\"
       href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/categories/new?token=1e94545a496e16c07c98bc4ada6b4c9a\"
             data-item=\"Nouvelle catégorie\"
    >Nouvelle catégorie</a>
    <div class=\"dropdown-divider\"></div>
      <a id=\"quick-add-link\"
      class=\"dropdown-item js-quick-link\"
      href=\"#\"
      data-rand=\"182\"
      data-icon=\"icon-AdminCatalog\"
      data-method=\"add\"
      data-url=\"index.php/sell/catalog/products-v2/27/edit\"
      data-post-link=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminQuickAccesses&token=c4f875c74ff8d2d7a9776b717887ba46\"
      data-prompt-text=\"Veuillez nommer ce raccourci :\"
      data-link=\"Produits - Liste\"
    >
      <i class=\"material-icons\">add_circle</i>
      Ajouter la page actuelle à l'accès rapide
    </a>
    <a id=\"quick-manage-link\" class=\"dropdown-item\" href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminQuickAccesses&token=c4f875c74ff8d2d7a9776b717887ba46\">
    <i class=\"material-icons\">settings</i>
    Gérez vos accès rapides
  </a>
</div>
        </div>

        <div class=\"component-search-background d-none\"></div>
      </div>

      
                      <div class=\"component hide-mobile-sm\" id=\"header-maintenance-mode-container\">
          <a class=\"link shop-state\"
             id=\"maintenance-mode\"
             data-toggle=\"pstooltip\"
             data-placement=\"bottom\"
             data-html=\"true\"
             title=\"          &lt;p class=&quot;text-left text-nowrap&quot;&gt;
            &lt;s";
        // line 290
        echo "trong&gt;Votre boutique est en mode maintenance.&lt;/strong&gt;
          &lt;/p&gt;
          &lt;p class=&quot;text-left&quot;&gt;
              Vos visiteurs et clients ne peuvent pas accéder à votre boutique lorsque le mode maintenance est activé.
          &lt;/p&gt;
          &lt;p class=&quot;text-left&quot;&gt;
              Pour gérer les paramètres de maintenance, rendez-vous sur la page Paramètres de la boutique &amp;gt; Paramètres généraux &amp;gt; Maintenance.
          &lt;/p&gt;
                      &lt;p class=&quot;text-left&quot;&gt;
              Les administrateurs peuvent accéder au front-office de la boutique sans que leur adresse IP ne soit enregistrée.
            &lt;/p&gt;
                  \"
             href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/shop/maintenance/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\"
          >
            <i class=\"material-icons\"
              style=\"color: var(--green);\"
            >build</i>
            <span>Mode maintenance</span>
          </a>
        </div>
      
      <div class=\"header-right\">
                  <div class=\"component\" id=\"header-shop-list-container\">
              <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/\" target= \"_blank\">
      <i class=\"material-icons\">visibility</i>
      <span>Voir ma boutique</span>
    </a>
  </div>
          </div>
                          <div class=\"component header-right-component\" id=\"header-notifications-container\">
            <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav";
        // line 328
        echo " nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Commandes<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Clients<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Messages<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Pas de nouvelle commande pour le moment :(<br>
              Avez-vous consulté vos <strong><a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCarts&action=filterOnlyAbandonedCarts&token=2ee9ac2bb68359de3dd75a3d4ff1a27d\">paniers abandonnés</a></strong> ?<br> Votre prochaine commande s'y trouve peut-être !
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notificati";
        // line 377
        echo "on\">
              Aucun nouveau client pour l'instant :(<br>
              Êtes-vous actifs sur les réseaux sociaux en ce moment ?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Pas de nouveau message pour l'instant.<br>
              On dirait que vos clients sont satisfaits :)
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      de <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - enregistré le <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
          </div>
        
        <div class=\"component\" id=\"header-employee-container\">
          <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">
      <div class=\"employee-top\">
        <span class=\"employee-avatar\"><img class=\"avatar rounded-circle\" src=\"http://localhost:8888/ShelterTech/";
        // line 427
        echo "ShelterTechPresta/img/pr/default.jpg\" alt=\"Aboubakr\" /></span>
        <span class=\"employee_profile\">Ravi de vous revoir Aboubakr</span>
      </div>

      <a class=\"dropdown-item employee-link profile-link\" href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/employees/1/edit?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\">
      <i class=\"material-icons\">edit</i>
      <span>Votre profil</span>
    </a>
    </div>

    <p class=\"divider\"></p>

                  <a class=\"dropdown-item \" href=\"https://accounts.distribution.prestashop.net?utm_source=localhost%3A8888&utm_medium=back-office&utm_campaign=ps_accounts&utm_content=headeremployeedropdownlink\"  target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">open_in_new</i> Gérer votre compte PrestaShop
        </a>
                          <a class=\"dropdown-item ps_mbo\" href=\"https://www.prestashop.com/fr/formation?utm_source=back-office&utm_medium=menu&utm_content=download8_1&utm_campaign=training-fr&utm_mbo_source=menu-user-back-office\"  target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">school</i> Formation
        </a>
                          <a class=\"dropdown-item ps_mbo\" href=\"https://www.prestashop.com/fr/experts?utm_source=back-office&utm_medium=menu&utm_content=download8_1&utm_campaign=expert-fr&utm_mbo_source=menu-user-back-office\"  target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">person_pin_circle</i> Trouver un expert
        </a>
                          <a class=\"dropdown-item ps_mbo\" href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/mbo/modules/catalog/?utm_mbo_source=menu-user-back-office&_token=kpma9TV6MVeAi3bC4AsXqeA8cSsDeYAHQC9D90Vg8Q0&utm_source=back-office&utm_medium=menu&utm_content=download8_1&utm_campaign=addons-fr&utm_mbo_source=menu-user-back-office\"  rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">exten";
        // line 449
        echo "sion</i> Marketplace Prestashop
        </a>
                          <a class=\"dropdown-item ps_mbo\" href=\"https://help-center.prestashop.com/fr?utm_source=back-office&utm_medium=menu&utm_content=download8_1&utm_campaign=help-center-fr&utm_mbo_source=menu-user-back-office\"  target=\"_blank\" rel=\"noopener noreferrer nofollow\">
            <i class=\"material-icons\">help</i> Centre d'assistance
        </a>
                  <p class=\"divider\"></p>
            
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminLogin&amp;logout=1&amp;token=24aa35038115fdb00346cabdd9977b86\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Déconnexion</span>
    </a>
  </div>
</div>
        </div>
              </div>
    </nav>
  </header>

  <nav class=\"nav-bar d-none d-print-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/employees/toggle-navigation?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\">
    <i class=\"material-icons rtl-flip\">chevron_left</i>
    <i class=\"material-icons rtl-flip\">chevron_left</i>
  </span>

  <div class=\"nav-bar-overflow\">
      <div class=\"logo-container\">
          <a id=\"header_logo\" class=\"logo float-left\" href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/pseditionbasic/homepage?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\"></a>
          <span id=\"shop_version\" class=\"header-version\">8.1.6</span>
      </div>

      <ul class=\"main-menu\">
              
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"166\" id=\"tab-HOME\">
                <span class=\"title\">Bienvenue</span>
            </li>

                              
                  
                                                      
                  
         ";
        // line 492
        echo "         <li class=\"link-levelone\" data-submenu=\"167\" id=\"subtab-AdminPsEditionBasicHomepageController\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/pseditionbasic/homepage?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-home\">home</i>
                      <span>
                      Accueil
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"1\" id=\"subtab-AdminDashboard\">
                    <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminDashboard&amp;token=328aa2005941ed770b78b954faa68211\" class=\"link\">
                      <i class=\"material-icons mi-trending_up\">trending_up</i>
                      <span>
                      Tableau de bord
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title link-active\" data-submenu=\"2\" id=\"tab-SELL\">
                <span class=\"title\">Vendre</span>
            </li>
";
        // line 527
        echo "
                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/orders/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                      <span>
                      Commandes
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/orders/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Commandes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/orders/invoices/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Factures
                                </a>
                              </li>

     ";
        // line 559
        echo "                                                                             
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"6\" id=\"subtab-AdminSlip\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/orders/credit-slips/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Avoirs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/orders/delivery-slips/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Bons de livraison
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCarts&amp;token=2ee9ac2bb68359de3dd75a3d4ff1a27d\" class=\"link\"> Paniers
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                                                          
                  <li class=\"link-levelone has_submenu lin";
        // line 589
        echo "k-active open ul-open\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/products?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-store\">store</i>
                      <span>
                      Catalogue
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_up
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo link-active\" data-submenu=\"10\" id=\"subtab-AdminProducts\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/products?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Produits
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/categories?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Catégories
                                </a>
                              </li>

                                                                                  
                              
                                    ";
        // line 618
        echo "                        
                              <li class=\"link-leveltwo\" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/monitoring/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Suivi
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminAttributesGroups&amp;token=3de71acc32054972942c27415451a331\" class=\"link\"> Attributs &amp; caractéristiques
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/catalog/brands/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Marques et fournisseurs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/attachments/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"l";
        // line 644
        echo "ink\"> Fichiers
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"20\" id=\"subtab-AdminParentCartRules\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCartRules&amp;token=a40aa8d0b4f65612bd7a6b033d24a259\" class=\"link\"> Réductions
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/stocks/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Stock
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/customers/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-account_circle\">account_circle</i>
                      <span>
                      Clients
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
       ";
        // line 677
        echo "                                                             keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/customers/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Clients
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/addresses/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Adresses
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                    <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCustomerThreads&amp;token=e2966e1cedda4e4028c197898f47d0ba\" class=\"link\">
                      <i class=\"material-";
        // line 705
        echo "icons mi-chat\">chat</i>
                      <span>
                      SAV
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCustomerThreads&amp;token=e2966e1cedda4e4028c197898f47d0ba\" class=\"link\"> SAV
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/sell/customer-service/order-messages/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Messages prédéfinis
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?cont";
        // line 734
        echo "roller=AdminReturn&amp;token=b0ca02e0e3111ef10299fdc067789d0c\" class=\"link\"> Retours produits
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/metrics/legacy/stats?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-assessment\">assessment</i>
                      <span>
                      Statistiques
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-32\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"172\" id=\"subtab-AdminMetricsLegacyStatsController\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/metrics/legacy/stats?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Statistiques
                                </a>
                              </li>

                                                                                  
                              
                                                            
       ";
        // line 766
        echo "                       <li class=\"link-leveltwo\" data-submenu=\"173\" id=\"subtab-AdminMetricsController\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/metrics?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> PrestaShop Metrics
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"37\" id=\"tab-IMPROVE\">
                <span class=\"title\">Personnaliser</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"38\" id=\"subtab-AdminParentModulesSf\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/mbo/modules/catalog/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Modules
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-38\" class=\"submenu panel-collapse\">
                                                                                                                                                                  
                              
                                                  ";
        // line 800
        echo "          
                              <li class=\"link-leveltwo\" data-submenu=\"130\" id=\"subtab-AdminPsMboModuleParent\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/mbo/modules/catalog/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Marketplace
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"39\" id=\"subtab-AdminModulesSf\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/modules/manage?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Gestionnaire de modules 
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"43\" id=\"subtab-AdminParentThemes\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/improve/design/themes?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                      <span>
                      Apparence
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                             ";
        // line 829
        echo "               </a>
                                              <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"137\" id=\"subtab-AdminPsxDesignParentTab\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/improve/design/themes?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Personnalisation
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"149\" id=\"subtab-AdminThemesParent\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminPsThemeCustoConfiguration&amp;token=05deb22b5019c85e3d497eb7841d3da1\" class=\"link\"> Modules du thème
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"134\" id=\"subtab-AdminPsMboTheme\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/mbo/themes/catalog/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Catalogue de thèmes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                         ";
        // line 858
        echo "     <li class=\"link-leveltwo\" data-submenu=\"45\" id=\"subtab-AdminParentMailTheme\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/design/mail_theme/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Thème d&#039;e-mail
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"47\" id=\"subtab-AdminCmsContent\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/design/cms-pages/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Pages
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"48\" id=\"subtab-AdminModulesPositions\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/design/modules/positions/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Positions
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"49\" id=\"subtab-AdminImages\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminImages&amp;token=b1876e4a13b72c31321bd96482ef45fb\" class=\"link\"> Images
                                </a>
                           ";
        // line 885
        echo "   </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"118\" id=\"subtab-AdminLinkWidget\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/link-widget/list?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Liste de liens
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"50\" id=\"subtab-AdminParentShipping\">
                    <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCarriers&amp;token=13595dfa03763f59a7a88dfd722d90a0\" class=\"link\">
                      <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                      <span>
                      Livraison
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-50\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"51\" id=\"subtab-AdminCarriers\">
                                <a href=\"http://localhost:888";
        // line 916
        echo "8/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminCarriers&amp;token=13595dfa03763f59a7a88dfd722d90a0\" class=\"link\"> Transporteurs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"52\" id=\"subtab-AdminShipping\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/shipping/preferences/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Préférences
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"158\" id=\"subtab-AdminMbeConfiguration\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminMbeConfiguration&amp;token=c64f599ca4fb24599c34a9bfa2cc1aad\" class=\"link\"> MBE - Configuration
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"161\" id=\"subtab-AdminMbeShipping\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminMbeShipping&amp;token=64b5f4923aff3eb77b539a69f2bdd705\" class=\"link\"> MBE - Expéditions
                                </a>
                              </li>

                                                                          ";
        // line 944
        echo "                                                          </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"53\" id=\"subtab-AdminParentPayment\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/payment/payment_methods?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-payment\">payment</i>
                      <span>
                      Paiement
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-53\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"54\" id=\"subtab-AdminPayment\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/payment/payment_methods?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Moyens de paiement
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"55\" id=\"subtab-AdminPaymentPreferences\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/impro";
        // line 973
        echo "ve/payment/preferences?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Préférences
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"56\" id=\"subtab-AdminInternational\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/international/localization/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-language\">language</i>
                      <span>
                      International
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-56\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"57\" id=\"subtab-AdminParentLocalization\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/international/localization/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Localisation
                                </a>
                              </li>

                                                                                  
                              
                                                   ";
        // line 1004
        echo "         
                              <li class=\"link-leveltwo\" data-submenu=\"62\" id=\"subtab-AdminParentCountries\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/international/zones/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Zones géographiques
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"66\" id=\"subtab-AdminParentTaxes\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/international/taxes/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Taxes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"69\" id=\"subtab-AdminTranslations\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/improve/international/translations/settings?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Traductions
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"144\" id=\"subtab-Marketing\">
                    <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminPsxMk";
        // line 1033
        echo "tgWithGoogleModule&amp;token=7832a48b89e624a29391a21c44672387\" class=\"link\">
                      <i class=\"material-icons mi-campaign\">campaign</i>
                      <span>
                      Marketing
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-144\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"145\" id=\"subtab-AdminPsxMktgWithGoogleModule\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminPsxMktgWithGoogleModule&amp;token=7832a48b89e624a29391a21c44672387\" class=\"link\"> Google
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"147\" id=\"subtab-AdminPsfacebookModule\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminPsfacebookModule&amp;token=c4ce1fc6a56bca3ee867d74ccbddee3c\" class=\"link\"> Facebook &amp; Instagram
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                          ";
        // line 1064
        echo "                
                    
          
            <li class=\"category-title\" data-submenu=\"70\" id=\"tab-CONFIGURE\">
                <span class=\"title\">Configurer</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"168\" id=\"subtab-AdminPsEditionBasicSettingsController\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/pseditionbasic/settings?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-settings\">settings</i>
                      <span>
                      Paramètres
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"71\" id=\"subtab-ShopParameters\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/shop/preferences/preferences?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-settings\">settings</i>
                      <span>
                      Paramètres de la boutique
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                        ";
        // line 1099
        echo "                    </a>
                                              <ul id=\"collapse-71\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"72\" id=\"subtab-AdminParentPreferences\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/shop/preferences/preferences?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Paramètres généraux
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"75\" id=\"subtab-AdminParentOrderPreferences\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/shop/order-preferences/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Commandes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"78\" id=\"subtab-AdminPPreferences\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/shop/product-preferences/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Produits
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              ";
        // line 1128
        echo "<li class=\"link-leveltwo\" data-submenu=\"79\" id=\"subtab-AdminParentCustomerPreferences\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/shop/customer-preferences/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Clients
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"83\" id=\"subtab-AdminParentStores\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/shop/contacts/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Contact
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"86\" id=\"subtab-AdminParentMeta\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/shop/seo-urls/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Trafic et SEO
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"89\" id=\"subtab-AdminParentSearchConf\">
                                <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminSearchConf&amp;token=30efb051c03969e5be0b17793c941b7c\" class=\"link\"> Rechercher
                                </a>
               ";
        // line 1155
        echo "               </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"92\" id=\"subtab-AdminAdvancedParameters\">
                    <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/system-information/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\">
                      <i class=\"material-icons mi-settings_applications\">settings_applications</i>
                      <span>
                      Paramètres avancés
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-92\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"93\" id=\"subtab-AdminInformation\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/system-information/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Informations
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"94\" id=\"subtab-AdminPerformance\">
    ";
        // line 1186
        echo "                            <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/performance/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Performances
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"95\" id=\"subtab-AdminAdminPreferences\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/administration/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Administration
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"96\" id=\"subtab-AdminEmails\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/emails/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> E-mail
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"97\" id=\"subtab-AdminImport\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/import/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Importer
                                </a>
                              </li>

                                                                                  
";
        // line 1215
        echo "                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"98\" id=\"subtab-AdminParentEmployees\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/employees/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Équipe
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"102\" id=\"subtab-AdminParentRequestSql\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/sql-requests/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Base de données
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"105\" id=\"subtab-AdminLogs\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/logs/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Logs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"106\" id=\"subtab-AdminWebservice\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/webservice-keys/?_token=OAKbkzGz00pIl3FVkD";
        // line 1242
        echo "pE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Webservice
                                </a>
                              </li>

                                                                                                                                                                                                                                                    
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"110\" id=\"subtab-AdminFeatureFlag\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/feature-flags/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Fonctionnalités nouvelles et expérimentales
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"111\" id=\"subtab-AdminParentSecurity\">
                                <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/configure/advanced/security/?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"link\"> Sécurité
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"143\" id=\"subtab-AdminKlaviyoPsConfig\">
                    <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminKlaviyoPsConfig&amp;token=8ed81e7ff723c3be9ca7c2bfdf5329db\" class=\"link\">
          ";
        // line 1270
        echo "            <i class=\"material-icons mi-trending_up\">trending_up</i>
                      <span>
                      Klaviyo
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"156\" id=\"subtab-AdminPsAssistantSettings\">
                    <a href=\"http://localhost:8888/ShelterTech/ShelterTechPresta/ps-admin/index.php?controller=AdminPsAssistantSettings&amp;token=99342b61c8532f96244b969937979cd2\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Assistance By PrestaShop
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                  </ul>
  </div>
  
</nav>


<div id=\"main-div\">
          
      <div class=\"content-div -notoolbar \">

        

                                                        
        <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>
<div id=\"content-message-box\"></div>


  ";
        // line 1313
        $this->displayBlock('content_header', $context, $blocks);
        $this->displayBlock('content', $context, $blocks);
        $this->displayBlock('content_footer', $context, $blocks);
        $this->displayBlock('sidebar_right', $context, $blocks);
        echo "

        

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>Oh non !</h1>
  <p class=\"mt-3\">
    La version mobile de cette page n'est pas encore disponible.
  </p>
  <p class=\"mt-2\">
    Cette page n'est pas encore disponible sur mobile, merci de la consulter sur ordinateur.
  </p>
  <p class=\"mt-2\">
    Merci.
  </p>
  <a href=\"/ShelterTech/ShelterTechPresta/ps-admin/index.php/modules/pseditionbasic/homepage?_token=OAKbkzGz00pIl3FVkDpE4XJKkuEVdhjP90ccHwOhRH4\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons rtl-flip\">arrow_back</i>
    Précédent
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    
</div>
  

      <div class=\"bootstrap\">
      
    </div>
  
";
        // line 1347
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>";
        echo "
</html>";
    }

    // line 123
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_extra_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 1313
    public function block_content_header($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_content_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_sidebar_right($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 1347
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_extra_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function block_translate_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "__string_template__f9c3c5f0f5a62cb54f4ee6512b2eb962";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1526 => 1347,  1505 => 1313,  1494 => 123,  1485 => 1347,  1445 => 1313,  1400 => 1270,  1370 => 1242,  1341 => 1215,  1310 => 1186,  1277 => 1155,  1248 => 1128,  1217 => 1099,  1180 => 1064,  1147 => 1033,  1116 => 1004,  1083 => 973,  1052 => 944,  1022 => 916,  989 => 885,  960 => 858,  929 => 829,  898 => 800,  862 => 766,  828 => 734,  797 => 705,  767 => 677,  732 => 644,  704 => 618,  673 => 589,  641 => 559,  607 => 527,  570 => 492,  525 => 449,  501 => 427,  449 => 377,  398 => 328,  358 => 290,  313 => 247,  276 => 212,  258 => 196,  217 => 157,  178 => 123,  155 => 102,  135 => 84,  114 => 65,  87 => 40,  46 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__f9c3c5f0f5a62cb54f4ee6512b2eb962", "");
    }
}
