<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:53:15
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/ps_facetedsearch/views/templates/admin/_partials/shops.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667844eb240481_91962607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a6dd9a4fe4725d4f030fa91c4f0e80dff647e45' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/ps_facetedsearch/views/templates/admin/_partials/shops.tpl',
      1 => 1709283100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667844eb240481_91962607 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['asso_shops']->value))) {?>
  <div class="form-group">
    <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Choose shop association:','d'=>'Modules.Facetedsearch.Admin'),$_smarty_tpl ) );?>
</label>
    <div class="col-lg-9"><?php echo $_smarty_tpl->tpl_vars['asso_shops']->value;?>
</div>
  </div>
<?php }
}
}
