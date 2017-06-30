const webpack = require('webpack');
const WebpackConfig = require('webpack-config').default;

module.exports = new WebpackConfig().extend('./config/webpack-base.config.js').merge({
    plugins: [
        new webpack.optimize.ModuleConcatenationPlugin(),
        new webpack.DefinePlugin({
            'process.env': {
                'NODE_ENV': JSON.stringify('production')
            }
        })
    ]
});
