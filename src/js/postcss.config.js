module.exports = {
    plugins: [
        require('autoprefixer'),
        require('css-mqpacker'),
        require('cssnano')({
            preset: [
                'default', {
                    discardComments: {
                        removeAll: true,
                        calc: false, // 🚫 не трогать calc() и математические выражения
                    }
                }
            ]
        })
    ]
}