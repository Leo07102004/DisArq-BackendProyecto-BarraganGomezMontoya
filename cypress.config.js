import { defineConfig } from 'cypress';

export default defineConfig({
  e2e: {
    setupNodeEvents(on, config) {
      // Configura eventos si los necesitas
    },
    baseUrl: "http://127.0.0.1:8000", // Cambia esta URL a la de tu proyecto Laravel
    supportFile: false,
  },
});
