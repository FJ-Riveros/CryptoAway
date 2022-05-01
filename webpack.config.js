const path = require('path')
// add webpack import
const webpack = require('webpack') 
module.exports = {
    entry: './src/index.js',
    output: {
      filename: 'bundle.js',
      path: path.resolve(__dirname, 'dist'),
    //   path: 'http://localhost/cryptoaway/dist',
      publicPath: '/dist/',
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules/,
          use: ['babel-loader'],
        },
      ],
    },
    resolve: {
      extensions: ['*', '.js', '.jsx'],
    },
    // ...add HowModuleReplacementPlugin and devServer
    plugins: [new webpack.HotModuleReplacementPlugin()],
    devServer: {
        port: 3000,
        static: {
          directory: path.join(__dirname, "app")
        },
    },
  }