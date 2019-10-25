# Autoload

## Purpose
Automatically load PHP files in the specified directory. Recursively. 

### Benefits

* Rename files with no fear of breaking `includes` or `require` calls
* Encourages using more files to more cleanly organize code into smaller logical chunks
* Reduce git merge conflicts with other developers

## Usage
Be sure to include the regular composer load file via `require( __DIR__ . '/vendor/autoload.php' );`.

Please note that although similarly named, this Autoload library is meant for loading all PHP files in a given directory. This does **NOT** function in the manner of the built-in PSR-4 PHP Autoloader. This is meant for PHP files which are just simple functions (i.e. not class based files)

Simply load your desired `src` or whatever directory by calling:

```
\A7\autoload( __DIR__ . '\src' );
```

### Inclusion Notes
Will throw exceptions if:
* there are more than 250 files in a directory
* any of the php files are larger than 300kb
* any of the php files are negative filesize (indicates something really funky going on) 

## Caveats
Since this is a recursive loader, you should be conscious of what you're placing in your autoloaded directory.

### Not recommended:
* Placing a big (or any) PHP library in the autoloaded directory (this should/could be handled better with [composer](https://getcomposer.org/) anyways!)
* Being lax with permissions on a server. Obviously this is never a good idea, but I would be sure that your folder / file permissions are up to snuff (or strange files may be loaded)
* Trying to autoload `node_modules` or any other large volume of folders and files

## Disclaimer
Be aware that this may not be the right choice for your project. Please be fully aware of what this plugin does and how it works.