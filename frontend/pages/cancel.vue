<template>
  <div class="container">
    <Header />
    <div class="message">
      <p class="message-text">商品購入に失敗しました。</p>
      <p class="message-text">もう一度ご確認ください。</p>
    </div>
  </div>
</template>

<script>
// components
import Header from '@/components/Molecules/Header';
export default {
  components: {
    Header,
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
.message {
  padding-top: 70px;

  &-text {
    padding: 0 10px;
    line-height: 1.5;
  }
}
</style>