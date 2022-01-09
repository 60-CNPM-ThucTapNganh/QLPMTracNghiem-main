module.exports = {
  mode: 'jit',
  purge: [
    './public/**/*.html',
    './src/**/*.{js,jsx,ts,tsx,vue}',
  ],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      spacing: {
        35:'1000px',
        156:'156px',
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
