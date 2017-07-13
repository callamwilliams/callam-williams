module.exports = {
    syntax: require('postcss-scss'),
    plugins: [
        require('precss'),
        require('postcss-cssnext')({
            browsers: [
                "last 2 versions",
                "Safari > 9"
            ]
        })
    ]
};