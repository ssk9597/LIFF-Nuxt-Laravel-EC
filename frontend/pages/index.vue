<template>
  <div class="container">
    <Header />
    <Hero />
  </div>
</template>

<script>
// components
import Header from '@/components/Atoms/Header';
import Hero from '@/components/Atoms/Hero';

export default {
  components: {
    Header,
    Hero,
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
  background: $color_gray;
  width: 100%;
  max-width: 390px;
  height: 100vh;
}
</style>
