<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Khana
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
<link href="https://fonts.googleapis.com/css?family=Inder|Quicksand" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<header class="mdc-toolbar mdc-toolbar--fixed">
        <div class="mdc-toolbar__row">
            <section class="mdc-toolbar__section mdc-toolbar__section--align-start">
                <a class="menu material-icons">menu</a>
                <a class="logo"><img src="<?php echo get_template_directory_uri(); ?>/img/m.png" alt="Khana">Khana</a>
            </section>
        </div>
    </header>

    <div class="sbar">
        <div class="mdc-layout-grid">
            <div class="searchbox mdc-layout-grid__cell mdc-layout-grid__cell--span-3">
                <div class="mdc-textfield mdc-textfield--fullwidth mdc-textfield--upgraded mdc-textfield--dense">
                    <input class="mdc-textfield__input" type="text" placeholder="Search for Restaurant" aria-label="Search for Restaurant">
                    <div class="seabut ripple"><i class="material-icons">&#xE8B6;</i></div>
                </div>
            </div>
            <div class="switchbox mdc-layout-grid__cell mdc-layout-grid__cell--span-1">

     <div class="switch-field">
      <input type="radio" id="switch_left" name="switch_2" value="MAP" checked/>
      <label for="switch_left">MAP</label>
      <input type="radio" id="switch_right" name="switch_2" value="LIST" />
      <label for="switch_right">LIST</label>
    </div>
                
                
            </div>
        </div>
    </div>

    <aside class="mdc-temporary-drawer">
        <nav class="mdc-temporary-drawer__drawer">
            <header class="mdc-temporary-drawer__header">
                <div class="mdc-temporary-drawer__header-content mdc-theme--primary-bg mdc-theme--text-primary-on-primary">
                    Header here
                </div>
            </header>
            <nav class="mdc-temporary-drawer__content mdc-list-group">
                <div class="mdc-list">
                    <a class="mdc-list-item mdc-temporary-drawer--selected" href="#">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">inbox</i>Menu
                    </a>
                    <a class="mdc-list-item" href="#">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">star</i>Menu
                    </a>
                    <a class="mdc-list-item" href="#">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">send</i>Menu
                    </a>
                    <a class="mdc-list-item" href="#">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">drafts</i>Menu
                    </a>
                </div>

                <hr class="mdc-list-divider">

                <div class="mdc-list">
                    <a class="mdc-list-item" href="#">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">email</i>Menu
                    </a>
                    <a class="mdc-list-item" href="#">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">delete</i>Menu
                    </a>
                    <a class="mdc-list-item" href="#">
                        <i class="material-icons mdc-list-item__start-detail" aria-hidden="true">report</i>Menu
                    </a>
                </div>
            </nav>
        </nav>
    </aside>

   

