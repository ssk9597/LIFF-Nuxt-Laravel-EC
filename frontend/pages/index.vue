<template>
  <div class="container">
    <Header />
    <Hero />
    <Heading :main="'Registration'" :sub="'会員登録'" />
    <div class="image">
      <img src="@/assets/images/line.png" alt="LINEログイン" @click="lineLogin()" />
    </div>
    <Heading :main="'Product'" :sub="'商品'" />
  </div>
</template>

<script>
// components
import Header from '@/components/Atoms/Header';
import Hero from '@/components/Atoms/Hero';
import Heading from '@/components/Atoms/Heading';

export default {
  components: {
    Header,
    Hero,
    Heading,
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
  height: 100vh;
}

.image {
  text-align: center;
}
</style>
