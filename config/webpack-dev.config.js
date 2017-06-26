const webpack = require('webpack');
const path = require('path');
const BrowserSync = require('../BrowserSync').default;
const WebpackConfig = require('webpack-config').default;

module.exports = new WebpackConfig().extend('./config/webpack-base.config.js').merge({
    watch: true,
    devtool: "source-map",
    plugins: [
        new BrowserSync()
    ]
});
