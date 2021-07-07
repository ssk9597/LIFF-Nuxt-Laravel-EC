<template>
  <div>
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

<style lang="scss"></style>
