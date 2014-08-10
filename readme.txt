Alien Ship WordPress Theme
--------------------------
Alien Ship is a responsive starter theme for WordPress. It uses the Sass version of Bootstrap 3.x and includes a Gruntfile for compiling assets for production environments.

The theme ships with the full Bootstrap library for development purposes. For production environments you should only use the parts of the library you need. To remove styles you don't need, delete or comment out the lines in assets/sass/bootstrap.scss. To remove scripts you don't need, delete the lines from the top of Gruntfile.js so they're not compiled.

Styles: Grunt reads assets/sass/style.scss and compiles the Bootstrap and theme styles into style.css and style.min.css. In development environments, the theme loads style.css. In production environments it loads style.min.css for performance.

Scripts: Grunt compiles the Bootstrap and theme javascript files into assets/js/scripts.js and assets/js/scripts.min.js. In development environments, the theme loads scripts.js. In production environments it loads scripts.min.js for performance.

Visit http://www.johnparris.com/alienship/ to see the theme in action, to download it, or to read the documentation.


Contributions
-------------
I mostly build this theme for my use, but I am open to contributions. If you have more than just a small fix or enhancement, please discuss the idea with me first in the issues. All contributions should be done in a feature/fix branch off the dev branch so that it can be merged back into the dev branch.


Known Issues
------------
Have a bug? Please create an issue here on GitHub!

https://github.com/mindctrl/alienship/issues


Authors
-------
mindctrl
https://github.com/mindctrl

Thanks to the authors of Bootstrap and Automattic's _s theme, and everyone else who has contributed to both and to the included libraries and assets.


Alien Ship Copyright and License
---------------------------------------------

Copyright John Parris

License included in license.txt