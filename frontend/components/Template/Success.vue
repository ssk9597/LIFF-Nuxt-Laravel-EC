<template>
  <div class="container">
    <Header />
    <div class="message">
      <p class="message-text">ご購入ありがとうございます！</p>
      <p class="message-text">ご不明点がありましたらお気軽にご連絡ください。</p>
      <LinkButton />
    </div>
  </div>
</template>

<script>
// components
import Header from '@/components/Molecules/Header';
import LinkButton from '@/components/Atoms/LinkButton';
export default {
  components: {
    Header,
    LinkButton,
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
