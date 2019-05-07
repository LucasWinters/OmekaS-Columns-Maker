# OmekaS-Columns-Maker
Making some ready-to-go columns for Omeka

The anatomy of a module:

Module.php: Provides the methods needed to integrate your custom functionality with Omeka S.

/asset: contains .js, .css ad image files.

/config:

    module.ini: contains basic information about the module such as name, version, author, description, link, etc.
  
    module.config.php: registers things that you need to make use of for your module.
  
/src: contains source files for the things registered in module.config.php

/view: a kind of adapter that takes care of display.

I had a few iterations. The best possible result is to have the textfield dynamically increase and decrease with the number_of_columns variable selected. However, this has 2 problems. One is that I don't know how to make it interactively change within the admin page, the second problem is that what if the user want to delete a specific column?

This led to the current iteration where each module block only produce one column. This way it is both possible to delete and customize each specific column.

