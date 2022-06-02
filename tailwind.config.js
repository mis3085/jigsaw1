const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: require('fast-glob').sync([
    'source/**/*.html',
    'source/**/*.md',
    'source/**/*.js',
    'source/**/*.php',
    'source/**/*.vue',
  ]),
  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/line-clamp')
  ],
};
