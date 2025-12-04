const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const sortCSSmq = require('sort-css-media-queries');

// const PAGES_DIR = `src/pug/pages/`;

const isProd = process.env.NODE_ENV === 'production'; // определяем режим
const PAGES_DIR = `src`;


module.exports = {
    mode: isProd ? 'production' : 'development',
    // mode: 'production',
    // mode: 'development',
    entry: {
        app: ['./src/app.js'],
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js',
        clean: true, // очищает dist перед сборкой
        publicPath: isProd ? '/dobro-kazan/' : '/', // ✅ важно для gh-pages
        /* for background images*/
        assetModuleFilename: (pathData) => {
            const filepath = path
                .dirname(pathData.filename)
                .split("/")
                .slice(1)
                .join("/");
            return `${filepath}/[name][ext][query]`;
        },
    },
    // watch: true,
    watch: !isProd,
    resolve: {
        alias: {
            jquery: "jquery/src/jquery"
        }
    },
    module: {
        rules: [
            {
                test: /\.scss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    {
                        loader: "postcss-loader",
                        options: {
                            postcssOptions: {
                                plugins: [
                                    require('autoprefixer'),
                                    require('css-mqpacker')({
                                        sort: sortCSSmq.desktopFirst,
                                    }),
                                ],
                            },
                        },
                    },
                    // Compiles Sass to CSS
                    "sass-loader",
                ],
            },
        ]
    },
    plugins: [

        // new BrowserSyncPlugin({
        //     host: 'localhost',
        //     port: 9000,
        //     files: ['./dist/*.html'],
        //     notify: false,
        //     server: {baseDir: ['dist']}
        // }),
        new HtmlWebpackPlugin({
            template: `${PAGES_DIR}/index.html`,
            filename: './index.html',
            inject: true,
            async: ['app'],
        }),
        new HtmlWebpackPlugin({
            template: `${PAGES_DIR}/elka.html`,
            filename: './elka.html',
            inject: true,
            async: ['app'],
        }),
        new MiniCssExtractPlugin({
            filename: "css/style.css",
        }),
        /* for <img> */
        new CopyWebpackPlugin({
            patterns: [
                {from: 'src/img', to: 'img'},
                {from: 'src/assets', to: 'assets'},
                {from: 'src/map', to: 'map'},
                {from: 'src/css-elka', to: 'css-elka'},
            ],
        }),
        ...(!isProd
            ? [
                new BrowserSyncPlugin({
                    host: 'localhost',
                    port: 9000,
                    files: ['./dist/*.html'],
                    notify: false,
                    server: { baseDir: ['dist'] },
                }),
            ]
            : []),
    ],

};