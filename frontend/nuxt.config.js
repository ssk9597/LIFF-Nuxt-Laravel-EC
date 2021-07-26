require('dotenv').config();
const { API_URL, LIFF_ID, LIFF_CHANNEL_ID, MICROCMS_API_KEY, HUBSPOT_API_KEY } = process.env;

export default {
  target: 'static',
  head: {
    title: "LIFF's Shop",
    htmlAttrs: {
      lang: 'ja',
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    script: [{ src: 'https://static.line-scdn.net/liff/edge/2/sdk.js' }],
  },

  css: [{ src: '@/assets/styles/style.scss', lang: 'scss' }],

  styleResources: {
    scss: ['@/assets/styles/style.scss'],
  },

  plugins: [],

  components: true,

  buildModules: [],

  watchers: {
    webpack: {
      poll: true,
    },
  },

  modules: ['@nuxtjs/axios', '@nuxtjs/proxy', '@nuxtjs/dotenv', '@nuxtjs/style-resources'],

  env: {
    API_URL,
    LIFF_ID,
    LIFF_CHANNEL_ID,
    MICROCMS_API_KEY,
    HUBSPOT_API_KEY,
  },

  proxy: {
    '/api': process.env.API_URL,
  },

  axios: {
    baseURL: process.env.API_URL,
    browserBaseURL: process.env.API_URL,
  },

  build: {},
};
