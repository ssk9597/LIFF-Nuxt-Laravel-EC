<template>
  <div class="container">
    <Header />
    <Hero />
    <Heading :main="'Registration'" :sub="'会員登録'" />
  </div>
</template>

<script>
// components
import Header from '@/components/Atoms/Header';
import Hero from '@/components/Atoms/Hero';
import Heading from '@/components/Atoms/Heading';
import Image from '@/components/Atoms/Image';

export default {
  components: {
    Header,
    Hero,
    Heading,
    Image,
  },
  mounted() {
    window.liff.init({
      liffId: process.env.LIFF_ID,
    });
  },
};
</script>

<style lang="scss">
// color
$color_gray: #bfbfbe;

.container {
  margin: 0 auto;
  background: $color_gray;
  width: 100%;
  max-width: 390px;
  height: 100vh;
}
</style>
