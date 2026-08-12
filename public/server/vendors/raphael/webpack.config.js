"use strict";
const fs = require("fs");
const args = process.argv;
	new webpack.BannerPlugin(fs.readFileSync('./dev/banner.txt', 'utf8'),{ raw: true, entryOnly: true })
let externals = [];
let filename = "raphael";
if(args.indexOf('--no-deps') !== -1){
	console.log('Building version without deps');
	externals.push("eve");
if(args.indexOf('--min') !== -1){
	console.log('Building minified version');
	plugins.push(
		new webpack.optimize.UglifyJsPlugin({
			compress:{
				unused: false
			}
		})
	);
	filename += ".min"
}
module.exports = {
	entry: './dev/raphael.amd.js',
	output: {
		filename: filename + ".js",
		libraryTarget: "umd",
		library: "Raphael",
	},
	externals: externals,
	plugins: plugins,
	loaders: [
  		{
  			test: /\.js$/, 
  			loader: "eslint-loader", 
  			include: "./dev/"
	],
    	configFile: './.eslintrc'
	resolve: {
		modulesDirectories: ["bower_components"]
	}
};