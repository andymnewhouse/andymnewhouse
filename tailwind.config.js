module.exports = {
  purge: [],
  theme: {
    typography: {
        'dark': {
            css: {
                fontSize: '1.875rem',
                h1: {
                fontSize: '4rem',
                },
                // ...
            },
        },
    },
    extend: {
        height: {
            '1/2-screen': '49vh'
        },
        inset: {
            '1/2': '50%',
        },
        opacity: {
            '95': '0.95',
            '98': '0.98',
        },
        screens: {
            'dark': {'raw': '(prefers-color-scheme: dark)'},
        }
    },
  },
  variants: {
    opacity: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
  },
  plugins: [
      require('@tailwindcss/typography'),
      require('@tailwindcss/ui'),
  ],
}
