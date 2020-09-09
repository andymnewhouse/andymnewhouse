const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: [],
  theme: {
    typography: {
        'dark': {
            css: {
                color: defaultTheme.colors.gray[300],
                '[class~="lead"]': {
                  color: defaultTheme.colors.gray[300],
                },
                a: {
                  color: defaultTheme.colors.gray[100],
                },
                strong: {
                  color: defaultTheme.colors.gray[100],
                },
                'ol > li::before': {
                  color: defaultTheme.colors.gray[400],
                },
                'ul > li::before': {
                  backgroundColor: defaultTheme.colors.gray[600],
                },
                hr: {
                  borderColor: defaultTheme.colors.gray[700],
                },
                blockquote: {
                  color: defaultTheme.colors.gray[100],
                  borderLeftColor: defaultTheme.colors.gray[700],
                },
                h1: {
                  color: defaultTheme.colors.gray[100],
                },
                h2: {
                  color: defaultTheme.colors.gray[100],
                },
                h3: {
                  color: defaultTheme.colors.gray[100],
                },
                h4: {
                  color: defaultTheme.colors.gray[100],
                },
                'figure figcaption': {
                  color: defaultTheme.colors.gray[400],
                },
                code: {
                  color: defaultTheme.colors.gray[100],
                },
                pre: {
                  color: defaultTheme.colors.gray[300],
                  backgroundColor: defaultTheme.colors.gray[800],
                },
                thead: {
                  color: defaultTheme.colors.gray[100],
                  borderBottomColor: defaultTheme.colors.gray[600],
                },
                'tbody tr': {
                  borderBottomColor: defaultTheme.colors.gray[700],
                },
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
