/**@type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {
      animation: {
        'slide-in-right': 'slideInRight 0.5s ease-out',
        'fade-out': 'fadeOut 0.5s ease-in forwards',
      },
      keyframes: {
        slideInRight: {
          '0%': { transform: 'translateX(100%)', opacity: '0' },
          '100%': { transform: 'translateX(0)', opacity: '1' },
        },
        fadeOut: {
          '0%': { opacity: '1' },
          '100%': { opacity: '0' },
        },
      },
    },
  },
}