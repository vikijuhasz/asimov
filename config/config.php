<?php

  define('DEBUG', $_ENV['DEBUG']); // set debug to false for production
  define('RUN_MIGRATIONS_FROM_BROWSER', $_ENV['RUN_MIGRATIONS_FROM_BROWSER']);
  define('DB_NAME', $_ENV['DB_NAME']); 
  define('DB_USER', $_ENV['DB_USER']); 
  define('DB_PASSWORD', $_ENV['DB_PASSWORD']); 
  define('DB_HOST', $_ENV['DB_HOST']); // database host *** use IP address to avoid DNS lookup
  define('DB_CHARSET', $_ENV['DB_CHARSET']);      
  define('DEFAULT_CONTROLLER', $_ENV['DEFAULT_CONTROLLER']); // default controller if there isn't one defined in the url
  define('DEFAULT_LAYOUT', $_ENV['DEFAULT_LAYOUT']); // if no layout is set in the controller use this layout.
  define('PROOT', $_ENV['PROOT']); // set this to '/' for a live server.
  define('SITE_TITLE', $_ENV['SITE_TITLE']); // This will be used if no site title is set
  define('MENU_BRAND', $_ENV['MENU_BRAND']); //This is the Brand text in the menu
  define('CURRENT_USER_SESSION_NAME', $_ENV['CURRENT_USER_SESSION_NAME']); // session name for logged in user
  define('REMEMBER_ME_COOKIE_NAME', $_ENV['REMEMBER_ME_COOKIE_NAME']);
  define('REMEMBER_ME_COOKIE_EXPIRY', $_ENV['REMEMBER_ME_COOKIE_EXPIRY']); // time in seconds for remember me cookie to live (30 days)
  define('ACCESS_RESTRICTED', $_ENV['ACCESS_RESTRICTED']); //controller name for the restricted redirect
  define('SMTP_USERNAME', $_ENV['SMTP_USERNAME']);   //Username for SMTP authentication
  define('SMTP_PASSWORD', $_ENV['SMTP_PASSWORD']);    // Password for SMTP authentication
  

  