module.exports = {
  purge: [],
  theme: {
    extend: {
        inset: {
            '1/2': '50%',
        },
        opacity: {
            '95': '0.95',
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
