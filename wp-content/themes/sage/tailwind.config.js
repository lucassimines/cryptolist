module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#00b80f',
          dark: '#008706',
        },
      },
      screens: {
        'mobile-max': {max: '767px'},
        'md-max': {max: '1023px'},
        'm-nav-max': {max: '767px'},
        'tablet-max': {max: '1151px'},
        'desktop-min': {min: '1152px'},
      },
      animation: {
        'spin-slow': 'spin 3s linear infinite',
      },
      maxWidth: {
        main: '1152px',
      },
      fontSize: {
        sm2: ['0.9375rem', '1.6'],
      },
    },
    fontFamily: {
      icon: 'remixicon',
      primary: ['DM Sans', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial'],
    },
  },
  plugins: [],
};
