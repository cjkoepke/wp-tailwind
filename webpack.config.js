const path                 = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin    = require('copy-webpack-plugin');
const ImageminPlugin       = require('imagemin-webpack-plugin').default;
const BrowserSyncPlugin    = require('browser-sync-webpack-plugin');
const PurgeCSS             = require('@fullhuman/postcss-purgecss');
const UglifyJsPlugin       = require("uglifyjs-webpack-plugin");
const isProduction         = 'production' === process.env.NODE_ENV;

// Set the build prefix.
let prefix = isProduction ? '.min' : '';

// Set the PostCSS Plugins.
const post_css_plugins = [
	require('postcss-import'),
	require('tailwindcss')('./tailwind.js'),
	require('postcss-nested'),
	require('postcss-custom-properties'),
	require('autoprefixer')
]

// Add PurgeCSS for production builds.
if ( isProduction ) {
	post_css_plugins.push(require('cssnano'));
	post_css_plugins.push(
		PurgeCSS({
			content: [
				'./*.php',
				'./src/**/*.php',
				'./page-templates/*.php',
				'./assets/images/**/*.svg',
				'./assets/scss/whitelist/*.css',
				'./../../mu-plugins/app/src/components/**/*.php',
			],
			css: [
				'./node_modules/tailwindcss/dist/base.css'
			],
			extractors: [
				{
					extractor: class TailwindExtractor {
						static extract(content) {
							return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
						}
					},
					extensions: ['php', 'js', 'svg', 'css',]
				}
			],
			whitelistPatterns: getCSSWhitelistPatterns()
		})
	)
}

const config = {
	entry: './assets/js/main.js',
	optimization: {
		minimizer: [
			new UglifyJsPlugin({
				cache: true,
				parallel: true,
				sourceMap: true
			})
		]
	},
	output: {
		filename: `[name]${prefix}.js`,
		path: path.resolve(__dirname, 'dist')
	},
	mode: process.env.NODE_ENV,
	module: {
		rules: [
			{
				test: /\.js$/,
				loader: 'babel-loader',
				options: {
					presets: [
						[
							"@babel/preset-env"
						]
					]
				}
			},
			{
				test: /\.css$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							importLoaders: 1,
							context: 'postcss',
							sourceMap: ! isProduction
						}
					},
					{
						loader: 'postcss-loader',
						options: {
							ident: 'postcss',
							sourceMap: isProduction || 'inline',
							plugins: post_css_plugins,
						},
					}
				],
			}
		]
	},
	resolve: {
		alias: {
			'@'      : path.resolve('assets'),
			'@images': path.resolve('../images')
		}
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: `[name]${prefix}.css`,
		}),
		new CopyWebpackPlugin([{
			from: './assets/images/',
			to: 'images',
			ignore: [
				'.DS_Store'
			]
		}]),
		new ImageminPlugin({ test: /\.(jpe?g|png|gif|svg)$/i })
	]
}

// Fire up a local server if requested
if (process.env.SERVER) {
	config.plugins.push(
		new BrowserSyncPlugin(
			{
				proxy: 'https://example.dev',
				files: [
					'**/*.php',
					'**/*.scss'
				],
				port: 3000,
				notify: false,
			}
		)
	)
}

/**
 * List of RegExp patterns for PurgeCSS
 * @returns {RegExp[]}
 */
function getCSSWhitelistPatterns() {
	return [
		/^home(-.*)?$/,
		/^blog(-.*)?$/,
		/^archive(-.*)?$/,
		/^date(-.*)?$/,
		/^error404(-.*)?$/,
		/^admin-bar(-.*)?$/,
		/^search(-.*)?$/,
		/^nav(-.*)?$/,
		/^wp(-.*)?$/,
		/^screen(-.*)?$/,
		/^navigation(-.*)?$/,
		/^(.*)-template(-.*)?$/,
		/^(.*)?-?single(-.*)?$/,
		/^postid-(.*)?$/,
		/^post-(.*)?$/,
		/^attachmentid-(.*)?$/,
		/^attachment(-.*)?$/,
		/^page(-.*)?$/,
		/^(post-type-)?archive(-.*)?$/,
		/^author(-.*)?$/,
		/^category(-.*)?$/,
		/^tag(-.*)?$/,
		/^menu(-.*)?$/,
		/^tags(-.*)?$/,
		/^tax-(.*)?$/,
		/^term-(.*)?$/,
		/^date-(.*)?$/,
		/^(.*)?-?paged(-.*)?$/,
		/^depth(-.*)?$/,
		/^children(-.*)?$/,
	];
}

module.exports = config