<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:36:20
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/configuration_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667840f44af057_62606006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '933847b5d3ef3e42cfbbbc740dbb5e6e2983d826' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/configuration_header.tpl',
      1 => 1716984644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667840f44af057_62606006 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-lg-12">
    <div class="panel">
        <div id="mbeshipping_header">
            <div id="header_left">
                <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/logo_eship_for_prestashop.png" height="50px" alt="Logo">
            </div>
            <div id="header_right">
                <?php if (!(isset($_smarty_tpl->tpl_vars['customer_id']->value))) {?>                     <a title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact us','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" class="header-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_contact']->value,'htmlall','UTF-8' ));?>
"
                       target="_blank">
                        <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/mail.png" alt=""/><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact us','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</span>
                    </a>
                <?php } else { ?>
                    <?php if (!$_smarty_tpl->tpl_vars['is_direct_channel_user']->value) {?>
                        <a title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Informations','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" class="header-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_info']->value,'htmlall','UTF-8' ));?>
"
                           target="_blank">
                            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/info.png" alt=""/><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Informations','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</span>
                        </a>
                        <a title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Guide','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" class="header-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_guide']->value,'htmlall','UTF-8' ));?>
"
                           target="_blank">
                            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/book.png" alt=""/><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Guide','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</span>
                        </a>
                        <a title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact us','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" class="header-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_contact']->value,'htmlall','UTF-8' ));?>
"
                           target="_blank">
                            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/mail.png" alt=""/><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Contact us','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</span>
                        </a>
                    <?php } else { ?>
                        <a title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Guide','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" class="header-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_guide']->value,'htmlall','UTF-8' ));?>
"
                           target="_blank">
                            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/book.png" alt=""/><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Guide','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</span>
                        </a>
                        <a title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Call us','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" class="header-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_phone']->value,'htmlall','UTF-8' ));?>
"
                           target="_blank">
                            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/phone.png" alt=""/><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Call us','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</span>
                        </a>
                        <a title="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write us','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" class="header-link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_contact']->value,'htmlall','UTF-8' ));?>
"
                           target="_blank">
                            <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/mail.png" alt=""/><span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Write us','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</span>
                        </a>
                    <?php }?>
                <?php }?>
            </div>
        </div>
    </div>
    <?php echo $_smarty_tpl->tpl_vars['result']->value;?>
 </div>
<?php }
}
