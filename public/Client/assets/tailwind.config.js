module.exports = {
  mode: 'jit',
  purge: [
    './**/*.html'
  ],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      spacing: {
        35:'1000px',
      },
      colors: {
        gray33: '#333',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
