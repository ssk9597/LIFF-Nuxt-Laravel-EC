<template>
  <div></div>
</template>

<script>
export default {
  mounted() {
    window.liff.init({
      liffId: process.env.LIFF_ID,
    });
  },
};
</script>

<style lang="scss"></style>
