<template>
  <div>
    <Header />
  </div>
</template>

<script>
// components
import Header from '@/components/Atoms/Header';

export default {
  components: {
    Header,
  },
  mounted() {
    window.liff.init({
      liffId: process.env.LIFF_ID,
    });
  },
};
</script>

<style lang="scss"></style>
