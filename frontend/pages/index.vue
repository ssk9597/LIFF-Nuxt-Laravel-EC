<template>
  <div class="container">
    <Header />
    <Hero />
    <Heading :main="'Registration'" :sub="'会員登録'" />
    <div class="image">
      <img src="@/assets/images/line.png" alt="LINEログイン" @click="lineLogin()" />
    </div>
    <Heading :main="'Product'" :sub="'商品'" />
    <Card :products="products" />
  </div>
</template>

<script>
// components
import Header from '@/components/Atoms/Header';
import Hero from '@/components/Atoms/Hero';
import Heading from '@/components/Atoms/Heading';
import Card from '@/components/Atoms/Card';

export default {
  components: {
    Header,
    Hero,
    Heading,
    Card,
  },
  async asyncData({ $axios }) {
    const products = await $axios.$get('https://liff-nuxt-laravel.microcms.io/api/v1/product', {
      headers: { 'X-API-KEY': process.env.MICROCMS_API_KEY },
    });
    return { products };
  },
  data() {
    return {
      products: '',
    };
  },
  mounted() {
    window.liff.init({
      liffId: process.env.LIFF_ID,
    });
  },
  methods: {
    lineLogin() {
      console.log('LINEログインをクリックしました');
    },
  },
};
</script>

<style lang="scss">
.container {
  margin: 0 auto;
  background: $color_gray;
  width: 100%;
  max-width: 390px;
  padding-bottom: 60px;
}

.image {
  text-align: center;
}
</style>
