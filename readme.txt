Alien Ship WordPress Theme
--------------------------

Alien Ship is an HTML5 responsive starter theme for WordPress. It uses Twitter's Bootstrap version 2.x. It comes with core HTML, CSS, and Javascript for type, form, grids, navigation, buttons, dropdown menus, and more. It includes a number of shortcodes to enable quick placement of buttons, labels, alerts, panels, wells, etc. Visit http://www.johnparris.com/alienship/ to see the theme in action, to download it, or to read the documentation.

If you would like to contribute, please fork it and submit your pull requests. Thanks!




Task List
---------

+ Make more use of Bootstrap styles. Example: post pagination (wp_link_pages).
+ Style Main Menu.
+ Style search results page. Example: gallery in results currently shows title and meta, with no content/thumbs.
+ Clean up code and fix validation issues
+ Shortcodes for scaffolding, modals, tooltips, popovers, tabs...
+ Style each post format (future release)
+ Make sure strings are translatable.
+ Header image option
+ Font options
+ Color options
+ Layout options for index, archive, etc. List, Tile, etc.
+ Add custom taxonomies to breadcrumb code.
+ Post display options: Timestamp/Category/Tags/Author/Comment link (Top, bottom)
+ Avatar and author bio display
+ Documentation




Known Issues
------------

+ You can't really have a Top Menu and a Main Menu at the same time if you're using responsive layout. This is because they both use the same styling and the responsive button and javascript toggles both menus. This is actually on purpose as an option is coming that will enable either the Top Menu or the Main Menu. Both won't be an option. So for now, if you're using responsive, you need to make a choice of Top or Main. I might change this in later versions to enable two menus, but the current styling doesn't really work well for the user experience. It's just awkward to have two menu buttons without any other indicators as to the difference. Still thinking about this one.

Have a bug? Please create an issue here on GitHub!

https://github.com/mindctrl/alienship/issues




Authors
-------

**mindctrl**
+ http://github.com/mindctrl


Thanks to the original authors of Twitter's Bootstrap and Automattic's _s theme, and everyone else who has contributed to both and to the included libraries and assets. Thanks to Rachel Baker for breadcrumbs and various inspirations.




Twitter Bootstrap
-----------------

Bootstrap is Twitter's toolkit for kickstarting CSS for websites, apps, and more. It includes base CSS styles for typography, forms, buttons, tables, grids, navigation, alerts, and more.

To get familiar with the features -- checkout http://twitter.github.com/bootstrap!




Automattic _s
-------------

I used the _s theme from Automattic as a base starter theme.
https://wpcom-themes.svn.automattic.com/_s/




Alien Ship Copyright and License
---------------------------------------------

Copyright 2012 John Parris

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this work except in compliance with the License.
You may obtain a copy of the License in the LICENSE file, or at:

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
