
const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const FriendlyFormatter = require('eslint-friendly-formatter');

const theme = path.resolve(__dirname, '../httpdocs/callam-williams/themes/callam-williams');
const isDev = process.env.NODE_ENV !== 'production';

module.exports = {
	watch: true,
	entry: {
		app: `${theme}/assets/src/app.js`,
	},
	output: {
		path: `${theme}/assets/`,
		filename: 'scripts.min.js',
	},
	module: {
		rules: [{
			test: /\.scss$/,
			use: ExtractTextPlugin.extract({
				fallback: 'style-loader',
				use: [{
					loader: 'css-loader',
					options: {
						sourceMap: isDev,
					},
				}, {
					loader: 'postcss-loader',
					options: {
						sourceMap: isDev,
					},
				}, {
					loader: 'sass-loader',
					options: {
						sourceMap: isDev,
					},
				}],
			}),
		}, {
			enforce: 'pre',
			test: /\.js$/,
			exclude: /(node_modules|bower_components)/,
			loader: 'eslint-loader',
			options: {
				fix: true,
				formatter: FriendlyFormatter,
			},
		}, {
			test: /\.js$/,
			use: [{
				loader: 'babel-loader',
				options: {
					presets: [
						['stage-0'],
					],
					cacheDirectory: true,
				},
			}],
			exclude: /(pikaday|bower_components|vendor)/,
		}, {
			test: /\.(jpe?g|png|gif|svg)$/,
			exclude: /(node_modules|bower_components)/,
			loader: 'file-loader',
			options: {
				name: './img/[name].[ext]',
			},
		}, {
			test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
			exclude: /(node_modules|bower_components)/,
			loader: 'file-loader',
			options: {
				name: './fonts/[name].[ext]',
			},
		}],
	},
	plugins: [
		new webpack.optimize.UglifyJsPlugin({
			sourceMap: isDev,
		}),

		new webpack.optimize.CommonsChunkPlugin({
			name: 'scripts',
			async: true,
		}),
		new ExtractTextPlugin('style.css'),
		new StyleLintPlugin(),
		new CopyWebpackPlugin([{
			from: `${theme}/assets/src/img/`,
			to: `${theme}/assets/img/`,
		}]),
		new CopyWebpackPlugin([{
			from: `${theme}/assets/src/fonts/`,
			to: `${theme}/assets/fonts/`,
		}]),
		new ImageminPlugin({
			test: /\.(jpe?g|png|gif|svg)$/i,
		}),
		new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
	],
};