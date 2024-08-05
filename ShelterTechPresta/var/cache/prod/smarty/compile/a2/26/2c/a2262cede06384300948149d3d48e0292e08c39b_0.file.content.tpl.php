<?php
/* Smarty version 4.3.4, created on 2024-06-23 21:52:09
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/ps-admin/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66787ce96f4335_72085619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2262cede06384300948149d3d48e0292e08c39b' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/ps-admin/themes/default/template/content.tpl',
      1 => 1716984644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66787ce96f4335_72085619 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>
<div id="content-message-box"></div>

<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
