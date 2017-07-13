#!/usr/bin/env node

const BrowserSync = function(options) {

	this.ports = {};
	this.sync = require('browser-sync').create();
	

	this.version = process.env.PWD.split('/');
	this.outputPath = null;
	this.prevTimestamps = {};
	this.startTime = Date.now();
	this.defaults = {
		target: 'http://cw.dev',
		port: 8080,
		stylesheet: 'style.css',
		js: 'scripts.min.js'
	};
	this.options = Object.assign(this.defaults, options);

	this.sync.init({
		logFileChanges: false,
		reloadOnRestart: true,
		logPrefix: 'Browser Sync',
		proxy: {
			target: this.options.target
		},
		port: this.options.port,
		ui: false,
		open: false
	});

	this.sync.watch(process.env.PWD + '/httpdocs/callam-williams/themes/callam-williams/**/*.php', {
		ignored: [process.env.PWD + '/httpdocs/wordpress/**/*.php', process.env.PWD + '/httpdocs/callam-williams/plugins/**/*.php']
	}, function(e, file) {
		if(e === 'change') {
			this.sync.reload(file);
		}
	}.bind(this));

};

BrowserSync.prototype.notify = function(text, time) {
	this.sync.notify(data, time);
};

BrowserSync.prototype.deriveReload = function(files) {
	var reloadCSS = false,
		reloadJS = false;

	for(var i = 0; i < files.length; i++) {
		if(files[i].match(/\.js$/gi)) {
			reloadJS = true;
			break
		}
		if(files[i].match(/\.scss$/gi)) {
			reloadCSS = true;
			break
		}
	}

	if(reloadCSS === true) {
		this.sync.reload(this.outputPath +'/'+ this.options.stylesheet);
	}

	if(reloadJS === true) {
		this.sync.reload(this.outputPath +'/'+this.options.js);
	}
};

BrowserSync.prototype.apply = function(compiler) {

	this.outputPath = compiler.options.output.path;

	compiler.plugin('emit', function(compilation, callback) {

		var changedFiles = Object.keys(compilation.fileTimestamps).filter(function(watchfile) {
			return (this.prevTimestamps[watchfile] || this.startTime) < (compilation.fileTimestamps[watchfile] || Infinity);
		}.bind(this));

		this.prevTimestamps = compilation.fileTimestamps;
		this.deriveReload(changedFiles);

		callback();
	}.bind(this))
};

exports.default = BrowserSync;