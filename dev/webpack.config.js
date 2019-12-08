const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CopyWebpackPlugin = require('copy-webpack-plugin');
const path = require('path')
// base config
const SRC = './src'
const DEST = ''

module.exports = {
  output: {
    path: path.resolve(__dirname, '../assets')
  },
  mode: 'development',
  entry: [`${SRC}/scss/application.scss`],
  optimization: {
    minimize: true
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: "style-loader",
          use: [
            "css-loader?url=false",
            'sass-loader'
          ],
        })
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin(`application.css`),
    new CopyWebpackPlugin([
      {
        from: SRC + '/images',
        to: DEST + 'images'
      },
      {
        from: SRC + '/js',
        to: DEST + 'js'
      }
    ])
  ]
};