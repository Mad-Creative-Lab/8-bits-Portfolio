tailwind.config = tailwind.config || {};

tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        neon: {
          pink: '#ff2d75',
          blue: '#00f0ff',
          purple: '#b400ff',
          green: '#00ff88',
          yellow: '#ffcc00',
        },
        pixel: {
          dark: '#0a0a1a',
          light: '#f0f0f0',
          gray: '#333344',
        },
      },
      fontFamily: {
        'press-start': ['"Press Start 2P"', 'cursive'],
        'vt323': ['VT323', 'monospace'],
      },
      animation: {
        float: 'float 6s ease-in-out infinite',
        typing: 'typing 3.5s steps(40, end)',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-20px)' },
        },
        typing: {
          from: { width: '0' },
          to: { width: '100%' },
        },
      },
    },
  },
};
