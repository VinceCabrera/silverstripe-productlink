const Path = require('path');
const webpackConfig = require('@silverstripe/webpack-config');
const {
    resolveJS,
    externalJS,
    moduleJS,
    pluginJS,
    moduleCSS,
    pluginCSS,
} = webpackConfig;

const ENV = process.env.NODE_ENV;
const PATHS = {
    MODULES: 'node_modules',
    FILES_PATH: '../',
    ROOT: Path.resolve(),
    SRC: Path.resolve('client/src'),
    DIST: Path.resolve('client/dist'),
};

const config = [
    {
        name: 'js',
        entry: {
            'TinyMCE_sslink-product': `${PATHS.SRC}/TinyMCE_sslink-product.js`,
            'TinyMCE_sslink-pcw': `${PATHS.SRC}/TinyMCE_sslink-pcw.js`,
        },
        output: {
            path: PATHS.DIST,
            filename: 'js/[name].js',
        },
        devtool: (ENV !== 'production') ? 'source-map' : '',
        resolve: resolveJS(ENV, PATHS),
        externals: externalJS(ENV, PATHS),
        module: moduleJS(ENV, PATHS),
        plugins: pluginJS(ENV, PATHS),
    }
];

// Use WEBPACK_CHILD=js or WEBPACK_CHILD=css env var to run a single config
module.exports = (process.env.WEBPACK_CHILD)
    ? config.find((entry) => entry.name === process.env.WEBPACK_CHILD)
    : module.exports = config;
