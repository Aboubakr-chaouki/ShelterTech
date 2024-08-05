<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:36:20
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/configuration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667840f44d02f7_05005579',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfa1f262d97398d6695cc19f77e7d2e9fd784ca5' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/configuration.tpl',
      1 => 1716984644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667840f44d02f7_05005579 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="mbeshipping_conf_content" class="clearfix">
    <!-- Nav tabs -->
    <?php if ($_smarty_tpl->tpl_vars['show_side_menu']->value) {?>
    <div class="col-lg-2">
        <div class="list-group">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['conf_tabs']->value, 'tab');
$_smarty_tpl->tpl_vars['tab']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
$_smarty_tpl->tpl_vars['tab']->do_else = false;
?>
                <a id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['id'],'htmlall','UTF-8' ));?>
" href="#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['id'],'htmlall','UTF-8' ));?>
" class="list-group-item <?php if ($_smarty_tpl->tpl_vars['tab']->value['show_this']) {?>active<?php }?>"
                   data-toggle="tab"
                   onclick="showTabContent(this)">
                    <?php if ($_smarty_tpl->tpl_vars['tab']->value['icon_class']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['tab']->value['icon_class'];?>
"></i>&ensp;<?php }
echo $_smarty_tpl->tpl_vars['tab']->value['label'];?>
                 </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

        <?php if (!$_smarty_tpl->tpl_vars['is_direct_channel_user']->value) {?>         <!-- Nav links -->
        <div class="list-group">
            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_info']->value,'htmlall','UTF-8' ));?>
" class="list-group-item" target="_blank">
                <img class="icon" alt="" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/info.png">&ensp;
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Informations','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

            </a>
            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_guide']->value,'htmlall','UTF-8' ));?>
" class="list-group-item" target="_blank">
                <img class="icon" alt="" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/book.png">&ensp;
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Guide','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

            </a>
            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_support']->value,'htmlall','UTF-8' ));?>
" class="list-group-item" target="_blank">
                <img class="icon" alt="" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/mail.png">&ensp;
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Assistant','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

            </a>
            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['link_portal']->value,'htmlall','UTF-8' ));?>
" class="list-group-item" target="_blank">
                <img class="icon-round" alt="" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
/views/img/icons/logo.jpg">&nbsp;&ensp;
                <span class="go-to-portal">
                    <span class="text-nowrap"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Go to portal MBE eShip','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</span>
                </span>&ensp;
                <i class="icon-chevron-right float-right"></i>
            </a>
        </div>
        <?php }?>

        <!-- Version -->
        <div class="list-group">
            <span class="list-group-item">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Version','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
:&nbsp;<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_version']->value,'htmlall','UTF-8' ));?>

            </span>
        </div>
    </div>
    <?php }?>

    <!-- Tab panes -->
    <div class="tab-content <?php if ($_smarty_tpl->tpl_vars['show_side_menu']->value) {?>col-lg-10<?php } else { ?>col-lg-12<?php }?>">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['conf_tabs']->value, 'tab');
$_smarty_tpl->tpl_vars['tab']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tab']->value) {
$_smarty_tpl->tpl_vars['tab']->do_else = false;
?>
            <div class="tab-pane panel <?php if ($_smarty_tpl->tpl_vars['tab']->value['show_this']) {?>active<?php }?>" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['id'],'htmlall','UTF-8' ));?>
">
                <?php if (!empty($_smarty_tpl->tpl_vars['tab']->value['desc'])) {?>
                <div class="panel mbe">
                    <div class="panel-heading mbe">
                       <?php echo $_smarty_tpl->tpl_vars['tab']->value['label'];?>
                        <?php if ($_smarty_tpl->tpl_vars['is_direct_channel_user']->value && ((isset($_smarty_tpl->tpl_vars['tab']->value['guide'])) && (isset($_smarty_tpl->tpl_vars['tab']->value['guide'][$_smarty_tpl->tpl_vars['employee_iso_code']->value])) && !empty($_smarty_tpl->tpl_vars['tab']->value['guide'][$_smarty_tpl->tpl_vars['employee_iso_code']->value]))) {?>
                       <a class="panel-heading-manual" target="_blank" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tab']->value['guide'][$_smarty_tpl->tpl_vars['employee_iso_code']->value],'htmlall','UTF-8' ));?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'User Manual','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</a>
                       <?php }?>
                    </div>
                    <p class="tab-description"><?php echo $_smarty_tpl->tpl_vars['tab']->value['desc'];?>
</p>                 </div>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['tab']->value['content'])) {?>
                    <?php echo $_smarty_tpl->tpl_vars['tab']->value['content'];?>
                 <?php } else { ?>
                    <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'No configurations to display','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</p>
                <?php }?>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>
<?php }
}
