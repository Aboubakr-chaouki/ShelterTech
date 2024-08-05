<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:48:57
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/themes/classic/templates/_partials/helpers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667843e98b2db9_73699845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e4939f7d666498dc4e2943aa71ecb061aba11e0' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/themes/classic/templates/_partials/helpers.tpl',
      1 => 1708959642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667843e98b2db9_73699845 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'renderLogo' => 
  array (
    'compiled_filepath' => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/var/cache/prod/smarty/compile/classiclayouts_layout_full_width_tpl/5e/49/39/5e4939f7d666498dc4e2943aa71ecb061aba11e0_2.file.helpers.tpl.php',
    'uid' => '5e4939f7d666498dc4e2943aa71ecb061aba11e0',
    'call_name' => 'smarty_template_function_renderLogo_1075521541667843e98ad240_42291134',
  ),
));
?> 

<?php }
/* smarty_template_function_renderLogo_1075521541667843e98ad240_42291134 */
if (!function_exists('smarty_template_function_renderLogo_1075521541667843e98ad240_42291134')) {
function smarty_template_function_renderLogo_1075521541667843e98ad240_42291134(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

  <a href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
">
    <img
      class="logo img-fluid"
      src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['src'], ENT_QUOTES, 'UTF-8');?>
"
      alt="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
      width="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['width'], ENT_QUOTES, 'UTF-8');?>
"
      height="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo_details']['height'], ENT_QUOTES, 'UTF-8');?>
">
  </a>
<?php
}}
/*/ smarty_template_function_renderLogo_1075521541667843e98ad240_42291134 */
}
