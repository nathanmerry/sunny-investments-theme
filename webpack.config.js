const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const ExtraWatchWebpackPlugin = require("extra-watch-webpack-plugin");

module.exports = {
  mode: "production",
  entry: "./src/assets/index.js",
  output: {
    path: path.resolve(__dirname, "dist")
  },
  plugins: [
    new MiniCssExtractPlugin(),
    new ExtraWatchWebpackPlugin({
      files: ["tailwind.config.js"],
      dirs: ["src/blade/views"]
    })
  ],
  watchOptions: {
    ignored: /node_modules/
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        exclude: /node_modules/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {
              publicPath: "/public/path/to/"
            }
          },
          {
            loader: "css-loader",
            options: {
              importLoaders: 1
            }
          },
          {
            loader: "postcss-loader"
          }
        ]
      }
    ]
  }
};
