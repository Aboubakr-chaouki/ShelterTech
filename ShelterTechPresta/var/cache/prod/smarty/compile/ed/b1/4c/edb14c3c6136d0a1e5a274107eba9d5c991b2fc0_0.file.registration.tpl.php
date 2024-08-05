<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:36:20
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/registration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667840f43cd372_36268551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'edb14c3c6136d0a1e5a274107eba9d5c991b2fc0' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/registration.tpl',
      1 => 1716984644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667840f43cd372_36268551 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="registration-actions">
    <button type="button" class="btn btn-secondary" onclick="backToWelcomePage()">
        <i class="material-icons">chevron_left</i><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Back to the welcome page','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

    </button>
</div>
<iframe
        id="mbe_registration"
        src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['registration_iframe_url']->value,'html','UTF-8' ));?>
"
        onload="onMbeRegistrationIframeLoad()">
</iframe>
<style>
    iframe#mbe_registration {
        display: block;
        border: 0;
        height: calc(120vh);
        width: 100%;
    }
</style>

<?php echo '<script'; ?>
>
    const onMbeRegistrationIframeLoad = () => {
        console.log('MBE > registration iframe loaded')
        let endpoint = '<?php echo $_smarty_tpl->tpl_vars['registration_iframe_url']->value;?>
'
        if (typeof endpoint !== 'undefined') {
            const $iframe = $('iframe#mbe_registration')
            if ($iframe) {
                $iframe[0].contentWindow.postMessage({
                    'urlLogin': '<?php echo $_smarty_tpl->tpl_vars['registration_iframe_login_url']->value;?>
',
                    'language': '<?php echo $_smarty_tpl->tpl_vars['registration_iframe_lang']->value;?>
'
                }, endpoint)
            }
        }
    }
<?php echo '</script'; ?>
>
<?php }
}
