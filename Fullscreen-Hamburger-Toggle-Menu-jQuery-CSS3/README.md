# jQuery-fullscreenMenu
Lite and responsive fullscreen toggle menu with an animated hamburger icon.

> The plugin is focused around functionality, not the design.

[Demo](https://mbensler.github.io/examples/jQuery/fullscreenMenu/index.html)

## Usage

First of all, download the external style.css and script.min.js files! The index.html file is optional.

Next, create the icon and the menu overlay in your HTML by inserting the following:

```html
<div id="nav-icon1">
  <span></span>
  <span></span>
  <span></span>
</div>
```

```html
<div id="overlay">
  <div>
      <ul>
        <li><a href="#">Menu item</a></li>
        <li><a href="#">Menu item</a></li>
        <li><a href="#">Menu item</a></li>
      </ul>
  </div>
</div>
```

Now link to the external css file in your head section:

```html
<link rel="stylesheet" href="style.css">
```

And last but not least, link to jQuery and the external javascript file at the bottom of your html file, before the closing body tag:

```html
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="script.min.js"></script>
```

## Customizing

Everything can be customized. Just change whatever you want changed in any of the external files.
By changing the overlay’s width and side it can also be changed to a left or right sided toggle menu, instead of a fullscreen menu.

## Author

Michael Bensler
* [https://github.com/Mbensler](https://github.com/Mbensler)

## Licence

jQuery fullscreenMenu is available under the MIT license. See the [LICENSE](https://github.com/Mbensler/jQuery-fullscreenMenu/blob/master/LICENSE) file for more information.
