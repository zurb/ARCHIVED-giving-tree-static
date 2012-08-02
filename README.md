Tabs
====

Don't use tabs.  Use 2 spaces for line indentation.  Most editors will make spaces behave like tabs, ask one of the ZURBians if you need help setting this up.

Images
======

All images should be placed in `images/`.  In your stylesheets use `image-url` to reference images.  Image paths should be written from site's root `images/` directory.  For example:

```css
/* in sass/app.scss */
#myContainer {background-image: image-url('my-image.png'); }

/* in sass/examples/app.scss (code is the same) */
#myContainer {background-image: image-url('my-image.png'); }
```

Fonts
=====

All fonts should be placed in `fonts/`.  In your stylesheets use `font-url` to reference font files.  Font paths should be written from site's root fonts/` directory.  For example:

```css
/* in sass/app.scss */
@font-face { font-family: 'OpenSans'; src: font-url("fonts/OpenSans-Bold-webfont.eot"); }

/* in sass/examples/app.scss (code is the same) */
@font-face { font-family: 'OpenSans'; src: font-url("fonts/OpenSans-Bold-webfont.eot"); }
```