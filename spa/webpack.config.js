const Encore = require("@symfony/webpack-encore");
const WebpackConfig = require("@symfony/webpack-encore/lib/WebpackConfig");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const webpack = require('webpack');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
	Encore.configureRuntimeEnvironment(process.env.NODE_ENV || "dev");
}

Encore.setOutputPath("public/")
	.setPublicPath("/")
	.cleanupOutputBeforeBuild()
	.addEntry("app", "./src/app.js")
	.enablePreactPreset()
    .enableSingleRuntimeChunk()
    .enableSassLoader()
    .addPlugin(
        new webpack.DefinePlugin({
            'ENV_API_ENDPOINT': JSON.stringify(process.env.API_ENDPOINT),
        })
    )
	.addPlugin(
		new HtmlWebpackPlugin({
			template: "src/index.ejs",
			alwaysWriteToDisk: true,
		})
	);

module.exports = Encore.getWebpackConfig();
