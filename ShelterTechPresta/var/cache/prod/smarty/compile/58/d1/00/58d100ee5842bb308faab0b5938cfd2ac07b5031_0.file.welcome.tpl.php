<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:36:20
  from '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/welcome.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667840f4312b15_31647921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58d100ee5842bb308faab0b5938cfd2ac07b5031' => 
    array (
      0 => '/Users/macbookaboubakar/Documents/epitech/ShelterTech/ShelterTechPresta/modules/mbeshipping/views/templates/admin/welcome.tpl',
      1 => 1716984644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667840f4312b15_31647921 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="mbeshipping_welcome_page"
     class="welcome-page <?php if (Context::getContext()->isMobile()) {?>tab-content col-lg-12 clearfix<?php }?>">

        <div class="row first_banner_welcome">
        <div class="col-xs-12 col-md-6 black_left_banner align-content-center text-center">
            <?php if (!Context::getContext()->isMobile()) {?>
                <div style="clear: both;">
                    <img width="400px" class="logo_welcome_first" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['logo_welcome_first']->value,'htmlall','UTF-8' ));?>
"
                         alt="logo_welcome_first"/>
                </div>
                <div style="clear: both;">
                    <img width="400px" class="illustration_welcome_first"
                         src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['illustration_welcome_first']->value,'htmlall','UTF-8' ));?>
" alt="logo_welcome_first"/>
                </div>
            <?php } else { ?>
                <img width="250px" class="logo_welcome_first" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['logo_welcome_first']->value,'htmlall','UTF-8' ));?>
"
                     alt="logo_welcome_first"/>
                <img width="250px" class="illustration_welcome_first"
                     src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['illustration_welcome_first']->value,'htmlall','UTF-8' ));?>
" alt="logo_welcome_first"/>
            <?php }?>
        </div>

        <?php if (Context::getContext()->isMobile()) {?>
            <div class="row pt-4 mobile-button">
                <div class="col-xs-6 text-left">
                    <button class="btn btn-register" onclick="registerMbeUser()"
                            id="btn_register_mbe_user"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Register','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</button>
                </div>
                <div class="col-xs-6 text-right">
                    <button class="btn btn-login" onclick="loginMbeUser()"
                            id="btn_login_mbe_user"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</button>
                </div>
            </div>
        <?php }?>

        <div class="col-xs-12 col-md-6 right_banner pl-4">
            <h2 class="title mb-2 pr-5"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'The shipping management platform for your e-commerce.','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h2>
            <h4 class="mt-2">
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Experience seamless ','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'automatic shipment creation','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</b>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' across multiple domestic and international carriers, minimizing errors and saving valuable time in just a few clicks.','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                <br><br>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'With eShip for PrestaShop, you can tailor prices and packing solutions for each order: you can ','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'assign custom prices','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</b>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'to each shipping category (destination,dimensions,etc.) and ','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'set the correct package size','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</b>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' for each purchase. Elevate your PrestaShop store today and provide a ','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'smooth shipping experience','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</b>
                <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>' to your customers ','mod'=>'mbeshipping'),$_smarty_tpl ) );?>

                <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'with eShip for PrestaShop!','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</b>
            </h4>

            <?php if (!Context::getContext()->isMobile()) {?>
                <div class="buttons my-2 text-left justify-content-start">
                    <div class="pt-3">
                        <button class="btn btn-register" onclick="registerMbeUser()"
                                id="btn_register_mbe_user"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Register','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</button>
                        <button class="btn btn-login" onclick="loginMbeUser()"
                                id="btn_login_mbe_user"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Login','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</button>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>

    <?php if (!Context::getContext()->isMobile()) {?>
        <div class="row second_banner_welcome">
            <div class="title_container_features">
                <h2 class="title title-features"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Features','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h2>
            </div>
                        <div class="col-xs-6 row rassicuration_container">
                                <div class="col-xs-1 mt-2 image_contaiener">
                    <div>
                        <img width="40" height="40" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carriers_icon']->value,'htmlall','UTF-8' ));?>
"
                             alt="carriers_icon">
                    </div>
                    <div>
                        <img width="40" height="40" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['configuration_icon']->value,'htmlall','UTF-8' ));?>
"
                             alt="configuration_icon">
                    </div>
                </div>
                                <div class="col-xs-11 mt-2 pl-3 text_container">
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A select of the best national and international carriers','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h4>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Easy configuration of pricing and packing rules','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h4>
                </div>
            </div>
                        <div class="col-xs-6 row rassicuration_container second">
                                <div class="col-xs-1 mt-2 image_contaiener">
                    <div>
                        <img width="40" height="40" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_service_icon']->value,'htmlall','UTF-8' ));?>
"
                             alt="customer_service_icon">
                    </div>
                    <div>
                        <img width="40" height="40" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['returns_icon']->value,'htmlall','UTF-8' ));?>
"
                             alt="returns_icon">
                    </div>
                </div>
                                <div class="col-xs-11 mt-2 pl-3 text_container">
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Automated return management','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h4>
                    <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Free and easy installation with dedicated customer service','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h4>
                </div>
            </div>
        </div>
    <?php } else { ?>
                        <div class="title_container_features_mobile">
            <h2 class="title title-features"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Features','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h2>
        </div>
        <div class="row mobile_banner_2">
            <div class="col-xs-12 mobile_banner_2_down">
                                <div class="row">
                    <div class="col-xs-3 row_icon">
                        <img width="40" height="40" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['carriers_icon']->value,'htmlall','UTF-8' ));?>
"
                             alt="carriers_icon">
                    </div>
                    <div class="col-xs-9">
                        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'A select of the best national and international carriers','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h4>
                    </div>
                </div>
                                <div class="row">
                    <div class="col-xs-3 row_icon">
                        <img width="40" height="40" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['configuration_icon']->value,'htmlall','UTF-8' ));?>
"
                             alt="configuration_icon">
                    </div>
                    <div class="col-xs-9">
                        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Easy configuration of pricing and packing rules','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h4>
                    </div>
                </div>
                                <div class="row">
                    <div class="col-xs-3 row_icon">
                        <img width="40" height="40" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['customer_service_icon']->value,'htmlall','UTF-8' ));?>
"
                             alt="customer_service_icon">
                    </div>
                    <div class="col-xs-9">
                        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Automated return management','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h4>
                    </div>
                </div>
                                <div class="row">
                    <div class="col-xs-3 row_icon">
                        <img width="40" height="40" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['returns_icon']->value,'htmlall','UTF-8' ));?>
"
                             alt="returns_icon">
                    </div>
                    <div class="col-xs-9">
                        <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Free and easy installation with dedicated customer service','mod'=>'mbeshipping'),$_smarty_tpl ) );?>
</h4>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>
<?php }
}
