# Walker Nav Menu Bootstrap

A Bootstrap nav menu walker class for WordPress. It is designed to work with Bootstrap 3 and up.

## Usage

```PHP
<?php wp_nav_menu( array(
	// ...
	'depth' => 2,
	'walker' => new Walker_Nav_Menu_Bootstrap()
) ); ?>
```

Unfortunately, Bootstrap's navs only support a single level of dropdowns so ensure that the `depth` argument is set to `2`.

To prevent `wp_page_menu` being used as a fallback when no menu is specified set `fallback_cb` to `false`.

## Glyphicons

To use any of Bootstrap's Glyphicons simply add the necessary HTML to the "Navigation Label" field.

```HTML
<span class="glyphicon glyphicon-home"></span> Home
```

## CSS Classes

CSS classes can be easily added to nav menu items in your dashboard, but the option is disabled by default. To enable it login to your dashboard and navigate to "Appearance" > "Menus". Open the "Screen Options" and enable "CSS Classes" under "Show advanced menu properties".

With the option enabled, you should see a new field when editing menu items labled "CSS Classes (optional)". Any CSS classes can be add to the field, including Bootstrap's.

Since WordPress 3.6, parent nav menu items now have the class `menu-item-has-children`. Therefore, Bootstrap's `dropdown` class will automatically added to these items.
