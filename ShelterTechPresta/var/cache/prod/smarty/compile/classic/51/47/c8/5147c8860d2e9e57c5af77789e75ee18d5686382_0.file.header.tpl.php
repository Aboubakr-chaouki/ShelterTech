<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:53:15
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/ps_facetedsearch/views/templates/admin/_partials/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667844eb232903_25781496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5147c8860d2e9e57c5af77789e75ee18d5686382' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/ps_facetedsearch/views/templates/admin/_partials/header.tpl',
      1 => 1709283100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667844eb232903_25781496 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form-group">
  <label class="control-label col-lg-3"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Template name:','d'=>'Modules.Facetedsearch.Admin'),$_smarty_tpl ) );?>
</label>
  <div class="col-lg-9">
    <input type="text" id="layered_tpl_name" name="layered_tpl_name" maxlength="64" value="<?php echo $_smarty_tpl->tpl_vars['template_name']->value;?>
" />
    <p class="help-block"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Only as a reminder','d'=>'Modules.Facetedsearch.Admin'),$_smarty_tpl ) );?>
</p>
  </div>
</div>
<?php }
}
