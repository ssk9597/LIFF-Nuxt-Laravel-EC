<template>
  <div class="container">
    <Header />
    <div class="message">
      <p>ご購入ありがとうございます！</p>
      <p>ご不明点がありましたらお気軽にご連絡ください。</p>
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
  padding-bottom: 20px;
}
</style>