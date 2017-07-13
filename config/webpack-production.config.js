const webpack = require('webpack');
const WebpackConfig = require('webpack-config').default;
const path = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');

const theme = path.resolve(__dirname, '../httpdocs/callam-williams/themes/callam-williams');
const pathsToClean = [
	`${theme}/assets/img/*.*`,
	`${theme}/assets/fonts/*.*`,
];
const cleanOptions = {
	verbose: true,
	root: theme,
};

module.exports = new WebpackConfig().extend('./config/webpack-base.config.js').merge({
	watch: false,
	plugins: [
		new CleanWebpackPlugin(pathsToClean, cleanOptions),
		new webpack.optimize.ModuleConcatenationPlugin(),
		new webpack.DefinePlugin({
			'process.env': {
				NODE_ENV: JSON.stringify('production'),
			},
		}),
	],
});
