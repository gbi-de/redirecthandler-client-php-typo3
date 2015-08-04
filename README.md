# redirecthandler-client-php-typo3
Client implementation for the Redirect Handler in PHP, example for typo3

For more information see redirecthandler doc: https://github.com/gbi-de/redirecthandler-doc

## Installation
1. Enter your final 404 page and the API-KEY in `class.user_notfound.php`
2. Place the file `class.user_notfound.php` in your `typo3/fileadmin` folder.
3. Add the Line 
`'pageNotFound_handling' => 'USER_FUNCTION:fileadmin/class.user_notfound.php:user_notFound->pageNotFound',`
at the FE part of your typo3configuration
