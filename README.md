# WordPress Tailwind Starter Theme
A minimalistic WordPress starter theme, based on Tailwind and PurgeCSS.

## Requirements
- [NodeJS](https://nodejs.org)
- [Composer](https://getcomposer.org)

## How to get started
1. Clone or [download](https://github.com/freeshifter/wp-tailwind/archive/master.zip "Download the WP Tailwind Zip") the project onto your `themes` directory `(./wp-content/themes)`
2. Run a find/replace for the following strings:
- `wp-tailwind`
- `WP_Tailwind`
- `wp_tailwind_`
3. Run `composer install`
4. Run `npm install` 
5. Update the BrowserSyncPlugin configuration in `webpack.config.js` to the domain of your local installation.
6. Run `npm start` to begin development server.

## Webpack
The theme uses Webpack as its bundler with ES6 modules for JavaScript files. It also compresses images found in src automatically, and maps images to the appropriate destination through the `@images` alias. For example, `@images/example.jpg` would be compiled to `../images/example.jpg`.

## Deployment 
```bash
npm run build
```
This will run both a production and development set of webpack tasks. The enqueue hook will load the correct version of the JS file, based on whether your development/staging server's `SCRIPT_DEBUG` constant is set to `true`.

## Tailwind
Using the `tailwind.js` file, you can customize Tailwind's default styles before things get compiled. For more information on configuration, [see detailed documentation on Tailwind](https://tailwindcss.com/).

## PurgeCSS
*WP Tailwind* uses PurgeCSS to remove unused styles from the production build. It scans your project directory for strings that match SCSS declarations. You can modify the directories to search for in the `webpack.config.js` file. **Always check your production build to make sure styles you were developing with compiled correctly.**

### Credits
Originally inspired by the Heisenberg by Zeek Interactive.
