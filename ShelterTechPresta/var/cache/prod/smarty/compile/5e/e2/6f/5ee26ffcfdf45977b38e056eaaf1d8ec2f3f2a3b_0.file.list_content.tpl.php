<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:36:37
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/mbe_shipping/helpers/list/list_content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667841052592d7_61731599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ee26ffcfdf45977b38e056eaaf1d8ec2f3f2a3b' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/mbe_shipping/helpers/list/list_content.tpl',
      1 => 1716984644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667841052592d7_61731599 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php ob_start();
echo count($_smarty_tpl->tpl_vars['fields_display']->value)+($_smarty_tpl->tpl_vars['has_actions']->value ? 1 : 0)+($_smarty_tpl->tpl_vars['has_bulk_actions']->value ? 1 : 0)+($_smarty_tpl->tpl_vars['multishop_active']->value && $_smarty_tpl->tpl_vars['shop_link_type']->value ? 1 : 0);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('table_columns', $_prefixVariable1);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1887697862667841052364b1_12245640', "row");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163827832266784105250615_79134656', "open_bulk_actions_td");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_37684792266784105253f83_85475967', "td_content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "./_base_list_content.tpl");
}
/* {block "row"} */
class Block_1887697862667841052364b1_12245640 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'row' => 
  array (
    0 => 'Block_1887697862667841052364b1_12245640',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>

    <?php if ((isset($_smarty_tpl->tpl_vars['tr']->value['pickup_batch_index'])) && $_smarty_tpl->tpl_vars['tr']->value['pickup_batch_index'] === 0) {?>
        <?php $_smarty_tpl->_assignInScope('is_single_pickup', $_smarty_tpl->tpl_vars['pickup_batch_list']->value[$_smarty_tpl->tpl_vars['tr']->value['pickup_batch_id']]['is_single_pickup']);?>
        <tr class="tr_row_pickup_batch">
            <?php if (count($_smarty_tpl->tpl_vars['list']->value) > 1) {?>
                <td class="td_row_pickup_batch row-selector text-center">
                    <input type="checkbox" name="pickupBatchBox[]"
                           value="<?php echo $_smarty_tpl->tpl_vars['pickup_batch_list']->value[$_smarty_tpl->tpl_vars['tr']->value['pickup_batch_id']]['id_mbeshipping_pickup_batch'];?>
"
                           class="noborder"/>
                </td>
            <?php }?>
            <td class="td_row_pickup_batch" colspan="<?php if (count($_smarty_tpl->tpl_vars['list']->value) > 1) {
echo $_smarty_tpl->tpl_vars['table_columns']->value-2;
} else {
echo $_smarty_tpl->tpl_vars['table_columns']->value-1;
}?>">
                <?php if ($_smarty_tpl->tpl_vars['is_single_pickup']->value) {?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Single order pickup','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
,
                <?php } else { ?>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Pickup Batch ID','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
:&nbsp;<?php echo $_smarty_tpl->tpl_vars['pickup_batch_list']->value[$_smarty_tpl->tpl_vars['tr']->value['pickup_batch_id']]['pickup_batch_id'];?>
,
                <?php }?>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Status','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
:&nbsp;<?php echo $_smarty_tpl->tpl_vars['pickup_batch_list']->value[$_smarty_tpl->tpl_vars['tr']->value['pickup_batch_id']]['status'];?>

                            </td>
            <td class="td_row_pickup_batch" class="text-right">
                <?php $_smarty_tpl->_assignInScope('pickup_batch_actions', $_smarty_tpl->tpl_vars['pickup_batch_list']->value[$_smarty_tpl->tpl_vars['tr']->value['pickup_batch_id']]['actions']);?>
                <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['pickup_batch_actions']->value) > 0) {?>
                    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['pickup_batch_actions']->value) > 1) {?><div class="btn-group-action"><?php }?>
                    <div class="btn-group pull-right" style="width: 100%">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['pickup_batch_actions']->value[0]['href'];?>
" class="btn btn-default" title="<?php echo $_smarty_tpl->tpl_vars['pickup_batch_actions']->value[0]['label'];?>
" style="min-width: calc(100% - 39px)">
                            <i class="<?php echo $_smarty_tpl->tpl_vars['pickup_batch_actions']->value[0]['icon'];?>
"></i>
                            <span style="margin-inline: auto"><?php echo $_smarty_tpl->tpl_vars['pickup_batch_actions']->value[0]['label'];?>
</span>
                        </a>
                        <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['pickup_batch_actions']->value) > 1) {?>
                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pickup_batch_actions']->value, 'action', false, 'key');
$_smarty_tpl->tpl_vars['action']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->do_else = false;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['key']->value != 0) {?>
                                        <li>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['action']->value['href'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value['label'];?>
">
                                                <i class="<?php echo $_smarty_tpl->tpl_vars['action']->value['icon'];?>
"></i>
                                                <?php echo $_smarty_tpl->tpl_vars['action']->value['label'];?>

                                            </a>
                                        </li>
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        <?php }?>
                    </div>
                    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['pickup_batch_actions']->value) > 1) {?></div><?php }?>
                <?php }?>
            </td>
        </tr>
    <?php }?>
    <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>
 <?php
}
}
/* {/block "row"} */
/* {block "open_bulk_actions_td"} */
class Block_163827832266784105250615_79134656 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'open_bulk_actions_td' => 
  array (
    0 => 'Block_163827832266784105250615_79134656',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ((isset($_smarty_tpl->tpl_vars['tr']->value['pickup_batch_index']))) {?>
        <?php if (count($_smarty_tpl->tpl_vars['list']->value) > 1) {?>
            <td class="row-selector text-center">
                <img src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' ));?>
views/img/icons/list_item.png" alt="list_item"
                     width="16"
                     height="16">
            </td>
        <?php }?>
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }
}
}
/* {/block "open_bulk_actions_td"} */
/* {block "td_content"} */
class Block_37684792266784105253f83_85475967 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'td_content' => 
  array (
    0 => 'Block_37684792266784105253f83_85475967',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ($_smarty_tpl->tpl_vars['key']->value === 'pickup_batch_id' && (isset($_smarty_tpl->tpl_vars['tr']->value['pickup_batch_index']))) {?>
        <?php $_smarty_tpl->_assignInScope('is_single_pickup', $_smarty_tpl->tpl_vars['pickup_batch_list']->value[$_smarty_tpl->tpl_vars['tr']->value['pickup_batch_id']]['is_single_pickup']);?>
        <?php if ($_smarty_tpl->tpl_vars['is_single_pickup']->value) {?>
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Single order pickup','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

        <?php } else { ?>
            <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'html','UTF-8' ));?>

        <?php }?>
    <?php } else { ?>
        <?php 
$_smarty_tpl->inheritance->callParent($_smarty_tpl, $this, '{$smarty.block.parent}');
?>

    <?php }
}
}
/* {/block "td_content"} */
}
