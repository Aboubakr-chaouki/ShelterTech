<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:36:20
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/_configure/helpers/form/form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667840f43b0591_34442202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a437fe40fd8e37b72671ad271500bbbb2848ef2d' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/_configure/helpers/form/form.tpl',
      1 => 1716984644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667840f43b0591_34442202 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_624909426667840f4326b28_62690877', "field");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1431668167667840f43a9746_24180466', "description");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block "field"} */
class Block_624909426667840f4326b28_62690877 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'field' => 
  array (
    0 => 'Block_624909426667840f4326b28_62690877',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['input']->value['type'] == 'access_form') {?>
        <div name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" class="bootstrap col-lg-12">
            <div class="row bootstrap">
                <p class="custom">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['text1'],'html','UTF-8' ));?>

                </p>
            </div>
            <div class="row bootstrap justify-content-center mt-1">
                <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['select']))) {?>
                    <div class="form-group">
                        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['select']['label']))) {?>
                            <label class="control-label col-lg-4">
                                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['select']['label'],'html','UTF-8' ));?>

                            </label>
                        <?php }?>
                        <div class="col-lg-9">
                            <select name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['select']['name'],'html','UTF-8' ));?>
"
                                    id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['select']['name'],'html','UTF-8' ));?>
"
                                    <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['select']['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['select']['disabled']) {?> disabled="disabled"<?php }?>>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['select']['options']['query'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                                    <option value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['select']['options']['id']],'html','UTF-8' ));?>
">
                                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['select']['options']['name']],'html','UTF-8' ));?>

                                    </option>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="row justify-content-between">
                <div class="form-group flex">
                    <input type="text" class="form-control" id="mbe_user" name="mbe_user"
                           placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'User','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['mbe_user'],'htmlall','UTF-8' ));?>
"/>
                </div>
                <div class="form-group flex">
                    <input type="password" class="form-control" id="mbe_pass" name="mbe_pass"
                           placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Password','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value['mbe_pass'],'htmlall','UTF-8' ));?>
"/>
                </div>
            </div>
            <div class="row">
                <p class="custom">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['text2'],'html','UTF-8' ));?>

                </p>
            </div>
            <div class="row column buttons">
                <button type="submit" class="btn btn-primary" id="mbe_login_btn" name="mbeLogin">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                </button>
            </div>
            <div class="row">
                <p class="help-block">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Or proceed with the','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                    <button type="submit" class="btn-link" id="mbe_adv_auth_btn" name="mbeAdvAuth">
                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'advanced configuration','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                    </button>
                </p>
            </div>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'auth_reset') {?>
        <div name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" class="row buttons">
            <button type="submit" class="btn btn-primary" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['btn_name'],'html','UTF-8' ));?>
"
                    name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['btn_name'],'html','UTF-8' ));?>
">
                <?php if ($_smarty_tpl->tpl_vars['input']->value['isAdvanced']) {?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Return to login area','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                <?php } else { ?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Reset','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                <?php }?>
            </button>
        </div>
        <div class="row">
            <p class="help-block">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Click here if you want to reset the information entered in the form above','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

            </p>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'custom_text') {?>
        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['text']))) {?>
            <p class="custom" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
"><?php echo $_smarty_tpl->tpl_vars['input']->value['text'];?>
             <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['list']))) {?>
                <br>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['list'], 'list_item');
$_smarty_tpl->tpl_vars['list_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['list_item']->value) {
$_smarty_tpl->tpl_vars['list_item']->do_else = false;
?>
                        <li><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['list_item']->value,'html','UTF-8' ));?>
</li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            <?php }?>
            </p>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'link_button') {?>
        <div class="col-lg-8<?php if (!(isset($_smarty_tpl->tpl_vars['input']->value['label']))) {?> col-lg-offset-3<?php }?>">
            <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['name'])) && (isset($_smarty_tpl->tpl_vars['input']->value['link']))) {?>
                <a name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
"
                   href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['link'],'html','UTF-8' ));?>
"
                   <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {?>class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['class'],'html','UTF-8' ));?>
"<?php }?>>
                    <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['icon']))) {?><i
                        class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['icon'],'html','UTF-8' ));?>
"></i>&ensp;<?php }
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['text'],'html','UTF-8' ));?>

                </a>
                <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['desc']))) {?><p class="help-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['desc'],'html','UTF-8' ));?>
</p><?php }?>
            <?php }?>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'change_conf_mode') {?>
        <div name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
">
            <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['text']))) {?>
                <div class="alert medium-alert alert-warning" role="alert">
                    <p class="alert-text">
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['text'],'html','UTF-8' ));?>

                    </p>
                </div>
            <?php }?>
            <div class="row buttons">
                <button type="submit" class="btn btn-primary" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['btn_name'],'html','UTF-8' ));?>
" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['btn_name'],'html','UTF-8' ));?>
">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change configuration mode','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                </button>
            </div>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'advanced_conf') {?>
        <div class="row buttons" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
">
            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['admin_package'],'htmlall','UTF-8' ));?>
" class="btn btn-primary"
               target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Go to packages section','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</a>
            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['admin_product_package'],'htmlall','UTF-8' ));?>
" class="btn btn-primary"
               target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Go to product packages section','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</a>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'pickup_address') {?>
        <div class="row buttons" name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
">
            <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['admin_pickup_address'],'htmlall','UTF-8' ));?>
" class="btn btn-primary"
               target="_blank"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Set your pickup Addresses','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</a>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'checklist') {?>
        <div name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
" id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
">
            <div class="check">
                <label class="control-label col-lg-6">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Prestashop compatibility','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                </label>
                <div id="mbe_check_version" class="col-lg-6">
                    <i class="icon-remove-circle warning"></i>
                </div>
            </div>
            <div class="check">
                <label class="control-label col-lg-6">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Hooks status','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                </label>
                <div id="mbe_check_hooks" class="col-lg-6">
                    <i class="icon-remove-circle warning"></i>
                </div>
            </div>
            <div class="check">
                <label class="control-label col-lg-6">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'DB status','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                </label>
                <div id="mbe_check_db" class="col-lg-6">
                    <i class="icon-remove-circle warning"></i>
                </div>
            </div>
            <div class="check">
                <label class="control-label col-lg-6">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Tabs status','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                </label>
                <div id="mbe_check_tabs" class="col-lg-6">
                    <i class="icon-remove-circle warning"></i>
                </div>
            </div>
            <div class="check">
                <label class="control-label col-lg-6">
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Overrides status','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                </label>
                <div id="mbe_check_overrides" class="col-lg-6">
                    <i class="icon-remove-circle warning"></i>
                </div>
            </div>
            <div class="row buttons">
                <a id="mbe_checkup_btn" class="btn btn-primary"
                   onclick="runCheckup()"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Run check-up','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</a>
            </div>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'custom_button') {?>
        <div class="row">
            <button type="<?php if ($_smarty_tpl->tpl_vars['input']->value['submit']) {?>submit<?php } else { ?>button<?php }?>"
                    <?php if ($_smarty_tpl->tpl_vars['input']->value['class']) {?>class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['input']->value['name']) {?>id="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['input']->value['name']) {?>name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['input']->value['onclick']) {?>onclick="<?php echo $_smarty_tpl->tpl_vars['input']->value['onclick'];?>
"<?php }?>>
                <?php echo $_smarty_tpl->tpl_vars['input']->value['text'];?>

            </button>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'alert') {?>
        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['text']))) {?>
            <div class="alert medium-alert alert-<?php echo $_smarty_tpl->tpl_vars['input']->value['alert'];?>
" role="alert">
                <p class="alert-text">
                    <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['text'],'html','UTF-8' ));?>

                </p>
            </div>
        <?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'time') {?>
        <div class="col-lg-8<?php if (!(isset($_smarty_tpl->tpl_vars['input']->value['label']))) {?> col-lg-offset-3<?php }?>">
            <input id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo $_smarty_tpl->tpl_vars['input']->value['id'];
} else {
echo $_smarty_tpl->tpl_vars['input']->value['name'];
}?>"
                   type="text"
                   class="validate-time <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['class']))) {
echo $_smarty_tpl->tpl_vars['input']->value['class'];
}?>"
                   name="<?php echo $_smarty_tpl->tpl_vars['input']->value['name'];?>
"
                   value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']],'html','UTF-8' ));?>
"
                   minlength="5"
                   maxlength="5"
                   <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['placeholder']))) {?>placeholder="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['placeholder'],'html','UTF-8' ));?>
"<?php }?>
            />
            <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['desc']))) {?><p class="help-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['desc'],'html','UTF-8' ));?>
</p><?php }?>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'select_with_alt_button') {?>
        <div class="col-lg-8<?php if (!(isset($_smarty_tpl->tpl_vars['input']->value['label']))) {?> col-lg-offset-3<?php }?>">
            <div class="row m-0">
                <select name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));?>
"
                        class="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['button_link']))) {?>col-lg-12<?php } else { ?>col-lg-12<?php }?>"
                        id="<?php if ((isset($_smarty_tpl->tpl_vars['input']->value['id']))) {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['id'],'html','UTF-8' ));
} else {
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['name'],'html','UTF-8' ));
}?>"
                        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['multiple'])) && $_smarty_tpl->tpl_vars['input']->value['multiple']) {?> multiple="multiple"<?php }?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['size']))) {?> size="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['size'],'html','UTF-8' ));?>
"<?php }?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['search']))) {?> data-search="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['search'],'html','UTF-8' ));?>
"<?php }?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['disabled'])) && $_smarty_tpl->tpl_vars['input']->value['disabled']) {?> disabled="disabled"<?php }?>>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['options']['query'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['option']->value == "-") {?>
                            <option value="">-</option>
                        <?php } else { ?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']];?>
"
                                    <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['multiple']))) {?>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'field_value');
$_smarty_tpl->tpl_vars['field_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->value) {
$_smarty_tpl->tpl_vars['field_value']->do_else = false;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['field_value']->value == $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']]) {?>
                                                selected="selected"
                                            <?php }?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    <?php } else { ?>
                                        <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']] == $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']]) {?>
                                            selected="selected"
                                        <?php }?>
                                    <?php }?>
                            ><?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['name']];?>
</option>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['button_link']))) {?>
                <div class="row mx-0 mt-1">
                    <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['button_link'],'html','UTF-8' ));?>
"
                       class="btn btn-default pull-left">
                        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['button_icon']))) {?>
                            <i class="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['button_icon'],'html','UTF-8' ));?>
"></i>
                            &ensp;<?php }?>
                        <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['button_title'],'html','UTF-8' ));?>

                    </a>
                </div>
            <?php }?>
            <div>
                <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['desc']))) {?><p class="help-block"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['desc'],'html','UTF-8' ));?>
</p><?php }?>
            </div>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['input']->value['type'] == 'table') {?>
        <div class="col-lg-8<?php if (!(isset($_smarty_tpl->tpl_vars['input']->value['label']))) {?> col-lg-offset-3<?php }?>">
            <table id="table-configuration" class="table panel">
                <thead>
                <tr class="nodrag nodrop">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['columns'], 'column');
$_smarty_tpl->tpl_vars['column']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->do_else = false;
?>
                        <th class="left">
                            <?php echo $_smarty_tpl->tpl_vars['column']->value;?>

                        </th>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['input']->value['rows'], 'row', false, 'i');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                    <tr class="<?php if (!(1 & $_smarty_tpl->tpl_vars['i']->value)) {
} else { ?>odd<?php }?>">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'field');
$_smarty_tpl->tpl_vars['field']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->do_else = false;
?>
                            <td class="left">
                                <?php echo $_smarty_tpl->tpl_vars['field']->value;?>

                            </td>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
     <?php }
}
}
/* {/block "field"} */
/* {block "description"} */
class Block_1431668167667840f43a9746_24180466 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'description' => 
  array (
    0 => 'Block_1431668167667840f43a9746_24180466',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['desc_link']))) {?>
        <?php if ((isset($_smarty_tpl->tpl_vars['input']->value['desc'])) && !empty($_smarty_tpl->tpl_vars['input']->value['desc'])) {?>
            <p class="help-block">
                <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['desc'],'html','UTF-8' ));?>

                <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['desc_link']['url'],'html','UTF-8' ));?>
" target="_blank"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['input']->value['desc_link']['text'],'html','UTF-8' ));?>
</a>
            </p>
        <?php }?>
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
     <?php }
}
}
/* {/block "description"} */
}
