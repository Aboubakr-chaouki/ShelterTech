<?php
/* Smarty version 4.3.4, created on 2024-06-23 17:48:57
  from 'module:ps_imagesliderviewstemplateshookslider.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_667843e9653273_94104923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c2108a17c7103b6e203f4f0621d4645b56b0114' => 
    array (
      0 => 'module:ps_imagesliderviewstemplateshookslider.tpl',
      1 => 1708959642,
      2 => 'module',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_667843e9653273_94104923 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <div id="carousel" data-ride="carousel" class="carousel slide" data-interval="5000" data-wrap="true" data-pause="hover" data-touch="true">
    <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
          </ol>
    <ul class="carousel-inner" role="listbox" aria-label="Conteneur carrousel">
              <li class="carousel-item active" role="option" aria-hidden="false">
                      <figure>
              <img src="http://localhost:8888/ShelterTech/ShelterTechPresta/modules/ps_imageslider/images/bb94ee1ab3b4742191c1746bb98c84d0d2ed6b86_Carrousel 2 (2).jpeg" alt="sample-1" loading="lazy" width="1110" height="340">
                              <figcaption class="caption">
                  <h2 class="display-1 text-uppercase">Nouveaux arrivages</h2>
                  <div class="caption-description"></div>
                </figcaption>
                          </figure>
                  </li>
              <li class="carousel-item " role="option" aria-hidden="true">
                      <figure>
              <img src="http://localhost:8888/ShelterTech/ShelterTechPresta/modules/ps_imageslider/images/2ef38bafbbe4612665fa4b9e8f8dfb94e87073d1_Carrousel 3 (2).jpeg" alt="" loading="lazy" width="1110" height="340">
                              <figcaption class="caption">
                  <h2 class="display-1 text-uppercase">Nouveaux arrivages</h2>
                  <div class="caption-description"><h3></h3>
<p></p></div>
                </figcaption>
                          </figure>
                  </li>
              <li class="carousel-item " role="option" aria-hidden="true">
                      <figure>
              <img src="http://localhost:8888/ShelterTech/ShelterTechPresta/modules/ps_imageslider/images/3f5972093e4d4d3947395df7a2a77d72f6a974c8_carrousel 4.jpeg" alt="" loading="lazy" width="1110" height="340">
                              <figcaption class="caption">
                  <h2 class="display-1 text-uppercase">Nouveaux arrivages</h2>
                  <div class="caption-description"><h3></h3>
<p></p></div>
                </figcaption>
                          </figure>
                  </li>
          </ul>
    <div class="direction" aria-label="Boutons du carrousel">
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev" aria-label="Précédent">
        <span class="icon-prev hidden-xs" aria-hidden="true">
          <i class="material-icons">&#xE5CB;</i>
        </span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next" aria-label="Suivant">
        <span class="icon-next" aria-hidden="true">
          <i class="material-icons">&#xE5CC;</i>
        </span>
      </a>
    </div>
  </div>
<?php }
}
