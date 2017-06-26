const WebpackConfig = require('webpack-config').default;

const TARGET = process.env.NODE_ENV;

var webpackConfig;

switch (TARGET) {
    case 'production':
        webpackConfig = './config/webpack-production.config.js';
        break;
    default:
        webpackConfig = './config/webpack-dev.config.js';
        break;
}

module.exports = new WebpackConfig().extend(webpackConfig);
