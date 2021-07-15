<template>
  <div>
    <p>{{ test }}</p>
    <Index :products="products" />
  </div>
</template>

<script>
// components
import Index from '@/components/Template/Index';

export default {
  components: {
    Index,
  },
  async asyncData({ $axios }) {
    const products = await $axios.$get('https://liff-nuxt-laravel.microcms.io/api/v1/product', {
      headers: { 'X-API-KEY': process.env.MICROCMS_API_KEY },
    });
    const test = await $axios.$get('/');
    return { products, test };
  },
  data() {
    return {
      products: '',
      test: '',
    };
  },
  mounted() {
    window.liff.init({
      liffId: process.env.LIFF_ID,
    });
  },
};
</script>