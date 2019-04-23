# OmekaS-Columns-Maker
Making some ready-to-go columns for Omeka

The anatomy of a module:

Module.php: Provides the methods needed to integrate your custom functionality with Omeka S.

/asset: contains .js, .css ad image files.

/config:

    module.ini: contains basic information about the module such as name, version, author, description, link, etc.
  
    module.config.php: registers things that you need to make use of for your module.
  
/src: contains source files for the things registered in module.config.php

/view: a kind of adapter that takes care of display?

